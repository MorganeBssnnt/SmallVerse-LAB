<?php
// src/models/AuthentManager.php

class AuthentManager
{
    private $pdo;

    public function __construct($dsn, $user, $password)
    {
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Méthode pour connecter un utilisateur
    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT id, password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && $password === $user['password']) {  // Remplacez par password_verify en production
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

    // Méthode pour déconnecter un utilisateur
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    // Vérifie si l'utilisateur est connecté
    public function isUserLoggedIn()
    {
        session_start();
        return isset($_SESSION['user_id']);
    }
}
