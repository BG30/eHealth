-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 06:06 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminId` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointNo` int(9) NOT NULL,
  `doctorId` int(9) NOT NULL,
  `healthNo` int(9) NOT NULL,
  `day` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `medicalLicense` varchar(10) NOT NULL,
  `businessLicense` varchar(10) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `specializations` varchar(40) NOT NULL,
  `degrees` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--
-- Error reading structure for table smarthealth.insurance: #1932 - Table 'smarthealth.insurance' doesn't exist in engine
-- Error reading data for table smarthealth.insurance: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `smarthealth`.`insurance`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `prescriptionNo` varchar(8) NOT NULL,
  `healthNo` int(9) NOT NULL,
  `medicineName` varchar(25) NOT NULL,
  `dosage` varchar(30) NOT NULL,
  `medicineTakeDate` date NOT NULL,
  `appointNo` int(9) NOT NULL,
  `medID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `healthNo` int(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNo` int(9) NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `insuranceAccountNo` varchar(10) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transactionNo` varchar(8) NOT NULL,
  `cardType` char(1) NOT NULL,
  `cardNo` int(16) NOT NULL,
  `healthNo` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `recordNo` int(6) NOT NULL,
  `healthNo` int(9) NOT NULL,
  `appointNo` int(6) DEFAULT NULL,
  `prescriptionNo` varchar(8) NOT NULL,
  `observations` varchar(100) NOT NULL,
  `testResult` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointNo`),
  ADD KEY `doctorId` (`doctorId`),
  ADD KEY `healthNo` (`healthNo`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorId`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`prescriptionNo`),
  ADD KEY `appointNo` (`appointNo`),
  ADD KEY `healthNo` (`healthNo`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`healthNo`),
  ADD KEY `insuranceAccountNo` (`insuranceAccountNo`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transactionNo`),
  ADD KEY `healthNo` (`healthNo`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`recordNo`),
  ADD KEY `healthNo` (`healthNo`),
  ADD KEY `appointNo` (`appointNo`),
  ADD KEY `prescriptionNo` (`prescriptionNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctorId`) REFERENCES `doctor` (`doctorId`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`healthNo`) REFERENCES `patient` (`healthNo`);

--
-- Constraints for table `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `medication_ibfk_1` FOREIGN KEY (`appointNo`) REFERENCES `appointment` (`appointNo`),
  ADD CONSTRAINT `medication_ibfk_2` FOREIGN KEY (`healthNo`) REFERENCES `patient` (`healthNo`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`insuranceAccountNo`) REFERENCES `insurance` (`InsuranceAccountNo`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`healthNo`) REFERENCES `patient` (`healthNo`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`healthNo`) REFERENCES `patient` (`healthNo`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`appointNo`) REFERENCES `appointment` (`appointNo`),
  ADD CONSTRAINT `record_ibfk_3` FOREIGN KEY (`prescriptionNo`) REFERENCES `medication` (`prescriptionNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
