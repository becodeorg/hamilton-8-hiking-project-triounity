<section class="form-container">
    <form method="POST" action="/create-hike">
      <label for="name">Nom de la randonnée:</label>
      <input type="text" name="name" required><br>

      <label for="description">Description:</label>
      <textarea name="description" required></textarea><br>

      <label for="distance">Distance (km):</label>
      <input type="number" name="distance" required><br>

      <label for="duration">Durée:</label>
      <input type="time" name="duration"  required pattern="[0-9]{1,2}:[0-5][0-9]" title="Format du temps: hh:mm"><br>

      <button type="submit">Créer la randonnée</button>
    </form>
</section>
