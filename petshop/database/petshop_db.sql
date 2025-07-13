-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 11:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `tanggal_checkout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `nama`, `email`, `alamat`, `telepon`, `metode_pembayaran`, `tanggal_checkout`) VALUES
(1, 'annisa zahara', 'annisazahara@gmail.com', 'bengkulu', '08123455677', NULL, '2025-07-07 09:09:39'),
(2, 'tio', 'adytiorp@gmail.com', 'villa muka kuning', '0895609811704', 'COD', '2025-07-07 09:17:28'),
(3, 'osaka', 'osaka@gmail.com', 'curup', '08969434345', 'Transfer Bank', '2025-07-07 09:26:06'),
(4, 'nadira varisha zahran', 'nadira@gmail.com', 'curup, bengkuku', '08967585763t53', 'COD', '2025-07-07 10:19:07'),
(5, 'zela', 'zela@gmail.com', 'Nongsa, Batam', '0864373873435', 'COD', '2025-07-08 13:55:45'),
(6, 'Adyanto Risqi Prasetio', 'annisazahara@gmail.com', 'jiodasiofi', '9687095897', 'COD', '2025-07-09 14:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_items`
--

CREATE TABLE `checkout_items` (
  `id` int(11) NOT NULL,
  `checkout_id` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout_items`
--

INSERT INTO `checkout_items` (`id`, `checkout_id`, `nama_produk`, `jumlah`, `harga_satuan`) VALUES
(1, 1, 'Mangkok Makan', 2, 30000),
(2, 1, 'Baju Hewan', 2, 45000),
(3, 1, 'Kalung Hewan', 2, 25000),
(4, 2, 'Makanan Kucing', 1, 85000),
(5, 2, 'Kalung Hewan', 1, 25000),
(6, 2, 'Baju Hewan', 3, 45000),
(7, 3, 'Makanan Kucing', 1, 85000),
(8, 3, 'Kalung Hewan', 1, 25000),
(9, 3, 'Baju Hewan', 3, 45000),
(10, 4, 'Baju Hewan', 1, 45000),
(11, 4, 'Mangkok Makan', 1, 30000),
(12, 5, 'Mangkok Makan', 1, 30000),
(13, 5, 'Shampoo Hewan', 1, 75000),
(14, 5, 'Snack Tuna', 1, 50000),
(15, 6, 'Baju Hewan', 1, 45000),
(16, 6, 'Mangkok Makan', 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'adytiorisqi', 'adytiorisqi@gmail.com', '$2y$10$pWvuey4U4DTjd7rxNk7cSOBX26yZchrgrwlYE4iUWdDYzjO7VvkBK'),
(2, 'adytiorp', 'adytiorp@gmail.com', '$2y$10$CeSXtevBiD8zMxL2zumHqu99wvSX86wf0JRqED4zevWNp5rWkuBbe'),
(3, 'annisa', 'annisazahara@gmail.com', '$2y$10$PqijrBpYJpVCVUKPhJpDre0PxUdAYlniKXkV7XCen.M.hgEC93ReO'),
(4, 'nadira', 'nadira@gmail.com', '$2y$10$8XGDCp4cnh1UKkgngqJyeO4fyH133v/NIQmpliMA.tJbkVzD3INs.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_items`
--
ALTER TABLE `checkout_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_id` (`checkout_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout_items`
--
ALTER TABLE `checkout_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout_items`
--
ALTER TABLE `checkout_items`
  ADD CONSTRAINT `checkout_items_ibfk_1` FOREIGN KEY (`checkout_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
