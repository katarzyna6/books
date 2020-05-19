<?php

// La classe instancie un nouvel utilisateur. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
// Elle requiert les méthodes afin d'agrémenter la base

class User extends DbConnect {
    
    private $id_user;
    private $nick;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $autorisation;

    // Le construct permet d'établir une structure de notre utilisateur
    function __construct($id_utilisateur = null) {
        parent::__construct($id_utilisateur);
    }