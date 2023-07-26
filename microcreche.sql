-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 26 Juillet 2023 à 12:07
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `microcreche`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `child_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(70) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `accounts`
--

INSERT INTO `accounts` (`id`, `last_name`, `first_name`, `child_name`, `email`, `password`, `admin`) VALUES
(9, 'Cleymand', 'Bruno', 'le site', 'bcleymand@gmail.com', '2f3a258d1c1c3547e446e88cbbb75b9c429f361b', 1),
(10, 'Sanchez', 'Toby', 'Nina', 'tsanchez@gmail.com', 'ccd1157e244cded9fb56b54388e4a1e7e762159c', 0),
(11, 'bon', 'jean', 'théo', 'jb@gmail.com', '2863510501174a1f4f63867e5efda271a2709a9c', 0),
(12, 'de la crèche', 'Administration', 'La crèche', 'contact@lamaisondesptitsloups.fr', '14d18a711f5c1968de2c75d15cafd9339c8da3a4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles-access`
--

CREATE TABLE `articles-access` (
  `account-id` int(10) NOT NULL,
  `article-id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles-images`
--

CREATE TABLE `articles-images` (
  `id` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `article-id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `footer-boxes`
--

CREATE TABLE `footer-boxes` (
  `id` int(11) NOT NULL,
  `title1` varchar(60) NOT NULL,
  `content` varchar(300) NOT NULL,
  `title2` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone1` int(9) NOT NULL,
  `phone2` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `footer-boxes`
--

INSERT INTO `footer-boxes` (`id`, `title1`, `content`, `title2`, `email`, `phone1`, `phone2`) VALUES
(3, 'Où sommes-nous ?', 'Rdc Business Park des Playes\r\n540 boulevard de l\'Europe\r\n83500 LA SEYNE SUR MER', 'Une question ?', 'contact@lamaisondesptitsloups.fr', 494714065, 671192843);

-- --------------------------------------------------------

--
-- Structure de la table `home-intro-boxes`
--

CREATE TABLE `home-intro-boxes` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` varchar(900) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `home-intro-boxes`
--

INSERT INTO `home-intro-boxes` (`id`, `title`, `content`, `image`) VALUES
(1, 'Un petit commité chaleureux', 'Cette association loi 1901 est une micro-crèche qui accueille, simultanément, 10 enfants âgés de 2 ½ mois à leur entrée à l’école maternelle : C’est le compromis parfait entre un accueil collectif et un accueil individualisé.\r\n\r\nUne équipe, composée de six professionnelles, veille à proposer, parfois solliciter, verbaliser, encourager et féliciter vos « petits bouts » sans jamais les forcer.\r\n\r\nRire, jouer, communiquer, apprendre, recevoir des câlins, se reposer sera le quotidien de vos « P’tits Loups ».  Ce sera pour l’équipe la plus belle des motivations.', 'empty1.jpg'),
(2, 'Un Projet Pédagogique Accommodé ', '« La Maison des P\'tits Loups » propose pour chaque enfant, un accueil individualisé afin qu\'il puisse s\'épanouir, grandir à son rythme dans un cadre sécurisant, pour l\'accompagner dans son apprentissage intellectuel et physique, dans le respect de l\'éducation dispensée par ses parents.\r\n\r\nL\'équipe veillera à parler avec des mots justes, avec un maximum de vocabulaire tout au long de la journée. Les formules de politesse (bonjour, au revoir, s\'il te plait, merci, pardon) seront dites à chaque fois qu\'il le sera nécessaire afin d\'inciter les enfants à en faire de même.\r\n\r\nRespecter l\'enfant de la même façon que l\'adulte sera respecté. Laisser l\'enfant au maximum « faire seul » afin qu\'il prenne son autonomie.', 'empty2.jpg'),
(3, 'A l\'écoute de vos besoins', 'Une « boîte à idées » sera à la disposition des parents à l\'accueil ; l\'équipe prendra en compte le souhait de ces derniers.\r\n\r\nIl pourra être proposé une réunion trimestrielle Parents/Professionnels de la Petite Enfance, un temps « café des parents » mensuel, un petit spectacle de fin d\'année ainsi qu\'un pique nique avant les congés d\'été.\r\n\r\nLa communication entre les parents et l\'équipe est une des valeurs clefs de la structure.', 'empty3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `home-middle-boxes`
--

CREATE TABLE `home-middle-boxes` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `home-middle-boxes`
--

INSERT INTO `home-middle-boxes` (`id`, `title`, `content`) VALUES
(1, 'Nos horaires', 'La maison est ouverte:\r\n\r\nDu lundi au vendredi\r\nDe 7h30 à 18h00\r\n\r\n\r\nNous ne sommes pas disponibles :\r\n\r\n1 semaine au printemps\r\n3 semaines l’été\r\n1 semaine entre Noël et Jour de l’An\r\nAinsi que le vendredi suivant le jeudi de l’Ascension.'),
(2, 'Notre équipe', 'Un Cap petite enfance 6 ans d’expérience petite enfance sera présente, en appui avec une éducatrice de jeunes enfants intervenant 3h par mois.\r\n\r\nUne éducatrice de jeunes enfants (licence psycho) pour l’analyse de la pratique.\r\n\r\nTrois professionnel(le)s de la Petite Enfance titulaires d’un CAP, relevant de l’arrêté ministériel du 26 décembre 2000, modifié par l’arrêté ministériel du 3 décembre 2018, relatif au personnel des établissements participants à l’encadrement des enfants de moins de 6ans.');

-- --------------------------------------------------------

--
-- Structure de la table `inside-images`
--

CREATE TABLE `inside-images` (
  `id` int(10) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `caption` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `register-text`
--

CREATE TABLE `register-text` (
  `id` int(11) NOT NULL,
  `title1` varchar(100) NOT NULL,
  `title2` varchar(100) NOT NULL,
  `content1` varchar(900) NOT NULL,
  `content2` varchar(900) NOT NULL,
  `form-link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `register-text`
--

INSERT INTO `register-text` (`id`, `title1`, `title2`, `content1`, `content2`, `form-link`) VALUES
(1, 'nothing', 'nothing but cooler', 'nothingue', 'nothingjsdqkidlosq', 'super magic mama mia');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `articles-images`
--
ALTER TABLE `articles-images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `footer-boxes`
--
ALTER TABLE `footer-boxes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home-intro-boxes`
--
ALTER TABLE `home-intro-boxes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home-middle-boxes`
--
ALTER TABLE `home-middle-boxes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inside-images`
--
ALTER TABLE `inside-images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `register-text`
--
ALTER TABLE `register-text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `articles-images`
--
ALTER TABLE `articles-images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `footer-boxes`
--
ALTER TABLE `footer-boxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `home-intro-boxes`
--
ALTER TABLE `home-intro-boxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `home-middle-boxes`
--
ALTER TABLE `home-middle-boxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `inside-images`
--
ALTER TABLE `inside-images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `register-text`
--
ALTER TABLE `register-text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
