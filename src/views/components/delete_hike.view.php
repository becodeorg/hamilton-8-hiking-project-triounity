<section class="delete-hike-container">
    <h2>Supprimer une randonnée</h2>
    <p><strong>Nom de la randonnée:</strong> <?php echo $hike['name']; ?></p>
    <p><strong>Description:</strong> <?php echo $hike['description']; ?></p>
    <p><strong>Distance:</strong> <?php echo $hike['distance']; ?> km</p>
    <p><strong>Durée:</strong> <?php echo $hike['duration']; ?></p>
    
    <form method="POST" action="/delete-hike/<?php echo $hike['ID']; ?>" class="delete-hike-form">
        <button type="button" class="delete-button" onclick="openConfirmDialog()">Supprimer</button>
    </form>
</section>

<div class="confirm-dialog" id="deleteConfirmDialog">
    <div class="confirm-dialog-box">
        <p class="confirm-dialog-message">Êtes-vous sûr de vouloir supprimer cette randonnée ?</p>
        <div class="confirm-dialog-buttons">
            <button class="confirm-dialog-button confirm" onclick="confirmDelete()">Oui, supprimer</button>
            <button class="confirm-dialog-button cancel" onclick="cancelDelete()">Annuler</button>
        </div>
    </div>
</div>