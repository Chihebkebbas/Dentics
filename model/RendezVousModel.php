<?php
namespace Dentics\Model;
require_once 'Database.php';
use PDO;
use PDOException;
use Dentics\Classe\RendezVous;

class RendezVousModel
{
    private PDO $db;
    

    public function __construct() {
        $this->db = Database::getConnexion();
    }

    
    /**
     * Insert un nouveau rendez-vous en BDD, retourne l'ID créé ou null en cas d'erreur
     */
    public function create(RendezVous $rdv): ?int {
        // On suppose que la table s'appelle "rendezvous" et que la clé primaire est "id_rdv"
        // On utilise RETURNING id_rdv pour PostgreSQL
        $sql = "INSERT INTO rendezvous
                (nom, email, telephone, id_dentist, date_rdv, heure_rdv, statut)
                VALUES (:nom, :email, :telephone, :id_dentist, :date_rdv, :heure_rdv, :statut)
                RETURNING id_rdv";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':nom'        => $rdv->getNom(),
            ':email'      => $rdv->getEmail(),
            ':telephone'  => $rdv->getTelephone(),
            ':id_dentist' => $rdv->getIdDentist(),
            ':date_rdv'   => $rdv->getDateRdv(),
            ':heure_rdv'  => $rdv->getHeureRdv(),
            ':statut'     => $rdv->getStatut(),
        ]);

        $newId = $stmt->fetchColumn();

        if ($newId) {
            // On met à jour l'objet métier, si jamais vous en avez besoin ensuite
            $rdv->setIdRdv((int)$newId);
            return (int)$newId;
        }
        return null;
    }
}
