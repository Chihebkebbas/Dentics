<?php
/**
 * Démarre une session, supprime les cookies existants et détruit la session.
 * 
 * - Les cookies 'cookies_acceptes' et 'login' sont supprimés en les anti-datant.
 * - Toutes les variables de session sont supprimées avec session_unset().
 * - La session en cours est détruite avec session_destroy().
 * - Redirige l'utilisateur vers la page d'accueil (../index.php).
 */

session_start();

// Supprimer les cookies en les anti-datant
setcookie('cookies_acceptes', '', time() - 3600, "/");
setcookie('login', '', time() - 3600, "/");

session_unset();
session_destroy();
header('Location: ../index.php');
exit;
