-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 01:26 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock1`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_desire`
--

CREATE TABLE `article_desire` (
  `id_article_desire` int(10) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article_e`
--

CREATE TABLE `article_e` (
  `id_article_e` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authentification`
--

CREATE TABLE `authentification` (
  `id_user` varchar(10) NOT NULL,
  `le_login` varchar(1024) NOT NULL,
  `le_mdp` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentification`
--

INSERT INTO `authentification` (`id_user`, `le_login`, `le_mdp`) VALUES
('1', 'f9eb2b758ed685870f6bc250989f9a3a', '4988ec12e3d9a8db3943f47d4ca37c62'),
('2', 'be5f28a5f7f765371423d514f06147b2', '65188062310d43b9044d244eb5e0932e'),
('3', '372eeffaba2b5b61fb02513ecb84f1ff', '0d2acd6a73f87673cd527cd6745a0e55');

-- --------------------------------------------------------

--
-- Table structure for table `avoir`
--

CREATE TABLE `avoir` (
  `id_article_desire` int(11) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `quantite_article_desire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commander`
--

CREATE TABLE `commander` (
  `id_fournisseur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_emplacement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` int(100) NOT NULL,
  `telephone` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `quantite_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_a`
--

CREATE TABLE `type_a` (
  `id_type` int(11) NOT NULL,
  `nom_type` varchar(100) NOT NULL,
  `quantite_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_desire`
--
ALTER TABLE `article_desire`
  ADD PRIMARY KEY (`id_article_desire`),
  ADD KEY `FK_article_desire_type` (`id_type`);

--
-- Indexes for table `article_e`
--
ALTER TABLE `article_e`
  ADD PRIMARY KEY (`id_article_e`),
  ADD KEY `FK_article_e_type` (`id_type`),
  ADD KEY `FK_article_e_emplacement` (`id_emplacement`);

--
-- Indexes for table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `avoir`
--
ALTER TABLE `avoir`
  ADD KEY `FK_avoir_article_desire` (`id_article_desire`),
  ADD KEY `FK_avoir_emplacement` (`id_emplacement`);

--
-- Indexes for table `commander`
--
ALTER TABLE `commander`
  ADD KEY `FK_commander_fournisseur` (`id_fournisseur`),
  ADD KEY `FK_commander_produit` (`id_produit`),
  ADD KEY `FK_commander_type` (`id_type`);

--
-- Indexes for table `emplacement`
--
ALTER TABLE `emplacement`
  ADD PRIMARY KEY (`id_emplacement`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Indexes for table `type_a`
--
ALTER TABLE `type_a`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_desire`
--
ALTER TABLE `article_desire`
  MODIFY `id_article_desire` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_e`
--
ALTER TABLE `article_e`
  MODIFY `id_article_e` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emplacement`
--
ALTER TABLE `emplacement`
  MODIFY `id_emplacement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_a`
--
ALTER TABLE `type_a`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_desire`
--
ALTER TABLE `article_desire`
  ADD CONSTRAINT `FK_article_desire_type` FOREIGN KEY (`id_type`) REFERENCES `type_a` (`id_type`);

--
-- Constraints for table `article_e`
--
ALTER TABLE `article_e`
  ADD CONSTRAINT `FK_article_e_emplacement` FOREIGN KEY (`id_emplacement`) REFERENCES `emplacement` (`id_emplacement`),
  ADD CONSTRAINT `FK_article_e_type` FOREIGN KEY (`id_type`) REFERENCES `type_a` (`id_type`);

--
-- Constraints for table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `FK_avoir_article_desire` FOREIGN KEY (`id_article_desire`) REFERENCES `article_desire` (`id_article_desire`),
  ADD CONSTRAINT `FK_avoir_emplacement` FOREIGN KEY (`id_emplacement`) REFERENCES `emplacement` (`id_emplacement`);

--
-- Constraints for table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `FK_commander_fournisseur` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `FK_commander_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `FK_commander_type` FOREIGN KEY (`id_type`) REFERENCES `type_a` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
