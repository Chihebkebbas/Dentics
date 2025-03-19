<!-- SECTION CONTACT -->
<section class="contact" id="contact">
    <div class="contact__left">
        <h2>Faites-Nous Savoir Ce Que Vous En Pensez !</h2>
        <p>
            Nous serions ravis de connaître votre avis et de savoir comment
            nous pouvons améliorer nos services pour mieux vous satisfaire.
        </p>
        <div class="contact__cards">
            <div class="contact__card">
                <img src="images/icon-mail.svg" alt="email-icon" />
                <div>
                    <h6>Email :</h6>
                    <p>contact@dentics.fr</p>
                </div>
            </div>
            <div class="contact__card">
                <img src="images/icon-phone.svg" alt="phone-icon" />
                <div>
                    <h6>Téléphone :</h6>
                    <p>(+33) 699-999999</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULAIRE DE CONTACT -->
    <form>
        <label for="nom">Nom et Prénom :</label>
        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required />

        <label for="email">Adresse Email :</label>
        <input type="email" name="email" id="email" placeholder="Entrez votre adresse email" required />

        <label for="message">Tapez votre message :</label>
        <textarea name="message" id="message" placeholder="Entrez votre message" required></textarea>

        <button class="btn" type="submit">Envoyer</button>
    </form>
</section>