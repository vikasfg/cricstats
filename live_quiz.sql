-- --------------------------------------------------------
-- Host:                         gcp-stage-digital.dbnewshub.com
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for live_quiz
CREATE DATABASE IF NOT EXISTS `live_quiz` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `live_quiz`;


-- Dumping structure for table live_quiz.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL DEFAULT '2',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table live_quiz.admin_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `name`, `email`, `mobile_no`, `gender`, `password`, `status_id`, `role_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Yadu Nandan', 'ynandan55@gmail.com', NULL, NULL, '$2y$10$iYFA2Q7bolORiJOo7y7xoecUXkaDsivvTPoPo9JZVIGD9aQEzcQxu', 1, 1, NULL, 'OTEYKmRwKVBd7DpZNDwAxbSkyfOHGh0BvbGlnjvHb6enmU5QcnOFniFly7sg', '2019-09-15 03:07:30', '2019-09-15 03:07:32');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;


-- Dumping structure for table live_quiz.extramilestone
CREATE TABLE IF NOT EXISTS `extramilestone` (
  `em_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `mid` int(11) NOT NULL COMMENT 'Milestone Id',
  `pm_id` int(11) NOT NULL COMMENT 'Paid Milestone Id',
  `no_of_users` int(11) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`em_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.extramilestone: ~10 rows (approximately)
/*!40000 ALTER TABLE `extramilestone` DISABLE KEYS */;
INSERT INTO `extramilestone` (`em_id`, `qs_id`, `mid`, `pm_id`, `no_of_users`, `amount`, `created_at`) VALUES
	(57, 20, 1, 1, 5, 20.00, '2019-09-18 17:00:00'),
	(58, 20, 2, 2, 20, 5.00, '2019-09-18 17:00:00'),
	(59, 20, 2, 2, 10, 10.00, '2019-09-18 17:00:00'),
	(60, 20, 3, 3, 10, 10.00, '2019-09-18 17:00:01'),
	(79, 23, 1, 13, 2, 250.00, '2019-09-19 13:52:02'),
	(80, 23, 2, 14, 1, 300.00, '2019-09-19 13:52:02'),
	(81, 23, 2, 14, 2, 400.00, '2019-09-19 13:52:02'),
	(82, 23, 3, 15, 10, 100.00, '2019-09-19 13:52:02'),
	(83, 23, 3, 15, 20, 50.00, '2019-09-19 13:52:02'),
	(84, 23, 3, 15, 25, 40.00, '2019-09-19 13:52:02');
/*!40000 ALTER TABLE `extramilestone` ENABLE KEYS */;


-- Dumping structure for table live_quiz.freemilestone
CREATE TABLE IF NOT EXISTS `freemilestone` (
  `fm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL COMMENT 'Milestone Id',
  `qs_id` bigint(20) NOT NULL COMMENT 'Live Quiz Session Id',
  `mvalue` float(8,2) NOT NULL,
  `milestone_at` bigint(20) DEFAULT NULL,
  `no_of_user` bigint(20) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.freemilestone: ~11 rows (approximately)
/*!40000 ALTER TABLE `freemilestone` DISABLE KEYS */;
INSERT INTO `freemilestone` (`fm_id`, `mid`, `qs_id`, `mvalue`, `milestone_at`, `no_of_user`, `created_at`) VALUES
	(1, 1, 20, 1.50, NULL, 4, '2019-09-18 11:59:41'),
	(2, 2, 20, 2.50, NULL, 2, '2019-09-18 11:59:41'),
	(3, 3, 20, 3.50, NULL, 2, '2019-09-18 11:59:41'),
	(4, 4, 20, 4.50, NULL, 1, '2019-09-18 11:59:41'),
	(9, 1, 22, 100.00, NULL, 4, '2019-09-18 12:22:36'),
	(10, 2, 22, 200.00, NULL, 3, '2019-09-18 12:22:36'),
	(11, 3, 22, 300.00, NULL, 2, '2019-09-18 12:22:36'),
	(12, 4, 22, 400.00, NULL, 1, '2019-09-18 12:22:36'),
	(13, 1, 23, 150.00, NULL, 4, '2019-09-18 13:47:31'),
	(14, 2, 23, 250.00, NULL, 3, '2019-09-18 13:47:31'),
	(15, 3, 23, 350.00, NULL, 2, '2019-09-18 13:47:31'),
	(16, 4, 23, 450.00, NULL, 1, '2019-09-18 13:47:31');
/*!40000 ALTER TABLE `freemilestone` ENABLE KEYS */;


-- Dumping structure for table live_quiz.live_quiz
CREATE TABLE IF NOT EXISTS `live_quiz` (
  `lq_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `live_quiz` varchar(1024) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0= Inactive 1= Active 2= Played',
  `number_of_option` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stamp_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `priority` int(11) DEFAULT NULL,
  `milestone_type` tinyint(2) DEFAULT '0' COMMENT 'Is milestone Question',
  `milestone_no` int(11) DEFAULT '0' COMMENT 'Milestone Number',
  `is_q1` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not 1st question 1= 1st question for qs',
  PRIMARY KEY (`lq_id`),
  KEY `lq_id` (`lq_id`,`qs_id`),
  KEY `status` (`status`),
  KEY `piority` (`priority`),
  KEY `number_of_option` (`number_of_option`),
  KEY `qs_id` (`qs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.live_quiz: ~16 rows (approximately)
/*!40000 ALTER TABLE `live_quiz` DISABLE KEYS */;
INSERT INTO `live_quiz` (`lq_id`, `qs_id`, `live_quiz`, `status`, `number_of_option`, `created_at`, `stamp_at`, `priority`, `milestone_type`, `milestone_no`, `is_q1`) VALUES
	(1, 1, 'Who is the PM of India?', 1, 4, '2019-09-04 16:03:38', '2019-09-04 20:12:48', 1, 0, 0, 0),
	(2, 1, 'Who is the PM of Pakistan?', 1, 4, '2019-09-04 16:03:38', '2019-09-04 19:41:46', 2, 0, 0, 0),
	(7, 7, 'ओलम्पिक पदक विजेता प्रथम भारतीय महिला कौन हैं?', 1, 4, '2019-09-05 16:03:38', '2019-09-06 16:55:23', 1, 0, 0, 0),
	(13, 7, 'हाल ही में किस देश ने अपनी बैलेस्टिक मिसाइल गजनवी का सफलतापूर्वक परीक्षण किया है?', 1, 4, '2019-09-05 16:03:38', '2019-09-05 19:41:46', 2, 0, 0, 0),
	(21, 23, 'Q1...?', 1, NULL, '2019-09-18 20:25:53', '2019-09-19 16:57:23', 2, 0, 4, 1),
	(23, 22, 'Who is Prime minister of india?', 1, 4, '2019-09-19 15:08:25', '2019-09-20 23:54:50', 1, 0, NULL, 1),
	(24, 22, 'Grand Central Terminal, Park Avenue, New York is the world\'s', 1, NULL, '2019-09-19 15:13:02', '2019-09-23 13:41:58', 2, 0, NULL, 0),
	(25, 22, 'Entomology is the science that studies', 1, NULL, '2019-09-19 15:14:14', '2019-09-19 15:46:58', 3, 1, 1, 0),
	(26, 22, 'Eritea, which became the 182nd member of the UN in 1993, is in the continent of', 1, NULL, '2019-09-19 15:15:05', '2019-09-19 15:47:01', 4, 0, NULL, 0),
	(27, 22, 'Garampani sanctuary is located at', 1, NULL, '2019-09-19 15:16:07', '2019-09-19 15:47:03', 5, 0, NULL, 0),
	(28, 22, 'For which of the following disciplines is Nobel Prize awarded?', 1, NULL, '2019-09-19 15:17:31', '2019-09-19 15:47:05', 6, 1, 2, 0),
	(29, 22, 'Hitler party which came into power in 1933 is known as', 1, NULL, '2019-09-19 15:19:35', '2019-09-19 15:47:07', 7, 0, NULL, 0),
	(30, 22, 'FFC stands for', 1, NULL, '2019-09-19 15:21:27', '2019-09-19 15:47:09', 8, 0, NULL, 0),
	(31, 22, 'Fastest shorthand writer was', 1, NULL, '2019-09-19 15:22:35', '2019-09-19 15:47:12', 9, 1, 3, 0),
	(32, 22, 'Epsom (England) is the place associated with', 1, NULL, '2019-09-19 15:24:09', '2019-09-19 15:47:14', 10, 1, 4, 0),
	(33, 23, 'The weight of diamonds is usually measured in what?', 1, NULL, '2019-09-19 17:14:21', '2019-09-19 17:14:21', 2, 0, NULL, 0);
/*!40000 ALTER TABLE `live_quiz` ENABLE KEYS */;


-- Dumping structure for table live_quiz.live_quiz_option
CREATE TABLE IF NOT EXISTS `live_quiz_option` (
  `lqo_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `lq_id` bigint(11) NOT NULL COMMENT 'Live quiz id',
  `qs_id` bigint(11) NOT NULL COMMENT 'quiz session id',
  `live_quiz_option` varchar(1024) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `priority` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stamp_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lqo_id`),
  KEY `lqo_id` (`lqo_id`,`lq_id`,`qs_id`),
  KEY `lq_id` (`lq_id`),
  KEY `qs_id` (`qs_id`),
  KEY `piority` (`priority`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.live_quiz_option: ~55 rows (approximately)
/*!40000 ALTER TABLE `live_quiz_option` DISABLE KEYS */;
INSERT INTO `live_quiz_option` (`lqo_id`, `lq_id`, `qs_id`, `live_quiz_option`, `is_correct`, `status`, `priority`, `created_at`, `stamp_at`) VALUES
	(1, 1, 1, 'Sonia Gandhi', 0, 1, 1, '2019-09-04 16:04:05', '2019-09-04 18:49:16'),
	(2, 1, 1, 'Narendra Modi', 1, 1, 2, '2019-09-04 16:04:05', '2019-09-04 18:49:25'),
	(3, 1, 1, 'Rahul Gandhi', 0, 1, 3, '2019-09-04 16:04:05', '2019-09-04 18:49:30'),
	(4, 1, 1, 'Narasimha Rao', 0, 1, 4, '2019-09-04 16:04:05', '2019-09-04 18:49:34'),
	(5, 1, 2, 'Musharaff', 0, 1, 1, '2019-09-04 16:04:05', '2019-09-04 19:42:00'),
	(6, 1, 2, 'Mustaffa', 0, 1, 2, '2019-09-04 16:04:05', '2019-09-04 19:42:05'),
	(13, 2, 7, 'सुनीता रानी', 0, 1, 1, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(19, 2, 7, 'करनम मल्लेश्वरी', 1, 1, 2, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(25, 2, 7, 'शाइनी अग्रवाल', 0, 1, 3, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(31, 2, 7, 'डी. कुंजुरानी', 0, 1, 4, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(37, 2, 13, 'नेपाल', 0, 1, 1, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(43, 2, 13, 'पाकिस्तान', 1, 1, 2, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(49, 2, 13, 'बांग्लादेश', 0, 1, 3, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(55, 2, 13, 'भूटान', 0, 1, 4, '2019-09-06 00:00:00', '2019-09-06 00:00:00'),
	(132, 21, 23, 'Q1O1', 0, 1, 1, '2019-09-19 13:15:43', '2019-09-19 13:33:46'),
	(133, 21, 23, 'Q1O2', 1, 1, 2, '2019-09-19 13:15:43', '2019-09-19 13:33:46'),
	(134, 21, 23, 'Q1O3', 0, 1, 3, '2019-09-19 13:15:43', '2019-09-19 13:33:46'),
	(135, 21, 23, 'Q1O4', 0, 1, 4, '2019-09-19 13:15:43', '2019-09-19 13:33:47'),
	(136, 23, 22, 'Modi', 1, 1, 1, '2019-09-19 15:08:25', '2019-09-19 15:08:25'),
	(137, 23, 22, 'Rahul', 0, 1, 2, '2019-09-19 15:08:25', '2019-09-19 15:08:25'),
	(138, 23, 22, 'Shivraj', 0, 1, 3, '2019-09-19 15:08:25', '2019-09-19 15:08:25'),
	(139, 23, 22, 'Mamta', 0, 1, 4, '2019-09-19 15:08:26', '2019-09-19 15:08:26'),
	(140, 24, 22, 'largest railway station', 1, 1, 1, '2019-09-19 15:13:03', '2019-09-19 15:13:03'),
	(141, 24, 22, 'highest railway station', 0, 1, 2, '2019-09-19 15:13:03', '2019-09-19 15:13:03'),
	(142, 24, 22, 'longest railway station', 0, 1, 3, '2019-09-19 15:13:03', '2019-09-19 15:13:03'),
	(143, 24, 22, 'None of the above', 0, 1, 4, '2019-09-19 15:13:03', '2019-09-19 15:13:03'),
	(144, 25, 22, 'Behavior of human beings', 0, 1, 1, '2019-09-19 15:14:14', '2019-09-19 15:14:14'),
	(145, 25, 22, 'Insects', 1, 1, 2, '2019-09-19 15:14:14', '2019-09-19 15:14:14'),
	(146, 25, 22, 'The origin and history of technical and scientific terms', 0, 1, 3, '2019-09-19 15:14:14', '2019-09-19 15:14:14'),
	(147, 25, 22, 'The formation of rocks', 0, 1, 4, '2019-09-19 15:14:14', '2019-09-19 15:14:14'),
	(148, 26, 22, 'Asia', 0, 1, 1, '2019-09-19 15:15:05', '2019-09-19 15:15:05'),
	(149, 26, 22, 'Africa', 1, 1, 2, '2019-09-19 15:15:05', '2019-09-19 15:15:05'),
	(150, 26, 22, 'Europe', 0, 1, 3, '2019-09-19 15:15:05', '2019-09-19 15:15:05'),
	(151, 26, 22, 'Australia', 0, 1, 4, '2019-09-19 15:15:06', '2019-09-19 15:15:06'),
	(152, 27, 22, 'Junagarh, Gujarat', 0, 1, 1, '2019-09-19 15:16:07', '2019-09-19 15:16:07'),
	(153, 27, 22, 'Diphu, Assam', 1, 1, 2, '2019-09-19 15:16:07', '2019-09-19 15:16:07'),
	(154, 27, 22, 'Kohima, Nagaland', 0, 1, 3, '2019-09-19 15:16:07', '2019-09-19 15:16:07'),
	(155, 27, 22, 'Gangtok, Sikkim', 0, 1, 4, '2019-09-19 15:16:07', '2019-09-19 15:16:07'),
	(156, 28, 22, 'Physics and Chemistry', 0, 1, 1, '2019-09-19 15:17:31', '2019-09-19 15:17:31'),
	(157, 28, 22, 'Physiology or Medicine', 0, 1, 2, '2019-09-19 15:17:31', '2019-09-19 15:17:31'),
	(158, 28, 22, 'Literature, Peace and Economics', 0, 1, 3, '2019-09-19 15:17:31', '2019-09-19 15:17:31'),
	(159, 28, 22, 'All of the above', 1, 1, 4, '2019-09-19 15:17:31', '2019-09-19 15:17:31'),
	(160, 29, 22, 'Labour Party', 0, 1, 1, '2019-09-19 15:19:35', '2019-09-19 15:19:35'),
	(161, 29, 22, 'Nazi Party', 1, 1, 2, '2019-09-19 15:19:35', '2019-09-19 15:19:35'),
	(162, 29, 22, 'Ku-Klux-Klan', 0, 1, 3, '2019-09-19 15:19:35', '2019-09-19 15:19:35'),
	(163, 29, 22, 'Democratic Party', 0, 1, 4, '2019-09-19 15:19:35', '2019-09-19 15:19:35'),
	(164, 30, 22, 'Foreign Finance Corporation', 0, 1, 1, '2019-09-19 15:21:27', '2019-09-19 15:21:27'),
	(165, 30, 22, 'Film Finance Corporation', 1, 1, 2, '2019-09-19 15:21:27', '2019-09-19 15:21:27'),
	(166, 30, 22, 'Federation of Football Council', 0, 1, 3, '2019-09-19 15:21:27', '2019-09-19 15:21:27'),
	(167, 30, 22, 'None of the above', 0, 1, 4, '2019-09-19 15:21:27', '2019-09-19 15:21:27'),
	(168, 31, 22, 'Dr. G. D. Bist', 1, 1, 1, '2019-09-19 15:22:35', '2019-09-19 15:22:35'),
	(169, 31, 22, 'J.R.D. Tata', 0, 1, 2, '2019-09-19 15:22:35', '2019-09-19 15:22:35'),
	(170, 31, 22, 'J.M. Tagore', 0, 1, 3, '2019-09-19 15:22:35', '2019-09-19 15:22:35'),
	(171, 31, 22, 'Khudada Khan', 0, 1, 4, '2019-09-19 15:22:35', '2019-09-19 15:22:35'),
	(172, 32, 22, 'Horse racing', 1, 1, 1, '2019-09-19 15:24:09', '2019-09-19 15:24:09'),
	(173, 32, 22, 'Polo', 0, 1, 2, '2019-09-19 15:24:09', '2019-09-19 15:24:09'),
	(174, 32, 22, 'Shooting', 0, 1, 3, '2019-09-19 15:24:09', '2019-09-19 15:24:09'),
	(175, 32, 22, 'Snooker', 0, 1, 4, '2019-09-19 15:24:09', '2019-09-19 15:24:09'),
	(176, 33, 23, 'Tola', 0, 1, 1, '2019-09-19 17:14:21', '2019-09-19 17:14:21'),
	(177, 33, 23, 'Carat', 1, 1, 2, '2019-09-19 17:14:21', '2019-09-19 17:14:21'),
	(178, 33, 23, 'Maund', 0, 1, 3, '2019-09-19 17:14:21', '2019-09-19 17:14:21'),
	(179, 33, 23, 'Troy', 0, 1, 4, '2019-09-19 17:14:21', '2019-09-19 17:14:21');
/*!40000 ALTER TABLE `live_quiz_option` ENABLE KEYS */;


-- Dumping structure for table live_quiz.live_quiz_panel_activity
CREATE TABLE IF NOT EXISTS `live_quiz_panel_activity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lq_id` int(10) NOT NULL DEFAULT '0',
  `ques_id` int(10) NOT NULL DEFAULT '0',
  `activity_status1` tinyint(4) NOT NULL DEFAULT '0',
  `activity_status2` tinyint(4) NOT NULL DEFAULT '0',
  `activity_status3` tinyint(4) NOT NULL DEFAULT '0',
  `ques_priority` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lq_id_ques_id` (`lq_id`,`ques_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table live_quiz.live_quiz_panel_activity: ~0 rows (approximately)
/*!40000 ALTER TABLE `live_quiz_panel_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `live_quiz_panel_activity` ENABLE KEYS */;


-- Dumping structure for table live_quiz.live_quiz_panel_status
CREATE TABLE IF NOT EXISTS `live_quiz_panel_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lq_id` int(10) DEFAULT NULL,
  `youtube_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lq_id` (`lq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table live_quiz.live_quiz_panel_status: ~0 rows (approximately)
/*!40000 ALTER TABLE `live_quiz_panel_status` DISABLE KEYS */;
INSERT INTO `live_quiz_panel_status` (`id`, `lq_id`, `youtube_id`, `status`, `created_at`, `updated_at`) VALUES
	(3, 1, 'r_E_Xhxjsg011', 1, '2019-09-18 13:36:55', '2019-09-18 13:38:29'),
	(4, 22, 'AG9GRkXlduU', 1, '2019-09-26 13:41:06', '2019-09-26 13:41:06');
/*!40000 ALTER TABLE `live_quiz_panel_status` ENABLE KEYS */;


-- Dumping structure for table live_quiz.lq_daily_player
CREATE TABLE IF NOT EXISTS `lq_daily_player` (
  `lqp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quize session id',
  `lqu_id` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Live quiz User Id',
  `player_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT 'Player Type',
  `last_correct_lq_id` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Last Correct Live Quiz Id',
  `last_milestone_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Milistone Id',
  `last_attempt_lq_id` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Last  Live Quiz Id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stamp_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_life_line_used` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0= Not userd 1= used',
  `is_q1_atempt` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= not 1= 1st question atmpt',
  `is_m1_eligible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not Eligible 1= eligible',
  `is_m2_eligible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not Eligible 1= eligible',
  `is_m3_eligible` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not Eligible 1= eligible',
  PRIMARY KEY (`lqp_id`),
  UNIQUE KEY `qs_id` (`qs_id`,`lqu_id`),
  KEY `lqu_id` (`lqu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.lq_daily_player: ~0 rows (approximately)
/*!40000 ALTER TABLE `lq_daily_player` DISABLE KEYS */;
/*!40000 ALTER TABLE `lq_daily_player` ENABLE KEYS */;


-- Dumping structure for table live_quiz.lq_daily_player_arc
CREATE TABLE IF NOT EXISTS `lq_daily_player_arc` (
  `lqp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quize session iid',
  `lqu_id` bigint(20) NOT NULL COMMENT 'Live quiz User Id',
  `player_type` tinyint(2) NOT NULL COMMENT 'Player Type',
  `last_correct_lq_id` bigint(20) NOT NULL COMMENT 'Last Correct Live Quiz Id',
  `is_knockout` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Active 1= knockout',
  `last_attempt_lq_id` bigint(20) NOT NULL COMMENT 'Last  Live Quiz Id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stamp_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_life_line_used` tinyint(4) NOT NULL COMMENT '0= Not userd 1= used',
  PRIMARY KEY (`lqp_id`),
  UNIQUE KEY `qs_id` (`qs_id`,`lqu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.lq_daily_player_arc: ~0 rows (approximately)
/*!40000 ALTER TABLE `lq_daily_player_arc` DISABLE KEYS */;
/*!40000 ALTER TABLE `lq_daily_player_arc` ENABLE KEYS */;


-- Dumping structure for table live_quiz.lq_milestone
CREATE TABLE IF NOT EXISTS `lq_milestone` (
  `lqm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `milestone_name` varchar(255) NOT NULL,
  `is_active_for_paid` tinyint(1) NOT NULL DEFAULT '1',
  `is_active_for_free` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1= active 0= inactive',
  PRIMARY KEY (`lqm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.lq_milestone: ~4 rows (approximately)
/*!40000 ALTER TABLE `lq_milestone` DISABLE KEYS */;
INSERT INTO `lq_milestone` (`lqm_id`, `milestone_name`, `is_active_for_paid`, `is_active_for_free`, `status`) VALUES
	(1, 'milestone1', 1, 1, 1),
	(2, 'milestone2', 1, 1, 1),
	(3, 'milestone3', 1, 1, 1),
	(4, 'milestone4', 1, 1, 1);
/*!40000 ALTER TABLE `lq_milestone` ENABLE KEYS */;


-- Dumping structure for table live_quiz.lq_tranx_daily
CREATE TABLE IF NOT EXISTS `lq_tranx_daily` (
  `ldt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz session id',
  `lq_user_id` bigint(20) NOT NULL COMMENT 'Live quize user id',
  `particulars` varchar(512) NOT NULL,
  `dr` float(10,2) NOT NULL,
  `cr` float(10,2) NOT NULL,
  `is_paid` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0= Not paid 1= Paid',
  `milestone_no` tinyint(2) NOT NULL DEFAULT '0' COMMENT 'Milestone no',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_milestone` tinyint(1) DEFAULT '0' COMMENT '0= No extra 1= Extra Miliestone',
  PRIMARY KEY (`ldt_id`),
  KEY `qs_id` (`qs_id`,`lq_user_id`),
  KEY `lq_user_id` (`lq_user_id`),
  KEY `is_paid` (`is_paid`),
  KEY `milestone` (`milestone_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.lq_tranx_daily: ~0 rows (approximately)
/*!40000 ALTER TABLE `lq_tranx_daily` DISABLE KEYS */;
/*!40000 ALTER TABLE `lq_tranx_daily` ENABLE KEYS */;


-- Dumping structure for table live_quiz.lq_tranx_daily_arc
CREATE TABLE IF NOT EXISTS `lq_tranx_daily_arc` (
  `ldt_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz session id',
  `lq_user_id` bigint(20) NOT NULL COMMENT 'Live quize user id',
  `particulars` varchar(512) NOT NULL,
  `dr` float(10,2) NOT NULL,
  `cr` float(10,2) NOT NULL,
  `is_paid` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0= Not paid 1= Paid',
  `milestone` tinyint(2) NOT NULL DEFAULT '0' COMMENT 'Milestone achieved',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_milestone` tinyint(1) DEFAULT '0' COMMENT '0= No extra 1= Extra Miliestone',
  PRIMARY KEY (`ldt_id`),
  KEY `qs_id` (`qs_id`,`lq_user_id`),
  KEY `lq_user_id` (`lq_user_id`),
  KEY `is_paid` (`is_paid`),
  KEY `milestone` (`milestone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.lq_tranx_daily_arc: ~0 rows (approximately)
/*!40000 ALTER TABLE `lq_tranx_daily_arc` DISABLE KEYS */;
/*!40000 ALTER TABLE `lq_tranx_daily_arc` ENABLE KEYS */;


-- Dumping structure for table live_quiz.lq_users
CREATE TABLE IF NOT EXISTS `lq_users` (
  `lqu_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `device_id` varchar(255) NOT NULL,
  `app_id` tinyint(4) NOT NULL,
  `user_name` varchar(512) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `uid` varchar(512) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stamp_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ac_holder_name` varchar(512) NOT NULL,
  `ac_number` varchar(512) NOT NULL,
  `ifsc_code` varchar(512) NOT NULL,
  `upi_id` varchar(512) NOT NULL,
  `paytm_no` varchar(512) NOT NULL,
  `channel_slno` int(11) NOT NULL,
  `db_id` bigint(20) NOT NULL,
  PRIMARY KEY (`lqu_id`),
  UNIQUE KEY `app_id` (`app_id`,`uid`),
  UNIQUE KEY `user_mobile` (`user_mobile`,`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.lq_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `lq_users` DISABLE KEYS */;
INSERT INTO `lq_users` (`lqu_id`, `device_id`, `app_id`, `user_name`, `user_email`, `user_mobile`, `user_image`, `uid`, `created_at`, `stamp_at`, `ac_holder_name`, `ac_number`, `ifsc_code`, `upi_id`, `paytm_no`, `channel_slno`, `db_id`) VALUES
	(6, '3434323', 4, 'Brajesh Sio', 'sanodiya.brajesh1@gmail.com', '1122334455', '', '33434', '2019-09-09 15:16:07', '2019-09-21 14:58:01', '', '', '', '', '', 0, 0);
/*!40000 ALTER TABLE `lq_users` ENABLE KEYS */;


-- Dumping structure for table live_quiz.master_orders
CREATE TABLE IF NOT EXISTS `master_orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table live_quiz.master_orders: ~10 rows (approximately)
/*!40000 ALTER TABLE `master_orders` DISABLE KEYS */;
INSERT INTO `master_orders` (`id`, `order_id`, `status`) VALUES
	(1, 100000, 0),
	(2, 123212, 0),
	(3, 456567, 0),
	(4, 696868, 0),
	(5, 657676, 0),
	(6, 567676, 0),
	(7, 434567, 0),
	(8, 986567, 0),
	(9, 234512, 0),
	(10, 8765676, 0);
/*!40000 ALTER TABLE `master_orders` ENABLE KEYS */;


-- Dumping structure for table live_quiz.paidmilestone
CREATE TABLE IF NOT EXISTS `paidmilestone` (
  `lqp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `m_type` tinyint(2) DEFAULT NULL,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `mvalue` bigint(20) NOT NULL,
  `milestone_at` bigint(20) DEFAULT NULL,
  `is_fixed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not fixed 1= fixed',
  `max_cap_value` float(8,2) NOT NULL,
  `lqm_id` int(11) NOT NULL COMMENT 'Milestone Id',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lqp_id`),
  UNIQUE KEY `qs_id` (`qs_id`,`lqm_id`),
  KEY `m_type` (`m_type`),
  KEY `qs_id_2` (`qs_id`),
  KEY `mvalue` (`mvalue`),
  KEY `is_fixed` (`is_fixed`),
  KEY `max_cap_value` (`max_cap_value`),
  KEY `lqm_id` (`lqm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.paidmilestone: ~12 rows (approximately)
/*!40000 ALTER TABLE `paidmilestone` DISABLE KEYS */;
INSERT INTO `paidmilestone` (`lqp_id`, `m_type`, `qs_id`, `mvalue`, `milestone_at`, `is_fixed`, `max_cap_value`, `lqm_id`, `created_at`) VALUES
	(1, NULL, 20, 10, NULL, 1, 4.00, 1, '2019-09-18 11:59:41'),
	(2, NULL, 20, 20, NULL, 1, 3.00, 2, '2019-09-18 11:59:41'),
	(3, NULL, 20, 30, NULL, 0, 2.00, 3, '2019-09-18 11:59:41'),
	(4, NULL, 20, 40, NULL, 1, 1.00, 4, '2019-09-18 11:59:42'),
	(9, NULL, 22, 10, NULL, 1, 3.00, 1, '2019-09-18 12:22:36'),
	(10, NULL, 22, 20, NULL, 1, 5.00, 2, '2019-09-18 12:22:36'),
	(11, NULL, 22, 30, NULL, 0, 4.00, 3, '2019-09-18 12:22:36'),
	(12, NULL, 22, 40, NULL, 1, 1.00, 4, '2019-09-18 12:22:36'),
	(13, NULL, 23, 1000, NULL, 1, 2.00, 1, '2019-09-18 13:47:31'),
	(14, NULL, 23, 500, NULL, 0, 4.00, 2, '2019-09-18 13:47:31'),
	(15, NULL, 23, 200, NULL, 1, 10.00, 3, '2019-09-18 13:47:31'),
	(16, NULL, 23, 400, NULL, 0, 5.00, 4, '2019-09-18 13:47:31');
/*!40000 ALTER TABLE `paidmilestone` ENABLE KEYS */;


-- Dumping structure for table live_quiz.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'Quiz Session Id',
  `lqu_id` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Live Quiz User Id',
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_getway_method` int(11) NOT NULL DEFAULT '0' COMMENT '1=razorPay, 2=Paytm',
  `merchant_order_id` bigint(20) NOT NULL DEFAULT '0',
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Razorpay = paymentid, Paytm = transactionid',
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'Razorpay = order id, Paytm = bank transaction id ',
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `amount` float(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `amount_refunded` int(11) NOT NULL DEFAULT '0',
  `refund_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `captured` int(11) NOT NULL DEFAULT '0',
  `payment_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `razorpay_card_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `razorpay_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `razorpay_wallet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `razorpay_vpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `international` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_user_mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `db_user_state` bigint(20) NOT NULL DEFAULT '1',
  `getway_payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `razorpay_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `error_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `error_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `checksum_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table live_quiz.payments: ~1 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `qs_id`, `lqu_id`, `device_id`, `db_id`, `payment_getway_method`, `merchant_order_id`, `payment_id`, `order_id`, `invoice_id`, `amount`, `payment_method`, `payment_mode`, `amount_refunded`, `refund_status`, `captured`, `payment_description`, `razorpay_card_id`, `razorpay_bank`, `razorpay_wallet`, `razorpay_vpa`, `international`, `db_user_name`, `db_user_email`, `db_user_mobile`, `db_user_address`, `db_user_state`, `getway_payment_status`, `payment_status`, `razorpay_fee`, `tax`, `error_code`, `error_description`, `checksum_hash`, `payment_date`, `created_at`, `updated_at`) VALUES
	(4, 22, 123, '98723b2d4cb7d761', '123123', 2, 1234321, 'pay_DMOXK1clmArvyo', 'order_DMOSag1PpjHRko', '', 500.00, 'card', '', 0, '', 1, 'ABC Premium Purchase', 'card_DMOXK5LgR99Lmc', '', '', '', '0', 'Astha', 'astha@gmail.com', '8319594682', '', 1, 'captured', 1, '10', '0', '', '', NULL, '0000-00-00 00:00:00', '2019-09-25 15:39:10', '2019-09-27 13:31:07');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;


-- Dumping structure for table live_quiz.quiz_session
CREATE TABLE IF NOT EXISTS `quiz_session` (
  `qs_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(512) DEFAULT NULL,
  `session_date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `channel_slno` int(11) DEFAULT NULL,
  `youtube_url` varchar(512) DEFAULT NULL,
  `big_screen_timer` int(11) DEFAULT '0',
  `tutorial_time` int(11) DEFAULT '0',
  `reg_start` datetime DEFAULT NULL,
  `reg_end` datetime DEFAULT NULL,
  `start_session` datetime DEFAULT NULL,
  `user_dashboard` datetime DEFAULT NULL,
  `splash_url` varchar(512) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stamp_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `db_contribution_cost_paid` float(8,2) DEFAULT NULL,
  `db_contribution_cost_free` float(8,2) DEFAULT NULL,
  `users_contribution_cost` float(8,2) DEFAULT NULL,
  `no_of_paid_users` bigint(20) DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT '0' COMMENT '0= Not Paid 1= Paid',
  `m1_paid_users` bigint(20) DEFAULT NULL,
  `m1_paid_amount` float(8,2) DEFAULT NULL,
  `m2_paid_users` bigint(20) DEFAULT NULL,
  `m2_paid_amount` float(8,2) DEFAULT NULL,
  `m3_paid_users` bigint(20) DEFAULT NULL,
  `m3_paid_amount` float(8,2) DEFAULT NULL,
  `m4_paid_users` bigint(20) DEFAULT NULL,
  `m4_paid_amount` float(8,2) DEFAULT NULL,
  `remaining_amount` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`qs_id`),
  KEY `session_date` (`session_date`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table live_quiz.quiz_session: ~5 rows (approximately)
/*!40000 ALTER TABLE `quiz_session` DISABLE KEYS */;
INSERT INTO `quiz_session` (`qs_id`, `session_name`, `session_date`, `active`, `channel_slno`, `youtube_url`, `big_screen_timer`, `tutorial_time`, `reg_start`, `reg_end`, `start_session`, `user_dashboard`, `splash_url`, `created_at`, `stamp_at`, `db_contribution_cost_paid`, `db_contribution_cost_free`, `users_contribution_cost`, `no_of_paid_users`, `is_paid`, `m1_paid_users`, `m1_paid_amount`, `m2_paid_users`, `m2_paid_amount`, `m3_paid_users`, `m3_paid_amount`, `m4_paid_users`, `m4_paid_amount`, `remaining_amount`) VALUES
	(1, 'DBAPP - Gaming - 04/09/19', '2019-09-18', 1, 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2019-09-04 16:03:11', '2019-09-18 11:26:26', 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0, 0.00, 0, 0.00, 0, 0.00, 0.00),
	(7, 'DBAPP - Gaming - 05/09/19', '2019-09-06', 1, 0, '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2019-09-04 16:03:11', '2019-09-05 16:28:15', 0.00, NULL, 0.00, 0, 0, 0, 0.00, 0, 0.00, 0, 0.00, 0, 0.00, 0.00),
	(20, 'ABCD_DB', '2019-09-21', 1, 1, '1234567', 0, 0, '2019-08-21 00:10:09', '2019-09-21 23:59:00', '2019-09-21 10:04:15', '2019-09-21 20:00:00', NULL, '2019-09-18 11:59:41', '2019-09-18 17:00:00', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 'ABC2 - 27-Sep-2019', '2019-09-27', 1, 2, 'ABC@YoutubeUrl', 0, 0, '2019-09-27 11:00:00', '2019-09-27 21:30:00', '2019-09-27 07:00:00', '2019-09-27 21:00:00', NULL, '2019-09-18 12:22:36', '2019-09-27 11:33:36', 50000.00, 20000.00, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 'ABC90', '2019-09-22', 1, 3, 'ABC90@youtubeurl', 0, 0, '2019-09-19 00:11:22', '2019-09-22 17:04:06', '2019-09-22 19:15:14', '2019-09-22 21:15:14', NULL, '2019-09-18 13:47:31', '2019-09-26 13:42:40', 0.00, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `quiz_session` ENABLE KEYS */;


-- Dumping structure for table live_quiz.user_submission
CREATE TABLE IF NOT EXISTS `user_submission` (
  `us_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `lq_id` bigint(20) NOT NULL COMMENT 'Live quiz Id',
  `lqo_id` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_lifeline_used` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= no life line use, 1= life line used',
  `is_correct` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not correct 1= Correct',
  `is_milestone` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= No Milestone 1= milestone question',
  `milestone_no` int(11) NOT NULL COMMENT 'Which Milestone',
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `user_id` (`user_id`,`qs_id`,`lq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table live_quiz.user_submission: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_submission` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_submission` ENABLE KEYS */;


-- Dumping structure for table live_quiz.user_submission_arc
CREATE TABLE IF NOT EXISTS `user_submission_arc` (
  `us_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `lq_id` bigint(20) NOT NULL COMMENT 'Live quiz Id',
  `lqo_id` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_lifeline_used` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= no life line use, 1= life line used',
  `is_correct` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= Not correct 1= Correct',
  `is_milestone` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= No Milestone 1= milestone question',
  `milestone_no` int(11) NOT NULL COMMENT 'Which Milestone',
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `user_id` (`user_id`,`qs_id`,`lq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table live_quiz.user_submission_arc: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_submission_arc` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_submission_arc` ENABLE KEYS */;


-- Dumping structure for table live_quiz.user_submission_log
CREATE TABLE IF NOT EXISTS `user_submission_log` (
  `us_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `lq_id` bigint(20) NOT NULL COMMENT 'Live quiz Id',
  `lqo_id` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_life_line_used` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table live_quiz.user_submission_log: ~31 rows (approximately)
/*!40000 ALTER TABLE `user_submission_log` DISABLE KEYS */;
INSERT INTO `user_submission_log` (`us_id`, `user_id`, `qs_id`, `lq_id`, `lqo_id`, `creatd_at`, `is_life_line_used`) VALUES
	(1, 1234, 1, 1, 2, '2019-09-10 11:27:39', 0),
	(7, 1234, 1, 1, 2, '2019-09-10 11:28:33', 0),
	(13, 1234, 1, 1, 2, '2019-09-10 11:29:20', 0),
	(19, 1235, 1, 1, 2, '2019-09-10 11:29:20', 0),
	(25, 1236, 1, 1, 3, '2019-09-10 11:29:21', 0),
	(31, 1237, 1, 1, 1, '2019-09-10 11:29:21', 0),
	(37, 1234, 1, 1, 1, '2019-09-10 11:34:52', 0),
	(43, 1234, 1, 1, 2, '2019-09-10 11:35:29', 0),
	(49, 1234, 1, 1, 2, '2019-09-10 11:35:37', 0),
	(55, 1234, 1, 1, 2, '2019-09-10 11:45:16', 0),
	(61, 1234, 1, 1, 2, '2019-09-10 11:45:56', 0),
	(67, 1234, 1, 1, 2, '2019-09-10 11:46:09', 0),
	(73, 1235, 1, 1, 2, '2019-09-10 11:46:09', 0),
	(79, 1236, 1, 1, 3, '2019-09-10 11:46:09', 0),
	(85, 1237, 1, 1, 1, '2019-09-10 11:46:09', 0),
	(91, 1234, 1, 1, 2, '2019-09-10 11:46:09', 0),
	(97, 1234, 1, 1, 3, '2019-09-10 11:46:22', 0),
	(103, 1234, 1, 1, 1, '2019-09-10 11:46:34', 0),
	(109, 1234, 1, 1, 1, '2019-09-10 11:46:53', 0),
	(115, 1235, 1, 1, 2, '2019-09-10 11:46:53', 0),
	(121, 1236, 1, 1, 3, '2019-09-10 11:46:53', 0),
	(127, 1237, 1, 1, 1, '2019-09-10 11:46:53', 0),
	(133, 1234, 1, 1, 1, '2019-09-10 11:47:10', 0),
	(139, 1235, 1, 1, 2, '2019-09-10 11:47:10', 0),
	(145, 1236, 1, 1, 3, '2019-09-10 11:47:10', 0),
	(151, 1235, 1, 1, 1, '2019-09-10 11:47:10', 0),
	(157, 1234, 1, 1, 1, '2019-09-10 11:48:02', 0),
	(163, 1235, 1, 1, 2, '2019-09-10 11:48:02', 0),
	(169, 1236, 1, 1, 3, '2019-09-10 11:48:02', 0),
	(175, 1235, 1, 1, 1, '2019-09-10 11:48:02', 0),
	(181, 1234, 1, 1, 2, '2019-09-10 11:48:02', 0);
/*!40000 ALTER TABLE `user_submission_log` ENABLE KEYS */;


-- Dumping structure for table live_quiz.user_submission_sum
CREATE TABLE IF NOT EXISTS `user_submission_sum` (
  `uss_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `lq_id` bigint(20) NOT NULL COMMENT 'Live quiz Id',
  `lqo_id` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `lqo_id_sum` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_life_line_sum` bigint(20) NOT NULL COMMENT 'Life line sum',
  PRIMARY KEY (`uss_id`),
  UNIQUE KEY `qs_id` (`qs_id`,`lq_id`,`lqo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table live_quiz.user_submission_sum: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_submission_sum` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_submission_sum` ENABLE KEYS */;


-- Dumping structure for table live_quiz.user_submission_sum_arc
CREATE TABLE IF NOT EXISTS `user_submission_sum_arc` (
  `uss_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `qs_id` bigint(20) NOT NULL COMMENT 'Quiz Session Id',
  `lq_id` bigint(20) NOT NULL COMMENT 'Live quiz Id',
  `lqo_id` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `lqo_id_sum` bigint(20) NOT NULL COMMENT 'Live quiz Option id',
  `creatd_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_life_line_sum` bigint(20) NOT NULL COMMENT 'Life line sum',
  PRIMARY KEY (`uss_id`),
  UNIQUE KEY `qs_id` (`qs_id`,`lq_id`,`lqo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table live_quiz.user_submission_sum_arc: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_submission_sum_arc` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_submission_sum_arc` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
