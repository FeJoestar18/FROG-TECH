
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
    <title>Loja Online</title>
</head>
<body>
    <h1>Loja de Produtos Tech</h1>
    <form method="GET">
        <input type="text" name="termo" placeholder="Buscar produto...">
        <button type="submit">Buscar</button>
    </form>
    
    <div class="produtos">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <h2><?= htmlspecialchars($produto['nome']) ?></h2>
                <img src="../img/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
                <p>Preço: R$<?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <a href="produto.php?id=<?= $produto['id'] ?>">Ver detalhes</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
