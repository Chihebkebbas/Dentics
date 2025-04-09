<?php

/**
 * ContactController
 *
 * Cette classe gère les opérations liées aux messages de contact, y compris
 * leur création, leur envoi et leur stockage dans la base de données.
 *
 * PHP version 8.0
 *
 * @category Controller
 * @package  Dentics\Control
 * @auteur     Chiheb Kebbas
 */


namespace Dentics\Control;

use Dentics\Classe\MessageContact;
use Dentics\Model\MessageContactModel;
use Dentics\Model\Database;

require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/model/Database.php';
require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/model/MessageContactModel.php';
require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/class/MessageContact.php';
require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/utils/MailHelper.php';

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

        // On insère le message
        $newId = $this->model->create($messageObj);

        // Si l'insertion réussit, on envoie le mail
        if ($newId !== null) {
            envoyerMailContact($nom, $email, $contenu);
            return true;
        }

        return false;
    }
}
