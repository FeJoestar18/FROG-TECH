<?php
include '../conexao/conexao.php';

// Verifica se o parâmetro 'id' foi fornecido na URL
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
    <link rel="stylesheet" href="../css/loja/produto.css">
</head>
<body>
    <h1><?= htmlspecialchars($produto['nome']) ?></h1>
    <img src="../img/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
    <p><?= htmlspecialchars($produto['descricao']) ?></p>
    <p>Preço: R$<?= number_format($produto['preco'], 2, ',', '.') ?></p>
    <form action="carrinho.php" method="POST">
        <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="1" min="1" max="<?= $produto['estoque'] ?>">
        <button type="submit">Adicionar ao Carrinho</button>
    </form>
</body>
</html>
