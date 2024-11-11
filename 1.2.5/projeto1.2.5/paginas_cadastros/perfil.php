<?php
session_start();


if (!isset($_SESSION['email'])) {
    header("Location: ../paginas_cadastros/login.php");
    exit();
}


include('../conexao/teste_conexao.php');
$email = $_SESSION['email'];

$query = "SELECT nome, email, cpf, telefone FROM pessoa WHERE email = ?";
$stmt = $mysqli->prepare($query); 

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $mysqli->error); 

$stmt->bind_param("s", $email); 
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $nome = $user['nome'];
    $cpf = $user['cpf'];
   
} else {
    header("Location: start.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário - Frog Tech</title>
    <link rel="stylesheet" href="../css/paginas_cadastro/perfil.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="../img/logo2.png" alt="Frog Tech Logo">
    </div>
    <div class="menu">
        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</header>

<div class="sidebar" id="sidebarMenu">
    <ul>
    <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../Itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
    </ul>
</div>

<div class="overlay" id="overlay"></div>

<div class="container">
   
    <div class="profile-header">
        
        <h2><?php echo htmlspecialchars($nome); ?></h2>
        <p><?php echo htmlspecialchars($email); ?></p>
    </div>

    <!-- Detalhes do Perfil -->
    <div class="profile-details">
        <h3>Informações Pessoais</h3>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>CPF:</strong> <?php echo htmlspecialchars($cpf); ?></p>
    </div>

   
    <a href="alterar_informacoes.php" class="btn">Alterar informações</a>
    
</div>

<footer class="footer">
    <p>&copy; 2024 Frog Tech. Todos os direitos reservados.</p>
</footer>

<script>
    const menuIcon = document.getElementById('menuIcon');
    const sidebar = document.getElementById('sidebarMenu');
    const overlay = document.getElementById('overlay');

    menuIcon.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('show');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });
</script>

</body>
</html>
