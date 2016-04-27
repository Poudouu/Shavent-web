-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Avril 2016 à 21:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `users`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `date` date NOT NULL,
  `temps` int(11) NOT NULL,
  `lieu` text NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `nom`, `date`, `temps`, `lieu`, `path`) VALUES
(22, 'Mescuilles', '2016-02-05', 160, 'Mesocuilles mechant', '/Events/Mescuilles'),
(23, 'gh', '2016-03-05', 160, 'Ghlin', '/Events/gh'),
(24, 'test', '2016-03-11', 160, 'Mesocuilles mechant', ''),
(25, 'test', '2016-04-01', 160, 'Mesocuilles mechant', '');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `user` text NOT NULL,
  `event` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=265 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `path`, `user`, `event`, `name`) VALUES
(246, 'Events/25_test/poudou/test.jpg', 'poudou', '25', 'test'),
(247, 'Events/25_test/poudou/Desert.jpg', 'poudou', '25', 'Desert'),
(248, 'Events/25_test/poudou/arnaud.jpg', 'poudou', '25', 'arnaud'),
(249, 'Events/25_test/poudou/DSC00295.jpg', 'poudou', '25', 'DSC00295'),
(250, 'Events/25_test/poudou/DSC00296.jpg', 'poudou', '25', 'DSC00296'),
(251, 'Events/25_test/poudou/DSC00297.jpg', 'poudou', '25', 'DSC00297'),
(252, 'Events/25_test/poudou/DSC00298.jpg', 'poudou', '25', 'DSC00298'),
(253, 'Events/25_test/poudou/DSC00299.jpg', 'poudou', '25', 'DSC00299'),
(254, 'Events/25_test/poudou/DSC00300.jpg', 'poudou', '25', 'DSC00300'),
(255, 'Events/25_test/poudou/DSC00301.jpg', 'poudou', '25', 'DSC00301'),
(256, 'Events/25_test/poudou/DSC00302.jpg', 'poudou', '25', 'DSC00302'),
(257, 'Events/25_test/poudou/DSC00303.jpg', 'poudou', '25', 'DSC00303'),
(258, 'Events/25_test/poudou/DSC03002.jpg', 'poudou', '25', 'DSC03002'),
(259, 'Events/25_test/poudou/DSC03003.jpg', 'poudou', '25', 'DSC03003'),
(260, 'Events/25_test/poudou/DSC03004.jpg', 'poudou', '25', 'DSC03004'),
(261, 'Events/25_test/poudou/DSC03005.jpg', 'poudou', '25', 'DSC03005'),
(262, 'Events/25_test/poudou/DSC03006.jpg', 'poudou', '25', 'DSC03006'),
(263, 'Events/25_test/poudou/DSC03007.jpg', 'poudou', '25', 'DSC03007'),
(264, 'Events/25_test/poudou/DSC03066.jpg', 'poudou', '25', 'DSC03066');

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `event` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `subscription`
--

INSERT INTO `subscription` (`id`, `login`, `password`, `email`, `date`, `event`) VALUES
(15, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'a', '0000-00-00', 'a:4:{i:0;s:1:"0";i:1;s:1:"0";i:2;s:2:"22";i:3;s:2:"24";}'),
(16, 'poudou', '3da25850742ed0153298d216cdad454b7ef20d7a', 'arnaud.lamblotte@gmail.com', '0000-00-00', 'a:2:{i:0;s:2:"23";i:1;s:2:"25";}'),
(17, 'arnaud', '3da25850742ed0153298d216cdad454b7ef20d7a', 'Lamblotte', '0000-00-00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
