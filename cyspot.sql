-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 17 avr. 2021 à 21:28
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cyspot`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL,
  `user_id` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `user_id` (`user_id`),
  KEY `panier_produit_id` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `ref` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `qte_stock` int(11) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`ref`, `categorie`, `photo`, `nom`, `prix`, `qte_stock`) VALUES
('burger01', 'burger', 'img/burger_hamburger.jpg', 'Hamburger', 5, 10),
('burger02', 'burger', 'img/cheeseburger.png', 'Cheeseburger', 5, 8),
('burger03', 'burger', 'img/burger_cheesebacon.jpg', 'Cheese Bacon', 7, 6),
('burger04', 'burger', 'img/burger_doublecheese.jpg', 'Double Cheese', 6, 7),
('burger05', 'burger', 'img/burger_bigmac.jpg', 'Big Mac', 8, 5),
('pizza01', 'pizza', 'img/pepperoni.png', 'Pizza Pepperoni', 10, 10),
('pizza02', 'pizza', 'img/4F.png', 'Pizza 4 Fromages', 8, 8),
('pizza03', 'pizza', 'img/reine.png', 'Pizza Reine', 7, 8),
('pizza04', 'pizza', 'img/tartiflette.png', 'Pizza Tartiflette', 11, 10),
('pizza05', 'pizza', 'img/sicilienne.png', 'Pizza Sicilienne', 13, 5),
('poulet01', 'poulet', 'img/tenders.jpg', 'Tenders', 7, 10),
('poulet02', 'poulet', 'img/wings.jpg', 'Wings', 7, 8),
('poulet03', 'poulet', 'img/wings_bbq.jpg', 'Wings BBQ', 8, 8),
('poulet04', 'poulet', 'img/bucket_tenders.jpg', 'Bucket Tenders', 13, 7),
('poulet05', 'poulet', 'img/bucket_wings.jpg', 'Bucket Wings', 13, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `id_panier` (`id_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
