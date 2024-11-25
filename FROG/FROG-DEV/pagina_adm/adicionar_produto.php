<?php
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $imagem = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];


    $imagem = str_replace(' ', '_', $imagem);
    $destino_imagem = "../img/$imagem";

    if (!is_dir('../img')) {
        mkdir('../img', 0777, true);
    }

   
    if (move_uploaded_file($imagem_temp, $destino_imagem)) {
       
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque, imagem) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $preco, $estoque, $imagem]);
       
    } else {
        echo "Erro ao mover o arquivo de imagem.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    <link href="../css/adiciona_produto.css" rel="stylesheet">
  
</head>
<body>

<div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">
        <a onclick="window.history.back();">VOLTAR</a>
        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href="../pagina_adm/adminhome.php">ADMIN-HOME</a>
        <a href="../paginas_iniciais/paginahome.php">PAGINA-HOME</a>
        <a href = "../pagina_adm/usuarios_visualizar.php">USUARIOS</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
    </div>

    
    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
    </header>
    
    <form method="POST" enctype="multipart/form-data">
    <h1>Adicionar Produto</h1>
    <br>
        <label>Nome:</label>
        <input type="text" name="nome" required>
        
        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>
        
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required>
        
        <label>Estoque:</label>
        <input type="number" name="estoque" required>
        
        <label>Imagem:</label>
        <input type="file" name="imagem" required>
        
        <button type="submit">Adicionar Produto</button>
    </form>
</body>
</html>
