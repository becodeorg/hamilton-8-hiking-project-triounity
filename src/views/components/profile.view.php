<div class="profile-container">
    <h1>Profil de <?php echo $userData['nickname']; ?></h1>
    <p>Nom complet : <?php echo $userData['firstname'] . ' ' . $userData['lastname']; ?></p>
    <p>Email : <?php echo $userData['email']; ?></p>

    <!-- Ajoutez d'autres informations du profil ici -->
    <a href="/update-profile">Mettre à jour le profil</a>
</div>