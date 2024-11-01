<?php
include("../conexao/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];

    // Remover o funcionário do banco de dados
    $sql = "DELETE FROM funcionarios WHERE cpf = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf); // s para string
    if ($stmt->execute()) {
        // Se a demissão for bem-sucedida, redireciona para a página de cadastro de funcionário
        header("Location: cadastro_funcionario.php");
        exit(); // Termina o script para evitar que o restante do código seja executado
    } else {
        echo "Erro ao demitir funcionário: " . $conn->error;
    }
    
    $stmt->close();
}
$conn->close();
?>
