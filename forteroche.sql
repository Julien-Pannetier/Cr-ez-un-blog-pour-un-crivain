-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 avr. 2020 à 15:06
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'Julien', 'Pannetier', 'pannetier.j@hotmail.fr', '$2y$10$iNRNkvp5/.VQ/Lb3HS6U9ezi1VG47LcjmGL5i2ORyf5Y3peIlbI9e', '2020-04-02 15:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_email` varchar(320) NOT NULL,
  `comment` text NOT NULL,
  `reported` int(11) NOT NULL,
  `moderated` datetime DEFAULT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `author_email`, `comment`, `reported`, `moderated`, `comment_date`) VALUES
(1, 1, 'Mathieu', 'kebin47249@itiomail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum tellus non lorem vestibulum efficitur. Etiam sit amet orci feugiat, vulputate mauris at, ultrices felis.', 1, NULL, '2020-03-25 20:00:00'),
(3, 2, 'Michel', 'impev66@tzymail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel metus consectetur, tincidunt sem quis, finibus urna. Ut vel lorem ac neque scelerisque gravida non quis nulla. Praesent iaculis varius dolor, rutrum convallis dui pellentesque quis. Vestibulum non tellus pharetra, dictum lorem eu, vestibulum quam.', 0, NULL, '2020-03-30 13:23:04'),
(4, 1, 'Michel', 'impev66@tzymail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel metus consectetur, tincidunt sem quis, finibus urna. Ut vel lorem ac neque scelerisque gravida non quis nulla. Praesent iaculis varius dolor, rutrum convallis dui pellentesque quis. Vestibulum non tellus pharetra, dictum lorem eu, vestibulum quam. ', 2, NULL, '2020-03-31 16:53:41');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre I', 'Nam eu justo ultrices, commodo tellus pretium, consectetur urna. Duis at nisi gravida velit pretium porttitor. Praesent sed sodales enim. Nam hendrerit imperdiet orci, nec lacinia arcu feugiat nec. Mauris ac tempor nibh. Praesent eget mi pretium, fringilla tellus sed, sagittis augue. Curabitur vel libero sed eros consequat sollicitudin. Nunc a est in lacus vestibulum ultricies sed ut nulla. Curabitur a odio pulvinar, sodales mauris at, fringilla felis. Nam finibus accumsan nulla. Suspendisse viverra sem commodo dolor varius ultricies. Morbi tristique cursus velit, vel imperdiet lacus tincidunt quis. Maecenas at orci nec urna semper ultricies a ac leo. Nullam eget viverra odio.', '2020-03-25 18:00:00'),
(2, 'Chapitre II', 'Nam eu justo ultrices, commodo tellus pretium, consectetur urna. Duis at nisi gravida velit pretium porttitor. Praesent sed sodales enim. Nam hendrerit imperdiet orci, nec lacinia arcu feugiat nec. Mauris ac tempor nibh. Praesent eget mi pretium, fringilla tellus sed, sagittis augue. Curabitur vel libero sed eros consequat sollicitudin. Nunc a est in lacus vestibulum ultricies sed ut nulla. Curabitur a odio pulvinar, sodales mauris at, fringilla felis. Nam finibus accumsan nulla. Suspendisse viverra sem commodo dolor varius ultricies. Morbi tristique cursus velit, vel imperdiet lacus tincidunt quis. Maecenas at orci nec urna semper ultricies a ac leo. Nullam eget viverra odio. ', '2020-03-28 18:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
