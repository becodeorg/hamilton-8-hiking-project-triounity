<?php

namespace controllers;

class PageController
{
    public function page_404(): void
    {
        include 'src/views/layout/header.view.php';
        include 'src/views/404.view.php';
        include 'src/views/layout/footer.view.php';
    }

    public function page_500(string $errorMessage = ""): void
    {
        $error = $errorMessage;
        include 'src/views/layout/header.view.php';
        include 'src/views/500.view.php';
        include 'src/views/layout/footer.view.php';
    }
}