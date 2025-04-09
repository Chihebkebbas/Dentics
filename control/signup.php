<?php 

/**
 * Ce script gère le processus d'inscription d'un utilisateur.
 * 
 * - Configure la page et inclut les templates nécessaires pour la page d'inscription.
 * - Traite la requête POST pour enregistrer un nouvel utilisateur.
 * - Utilise le `LoginController` pour gérer la logique d'inscription.
 * - Redirige l'utilisateur vers la page de connexion en cas de succès.
 * - Affiche un message d'erreur si l'inscription échoue.
 * 
 * Variables :
 * - `$page` : Identifiant de la page actuelle, défini sur 'signup'.
 * - `$basePath` : Chemin de base pour le répertoire des templates.
 * - `$headersPath` : Chemin vers le répertoire des en-têtes.
 * 
 * Inclus :
 * - `header_signup.php` : Template d'en-tête pour la page d'inscription.
 * - `main.php` : Template principal pour le contenu de la page d'inscription.
 * 
 * Dépendances :
 * - `LoginController.php` : Contient la logique pour l'inscription des utilisateurs.
 */

session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


$page = 'signup';
$basePath    = '../templates/front/';
$headersPath = $basePath . 'headers/';

include($headersPath . 'header_signup.php');
include($basePath . $page . '/main.php');

require_once 'LoginController.php';

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erreur de sécurité CSRF : formulaire invalide.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom        = $_POST['nom']      ?? '';
    $email      = $_POST['email']    ?? '';
    $motDePasse = $_POST['password'] ?? '';

    $loginController = new Dentics\Control\LoginController();
    if ($loginController->inscrire($nom, $email, $motDePasse)) {
        header("Location: ../index.php?page=login");
        exit;
    } else {
        echo "Une erreur est survenue lors de l'inscription.";
    }
}
