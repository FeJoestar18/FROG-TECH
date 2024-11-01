
<?php
include("../conexao/conexao.php");

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
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $sql_code = "SELECT * FROM pessoa WHERE email = '$email' AND senha = '$password'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            $_SESSION['email'] = $email;
            header("Location: ../paginas_iniciais/paginahome.php");
            exit();
        } else {
            echo "Email ou senha inválidos.";
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
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #eeeeee;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 1;
            padding: 10px 0;
        }

        .header img.main-logo {
            width: 420px; 
        }

        .login-container {
            background-color: #ffffff;
            margin: auto; /* centraliza verticalmente */
            padding: 30px 50px;
            border-radius: 20px;
            color: black;
            text-align: center;
            width: 350px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
        }

        input {
            padding: 15px;
            border-radius: 50px;
            outline: none;
            font-size: 15px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding-left: 40px;
            position: relative;
        }

        input[type="email"]::before {
            content: '\1F4E7'; 
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #555;
        }

        input[type="password"]::before {
            content: '\1F512'; 
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #555;
        }

        .password-container {
            position: relative;
        }

        #togglePassword {
            position: absolute;
            right: 10px;
            top: 35%; /* Mover um pouco mais para cima */
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px; /* Tamanho do ícone */
            color: #555; /* Cor do ícone */
        }

        button {
            background-color: #0a74059f;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 50px;
            color: white;
            font-size: 15px;
            transition: all 0.8s;
        }

        button:hover {
            background-color: #950000;
            cursor: pointer;
        }

        .footer {
            width: 100%;
            position: fixed; /* Para mantê-lo sempre na parte inferior */
            bottom: 0;
            color: black;
            text-align: center; /* Centraliza o texto dentro do footer */
            padding: 10px 0;
        }

        .footer p {
            margin: 0; /* Remove a margem padrão para o parágrafo */
        }

        a {
            color: #0a74059f;
        }

        a:hover {
            text-decoration: underline;
            color: red;
            transition: all 0.8s; 
        }
    </style>
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
                <span id="togglePassword">🐸</span> <!-- Sapo como ícone -->
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
            togglePassword.textContent = type === 'password' ? '🐸' : '👀'; // Sapo ou olho aberto
        });
    </script>
</body>
</html>
