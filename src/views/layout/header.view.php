<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache, must-revalidate">
    <link rel="stylesheet" href="style.css?v=n" type="text/css" />
    <script src="https://kit.fontawesome.com/9dacd2a25d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/assets/img/favicon.ico"/>
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
            <form class="searchBar">
                <input type="search" placeholder="Search..." class="searchInput" required>
                <button class="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navLinks" id="navLinks">
                <li><a href="/">Home</a></li>
                <li><a href="/">Hikes</a></li>
                <li><a href="/update-profile"><i class="fa-solid fa-user"></i></a></li>
                <?php if (!empty($_SESSION['Users'])): ?>
                    Welcome <?= $_SESSION['Users']['nickname'] ?>
                    <li><a href="/logout"><img src="./assets/img/loggout.gif" /></a></li>
                <?php else: ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                <?php endif; ?> 
            </ul>
            <div class="menuIcon" id="menuIcon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>
    <main>
<?php
  /**
   * Empêcher la mise en cache des pages avec PHP
   *
   * La fonction doit-être appellée avant toute balise HTML,
   * espace blanc, echo(), print()...
   *
   * @param : void
   * @return : void
   */
  /*function empecherLaMiseEnCache()
  {
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-cache, must-revalidate');
  }*/
?>