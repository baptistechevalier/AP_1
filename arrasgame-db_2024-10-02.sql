-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 oct. 2024 à 10:43
-- Version du serveur :  10.3.17-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `arrasgame`
--

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

CREATE TABLE `associations` (
  `id_users` int(11) NOT NULL,
  `id_tournois` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `associations`
--

INSERT INTO `associations` (`id_users`, `id_tournois`) VALUES
(3, 3),
(6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `nom_jeu` varchar(100) NOT NULL,
  `plateforme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom_jeu`, `plateforme`) VALUES
(1, 'CS GO 2', 'PC'),
(2, 'Valorant', 'PC'),
(3, 'Steet Fighter', 'Arcade'),
(4, 'Rocket League', 'Console'),
(5, 'Cook simulator', 'PC'),
(6, 'Flight simulator', 'PC');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'utilisateurs'),
(2, 'personnelles');

-- --------------------------------------------------------

--
-- Structure de la table `tournois`
--

CREATE TABLE `tournois` (
  `id` int(11) NOT NULL,
  `nom_tournoi` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tournois`
--

INSERT INTO `tournois` (`id`, `nom_tournoi`, `date`, `id_jeu`) VALUES
(3, 'ArrasGame Cup', '2024-10-04', 2),
(5, 'Qui sera le meilleur pilote ?', '2025-09-11', 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `idrole` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `pseudo`, `password`, `idrole`) VALUES
(2, 'Game', 'Arras', 'arras-game@gmail.com', 'ArrasGame', 'ArrasGame', 2),
(3, 'Client', 'Client', 'client@gmail.com', 'Client', 'Client', 1),
(5, 'Admin', 'Adminn', 'Admin@gmail.com', 'Admin', 'Admin', 2),
(6, 'Felcyn', 'Louka', 'raptar@gmail.com', 'Raptar', 'Raptar123', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id_users`,`id_tournois`),
  ADD KEY `id_tournois` (`id_tournois`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tournois`
--
ALTER TABLE `tournois`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`idrole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tournois`
--
ALTER TABLE `tournois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `associations`
--
ALTER TABLE `associations`
  ADD CONSTRAINT `associations_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `associations_ibfk_2` FOREIGN KEY (`id_tournois`) REFERENCES `tournois` (`id`);

--
-- Contraintes pour la table `tournois`
--
ALTER TABLE `tournois`
  ADD CONSTRAINT `tournois_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
