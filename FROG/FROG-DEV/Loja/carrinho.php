<?php
session_start();
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];
    $_SESSION['carrinho'][$produto_id] = $quantidade;
}

$carrinho = $_SESSION['carrinho'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Frog Tech - Carrinho</title>
    <link rel="stylesheet" href="../css/Carrinho.css">
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

  <br>
   <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
            <li><a href="../loja/loja.php">Loja</a></li>
            <li><a href="../paginas_cadastros/Perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <h1>Carrinho de Compras</h1>
    <br>
    <?php if (empty($carrinho)): ?>
        
        <div class="modal" id="modal">
            <div class="modal-content">
                <h2>Seu carrinho está vazio!</h2>
                <p>Adicione produtos ao seu carrinho para continuar.</p>
                <button onclick="voltarPagina()">Ok</button>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($carrinho as $produto_id => $quantidade): ?>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
            $stmt->execute([$produto_id]);
            $produto = $stmt->fetch();
            ?>
            <div class="carrinho-item">
                <p><?= htmlspecialchars($produto['nome']) ?> - Quantidade: <?= $quantidade ?> - Total: R$<?= number_format($produto['preco'] * $quantidade, 2, ',', '.') ?></p>
            </div>
        <?php endforeach; ?>
        <a href="checkout.php">Finalizar Compra</a>
    <?php endif; ?>

    <script src="../js/Script.js"></script>
   
    
</body>
</html>
