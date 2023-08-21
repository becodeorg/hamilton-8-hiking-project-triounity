<?php

namespace core;

class Router
{
    public function route(string $uri_path): void
    {
        switch ($uri_path) {
            case "/":
            case "/index":
            case "tag":
                if (empty($_GET['ID'])) throw new Exception("Please provide a tag ID");
                $tagController = new tagcontroller();
                $tagController->showHikesByCategory($_GET['ID']);
                break;
            case "/home":
                echo "It works!";
                break;
            default:
                break;
        }
    }
}