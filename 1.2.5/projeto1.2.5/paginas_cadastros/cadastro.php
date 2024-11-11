<?php
session_start(); 

include "../conexao/conexao.php"; 

if (isset($_SESSION['email'])) {
    header("Location: ../paginas_iniciais/paginahome.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['CPF'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $CPF = $_POST['CPF'];

       
        $sql1 = "INSERT INTO `pessoa` (`nome`, `email`, `senha`, `CPF`) 
                 VALUES (?, ?, ?, ?)";
        
     
        if ($stmt = $conn->prepare($sql1)) {  
            $stmt->bind_param("ssss", $nome, $email, $senha, $CPF);
            
            if ($stmt->execute()) {
                $_SESSION['email'] = $email; // Armazena o email na sessão
                header("Location: ../paginas_iniciais/paginahome.php");
                exit();
            } else {
                mensagem("$nome não foi cadastrado! Erro: " . $stmt->error, 'danger');
            }
            
            $stmt->close();
        } else {
            mensagem("Erro na preparação da consulta: " . $conn->error, 'danger'); // Usando $conn
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="text" name="CPF" placeholder="CPF" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
