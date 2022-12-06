-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 05:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childdocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `StaffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`StaffID`) VALUES
(1),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `BuildingNum` int(11) NOT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `BuildingVehicleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`BuildingNum`, `Capacity`, `BuildingVehicleID`) VALUES
(1, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `busses`
--

CREATE TABLE `busses` (
  `BusID` int(11) NOT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Range` int(11) DEFAULT NULL,
  `DriverLicenseNum` int(11) DEFAULT NULL,
  `BusShift` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `busses`
--

INSERT INTO `busses` (`BusID`, `Capacity`, `Range`, `DriverLicenseNum`, `BusShift`) VALUES
(1, 20, 200, 123, '1');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `ChildID` int(11) NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Mname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `BusNum` int(11) DEFAULT NULL,
  `GuardianSSN` int(11) DEFAULT NULL,
  `RoomNum` int(11) DEFAULT NULL,
  `BusShift` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`ChildID`, `Fname`, `Mname`, `Lname`, `DOB`, `BusNum`, `GuardianSSN`, `RoomNum`, `BusShift`) VALUES
(1, 'rogl', 'the', 'gamer', '2022-12-01', 1, 12, 1, '1'),
(2, 'a', 'b', 'c', '2022-11-04', NULL, 12, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `StaffID` int(11) NOT NULL,
  `LicenseNum` varchar(45) DEFAULT NULL,
  `LicenseLevel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`StaffID`, `LicenseNum`, `License Level`) VALUES
(4, '123', '5');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `GuardianSSN` int(11) NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Mname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Phone` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`GuardianSSN`, `Fname`, `Mname`, `Lname`, `Email`, `Phone`) VALUES
(12, 'james', 'lee', 'ahmad', 'james@gmail.com', 5555555),
(15, 'jacob', 'jacob', 'jacob', 'jacob@gmail.com', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `PrescriptionNum` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `Dosage` varchar(45) DEFAULT NULL,
  `Allergies` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomNum` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `BuildingNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomNum`, `Name`, `Capacity`, `BuildingNum`) VALUES
(1, 'Happy Hippos', 10, 1),
(2, 'Room 2', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `StaffID` int(11) NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Mname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `Wage` varchar(45) DEFAULT NULL,
  `BGCheck` tinyint(4) DEFAULT NULL,
  `RoomNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`StaffID`, `Fname`, `Mname`, `Lname`, `Wage`, `BGCheck`, `RoomNum`) VALUES
(1, 'ben', 'richard', 'foster', '20', 1, 1),
(2, 'sadman', 'shahriar', 'snigdho', '20', 1, 2),
(3, 'labib', 'asfar', 'ahmad', '20', 1, 1),
(4, 'derrick', 'rick', 'rick', '1', 1, NULL),
(5, 'admin2', 'yes', 'no', '20', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `StaffID` int(11) NOT NULL,
  `Classification` varchar(45) DEFAULT NULL,
  `RoomNum` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`StaffID`, `Classification`, `RoomNum`) VALUES
(2, 'Level 2', '2'),
(3, 'Level 2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `weeklyplans`
--

CREATE TABLE `weeklyplans` (
  `WeeklyPlanNum` int(11) NOT NULL,
  `WeekNum` varchar(45) DEFAULT NULL,
  `Activities` varchar(45) DEFAULT NULL,
  `PlanAuthor` varchar(45) DEFAULT NULL,
  `PlanAuthorID` int(11) DEFAULT NULL,
  `RoomNum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`BuildingNum`),
  ADD KEY `BuildingVehicleID_idx` (`BuildingVehicleID`);

--
-- Indexes for table `busses`
--
ALTER TABLE `busses`
  ADD PRIMARY KEY (`BusID`),
  ADD KEY `LicenseNum_idx` (`LicenseNum`);
--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`ChildID`),
  ADD KEY `GuardianSSN_idx` (`GuardianSSN`),
  ADD KEY `RoomNum_idx` (`RoomNum`),
  ADD KEY `BusShift_idx` (`BusShift`),
  ADD KEY `BusNum_idx` (`BusNum`) USING BTREE;

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`GuardianSSN`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`PrescriptionNum`),
  ADD UNIQUE KEY `ChildID_UNIQUE` (`ChildID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomNum`),
  ADD KEY `BuildingNum_idx` (`BuildingNum`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `RoomNum_idx` (`RoomNum`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `weeklyplans`
--
ALTER TABLE `weeklyplans`
  ADD PRIMARY KEY (`WeeklyPlanNum`),
  ADD KEY `PlanAuthorID_idx` (`PlanAuthorID`),
  ADD KEY `PlanAuthor` (`PlanAuthor`),
  ADD KEY `Room_idx` (`RoomNum`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `BusID` FOREIGN KEY (`BusID`) REFERENCES `busses` (`BusID`),
  ADD CONSTRAINT `GuardianSSN` FOREIGN KEY (`GuardianSSN`) REFERENCES `guardians` (`GuardianSSN`),
  ADD CONSTRAINT `RoomNum` FOREIGN KEY (`RoomNum`) REFERENCES `rooms` (`RoomRum`),
  ADD CONSTRAINT `BusShift` FOREIGN KEY (`BusShift`) REFERENCES `busses` (`BusShift`);

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `ChildID` FOREIGN KEY (`ChildID`) REFERENCES `child` (`ChildID`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `BuildingNum` FOREIGN KEY (`BuildingNum`) REFERENCES `buildings` (`BuildingNum`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `RoomNum` FOREIGN KEY (`RoomNum`) REFERENCES `rooms` (`RoomNum`);


--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `StaffID` FOREIGN KEY (`StaffID`) REFERENCES `staffs` (`StaffID`);

--
-- Constraints for table `weeklyplans`
--
ALTER TABLE `weeklyplans`
  ADD CONSTRAINT `PlanAuthorID` FOREIGN KEY (`PlanAuthorID`) REFERENCES `teachers` (`StaffID`),
  ADD CONSTRAINT `RoomNum` FOREIGN KEY (`RoomNum`) REFERENCES `rooms` (`RoomNum`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
