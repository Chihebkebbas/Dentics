<?php 
/**

 * Ce script gère l'accès à la page "info" pour les utilisateurs authentifiés.
 *
 * Fonctionnalités :
 * - Vérifie si une session utilisateur est active.
 * - Redirige vers la page d'accueil si l'utilisateur n'est pas connecté.
 * - Récupère les informations de l'utilisateur depuis la session.
 * - Définit les chemins pour les templates nécessaires.
 * - Inclut les fichiers de template pour le header et le contenu principal.
 *
 * Variables :
 * - $nom : Nom de l'utilisateur connecté.
 * - $email : Email de l'utilisateur connecté.
 * - $page : Identifiant de la page actuelle (ici, 'info').
 * - $basePath : Chemin de base pour les fichiers de template.
 * - $headersPath : Chemin pour les fichiers de template des headers.
 */


session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../index.php');
    exit;
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$nom   = $_SESSION['utilisateur']['nom'] ?? '';
$email = $_SESSION['utilisateur']['email'] ?? '';

$page = 'info';
$basePath    = '../templates/front/';
$headersPath = $basePath . 'headers/';

include($headersPath . 'header_main.php');
include($basePath . $page . '/main.php');
