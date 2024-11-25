<?php
include '../conexao/conexao.php';


if (!isset($_GET['id'])) {
    die("ID do produto não especificado.");
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch();

if (!$produto) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($produto['nome']) ?></title>
    <link rel="stylesheet" href="../css/Produto.css">
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
    <li><a href="../paginas_cadastros/Perfil.php">Perfil de Usuário</a></li>
        <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
      <li><a href="../loja/loja.php">Loja</a></li>
        <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
    </ul>
</div>

<div class="overlay" id="overlay"></div>

<div class="produto-card">
    <img src="../img/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
    <div class="produto-info">
        <h1><?= htmlspecialchars($produto['nome']) ?></h1>
        <p><?= htmlspecialchars($produto['descricao']) ?></p>
        <p class="preco">Preço: R$<?= number_format($produto['preco'], 2, ',', '.') ?></p>
        
        <form action="carrinho.php" method="POST">
            <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
            <label>Quantidade:</label>
            <input type="number" name="quantidade" value="1" min="1" max="<?= $produto['estoque'] ?>">
            <button type="submit">Adicionar ao Carrinho</button>
        </form>
        
        <div class="btn-container">
    <a href="../loja/loja.php" class="btn-voltar">Voltar à Loja</a>
    <a href="../loja/checkout.php" class="btn-comprar">Comprar</a>
</div>

    </div>
</div>

<footer>
    <p>&copy; 2023 Frog Tech. Todos os direitos reservados.</p>
</footer>

<script src="../js/Script.js"></script>
</body>
</html>
