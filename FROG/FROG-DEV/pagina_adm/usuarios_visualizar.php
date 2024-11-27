<?php

include('../conexao/conexao2.php');


$sql = "SELECT * FROM pessoa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frog Tech - Usuários Registrados</title>
    <link rel="stylesheet" href="../css/estilo_usuarios.css">
</head>
<body>

<div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">
        <a onclick="window.history.back();">VOLTAR</a>
        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href="../paginas_iniciais/paginahome.php">PAGINA-HOME</a>
        <a href="../pagina_adm/adminhome.php">ADMIN-HOME</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
       
    </div>

    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
    </header>
<br><br>
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
<footer>
        <p>&copy; 2024 Loja Frog Tech. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

<?php

$conn->close();
?>
