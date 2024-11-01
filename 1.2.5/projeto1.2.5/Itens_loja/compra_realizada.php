<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centraliza horizontalmente o conteúdo do body */
            justify-content: flex-start; /* Manter a logo no topo */
            height: 100vh; /* Garantir que o body ocupe toda a altura da tela */
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white;
            overflow: hidden; /* Impede a rolagem da página */
        }

        header {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px 100px; /* Reduzir o padding superior */
            background-color: #fff;
            padding-top: 20px;
        }

        .logo img {
            width: 350px; /* Tamanho ajustado */
            height: auto;
            max-width: 100%;
        }

        /* Estilo do container */
        .container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px 0; /* Margin para espaçamento acima e abaixo */
            width: 100%; /* Para ocupar toda a largura */
            max-width: 600px; /* Limitar a largura máxima se desejar */
            position: relative; /* Manter a posição relativa para se adaptar ao footer */
        }

        h2 {
            color: #4CAF50;
        }

        p {
            margin: 20px 0;
            font-size: 1.2em;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* Estilo do footer e sua centralização */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #fff;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>

<!-- Header com logo centralizada -->
<header>
    <div class="logo">
        <img src="../img/logo2.png" alt="Frog Tech Logo">
    </div>
</header>

<!-- Container da mensagem de compra -->
<div class="container">
    <h2>Compra Realizada com Sucesso!</h2>
    <p>Obrigado por comprar conosco! Sua compra foi concluída e você receberá um e-mail de confirmação em breve.</p>
    <a href="../paginas_iniciais/loja.php" class="button">Voltar à Loja</a>
</div>

<!-- Footer centralizado -->
<footer>
    <p>&copy; 2024 Frog Tech. Todos os direitos reservados.</p>
</footer>

</body>
</html>
