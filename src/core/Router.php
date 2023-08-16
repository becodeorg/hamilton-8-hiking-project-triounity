<?php


namespace core;

use controllers\AuthController;



class Router
{
    public function route(string $uri_path): void
    {
       $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

        switch ($uri_path) {
            case "/":
            case "/index":
            case "/home":
                include_once 'views/layout/header.view.php';
                include_once 'views/register.view.php';
                include_once 'views/layout/footer.view.php';
                break;
                case "/login":
                    $authController = new AuthController();
                    if ($method === "GET") $authController->showLoginForm();
                    if ($method === "POST") $authController->login($_POST['username'], $_POST['password']);
                    echo($method);
                    break;
                case "/logout":
                    $authController = new AuthController();
                    $authController->logout();
                    break;
                case "/register":
                    $authController = new AuthController();
                    if ($method === "GET") $authController->showRegistrationForm();
                    if ($method === "POST") $authController->register($_POST['username'],$_POST['email'], $_POST['password']);
                    break;
            default:
                break;
        }
    }
}