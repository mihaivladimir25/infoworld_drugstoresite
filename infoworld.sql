-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 08:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nume` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nume`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `nume` varchar(150) NOT NULL,
  `prenume` varchar(150) NOT NULL,
  `cnp` bigint(20) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `nr_telefon` bigint(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nume`, `prenume`, `cnp`, `adresa`, `nr_telefon`, `email`, `username`, `password`) VALUES
(1, 'Cojocaru', 'Mihai', 5011025653289, 'Bd Iuliu Maniu', 744635018, 'mihai@gmail.com', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

CREATE TABLE `comanda` (
  `id` int(10) UNSIGNED NOT NULL,
  `produs` varchar(150) NOT NULL,
  `pret` decimal(10,0) NOT NULL,
  `cantitate` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `data` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `nume_client` varchar(255) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `adresa_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comanda`
--

INSERT INTO `comanda` (`id`, `produs`, `pret`, `cantitate`, `total`, `data`, `status`, `nume_client`, `email_client`, `adresa_client`) VALUES
(1, 'Nurofen Raceala si Gripa', '35', 1, '35', '2023-03-25 08:43:13', 'Aprobata', 'Mihai Cojocaru', 'mihaicojocaru50@gmail.com', 'Bd Iuliu Maniu'),
(2, 'Paracetamol', '2', 1, '2', '2023-03-25 08:46:39', 'In asteptare', 'client2', 'client@mail.com', 'Adresa'),
(3, 'Termometru auricular pentru copii', '340', 100, '34000', '2023-03-25 08:49:04', 'Respinsa', 'client3', 'client3@mail.com', 'Adresa3');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(10) UNSIGNED NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `gramaj` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `pret` decimal(10,0) NOT NULL,
  `stoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `denumire`, `descriere`, `gramaj`, `image_name`, `pret`, `stoc`) VALUES
(1, 'ACC', 'Medicamente fara reteta\r\n\r\nBrand: SANDOZ', '20', 'Produs-6643.jpg', '30', 26),
(2, 'Colebil', 'Medicamente fara reteta\r\n\r\nBrand: BIOFARM', '20', 'Produs-1892.jpg', '15', 10),
(3, 'Paracetamol', 'Medicamente fara reteta\r\n\r\nBrand: TERAPIA', '500', 'Produs-9819.jpg', '2', 100),
(4, 'Sinupret', 'Medicamente fara reteta\r\n\r\nBrand: BIONORICA', '50', 'Produs-4540.jpg', '40', 6),
(5, 'Nurofen Raceala si Gripa', 'Medicamente fara reteta\r\n\r\nBrand: NUROFEN', '24', 'Produs-9089.jpg', '35', 20),
(6, 'Panadol Extra', 'Medicamente fara reteta\r\n\r\nBrand: GSK', '12', 'Produs-6880.jpg', '10', 30),
(7, 'Termometru digital', 'Tehnico-Medicale\r\n\r\nBrand: MEDEL', '1', 'Produs-9920.jpg', '15', 5),
(8, 'Tensiometru semi-automat', 'Tehnico-Medicale\r\n\r\nBrand: SENDO', '1', 'Produs-473.jpg', '200', 10),
(9, 'Termometru auricular pentru copii', 'Tehnico-Medicale\r\n\r\nBrand: BRAUN', '1', 'Produs-9899.jpg', '340', 2),
(10, 'Sampon Oily', 'Frumusete si ingrijire\r\n\r\nBrand: SEBORADIN', '200', 'Produs-8056.jpg', '35', 10),
(11, 'Balsam de buze reparator Cicaplast', 'Frumusete si ingrijire\r\n\r\nBrand: LA ROCHE-POSAY', '7', 'Produs-6921.jpg', '20', 10),
(12, 'Lotiune hidratanta pentru fata si corp piele uscata si foarte uscata', 'Frumusete si ingrijire\r\n\r\nBrand: CERAVE', '473', 'Produs-1940.jpg', '60', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
