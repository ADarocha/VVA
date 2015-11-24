-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Novembre 2015 à 17:51
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `resa_vva`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `USER` char(8) NOT NULL,
  `MDP` char(10) DEFAULT NULL,
  `NOMCOMPTE` char(40) DEFAULT NULL,
  `PRENOMCOMPTE` char(30) DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATESUPPRESSION` date DEFAULT NULL,
  `TYPECOMPTE` char(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`USER`, `MDP`, `NOMCOMPTE`, `PRENOMCOMPTE`, `DATEINSCRIP`, `DATESUPPRESSION`, `TYPECOMPTE`) VALUES
('admin', 'admin', 'Administrateur', 'Administrateur', '2015-09-01', NULL, 'adm'),
('Villageo', 'villageois', 'Villageois', 'Le Villageois', '2015-09-16', NULL, 'vil'),
('gestionn', 'gestionnai', 'gestionnaire', 'Le Gestionnaire maggle', '2014-12-31', NULL, 'ges');

-- --------------------------------------------------------

--
-- Structure de la table `etat_resa`
--

CREATE TABLE IF NOT EXISTS `etat_resa` (
  `CODEETATRESA` char(2) NOT NULL,
  `NOMETATRESA` char(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat_resa`
--

INSERT INTO `etat_resa` (`CODEETATRESA`, `NOMETATRESA`) VALUES
('ok', 'validé'),
('at', 'Attente arrhes'),
('ap', 'Arrhes payés'),
('pa', 'Payé'),
('te', 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `hebergement`
--

CREATE TABLE IF NOT EXISTS `hebergement` (
  `NOHEB` int(11) NOT NULL AUTO_INCREMENT,
  `CODETYPEHEB` char(5) NOT NULL,
  `NOMHEB` char(25) DEFAULT NULL,
  `NBPLACEHEB` int(11) DEFAULT NULL,
  `SURFACEHEB` int(11) DEFAULT NULL,
  `INTERNET` tinyint(1) DEFAULT NULL,
  `ANNEEHEB` int(11) DEFAULT NULL,
  `SECTEURHEB` char(15) DEFAULT NULL,
  `ORIENTATIONHEB` char(5) DEFAULT NULL,
  `ETATHEB` char(32) DEFAULT NULL,
  `DESCRIHEB` char(200) DEFAULT NULL,
  `PHOTOHEB` char(200) DEFAULT NULL,
  UNIQUE KEY `NOHEB` (`NOHEB`),
  KEY `I_FK_HEBERGEMENT_TYPE_HEB` (`CODETYPEHEB`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `hebergement`
--

INSERT INTO `hebergement` (`NOHEB`, `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`) VALUES
(1, 'vil', 'VillaViche', 10, 800, 0, 2015, 'Plage', 'Sud', 'Neuve', 'TrÃ¨s belle villa au bord de la plage.', 'http://picasso-rouvray-col.spip.ac-rouen.fr/IMG/didapages/laurens/luxury-villas.jpg'),
(2, 'vil', 'Maison bienbel', 5, 200, 0, 1995, 'Campagne', 'Nord', 'Propre et rÃ©novÃ©e.', 'Petite maison a la campagne.', 'http://www.pierreetassocies.com/wp-content/uploads/2015/06/maison-bois-eco-07sur10-pierreetassocies.jpg'),
(10, 'mob', 'Kar-A-Vanne', 1, 7, 0, 1822, 'Bidonville', 'Est', 'Piteux', 'Caravanne Ã  moitiÃ© dÃ©glinguÃ©e.', 'http://www.domaine-du-roc.com/files/caravanes_de_collection/caravane_de_collection_sologne_de_1960_camping_domaine_du_roc_morbihan_bretagne_sud.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `resa`
--

CREATE TABLE IF NOT EXISTS `resa` (
  `NOHEB` int(11) NOT NULL,
  `DATEDEBSEM` date NOT NULL,
  `NOVILLAGEOIS` int(11) NOT NULL,
  `CODEETATRESA` char(2) NOT NULL,
  `DATERESA` date DEFAULT NULL,
  `DATEACCUSERECEPT` date DEFAULT NULL,
  `DATEARRHES` date DEFAULT NULL,
  `MONTANTARRHES` decimal(7,2) DEFAULT NULL,
  `NBOCCUPANT` int(11) DEFAULT NULL,
  `PRIXRESA` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`NOHEB`,`DATEDEBSEM`),
  UNIQUE KEY `DATEDEBSEM` (`DATEDEBSEM`),
  KEY `I_FK_RESA_VILLAGEOIS` (`NOVILLAGEOIS`),
  KEY `I_FK_RESA_SEMAINE` (`DATEDEBSEM`),
  KEY `I_FK_RESA_ETAT_RESA` (`CODEETATRESA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `resa`
--

INSERT INTO `resa` (`NOHEB`, `DATEDEBSEM`, `NOVILLAGEOIS`, `CODEETATRESA`, `DATERESA`, `DATEACCUSERECEPT`, `DATEARRHES`, `MONTANTARRHES`, `NBOCCUPANT`, `PRIXRESA`) VALUES
(2, '2015-11-21', 1, 'ok', '2015-11-19', '2015-11-19', '2015-11-19', '125.00', 1, '250.00'),
(2, '2015-11-28', 1, 'ok', '2015-11-19', '2015-11-19', '2015-11-19', '125.00', 1, '250.00');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE IF NOT EXISTS `saison` (
  `CODESAISON` char(2) NOT NULL,
  `NOMSAISON` char(15) DEFAULT NULL,
  `DATEDEBSAISON` date DEFAULT NULL,
  `DATEFINSAISON` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`CODESAISON`, `NOMSAISON`, `DATEDEBSAISON`, `DATEFINSAISON`) VALUES
('1', 'haute', '2015-06-15', '2015-10-01'),
('2', 'basse', '2015-10-02', '2016-06-14');

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE IF NOT EXISTS `semaine` (
  `DATEDEBSEM` date NOT NULL,
  `CODESAISON` char(2) NOT NULL,
  `DATEFINSEM` date DEFAULT NULL,
  UNIQUE KEY `DATEDEBSEM` (`DATEDEBSEM`),
  KEY `I_FK_SEMAINE_SAISON` (`CODESAISON`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `semaine`
--

INSERT INTO `semaine` (`DATEDEBSEM`, `CODESAISON`, `DATEFINSEM`) VALUES
('2015-05-30', '1', '2015-06-06'),
('2015-06-06', '1', '2015-06-13'),
('2015-06-13', '1', '2015-06-20'),
('2015-06-20', '1', '2015-06-27'),
('2015-06-27', '1', '2015-07-04'),
('2015-07-04', '1', '2015-07-11'),
('2015-07-11', '1', '2015-07-18'),
('2015-07-18', '1', '2015-07-25'),
('2015-07-25', '1', '2015-08-01'),
('2015-08-01', '1', '2015-08-08'),
('2015-08-08', '1', '2015-08-15'),
('2015-08-15', '1', '2015-08-22'),
('2015-08-22', '1', '2015-08-29'),
('2015-08-29', '1', '2015-09-05'),
('2015-09-05', '1', '2015-09-12'),
('2015-09-12', '1', '2015-09-19'),
('2015-09-19', '1', '2015-09-26'),
('2015-09-26', '1', '2015-10-03'),
('2015-10-03', '1', '2015-10-10'),
('2015-10-10', '1', '2015-10-17'),
('2015-10-17', '2', '2015-10-24'),
('2015-10-24', '2', '2015-10-31'),
('2015-10-31', '2', '2015-11-07'),
('2015-11-07', '2', '2015-11-14'),
('2015-11-14', '2', '2015-11-21'),
('2015-11-21', '2', '2015-11-28'),
('2015-11-28', '2', '2015-12-05'),
('2015-12-05', '2', '2015-12-12'),
('2015-12-12', '2', '2015-12-19'),
('2015-12-19', '2', '2015-12-26'),
('2015-12-26', '2', '2016-01-02'),
('2016-01-02', '2', '2016-01-09'),
('2016-01-09', '2', '2016-01-16'),
('2016-01-16', '2', '2016-01-23'),
('2016-01-23', '2', '2016-01-30'),
('2016-01-30', '2', '2016-02-06'),
('2016-02-06', '2', '2016-02-13'),
('2016-02-13', '2', '2016-02-20'),
('2016-02-20', '2', '2016-02-27'),
('2016-02-27', '2', '2016-03-05'),
('2016-03-05', '2', '2016-03-12'),
('2016-03-12', '2', '2016-03-19'),
('2016-03-19', '2', '2016-03-26'),
('2016-03-26', '2', '2016-04-02'),
('2016-04-02', '2', '2016-04-09'),
('2016-04-09', '2', '2016-04-16'),
('2016-04-16', '2', '2016-04-23'),
('2016-04-23', '2', '2016-04-30'),
('2016-04-30', '2', '2016-05-07'),
('2016-05-07', '2', '2016-05-14'),
('2016-05-14', '2', '2016-05-21'),
('2016-05-21', '2', '2016-05-28'),
('2016-05-28', '2', '2016-06-04'),
('2016-06-04', '2', '2016-06-11'),
('2016-06-11', '2', '2016-06-18'),
('2016-06-18', '1', '2016-06-25'),
('2016-06-25', '1', '2016-07-02'),
('2016-07-02', '1', '2016-07-09'),
('2016-07-09', '1', '2016-07-16'),
('2016-07-16', '1', '2016-07-23'),
('2016-07-23', '1', '2016-07-30'),
('2016-07-30', '1', '2016-08-06'),
('2016-08-06', '1', '2016-08-13'),
('2016-08-13', '1', '2016-08-20'),
('2016-08-20', '1', '2016-08-27'),
('2016-08-27', '1', '2016-09-03'),
('2016-09-03', '1', '2016-09-10'),
('2016-09-10', '1', '2016-09-17'),
('2016-09-17', '1', '2016-09-24'),
('2016-09-24', '1', '2016-10-01'),
('2016-10-01', '1', '2016-10-08'),
('2016-10-08', '1', '2016-10-15'),
('2016-10-15', '1', '2016-10-22'),
('2016-10-22', '1', '2016-10-29');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `NOHEB` int(11) NOT NULL,
  `CODESAISON` char(2) NOT NULL,
  `PRIXHEB` decimal(7,2) DEFAULT NULL,
  KEY `I_FK_TARIF_HEBERGEMENT` (`NOHEB`),
  KEY `I_FK_TARIF_SAISON` (`CODESAISON`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`NOHEB`, `CODESAISON`, `PRIXHEB`) VALUES
(1, '1', '800.00'),
(1, '2', '400.00'),
(2, '1', '400.00'),
(2, '2', '250.00'),
(9, '2', '20.00'),
(9, '1', '50.00'),
(10, '1', '5.00'),
(10, '2', '3.00');

-- --------------------------------------------------------

--
-- Structure de la table `type_heb`
--

CREATE TABLE IF NOT EXISTS `type_heb` (
  `CODETYPEHEB` char(5) NOT NULL,
  `NOMTYPEHEB` char(30) DEFAULT NULL,
  UNIQUE KEY `CODETYPEHEB` (`CODETYPEHEB`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_heb`
--

INSERT INTO `type_heb` (`CODETYPEHEB`, `NOMTYPEHEB`) VALUES
('vil', 'Villa'),
('app', 'Appartement'),
('bun', 'Bungalow'),
('mob', 'Mobile home'),
('cha', 'Chalet');

-- --------------------------------------------------------

--
-- Structure de la table `villageois`
--

CREATE TABLE IF NOT EXISTS `villageois` (
  `NOVILLAGEOIS` int(11) NOT NULL,
  `USER` char(8) NOT NULL,
  `NOMVILLAGEOIS` char(40) DEFAULT NULL,
  `PRENOMVILLAGEOIS` char(30) DEFAULT NULL,
  `ADRMAIL` char(50) DEFAULT NULL,
  `NOTEL` char(15) DEFAULT NULL,
  `NOPORT` char(15) DEFAULT NULL,
  UNIQUE KEY `I_FK_VILLAGEOIS_COMPTE` (`USER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `villageois`
--

INSERT INTO `villageois` (`NOVILLAGEOIS`, `USER`, `NOMVILLAGEOIS`, `PRENOMVILLAGEOIS`, `ADRMAIL`, `NOTEL`, `NOPORT`) VALUES
(1, 'Villageo', 'Evraslip', 'Axel', 'evrard91i@wannadoo.com', '0606060606', '0707070706');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
