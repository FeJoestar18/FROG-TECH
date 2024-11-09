
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
    <title>Carrinho</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <?php foreach ($carrinho as $produto_id => $quantidade): ?>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$produto_id]);
        $produto = $stmt->fetch();
        ?>
        <p><?= htmlspecialchars($produto['nome']) ?> - Quantidade: <?= $quantidade ?> - Total: R$<?= number_format($produto['preco'] * $quantidade, 2, ',', '.') ?></p>
    <?php endforeach; ?>
    <a href="checkout.php">Finalizar Compra</a>
</body>
</html>
