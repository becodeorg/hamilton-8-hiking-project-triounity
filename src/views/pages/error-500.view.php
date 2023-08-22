<!-- error-page.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Erreur</title>
</head>
<body>
    <h1>Une erreur s'est produite</h1>
    <p>Nous sommes désolés, mais une erreur s'est produite lors du traitement de votre demande. Voici les détails de l'erreur :</p>
    <p><?php echo htmlspecialchars($_GET['message']); ?></p>
    <p>Si vous rencontrez ce problème fréquemment, veuillez <a href="/contact.php">nous contacter</a> pour obtenir de l'aide.</p>
</body>
</html>
