-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 sep. 2023 à 20:59
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database_vidmizer`
--

-- --------------------------------------------------------

--
-- Structure de la table `folder`
--

DROP TABLE IF EXISTS `folder`;
CREATE TABLE IF NOT EXISTS `folder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `depth` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `folder`
--

INSERT INTO `folder` (`id`, `name`, `depth`) VALUES
(177, 'Youtube', 4),
(179, 'Twitch', 1),
(180, 'TF1', 4),
(302, 'Meta', 1),
(315, 'Samsung', 2),
(434, 'DIGITAL-selected', 13),
(435, 'MEDIASQUARE', 2),
(436, 'Digital selected', 1),
(437, 'Skippable', 2),
(440, 'Nouveau code - Wifi N°1', 14);

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `report`
--

INSERT INTO `report` (`id`, `name`) VALUES
(2, 'Report 1693839010'),
(3, 'Report 1693859409');

-- --------------------------------------------------------

--
-- Structure de la table `report_video`
--

DROP TABLE IF EXISTS `report_video`;
CREATE TABLE IF NOT EXISTS `report_video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `report_id` int NOT NULL,
  `video_id` int DEFAULT NULL,
  `views` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_56DBDD554BD2A4C0` (`report_id`),
  KEY `IDX_56DBDD5529C1004E` (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `report_video`
--

INSERT INTO `report_video` (`id`, `report_id`, `video_id`, `views`) VALUES
(1, 2, 5598, 2345),
(2, 2, 5599, 22435),
(3, 2, 5600, 2222),
(4, 3, 5600, 230),
(5, 3, 5614, 100),
(6, 3, 5615, 230);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emission_co2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5616 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `name`, `duration`, `size`, `quality`, `emission_co2`) VALUES
(5598, 'FACEBOOK_BOUYGUES_ULTYM_15s_VF_16-9_WEB', '15', '28501260', '1920x1080', '1.3590459823608'),
(5599, 'TF1_BOUYGUES_ULTYM_30s_VF_16-9_WEB', '30', '673030420', '1920x1080', '32.092591285706'),
(5600, 'SAMSUNG_BOUYGUES_ULTYM_30s_VF_16-9_WEB', '30', '57221234', '1920x1080', '2.7285210609436'),
(5601, 'YOUTUBE_BOUYGUES_ULTYM_15s_VF_16-9_WEB', '15', '321030996', '1920x1080', '15.307950782776'),
(5602, 'TF1_BOUYGUES_ULTYM_15s_VF_16-9_WEB', '15', '321030996', '1920x1080', '15.307950782776'),
(5603, 'TF1_BOUYGUES_ULTYM_30s_VF_16-9_WEB_NO_MS', '30', '656772468', '1920x1080', '31.317351722717'),
(5604, 'SAMSUNG_BOUYGUES_ULTYM_15s_VF_16-9_WEB', '15', '28501260', '1920x1080', '1.3590459823608'),
(5606, 'TF1_BOUYGUES_ULTYM_15s_VF_16-9_WEB_NO_MS', '15', '308018244', '1920x1080', '14.687454414368'),
(5607, 'YOUTUBE_BOUYGUES_ULTYM_30s_VF_16-9_WEB', '30', '673030420', '1920x1080', '32.092591285706'),
(5608, 'MEDIASQUARE_BOUYGUES_ULTYM_15s_VF_16-9_WEB', '15', '321030996', '1920x1080', '15.307950782776'),
(5609, 'MEDIASQUARE_BOUYGUES_ULTYM_30s_VF_16-9_WEB', '30', '673030420', '1920x1080', '32.092591285706'),
(5610, 'TWITCH_BOUYGUES_ULTYM_15s_VF_16-9_WEB', '15', '28501260', '1920x1080', '1.3590459823608'),
(5614, 'YOUTUBE_BOUYGUES_ULTYM_15s_VA_16-9_WEB_YOUTUBE', '15', '308351748', '1920x1080', '14.703357124329'),
(5615, 'YOUTUBE_BOUYGUES_ULTYM_30s_VA_16-9_WEB_YOUTUBE', '30', '660428036', '1920x1080', '31.491662788391');

-- --------------------------------------------------------

--
-- Structure de la table `video_encoder`
--

DROP TABLE IF EXISTS `video_encoder`;
CREATE TABLE IF NOT EXISTS `video_encoder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `video_id` int DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emission_co2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C7793D7D29C1004E` (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13832 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video_encoder`
--

INSERT INTO `video_encoder` (`id`, `video_id`, `size`, `quality`, `emission_co2`) VALUES
(13809, 5598, '6266565', '1920x1080', '0.29881310462952'),
(13810, 5600, '30084329', '1920x1080', '1.4345325946808'),
(13811, 5599, '8075684', '1920x1080', '0.38507862091064'),
(13812, 5601, '4033027', '1920x1080', '0.19230971336365'),
(13813, 5602, '4033027', '1920x1080', '0.19230971336365'),
(13814, 5604, '15182827', '1920x1080', '0.72397360801697'),
(13816, 5603, '6887018', '1920x1080', '0.32839860916138'),
(13817, 5606, '3341723', '1920x1080', '0.1593457698822'),
(13818, 5607, '6438362', '1920x1080', '0.3070050239563'),
(13819, 5608, '4032973', '1920x1080', '0.19230713844299'),
(13820, 5609, '8075684', '1920x1080', '0.38507862091064'),
(13821, 5610, '9653530', '1920x1080', '0.46031618118286'),
(13830, 5614, '3957479', '1920x1080', '0.18870730400085'),
(13831, 5615, '8102197', '1920x1080', '0.38634285926819');

-- --------------------------------------------------------

--
-- Structure de la table `video_folder`
--

DROP TABLE IF EXISTS `video_folder`;
CREATE TABLE IF NOT EXISTS `video_folder` (
  `folder_id` int NOT NULL,
  `video_id` int NOT NULL,
  PRIMARY KEY (`video_id`,`folder_id`),
  KEY `IDX_D4F5A90029C1004E` (`video_id`),
  KEY `IDX_D4F5A900162CB942` (`folder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video_folder`
--

INSERT INTO `video_folder` (`folder_id`, `video_id`) VALUES
(302, 5598),
(434, 5598),
(440, 5598),
(180, 5599),
(434, 5599),
(440, 5599),
(315, 5600),
(434, 5600),
(440, 5600),
(177, 5601),
(434, 5601),
(440, 5601),
(180, 5602),
(434, 5602),
(440, 5602),
(180, 5603),
(434, 5603),
(440, 5603),
(315, 5604),
(434, 5604),
(440, 5604),
(180, 5606),
(434, 5606),
(440, 5606),
(177, 5607),
(434, 5607),
(440, 5607),
(434, 5608),
(435, 5608),
(440, 5608),
(434, 5609),
(435, 5609),
(440, 5609),
(179, 5610),
(434, 5610),
(440, 5610),
(177, 5614),
(436, 5614),
(437, 5614),
(440, 5614),
(177, 5615),
(434, 5615),
(437, 5615),
(440, 5615);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `report_video`
--
ALTER TABLE `report_video`
  ADD CONSTRAINT `FK_56DBDD5529C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`),
  ADD CONSTRAINT `FK_56DBDD554BD2A4C0` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`);

--
-- Contraintes pour la table `video_encoder`
--
ALTER TABLE `video_encoder`
  ADD CONSTRAINT `FK_C7793D7D29C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`);

--
-- Contraintes pour la table `video_folder`
--
ALTER TABLE `video_folder`
  ADD CONSTRAINT `FK_D4F5A900162CB942` FOREIGN KEY (`folder_id`) REFERENCES `folder` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D4F5A90029C1004E` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
