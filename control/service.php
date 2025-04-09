<?php 

/**
 * Initializes the session and checks if the user is authenticated.
 * Redirects to the login page if the user is not authenticated.
 */

session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../index.php');
    exit;
}
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page = 'service';
$basePath    = '../templates/front/';
$headersPath = $basePath . 'headers/';
$footersPath = $basePath . 'footers/';


include($headersPath . 'header_secondary.php');
include($basePath . $page . '/main.php');
include($footersPath . 'footer_main.php');


