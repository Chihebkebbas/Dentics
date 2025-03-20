
    <!-- SECTION PRINCIPALE -->
    <section class="main">
        <!-- FORMULAIRE SIGNUP -->
        <div class="signup-forum">
            <h1>S’inscrire</h1>
            <p>Rejoignez-nous pour un sourire éclatant !</p>
            <form>
                <div class="email-label">
                    <img src="images/icon-nom-signup.png" alt="icon nom" />
                    <input type="text" name="nom" id="nom" placeholder="Nom et Prénom" required />
                </div>

                <div class="email-label">
                    <img src="images/icon-mail-login.png" alt="icon mail" />
                    <input type="email" name="email" id="email" placeholder="Adresse Email" required />
                </div>

                <div class="password-label">
                    <img src="images/icon-password-login.png" alt="icon password" />
                    <input type="password" name="password" id="password" placeholder="Mot de Passe" required />
                </div>

                <div class="password-label">
                    <img src="images/icon-password-login.png" alt="icon password" />
                    <input type="password" name="confirm-password" id="confirm-password"
                        placeholder="Confirmez le mot de passe" required />
                </div>

                <div class="check">
                    <input type="checkbox" id="check-conditions" />
                    <label for="check-conditions">Accepter les conditions générales.</label>
                </div>

                <button class="btn" type="submit">Créer un compte</button>
            </form>

            <p>
                Vous avez déjà un compte ?
                <a href="login.html">Connectez-vous.</a>
            </p>
        </div>

        <!-- PHOTO À DROITE -->
        <div class="main-photo">
            <img src="images/signup.png" alt="Inscription image" />
        </div>
    </section>

    <!-- SCRIPT JS -->
    <script src="../js/script.js"></script>
</body>

</html>