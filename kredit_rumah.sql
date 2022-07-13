-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2022 at 02:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kredit_rumah`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kredit`
--

CREATE TABLE `data_kredit` (
  `id` int(11) NOT NULL,
  `harga` int(50) NOT NULL,
  `bunga` int(10) NOT NULL,
  `uangdp` int(10) NOT NULL,
  `tenor` int(10) NOT NULL,
  `margin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kredit`
--

INSERT INTO `data_kredit` (`id`, `harga`, `bunga`, `uangdp`, `tenor`, `margin`) VALUES
(0, 100000000, 5, 30, 5, 'Flat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kredit`
--
ALTER TABLE `data_kredit`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
