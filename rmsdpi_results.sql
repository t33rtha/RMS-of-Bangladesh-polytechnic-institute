-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 05:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmsdpi_results`
--

-- --------------------------------------------------------

--
-- Table structure for table `65711`
--

CREATE TABLE `65711` (
  `roll` int(8) NOT NULL,
  `tc` int(2) DEFAULT NULL,
  `pc` int(2) DEFAULT NULL,
  `tf` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65711`
--

INSERT INTO `65711` (`roll`, `tc`, `pc`, `tf`) VALUES
(914587, 30, 23, 76),
(914603, 45, 45, 88),
(914604, 44, 45, 45),
(914857, 44, 24, 67);

-- --------------------------------------------------------

--
-- Table structure for table `65712`
--

CREATE TABLE `65712` (
  `roll` int(8) NOT NULL,
  `tc` int(2) NOT NULL,
  `tf` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65712`
--

INSERT INTO `65712` (`roll`, `tc`, `tf`) VALUES
(914603, 36, 45),
(914604, 38, 50);

-- --------------------------------------------------------

--
-- Table structure for table `65811`
--

CREATE TABLE `65811` (
  `roll` int(11) NOT NULL,
  `tc` int(11) NOT NULL,
  `tf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65811`
--

INSERT INTO `65811` (`roll`, `tc`, `tf`) VALUES
(914568, 35, 46);

-- --------------------------------------------------------

--
-- Table structure for table `65812`
--

CREATE TABLE `65812` (
  `roll` int(8) NOT NULL,
  `pc` int(2) DEFAULT NULL,
  `pf` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65812`
--

INSERT INTO `65812` (`roll`, `pc`, `pf`) VALUES
(914603, 20, 18),
(914604, 18, 19);

-- --------------------------------------------------------

--
-- Table structure for table `65911`
--

CREATE TABLE `65911` (
  `roll` int(8) NOT NULL,
  `tc` int(2) NOT NULL,
  `pc` int(2) NOT NULL,
  `tf` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65911`
--

INSERT INTO `65911` (`roll`, `tc`, `pc`, `tf`) VALUES
(914568, 44, 35, 66),
(914603, 44, 45, 70),
(914604, 50, 35, 75);

-- --------------------------------------------------------

--
-- Table structure for table `65912`
--

CREATE TABLE `65912` (
  `roll` int(8) NOT NULL,
  `tc` int(2) NOT NULL,
  `pc` int(2) NOT NULL,
  `tf` int(2) NOT NULL,
  `pf` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65912`
--

INSERT INTO `65912` (`roll`, `tc`, `pc`, `tf`, `pf`) VALUES
(914603, 45, 20, 75, 19),
(914604, 50, 19, 80, 20);

-- --------------------------------------------------------

--
-- Table structure for table `65913`
--

CREATE TABLE `65913` (
  `roll` int(11) NOT NULL,
  `tc` int(11) NOT NULL,
  `tf` int(11) NOT NULL,
  `pc` int(11) NOT NULL,
  `pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `65913`
--

INSERT INTO `65913` (`roll`, `tc`, `tf`, `pc`, `pf`) VALUES
(914568, 44, 67, 21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `66611`
--

CREATE TABLE `66611` (
  `roll` int(8) NOT NULL,
  `pc` int(2) NOT NULL,
  `pf` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `66611`
--

INSERT INTO `66611` (`roll`, `pc`, `pf`) VALUES
(914603, 44, 46),
(914604, 35, 38);

-- --------------------------------------------------------

--
-- Table structure for table `66712`
--

CREATE TABLE `66712` (
  `roll` int(11) NOT NULL,
  `tc` int(11) NOT NULL,
  `tf` int(11) NOT NULL,
  `pc` int(11) NOT NULL,
  `pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `66712`
--

INSERT INTO `66712` (`roll`, `tc`, `tf`, `pc`, `pf`) VALUES
(914603, 44, 69, 21, 20),
(914604, 55, 80, 20, 16);

-- --------------------------------------------------------

--
-- Table structure for table `68711`
--

CREATE TABLE `68711` (
  `roll` int(11) NOT NULL,
  `tc` int(11) NOT NULL,
  `tf` int(11) NOT NULL,
  `pc` int(11) NOT NULL,
  `pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `68712`
--

CREATE TABLE `68712` (
  `roll` int(11) NOT NULL,
  `tc` int(11) NOT NULL,
  `tf` int(11) NOT NULL,
  `pc` int(11) NOT NULL,
  `pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterId` int(1) NOT NULL,
  `semester` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterId`, `semester`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionId` int(2) NOT NULL,
  `session` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionId`, `session`) VALUES
(1, '2014-15'),
(2, '2015-16'),
(3, '2016-17'),
(4, '2017-18'),
(5, '2018-19'),
(6, '2019-20');

-- --------------------------------------------------------

--
-- Table structure for table `studentinformation`
--

CREATE TABLE `studentinformation` (
  `id` int(4) NOT NULL,
  `roll` int(8) NOT NULL,
  `registrationNo` int(8) NOT NULL,
  `sessionId` int(2) NOT NULL,
  `technologyId` int(4) NOT NULL,
  `shift` int(1) NOT NULL,
  `semesterId` int(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fatherName` varchar(30) DEFAULT NULL,
  `motherName` varchar(30) DEFAULT NULL,
  `irregular` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinformation`
--

INSERT INTO `studentinformation` (`id`, `roll`, `registrationNo`, `sessionId`, `technologyId`, `shift`, `semesterId`, `name`, `fatherName`, `motherName`, `irregular`) VALUES
(649, 914603, 874587, 6, 1, 1, 1, 'Johir Ahemmod Chowdhury', 'Mst. Ferdous Ara', 'Jafor Ahemmod Chowdhury', 0),
(650, 914604, 584587, 6, 1, 1, 1, 'MD. DULAL MEAH', 'Mst. Sofia Khatun', 'Abous Sobhan', 0),
(651, 914587, 584759, 6, 1, 1, 1, 'AKLIMA AKTER', 'Jafor Ahmed', 'Mst. Kusum Akter', 0),
(652, 914857, 845875, 6, 1, 1, 1, 'Md. Omar Faruk', 'Solaiman', 'Sufia Akter', 0),
(653, 914568, 895785, 6, 2, 1, 1, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectId` int(4) NOT NULL,
  `subjectCode` varchar(7) NOT NULL,
  `subjectName` varchar(70) NOT NULL,
  `tc` int(3) DEFAULT NULL,
  `tf` int(3) DEFAULT NULL,
  `pc` int(3) DEFAULT NULL,
  `pf` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectId`, `subjectCode`, `subjectName`, `tc`, `tf`, `pc`, `pf`) VALUES
(1, '66611', 'Computer Application', 0, 0, 50, 50),
(3, '65911', 'Mathematics-1', 60, 90, 50, 0),
(7, '66712', 'Electrical Engineering Fundamental', 60, 90, 25, 25),
(8, '65912', 'physics-1', 60, 90, 25, 25),
(9, '65712', 'english', 40, 60, 0, 0),
(10, '65711', 'bangla', 60, 90, 50, 0),
(17, '65812', 'Physical Education & Life Skill Dev.', 0, 0, 25, 25),
(18, '65811', 'Social Science', 60, 90, 0, 0),
(19, '65913', 'Chemistry', 60, 90, 25, 25),
(20, '68711', 'Architectural Materials and Product', 60, 90, 25, 25),
(21, '68712', 'Architectural Design and  Drawing-1', 20, 30, 75, 75);

-- --------------------------------------------------------

--
-- Table structure for table `subjectcontrol`
--

CREATE TABLE `subjectcontrol` (
  `subjectControlId` int(3) NOT NULL,
  `subjectId` int(3) NOT NULL,
  `technologyId` int(2) NOT NULL,
  `sessionId` int(2) NOT NULL,
  `semesterId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectcontrol`
--

INSERT INTO `subjectcontrol` (`subjectControlId`, `subjectId`, `technologyId`, `sessionId`, `semesterId`) VALUES
(401, 1, 1, 6, 1),
(402, 3, 1, 6, 1),
(403, 7, 1, 6, 1),
(404, 8, 1, 6, 1),
(405, 9, 1, 6, 1),
(406, 10, 1, 6, 1),
(407, 17, 1, 6, 1),
(419, 3, 2, 6, 1),
(420, 17, 2, 6, 1),
(421, 19, 2, 6, 1),
(422, 18, 2, 6, 1),
(423, 20, 2, 6, 1),
(424, 21, 2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `technologyId` int(3) NOT NULL,
  `technologyCode` varchar(6) NOT NULL,
  `technologyName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`technologyId`, `technologyCode`, `technologyName`) VALUES
(1, '666', 'Computer'),
(2, '687', 'Architecture & Interior Design'),
(6, '664', 'Civil'),
(7, '694', 'Telecommunication'),
(8, '667', 'Electrical'),
(9, '19', 'Textile'),
(10, '49', 'Garments design and pattern making');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(4) NOT NULL,
  `type` varchar(7) DEFAULT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `type`, `userEmail`, `userPassword`) VALUES
(3, 'admin', 'admin', '12345'),
(13, 'teacher', 'computer', '12345'),
(14, 'teacher', 'aidt@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `usersubject`
--

CREATE TABLE `usersubject` (
  `userSubjectId` int(4) NOT NULL,
  `userId` int(4) NOT NULL,
  `subjectId` int(4) DEFAULT NULL,
  `technologyId` int(2) DEFAULT NULL,
  `sessionId` int(2) DEFAULT NULL,
  `semesterId` int(2) DEFAULT NULL,
  `shiftId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersubject`
--

INSERT INTO `usersubject` (`userSubjectId`, `userId`, `subjectId`, `technologyId`, `sessionId`, `semesterId`, `shiftId`) VALUES
(493, 13, 1, 1, 6, 1, NULL),
(494, 13, 3, 1, 6, 1, NULL),
(495, 13, 7, 1, 6, 1, NULL),
(496, 13, 8, 1, 6, 1, NULL),
(497, 13, 9, 1, 6, 1, NULL),
(498, 13, 10, 1, 6, 1, NULL),
(499, 13, 17, 1, 6, 1, NULL),
(513, 14, 3, 2, 6, 1, NULL),
(514, 14, 17, 2, 6, 1, NULL),
(515, 14, 18, 2, 6, 1, NULL),
(516, 14, 19, 2, 6, 1, NULL),
(517, 14, 20, 2, 6, 1, NULL),
(518, 14, 21, 2, 6, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `65711`
--
ALTER TABLE `65711`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `65712`
--
ALTER TABLE `65712`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `65811`
--
ALTER TABLE `65811`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `65812`
--
ALTER TABLE `65812`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `65911`
--
ALTER TABLE `65911`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `65912`
--
ALTER TABLE `65912`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `65913`
--
ALTER TABLE `65913`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `66611`
--
ALTER TABLE `66611`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `66712`
--
ALTER TABLE `66712`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `68711`
--
ALTER TABLE `68711`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `68712`
--
ALTER TABLE `68712`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterId`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indexes for table `studentinformation`
--
ALTER TABLE `studentinformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rollNo` (`roll`),
  ADD UNIQUE KEY `registrationNo` (`registrationNo`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `subjectcontrol`
--
ALTER TABLE `subjectcontrol`
  ADD PRIMARY KEY (`subjectControlId`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`technologyId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `usersubject`
--
ALTER TABLE `usersubject`
  ADD PRIMARY KEY (`userSubjectId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sessionId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentinformation`
--
ALTER TABLE `studentinformation`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=654;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjectcontrol`
--
ALTER TABLE `subjectcontrol`
  MODIFY `subjectControlId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `technologyId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usersubject`
--
ALTER TABLE `usersubject`
  MODIFY `userSubjectId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
