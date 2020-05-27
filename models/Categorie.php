<?php
    // On requiert le fichier utilisateurs.php pour permettre d'ajouter les informations utilisateurs à nos annonces
   

    // La classe instancie une nouvelle annonce. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
    // Elle requiert les méthodes afin d'agrémenter la base

class Categorie extends DbConnect {

    protected $idCategorie; 
    protected $nom; 
    
    function __construct($id=null) {
        parent::__construct($id);
    }

    public function getIdCategorie() {
        return $this->idCategorie;
    }

    public function setIdCategorie(int $idCategorie) {
        $this->idCategorie = $idCategorie;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }


    function insert(){
    
        $query = "INSERT INTO categories (nom) VALUES(:nom)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':nom', $this->nom, PDO::PARAM_STR);
       
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
    }

    public function selectAll(){
        $query ="SELECT * FROM categories;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas= $result->fetchAll(); //recupérer les données
    
        $tab=[];
    
        foreach($datas as $data) {
            $current = new Categorie();
            $current->setIdCategorie($data['id_categorie']);
            $current->setNom($data['nom']);
            array_push($tab, $current);
            }
            return $tab;
    
        }
    
        public function select(){}
        public function update(){}
        public function delete(){}
}