-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 08:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cusitfiveer`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_gig`
--

CREATE TABLE `basic_gig` (
  `b_gig_id` int(11) NOT NULL,
  `b_gig_image` varchar(50) DEFAULT NULL,
  `b_gig_price` varchar(10) DEFAULT NULL,
  `b_number_of_pages` varchar(100) DEFAULT NULL,
  `b_delivery_time` varchar(100) DEFAULT NULL,
  `b_revision` varchar(10) DEFAULT NULL,
  `b_source_file` varchar(2) DEFAULT NULL,
  `b_logo_transparancy` varchar(2) DEFAULT NULL,
  `b_high_resolution` varchar(2) DEFAULT NULL,
  `b_3d_mockup` varchar(2) DEFAULT NULL,
  `b_stationary_design` varchar(2) DEFAULT NULL,
  `b_social_kit` varchar(2) DEFAULT NULL,
  `b_vector_kit` varchar(2) DEFAULT NULL,
  `s_gig_id` int(11) DEFAULT NULL,
  `b_gig_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_gig`
--

INSERT INTO `basic_gig` (`b_gig_id`, `b_gig_image`, `b_gig_price`, `b_number_of_pages`, `b_delivery_time`, `b_revision`, `b_source_file`, `b_logo_transparancy`, `b_high_resolution`, `b_3d_mockup`, `b_stationary_design`, `b_social_kit`, `b_vector_kit`, `s_gig_id`, `b_gig_email`) VALUES
(19, '949918302.png', '500', '2', '20', '2', '1', '1', '1', '0', '0', '0', '0', NULL, 'bmsm101@gmail.com'),
(20, '1336842416.jpg', '65', '2', '54', '4', '1', '0', '1', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com'),
(21, '1976813858.png', '34', '3', '', '', '1', '0', '0', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com'),
(23, '218811094.png', '44', '3', '333', '3', '0', '0', '0', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com'),
(24, '18070262.png', '343', '33', '3', '', '0', '0', '0', '0', '0', '0', '0', NULL, 'bmsm101@gmail.com'),
(25, '627393825.png', '33', '22', '', '', '0', '0', '0', '0', '0', '0', '0', NULL, 'testliaqat@gmail.com'),
(26, '1573397846.png', '43', '12', '', '', '0', '0', '0', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(50) DEFAULT NULL,
  `b_phone` varchar(11) DEFAULT NULL,
  `b_email` varchar(50) DEFAULT NULL,
  `b_country` varchar(50) DEFAULT NULL,
  `b_province` varchar(50) DEFAULT NULL,
  `b_dob` varchar(50) DEFAULT NULL,
  `business` varchar(100) DEFAULT NULL,
  `signup_id` int(11) DEFAULT NULL,
  `b_image` varchar(50) DEFAULT NULL,
  `b_firstname` varchar(30) DEFAULT NULL,
  `b_lastname` varchar(30) DEFAULT NULL,
  `b_optional_email` varchar(30) DEFAULT NULL,
  `b_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`b_id`, `b_name`, `b_phone`, `b_email`, `b_country`, `b_province`, `b_dob`, `business`, `signup_id`, `b_image`, `b_firstname`, `b_lastname`, `b_optional_email`, `b_status`) VALUES
(16, 'Zahir Ullah', '03028829598', 'liaqat@gmail.com', 'pakistan', 'kpk', '98', 'Android Development', NULL, '1227877570.png', 'Zahir', 'Ullah', 'zahir@gmail.com', 1),
(17, 'null', 'null', 'keep@gmail.com', 'null', 'null', 'null', 'null', NULL, 'null', 'null', 'null', 'null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_msg`
--

CREATE TABLE `chat_msg` (
  `msg_from` varchar(255) NOT NULL,
  `msg_to` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_msg`
--

INSERT INTO `chat_msg` (`msg_from`, `msg_to`, `data`, `msg_id`) VALUES
('liaqatali205204@gmail.com', 'liaqat@gmail.com', 'welcome', 131),
('liaqat@gmail.com', 'liaqatali205204@gmail.com', 'hi dear customer what you need', 132),
('bmsm101@gmail.com', 'liaqat@gmail.com', 'i need project', 133),
('liaqat@gmail.com', 'bmsm101@gmail.com', 'kpal kar oka', 134);

-- --------------------------------------------------------

--
-- Table structure for table `disputed_transaction`
--

CREATE TABLE `disputed_transaction` (
  `pp_TxnRefNo` varchar(32) NOT NULL,
  `pp_TxnDateTime` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `pp_TxnCurrency` text DEFAULT NULL,
  `pp_SecureHash` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `premium_gig`
--

CREATE TABLE `premium_gig` (
  `p_gig_id` int(11) NOT NULL,
  `p_gig_description` varchar(500) DEFAULT NULL,
  `p_gig_image` varchar(50) DEFAULT NULL,
  `p_gig_price` varchar(10) DEFAULT NULL,
  `p_number_of_pages` varchar(100) DEFAULT NULL,
  `p_delivery_time` varchar(100) DEFAULT NULL,
  `p_revision` varchar(10) DEFAULT NULL,
  `p_source_file` varchar(2) DEFAULT NULL,
  `p_logo_transparancy` varchar(2) DEFAULT NULL,
  `p_high_resolution` varchar(2) DEFAULT NULL,
  `p_3d_mockup` varchar(2) DEFAULT NULL,
  `p_stationary_design` varchar(2) DEFAULT NULL,
  `p_social_kit` varchar(2) DEFAULT NULL,
  `p_vector_kit` varchar(2) DEFAULT NULL,
  `s_gig_id` int(11) DEFAULT NULL,
  `p_gig_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `premium_gig`
--

INSERT INTO `premium_gig` (`p_gig_id`, `p_gig_description`, `p_gig_image`, `p_gig_price`, `p_number_of_pages`, `p_delivery_time`, `p_revision`, `p_source_file`, `p_logo_transparancy`, `p_high_resolution`, `p_3d_mockup`, `p_stationary_design`, `p_social_kit`, `p_vector_kit`, `s_gig_id`, `p_gig_email`) VALUES
(19, NULL, '1239427366.jpeg', '2000', '5', '40', '5', '1', '0', '1', '1', '1', '1', '0', NULL, 'bmsm101@gmail.com'),
(20, NULL, '1689207837.jpg', '7', '6', '8', '3', '1', '0', '1', '0', '0', '', '0', NULL, 'liaqatali205204@gmail.com'),
(21, NULL, '2141427395.png', '44', '3', '34', '', '0', '0', '1', '0', '0', '', '0', NULL, 'liaqatali205204@gmail.com'),
(23, NULL, '584847607.png', '43', '22', '', '4', '1', '1', '0', '0', '0', '', '0', NULL, 'liaqatali205204@gmail.com'),
(24, NULL, '887422817.png', '343', '334', '34', '3', '1', '0', '0', '0', '0', '', '0', NULL, 'bmsm101@gmail.com'),
(25, NULL, '2051490442.png', '33', '33', '', '', '0', '0', '0', '0', '0', '', '0', NULL, 'testliaqat@gmail.com'),
(26, NULL, '1746559670.png', '33', '33', '', '', '0', '0', '0', '0', '0', '', '0', NULL, 'liaqatali205204@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `s_image` varchar(20) DEFAULT NULL,
  `s_story` varchar(30) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL,
  `s_phone` varchar(11) DEFAULT NULL,
  `s_education` int(11) DEFAULT NULL,
  `s_skill_id` int(11) DEFAULT NULL,
  `s_certificate_id` int(11) DEFAULT NULL,
  `s_gig_id` int(11) DEFAULT NULL,
  `s_social_id` int(11) DEFAULT NULL,
  `s_description` varchar(150) DEFAULT NULL,
  `s_website` varchar(100) DEFAULT NULL,
  `s_occupation` varchar(100) DEFAULT NULL,
  `s_lauguage_id` int(11) DEFAULT NULL,
  `signup_id` int(11) DEFAULT NULL,
  `s_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`s_id`, `s_name`, `s_image`, `s_story`, `s_email`, `s_phone`, `s_education`, `s_skill_id`, `s_certificate_id`, `s_gig_id`, `s_social_id`, `s_description`, `s_website`, `s_occupation`, `s_lauguage_id`, `signup_id`, `s_status`) VALUES
(19, 'Muhammad Bilal', '1196731534.jpeg', 'Our First priority is your wor', 'bmsm101@gmail.com', '03169938901', NULL, NULL, NULL, NULL, NULL, 'we are developing the best website for our client.', 'MuhammadBilalDeveloper.com', NULL, NULL, NULL, 1),
(24, 'Liaqat ali', '321962682.jpeg', 'we will keep your product save', 'liaqatali205204@gmail.com', 'null', NULL, NULL, NULL, NULL, NULL, 'we are providing ', 'null', NULL, NULL, NULL, 1),
(25, 'test ', '1057716616.png', 'we are not happy with bad work', 'testliaqat@gmail.com', 'null', NULL, NULL, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, 1),
(26, 'null', 'null', 'null', 'check@gmail.com', 'null', NULL, NULL, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, 1),
(27, 'null', 'null', 'null', 'yyyy@gmail.com', 'null', NULL, NULL, NULL, NULL, NULL, 'null', 'null', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `role` varchar(2) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `verification_token` varchar(2) NOT NULL,
  `signup_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `pass`, `role`, `verification_code`, `verification_token`, `signup_date`) VALUES
(15, 'bmsm101@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1c9ac0159c94d8d0cbedc973445af2da', '1', '2022-06-11'),
(16, 'liaqatali205204@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', 'b534ba68236ba543ae44b22bd110a1d6', '1', '2022-06-11'),
(17, 'liaqat@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', '087408522c31eeb1f982bc0eaf81d35f', '1', '2022-06-12'),
(18, 'testliaqat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '5ea1649a31336092c05438df996a3e59', '0', '2022-06-13'),
(19, 'keep@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', 'bf62768ca46b6c3b5bea9515d1a1fc45', '0', '2022-06-13'),
(20, 'check@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '42998cf32d552343bc8e460416382dca', '1', '2022-06-13'),
(21, 'yyyy@gmail.com', 'd0336e3b94fd76fc2ef669058d11917a', '1', '46ba9f2a6976570b0353203ec4474217', '0', '2022-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `standard_gig`
--

CREATE TABLE `standard_gig` (
  `s_gig_id` int(11) NOT NULL,
  `s_gig_description` varchar(500) DEFAULT NULL,
  `s_gig_image` varchar(50) DEFAULT NULL,
  `s_gig_price` varchar(10) DEFAULT NULL,
  `s_number_of_pages` varchar(100) DEFAULT NULL,
  `s_delivery_time` varchar(100) DEFAULT NULL,
  `s_revision` varchar(10) DEFAULT NULL,
  `s_source_file` varchar(2) DEFAULT NULL,
  `s_logo_transparancy` varchar(2) DEFAULT NULL,
  `s_high_resolution` varchar(2) DEFAULT NULL,
  `s_3d_mockup` varchar(2) DEFAULT NULL,
  `s_stationary_design` varchar(2) DEFAULT NULL,
  `s_social_kit` varchar(2) DEFAULT NULL,
  `s_vector_kit` varchar(2) DEFAULT NULL,
  `gig_id` int(11) DEFAULT NULL,
  `s_gig_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standard_gig`
--

INSERT INTO `standard_gig` (`s_gig_id`, `s_gig_description`, `s_gig_image`, `s_gig_price`, `s_number_of_pages`, `s_delivery_time`, `s_revision`, `s_source_file`, `s_logo_transparancy`, `s_high_resolution`, `s_3d_mockup`, `s_stationary_design`, `s_social_kit`, `s_vector_kit`, `gig_id`, `s_gig_email`) VALUES
(19, NULL, '697226286.png', '1000', '3', '20', '2', '1', '1', '0', '0', '0', '1', '0', NULL, 'bmsm101@gmail.com'),
(20, NULL, '1622044196.jpg', '7', '5', '43', '', '0', '0', '0', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com'),
(21, NULL, '726032760.png', '34', '3', '', '', '0', '0', '1', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com'),
(23, NULL, '665319536.png', '44', '3', '', '4', '0', '0', '1', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com'),
(24, NULL, '74834582.png', '333', '33', '34', '3343', '0', '1', '0', '0', '0', '0', '0', NULL, 'bmsm101@gmail.com'),
(25, NULL, '984540727.png', '33', '12', '', '', '0', '0', '0', '0', '0', '0', '0', NULL, 'testliaqat@gmail.com'),
(26, NULL, '516878447.png', '33', '3', '', '', '0', '0', '0', '0', '0', '0', '0', NULL, 'liaqatali205204@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `s_b_order`
--

CREATE TABLE `s_b_order` (
  `o_id` int(11) NOT NULL,
  `o_sender_email` varchar(200) DEFAULT NULL,
  `o_receiver_email` varchar(200) DEFAULT NULL,
  `o_sender_name` varchar(50) DEFAULT NULL,
  `o_receiver_name` varchar(50) DEFAULT NULL,
  `o_price` varchar(10) DEFAULT NULL,
  `o_delivery_data` varchar(11) DEFAULT NULL,
  `o_requirment` varchar(20) DEFAULT NULL,
  `o_upload` varchar(20) DEFAULT NULL,
  `o_complete` varchar(2) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL,
  `order_gig_id` int(11) DEFAULT NULL,
  `type_of_gig` varchar(100) DEFAULT NULL,
  `star_per_order` varchar(5) DEFAULT NULL,
  `tex` varchar(10) DEFAULT NULL,
  `order_date` varchar(20) DEFAULT NULL,
  `gig_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_b_order`
--

INSERT INTO `s_b_order` (`o_id`, `o_sender_email`, `o_receiver_email`, `o_sender_name`, `o_receiver_name`, `o_price`, `o_delivery_data`, `o_requirment`, `o_upload`, `o_complete`, `s_id`, `b_id`, `order_gig_id`, `type_of_gig`, `star_per_order`, `tex`, `order_date`, `gig_name`) VALUES
(31, 'liaqat@gmail.com', 'bmsm101@gmail.com', 'Zahir Ullah', 'Muhammad Bilal', '343', '2022-06-02', '9426.docx', NULL, '1', NULL, NULL, 24, '1', NULL, NULL, '22:06:12', 'IOS Development'),
(32, 'liaqat@gmail.com', 'bmsm101@gmail.com', 'Zahir Ullah', 'Muhammad Bilal', '333', '2022-06-23', 'Bilal CV (1).docx', NULL, '0', NULL, NULL, 24, '2', NULL, NULL, '06:13:22', 'IOS Development');

-- --------------------------------------------------------

--
-- Table structure for table `s_certificate`
--

CREATE TABLE `s_certificate` (
  `s_certificate_id` int(11) NOT NULL,
  `s_certificate` varchar(20) DEFAULT NULL,
  `s_certificate_from` varchar(20) DEFAULT NULL,
  `s_certificate_year` varchar(5) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_certificate`
--

INSERT INTO `s_certificate` (`s_certificate_id`, `s_certificate`, `s_certificate_from`, `s_certificate_year`, `s_email`) VALUES
(13, 'CCNA', 'Charsadda', '2016', 'bmsm101@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `s_education`
--

CREATE TABLE `s_education` (
  `s_education_id` int(11) NOT NULL,
  `s_education_title` varchar(20) DEFAULT NULL,
  `s_education_major` varchar(20) DEFAULT NULL,
  `s_education_year` varchar(5) DEFAULT NULL,
  `s_university_country` varchar(20) DEFAULT NULL,
  `s_university_name` varchar(20) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_education`
--

INSERT INTO `s_education` (`s_education_id`, `s_education_title`, `s_education_major`, `s_education_year`, `s_university_country`, `s_university_name`, `s_email`) VALUES
(33, 'BS', 'Software Engineering', '2018', NULL, NULL, 'bmsm101@gmail.com'),
(35, 'BA', 'Computer Science', '2016', NULL, NULL, 'bmsm101@gmail.com'),
(36, 'BA', 'Computer Science', '2016', NULL, NULL, 'bmsm101@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `s_gig`
--

CREATE TABLE `s_gig` (
  `s_gig_id` int(11) NOT NULL,
  `g_name` varchar(20) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL,
  `g_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_gig`
--

INSERT INTO `s_gig` (`s_gig_id`, `g_name`, `s_email`, `g_description`) VALUES
(19, 'Web Design & Develop', 'bmsm101@gmail.com', 'We will be developing a responsive website for You with 100% trust'),
(20, 'Gif File & Animation', 'liaqatali205204@gmail.com', 'we are creating logo and animation'),
(21, 'Android Development', 'liaqatali205204@gmail.com', 'I will develop an android phone'),
(23, 'Creative writing', 'liaqatali205204@gmail.com', 'we are doing content writing'),
(24, 'IOS Development', 'bmsm101@gmail.com', 'ios development'),
(25, 'Logo Design', 'testliaqat@gmail.com', 'we will design logo for your business'),
(26, 'Gif File & Animation', 'liaqatali205204@gmail.com', 'this is animation gig');

-- --------------------------------------------------------

--
-- Table structure for table `s_language`
--

CREATE TABLE `s_language` (
  `s_language_id` int(11) NOT NULL,
  `s_language` varchar(50) DEFAULT NULL,
  `s_language_level` varchar(10) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_language`
--

INSERT INTO `s_language` (`s_language_id`, `s_language`, `s_language_level`, `s_email`) VALUES
(38, 'English', 'basic', 'bmsm101@gmail.com'),
(39, 'Urdu', 'conversati', 'bmsm101@gmail.com'),
(41, 'English', 'conversati', 'liaqatali205204@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `s_skill`
--

CREATE TABLE `s_skill` (
  `s_skill_id` int(11) NOT NULL,
  `s_skill` varchar(30) DEFAULT NULL,
  `s_skill_level` varchar(14) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_skill`
--

INSERT INTO `s_skill` (`s_skill_id`, `s_skill`, `s_skill_level`, `s_email`) VALUES
(17, 'Web Design & Development', '2 Year', 'bmsm101@gmail.com'),
(18, 'IOS Development', '1 Year', 'bmsm101@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `s_social`
--

CREATE TABLE `s_social` (
  `s_social_id` int(11) NOT NULL,
  `s_facebook` varchar(100) DEFAULT NULL,
  `s_instagram` varchar(100) DEFAULT NULL,
  `s_youtube` varchar(100) DEFAULT NULL,
  `s_twitter` varchar(100) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_gig`
--
ALTER TABLE `basic_gig`
  ADD PRIMARY KEY (`b_gig_id`),
  ADD KEY `s_gig_id` (`s_gig_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `signup_id` (`signup_id`);

--
-- Indexes for table `chat_msg`
--
ALTER TABLE `chat_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `disputed_transaction`
--
ALTER TABLE `disputed_transaction`
  ADD PRIMARY KEY (`pp_TxnRefNo`);

--
-- Indexes for table `premium_gig`
--
ALTER TABLE `premium_gig`
  ADD PRIMARY KEY (`p_gig_id`),
  ADD KEY `s_gig_id` (`s_gig_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_lauguage_id` (`s_lauguage_id`),
  ADD KEY `s_education` (`s_education`),
  ADD KEY `s_skill_id` (`s_skill_id`),
  ADD KEY `s_certificate_id` (`s_certificate_id`),
  ADD KEY `s_social_id` (`s_social_id`),
  ADD KEY `s_gig_id` (`s_gig_id`),
  ADD KEY `signup_id` (`signup_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_gig`
--
ALTER TABLE `standard_gig`
  ADD PRIMARY KEY (`s_gig_id`),
  ADD KEY `gig_id` (`gig_id`);

--
-- Indexes for table `s_b_order`
--
ALTER TABLE `s_b_order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `s_certificate`
--
ALTER TABLE `s_certificate`
  ADD PRIMARY KEY (`s_certificate_id`);

--
-- Indexes for table `s_education`
--
ALTER TABLE `s_education`
  ADD PRIMARY KEY (`s_education_id`);

--
-- Indexes for table `s_gig`
--
ALTER TABLE `s_gig`
  ADD PRIMARY KEY (`s_gig_id`);

--
-- Indexes for table `s_language`
--
ALTER TABLE `s_language`
  ADD PRIMARY KEY (`s_language_id`);

--
-- Indexes for table `s_skill`
--
ALTER TABLE `s_skill`
  ADD PRIMARY KEY (`s_skill_id`);

--
-- Indexes for table `s_social`
--
ALTER TABLE `s_social`
  ADD PRIMARY KEY (`s_social_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_gig`
--
ALTER TABLE `basic_gig`
  MODIFY `b_gig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chat_msg`
--
ALTER TABLE `chat_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `premium_gig`
--
ALTER TABLE `premium_gig`
  MODIFY `p_gig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `standard_gig`
--
ALTER TABLE `standard_gig`
  MODIFY `s_gig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `s_b_order`
--
ALTER TABLE `s_b_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `s_certificate`
--
ALTER TABLE `s_certificate`
  MODIFY `s_certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `s_education`
--
ALTER TABLE `s_education`
  MODIFY `s_education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `s_gig`
--
ALTER TABLE `s_gig`
  MODIFY `s_gig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `s_language`
--
ALTER TABLE `s_language`
  MODIFY `s_language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `s_skill`
--
ALTER TABLE `s_skill`
  MODIFY `s_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `s_social`
--
ALTER TABLE `s_social`
  MODIFY `s_social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basic_gig`
--
ALTER TABLE `basic_gig`
  ADD CONSTRAINT `basic_gig_ibfk_1` FOREIGN KEY (`s_gig_id`) REFERENCES `s_gig` (`s_gig_id`);

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`signup_id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `premium_gig`
--
ALTER TABLE `premium_gig`
  ADD CONSTRAINT `premium_gig_ibfk_1` FOREIGN KEY (`s_gig_id`) REFERENCES `s_gig` (`s_gig_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`s_lauguage_id`) REFERENCES `s_language` (`s_language_id`),
  ADD CONSTRAINT `seller_ibfk_2` FOREIGN KEY (`s_education`) REFERENCES `s_education` (`s_education_id`),
  ADD CONSTRAINT `seller_ibfk_3` FOREIGN KEY (`s_skill_id`) REFERENCES `s_skill` (`s_skill_id`),
  ADD CONSTRAINT `seller_ibfk_4` FOREIGN KEY (`s_certificate_id`) REFERENCES `s_certificate` (`s_certificate_id`),
  ADD CONSTRAINT `seller_ibfk_5` FOREIGN KEY (`s_social_id`) REFERENCES `s_social` (`s_social_id`),
  ADD CONSTRAINT `seller_ibfk_6` FOREIGN KEY (`s_gig_id`) REFERENCES `s_gig` (`s_gig_id`),
  ADD CONSTRAINT `seller_ibfk_7` FOREIGN KEY (`s_gig_id`) REFERENCES `s_gig` (`s_gig_id`),
  ADD CONSTRAINT `seller_ibfk_8` FOREIGN KEY (`signup_id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `standard_gig`
--
ALTER TABLE `standard_gig`
  ADD CONSTRAINT `standard_gig_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `s_gig` (`s_gig_id`);

--
-- Constraints for table `s_b_order`
--
ALTER TABLE `s_b_order`
  ADD CONSTRAINT `s_b_order_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seller` (`s_id`),
  ADD CONSTRAINT `s_b_order_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `buyer` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
