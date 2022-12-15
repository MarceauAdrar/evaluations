-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 déc. 2022 à 00:22
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
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `evaluation_id` int(11) NOT NULL,
  `evaluation_title` varchar(100) NOT NULL,
  `evaluation_goals` longtext NOT NULL,
  `evaluation_synopsis` text NOT NULL,
  `evaluation_token` varchar(255) NOT NULL,
  `evaluation_errors_max` int(2) NOT NULL,
  `id_evaluation_dd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`evaluation_id`, `evaluation_title`, `evaluation_goals`, `evaluation_synopsis`, `evaluation_token`, `evaluation_errors_max`, `id_evaluation_dd`) VALUES
(1, 'Construire un fichier HTML de base valide', 'Savoir créer une page HTML basique', 'Dans cette évaluation, vous devrez construire un fichier HTML valide. ', '9de95532b3918dd89aa8e3d518c77ad0', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `evaluations_dd`
--

CREATE TABLE `evaluations_dd` (
  `evaluation_dd_id` int(11) NOT NULL,
  `evaluation_dd_name` varchar(50) NOT NULL,
  `evaluation_dd_link` varchar(100) NOT NULL,
  `evaluation_dd_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluations_dd`
--

INSERT INTO `evaluations_dd` (`evaluation_dd_id`, `evaluation_dd_name`, `evaluation_dd_link`, `evaluation_dd_active`) VALUES
(1, 'HTML/CSS', 'html-css', 1),
(2, 'Frameworks', 'bootstrap', 1);

-- --------------------------------------------------------

--
-- Structure de la table `interns`
--

CREATE TABLE `interns` (
  `intern_id` int(11) NOT NULL,
  `intern_last_name` varchar(50) NOT NULL,
  `intern_first_name` varchar(50) NOT NULL,
  `intern_username` varchar(50) NOT NULL,
  `intern_password` varchar(255) NOT NULL,
  `intern_password_decoded` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `interns`
--

INSERT INTO `interns` (`intern_id`, `intern_last_name`, `intern_first_name`, `intern_username`, `intern_password`, `intern_password_decoded`) VALUES
(1, 'BOTTA', 'Facundo', 'fbotta22', 'c6388ead035e5b194b8b784a9089a99e', 'Valid4-Cacti-Theme'),
(2, 'BOUJANDIR', 'Karim', 'kboujandir22', 'ec8af0fb546f33dc1792247e18ce809e', 'Absolve-Tattling-Quiet2'),
(3, 'BOURHIL', 'Yannis', 'ybourhil22', 'bce87b78698826b2db3b9cf1eb3cef60', 'Duration-Unseeing-Baffle0'),
(4, 'CHABROUX', 'Jérémy', 'jchabroux22', '8f60f08bdb9e5c5f00b6f8d99278c827', 'Skittle2-Pasture-Cone'),
(5, 'DUFOUR', 'Romain', 'rdufour22', 'f93852b71139a887388ce84594ea0209', 'Quote-Silk-Routing5'),
(6, 'EFNANE', 'Haitam', 'hefnane22', '436fb0b87f472f7121c7194c6e8fdf54', 'Stunt4-Stoplight-Scorer'),
(7, 'GATELLIAR', 'Amory', 'agatelliar22', '4dafd9b918b5a8ea12c7abd25deaca9a', 'Crane7-Backer-Nemeses'),
(8, 'HUET', 'Laurent', 'lhuet22', 'ff0083ca3bb61b2c1e36e57a5dad8bc9', 'Envoy6-Polar-Wildly'),
(9, 'JABRE', 'Hamza', 'hjabre22', 'a136ec3cb59e52b73576fbdc4af198af', 'Parted-Pulverize-Abstract4'),
(10, 'MAKEMBE', 'Céline', 'cmakembe22', 'f92c629756414c1b2bb5423f9ab8f263', 'Rupture3-Flop-Darkroom'),
(11, 'MOUSTAGHFIN', 'Waël-Amin', 'wmoustaghfin22', '5c7b200d2619b727a4fa92917660ab20', 'Substance8-Pound-Handset'),
(12, 'PIERROT', 'Gilles', 'gpierrot22', 'fd3d66a0a70c457f8360aeea51b45a93', 'Enlarged-Scanner7-Refurbish'),
(13, 'SETIAO', 'Tiffaine', 'tsetiao22', 'e3dd73f71e75c6ac7ce480c996e00326', 'Catering-Chowder2-Diaper'),
(14, 'RODRIGUES', 'Marceau', 'mrodrigues18', 'cb177a4846c87b9dc307cb7fb440b05b', 'btsinfo');

-- --------------------------------------------------------

--
-- Structure de la table `interns_evaluations`
--

CREATE TABLE `interns_evaluations` (
  `intern_evaluation_id` int(11) NOT NULL,
  `intern_evaluation_completed` tinyint(1) NOT NULL,
  `intern_evaluation_errors_found` int(2) NOT NULL,
  `id_intern` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `interns_evaluations`
--

INSERT INTO `interns_evaluations` (`intern_evaluation_id`, `intern_evaluation_completed`, `intern_evaluation_errors_found`, `id_intern`, `id_evaluation`) VALUES
(6, 1, 0, 14, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `id_evaluation_dd` (`id_evaluation_dd`);

--
-- Index pour la table `evaluations_dd`
--
ALTER TABLE `evaluations_dd`
  ADD PRIMARY KEY (`evaluation_dd_id`);

--
-- Index pour la table `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`intern_id`);

--
-- Index pour la table `interns_evaluations`
--
ALTER TABLE `interns_evaluations`
  ADD PRIMARY KEY (`intern_evaluation_id`),
  ADD UNIQUE KEY `id_intern_2` (`id_intern`,`id_evaluation`),
  ADD KEY `id_intern` (`id_intern`),
  ADD KEY `id_evaluation` (`id_evaluation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evaluations_dd`
--
ALTER TABLE `evaluations_dd`
  MODIFY `evaluation_dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `interns`
--
ALTER TABLE `interns`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `interns_evaluations`
--
ALTER TABLE `interns_evaluations`
  MODIFY `intern_evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
