<?php
declare(strict_types=1);

namespace controllers;

use Exception;
use models\Database;

class AuthController extends Database
{
    public function addAHike(): void
    {
        include 'src/views/form.view.php';


    }

}