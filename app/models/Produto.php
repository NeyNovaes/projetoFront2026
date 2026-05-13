<?php
namespace app\models;
use app\database\Database;
use PDO;

class Produto
{
//model para listar os resultados
    public static function listar()
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM produtos ORDER BY id DESC";
        $stmt = $conn->query($sql);

        //retornar dados

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    //model insere produto
    public static function salvar($nome,$preco,$descricao,$estoque)
    {
        //pegar conexao
        $conn = Database::getConnection();

        //estrutura sql
        $sql = "INSERT INTO produtos (nome,preco,descricao,estoque) VALUES (:nome,:preco,:descricao,:estoque)";
        $stmt = $conn->prepare($sql);
        //executar parametros
        $stmt->execute([
            ':nome'=>$nome,
            ':preco'=>$preco,
            ':descricao'=>$descricao,
            ':estoque'=>$estoque
        ]);
    }

    //model para buscar produto por id
    public static function buscarPorId($id)
    {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //model para atualizar produto
    public static function atualizar($id, $nome, $preco, $descricao, $estoque)
    {
        $conn = Database::getConnection();
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao, estoque = :estoque WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':preco' => $preco,
            ':descricao' => $descricao,
        ]);
    }
}
?>