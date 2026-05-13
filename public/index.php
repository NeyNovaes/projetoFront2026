<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">

        <h1>Sistema de Produtos</h1>

        <a href="../app/views/cadastrar.php" class="btn">➕ Novo Produto</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require_once '../app/database/Conexao.php';
                require_once '../app/models/Produto.php';
                $produtos = \app\models\Produto::listar();
                foreach ($produtos as $produto) {
                    echo "<tr>";
                    echo "<td>" . $produto['id'] . "</td>";
                    echo "<td>" . $produto['nome'] . "</td>";
                    echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                    echo "<td>" . $produto['estoque'] . "</td>";
                    echo "<td><a href='../app/views/editar.php?id=" . $produto['id'] . "'>✏️ Editar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

</body>
</html>
