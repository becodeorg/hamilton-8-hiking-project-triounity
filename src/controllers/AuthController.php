<?php


namespace controllers;


use models\Database;
//use core\Error;
use Exception;
use models\User;
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

class AuthController extends Database
{

    public function register(string $firstnameInput, string $lastnameInput, string $nicknameInput, string $emailInput, string $passwordInput)
    {
        if (empty($firstnameInput) || empty($lastnameInput) || empty($nicknameInput) || empty($emailInput) || empty($passwordInput)) {
            throw new Exception('Formulaire non complet');
        }

        $firstname = htmlspecialchars($firstnameInput);
        $lastname = htmlspecialchars($lastnameInput);
        $nickname = htmlspecialchars($nicknameInput);
        $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
        $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);
        

        Database::query(
            "
                INSERT INTO Users (firstname, lastname, nickname, email, password) 
                VALUES (?, ?, ?, ?, ?)
            ",
            [$firstname, $lastname, $nickname, $email, $passwordHash]
        );

        $_SESSION['Users'] = [
            'id' => Database::lastInsertId(),
            'nickname' => $nickname,
            'email' => $email
        ];

        // Envoi de l'e-mail de confirmation
        try {
            // Créer et configurer l'objet PHPMailer
            $mail = new PHPMailer(true);
            //$mail->setDebugOutput('html'); // Pour afficher le journal dans le HTML de la page
            //$mail->Debugoutput = 'log.txt'; // Pour enregistrer le journal dans un fichier log.txt
            $mail->CharSet = 'UTF-8'; // Choix de l'encodage
            $mail->SetLanguage('fr'); // Langue des erreurs

            $mail ->SMTPDebug = 2;
            $mail->isSMTP();

            $mail->Host = getenv('EMAIL_HOST'); // Adresse du serveur SMTP
            $mail->SMTPAuth = true; // Activer l'authentification SMTP

            $mail->Username = getenv('EMAIL_USERNAME'); // Votre nom d'utilisateur SMTP
            $mail->Password = getenv('EMAIL_PASSWORD'); // Votre mot de passe SMTP
            //$mail->setCertainty('/cacert.pem');
            $mail->SMTPSecure = 'ssl'; // Utiliser TLS pour la sécurité ou 'tls'
            $mail->Port = 465; // Port SMTP ou 587 pour 'tls'

            $mail->setFrom(getenv('EMAIL_USERNAME'), 'randomarre'); // Adresse et nom de l'émetteur
            $mail->addAddress($email, 'NATHANLOMBARDELLI@HOTMAIL.COM', 'zychsteeve4@gmail.com'); // Adresse et nom du destinataire

            $mail->isHTML(true);

            $mail->Subject = 'Confirmation Email'; // Sujet de l'e-mail
            $mail->Body = // Corps de l'e-mail
            '<html>
                <body>
                    <h1>Bienvenue chez RandoMarre</h1>
                </body>
            </html>'; 
            $mail->AltBody = 'This is the plain text version of the email.'; // Version texte brut de l'e-mail

            // Envoyer l'e-mail
            $mail->send();
            
            // Rediriger l'utilisateur vers une page de succès
            // ou afficher un message de succès
            // ...
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            // Gérer les erreurs d'envoi d'e-mail
            error_log("Erreur d'envoi d'e-mail : " . $e->getMessage());
        }

        // Rediriger l'utilisateur vers une page de succès ou
        // afficher un message de succès pour l'inscription
        http_response_code(302);
        header('location: /');
    }

    public function showRegistrationForm()
    {
        include 'views/layout/header.view.php';
        include 'views/register.view.php';
        include 'views/layout/footer.view.php';
    }

    public function login(string $nicknameInput, string $passwordInput)
    {
        if (empty($nicknameInput) || empty($passwordInput)) {
            throw new Exception('Formulaire non complet');
            //Error::showError('Formulaire non complet');
        }

        $nickname = htmlspecialchars($nicknameInput);

        $stmt = Database::query(
            "SELECT * FROM Users WHERE nickname = ?",
            [$nickname]
        );

        $user = $stmt->fetch();

        if (empty($user)) {
            throw new Exception('Mauvais nom d\'utilisateur');
            //Error::showError('Mauvais mot nom d\'utilisateur');
        }

        if (password_verify($passwordInput, $user['password']) === false) {
            throw new Exception('Mauvais mot de passe');
            //Error::showError('Mauvais mot de passe');
        }

        $_SESSION['Users'] = [
            'id' => $user['id'],
            'nickname' => $nickname,
            'email' => $user['email']
        ];

        // Redirect to home page
        http_response_code(302);
        header('location: /');
    }

    public function showLoginForm()
    {
        include 'views/layout/header.view.php';
        include 'views/login.view.php';
        include 'views/layout/footer.view.php';
    }

    public function logout()
    {
        unset($_SESSION['Users']);
        http_response_code(302);
        header('location: /');
    }

    public function showUpdateProfileForm()
    {
        $userModel = new User();
        //echo $_SESSION['Users']['nickname'];
        $userData = $userModel->getByUsername($_SESSION['Users']['nickname']);
        var_dump($userData) ;
        include 'views/layout/header.view.php';
        include 'views/updateProfile.view.php';
        include 'views/layout/footer.view.php';
    }

    public function updateProfile(string $firstname, string $lastname, string $nickname, string $email, string $password)
    {
        $userModel = new User();
        //$database = new Database();
        var_dump($_SESSION['Users']);
        $userData = $userModel->getByUsername($_SESSION['Users']['ID']);

        if (password_verify($password, $userData['password'])) {
            // Mot de passe correct, mettre à jour les données
            $userModel->updateProfile($_SESSION['Users']['ID'], $firstname, $lastname, $nickname, $email);

            // Mettre à jour les données de session
            $_SESSION['Users']['nickname'] = $nickname;
            $_SESSION['Users']['email'] = $email;

            // Rediriger vers la page de profil mise à jour
            http_response_code(302);
            header('location: /');
        } else {
            // Mot de passe incorrect, afficher une erreur
            
            include 'views/layout/header.view.php';
            echo "Current password is incorrect. Please try again.";
            include 'views/updateProfile.view.php';
            include 'views/layout/footer.view.php';
        }
    }
}