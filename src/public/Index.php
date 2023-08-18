<?php



include_once "inc/default.inc.php";


require_once "vendor/autoload.php";

/*

use core\Router;e

$router = new Router();
$router->route(
    parse_url(ee
        $_SERVER['REQUEST_URI'],
        PHP_URL_PATH
    )
);


*/?><!--

-->
<body>
<form method="post" action="#" style="align-self: center">
    <fieldset>
        <label for="name">Titre de votre randonéee</label>
        <input type="text" name="name" id="name" placeholder="Nom..." required>
    </fieldset>
    <fieldset>
        <label for="duration">Durée estimée de votre randonnée</label>
        <input type="time" name="duration" id="duration" required>
    </fieldset>
    <fieldset>
        <label for="distance">Distance kilométrique de votre randonnée</label>
        <input type="number" step="0.1" min="0" name="distance" id="distance" required><p>km</p>
    </fieldset>
    <fieldset>
        <label for="elevation_gain">Dénivelé positif</label>
        <input type="number" name="elevation_gain" id="elevation_gain" required><p>mètres</p>
    </fieldset>
    <fieldset>
        <label>Description</label>
        <input type="text" name="description" id="description" placeholder="Soyez créatif et précis!" required>
    </fieldset>
    <button type="submit">C'est bon, tout est prêt!</button>
</form>

<?php
if (isset($error)):
    if ($error === '404') :?>
<p class="error">La page recherchée n'a pas été trouvée</p>
<?php elseif ($error === '500'):?>
    <p class="error">Il semblerait que l'on ai rencontré une erreur. Veuillez réessayer d'ici quelques minutes.</p>
<?php endif;
endif; ?>


<!--
PERMET DEVOIR QUE LA CONNEXION  A LA DB EST SUCCESSFULL



try {
    $db = new PDO(
        "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );
    $result = $db->query("SELECT * FROM hiking LIMIT 4");
    $hikes = $result->fetchALL(PDO::FETCH_ASSOC);
    foreach ($hikes as $hike){
        echo "<p>" . $hike['name'] . "<p>";
    }
    echo "DB connection success";
} catch (Exception $e){
        echo $e->getMessage();
}


-->