<?php
// Inclua o arquivo de conexão com o banco de dados
include('../conexao/conexao.php');

// Certifique-se de que a conexão está ativa
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Frog Tech</title>
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

        .sidebar .logo-footer {
            position: absolute;
            bottom: 20px; /* Distância do fundo */
            left: 50%;
            transform: translateX(-50%); /* Centraliza a logo */
            text-align: center;
        }

        .produtos {
            margin-top: 100px; /* Para não ficar atrás do header */
            padding: 20px;
        }

        .search-container {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }

        .search-container input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
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
<<<<<<< HEAD
        <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../Itens_loja/buscar.php">Buscar</a></li>
            <li><a href="../Itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/perfil.php">Perfil de Usuário</a></li>
=======
            <li><a href="../paginas_iniciais/loja.php">Loja</a></li>
            <li><a href="../itens_loja/carrinho.php">Carrinho de Compras</a></li>
            <li><a href="../paginas_cadastros/Perfil.php">Perfil de Usuário</a></li>
>>>>>>> 59fcb99dfd03c3e90abfc114586ecdd3251cab54
            <li><a href="../paginas_cadastros/logout.php" class="logout">Sair</a></li>
        </ul>
        <div class="logo-footer">
            <img src="../img/logo1.png" alt="Frog Tech Logo" style="width: 80px; height: auto;">
        </div>
    </div>

    <section class="produtos">
        <h2>Nossos Produtos</h2>

        <!-- Adicionando o campo de busca -->
        <div class="search-container">
            <input type="text" placeholder="Buscar produtos..." id="searchInput" onkeyup="filterProducts()">
        </div>

        <div class="grid-container" id="productGrid">
            <?php
            // Defina o caminho base para as imagens
            $base_path = '/TESTE133/1.2.5/projeto1.2.5/Itens_loja/uploadfotos/';

            // Verifique se a conexão ainda está aberta
            if ($conn) {
                // Consulta para buscar todos os produtos
                $sql = "SELECT id, nome, preco, imagem FROM produtos"; 
                $result = $conn->query($sql);
                
                // Verifique se a consulta foi bem-sucedida
                if (!$result) {
                    echo "Erro na consulta SQL: " . $conn->error;
                } elseif ($result->num_rows > 0) {
                    // Exiba os produtos
                    while ($produto = $result->fetch_assoc()) {
                        $imagem = htmlspecialchars($produto["imagem"]); // Escapar a imagem
                        $id = $produto['id']; // Supondo que você tenha um campo 'id' na tabela
                        echo '
                        <div class="produto" data-nome="' . htmlspecialchars($produto["nome"]) . '">
                            <img src="' . $base_path . $imagem . '" alt="' . htmlspecialchars($produto["nome"]) . '">
                            <h3>' . htmlspecialchars($produto["nome"]) . '</h3>
                            <p>R$ ' . number_format($produto["preco"], 2, ',', '.') . '</p>
                            <a href="../itens_loja/detalhes_produto.php?id=' . $id . '" class="btn-comprar">Comprar</a>
                        </div>';
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }
                
                // Libera o resultado após o uso
                $result->free();
            } else {
                echo "Erro de conexão com o banco de dados.";
            }
            ?>
        </div>
    </section>

    <script>
<<<<<<< HEAD
        const menuIcon = document.getElementById('menuIcon');
        const sidebar = document.getElementById('sidebarMenu');

        menuIcon.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });

        document.addEventListener('click', (event) => {
            // Verifica se o clique foi fora do sidebar e do ícone do menu
            if (!sidebar.contains(event.target) && !menuIcon.contains(event.target)) {
                sidebar.classList.remove('open'); // Fecha o sidebar
            }
        });

        function filterProducts() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const grid = document.getElementById('productGrid');
            const produtos = grid.getElementsByClassName('produto');

            for (let i = 0; i < produtos.length; i++) {
                const nome = produtos[i].getAttribute('data-nome').toLowerCase();
                if (nome.includes(filter)) {
                    produtos[i].style.display = ""; // Mostrar produto
                } else {
                    produtos[i].style.display = "none"; // Esconder produto
                }
            }
        }
=======
        
>>>>>>> 59fcb99dfd03c3e90abfc114586ecdd3251cab54
    </script>

    <?php
    // Feche a conexão ao final da execução
    $conn->close();
    ?>
</body>
</html>