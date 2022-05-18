-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 mai 2022 à 21:33
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `labonnebouffenoureuxgerber`
--

-- --------------------------------------------------------

--
-- Structure de la table `composition`
--

DROP TABLE IF EXISTS `composition`;
CREATE TABLE IF NOT EXISTS `composition` (
  `id_ingredient` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_ingredient`,`id_recette`),
  KEY `id_recette` (`id_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `composition`
--

INSERT INTO `composition` (`id_ingredient`, `id_recette`, `quantite`) VALUES
(1, 1, 500),
(2, 1, 750);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `uniteMesure` enum('g','kg','cl','l','cac','cas','pincée') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`, `uniteMesure`) VALUES
(1, 'Concombre', 'g'),
(2, 'pommes de terre', 'g'),
(14, 'tomates', 'g'),
(15, 'cotes de porc', 'g'),
(16, 'bavette', 'g'),
(17, 'test', 'g'),
(18, 'chips', 'l'),
(19, 'tomate', 'cac'),
(20, 'a', 'g'),
(21, 'b', 'kg'),
(22, 'aaaaa', 'l'),
(23, 'test', 'kg');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `niveau` int(11) NOT NULL,
  `tpsPrepa` int(11) NOT NULL,
  `tpsCuisson` int(11) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `nbPers` int(11) NOT NULL,
  `etapes` mediumtext NOT NULL,
  `utilisateurID` int(11) NOT NULL,
  `regionID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `regionID` (`regionID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `categorie`, `niveau`, `tpsPrepa`, `tpsCuisson`, `budget`, `nbPers`, `etapes`, `utilisateurID`, `regionID`) VALUES
(1, 'salade de concombre et pommes de terre', 'entrées', 1, 10, 20, 'pas cher', 2, '- cuire les pommes de terre\r\n- éplucher le concombre\r\n- couper le concombre en fines rondelles\r\n- idem pour les pdts\r\n- mélanger le tout dans un saladier avec un filet d’huile d’olive', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `nom`) VALUES
(1, 'Auvergne-Rhone-Alpes'),
(2, 'Bourgogne-Franche-Comte'),
(3, 'Bretagne'),
(4, 'Centre-Val de Loire'),
(5, 'Corse'),
(6, 'Grand Est'),
(7, 'Hauts-de-France'),
(8, 'Ile-de-France'),
(9, 'Normandie'),
(10, 'Nouvelle-Aquitaine'),
(11, 'Occitanie'),
(12, 'Pays de la Loire'),
(13, 'Provence-Alpes-Cote dAzur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `mdp`, `nom`, `role`) VALUES
(1, 'kevin@example.com', 'kevin', 'Kevin', 'admin'),
(2, 'benjamin@example.com', 'benjamin', 'Benjamin', 'admin'),
(5, 'tzerfzef@ehfuyh.com', 'francis', 'franciss', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `composition`
--
ALTER TABLE `composition`
  ADD CONSTRAINT `composition_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient` (`id`),
  ADD CONSTRAINT `composition_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `id` FOREIGN KEY (`regionID`) REFERENCES `region` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
