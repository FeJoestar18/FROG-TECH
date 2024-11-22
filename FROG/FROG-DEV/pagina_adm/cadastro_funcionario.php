<?php
include('../conexao/conexao2.php'); 

// Recuperar os departamentos do banco de dados
$departamentos_sql = "SELECT id, nome FROM departamentos";
$departamentos_result = $conn->query($departamentos_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tempo_contrato = $_POST['tempo_contrato'];
    $unidade_tempo = $_POST['unidade_tempo'];
    $endereco = $_POST['endereco'];
    $idade = $_POST['idade'];
    $salario = $_POST['salario'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $carteira_trabalho = $_POST['carteira_trabalho'];
    $turno = $_POST['turno'];
    $departamento_id = $_POST['departamento_id']; // Novo campo para o departamento

    // Inserção do novo funcionário, incluindo o departamento
    $sql = "INSERT INTO funcionarios (nome, email, tempo_contrato, unidade_tempo, endereco, idade, salario, cpf, rg, carteira_trabalho, turno, departamento_id)
            VALUES ('$nome', '$email', '$tempo_contrato', '$unidade_tempo', '$endereco', '$idade', '$salario', '$cpf', '$rg', '$carteira_trabalho', '$turno', '$departamento_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: funcionario.php");
        echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar funcionário: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>
    <link rel="stylesheet" href="../css/cast_funcionario.css">
</head>
<body>
<div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">

        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href="../pagina_adm/adminhome.php">HOME-ADMIM</a>
        <a href="../paginas_iniciais/paginahome.php">PAGINA-HOME</a>
        <a href = "../pagina_adm/usuarios_visualizar.php">USUARIOS</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
       
    </div>

    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
    </header>

    <div class="card">
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Digite seu Email" pattern=".+@.+\..+" title="Por favor, insira um email válido (ex: usuario@exemplo.com)">

            <label for="tempo_contrato">Tempo de Contrato:</label>
            <input type="number" id="tempo_contrato" name="tempo_contrato" required min="1" placeholder="Digite o tempo">
            
            <select id="unidade_tempo" name="unidade_tempo" required>
                <option value="meses">Meses</option>
                <option value="anos">Anos</option>
            </select>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço">

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required min="18" placeholder="Digite sua idade">

            <label for="salario">Salário:</label>
            <input type="number" id="salario" name="salario" required min="0" step="0.01" placeholder="Ex: 1500.00" title="Insira o salário (valor mínimo: R$ 0,00)">

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" maxlength="14" required placeholder="000.000.000-00" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: 000.000.000-00">

            <label for="rg">RG:</label>
            <input type="text" id="rg" name="rg" maxlength="12" required placeholder="00.000.000-0" pattern="\d{2}\.\d{3}\.\d{3}-\d" title="Formato: 00.000.000-0">

            <label for="turno">Turno:</label>
            <select id="turno" name="turno" required>
                <option value="">Selecione um turno</option>
                <option value="matutino">Matutino</option>
                <option value="noturno">Noturno</option>
            </select>

            <label for="carteira_trabalho">Carteira de Trabalho:</label>
            <input type="text" id="carteira_trabalho" name="carteira_trabalho" maxlength="12" required placeholder="000.00000.00" pattern="\d{3}\.\d{5}\.\d{2}" title="Formato: 000.00000.00">

            <!-- Novo campo para selecionar o departamento -->
            <label for="departamento_id">Departamento:</label>
            <select id="departamento_id" name="departamento_id" required>
                <option value="">Selecione um departamento</option>
                <?php while ($departamento = $departamentos_result->fetch_assoc()): ?>
                    <option value="<?php echo $departamento['id']; ?>"><?php echo $departamento['nome']; ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit">Cadastrar Funcionário</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Frog Tech. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
