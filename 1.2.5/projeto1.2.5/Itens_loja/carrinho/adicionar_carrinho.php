<?php
session_start();

// Estabelecendo a conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor
$username = "root"; // seu usuário do banco de dados
$password = ""; // sua senha do banco de dados
$dbname = "frog"; // nome do seu banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o ID do produto foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Aqui você pode obter os detalhes do produto do banco de dados, se necessário
    // Exemplo: Obter nome e preço do produto
    $sql = "SELECT nome, preco FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();

        // Adiciona o produto ao carrinho
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = []; // Inicializa o carrinho se não existir
        }

        // Adiciona ou atualiza a quantidade do produto
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['quantidade'] += 1; // Incrementa a quantidade
        } else {
            $_SESSION['carrinho'][$id] = [
                'quantidade' => 1,
                'nome' => $produto['nome'],
                'preco' => $produto['preco']
            ];
        }
    }

    // Redireciona de volta para a página do produto
    header("Location: produto.php?id=" . $id);
    exit();
} else {
    // Se o ID não estiver definido, redireciona para a loja ou página inicial
    header("Location: ../paginas_iniciais/loja.html");
    exit();
}
?>