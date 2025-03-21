-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 12:50 PM
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
-- Database: `movie_dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

CREATE TABLE `customer_reg` (
  `id` int(5) NOT NULL,
  `Customer_Name` varchar(500) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Age` int(5) NOT NULL,
  `image` longblob NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`id`, `Customer_Name`, `Gender`, `Age`, `image`, `email`, `mobile`, `Password`, `State`, `City`, `Address`) VALUES
(1, 'Amit Kushwaha', 'Male', 22, 0x6c6f676f2f313734303832303730345f53637265656e73686f7420323032352d30322d32312061742031322d31332d343620656861726d6f6e792066696e642061757468656e74696320636f6e6e656374696f6e207769746820736f6d656f6e652077686f206765747320796f752e706e67, 'amitpss239@gmail.com', '1234567890', '12345', 'Uttar Pradesh', 'Noida', 'noida sector 58'),
(6, 'aman kumar', 'Male', 0, 0x6c6f676f2f313734313030343337335f313638363138313830363435352e6a706567, 'amitpss2399@gmail.com', '1234567890', '12345', '', '', '0'),
(8, 'Amit k', 'Male', 0, 0x6c6f676f2f313734313030343332335f313732303730353835373930352e6a706567, 'amitk@gmail.com', '1234567890', '12345', '', '', '0'),
(12, 'amit', 'Male', 0, 0x6c6f676f2f313734313030343432385f616d69742e706e67, 'amitpss23999@gmail.com', '1234567890', '12345', '', '', '0'),
(14, 'sita devi', 'Female', 0, 0x6c6f676f2f313734313030343036335f313732363230353534323533322e6a706567, 'sita@mail.com', '1234567898', '12345', '', '', 'sdftgyhjkytre'),
(15, 'Radha', 'Female', 22, 0x6c6f676f2f313734303939363734375f313336303335302e706e67, 'radha@gmail.com', '1234567890', '12345', 'Uttar Pradesh', 'Ghaziabad', 'fhjkl;lkjhgfdsdfghjksdfdsgdf'),
(16, 'Anil Yadav', 'Male', 23, 0x6c6f676f2f313734313030343438315f313732303730353835373930352e6a706567, 'anil@gmail.com', '1234567898', '12345', '', '', 'fghjgfjh'),
(17, 'amrita', 'Female', 22, 0x6c6f676f2f313734313332363339305f313732353934333032353837332e6a706567, 'sharma81amrita@gmail.com', '2147483647', 'Lovetheflow@9', '', 'NCR', 'gaur city'),
(18, 'swati ', 'Female', 22, 0x6c6f676f2f313734323534333039315f556e7469746c65642e706e67, 'swatirai@gmail.com', '2147483647', '123456', 'Delhi', '', 'ncxfdsghcdvc'),
(19, 'deepa', 'Female', 23, '', 'deepa@gmail.com', '2147483647', 'deepa', '', '', 'noida'),
(20, 'Naman Maurya', 'Male', 23, '', 'naman@gmail.com', '1111111111', '12345', 'Uttar Pradesh', 'NCR', 'sfasdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_reg`
--
ALTER TABLE `customer_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_reg`
--
ALTER TABLE `customer_reg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
