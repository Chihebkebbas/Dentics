
  <!-- SECTION PRINCIPALE -->
  <section class="main">
    <!-- TITRE PAGE -->
    <h1 class="page-title">Informations Personnelles</h1>

    <!-- CONTENEUR PRINCIPAL -->
    <div class="content-container">
      <!-- FORMULAIRE D’INFOS PERSO -->
      <div class="info-form">
      <form>
        <div class="form-group">
          <label for="full-name">Nom et prénom</label>
          <div class="input-group">
            <img src="../images/icon-nom-signup.png" alt="Profil" />
            <input type="text" id="full-name" value="<?= htmlspecialchars($nom) ?>" />
          </div>
        </div>

        <div class="form-group">
          <label for="email">Adresse Email</label>
          <div class="input-group">
            <img src="../images/icon-mail-login.png" alt="Email" />
            <input type="email" id="email" value="<?= htmlspecialchars($email) ?>" />
          </div>
        </div>

        <div class="form-group">
          <label for="password">Mot de Passe</label>
          <div class="input-group password-group">
            <img src="../images/icon-password-login.png" alt="Mot de passe" />
            <input type="password" id="password" value="" />
            <img src="../images/icon-eye.svg" class="eye-icon" onclick="togglePassword()" alt="Voir" />
          </div>
        </div>
      </form>

      </div>

      <!-- PHOTO DE PROFIL & BOUTON -->
      <div class="profile-section">
        <div class="profile-pic">
          <img src="../images/profileee.png" alt="Photo de Profil" />
        </div>
        <a href="#" class="edit-photo">Modifier la photo</a>
        <button type="submit" class="btn">Enregistrer</button>
      </div>
    </div>
  </section>

  <!-- DÉCONNEXION -->
  <div class="logout">
    <img src="../images/logout.svg" alt="Déconnexion" />
    <a href="logout.php">Déconnexion</a>
  </div>

  <!-- SCRIPT JS -->
  <script src="../js/script.js"></script>

</body>

</html>