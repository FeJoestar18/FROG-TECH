<?php
session_start();
include '../conexao/conexao.php';


$carrinho = $_SESSION['carrinho'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $cliente_id = 1;
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
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form method="POST">
        <button type="submit">Confirmar Compra</button>
    </form>
</body>
</html>
