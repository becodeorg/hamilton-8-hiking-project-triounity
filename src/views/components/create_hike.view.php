<!-- create_hike.view.php -->

<form method="POST" action="/create-hike">
    <label for="name">Nom de la randonnée:</label>
    <input type="text" name="name" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <label for="distance">Distance (km):</label>
    <input type="number" name="distance" required><br>

    <label for="duration">Durée:</label>
    <input type="text" name="duration" required><br>

    <button type="submit">Créer la randonnée</button>
</form>
