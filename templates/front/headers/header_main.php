<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Polices Google : toutes les familles/poids utiles -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />

    <!-- Chargement dynamique du CSS selon la page -->
    <?php if ($page == 'rdv'): ?>
        <link rel="stylesheet" href="css/rdv.css" />
        <title>Dentics - Réservez</title>
    <?php elseif ($page == 'info'): ?>
        <link rel="stylesheet" href="css/info.css" />
        <title>Dentics - Profile</title>
    <?php else: ?>
        <link rel="stylesheet" href="css/home.css" />
        <title>Dentics - Accueil</title>
    <?php endif; ?>

</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <!-- Logo -->
        <div class="header__left">
            <img src="images/logo.svg" alt="Logo" class="logo" />
        </div>

        <!-- Navigation (Desktop / Mobile) -->
        <nav class="header__nav" id="header-nav">
            <ul>
                <li><a href="index.php?page=home" class="<?= ($page == 'home') ? 'active' : '' ?>">Accueil</a></li>
                <li><a href="index.php?page=service" class="<?= ($page == 'service') ? 'active' : '' ?>">Services</a></li>
                <li><a href="index.php?page=aboutus" class="<?= ($page == 'aboutus') ? 'active' : '' ?>">À propos</a></li>
                <li><a href="index.php?page=home#contact">Contact</a></li>
                <!-- Liens seulement pour mobile (profils & réservation) -->
                <li><a href="index.php?page=info" class="mobile-only">Profile</a></li>
                <li><a href="index.php?page=rdv" class="mobile-only">Réservez</a></li>
            </ul>
        </nav>

        <!-- Avatar + bouton Réservez (version desktop) -->
        <div class="header__btns" id="header-btn">
            <a href="index.php?page=info">
                <img src="images/avatar.svg" alt="Avatar" />
            </a>
            <a href="index.php?page=rdv" class="btn">Réservez</a>
        </div>

        <!-- Icône hamburger (affichage mobile) -->
        <div class="hamburger" id="hamburger">
            <img src="images/ham-icon.svg" alt="Menu hamburger" />
        </div>
    </header>
