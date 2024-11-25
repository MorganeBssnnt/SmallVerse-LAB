<?php
session_start();
require_once('../config/config.php');
require_once('../src/models/AuthentManager.php');

// Instancier AuthentManager avec les constantes de configuration
$authManager = new AuthentManager(DB_DSN, DB_USER, DB_PASSWORD);

$action = $_GET['action'] ?? '';

if ($action === 'login') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($authManager->login($username, $password)) {
        header("Location: ../public/dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Identifiants incorrects. Veuillez réessayer.";
        header("Location: ../public/index.php");
        exit();
    }
} elseif ($action === 'logout') {
    $authManager->logout();
    $_SESSION['logout_message'] = "Vous avez été déconnecté avec succès.";
    header("Location: ../public/index.php");
    exit();
}

