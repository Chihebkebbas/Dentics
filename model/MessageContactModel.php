<?php
namespace Dentics\Model;

require_once 'Database.php';
use PDO;
use PDOException;

use Dentics\Classe\MessageContact;


class MessageContactModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnexion();
    }

    /**
     * Insère un nouveau message de contact en BDD
     * Retourne l'id_message créé, ou null si échec
     */

    public function create(MessageContact $msg): ?int
    {
        $sql = "INSERT INTO messagecontact
                (nom, email, message, date_envoi, heure_envoi)
                VALUES (:nom, :email, :message, :date_envoi, :heure_envoi)
                RETURNING id_message";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom'         => $msg->getNom(),
            ':email'       => $msg->getEmail(),
            ':message'     => $msg->getMessage(),
            ':date_envoi'  => $msg->getDateEnvoi(),
            ':heure_envoi' => $msg->getHeureEnvoi()
        ]);

        $newId = $stmt->fetchColumn();
        if ($newId) {
            $msg->setIdMessage((int)$newId);
            return (int)$newId;
        }
        return null;
    }

}
