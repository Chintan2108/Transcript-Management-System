-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 05:26 AM
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
-- Table structure for table `gtu`
--

CREATE TABLE `gtu` (
  `student_id` varchar(20) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gtu`
--

INSERT INTO `gtu` (`student_id`, `name`, `email`) VALUES
('15ce040', 'Devesh Hatkar', '15ce040@charusat.edu.in'),
('15ce048', 'Vedaant Joshi', '15ce048@charusat.edu.in'),
('15ce111', 'VRAJESH RAMI', '15ce111@charusat.edu.in');

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

-- --------------------------------------------------------

--
-- Table structure for table `temp_students`
--

CREATE TABLE `temp_students` (
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

-- --------------------------------------------------------

--
-- Table structure for table `transcript_cost`
--

CREATE TABLE `transcript_cost` (
  `university_id` varchar(20) NOT NULL,
  `transcript` int(11) DEFAULT NULL,
  `marksheet` int(11) DEFAULT NULL,
  `duplicate_marksheet` int(11) DEFAULT NULL,
  `degree_certificate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transcript_request`
--

CREATE TABLE `transcript_request` (
  `id` varchar(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `flat_no` varchar(10) DEFAULT NULL,
  `building_name` varchar(256) DEFAULT NULL,
  `street_no` varchar(10) DEFAULT NULL,
  `street_name` varchar(256) DEFAULT NULL,
  `city` varchar(256) NOT NULL,
  `postal_code` varchar(14) NOT NULL,
  `state` varchar(256) NOT NULL,
  `marksheet` int(11) DEFAULT NULL,
  `duplicate_marksheet` int(11) DEFAULT NULL,
  `transcript` int(11) DEFAULT NULL,
  `degree_certificate` int(11) DEFAULT NULL,
  `university_approval_status` varchar(14) NOT NULL,
  `payment_status` varchar(14) NOT NULL,
  `status` varchar(40) NOT NULL,
  `date_of_request` date NOT NULL,
  `university_id` varchar(20) DEFAULT NULL,
  `contact_no` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transcript_request`
--

INSERT INTO `transcript_request` (`id`, `student_id`, `flat_no`, `building_name`, `street_no`, `street_name`, `city`, `postal_code`, `state`, `marksheet`, `duplicate_marksheet`, `transcript`, `degree_certificate`, `university_approval_status`, `payment_status`, `status`, `date_of_request`, `university_id`, `contact_no`) VALUES
('1', '15ce111', '12 ', 'yoshaan', '12', 'akota', 'vadodara', '390007', 'Gujarat', 1, 0, 1, 0, 'false', 'false', 'false', '2018-03-08', '002', '9558490258'),
('2', '15ce048', '4', 'abc', '4', 'xyz', 'anand', '388001', 'Gujarat', 1, 0, 0, 0, 'false', 'false', 'false', '2018-03-08', '003', '9558490258');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` varchar(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `logo` blob NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`, `address`, `logo`, `email`, `password`) VALUES
('001', 'Charusat Unviersity', 'Changa', '', 'charusat@gmail.com', 'changa'),
('002', 'G H Patel Unviersity', 'Anand', '', 'gcet@gmail.com', 'anand'),
('003', 'Dharmsinh Desai University', 'Nadiad', '', 'ddu@gmail.com', 'nadiad'),
('004', 'Dhirubhai Ambani Institute of Technology', 'Gandhinagar', '', 'daiict@gmail.com', 'gandhinagar'),
('005', 'Indian Institute of Technology Bombay', 'Mumbai', '', 'iitb@gmail.com', 'mumbai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gtu`
--
ALTER TABLE `gtu`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `temp_students`
--
ALTER TABLE `temp_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `transcript_cost`
--
ALTER TABLE `transcript_cost`
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `transcript_request`
--
ALTER TABLE `transcript_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `university_id_foreign_key_cons` (`university_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

--
-- Constraints for table `temp_students`
--
ALTER TABLE `temp_students`
  ADD CONSTRAINT `temp_students_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

--
-- Constraints for table `transcript_cost`
--
ALTER TABLE `transcript_cost`
  ADD CONSTRAINT `transcript_cost_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

--
-- Constraints for table `transcript_request`
--
ALTER TABLE `transcript_request`
  ADD CONSTRAINT `transcript_request_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `university_id_foreign_key_cons` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
