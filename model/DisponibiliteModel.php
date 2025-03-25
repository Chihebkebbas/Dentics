<?php
namespace Dentics\Model;

require_once 'Database.php';
use PDO;
use PDOException;

class DisponibiliteModel
{
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnexion();
    }

    /**
     * Récupère toutes les dates disponibles (distinctes) non réservées,
     * éventuellement pour un dentiste particulier.
     */
    public function getAllDatesDisponibles(?int $idDentist = null): array {
        
        if ($idDentist) {
            // Si vous voulez filtrer par dentiste précis
            $sql = "SELECT DISTINCT date_dispo 
                    FROM disponibilite
                    WHERE est_reserve = false
                      AND id_dentist = :id_dentist
                    ORDER BY date_dispo";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id_dentist' => $idDentist]);
        } else {
            // Sinon, toutes les dates de tout dentiste
            $sql = "SELECT DISTINCT date_dispo
                    FROM disponibilite
                    WHERE est_reserve = false
                    ORDER BY date_dispo";
            $stmt = $this->db->query($sql);
        }

        // Retourne un tableau de dates (p. ex. ['2024-10-12','2024-10-13',...])
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Récupère toutes les heures disponibles (distinctes) non réservées,
     * éventuellement pour un dentiste précis + une date donnée.
     */
    public function getAllHeuresDisponibles(?int $idDentist = null, ?string $dateDispo = null): array {
        
        // filtrer par dentiste + date
   
        $sql = "SELECT DISTINCT heure_dispo
                FROM disponibilite
                WHERE est_reserve = false";

        $params = [];
        if ($idDentist) {
            $sql .= " AND id_dentist = :id_dentist";
            $params[':id_dentist'] = $idDentist;
        }
        if ($dateDispo) {
            $sql .= " AND date_dispo = :date_dispo";
            $params[':date_dispo'] = $dateDispo;
        }
        $sql .= " ORDER BY heure_dispo";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        // Retourne un tableau d'heures (p. ex. ['09:00','14:00','18:30',...])
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getDisponibilitesByDentist(int $dentistId): array
    {
        $sql = "SELECT id_dispo, date_dispo, heure_dispo, est_reserve
                FROM disponibilite
                WHERE id_dentist = :dentistId AND est_reserve = false
                ORDER BY date_dispo, heure_dispo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':dentistId' => $dentistId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}
