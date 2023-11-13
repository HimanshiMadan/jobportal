-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 09:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `jid` int(20) NOT NULL,
  `sid` int(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`jid`, `sid`, `date`) VALUES
(1, 12, '2023-11-12'),
(1, 19, '2023-11-13'),
(2, 12, '2023-11-12'),
(2, 19, '2023-11-13'),
(7, 12, '2023-11-13'),
(7, 19, '2023-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `eid` int(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `cwebsite` varchar(50) NOT NULL,
  `cmail` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `rdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`eid`, `cname`, `contact_no`, `cwebsite`, `cmail`, `about`, `rdate`) VALUES
(17, 'test pvt ltd.', '2345678901', 'testwebsite.com', 'test@test.co', 'it is a test company', '2023-11-12'),
(18, 'EmployerCompany', '2345678901', 'website.com', 'company@employer.com', 'employees everyone', '2023-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jid` int(10) NOT NULL,
  `eid` int(10) NOT NULL,
  `jobtitle` varchar(20) NOT NULL,
  `min_qual` varchar(50) NOT NULL,
  `techstack` varchar(100) NOT NULL,
  `jobdesc` varchar(200) NOT NULL,
  `dateposted` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jid`, `eid`, `jobtitle`, `min_qual`, `techstack`, `jobdesc`, `dateposted`) VALUES
(1, 18, 'software engineer', 'btech in computer science', 'python', 'nothing will be revealed here', '2023-11-12'),
(2, 18, 'data scientists', 'none', 'python or R', 'fun', '2023-11-12'),
(7, 17, 'Data Analyst', 'None', 'Python, Maths', 'Not to be revealed', '2023-11-12'),
(8, 18, 'jshdfa', 'sfdas', 'sfdas', 'sdfafd', '2023-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `sid` int(10) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `exp` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `past_position` varchar(50) NOT NULL,
  `contact_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`sid`, `degree`, `about`, `exp`, `gender`, `district`, `state`, `country`, `skills`, `past_position`, `contact_mail`) VALUES
(12, 'sfdaf', 'sadas', 2, 'female', 'dafsa', 'qwer', 'india', 'yeah yeah', 'student', 'student@nsut.ac.in'),
(19, 'BS', 'savage and red panda', 10, 'female', 'sjhfkas', 'texas', 'usa', 'burgers', 'burgers', 'panda@email.com'),
(20, 'dsasafd', 'savage & red panda', 1, 'male', 'sjhfkas', 'texas', 'usa', 'burgers', 'burgers', 'panda@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `pid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `dob` date NOT NULL,
  `usertype` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pid`, `email`, `password`, `fname`, `lname`, `phone`, `dob`, `usertype`) VALUES
(12, 'alpha@beta.com', 'alpha', 'alpha', 'beta', '1234567899', '2023-10-30', 's'),
(17, 'test@email.com', 'test', 'test', 'name', '1234567890', '2023-10-30', 'e'),
(18, 'employer@email.com', '1234', 'employer', 'employer', '1234567890', '2023-10-30', 'e'),
(19, 'panda@email.com', 'panda', 'savage', 'redpanda', '1234567890', '2023-10-30', 's'),
(20, 'panda1@email.com', 'asdaa', 'adas', 'sdfas', '13412431', '2023-10-30', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD PRIMARY KEY (`jid`,`sid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
  ADD CONSTRAINT `applied_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `job_seeker` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applied_ibfk_3` FOREIGN KEY (`jid`) REFERENCES `job` (`jid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `person` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD CONSTRAINT `job_seeker_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `person` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
