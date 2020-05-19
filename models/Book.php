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

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser(int $id) {
        $this->idUser = $id_user;
    }