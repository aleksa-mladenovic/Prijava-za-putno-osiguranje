-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polisa_osiguranja`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodatni_nosioci`
--

CREATE TABLE `dodatni_nosioci` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(255) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasosa` varchar(20) NOT NULL,
  `id_nad_nosioca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dodatni_nosioci`
--

INSERT INTO `dodatni_nosioci` (`id`, `ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `id_nad_nosioca`) VALUES
(1, 'Alex Doe', '2000-07-21', '014567382', 2),
(2, 'Luke Doe', '2005-11-10', '014567391', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nosioci`
--

CREATE TABLE `nosioci` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(255) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasosa` varchar(20) NOT NULL,
  `broj_telefona` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `datum_pocetka` date NOT NULL,
  `datum_kraja` date NOT NULL,
  `broj_dana` int(11) NOT NULL,
  `tip_polise` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nosioci`
--

INSERT INTO `nosioci` (`id`, `ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `broj_telefona`, `email`, `datum_pocetka`, `datum_kraja`, `broj_dana`, `tip_polise`, `timestamp`) VALUES
(1, 'Jhon Doe', '1974-02-13', '023146759', '0612345678', 'test@email.com', '2024-02-13', '2024-02-18', 5, 0, '2024-02-11 14:45:12'),
(2, 'Lisa Doe', '1980-06-19', '019283756', '0698765432', 'test2@email.com', '2024-02-13', '2024-02-18', 5, 1, '2024-02-11 14:45:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodatni_nosioci`
--
ALTER TABLE `dodatni_nosioci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nad_nosioca` (`id_nad_nosioca`);

--
-- Indexes for table `nosioci`
--
ALTER TABLE `nosioci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodatni_nosioci`
--
ALTER TABLE `dodatni_nosioci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nosioci`
--
ALTER TABLE `nosioci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dodatni_nosioci`
--
ALTER TABLE `dodatni_nosioci`
  ADD CONSTRAINT `dodatni_nosioci_ibfk_1` FOREIGN KEY (`id_nad_nosioca`) REFERENCES `nosioci` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
