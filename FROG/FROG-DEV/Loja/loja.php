<?php
include '../conexao/conexao.php';

$termo = $_GET['termo'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE ?");
$stmt->execute(["%$termo%"]);
$produtos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja - Frog Tech</title>
   <style> 

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background-color: #fafafa;
    color: #333;
    line-height: 1.6;
}

 Header 
header {
    background-color: #fff;
    padding: 15px;
    
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


footer {
    background-color: white;
    color: black;
    padding: 20px;
    text-align: center;
    width: 100%;
    bottom: 0;
}

.footer-content p {
    margin: 0;
    font-size: 1rem;
}


.produtos {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.produto {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 200px;
    padding: 15px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.produto:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}


.produto a {
    display: inline-block;
    color: #4CAF50;
    font-weight: bold;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 5px;
    border: 1px solid #4CAF50;
    transition: background-color 0.2s, color 0.2s;
}

.produto a:hover {
    background-color: #4CAF50;
    color: white;
}

 
h1 {
    font-size: 2.5em;
    color: #2d2d2d;
    margin-bottom: 20px;
    text-align: center;
}

form {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
}

input[type="text"] {
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ddd;
    border-radius: 5px 0 0 5px;
    outline: none;
    width: 200px;
}

button[type="submit"] {
    padding: 10px 20px;
    font-size: 1em;
    border: none;
    border-radius: 0 5px 5px 0;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #45a049;
}




    </style>
</head>
<body>

<header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
       
        </div>
        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
            <li><a href="../loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/Perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    
<br><br>
    <h1>Loja de Produtos Tech</h1>
    <form method="GET">
        <input type="text" name="termo" placeholder="Buscar produto...">
        <button type="submit">Buscar</button>
    </form>


    
    <div class="produtos">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto" onclick="window.location.href='produto.php?id=<?= $produto['id'] ?>'">
                <h2><?= htmlspecialchars($produto['nome']) ?></h2>
                <img src="../img/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
                <p>Preço: R$<?= number_format($produto['preco'], 2, ',', '.') ?></p>
            </div>
        <?php endforeach; 
        ?>
    </div>
    <footer>
        <p>&copy; 2023 Frog Tech. Todos os direitos reservados.</p>
    </footer>
    <script src="../js/Script.js"></script>
</body>
</html>
