<?php
session_start();
include '../conexao/conexao.php';

// Verifica se o carrinho contém itens
$carrinho = $_SESSION['carrinho'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Exemplo de ID de cliente
    $cliente_id = 1;
    $total = 0;

    // Inicia a transação
    $pdo->beginTransaction();
    
    try {
        // Calcula o total do pedido e reduz o estoque
        foreach ($carrinho as $produto_id => $quantidade) {
            // Obtém o preço do produto
            $stmt = $pdo->prepare("SELECT preco, estoque FROM produtos WHERE id = ?");
            $stmt->execute([$produto_id]);
            $produto = $stmt->fetch();

            // Calcula o subtotal
            $subtotal = $produto['preco'] * $quantidade;
            $total += $subtotal;

            // Atualiza o estoque
            if ($produto['estoque'] >= $quantidade) {
                $stmt = $pdo->prepare("UPDATE produtos SET estoque = estoque - ? WHERE id = ?");
                $stmt->execute([$quantidade, $produto_id]);
            } else {
                throw new Exception("Estoque insuficiente para o produto ID $produto_id.");
            }

            // Registra a venda na tabela `vendas`
            $stmt = $pdo->prepare("INSERT INTO vendas (produto_id, quantidade) VALUES (?, ?)");
            $stmt->execute([$produto_id, $quantidade]);
        }

        // Cria um registro de pedido
        $stmt = $pdo->prepare("INSERT INTO pedidos (cliente_id, total, status) VALUES (?, ?, 'Pendente')");
        $stmt->execute([$cliente_id, $total]);

        // Limpa o carrinho
        unset($_SESSION['carrinho']);

        // Confirma a transação
        $pdo->commit();

        // Redireciona para a página de pagamento concluído
        header("Location: pagamento_concluido.php");
        exit;
        
    } catch (Exception $e) {
        // Reverte a transação em caso de erro
        $pdo->rollBack();
        echo "Erro ao processar a compra: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form method="POST">
        <button type="submit">Confirmar Compra</button>
    </form>
</body>
</html>
