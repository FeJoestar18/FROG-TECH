<?php
include("../conexao/conexao2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];

  
    $sql = "DELETE FROM funcionarios WHERE cpf = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf); 
    if ($stmt->execute()) {
        
        header("Location: cadastro_funcionario.php");
        exit(); 
    } else {
        echo "Erro ao demitir funcionário: " . $conn->error;
    }
    
    $stmt->close();
}
$conn->close();
?>
