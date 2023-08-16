<h2>List of hikes</h2>

<?php if (!empty($hikes)): ?>
    <ul>
        <?php foreach($hikes as $hike): ?>
            <li>
                <a href="/hike?ID=<?= $hike['ID'] ?>">
                    <?= $hike['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>