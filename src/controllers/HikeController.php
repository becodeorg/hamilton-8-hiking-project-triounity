<?php


namespace controllers;

use Exception;
use models\Hike;

class HikeController extends Database
{


    public function AddAHike(): void
    {
        include 'src/views/form.view.php';


    }

}