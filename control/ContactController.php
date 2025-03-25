<?php
namespace Dentics\Control;

use Dentics\Classe\MessageContact;
use Dentics\Model\MessageContactModel;
use Dentics\Model\Database;

class ContactController
{
    private MessageContactModel $model;

    public function __construct()
    {
        // On récupère la connexion
        $pdo = Database::getConnexion();
        $this->model = new MessageContactModel($pdo);
    }

    /**
     * Gère la création d'un message de contact
     * On génère date/heure actuelles côté serveur
     */
    public function envoyerMessage(string $nom, string $email, string $contenu): bool
    {
        $dateEnvoi  = date('Y-m-d');  // ex: "2025-03-25"
        $heureEnvoi = date('H:i:s'); // ex: "14:53:00"

        // On crée l'objet métier
        $messageObj = new MessageContact($nom, $email, $contenu, $dateEnvoi, $heureEnvoi);

        // On l'insère via le Model
        $newId = $this->model->create($messageObj);

        return $newId !== null;
    }
}
