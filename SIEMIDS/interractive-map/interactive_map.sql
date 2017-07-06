-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 12:05 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interactive_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `ip`, `title`, `description`, `lat`, `lon`) VALUES
(1, '192.168.101.5', 'Gojal', 'Gilgit-Baltistan, Jammu and Kashmir', '36.6844303', '74.8118142'),
(2, '192.168.101.5', '', 'Khyber-Pakhtunkhwa', '34.0677778', '71.1404287'),
(3, '192.168.101.5', 'Gojal', 'Gilgit, Jammu and Kashmir', '36.3904458', '74.8545057'),
(4, '192.168.101.5', 'Gilgit Valley', 'Gilgitâ€“Baltistan ', '35.4002051', '73.520501'),
(5, '192.168.101.5', 'Singul', 'Azad Kashmir', '36.0525874', '74.0592755'),
(6, '192.168.101.5', '', '', '36.5677057', '73.7404543'),
(7, '', '', '', '36.3488145', '73.8025754'),
(8, '192.168.101.5', 'Ghizer District', ' Gilgit-Baltistan, Jammu and Kashmir', '36.3648624', '73.2997031'),
(9, '', '', '', '35.1504727', '72.4788362'),
(10, '', 'Peshawar District', 'Khyber Pakhtunkhwa', '34.0769759', '71.4440488'),
(11, '', 'Peshawar District', 'Khyber Pukhtunkhwa', '33.9136535', '71.5459897'),
(12, '', '', 'Khyber Pukhtunkhwa', '33.9089973', '71.7965489'),
(13, '', 'Nowshera District', 'Khyber Pakhtunkhwa', '33.8395872', '71.861894'),
(14, '', '', 'Khyber Pakhtunkhwa', '32.24472', '74.252445'),
(15, '', 'Peshawar', 'Khyber Pakhtunkhwa', '33.8027312', '72.2242605'),
(16, '', 'Taxila', 'Punjab ', '33.7875294', '72.7235649'),
(17, '', 'Islamabad ', 'Punjab', '33.5449075', '73.1630222'),
(18, '', 'Haveli District', 'Azad Jammu and Kashmir', '33.9252983', '73.8243783'),
(19, '', '', '', '', ''),
(20, '', 'Rawalpindi', 'Punjab', '33.4120706', '73.4648733'),
(21, '', 'Rawalpindi', 'Punjab', '33.339169', '73.4446978'),
(22, '', 'Ziarat District', '', '30.2860909', '68.2245804'),
(23, '', 'district ', 'Balochistan ', '30.1018814', '67.9223941'),
(24, '', 'Loralai District', 'Balochistan ', '30.1546959', '68.541984'),
(25, '', 'Loralai District', 'Balochistan ', '30.3792567', '68.5115985'),
(26, '', 'Khairpur District', 'Sindh ', '27.6135381', '68.3257769'),
(27, '', 'Jhal Magsi district', 'Balochistan ', '28.3728232', '67.008213'),
(28, '', 'Kohat District', 'Khyber Pakhtunkhwa', '33.4953811', '71.6547201');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
