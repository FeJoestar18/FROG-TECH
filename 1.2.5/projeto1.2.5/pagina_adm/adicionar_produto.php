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

    // Move o arquivo carregado para o diretório de destino
    if (move_uploaded_file($imagem_temp, $destino_imagem)) {
        // Insere o produto no banco de dados
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque, imagem) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $preco, $estoque, $imagem]);
       /* echo "Produto adicionado com sucesso!";*/
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
</head>
<body>
    <h1>Adicionar Produto</h1>
    <form method="POST" enctype="multipart/form-data">
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
