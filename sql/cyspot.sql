--
-- Base de données : `cyspot`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `qte_produit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`produit_id`),
  KEY `produit_id` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`),
  KEY `user_id` (`user_id`),
  KEY `panier_produit_id` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
