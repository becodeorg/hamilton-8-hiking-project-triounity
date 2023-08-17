<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use controllers\AuthController;
use controllers\HikesControllers;
use controllers\PageControllers;

try {
    $url_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
    $method = $_SERVER['REQUEST_METHOD']; // GET -- POST

    switch ($url_path) {
        case "":
        case "/index.php":
            $hikeController = new HikesControllers();
            $hikeController->index();
            break;
        case "product":
            if (empty($_GET['productCode'])) throw new Exception("Please provide a product code");
            $hikeController = new HikesControllers();
            $hikeController->show($_GET['name']);
            break;

        default:
            $pageController = new PageControllers();
            $pageController->page_404();
    }
} catch (Exception $e) {
    $pageController = new PageControllers();
    $pageController->page_500($e->getMessage());
}