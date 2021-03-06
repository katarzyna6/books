<?php

// La classe instancie un nouvel utilisateur. Elle est liée à DbConnect qui permet de lier la base de donnée à la classe. 
// Elle requiert les méthodes afin d'agrémenter la base

class User extends DbConnect {
    
    private $idUser;
    private $nick;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $autorisation;

    // Le construct permet d'établir une structure de notre utilisateur
    function __construct($id = null) {
        parent::__construct($id);
    }

    // La syntaxe get permet de lier une propriété d'un objet à une fonction qui sera appelée lorsqu'on accédera à la propriété.
    public function getIdUser () {    
        return $this->idUser;
    }
    
    // La syntaxe set permet de lier une propriété d'un objet à une fonction qui sera appelée à chaque tentative de modification de cette propriété.
    public function setIdUser(int $idUser) {
        $this->idUser = $idUser;
    }
    
    public function getNick() {
        return $this->nick;
    }
    
    public function setNick(string $nick) {
        $this->nick = $nick;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function setNom(string $nom) {
        $this->nom = $nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail(string $email) {
        $this->email = $email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword(string $password) {
        $this->password = $password;
    }
    
    public function getAutorisation() {
        return $this->pseudo;
    }
    
    public function setAutorisation(int $autorisation) {
        $this->autorisation = $autorisation;
    }

    // Permet d'inserer un utilisateur dans la base de donnée.
    function insert(){
    
        $query = "INSERT INTO users (nick, nom, prenom, email, password, autorisation)
            VALUES(:nick, :nom, :prenom, :email, :password, :autorisation)";

        $result = $this->pdo->prepare($query);
        $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
        $result->bindValue(':nom', $this->nom, PDO::PARAM_STR);
        $result->bindValue(':prenom', $this->prenom, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':autorisation', $this->autorisation, PDO::PARAM_INT);
        $result->execute();

        $this->id = $this->pdo->lastInsertId();
        return $this;
        
    }
    
    // Permet de modifier un utilisateur dans la base de donnée. 
    function update(){
        $query ="UPDATE * FROM users WHERE nick=:nick";
        $result = $this->pdo->prepare($query);
        $result->bindValue('nick', $this->nick, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
                //appel aux setters de l'objet
            return $this;
    }

    // Permet de supprimer un utilisateur dans la base de donnée. 
    function delete(){
        $query ="DELETE * FROM users WHERE nick=:nick";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
            //appel aux setters de l'objet
        return $this;
    }
       
    // Permet de selectionner un utilisateurs dans la base de donnée.
    function select(){
        $query = "SELECT * FROM users WHERE id_user = :id_user";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':id_user', $this->idUser, PDO::PARAM_INT);
        $result->execute();
        $data = $result->fetch();
            //appel aux setters de l'objet
        return $this;
    }

    public function selectByNick() {
        $query = "SELECT * FROM users WHERE nick = :nick";
        $result = $this->pdo->prepare($query);
        $result->bindValue(':nick', $this->nick, PDO::PARAM_STR);
        $result->execute();
        $data = $result->fetch();
                //appel aux setters de l'objet
         return $data;
        }


    // Permet de selectionner tous les utilisateurs dans la base de donnée. 
    //La méthode selectAll() (correspondant à la propriété read de la méthode CRUD) va nous permettre de récupérer toutes les données enregistrées dans une table.
    function selectAll() {
        $query = "SELECT * FROM users;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchAll(); //fetch->récupérer les resultats dans un tableau
        $tab = [];
        //var_dump($datas);

        foreach($datas as $data) {
            $current = new User();
            $current->setIdUser($data['id_user']);
            array_push($tab, $current);
            }
            return $tab;
    }
}
    