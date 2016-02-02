-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2016 at 04:53 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stages`
--

-- --------------------------------------------------------

--
-- Table structure for table `Entreprise`
--

CREATE TABLE IF NOT EXISTS `Entreprise` (
  `entrepriseId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `numTel` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `verifie` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`entrepriseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Entreprise`
--

INSERT INTO `Entreprise` (`entrepriseId`, `nom`, `pays`, `ville`, `fax`, `email`, `adresse`, `numTel`, `description`, `verifie`) VALUES
(24, 'Attijari Wafabank', 'Maroc', 'Rabat', '', 'salimi.imad@gmail.com', 'Av. la résistance', '+212578456924', 'Banque', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Etudiant`
--

CREATE TABLE IF NOT EXISTS `Etudiant` (
  `etudiantId` int(11) NOT NULL AUTO_INCREMENT,
  `cne` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`etudiantId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Etudiant`
--

INSERT INTO `Etudiant` (`etudiantId`, `cne`, `nom`, `prenom`, `filiere`, `niveau`, `dateNaissance`, `createdAt`, `updatedAt`, `ville`, `pays`) VALUES
(30, '1210541168', 'Salimi', 'Imad', 'GINF', '2', '1994-08-06', '2016-01-15 02:45:17', '2016-01-15 02:45:17', 'Sala Al Jadida', 'Maroc');

-- --------------------------------------------------------

--
-- Table structure for table `Filiere`
--

CREATE TABLE IF NOT EXISTS `Filiere` (
  `filiereId` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`filiereId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Filiere`
--

INSERT INTO `Filiere` (`filiereId`, `code`, `titre`) VALUES
(1, 'G3EI', 'Génie Eco-énergétique et Environnement Industriel'),
(2, 'GIND', 'Génie Industriel & Logistique'),
(3, 'GINF', 'Génie Informatique'),
(4, 'GSEA', 'Génie des Systèmes Électroniques et automatiques'),
(5, 'GSTR', 'Génie des Systèmes de Télécommunications & Réseaux');

-- --------------------------------------------------------

--
-- Table structure for table `Jury`
--

CREATE TABLE IF NOT EXISTS `Jury` (
  `juryId` int(11) NOT NULL AUTO_INCREMENT,
  `tuteur1Id` int(11) NOT NULL,
  `tuteur2Id` int(11) NOT NULL,
  `tuteur3Id` int(11) NOT NULL,
  PRIMARY KEY (`juryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `stageId` int(11) NOT NULL,
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(2000) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20160201214001);

-- --------------------------------------------------------

--
-- Table structure for table `Postulat`
--

CREATE TABLE IF NOT EXISTS `Postulat` (
  `sujetId` int(11) NOT NULL,
  `etudiantId` int(11) NOT NULL,
  `etat` varchar(1) NOT NULL,
  PRIMARY KEY (`sujetId`,`etudiantId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Soutenance`
--

CREATE TABLE IF NOT EXISTS `Soutenance` (
  `soutenanceId` int(11) NOT NULL AUTO_INCREMENT,
  `juryId` int(11) DEFAULT NULL,
  `stageId` int(11) NOT NULL,
  `dateSoutenance` date NOT NULL,
  PRIMARY KEY (`soutenanceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `Stage`
--

CREATE TABLE IF NOT EXISTS `Stage` (
  `stageId` int(11) NOT NULL AUTO_INCREMENT,
  `etudiantId` int(11) NOT NULL,
  `sujetId` int(11) NOT NULL,
  `tuteurId` int(11) NOT NULL,
  `tuteurExtId` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `periode` int(11) NOT NULL,
  PRIMARY KEY (`stageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `Sujet`
--

CREATE TABLE IF NOT EXISTS `Sujet` (
  `sujetId` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `entrepriseId` varchar(255) NOT NULL,
  `prerequis` varchar(500) DEFAULT NULL,
  `tuteurId` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `periode` int(11) NOT NULL,
  `nbPlaces` int(11) NOT NULL,
  PRIMARY KEY (`sujetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `Tuteur`
--

CREATE TABLE IF NOT EXISTS `Tuteur` (
  `tuteurId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `chefId` int(11) DEFAULT NULL,
  PRIMARY KEY (`tuteurId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `TuteurExt`
--

CREATE TABLE IF NOT EXISTS `TuteurExt` (
  `tuteurId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `entrepriseId` varchar(255) NOT NULL,
  PRIMARY KEY (`tuteurId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numTel` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `role` varchar(255) NOT NULL,
  `recoverHash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userId`, `username`, `password`, `email`, `numTel`, `adresse`, `createdAt`, `updatedAt`, `role`, `recoverHash`) VALUES
(1, 'Super', '$2y$10$QLzRy0BrtQjgj/YT..xc5eZ2oM5LxAI.7tB722B8VcN6BzKSZ/qnm', 'test@example.com', '+212623181624', 'Boukhalef, Tanger', '2015-12-21 00:00:00', '2015-12-21 00:00:00', 'superviseur', NULL),
(24, 'salimi.imad@gmail.com', '$2y$10$QLzRy0BrtQjgj/YT..xc5eZ2oM5LxAI.7tB722B8VcN6BzKSZ/qnm', 'salimi.imad@gmail.com', '+212537485697', 'Bd. Mohamed V', '2016-01-15 02:25:53', '2016-01-15 02:25:53', 'entreprise', NULL),
(30, '1210541168', '$2y$10$BtRxbBcN0fUYJm16oc095ekvYdELYDixMINgLmBy0A7d36hOM8eve', 'salimi.imad@gmail.com', '+21253469854', 'Av. Mohammed Hassar', '2016-01-15 02:45:17', '2016-01-15 02:45:17', 'etudiant', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
