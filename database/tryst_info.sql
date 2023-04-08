-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 11:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tryst`
--

-- --------------------------------------------------------

--
-- Table structure for table `tryst_info`
--

CREATE TABLE `tryst_info` (
  `index` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `cmobile` varchar(13) NOT NULL,
  `ccollege` varchar(200) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_attended` tinyint(1) NOT NULL DEFAULT 0,
  `c_mailId` varchar(200) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `ad52ss` varchar(6500) NOT NULL,
  `tickverif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='infor registration';

--
-- Dumping data for table `tryst_info`
--

INSERT INTO `tryst_info` (`index`, `cname`, `cmobile`, `ccollege`, `cdate`, `c_attended`, `c_mailId`, `is_verified`, `ad52ss`, `tickverif`) VALUES
(1, 'Sagar Rathore', '09310399182', 'Keshav Mahavidyalaya', '2023-04-08 16:24:01', 0, 'sagarzendex@gmail.com', 1, 'https://trystfiles.blob.core.windows.net/screenshots/WhatsApp%20Image%202022-09-30%20at%208.05.04%20AM.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tryst_info`
--
ALTER TABLE `tryst_info`
  ADD PRIMARY KEY (`index`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tryst_info`
--
ALTER TABLE `tryst_info`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
