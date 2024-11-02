<?php
session_start();
require_once 'C:\xampp\htdocs\TESTE133\1.2.5\projeto1.2.5\conexao/conexao.php';

// Verifica a conexão ao banco de dados
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para remover um item do carrinho
if (isset($_POST['remover'])) {
    $idRemover = $_POST['id'];
    unset($_SESSION['carrinho'][$idRemover]);
}

// Função para limpar o carrinho
if (isset($_POST['limpar'])) {
    unset($_SESSION['carrinho']);
}

// Função para remover itens selecionados
if (isset($_POST['removerSelecionados']) && isset($_POST['selecionados'])) {
    foreach ($_POST['selecionados'] as $idSelecionado) {
        unset($_SESSION['carrinho'][$idSelecionado]);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        header {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 250px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.05);
            transition: right 0.5s;
            z-index: 1001;
            padding: 20px;
        }
        .sidebar.open {
            right: 0;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 1000;
        }
        .overlay.show {
            display: block;
        }
        .logo img {
            width: 150px;
            margin: 20px 0;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar ul li {
            margin: 20px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 1.1em;
            font-weight: 600;
            display: block;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #4CAF50;
            color: white;
        }
        h1 {
            margin-top: 80px;
            color: #4CAF50;
        }
        .carrinho-item {
            background: #fff;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .carrinho-item img {
            max-width: 80px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .quantidade {
            display: flex;
            align-items: center;
        }
        .quantidade input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .action-button {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
        }
        .action-button img {
            width: 32px;
            height: 32px;
        }
        .total {
            font-size: 1.5em;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }
        .empty-cart {
            text-align: center;
            margin-top: 100px;
            font-size: 1.2em;
            color: #888;
        }
        .empty-cart img {
            width: 150px;
            margin-top: 20px;
        }
        .icon-trash {
            width: 32px;
            height: 32px;
        }
        .icon-trash:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <header>
        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
        <ul>
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../itens_loja/buscar.php">Buscar</a></li>
            <li><a href="../itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <h1>Carrinho de Compras</h1>

    <?php if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
        <form action="" method="POST">
            <div class="actions">
                <div class="action-buttons">
                    <div class="action-button">
                        <img src="/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/tirarcarrinho.png" alt="Limpar Carrinho">
                        <button type="submit" name="limpar" class="btn">
                            Limpar Carrinho
                        </button>
                    </div>
                    <div class="action-button">
                        <img src="/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/cancelarcompra.png" alt="Remover Selecionados">
                        <button type="submit" name="removerSelecionados" class="btn">
                            Remover Selecionados
                        </button>
                    </div>
                </div>
            </div>
            <div id="carrinho">
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['carrinho'] as $id => $item): ?>
                    <div class="carrinho-item">
                        <?php
                        // Verifica se a imagem do produto existe
                        $base_path = "/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/";

                        if (isset($item['imagem']) && !empty($item['imagem'])) {
                            $imagemPath = $base_path . htmlspecialchars($item['imagem']);
                        } else {
                            $imagemPath = $base_path . "default.jpg"; // Usa uma imagem padrão se a imagem não existir
                        }

                        // Verifica se o preço está definido
                        $preco = isset($item['preco']) ? $item['preco'] : 0;
                        
                        // Verifica se o nome está definido
                        $nome = isset($item['nome']) ? htmlspecialchars($item['nome']) : 'Produto sem nome';
                        ?>
                        <div class="produto-info">
                            <input type="checkbox" class="checkbox" name="selecionados[]" value="<?php echo htmlspecialchars($id); ?>">
                            <img src="<?php echo $imagemPath; ?>" alt="<?php echo $nome; ?>">
                            <div>
                                <a href="../itens_loja/produto.php?id=<?php echo htmlspecialchars($id); ?>">
                                    <strong><?php echo $nome; ?></strong>
                                </a>
                                <p>Preço: R$ <?php echo number_format($preco, 2, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="quantidade">
                            <form action="../itens_loja/carrinho/atualizar_carrinho.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                <input type="number" name="quantidade" value="<?php echo isset($item['quantidade']) ? $item['quantidade'] : 1; ?>" min="1" onchange="updateQuantity(this)">
                            </form>
                        </div>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <button type="submit" name="remover" class="btn">
                                <img src="/TESTE133/1.2.5/projeto1.2.5/img/icons/trash.png" alt="Remover" class="icon-trash">
                            </button>
                        </form>
                    </div>
                    <?php
                        $total += $preco * (isset($item['quantidade']) ? $item['quantidade'] : 1);
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></div>
        </form>
        <div class="actions">
            <a href="../paginas_iniciais/loja.php" class="action-button" style="margin-top: 20px;">
                <img src="/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/Screenshot_14.png" alt="Continuar Comprando">
                Continuar Comprando
            </a>
            <form action="../Itens_loja/checkout.php" method="POST" style="margin-top: 10px;">
                <button type="submit" class="action-button">
                    <img src="/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/irparapagamento.png" alt="Finalizar Compra">
                    Finalizar Compra
                </button>
            </form>
        </div>
    <?php else: ?>
        <div class="empty-cart">
            <p>Seu carrinho está vazio.</p>
            <img src="/TESTE133/1.2.5/projeto1.2.5/img/empty_cart.png" alt="Carrinho Vazio">
            <a href="../paginas_iniciais/loja.php" class="btn" style="margin-top: 20px;">
                <img src="/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/Screenshot_14.png" alt="Voltar à Loja">
                Voltar à Loja
            </a>
        </div>
    <?php endif; ?>

    <script>
        // Função para atualizar a quantidade e recalcular o total
        function updateQuantity(input) {
            const form = input.closest('form');
            form.submit();
        }
    </script>
</body>
</html>