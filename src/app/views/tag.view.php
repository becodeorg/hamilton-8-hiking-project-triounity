<h2>List of hikes</h2>
<?php if (!empty($hikes)): ?>
    <ul>
        <?php foreach($hikes as $hike): ?>
            <li>
                <a href="/hike?ID=<?= $hike['ID'] ?>">
                    <?= $hike['name'] ?>
                </a>
                <p>duration <?= $hike['duration'] ?></p>
                <p>distance <?= $hike['distance'] ?></p>
                <p>elevation gain <?= $hike['elevation_gain'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?> 