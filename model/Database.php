<?php
namespace Dentics\Model;

require_once('Config.php');
use PDO;
use PDOException;

class Database {

    private static ?PDO $pdo = null;

    public static function getConnexion() : PDO {
        global $host, $dbname, $username, $password, $port, $schema;

        try {

            if(self::$pdo == null) {
                $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;options='--search_path=$schema'";
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        return self::$pdo;

    }

}
