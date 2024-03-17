-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 jan. 2024 à 09:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bgsb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cake_d_c_users_phinxlog`
--

CREATE TABLE `cake_d_c_users_phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cake_d_c_users_phinxlog`
--

INSERT INTO `cake_d_c_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150513201111, 'Initial', '2023-10-12 11:02:55', '2023-10-12 11:02:55', 0),
(20161031101316, 'AddSecretToUsers', '2023-10-12 11:02:55', '2023-10-12 11:02:55', 0),
(20190208174112, 'AddAdditionalDataToUsers', '2023-10-12 11:02:55', '2023-10-12 11:02:55', 0),
(20210929202041, 'AddLastLoginToUsers', '2023-10-12 11:02:55', '2023-10-12 11:02:55', 0);

-- --------------------------------------------------------

--
-- Structure de la table `outpackages`
--

CREATE TABLE `outpackages` (
  `id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `outpackages`
--

INSERT INTO `outpackages` (`id`, `date`, `price`, `title`, `body`) VALUES
(1, '2023-11-23 15:03:47', 10, '1234', '1234'),
(2, '2023-11-23 15:04:11', 20, 'ok', 'ok'),
(5, '2023-12-07 09:29:46', 10, 'tt', ''),
(6, '2023-12-07 09:29:46', 10, 'tt', ''),
(7, '2023-12-07 09:29:46', 10, 'tt', 'fff'),
(8, '2023-12-08 09:50:32', 51, 'vv', 'dzad'),
(9, '2023-12-08 09:52:57', 46, 'kpk', 'dtd\r\n\r\n'),
(10, '2023-12-08 09:52:57', 46, 'kpk', 'dtd\r\n\r\n'),
(11, '2023-12-08 09:52:57', 46, 'kpk', 'dtd\r\n\r\n'),
(12, '2023-12-08 09:52:57', 46, 'kpk', 'dtd\r\n\r\n'),
(13, '2023-12-08 09:52:57', 46, 'kpk', 'dtd\r\n\r\n'),
(14, '2023-12-08 10:05:26', 15, '54', '454'),
(15, '2023-12-08 10:05:26', 15, '54', '454'),
(16, '2023-12-08 10:05:26', 15, '54', '454');

-- --------------------------------------------------------

--
-- Structure de la table `packages`
--

CREATE TABLE `packages` (
  `id` int NOT NULL,
  `price` float NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `packages`
--

INSERT INTO `packages` (`id`, `price`, `title`, `body`) VALUES
(1, 50, 'hotel', 'belle hotel '),
(2, 45, 'Taxi', 'vroum vroum'),
(4, 200, 'salle', 'salle travail'),
(5, 50, 'voiture', 'belle voiture'),
(6, 20, 'ca va', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `sheets`
--

CREATE TABLE `sheets` (
  `id` int NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state_id` int NOT NULL,
  `sheetvalidated` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sheets`
--

INSERT INTO `sheets` (`id`, `user_id`, `state_id`, `sheetvalidated`, `created`, `modified`) VALUES
(1, 'c6efe970-b34c-4530-b1e9-f10195e695bc', 1, 0, '2023-11-23 15:01:03', '2023-11-25 16:16:21'),
(5, 'c6efe970-b34c-4530-b1e9-f10195e695bc', 1, 0, '2023-11-25 16:17:21', '2023-11-25 16:17:21'),
(6, 'c6efe970-b34c-4530-b1e9-f10195e695bc', 1, 0, '2023-11-25 16:18:50', '2023-11-25 16:18:50'),
(7, '190f7c11-3651-43ce-8a4c-d13b91debfaf', 1, 1, '2023-12-07 09:45:26', '2023-12-07 09:45:26'),
(8, '190f7c11-3651-43ce-8a4c-d13b91debfaf', 1, 0, '2023-12-07 09:46:27', '2023-12-07 09:46:27'),
(9, 'c6efe970-b34c-4530-b1e9-f10195e695bc', 1, 0, '2023-12-07 14:51:44', '2023-12-07 14:51:44'),
(10, NULL, 1, 0, '2023-12-07 15:55:55', '2023-12-07 16:14:00'),
(11, 'c6efe970-b34c-4530-b1e9-f10195e695bc', 1, 0, '2023-12-08 09:46:44', '2023-12-08 09:46:44'),
(12, 'c6efe970-b34c-4530-b1e9-f10195e695bc', 1, 1, '2023-12-14 10:22:56', '2023-12-14 10:22:56');

-- --------------------------------------------------------

--
-- Structure de la table `sheets_outpackages`
--

CREATE TABLE `sheets_outpackages` (
  `outpackage_id` int NOT NULL,
  `sheet_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sheets_outpackages`
--

INSERT INTO `sheets_outpackages` (`outpackage_id`, `sheet_id`) VALUES
(1, 1),
(2, 1),
(5, 6),
(6, 6),
(7, 6),
(8, 11),
(9, 11),
(10, 11),
(11, 11),
(12, 11),
(13, 11),
(14, 11),
(15, 11),
(16, 11);

-- --------------------------------------------------------

--
-- Structure de la table `sheets_packages`
--

CREATE TABLE `sheets_packages` (
  `sheet_id` int NOT NULL,
  `package_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sheets_packages`
--

INSERT INTO `sheets_packages` (`sheet_id`, `package_id`, `quantity`) VALUES
(1, 1, 2),
(1, 2, 1),
(1, 4, 1),
(1, 5, 1),
(7, 1, 0),
(7, 2, 0),
(7, 4, 0),
(8, 1, 0),
(8, 2, 0),
(8, 4, 0),
(9, 1, 0),
(9, 2, 0),
(9, 4, 0),
(10, 1, 0),
(10, 2, 0),
(10, 4, 0),
(11, 1, 0),
(11, 2, 0),
(11, 4, 0),
(12, 1, 0),
(12, 2, 0),
(12, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token_secret` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

CREATE TABLE `states` (
  `id` int NOT NULL,
  `state` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`id`, `state`) VALUES
(1, 'Créer'),
(2, 'Cloturer');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`, `additional_data`, `last_login`) VALUES
('05caf121-c4b4-4a1a-85c7-42e554862061', 'moo', 'fff@gmail.com', '$2y$10$g9LzjHtOl7Iqph6SUfdXU.txxnvKLLaJD7J4HbMLVaZ4oiooNXHpS', 'lp', 'lm', '05f0d88f1fcea1153120f2c8876028d5', '2023-12-14 14:50:36', NULL, NULL, NULL, NULL, '2023-12-14 13:50:36', 0, 0, 'user', '2023-12-14 13:50:36', '2023-12-14 13:50:36', NULL, NULL),
('190f7c11-3651-43ce-8a4c-d13b91debfaf', 'karim', 'fadlikarim023@hotmail.com', '$2y$10$3Ry6JqUnkhCpPtxFPI2sl.zId69KP7gqQCk62DsBj64FtDcSB4M/m', 'Karim', 'Fadli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2023-11-17 08:25:26', '2023-11-17 08:25:26', NULL, NULL),
('659c4318-b359-4baf-a955-748a02d9a725', 'Thib', 'thib@gmail.com', '$2y$10$HST05CEDwqKNnNFvQurI/u0HPK0SAmA/EAtEDbEQXHpJqjXAeqbBa', 'Thibault', 'Forestier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2023-11-17 08:26:03', '2023-11-17 08:26:03', NULL, NULL),
('8cc4e765-e28c-4092-9b3d-cc41e200af49', 'bile', 'fadddd@gmail.com', '$2y$10$y1GEQlSuOOJYtQ51gQJTSeZIpv1ALJRGGxtKbNE5752sGiDDhzUh2', 'loo', 'bill', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'user', '2023-12-14 13:48:45', '2023-12-14 13:48:45', NULL, NULL),
('b6334b12-6995-11ee-9516-c48e8ff89586', 'users', 'users@gsv.com', 'usersaccount123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'user', '2023-10-13 08:55:30', '2023-10-13 08:55:30', NULL, NULL),
('c6efe970-b34c-4530-b1e9-f10195e695bc', 'superadmin', 'superadmin@example.com', '$2y$10$7b4cFPT5.iNimcHmL/gOk.x6ipVw5qv5GNMLrTtF58ky8ZV7khpFm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'superuser', '2023-11-09 10:30:57', '2023-11-09 10:30:57', NULL, '2024-01-09 10:44:35'),
('f50f3587-8e79-4c47-974b-8f4a402ff638', 'bibi', 'bibi@gmail.com', '$2y$10$OfTJDj9RM5w3LOH3gb6Va.ufDKEC0Y9q22b48q24HST8scuZ5T4tS', 'bibi', 'bili', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'comptable', '2023-12-07 14:29:25', '2023-12-07 14:29:25', NULL, '2024-01-09 10:34:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cake_d_c_users_phinxlog`
--
ALTER TABLE `cake_d_c_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `outpackages`
--
ALTER TABLE `outpackages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sheets`
--
ALTER TABLE `sheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `sheets_outpackages`
--
ALTER TABLE `sheets_outpackages`
  ADD PRIMARY KEY (`outpackage_id`,`sheet_id`),
  ADD KEY `sheet_id` (`sheet_id`);

--
-- Index pour la table `sheets_packages`
--
ALTER TABLE `sheets_packages`
  ADD PRIMARY KEY (`sheet_id`,`package_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Index pour la table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `outpackages`
--
ALTER TABLE `outpackages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sheets`
--
ALTER TABLE `sheets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sheets`
--
ALTER TABLE `sheets`
  ADD CONSTRAINT `sheets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sheets_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Contraintes pour la table `sheets_outpackages`
--
ALTER TABLE `sheets_outpackages`
  ADD CONSTRAINT `sheets_outpackages_ibfk_1` FOREIGN KEY (`sheet_id`) REFERENCES `sheets` (`id`),
  ADD CONSTRAINT `sheets_outpackages_ibfk_2` FOREIGN KEY (`outpackage_id`) REFERENCES `outpackages` (`id`);

--
-- Contraintes pour la table `sheets_packages`
--
ALTER TABLE `sheets_packages`
  ADD CONSTRAINT `sheets_packages_ibfk_1` FOREIGN KEY (`sheet_id`) REFERENCES `sheets` (`id`),
  ADD CONSTRAINT `sheets_packages_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
