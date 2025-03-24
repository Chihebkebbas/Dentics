<?php
namespace Dentics\Model;

use PDO;
use Dentics\Classe\Client;

require_once 'Database.php';

class UtilisateurModel {

    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnexion();
    }

    // Enregistrer un nouveau client
    public function inscrireClient(Client $client) : bool {
        $stmtUtilisateur = $this->db->prepare("
            INSERT INTO Utilisateur (nom, email, mot_de_passe, role) VALUES (:nom, :email, :motDePasse, :role)
            RETURNING id;
        ");

        $hashedPassword = password_hash($client->motDePasse, PASSWORD_DEFAULT);

        $stmtUtilisateur->execute([
            ':nom' => $client->nom,
            ':email' => $client->email,
            ':motDePasse' => $hashedPassword,
            ':role' => 'client'
        ]);

        $idUtilisateur = $stmtUtilisateur->fetchColumn();

        if ($idUtilisateur) {
            $stmtClient = $this->db->prepare("
                INSERT INTO Client (id_utilisateur, photo) VALUES (:id_utilisateur, :photo);
            ");

            return $stmtClient->execute([
                ':id_utilisateur' => $idUtilisateur,
                ':photo' => $client->photo
            ]);
        }

        return false;
    }

    // Authentification d'un client par email et mot de passe
    public function authentifierClient(string $email, string $motDePasse) : ?Client {
        $stmt = $this->db->prepare("
            SELECT U.id, U.nom, U.email, U.mot_de_passe, C.photo
            FROM Utilisateur U
            INNER JOIN Client C ON U.id = C.id_utilisateur
            WHERE U.email = :email AND U.role = 'client';
        ");

        $stmt->execute([':email' => $email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($motDePasse, $result['mot_de_passe'])) {
            $client = new Client($result['nom'], $result['email'], $result['mot_de_passe'], $result['photo']);
            $client->id = $result['id'];
            return $client;
        }

        return null;
    }
}
