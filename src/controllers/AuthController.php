<?php
declare(strict_types=1);

namespace controllers;

use Exception;
use models\Database;

class AuthController extends Database
{

    public function register(string $usernameInput, string $emailInput, string $passwordInput)
    {
        if (empty($usernameInput) || empty($email) || empty($passwordInput)) {
            throw new Exception('Formulaire non complet');
        }

        $username = htmlspecialchars($usernameInput);
        $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
        $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);

        Database::query(
            "
                INSERT INTO users (username, email, password) 
                VALUES (?, ?, ?)
            ",
            [$username, $email, $passwordHash]
        );

        $_SESSION['user'] = [
            'id' => Database::lastInsertId(),
            'username' => $username,
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

    public function login(string $usernameInput, string $passwordInput)
    {
        if (empty($usernameInput) || empty($passwordInput)) {
            throw new Exception('Formulaire non complet');
        }

        $username = htmlspecialchars($usernameInput);

        $stmt = Database::query(
            "SELECT * FROM users WHERE username = ?",
            [$username]
        );

        $user = $stmt->fetch();

        if (empty($user)) {
            throw new Exception('Mauvais nom d\'utilisateur');
        }

        if (password_verify($passwordInput, $user['password']) === false) {
            throw new Exception('Mauvais mot de passe');
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $username,
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
        unset($_SESSION['user']);
        http_response_code(302);
        header('location: /');
    }
}