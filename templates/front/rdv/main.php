
    <!-- SECTION PRINCIPALE -->
    <section class="main">
        <!-- FORMULAIRE -->
        <div class="appointment-form">
            <h1>Prendre un RDV</h1>
            <p>Planifiez votre consultation en quelques clics</p>

            <form>
                <div class="input-group">
                    <img src="images/mdi_phone.svg" alt="Téléphone" />
                    <input type="tel" placeholder="Téléphone" required />
                </div>

                <div class="input-group select-group">
                    <img src="images/icon-teeth.svg" alt="Dentiste" />
                    <select required>
                        <option value="" disabled selected>Choisissez un dentiste</option>
                        <option value="dentist1">Dr. Dupont</option>
                        <option value="dentist2">Dr. Martin</option>
                        <option value="dentist3">Dr. Lefevre</option>
                    </select>
                    <img src="images/icon-park-outline_down.svg" class="custom-icon" alt="Flèche" />
                </div>

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
                </div>

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