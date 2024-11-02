<?php
session_start();
require_once 'C:\xampp\htdocs\TESTE133\1.2.5\projeto1.2.5\conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $novaQuantidade = $_POST['quantidade'];

    // Verificar a quantidade disponível no estoque
    $stmt = $conn->prepare("SELECT quantidade FROM estoque WHERE produto_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado && $novaQuantidade <= $resultado['quantidade']) {
        // Atualizar o carrinho
        $_SESSION['carrinho'][$id]['quantidade'] = $novaQuantidade;
        echo json_encode(["status" => "success", "message" => "Carrinho atualizado com sucesso!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Quantidade solicitada não disponível no estoque."]);
    }
}