<?php
// Inclui o arquivo de conexão
include('../conexao/conexao.php');

// Consulta SQL para buscar os dados dos usuários registrados
$sql = "SELECT * FROM pessoa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Registrados</title>
    <style>
        
    </style>
</head>
<body>

<header>
    
</header>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Senha</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Exibe os dados de cada usuário
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>"; 
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['cpf'] . "</td>";
                echo "<td>" . $row['senha'] . "</td>";
                echo "<td>" . $row['telefone'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum usuário registrado</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
// Fecha a conexão com o banco de dados
$conn->close();
?>
