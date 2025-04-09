<?php

/**
 * Class ClientModel
 *
 * This class provides methods to interact with the Client table in the database.
 * It allows creating, retrieving, updating, and deleting client records.
 *
 * @package Dentics\Model
 * @auteur     Chiheb Kebbas
 */

namespace Dentics\Model;
require_once 'Database.php';
use PDO;
use PDOException;

class ClientModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnexion();
    }

    // Create a new client
    public function createClient($id_utilisateur, $photo = null) {
        $query = "INSERT INTO Client (id_utilisateur, photo) VALUES (:id_utilisateur, :photo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);
        $stmt->bindParam(':photo', $photo);
        return $stmt->execute();
    }

    // Get client by id
    public function getClientById($id_client) {
        $query = "SELECT * FROM Client WHERE id_client = :id_client";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_client', $id_client);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update client photo
    public function updateClientPhoto($id_client, $photo) {
        $query = "UPDATE Client SET photo = :photo WHERE id_client = :id_client";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':id_client', $id_client);
        return $stmt->execute();
    }

    // Delete client
    public function deleteClient($id_client) {
        $query = "DELETE FROM Client WHERE id_client = :id_client";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_client', $id_client);
        return $stmt->execute();
    }
}
?>