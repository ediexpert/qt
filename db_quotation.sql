-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.23 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_quotation.auth_data
CREATE TABLE IF NOT EXISTS `auth_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_key` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.auth_data: ~1 rows (approximately)
/*!40000 ALTER TABLE `auth_data` DISABLE KEYS */;
INSERT INTO `auth_data` (`id`, `auth_key`, `created_on`, `value`) VALUES
	(1, 'Allah o akbar', '2016-09-14 00:39:53', 'dbf63263cdef81556c7021a5ac065e62');
/*!40000 ALTER TABLE `auth_data` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_city
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_city: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_city` DISABLE KEYS */;
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(1, 'Dubai', 1),
	(2, 'Sharja', 1),
	(3, 'Abu Dhabi', 1),
	(4, 'London', 1),
	(5, 'asdas', 1),
	(6, 'anjksa', 1),
	(7, 'Delhi', 1),
	(8, 'Ajman', 1);
/*!40000 ALTER TABLE `tbl_city` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_city_area
CREATE TABLE IF NOT EXISTS `tbl_city_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `tbl_city_area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_city_area: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_city_area` DISABLE KEYS */;
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(1, 1, 'Deira'),
	(2, 1, 'Airport T1'),
	(3, 1, 'Airport T2'),
	(4, 1, 'Airport T3'),
	(5, 1, 'newcity'),
	(6, 2, 'Sahar Mall'),
	(7, 1, 'Ras Al Khor');
/*!40000 ALTER TABLE `tbl_city_area` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_company
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_company: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_company` DISABLE KEYS */;
INSERT INTO `tbl_company` (`id`, `name`, `address`, `city`, `country`, `phone`, `fax`, `email`) VALUES
	(1, 'ABC Travel LLC', 'Burj Al Arab', 'Dubai', 'UAE', '12312345', '12312346', 'abccompany@noemail.com');
/*!40000 ALTER TABLE `tbl_company` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_dayplan
CREATE TABLE IF NOT EXISTS `tbl_dayplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `dayplan_date` date DEFAULT NULL,
  `daytime_id` int(11) NOT NULL,
  `services_type_id` int(11) NOT NULL,
  `services_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_id` (`quotation_id`),
  KEY `daytime_id` (`daytime_id`),
  KEY `services_type_id` (`services_type_id`),
  KEY `services_id` (`services_id`),
  CONSTRAINT `tbl_dayplan_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `tbl_quotation` (`id`),
  CONSTRAINT `tbl_dayplan_ibfk_2` FOREIGN KEY (`daytime_id`) REFERENCES `tbl_daytime` (`id`),
  CONSTRAINT `tbl_dayplan_ibfk_3` FOREIGN KEY (`services_type_id`) REFERENCES `tbl_services_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_dayplan: ~23 rows (approximately)
/*!40000 ALTER TABLE `tbl_dayplan` DISABLE KEYS */;
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(13, 2, '2016-09-13', 1, 1, '1'),
	(14, 2, '2016-09-14', 1, 1, '2'),
	(15, 13, '2016-09-01', 1, 1, '2'),
	(16, 1, '2016-09-10', 1, 1, '1,2,3'),
	(17, 1, '2016-09-10', 1, 1, '4'),
	(20, 14, '2016-09-21', 1, 1, '4'),
	(21, 14, '2016-09-22', 1, 1, '1,2,3'),
	(22, 5, '2016-09-16', 1, 1, '1'),
	(23, 5, '2016-09-17', 1, 1, '2,3'),
	(24, 5, '2016-09-18', 2, 1, '3'),
	(25, 5, '2016-09-19', 3, 1, '3'),
	(26, 5, '2016-09-20', 2, 1, '1,2,3'),
	(27, 5, '2016-09-21', 1, 1, '1,2,3,4'),
	(28, 15, '2016-10-22', 1, 1, '4'),
	(29, 15, '2016-10-22', 1, 1, '1,3,5'),
	(30, 9, '2016-09-16', 1, 1, '4'),
	(31, 9, '2016-09-17', 1, 1, '1,2,3,5,6,7'),
	(32, 17, '2016-11-10', 1, 1, '4'),
	(33, 17, '2016-11-11', 1, 1, '1,2'),
	(34, 17, '2016-11-13', 1, 1, '5,6'),
	(35, 9, '2016-09-17', 1, 1, '3'),
	(36, 9, '2016-09-17', 2, 1, '2'),
	(37, 9, '2016-09-17', 3, 1, '6');
/*!40000 ALTER TABLE `tbl_dayplan` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_daytime
CREATE TABLE IF NOT EXISTS `tbl_daytime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daytime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_daytime: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_daytime` DISABLE KEYS */;
INSERT INTO `tbl_daytime` (`id`, `daytime`) VALUES
	(1, 'Morning'),
	(2, 'Afternoon'),
	(3, 'Evening'),
	(4, 'Night');
/*!40000 ALTER TABLE `tbl_daytime` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_hotel
CREATE TABLE IF NOT EXISTS `tbl_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_hotel_tbl_city` (`city_id`),
  CONSTRAINT `FK_tbl_hotel_tbl_city` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_hotel: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_hotel` DISABLE KEYS */;
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(1, 1, 'The Taj', 1),
	(2, 2, 'Sharja Hotel', 1),
	(3, 1, 'Dubai Hotel', 1),
	(4, 3, 'Abu Dhabi Hotel', 1),
	(5, 2, 'Second hotel sharja', 1),
	(6, 1, 'asda', 1),
	(7, 2, 'Sharja Hotel', 1),
	(8, 3, 'Abu Dhabi Hotel', 1),
	(9, 2, 'Sahara Hotel', 1),
	(10, 1, 'Fortune Deira Hotel', 1);
/*!40000 ALTER TABLE `tbl_hotel` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quotation
CREATE TABLE IF NOT EXISTS `tbl_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quot_name` varchar(255) NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `pax` int(11) DEFAULT NULL,
  `minor` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_quotation_tbl_user` (`created_by`),
  CONSTRAINT `FK_tbl_quotation_tbl_user` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quotation: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_quotation` DISABLE KEYS */;
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(1, 'imran quote', '2016-09-10', '2016-09-15', '123456', NULL, '2016-09-10 00:26:54', 1, NULL, NULL, 0),
	(2, 'Test Quote', '2016-09-13', '2016-09-21', '1221212', NULL, '2016-09-13 20:10:41', 1, NULL, NULL, 0),
	(3, 'asskj', '2016-09-14', '2016-09-17', 'asskj', 'sanja@gg.com', '2016-09-14 20:37:58', 1, 6, 0, 0),
	(4, 'asskj', '2016-09-14', '2016-09-17', 'asskj', 'sanja@gg.com', '2016-09-14 20:39:15', 1, 6, 0, 0),
	(5, 'Ramlal ind', '2016-09-16', '2016-09-21', 'Ramlal ind', 'ramlala@gmail.com', '2016-09-15 17:02:38', 1, 50, 0, 0),
	(6, 'new quot', '2016-09-16', '2016-09-17', 'new quot', 'ajs@gg.com', '2016-09-16 23:19:47', 1, 6, 0, 0),
	(7, 'new quot', '2016-09-16', '2016-09-17', 'new quot', 'ajs@gg.com', '2016-09-16 23:20:08', 1, 6, 0, 0),
	(8, 'snaja', '2016-09-16', '2016-09-17', 'snaja', 'jsanja@nja.com', '2016-09-16 23:28:00', 1, 8, 0, 0),
	(9, 'snaja', '2016-09-16', '2016-09-17', 'snaja', 'jsanja@nja.com', '2016-09-16 23:29:14', 1, 8, 0, 1),
	(10, 'snaja', '2016-09-16', '2016-09-17', 'snaja', 'jsanja@nja.com', '2016-09-16 23:33:29', 1, 8, 0, 0),
	(11, 'asnjsa', '2016-09-16', '2016-09-17', 'asnjsa', 'aslan@gmo.com', '2016-09-16 23:35:48', 1, 9, 0, 0),
	(12, 'sas', '2016-09-17', '2016-09-17', 'sas', 'asdas@gmak.com', '2016-09-17 01:33:53', 1, 5, 0, 0),
	(13, 'faralia', '2016-09-01', '2016-09-24', 'faralia', 'fara@gmail.com', '2016-09-21 17:54:34', 1, 12, 0, 1),
	(14, 'ramlam', '2016-09-21', '2016-09-30', 'ramlam', 'ram@kafk.com', '2016-09-25 03:09:24', 1, 23, 3, 0),
	(15, 'AJX Jagdambe enter', '2016-10-22', '2016-10-29', '', 'jagdambe@jaf.com', '2016-10-08 23:02:01', 1, 50, 0, 1),
	(16, 'Galaxy ', '2016-10-10', '2016-10-17', '', 'galaxy@email.com', '2016-10-09 13:01:59', 2, 50, 0, 0),
	(17, 'nilesh', '2016-11-10', '2016-11-15', '', 'sales@desertplanners.net', '2016-10-10 18:12:10', 1, 4, 0, 1);
/*!40000 ALTER TABLE `tbl_quotation` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quot_hotel
CREATE TABLE IF NOT EXISTS `tbl_quot_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) DEFAULT NULL,
  `no_rooms` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `city_area_id` int(11) DEFAULT NULL,
  `cin_date` date DEFAULT NULL,
  `cout_date` date DEFAULT NULL,
  `no_pax` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_type_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_id` (`quotation_id`),
  KEY `city_id` (`city_id`),
  KEY `city_area_id` (`city_area_id`),
  KEY `hotel_id` (`hotel_id`),
  CONSTRAINT `tbl_quot_hotel_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `tbl_quotation` (`id`),
  CONSTRAINT `tbl_quot_hotel_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`id`),
  CONSTRAINT `tbl_quot_hotel_ibfk_3` FOREIGN KEY (`city_area_id`) REFERENCES `tbl_city_area` (`id`),
  CONSTRAINT `tbl_quot_hotel_ibfk_4` FOREIGN KEY (`hotel_id`) REFERENCES `tbl_hotel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quot_hotel: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_quot_hotel` DISABLE KEYS */;
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `no_rooms`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(4, 13, NULL, 1, NULL, '2016-09-01', '2016-09-24', 12, 3, '1,2'),
	(5, 13, NULL, 1, NULL, '2016-09-01', '2016-09-24', 12, 1, '1,2'),
	(6, 13, NULL, 1, NULL, '2016-09-01', '2016-09-24', 12, 3, '1'),
	(7, 1, NULL, 1, NULL, '2016-09-10', '2016-09-15', 6, 1, '1'),
	(8, 9, NULL, 1, NULL, '2016-09-16', '2016-09-17', 8, 1, '1'),
	(10, 14, NULL, 1, NULL, '2016-09-21', '2016-09-30', 23, 1, '1'),
	(11, 5, NULL, 1, NULL, '2016-09-16', '2016-09-21', 50, 1, '1'),
	(12, 1, NULL, 1, NULL, '2016-09-10', '2016-09-15', 14, 1, '1,2'),
	(13, 15, NULL, 1, NULL, '2016-10-22', '2016-10-29', 50, 1, '1'),
	(16, 17, 2, 1, NULL, '2016-11-10', '2016-11-15', 4, 1, '1');
/*!40000 ALTER TABLE `tbl_quot_hotel` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quot_transfers
CREATE TABLE IF NOT EXISTS `tbl_quot_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `dayplan_date` date DEFAULT NULL,
  `daytime_id` int(11) DEFAULT NULL,
  `transfer_type_id` int(11) NOT NULL,
  `transfer_id` int(11) DEFAULT NULL,
  `txr_origin` int(11) NOT NULL,
  `txr_qty` int(11) NOT NULL DEFAULT '1',
  `txr_destination` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quotation_id` (`quotation_id`),
  KEY `daytime_id` (`daytime_id`),
  KEY `transfer_type_id` (`transfer_type_id`),
  KEY `transfer_id` (`transfer_id`),
  KEY `txr_origin` (`txr_origin`),
  KEY `txr_destination` (`txr_destination`),
  CONSTRAINT `tbl_quot_transfers_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `tbl_quotation` (`id`),
  CONSTRAINT `tbl_quot_transfers_ibfk_2` FOREIGN KEY (`daytime_id`) REFERENCES `tbl_daytime` (`id`),
  CONSTRAINT `tbl_quot_transfers_ibfk_3` FOREIGN KEY (`transfer_type_id`) REFERENCES `tbl_transfer_type` (`id`),
  CONSTRAINT `tbl_quot_transfers_ibfk_4` FOREIGN KEY (`transfer_id`) REFERENCES `tbl_transfer` (`id`),
  CONSTRAINT `tbl_quot_transfers_ibfk_5` FOREIGN KEY (`txr_origin`) REFERENCES `tbl_city_area` (`id`),
  CONSTRAINT `tbl_quot_transfers_ibfk_6` FOREIGN KEY (`txr_destination`) REFERENCES `tbl_city_area` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quot_transfers: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_quot_transfers` DISABLE KEYS */;
INSERT INTO `tbl_quot_transfers` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `transfer_type_id`, `transfer_id`, `txr_origin`, `txr_qty`, `txr_destination`) VALUES
	(1, 9, '2016-09-16', NULL, 1, NULL, 1, 1, 2),
	(2, 17, '2016-11-10', NULL, 1, NULL, 1, 1, 2),
	(3, 17, '2016-11-11', NULL, 1, NULL, 2, 1, 6),
	(4, 17, '2016-11-12', NULL, 1, NULL, 1, 1, 4),
	(5, 17, '2016-11-13', NULL, 2, NULL, 5, 3, 6),
	(6, 17, '2016-11-14', NULL, 1, NULL, 5, 2, 6);
/*!40000 ALTER TABLE `tbl_quot_transfers` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quot_txr_type
CREATE TABLE IF NOT EXISTS `tbl_quot_txr_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `txr_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quot_txr_type: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_quot_txr_type` DISABLE KEYS */;
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(1, 1, 1),
	(2, 1, 1),
	(3, 2, 1),
	(4, 2, 1),
	(5, 5, 1),
	(6, 5, 1),
	(7, 5, 2),
	(8, 5, 1),
	(9, 1, 1),
	(10, 15, 1),
	(11, 9, 2),
	(12, 9, 2),
	(13, 17, 2),
	(14, 9, 2);
/*!40000 ALTER TABLE `tbl_quot_txr_type` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_room
CREATE TABLE IF NOT EXISTS `tbl_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_price` bigint(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  CONSTRAINT `tbl_room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `tbl_hotel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_room: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_room` DISABLE KEYS */;
INSERT INTO `tbl_room` (`id`, `hotel_id`, `room_type`, `room_price`, `is_active`) VALUES
	(1, 1, 'Royal Suits', 2500, 1),
	(2, 1, 'Delux', 1500, 1),
	(3, 1, 'Normal', 120, 1),
	(4, 1, 'Single', 150, 1),
	(5, 1, 'Double', 200, 1),
	(6, 3, 'Studio', 300, 1),
	(7, 3, 'Single', 250, 1),
	(8, 3, 'Triple', 350, 1),
	(9, 2, 'Studio', 250, 1);
/*!40000 ALTER TABLE `tbl_room` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_services
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `service_price_minor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_type_id` (`service_type_id`),
  CONSTRAINT `tbl_services_ibfk_1` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_services_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_services: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;
INSERT INTO `tbl_services` (`id`, `service_type_id`, `service_name`, `service_price`, `img`, `service_price_minor`) VALUES
	(1, 1, 'Dessert Safari', 200, 'desertsafari1.jpg', NULL),
	(2, 2, 'Armani Hotel Lunch', 200, 'armani.jpg', NULL),
	(3, 1, 'Ice Skating', 1900, 'iceskate1.jpeg', NULL),
	(4, 3, '14 Days Visa', 285, 'airplain.jpg', 285),
	(5, 1, 'Hono lulu', 1200, 'beijing.jpg', 750),
	(6, 1, 'Dhow Cruize', 100, '1621885_780660851964078_1475472364_n.jpg', 85),
	(7, 2, 'Dinner at Burj Al Arab', 350, '', 185),
	(8, 2, 'Lunch at Burj Al Arab', 200, '', 150);
/*!40000 ALTER TABLE `tbl_services` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_services_type
CREATE TABLE IF NOT EXISTS `tbl_services_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_services_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_services_type` DISABLE KEYS */;
INSERT INTO `tbl_services_type` (`id`, `service_type`) VALUES
	(1, 'Exertation'),
	(2, 'Food'),
	(3, 'Visa');
/*!40000 ALTER TABLE `tbl_services_type` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_transfer
CREATE TABLE IF NOT EXISTS `tbl_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_type_id` int(11) NOT NULL,
  `transfer_origin` int(11) NOT NULL,
  `transfer_destination` int(11) NOT NULL,
  `transfer_unit_price` varchar(6) DEFAULT NULL,
  `transfer_full_price` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_fare_index` (`transfer_type_id`,`transfer_origin`,`transfer_destination`),
  KEY `transfer_type_id` (`transfer_type_id`),
  KEY `FK_tbl_transfer_tbl_city_area` (`transfer_origin`),
  KEY `FK_tbl_transfer_tbl_city_area_2` (`transfer_destination`),
  CONSTRAINT `FK_tbl_transfer_tbl_city_area` FOREIGN KEY (`transfer_origin`) REFERENCES `tbl_city_area` (`id`),
  CONSTRAINT `FK_tbl_transfer_tbl_city_area_2` FOREIGN KEY (`transfer_destination`) REFERENCES `tbl_city_area` (`id`),
  CONSTRAINT `tbl_transfer_ibfk_1` FOREIGN KEY (`transfer_type_id`) REFERENCES `tbl_transfer_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_transfer: ~29 rows (approximately)
/*!40000 ALTER TABLE `tbl_transfer` DISABLE KEYS */;
INSERT INTO `tbl_transfer` (`id`, `transfer_type_id`, `transfer_origin`, `transfer_destination`, `transfer_unit_price`, `transfer_full_price`) VALUES
	(1, 2, 2, 1, '100', '200'),
	(2, 1, 1, 5, '100', '500'),
	(3, 1, 5, 1, '100', '500'),
	(4, 7, 1, 4, '100', '10000'),
	(5, 7, 4, 1, '100', '10000'),
	(6, 4, 2, 5, '100', '600'),
	(7, 4, 5, 2, '100', '600'),
	(8, 3, 2, 4, '50', '50'),
	(9, 3, 4, 2, '50', '50'),
	(10, 3, 1, 5, '100', '300'),
	(11, 3, 5, 1, '100', '300'),
	(12, 3, 1, 4, '75', '75'),
	(13, 3, 4, 1, '75', '75'),
	(14, 1, 2, 3, '100', '500'),
	(15, 1, 3, 2, '100', '500'),
	(16, 1, 2, 4, '100', '500'),
	(17, 1, 4, 2, '100', '500'),
	(18, 1, 1, 2, '50', '250'),
	(19, 1, 2, 1, '50', '250'),
	(20, 1, 2, 6, '75', '700'),
	(21, 1, 6, 2, '75', '700'),
	(22, 1, 1, 4, '150', '500'),
	(23, 1, 4, 1, '150', '500'),
	(24, 2, 5, 6, '100', '700'),
	(25, 2, 6, 5, '100', '700'),
	(26, 1, 5, 6, '100', '700'),
	(27, 1, 6, 5, '100', '700'),
	(30, 7, 1, 7, '500', '1200'),
	(31, 7, 7, 1, '500', '1200');
/*!40000 ALTER TABLE `tbl_transfer` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_transfer_type
CREATE TABLE IF NOT EXISTS `tbl_transfer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_transfer_type: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_transfer_type` DISABLE KEYS */;
INSERT INTO `tbl_transfer_type` (`id`, `transfer_type`) VALUES
	(1, '34 Seater Bus'),
	(2, '2 seater Limo'),
	(3, 'Devoo'),
	(4, 'Mercedese'),
	(5, 'Maruti'),
	(6, 'Harley Devidson'),
	(7, 'Jaguar');
/*!40000 ALTER TABLE `tbl_transfer_type` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id`, `username`, `name`, `pass`, `is_active`, `created_on`, `is_admin`) VALUES
	(1, 'admin', 'Administrator', '123', 1, '2016-09-05 14:23:56', 1),
	(2, 'user', 'User', '123', 1, '2016-10-09 11:26:27', 0);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;


-- Dumping structure for table db_quotation.testapi
CREATE TABLE IF NOT EXISTS `testapi` (
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.testapi: ~4 rows (approximately)
/*!40000 ALTER TABLE `testapi` DISABLE KEYS */;
INSERT INTO `testapi` (`userName`, `password`, `id`, `createdAt`, `updatedAt`) VALUES
	(NULL, NULL, 1, '2016-10-01 18:03:20', '2016-10-01 18:09:07'),
	(NULL, NULL, 2, '2016-10-01 18:04:47', '2016-10-01 18:04:47'),
	(NULL, NULL, 3, '2016-10-01 18:10:08', '2016-10-01 18:10:08'),
	('imran', '123', 4, '2016-10-01 18:12:26', '2016-10-01 18:12:26');
/*!40000 ALTER TABLE `testapi` ENABLE KEYS */;


-- Dumping structure for table db_quotation.user
CREATE TABLE IF NOT EXISTS `user` (
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.user: ~13 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userName`, `password`, `email`, `id`, `createdAt`, `updatedAt`) VALUES
	(NULL, NULL, NULL, 1, '2016-10-01 22:54:31', '2016-10-01 22:54:31'),
	('imran', '123', 'imran@imran.com', 2, '2016-10-01 22:57:10', '2016-10-01 22:57:10'),
	('test', 'test', 'test', 3, '2016-10-03 16:22:25', '2016-10-03 16:22:25'),
	('test', 'jakss', 'test', 4, '2016-10-03 16:23:18', '2016-10-03 16:23:18'),
	('nasir', 'asnsas', 'nasir', 5, '2016-10-03 16:25:44', '2016-10-03 16:25:44'),
	('anasn', 'mk', 'knn', 6, '2016-10-03 16:26:09', '2016-10-03 16:26:09'),
	('asjbasjk', 'kjbjkb', 'bhb', 7, '2016-10-03 16:30:49', '2016-10-03 16:30:49'),
	('sadasd', 'asdasd', 'asdasd', 8, '2016-10-03 16:46:06', '2016-10-03 16:46:06'),
	('asnasn', 'n', 'jnjnj', 9, '2016-10-03 16:48:52', '2016-10-03 16:48:52'),
	('asjasjk', 'jkbjk', 'jbjkb', 10, '2016-10-03 16:49:26', '2016-10-03 16:49:26'),
	('Mohammed', '1234', 'mohd@gail.com', 11, '2016-10-03 16:50:35', '2016-10-03 16:50:35'),
	('Imranbajwa', 'nsja', 'imranka', 12, '2016-10-03 16:54:50', '2016-10-03 16:54:50'),
	('malik', 'jbj', 'asbdja', 13, '2016-10-03 16:58:09', '2016-10-03 16:58:09');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
