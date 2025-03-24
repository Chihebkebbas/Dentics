<?php 
namespace Dentics\Control;

use Dentics\Model\UtilisateurModel;
use Dentics\Model\ClientModel;
use Dentics\Classe\Utilisateur;
use Dentics\Classe\Client;

class LoginController {
    private UtilisateurModel $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }

    public function authentifier($email, $password) {
        $user = 
    }

}
?>