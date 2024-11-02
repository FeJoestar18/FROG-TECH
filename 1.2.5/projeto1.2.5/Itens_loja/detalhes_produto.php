<?php
session_start();
include('../conexao/conexao.php');

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtendo o ID do produto da URL
$id = $_GET['id'] ?? null;

// Verifica se o ID do produto está definido
if (!isset($id)) {
    die("Produto não encontrado.");
}

// Prepara e executa a consulta ao banco de dados
$sql = "SELECT nome, preco, imagem, descricao FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se algum produto foi encontrado
if ($result->num_rows === 0) {
    die("Produto não encontrado.");
}

// Obtém os dados do produto
$produto = $result->fetch_assoc();

// Adiciona o produto ao carrinho se a ação for feita
if (isset($_GET['action']) && $_GET['action'] === 'add_to_cart') {
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = []; // Inicializa o carrinho se não existir
    }

    // Verifica se o produto já está no carrinho
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['quantidade'] += 1; // Incrementa a quantidade
    } else {
        $_SESSION['carrinho'][$id] = [
            'nome' => $produto['nome'],
            'preco' => $produto['preco'],
            'quantidade' => 1
        ];
    }

    // Redireciona de volta para a loja ou para a página do produto
    header("Location: ../Itens_loja/carrinho/carrinho.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($produto['nome']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: url('../img/banner.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 180px;
        }

        .produto-detalhe {
            margin: 80px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            max-width: 800px;
        }

        .product-image img {
            max-width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-actions {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .btn-comprar, .btn-voltar {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: bold;
        }

        .btn-comprar:hover, .btn-voltar:hover {
            background-color: #388e3c;
            transform: scale(1.05);
        }

        /* Estilos da sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px; /* Inicialmente fora da tela */
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.05);
            transition: right 0.5s;
            z-index: 1001;
            padding: 20px;
        }

        .sidebar.open {
            right: 0; /* Move para dentro da tela quando aberto */
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

        /* Estilizando o menu */
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin: 15px 0;
        }

        .sidebar a {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../itens_loja/buscar.php">Buscar</a></li>
            <li><a href="../itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="produto-detalhe">
        <h1><?php echo htmlspecialchars($produto['nome']); ?></h1>
        <div class="product-image">
            <img src="../Itens_loja/uploadfotos/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
        </div>
        <p>Preço: R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
        <p><?php echo nl2br(htmlspecialchars($produto['descricao'])); ?></p>
        <div class="product-actions">
            <a href="?id=<?php echo $id; ?>&action=add_to_cart" class="btn-comprar">Adicionar ao Carrinho</a>
            <a href="../itens_loja/botao_comprar.php?id=<?php echo $id; ?>" class="btn-comprar">Comprar</a>
            <a href="../paginas_iniciais/loja.php" class="btn-voltar">Voltar</a>
        </div>
    </div>

    <script>
        const menuIcon = document.getElementById('menuIcon');
        const sidebar = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('overlay');

        menuIcon.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });
    </script>

    <?php
    // Feche a conexão ao final da execução
    $conn->close();
    ?>
</body>
</html>