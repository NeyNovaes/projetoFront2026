<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h1>Editar Produto</h1>

    <a href="../../public/index.php" class="btn" style="margin-bottom: 20px;">← Voltar à Lista</a>

    <?php
    require_once '../../app/database/Conexao.php';
    require_once '../../app/models/Produto.php';
    if (isset($_GET['id'])) {
        $produto = \app\models\Produto::buscarPorId($_GET['id']);
    }
    ?>

    <form method="POST" action="editar.php?id=<?php echo $produto['id']; ?>">

        <label for="nome">Nome do Produto</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>

        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>

        <label for="preco">Preço</label>
        <input type="number" id="preco" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>

        <label for="estoque">Estoque</label>
        <input type="number" id="estoque" name="estoque" value="<?php echo $produto['estoque']; ?>" required>

        <button type="submit">Atualizar Produto</button>

    </form>

</div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    \app\models\Produto::atualizar($id, $nome, $preco, $descricao, $estoque);
    header("Location: ../../public/index.php");
}
?>
