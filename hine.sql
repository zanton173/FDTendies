-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 03:37 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hine`
--

-- --------------------------------------------------------

--
-- Table structure for table `inspectionlogs`
--

CREATE TABLE `inspectionlogs` (
  `id` int(11) NOT NULL,
  `dateReceived` date NOT NULL,
  `hineReference` varchar(20) NOT NULL,
  `supplierDelivery` varchar(20) NOT NULL,
  `supplierName` varchar(10) NOT NULL,
  `auditor` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspectionlogs`
--

INSERT INTO `inspectionlogs` (`id`, `dateReceived`, `hineReference`, `supplierDelivery`, `supplierName`, `auditor`) VALUES
(71, '2019-06-09', 'usp', '4343', 'john', 'ba'),
(72, '2019-06-09', 'UPON/232', '343243', 'aaaa', 'cd'),
(73, '2019-07-01', 'jklf;da', '321', 'nerw', 'za'),
(74, '2019-07-01', 'nope', '21', '1', 'za'),
(75, '2019-08-14', 'ABC', '', '', ''),
(76, '2019-08-14', 'FLKDSA', 'KDFLSAL', 'NEW', 'ZA'),
(77, '2019-08-14', 'NEWTHIS', '288282', 'FDLSA', 'ZA');

-- --------------------------------------------------------

--
-- Table structure for table `listparts`
--

CREATE TABLE `listparts` (
  `id` int(11) NOT NULL,
  `listPartNum` varchar(25) DEFAULT NULL,
  `listQty` int(11) DEFAULT NULL,
  `picklistId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(11) NOT NULL,
  `partNumber` varchar(25) NOT NULL,
  `linesUsed` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  `todowork` tinyint(1) DEFAULT '0',
  `problemDesc` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `partNumber`, `linesUsed`, `location`, `qty`, `todowork`, `problemDesc`) VALUES
(1, 'T125', 'asaas', 'E5Shelf4', 3211, 0, NULL),
(2, 'dascdsa', '333', 'E5Shelf3', 43214191, 0, NULL),
(3, 'dddd dddd 3432 ', 'ddfdfde', 'E5Shelf1', 34323, 0, NULL),
(4, 'dddfdsacey444446543', 'cdsafdsa', 'E5Shelf2', 6422, 0, NULL),
(11, 'cdsacdsa', '', 'B8Shelf4', -111, 0, NULL),
(12, 'asdcd', '', 'B8Shelf3', 3193, 0, NULL),
(13, 'dddworked', '', 'B8Shelf1', 2181, 0, NULL),
(14, 'fddddfdsaidsanfudsa2', '', 'E5Shelf4', 2102, 0, NULL),
(17, 'kdkdadadadadadum', '', 'B8Shelf1', -127, 0, NULL),
(18, 'cdsacda', '', 'B8Shelf4', 382, 0, NULL),
(22, 'T12510A4', '', 'D1Shelf1', 150, NULL, NULL),
(24, 'T12510A4', '', 'D1Shelf1', 250, NULL, NULL),
(26, 'nonono', '', 'D1Shelf3', 222, NULL, NULL),
(27, 'acdsa', '', 'E1Shelf2', 22222, 0, NULL),
(29, 'nonono', '', 'A1Shelf2', 950, NULL, NULL),
(30, 'hello', '', 'A1Shelf4', 12345, NULL, NULL),
(32, 'DSAFDSA3FDS', '', 'C8Shelf4', 3, 0, NULL),
(33, 'D', '', 'C8Shelf4', 0, 0, NULL),
(35, 'FJDKSAL;', '', 'D1Shelf4', 342, 0, NULL),
(36, 'FDSK', '', 'C3Shelf4', 0, 0, NULL),
(37, 'VKJFDSLA', '', 'B7Shelf4', 8, 0, NULL),
(50, '12345', '', 'D1Shelf4', 100, 0, NULL),
(51, '5678', '', 'D1Shelf2', 1000, 0, NULL),
(52, 'T12510A4', '', 'D1Shelf3', 50, 0, NULL),
(65, 'AGAIN', '', '', 100, 0, NULL),
(67, 'ARRAY', '', '', 900, 0, NULL),
(68, 'FORTNITE', '', '2550', 1123, 0, NULL),
(72, 'FOR', '', 'Array', 999, 0, NULL),
(73, 'ARRAY', '', '2550', 1000, 0, NULL),
(75, 'HEHEHEH', '', '2550', 111, 0, NULL),
(78, 'WHO', '', '2510', 288, 0, NULL),
(80, 'WHEN', '', '2600', 188, 0, NULL),
(81, 'WHERE', '', '2600', 99, 0, NULL),
(82, 'WHY', '', '2510', 100, 0, NULL),
(86, 'NOPE', '', '2510', 299, 0, NULL),
(87, 'HIYA', '', '2550', 0, 0, NULL),
(89, 'HOW', '', 'Array', 0, 0, NULL),
(90, '29047417', '', 'D3Shelf1', 120, 0, NULL),
(91, '29090732', '', 'D3Shelf1', 260, 0, NULL),
(92, '29057338', '', 'D3Shelf1', 100, 0, NULL),
(93, '29050868', '', 'D3Shelf1', 150, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partsinlog`
--

CREATE TABLE `partsinlog` (
  `id` int(11) NOT NULL,
  `partNumReceived` varchar(25) DEFAULT NULL,
  `partQuantityReceived` int(11) NOT NULL,
  `partsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partsinlog`
--

INSERT INTO `partsinlog` (`id`, `partNumReceived`, `partQuantityReceived`, `partsId`) VALUES
(7, '5435423', 54325432, 71),
(8, 'gfdsagfd', 5454, 71),
(12, 'cdsaretas', 765765, 71),
(14, 'ddcdsaresafdsa', 54532543, 71),
(17, 'dddasfdsce', 34125476, 71),
(18, 'do again', 4321, 71),
(19, 'newone', 3333, 72),
(20, 'acdsaresa', 45432, 72),
(21, 'tryagainpls', 123456789, 71),
(22, 'hahahheheh', 1000000, 72),
(24, 'T127 10', 434343, 71),
(25, 'datetimepls', 3214135, 71),
(26, 'addednewone', 11111, 71),
(27, 'JKH', 432, 71),
(28, '432LDSA', 443, 74),
(29, 'RDSLA', 432, 74),
(30, 'DFSA', 3, 73),
(31, '134214321', 434321, 73),
(32, 'FDKSALJFS', 2147483647, 76),
(33, 'JFDSA', 883, 75);

-- --------------------------------------------------------

--
-- Table structure for table `picklist`
--

CREATE TABLE `picklist` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picklist`
--

INSERT INTO `picklist` (`id`, `name`) VALUES
(1, 'pitch'),
(2, 'cooler top'),
(3, 'nordex'),
(4, 'cpu'),
(5, 'hpu'),
(6, 'afm'),
(7, 'db');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inspectionlogs`
--
ALTER TABLE `inspectionlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listparts`
--
ALTER TABLE `listparts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `picklistId` (`picklistId`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partsinlog`
--
ALTER TABLE `partsinlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partsId` (`partsId`);

--
-- Indexes for table `picklist`
--
ALTER TABLE `picklist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inspectionlogs`
--
ALTER TABLE `inspectionlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `listparts`
--
ALTER TABLE `listparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `partsinlog`
--
ALTER TABLE `partsinlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `picklist`
--
ALTER TABLE `picklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listparts`
--
ALTER TABLE `listparts`
  ADD CONSTRAINT `listparts_ibfk_1` FOREIGN KEY (`picklistId`) REFERENCES `picklist` (`id`);

--
-- Constraints for table `partsinlog`
--
ALTER TABLE `partsinlog`
  ADD CONSTRAINT `partsinlog_ibfk_1` FOREIGN KEY (`partsId`) REFERENCES `inspectionlogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
