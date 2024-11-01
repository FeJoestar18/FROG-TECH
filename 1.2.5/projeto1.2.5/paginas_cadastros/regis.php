<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frog Tech - Registro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #eeeeee;
        }

        .header {
            position: absolute;
            top: -5px; /* Ajuste de 10px para 5px para mover a logo mais para cima */
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 1;
        }

        .header img.main-logo {
            width: 420px; /* Ajuste do tamanho da logo para manter padrão */
        }

        .login-container {
            background-color: #ffffff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .input-container input {
            padding: 15px;
            padding-left: 40px; /* Espaço para o ícone */
            border-radius: 50px;
            outline: none;
            font-size: 15px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
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

        footer {
            background-color: rgba(0, 71, 15, 0);
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
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
    <?php
    session_start(); // Inicia a sessão

    // Verifica se o usuário já está logado
    if (isset($_SESSION['email'])) {
        header("Location: ../paginas_iniciais/paginahome.php"); // Redireciona para a página inicial
        exit(); // Encerra o script para evitar que o resto da página seja carregado
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
                <input type="tel" placeholder="Telefone" name="telefone" required maxlength="11" pattern="\d{11}">
            </div>
            <div class="input-container">
                <input type="password" placeholder="Senha" name="senha" required pattern="(?=.*\d)(?=.*[@]).{8,}" title="A senha deve ter pelo menos 8 caracteres, incluir um número e um símbolo @.">
            </div>
            <div class="input-container"> 
                <input type="text" placeholder="CPF" name="CPF" required maxlength="11" pattern="\d{11}">
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Frog Tech. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
