-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 11:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auxi-police`
--

-- --------------------------------------------------------

--
-- Table structure for table `forumreplies`
--

CREATE TABLE `forumreplies` (
  `reply_id` int(11) NOT NULL,
  `reply_contents` varchar(800) NOT NULL,
  `reply_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topic_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forumreplies`
--

INSERT INTO `forumreplies` (`reply_id`, `reply_contents`, `reply_timestamp`, `topic_id`, `userID`) VALUES
(1, 'pelajar kolej selalu parking di kawasan ni. pukul 630 pun parking di melati 50% dah penuh', '2019-12-01 05:56:06', 1, 999),
(2, 'menyusahkan betul lah', '2019-12-01 06:24:12', 1, 1234),
(4, 'ntah apa apa', '2019-12-01 07:09:25', 1, 999),
(5, 'cuba lagi satu', '2019-12-01 07:10:02', 1, 999),
(6, 'cuba lagi\r\n', '2019-12-01 07:10:18', 1, 999),
(7, 'power gila', '2019-12-01 07:10:25', 1, 999),
(8, 'Hello bro', '2019-12-01 07:11:29', 1, 999),
(9, 'Been ', '2019-12-01 07:13:23', 1, 999),
(10, 'sawadikap\r\n', '2019-12-01 07:13:25', 1, 999),
(11, 'Apoo', '2019-12-01 07:14:30', 1, 999),
(12, 'hello kenapa makan kotor sangat ni\r\n', '2019-12-01 07:17:44', 2, 999),
(13, 'Itu lah. Siap ada lipas', '2019-12-01 07:18:28', 2, 2017525015),
(14, 'V2.0', '2019-12-01 09:49:45', 1, 2017525015),
(15, 'test', '2019-12-02 07:13:41', 1, 999),
(16, 'baiklah', '2019-12-06 02:33:06', 2, 999),
(17, 'wahh kacaknya\r\n', '2019-12-06 03:07:25', 5, 999),
(18, 'padu beb', '2019-12-06 03:09:28', 5, 999),
(19, 'padu lah awakni\r\n', '2019-12-06 03:10:44', 5, 999),
(20, 'baru', '2019-12-06 04:12:37', 1, 999),
(21, 'gy', '2019-12-12 05:01:59', 5, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `forumtopics`
--

CREATE TABLE `forumtopics` (
  `topic_id` int(11) NOT NULL,
  `topic_subject` varchar(300) NOT NULL,
  `topic_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forumtopics`
--

INSERT INTO `forumtopics` (`topic_id`, `topic_subject`, `topic_timestamp`, `userID`) VALUES
(1, 'Parking Haram di Melati', '2019-12-01 05:54:31', 999),
(2, 'Makan DC terlalu kotor ', '2019-12-01 06:06:47', 1234),
(3, 'ada haiwan dalam bahaya', '2019-12-06 02:59:15', 999),
(4, 'kucing atas bumbung taknak turun', '2019-12-06 03:00:36', 999),
(5, 'kacaknya diva AA', '2019-12-06 03:01:10', 999);

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `policeID` int(11) NOT NULL,
  `policeIC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`policeID`, `policeIC`) VALUES
(9876, 9876);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progressID` int(11) NOT NULL,
  `progressstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progressID`, `progressstatus`) VALUES
(0, 'in progress'),
(1, 'Accept'),
(2, 'Ignore');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `reportdate` date NOT NULL,
  `reporttime` time NOT NULL,
  `reportcreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(50) NOT NULL,
  `reportLocation` varchar(50) NOT NULL,
  `reportEvidence` varchar(300) NOT NULL,
  `userID` int(11) NOT NULL,
  `progressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `reportdate`, `reporttime`, `reportcreated`, `description`, `reportLocation`, `reportEvidence`, `userID`, `progressID`) VALUES
(19, '2020-01-14', '01:33:00', '2020-01-12 14:33:50', 'Jalan jalan', 'Fspu', '15788396207066382900500241858336.jpg', 999, 0),
(20, '2020-12-31', '12:59:00', '2020-01-14 04:09:51', 'test', 'test', 'rotate 1@2x.png', 999, 0),
(21, '2020-01-14', '12:10:00', '2020-01-14 04:10:45', 'Pecah masuk', 'Isoho', 'image.jpg', 999, 0),
(22, '2020-01-15', '04:57:00', '2020-01-14 08:59:12', 'Hj', 'Hj', '15789922667221642437168796745178.jpg', 999, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'user', 'staff and student '),
(2, 'shift police', 'shift police'),
(3, 'head auxiliary police', 'head auxiliary police check and balance');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL,
  `typename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `typename`) VALUES
(1, 'Abuse'),
(2, 'Accident'),
(3, 'Lost'),
(4, 'Harassment'),
(5, 'Suspicious activity'),
(6, 'Theft'),
(7, 'Vandalism');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userIC` varchar(50) NOT NULL,
  `userName` varchar(180) NOT NULL,
  `role_id` int(11) NOT NULL,
  `phoneNum` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userIC`, `userName`, `role_id`, `phoneNum`, `department`) VALUES
(999, '999', 'User', 1, '0112345678', 'FSKM'),
(1234, '1234', 'Head', 3, '0184445546', 'PB'),
(9876, '9876', 'Police', 2, '0174546278', 'PB'),
(2017525015, '970625075510', 'Fazira', 1, '1245700000', 'FSKM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forumreplies`
--
ALTER TABLE `forumreplies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `forumtopics`
--
ALTER TABLE `forumtopics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `user_id` (`userID`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`policeID`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progressID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `progressID` (`progressID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forumreplies`
--
ALTER TABLE `forumreplies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `forumtopics`
--
ALTER TABLE `forumtopics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `policeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9877;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2017717348;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forumreplies`
--
ALTER TABLE `forumreplies`
  ADD CONSTRAINT `forumreplies_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `forumtopics` (`topic_id`),
  ADD CONSTRAINT `forumreplies_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `forumtopics`
--
ALTER TABLE `forumtopics`
  ADD CONSTRAINT `forumtopics_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `report_ibfk_5` FOREIGN KEY (`progressID`) REFERENCES `progress` (`progressID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
