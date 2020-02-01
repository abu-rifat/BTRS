-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 04:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(11) NOT NULL,
  `A_Name` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `A_PhoneNo` varchar(50) NOT NULL,
  `A_Email` varchar(100) NOT NULL,
  `A_Gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `A_Name`, `Password`, `A_PhoneNo`, `A_Email`, `A_Gender`) VALUES
(5, 'Abu Rifat', '51fc25a41718d2c768d2491f66857352', '+8801753537110', 'rifat.cse4.bu@gmail.com', 'Male'),
(12, '', '51fc25a41718d2c768d2491f66857352', '', 'armalhasib@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_ID` int(11) NOT NULL,
  `R_ID` int(11) NOT NULL,
  `Payment_Method` varchar(255) NOT NULL,
  `Transection_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `Bus_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `Seat_ID` int(11) NOT NULL,
  `Bus_Reg` varchar(255) NOT NULL,
  `Category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cancel_booking`
--

CREATE TABLE `cancel_booking` (
  `CB_ID` int(11) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Cancel_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_type`) VALUES
(1, 'AC'),
(2, 'Non-AC');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `C_ID` int(11) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `C_PhoneNo` varchar(50) NOT NULL,
  `C_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`C_ID`, `C_Name`, `Password`, `C_PhoneNo`, `C_Email`) VALUES
(1, 'Sakura Paribahan', 'e10adc3949ba59abbe56e057f20f883e', '+8801753537110', 'sakura@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `message`, `date`, `status`) VALUES
(1, 'Hi@hi.com', 'rfgthjkmjnhbg', '2019-12-19 02:11:54', 0),
(2, 'rifat.cse4.bu@gmail.com', 'Bootstrap is the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first websites. Bootstrap is completely free to download and use.\r\n\r\nNote: If you don\'t know Bootstrap, we suggest that you read our Bootstrap Tutorial.', '2019-12-19 02:12:48', 0),
(3, 'rifat.cse4.bu@gmail.com', 'asdfghjkl', '2019-12-19 02:14:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `P_ID` int(11) NOT NULL,
  `R_ID` int(11) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_MobileNo` varchar(30) NOT NULL,
  `P_Email` varchar(100) NOT NULL,
  `P_Gender` varchar(30) NOT NULL,
  `P_Status` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `R_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `SB_ID` int(11) NOT NULL,
  `R_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Route_ID` int(11) NOT NULL,
  `Dep_Place` varchar(255) NOT NULL,
  `Ari_Place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Route_ID`, `Dep_Place`, `Ari_Place`) VALUES
(1, 'Barishal', 'Dhaka'),
(2, 'Dhaka', 'Barishal');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `She_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `Bus_ID` int(11) NOT NULL,
  `Route_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `shift` int(11) NOT NULL,
  `ticket_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `Seat_ID` int(11) NOT NULL,
  `Total_Seats` int(11) NOT NULL,
  `Seat_design` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`Seat_ID`, `Total_Seats`, `Seat_design`) VALUES
(2, 37, '\"\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'eeeee\',\"'),
(3, 36, '\"\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\'ee_ee\',\"');

-- --------------------------------------------------------

--
-- Table structure for table `seat_booking`
--

CREATE TABLE `seat_booking` (
  `SB_ID` int(11) NOT NULL,
  `She_ID` int(11) NOT NULL,
  `SB_Seat_No` int(11) NOT NULL,
  `SB_Status` varchar(5) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `User_PhoneNo` varchar(50) NOT NULL,
  `User_Gender` varchar(30) NOT NULL,
  `User_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `Password`, `User_PhoneNo`, `User_Gender`, `User_Email`) VALUES
(9, 'Abu Rifat Muhammed Al Hasib', '51fc25a41718d2c768d2491f66857352', '+8801753537110', 'Male', 'rifat.cse4.bu@gmail.com'),
(10, 'Tamanna Ferdaus', 'e10adc3949ba59abbe56e057f20f883e', '+8801797393630', 'Female', 'ferdaustamanna.cse4.bu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `R_ID_booking_fk` (`R_ID`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Bus_ID`),
  ADD KEY `C_ID_fk` (`C_ID`),
  ADD KEY `Seat_ID_fk` (`Seat_ID`),
  ADD KEY `Category_ID_fk` (`Category_ID`);

--
-- Indexes for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  ADD PRIMARY KEY (`CB_ID`),
  ADD KEY `B_ID_cancel_fk` (`B_ID`),
  ADD KEY `User_ID_cancel_fk` (`User_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `R_ID_passenger_fk` (`R_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `User_ID_reservation_fk` (`User_ID`),
  ADD KEY `SB_ID_reservation_fk` (`SB_ID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Route_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`She_ID`),
  ADD KEY `Bus_ID_fk` (`Bus_ID`),
  ADD KEY `Route_ID_fk` (`Route_ID`),
  ADD KEY `C_ID_schedule_fk` (`C_ID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`Seat_ID`);

--
-- Indexes for table `seat_booking`
--
ALTER TABLE `seat_booking`
  ADD PRIMARY KEY (`SB_ID`),
  ADD KEY `She_ID_Seat_Booking_fk` (`She_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `Bus_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  MODIFY `CB_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `Route_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `She_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `Seat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seat_booking`
--
ALTER TABLE `seat_booking`
  MODIFY `SB_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `R_ID_booking_fk` FOREIGN KEY (`R_ID`) REFERENCES `reservation` (`R_ID`);

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `C_ID_fk` FOREIGN KEY (`C_ID`) REFERENCES `company` (`C_ID`),
  ADD CONSTRAINT `Category_ID_fk` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`),
  ADD CONSTRAINT `Seat_ID_fk` FOREIGN KEY (`Seat_ID`) REFERENCES `seat` (`Seat_ID`);

--
-- Constraints for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  ADD CONSTRAINT `B_ID_cancel_fk` FOREIGN KEY (`B_ID`) REFERENCES `booking` (`B_ID`),
  ADD CONSTRAINT `User_ID_cancel_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `R_ID_passenger_fk` FOREIGN KEY (`R_ID`) REFERENCES `reservation` (`R_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `SB_ID_reservation_fk` FOREIGN KEY (`SB_ID`) REFERENCES `seat_booking` (`SB_ID`),
  ADD CONSTRAINT `User_ID_reservation_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `Bus_ID_fk` FOREIGN KEY (`Bus_ID`) REFERENCES `bus` (`Bus_ID`),
  ADD CONSTRAINT `C_ID_schedule_fk` FOREIGN KEY (`C_ID`) REFERENCES `company` (`C_ID`),
  ADD CONSTRAINT `Route_ID_fk` FOREIGN KEY (`Route_ID`) REFERENCES `route` (`Route_ID`);

--
-- Constraints for table `seat_booking`
--
ALTER TABLE `seat_booking`
  ADD CONSTRAINT `She_ID_Seat_Booking_fk` FOREIGN KEY (`She_ID`) REFERENCES `schedule` (`She_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
