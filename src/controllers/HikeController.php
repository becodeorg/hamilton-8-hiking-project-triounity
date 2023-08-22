<?php

namespace controllers;


use models\Hike;
use Exception;


class HikeController extends Hike
{
    /**
     * Affiche la liste des randonnées.
     */
    public function hikeIndex()
    {
        try {
            $hikes = Hike::findAll();

            // 3 - Affichage de la liste des produits
            include 'views/index.view.php';
            include 'views/layout/footer.view.php';

        } catch (Exception $e) {
            $this->handleError($e, "Erreur lors de l'affichage de la liste des randonnées");
        }
    }

    /**
     * Affiche une randonnée spécifique.
     * @param string $ID Identifiant de la randonnée
     */
    public function show(string $ID)
    {
        try {
            $hike = Hike::find($ID);

            if (empty($hike)) {
                throw new NotFoundException('Randonnée non trouvée');
            }

            // 3 - Afficher la page
            include 'views/layout/header.view.php';
            include 'views/components/hike.view.php';
            include 'views/layout/footer.view.php';

        } catch (NotFoundException $e) {
            $this->showError404($e->getMessage());
        } catch (Exception $e) {
            $this->showError500("Erreur lors de l'affichage de la randonnée");
        }

    }

    public function createHike()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newHikeData = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'distance' => $_POST['distance'],
                'duration' => $_POST['duration']
            ];

            if ($this->create($newHikeData)) {
                echo "Randonnée créée avec succès !";
            } else {
                echo "Erreur lors de la création de la randonnée.";
            }
        }

        // Afficher le formulaire de création de randonnée
        include 'views/layout/header.view.php';
        include 'views/components/create_hike.view.php';
        include 'views/layout/footer.view.php';
    }

    public function updateHike($hikeID)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updatedHikeData = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'distance' => $_POST['distance'],
                'duration' => $_POST['duration']
            ];

            if ($this->update($hikeID, $updatedHikeData)) {
                echo "Randonnée mise à jour avec succès !";
            } else {
                echo "Erreur lors de la mise à jour de la randonnée.";
            }
        }

        $hike = $this->find($hikeID);
        if (!$hike) {
            echo "Randonnée introuvable.";
            return;
        }

        // Afficher le formulaire de mise à jour de randonnée avec les données existantes
        include 'views/layout/header.view.php';
        include 'views/components/update_hike.view.php';
        include 'views/layout/footer.view.php';
    }

    public function deleteHike($hikeID)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->delete($hikeID)) {
                echo "Randonnée supprimée avec succès !";
            } else {
                echo "Erreur lors de la suppression de la randonnée.";
            }
            return;
        }

        $hike = $this->find($hikeID);
        if (!$hike) {
            echo "Randonnée introuvable.";
            return;
        }

        // Afficher la confirmation de suppression de randonnée
        include 'views/layout/header.view.php';
        include 'views/components/delete_hike.view.php';
        include 'views/layout/footer.view.php';
    }

    


/* À corriger, réviser */
    private function handleError(Exception $e, string $message)
    {
        error_log($message);
        // Gérer l'affichage des erreurs, par exemple rediriger vers une page d'erreur
    }

    private function showError404(string $message)
    {
        // Afficher la page d'erreur 404 avec le message fourni
        include 'views/pages/404.view.php';
        exit;
    }

    private function showError500(string $message)
    {
        // Afficher la page d'erreur 500 avec le message fourni
        include 'views/pages/500.view.php';
        exit;
    }
}