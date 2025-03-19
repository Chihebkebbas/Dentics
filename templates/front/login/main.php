<!-- SECTION PRINCIPALE -->
<section class="main">
    <!-- IMAGE (masquée en mobile) -->
    <div class="main-photo">
        <img src="images/login.png" alt="login image" />
    </div>

    <!-- FORMULAIRE DE LOGIN -->
    <div class="login-forum">
        <h1>Bienvenue</h1>
        <p>Connectez-vous pour gérer vos rendez-vous et suivis dentaires</p>

        <form>
            <div class="email-label">
                <img src="images/icon-mail-login.png" alt="icon mail" />
                <input type="email" name="email" id="email" placeholder="Entrez votre email" required />
            </div>

            <div class="password-label">
                <img src="images/icon-password-login.png" alt="icon password" />
                <input type="password" name="password" id="password" placeholder="Mot de passe" required />
            </div>

            <a href="#">Mot de passe oublié ?</a>

            <button class="btn" type="submit">Connexion</button>
        </form>

        <p>
            Pas encore membre ? <a href="index.php?page=signup">Créez un compte</a>
        </p>
    </div>
</section>

<!-- SCRIPT JS -->
<script src="js/script.js"></script>

</body>

</html>