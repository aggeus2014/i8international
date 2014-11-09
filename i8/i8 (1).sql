-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2014 at 05:50 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `i8`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE IF NOT EXISTS `beneficiary` (
`beneficiaryId` int(9) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `contactNum` int(15) NOT NULL,
  `benefactorId` int(9) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`beneficiaryId`, `fName`, `mName`, `lName`, `dateOfBirth`, `contactNum`, `benefactorId`, `status`) VALUES
(1, 'Ben', 'efi', 'ciary', '1993-12-01', 2147483647, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pairs`
--

CREATE TABLE IF NOT EXISTS `pairs` (
`pairId` int(9) NOT NULL,
  `sponsorId` int(9) NOT NULL,
  `left` int(9) NOT NULL,
  `right` int(9) NOT NULL,
  `datePaired` datetime NOT NULL,
  `count` int(9) NOT NULL,
  `status` varchar(20) NOT NULL,
  `encashedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE IF NOT EXISTS `referrals` (
`refId` int(12) NOT NULL,
  `mainSponsor` int(9) NOT NULL,
  `subSponsor` int(9) NOT NULL,
  `amount` float NOT NULL,
  `count` int(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `referralDate` datetime NOT NULL,
  `encashedDate` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`refId`, `mainSponsor`, `subSponsor`, `amount`, `count`, `status`, `referralDate`, `encashedDate`) VALUES
(1, 1, 0, 400, 1, 'pending', '2014-11-06 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userId` int(9) NOT NULL,
  `sponsorId` int(9) NOT NULL,
  `parentId` int(9) NOT NULL,
  `position` varchar(1) NOT NULL,
  `layer` varchar(50) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `contactNum` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `cStatus` varchar(20) NOT NULL,
  `type` int(1) NOT NULL,
  `status` varchar(25) NOT NULL,
  `activationCode` varchar(50) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateActivated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `sponsorId`, `parentId`, `position`, `layer`, `userName`, `password`, `fName`, `mName`, `lName`, `contactNum`, `email`, `address`, `gender`, `dateOfBirth`, `cStatus`, `type`, `status`, `activationCode`, `dateAdded`, `dateActivated`) VALUES
(1, 0, 0, 'T', '', 'top', 'password', 'upper', 'toper', 'richer', 2147483647, 'jemimahlynnomillo@gmail.com', 'sampaloc', 'F', '1993-01-12', 'Single', 1, 'active', '1234567890', '2014-11-06 00:00:00', '2014-11-06 00:00:00'),
(2, 1, 1, 'L', '1', 'left', 'password', 'U2', 'U2', 'U2', 2147483647, 'jemimahlynnomillo@gmail.com', 'sampaloc', 'F', '1993-12-01', 'Single', 1, 'active', '1234567890', '2014-11-06 00:00:00', '2014-11-06 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
 ADD PRIMARY KEY (`beneficiaryId`);

--
-- Indexes for table `pairs`
--
ALTER TABLE `pairs`
 ADD PRIMARY KEY (`pairId`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
 ADD PRIMARY KEY (`refId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
MODIFY `beneficiaryId` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pairs`
--
ALTER TABLE `pairs`
MODIFY `pairId` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
MODIFY `refId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
