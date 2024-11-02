<?php
// Inclua o arquivo de conexão com o banco de dados
include('../conexao/conexao.php');

// Certifique-se de que a conexão está ativa
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obter categorias para o dropdown
$sql_categorias = "SELECT * FROM categoria";
$result_categorias = $conn->query($sql_categorias);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Produtos - Frog Tech</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #fafafa;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #fff;
            padding: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 180px;
            height: auto;
        }

        .menu-icon {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .bar {
            height: 3px;
            width: 100%;
            background-color: #333;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: -250px; /* Escondido inicialmente */
            width: 250px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.3);
            transition: right 0.3s ease;
            padding-top: 60px; /* Para não ficar atrás do header */
            z-index: 999;
        }

        .sidebar.open {
            right: 0; /* Mover para a direita quando aberto */
        }

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

        .produtos {
            margin-top: 100px; /* Para não ficar atrás do header */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centraliza os itens no contêiner */
        }

        .search-container {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center; /* Alinha verticalmente ao centro */
            flex-wrap: wrap; /* Permite que os itens se movam para a próxima linha */
        }

        .search-container input,
        .search-container select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
            width: 250px; /* Largura fixa para os campos de entrada */
            max-width: 100%; /* Garante responsividade */
        }

        .search-container button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-container button:hover {
            background-color: #388e3c;
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            max-width: 1200px; /* Limita a largura máxima para centralizar o conteúdo */
            width: 100%; /* Garante que o contêiner use toda a largura disponível */
        }

        .produto {
            background: white;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            width: 200px;
        }

        .produto img {
            max-width: 100%;
            height: auto;
        }

        .btn-comprar {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-comprar:hover {
            background-color: #388e3c;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px; /* Reduzir a largura do sidebar em telas menores */
            }
            .produtos {
                margin-left: 0; /* Remove o espaço para o sidebar em telas menores */
            }
            .search-container {
                flex-direction: column;
                align-items: center;
            }
            .search-container input,
            .search-container select {
                width: 100%; /* Campo de busca ocupa toda a largura */
                margin-bottom: 10px;
            }
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
            <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../itens_loja/buscar.php">Buscar</a></li>
            <li><a href="../Itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/perfil.php">Perfil de Usuário</a></li>
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
        <div class="logo-footer" style="text-align: center; padding: 20px;">
            <img src="../img/logo1.png" alt="Logo Footer" style="width: 100px;">
        </div>
    </div>

    <div class="produtos">
        <div class="search-container">
            <form method="POST" style="display: flex; align-items: center;">
                <input type="text" name="q" placeholder="Buscar por nome">
                <select name="categoria">
                    <option value="">Selecione uma categoria</option>
                    <?php while ($categoria = $result_categorias->fetch_assoc()): ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <button type="submit">Buscar</button>
            </form>
        </div>

        <div class="grid-container">
            <?php
            // Verificar se o formulário foi enviado
            if (isset($_POST['q']) || isset($_POST['categoria'])) {
                $busca = $conn->real_escape_string($_POST['q']);
                $categoria_id = isset($_POST['categoria']) ? (int)$_POST['categoria'] : 0;

                // Montar a consulta SQL
                $sql = "SELECT produtos.*, categoria.nome AS nome_categoria 
                        FROM produtos 
                        JOIN categoria ON produtos.categoria_id = categoria.id 
                        WHERE 1=1";

                // Se um termo de busca for fornecido
                if (!empty($busca)) {
                    $sql .= " AND (produtos.nome LIKE '%$busca%' OR produtos.descricao LIKE '%$busca%')";
                }

                // Se uma categoria foi selecionada
                if ($categoria_id > 0) {
                    $sql .= " AND produtos.categoria_id = $categoria_id";
                }

                // Executar a consulta
                $resultado = $conn->query($sql);

                // Verificar se há resultados
                if ($resultado && $resultado->num_rows > 0) {
                    // Exibir os produtos
                    while ($produto = $resultado->fetch_assoc()) {
                        $id = $produto['id'];
                        $base_path = "http://localhost/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/";

                        // Verificar se a chave 'imagem' existe e não está vazia
                        if (isset($produto["imagem"]) && !empty($produto["imagem"])) {
                            $imagem = htmlspecialchars($produto["imagem"]); // Escapar a imagem
                            echo '
                            <div class="produto" data-nome="' . htmlspecialchars($produto["nome"]) . '">
                                <img src="' . $base_path . $imagem . '" alt="' . htmlspecialchars($produto["nome"]) . '">
                                <h3>' . htmlspecialchars($produto["nome"]) . '</h3>
                                <p>R$ ' . number_format($produto["preco"], 2, ',', '.') . '</p>
                                <a href="../itens_loja/detalhes_produto.php?id=' . $id . '" class="btn-comprar">Comprar</a>
                            </div>';
                        } else {
                            // Exibir quando a imagem não está disponível
                            echo '
                            <div class="produto" data-nome="' . htmlspecialchars($produto["nome"]) . '">
                                <p>Imagem não disponível</p>
                                <h3>' . htmlspecialchars($produto["nome"]) . '</h3>
                                <p>R$ ' . number_format($produto["preco"], 2, ',', '.') . '</p>
                                <a href="../itens_loja/detalhes_produto.php?id=' . $id . '" class="btn-comprar">Comprar</a>
                            </div>';
                        }
                    }
                } else {
                    echo "<h2>Nenhum produto encontrado.</h2>";
                }
            } else {
                echo "<h2>Por favor, insira um termo de busca ou selecione uma categoria.</h2>";
            }

            // Fechar a conexão com o banco de dados
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        const menuIcon = document.getElementById('menuIcon');
        const sidebarMenu = document.getElementById('sidebarMenu');

        menuIcon.onclick = function() {
            sidebarMenu.classList.toggle('open');
        }
    </script>
</body>
</html>