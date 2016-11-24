-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Novembre 2016 à 14:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kohi_db`
--
CREATE DATABASE IF NOT EXISTS `kohi_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kohi_db`;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `association_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `abonne1_id` int(11) NOT NULL,
  `project1_id` int(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `coordonnees` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `branch`
--

CREATE TABLE `branch` (
  `short_name` varchar(50) NOT NULL,
  `full_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `short_name` varchar(20) NOT NULL,
  `full_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`short_name`, `full_name`) VALUES
('1G1A', 'Groupe 1A '),
('1G1B', 'Groupe 1B'),
('1G2A', 'Groupe 2A'),
('1G2B', 'Groupe 2B');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_projet`
--

CREATE TABLE `groupe_projet` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `short_name` varchar(20) NOT NULL,
  `full_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `short_name` varchar(20) NOT NULL,
  `full_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `association_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `interval_reunion` varchar(250) DEFAULT NULL COMMENT 'L''intervalle de temps entre deux réunions successives',
  `task1_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publication_date` date NOT NULL,
  `commentaire2` varchar(250) DEFAULT NULL,
  `association_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user1_id` int(11) NOT NULL,
  `deadline` date DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `contrainte1` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `namme` varchar(250) NOT NULL,
  `notification` tinyint(1) NOT NULL,
  `check_1` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `userr`
--

CREATE TABLE `userr` (
  `user_id` int(11) NOT NULL,
  `indentifiant` varchar(250) NOT NULL,
  `passwordd` varchar(250) NOT NULL,
  `contrainte_g_1` varchar(250) DEFAULT NULL,
  `emplois` varchar(250) NOT NULL,
  `niveau` varchar(250) NOT NULL,
  `parcours_s8` varchar(250) DEFAULT NULL,
  `option_3A` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `year`
--

CREATE TABLE `year` (
  `short_name` varchar(50) NOT NULL,
  `full_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `year`
--

INSERT INTO `year` (`short_name`, `full_name`) VALUES
('1A', 'Premiere Annee '),
('2A', 'Deuxieme Annee'),
('3A', 'Troisieme Annee');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`association_id`,`group_id`,`user_id`,`publication_id`),
  ADD KEY `sabonner` (`user_id`),
  ADD KEY `créer` (`group_id`,`user_id`),
  ADD KEY `publier` (`publication_id`,`user_id`);

--
-- Index pour la table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`short_name`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`short_name`);

--
-- Index pour la table `groupe_projet`
--
ALTER TABLE `groupe_projet`
  ADD PRIMARY KEY (`group_id`,`user_id`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`short_name`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`short_name`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`project_id`,`user_id`,`group_id`,`association_id`,`publication_id`),
  ADD KEY `utiliser` (`group_id`,`user_id`),
  ADD KEY `utiliseer` (`user_id`,`group_id`,`association_id`,`publication_id`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`,`group_id`,`user_id`),
  ADD KEY `publier` (`group_id`,`user_id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`,`user_id`,`project_id`),
  ADD KEY `planifier` (`user_id`),
  ADD KEY `afficher` (`project_id`);

--
-- Index pour la table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`short_name`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `association_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupe_projet`
--
ALTER TABLE `groupe_projet`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `userr`
--
ALTER TABLE `userr`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
