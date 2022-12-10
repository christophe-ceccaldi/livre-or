-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 10 déc. 2022 à 08:03
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(6, 'hell is my heaven !', 8, '2022-12-07 04:19:36'),
(7, 'nuts nuts nuts', 9, '2022-12-07 04:59:43'),
(26, 'still on it', 22, '2022-12-10 08:02:03'),
(5, 'dave comment 01', 6, '2022-12-07 01:23:12'),
(21, 'noisette', 9, '2022-12-09 04:03:36'),
(25, 'follow me', 18, '2022-12-09 05:31:50'),
(24, 'last dave comment', 6, '2022-12-09 05:23:15'),
(22, 'window licker', 21, '2022-12-09 04:43:47'),
(23, 'new window licker', 21, '2022-12-09 04:56:16');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(3, 'admin', 'admin'),
(6, 'dave-gahan', '101'),
(18, 'rabbit', 'white'),
(8, 'marylin', 'manson'),
(9, 'tic', 'tac'),
(10, 'sancho', 'pansa'),
(11, 'mohamed', '1234'),
(12, 'bambino', '4321'),
(13, 'toto', 'toto'),
(14, 'zero', 'zoro'),
(16, 'rainy rain', 'notanymore'),
(17, 'abrham', 'mate'),
(19, 'momo', 'momo'),
(20, 'christophe-ceccaldi', '321'),
(21, 'aphex', 'twin'),
(22, 'saturday', 'night');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
