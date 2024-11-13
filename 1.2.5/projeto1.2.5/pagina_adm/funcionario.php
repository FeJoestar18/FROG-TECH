<?php
include("../conexao/conexao2.php"); // Inclui o arquivo de conexão com o banco

// Modificar a consulta SQL para incluir o nome do departamento
$sql = "SELECT f.nome, f.email, f.tempo_contrato, f.endereco, f.idade, f.salario, f.cpf, f.rg, f.atividade, f.carteira_trabalho, f.turno, d.nome AS departamento
        FROM funcionarios f
        LEFT JOIN departamentos d ON f.departamento_id = d.id"; // Junção para obter o nome do departamento
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Funcionários Cadastrados</title>
    <link rel="stylesheet" href="../css/funcionari.css">
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
                    <th>Departamento</th> <!-- Nova coluna para o departamento -->
                    <th>Ações</th> 
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["tempo_contrato"]; ?></td>
                        <td><?php echo $row["endereco"]; ?></td>
                        <td><?php echo $row["idade"]; ?></td>
                        <td><?php echo number_format($row['salario'], 2, ',', '.'); ?></td>
                        <td><?php echo $row["cpf"]; ?></td>
                        <td><?php echo $row["rg"]; ?></td>
                        <td><?php echo $row["atividade"]; ?></td>
                        <td><?php echo $row["carteira_trabalho"]; ?></td>
                        <td><?php echo $row["turno"]; ?></td>
                        <td><?php echo $row["departamento"]; ?></td> <!-- Exibição do nome do departamento -->
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
