-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 21 juin 2023 à 00:59
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `LadThomasDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `Articles_Items`
--

CREATE TABLE `Articles_Items` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Articles_Items`
--

INSERT INTO `Articles_Items` (`id`, `nom`, `prix`, `qte`, `id_categorie`, `image`, `description`) VALUES
(2, 'Advenus F1', '20000', '2', 13, 'la-voiture-developpee-par-matra-chic-et-accueillante-est-arrivee-sur-le-marche-dans-les-annees-70-photo-dr-1608796187.jpg', 'Voiture de cours B-Tubo , rien qu\'a la carrure tout va,Voiture de cours B-Tubo , rien qu\'a la carrure tout va'),
(3, 'Lambo i8', '415', '20', 14, 'lbo.jpeg', 'Rien que à la couleur t\'es conscient que tu dois bruler du caburant'),
(5, 'Brabus', '2000', '2', 1, 'la-voiture-noire-de-bugatti-modele-unique-photo-dr-1608828241.jpg', 'Voiture de cours B-Tubo , rien qu\'a la carrure tout va,Voiture de cours B-Tubo , rien qu\'a la carrure tout va'),
(6, 'BWT SUPER', '100', '100', 14, 'alpine_f1_2022_2.jpg', 'Alpine F1 2022');

-- --------------------------------------------------------

--
-- Structure de la table `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `C_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE `Panier` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `C_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Panier`
--

INSERT INTO `Panier` (`id`, `item_id`, `C_id`, `number`, `state`) VALUES
(20, 3, 2, 1, 1),
(21, 5, 3, 3, 1),
(22, 2, 3, 3, 1),
(23, 5, 2, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Subscribe_Nl`
--

CREATE TABLE `Subscribe_Nl` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Subscribe_Nl`
--

INSERT INTO `Subscribe_Nl` (`id`, `email`) VALUES
(10, 'jeanphilippesara225@gmail.com'),
(11, 'ladouyouthomas@outlook.fr');

-- --------------------------------------------------------

--
-- Structure de la table `T_Categorie`
--

CREATE TABLE `T_Categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Categorie`
--

INSERT INTO `T_Categorie` (`id`, `nom`, `description`, `image`) VALUES
(13, 'f1 2022 bi-turbo', 'soyons chauvins et commen&ccedil;ons par une des marques les plus prestigieuses du monde, bugatti. en effet, si ettore bugatti &eacute;tait italien, c&rsquo;est bien en france, &agrave; molsheim, que volkswagen a fait rena&icirc;tre le mythique blason.', 'F1.jpeg'),
(14, 'f2 bi-turbo v2', 'soyons chauvins et commen&ccedil;ons par une des marques les plus prestigieuses du monde, bugatti. en effet, si ettore bugatti &eacute;tait italien, c&rsquo;est bien en france, &agrave; molsheim, que volkswagen a fait rena&icirc;tre le mythique blason.', 'F2.jpeg'),
(15, 'f3 turbo v2', 'soyons chauvins et commen&ccedil;ons par une des marques les plus prestigieuses du monde, bugatti. en effet, si ettore bugatti &eacute;tait italien, c&rsquo;est bien en france, &agrave; molsheim, que volkswagen a fait rena&icirc;tre le mythique blason.', 'F3.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `T_Customer`
--

CREATE TABLE `T_Customer` (
  `id` int(11) NOT NULL,
  `NomComplet` varchar(45) NOT NULL,
  `Numero` varchar(100) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Genre` tinyint(1) NOT NULL DEFAULT '1',
  `Adresse` varchar(255) NOT NULL,
  `Etat` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CodePostal` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `isSubscribed` int(2) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_Customer`
--

INSERT INTO `T_Customer` (`id`, `NomComplet`, `Numero`, `Email`, `Genre`, `Adresse`, `Etat`, `Ville`, `CodePostal`, `mot_de_passe`, `isSubscribed`, `image`, `isAdmin`) VALUES
(2, 'sara plehon espoir jean philippe', '002250555412087', 'jeanphilippesara225@gmail.com', 1, 'ivory coast', 'rue d102', 'abidjan', '00225', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'Capture d’écran 2023-05-02 à 23.16.03.png', 1),
(3, 'sara jp', '012345678', 'jeanphilippesara@icloud.com', 1, 'c&ocirc;te d&#039;ivoire', 'rue d102', 'abidjan', '00225', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'GBPUSD_2021-11-03_09-27-28.png', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Articles_Items`
--
ALTER TABLE `Articles_Items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Subscribe_Nl`
--
ALTER TABLE `Subscribe_Nl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueEmail` (`email`);

--
-- Index pour la table `T_Categorie`
--
ALTER TABLE `T_Categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `T_Customer`
--
ALTER TABLE `T_Customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Articles_Items`
--
ALTER TABLE `Articles_Items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Subscribe_Nl`
--
ALTER TABLE `Subscribe_Nl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `T_Categorie`
--
ALTER TABLE `T_Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `T_Customer`
--
ALTER TABLE `T_Customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
