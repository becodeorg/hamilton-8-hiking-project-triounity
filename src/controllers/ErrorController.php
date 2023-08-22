<?php

namespace controllers;

use Exception;
use Throwable;

class FormValidationException extends \Exception
{
    public function __construct($message = "Erreur de validation de formulaire", $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);

        // En cas d'erreur, afficher la page d'erreur 404
        $authController = new AuthController();
        $authController->showError404();
        exit;
    }
}

class AuthException extends \Exception
{
    public function __construct($message = "Erreur d'authentification", $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);

        // En cas d'erreur, afficher la page d'erreur 404
        $authController = new AuthController();
        $authController->showError500();
        exit;
    }
}

class EmailException extends \Exception
{
    public function __construct($message = "Erreur lors de l'envoi de l'email", $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

class ErrorHandler
{
    public static function handleError(\Throwable $e, string $message)
    {
        // Enregistrement de l'erreur dans les logs
        error_log($message);

        // Rediriger l'utilisateur vers une page d'erreur personnalisée
        http_response_code(500); // Code HTTP pour erreur interne du serveur
        header('Location: /error-page.php'); // Remplacez "error-page.php" par le chemin de votre page d'erreur
        exit;
    }
}

class NotFoundException extends Exception
{
    public function __construct($message = "Not Found", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous); 
    }
}