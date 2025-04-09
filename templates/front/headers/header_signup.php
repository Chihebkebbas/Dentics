<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/nfs/data01/data/uapv25/uapv2500228/public_html/css/signup.css" />
    <title>Dentics - Sign Up</title>
    
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
                <!-- On peut placer ici d’autres liens ou juste ceux version mobile -->
                <li><a href="/nfs/data01/data/uapv25/uapv2500228/public_html/index.php?page=login" class="mobile-only">Connexion</a></li>
                <li><a href="signup.php" class="mobile-only">S'inscrire</a></li>
            </ul>
        </nav>

        <!-- Boutons (Sign Up / Login) version desktop -->
        <div class="header__btns" id="header-btn">
            <a href="/nfs/data01/data/uapv25/uapv2500228/public_html/index.php?page=login" class="sign-up">Connexion</a>
            <a href="signup.php" class="login">S'inscrire</a>
        </div>

        <!-- Icône hamburger (mobile) -->
        <div class="hamburger" id="hamburger">
            <img src="../images/ham-icon.svg" alt="Menu hamburger" />
        </div>
    </header>