<?php 


/**
 * Ce script gère la prise de rendez-vous pour un utilisateur connecté.
 * 
 * Fonctionnalités principales :
 * - Vérifie si l'utilisateur est connecté via une session active.
 * - Redirige l'utilisateur non connecté vers la page d'accueil.
 * - Charge les fichiers de template nécessaires pour l'affichage de la page.
 * - Traite les données soumises via un formulaire POST pour enregistrer un rendez-vous.
 * - Utilise le contrôleur `RendezvousController` pour gérer la logique métier de la prise de rendez-vous.
 * 
 * Variables principales :
 * - `$page` : Nom de la page actuelle (ici, 'rdv').
 * - `$basePath` : Chemin de base vers les templates.
 * - `$headersPath` : Chemin vers les fichiers d'en-tête.
 * 
 * Processus de prise de rendez-vous :
 * - Récupère les données du formulaire (nom, email, téléphone, dentiste, date et heure du rendez-vous).
 * - Appelle la méthode `prendreRdv` du contrôleur pour enregistrer le rendez-vous.
 * - Affiche un message de succès ou d'erreur en fonction du résultat.
 * 
 * Pré-requis :
 * - Une session utilisateur active.
 * - Le fichier `RendezVousController.php` doit être présent et contenir la classe `RendezvousController`.
 */

session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../index.php');
    exit;
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page = 'rdv';
$basePath    = '../templates/front/';
$headersPath = $basePath . 'headers/';



include($headersPath . 'header_secondary.php');
include($basePath . $page . '/main.php');

require_once 'RendezVousController.php';

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erreur de sécurité CSRF : formulaire invalide.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On récupère les champs
    $nom        = $_POST['nom']        ?? '';
    $email      = $_POST['email']      ?? '';
    $telephone  = $_POST['telephone']  ?? '';
    $dentist    = $_POST['dentist']    ?? '';
    $dateRdv    = $_POST['date_rdv']   ?? '';
    $heureRdv   = $_POST['heure_rdv']  ?? '';

    // On appelle le contrôleur 
    $rdvController = new RendezvousController();
    $ok = $rdvController->prendreRdv($nom, $email, $telephone, $dentist, $dateRdv, $heureRdv);

    if ($ok) {
        echo "<p style='color:green'>Rendez-vous enregistré avec succès <p style='color:orange'>(statut 'en attente')</p> !</p>";
    } else {
        echo "<p style='color:red'>Erreur lors de la prise de rendez-vous.</p>";
    }
}