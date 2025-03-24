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

require_once 'model/Database.php';

use Dentics\Model\Database;

try {
    $db = Database::getConnexion();
    echo "Connexion réussie à la base de données !";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

require_once 'control/ClientController.php';

use Dentics\Controller\ClientController;

$clientController = new ClientController();

// Exemple de données d'inscription
$clientData = [
    'nom' => 'John Doe',
    'email' => 'john.doe@example.com',
    'mot_de_passe' => 'password123',
    'photo' => 'path/to/photo.jpg'
];

// Tester l'inscription
$clientController->inscrireClient($clientData);

?>
