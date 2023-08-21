<?php



declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'vendor/autoload.php';
session_start();


use app\controllers\hikecontroller;
use app\controllers\tagcontroller;


try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

    switch ($url_path) {
        case "":
        case "/index.php":
            $tagController = new tagcontroller();
            $tagController->index();
            $hikeController = new hikecontroller();
            $hikeController->index();
            break;
        case "hike":
            if (empty($_GET['ID'])) throw new Exception("Please provide a hike ID");
            $hikeController = new hikecontroller();
            $hikeController->show($_GET['ID']); 
            break;
        case "tag":
            if (empty($_GET['ID'])) throw new Exception("Please provide a tag ID");
    $tagController = new tagcontroller();
    $tagController->showHikesByCategory($_GET['ID']); // Utilisez showHikesByCategory ici
    break;
        default:
            $pageController = new PageController();
            $pageController->page_404();
    }
} catch (Exception $e) {
    $pageController = new PageController();
    $pageController->page_500($e->getMessage());
}
