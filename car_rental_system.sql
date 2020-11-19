-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2020 at 01:59 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
DROP DATABASE IF EXISTS CAR_RENTAL_SYSTEM;
CREATE DATABASE CAR_RENTAL_SYSTEM;
USE CAR_RENTAL_SYSTEM;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `co527`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `driver_id` int(10) NOT NULL,
  `req_date` date NOT NULL,
  `req_time` time NOT NULL,
  `pickup_loc` varchar(15) NOT NULL,
  `drop_loc` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_ix` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `car_id`, `driver_id`, `req_date`, `req_time`, `pickup_loc`, `drop_loc`) VALUES
(21, 3, 2, 2, '2020-06-18', '06:50:00', 'Main street', 'Trinco road'),
(22, 3, 5, 1, '2020-06-26', '01:54:00', 'Main street', 'Trinco road'),
(20, 3, 2, 2, '2020-06-18', '06:50:00', 'Main street', 'Trinco road'),
(23, 3, 5, 4, '2020-06-24', '17:50:00', 'Central park', 'Municipal counc'),
(24, 2, 2, 4, '2020-06-30', '21:38:00', 'Central park', 'Municipal counc'),
(26, 7, 25, 6, '2020-06-23', '08:17:00', 'Kovil Road', 'BOC Bank'),
(27, 6, 28, 10, '2020-06-27', '16:19:00', 'Main Street', 'Children Park'),
(28, 5, 22, 7, '2020-06-24', '08:21:00', 'Kali Kovil', 'Post office');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hire_rate` int(10) NOT NULL,
  `no_plate` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `availability` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `car_ix` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `hire_rate`, `no_plate`, `model`, `availability`) VALUES
(2, 2000, 'CAA 6548', 'NISSAN', 'Not available'),
(5, 1000, 'CAD 5454', 'Maruti', 'Not available'),
(20, 10000, 'CAA 7584', 'RR Cullian', 'available'),
(22, 1000, 'WP KC 3436', 'Mazda', 'Not available'),
(23, 1000, 'CP KA 3436', 'Hundai', 'available'),
(24, 1000, '251-1234', 'Honda', 'available'),
(25, 1500, 'CP CAA1543', 'Audi', 'Not available'),
(26, 1500, 'CP CAA 2843', 'Toyota Corolla', 'available'),
(27, 1000, 'EP KC 9936', 'Toyota', 'Not available'),
(28, 1000, 'WP CAA 3422', 'Benz', 'Not available'),
(29, 1000, 'CP CCB 1543', 'BMW', 'Not available'),
(30, 1000, 'NP PA 6534', 'Suzuki', 'available'),
(31, 1500, 'WP CAA 6521', 'Ford', 'available'),
(32, 2000, 'WP CCA 8697', 'Tesla', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `address` varchar(40) NOT NULL,
  `P_no` int(15) NOT NULL,
  `NIC_no` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `P_no`, `NIC_no`, `username`, `password`) VALUES
(1, 'Vinayak', 'NO 54,Corner Street,Batticaloa', 776903585, '753791981v', 'abcd', '1234'),
(2, 'david', 'No 65, central road,colombo', 778689544, '853780879v', 'david', '1234'),
(3, 'John', 'No 85, central road,colombo', 758684544, '953710179v', 'john', '1234'),
(4, 'Wickrama', 'No 7/4,Temple Road,Colombo', 756432345, '976543888v', 'Wickrama', 'wic1234'),
(5, 'Lahoora', 'No 54,Akurana,Kandy', 778732345, '996973088v', 'lahoora', 'lahoo12'),
(6, 'Sahara', 'No 93,Grandpass Lane,Colombo', 770931545, '896072098v', 'sahara07', 'abcd123'),
(7, 'Kholi', 'No 65,Kovil Road,Vavuniya', 774938945, '908853568v', 'kholi07', 'kholiabcd'),
(8, 'Williamson', 'No 7/4,Temple Road,Kandy', 774127634, '911859568v', 'williamson12', '11234567');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `NIC_no` varchar(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `P_No` int(15) NOT NULL,
  `available` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ix` (`id`),
  UNIQUE KEY `driver_ix` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `NIC_no`, `address`, `P_No`, `available`) VALUES
(1, 'David', '882678895v', 'NO 34,Main Street,Batticaloa', 775892474, 'Not available'),
(2, 'Ram', '78365422v', 'No12,Trinco road,Batticaloa', 775124128, 'available'),
(4, 'Dev', '9258964755v', 'No 65, central road,colombo', 758992322, 'Not available'),
(6, 'John', '9258960745v', 'No 85, central road,colombo', 758992322, 'available'),
(7, 'Jero', '901726877v', 'No 13,Jaffna Road,Kandy', 776542383, 'Not available'),
(8, 'Suthan', '875439122v', 'No 54,Peradeniya,Kandy', 777092536, 'Not available'),
(9, 'Kaleel', '786548677v', 'No 93,Main Stret,Ampara', 779842309, 'available'),
(10, 'Cans', '890873912v', 'No 73/74,Temple Road,Colombo', 714598765, 'Not available'),
(11, 'Jackie', '874365098v', 'No 7/4,Postoffice road,Kilinochi', 714096765, 'available'),
(12, 'Karan', '763490233v', 'No 95,Bank Road,Batticalo', 79845734, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_date` date NOT NULL,
  `driver_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `is_settled` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`id`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
  DROP USER IF EXISTS user1@'localhost';
  DROP USER IF EXISTS user2@'localhost';
  DROP USER IF EXISTS user3@'localhost';
  DROP USER IF EXISTS customer_access@'localhost';
  
  CREATE USER user1@'localhost' IDENTIFIED BY '1234';
  CREATE USER user2@'localhost' IDENTIFIED BY '1234';
  CREATE USER user3@'localhost' IDENTIFIED BY '1234';
  CREATE USER customer_access@'localhost' IDENTIFIED BY '1234';

GRANT SELECT,UPDATE,DELETE,INSERT ON CAR_RENTAL_SYSTEM.* TO user1@'localhost';
GRANT SELECT,UPDATE,DELETE,INSERT ON CAR_RENTAL_SYSTEM.* TO user2@'localhost';
GRANT SELECT,UPDATE,DELETE,INSERT ON CAR_RENTAL_SYSTEM.* TO user3@'localhost';

GRANT SELECT,UPDATE ON CAR_RENTAL_SYSTEM.car TO customer_access@'localhost';
GRANT SELECT,UPDATE ON CAR_RENTAL_SYSTEM.driver TO customer_access@'localhost';
GRANT INSERT ON CAR_RENTAL_SYSTEM.bookings TO customer_access@'localhost';
GRANT SELECT,INSERT ON CAR_RENTAL_SYSTEM.customer TO customer_access@'localhost';

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
