<?php

class User {
    // Déclaration des propriétés privées de la classe User
    private $lastname ;
    private $firstname ;
    private $nickname ;
    private $password ;

     // Constructeur de la classe, pour initialiser un objet User avec des valeurs pour ses propriétés
    public function __construct($l, $f, $n, $p){
        // Initialise les propriétés de l'objet avec les valeurs passées en paramètres
        $this->lastname = $l ;
        $this->firstname = $f ;
        $this->nickname = $n ;
        $this->password = $p ;
    }

     // Méthode pour obtenir la valeur d'une propriété de l'objet
    public function get($attr){
       return $this->$attr ;
    }
    // Méthode pour définir la valeur d'une propriété de l'objet
    public function set($attr, $value){
        $this->$attr = $value ;
    }

}