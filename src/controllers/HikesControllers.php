<?php
declare(strict_types=1);

namespace controllers;

use Models\Hikes;



class HikesControllers
{
    public function index()
    {
        try {
            $hikes = (new Hikes())->AfficherTout(20);

            // 3 - Affichage de la liste des produits
            include 'views/layout/header.view.php';
            include 'views/index.view.php';
            include 'views/layout/footer.view.php';
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}