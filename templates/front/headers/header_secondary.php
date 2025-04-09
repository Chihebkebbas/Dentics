<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700&display=swap"
        rel="stylesheet" />

    <!-- Chargement dynamique du CSS selon la page -->
    <?php if ($_SERVER['SCRIPT_NAME'] == '/~uapv2500228/control/rdv.php'): ?>
        <link rel="stylesheet" href="../css/rdv.css" />
        <title>Dentics - Réservez</title>
    <?php elseif ($_SERVER['SCRIPT_NAME'] == '/~uapv2500228/control/aboutus.php'): ?>
        <link rel="stylesheet" href="../css/aboutus.css" />
        <title>Dentics - À propos</title>
    <?php elseif ($_SERVER['SCRIPT_NAME'] == '/~uapv2500228/control/service.php'): ?>
        <link rel="stylesheet" href="../css/service.css" />
        
        <title>Dentics - Services</title>
    <?php endif; ?>

</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <!-- Logo -->
        <div class="header__left">
            <img src="../images/logo.svg" alt="Logo" class="logo" />
        </div>

        <!-- Navigation (Desktop / Mobile) -->
        <nav class="header__nav" id="header-nav">
            <ul>
                <li><a href="home.php" class="<?= ($page == 'home') ? 'active' : '' ?>">Accueil</a></li>
                <li><a href="service.php" class="<?= ($page == 'service') ? 'active' : '' ?>">Services</a></li>
                <li><a href="aboutus.php" class="<?= ($page == 'aboutus') ? 'active' : '' ?>">À propos</a></li>
                <li><a href="home.php#contact">Contact</a></li>
                <!-- Liens seulement pour mobile (profils & réservation) -->
                <li><a href="info.php" class="mobile-only <?= ($page == 'info') ? 'active' : '' ?>">Profile</a></li>
                <li><a href="rdv.php" class="mobile-only <?= ($page == 'rdv') ? 'active' : '' ?>">Réservez</a></li>
            </ul>
        </nav>

        <!-- Avatar + bouton Réservez (version desktop) -->
        <div class="header__btns" id="header-btn">
            <a href="info.php">
                <img src="../images/avatar.svg" alt="Avatar" />
            </a>
            <a href="rdv.php" class="btn">Réservez</a>
        </div>

        <!-- Icône hamburger (affichage mobile) -->
        <div class="hamburger" id="hamburger">
            <img src="../images/ham-icon.svg" alt="Menu hamburger" />
        </div>
    </header>
