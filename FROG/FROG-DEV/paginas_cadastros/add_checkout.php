<?php
session_start(); 


if (!isset($_SESSION['email'])) {
   
    header('Location: login.php');
    exit();
}

include('../conexao/conexao2.php');


$email = $_SESSION['email'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $pais = $_POST['pais'];
    $ponto_referencia = $_POST['ponto_referencia'];

    
    $sql = "UPDATE pessoa 
            SET telefone = ?, cep = ?, endereco = ?, cidade = ?, pais = ?, ponto_referencia = ? 
            WHERE email = ?"; 
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param("sssssss", $telefone, $cep, $endereco, $cidade, $pais, $ponto_referencia, $email);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "Informações atualizadas com sucesso!";
            
            header('Location: perfil.php');
            exit();
        } else {
            echo "Erro ao atualizar informações: " . $stmt->error;
        }

        
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_checkout.css">
    <title>Frog Tech - Atualizar Informações</title>
    <script src="../js/buscar.js"></script>
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
    <li><a href="../Loja/carrinho.php">Carrinho de Compras</a></li>
    <li><a href="../paginas_cadastros/perfil.php">Voltar para Perfil</a></li>
    <li><a href="../paginas_iniciais/paginahome.php">Pagina-Home</a></li>
    <li><a href="../Loja/loja.php">Loja</a></li>
    <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
    </ul>
</div>

<div class="overlay" id="overlay"></div>
    <h1>Atualizar Informações de Endereço</h1>
    <form method="POST">
        <label for="telefone">Telefone de Contato:</label><br>
        <input type="tel" id="telefone" name="telefone" required><br><br>

        <label for="cep">CEP:</label><br>
        <input type="text" id="cep" name="cep" maxlength="8"  required onblur="buscarCEP()"><br>

        <label for="endereco">Endereço:</label><br>
        <input type="text" id="endereco" name="endereco" required><br>

        <label for="cidade">Cidade:</label><br>
        <input type="text" id="cidade" name="cidade" required><br>

        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais" required><br>

        <label for="ponto_referencia">Ponto de Referência:</label><br>
        <input type="text" id="ponto_referencia" name="ponto_referencia"><br>

        <button type="submit">Salvar Alterações</button>
    </form>
    <footer>
        <p>&copy; 2024 Loja Frog Tech. Todos os direitos reservados.</p>
    </footer>
    <script src="../js/Script.js"></script>
</body>
</html>
