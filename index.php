<?php

/**
 * Ce fichier gère la logique principale de l'application, y compris :
 * - L'initialisation de la session.
 * - L'inclusion des contrôleurs, modèles et classes nécessaires.
 * - La gestion de la page demandée via le paramètre `?page=`.
 * - La connexion à la base de données.
 * - Le traitement du formulaire de connexion utilisateur.
 *
 * Fonctionnalités principales :
 * - Vérifie si la page demandée existe, sinon redirige vers la page de connexion.
 * - Initialise la connexion à la base de données et gère les erreurs éventuelles.
 * - Authentifie l'utilisateur via le formulaire de connexion et initialise la session en cas de succès.
 *
 * Dépendances :
 * - Contrôleurs : LoginController, RendezVousController, ContactController.
 * - Modèles : UtilisateurModel, ClientModel, RendezVousModel, DisponibiliteModel, MessageContactModel.
 * - Classe : MessageContact.
 * - Base de données : Database.
 *
 * @package Dentics
 * @auteur     Chiheb Kebbas
 */

session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


use Dentics\Control\LoginController;
use Dentics\Control\RendezVousController;

// Contrôleurs et modèles
require_once 'control/LoginController.php';
require_once 'model/UtilisateurModel.php';
require_once 'model/ClientModel.php';
require_once 'control/RendezVousController.php';
require_once 'model/RendezVousModel.php';
require_once 'model/DisponibiliteModel.php';
require_once 'control/ContactController.php';
require_once 'model/MessageContactModel.php';
require_once 'class/MessageContact.php';

// Par défaut, on prend 'login' si ?page=... n'est pas défini
$page = $_GET['page'] ?? 'login';

// Chemins vers vos templates
$basePath    = './templates/front/';
$headersPath = $basePath . 'headers/';
$footersPath = $basePath . 'footers/';

// Vérifie si la page demandée existe bien (dossier), sinon -> login
if (!is_dir($basePath . $page)) {
    $page = 'login';
}

include($headersPath . 'header_auth.php');
include($basePath . $page . '/main.php');

// ---------------------------------------
// Connexion DB + use + require
require_once 'model/Database.php';
use Dentics\Model\Database;

try {
    $db = Database::getConnexion();
    echo "Connexion réussie à la base de données !";
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Erreur de sécurité CSRF : formulaire invalide.");
}


// Formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email']    ?? '';
    $password = $_POST['password'] ?? '';

    $loginController = new LoginController();
    if ($loginController->authentifier($email, $password)) {
        // Récupérer l'utilisateur
        $user = $loginController->getUtilisateurParEmail($email);
        
        $_SESSION['utilisateur'] = [
            'id'    => $user['id'],
            'email' => $user['email'],
            'nom'   => $user['nom']
        ];


        // Redirection si OK
        header("Location: control/home.php");
        exit;
    } else {
        echo "Email ou mot de passe incorrect !";
    }
}
