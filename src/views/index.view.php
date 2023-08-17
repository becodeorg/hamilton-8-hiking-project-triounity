// liste de tout

<h2>Choose a hike!</h2>

<?php if (!empty($hikes)): ?>
    <ul>
        <?php foreach($hikes as $hike): ?>
            <li>
                <a href="/hike?name=<?= $hike['name'] ?>">
                    <?= $hike['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


