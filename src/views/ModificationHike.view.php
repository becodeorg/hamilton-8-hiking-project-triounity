<?php foreach ($hikeDetails as $detail):
    extract($detail); ?>
    <h1>Modify this hike</h1>
    <form action="#" method="post">
    <fieldset>
        <label for="name">Title of your hike</label>
        <input type="text" name="name" id="name" placeholder="Nom..." required>
    </fieldset>
    <fieldset>
        <label for="duration">Duration estimated</label>
        <input type="time" name="duration" id="duration" required>
    </fieldset>
    <fieldset>
        <label for="distance">Length</label>
        <input type="number" step="0.1" min="0" name="distance" id="distance" required><p>km</p>
    </fieldset>
    <fieldset>
        <label for="elevation_gain">Positive altitude</label>
        <input type="number" name="elevation_gain" id="elevation_gain" required><p>mètres</p>
    </fieldset>
    <fieldset>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" placeholder="Soyez créatif et précis!" required>
    </fieldset>
    </form>
        <button type="submit">Modify your hike</button>
    <?php if (isset($error_value)):
    if ($error_value == "101"): ?>
        <p class="message error">Please complete the missing information.</p>
    <?php elseif ($error_value == "401"): ?>
        <p class="message warning">No modification detected.</p>
    <?php elseif ($error_value == "500"): ?>
        <p class="message error">Looks like we've got a problem on our side ... please try again later.</p>
    <?php else: echo $error_value; ?>
    <?php endif;
endif; ?>
    <a href="/delete?ID=<?= $ID ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer cette randonnée ?')">Supprimer le hike</a>
<?php endforeach; ?>



<!-- <a href="/delete-hike?hid=--><?php //= $hid ?><!--" onclick="return confirm('Are you sure you want to delete this hike?')">Delete this hike</a>-->

