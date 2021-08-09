-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 août 2021 à 16:03
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
  `chapo` text NOT NULL,
  `text` longtext NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_change` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `chapo`, `text`, `date_creation`, `date_change`, `user_id`) VALUES
(1, 'Pourquoi apprendre PHP', 'PHP est le langage de programmation web le plus utilisé au monde. 80% des site internet utilisent PHP.\r\n\r\nPourtant, on entends beaucoup sur internet que PHP est un langage de programmation simplement mauvais. J’ai d’ailleurs écris un article sur le sujet si vous voulez plus de détails', 'PHP est le langage de programmation web le plus utilisé au monde. 80% des site internet utilisent PHP.\r\n\r\nPourtant, on entends beaucoup sur internet que PHP est un langage de programmation simplement mauvais. J’ai d’ailleurs écris un article sur le sujet si vous voulez plus de détails\r\n\r\nPour la faire courte, non PHP n’est pas un langage de programmation mauvais. Il as des défauts comme tout les autres langages. Les critiques de PHP proviennent souvent des anciennes versions qui pour le coup étaient extrêmement mal foutues.\r\n\r\nAujourd’hui, PHP est partout. Il n’y à qu’à voir WordPress, le CMS le plus utilisé sur le web. Il dépends intégralement de PHP et des millions de site web utilisent ce CMS quotidiennement.\r\n\r\nPHP as beaucoup d’avantages. C’est un langage simple à apprendre, il est rapide à utiliser et globalement efficace. Nous allons voir ensemble les différentes raisons d’apprendre PHP , surtout si c’est votre premier langage de programmation backend.', '2021-07-20 10:27:15', NULL, 2),
(2, '7 Techniques pour devenir un meilleur développeur', 'Vous voulez devenir un meilleur programmeur ? Vous avez les bases mais vous voulez être parmi les meilleurs ? Dans cet article nous allons voir 7 techniques qui vont faire de vous un meilleur programmeur.\r\n', 'Vous voulez devenir un meilleur programmeur ? Vous avez les bases mais vous voulez être parmi les meilleurs ? Dans cet article nous allons voir 7 techniques qui vont faire de vous un meilleur programmeur.\r\n\r\nDevenir un meilleur programmeur est un objectif facilement identifiable, mais dans la réalité, c’est beaucoup plus complexe. Souvent, on cherche à s’améliorer mais on as pas vraiment de solution, on ne sais pas trop comment faire.\r\n\r\nDans cet article, je vais vous donner 7 techniques applicable dès aujourd’hui et qui vont vous permettre de devenir un meilleur développeur. Ce sont des techniques que j’applique tout les jours depuis que j’ai débuté la programmation ! ', '2021-07-20 10:27:15', NULL, 3),
(4, 'Quels langages de programmation apprendre ?', 'Aujourd’hui, la programmation est plus populaire que jamais. Savoir coder est une compétence extrêmement puissante, elle vous permettra de trouver un job, devenir freelance ou monter votre entreprise.', 'Aujourd’hui, la programmation est plus populaire que jamais. Savoir coder est une compétence extrêmement puissante, elle vous permettra de trouver un job, devenir freelance ou monter votre entreprise.\r\n\r\nTout les ans, de nouveaux langages de programmation émergent. D’autres meurent. Globalement, les programmeurs doivent apprendre des nouvelles technologies régulièrement.\r\n\r\nVoici donc ma liste des meilleurs langages de programmation à apprendre pour 2020.\r\n\r\nVous vous demandez peut-être pourquoi vous devriez faire confiance à un type comme moi ? Et bien, je maîtrise 12 langages de programmation à un niveau suffisamment élevé pour faire du développement à niveau pro.\r\n\r\nIl existe des centaines de langages de programmation différents. Il est extrêmement difficile de choisir lesquels apprendre. J’espère que cet article vous aidera à y voir plus clair.', '2021-07-20 10:28:54', NULL, 4),
(6, 'Comment améliorer son code ?', 'Votre code n’es pas terrible ? Vous avez envie de vous frapper quand vous le lisez ? Croyez moi, tout les développeurs ont connu ça…\r\n\r\nDans cet article, je vais vous apprendre à améliorer votre code. En anglais, on dis “refractoring”.', 'Votre code n’es pas terrible ? Vous avez envie de vous frapper quand vous le lisez ? Croyez moi, tout les développeurs ont connu ça…\r\n\r\nDans cet article, je vais vous apprendre à améliorer votre code. En anglais, on dis “refractoring”.\r\n\r\nVoici donc quelques principes à suivre afin d’avoir un code plus lisible, de meilleur qualité et qui ne vous donnera pas envie de vous taper la tête contre les murs.\r\n\r\nJe vais vous donner rapidement une définition de la réécriture du code que j’aime bien :', '2021-07-20 10:30:44', NULL, 2),
(7, 'Comment devenir un développeur backend ?', 'Etes vous à la recherche d’une carrière dans le développement web backend ? Les entreprises recherchent des développeurs compétents pour créer le côté invisible des site web.', 'Etes vous à la recherche d’une carrière dans le développement web backend ? Les entreprises recherchent des développeurs compétents pour créer le côté invisible des site web.\r\n\r\nToutes les données des applications sont stockées et gérées dans le backend. Pour résumer, le backend c’est tout ce qui se passe derrière l’interface utilisateur, tout ce que l’utilisateur ne voit pas.\r\n\r\nCe domaine comprends la gestion des bases de données, la logique de l’application, les API etc…', '2021-07-20 10:32:51', NULL, 1),
(10, 'Comment programmer plus rapidement?', 'Vous avez la sensation d’être lent lorsque vous programmez ? Vous vous sentez frustrés après avoir programmé pendant plusieurs heures sans avoir obtenu de réels résultats ? Rassurez vous, c’est un problème que tout les développeurs ont rencontrés. Vous êtes bloqués et tout semble impossible.', 'Vous avez la sensation d’être lent lorsque vous programmez ? Vous vous sentez frustrés après avoir programmé pendant plusieurs heures sans avoir obtenu de réels résultats ? Rassurez vous, c’est un problème que tout les développeurs ont rencontrés. Vous êtes bloqués et tout semble impossible.\r\n\r\nJ’ai moi même ressenti ça plusieurs fois, particulièrement à mes débuts. Dans cet article, je vais essayer de vous aider à résoudre ces soucis.', '2021-08-02 12:28:20', NULL, 4),
(11, 'Comment devenir un développeur backend ?', 'Etes vous à la recherche d’une carrière dans le développement web backend ? Les entreprises recherchent des développeurs compétents pour créer le côté invisible des site web.', 'Etes vous à la recherche d’une carrière dans le développement web backend ? Les entreprises recherchent des développeurs compétents pour créer le côté invisible des site web.\r\n\r\nToutes les données des applications sont stockées et gérées dans le backend. Pour résumer, le backend c’est tout ce qui se passe derrière l’interface utilisateur, tout ce que l’utilisateur ne voit pas.\r\n\r\nCe domaine comprends la gestion des bases de données, la logique de l’application, les API etc…', '2021-07-20 10:32:51', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text_comment` longtext NOT NULL,
  `date_comment` datetime NOT NULL,
  `valid` tinyint(4) DEFAULT 0,
  `article_id` int(11) DEFAULT NULL,
  `user_profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `text_comment`, `date_comment`, `valid`, `article_id`, `user_profile_id`) VALUES
(1, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:34:22', 0, 4, 4),
(6, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-07-20 10:35:27', 0, 1, 1),
(8, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-08-04 15:34:53', 0, 1, 2),
(9, 'Integer interdum ultrices nibh quis tincidunt. Suspendisse potenti. In bibendum mi ante, quis porttitor quam tempus at. Ut fermentum ante imperdiet sagittis sodales. Pellentesque quis euismod nisl. Duis consequat vitae nisl vel ornare. Aliquam ultrices convallis ante, quis fermentum dolor vulputate blandit. Nunc commodo sapien ac laoreet auctor.', '2021-08-04 15:35:28', 0, 10, 3);

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
(4, 'Marcel', 'marc@gmail.com', '$2y$12$KZlFnUGbqY7CNj8o4kcP0.HfB28LEXrsWqFwDjFsqcKmnBT5V0fp6 ', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
