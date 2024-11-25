<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frog Tech - Registro</title>
   <link rel="stylesheet" href="../css/regis.css">
</head>
<body>
    <?php
    session_start(); 
    if (isset($_SESSION['email'])) {
        header("Location: ../paginas_iniciais/paginahome.php"); 
        exit(); 
    }
    ?>

    <header>
        <div class="header">
            <img src="../img/logo2.png" alt="Logo" class="main-logo">
        </div>
    </header>
    
    <div class="login-container">
        <h1>Registrar</h1>
        <form action="../paginas_cadastros/cadastro.php" method="POST">
            <div class="input-container">              
                <input type="text" placeholder="Nome" name="nome" required>
            </div>
            <div class="input-container">              
                <input type="email" placeholder="Email" name="email" required pattern=".+@.+\..+" title="O e-mail deve conter @ e um domínio.">
            </div>
            
            <div class="input-container">
                <input type="password" placeholder="Senha" name="senha" required pattern="(?=.*\d)(?=.*[@]).{8,}" title="A senha deve ter pelo menos 8 caracteres, incluir um número e um símbolo @.">
            </div>
            <div class="input-container">
                <input type="text" placeholder="CPF" name="CPF" required maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                </div>


            <button type="submit">Registrar</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Frog Tech. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
