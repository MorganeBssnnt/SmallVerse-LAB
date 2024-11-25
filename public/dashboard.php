<?php
require_once('../config/config.php');
require_once('../src/models/AuthentManager.php');

$authManager = new AuthentManager(DB_DSN, DB_USER, DB_PASSWORD);

if (!$authManager->isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SmallVerse-LAB</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord</h1>
    <p>Vous êtes connecté en tant qu'utilisateur ID <?php echo htmlspecialchars($_SESSION['user_id']); ?>.</p>

    <!-- Lien de déconnexion -->
    <p><a href="../core/dispatcher.php?action=logout">Déconnexion</a></p>
</body>
</html>
