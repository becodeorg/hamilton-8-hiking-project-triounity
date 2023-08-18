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
            case "/creation":
                $hikeController = new HikeController();
                if (empty($_POST)) {
                    $hikeController->showCreationHikes();
                } else {
                    $hikeController->creationHikesVerification($_POST);
                }
                break;
            case "/login":
                $authController = new AuthController();
                if ($method === "GET") $authController->showLoginForm();
                if ($method === "POST") $authController->login($_POST['nickname'], $_POST['password']);
                echo($method);
                break;
            case "/logout":
                $authController = new AuthController();
                $authController->logout();
                break;
            case "/register":
                $authController = new AuthController();
                if ($method === "GET") $authController->showRegistrationForm();
                if ($method === "POST") $authController->register($_POST['firstname'], $_POST['lastname'], $_POST['nickname'], $_POST['email'], $_POST['password']);
                break;
            default:
                break;
        }
    }
}