<?php
include('../conexao/conexao.php');  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO departamentos (nome, descricao) VALUES ('$nome', '$descricao')";
    
    if ($pdo->query($sql)) {
        echo "<script>alert('Departamento criado com sucesso!'); window.location.href='gerenciar_departamentos.php';</script>";
    } else {
        echo "<script>alert('Erro ao criar departamento.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Departamento</title>
    <link rel="stylesheet" href="../css/cria_departamentos.css">
</head>
<body>
<div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">
        <a onclick="window.history.back();">VOLTAR</a>
        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href="../paginas_iniciais/paginahome.php">PAGINA-HOME</a>
        <a href = "../pagina_adm/usuarios_visualizar.php">USUARIOS</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
       
    </div>

    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>

    </header>
    <h1>Criar Novo Departamento</h1>
    <form method="POST">
        <label for="nome">Nome do Departamento:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <button type="submit">Criar Departamento</button>
    </form>

    <footer>
        <p>&copy; 2024 Loja Frog Tech. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
