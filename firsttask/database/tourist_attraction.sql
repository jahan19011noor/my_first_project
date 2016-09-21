-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2014 at 06:18 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourist_attraction`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `text` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `text`) VALUES
(1, 'images/aboutus.jpg', 'Our beloved country Bangladesh was listed by Lonely Planet in 2011 as the "best value destination". Our greatest destination is to show up the beauty of our country as our pride and and our honor to the world.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE IF NOT EXISTS `admin_panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `name`, `password`) VALUES
(1, 'Noor Jahan', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local_address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `local_address`, `email`, `phone`, `zip_code`) VALUES
(1, 'Building No:1, Shamimabad Road, Kanishail, Sylhet-3100\r\n', 'beautifulbangladesh19011@yahoo.com', '01731104408', 'Sylhet - 3100');

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE IF NOT EXISTS `image_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `division` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `about` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`id`, `image`, `division`, `place`, `about`) VALUES
(1, 'databaseimages/chitagong/Cox''s_Bazar.jpg', 'chittagong', 'coxs bazar', 'Cox''s Bazar is the longest natural unbroken sea beach in the world.'),
(2, 'databaseimages/chitagong/Saint_Martin''s_Island.jpg', 'chittagong', 'St.martin', 'Dead corals at St. Martin''s Island'),
(3, 'databaseimages/chitagong/Bandarban_Nilgiri.jpg', 'chittagong', 'bandarban', 'Nilgiri'),
(4, 'databaseimages/chitagong/Kapatailake.jpg', 'chittagong', 'Rangamati', 'Kaptai Lake, Rangamati'),
(5, 'databaseimages/chitagong/khagrachari.jpg', 'chittagong', 'khagrachari', 'khagrachari'),
(6, 'databaseimages/chitagong/Potenga_beach.jpg', 'chittagong', 'Patenga Beach', 'Patenga beach'),
(7, 'databaseimages/chitagong/foys_lake_water.jpg', 'chittagong', 'foy''s lake', 'Foys lake'),
(8, 'databaseimages/chitagong/heritagepark.jpg', 'chittagong', 'heritage park', 'The heritage park tower in Chittagong, Bangladesh. This 71-metre tower in Mini Bangladesh/ heritage '),
(9, 'databaseimages/chitagong/Ethnological_Museum.jpg', 'chittagong', 'ethnological museum', 'Chittagong Ethnological Museum'),
(10, 'databaseimages/chitagong/War_cemetary.jpg', 'chittagong', 'war cemetery', 'Chittagong War Cemetery'),
(11, 'databaseimages/dhaka/Cresent_lake.jpg', 'dhaka', 'crescent lake', 'Crescent Lake in Dhaka, Bangladesh'),
(12, 'databaseimages/dhaka/Lalbagh_Fort.jpg', 'dhaka', 'lalbagh fort', 'Lalbagh Fort, Dhaka, Bangladesh'),
(13, 'databaseimages/dhaka/Ahsan_Manjil.jpg', 'dhaka', ' Ahsan Manzil', ' Ahsan Manzil'),
(14, 'databaseimages/dhaka/Shaheed_Minar.jpg', 'dhaka', 'Shaheed Minar', 'Shaheed Minar'),
(15, 'databaseimages/dhaka/Sriti_shoud.jpeg', 'dhaka', 'Jatiyo Smriti Soudho', 'Jatiyo Smriti Soudho'),
(16, 'databaseimages/dhaka/Sangshad_Assembly_Hall.jpg', 'dhaka', 'Jatiya Sangshad', 'Bangladesh Parliament Assembly Hall'),
(17, 'databaseimages/RajshahiandRangpur/Somapura_Mahavihara.jpg', 'rajshahi and rangpur', 'Somapura Mahavihara', 'Somapura Mahavihara is a World Heritage Site.'),
(18, 'databaseimages/RajshahiandRangpur/Mahasthangarh.jpg', 'rajshahi and rangpur', 'Mahasthangarh', 'Ramparts of the Mahasthangarh citadel'),
(19, 'databaseimages/RajshahiandRangpur/Behula.jpg', 'rajshahi and rangpur', 'Behula', 'Behula Lakhindar Basor Ghor at Bogra'),
(20, 'databaseimages/RajshahiandRangpur/Kantajew.jpg', 'rajshahi and rangpur', 'Kantaji Temple', 'A late-medieval Hindu temple'),
(21, 'databaseimages/RajshahiandRangpur/Varendra.jpg', 'rajshahi and rangpur', 'Varendra Research Museum', 'Varendra Research Museum in Rajshahi'),
(22, 'databaseimages/barisal/Kuakata_beach.jpg', 'barisal', 'Kuakata Beach', 'Kuakata is a panaromic sea beach on the southernmost tip of Bangladesh'),
(23, 'databaseimages/sylhet/Ulluk.jpg', 'sylhet', 'Lawachara National Park', 'A mother hoolock with her child at Lawachara National Park.'),
(24, 'databaseimages/sylhet/Zero_Point.jpg', 'sylhet', 'Jaflong', 'Zero Point at Zuflong'),
(25, 'databaseimages/khulna/Axis.jpg', 'khulna', 'Sundarbans', 'Chital Deer is widely seen in Sundarbans'),
(26, 'databaseimages/khulna/Mosque.jpg', 'khulna', 'Bagerhat', 'Sixty Dome Mosque in Bagerhat Bangladesh'),
(27, 'databaseimages/dhaka/banglar-tajmahal.jpg', 'dhaka', 'sonargaon', 'Banglar Tajmahal, Sonargaon, Narayanganj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'Noor Jahan', '5f4dcc3b5aa765d61d8327deb882cf99', 'Noor', 'Jahan'),
(2, 'TMukammel', '64aa2de4e393677804a2bbd33eb526a0', 'Twaha', 'Mukammel'),
(3, 'SAlam', 'cce0cfd55cc3ecb648d93b7b0ba025b1', 'Siful', 'Alam'),
(4, 'AIbrahim', 'f1c083e61b32d3a9be76bc21266b0648', 'Abu', 'Ibrahim'),
(5, 'IHussain', 'a1a73c3a13c8e4dfe2058a572784816d', 'Ikram', 'Hussain'),
(6, 'Munna', 'cf72c35762cb653212e7edebf8bd53d8', 'Munna', 'Amina');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE IF NOT EXISTS `user_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
