-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 avr. 2022 à 18:17
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdboutique`
--
CREATE DATABASE IF NOT EXISTS `bdboutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bdboutique`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ida` int(11) NOT NULL,
  `nomarticle` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `imageart` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `qteinventaire` int(11) NOT NULL,
  `seuil` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`ida`, `nomarticle`, `description`, `imageart`, `categorie`, `qteinventaire`, `seuil`, `prix`) VALUES
(1, 'Le Titanic', 'Une tragique histoire d''amour sur le célèbre navire Titanic.', 'Titanic.jpg', 'Drame', 10, 5, 20.00),
(2, 'Avatar', 'Un marine paraplégique envoyé sur la lune Pandora se retrouve partagé entre suivre ses ordres et protéger le monde qu''il considère comme le sien.', 'Avatar.jpg', 'Sci-Fi', 10, 5, 25.00),
(3, 'Baby Driver', 'Un jeune chauffeur talentueux, surnommé Baby, compte sur le rythme de sa bande-son personnelle pour être le meilleur.', 'BabyDriver.jpg', 'Action', 10, 5, 15.00),
(4, 'Mission Impossible', 'Un agent secret est accusé de trahison par ses propres collègues et tente de découvrir le vrai traître.', 'MissionImpossible.png', 'Action', 10, 5, 18.00),
(5, 'Star Wars: L''Empire Contre-Attaque', 'Après la destruction de l''Étoile de la Mort, l''Empire a juré de se venger contre les Rebelles.', 'StarWars.jpg', 'Sci-Fi', 10, 5, 22.00),
(6, 'Casino Royale', 'James Bond, dans sa première mission en tant que 007, doit neutraliser un banquier du terrorisme lors d''une partie de poker à haut risque.', 'CasinoRoyale.jpg', 'Action', 10, 5, 20.00),
(7, 'Jaws', 'Un grand requin blanc menace les baigneurs d''une petite station balnéaire, et c''est à un trio d''hommes de le stopper.', 'Jaws.jpg', 'Horreur', 10, 5, 17.00),
(8, 'Interstellar', 'Des explorateurs voyagent à travers un trou de ver près de Saturne pour assurer la survie de l''humanité.', 'Interstellar.jpg', 'Sci-Fi', 10, 5, 25.00),
(9, 'Creed 1', 'Le fils d''Apollo Creed cherche à devenir un boxeur professionnel et demande à Rocky Balboa de devenir son entraîneur.', 'Creed.jpg', 'Drame', 10, 5, 18.00),
(10, 'Le Roi Lion', 'Simba idolâtre son père, le roi Mufasa, et prend à cœur son propre destin royal. Mais la venue au monde de Simba ne plaît pas à tout le monde.', 'LeRoiLion.jpg', 'Animation', 10, 5, 20.00);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idcateg` int(11) NOT NULL,
  `categ` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idcateg`, `categ`) VALUES
(1, 'Drame'),
(2, 'Comedie'),
(3, 'Science-fiction'),
(4, 'Horreur'),
(5, 'Action'),
(6, 'Fantastiques'),
(7, 'Thriller');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `idm` int(11) NOT NULL,
  `courriel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'M',
  `statut` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idm`, `courriel`, `pass`, `role`, `statut`) VALUES
(1, 'admin@locafilms.com', 'Admin_2000', 'A', 'A'),
(3, 'antonio@gmail.com', 'IFT_1147', 'M', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `idm` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datenaissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`idm`, `nom`, `prenom`, `courriel`, `sexe`, `datenaissance`) VALUES
(1, 'Raphael', 'Touze', 'admin@locafilms.com', 'M', '1968-02-16'),
(3, 'Antonio', 'Tavares', 'antonio@gmail.com', 'M', '2022-03-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ida`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcateg`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`idm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idcateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
