<?php

require('Database.php');

class User_DAO extends Controller
{

    private $db_connect;

 

    

    public function insert($data)
    {
        $this->db_connect = connectToDB();

        $db = connectToDB();
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $nickname = $data['nickname'];
        $password = $data['password'];
        $password = hash('sha256', $password);
        

        $verif = $db->prepare("
        SELECT * FROM User
        WHERE (`nickname` = :nickname)
        ");
        $verif->bindValue(
            ':nickname',
            $nickname
        );

        $verif->execute();
        $result = $verif->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $statement = $db->prepare("
                INSERT INTO User( firstname,lastname,nickname,password)
                VALUES (:firstname, :lastname, :nickname, :password)
            ");

            try {
                $statement->execute(array(
                    ':firstname' => $firstname,
                    ':lastname' => $lastname,
                    ':nickname' => $nickname,
                    ':password' => $password
                ));
                
                ?>
                <meta http-equiv="refresh" content="3; URL=/Views/Dashboard_tpl.php">
                <?php
                echo "Nouvel utilisateur créé !"; 
                $_SESSION["id_user"] = $db->lastInsertId();
                $_SESSION['nickname'] = $nickname;

                // $welcome['nom'] = ['name' => 'Welcome '.$firstname. ' '. $lastname] ;
                // $this->set($welcome);
                // $this->render('Dashboard_tpl') ;
                return TRUE;
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
        elseif ($result['nickname'] === $nickname) {
            ?>
            <meta http-equiv="refresh" content="5; URL=/">
            <?php
            echo "Nom d'utilisateur déjà pris, Vous allez être redirigé vers la page d'accueil.";
        }
        else {
            ?>
            <meta http-equiv="refresh" content="5; URL=/">
            <?php
            echo "Une erreur est survenue";
        }    
    }

    public function verify($control)
    {
        $db = connectToDB();
        $nickname = $control['nickname'];
        $password = $control['password'];
        $password = hash('sha256', $password);        
        $statement = $db->prepare("
        SELECT * FROM User
        WHERE (`nickname` = :nickname)
        ");
        try {
            $statement->bindValue(
                ':nickname',
                $nickname
            );
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result === false) {
                ?>
                <meta http-equiv="refresh" content="3; URL=/">
                <?php
                echo "utilisateur inconnu, Vous allez être redirigé vers la page d'accueil";
            }else {
                if ($result['nickname'] == $nickname) {
                    if ($result['password'] == $password) {
                    $_SESSION['nickname'] = $nickname;
                    $_SESSION['id_user'] = $result['id_user'];
                    ?>
                    <meta http-equiv="refresh" content="3; URL=/Views/Dashboard_tpl.php">
                    <?php
                    echo "Ravi de vous revoir ".$_SESSION['nickname']."! Vous allez être redirigé vers votre dashboard"; 
                    // $welcome['nom'] = ['name' => 'Welcome back '.$result['firstname']. ' '. $result['lastname']] ;
                    // $this->set($welcome);
                    // $this->render('Dashboard_tpl') ;
                    return TRUE;
                } else {
                    ?>
                <meta http-equiv="refresh" content="3; URL=/">
                <?php
                    echo "mot de passe inconnu !, Vous allez être redirigé vers la page d'accueil";
                }
            } else {
                ?>
                <meta http-equiv="refresh" content="3; URL=/">
                <?php
                echo "utilisateur inconnu , Vous allez être redirigé vers la page d'accueil";
            }
        }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function signout(){
        $db = connectToDB();
        $statement = $db->prepare("
        DELETE FROM User
        WHERE id_user = :id_user
        ");
        try {
            $statement->bindValue(':id_user', $_SESSION['id_user']);
            $statement->execute();
            ?>
            <meta http-equiv="refresh" content="3; URL=/">
            <?php
            echo "Adieu ".$_SESSION['nickname']."!!! Nous allons vous regretter !!!";
            return TRUE;
        } catch (PDOException $e) {
            echo "Erreur : ". $e->getMessage();
        }
    }

    public function update(){
        // Connexion à la base de données
        $db = connectToDB();
        // Récupération des données du formulaire
        $nickname = $_POST['nickname'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        // Hachage du nouveau mot de passe avec SHA-256
        $password = hash('sha256', $password);
        // Récupération de l'ID de l'utilisateur depuis la session
        $id_user = $_SESSION['id_user'];
        // Mise à jour du surnom dans la session (pour refléter le nouveau surnom)
        $_SESSION['nickname'] = $nickname;
        // Préparation de la requête SQL d'update
        $statement = $db->prepare("
        UPDATE User 
        SET id_user = :id_user, firstname = :firstname, lastname = :lastname, nickname = :nickname, password = :password
        WHERE id_user = :id_user
        ");
        try {
            // Exécution de la requête en liant les valeurs aux marqueurs
            $statement->execute(array(
                ':id_user' => $id_user,
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':nickname' => $nickname,
                ':password' => $password
            ));
            // Redirection vers le tableau de bord après la mise à jour
            ?>
            <meta http-equiv="refresh" content="3; URL=/Views/Dashboard_tpl.php">
            <?php
            // Message de succès
            echo $_SESSION['nickname'].", vous venez de mettre à jour vos informations !";
            // Indication que la mise à jour a réussi
            return TRUE;
        }
        catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur PDO
            echo "Erreur : ". $e->getMessage();
        }
    }    
}




