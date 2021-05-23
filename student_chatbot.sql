-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 01:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `asked_ques`
--

CREATE TABLE `asked_ques` (
  `id` int(3) NOT NULL,
  `Question` varchar(300) NOT NULL,
  `ans` varchar(300) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asked_ques`
--

INSERT INTO `asked_ques` (`id`, `Question`, `ans`, `category`, `date`, `status`) VALUES
(1, 'results of MCA even sem', 'By end of July', 'results', '2021-04-26', 'helpful'),
(2, 'exam datesheet', 'No, It is yet to be announced', 'Examination', '2021-04-26', 'helpful'),
(3, 'hostel list', 'No', 'Others', '2021-04-26', 'helpful'),
(4, 'registration process', 'You will be notified. It will be online', 'admission', '2021-04-26', 'helpful'),
(5, 'ambedkar jayanti a holiday', 'Yes, it is a gazetted holiday.', 'holiday', '2021-04-26', 'helpful'),
(6, 'results of MCA even sem', 'By end of July', 'results', '2021-04-26', 'helpful'),
(7, 'ambedkar jayanti a holiday', 'Yes, it is a gazetted holiday.', 'holiday', '2021-04-26', 'helpful'),
(8, 'ambedkar jayanti a holiday', 'Yes, it is a gazetted holiday.', 'holiday', '2021-04-26', 'helpful'),
(9, 'results of MCA even sem', 'By end of July', 'results', '2021-04-26', 'helpful'),
(10, 'is holi ', 'Yes, it is a gazetted holiday.', 'holiday', '2021-04-26', 'helpful'),
(11, 'hostel list', 'No', 'Others', '2021-04-26', 'helpful'),
(12, 'is ambedkar jayanti a holiday', 'Yes, it is a gazetted holiday.', 'holiday', '2021-04-26', 'helpful'),
(13, 'hostel list', 'No', 'Others', '2021-04-27', 'helpful'),
(14, 'ambedkar jayanti a holiday', 'Yes, it is a gazetted holiday.', 'holiday', '2021-04-27', 'helpful'),
(15, 'results of MCA even sem', 'By end of July', 'results', '2021-05-04', 'helpful'),
(16, 'results of MCA even sem', 'By end of July', 'results', '2021-05-11', 'helpful'),
(17, 'is ambedkar jayanti a holiday', 'Yes, it is a gazetted holiday.', 'holiday', '2021-05-12', 'helpful'),
(18, 'hostel list', 'No', 'Others', '2021-05-13', 'helpful'),
(19, 'exam', 'No, It is yet to be announced', 'Examination', '2021-05-15', 'helpful'),
(20, 'what is the result of mca', 'By end of July', 'results', '2021-05-16', 'helpful'),
(21, 'Do hostels have balcony?', 'Some hostels have balconies.', 'Others', '2021-05-20', 'helpful'),
(23, 'trial one', '', 'Others', '2021-05-22', 'invalid question'),
(29, 'library time', '24x 7 Sunday till 12am', 'academics', '2021-05-22', 'helpful'),
(46, 'trial 2', 'New Question', 'Seminar/Workshop', '2021-05-22', 'skipped'),
(47, 'skipping trial', 'New Question', 'admission', '2021-05-23', 'skipped');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Q_id` int(4) NOT NULL,
  `main_key` varchar(50) NOT NULL,
  `key1` varchar(30) NOT NULL,
  `key2` varchar(30) NOT NULL,
  `key3` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `dateAsked` date NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Q_id`, `main_key`, `key1`, `key2`, `key3`, `category`, `answer`, `dateAsked`, `status`) VALUES
(1, 'is Ambedkar Jayanti a holiday', 'Ambedkar Jayanti', 'holiday', '14 April', 'holiday', 'Yes, it is a gazetted holiday.', '2021-03-09', 'answered'),
(2, 'When will results of MCA even sem released', 'MCA', 'even semester', 'result release', 'results', 'By end of July', '2021-03-07', 'answered'),
(3, 'has exam datesheet been announced ', 'datesheet', 'exam', 'exam date announcement', 'Examination', 'No, It is yet to be announced', '2021-03-10', 'answered'),
(4, 'Hostel list for girls admitted in 2020', 'hostel list', 'girls hostel', '2020', 'Others', 'No', '2021-03-16', 'answered'),
(5, 'international business conference by MBA venue', 'Business conference', 'venue', 'MBA', 'Seminar/Workshop', 'Auditorium', '2021-03-23', 'answered'),
(7, 'is Holi a holiday', 'Holi', 'holiday', 'gazetted holiday', 'holiday', 'Yes, it is a gazetted holiday.', '2021-03-31', 'answered'),
(8, 'When can I meet the VC?', 'meet VC', 'meeting time VC', 'student meet VC', 'others', 'Monday 11:00am to 1:00 pm', '2021-04-05', 'answered'),
(9, 'office timing of admin block', 'office time', 'office hours', 'admin office time', 'others', '10:00 am to 6:00 pm', '2021-04-20', 'answered'),
(10, 'Examination of mtech final year', 'mtech exam', 'final year exam', 'even sem exam', 'Examination', 'Starting May 24,2021', '2021-04-25', 'answered'),
(11, 'Is Raksha Bandhan a holiday', 'raksha bandhan', 'holiday', 'gazetted holiday', 'holiday', 'NO , not a gazetted holiday', '2021-05-04', 'answered'),
(12, 'trial one', 'no key', 'no key', 'no key', 'Others', 'answer of trial one', '2021-05-20', 'skipped'),
(13, 'trial 2', 'no key', 'no key', 'no key', 'Others', 'trial 2 answer', '2021-05-21', 'skipped'),
(15, 'Do hostels have balcony?', 'hostel', 'balcony', 'balconies', 'Others', 'Some hostels have balconies.', '2021-05-22', 'answered'),
(17, 'where is 24*7', '24x7', '24*7', '24 7', 'location', 'In-front of Sabarmati Dhaba', '2021-05-23', 'answered');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `school` varchar(50) NOT NULL,
  `year of graduation` enum('2021','2022','2023','2024','2025','2026') NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `course`, `school`, `year of graduation`, `email`, `mobile`, `username`, `password`) VALUES
('', '', '', '', '', '', '', '$2y$10$Fhvii9.ESyJVQcg/twN3Oe1dkuaNM5aiuN3QyUghT34llRVPDJgRa'),
('pragya', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'poll', '$2y$10$2y1Dt3yceqRqKjnVTjSRdeCZi2wiSZb8zH1UpdmZYL/lmkTPNTR8O'),
('pragya', 'mca', 'scss', '2022', 'jpragya275@gmail.com', '3456543234', 'prag', '$2y$10$8eHfBHDf1CpvHb.Dk4Q7G.1XvZmGqj6ekRgSKzdECAjxADSFf0eoG'),
('pj', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'pragg', '$2y$10$hss88AeWtfyj7wu4VgdXI.90wNzLaLP6urRdViyxqjUeD5WX2aJgC'),
('pragya', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'pragya', '$2y$10$toPxjEF1n6I2yEHdk9Dl8O6Zrm7fE5O2N9YxG3fu9PrZRK31diucG'),
('pragya', 'mca', 'scss', '2022', 'pragya@gmail.com', '9876543210', 'pragyaAdmin', 'pragya'),
('pj', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'pre', '$2y$10$gBqlpiKLvwjkui0IDqMIDOPtS.PQ45xZqGFUWFmFUhWmfAPhXofBy'),
('Preeti', 'MCA', 'SCSS', '2022', 'preetii@gmail.com', '9977553311', 'preeti', '$2y$10$nO9rmdWfrLT7eUSxCzUfb.e05DrhzbrsZuxSxVFApAXju.1OraYQC'),
('preeti', 'mca', 'scss', '2022', 'preeti@gmail.com', '9886643210', 'preetiAdmin', 'lohia'),
('pj', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'pug', '12345'),
('pj', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'puy', '$2y$10$B5seZRH1m73awd4uVbPVTu4FwZbNsErcFVkfNtHUR9oKCjAtfCsVu'),
('pragya', 'mca', 'scss', '2021', 'jpragya275@gmail.com', '3456543234', 'qwer', '$2y$10$cxmwHiIk/h7SnQrTI.MwiuO/NbN9LxdBRSQbw/tQ/dI87DUcRV3zu'),
('sangeeta', '', '', '', '', '', 'sangeetaAdmin', 'sangeeta'),
('shweta', '', '', '', '', '', 'shwetaAdmin', 'shweta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asked_ques`
--
ALTER TABLE `asked_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asked_ques`
--
ALTER TABLE `asked_ques`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Q_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
