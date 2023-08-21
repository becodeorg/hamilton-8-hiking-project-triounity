<h2>Randonnées dans cette catégorie</h2>
<ul>
    <?php if (!empty($hikes)): ?>
        <?php foreach($hikes as $hike): ?>
            <li>
                <a href="/hike?ID=<?= $hike['ID'] ?>">
                    <?= $hike['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune randonnée trouvée dans cette catégorie.</p>
    <?php endif; ?>
</ul>
