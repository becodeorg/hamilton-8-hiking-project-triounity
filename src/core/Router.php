<?php


namespace core;


use app\controllers\tagcontroller;
use app\controllers\HikeController;
use app\controllers\AuthController;
//use app\controllers\PageController;


use Exception;


class Router
{
    public function route(string $uri_path): void
    {
       $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

        switch ($uri_path) {
            case "/":
            case "/index":
                $tagController = new tagcontroller(); // Change to hikecontroller
                $tagController->index(); // Change to hikeController
                $hikeController = new HikeController(); // Change to hikecontroller
                $hikeController->hikeIndex(); // Change to hikeController
                break;

            case "/hike":
                if (empty($_GET['ID'])) throw new Exception("Please provide a hike ID"); // Change to 'ID'
                $hikeController = new HikeController(); // Change to hikecontroller
                $hikeController->show($_GET['ID']); // Change to hikeController
                break;

            case "/tag":
                if (empty($_GET['ID'])) throw new Exception("Please provide a tag ID"); // Change to 'ID'
                $tagController = new TagController(); // Change to hikecontroller
                $tagController->showHikesByCategory($_GET['ID']); // Change to hikeController
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
            
            case "/profile":
                $authController = new AuthController();
                $authController->showProfile();
                break;

            case "/update-profile":
                $authController = new AuthController();

                if ($method === "GET") {
                    // Afficher le formulaire de mise à jour du profil
                    $authController->showUpdateProfileForm();
                }

                if ($method === "POST") {
                    // Traiter le formulaire de mise à jour du profil
                    $authController->updateProfile(
                        $_POST['firstname'],
                        $_POST['lastname'],
                        $_POST['nickname'],
                        $_POST['email'],
                        $_POST['password'] // Champ pour le mot de passe actuel
                    );
                }
                break;
            
                case "/create-hike":
                    $hikeController = new HikeController();
                    if ($method === "GET") $hikeController->createHike();
                    break;
    
                case "/update-hike":
                    if (empty($_GET['ID'])) throw new Exception("Please provide a hike ID");
                    $hikeController = new HikeController();
                    if ($method === "GET") $hikeController->updateHike($_GET['ID']);
                    break;
    
                case "/delete-hike":
                    if (empty($_GET['ID'])) throw new Exception("Please provide a hike ID");
                    $hikeController = new HikeController();
                    if ($method === "POST") $hikeController->deleteHike($_GET['ID']);
                    break;
    
            default:
                break;
        }
    }
}