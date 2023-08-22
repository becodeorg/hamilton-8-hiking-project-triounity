<!-- update_hike.view.php -->

<form method="POST" action="/update-hike/<?php echo $hike['ID']; ?>">
    <label for="name">Nom de la randonnée:</label>
    <input type="text" name="name" value="<?php echo $hike['name']; ?>" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required><?php echo $hike['description']; ?></textarea><br>

    <label for="distance">Distance (km):</label>
    <input type="number" name="distance" value="<?php echo $hike['distance']; ?>" required><br>

    <label for="duration">Durée:</label>
    <input type="text" name="duration" value="<?php echo $hike['duration']; ?>" required><br>

    <button type="submit">Mettre à jour la randonnée</button>
</form>
