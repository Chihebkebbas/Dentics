<?php 

/**
 * LoginController est responsable de la gestion de l'authentification et de l'inscription des utilisateurs.
 *
 * Cette classe interagit avec UtilisateurModel et ClientModel pour gérer les données des utilisateurs
 * et effectuer des opérations telles que l'authentification et l'inscription.
 *
 * @package Dentics\Control
 * @auteur     Chiheb Kebbas
 */

namespace Dentics\Control;

use Dentics\Model\UtilisateurModel;
use Dentics\Model\ClientModel;
use Dentics\Classe\Utilisateur;
use Dentics\Classe\Client;

require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/model/UtilisateurModel.php';
require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/model/ClientModel.php';

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

    public function getUtilisateurParEmail(string $email): ?array
    {
        $model = new UtilisateurModel();
        return $model->findByEmail($email);
    }


}
?>