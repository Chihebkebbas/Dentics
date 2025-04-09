<?php

/**
 * Envoie un email via le formulaire de contact.
 *
 * Cette fonction utilise la bibliothèque PHPMailer pour envoyer un email
 * contenant les informations fournies par l'utilisateur via un formulaire
 * de contact. Les informations incluent le nom, l'adresse email et le contenu
 * du message.
 *
 * @param string $nom Le nom de l'expéditeur.
 * @param string $email L'adresse email de l'expéditeur.
 * @param string $contenu Le contenu du message envoyé.
 *
 * @return bool Retourne true si l'email a été envoyé avec succès, sinon false.
 *
 * @throws \PHPMailer\PHPMailer\Exception Si une erreur survient lors de l'envoi de l'email.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/lib/PHPMailer/PHPMailer.php';
require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/lib/PHPMailer/Exception.php';
require_once '/nfs/data01/data/uapv25/uapv2500228/public_html/lib/PHPMailer/SMTP.php';

function envoyerMailContact(string $nom, string $email, string $contenu): bool
{
    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kebbas.chihebeddine1@gmail.com'; // Ton adresse Gmail
        $mail->Password   = 'agvkbtooblwjvyrn'; // Mot de passe d'application Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Infos expéditeur et destinataire
        $mail->setFrom('kebbas.chihebeddine1@gmail.com', 'Formulaire Dentics');
        $mail->addAddress('kebbas.chihebeddine1@gmail.com'); // L'adresse qui reçoit le mail

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'NOUVEAU MESSAGE CONTACT - DENTICS';
        $mail->Body    = "<h2>Message reçu via le formulaire</h2>"
                       . "<p><strong>Nom :</strong> $nom</p>"
                       . "<p><strong>Email :</strong> $email</p>"
                       . "<p><strong>Message :</strong><br>$contenu</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Erreur envoi mail: {$mail->ErrorInfo}");
        return false;
    }
}
