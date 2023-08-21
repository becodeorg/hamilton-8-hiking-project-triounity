<?php


namespace core;


use controllers\TagController;
use controllers\HikeController;
use controllers\AuthController;
use controllers\PageController;


use Exception;


class Router
{
    public function route(string $uri_path): void
    {
        $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

        switch ($uri_path) {
            case "/":
            case "/index":
                $tagController = new TagController(); // Change to hikecontroller
                $tagController->tagIndex(); // Change to hikeController
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
                $tagController->show($_GET['ID']); // Change to hikeController
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
            case  "/creationHike":
                $hikeController = new HikeController();
                if (empty($_POST)) {
                    $hikeController-->showCreationHike();

                }else {
                    $hikeController-->creationHikesVerification($_POST);
                }
                break;
            case "/modify":
                if (!empty($_GET)) {
                    if ($_GET['value'] == "account") {
                        $authController = new AuthController();
                        if (empty($_POST)) {
                            $authController->showUpdateProfile();
                        } else {
                            $authController->updateProfileVerification($_POST);
                        }
                    } else if ($_GET['value'] == "hike") {
                        $hikeController = new HikeController();
                        if (empty($_POST)) {
                            $hikeController->showUpdateHikeForm($_GET['hid']);
                        } else {
                            $hikeController->updateHikeVerification($_POST, $_GET['hid']);
                        }
                    }
                }
                break;

            case "/delete":
                if (isset($_GET['ID'])) {
                    $hikeController = new HikeController();
                    $hikeController->deleteHike(htmlspecialchars($_GET['ID']));
                }
                break;

            default:
                $pageController = new PageController();
                $pageController->page_404();
                break;
        }
    }
}