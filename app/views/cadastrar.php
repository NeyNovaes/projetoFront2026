<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h1>Cadastrar Novo Produto</h1>

    <a href="../../public/index.php" class="btn" style="margin-bottom: 20px;">← Voltar à Lista</a>

    <form method="POST" action="cadastrar.php">

        <label for="nome">Nome do Produto</label>
        <input type="text" id="nome" name="nome" placeholder="Nome do produto" required>

        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" placeholder="Descrição do produto"></textarea>

        <label for="preco">Preço</label>
        <input type="number" id="preco" step="0.01" name="preco" placeholder="Preço (R$)" required>

        <label for="estoque">Estoque</label>
        <input type="number" id="estoque" name="estoque" placeholder="Quantidade em estoque" required>

        <button type="submit">Salvar Produto</button>

    </form>

</div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../app/database/Conexao.php';
    require_once '../../app/models/Produto.php';
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    \app\models\Produto::salvar($nome, $preco, $descricao, $estoque);
    header("Location: ../../public/index.php");
}
?>