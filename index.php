<?php

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

    case 'rdv':
        // J'appelle le contrôleur pour avoir la liste des dentistes
        $rdvController = new \Dentics\Control\RendezvousController();
        
         // Récupérer la liste des dentistes
        $dentists = $rdvController->afficherFormulaireRdv();
        
        // Récupérer les disponibilités (dates / heures)
        
        $disponibilites = $rdvController->getDisponibilites();
        include($headersPath . 'header_main.php');
        break;

    default: // home, rdv, info, etc.
        include($headersPath . 'header_main.php');
        break;
}

// Inclusion du contenu principal
include($basePath . $page . '/main.php');

// Inclusion conditionnelle du FOOTER uniquement pour certaines pages
if (in_array($page, ['home', 'service', 'aboutus'])) {
    include($footersPath . 'footer_main.php');
}

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





// ---------------------------------------
// TRAITEMENT DES FORMULAIRES SELON LA PAGE
switch ($page) {

    case 'login':
        // Formulaire de connexion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = $_POST['email']    ?? '';
            $password = $_POST['password'] ?? '';

            $loginController = new LoginController();
            if ($loginController->authentifier($email, $password)) {
                // Redirection si OK
                header("Location: index.php?page=home");
                exit;
            } else {
                echo "Email ou mot de passe incorrect !";
            }
        }
        break;

    case 'signup':
        // Formulaire d'inscription
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom        = $_POST['nom']      ?? '';
            $email      = $_POST['email']    ?? '';
            $motDePasse = $_POST['password'] ?? '';

            $loginController = new LoginController();
            if ($loginController->inscrire($nom, $email, $motDePasse)) {
                // Redirection si OK
                header("Location: index.php?page=login");
                exit;
            } else {
                echo "Une erreur est survenue lors de l'inscription.";
            }
        }
        break;

        case 'rdv':

            // Si le formulaire "Prendre un RDV" est soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // On récupère les champs
                $nom        = $_POST['nom']        ?? '';
                $email      = $_POST['email']      ?? '';
                $telephone  = $_POST['telephone']  ?? '';
                $dentist    = $_POST['dentist']    ?? '';
                $dateRdv    = $_POST['date_rdv']   ?? '';
                $heureRdv   = $_POST['heure_rdv']  ?? '';

                // On appelle le contrôleur 
                $rdvController = new \Dentics\Control\RendezvousController();
                $ok = $rdvController->prendreRdv($nom, $email, $telephone, $dentist, $dateRdv, $heureRdv);
    
                if ($ok) {
                    echo "<p style='color:green'>Rendez-vous enregistré avec succès <p style='color:orange'>(statut 'en attente')</p> !</p>";
                } else {
                    echo "<p style='color:red'>Erreur lors de la prise de rendez-vous.</p>";
                }
            }
        break;

        case 'home':
        
            // Traitement du formulaire de contact (en POST)
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['email'], $_POST['message'])) {
                
                // Récupérer les valeurs du formulaire
                $nom     = $_POST['nom']     ?? '';
                $email   = $_POST['email']   ?? '';
                $message = $_POST['message'] ?? '';
        
                // Appeler le contrôleur
                $contactCtrl = new \Dentics\Control\ContactController();
                $ok = $contactCtrl->envoyerMessage($nom, $email, $message);
        
                if ($ok) {
                    echo "<p style='color:green'>Votre message a bien été envoyé !</p>";
                } else {
                    echo "<p style='color:red'>Une erreur est survenue lors de l'envoi du message.</p>";
                }
            }
    
    default:
        // Pour les autres pages, s'il y a un POST particulier à traiter, on le gère ici
        break;
}
