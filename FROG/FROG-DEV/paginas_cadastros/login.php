<?php
include("../conexao/conexao2.php");

if (!isset($_SESSION)) {
    session_start();
}


if (isset($_SESSION['email'])) {
    header("Location: ../paginas_iniciais/paginahome.php");
    exit();
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Email inválido";
    } else if (strlen($_POST['password']) == 0) {
        echo "Senha inválida";
    } else {
       
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        
        
        if ($email === 'frogadmin@gmail.com' && $password === 'admin@123') {
            $_SESSION['email'] = $email;
            header("Location: ../pagina_adm/adminhome.php");
            exit();
        }
        
        
        $sql_code = "SELECT * FROM pessoa WHERE email = '$email' AND senha = '$password'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);
        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            $_SESSION['email'] = $email;
            header("Location: ../paginas_iniciais/paginahome.php");
            exit();
        } else {
           echo "Email ou senha inválidos";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frog Tech - Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <header>
        <div class="header">
            <img src="../img/logo2.png" alt="Logo" class="main-logo">
        </div>
    </header>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="">
            <input type="email" placeholder="Email" name="email" required>
            <div class="password-container">
                <input type="password" placeholder="Senha" name="password" id="password" required>
                <span id="togglePassword">🐸</span> 
            </div>
            <button type="submit">Entrar</button>
            <p>Não possui conta? <a href="regis.php">Registrar</a></p>
        </form>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Meu Site. Todos os direitos reservados a Frogtech.</p>
    </footer>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.textContent = type === 'password' ? '🐸' : '👀'; 
        });
    </script>
</body>
</html>


