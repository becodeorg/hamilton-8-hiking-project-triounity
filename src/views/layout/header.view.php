<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/9dacd2a25d.js" crossorigin="anonymous"></script>
    <title>RandoMarre</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul class="navLogo">
                <li>
                    <a href="/"><img src="/assets/img/logo2.svg" alt="logo" height="80px" width="80px" /></a>
                </li>
                <li>
                    <a href="/">RandoMarre</a>
                </li>
            </ul>
            <ul class="navLinks">
                <li><a href="/">Home</a></li>
                <li><a href="/">Hikes</a></li>
                <li><a href="/">Contact</a></li>
            </ul>
            <ul class="navAuth">
                <?php if (!empty($_SESSION['user'])): ?>
                    Bonjour <?= $_SESSION['user']['username'] ?>
                    <li><a href="/logout"><img src="/assets/img/loggout" /></a></li>
                <?php else: ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                <?php endif; ?>
            </ul>
            <div class="menuIcon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>
    <main>
