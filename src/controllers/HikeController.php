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
            include 'views/layout/header.view.php';
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
            include 'src/views/layout/header.view.php';
            include 'src/views/hike.view.php';
            include 'src/views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }

    public function showCreationHike(): void
    {
        include 'src/views/layout/header.view.php';
        include 'src/views/CreationHike.view.php';
        include 'src/views/layout/footer.view.php';

    }

    public function creationHikesVerification(array $post): void
    {
        try {
            /*
             * 101 => les champs ne sont pas remplis
             * 500 => erreur serveur
             */

            // si formulaire vide
            if (
                empty($post['name']) ||
                empty($post['distance']) ||
                empty($post['duration']) ||
                empty($post['elevation_gain']) ||
                empty($post['description']) ||
                empty($post['image_url'])
            ) {
                throw new Exception("101");
            }

            // create new var with value without undesired special chars
            $name = htmlspecialchars($post['name']);
            $distance = htmlspecialchars($post['distance']);
            $duration = htmlspecialchars($post['duration']);
            $elevation_gain = htmlspecialchars($post['elevation_gain']);
            $description = htmlspecialchars($post['description']);
            $image_url = htmlspecialchars($post['image_url']);


            $result = Hike::insertNewHike(
                [
                    "name" => $name,
                    "distance" => $distance,
                    "duration" => $duration,
                    "elevation_gain" => $elevation_gain,
                    "description" => $description,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                    "image_url" => $image_url,
                    "ID" => $_SESSION['hiking_user']['hiking']['ID']
                ]
            );

            if (!$result["bool"]) {
                throw new Exception("500");
            }

            $newHikeId = $result["hiking"]["ID"];


            header('Location: /hike?ID=' . $newHikeId);
            exit;
        } catch (Exception $e) {
            header('Location: /creation?error_value=' . $e->getMessage());
        }
    }

    public function showUpdateHikeForm(string|int $ID): void
    {
        $hikeDetails = Hike::getHikeById($ID);


        if (isset($_GET['error_value'])) {
            $error_value = $_GET['error_value'];
        }

        include_once "src/views/layout/header.view.php";
        include_once "src/views/ModificationHike.view.php";
        include_once "src/views/layout/footer.view.php";
    }
}