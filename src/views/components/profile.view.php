<!-- profile.view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Profil de <?php echo $userData['nickname']; ?></h1>
    <p>Nom complet : <?php echo $userData['firstname'] . ' ' . $userData['lastname']; ?></p>
    <p>Email : <?php echo $userData['email']; ?></p>
    <!-- Ajoutez d'autres informations du profil ici -->
    <a href="/update-profile">Mettre à jour le profil</a>
</body>
</html>
