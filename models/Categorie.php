<?php
    // On requiert le fichier utilisateurs.php pour permettre d'ajouter les informations utilisateurs à nos annonces
   

    // La classe instancie une nouvelle annonce. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
    // Elle requiert les méthodes afin d'agrémenter la base

class Categorie extends DbConnect {

    protected $id_categorie; 
    protected $name; 
    
    function __construct($id=null) {
        parent::__construct($id);
    }

    public function getIdCategorie() {
        return $this->idCategorie;
    }

    public function setIdCategorie(int $id_categorie) {
        $this->idCategorie = $idCategorie;
    }

    public function getNom() {
        return $this->name;
    }

    public function setNom(int $name) {
        $this->name = $name;
    }

    // Le construct permet d'établir une structure de notre annonce
    function __construct($id=null) {
        parent::__construct($id);
    }

    // Permet d'inserer une tache dans la base de donnée.

    function insert(){
    
        $query = "INSERT INTO categories (nom) VALUES(:nom)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':nom', $this->nom, PDO::PARAM_STR);
       
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
    }

}