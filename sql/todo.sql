SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `todo`;
CREATE TABLE `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `todo_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='To-Dos';

INSERT INTO `todo` (`id`, `name`, `description`) VALUES
  (1,	'to buy',	'you need to buy this stuff'),
  (2,	'create project',	NULL),
  (3,	'make pancakes',	NULL),
  (4,	'Validation',	'Check Validation');


DROP TABLE IF EXISTS `points`;
CREATE TABLE `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `todo_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `points_id_uindex` (`id`),
  KEY `points_to_todo_fk` (`todo_id`),
  CONSTRAINT `points_to_todo_fk` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `points` (`id`, `todo_id`, `description`) VALUES
(6,	1,	'milk'),
(7,	1,	'beer'),
(8,	1,	'grey bread'),
(9,	2,	'Think about plan'),
(10,	2,	'make blueprint'),
(11,	2,	'work hard!'),
(12,	2,	'....'),
(13,	2,	'PROFIT!'),
(14,	3,	'recepie'),
(15,	3,	'bake');
