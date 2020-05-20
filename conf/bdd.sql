#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: USERS
#------------------------------------------------------------

CREATE TABLE USERS(
        id_user      Int  Auto_increment  NOT NULL ,
        nick         Varchar (200) NOT NULL ,
        nom          Varchar (200) NOT NULL ,
        prenom       Varchar (200) NOT NULL ,
        email        Varchar (200) NOT NULL ,
        password     Varchar (70) NOT NULL ,
        autorisation Int NOT NULL
	,CONSTRAINT USERS_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: BOOKS
#------------------------------------------------------------

CREATE TABLE BOOKS(
        id_book     Int  Auto_increment  NOT NULL ,
        title       Varchar (200) NOT NULL ,
        auteur      Varchar (200) NOT NULL ,
        description Varchar (250) NOT NULL ,
        note        Int NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT BOOKS_PK PRIMARY KEY (id_BOOK)

	,CONSTRAINT BOOKS_USERS_FK FOREIGN KEY (id_user) REFERENCES USERS(id_user)
)ENGINE=InnoDB;