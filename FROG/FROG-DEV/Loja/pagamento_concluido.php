<?php
session_start();
include '../conexao/conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Obtém o email do usuário logado da sessão
$email = $_SESSION['email'];

// Recupera os dados do endereço do usuário
$stmt = $pdo->prepare("SELECT telefone, cep, endereco, cidade, pais, ponto_referencia FROM pessoa WHERE email = ?");
$stmt->execute([$email]);
$dados_usuario = $stmt->fetch();

if (!$dados_usuario) {
    echo "Dados de endereço não encontrados. Por favor, registre seu endereço.";
    exit();
}

// Carrega o carrinho da sessão
$carrinho = $_SESSION['carrinho'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Inicia o processo de venda
    $cliente_id = 1; // Suponha que o cliente_id seja recuperado conforme necessário
    $total = 0;

    $pdo->beginTransaction();

    try {
        // Loop pelos produtos no carrinho
        foreach ($carrinho as $produto_id => $quantidade) {
            $stmt = $pdo->prepare("SELECT preco, estoque FROM produtos WHERE id = ?");
            $stmt->execute([$produto_id]);
            $produto = $stmt->fetch();

            $subtotal = $produto['preco'] * $quantidade;
            $total += $subtotal;

            // Verifica e reduz o estoque
            if ($produto['estoque'] >= $quantidade) {
                $stmt = $pdo->prepare("UPDATE produtos SET estoque = estoque - ? WHERE id = ?");
                $stmt->execute([$quantidade, $produto_id]);
            } else {
                throw new Exception("Estoque insuficiente para o produto ID $produto_id.");
            }

            // Registra a venda
            $stmt = $pdo->prepare("INSERT INTO vendas (produto_id, quantidade) VALUES (?, ?)");
            $stmt->execute([$produto_id, $quantidade]);
        }

        // Registra o pedido
        $stmt = $pdo->prepare("INSERT INTO pedidos (cliente_id, total, status) VALUES (?, ?, 'Realizado')");
        $stmt->execute([$cliente_id, $total]);

        unset($_SESSION['carrinho']);
        $pdo->commit();

        // Redireciona para a página de pagamento concluído
        header("Location: pagamento.php");
        exit;

    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Erro ao processar a compra: " . $e->getMessage();
    }
}
?>
