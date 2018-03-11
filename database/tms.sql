-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 05:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(20) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `university_id` varchar(20) NOT NULL,
  `institute` varchar(256) NOT NULL,
  `programme` varchar(256) NOT NULL,
  `flat_no` varchar(10) DEFAULT NULL,
  `building_name` varchar(256) DEFAULT NULL,
  `street_no` varchar(10) DEFAULT NULL,
  `street_name` varchar(256) DEFAULT NULL,
  `city` varchar(256) NOT NULL,
  `postal_code` varchar(14) NOT NULL,
  `state` varchar(256) NOT NULL,
  `password` varchar(40) NOT NULL,
  `joining_year` date NOT NULL,
  `graduation_year` date NOT NULL,
  `contact_no` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `university_id`, `institute`, `programme`, `flat_no`, `building_name`, `street_no`, `street_name`, `city`, `postal_code`, `state`, `password`, `joining_year`, `graduation_year`, `contact_no`) VALUES
('15ce040', 'Devesh', 'Hatkar', '15ce040@charusat.edu.in', '001', 'CSPIT', 'BTECH', '6', 'qa', '1', 'ama', 'anand', '388001', 'Gujarat', 'dev', '2016-07-12', '2020-08-12', '8866633450'),
('15ce048', 'vedaant', 'joshi', '15ce048@charusat.edu.in', '001', 'cspit', 'prog', 'a', 'a', 'a', 'a', 'a', '390020', 'guj', 'asd', '0000-00-00', '0000-00-00', '9998217232'),
('15ce111', 'v', 'r', '15ce111@charusat.edu.in', '002', 'dD', 'd', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'as', '0000-00-00', '0000-00-00', '9998217232');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
