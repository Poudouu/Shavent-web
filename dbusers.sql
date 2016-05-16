-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Mai 2016 à 09:06
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `poudou`
--

INSERT INTO `poudou` (`id`, `Event_ID`, `Name`) VALUES
(1, '573201edcab20', 'test1'),
(2, '573204482c9a5', 'test2'),
(3, '573204b4c5bb2', 'test3');

-- --------------------------------------------------------

--
-- Structure de la table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `ID_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`ID_users`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tb_users`
--

INSERT INTO `tb_users` (`ID_users`, `username`, `password`, `email`, `is_active`) VALUES
(4, 'poudou', 'nesr', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tb_users_rights`
--

CREATE TABLE IF NOT EXISTS `tb_users_rights` (
  `ID_rights` int(11) NOT NULL,
  `Event_ID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_rights`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tb_user_connection`
--

INSERT INTO `tb_user_connection` (`ID_connection`, `username`, `first_connection`, `last_connection`) VALUES
(5, 'poudou', '2016-05-10 17:44:32', '2016-05-10 17:44:32');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tb_user_connection`
--
ALTER TABLE `tb_user_connection`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `tb_users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
