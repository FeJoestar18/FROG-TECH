<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administração</title>
    <link rel="stylesheet" href="../css/paginas_adm/adminhome.css">
    
</head>
<body>
    <div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">
        <a href="../paginas_iniciais/paginahome.php">PAGINA HOME</a>
        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href = "../pagina_adm/usuarios_visualizar.php">USUARIOS</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
       
    </div>

    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
    </header>
    <div class="container">
        <main class="content">
            <div class="row">
                <div class="card spaced-card">
                    <h3>Registro de Funcionários</h3>
                    <p>Gerencie o registro de novos funcionários.</p>
                    <span class="acessar" onclick="location.href='../pagina_adm/cadastro_funcionario.php'">Acessar</span>
                </div>
                <div class="card">
                    <h3>Acesso aos Produtos</h3>
                    <p>Controle de estoque e venda de produtos.</p>
                    <span class="acessar" onclick="location.href='controle_saida.php'">Acessar</span>
                </div>
            </div>
            <div class="row">
                <div class="card spaced-card">
                    <h3>Gerenciamento de departamentos</h3>
                    <p>Departamentos Frog Tech</p>
                    <span class="acessar" onclick="location.href='departamento.php'">Acessar</span>
                </div>
                <div class="card">
                    <h3>Adicionar Produtos</h3>
                    <p>Adicionar Produtos a Loja</p>
                    <span class="acessar" onclick="location.href='adicionar_produto.php'">Acessar</span>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy; 2024 Loja Frog Tech. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
