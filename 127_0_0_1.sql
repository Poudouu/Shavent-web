-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 27 Avril 2016 à 21:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `571fa44097df9`
--

CREATE TABLE IF NOT EXISTS `571fa44097df9` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(200) NOT NULL,
  `PathThumb` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `571fa44097df9`
--

INSERT INTO `571fa44097df9` (`id`, `Path`, `PathThumb`) VALUES
(2, '/Template/Users/poudou/Image/mescouilles.jpg', '/Template/Users/poudou/Thumb/mescouilles.jpg'),
(4, '/Template/Users/poudou/Image/blu.jpg', '/Template/Users/poudou/Thumb/blu.jpg'),
(5, '/Template/Users/poudou/Image/arnaud.jpg', '/Template/Users/poudou/Thumb/arnaud.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tb_event`
--

CREATE TABLE IF NOT EXISTS `tb_event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `event_ID` varchar(10) NOT NULL,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `event_ID_UNIQUE` (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tb_event`
--

INSERT INTO `tb_event` (`ID`, `event_ID`, `Name`) VALUES
(1, '571fa44097', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `tb_event_path`
--

CREATE TABLE IF NOT EXISTS `tb_event_path` (
  `ID_Path` int(11) NOT NULL,
  `Path` varchar(200) NOT NULL,
  `IDEvent` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Path`),
  UNIQUE KEY `IDEvent_UNIQUE` (`IDEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tb_event_time`
--

CREATE TABLE IF NOT EXISTS `tb_event_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventID` varchar(10) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eventID_UNIQUE` (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tb_event_path`
--
ALTER TABLE `tb_event_path`
  ADD CONSTRAINT `fk_IDevent` FOREIGN KEY (`IDEvent`) REFERENCES `tb_event` (`event_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tb_event_time`
--
ALTER TABLE `tb_event_time`
  ADD CONSTRAINT `fk_eventID` FOREIGN KEY (`eventID`) REFERENCES `tb_event` (`event_ID`) ON UPDATE CASCADE;
--
-- Base de données :  `dbusers`
--

-- --------------------------------------------------------

--
-- Structure de la table `poudou`
--

CREATE TABLE IF NOT EXISTS `poudou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Event_ID` varchar(13) NOT NULL,
  `Name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `poudou`
--

INSERT INTO `poudou` (`id`, `Event_ID`, `Name`) VALUES
(1, '571fa44097df9', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `tb_user_connection`
--

CREATE TABLE IF NOT EXISTS `tb_user_connection` (
  `ID_connection` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `first_connection` datetime NOT NULL,
  `last_connection` datetime NOT NULL,
  PRIMARY KEY (`ID_connection`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tb_user_connection`
--

INSERT INTO `tb_user_connection` (`ID_connection`, `username`, `first_connection`, `last_connection`) VALUES
(1, 'poudou', '2016-04-26 19:23:06', '2016-04-26 19:23:06');

-- --------------------------------------------------------

--
-- Structure de la table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `ID_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_users`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tb_users`
--

INSERT INTO `tb_users` (`ID_users`, `username`, `password`, `email`) VALUES
(1, 'poudou', '3da25850742ed0153298d216cdad454b7ef20d7a', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `tb_users_rights`
--

CREATE TABLE IF NOT EXISTS `tb_users_rights` (
  `ID_rights` int(11) NOT NULL,
  `Event_ID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_rights`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tb_user_connection`
--
ALTER TABLE `tb_user_connection`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `tb_users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Base de données :  `vsftpd`
--

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `host` varchar(30) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
