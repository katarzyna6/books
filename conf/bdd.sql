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
        image       Varchar (250) NOT NULL ,
        description Varchar (250) NOT NULL ,
        note        Int NOT NULL ,
        categorie   Varchar (50) NOT NULL ,
        opinion      Varchar (250) NOT NULL ,
        id_user     Int NOT NULL ,
        CONSTRAINT BOOKS_PK PRIMARY KEY (id_BOOK) ,
        CONSTRAINT BOOKS_USERS_FK FOREIGN KEY (id_user) REFERENCES USERS(id_user)
)ENGINE=InnoDB;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mai 2020 à 14:18
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `livres`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `auteur` varchar(200) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `categorie` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `note` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `opinion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_book`),
  KEY `BOOKS_USERS_FK` (`id_user`),
  KEY `BOOKS_CAT_FK` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `BOOKS_CAT_FK` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `BOOKS_USERS_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
