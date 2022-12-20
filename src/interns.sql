-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 déc. 2022 à 22:26
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
(7, 'GATELLIAR', 'Amory', 'agatelliar22', '$2y$10$pHouE87iNLnEO5sCEQSXWO3d0AW8NLN/Ie6uH2CcmFaPNEhHCuodm', 'Crane7-Backer-Nemeses'),
(8, 'HUET', 'Laurent', 'lhuet22', '$2y$10$gWVTOrl0JvauoKEpXl0fUedd.xzXnHDRpUxjjaL0z/GkuewlSN9eS', 'Envoy6-Polar-Wildly'),
(9, 'JABRE', 'Hamza', 'hjabre22', '$2y$10$2q0G9KAUD4auNAFgEgYPDeY5TNJEgYy8If/S9Ur7SzPBahC.ZYFRG', 'Parted-Pulverize-Abstract4'),
(10, 'MAKEMBE', 'Céline', 'cmakembe22', '$2y$10$E4CaggThHXVMDyWQ6plctO069/2MN9Uf69PiWmXYN61BJICy4WkD2', 'Rupture3-Flop-Darkroom'),
(11, 'MOUSTAGHFIN', 'Waël-Amin', 'wmoustaghfin22', '$2y$10$NGrNHa83SzfHP3SKHaVIruIVU.p4F6derlvy78b9uPLAVtV6T1H92', 'Substance8-Pound-Handset'),
(12, 'PIERROT', 'Gilles', 'gpierrot22', '$2y$10$eh21Lbarxm2C./efYnE32OhOxy6N5z2TE99l3sPhB9RGLYH94LeIG', 'Enlarged-Scanner7-Refurbish'),
(13, 'SETIAO', 'Tiffaine', 'tsetiao22', '$2y$10$rGzm5IzWu/ZdntDpzesRyulSIRRNKw3BRSUoxZLwEwPlvmyDjj/kO', 'Catering-Chowder2-Diaper'),
(14, 'RODRIGUES', 'Marceau', 'mrodrigues18', '$2y$10$gSknz7jrg6WLjhLbVToU.usBazvWqV.eHsFhVtv3txTYN7jbS/SNO', 'btsinfo');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`intern_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `interns`
--
ALTER TABLE `interns`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
