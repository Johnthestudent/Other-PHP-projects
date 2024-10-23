-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2024 at 05:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peldaexperiment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `szemelyek`
--

CREATE TABLE `szemelyek` (
  `id` int(6) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `lakcim` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `mobilszam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `szemelyek`
--

INSERT INTO `szemelyek` (`id`, `nev`, `lakcim`, `email`, `mobilszam`) VALUES
(1, 'Béla', 'Pest', 'bela@gmail.com', '0620345670'),
(2, 'Kriszta', 'Érd', 'kriszti@gmail.com', '06207744331'),
(3, 'Sanyi', 'Szolnok', 'sanyi@freemail.com', '06203322111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `szemelyek`
--
ALTER TABLE `szemelyek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `szemelyek`
--
ALTER TABLE `szemelyek`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
