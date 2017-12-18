-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_log`;
CREATE TABLE `app_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_log`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `app_log_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `app_user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `app_menu`;
CREATE TABLE `app_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_menu` (`id_menu`, `name`, `sort`, `created_date`, `updated_date`) VALUES
(1,	'Master',	1,	'2017-10-05 13:56:57',	'2017-10-05 13:56:57');

DROP TABLE IF EXISTS `app_module`;
CREATE TABLE `app_module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_module`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `app_module_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `app_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_module` (`id_module`, `id_menu`, `name`, `url`, `icon`, `sort`, `created_date`, `updated_date`) VALUES
(1,	1,	'Menu',	'mod/menu',	'fa fa-list',	1,	'2017-10-05 13:58:48',	'2017-10-05 13:58:48'),
(2,	1,	'Module',	'mod/module',	'fa fa-clone',	2,	'2017-10-05 13:59:56',	'2017-10-05 13:59:56'),
(3,	1,	'User',	'mod/user',	'fa fa-users',	3,	'2017-10-05 14:00:25',	'2017-10-05 14:00:25'),
(4,	1,	'Log',	'mod/log',	'fa fa-history',	4,	'2017-10-05 14:00:51',	'2017-10-05 14:00:51');

DROP TABLE IF EXISTS `app_user`;
CREATE TABLE `app_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `access` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_user` (`id_user`, `username`, `password`, `email`, `level`, `access`, `last_login`, `status`, `created_date`, `updated_date`) VALUES
(1,	'admin',	'$2y$10$sHFbBNLm4/djzW0JYeyYMewl4ox94GOJiKviRq4YMxKlRpExewP/e',	'admin@app.dev',	100,	NULL,	'2017-10-06 16:10:11',	1,	'2017-10-05 02:03:26',	'2017-10-05 02:03:26');

-- 2017-10-06 22:32:57
