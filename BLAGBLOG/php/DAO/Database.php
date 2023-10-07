<?php

function connectToDB(){
    // Informations pour se connecter à la base de données
    $host ="mysql8BB";
    $user = "killard";
    $password = "killard95";
    $db = "BlagBlog";
    // Connection à la base de données avec gestion des erreurs
    try {
        $dbBB = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $dbBB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully to DataBase <br>";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return $dbBB;
}