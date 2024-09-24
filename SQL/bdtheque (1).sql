-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 fév. 2024 à 17:01
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdtheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `bandesdessinees`
--

DROP TABLE IF EXISTS `bandesdessinees`;
CREATE TABLE IF NOT EXISTS `bandesdessinees` (
  `BD_ID` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) DEFAULT NULL,
  `Auteur` varchar(255) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  `Disponibilite` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`BD_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `ReservationID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `BD_ID` int DEFAULT NULL,
  `DateReservation` date DEFAULT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `UserID` (`UserID`),
  KEY `BD_ID` (`BD_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MotDePasse` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`UserID`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `is_admin`) VALUES
(14, 'pepe', 'gogo', 'pepe@gmail.com', '$2y$10$AGlRbjLckJZ3S0qhovXVs.2lctw7b6ms/bP7ytAAMyiSyXvHBSrwu', NULL),
(11, '   nyaz   ', 'dede', 'nyazdede@gmail.com', '$2y$10$kRd9k0SuTOz3TerSinI/fucGfNK39RwWGhRLy2ber/XRBQqE/hIs.', NULL),
(9, 'pedro', 'gomes', 'pedrogomeslycee@gmail.com', '$2y$10$mQmCE7uM/8w.cxNU/ZZqLehddbN//RP5QwhW9P63MYJnH3mjzYWC.', NULL),
(12, 'vasile', 'papi', 'vasile@gmail.com', '$2y$10$dQyLe2DJ5rLWSaCSw.vu/uAPNqp3oKeUuOzmGM2dJZSE9Ui1Fz4ua', NULL),
(15, 'nyaz', 'pedro', 'pedro@gmail.com', '$2y$10$doIA1aylEkAzYsshTaGXVuB9euLKTwiVbhzhSWTw9mvQI4jwOPyQy', NULL),
(16, 'timi', 'gomes', 'timi@gmail.com', '$2y$10$yUGzueskTYdXQmkETAM/deahjOJKBLNr3TN6paOMhtxpeP3T4aN3a', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
