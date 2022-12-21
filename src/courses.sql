-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 21 déc. 2022 à 01:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `adrar`
--

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_synopsis` text NOT NULL,
  `course_text` mediumtext NOT NULL,
  `course_keywords` varchar(255) NOT NULL,
  `course_link` varchar(255) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `course_illustration` varchar(255) NOT NULL,
  `course_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_synopsis`, `course_text`, `course_keywords`, `course_link`, `course_type`, `course_illustration`, `course_active`) VALUES
(1, 'HTML: Les bases', 'Découvrez ce qu\'est la programmation en commençant par l\'HTML. Commencez par assimiler les premiers ', '', '', '', 'html', 'html_css.svg', 1),
(2, 'html: test', 'un énoncé ', 'un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long un énoncé beaucoup plus long ', 'key;word', 'https://localhost/test', 'html', 'under_construction.svg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
