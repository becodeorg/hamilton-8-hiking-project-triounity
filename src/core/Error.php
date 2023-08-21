<?php
declare(strict_types=1);

namespace core;

class Error
{
    public static function showError(string $message): void
    {
        include 'views/layout/header.view.php';
        echo "<div class='error-message'>$message</div>";
        include 'views/layout/footer.view.php';
        exit;
    }
}