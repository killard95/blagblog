<?php

// on affiche tout ce qui est passé dans l'url (avec le rewriting ...)
// var_dump($_GET);
// echo "<br><br>";

// on récupère les infos de l'url en séparant chaque composant :
// le controller, sa méthode et ses paramètres

// Divise la chaîne de requête GET par le caractère '/' et stocke les parties dans un tableau.
$params = explode('/', $_GET['p']);
// Si le premier param existe remplace par la variable $controller sinon "Home"
if ($params[0]) {
    $controller = $params[0];
} else {
    $controller = 'Home';
}
// Si le deuxième param existe remplace par la variable $method sinon "Index
if (@$params[1]) {
    $method = $params[1];
} else {
    $method = 'Index';
}
if (@$params[2]) {
    $req = $params[2];
} else {
    $req = '';
}
// chemin du fichier du contrôleur
$called = 'Controllers/' . $controller . '.php';
// Inclut le fichier du contrôleur spécifié.
require($called);
// Vérifie si la méthode existe dans le contrôleur.
if (method_exists($controller, $method,)) {
    // Crée une instance du contrôleur.
    $myctrl = new $controller();
    // Appelle la méthode du contrôleur avec le paramètre requis.
    $myctrl->$method($req);
// Sinon message d'erreur
} else {
    echo 'Method ' . $controller . '::' . $method . '() does not exist';
}
