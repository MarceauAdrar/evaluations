-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 01 jan. 2023 à 04:23
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
  `course_keywords` longtext NOT NULL,
  `course_link` varchar(255) NOT NULL,
  `course_category` varchar(50) NOT NULL,
  `course_illustration` varchar(255) NOT NULL,
  `course_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_synopsis`, `course_text`, `course_keywords`, `course_link`, `course_category`, `course_illustration`, `course_active`) VALUES
(1, 'Introduction au HTML', 'Plongez-vous dans l\'informatique et découvrez les fondements de la programmation.', 'Ici, vous allez apprendre les bases pour construire une page web.', 'balises par paires;balises orphelines;éditeur;web;internet;url;parents;enfants;chevrons;slash;attribut;valeur;indentation;camelcase;commentaires', 'https://docs.google.com/presentation/d/1fOEX4e3vXIM0i8zOLyTKeMHwLX7P_HaQ/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'html', 'html_css.svg', 1),
(2, 'Les balises', 'Attaquez la programmation en découvrant les balises HTML', '', 'chrevrons;balises par paires;balises orphelines;block;inline;parent;enfant;paragraphe;div;span;ancre;chemin relatif;chemin absolu;identifiant;camelcase;snakecase;href;src;alt;listes ordonnées;listes non-ordonnées;header;footer;nav;section;article;aside;balises sémantiques', 'https://docs.google.com/presentation/d/1hRCIx5ZoMTMzz9m3Yx5V7xQc32DQpgXE/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'html', 'html_css.svg', 1),
(17, 'Introduction', 'Attaquez les bases des feuilles de style.', '', 'styliser;style;link;sélecteurs;propriétés;valeurs;séparateurs;commentaires;cascade;ordre d\'éxécution;héritage;règles;déclarations', 'https://docs.google.com/presentation/d/18ohP0_IBN8GQSIzqEIyrLA_7NL1XH_wk/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(18, 'Sélecteurs simples', 'Apprenez à manipuler les sélecteurs basiques pour pouvoir styliser votre page web.', '', 'sélecteur;unicité;multiplicité;sélections multiples;sélections imbriquées;sélections par attribut;sélections avancées', 'https://docs.google.com/presentation/d/1X_BHkQoNItjkVhqjx_bW9_Z7JMnLmjhv/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(19, 'Propriétés courantes', 'Dans ce cours, vous allez découvrir les propriétés les plus communément utilisées en CSS.', '', 'textes;background;super-propriétés;dimensions;couleurs;héxadécimal;rgb;rgba', 'https://docs.google.com/presentation/d/15iHfd-dRXZDiCP96Jp0zDjmKQ6abQBkQ/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(20, 'Les pseudo-classes', 'Vous allez découvrir ici l\'utilité des pseudo-classes qui peuvent permettre de dynamiser votre page web et de faire des règles plus complexes.', '', 'hover;visited;link;active;focus;first-child;last-child;nth-child;odd;even;notation fonctionnelle', 'https://docs.google.com/presentation/d/1w_ICOcF_4ezVzIqpbejnWohNGe-_8JhR/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(21, 'Flexbox', 'Découvrez comment fonctionne les flexbox et leurs placements.', '', 'margin;border;padding;content;height;width;tableaux;float;flex;grid;parent;enfant;order', 'https://docs.google.com/presentation/d/15voc-5nC260KLFYd0z9tZ8cq7sZQjMfw/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(22, 'Grid', 'Découvrez comment fonctionne les placements avec le système de grilles.', '', 'margin;border;padding;content;height;width;tableaux;float;flex;grid;parent;enfant;lignes;colonnes;rows;columns;patterns', 'https://docs.google.com/presentation/d/1AlfKS1humDYwpU2Y7k5SwbDFx44z4SNe/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(23, 'Ombrages', 'Ajoutez de la dimension et de la profondeur à votre page avec les ombres.', '', 'box-shadow;text-shadow;décalages;flou;couleur', 'https://docs.google.com/presentation/d/18yuLMkj__jJtvytDi8FxNazNK1byOdsw/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(24, 'Les dégradés', 'Démarquez vous avec l\'ajout de dégradés.', '', 'dégradés linéaires;dégradés radiaux;dégradés coniques;valeurs numéraires;valeur par mot-clé;to;from;rgb;rgba;héxadécimal;circle;ellipse;at', 'https://docs.google.com/presentation/d/1odMbmdAjKmXdzNJ-wrQ80GUlO-Gin5fr/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(25, 'Les tableaux', 'Découvrez comment mettre en forme des données avec les tableaux.', '', 'table;tr;th;td;caption;border;super-propriétés;thead;tbody;tfoot;rowspan;colspan', 'https://docs.google.com/presentation/d/1Q-AO4J7xN5pbAc9cDrpx75DtRSzEuko3/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'html', 'html_css.svg', 1),
(26, 'Les formulaires', 'Apprenez à construire des formulaires pour récolter des informations auprès de vos utilisateurs.', '', 'form;méthode;attribut;addresse;method;action;get;post;input;type;placeholder;required;autofocus;label;for;textarea;cols;rows;file;accept;multiple;checkbox;checked;fieldset;legend;radio;select;option;optgroup;selected;submit;button;image;reset', 'https://docs.google.com/presentation/d/1_lvk9qVDc_idT-RxfZbeGe8YWycb8T7P/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'html', 'html_css.svg', 1),
(27, 'Les placements simples', 'Nous allons maintenant voir comment placer nos éléments dans la page web.', '', 'balises par paire;balises orphelines;balises block;balises inline;balises universelles;balises sémantiques;margin;border;padding;content;height;width;overflow;scroll;auto;hidden;word-wrap', 'https://docs.google.com/presentation/d/1qf3ZcxwhKmlwAYn80r8k9KZPSMeF4u7N/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(28, 'Les requêtes de média', 'Dans ce cours, vous allez voir une grosse partie. Les requêtes de média permettent d\'effectuer des changements personnalisés en fonction des appareils, de leur orientation et de leur dimension.', '', 'responsive design;media;annotations', 'https://docs.google.com/presentation/d/1lEW1LDPFGJJjUH10zTrUrK656UNBwXbf/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(29, 'Les animations', 'Découvrez l\'univers des animations et commencez à dynamiser simplement vos pages web.', '', 'transform;rotate;deg;turn;abscisses;ordonnées;scale;translate;transformation oblique;skew;super-propriété', 'https://docs.google.com/presentation/d/1WEIxHBML-eLraoUEOSyQwqovdRV7Z4nI/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(30, 'Les animations avancées', 'Etoffez vos connaissances dans l\'art de l\'animation et dynamiser de façon plus complexes vos éléments.', '', 'transition;delay;function;super-propriété;keyframes;rotate;animation;duration;count;fill;direction', 'https://docs.google.com/presentation/d/1m39KZ11kXhmwY7RjkbQGAJ-_YUv8ynDY/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'css', 'html_css.svg', 1),
(31, 'Les audios et vidéos', 'Apprenez à intégrer du contenu multimédia dans vos pages: les sons et vidéos. ', '', 'mp3;aac;ogg;wav;aiff;audio;src;source;controls;autoplay;loop;width;preload;avi;mp4;mkv;codec;webm;h.256;ogg theora;video;poster;muted;disablepictureinpicture;iframe;intégration', 'https://docs.google.com/presentation/d/1pYQZtAy-1Qed7Bk_7adCufVcxA6f0Gbm/edit?usp=share_link&ouid=118393150758904552045&rtpof=true&sd=true', 'html', 'html_css.svg', 1),
(32, 'Introduction', '', '', '', 'https://docs.google.com/presentation/d/10BsgVywSavYioY2u5VClxYpP07xtBzq4/edit?usp=share_link&ouid=113329849450696600746&rtpof=true&sd=true', 'frameworks', 'frameworks.svg', 1);

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
(1, 'Construire un fichier HTML de base valide', 'Savoir créer une page HTML basique', 'Dans cette évaluation, vous devrez construire un fichier HTML valide. ', '9de95532b3918dd89aa8e3d518c77ad0', 11, 1),
(2, 'Une erreur de parcours', 'Savoir débugger;Savoir corriger', 'Dans cette évaluation, vous devrez trouver les différentes erreurs glissées dans le code, trouvez-les et corrigez-les. Vous n\'avez pas besoin d\'utiliser de balises <code>style</code>.', '26a5d1aea50e69ecc18d4faeaefdc526', 2, 1),
(3, 'Du CSS dans l\'air', 'Savoir sélectionner un élément HTML en CSS;Savoir styliser un élément par rapport à un autre', 'Dans cette évaluation, vous allez devoir sélectionner toutes les balises de <code>paragraphe</code> et n\'appliquer un style qu\'à l\'une d\'elles.\nLibre choix sur la méthode pour effectuer cette tâche.', '5a1841f1fc4ac836e27260ab736be74b', 1, 1),
(4, 'Les médias s\'en mêlent', 'Savoir modifier des éléments en fonction de la largeur/longueur de l\'écran;Savoir changer des éléments en fonction de la résolution de l\'écran', 'Ici, vous allez devoir réaliser deux grosses phases:\n<ol>\n<li>La première: changer le fond en fonction de la disposition de l\'écran avec l\'<code>orientation</code> (rouge en portrait, bleu en paysage).</li>\n<li>La seconde: changer la taille de la police des paragraphes et leur couleur pour les résolutions minimales suivantes : 320px (18px jaune); 768px (22px orange) ; 1440px (30px vert)</li>', '2937904b40de8ddb973bbff315a04b22', 8, 1),
(5, 'Rando Nuit', '', '', '81ee749964a52639276f9a13bc11f967', 0, 1);

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
(2, 'Frameworks', 'bootstrap', 0);

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
(1, 'BOTTA', 'Facundo', 'fbotta22', '$2y$10$MxmZy3T5GuAo5JcPgcJ4reTropVcibNpWrGKb/Uvs0mqXeh4cFD7K', 'Valid4-Cacti-Theme'),
(2, 'BOUJANDIR', 'Karim', 'kboujandir22', '$2y$10$rKsCspk0Ez7W3iZ3al5dT.ZMOWuGVWMIwHpOsuEtfHgmYA0xap//.', 'Absolve-Tattling-Quiet2'),
(3, 'BOURHIL', 'Yannis', 'ybourhil22', '$2y$10$yJbGxTEtbfzXfnKdG9D7cumYT23ncLBet4mLuWllNIcn0nqAs5C4y', 'Duration-Unseeing-Baffle0'),
(4, 'CHABROUX', 'Jérémy', 'jchabroux22', '$2y$10$joofqSPG4iHmlEQZtOhzgeVY7BQ95jkRct8IYRpXOOwGgUOLUC0Pe', 'Skittle2-Pasture-Cone'),
(5, 'DUFOUR', 'Romain', 'rdufour22', '$2y$10$Rud1iFZ.xOuO2VfCj9MnqOKJxfwPml.Q.nfjq9aDOYtvyB4aOWTh2', 'Quote-Silk-Routing5'),
(6, 'EFNANE', 'Haitam', 'hefnane22', '$2y$10$uuR06xH9xD6WAMkqMZZueurdemyFThUTXcxNfm.52VvYM/zmsTX/W', 'Stunt4-Stoplight-Scorer'),
(7, 'GATELLIER', 'Amory', 'agatellier22', '$2y$10$pHouE87iNLnEO5sCEQSXWO3d0AW8NLN/Ie6uH2CcmFaPNEhHCuodm', 'Crane7-Backer-Nemeses'),
(8, 'HUET', 'Laurent', 'lhuet22', '$2y$10$gWVTOrl0JvauoKEpXl0fUedd.xzXnHDRpUxjjaL0z/GkuewlSN9eS', 'Envoy6-Polar-Wildly'),
(9, 'JABRE', 'Hamza', 'hjabre22', '$2y$10$2q0G9KAUD4auNAFgEgYPDeY5TNJEgYy8If/S9Ur7SzPBahC.ZYFRG', 'Parted-Pulverize-Abstract4'),
(10, 'MAKEMBE', 'Céline', 'cmakembe22', '$2y$10$E4CaggThHXVMDyWQ6plctO069/2MN9Uf69PiWmXYN61BJICy4WkD2', 'Rupture3-Flop-Darkroom'),
(11, 'MOUSTAGHFIN', 'Waël-Amin', 'wmoustaghfin22', '$2y$10$NGrNHa83SzfHP3SKHaVIruIVU.p4F6derlvy78b9uPLAVtV6T1H92', 'Substance8-Pound-Handset'),
(12, 'PIERROT', 'Gilles', 'gpierrot22', '$2y$10$eh21Lbarxm2C./efYnE32OhOxy6N5z2TE99l3sPhB9RGLYH94LeIG', 'Enlarged-Scanner7-Refurbish'),
(13, 'SETIAO', 'Tiffaine', 'tsetiao22', '$2y$10$rGzm5IzWu/ZdntDpzesRyulSIRRNKw3BRSUoxZLwEwPlvmyDjj/kO', 'Catering-Chowder2-Diaper'),
(14, 'RODRIGUES', 'Marceau', 'mrodrigues18', '$2y$10$gSknz7jrg6WLjhLbVToU.usBazvWqV.eHsFhVtv3txTYN7jbS/SNO', 'btsinfo');

-- --------------------------------------------------------

--
-- Structure de la table `interns_quiz`
--

CREATE TABLE `interns_quiz` (
  `intern_quiz_id` int(11) NOT NULL,
  `intern_quiz_answers` varchar(10) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `id_intern` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `interns_quiz`
--

INSERT INTO `interns_quiz` (`intern_quiz_id`, `intern_quiz_answers`, `id_quiz`, `id_intern`) VALUES
(7, '2;', 1, 14),
(8, '1;', 2, 14);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_question` varchar(50) NOT NULL,
  `quiz_proposition_1` varchar(100) NOT NULL,
  `quiz_proposition_2` varchar(100) NOT NULL,
  `quiz_proposition_3` varchar(100) DEFAULT NULL,
  `quiz_proposition_4` varchar(100) DEFAULT NULL,
  `quiz_answer` varchar(10) NOT NULL,
  `quiz_type` tinyint(1) NOT NULL COMMENT '0: checkbox ; 1: radio',
  `id_quiz_list` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_question`, `quiz_proposition_1`, `quiz_proposition_2`, `quiz_proposition_3`, `quiz_proposition_4`, `quiz_answer`, `quiz_type`, `id_quiz_list`) VALUES
(1, 'Que signifie HTML ?', 'HypraTop MarqueUp Language', 'HyperText Markup Language', NULL, NULL, '2', 1, 1),
(2, 'Qu\'est ce qu\'un navigateur web ?\n', 'HypraTop MarqueUp Language', 'HyperText Markup Language', NULL, NULL, '2', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `quiz_dd`
--

CREATE TABLE `quiz_dd` (
  `quiz_dd_id` int(11) NOT NULL,
  `quiz_dd_name` varchar(50) NOT NULL,
  `quiz_dd_link` varchar(100) NOT NULL,
  `quiz_dd_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quiz_dd`
--

INSERT INTO `quiz_dd` (`quiz_dd_id`, `quiz_dd_name`, `quiz_dd_link`, `quiz_dd_active`) VALUES
(1, 'HTML', 'html', 1),
(2, 'CSS', 'css', 1),
(3, 'Bootstrap', 'bootstrap', 0);

-- --------------------------------------------------------

--
-- Structure de la table `quiz_lists`
--

CREATE TABLE `quiz_lists` (
  `quiz_list_id` int(11) NOT NULL,
  `quiz_list_title` varchar(100) NOT NULL,
  `id_dd_quiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `quiz_lists`
--

INSERT INTO `quiz_lists` (`quiz_list_id`, `quiz_list_title`, `id_dd_quiz`) VALUES
(1, 'HTML niveau débutant', 1),
(2, 'HTML niveau intermédiaire', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

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
-- Index pour la table `interns_quiz`
--
ALTER TABLE `interns_quiz`
  ADD PRIMARY KEY (`intern_quiz_id`),
  ADD UNIQUE KEY `id_quiz_2` (`id_quiz`,`id_intern`),
  ADD KEY `id_quiz` (`id_quiz`),
  ADD KEY `id_intern` (`id_intern`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `id_quiz_list` (`id_quiz_list`);

--
-- Index pour la table `quiz_dd`
--
ALTER TABLE `quiz_dd`
  ADD PRIMARY KEY (`quiz_dd_id`);

--
-- Index pour la table `quiz_lists`
--
ALTER TABLE `quiz_lists`
  ADD PRIMARY KEY (`quiz_list_id`),
  ADD KEY `id_dd_quiz` (`id_dd_quiz`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT pour la table `interns_quiz`
--
ALTER TABLE `interns_quiz`
  MODIFY `intern_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `quiz_dd`
--
ALTER TABLE `quiz_dd`
  MODIFY `quiz_dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `quiz_lists`
--
ALTER TABLE `quiz_lists`
  MODIFY `quiz_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
