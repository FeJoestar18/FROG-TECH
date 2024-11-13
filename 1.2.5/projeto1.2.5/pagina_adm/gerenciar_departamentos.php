<?php
include('../conexao/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['funcionario_id'])) {
    $funcionario_id = $_POST['funcionario_id'];
    $departamento_id = $_POST['departamento_id'];

    $sql = "UPDATE funcionarios SET departamento_id = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$departamento_id, $funcionario_id]);

    echo "<script>alert('Funcionário alocado ao departamento com sucesso!'); window.location.href='gerenciar_departamentos.php';</script>";
}

$departamentos = $pdo->query("SELECT * FROM departamentos")->fetchAll();
$funcionarios = $pdo->query("SELECT * FROM funcionarios")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Departamentos</title>
</head>
<body>
    <h1>Gerenciar Departamentos</h1>

    <h2>Departamentos</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($departamentos as $departamento): ?>
            <tr>
                <td><?php echo $departamento['nome']; ?></td>
                <td><?php echo $departamento['descricao']; ?></td>
                <td>
                    <form method="POST">
                        <label for="funcionario_id">Funcionário:</label>
                        <select name="funcionario_id" required>
                            <option value="">Selecione um funcionário</option>
                            <?php foreach ($funcionarios as $funcionario): ?>
                                <option value="<?php echo $funcionario['id']; ?>"><?php echo $funcionario['nome']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="departamento_id" value="<?php echo $departamento['id']; ?>">
                        <button type="submit">Alocar Funcionário</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
