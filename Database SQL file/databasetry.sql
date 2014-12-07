-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2014 at 07:41 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databasetry`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `FullName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EmailAddress` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`FullName`, `Title`, `EmailAddress`) VALUES
('Sandharuwan Abeykoon', 'Admin', 'sandharuwanabeykoon@gmail.com'),
('Chathura Asiri', 'Finacial Manager', 'tcachathura123@gmail.com'),
('Yahan Thilakarathna', 'Program Manager', 'yohanamal18@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `ConID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ProID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FinID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ConAppDate` date NOT NULL,
  `ConRemark` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ConID`),
  KEY `ConID` (`ConID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ConID`, `PID`, `DID`, `ProID`, `FinID`, `ConAppDate`, `ConRemark`) VALUES
('con01', '1', '4501', 'pro01', 'fin01', '2014-11-18', 'first values of the contract'),
('con02', '2', '4502', 'pro02', 'fin02', '2014-11-19', '2nd values of the contract'),
('con03', '3', '4503', 'pro03', 'fin03', '2014-11-20', '3rd values of the contract'),
('con04', '4', '4504', 'pro04', 'fin04', '2014-11-21', '4th values of the contract'),
('con05', '5', '4505', 'pro05', 'fin05', '2014-11-25', '5th values of the contract'),
('con06', '6', '4506', 'pro06', 'fin07', '2014-11-26', '6th values of the contract'),
('con07', '7', '4507', 'pro07', 'fin07', '2014-11-27', '7th values of the contract');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `DID` int(4) NOT NULL,
  `DName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DEmail` varchar(50) CHARACTER SET latin1 NOT NULL,
  `DAddress` varchar(50) CHARACTER SET latin1 NOT NULL,
  `DRemark` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`DID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DID`, `DName`, `DEmail`, `DAddress`, `DRemark`) VALUES
(4501, 'doner', 'donoer4501@gmail.com', 'donor4501, address', 'test'),
(4502, 'donor2', 'donor2@gmail.com', 'donor2Address', 're re'),
(4503, 'donor3', 'donor3@gmail.com', 'donor3 address', 'wewewe'),
(4504, 'donor4', 'donor4@gmail.com', 'donor4 address', 'donor4 vaues test'),
(4505, 'donor5', 'donor5@gmail.com', 'donor5 address', 'donor5 vaues test'),
(4506, 'donor6', 'donor6@gmail.com', 'donor6 address', 'donor6 vaues test'),
(4507, 'donor7', 'donor7@gmail.com', 'donor7 address', 'donor7 vaues test'),
(4508, 'donor8', 'donor8@gmail.com', 'donor8 address', 'donor8 vaues test'),
(4509, 'donor9', 'donor9@gmail.com', 'donor9 address', 'donor9 vaues test'),
(4510, 'donor10', 'donor10@gmail.com', 'donor10 address', 'donor10 vaues test');

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE IF NOT EXISTS `financial` (
  `FinID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FinCond` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`FinID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `financial`
--

INSERT INTO `financial` (`FinID`, `FinCond`) VALUES
('fin01', 'finacial test1'),
('fin02', 'finacial test2'),
('fin03', 'finacial test3'),
('fin04', 'finacial test4'),
('fin05', 'finacial test5'),
('fin06', 'finacial test6'),
('fin07', 'finacial test7');

-- --------------------------------------------------------

--
-- Table structure for table `finstages`
--

CREATE TABLE IF NOT EXISTS `finstages` (
  `FinID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `FStage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FSStatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TraID` int(4) NOT NULL,
  `TraDate` date NOT NULL,
  `TraDueDate` date NOT NULL,
  `FSRemark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  KEY `FinID` (`FinID`,`FStage`,`FSStatus`,`TraID`,`TraDate`,`TraDueDate`,`FSRemark`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finstages`
--

INSERT INTO `finstages` (`FinID`, `FStage`, `FSStatus`, `TraID`, `TraDate`, `TraDueDate`, `FSRemark`) VALUES
('9899', 'finacialStageEmail', 'check email', 5634, '2014-12-03', '2014-12-02', 'ttttttttttttt'),
('fin01', '01stage01', 'complete', 2341, '2014-11-13', '2014-11-14', 'finacila stage collect using fin id'),
('fin01', '01stage02', 'complete', 2345, '2014-11-25', '2014-11-20', 'finacila stage collect using fin id'),
('fin01', '01stage03', 'complete', 2389, '2014-10-05', '2014-10-20', 'finacila stage collect using fin id'),
('fin01', '01stage04', 'complete', 2345, '2014-10-11', '2014-10-11', 'finacila stage collect using fin id'),
('fin01', 'email check', 'wewe', 0, '0000-00-00', '2014-12-01', 'rerere'),
('fin01', 'emailcheack', 'test email', 34344, '2014-12-05', '2014-12-02', 'rrrrrrrrrr'),
('fin02', '01stage01', 'complete', 1345, '2014-10-11', '2014-10-11', 'finacila stage collect using fin id'),
('fin02', 'stage02', 'waiting', 1868, '2014-10-30', '2014-11-15', 'finacila stage collect using fin id'),
('fino1', 'emailchk', 'emailchk', 222, '2014-12-04', '2014-12-01', 'testemail');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ProID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ProCond` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ProID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProID`, `ProCond`) VALUES
('pro01', 'program test 01'),
('pro02', 'program test 02'),
('pro03', 'program test03'),
('pro04', 'program test04'),
('pro05', 'program test05'),
('pro06', 'program test06'),
('pro07', 'program test07'),
('pro08', 'program test08'),
('pro09', 'program test09');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `PID` int(4) NOT NULL,
  `DID` int(4) NOT NULL,
  `PName` varchar(25) CHARACTER SET latin1 NOT NULL,
  `PStatus` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PDate` date NOT NULL,
  `ProposalDueDate` date NOT NULL,
  `TotFinacial` int(10) NOT NULL,
  `Response` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PRemark` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`PID`, `DID`, `PName`, `PStatus`, `PDate`, `ProposalDueDate`, `TotFinacial`, `Response`, `PRemark`) VALUES
(1, 4501, 'Northern Rebuild', 'Completed', '2014-11-19', '2014-12-15', 10000, 'K Ranaweera', 'still process'),
(2, 4502, 'Biogas Unit', 'Ongoing', '0000-00-00', '2014-12-16', 2321, 'Rananjaya Gunawardana', 'base done'),
(3, 4503, 'Socio-economic Emp.', 'Rejected', '2014-12-02', '2014-12-15', 896555, 'Upali Silva', 'contract problem'),
(4, 4504, 'Community Gov.', 'Ongoing', '2014-11-22', '2014-12-15', 400000, 'Jagath Silva', 'need assistant'),
(5, 4505, 'EU housing', 'Ongoing', '2014-11-05', '2014-12-16', 1000585, 'Upali Silva', 'submit report'),
(6, 4506, 'Pico Hydro tech', 'Completed', '2014-11-06', '2014-12-18', 7845421, 'Kamal Rathnayake', 'first stage complete'),
(7, 4507, 'Sustainable Energy', 'Ongoing', '2014-11-07', '2014-12-01', 1000700, 'Sarath Bandara', 'report request'),
(8, 4508, 'Knowledge Sharing', 'Rejected', '2014-11-08', '2014-12-02', 1000877, 'Upali Silva', 'fund problem'),
(9, 4509, 'Natural Resource', 'Complete', '2013-11-09', '2013-11-02', 1000954, 'Ravi Herath', 'completed early');

-- --------------------------------------------------------

--
-- Table structure for table `prostages`
--

CREATE TABLE IF NOT EXISTS `prostages` (
  `ProID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PStage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PSStatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ProStartDate` date NOT NULL,
  `ProEndDate` date NOT NULL,
  `ProDueDate` date NOT NULL,
  `PSRemark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `PStage` (`PStage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prostages`
--

INSERT INTO `prostages` (`ProID`, `PStage`, `PSStatus`, `ProStartDate`, `ProEndDate`, `ProDueDate`, `PSRemark`) VALUES
('pro02', 'stage 2 for the test', 'this is test stage', '2014-12-02', '2014-12-12', '2014-12-12', 'test for cheak system'),
('pro03', 'stage 3 for the test', 'this is test stage', '2014-12-03', '2014-12-13', '2014-12-13', 'test for cheak system'),
('pro01', 'stage one for the test', 'this is test stage', '2014-12-01', '2014-12-11', '2014-12-10', 'test for cheak system');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`) VALUES
(1, 'ssa', '80dc926abb14d5c815d91bbb8cd2a14969fc174695a28ab4a628448c198b765b', '435dc9b55edf5526', 'ssa@gmail.com'),
(2, 'chathura', 'fa94a4b9e3fb028db0538fd2356f80a2cba84fb4976c1229655d09d33a183c03', '535a546931aa185', 'tcachathura123@gmail.com'),
(3, 'yjason', '504cbbb11d5f8294d371a2586a96085329274341f14bcb045650622477f45fec', '7d33c8c45ab7467d', 'yohanamal18@gmail.com'),
(4, 'demo', '7fb97177d505aca873477e29918f13d4025a98392a79ee1deec05af89a6f8c88', '5e1c255933a8b810', 'demo@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
