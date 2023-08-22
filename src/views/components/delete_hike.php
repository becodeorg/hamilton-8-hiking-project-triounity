<!-- delete_hike.view.php -->

<h2>Êtes-vous sûr de vouloir supprimer cette randonnée ?</h2>
<p><strong>Nom de la randonnée:</strong> <?php echo $hike['name']; ?></p>
<p><strong>Description:</strong> <?php echo $hike['description']; ?></p>
<p><strong>Distance:</strong> <?php echo $hike['distance']; ?> km</p>
<p><strong>Durée:</strong> <?php echo $hike['duration']; ?></p>

<form method="POST" action="/delete-hike/<?php echo $hike['ID']; ?>">
    <button type="submit">Oui, supprimer</button>
</form>
