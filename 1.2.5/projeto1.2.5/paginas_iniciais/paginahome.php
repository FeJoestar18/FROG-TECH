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
    <style>
        /* Estilos Globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #fafafa;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #fff;
            padding: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 180px;
            height: auto;
        }

        .menu-icon {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .bar {
            height: 3px;
            width: 100%;
            background-color: #333;
            border-radius: 5px;
            transition: 0.3s;
        }

        .titulo {
    margin-top: 65px; /* Reduzindo o espaçamento superior */
    text-align: center;
    padding: 20px;
    padding-bottom: 0px;
}


        .titulo h1 {
            color: #333;
            font-size: 3rem;
            font-weight: 600;
        }

        .titulo h3 {
            margin-top: 10px;
            color: #666;
            font-size: 1.5rem;
            font-weight: 300;
        }

        .shop-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .shop-btn:hover {
            background-color: #388e3c;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.05);
            transition: 0.5s;
            z-index: 1001;
        }

        .sidebar.open {
            right: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 20px;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 0;
            border-bottom: 1px solid #e1e1e1;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .sidebar ul li a.logout {
            color: #4CAF50;
        }

        .sidebar ul li a:hover {
            color: #ff0000;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 1000;
        }

        .overlay.show {
            display: block;
        }

        /* Estilo do Carrossel */
        .carousel-container {
            position: relative;
            width: 80%;
            overflow: hidden;
            max-width: 800px;
            margin: 40px auto 0;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .card {
            min-width: 250px;
            height: 250px;
            margin: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            text-align: center;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .card:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .card button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #555;
        }

        .nav-dots {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .nav-dot {
            width: 12px;
            height: 12px;
            margin: 0 5px;
            background-color: #333;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .nav-dot.active {
            background-color: #555;
            transform: scale(1.2);
        }

        .nav-dot:hover {
            background-color: #777;
        }
    </style>
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
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/Perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="titulo">
        <h1>Bem-vindo à Frog Tech</h1>
        <h3>Seu e-commerce de tecnologia</h3>
        <a href="../paginas_iniciais/loja.php" class="shop-btn">Ir às Compras</a>
    </div>

    <!-- Carrossel -->
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

        <!-- Bolinhas de Navegação -->
        <div class="nav-dots">
            <div class="nav-dot active" data-index="0"></div>
            <div class="nav-dot" data-index="1"></div>
            <div class="nav-dot" data-index="2"></div>
            <div class="nav-dot" data-index="3"></div>
        </div>
    </div>

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
