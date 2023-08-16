<?php

namespace core;

use Exception;

class Router
{
    /**
     * @throws Exception
     */
    public function route(string $uri_path): void
    {
        switch ($uri_path) {
            case "/":
            case "/index":
            case "/hikes": // Assurez-vous d'utiliser /hikes au lieu de "hikes"
                if (empty($_GET['hikeCode'])) throw new Exception("Please select a hike"); // Correction: Utilisez 'hikeCode' au lieu de 'hikesCode'
                $hikeController = new HikeController(); // Assurez-vous que HikeController est correctement importé
                $hikeController->show($_GET['hikeCode']);
                break;
            case "/home":
                echo "It works!";
                break;
            default:
                break;
        }
    }
}
