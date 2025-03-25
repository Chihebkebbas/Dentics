
    <!-- SECTION PRINCIPALE -->
    <section class="main">
        <!-- FORMULAIRE -->
        <div class="appointment-form">
            <h1>Prendre un RDV</h1>
            <p>Planifiez votre consultation en quelques clics</p>

             <!-- On fait un POST vers index.php?page=rdv -->
        <form method="POST" action="index.php?page=rdv">

            <div class="input-group">
                <img src="images/icon-nom-signup.png" alt="Nom" />
                <input type="text" name="nom" id="nom" placeholder="Nom et prénom" required />
            </div>

            <div class="input-group">
                <img src="images/icon-mail-login.png" alt="Email" />
                <input type="email" name="email" id="email" placeholder="Adresse Email" required />
            </div>

            <div class="input-group">
                <img src="images/mdi_phone.svg" alt="Téléphone" />
                <input type="tel" name="telephone" id="telephone" placeholder="Téléphone" required />
            </div>

            
            <div class="input-group select-group">
                <img src="images/icon-teeth.svg" alt="Dentiste" />
                <select name="dentist" required >
                    <option value="" disabled selected>Choisissez un dentiste</option>
                    <?php 
                        if (isset($dentists)): ?>
                        <?php foreach ($dentists as $dent): ?>
                            <option value="<?= $dent['id_dentist'] ?>">
                                <?= htmlspecialchars($dent['nom']) ?>
                            </option>
                        <?php endforeach; ?> */
                    <?php endif; ?>
                </select>
                <img src="images/icon-park-outline_down.svg" class="custom-icon" alt="Flèche" />
            </div> 

            <div class="input-group select-group">
                <img src="images/icon-calendar.svg" alt="Calendar" />
                <select name="date_rdv" required>
                    <option value="" disabled selected>Choisissez la date</option>
                    <?php 
                    if (!empty($disponibilites['dates'])) {
                        foreach ($disponibilites['dates'] as $uneDate) {
                            echo '<option value="' . $uneDate . '">' . $uneDate . '</option>';
                        }
                    }
                    ?>
                </select>
                <img src="images/icon-park-outline_down.svg" class="custom-icon" alt="Flèche" />
            </div>

            <div class="input-group select-group">
                <img src="images/icon-alarm.svg" alt="Alarm" />
                <select name="heure_rdv" required>
                    <option value="" disabled selected>Choisissez l'heure</option>
                    <?php 
                    if (!empty($disponibilites['heures'])) {
                        foreach ($disponibilites['heures'] as $uneHeure) {
                            echo '<option value="' . $uneHeure . '">' . $uneHeure . '</option>';
                        }
                    }
                    ?>
                </select>
                <img src="images/icon-park-outline_down.svg" class="custom-icon" alt="Flèche" />
            </div>
                <!--
                <div class="date-time-container">
                    <div class="input-group">
                        <img src="images/icon-calendar.svg" alt="Calendrier" />
                        <input type="date" required />
                        <img src="images/icon-park-outline_down.svg" class="custom-icon" alt="Flèche" />
                    </div>

                    <div class="input-group">
                        <img src="images/icon-alarm.svg" alt="Horloge" />
                        <input type="time" required />
                    </div>
                </div> -->

                <button type="submit" class="btn">Prendre un rendez-vous</button>
            </form>
        </div>

        <!-- IMAGE ILLUSTRATIVE -->
        <div class="main-photo">
            <img src="images/rdv.png" alt="Illustration RDV" />
        </div>
    </section>

    <!-- SCRIPT JS -->
    <script src="../js/script.js"></script>
</body>

</html>