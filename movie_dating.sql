-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 08:11 AM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(5) NOT NULL,
  `user_Details` int(5) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `movie_name` varchar(500) NOT NULL,
  `movie_desc` varchar(500) NOT NULL,
  `movie_id` int(5) NOT NULL,
  `opposite` int(255) NOT NULL,
  `opposite_email` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_Details`, `user_email`, `movie_name`, `movie_desc`, `movie_id`, `opposite`, `opposite_email`, `Status`) VALUES
(1, 1, '', '17', '', 0, 0, '', ''),
(2, 15, '', '16', '', 0, 0, '', ''),
(3, 15, '', '16', '', 0, 0, '', ''),
(4, 15, '', '12', '', 0, 0, '', ''),
(5, 15, '', '16', '', 0, 0, '', 'pending'),
(6, 16, '', '17', '', 0, 0, '', 'pending'),
(7, 16, '', '17', '', 0, 0, '', 'pending'),
(8, 16, '', '8', '', 0, 15, '', 'pending'),
(9, 17, 'sharma81amrita@gmail.com', '', '', 8, 12, '', 'pending'),
(10, 17, 'sharma81amrita@gmail.com', '', '', 1, 6, '', 'pending'),
(11, 1, 'amitpss239@gmail.com', '', '', 4, 14, '', 'pending'),
(12, 1, 'amitpss239@gmail.com', '', '', 6, 14, '', 'pending'),
(13, 1, 'amitpss239@gmail.com', '', '', 4, 17, '', 'pending'),
(14, 1, 'amitpss239@gmail.com', '', '', 6, 17, 'sharma81amrita@gmail.com', 'pending'),
(15, 1, 'amitpss239@gmail.com', '', '', 6, 15, '', 'pending'),
(16, 1, 'amitpss239@gmail.com', '', '', 6, 15, '', 'pending'),
(17, 1, 'amitpss239@gmail.com', '', '', 5, 14, 'sita@mail.com', 'Accepted'),
(18, 1, 'amitpss239@gmail.com', '', '', 8, 15, 'radha@gmail.com', 'pending'),
(19, 16, 'anil@gmail.com', '', '', 4, 14, 'sita@mail.com', 'pending'),
(20, 14, 'sita@mail.com', '', '', 3, 12, 'amitpss23999@gmail.com', 'pending'),
(21, 14, 'sita@mail.com', '', '', 5, 1, 'amitpss239@gmail.com', 'Accepted');

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
  `mobile` int(11) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`id`, `Customer_Name`, `Gender`, `Age`, `image`, `email`, `mobile`, `Password`, `State`, `City`, `Address`) VALUES
(1, 'Amit Kushwaha', 'Male', 22, 0x6c6f676f2f313734303832303730345f53637265656e73686f7420323032352d30322d32312061742031322d31332d343620656861726d6f6e792066696e642061757468656e74696320636f6e6e656374696f6e207769746820736f6d656f6e652077686f206765747320796f752e706e67, 'amitpss239@gmail.com', 1234567890, '12345', 'Uttar Pradesh', 'Noida', 'noida sector 58'),
(6, 'aman kumar', 'Male', 0, 0x6c6f676f2f313734313030343337335f313638363138313830363435352e6a706567, 'amitpss2399@gmail.com', 1234567890, '12345', '', '', '0'),
(8, 'Amit k', 'Male', 0, 0x6c6f676f2f313734313030343332335f313732303730353835373930352e6a706567, 'amitk@gmail.com', 1234567890, '12345', '', '', '0'),
(12, 'amit', 'Male', 0, 0x6c6f676f2f313734313030343432385f616d69742e706e67, 'amitpss23999@gmail.com', 1234567890, '12345', '', '', '0'),
(14, 'sita devi', 'Female', 0, 0x6c6f676f2f313734313030343036335f313732363230353534323533322e6a706567, 'sita@mail.com', 1234567898, '12345', '', '', 'sdftgyhjkytre'),
(15, 'Radha', 'Female', 22, 0x6c6f676f2f313734303939363734375f313336303335302e706e67, 'radha@gmail.com', 1234567890, '12345', 'Uttar Pradesh', 'Ghaziabad', 'fhjkl;lkjhgfdsdfghjksdfdsgdf'),
(16, 'Anil Yadav', 'Male', 23, 0x6c6f676f2f313734313030343438315f313732303730353835373930352e6a706567, 'anil@gmail.com', 1234567898, '12345', '', '', 'fghjgfjh'),
(17, 'amrita', 'Female', 22, 0x6c6f676f2f313734313332363339305f313732353934333032353837332e6a706567, 'sharma81amrita@gmail.com', 2147483647, 'Lovetheflow@9', '', 'NCR', 'gaur city');

-- --------------------------------------------------------

--
-- Table structure for table `movie_details`
--

CREATE TABLE `movie_details` (
  `id` int(5) NOT NULL,
  `m_image` longblob NOT NULL,
  `Name` varchar(255) NOT NULL,
  `movie_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_details`
--

INSERT INTO `movie_details` (`id`, `m_image`, `Name`, `movie_details`) VALUES
(1, 0x6c6f676f2f363763326462363164353463315f636f75706c652d363739363433335f313238302e6a7067, 'love all us', 'Expressing love can sometimes be a challenge, but the right words make all the difference. Whether you’re celebrating V'),
(3, 0x6c6f676f2f363763326561363130623832315f626573742d726f6d616e7469632d6d6f766965732d323032332d61667465722d65766572797468696e672d363461643935616630636239662e6a7067, 'After Every things', ''),
(4, 0x6c6f676f2f363763353861353765666439625f626573742d726f6d616e7469632d6d6f766965732d323032332d61667465722d65766572797468696e672d363461643935616630636239662e6a7067, 'Romantic', 'this is full form romance that are used for cuples'),
(5, 0x6c6f676f2f363763353861616430316531385f6c6f76652d68617070656e732d696e2d7468652d706f737465722d315f32303030782e6a7067, 'Love Happens', ''),
(6, 0x6c6f676f2f363763353866643838373830375f3832333432322e706e67, 'Ram Lakhna', ''),
(7, 0x68747470733a2f2f6d2e6d656469612d616d617a6f6e2e636f6d2f696d616765732f4d2f4d5635424d47566b5a6a42694f5759745a5441794f4330304d5752684c54686a595455745a4756695a6a49774e6d4d795a44526a586b4579586b4671634763402e5f56315f2e6a7067, 'Kaho Naa Pyaar Hai 2', ''),
(8, 0x68747470733a2f2f736861616469776973682e636f6d2f626c6f672f77702d636f6e74656e742f75706c6f6164732f323031372f30322f6e6f74652d626f6f6b2e6a7067, 'The Note Book', 'Noah, a poor man, falls in love with Allie who comes from wealth. They are forced to keep passion for');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reg`
--
ALTER TABLE `customer_reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `movie_details`
--
ALTER TABLE `movie_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_reg`
--
ALTER TABLE `customer_reg`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `movie_details`
--
ALTER TABLE `movie_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
