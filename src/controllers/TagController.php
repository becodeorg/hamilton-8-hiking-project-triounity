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
            include 'src/views/layout/header.view.php';
            include 'src/views/index.view.php';


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
            include 'src/views/layout/header.view.php';
            include 'src/views/tag.view.php';
            include 'src/views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }
}