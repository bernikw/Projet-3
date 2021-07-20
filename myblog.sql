-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juil. 2021 à 10:38
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `text` longtext NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `text`, `date`, `user_id`) VALUES
(1, 'My new article', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:27:15', 2),
(2, 'Very interesting', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:27:15', 3),
(3, 'Good news', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:28:53', 5),
(4, 'Interesting ideas', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:28:54', 4),
(5, 'Great place to work', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:30:44', NULL),
(6, 'Holyday season', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:30:44', 2),
(7, 'My live', 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:32:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text_comment` longtext NOT NULL,
  `date_comment` datetime NOT NULL,
  `valid` varchar(50) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `users_profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `text_comment`, `date_comment`, `valid`, `article_id`, `users_profile_id`) VALUES
(1, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:34:22', '', 4, 4),
(3, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:34:53', '', 7, 5),
(5, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:35:27', '', 6, 5),
(6, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:35:27', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Berni', 'berni@yahoo.fr', '$2y$12$K2Xn52G2QyZpuFX0P61yt.ldWF133Gg4M.8ZFEFqReSCISBRTae16 ', 'Admin'),
(2, 'Ernest', 'erni@gmail.com', '$2y$12$mYL/EVFtXfm2KcTEvXmG4ehsN5hI83SoleCiPFcdwdtUiob9/.ZJe ', NULL),
(3, 'Ola', 'ola@yahoo.fr', '$2y$12$HXDsFVZdwuq3JZaIM9oT7u5bvMPuUmAU56rIoz0SEoGxqv4/zIuhK ', 'Admin'),
(4, 'Marcel', 'marc@gmail.com', '$2y$12$KZlFnUGbqY7CNj8o4kcP0.HfB28LEXrsWqFwDjFsqcKmnBT5V0fp6 ', NULL),
(5, 'Ewa', 'ewa@live.fr', '$2y$12$5S.yxQn6HGycEwr0LP5Poec8YyVr4ABxwv7I2ecmigSoOhjjuIKuq ', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_user1_idx` (`user_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_article_idx` (`article_id`),
  ADD KEY `fk_comment_users_profile1_idx` (`users_profile_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_users_profile1` FOREIGN KEY (`users_profile_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
