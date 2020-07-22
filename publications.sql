-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2020 at 03:15 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daniels`
--

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `serialID` varchar(255) NOT NULL,
  PRIMARY KEY (`sn`),
  UNIQUE KEY `serial` (`serialID`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`sn`, `title`, `description`, `file`, `image`, `category`, `serialID`) VALUES
(68, 'Eclipse of Destiny', 'Eclipse of Destiny Eclipse of Destiny Eclipse of Destiny Eclipse of Destiny \" Eclipse of Destiny Eclipse of Destiny Eclipse of Destiny Eclipse of Destiny Eclipse of Destiny', '../uploads/file2020-7-21-15953598386710.pdf', '../uploads/image2020-7-21-15953598386711.jpg', 'MovieMagazine', '2020-7-21-1595359838671'),
(75, 'Priceless Jewel 1', 'Priceless Jewel 1 Priceless Jewel 1Priceless Jewel 1Priceless Jewel 1Priceless Jewel 1Priceless Jewel 1Priceless Jewel 1Priceless Jewel 1Priceless Jewel 1', '../uploads/file2020-7-22-15954261274751.pdf', '../uploads/image2020-7-22-15954261274751.jpg', 'Ebook', '2020-7-22-1595426127475'),
(74, 'Hidden Agreement', 'The place was parked full with opposite genders drinking and sipping pepper soup. On the exterior right side of the beer parlor were five high life people two playing draught while the other three watched. One of the five is a 19 years old lady who is\nalso a waitress at the beer parlor.', '../uploads/file2020-7-22-15954253511211.pdf', '../uploads/image2020-7-22-15954253511211.jpg', 'MovieMagazine', '2020-7-22-1595425351121'),
(77, 'Priceless Jewel 2', 'Priceless Jewel 2 Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2Priceless Jewel 2', '../uploads/file2020-7-22-15954262497931.pdf', '../uploads/image2020-7-22-15954262497931.jpg', 'Ebook', '2020-7-22-1595426249793');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
