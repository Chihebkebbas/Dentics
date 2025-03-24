<?php
namespace Dentics\Model;
require_once 'Database.php';

class UtilisateurModel {
    private $db;

    public function __construct() {
        $this->db = Database->getConnection();
    }

    public function create($nom, $email, $mot_de_passe, $role) {
        $sql = "INSERT INTO utilisateur (nom, email, mot_de_passe, role) VALUES (:nom, :email, :mot_de_passe, :role)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':mot_de_passe' => password_hash($mot_de_passe, PASSWORD_BCRYPT),
            ':role' => $role
        ]);
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
}
?>
