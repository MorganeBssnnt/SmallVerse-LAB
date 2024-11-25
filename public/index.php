<?php
// Démarre une session PHP pour gérer les connexions utilisateurs
session_start();

// Si l'utilisateur est déjà connecté, redirige vers le tableau de bord
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SmallVerse-LAB</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
</head>
<body class="login-body">
    <?php include('../templates/index_body.php'); ?>
    <?php include('../templates/footer.php'); ?>
</body>
</html>

