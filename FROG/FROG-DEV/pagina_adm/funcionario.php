<?php
include("../conexao/conexao2.php"); 

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
    <link href="../css/funcionario.css" rel="stylesheet">
</head>
<body>
<div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">
        <a onclick="window.history.back();">VOLTAR</a>
        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href="../paginas_iniciais/paginahome.php">PAGINA-HOME</a>
        <a href="../pagina_adm/adminhome.php">ADMIN-HOME</a>
        <a href = "../pagina_adm/usuarios_visualizar.php">USUARIOS</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
       
    </div>

    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
    </header>

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
                    <th>Departamento</th> 
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
                        <td><?php echo $row["departamento"]; ?></td> <
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
    <footer>
        <p>&copy; 2024 Loja Frog Tech. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
