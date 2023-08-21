<?php if (!empty($hikes)): ?>
    <h2>List of hikes</h2>
    <ul>
        <?php foreach($hikes as $hike): ?>
            <li>
                <a href="/hike?ID=<?= $hike['ID'] ?>">
                    <?= $hike['name'] ?>
                </a>
            </li>
            <li>
                <p><?= $hike['duration'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>