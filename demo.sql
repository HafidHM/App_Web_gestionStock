-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 juin 2018 à 23:24
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `demo`
--

-- --------------------------------------------------------

--
-- Structure de la table `article_desire`
--

CREATE TABLE `article_desire` (
  `id_article_desire` int(10) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `article_e`
--

CREATE TABLE `article_e` (
  `id_article_e` int(11) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `id_emplacement` int(11) NOT NULL,
  `id_type_a` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article_e`
--

INSERT INTO `article_e` (`id_article_e`, `etat`, `id_emplacement`, `id_type_a`, `quantite`, `img`) VALUES
(22, 0, 1, 1, 20, 'chaise.jpg'),
(23, 1, 5, 1, 10, 'chaise.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `id_user` varchar(10) NOT NULL,
  `le_login` varchar(1024) NOT NULL,
  `le_mdp` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id_user`, `le_login`, `le_mdp`) VALUES
('1', 'f9eb2b758ed685870f6bc250989f9a3a', '4988ec12e3d9a8db3943f47d4ca37c62'),
('2', 'be5f28a5f7f765371423d514f06147b2', '65188062310d43b9044d244eb5e0932e'),
('3', '372eeffaba2b5b61fb02513ecb84f1ff', '0d2acd6a73f87673cd527cd6745a0e55');

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `id_article_desire` int(11) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `quantite_article_desire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE `commander` (
  `id_commande` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_type_p` int(11) DEFAULT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat_commande` tinyint(1) NOT NULL,
  `details_commande` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commander`
--

INSERT INTO `commander` (`id_commande`, `id_fournisseur`, `id_type`, `id_type_p`, `prix`, `quantite`, `date_commande`, `etat_commande`, `details_commande`) VALUES
(11, 26, 14, NULL, 12, 12, '2018-06-19 05:00:10', 1, 'rien'),
(12, 24, NULL, 1, 23, 13, '2018-06-22 00:00:00', 0, 'rien'),
(13, 24, NULL, 2, 33, 23, '2018-06-21 00:00:00', 1, 'rien'),
(14, 26, 9, NULL, 2223, 3, '2018-06-19 00:00:00', 1, 'rien');

-- --------------------------------------------------------

--
-- Structure de la table `degats`
--

CREATE TABLE `degats` (
  `id_degat` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `id_article_e` int(11) NOT NULL,
  `quantite` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_emplacement` int(11) NOT NULL,
  `nom_emplacement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplacement`
--

INSERT INTO `emplacement` (`id_emplacement`, `nom_emplacement`) VALUES
(1, 'Classe Informatique'),
(2, 'Magasin'),
(3, 'Toilette'),
(4, 'Bureau Directeur'),
(5, 'Classe 1A'),
(6, 'Classe 2A'),
(7, 'Classe 3A'),
(8, 'Classe 4A ');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `adresse`, `telephone`, `date`) VALUES
(24, 'HAFID MOHAMED', 'hafid@outlook.fr', '0677882211', '2018-06-09 12:09:54'),
(25, 'Omar Kante ', 'Omar@outlook.fr', '0655444332', '2018-06-09 12:10:39'),
(26, 'Bakary Konaty', 'Bakary@outlook.fr', '0677552233', '2018-06-09 12:11:10');

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE `journal` (
  `id_journal` int(11) NOT NULL,
  `evenement` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `journal`
--

INSERT INTO `journal` (`id_journal`, `evenement`) VALUES
(1, 'Un Fournisseur est ajoute de nom: MEHDI HAFID'),
(2, 'Un Fournisseur est Supprimer d\'ID: 12'),
(3, 'Un Fournisseur Mohamed Hafidest modifie'),
(4, 'Un Fournisseur est ajoute de nom: Bakary'),
(5, 'Un Fournisseur est ajoute de nom: hhh'),
(6, 'Un Fournisseur est ajoute de nom: Mohamed'),
(7, 'Un Fournisseur est ajoute de nom: hggk,'),
(8, 'Un Fournisseur est ajoute de nom: hggk,'),
(9, 'Un Fournisseur est ajoute de nom: hggk,'),
(10, 'Un Fournisseur est ajoute de nom: hggk,'),
(11, 'Un Fournisseur est ajoute de nom: hggk,'),
(12, 'Un Fournisseur est ajoute de nom: HAFID MOHAMED'),
(13, 'Un Fournisseur est ajoute de nom: Omar Kante '),
(14, 'Un Fournisseur est ajoute de nom: Bakary Konaty');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `personne_id` int(11) NOT NULL,
  `personne_nom` varchar(1024) NOT NULL,
  `personne_prenom` varchar(1024) NOT NULL,
  `personne_age` int(3) NOT NULL,
  `personne_loisirs` varchar(10) NOT NULL,
  `personne_pays` int(1) NOT NULL,
  `personne_carteType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`personne_id`, `personne_nom`, `personne_prenom`, `personne_age`, `personne_loisirs`, `personne_pays`, `personne_carteType`) VALUES
(8, 'Mohamed', 'Hafid', 20, '1', 2, 1),
(9, 'Amine', 'Hafid', 33, '1', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `id_type_p` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `etat`, `id_type_p`, `quantite`, `id_emplacement`, `img`) VALUES
(14, 1, 2, 2, 3, 'ponge.jpg'),
(15, 1, 5, 2, 4, 'crayon.jpg'),
(16, 1, 3, 4, 1, 'stylo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `type_a`
--

CREATE TABLE `type_a` (
  `id_type_a` int(11) NOT NULL,
  `nom_type` varchar(100) NOT NULL,
  `quantite_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_a`
--

INSERT INTO `type_a` (`id_type_a`, `nom_type`, `quantite_e`) VALUES
(1, 'Chaise', 280),
(2, 'Pobelle', 90),
(8, 'Unite central', 377),
(9, 'Ecran', 100),
(10, 'Clavier', 80),
(11, 'sourie', 300),
(12, 'table', 43),
(13, 'tableau', 30),
(14, 'Cable', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_p`
--

CREATE TABLE `type_p` (
  `id_type_p` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL,
  `quantite_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_p`
--

INSERT INTO `type_p` (`id_type_p`, `nom_type`, `quantite_e`) VALUES
(1, 'Papier toillette', 49),
(2, 'Ponge', 196),
(3, 'Stylo', 95),
(4, 'Marqeur', 150),
(5, 'Crayon', 98);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article_desire`
--
ALTER TABLE `article_desire`
  ADD PRIMARY KEY (`id_article_desire`),
  ADD KEY `FK_article_desire_type` (`id_type`);

--
-- Index pour la table `article_e`
--
ALTER TABLE `article_e`
  ADD PRIMARY KEY (`id_article_e`),
  ADD KEY `FK_article_e_type` (`id_type_a`),
  ADD KEY `FK_article_e_emplacement` (`id_emplacement`);

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD KEY `FK_avoir_article_desire` (`id_article_desire`),
  ADD KEY `FK_avoir_emplacement` (`id_emplacement`);

--
-- Index pour la table `commander`
--
ALTER TABLE `commander`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `FK_commander_fournisseur` (`id_fournisseur`),
  ADD KEY `FK_commander_type` (`id_type`);

--
-- Index pour la table `degats`
--
ALTER TABLE `degats`
  ADD PRIMARY KEY (`id_degat`),
  ADD KEY `FK_degat_user` (`id_user`),
  ADD KEY `FK_degat_emplacement` (`id_emplacement`),
  ADD KEY `FK_degat_article` (`id_article_e`);

--
-- Index pour la table `emplacement`
--
ALTER TABLE `emplacement`
  ADD PRIMARY KEY (`id_emplacement`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id_journal`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`personne_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `FK_produit_emplacement` (`id_emplacement`),
  ADD KEY `id_type_p` (`id_type_p`);

--
-- Index pour la table `type_a`
--
ALTER TABLE `type_a`
  ADD PRIMARY KEY (`id_type_a`);

--
-- Index pour la table `type_p`
--
ALTER TABLE `type_p`
  ADD PRIMARY KEY (`id_type_p`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article_desire`
--
ALTER TABLE `article_desire`
  MODIFY `id_article_desire` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `article_e`
--
ALTER TABLE `article_e`
  MODIFY `id_article_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `commander`
--
ALTER TABLE `commander`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `degats`
--
ALTER TABLE `degats`
  MODIFY `id_degat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emplacement`
--
ALTER TABLE `emplacement`
  MODIFY `id_emplacement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
  MODIFY `id_journal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `personne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `type_a`
--
ALTER TABLE `type_a`
  MODIFY `id_type_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `type_p`
--
ALTER TABLE `type_p`
  MODIFY `id_type_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_desire`
--
ALTER TABLE `article_desire`
  ADD CONSTRAINT `FK_article_desire_type` FOREIGN KEY (`id_type`) REFERENCES `type_a` (`id_type_a`);

--
-- Contraintes pour la table `article_e`
--
ALTER TABLE `article_e`
  ADD CONSTRAINT `FK_article_e_emplacement` FOREIGN KEY (`id_emplacement`) REFERENCES `emplacement` (`id_emplacement`),
  ADD CONSTRAINT `FK_article_e_type` FOREIGN KEY (`id_type_a`) REFERENCES `type_a` (`id_type_a`);

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `FK_avoir_article_desire` FOREIGN KEY (`id_article_desire`) REFERENCES `article_desire` (`id_article_desire`),
  ADD CONSTRAINT `FK_avoir_emplacement` FOREIGN KEY (`id_emplacement`) REFERENCES `emplacement` (`id_emplacement`);

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `FK_commander_fournisseur` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `FK_commander_type` FOREIGN KEY (`id_type`) REFERENCES `type_a` (`id_type_a`);

--
-- Contraintes pour la table `degats`
--
ALTER TABLE `degats`
  ADD CONSTRAINT `FK_degat_article` FOREIGN KEY (`id_article_e`) REFERENCES `article_e` (`id_article_e`),
  ADD CONSTRAINT `FK_degat_emplacement` FOREIGN KEY (`id_emplacement`) REFERENCES `emplacement` (`id_emplacement`),
  ADD CONSTRAINT `FK_degat_user` FOREIGN KEY (`id_user`) REFERENCES `authentification` (`id_user`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_produit_emplacement` FOREIGN KEY (`id_emplacement`) REFERENCES `emplacement` (`id_emplacement`),
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_type_p`) REFERENCES `type_p` (`id_type_p`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
