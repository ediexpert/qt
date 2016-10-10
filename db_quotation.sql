-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.23 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_quotation.tbl_city
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_city: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_city` DISABLE KEYS */;
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(1, 'Dubai', 1);
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(2, 'Sharja', 1);
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(3, 'Abu Dhabi', 1);
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(4, 'London', 1);
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(5, 'asdas', 1);
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(6, 'anjksa', 1);
INSERT INTO `tbl_city` (`id`, `city_name`, `is_active`) VALUES
	(7, 'Delhi', 1);
/*!40000 ALTER TABLE `tbl_city` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_city_area
CREATE TABLE IF NOT EXISTS `tbl_city_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `tbl_city_area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_city_area: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_city_area` DISABLE KEYS */;
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(1, 1, 'Deira');
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(2, 1, 'Airport T1');
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(3, 1, 'Airport T2');
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(4, 1, 'Airport T3');
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(5, 1, 'newcity');
INSERT INTO `tbl_city_area` (`id`, `city_id`, `area_name`) VALUES
	(6, 2, 'Sahar Mall');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_dayplan: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_dayplan` DISABLE KEYS */;
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(13, 2, '2016-09-13', 1, 1, '1');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(14, 2, '2016-09-14', 1, 1, '2');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(15, 13, '2016-09-01', 1, 1, '2');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(16, 1, '2016-09-10', 1, 1, '1,2,3');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(17, 1, '2016-09-10', 1, 1, '4');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(18, 9, '2016-09-16', 1, 1, '1,2,4');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(19, 9, '2016-09-17', 2, 1, '1,2');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(20, 14, '2016-09-21', 1, 1, '4');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(21, 14, '2016-09-22', 1, 1, '1,2,3');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(22, 5, '2016-09-16', 1, 1, '1');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(23, 5, '2016-09-17', 1, 1, '2,3');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(24, 5, '2016-09-18', 2, 1, '3');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(25, 5, '2016-09-19', 3, 1, '3');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(26, 5, '2016-09-20', 2, 1, '1,2,3');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(27, 5, '2016-09-21', 1, 1, '1,2,3,4');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(28, 15, '2016-10-22', 1, 1, '4');
INSERT INTO `tbl_dayplan` (`id`, `quotation_id`, `dayplan_date`, `daytime_id`, `services_type_id`, `services_id`) VALUES
	(29, 15, '2016-10-22', 1, 1, '1,3,5');
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
	(1, 'Morning');
INSERT INTO `tbl_daytime` (`id`, `daytime`) VALUES
	(2, 'Afternoon');
INSERT INTO `tbl_daytime` (`id`, `daytime`) VALUES
	(3, 'Evening');
INSERT INTO `tbl_daytime` (`id`, `daytime`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_hotel: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_hotel` DISABLE KEYS */;
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(1, 1, 'The Taj', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(2, 2, 'Sharja Hotel', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(3, 1, 'Dubai Hotel', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(4, 3, 'Abu Dhabi Hotel', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(5, 2, 'Second hotel sharja', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(6, 1, 'asda', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(7, 2, 'Sharja Hotel', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(8, 3, 'Abu Dhabi Hotel', 1);
INSERT INTO `tbl_hotel` (`id`, `city_id`, `hotel_name`, `is_active`) VALUES
	(9, 2, 'Sahara Hotel', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quotation: ~16 rows (approximately)
/*!40000 ALTER TABLE `tbl_quotation` DISABLE KEYS */;
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(1, 'imran quote', '2016-09-10', '2016-09-15', '123456', NULL, '2016-09-10 00:26:54', 1, NULL, NULL, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(2, 'Test Quote', '2016-09-13', '2016-09-21', '1221212', NULL, '2016-09-13 20:10:41', 1, NULL, NULL, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(3, 'asskj', '2016-09-14', '2016-09-17', 'asskj', 'sanja@gg.com', '2016-09-14 20:37:58', 1, 6, 0, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(4, 'asskj', '2016-09-14', '2016-09-17', 'asskj', 'sanja@gg.com', '2016-09-14 20:39:15', 1, 6, 0, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(5, 'Ramlal ind', '2016-09-16', '2016-09-21', 'Ramlal ind', 'ramlala@gmail.com', '2016-09-15 17:02:38', 1, 50, 0, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(6, 'new quot', '2016-09-16', '2016-09-17', 'new quot', 'ajs@gg.com', '2016-09-16 23:19:47', 1, 6, 0, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(7, 'new quot', '2016-09-16', '2016-09-17', 'new quot', 'ajs@gg.com', '2016-09-16 23:20:08', 1, 6, 0, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(8, 'snaja', '2016-09-16', '2016-09-17', 'snaja', 'jsanja@nja.com', '2016-09-16 23:28:00', 1, 8, 0, 1);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(9, 'snaja', '2016-09-16', '2016-09-17', 'snaja', 'jsanja@nja.com', '2016-09-16 23:29:14', 1, 8, 0, 1);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(10, 'snaja', '2016-09-16', '2016-09-17', 'snaja', 'jsanja@nja.com', '2016-09-16 23:33:29', 1, 8, 0, 1);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(11, 'asnjsa', '2016-09-16', '2016-09-17', 'asnjsa', 'aslan@gmo.com', '2016-09-16 23:35:48', 1, 9, 0, 1);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(12, 'sas', '2016-09-17', '2016-09-17', 'sas', 'asdas@gmak.com', '2016-09-17 01:33:53', 1, 5, 0, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(13, 'faralia', '2016-09-01', '2016-09-24', 'faralia', 'fara@gmail.com', '2016-09-21 17:54:34', 1, 12, 0, 1);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(14, 'ramlam', '2016-09-21', '2016-09-30', 'ramlam', 'ram@kafk.com', '2016-09-25 03:09:24', 1, 23, 3, 0);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(15, 'AJX Jagdambe enter', '2016-10-22', '2016-10-29', '', 'jagdambe@jaf.com', '2016-10-08 23:02:01', 1, 50, 0, 1);
INSERT INTO `tbl_quotation` (`id`, `quot_name`, `arrival_date`, `departure_date`, `contact`, `email`, `created_on`, `created_by`, `pax`, `minor`, `is_active`) VALUES
	(16, 'Galaxy ', '2016-10-10', '2016-10-17', '', 'galaxy@email.com', '2016-10-09 13:01:59', 2, 50, 0, 1);
/*!40000 ALTER TABLE `tbl_quotation` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quot_hotel
CREATE TABLE IF NOT EXISTS `tbl_quot_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quot_hotel: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_quot_hotel` DISABLE KEYS */;
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(4, 13, 1, NULL, '2016-09-01', '2016-09-24', 12, 3, '1,2');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(5, 13, 1, NULL, '2016-09-01', '2016-09-24', 12, 1, '1,2');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(6, 13, 1, NULL, '2016-09-01', '2016-09-24', 12, 3, '1');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(7, 1, 1, NULL, '2016-09-10', '2016-09-15', 6, 1, '1');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(8, 9, 1, NULL, '2016-09-16', '2016-09-17', 8, 1, '1');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(9, 9, 2, NULL, '2016-09-16', '2016-09-17', 8, 5, '1');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(10, 14, 1, NULL, '2016-09-21', '2016-09-30', 23, 1, '1');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(11, 5, 1, NULL, '2016-09-16', '2016-09-21', 50, 1, '1');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(12, 1, 1, NULL, '2016-09-10', '2016-09-15', 14, 1, '1,2');
INSERT INTO `tbl_quot_hotel` (`id`, `quotation_id`, `city_id`, `city_area_id`, `cin_date`, `cout_date`, `no_pax`, `hotel_id`, `room_type_id`) VALUES
	(13, 15, 1, NULL, '2016-10-22', '2016-10-29', 50, 1, '1');
/*!40000 ALTER TABLE `tbl_quot_hotel` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quot_transfers
CREATE TABLE IF NOT EXISTS `tbl_quot_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `dayplan_date` date DEFAULT NULL,
  `daytime_id` int(11) NOT NULL,
  `transfer_type_id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `txr_origin` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quot_transfers: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_quot_transfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_quot_transfers` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_quot_txr_type
CREATE TABLE IF NOT EXISTS `tbl_quot_txr_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) NOT NULL,
  `txr_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_quot_txr_type: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_quot_txr_type` DISABLE KEYS */;
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(1, 1, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(2, 1, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(3, 2, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(4, 2, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(5, 5, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(6, 5, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(7, 5, 2);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(8, 5, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(9, 1, 1);
INSERT INTO `tbl_quot_txr_type` (`id`, `quotation_id`, `txr_type`) VALUES
	(10, 15, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_room: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_room` DISABLE KEYS */;
INSERT INTO `tbl_room` (`id`, `hotel_id`, `room_type`, `room_price`, `is_active`) VALUES
	(1, 1, 'Royal Suits', 2500, 1);
INSERT INTO `tbl_room` (`id`, `hotel_id`, `room_type`, `room_price`, `is_active`) VALUES
	(2, 1, 'Delux', 1500, 1);
/*!40000 ALTER TABLE `tbl_room` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_services
CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_type_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_type_id` (`service_type_id`),
  CONSTRAINT `tbl_services_ibfk_1` FOREIGN KEY (`service_type_id`) REFERENCES `tbl_services_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_services: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;
INSERT INTO `tbl_services` (`id`, `service_type_id`, `service_name`, `service_price`, `img`) VALUES
	(1, 1, 'Dessert Safari', 200, 'desertsafari1.jpg');
INSERT INTO `tbl_services` (`id`, `service_type_id`, `service_name`, `service_price`, `img`) VALUES
	(2, 2, 'Armani Hotel Lunch', 200, 'armani.jpg');
INSERT INTO `tbl_services` (`id`, `service_type_id`, `service_name`, `service_price`, `img`) VALUES
	(3, 1, 'Ice Skating', 1900, 'iceskate1.jpeg');
INSERT INTO `tbl_services` (`id`, `service_type_id`, `service_name`, `service_price`, `img`) VALUES
	(4, 3, '14 Days Visa', 285, 'airplain.jpg');
INSERT INTO `tbl_services` (`id`, `service_type_id`, `service_name`, `service_price`, `img`) VALUES
	(5, 1, 'Hono lulu', 1200, 'beijing.jpg');
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
	(1, 'Exertation');
INSERT INTO `tbl_services_type` (`id`, `service_type`) VALUES
	(2, 'Food');
INSERT INTO `tbl_services_type` (`id`, `service_type`) VALUES
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
  KEY `transfer_type_id` (`transfer_type_id`),
  KEY `FK_tbl_transfer_tbl_city_area` (`transfer_origin`),
  KEY `FK_tbl_transfer_tbl_city_area_2` (`transfer_destination`),
  CONSTRAINT `FK_tbl_transfer_tbl_city_area` FOREIGN KEY (`transfer_origin`) REFERENCES `tbl_city_area` (`id`),
  CONSTRAINT `FK_tbl_transfer_tbl_city_area_2` FOREIGN KEY (`transfer_destination`) REFERENCES `tbl_city_area` (`id`),
  CONSTRAINT `tbl_transfer_ibfk_1` FOREIGN KEY (`transfer_type_id`) REFERENCES `tbl_transfer_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_transfer: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_transfer` DISABLE KEYS */;
INSERT INTO `tbl_transfer` (`id`, `transfer_type_id`, `transfer_origin`, `transfer_destination`, `transfer_unit_price`, `transfer_full_price`) VALUES
	(1, 2, 2, 1, '100', '200');
INSERT INTO `tbl_transfer` (`id`, `transfer_type_id`, `transfer_origin`, `transfer_destination`, `transfer_unit_price`, `transfer_full_price`) VALUES
	(2, 1, 1, 5, '100', '500');
INSERT INTO `tbl_transfer` (`id`, `transfer_type_id`, `transfer_origin`, `transfer_destination`, `transfer_unit_price`, `transfer_full_price`) VALUES
	(3, 1, 5, 1, '100', '500');
/*!40000 ALTER TABLE `tbl_transfer` ENABLE KEYS */;


-- Dumping structure for table db_quotation.tbl_transfer_type
CREATE TABLE IF NOT EXISTS `tbl_transfer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_quotation.tbl_transfer_type: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_transfer_type` DISABLE KEYS */;
INSERT INTO `tbl_transfer_type` (`id`, `transfer_type`) VALUES
	(1, '34 Seater Bus');
INSERT INTO `tbl_transfer_type` (`id`, `transfer_type`) VALUES
	(2, '2 seater Limo');
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
	(1, 'admin', 'Administrator', '123', 1, '2016-09-05 14:23:56', 1);
INSERT INTO `tbl_user` (`id`, `username`, `name`, `pass`, `is_active`, `created_on`, `is_admin`) VALUES
	(2, 'user', 'User', '123', 1, '2016-10-09 11:26:27', 0);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
