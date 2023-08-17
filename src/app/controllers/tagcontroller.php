<?php
declare(strict_types=1);

namespace app\controllers;

use app\models\tag;
use Exception;


class tagcontroller extends tag
{
    public function index()
    {
        try {
            $tags = tag::findAll(20);

            // 3 - Affichage de la liste des produits
            include 'app/views/index.view.php';
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function show(string $ID)
    {
        try {
            $tag = (new tag())->find($ID);

            if (empty($tag)) {
                (new PageController())->page_404();
                die;
            }

            // 3 - Afficher la page
            include 'app/views/layout/header.view.php';
            include 'app/views/tag.view.php';
            include 'app/views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }
}