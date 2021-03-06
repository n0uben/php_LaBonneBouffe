-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 18 mai 2022 à 23:56
-- Version du serveur :  8.0.29-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `LaBonneBouffeNoureuxGerber`
--

-- --------------------------------------------------------

--
-- Structure de la table `composition`
--

CREATE TABLE `composition` (
  `id_ingredient` int NOT NULL,
  `id_recette` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `composition`
--

INSERT INTO `composition` (`id_ingredient`, `id_recette`, `quantite`) VALUES
(1, 1, 500),
(2, 1, 750);

-- --------------------------------------------------------

--
-- Structure de la table `Ingredient`
--

CREATE TABLE `Ingredient` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `uniteMesure` enum('g','kg','cl','l','cac','cas','pincée') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Ingredient`
--

INSERT INTO `Ingredient` (`id`, `nom`, `uniteMesure`) VALUES
(1, 'concombre', 'g'),
(2, 'pommes de terre', 'g'),
(3, 'tomates', 'g'),
(4, 'cotes de porc', 'g'),
(201, 'test', 'g');

-- --------------------------------------------------------

--
-- Structure de la table `Recette`
--

CREATE TABLE `Recette` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `categorie` enum('entrée','plat','dessert') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `niveau` enum('1','2','3') COLLATE utf8mb4_general_ci NOT NULL,
  `tpsPrepa` int NOT NULL,
  `tpsCuisson` int NOT NULL,
  `budget` enum('pas cher','moyen','cher') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nbPers` int NOT NULL,
  `etapes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `utilisateurID` int NOT NULL,
  `regionID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Recette`
--

INSERT INTO `Recette` (`id`, `nom`, `categorie`, `niveau`, `tpsPrepa`, `tpsCuisson`, `budget`, `nbPers`, `etapes`, `utilisateurID`, `regionID`) VALUES
(1, 'salade de concombre et pommes de terre', 'entrée', '1', 10, 20, 'pas cher', 2, 'cuire les pommes de terre - éplucher le concombre - couper le concombre en fines rondelles - idem pour les pdts - mélanger le tout dans un saladier avec un filet d’huile d’olive', 2, 1),
(2, 'pates au beurre', 'plat', '1', 60, 30, 'moyen', 2, 'faire bouillir l’eau, mettre les pates. une fois cuites, rajouter du beurre', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Region`
--

CREATE TABLE `Region` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Region`
--

INSERT INTO `Region` (`id`, `nom`) VALUES
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
(13, 'Provence-Alpes-Cote d Azur');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `email`, `mdp`, `nom`, `role`) VALUES
(1, 'kevin@example.com', 'kevin', 'Kevin', 'admin'),
(2, 'benjamin@example.com', 'benjamin', 'Benjamin', 'admin'),
(5, 'demo@example.com', '$argon2i$v=19$m=65536,t=4,p=1$SU9RQXgvc1hNcWNMeXhzQg$ismITkoESUMxq+/qTkztt5wZBmcX2XfvmThb0LieO+w', 'demo', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`id_ingredient`,`id_recette`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Index pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Recette`
--
ALTER TABLE `Recette`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateurID` (`utilisateurID`),
  ADD KEY `regionID` (`regionID`);

--
-- Index pour la table `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Ingredient`
--
ALTER TABLE `Ingredient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT pour la table `Recette`
--
ALTER TABLE `Recette`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Region`
--
ALTER TABLE `Region`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `composition`
--
ALTER TABLE `composition`
  ADD CONSTRAINT `composition_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `Ingredient` (`id`),
  ADD CONSTRAINT `composition_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `Recette` (`id`);

--
-- Contraintes pour la table `Recette`
--
ALTER TABLE `Recette`
  ADD CONSTRAINT `id` FOREIGN KEY (`regionID`) REFERENCES `Region` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
