-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 07:59 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Email`, `Password`) VALUES
(1, 'admin@admin.uk', 'bda76d920b1a16bea5487af0bf42f239');

-- --------------------------------------------------------

--
-- Table structure for table `book_appointments`
--

CREATE TABLE `book_appointments` (
  `patientid` int(155) NOT NULL,
  `doctorid` int(155) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_appointments`
--

INSERT INTO `book_appointments` (`patientid`, `doctorid`, `date`, `time`) VALUES
(15, 16, '1992-11-11', '0000-00-00'),
(15, 16, '1995-12-12', '0000-00-00'),
(15, 16, '1995-12-16', '15:00'),
(15, 16, '1992-11-11', '12:00'),
(15, 16, '1992-11-12', '15:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`ID`, `firstname`, `lastname`, `dob`, `Email`, `Password`, `gender`) VALUES
(12, 'fdsfdsfjijhn', 'dsf', '2015-02-11', 'mdojogds@gmail.com', '', 'Other'),
(14, 'John', 'Miek', '2018-08-11', 'moonvalks@gmail.com', '$2y$10$WIRZ/IPUsfRV6K4vHP/areyZnatPdkYkiKmd/fH1fN9Q5/r4keJDa', '$2y$10$WIRZ/IPUsfRV6K4vHP/areyZnatPdkYkiKmd/fH1fN9Q5/r4keJDa'),
(15, 'john', 'myslovi', '1995-11-11', 'claren@gmail.com', '$2y$10$pCfSYKUxIdQox26Q02c/Ye.6Bz9pwJhL5sHn6KyN0SB160Vvr7f7W', '$2y$10$pCfSYKUxIdQox26Q02c/Ye.6Bz9pwJhL5sHn6KyN0SB160Vvr7f7W'),
(16, 'Anthony', 'Hopkins', '1991-11-11', 'hannibal@lecter.com', '$2y$10$1B9rZhPpJQNSg2HTWLgDQunR.hqf8l.H11UuLUCBB8VBZOnvjYvY.', '$2y$10$1B9rZhPpJQNSg2HTWLgDQunR.hqf8l.H11UuLUCBB8VBZOnvjYvY.');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_notes`
--

CREATE TABLE `medicine_notes` (
  `ID` int(11) NOT NULL,
  `patientid` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `appdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_notes`
--

INSERT INTO `medicine_notes` (`ID`, `patientid`, `firstname`, `notes`, `appdate`) VALUES
(1, '15', 'bvcbvc', 'dsadsa', '0000-00-00'),
(2, '15', 'Test1', '\"Example guide on how to use it\"', '0000-00-00'),
(3, '15', 'pharacetamol', 'Hi drink 2 times a day\r\n-pharacetamol', '1995-12-12'),
(4, '15', 'xxxx', 'fdsfdsfscxxxxxxxxxxxxxxxxx', '1992-11-11'),
(5, '15', 'sdsd', 'axaxxa', '1995-12-16'),
(6, '15', 'xxxx', 'xxxx', '1992-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`ID`, `firstname`, `lastname`, `dob`, `doctor_id`, `email`, `password`, `gender`) VALUES
(1, 'marin', 'siwy', '1994-11-11', 14, 'mdskmsd@gmail.com', '$2y$10$l4zSppyob/z.xHxZKeiAvOqs/v8qKHGkftaA2O.WBxfxuw89y4Q6W', 'Male'),
(2, 'Julia', 'Danielak', '0000-00-00', 16, 'J.danielak@gmail.com', '', 'Other'),
(3, 'Johny', 'Cage', '1992-12-11', 12, 'joey3535@gmail.com', '', 'Male'),
(5, 'Mane', 'Olimp', '1992-09-25', 9, 'lamerok@gmail.com', '$2y$10$PHnJwrS50co1ICmU5Ygk6uqb6W8KRr36CeWYhjtMUaqg9GOvadoWG', 'Male'),
(11, 'Many', 'Pakiao', '1995-12-11', 8, 'dondonella@gmail.com', '$2y$10$ZnQjeTJ1klK7AX/YKpPt9eJIGh/odYkCN3Ktl7CskC5/vbpOrxuOa', '$2y$10$ZnQjeTJ1klK7AX/YKpPt9eJIGh/odYkCN3Ktl7CskC5/vbpOrxuOa'),
(12, 'john', 'mao', '1994-12-11', 9, 'memi3@gmail.com', '$2y$10$oCsw7fSAPdiGeCr6AhMAMOP1rp96k6JYWfrjas3FrzJXVAEFBZWHi', 'disclosed'),
(13, 'Jay', 'Miles', '2001-12-11', 9, 'miles@hotmail.com', '$2y$10$DkHGA7PVVLUHYS04jGg0yu4FEz87hfSW.pn1dDKlR3YV8zqHyKUdy', 'disclosed'),
(14, 'Lloyds', 'Bank', '1990-11-10', 14, 'leonardo@mail.com', '$2y$10$lXmE6JypDxIwtIbx8gcDsOJrtgDy/f5C6kyb5Xy5IWf0OrWIXjqv.', '$2y$10$lXmE6JypDxIwtIbx8gcDsOJrtgDy/f5C6kyb5Xy5IWf0OrWIXjqv.'),
(15, 'test', 'test', '1995-11-11', 16, 'test@test.com', '$2y$10$oE.kwk944rYZA.m0cuxsi.wVcwTj0PGH9pcuk66EpTcgawGfqVV5e', '$2y$10$oE.kwk944rYZA.m0cuxsi.wVcwTj0PGH9pcuk66EpTcgawGfqVV5e'),
(16, 'wqwq', 'wqwq', '1992-11-11', 9, 'fdsfs@gmail.com', '$2y$10$WzHTbUOKi90s5Nj9d8SKleIQy58Xrb6QhoAF7RNmM8dRClhU7sr9O', '$2y$10$WzHTbUOKi90s5Nj9d8SKleIQy58Xrb6QhoAF7RNmM8dRClhU7sr9O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicine_notes`
--
ALTER TABLE `medicine_notes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medicine_notes`
--
ALTER TABLE `medicine_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
