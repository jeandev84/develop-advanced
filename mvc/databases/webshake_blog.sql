-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 28 Novembre 2019 à 11:30
-- Version du serveur :  10.3.19-MariaDB-1:10.3.19+maria~bionic
-- Version de PHP :  7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webshake_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-23 01:41:07'),
(2, 1, 'Пост о жизни', 'Сидел я тут на кухне с друганом и тут он задал такой вопрос...', '2019-11-24 05:41:07'),
(3, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 17:41:28'),
(4, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 17:42:59'),
(5, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:01:55'),
(6, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:02:41'),
(7, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:05:02'),
(8, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:10:20'),
(9, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:10:25'),
(10, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:10:25'),
(11, 1, 'Новое название статьи', 'Новый текст статьи', '2019-11-25 18:10:26'),
(12, 11, 'Статья, добавленная через форму! updated', '<b>Вот это да!updated</b>', '2019-11-26 19:16:49');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', 'hash1', 'token1', '2019-11-23 01:36:49'),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2019-11-23 01:36:49'),
(11, 'jeanyao84', 'jeanyao@ymail.com', 1, 'user', '$2y$10$GNWRfsDp7hBZdRQT28m/KO37kgK8JMHYagrHMqRGIvrGJ13X1KGJW', '07a09b502629028a9614cc960ca3e980a97381e1c9e71568e615d80aeacab609d0f3a0382da5295e', '2019-11-26 11:21:03');

-- --------------------------------------------------------

--
-- Structure de la table `users_activation_codes`
--

CREATE TABLE `users_activation_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_activation_codes`
--

INSERT INTO `users_activation_codes` (`id`, `user_id`, `code`) VALUES
(1, 6, '6bd1f0faa44c0e2ff96d34bdc04f734f'),
(2, 7, 'eeb86844f572bff07af4b66b263fe49b'),
(3, 8, 'ef4c7f4220c87c6e3751600a442433b0'),
(4, 9, 'c5f95a302957f9905d2ff2319ff5d16d'),
(5, 10, '8c385c0b7522e51831cc979d5e0ef23b'),
(6, 11, 'b42efdb33b75f8515a1d36d07c2e7bec');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
