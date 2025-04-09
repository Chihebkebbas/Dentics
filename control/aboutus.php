<?php 
/**
 * Démarre une session et vérifie si la variable de session 'utilisateur' est définie.
 * Si elle n'est pas définie, redirige l'utilisateur vers la page d'index et termine le script.
 *
 * Définit la page actuelle et construit les chemins pour les fichiers de modèles.
 * Inclut les modèles d'en-tête, de contenu principal et de pied de page pour la page 'aboutus'.
 *
 */

session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../index.php');
    exit;
}
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page = 'aboutus';
$basePath    = '../templates/front/';
$headersPath = $basePath . 'headers/';
$footersPath = $basePath . 'footers/';


include($headersPath . 'header_secondary.php');
include($basePath . $page . '/main.php');
include($footersPath . 'footer_main.php');