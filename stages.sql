-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2016 at 10:07 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Entreprise`
--

INSERT INTO `Entreprise` (`entrepriseId`, `nom`, `pays`, `ville`, `fax`, `email`, `adresse`, `numTel`, `description`, `verifie`) VALUES
(24, 'Attijari Wafabank', 'Maroc', 'Tanger', '', 'salimi.imad@gmail.com', 'Bd. Mohamed V', '+212537485697', 'Attijariwafa bank est un groupe bancaire et financier marocain; il est considéré comme le premier groupe bancaire et financier du Maghreb.', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `Etudiant`
--

INSERT INTO `Etudiant` (`etudiantId`, `cne`, `nom`, `prenom`, `filiere`, `niveau`, `dateNaissance`, `createdAt`, `updatedAt`, `ville`, `pays`) VALUES
(30, '1210541168', 'Salimi', 'Imad', 'GINF', '3', '1994-02-10', '2016-01-15 02:45:17', '2016-01-15 02:45:17', 'Sala Al Jadida', 'Maroc');

-- --------------------------------------------------------

--
-- Table structure for table `Filiere`
--

CREATE TABLE IF NOT EXISTS `Filiere` (
  `code` varchar(4) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Filiere`
--

INSERT INTO `Filiere` (`code`, `titre`) VALUES
('G3EI', 'Génie Eco-énergétique et Environnement Industriel'),
('GIND', 'Génie Industriel & Logistique'),
('GINF', 'Génie Informatique'),
('GSEA', 'Génie des Systèmes Électroniques et automatiques'),
('GSTR', 'Génie des Systèmes de Télécommunications & Réseaux');

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `StageId` int(11) NOT NULL,
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(2000) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
(20160115063139);

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

--
-- Dumping data for table `Postulat`
--

INSERT INTO `Postulat` (`sujetId`, `etudiantId`, `etat`) VALUES
(2, 30, 'A');

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

--
-- Dumping data for table `Stage`
--

INSERT INTO `Stage` (`stageId`, `etudiantId`, `sujetId`, `tuteurId`, `tuteurExtId`, `dateDebut`, `periode`) VALUES
(2, 30, 2, 33, 25, '2016-01-10', 4);

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
  PRIMARY KEY (`sujetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Sujet`
--

INSERT INTO `Sujet` (`sujetId`, `titre`, `description`, `niveau`, `filiere`, `entrepriseId`, `prerequis`, `tuteurId`, `dateDebut`, `periode`) VALUES
(2, 'Offre de PFE en développement web (.NET)', 'Réalisation d''une application pour la gestion des clients.', '3', 'GINF', '24', '- Bac +5\r\n- Génie Informatique', 25, '2016-01-10', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Tuteur`
--

CREATE TABLE IF NOT EXISTS `Tuteur` (
  `tuteurId` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `filiere` varchar(4) NOT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `chefId` int(11) DEFAULT NULL,
  PRIMARY KEY (`tuteurId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Tuteur`
--

INSERT INTO `Tuteur` (`tuteurId`, `nom`, `prenom`, `filiere`, `departement`, `chefId`) VALUES
(26, 'El Haddad', 'Mohammed', 'GINF', 'SIC', NULL),
(33, 'Belmokaddem', 'Houda', 'GINF', 'Informatique', 26);

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

--
-- Dumping data for table `TuteurExt`
--

INSERT INTO `TuteurExt` (`tuteurId`, `nom`, `prenom`, `email`, `entrepriseId`) VALUES
(25, 'Sabiri', 'Mohammed', 'iyadhakim@gmail.com', '24');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userId`, `username`, `password`, `email`, `numTel`, `adresse`, `createdAt`, `updatedAt`, `role`, `recoverHash`) VALUES
(1, 'Super', '$2y$10$QLzRy0BrtQjgj/YT..xc5eZ2oM5LxAI.7tB722B8VcN6BzKSZ/qnm', 'test@example.com', '+212623181624', 'Boukhalef, Tanger', '2015-12-21 00:00:00', '2015-12-21 00:00:00', 'superviseur', NULL),
(24, 'salimi.imad@gmail.com', '$2y$10$QLzRy0BrtQjgj/YT..xc5eZ2oM5LxAI.7tB722B8VcN6BzKSZ/qnm', 'salimi.imad@gmail.com', '+212537485697', 'Bd. Mohamed V', '2016-01-15 02:25:53', '2016-01-15 02:25:53', 'entreprise', NULL),
(25, 'iyadhakim@gmail.com', '$2y$10$QLzRy0BrtQjgj/YT..xc5eZ2oM5LxAI.7tB722B8VcN6BzKSZ/qnm', 'iyadhakim@gmail.com', '+212656847598', '', '2016-01-15 02:27:50', '2016-01-15 02:27:50', 'tuteur ext', NULL),
(26, 'el-haddad-mohammed', '$2y$10$QLzRy0BrtQjgj/YT..xc5eZ2oM5LxAI.7tB722B8VcN6BzKSZ/qnm', 'salimi.imad@gmail.com', '+21265789632', '', '2016-01-15 02:35:10', '2016-01-15 02:35:10', 'chef filiere', NULL),
(30, '1210541168', '$2y$10$BtRxbBcN0fUYJm16oc095ekvYdELYDixMINgLmBy0A7d36hOM8eve', 'salimi.imad@gmail.com', '+21253469854', 'Av. Mohammed Hassar', '2016-01-15 02:45:17', '2016-01-15 02:45:17', 'etudiant', NULL),
(33, 'boyofrabat@gmail.com', '$2y$10$aDGU6akuoJ/xD4sfnUDnOOPiR8y2s3VeLGB2pkOaskx5BNRj2i0eq', 'boyofrabat@gmail.com', '+21254789654', '', '2016-01-15 02:49:03', '2016-01-15 02:49:03', 'tuteur', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
