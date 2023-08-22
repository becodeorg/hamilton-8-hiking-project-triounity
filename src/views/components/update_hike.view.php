<form method="POST" action="/update-hike/<?php echo $hike['ID']; ?>" class="update-hike-form">
    <label for="name" class="label">Nom de la randonnée:</label>
    <input type="text" name="name" value="<?php echo $hike['name']; ?>" class="input-field" required><br>

    <label for="description" class="label">Description:</label>
    <textarea name="description" class="input-field" required><?php echo $hike['description']; ?></textarea><br>

    <label for="distance" class="label">Distance (km):</label>
    <input type="number" name="distance" value="<?php echo $hike['distance']; ?>" class="input-field" required><br>

    <label for="duration" class="label">Durée:</label>
    <div class="time-input-container">
        <input type="text" name="duration" value="<?php echo $hike['duration']; ?>" class="time-input" required>
        <div class="time-input-labels">
            <span class="hour-label">Heures</span>
            <span class="minute-label">Minutes</span>
        </div>
    </div><br>

    <button type="submit" class="submit-button">Mettre à jour la randonnée</button>
</form>