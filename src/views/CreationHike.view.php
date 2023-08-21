<body>
<form method="post" action="#" style="align-self: center">
    <fieldset>
        <label for="name">Title of your hike</label>
        <input type="text" name="name" id="name" placeholder="Nom..." required>
        <?php if (isset($errors['name'])): ?>
            <span class="error-message"><?= $errors['name'] ?></span>
        <?php endif; ?>
    </fieldset>
    <fieldset>
        <label for="duration">Duration estimated</label>
        <input type="time" name="duration" id="duration" required>
        <?php if (isset($errors['duration'])): ?>
            <span class="error-message"><?= $errors['duration'] ?></span>
        <?php endif; ?>
    </fieldset>
    <fieldset>
        <label for="distance">Length</label>
        <input type="number" step="0.1" min="0" name="distance" id="distance" required><p>km</p>
        <?php if (isset($errors['distance'])): ?>
            <span class="error-message"><?= $errors['distance'] ?></span>
        <?php endif; ?>
    </fieldset>
    <fieldset>
        <label for="elevation_gain">Positive altitude</label>
        <input type="number" name="elevation_gain" id="elevation_gain" required><p>meter</p>
        <?php if (isset($errors['elevation_gain'])): ?>
            <span class="error-message"><?= $errors['elevation_gain'] ?></span>
        <?php endif; ?>
    </fieldset>
    <fieldset>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" placeholder="Be precise and creative!" required>
        <?php if (isset($errors['description'])): ?>
            <span class="error-message"><?= $errors['description'] ?></span>
        <?php endif; ?>
    </fieldset>
    <fieldset>
        <label for="photo">Photo</label>
        <input type="url" name="image" id="image" placeholder="Add a photo" required>
        <?php if (isset($errors['image'])): ?>
            <span class="error-message"><?= $errors['image'] ?></span>
        <?php endif; ?>
    </fieldset>
    <button type="submit">Look like everything is good!</button>
</form>

<?php
if (isset($error)):
    if ($error === '404') :?>
        <p class="error">Page not found, sorry.</p>
    <?php elseif ($error === '500'):?>
        <p class="error">Looks like we've got a problem on our side ... please try again later.</p>
    <?php endif;
endif; ?>
