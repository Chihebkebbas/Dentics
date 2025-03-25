<?php
namespace Dentics\Model;
require_once 'Database.php';
use PDO;
use PDOException;


class UtilisateurModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnexion();
    }

    public function create($nom, $email, $mot_de_passe, $role) {
        $sql = "INSERT INTO utilisateur (nom, email, mot_de_passe, role)
                VALUES (:nom, :email, :mot_de_passe, :role)
                RETURNING id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom'          => $nom,
            ':email'        => $email,
            ':mot_de_passe' => password_hash($mot_de_passe, PASSWORD_BCRYPT),
            ':role'         => $role
        ]);

        // Pour Postgres, récupération de l'ID nouvellement inséré
        $newId = $stmt->fetchColumn();
        return $newId;
    }

    public function read($id) {
        $sql = "SELECT * FROM utilisateur WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $nom, $email, $mot_de_passe, $role) {
        $sql = "UPDATE utilisateur SET nom = :nom, email = :email, mot_de_passe = :mot_de_passe, role = :role WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':email' => $email,
            ':mot_de_passe' => password_hash($mot_de_passe, PASSWORD_BCRYPT),
            ':role' => $role
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllDentists(): array {
        
        $sql = "SELECT d.id_dentist, u.nom
                FROM dentist AS d
                JOIN utilisateur AS u ON d.id_utilisateur = u.id
                WHERE u.role = 'dentist'";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
?>
