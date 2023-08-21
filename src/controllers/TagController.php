<?php


namespace controllers;

use models\Tag;
use Exception;

class TagController extends Tag
{
    public function tagIndex()
    {
        try {
            $tags = Tag::findAll(20);

            // 3 - Affichage de la liste des produits
            include 'views/layout/header.view.php';
            include 'views/index.view.php';
            
            
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }


    public function show(string $ID)
    {
        try {
            $tag = Tag::find($ID);

            if (empty($tag)) {
                (new PageController())->page_404();
                die;
            }

            // 3 - Afficher la page
            include 'views/layout/header.view.php';
            include 'views/tag.view.php';
            include 'views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }
}