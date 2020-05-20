<?php
    // On requiert le fichier utilisateurs.php pour permettre d'ajouter les informations utilisateurs à nos annonces
   

    // La classe instancie une nouvelle annonce. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
    // Elle requiert les méthodes afin d'agrémenter la base

class Book extends DbConnect {

    protected $id_book;
    protected $title;
    protected $author;
    protected $description;
    protected $opinion;
    protected $note;
    protected $id_user;

    // Le construct permet d'établir une structure de notre annonce
    function __construct($id=null) {
        parent::__construct($id);
    }

    // La syntaxe get permet de lier une propriété d'un objet à une fonction qui sera appelée lorsqu'on accédera à la propriété.
    public function getIdBook() {
        return $this->idBook;
    }

    public function setIdBook($id_book) {
        $this->idBook = $id_abook;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getOpinion() {
        return $this->opinion;
    }

    public function setOpinion($opinion) {
        $this->opinion = $opinion;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote() {
        $this->note = $note;
    }
    
    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser(int $id) {
        $this->idUser = $id_user;
    }

   // Permet d'inserer une tache dans la base de donnée.
   public function insert(){

    $query = "INSERT INTO books (id_book, title, author, description, opinion, note) VALUES ('$this->id_book','$this->title', '$this->author', '$this->description', '$this->opinion', '$this->note')";
    $result = $this->pdo->prepare($query);
    $result->execute();
    $id = $this->pdo->lastInsertId();
    return $this;
}

    // Permet de selectionner toutes les taches dans la base de donnée. 
    public function selectAll(){
    $query ="SELECT * FROM books;";
    $result = $this->pdo->prepare($query);
    $result->execute();
    $datas= $result->fetchAll(); //recupérer les données

    $tab=[];

    foreach($datas as $data) {
        $current = new Book();
        $current->setId($data['ID_BOOK']);
        array_push($tab, $current);
        }
        return $tab;

    }

    // Permet de selectionner un livre dans la base de donnée. 
    public function select(){
        $query = "SELECT * FROM books WHERE ID_BOOK = $this->idBook;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $data = $result->fetch();
        //appel aux setters de l'objet
        return $this;
}

    // Permet de modifier un livre dans la base de donnée. 
    public function update(){
        $query ="UPDATE * FROM books WHERE ID_BOOK = $this->idBook;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $data = $result->fetch();
                //appel aux setters de l'objet
            return $this;
    }

    // Permet de supprimer un livre dans la base de donnée. 
    public function delete(){
        $query ="DELETE * FROM books WHERE ID_Book = $this->idBook;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $data = $result->fetch();
        //appel aux setters de l'objet
        return $this;
    }
}