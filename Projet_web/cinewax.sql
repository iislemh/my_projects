-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Client: cl1-sql7
-- Généré le: Lun 07 Décembre 2015 à 16:13
-- Version du serveur: 5.5.46-MariaDB-1~squeeze-log
-- Version de PHP: 5.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cinewax`
--

-- --------------------------------------------------------

--
-- Structure de la table `cw_cinema_reservations`
--

CREATE TABLE IF NOT EXISTS `cw_cinema_reservations` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idSession` int(255) NOT NULL,
  `idSubscriber` int(255) NOT NULL,
  `status` enum('waiting','validate','cancel') NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cw_cinema_sessions`
--

CREATE TABLE IF NOT EXISTS `cw_cinema_sessions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idMovie` int(255) NOT NULL,
  `idTheater` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `language` varchar(255) NOT NULL,
  `subtitles` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `cw_cinema_sessions`
--

INSERT INTO `cw_cinema_sessions` (`id`, `idMovie`, `idTheater`, `date`, `language`, `subtitles`, `archive`) VALUES
(21, 1, 1, '2015-10-20 03:02:00', '3', 'no', 'false'),
(22, 13, 1, '2015-10-24 13:16:00', '3', 'no', 'false'),
(23, 15, 1, '2015-10-15 20:20:00', '3', 'no', 'false'),
(24, 10, 3, '0000-00-00 00:00:00', '5', 'yes', 'false'),
(25, 18, 4, '2015-12-15 00:00:00', '6', 'yes', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_cinema_sessionsAndSubscribers`
--

CREATE TABLE IF NOT EXISTS `cw_cinema_sessionsAndSubscribers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idSession` int(255) NOT NULL,
  `idSubscriber` int(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cw_cinema_theaters`
--

CREATE TABLE IF NOT EXISTS `cw_cinema_theaters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `numberOfPlace` int(3) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `cw_cinema_theaters`
--

INSERT INTO `cw_cinema_theaters` (`id`, `name`, `numberOfPlace`, `address`, `phone`, `archive`) VALUES
(1, 'Léopold Sédar Senghor', 255, '6 rue de la République', '123456789', 'false'),
(2, 'Barack Obama', 24, '8 rue de la poésie', '123456789', 'false'),
(3, 'Morgan Freeman', 26, '86 rue de la poire', '123456789', 'false'),
(4, 'Charlie Chaplin', 20, '16 rue de la brique bleu', '123456789', 'false'),
(5, 'Nina Simone', 30, '8 rue de la madeleine', '123456789', 'false'),
(6, 'Charlie', 324, '2 rue wgr', '010101010101', 'false'),
(7, 'test', 12, 'test test', '123456789', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_human_resources_employees`
--

CREATE TABLE IF NOT EXISTS `cw_human_resources_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `sex` enum('Female','Male') NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phoneHome` varchar(255) NOT NULL,
  `phoneMobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `status` enum('Stagiaire','CDD','CDI','Interim') NOT NULL,
  `password` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `cw_human_resources_employees`
--

INSERT INTO `cw_human_resources_employees` (`id`, `lastname`, `firstname`, `birthDate`, `sex`, `address`, `city`, `phoneHome`, `phoneMobile`, `email`, `job`, `status`, `password`, `archive`) VALUES
(7, 'Nguyen', 'Sophie', '1993-06-09', 'Female', '5 rue Maurice Grandcoing', 'Ivry Sur Seine', '029384756', '9123456789', 'nguyen_t@cinewax.com', 'ew', 'CDD', 'route', 'false'),
(9, 'Andrianifahanana', 'Mahefa', '1992-07-23', 'Male', '5 rue Maurice Grandcoing', 'Ivry Sur Seine', '123456789', '123456789', 'andria_m@cinewax.com', 'Administrateur', 'CDI', 'route', 'false'),
(10, 'Gouala', 'Virgile', '1991-06-09', 'Male', '5 rue Maurice Grandcoing', 'Ivry Sur Seine', '123456789', '123456789', 'gouala_v@cinewax.com', 'Boobies', 'CDI', 'route', 'false'),
(12, 'Dupont', 'Dupont', '2015-10-21', 'Female', 'sdSdasdasdasd', '', '123456789', '123456789', '45345@sefsdf.fr', '4343', 'CDI', '', 'false'),
(13, 'test', 'test', '2015-11-27', 'Female', 'test test', 'test', '123456789', '123456789', 'virgile.gouala@gmail.com', 'aasdasd', 'CDI', 'route', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_human_resources_employees_status`
--

CREATE TABLE IF NOT EXISTS `cw_human_resources_employees_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cw_human_resources_employees_status`
--

INSERT INTO `cw_human_resources_employees_status` (`id`, `name`, `archive`) VALUES
(1, 'CDI', 'false'),
(2, 'CDD', 'false'),
(3, 'Stagiaire', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_human_resources_memberships`
--

CREATE TABLE IF NOT EXISTS `cw_human_resources_memberships` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cardNumber` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sex` enum('Female','Male') NOT NULL,
  `phoneHome` varchar(255) NOT NULL,
  `phoneMobile` varchar(255) NOT NULL,
  `neighborhood` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `membership` enum('Subscriber','Member') NOT NULL,
  `newsletter` enum('Yes','No') NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `cw_human_resources_memberships`
--

INSERT INTO `cw_human_resources_memberships` (`id`, `firstname`, `lastname`, `password`, `cardNumber`, `username`, `sex`, `phoneHome`, `phoneMobile`, `neighborhood`, `city`, `country`, `email`, `status`, `activity`, `membership`, `newsletter`, `archive`) VALUES
(1, 'Virgile', 'Gouala', 'test', 0, 'test', 'Female', '123456789', '123456789', '', 'Dakar', 'Senegal', 'gouala_v@fake.com', '', '', 'Subscriber', 'Yes', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_human_resources_memberships_activity`
--

CREATE TABLE IF NOT EXISTS `cw_human_resources_memberships_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cw_human_resources_memberships_activity`
--

INSERT INTO `cw_human_resources_memberships_activity` (`id`, `name`, `archive`) VALUES
(1, 'Étudiant', 'false'),
(2, 'Travailleur', 'false'),
(3, 'Chômeur', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_human_resources_memberships_status`
--

CREATE TABLE IF NOT EXISTS `cw_human_resources_memberships_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `cw_human_resources_memberships_status`
--

INSERT INTO `cw_human_resources_memberships_status` (`id`, `name`, `archive`) VALUES
(1, 'Invité', 'false'),
(2, 'Talibé', 'false'),
(3, 'Gratuit', 'false'),
(4, 'Payant', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_list_session`
--

CREATE TABLE IF NOT EXISTS `cw_list_session` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idMovie` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `hour` time NOT NULL,
  `idTheater` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `cw_list_session`
--

INSERT INTO `cw_list_session` (`id`, `idMovie`, `title`, `date`, `name`, `hour`, `idTheater`) VALUES
(3, 1, 'Pocahontas, une légende indienne', '2015-09-12', 'Mahefa', '12:00:00', 4),
(4, 1, 'Pocahontas, une légende indienne', '2015-09-12', 'Mahefa', '15:00:00', 4),
(5, 1, 'Pocahontas, une légende indienne', '2015-09-22', 'Mahefa', '15:00:00', 4),
(6, 4, 'Pulp Fiction', '2015-09-25', 'Mahefa', '16:30:00', 2),
(7, 9, 'Godzilla', '2015-09-30', 'Mahefa', '09:00:00', 0),
(8, 15, 'Léon', '2016-01-06', 'Mahefa', '15:30:00', 3),
(9, 11, 'Whiplash', '2015-12-16', 'Mahefa', '15:30:00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `cw_medias_countries`
--

CREATE TABLE IF NOT EXISTS `cw_medias_countries` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(2) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `cw_medias_countries`
--

INSERT INTO `cw_medias_countries` (`id`, `name`, `abbreviation`, `archive`) VALUES
(1, 'Francea', 'ED', 'true'),
(2, 'États-Unis', 'US', 'false'),
(3, 'Royaume Uni', 'GB', 'true'),
(4, 'Suisse', 'CH', 'false'),
(5, 'Sénégal', 'SN', 'false'),
(6, 'Nigérias', 'NG', 'false'),
(7, 'Japon', 'JP', 'false'),
(8, 'Chines', 'CN', 'false'),
(9, 'Italie', 'IT', 'false'),
(10, 'Espagne', 'ES', 'false'),
(11, 'Grèce', 'EL', 'false'),
(12, 'Portugal', 'PT', 'false'),
(13, 'Congolie', 'CO', 'false'),
(16, 'Sophie', 'SA', 'true'),
(17, 'Vietnam', 'VI', 'true'),
(18, 'VIET', 'de', 'true'),
(19, 'der', 'de', 'true'),
(20, 'État-Unis', 'US', ''),
(21, 'Sophie', 'SO', 'false'),
(22, 'bruxelle', 'bx', 'false'),
(23, 'testfredg', 'TE', 'true'),
(24, 'Ajouter', 'Aj', 'false'),
(25, 'MEXIQUE', 'MX', 'false'),
(26, 'Ouzbakistan', 'oK', 'false'),
(27, 'Madagascar', 'MG', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_medias_genres`
--

CREATE TABLE IF NOT EXISTS `cw_medias_genres` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `cw_medias_genres`
--

INSERT INTO `cw_medias_genres` (`id`, `name`, `archive`) VALUES
(7, 'Actions', 'false'),
(8, 'Animations', 'false'),
(9, 'Arts martiaux', 'false'),
(10, 'Aventure', 'false'),
(11, 'Biopics', 'false'),
(14, 'Comédie', 'false'),
(15, 'Comédie dramatique', 'false'),
(16, 'Comédie musicale', 'false'),
(17, 'Concert', 'false'),
(18, 'Dessin animé', 'false'),
(19, 'Divers', 'false'),
(20, 'Documentaire', 'false'),
(21, 'Drame', 'false'),
(22, 'Epouvante-horreur', 'false'),
(23, 'Erotique', 'false'),
(24, 'Espionnage', 'false'),
(25, 'Expérimental', 'false'),
(26, 'Famille', 'false'),
(27, 'Famille', 'false'),
(28, 'Fantastique', 'false'),
(29, 'Guerre', 'false'),
(30, 'Historique', 'false'),
(31, 'Judiciaire', 'false'),
(32, 'Musical', 'false'),
(33, 'Opera', 'false'),
(34, 'Péplum', 'false'),
(35, 'Policier', 'false'),
(36, 'Romance', 'false'),
(37, 'Science fiction', 'false'),
(38, 'Show', 'false'),
(39, 'Sport', 'false'),
(40, 'Thriller', 'false'),
(41, 'Western', 'false'),
(50, 'Super-Héros', 'false'),
(51, '', 'false'),
(52, 'SophieTest', 'false'),
(53, 'Passion', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_medias_languages`
--

CREATE TABLE IF NOT EXISTS `cw_medias_languages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(2) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `cw_medias_languages`
--

INSERT INTO `cw_medias_languages` (`id`, `name`, `abbreviation`, `archive`) VALUES
(1, 'Français', 'FS', 'true'),
(2, 'Anglais', 'EN', 'true'),
(3, 'Espagnol', 'ES', 'false'),
(4, 'Allemand', 'DE', 'false'),
(5, 'Italien', 'IT', 'false'),
(6, 'Grec', 'EL', 'false'),
(8, 'chenier', 'ch', 'false'),
(9, 'alt-j', 'es', 'false'),
(10, 'Togos', 'TO', 'false'),
(11, 'Marvins', 'MA', 'true'),
(12, 'Viets', 'VI', 'false'),
(13, 'Talia', 'ea', 'true'),
(14, 'LANGUE', 'LA', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `cw_medias_movies`
--

CREATE TABLE IF NOT EXISTS `cw_medias_movies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `titleOriginal` varchar(255) NOT NULL,
  `realisator` varchar(255) NOT NULL,
  `plot` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `runningTime` int(255) NOT NULL,
  `production` varchar(255) NOT NULL,
  `distribution` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `warning` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  `addedThe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `cw_medias_movies`
--

INSERT INTO `cw_medias_movies` (`id`, `title`, `titleOriginal`, `realisator`, `plot`, `actors`, `country`, `type`, `genre`, `releaseDate`, `runningTime`, `production`, `distribution`, `language`, `warning`, `archive`, `addedThe`) VALUES
(1, 'Une legende indienne', 'Pocahontas', 'Eric Golberg', 'En l''an 1607, La belle Pocahontas aura-t-elle le pouvoir d''éviter la guerre entre les colons anglais et son peuple, les Powhatan, et de sauvegarder ainsi ses amours avec le fringant aventurier John Smith, qui accompagne les colons ?', 'Irene Bedard, Mel Gibson, Linda Hunt', '', 'https://www.youtube.com/embed/3tnDUC6J_CA', 'Animation, Aventure', '1995-11-22', 82, 'Walt Disney Pictures', 'Walt Disney Pictures', 'Français', '', 'false', '2015-12-07 09:52:15'),
(2, 'Aladdino', '', 'John Musker', 'Comment Aladdin, grâce à la felonie du grand vizir, va se procurer la lampe magique qui héberge le fameux génie et nous entraïner dans la plus étonnante des aventures.', 'Scott Weinger, Robin Williams, Linda Larkin ', '', 'https://youtu.be/gVN6FqPpChQ', 'Animation, Aventure', '1993-11-10', 90, 'Walt Disney Pictures', 'Walt Disney Pictures', 'Français', '', 'false', '2015-10-24 13:20:28'),
(3, 'Blanche-Neige et les sept nains', 'Snow White and the Seven Dwarfs', 'David Hand', 'Un livre intitulé Blanche Neige et les Sept Nains s''ouvre et une voix entame la narration du conte. Il explique que Blanche Neige est une princesse vivant auprès de sa vaniteuse et malveillante belle-mère, la Reine. ', 'Adriana Caselotti, Lucile La Verne, Moroni Olsen ', 'État-Unis', '', 'Animation, Aventure', '1938-11-10', 83, 'Walt Disney Pictures', 'Walt Disney Pictures', 'Français', '', 'false', '2015-10-24 08:39:04'),
(4, 'Pulp Fiction', '', 'Quentin Tarantino', 'L''odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s''entremêlent.', 'John Travolta, Samuel L. Jackson', '', 'https://www.youtube.com/embed/cDyAouw3nUw', 'Thriller', '1994-11-26', 159, '', '', 'Anglais', '12', 'false', '2015-12-04 18:54:51'),
(5, 'Birdman', 'Birdman', 'Alejandro González Iñárritu', 'À l’époque où il incarnait un célèbre super-héros, Riggan Thomson était mondialement connu. Mais de cette célébrité il ne reste plus grand-chose, et il tente aujourd’hui de monter une pièce de théâtre à Broadway dans l’espoir de renouer avec sa gloire per', 'Michael Keaton, Zach Galifianakis, Edward Norton ', 'États-Unis', '', 'Comédie, Drame', '2015-09-15', 142, '', '', 'Anglais', '', 'false', '2015-10-24 08:39:02'),
(8, 'Avengers', 'Marvel''s The Avengers', 'Joss Whedon', 'Lorsque Nick Fury, le directeur du S.H.I.E.L.D., l''organisation qui préserve la paix au plan mondial, cherche à former une équipe de choc pour empêcher la destruction du monde.', 'Robert Downey Jr., Chris Evans, Mark Ruffalo', '', 'https://www.youtube.com/embed/b-kTeJhHOhc', 'Science-Fiction', '2015-05-19', 142, '', '', 'Anglais', '', 'false', '2015-10-24 13:20:23'),
(9, 'Godzilla', '', 'Gareth Edwards', 'Godzilla tente de rétablir la paix sur Terre, tandis que les forces de la nature se déchaînent et que l''humanité semble impuissante...', 'Aaron Taylor-Johnson, Bryan Cranston, Ken Watanabe ', '', 'http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19388282', 'Science-Fiction', '2014-05-14', 123, 'Warner Bros', 'Warner Bros', 'Anglais', '', 'false', '2015-10-24 08:41:26'),
(10, 'Tron l''Héritage ?', 'Tron Legacy', 'Joseph Kosinski', 'Sam Flynn, 27 ans, est le fils expert en technologie de Kevin Flynn. Cherchant à percer le mystère de la disparition de son père, il se retrouve aspiré dans ce même monde de programmes redoutables et de jeux mortels où vit son père depuis 25 ans.', 'Jeff Bridges, Garrett Hedlund, Olivia Wilde ', '', 'http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19388282', 'Science-Fiction', '2011-02-09', 126, '', '', 'Anglais', '', 'false', '2015-10-24 12:56:35'),
(11, 'Whiplash', '', 'Damien Chazelle', 'Andrew, 19 ans, rêve de devenir l’un des meilleurs batteurs de jazz de sa génération. Mais la concurrence est rude au conservatoire de Manhattan où il s’entraîne avec acharnement.', 'Miles Teller, J.K. Simmons, Paul Reiser ', 'États-Unis', 'http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19388282', 'Drame', '2015-03-17', 80, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:50'),
(12, '127 Hours', '', 'Danny Boyle', 'Alpiniste expérimenté, il collectionne les plus beaux sommets de la région. \n', 'James Franco, Amber Tamblyn, Kate Mara ', 'États-Unis', 'http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19388282', 'Drame', '2014-06-24', 90, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:46'),
(13, 'Drive', '', 'Nicolas Winding Refn', 'Un jeune homme solitaire, "The Driver", conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite.', 'Ryan Gosling, Carey Mulligan, Bryan Cranston', 'États-Unis', 'http://www.allocine.fr/_video/iblogvision.aspx?cmedia=19388282', 'Drame', '2014-08-14', 80, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:44'),
(14, 'Les Évadés de la planète des singes', 'Escape from the Planet of the Apes', 'Don Taylor', 'Cornélius et Zira parviennent à retourner vers le passé, et débarquent au 20e siècle à Los Angeles. Ils y subissent les mêmes tourments que Taylor sur la "planète des singes"...', 'Roddy McDowall, Kim Hunter, Bradford Dillman ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Science-Fiction', '2015-09-14', 123, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:21'),
(15, 'Léon', '', 'Luc Besson', 'Un tueur à gages répondant au nom de Léon prend sous son aile Mathilda, une petite fille de douze ans, seule rescapée du massacre de sa famille. Bientôt, Léon va faire de Mathilda une "nettoyeuse", comme lui. Et Mathilda pourra venger son petit frère...', '	Jean Reno, Gary Oldman, Natalie Portman ', 'Françe', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Thriller', '2014-11-25', 110, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:18'),
(16, 'Man Of Steel', '', 'Zack Snyder', 'Un petit garçon découvre qu''il possède des pouvoirs surnaturels et qu''il n''est pas né sur Terre. Plus tard, il s''engage dans un périple afin de comprendre d''où il vient et pourquoi il a été envoyé sur notre planète. ', 'Henry Cavill, Amy Adams, Michael Shannon ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Super-Héros', '2014-11-18', 90, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:16'),
(17, 'Dredd', '', 'Pete Travis', 'Dans un avenir proche, les Etats-Unis ne sont plus qu’un immense désert irradié. Mega City One est une métropole tentaculaire rongée par le vice. ', 'Karl Urban, Olivia Thirlby, Lena Headey ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Science-Fiction', '2014-10-09', 115, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:13'),
(18, 'Retour vers le Futur', 'Back to the Future', 'Robert Zemeckis', 'Ami de l''excentrique professeur Emmett Brown, il l''accompagne un soir tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée.', 'Michael J. Fox, Christopher Lloyd, Lea Thompson ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Science-Fiction', '2014-12-15', 120, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:11'),
(19, 'Star Wars épisode IV : Un nouvel espoir', 'Star Wars Episode IV: A New Hope', 'George Lucas', 'Il y a bien longtemps, dans une galaxie très lointaine... La guerre civile fait rage entre l''Empire galactique et l''Alliance rebelle.', 'Mark Hamill, Harrison Ford, Carrie Fisher ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Science-Fiction', '2015-06-23', 135, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:09'),
(20, 'Star Wars épisode V : L''Empire contre-attaque', 'Star Wars Episode V: The Empire Strikes Back', 'Irvin Kershner', 'Malgré la destruction de l''Etoile Noire, l''Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l''Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales. ', 'Mark Hamill, Harrison Ford, Carrie Fisher ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Science-Fiction', '2014-07-02', 158, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:06'),
(21, 'Star Wars épisode VI : Le Retour du Jedi', 'Star Wars Episode VI: Return of the Jedi', 'Richard Marquand', 'L''Empire galactique est plus puissant que jamais : la construction de la nouvelle arme, l''Etoile de la Mort, menace l''univers tout entier...', 'Mark Hamill, Harrison Ford, Carrie Fisher ', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Science-Fiction', '2014-10-10', 124, '', '', 'Anglais', '', 'false', '2015-10-24 08:38:04'),
(22, 'Virgile le retour II, l''histoire continue', 'Virgile the return II, it goes on', 'Virgile Gouala', 'Virgile Gouala s''attaque cette fois ci a Godzilla', 'Virgile Gouala', 'États-Unis', 'https://www.youtube.com/embed/EYX1rIe3SaQ', 'Érotique', '2015-10-22', 326, 'Les films du plat pays', 'Les films du plat pays', 'Français', '', 'false', '2015-10-24 08:37:58');

-- --------------------------------------------------------

--
-- Structure de la table `cw_medias_series`
--

CREATE TABLE IF NOT EXISTS `cw_medias_series` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titleOriginal` varchar(255) NOT NULL,
  `seasons` int(255) NOT NULL,
  `episodes` int(255) NOT NULL,
  `realisator` varchar(255) NOT NULL,
  `plot` varchar(255) NOT NULL,
  `actors` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `releaseDate` varchar(255) NOT NULL,
  `distribution` varchar(255) NOT NULL,
  `production` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `warning` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cw_medias_seriesAndEpisodes`
--

CREATE TABLE IF NOT EXISTS `cw_medias_seriesAndEpisodes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idSerie` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `plot` varchar(255) NOT NULL,
  `runningTime` varchar(255) NOT NULL,
  `archive` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
