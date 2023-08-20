
<?php if (!empty($tags)): ?>
    <section class="tagBubbles">
    <ul class="tagList">
        <?php foreach($tags as $tag): ?>
            <li>
                <a href="/tag?ID=<?= $tag['ID'] ?>">
                    <?= $tag['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    </section>
<?php endif; ?>

<?php if (!empty($hikes)): ?>
    <section class="hikesList">
        <h2>List of hikes</h2>
        <ul class="cardList">
            <?php foreach($hikes as $hike): ?>
                <li class="hikeCard">
                    <div class="cardInner">
                        <div class="cardFront">
                            <h3>
                                <?= $hike['name'] ?>
                            </h3>
                        </div>
                        <div class="cardBack">
                            <p>durée <?= $hike['duration'] ?></p>
                            <p>distance <?= $hike['distance'] ?></p>
                            <p>dénivelé positif <?= $hike['elevation_gain'] ?></p>
                            <a href="/hike?ID=<?= $hike['ID'] ?>">More infos</a>
                        </div>    
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>