<?php
session_start();
include '../conexao/conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    // Redireciona para a página de login se não estiver logado
    header('Location: login.php');
    exit();
}

// Obtém o email do usuário logado da sessão
$email = $_SESSION['email'];

// Recupera os dados do endereço do usuário
$stmt = $pdo->prepare("SELECT telefone, cep, endereco, cidade, pais, ponto_referencia FROM pessoa WHERE email = ?");
$stmt->execute([$email]);
$dados_usuario = $stmt->fetch();

// Caso o usuário não tenha dados de endereço registrados, exibe uma mensagem
if (!$dados_usuario) {
    echo "Dados de endereço não encontrados. Por favor, registre seu endereço.";
    exit();
}

// Carrega o carrinho da sessão
$carrinho = $_SESSION['carrinho'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = 1; // Exemplo, substitua pelo ID real do cliente
    $total = 0;

    $pdo->beginTransaction();

    try {
        foreach ($carrinho as $produto_id => $quantidade) {
            $stmt = $pdo->prepare("SELECT preco, estoque FROM produtos WHERE id = ?");
            $stmt->execute([$produto_id]);
            $produto = $stmt->fetch();

            $subtotal = $produto['preco'] * $quantidade;
            $total += $subtotal;

            if ($produto['estoque'] >= $quantidade) {
                $stmt = $pdo->prepare("UPDATE produtos SET estoque = estoque - ? WHERE id = ?");
                $stmt->execute([$quantidade, $produto_id]);
            } else {
                throw new Exception("Estoque insuficiente para o produto ID $produto_id.");
            }

            $stmt = $pdo->prepare("INSERT INTO vendas (produto_id, quantidade) VALUES (?, ?)");
            $stmt->execute([$produto_id, $quantidade]);
        }

        $stmt = $pdo->prepare("INSERT INTO pedidos (cliente_id, total, status) VALUES (?, ?, 'Pendente')");
        $stmt->execute([$cliente_id, $total]);

        unset($_SESSION['carrinho']);
        $pdo->commit();

        header("Location: pagamento_concluido.php");
        exit;

    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Erro ao processar a compra: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Frog Tech</title>
    <link rel="stylesheet" href="../css/Check-out.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="../img/logo2.png" alt="Frog Tech Logo">
    </div>
</header>
<br><br>

<!-- <h1>Checkout</h1> -->
<br><br><br>
<div class="checkout-info">
<p><strong>Telefone:</strong> <?= htmlspecialchars($dados_usuario['telefone']) ?></p>
<p><strong>CEP:</strong> <?= htmlspecialchars($dados_usuario['cep']) ?></p>
<p><strong>Endereço:</strong> <?= htmlspecialchars($dados_usuario['endereco']) ?></p>
<p><strong>Cidade:</strong> <?= htmlspecialchars($dados_usuario['cidade']) ?></p>
<p><strong>País:</strong> <?= htmlspecialchars($dados_usuario['pais']) ?></p>
<p><strong>Ponto de Referência:</strong> <?= htmlspecialchars($dados_usuario['ponto_referencia']) ?></p>
<br>
</div>


<form action="../paginas_cadastros/add_checkout.php" method="get">
    <button type="submit">Alterar Dados de Endereço</button>
    <br><br>
    <a href="../Loja/pagamento_concluido.php">
    <button type="button">Ir para Pagamento</button>
</a>
</form>

<script src="../js/Script.js"></script>

<footer>
    <p>&copy; 2023 Frog Tech. Todos os direitos reservados.</p>
</footer>
</body>
</html>
