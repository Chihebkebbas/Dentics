  <!-- MAIN -->
  <main>

        <p id="welcome-msg" style="text-align:center; background:#fff; padding:10px; font-weight:bold; transition: opacity 1s;">
            Bienvenue, <?= htmlspecialchars($_COOKIE['login'] ?? 'Incconu (Cookies pas accetées)') ?> !
        </p>

        <!-- HERO -->
        <section class="hero">
            <div class="hero__text">
                <h1>Un Sourire Éclatant, Des Soins De Qualité</h1>
                <p>
                    Des services personnalisés et de haute qualité, conçus pour préserver
                    votre sourire, améliorer votre confort et garantir une santé
                    bucco-dentaire optimale tout au long de votre vie.
                </p>
                <div class="hero__btns">
                    <a href="rdv.php" class="btn-hero">Réservez</a>
                    <a href="service.php" class="btn2-hero">En savoir plus</a>
                </div>
            </div>
            <div class="hero__image">
                <img src="../images/hero.svg" alt="Hero Image" />
            </div>
        </section>

        <!-- CARTES DE SERVICES -->
        <section class="cards">
            <article>
                <img src="../images/icon-card1.svg" alt="Traitement De Canal" />
                <h3>Traitement De Canal</h3>
                <p>
                    Le traitement de canal permet de traiter l'infection de la pulpe dentaire
                    pour sauver la dent et éviter l'extraction.
                </p>
            </article>
            <article>
                <img src="../images/icon-card2.svg" alt="Dentiste Esthétique" />
                <h3>Dentiste Esthétique</h3>
                <p>
                    Le dentiste esthétique se spécialise dans l'embellissement du sourire
                    en corrigeant les imperfections dentaires grâce à des traitements adaptés.
                </p>
            </article>
            <article>
                <img src="../images/icon-card3.svg" alt="Implant Dentaire" />
                <h3>Implant Dentaire</h3>
                <p>
                    Un implant dentaire est une racine artificielle en titane insérée dans
                    l'os de la mâchoire pour soutenir une prothèse dentaire.
                </p>
            </article>
        </section>

        <!-- SECTION BIEN-ÊTRE -->
        <section class="bien-etre">
            <div class="bien-etre__text">
                <h2>Un Bien-Être Dentaire Durable</h2>
                <p>
                    Profitez de soins modernes et adaptés à vos besoins, pour un sourire
                    éclatant et une santé bucco-dentaire préservée à chaque étape
                    de votre vie.
                </p>
                <a href="rdv.php" class="btn">Prenez un rendez-vous</a>
            </div>
            <div class="bien-etre__image">
                <img src="../images/hero2.svg" alt="hero2 image" />
            </div>
        </section>

        <!-- SECTION QUALITÉS -->
        <section class="qualites">
            <div class="qualites__image">
                <img src="../images/hero3.svg" alt="hero3 image" />
            </div>
            <div class="qualites__text">
                <h2>Votre Sourire Mérite Le Meilleur !</h2>
                <ul>
                    <li>
                        <img src="../images/icon-certified.svg" alt="icon-certified" />
                        Des soins réalisés par des spécialistes passionnés et qualifiés.
                    </li>
                    <li>
                        <img src="../images/icon-certified.svg" alt="icon-certified" />
                        Chaque patient est unique, chaque soin est adapté.
                    </li>
                    <li>
                        <img src="../images/icon-certified.svg" alt="icon-certified" />
                        Un environnement apaisant pour une expérience sans stress.
                    </li>
                    <li>
                        <img src="../images/icon-certified.svg" alt="icon-certified" />
                        Des horaires adaptés à votre rythme de vie.
                    </li>
                </ul>
                <a href="rdv.php" class="btn">Réservez</a>
            </div>
        </section>

         <!-- SECTION CONTACT insérée exactement au bon endroit -->
        <?php include('../templates/front/home/contact.php'); ?>

        <!-- SERVICES EXPLORE -->
        <section class="services-explore">
            <div class="services-explore__text">
                <h2>Explorez l’éventail complet de nos services de santé</h2>
                <p>
                    Prenez soin de votre santé en découvrant nos soins personnalisés
                    et traitements adaptés à vos besoins.
                </p>
                <a href="service.php" class="btn">Nos services</a>
            </div>
            <div class="services-explore__image">
                <img src="../images/hero4.svg" alt="hero4 image" />
            </div>
        </section>
    </main>

    <?php if (!isset($_COOKIE['cookies_acceptes'])): ?>
    <div style="position: fixed; bottom: 0; width: 100%; background: #eee; padding: 10px; text-align: center; z-index: 1000;">
        Ce site utilise des cookies pour améliorer votre expérience.
        <a href="?accept-cookies=1" style="background: #1376F8; padding: 5px 10px; border-radius: 4px; color: white; text-decoration: none;">Accepter</a>
    </div>
    <?php endif; ?>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
        const msg = document.getElementById('welcome-msg');
        if (msg) {
            setTimeout(() => {
            msg.style.opacity = '0'; // effet fondu
            setTimeout(() => {
                msg.remove(); // supprime le message après fondu
            }, 1000); // attendre la fin de la transition
            }, 5000); // attendre 5 secondes
        }
        });
    </script>