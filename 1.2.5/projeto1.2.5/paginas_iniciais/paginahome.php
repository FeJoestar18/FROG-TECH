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

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/paginas_iniciais/paginahome.css">
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

   <!--  AINDA EM DESENVOLVIMENTO, E PENSANDO SE USA OU NÃO 
    <div class="carousel-container">
        <div class="carousel-track">
            <div class="card">
                <h3>Produto 1</h3>
                <p>Descrição breve do produto 1.</p>
                <button onclick="window.location.href='#'">Ir para o produto</button>
            </div>
            <div class="card">
                <h3>Produto 2</h3>
                <p>Descrição breve do produto 2.</p>
                <button onclick="window.location.href='#'">Ir para o produto</button>
            </div>
            <div class="card">
                <h3>Produto 3</h3>
                <p>Descrição breve do produto 3.</p>
                <button onclick="window.location.href='#'">Ir para o produto</button>
            </div>
            <div class="card">
                <h3>Produto 4</h3>
                <p>Descrição breve do produto 4.</p>
                <button onclick="window.location.href='#'">Ir para o produto</button>
            </div>
            <div class="card">
                <h3>Produto 5</h3>
                <p>Descrição breve do produto 4.</p>
                <button onclick="window.location.href='#'">Ir para o produto</button>
            </div>
            <div class="card">
                <h3>Produto 6</h3>
                <p>Descrição breve do produto 4.</p>
                <button onclick="window.location.href='#'">Ir para o produto</button>
            </div>
        </div>

        
        <div class="nav-dots">
            <div class="nav-dot active" data-index="0"></div>
            <div class="nav-dot" data-index="1"></div>
            <div class="nav-dot" data-index="2"></div>
            <div class="nav-dot" data-index="3"></div>
        </div>
    </div>
    -->

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

        const track = document.querySelector('.carousel-track');
        const dots = document.querySelectorAll('.nav-dot');

        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                track.style.transform = `translateX(-${idx * 250}px)`;
                dots.forEach(d => d.classList.remove('active'));
                dot.classList.add('active');
            });
        });
    </script>
</body>
</html>
