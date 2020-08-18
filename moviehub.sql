-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for moviehub
CREATE DATABASE IF NOT EXISTS `moviehub` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `moviehub`;

-- Dumping structure for table moviehub.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `IDNum` int(11) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table moviehub.employee: ~5 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`IDNum`, `LastName`, `FirstName`, `Position`) VALUES
	(1, 'Ahmed', 'Syed', 'CEO'),
	(2, 'Gates', 'Bill', 'CEO'),
	(3, 'Jobs', 'Steve', 'CEO'),
	(3, 'Ma', 'Jack', 'Boss'),
	(3, 'Jones', 'Jack', 'Employee');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table moviehub.myfavs
CREATE TABLE IF NOT EXISTS `myfavs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `movieid` varchar(255) DEFAULT NULL,
  `active` int(10) unsigned DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table moviehub.myfavs: 4 rows
/*!40000 ALTER TABLE `myfavs` DISABLE KEYS */;
INSERT INTO `myfavs` (`id`, `user_id`, `movieid`, `active`) VALUES
	(1, 9, '612706', 1),
	(2, 9, '605116', 1),
	(3, 9, '726664', 0),
	(4, 9, '521034', 1);
/*!40000 ALTER TABLE `myfavs` ENABLE KEYS */;

-- Dumping structure for table moviehub.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `is_verified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table moviehub.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_verified`) VALUES
	(1, 'tasri60', 'd41d8cd98f00b204e9800998ecf8427e', 's.tasrif60@gmail.com', 0),
	(2, 'tas', 'd41d8cd98f00b204e9800998ecf8427e', 'ewrer@gmail.com', 1),
	(3, 'robin', 'fa246d0262c3925617b0c72bb20eeb1d', 'hee@gmail.com', 0),
	(4, 'tas60', 'b7bc2a2f5bb6d521e64c8974c143e9a0', 's.tasrif604@gmail.com', 0),
	(5, 'craig', 'fcab6fc3e662e21090924a2a211920a6', 'craig@gelowitz.org', 1),
	(6, 'himel', '1a1dc91c907325c69271ddf0c944bc72', 'himelcuet10@gmail.com', 1),
	(7, 'tasy', 'eff5a16cbdfda636b3a77dc041be0ab4', 'tasrif.grider@gmail.com', 1),
	(8, 'gelowitz', 'fcab6fc3e662e21090924a2a211920a6', 'gelowitz@gelowitz.org', 1),
	(9, 'mahin', 'b4af804009cb036a4ccdc33431ef9ac9', 'm@gmail.com', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
