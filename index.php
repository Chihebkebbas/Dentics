<?php
// Définition de la page courante via URL (login par défaut)
$page = $_GET['page'] ?? 'login';

// Chemins vers les templates
$basePath = './templates/front/';
$headersPath = $basePath . 'headers/';
$footersPath = $basePath . 'footers/';

// Vérifie si la page demandée existe bien, sinon redirige vers login
if (!is_dir($basePath . $page)) {
    $page = 'login';
}

// Inclusion conditionnelle du HEADER selon la page
switch ($page) {
    case 'login':
    case 'signup':
        include($headersPath . 'header_auth.php');
        break;

    case 'service':
    case 'aboutus':
        include($headersPath . 'header_secondary.php');
        break;

    default: // home, rdv, info
        include($headersPath . 'header_main.php');
        break;
}

// Inclusion directe du main.php (le contact est déjà inclus au bon endroit)
include($basePath . $page . '/main.php');

// Inclusion conditionnelle du FOOTER uniquement pour certaines pages
if (in_array($page, ['home', 'service', 'aboutus'])) {
    include($footersPath . 'footer_main.php');
}


use Dentics\Controller\AuthController;
require_once 'control/AuthController.php';

if ($page === 'login') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $authController = new AuthController();

        $client = $authController->connexion($email, $password);
        if ($client) {
            // Authentification réussie
            echo "Bienvenue, " . htmlspecialchars($client->nom);
        } else {
            // Authentification échouée
            echo "Email ou mot de passe incorrect";
        }

    }
}



?>
