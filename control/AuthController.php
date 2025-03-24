<?php
namespace Dentics\Controller;

use Dentics\Model\UtilisateurModel;
use Dentics\Classe\Client;

require_once 'model/UtilisateurModel.php';

class AuthController {

    private UtilisateurModel $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }

    // Inscription d'un client
    public function inscription(string $nom, string $email, string $motDePasse, ?string $photo = null) : bool {
        $client = new Client($nom, $email, $motDePasse, $photo);
        return $this->utilisateurModel->inscrireClient($client);
    }

    // Authentification d'un client
    public function connexion(string $email, string $motDePasse) : ?Client {
        return $this->utilisateurModel->authentifierClient($email, $motDePasse);
    }
}
