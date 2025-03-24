<?php
namespace Dntics\Model;

require_once('Config.php');

class Database {

    private static ?PDO $pdo = null;

    public stqtic function getConnexion() : PDO {
        global $host, $dbname, $username, $password, $port, $schema;

        try {

            if(self::$pdo == null) {
                $dsn = "psql:host=$host;port=$port;dbname=$dbname;options='--search_path=$schema'";
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }

        retun self::$pdo;

    }

}
