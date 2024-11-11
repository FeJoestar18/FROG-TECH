<?php
include("../conexao/conexao.php"); // Inclui o arquivo de conexão com o banco

// Certifique-se de que a variável $conn está definida
$sql = "SELECT nome, email, tempo_contrato, endereco, idade, salario, cpf, rg, atividade, carteira_trabalho, turno FROM funcionarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Funcionários Cadastrados</title>
    <link rel="stylesheet" href="../css/paginas_adm/funcionario.css">
</head>
<body>
    <div class="container">
        <h2>Funcionários Cadastrados</h2>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tempo de Contrato</th>
                    <th>Endereço</th>
                    <th>Idade</th>
                    <th>Salário</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Atividade</th>
                    <th>Carteira de Trabalho</th>
                    <th>Turno</th>
                    <th>Ações</th> 
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["tempo_contrato"]; ?></td>
                        <td><?php echo $row["endereco"]; ?></td>
                        <td><?php echo $row["idade"]; ?></td>
                        <td><?php echo "" . number_format($row['salario'], 2, ',', '.'); ?></td> <!-- Correção aqui -->
                        <td><?php echo $row["cpf"]; ?></td>
                        <td><?php echo $row["rg"]; ?></td>
                        <td><?php echo $row["atividade"]; ?></td>
                        <td><?php echo $row["carteira_trabalho"]; ?></td>
                        <td><?php echo $row["turno"]; ?></td>
                        <td>
                          
                            <form method="POST" action="demitir_funcionario.php">
                                <input type="hidden" name="cpf" value="<?php echo $row['cpf']; ?>"> 
                                <button type="submit" class="btn-demitir">Demitir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>Nenhum funcionário encontrado.</p>
            <div class="button-container">
                <a href="cadastro_funcionario.php" class="btn-cadastrar">Cadastrar Novo Funcionário</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
