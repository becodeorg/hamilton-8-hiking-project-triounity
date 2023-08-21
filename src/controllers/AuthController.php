<?php


namespace controllers;


//use Exception;
use models\Database;
use core\Error;
use models\User;

class AuthController extends Database
{

    public function register(string $firstnameInput, string $lastnameInput, string $nicknameInput, string $emailInput, string $passwordInput)
    {
        if (empty($firstnameInput) || empty($lastnameInput) || empty($nicknameInput) || empty($emailInput) || empty($passwordInput)) {
            //throw new Exception('Formulaire non complet');
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
            //throw new Exception('Formulaire non complet');
            Error::showError('Formulaire non complet');
        }

        $nickname = htmlspecialchars($nicknameInput);

        $stmt = Database::query(
            "SELECT * FROM Users WHERE nickname = ?",
            [$nickname]
        );

        $user = $stmt->fetch();

        if (empty($user)) {
            //throw new Exception('Mauvais nom d\'utilisateur');
            Error::showError('Mauvais mot nom d\'utilisateur');
        }

        if (password_verify($passwordInput, $user['password']) === false) {
            //throw new Exception('Mauvais mot de passe');
            Error::showError('Mauvais mot de passe');
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
        $userData = $userModel->getByUsername($_SESSION['Users']['id']);

        include 'views/layout/header.view.php';
        include 'views/update_profile.view.php';
        include 'views/layout/footer.view.php';
    }

    public function updateProfile(string $firstname, string $lastname, string $nickname, string $email, string $password)
    {
        $userModel = new User();
        $userData = $userModel->getByUsername($_SESSION['Users']['id']);

        if (password_verify($password, $userData['password'])) {
            // Mot de passe correct, mettre à jour les données
            $userModel->updateProfile($_SESSION['Users']['id'], $firstname, $lastname, $nickname, $email);

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