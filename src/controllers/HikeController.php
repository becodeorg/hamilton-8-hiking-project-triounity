<?php

namespace controllers;


use models\Hike;
use Exception;


class HikeController extends Hike
{
    public function hikeIndex()
    {
        try {
            $hikes = Hike::findAll();

            // 3 - Affichage de la liste des produits
            
            include 'views/index.view.php';
            include 'views/layout/footer.view.php';

        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function show(string $ID)
    {
        try {
            $hike = Hike::find($ID);

            if (empty($hike)) {
                (new PageController())->page_404();
                die;
            }

            // 3 - Afficher la page
            include 'views/layout/header.view.php';
            include 'views/hike.view.php';
            include 'views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }
}