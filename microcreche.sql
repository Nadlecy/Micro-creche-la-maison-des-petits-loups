-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 26 Juillet 2023 à 14:53
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

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`, `visibility`) VALUES
(58, 'Lorem ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-07-26 15:03:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `articles-access`
--

CREATE TABLE `articles-access` (
  `account-id` int(10) NOT NULL,
  `article-id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles-access`
--

INSERT INTO `articles-access` (`account-id`, `article-id`) VALUES
(0, 58);

-- --------------------------------------------------------

--
-- Structure de la table `articles-images`
--

CREATE TABLE `articles-images` (
  `id` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `article-id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles-images`
--

INSERT INTO `articles-images` (`id`, `filename`, `article-id`) VALUES
(30, 'empty4.jpg', 58);

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
(1, 'HORAIRES :', ' Ouvert :\r\n •  Du lundi au vendredi\r\n •  De 7h30 à 18h00\r\n\r\n Fermetures :\r\n• 1 semaine au printemps\r\n• 3 semaines l’été\r\n• 1 semaine entre Noël et Jour de l’An\r\n• Pont de l’Ascension'),
(2, 'ÉQUIPE :', '• 1x CAP Petite Enfance expérimentée, à la direction.\r\n\r\n• 1x Éducatrice de Jeunes Enfants (licence psycho) pour l’analyse de la pratique, 3h par mois\r\n\r\n• 3x CAP Petite Enfance.\r\n\r\n Tous partagent leur savoir-faire et savoir-être en s\'occupant de vos « P’tits Loups » avec plaisir,  joie et bonne humeur !'),
(3, 'CÔTÉ PRATIQUE : ', 'Les parents apportent :\r\n• Une paire de chausson\r\n• Deux changes\r\n• Marqués au nom de l’enfant\r\n• Repas et biberons (glacière avec bloc froid)\r\n• Doudous et Tétines\r\n• Produits spécifiques si besoin\r\nLa structure fournit :\r\n• Couches\r\n• Produits d’hygiène\r\n• Nettoyage des vêtements et contenants alimentaires salis sur place.   ');

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
-- Structure de la table `other-pages`
--

CREATE TABLE `other-pages` (
  `id` int(10) NOT NULL,
  `main-title` varchar(100) NOT NULL,
  `under-title1` varchar(100) NOT NULL,
  `under-title2` varchar(100) NOT NULL,
  `content1` varchar(2000) NOT NULL,
  `content2` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `other-pages`
--

INSERT INTO `other-pages` (`id`, `main-title`, `under-title1`, `under-title2`, `content1`, `content2`) VALUES
(1, 'Philosophie et Projet d’Établissement', '• Le projet pédagogique s’articule autour des enfants :', ' • Et des parents :', ' « La Maison des P’tits Loups » proposera pour chaque enfant, un accueil individualisé afin qu’il puisse s’épanouir et grandir à son rythme dans un cadre sécurisant.  Il s\'agit aussi bien du volet psychologique ou physique, pour accompagner l\'apprentissage et le développement intellectuel et moteur, dans le respect de volontés parentales.\r\n\r\n L’équipe veillera à parler avec des mots justes, avec un  maximum de vocabulaire tout au long de la journée. Les formules de politesse (bonjour, au revoir, s’il te plaît, merci, pardon) seront dites à chaque fois qu’il le sera nécessaire afin d’inciter les enfants à en faire de même.\r\n Respecter l’enfant et de la même façon, l’adulte sera respecté.\r\n\r\n Laisser l’enfant au maximum « faire seul » afin qu’il gagne en autonomie.\r\n\r\n Le jeu occupera une place très importante au sein de la structure : jouer c’est découvrir son environnement, éprouver un sentiment de maîtrise, imaginer et créer, expérimenter le plaisir.', 'Une « boîte à idées » sera à la disposition des parents à l’accueil ; l’équipe prendra en compte le souhait de ces derniers.\r\n\r\n Il pourra être proposé une réunion trimestrielle "Parents/Professionnels de la Petite Enfance", un temps « café des parents » mensuel, un petit spectacle de fin d’année ainsi qu’un pique nique avant les congés d’été.\r\n\r\n La communication entre les parents et l’équipe est une des priorités de la structure.'),
(2, ' Les Locaux', '', '', 'Situé au Business Park des Playes (anciennement l’Espace Noral), le local d’une superficie de 93 m2, en rez-de-chaussée, était un  bureau d’architectes.\r\n\r\n Vous pourrez aisément vous garer.\r\n\r\n Huit fenêtres d’une largeur totale de 11,50 m apportent de la lumière qui peut être tamisée par des stores vénitiens.\r\n\r\n Afin de laisser un grand espace de vie pour les enfants, nous avons créé autour de ce dernier :\r\n\r\n Un accueil où vous pourrez prendre le temps d’habiller ou déshabiller votre « petit bout », un panneau d’affichage vous indiquera les moments forts de la micro-crèche,\r\n\r\n Un bureau où vous pourrez parler en toute discrétion avec l’équipe,\r\n\r\n Une chambre pour les « bébés »,\r\n\r\n Une chambre pour les « grands » qui servira de salle d’activité en dehors des siestes\r\n (Ces chambres sont équipées de cloisons phoniques afin que le sommeil des « P’tits Loups » ne soit pas perturbé par le bruit),\r\n\r\n Un espace change où se trouvent une table à langer, un toilette ainsi qu’un lavabo pour les petits et une armoire où seront rangés les changes (à noter que pour l’intimité des enfants un seul d’entre eux sera changé au fur et à mesure),\r\n\r\n Un espace buanderie avec lave linge et sèche linge,\r\n\r\n Un espace cuisine avec évier, lave main à commande non manuelle, deux réfrigérateurs (un pour les enfants, un pour le personnel) ainsi qu’un micro onde,\r\n\r\n Et enfin une large pièce pour les enfants que l’on a rendu « cocooning » grâce à différents espaces dédiés au regroupement, à la lecture, aux chansons, aux activités, à la motricité, aux jeux de rôle (poupée, cuisine).	\r\n', '');

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
(1, 'rien', 'rien mais à droite', 'gauche', 'droite', 'lelien');

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
-- Index pour la table `other-pages`
--
ALTER TABLE `other-pages`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `articles-images`
--
ALTER TABLE `articles-images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `inside-images`
--
ALTER TABLE `inside-images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `other-pages`
--
ALTER TABLE `other-pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `register-text`
--
ALTER TABLE `register-text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
