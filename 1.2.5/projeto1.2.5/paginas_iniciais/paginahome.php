<?php
session_start();
include ('../conexao/conexao.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frog Tech - Home</title>

    
    <link rel="stylesheet" href="../css/paginahome.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="../Loja/loja.php">Loja</a></li>
            <li><a href="../loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/Perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="titulo">
        <h1>Bem-vindo à Frog Tech</h1>
        <h3>Seu e-commerce de tecnologia</h3>
        <a href="../loja/loja.php" class="shop-btn">Ir às Compras</a>
    </div>

   

    <footer>
        <p>&copy; 2023 Frog Tech. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/Nav-bar.js"></script>
</body>
</html>
