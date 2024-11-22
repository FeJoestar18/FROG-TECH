<?php
require_once '../conexao/conexao.php'; // Garante que o arquivo de conexão seja incluído

// Consulta para obter informações de vendas, incluindo o valor da compra
$stmt = $pdo->query("SELECT 
                        v.id, 
                        p.nome AS produto_nome, 
                        v.quantidade, 
                        v.data_venda, 
                        (v.quantidade * p.preco) AS valor_compra
                     FROM vendas v
                     JOIN produtos p ON v.produto_id = p.id
                     ORDER BY v.data_venda DESC");
$vendas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle de Saída de Produtos</title>
    <link rel="stylesheet" href="../css/controle_saida.css">
    
</head>
<body>

<div class="sidebar">
        <img src="../img/logo1.png" alt="Logo">
        
        <a href="../pagina_adm/funcionario.php">FUNCIONÁRIOS</a>
        <a href="../pagina_adm/adminhome.php">HOME-ADMIM</a>
        <a href="../paginas_iniciais/paginahome.php">PAGINA-HOME</a>
        <a href = "../pagina_adm/usuarios_visualizar.php">USUARIOS</a>
        <a href="../paginas_cadastros/logout.php">SAIR</a>
       
    </div>

    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>
    </header>
    <h1>Controle de Saída de Produtos</h1>
    <table>
        <thead>
            <tr>
                <th>ID da Venda</th>
                <th>Produto</th>
                <th>Quantidade Vendida</th>
                <th>Data da Venda</th>
                <th>Valor da Compra (R$)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $venda['id'] ?></td>
                    <td><?= htmlspecialchars($venda['produto_nome']) ?></td>
                    <td><?= $venda['quantidade'] ?></td>
                    <td><?= $venda['data_venda'] ?></td>
                    <td>R$<?= number_format($venda['valor_compra'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
