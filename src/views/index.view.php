
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
        <h2>List of our hikes</h2>
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
                            <p>duration <?= $hike['duration'] ?></p>
                            <p>length <?= $hike['distance'] ?></p>
                            <p>positive altitude <?= $hike['elevation_gain'] ?></p>
                            <a href="/hike?ID=<?= $hike['ID'] ?>">Plus d'infos</a>
                            <a href="/modify?ID=<? $modification['ID'] ?> $">
                                <button>Modify this hike</button>
                            </a>
                            <a href="/delete?ID=<? $delete['ID'] ?> $">
                                <button>Delete this hike</button>
                            </a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section>
        <a href="/creation?ID=<? $creation['ID'] ?> $">
            <button>Create a new hike</button>
        </a>
    </section>
<?php endif; ?>