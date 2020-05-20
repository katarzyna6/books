<?php

// Demarre une session utilisateur
session_start();

// On requiere le fichier global qui correspond à la base de donnée

require_once "conf/global.php";

// FRONT CONTROLLER -> Toutes les requêtes arrivent ici et sont traitées par le ROUTER
// ------------------------------------------------------------------------------------
// 1. INCLUSIONS CLASSES
// Dans un premier temps, nous allons inclure les fichiers de nos classes ici pour pouvoir les utiliser


spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")) {
        require_once "models/$class.php";
    }
});

setcookie('pseudo', 'adam1', time() + 182 * 24 * 60 * 60, '/');
//var_dump($_COOKIE);


if (isset($_COOKIE['pseudo'])){
	$myPseudo = $_COOKIE['pseudo'];
}

// 2. ROUTER
// Structure permettant d'appeler une action en fonction de la requête utilisateur
$route = isset($_REQUEST["route"])? $_REQUEST["route"] : "home";


    switch ($route) {
    case "home": $view = showHome();//Afficher la page d'accueil avec mon formulaire 
    break;
    case "membre": $view = showMembre();//Afficher l'espace membre pour un utilisateur connecté 
    break;
    case "insert_user" : insertUser();// Déclencher une action-> enregistrer un nouvel utilisateur puis de rappeler ma page d'accueil
    break;
    case "connect_user" : connectUser();// Déclencher une action-> connecter un utilisateur puis de rediriger vers l'espace membre si OK
    break;
    case "deconnect" : deconnectUser();
    break;
    case "insert_book" : insertBook();
    break;
    default : $view = showHome();//Afficher la page d'accueil avec mon formulaire  
}

function showMembre() {

    // Visualiser temporairement les données d'un utilisateur
    $user = new User();
    $user->selectAll();
    $datas = [];

    return ["template" => "membre.php", "datas" => $datas];
}

function showHome() {
    if(isset($_SESSION["user"])) {
        header("Location:index.php?route=membre");
    }
    

    $datas = [];
	// il suffit désormais de mettre dans $datas les données à transmettre à notre vue
    // par exemple $datas["annee"] = 2020;
	return ["template" => "home.html", "datas" => $datas];
}