-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2020 at 07:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garikoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'toufiq', 'admin@gmail.com', '90512d30e18c46f42edab1553a398801');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(100) NOT NULL AUTO_INCREMENT,
  `booking_datetime` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `booking_time` varchar(255) DEFAULT NULL,
  `booking_date` varchar(255) DEFAULT NULL,
  `booking_name` varchar(255) DEFAULT NULL,
  `booking_mobile` varchar(255) DEFAULT NULL,
  `booking_passengernum` int(100) DEFAULT NULL,
  `booking_pickuptime` varchar(255) DEFAULT NULL,
  `booking_pickupdate` varchar(255) DEFAULT NULL,
  `booking_pickupaddress` varchar(255) DEFAULT NULL,
  `booking_dropoffaddress` varchar(255) DEFAULT NULL,
  `booking_ride_id` int(100) DEFAULT NULL,
  `booking_numofcars` int(100) DEFAULT NULL,
  `booking_cost` int(200) NOT NULL,
  `booking_status` varchar(255) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `booking_ride_id` (`booking_ride_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_datetime`, `booking_time`, `booking_date`, `booking_name`, `booking_mobile`, `booking_passengernum`, `booking_pickuptime`, `booking_pickupdate`, `booking_pickupaddress`, `booking_dropoffaddress`, `booking_ride_id`, `booking_numofcars`, `booking_cost`, `booking_status`) VALUES
(1, NULL, '10:04 am', 'Wed, 09-Sep-2020  ', 'ratul', '01889955766', 6, '13:05', '2020-09-09', '33, strt', 'daulatpur', 4, 1, 0, 'yet not'),
(2, NULL, '10:15 am', 'Wed, 09-Sep-2020  ', 'Mr hassan', '01889945545', 30, '14:15', '2020-09-16', 'Shib Bari Mor, Khulna', 'Mogla EPZ', 6, 1, 1200, 'yet not'),
(3, NULL, '10:15 am', 'Wed, 09-Sep-2020  ', 'Mr hassan', '01889945545', 30, '14:15', '2020-09-16', 'Shib Bari Mor, Khulna', 'Mogla EPZ', 6, 1, 0, 'yet not'),
(4, NULL, '10:17 am', 'Wed, 09-Sep-2020  ', 'kaes', '01812121212', 5, '11:17', '2020-09-28', 'Shib Bari Mor, Khulna', 'jeshore', 7, 1, 1200, 'yet not'),
(5, NULL, '10:24 am', 'Wed, 09-Sep-2020  ', 'ratul', '01889955766', 4, '00:24', '2020-09-16', 'Shib Bari Mor, Khulna', 'daulatpur', 3, 1, 1200, 'no'),
(6, NULL, '10:24 am', 'Wed, 09-Sep-2020  ', 'ratul', '01889955766', 4, '00:24', '2020-09-16', 'Shib Bari Mor, Khulna', 'daulatpur', 3, 1, 1000, 'on the way');

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

DROP TABLE IF EXISTS `rides`;
CREATE TABLE IF NOT EXISTS `rides` (
  `ride_id` int(100) NOT NULL AUTO_INCREMENT,
  `ride_type` varchar(255) DEFAULT NULL,
  `ride_name` varchar(255) DEFAULT NULL,
  `ride_image` varchar(255) NOT NULL,
  `ride_passengercap` int(100) DEFAULT NULL,
  `ride_baggagecap` int(100) DEFAULT NULL,
  PRIMARY KEY (`ride_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ride_id`, `ride_type`, `ride_name`, `ride_image`, `ride_passengercap`, `ride_baggagecap`) VALUES
(4, 'Four Wheeler/à¦šà¦¾à¦° à¦šà¦¾à¦•à¦¾', 'Toyota primo', './img/toyota_primo.jpg', 6, 8),
(3, 'Four Wheeler/à¦šà¦¾à¦° à¦šà¦¾à¦•à¦¾', 'Toyota Coralla', './img/ex_corolla.jpg', 4, 6),
(5, 'Eight wheels/ à¦†à¦Ÿ à¦šà¦¾à¦•à¦¾ ', 'Hondai Bus', './img/20seatbus.jpg', 20, 100),
(6, 'Eight wheels/ à¦†à¦Ÿ à¦šà¦¾à¦•à¦¾ ', 'Bus Large', './img/40seatbus.jpg', 40, 230),
(7, 'Four Wheeler/à¦šà¦¾à¦° à¦šà¦¾à¦•à¦¾', 'Scorpio Jeep/ SUV', './img/jeep.jpg', 8, 20),
(8, 'Three Wheeler/ à¦¤à¦¿à¦¨ à¦šà¦¾à¦•à¦¾', 'Auto Rickshaw-Battery ', './img/autorikshaw.jpg', 5, 6),
(9, 'Three Wheeler/ à¦¤à¦¿à¦¨ à¦šà¦¾à¦•à¦¾', 'Auto Rickshaw-Battery 2p', './img/autorikshaw2.jpg', 2, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
