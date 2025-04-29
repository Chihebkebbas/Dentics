<?php 

/**
 * Initialisation de la session et gestion des cookies.
 * 
 * Ce fichier gère la session utilisateur, les cookies, et inclut les fichiers nécessaires
 * pour afficher la page d'accueil. Il traite également le formulaire de contact.
 * 
 * PHP version 7.4+
 * 

 */

session_start();


if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../index.php');
    exit;
}

// Savoir si l’utilisateur a accepté les cookies
if (isset($_GET['accept-cookies'])) {
    setcookie('cookies_acceptes', 'oui', time() + 3600); // 1h
    header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?')); 
    exit;
}

// cookie de login si accepté : mémoriser l’email de l’utilisateur connecté
if (isset($_SESSION['utilisateur']) && isset($_COOKIE['cookies_acceptes'])) {
    setcookie('login', $_SESSION['utilisateur']['email'], time() + 3600); // 1h
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page = 'home';
$basePath    = '../templates/front/';
$headersPath = $basePath . 'headers/';
$footersPath = $basePath . 'footers/';


include($headersPath . 'header_main.php');
include($basePath . $page . '/main.php');
include($footersPath . 'footer_main.php');

require_once 'ContactController.php';



if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erreur de sécurité CSRF : formulaire invalide.");
}


// Traitement du formulaire de contact (en POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['email'], $_POST['message'])) {
                
    // Récupérer les valeurs du formulaire
    $nom     = $_POST['nom']     ?? '';
    $email   = $_POST['email']   ?? '';
    $message = $_POST['message'] ?? '';

    // Appeler le contrôleur
    $contactCtrl = new Dentics\Control\ContactController();
    $ok = $contactCtrl->envoyerMessage($nom, $email, $message);


    if ($ok) {
        echo "<p style='color:green'>Votre message a bien été envoyé !</p>";
    } else {
        echo "<p style='color:red'>Une erreur est survenue lors de l'envoi du message.</p>";
    }
}