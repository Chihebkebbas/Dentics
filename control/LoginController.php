<?php 
namespace Dentics\Control;

use Dentics\Model\UtilisateurModel;
use Dentics\Model\ClientModel;
use Dentics\Classe\Utilisateur;
use Dentics\Classe\Client;

class LoginController {
    private UtilisateurModel $utilisateurModel;
    private ClientModel $clientModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
        $this->clientModel = new ClientModel();
    }

    public function authentifier($email, $password): bool{
        $user = $this->utilisateurModel->findByEmail($email);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            return true;
        } else {
            return false;
        }
    }

    // Nouvelle méthode pour l'inscription
    public function inscrire($nom, $email, $motDePasse): bool {
        // 1) On crée l'utilisateur dans la table utilisateur (avec rôle "client")
        $idUtilisateur = $this->utilisateurModel->create($nom, $email, $motDePasse, 'client');

        // 2) On crée ensuite le client associé dans la table client
        if ($this->clientModel->createClient($idUtilisateur, null)) {
            return true;
        } else {
            return false;
        }
    }
}
?>