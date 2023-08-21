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

            include 'src/views/index.view.php';
            include 'src/views/layout/footer.view.php';

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
            include 'src/views/layout/header.view.php';
            include 'src/views/hike.view.php';
            include 'src/views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }

    public function CreationHike (): void
    {
        include 'src/views/layout/header.view.php';
        include 'src/views/layout/footer.view.php';
        include 'src/views/CreationHike.php';

    }
}