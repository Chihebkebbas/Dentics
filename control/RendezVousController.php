<?php
namespace Dentics\Control;

use Dentics\Classe\RendezVous;
use Dentics\Model\RendezVousModel;
use Dentics\Model\Database;
use Dentics\Model\UtilisateurModel;
use Dentics\Model\DisponibiliteModel;

require_once 'class/RendezVous.php'; 
require_once 'model/DisponibiliteModel.php';

class RendezvousController
{
    private RendezVousModel $rdvModel;
    private UtilisateurModel $utilisateurModel;
    private DisponibiliteModel $dispoModel;

    public function __construct()
    {
        $this->rdvModel = new RendezvousModel();
        $this->utilisateurModel = new UtilisateurModel();
        $this->dispoModel = new DisponibiliteModel();
    }

    /**
     * Crée un RDV "en attente" en base, à partir des données du formulaire.
     */
    public function prendreRdv(
        string $nom,
        string $email,
        string $telephone,
        int    $idDentist,
        string $dateRdv,
        string $heureRdv
    ): bool
    {
        // 1) Construire l'objet métier RendezVous
        //    Le 7e paramètre "statut" est "en attente" par défaut dans le constructeur
        $rdv = new RendezVous($nom, $email, $telephone, $idDentist, $dateRdv, $heureRdv);

        // 2) Appeler le modèle -> insertion
        $newId = $this->rdvModel->create($rdv);

        // 3) Vérifier si l'ID a été récupéré
        if ($newId !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function afficherFormulaireRdv(): array
    {
        // Récupère la liste des dentistes via le model
        $dentists = $this->utilisateurModel->getAllDentists();
        return $dentists; // renvoie ce tableau au 'index.php'
    }

     /**
     * Récupérer la liste des dates + heures disponibles
     * (éventuellement filtrées par un dentiste précis).
     */
    public function getDisponibilites(?int $idDentist = null): array
    {
        // 1) Toutes les dates libres
        $dates = $this->dispoModel->getAllDatesDisponibles($idDentist);

        // 2) Toutes les heures libres (pour info)
        //    Vous pouvez aussi récupérer distinctement pour chaque date
        $heures = $this->dispoModel->getAllHeuresDisponibles($idDentist);

        // On renvoie un tableau associatif :
        return [
            'dates'  => $dates,
            'heures' => $heures
        ];
    }

}
