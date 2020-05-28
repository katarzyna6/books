<?php
    // On requiert le fichier utilisateurs.php pour permettre d'ajouter les informations utilisateurs à nos annonces
   

    // La classe instancie une nouvelle annonce. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
    // Elle requiert les méthodes afin d'agrémenter la base

class Book extends DbConnect {

    protected $id_book;
    protected $title;
    protected $auteur;
    protected $categorie;
    protected $image;
    protected $description;
    protected $opinion;
    protected $note;
    protected $idUser;

    // Le construct permet d'établir une structure de notre annonce
    function __construct($id=null) {
        parent::__construct($id);
    }

    // Permet d'inserer une tache dans la base de donnée.

    function insert(){
    
        $query = "INSERT INTO books (id_user, title, auteur, image, categorie, description, opinion, note)
            VALUES(:id_user, :title, :auteur, :image, :categorie, :description, :opinion, :note)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_user', $this->idUser, PDO::PARAM_INT);
        $result->bindValue(':title', $this->title, PDO::PARAM_STR);
        $result->bindValue(':auteur', $this->auteur, PDO::PARAM_STR);
        $result->bindValue(':image', $this->image, PDO::PARAM_STR);
        $result->bindValue(':categorie', $this->categorie, PDO::PARAM_INT);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':opinion', $this->opinion, PDO::PARAM_STR);
        $result->bindValue(':note', $this->note, PDO::PARAM_INT);
        $result->execute();

        

        $this->id_book = $this->pdo->lastInsertId();
        var_dump($this);
        return $this;
    }

    // Permet de selectionner un livre dans la base de donnée. 
    public function select(){

        $query = "SELECT * FROM books WHERE id_book = :id_book";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_book', $this->idBook, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch();
        //appel aux setters de l'objet
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
        $current->setId($data['id_book']);
        array_push($tab, $current);
        }
        return $tab;

    }

    public function selectByUser() {
        $query = "SELECT id_book, title, auteur, image, categorie, description, note, id_user, opinion FROM books WHERE id_user = :id";
        $result = $this->pdo->prepare($query);

        $result->bindValue("id", $this->idUser, PDO::PARAM_INT);
        $result->execute();
        $datas = $result->fetchAll();
        //var_dump($datas);

        $books = [];
        foreach($datas as $elem) {
            $book = new Book();
            $book->setIdBook($elem['id_book']);
            $book->setIdUser($elem['id_user']);
            $book->setTitle($elem['title']);
            $book->setAuteur($elem['auteur']);
            $book->setImage($elem['image']);
            $book->setCategorie($elem['categorie']);
            $book->setDescription($elem['description']);
            $book->setNote($elem['note']);
            $book->setOpinion($elem['opinion']);
            array_push($books, $book);
        }

        //var_dump($books);
        return $books;
        
    }


    // Permet de modifier un livre dans la base de donnée. 
    public function update(){
        $query ="UPDATE * FROM books WHERE id_book = :id_book";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_book', $this->idBook, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch();
                //appel aux setters de l'objet
            return $this;
    }

    // Permet de supprimer un livre dans la base de donnée. 
    public function delete(){
        $query ="DELETE * FROM books WHERE id_book = :id_book";
        $result = $this->pdo->prepare($query);
        $result->bindValue('id_book', $this->idBook, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch();
        //appel aux setters de l'objet
        return $this;
    }

    // La syntaxe get permet de lier une propriété d'un objet à une fonction qui sera appelée lorsqu'on accédera à la propriété.
    public function getIdBook() {
        return $this->idBook;
    }

    public function setIdBook(int $id_book) {
        $this->idBook = $id_book;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur(string $auteur) {
        $this->auteur = $auteur;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie(string $categorie) {
        $this->categorie = $categorie;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    public function getOpinion() {
        return $this->opinion;
    }

    public function setOpinion(string $opinion) {
        $this->opinion = $opinion;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote(int $note) {
        $this->note = $note;
    }

    public function setIdUser(int $idUser) {
        $this->idUser = $idUser;
    }

    public function getIdUser() {
        return $this->idUser;
    }
}