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
-- Base de données :  `dbevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `573201edcab20`
--

CREATE TABLE IF NOT EXISTS `573201edcab20` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(200) NOT NULL,
  `PathThumb` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `573204b4c5bb2`
--

CREATE TABLE IF NOT EXISTS `573204b4c5bb2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(200) NOT NULL,
  `PathThumb` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `573204b4c5bb2`
--

INSERT INTO `573204b4c5bb2` (`id`, `Path`, `PathThumb`, `user`) VALUES
(1, 'http://localhost/Shavent/Users/poudou/Image/arnaud.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/arnaud.jpg', 'poudou'),
(2, 'http://localhost/Shavent/Users/poudou/Image/test.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/test.jpg', 'poudou'),
(3, 'http://localhost/Shavent/Users/poudou/Image/test1.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/test1.jpg', 'poudou'),
(4, 'http://localhost/Shavent/Users/poudou/Image/test2.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/test2.jpg', 'poudou'),
(5, 'http://localhost/Shavent/Users/poudou/Image/test4.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/test4.jpg', 'poudou'),
(6, 'http://localhost/Shavent/Users/poudou/Image/DSC00283.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00283.jpg', 'poudou'),
(7, 'http://localhost/Shavent/Users/poudou/Image/DSC00296.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00296.jpg', 'poudou'),
(8, 'http://localhost/Shavent/Users/poudou/Image/DSC00300.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00300.jpg', 'poudou'),
(9, 'http://localhost/Shavent/Users/poudou/Image/DSC00877.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00877.jpg', 'poudou'),
(10, 'http://localhost/Shavent/Users/poudou/Image/DSC00888.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00888.jpg', 'poudou'),
(11, 'http://localhost/Shavent/Users/poudou/Image/DSC00905.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00905.jpg', 'poudou'),
(12, 'http://localhost/Shavent/Users/poudou/Image/DSC00962.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC00962.jpg', 'poudou'),
(13, 'http://localhost/Shavent/Users/poudou/Image/DSC01064.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01064.jpg', 'poudou'),
(14, 'http://localhost/Shavent/Users/poudou/Image/DSC01068.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01068.jpg', 'poudou'),
(15, 'http://localhost/Shavent/Users/poudou/Image/DSC01069.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01069.jpg', 'poudou'),
(16, 'http://localhost/Shavent/Users/poudou/Image/DSC01070.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01070.jpg', 'poudou'),
(17, 'http://localhost/Shavent/Users/poudou/Image/DSC01076.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01076.jpg', 'poudou'),
(18, 'http://localhost/Shavent/Users/poudou/Image/DSC01077.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01077.jpg', 'poudou'),
(19, 'http://localhost/Shavent/Users/poudou/Image/DSC01078.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01078.jpg', 'poudou'),
(20, 'http://localhost/Shavent/Users/poudou/Image/DSC01079.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01079.jpg', 'poudou'),
(21, 'http://localhost/Shavent/Users/poudou/Image/DSC01096.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01096.jpg', 'poudou'),
(22, 'http://localhost/Shavent/Users/poudou/Image/DSC01098.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01098.jpg', 'poudou'),
(23, 'http://localhost/Shavent/Users/poudou/Image/DSC01101.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01101.jpg', 'poudou'),
(24, 'http://localhost/Shavent/Users/poudou/Image/DSC01111.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01111.jpg', 'poudou'),
(25, 'http://localhost/Shavent/Users/poudou/Image/DSC01117.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01117.jpg', 'poudou'),
(26, 'http://localhost/Shavent/Users/poudou/Image/DSC01120.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01120.jpg', 'poudou'),
(27, 'http://localhost/Shavent/Users/poudou/Image/DSC01124.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01124.jpg', 'poudou'),
(28, 'http://localhost/Shavent/Users/poudou/Image/DSC01127.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01127.jpg', 'poudou'),
(29, 'http://localhost/Shavent/Users/poudou/Image/DSC01133.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01133.jpg', 'poudou'),
(30, 'http://localhost/Shavent/Users/poudou/Image/DSC01136.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC01136.jpg', 'poudou'),
(31, 'http://localhost/Shavent/Users/poudou/Image/DSC03007.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC03007.jpg', 'poudou'),
(32, 'http://localhost/Shavent/Users/poudou/Image/DSC03070.jpg', 'http://localhost/Shavent/Users/poudou/Thumb/DSC03070.jpg', 'poudou');

-- --------------------------------------------------------

--
-- Structure de la table `tb_event`
--

CREATE TABLE IF NOT EXISTS `tb_event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `event_ID` varchar(13) NOT NULL,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `event_ID_UNIQUE` (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tb_event`
--

INSERT INTO `tb_event` (`ID`, `event_ID`, `Name`) VALUES
(7, '573201edcab20', 'test1'),
(8, '573204482c9a5', 'test2'),
(9, '573204b4c5bb2', 'test3');

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
  `event_ID` varchar(13) NOT NULL,
  `start_date` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eventID_UNIQUE` (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `tb_event_time`
--

INSERT INTO `tb_event_time` (`id`, `event_ID`, `start_date`, `duration`) VALUES
(6, '573201edcab20', '2016-05-06 00:00:00', 180),
(7, '573204482c9a5', '2016-05-11 00:00:00', 180),
(8, '573204b4c5bb2', '2016-05-05 00:00:00', 180);

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
  ADD CONSTRAINT `fk_eventID` FOREIGN KEY (`event_ID`) REFERENCES `tb_event` (`event_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
