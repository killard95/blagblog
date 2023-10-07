<?php
// gestion erreur
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
    // or error_reporting(E_ALL);


    // Define relative route
    define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
    define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));  

    // echo ROOT ;
    // echo "<br>";
    // echo WEBROOT ; 
    // echo "<br><br>";