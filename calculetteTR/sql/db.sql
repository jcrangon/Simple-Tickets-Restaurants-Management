-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 05 Juillet 2018 à 19:41
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adalina`
--

-- --------------------------------------------------------

--
-- Structure de la table `bordereau`
--

DROP TABLE IF EXISTS `bordereau`;
CREATE TABLE IF NOT EXISTS `bordereau` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `annee` char(10) NOT NULL,
  `mois` char(20) NOT NULL,
  `jour` char(60) NOT NULL,
  `nbrticket` int(11) NOT NULL,
  `valeurtot` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comptagetr`
--

DROP TABLE IF EXISTS `comptagetr`;
CREATE TABLE IF NOT EXISTS `comptagetr` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `datescan` date NOT NULL,
  `numident` char(60) NOT NULL,
  `code` tinyint(3) NOT NULL,
  `type` char(60) NOT NULL,
  `valeurf` decimal(5,2) NOT NULL,
  `divers` char(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stockagetr`
--

DROP TABLE IF EXISTS `stockagetr`;
CREATE TABLE IF NOT EXISTS `stockagetr` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `datef` date NOT NULL,
  `ident` char(60) NOT NULL,
  `codef` tinyint(3) NOT NULL,
  `typef` char(60) NOT NULL,
  `valeurfac` decimal(5,2) NOT NULL,
  `diverstr` char(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `trtype`
--

DROP TABLE IF EXISTS `trtype`;
CREATE TABLE IF NOT EXISTS `trtype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CodeType` int(2) NOT NULL,
  `typeTicket` char(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `trtype`
--

INSERT INTO `trtype` (`ID`, `CodeType`, `typeTicket`) VALUES
(1, 99, 'Autre'),
(0, 1, 'Cheque Dejeuner'),
(3, 2, 'Ticket Restaurant'),
(4, 3, 'Cheque de Table'),
(5, 4, 'Cheque Restaurant');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
