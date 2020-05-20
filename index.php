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

setcookie('nick', 'anne', time() + 182 * 24 * 60 * 60, '/');
//var_dump($_COOKIE);


if (isset($_COOKIE['nick'])){
	$myNick = $_COOKIE['nick'];
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


// Fonctionnalité(s) redirigées :

function insertUser() {
    
    if(!empty($_POST["nick"]) &&(!empty($_POST["nom"]) && (!empty($_POST["prenom"]) && (!empty($_POST["email"]) && $_POST["password"] === $_POST["password2"]) && (!empty($_POST["autorisation"]))))) {
      
        /*if (preg_match("#^[a-zA-Z-àâäéèêëïîôöùûüçàâäéèêëïîôöùûüçÀÂÄÉÈËÏÔÖÙÛÜŸÇæœÆŒ]+$#", $_POST["nom"])
            && preg_match("#^[a-zA-Z-àâäéèêëïîôöùûüçàâäéèêëïîôöùûüçÀÂÄÉÈËÏÔÖÙÛÜŸÇæœÆŒ]+$#", $_POST["prenom"])
            && preg_match("#^(a-z0-9)+(a-z0-9)+@(a-z0-9)+(a-z0-9)$#", $_POST["email"])
            && preg_match("# \^[a-zA-Z0-9_]{3,16}$#", $_POST["pseudo"])
            && preg_match("#^[a-zA-Z0-9]+$#", $_POST["password"]))  {*/

                $user = new User();
                $user->setNick($_POST["nick"]);
                $user->setNom($_POST["nom"]);
                $user->setPrenom($_POST["prenom"]);
                $user->setEmail($_POST["email"]);
                $user->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
                $user->setAutorisation($_POST["autorisation"]);

                $user->insert();
                $nick= isset($_POST['nick'])? $_POST['nick'] : "null";
                $password= isset($_POST['password'])? $_POST['password'] : "null";
                $_SESSION['nick']=$nick;
                $_SESSION['password']=$password;

    }else {
                echo "Erreur.<br>";
        
        }
    
    setcookie('nick', $_POST['nick'], time() + 182 * 24 * 60 * 60, '/');
    //header("Location:index.php");
}  

function connectUser() {

    if(!empty($_POST["nick"]) && !empty($_POST["password"])) {

        $user = new User();
        $user->setNick($_POST["nick"]);
        $user->setPassword($_POST["password"]);
        $verif = $user->selectByNick();

        if($verif) { 
                if(password_verify($_POST["password"], $verif["password"])) {
                    $_SESSION["user"] = $verif;
                    header('Location:index.php?route=membre'); 
                   
                } else { 
                    header('Location:index.php?route=home');
                } 
            
        } else {
            header('Location:index.php?route=home');
        }
    } 
    
}

function deconnectUser() {
    unset($_SESSION["user"]);
    header("Location:index.php");
}

function insertBook() {

    if(!empty($_POST["title"]) && !empty($_POST["author"]) && !empty($_POST["description"]) && !empty($_POST["opinion"]) && !empty($_POST["note"])) {

        $book = new Book();
        $book->setTitle($_POST["title"]);
        $book->setAuthor($_POST["author"]);
        $book->setDescription($_POST["description"]);
        $book->setOpinion($_POST["opinion"]);
        $book->setNote($_POST["note"]);

        $book->setIdUser($_SESSION['user']['id_user']);

        $book->insert();
    }
    
    header("Location:membre.php");  
}
    
?>

<!--4. TEMPLATE
Affichage du système de templates HTML-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Club de livres</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require "views/{$view['template']}"; ?>


</body>
</html>