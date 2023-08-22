<section class="details-container">
        <h2><?= $hike['name'] ?></h2>
        <p><?= $hike['description'] ?></p>
        <p><i class="fa-solid fa-timer fa-x2"></i>Time : <?= $hike['duration'] ?></p>
        <p>elevation gain <?= $hike['elevation_gain'] ?></p>
<p>created by <?= $hike['creator'] ?></p>
        <a href="#" class="button">Réserver</a>
</section>