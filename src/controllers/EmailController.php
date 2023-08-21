<?php

namespace controllers;

use PHPMailer\PHPMailer\PHPMailer;

class EmailService
{
    public static function sendConfirmationEmail(string $email, string $nickname)
    {
        try {
            // Créez et configurez l'objet PHPMailer pour l'envoi d'e-mails
            $mail = new PHPMailer(true);
            //$mail->setDebugOutput('html'); // Pour afficher le journal dans le HTML de la page
            //$mail->Debugoutput = 'log.txt'; // Pour enregistrer le journal dans un fichier log.txt
            $mail->CharSet = 'UTF-8'; // Choix de l'encodage
            $mail->SetLanguage('fr'); // Langue des erreurs

            $mail ->SMTPDebug = 0;
            $mail->isSMTP();

            $mail->Host = getenv('EMAIL_HOST'); // Adresse du serveur SMTP
            $mail->SMTPAuth = true; // Activer l'authentification SMTP

            $mail->Username = getenv('EMAIL_USERNAME'); // Votre nom d'utilisateur SMTP
            $mail->Password = getenv('EMAIL_PASSWORD'); // Votre mot de passe SMTP
            //$mail->setCertainty('/cacert.pem');
            $mail->SMTPSecure = 'ssl'; // Utiliser TLS pour la sécurité ou 'tls'
            $mail->Port = 465; // Port SMTP ou 587 pour 'tls'

            $mail->setFrom(getenv('EMAIL_USERNAME'), 'randomarre'); // Adresse et nom de l'émetteur
            $mail->addAddress($email, $nickname); // Adresse et nom du destinataire

            $emailContent = file_get_contents('../email/confirmation_email.html');
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation Email'; // Sujet de l'e-mail
            $mail->Body = $emailContent; // Corps de l'e-mail 
            $mail->AltBody = 'This is the plain text version of the email.'; // Version texte brut de l'e-mail
            // Envoi de l'e-mail
            $mail->send();

        } catch (\Exception $e) {
            throw new EmailException("Erreur lors de l'envoi d'e-mail de confirmation", 0, $e);
        }
    }
}
