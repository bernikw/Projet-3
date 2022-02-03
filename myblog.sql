-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 fév. 2022 à 18:57
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

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
  `chapo` text NOT NULL,
  `content` longtext NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `chapo`, `content`, `date_creation`, `date_update`, `user_id`) VALUES
(1, 'Pourquoi apprendre PHP', 'PHP est le langage de programmation web le plus utilisé au monde. 80% des site internet utilisent PHP.\r\n\r\nPourtant, on entends beaucoup sur internet que PHP est un langage de programmation simplement mauvais. J’ai d’ailleurs écris un article sur le sujet si vous voulez plus de détails!', 'Pour la faire courte, non PHP n’est pas un langage de programmation mauvais. Il as des défauts comme tout les autres langages. Les critiques de PHP proviennent souvent des anciennes versions qui pour le coup étaient extrêmement mal foutues.\r\n\r\nAujourd’hui, PHP est partout. Il n’y à qu’à voir WordPress, le CMS le plus utilisé sur le web. Il dépends intégralement de PHP et des millions de site web utilisent ce CMS quotidiennement.\r\n\r\nPHP as beaucoup d’avantages. C’est un langage simple à apprendre, il est rapide à utiliser et globalement efficace. Nous allons voir ensemble les différentes raisons d’apprendre PHP , surtout si c’est votre premier langage de programmation backend.', '2021-07-20 10:27:15', NULL, 2),
(2, '7 Techniques pour devenir un meilleur développeur', 'Vous voulez devenir un meilleur programmeur ? Vous avez les bases mais vous voulez être parmi les meilleurs ? Dans cet article nous allons voir 7 techniques qui vont faire de vous un meilleur programmeur.\r\n', 'Devenir un meilleur programmeur est un objectif facilement identifiable, mais dans la réalité, c’est beaucoup plus complexe. Souvent, on cherche à s’améliorer mais on as pas vraiment de solution, on ne sais pas trop comment faire.\r\n\r\nDans cet article, je vais vous donner 7 techniques applicable dès aujourd’hui et qui vont vous permettre de devenir un meilleur développeur. Ce sont des techniques que j’applique tout les jours depuis que j’ai débuté la programmation ! ', '2021-07-20 10:27:15', '2021-08-13 12:10:14', 3),
(4, 'Quels langages de programmation apprendre ?', 'Aujourd’hui, la programmation est plus populaire que jamais. Savoir coder est une compétence extrêmement puissante, elle vous permettra de trouver un job, devenir freelance ou monter votre entreprise.', 'Tout les ans, de nouveaux langages de programmation émergent. D’autres meurent. Globalement, les programmeurs doivent apprendre des nouvelles technologies régulièrement.\r\n\r\nVoici donc ma liste des meilleurs langages de programmation à apprendre pour 2020.\r\n\r\nVous vous demandez peut-être pourquoi vous devriez faire confiance à un type comme moi ? Et bien, je maîtrise 12 langages de programmation à un niveau suffisamment élevé pour faire du développement à niveau pro.\r\n\r\nIl existe des centaines de langages de programmation différents. Il est extrêmement difficile de choisir lesquels apprendre. J’espère que cet article vous aidera à y voir plus clair.', '2021-07-20 10:28:54', NULL, 4),
(6, 'Comment améliorer son code ?', 'Votre code n’es pas terrible ? Vous avez envie de vous frapper quand vous le lisez ? Croyez moi, tout les développeurs ont connu ça…\r\n\r\n', 'Dans cet article, je vais vous apprendre à améliorer votre code. En anglais, on dis “refractoring”.\r\n\r\nVoici donc quelques principes à suivre afin d’avoir un code plus lisible, de meilleur qualité et qui ne vous donnera pas envie de vous taper la tête contre les murs.\r\n\r\nJe vais vous donner rapidement une définition de la réécriture du code que j’aime bien :', '2021-07-20 10:30:44', '2021-08-13 12:11:40', 2),
(7, 'Comment devenir un développeur backend ?', 'Etes vous à la recherche d’une carrière dans le développement web backend ? Les entreprises recherchent des développeurs compétents pour créer le côté invisible des site web.', 'Toutes les données des applications sont stockées et gérées dans le backend. Pour résumer, le backend c’est tout ce qui se passe derrière l’interface utilisateur, tout ce que l’utilisateur ne voit pas.\r\n\r\nCe domaine comprends la gestion des bases de données, la logique de l’application, les API etc…', '2021-07-20 10:32:51', '2021-08-10 12:12:19', 1),
(10, 'Comment programmer plus rapidement?', 'Vous avez la sensation d’être lent lorsque vous programmez ? Vous vous sentez frustrés après avoir programmé pendant plusieurs heures sans avoir obtenu de réels résultats ? ', 'Rassurez vous, c’est un problème que tout les développeurs ont rencontrés. Vous êtes bloqués et tout semble impossible.\r\n\r\nJ’ai moi même ressenti ça plusieurs fois, particulièrement à mes débuts. Dans cet article, je vais essayer de vous aider à résoudre ces soucis.', '2021-08-02 12:28:20', NULL, 4),
(11, 'Comment devenir un développeur backend ?', 'Etes vous à la recherche d’une carrière dans le développement web backend ? Les entreprises recherchent des développeurs compétents pour créer le côté invisible des site web.', 'Toutes les données des applications sont stockées et gérées dans le backend. Pour résumer, le backend c’est tout ce qui se passe derrière l’interface utilisateur, tout ce que l’utilisateur ne voit pas.\r\n\r\nCe domaine comprends la gestion des bases de données, la logique de l’application, les API etc…', '2021-07-20 10:32:51', NULL, 1),
(27, 'Article numero 6', 'Apercu', 'modifie article connu', '2022-02-03 10:58:18', '2022-02-03 15:06:51', 13),
(29, 'gdsgdsg', 'gdsgds', 'gdsd', '2022-01-20 20:36:41', '2022-01-20 20:36:41', 26),
(30, 'On change ', 'l\'article change', 'fdsfds', '2022-02-01 14:46:32', '2022-02-03 11:05:48', 22),
(31, 'New article 7', 'chapo new', 'content new', '2022-02-03 10:57:15', '2022-02-03 15:14:48', 22),
(32, 'New article', 'new article', 'new article', '2022-02-03 09:51:19', '2022-02-03 09:51:19', 22),
(33, 'bdsds', 'fdsdfs', 'fdsdsd', '2022-02-03 10:12:47', '2022-02-03 10:12:47', 22),
(34, 'bernik ', 'je n\'i pas le temps', 'le contenu est correct ', '2022-02-03 10:13:22', '2022-02-03 10:13:22', 22),
(35, 'sdsds    ddddddddf', 'fdsdsdfds', 'fddf', '2022-02-03 10:36:54', '2022-02-03 10:36:54', 22);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text_comment` longtext NOT NULL,
  `date_comment` datetime NOT NULL,
  `valid` tinyint(1) DEFAULT 0,
  `article_id` int(11) DEFAULT NULL,
  `user_profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `text_comment`, `date_comment`, `valid`, `article_id`, `user_profile_id`) VALUES
(1, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:34:22', 1, 4, 4),
(6, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:35:27', 1, 1, 1),
(8, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-08-04 15:34:53', 1, 1, 2),
(9, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-08-04 15:35:28', 1, 10, 3),
(10, 'WordPress est un système de gestion de contenu (SGC ou content management system (CMS) en anglais) gratuit, libre et open-source. Ce logiciel écrit en PHP repose sur une base de données MySQL et est distribué…', '2021-08-13 14:27:35', 1, 1, 4),
(11, 'sqsdsdq', '2022-01-04 11:11:32', 1, 2, 2),
(14, 'gsgsfgsd', '2022-01-14 16:14:36', 1, 4, 23),
(15, 'xvcxvcx', '2022-01-16 18:47:00', 0, NULL, 12),
(18, 'dsdsdsdsd', '2022-01-25 13:53:41', 1, 7, 24);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Berni', 'berni@yahoo.fr', '$2y$12$K2Xn52G2QyZpuFX0P61yt.ldWF133Gg4M.8ZFEFqReSCISBRTae16 ', 'ADMIN'),
(2, 'Ernest', 'erni@gmail.com', '$2y$12$mYL/EVFtXfm2KcTEvXmG4ehsN5hI83SoleCiPFcdwdtUiob9/.ZJe ', 'MEMBER'),
(3, 'Ola', 'ola@yahoo.fr', '$2y$12$HXDsFVZdwuq3JZaIM9oT7u5bvMPuUmAU56rIoz0SEoGxqv4/zIuhK ', 'ADMIN'),
(4, 'Marcel', 'marc@gmail.com', '$2y$12$KZlFnUGbqY7CNj8o4kcP0.HfB28LEXrsWqFwDjFsqcKmnBT5V0fp6 ', 'ADMIN'),
(11, 'Kot', 'kot@yahoo.fr', '$2a$12$FfofOqIK8Lm9mWgkMrYjJOaBD2OxFQI84We4Ku.0VcRJVn5C4KOgK', 'MEMBER'),
(12, 'Yagna', 'yagna@yahoo.fr', '$2y$10$5f7IVLkfCt/xbMxjG0X5l.dwR2vZu2w1auj8dS8ytS0vZPM0lTWCy', 'MEMBER'),
(13, 'Pierre', 'pierre@gmail.com', '$2y$10$YuSQzX2ppUPQoA0u94lP2eZ9EvkjIYw0qetbUm4xPQkCyp7taugh.', 'MEMBER'),
(14, 'Jean-Pierre', 'jean@gmail.com', '$2y$10$JnEnD5dTDSp4F5YgC66xxeSUW8YuvPTYFVeggYlPN9hFY88a0GMiG', 'ADMIN'),
(16, 'Bernadette', 'berne@yahoo.fr', '$2y$10$HZ4dRhaBFneIjjyGxG/2ZuQQJYs9FNqRJHEyojIpzUcW.A5KIEY8u', 'MEMBER'),
(17, 'Élodie', 'elodie@gmail.com', '$2y$10$QlAqTMjwEo.x5Re7QOIxWekON8CS73E0nJ75DGEXscqGgnEDxceB2', 'MEMBER'),
(20, 'Jan', 'toto@gmail.com', '$2y$10$rvP08taF508bttFfxl8miOH85EYQaMqwE5HmStzTgNnS1QZThL4I.', 'MEMBER'),
(22, 'Gloria', 'gloria@gmail.com', '$2y$10$vrYsJbizta8siHjzv87WR.1.zH42nl.tNfLSlpNvgfsol90EUAyRK', 'ADMIN'),
(23, 'Sonia', 'sonia@gmail.com', '$2y$10$/pHYSy3PSU7MyYQ4DXtv1.dyQ8wMw9UkDR.dpXGVP0ayjUw2dyT1q', 'MEMBER'),
(24, 'Victoria', 'victoria@gmail.com', '$2y$10$g/FMScUCQH3B7XAWE1P7heCkIKtz3cMJTsxap9JEONI2/bK0fK5Tu', 'MEMBER'),
(26, 'Kordian', 'kordian@yahoo.fr', '$2y$10$.yWfD/NAR4ckyTkY4CwPP.qYbuSe1Jbo35C05M9ulm8ekuquymjw.', 'ADMIN'),
(27, 'Janek', 'janek@gmail.com', '$2y$10$0VjDL8geEHUm/ZrhwPWM0OfedJWNSxy4XqUmnrvLpRwsPZVivUwW6', 'MEMBER'),
(28, 'Jurek', 'jurek@gmail.com', '$2y$10$BCTSp1ORQUa0Ohp3dGsmIeuB2IenDT5w7S516.xugd7ddVG8NHu8C', 'MEMBER'),
(30, 'Jarek', 'jarek@gmail.com', '$2y$10$vBGTBR3aNkybNP8Yf1.tWuT6eObM3nbN2ulDMFS0MD69LMlmlNLs2', 'ADMIN');

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
  ADD KEY `fk_comment_users_profile1_idx` (`user_profile_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_users_profile1` FOREIGN KEY (`user_profile_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
