--
-- Base de données : `cyspot`
--

-- --------------------------------------------------------

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `user_id`, `produit_id`, `prix`, `qte_produit`) VALUES
(14, 'ari@cyu.eu', 'burger05', 8, 5),
(15, 'ari@cyu.eu', 'burger05', 8, 5);

-- --------------------------------------------------------

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
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `mdp`, `nom`) VALUES
('ari@cyu.eu', '456', 'Ari'),
('cyspot@cyu.eu', '123', 'Webmaster'),
('jo@cyu.eu', '789', 'Jo'),
('test@mail.com', '000', 'test'),
('test1@cyu.eu', 'mdp1', 'test1'),
('test2@cyu.eu', 'mdp2', 'test2');
