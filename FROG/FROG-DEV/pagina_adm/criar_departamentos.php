<?php
include('../conexao/conexao.php');  // Altere o caminho de conexão conforme necessário

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
</head>
<body>
    <h1>Criar Novo Departamento</h1>
    <form method="POST">
        <label for="nome">Nome do Departamento:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <button type="submit">Criar Departamento</button>
    </form>
</body>
</html>
