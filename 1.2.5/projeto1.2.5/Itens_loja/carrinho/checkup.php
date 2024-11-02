<?php
session_start();
require_once 'C:\xampp\htdocs\TESTE133\1.2.5\projeto1.2.5\conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_SESSION['carrinho'] as $id => $item) {
        $quantidadeComprada = $item['quantidade'];
        $stmt = $conn->prepare("UPDATE estoque SET quantidade = quantidade - ? WHERE produto_id = ?");
        $stmt->bind_param("ii", $quantidadeComprada, $id);
        $stmt->execute();
    }

    // Limpar o carrinho após a compra
    unset($_SESSION['carrinho']);
    echo "Compra finalizada com sucesso!";
    // Redirecionar ou mostrar uma mensagem
}
?>