-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Octobre 2015 à 10:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `laval`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbricks`
--

CREATE TABLE IF NOT EXISTS `tbricks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `type` enum('WAVE','MIDI','TEXT','RESP','IMG') DEFAULT NULL,
  `data` text,
  `type_response` enum('WAVE','MIDI','TEXT','IMG') DEFAULT NULL,
  `duree` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tbricks_medias`
--

CREATE TABLE IF NOT EXISTS `tbricks_medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Bricks` int(11) DEFAULT NULL,
  `id_Medias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Bricks` (`id_Bricks`),
  KEY `id_Medias` (`id_Medias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tlessons`
--

CREATE TABLE IF NOT EXISTS `tlessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tlessons_bricks`
--

CREATE TABLE IF NOT EXISTS `tlessons_bricks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Bricks` int(11) DEFAULT NULL,
  `id_Lessons` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Bricks` (`id_Bricks`),
  KEY `id_Lessons` (`id_Lessons`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tmedias`
--

CREATE TABLE IF NOT EXISTS `tmedias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` enum('WAVE','MIDI','TEXT','IMG') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tresponse`
--

CREATE TABLE IF NOT EXISTS `tresponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Users` int(11) DEFAULT NULL,
  `id_Lessons` int(11) DEFAULT NULL,
  `id_Bricks` int(11) DEFAULT NULL,
  `response` varchar(255) DEFAULT NULL,
  `type` enum('WAVE','MIDI','TEXT','RESP','IMG') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Users` (`id_Users`),
  KEY `id_Lessons` (`id_Lessons`),
  KEY `id_Bricks` (`id_Bricks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tsessions`
--

CREATE TABLE IF NOT EXISTS `tsessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tsessions_tlessons`
--

CREATE TABLE IF NOT EXISTS `tsessions_tlessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Sessions` int(11) DEFAULT NULL,
  `id_Lessons` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Sessions` (`id_Sessions`),
  KEY `id_Lessons` (`id_Lessons`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `mail` varchar(60) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` enum('ADMIN','MEMBER') DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tusers_lessons`
--

CREATE TABLE IF NOT EXISTS `tusers_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Lessons` int(11) DEFAULT NULL,
  `id_Users` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Lessons` (`id_Lessons`),
  KEY `id_Users` (`id_Users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tbricks_medias`
--
ALTER TABLE `tbricks_medias`
  ADD CONSTRAINT `tbricks_medias_ibfk_1` FOREIGN KEY (`id_Bricks`) REFERENCES `tbricks` (`id`),
  ADD CONSTRAINT `tbricks_medias_ibfk_2` FOREIGN KEY (`id_Medias`) REFERENCES `tmedias` (`id`);

--
-- Contraintes pour la table `tlessons_bricks`
--
ALTER TABLE `tlessons_bricks`
  ADD CONSTRAINT `tlessons_bricks_ibfk_1` FOREIGN KEY (`id_Bricks`) REFERENCES `tbricks` (`id`),
  ADD CONSTRAINT `tlessons_bricks_ibfk_2` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`);

--
-- Contraintes pour la table `tresponse`
--
ALTER TABLE `tresponse`
  ADD CONSTRAINT `tresponse_ibfk_1` FOREIGN KEY (`id_Users`) REFERENCES `tusers` (`id`),
  ADD CONSTRAINT `tresponse_ibfk_2` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`),
  ADD CONSTRAINT `tresponse_ibfk_3` FOREIGN KEY (`id_Bricks`) REFERENCES `tbricks` (`id`);

--
-- Contraintes pour la table `tsessions_tlessons`
--
ALTER TABLE `tsessions_tlessons`
  ADD CONSTRAINT `tsessions_tlessons_ibfk_1` FOREIGN KEY (`id_Sessions`) REFERENCES `tsessions` (`id`),
  ADD CONSTRAINT `tsessions_tlessons_ibfk_2` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`);

--
-- Contraintes pour la table `tusers_lessons`
--
ALTER TABLE `tusers_lessons`
  ADD CONSTRAINT `tusers_lessons_ibfk_1` FOREIGN KEY (`id_Lessons`) REFERENCES `tlessons` (`id`),
  ADD CONSTRAINT `tusers_lessons_ibfk_2` FOREIGN KEY (`id_Users`) REFERENCES `tusers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
