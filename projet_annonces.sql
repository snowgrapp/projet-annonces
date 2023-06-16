-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2023 at 12:46 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_annonces`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `id` int UNSIGNED NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `titre` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description_annonce` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `duree_de_publication` int DEFAULT NULL,
  `prix_vente` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cout_annonce` double DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `date_fin_publication` datetime DEFAULT NULL,
  `id_etat` int UNSIGNED DEFAULT NULL,
  `id_utilisateur` int UNSIGNED DEFAULT NULL,
  `date_vente` datetime DEFAULT NULL,
  `id_acheteur` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id`, `date_creation`, `titre`, `description_annonce`, `duree_de_publication`, `prix_vente`, `cout_annonce`, `date_validation`, `date_fin_publication`, `id_etat`, `id_utilisateur`, `date_vente`, `id_acheteur`) VALUES
(19, NULL, 'pull', 'neuf', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 'slip', 'blanc, peu servi, de bonne matière', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `nom_categorie` varchar(150) DEFAULT NULL,
  `description_categorie` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `description_categorie`) VALUES
(30, 'trhtrn', 'hyrjhry'),
(32, 'pantalon', 'peu servi ');

-- --------------------------------------------------------

--
-- Table structure for table `categories_annonces`
--

CREATE TABLE `categories_annonces` (
  `id_annonce` int UNSIGNED NOT NULL,
  `id_categorie` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `etats`
--

CREATE TABLE `etats` (
  `id_etat` int UNSIGNED NOT NULL,
  `libelle_etat` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int UNSIGNED NOT NULL,
  `is_admin` tinyint DEFAULT NULL,
  `surnom` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mail` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hash_` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `adresse` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `cp` int DEFAULT NULL,
  `ville` varchar(150) DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `date_validite_token` datetime DEFAULT NULL,
  `solde_cagnotte` float UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `is_admin`, `surnom`, `mail`, `hash_`, `nom`, `prenom`, `date_naissance`, `telephone`, `adresse`, `cp`, `ville`, `date_inscription`, `token`, `date_validite_token`, `solde_cagnotte`) VALUES
(20, NULL, 'megabgdelenfer', 'maxencellvre5@gmail.com', 'yjtyd', 'lelievre', 'maxence', '1996-10-31', '0620484453', '6 rue francois aune', 6000, 'nice', NULL, NULL, NULL, NULL),
(21, NULL, 'killer ', 'jean@gmail.com', 'fdyjyj', 'thon', 'jean', '1980-01-20', '0661950631', '5 rue du marechal', 700, 'pignoux', NULL, NULL, NULL, NULL),
(23, NULL, 'max', 'mamad@gmail.com', ',hkkhjg', 'htrjh', 'drhftr', '1996-10-31', '0620202020', 'dhtnj', 6000, 'nice', NULL, NULL, NULL, NULL),
(25, NULL, 'maxouuu', 'momo@gmail.com', 'ghkfgk', 'lelievre', 'maxence', '2001-12-31', '0602454847', '6 rue tata', 7000, 'nancy', NULL, NULL, NULL, NULL),
(27, NULL, 'arabe', 'momotire@gmail.com', 'egfergergre', 'moudjahedine', 'nono', '1998-10-25', '0612356987', '6 rue de la clef', 1000, 'orleans', NULL, NULL, NULL, NULL),
(28, NULL, 'maxou', 'mamad@gmail.com', '$2y$10$k/LAUn.KBj95Ue/LsPiqnuSXdKVqeCS8WQBpZ2lxebV4HHEiAPwFS', 'lelievre', 'maxence', '1996-10-31', '0620484453', '6 rue francois aune', 6000, 'nancy', NULL, NULL, NULL, NULL),
(29, NULL, 'nathy', 'nath@gmail.com', '$2y$10$Rrv9pp3rTHbmNCiSJEM8Y.qrZEl7s/cSXIaLmmU2H5zfLY08AvTyG', 'alia', 'nath', '1984-10-31', '0645789858', 'rue du corde', 5000, 'nice', NULL, NULL, NULL, NULL),
(30, NULL, 'mon precieux', 'anneau@gmail.com', '$2y$10$Ow2rcGpCNu5HI9Okf1H75urdK7gkTQhwOYrqDqzWoTeUcM.kKLM0y', 'sacquet', 'bilbo', '1980-10-31', '0615487998', '5 rue de la conté', 1250, 'terre du milieu', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id_photo` int UNSIGNED NOT NULL,
  `url_photo` varchar(250) NOT NULL,
  `is_main_photo` tinyint DEFAULT '0',
  `id_annonce` int UNSIGNED NOT NULL,
  `legende` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int UNSIGNED NOT NULL,
  `num_operation` varchar(100) NOT NULL,
  `somme` float NOT NULL,
  `date` datetime NOT NULL,
  `id_utilisateur` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2` (`id_etat`),
  ADD KEY `FK3` (`id_utilisateur`),
  ADD KEY `fk_Annonces_Utilisateur1` (`id_acheteur`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_annonces`
--
ALTER TABLE `categories_annonces`
  ADD PRIMARY KEY (`id_annonce`,`id_categorie`),
  ADD KEY `FKcatann2` (`id_categorie`);

--
-- Indexes for table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id_etat`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `FKphotos` (`id_annonce`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_Transactions_Utilisateurs1` (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `etats`
--
ALTER TABLE `etats`
  MODIFY `id_etat` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_photo` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`id_etat`) REFERENCES `etats` (`id_etat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK3` FOREIGN KEY (`id_utilisateur`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Annonces_Utilisateur1` FOREIGN KEY (`id_acheteur`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories_annonces`
--
ALTER TABLE `categories_annonces`
  ADD CONSTRAINT `FKcatann1` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKcatann2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FKphotos` FOREIGN KEY (`id_annonce`) REFERENCES `annonces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_Transactions_Utilisateurs1` FOREIGN KEY (`id_utilisateur`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
