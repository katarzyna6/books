-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 mai 2020 à 06:23
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
  `description` text NOT NULL,
  `note` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `opinion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_book`),
  KEY `BOOKS_USERS_FK` (`id_user`),
  KEY `BOOKS_CAT_FK` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom`) VALUES
(1, 'Romans'),
(2, 'Romans d\'aventures'),
(3, 'Science fiction'),
(4, 'Horreurs'),
(5, 'Biographies'),
(6, 'Contes'),
(7, 'Nouvelles'),
(8, 'Reportages');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(70) NOT NULL,
  `autorisation` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nick` (`nick`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nick`, `nom`, `prenom`, `email`, `password`, `autorisation`) VALUES
(1, 'adam', 'Durand', 'adam', 'adam@gmail.com', '$2y$10$nF/joCZIUIpwmlt8F/hOwuyC1keoGOgYJOiluFfKxERapfoQou4Ba', 0),
(8, 'bob', 'McKee', 'Bob', 'bob@jk.fr', '$2y$10$4ZK.0t04Xkk6xAkQ5x.vp.sKCFXuvK1X3d0LjMUjpewUj2tCMyYDO', 0);

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
