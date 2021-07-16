-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 juil. 2021 à 20:05
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
(1, 'My new article', 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:48:25', 1),
(2, 'Interesting article', 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:48:25', 5),
(3, 'The important news', 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:51:01', 2),
(4, 'Message for you ', 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:51:01', 6),
(5, 'You can ', 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:52:46', NULL),
(6, 'Very important', 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:52:47', 2);

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
(2, 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:54:37', '', 2, 2),
(3, 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:58:20', '', 6, 2),
(4, 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:58:20', '', 5, 1),
(5, 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:58:57', '', 6, 3),
(6, 'Cras mattis porta neque, eget tincidunt lorem dictum ac. Integer mollis augue in laoreet convallis. Nam vehicula libero lectus. Donec tempor urna vel odio elementum tristique. Ut non urna dolor. Etiam nec sapien velit. Aliquam bibendum mollis risus. Fusce condimentum magna at lectus sodales, sit amet cursus lorem ultricies. In hac habitasse platea dictumst.', '2021-07-16 19:58:57', '', 1, 6);

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
(1, 'Berni', 'berni@yahoo.fr', '$2y$12$4QEP8l/0QwawGQ52XE5NFO/ntzbdj2rqUozbbJUZkXX92cnuDdLY. ', 'Admin'),
(2, 'Ola', 'ola@gmail.com', '$2y$12$24vw8c7T22x6qCvBut6aZu.e/3lNhEzbZCkd.AiF2jx0l/.uhCYiW ', 'Admin'),
(3, 'Sasha', 'sah@gmail.com', '$2y$12$u4GeSY0bo/e1Vt6lQQp5iOvEZgK8zsjhTrLisCcUuLsinoxPHjwiu ', NULL),
(5, 'Ernest', 'erni@live.fr', '$2y$12$g.kI4RKF80fkMVIrhevce.2D7UcSCFJhZcdGrOUiKgfpitXQA6KuC ', 'Admin'),
(6, 'Anna', 'ania@gmail.com', '$2y$12$r502RxtmnptgQNfLOrHAROZ2HTit9iM1/mnBshsC63O3nhKsx05pK ', NULL);

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
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `fk_comment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_users_profile1` FOREIGN KEY (`users_profile_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
