<?php
declare(strict_types=1);

namespace app\controllers;

use app\models\hike;
use Exception;


class hikecontroller extends hike
{
    public function index()
    {
        try {
            $hikes = hike::findAll(20);

            include 'app/views/index.view.php';
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function show(string $ID)
    {
        try {
            $hike = (new hike())->find($ID);

            if (empty($hike)) {
                (new PageController())->page_404();
                die;
            }

            include 'app/views/layout/header.view.php';
            include 'app/views/hike.view.php';
            include 'app/views/layout/footer.view.php';

        } catch (Exception $e) {
            (new PageController())->page_500($e->getMessage());
        }
    }




}