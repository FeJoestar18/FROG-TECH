<?php
session_start(); 


if (!isset($_SESSION['email'])) {
    header("Location: ../paginas_cadastros/login.php"); 
    exit();
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #eeeeee;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #4CAF50; 
        }
        p {
            color: #555;
        }
        .btn {
            background-color: #4CAF50; 
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Compra Realizada com Sucesso!</h1>
        <p>Obrigado pela sua compra, <?php echo htmlspecialchars($_SESSION['email']); ?>!</p>
        <p>Seus itens serão enviados em breve.</p>
        <a href="loja.php" class="btn">Voltar à Loja</a>
    </div>
</body>
</html>
