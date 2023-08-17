
<body>
<form method="post" action="#">
    <fieldset>
        <label for="name">Titre de votre randonéee</label>
        <input type="text" name="name" id="name" placeholder="Nom..." required>
    </fieldset>
    <fieldset>
        <label for="duration">Durée estimée de votre randonnée</label>
        <input type="time" name="duration" id="duration" required>
    </fieldset>
    <fieldset>
        <label for="distance">Distane kilométrique de votre randonnée</label>
        <input type="number" step="0.1" min="0" name="distance" id="distance" required><p>km</p>
    </fieldset>
    <fieldset>
        <label for="elevation_gain">Dénivelé positif</label>
        <input type="number" name="elevation_gain" id="elevation_gain" required><p>mètres</p>
    </fieldset>
    <fieldset>
        <label>Description</label>
        <input type="text" name="description" id="description" placeholder="Soyez créatif et précis!" required>
    </fieldset>
    <button type="submit">C'est bon, tout est prêt!</button>
</form>

<?php
if (isset($error)):
    if ($error === '404') :?>
<p class="error">La page recherchée n'a pas été trouvée</p>
<?php elseif ($error === '500'):?>
<p class="error">Il semblerait que l'on ai rencontré une erreur. Veuillez réessayer d'ici quelques minutes.</p>
<?php endif;
endif; ?>

