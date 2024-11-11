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
    <link rel="stylesheet" href="../css/loja/carrinho.css">
</head>
<body>
    <h1>Carrinho de Compras</h1>
    
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

    <script>
       
        window.onload = function() {
            const modal = document.getElementById("modal");
            if (modal) {
                modal.style.display = "flex";
            }
        }

      
        function voltarPagina() {
            document.getElementById("modal").style.display = "none";
            history.back();
        }
    </script>
</body>
</html>
