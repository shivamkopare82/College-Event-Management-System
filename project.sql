-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 05:36 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_detail` varchar(111) DEFAULT NULL,
  `participants` int(100) DEFAULT 0,
  `img_link` text DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_detail`, `participants`, `img_link`, `type_id`) VALUES
(1, 'Web Development', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore', 0, 'images/web.jpg', 1),
(2, 'JAVA Development', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore', 0, 'images/java.png', 2),
(3, 'C Programming', 'C is a general-purpose computer programming language. It was created in the 1970s by Dennis Ritchie, and remain', 0, 'images/c.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_id` int(10) NOT NULL,
  `Date` date DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`course_id`, `Date`, `time`, `location`) VALUES
(1, '2022-11-16', '3.00pm', 'Online'),
(2, '2023-05-30', '3.00pm', 'Online'),
(3, '2023-06-01', '10 am', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `mentor` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(255) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_price` int(11) DEFAULT NULL,
  `participents` int(100) DEFAULT 0,
  `partcipent_name` text NOT NULL,
  `img_link` text DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `Posted_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_price`, `participents`, `partcipent_name`, `img_link`, `type_id`, `Posted_By`) VALUES
(3, 'Technical-Quiz', 50, 2, '', 'images/quiz.png', 1, ''),
(4, 'Competitive-Coding', 50, 1, '', 'images/coding.jpg', 1, ''),
(5, 'Pubg', 50, 1, '', 'images/pubg.jpg', 2, ''),
(6, 'Counter-Strike', 100, 1, '', 'images/counter.jpg\r\n', 2, ''),
(7, 'Fashion-Show', 200, 1, '', 'images/onstage.jpg', 3, ''),
(8, 'Dance', 100, 0, '', 'images/dance.jpg', 3, ''),
(9, 'Singing', 50, 0, '', 'images/sing.jpg', 3, ''),
(10, 'Svit-Idol', 100, 0, '', 'images/idol.jpg', 3, ''),
(12, 'Short-Movie', 200, 0, '', 'images/offstage.jpg', 4, ''),
(13, 'Hackathon', 4000, 0, '', 'images/download.png', 3, ''),
(18, 'ROBO WAR', 5000, 0, '', 'images/robo.png', 1, ''),
(20, 'Valorant', 2000, 1, '', 'images/valo.jpeg', 1, 'Shivam'),
(21, 'Strike!!!', 500, 1, 'Jack', 'images/counter.jpg', 1, ''),
(22, 'League of Legends', 5000, 0, '', 'images/legue.jpg', 2, 'shivamhonade'),
(23, 'Pings with Things.', 6000, 0, '', 'images/ping.png', 1, 'Jack'),
(26, 'Apex Legends', 10000, 0, '', 'uploads/apex.png', 2, 'Miles');

-- --------------------------------------------------------

--
-- Table structure for table `events_post`
--

CREATE TABLE `events_post` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `usn` varchar(255) NOT NULL,
  `event_id` int(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`usn`, `event_id`, `Date`, `time`, `location`) VALUES
('', 1, '2022-11-16', '3.00pm', '135 Room'),
('', 2, '2022-11-16', '1.00pm', '020 Lab'),
('', 3, '2022-11-16', '11.00am', '136 Room'),
('', 4, '2022-11-16', '9.30am', '020 Lab'),
('', 5, '2022-10-17', '10.00am', '121 Lab'),
('', 6, '2022-10-17', '11.00am', '122 Lab'),
('', 7, '2022-10-17', '9.30pm', 'ON Stage'),
('', 8, '2022-10-17', '7.00pm', 'ON Stage'),
('', 9, '2022-10-17', '5.00pm', 'ON Stage'),
('', 10, '2022-10-17', '6.00pm', 'ON Stage'),
('', 11, '2022-10-16', '10.30am', '123 Room'),
('', 12, '2022-10-16', '10.00am', '021 Lab'),
('', 13, '2022-11-12', '3pm', '021 lab'),
('', 14, '2022-11-13', '2.00pm', 'Quandrangle'),
('', 18, '2023-06-29', '11 am', 'XYZ'),
('', 19, '2023-06-30', '11 am', 'XYZ'),
('Shivam', 20, '2023-07-01', '11 am', 'Game Point'),
('Peter', 21, '2023-07-01', '8 am', 'Game Point'),
('', 22, '2023-07-12', '8 am', 'Game Point'),
('', 23, '2023-07-27', '8 am', 'CC LAB'),
('', 24, '2023-07-20', '12 pm', 'Game Point'),
('', 26, '2023-07-22', '12 pm', 'Game Point'),
('', 101, '2023-05-24', '10 am', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `type_id` int(10) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`type_id`, `type_title`) VALUES
(1, 'Technical Events'),
(2, 'Gaming Events'),
(3, 'On Stage Events'),
(4, 'Off Stage Events');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '<h1 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; background-color: #ffffff; text-align: justify;\">What is Lorem Ipsum?</h1>\r\n<p style=\"text-align: justify;\"><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; background-color: #ffffff;\">Where does it come from?</h2>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p>', '2023-06-16 07:10:38', '2023-06-16 07:10:38'),
(2, NULL, NULL, '<p>sdfaasfjsajfljsalfjdsifldsajfij;asfjsjfoa</p>', '2023-06-16 07:11:50', '2023-06-16 07:11:50'),
(3, NULL, NULL, '<h1 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; background-color: #ffffff;\"><strong>What is Lorem Ipsum?</strong></h1>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"uploads/eye.jpg\" alt=\"\" width=\"496\" height=\"279\" /></p>\r\n<p>&nbsp;</p>\r\n<h1 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; background-color: #ffffff;\"><strong>Where does it come from?</strong></h1>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>&nbsp;</p>', '2023-06-16 07:41:00', '2023-06-16 07:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `participent`
--

CREATE TABLE `participent` (
  `usn` varchar(255) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `college` varchar(20) NOT NULL,
  `amount` int(255) NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `participent`
--

INSERT INTO `participent` (`usn`, `id`, `name`, `branch`, `sem`, `email`, `phone`, `college`, `amount`, `purpose`) VALUES
('', '1VA17CS005', 'Anu', 'CSE', 5, 'annapoornaba@gmail.com', '8123300011', 'svit', 0, ''),
('', '1VA17CS012', 'BHAVANA', 'cse', 5, 'BHAVANA@GMAIL.COM', '9934736623', 'Svit', 0, ''),
('', '1VA17CS022', 'Kavya', 'cse', 5, 'Kavya@gmail.com', '7888387323', 'svit', 0, ''),
('', '1VA17CS025', 'Mythri', 'ISE', 5, 'mythri@saividya.ac.in', '8998848488', 'svit', 0, ''),
('', '1VA17CS034', 'Prajwal', 'cse', 5, 'prajwal@gmail.com', '9858787438', 'svit', 0, ''),
('', '1VA17IS045', 'Prathiksha', 'ISE', 5, 'prathi@gmail.com', '7897854345', 'svit', 0, ''),
('', '2046491245045', 'Shivam', 'CSE', 6, 'shivamkopare@gmail.com', '9921947620', 'BIT', 0, ''),
('', '2045', 'Peter', 'Computer', 6, 'peter@gmail.com', '9921947630', 'BIT', 50, 'ads'),
('', '1VA17CS025', 'Shivam', 'Computer', 6, 'shivamkopare@gmail.com', '9921947630', 'BIT', 10000, 'adas'),
('', '2045', 'Peter', 'Computer', 6, 'peter@gmail.com', '9921947630', '0', 50, 'adas'),
('Shivam', '', 'Shivam', 'Computer', 6, 'shivamkopare@gmail.com', '9921947630', 'BIT', 50, 'dsfa');

-- --------------------------------------------------------

--
-- Table structure for table `pending_events`
--

CREATE TABLE `pending_events` (
  `usn` varchar(255) NOT NULL,
  `event_id` int(255) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_price` decimal(10,2) NOT NULL,
  `img_link` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `st_name` varchar(255) NOT NULL,
  `Posted_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_events`
--

INSERT INTO `pending_events` (`usn`, `event_id`, `event_title`, `event_price`, `img_link`, `type_id`, `Date`, `time`, `Location`, `sname`, `st_name`, `Posted_By`) VALUES
('shivamhonade', 22, 'League of Legends', '5000.00', 'images/legue.jpg', 2, '2023-07-15', '8 am', 'Game Point', 'Peter', 'Carl', 'shivamhonade');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `rid` int(11) NOT NULL,
  `id` varchar(20) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`rid`, `id`, `event_id`) VALUES
(1, '1VA17CS005', 2),
(2, '1VA17CS012', 4),
(3, '1VA17CS034', 2),
(4, '1VA17CS005', 3),
(5, '1VA17CS012', 3),
(6, '1VA17CS012', 5),
(8, '1VA17CS005', 6),
(10, '1VA17CS034', 7);

--
-- Triggers `registered`
--
DELIMITER $$
CREATE TRIGGER `count` AFTER INSERT ON `registered` FOR EACH ROW update events
set events.participents=events.participents+1
WHERE events.event_id=new.event_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `registration2`
--

CREATE TABLE `registration2` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `branch` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `student_id`, `student_name`, `branch`, `semester`, `email`, `phone`, `college`, `amount`, `purpose`) VALUES
(0005, '2051', 'John', 'Computer', '6', 'john@gmail.com', '8600603342', '0', '120.00', 'Apex Legends'),
(0006, '2052', 'John', 'Computer', '6', 'john@gmail.com', '9921947630', '0', '750.00', 'League of Legends'),
(0007, '2046', 'Jack', 'Computer', '6', 'jack@gmail.com', '8600603342', '0', '100.00', 'Valorant'),
(0008, '2052', 'Jack', 'Computer', '6', 'jack@gmail.com', '8600603342', '0', '300.00', 'Strike'),
(0009, '2052', 'Jack', 'Computer', '6', 'jack@gmail.com', '8600603342', '0', '300.00', 'Strike'),
(0010, '2050', 'Jack', 'Computer', '6', 'jack@gmail.com', '9921947630', '0', '300.00', 'Strike!!!');

-- --------------------------------------------------------

--
-- Table structure for table `staff_coordinator`
--

CREATE TABLE `staff_coordinator` (
  `stid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_coordinator`
--

INSERT INTO `staff_coordinator` (`stid`, `name`, `phone`, `event_id`) VALUES
(1, 'Mamatha.s', '9956436610', 1),
(2, 'Mamatha', '9956436123', 2),
(3, 'Suparna.A', '9956436456', 3),
(4, 'Geetha', '9956436789', 4),
(5, 'Radha', '9956436101', 5),
(6, 'Usha.D.R', '9123436610', 6),
(7, 'Deeksha.G', '9456436610', 7),
(8, 'Deeksha.Patgar', '9789436610', 8),
(9, 'Shubha Naik', '9956412310', 9),
(10, 'Sairaj Patgar', '9956445610', 10),
(11, 'Reshma Hittalmakhi', '9956473510', 11),
(12, 'Annanya.A.G', '9955636610', 12),
(13, 'Sushma', '8948476464', 13),
(14, 'Bhavya', '9876543210', 14),
(18, '', NULL, 18),
(19, '', NULL, 19),
(20, '', NULL, 20),
(21, '', NULL, 21),
(22, '', NULL, 22),
(23, '', NULL, 23),
(24, '', NULL, 24),
(26, '', NULL, 26),
(101, 'eb', NULL, 101);

-- --------------------------------------------------------

--
-- Table structure for table `student_coordinator`
--

CREATE TABLE `student_coordinator` (
  `sid` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_coordinator`
--

INSERT INTO `student_coordinator` (`sid`, `st_name`, `phone`, `event_id`) VALUES
(1, 'Prajwal Srinivas', '6956436610', 1),
(2, 'Rakesh Mariyappa', '7956436123', 2),
(3, 'Arjun.A', '8956436456', 3),
(4, 'Sanjana', '6956436789', 4),
(5, 'NIkhil Bhat', '7956436101', 5),
(6, 'Pruthvi P', '8123436610', 6),
(7, 'Anshuman.A.N', '6456436610', 7),
(8, 'Abhinandhan.A', '7789436610', 8),
(9, 'Suraj Upadhya', '7956412310', 9),
(10, 'Imran Khalil Khan', '7956445610', 10),
(11, 'Mythri', '6956473510', 11),
(12, 'Pratyush Mishra', '8955636610', 12),
(13, 'Kavya', '8994874384', 13),
(14, 'Rishitha', NULL, 14),
(18, 'ABC', NULL, 18),
(19, 'ABC', NULL, 19),
(20, 'ABC', NULL, 20),
(21, 'Mile', NULL, 21),
(22, 'Mile', NULL, 22),
(23, 'Harry', NULL, 23),
(24, 'Tanjiro', NULL, 24),
(26, 'Tanjiro', NULL, 26),
(101, 'er', NULL, 101);

-- --------------------------------------------------------

--
-- Table structure for table `tiny`
--

CREATE TABLE `tiny` (
  `id` int(10) NOT NULL,
  `textarea` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiny`
--

INSERT INTO `tiny` (`id`, `textarea`) VALUES
(1, '<h1>HELLO</h1>'),
(2, '<h2 style=\"text-align: justify;\">What is Lorem Ipsum?</h2>\n<p style=\"text-align: justify;\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `DateTime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `payment_id`, `amount`, `buyer_name`, `purpose`, `email`, `phone`, `DateTime`) VALUES
(1, 'MOJO3623F05A23953904', '150.00', 'Shivam', '', 'shivamkopare52@gmail.com', '+919921947630', '2023-07-02 05:19:09.850038'),
(2, 'MOJO3630F05A71721522', '50.00', 'shivamhonade', '', 'shivam@gmail.com', '+919921947630', '2023-07-02 05:19:09.850038'),
(3, 'MOJO3701K05A61341987', '50.00', 'Shivam', '', 'shivamhonade9096@gmail.com', '+919921947630', '2023-07-02 05:19:09.850038'),
(5, 'MOJO3702J05A23990665', '500.00', 'Jack', '', 'jack@gmail.com', '+15853042587', '2023-07-02 05:22:39.061571'),
(6, 'MOJO3703O05A64022809', '500.00', 'Shivam', '', 'shivamk@gmail.com', '+919921947630', '2023-07-03 06:06:33.278946'),
(7, 'MOJO3703J05A64022823', '120.00', 'John', 'Apex Legend', 'john@gmail.com', '+918600603342', '2023-07-03 08:21:55.134839'),
(8, 'MOJO3703505A64022939', '750.00', 'John', 'League of Legends', 'john@gmail.com', '+919921947630', '2023-07-03 08:25:26.755432'),
(9, 'MOJO3703605A64022957', '100.00', 'Jack', 'Valorant', 'jack@gmail.com', '+918600603342', '2023-07-03 08:59:53.518094'),
(10, 'MOJO3703405A64022966', '300.00', 'Jack', 'Strike', 'jack@gmail.com', '+918600603342', '2023-07-03 09:12:48.749447'),
(11, 'MOJO3703305A64022968', '300.00', 'Jack', 'Strike!!!', 'jack@gmail.com', '+919921947630', '2023-07-03 09:14:54.109010');

-- --------------------------------------------------------

--
-- Table structure for table `userform`
--

CREATE TABLE `userform` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `instagram_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `github_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userform`
--

INSERT INTO `userform` (`id`, `username`, `email`, `phone`, `mobile`, `address`, `image`, `password`, `cpassword`, `user_type`, `instagram_link`, `linkedin_link`, `github_link`) VALUES
(1, 'Shivam', 'shivamkopare@gmail.com', 860060334, 994568221, 'Wardha', 'images/male_pic.png', '$2y$10$d1ateo1jSDOGcHq3h5Hsyei6l9s5J4oy8ThETnwA.ONhkYCYb18qW', '$2y$10$2GWhYE8DrRETOOycVUFATecs1vEvefDzhBunYXp92dpiIIpYbL2.W', 'user', 'https://www.instagram.com/shivam_kopare/', 'https://www.linkedin.com/in/shivam-kopare/', 'https://www.linkedin.com/in/shivam-kopare/'),
(2, 'admin', 'admin@gmail.com', 0, 0, '', '', '$2y$10$/hPctv7EPMTUCrn4B.rgBu9PYtOcu2Ic5Rk1SHD2De9IdHsjGKnb2', '$2y$10$k/OL/WrLpWre1jRLlSVpGuYy6LiSMWgAhVzZ5hsUYHZiUFthgTxFq', 'admin', '', '', ''),
(3, 'Shivamh', 'shivamh@gmail.com', 0, 0, '', '', '$2y$10$ulShYDCmMLJXGy6j2E02Au0ttyh64gVvMj/XVgQE/yj4fmPrUmyOq', '$2y$10$F7mSvvqcwHK6j563jW6lv.D4DLhPu6vXZvMcbCezpPAIl6d6Qe492', 'user', '', '', ''),
(4, 'Peter', 'peter@gmail.com', 0, 0, '', 'images/P.png', '$2y$10$UlwI/OzQXEkvges0pZOP6em7S0X24ezkcrKw5Y.fe2i9brg5UDvku', '$2y$10$KGsOQm4beM83ERExalKdc.Obx8rb1tryR3OED6dbX5DNr.lY16quO', 'user', '', '', ''),
(5, 'shivamhonade', 'shivam@gmail.com', 2147483647, 786446, 'Wardha', 'images/user.png', '$2y$10$RqxeR3UpADy.nn1ZGPniW.7F8Ss02EarkCoage17A3nKrWCWFPFLe', '$2y$10$uKhyaN8f9KPJ05Pu2a6VH.5p1O6gWxYfdf5igc/WTs9.xDZtH/Vt.', 'user', 'https://www.instagram.com/shivam_honade/', 'https://www.linkedin.com/shivam_honade/', 'https://www.github.com/shivam_honade/'),
(7, 'Jack', 'jack@gmail.com', 2147483647, 2147483647, 'New York', 'uploads/male_pic.png', '$2y$10$4Iro/wP/ROStVeqZolpEY.9GnJlFCXcdFmq/WiV45/QDNePnGYOSu', '$2y$10$TGMfdR0wWuBX.X8pWceFuuyOOC97oJsaAK4lyyrWk6yzABnODP.4K', 'user', '', '', ''),
(8, 'Miles', 'mile@gmail.com', 860096878, 2147483647, 'Brazil', 'uploads/345_ShivamKopare.jpg', '$2y$10$95VACAt8h9u7APdSzoc6H.xXsN3szwz8yG9xC8vG25XtCyoYX9EIe', '$2y$10$PSz1XJX7w88AuUIRGC3sVOMn/qoNgxlaDulGgrSGSsWkce84m878e', 'user', '', '', ''),
(9, 'Harry', 'harry@gmail.com', 0, 0, '', 'uploads/icon-admin.png', '$2y$10$D/ZDGhQ44/3.ypoWUovrW.9RJaR6ipqBVOhvWHGEVHTiy4HH88.x6', '$2y$10$MlbQ7YA8vAdAUjYcZAqgau.lKxO9r52yYsSu4N9XG//nZ2iWJQ2F6', '', '', '', ''),
(10, 'Shivamk', 'shivamk@gmail.com', 0, 0, '', 'uploads/icon.png', '$2y$10$mKI8PIqEFqv2NK/oM4XNlOD4T5NycewrU6Cxw7Q7D6cjuVwvOy.jC', '$2y$10$7tWrRHuQCm561Ij.al2UweYS30D6OuNLk1YpqC7MbD6oPfvuoQJbi', 'user', '', '', ''),
(11, 'John', 'john@gmail.com', 0, 0, '', 'uploads/male_pic.png', '$2y$10$VI9RAIA5IO5kK7pJzet6xuWLVPpp3wRokFa5vfWAnQBmjz.1PSXsy', '$2y$10$tcNWIB6/NUe4dr6NMPZYnuJQaUY8JnE/yuL/S8qaq6gMnMtplRl6a', 'user', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_post`
--

CREATE TABLE `users_post` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events_post`
--
ALTER TABLE `events_post`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_events`
--
ALTER TABLE `pending_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `registration2`
--
ALTER TABLE `registration2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_coordinator`
--
ALTER TABLE `staff_coordinator`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `student_coordinator`
--
ALTER TABLE `student_coordinator`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tiny`
--
ALTER TABLE `tiny`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userform`
--
ALTER TABLE `userform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_post`
--
ALTER TABLE `users_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_info`
--
ALTER TABLE `course_info`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_events`
--
ALTER TABLE `pending_events`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration2`
--
ALTER TABLE `registration2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff_coordinator`
--
ALTER TABLE `staff_coordinator`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `student_coordinator`
--
ALTER TABLE `student_coordinator`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tiny`
--
ALTER TABLE `tiny`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userform`
--
ALTER TABLE `userform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration2`
--
ALTER TABLE `registration2`
  ADD CONSTRAINT `registration2_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
