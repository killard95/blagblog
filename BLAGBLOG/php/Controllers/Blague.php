<?php

class Blague extends Controller {

    private $blague ;
    private $id_user;
    
    public function index() {
        $this->render('Dashboard_tpl') ;
    }

    public function insertBlague(){
        $newBlague = new Blague_DAO ;
        // Utilisation de l'opérateur de coalescence null (??) 
        // pour fournir une chaîne vide par défaut si le champ n'est pas défini.
        $blague = $_POST['blague'] ?? ''; 
        if (!empty($blague)) {
            // Si le champ 'blague' n'est pas vide, on peut procéder à l'insertion
            if ($newBlague->create($_POST)) {
                // Insertion réussie
                // Vous pouvez rediriger l'utilisateur ou afficher un message de succès
            } else {
                ?>
                <meta http-equiv="refresh" content="3; URL=/Views/Dashboard_tpl.php">
                <?php
                echo "Problème lors de l'insertion de la blague.";
            }
        } else {
            ?>
            <meta http-equiv="refresh" content="3; URL=/Views/Dashboard_tpl.php">
            <?php
            echo "Le champ 'blague' du formulaire est vide. Veuillez entrer une blague.";
        }
    }

    public function get(){
        $blague = new Blague_DAO ;
        if($blague->getBlague($_GET)){
        } else {
            echo " Pwoblem " ;
        }
    }

    public function delete(){
        $blague = new Blague_DAO ;
        if($blague->delete($_GET)){
        } else {
            echo " Pwoblem " ;
        }
    }
}