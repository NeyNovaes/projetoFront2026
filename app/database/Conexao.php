<?php

namespace app\database;

use PDO;

// Classe responsável pela conexão com o banco
class Database
{
    private static $conn;

    // Método estático para retornar conexão única
        public static function getConnection() {
            if (!self::$conn) {
                $host = "localhost";
                $dbname = "sistema_produtos";
                $user = "root";
                $pass = "";

                try {
                    self::$conn = new PDO(
                        "mysql:host=$host;dbname=$dbname",
                        $user,
                        $pass
                    );
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (\PDOException $e) {
                    // Em ambiente de desenvolvimento, você pode dar um echo no erro:
                    die("Erro de conexão com o banco de dados: " . $e->getMessage());
                }
            }

            return self::$conn;
            }
}

?>