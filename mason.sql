-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2021 at 05:40 PM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oxcakma1_mason`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(20) NOT NULL,
  `banner_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `banner_text` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_hash`, `banner_text`) VALUES
(3, 'f2349de4d9e4aaa2dd0b671e9367d877', 'Grafik Tasarım'),
(4, '9fee75f1c79cde0adce875f99e326f2f', 'Web Yazılım');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(20) NOT NULL,
  `brand_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `brand_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `brand_image` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/images/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_hash`, `brand_title`, `brand_image`) VALUES
(1, '4bd5ff52c85af78c12f5186fe9cda9be', 'Test Marka', 'assets/index/images/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(20) NOT NULL,
  `contact_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_fullname` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_email` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_message` char(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_address` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_date` char(20) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_hash`, `contact_fullname`, `contact_email`, `contact_message`, `contact_address`, `contact_date`) VALUES
(1, 'John Doe-john@gmail.com', 'John Doe', 'john@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '::1', '15.12.2020-01:05'),
(2, 'Osman CAKMAK-oxcakmak@hotmail.com', 'Osman CAKMAK', 'oxcakmak@hotmail.com', '555', '31.223.20.82', '06.01.2021-21:16');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(20) NOT NULL,
  `counter_hash` char(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_icon` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_value` char(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `counter_title` char(30) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_id`, `counter_hash`, `counter_icon`, `counter_value`, `counter_title`) VALUES
(1, 'a8a2a893e9763f80167bd4d4eba93e72', 'adn', '250', 'Mutlu Müşteri');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(20) NOT NULL,
  `portfolio_slug` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_thumbnail` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/images/default.png',
  `portfolio_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_description` char(160) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_client` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_start_date` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_finish_date` char(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_type` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `portfolio_link` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_slug`, `portfolio_thumbnail`, `portfolio_title`, `portfolio_description`, `portfolio_client`, `portfolio_start_date`, `portfolio_finish_date`, `portfolio_type`, `portfolio_link`) VALUES
(1, 'deneme-portfoy', 'assets/index/images/default.png', 'Deneme Portföy', 'Deneme portföy', 'oxcakmak', '01.11.2020', '13.12.2020', 'Web Yazılım', 'https://oxcakmak.com/');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(20) NOT NULL,
  `service_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `service_icon` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `service_title` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `service_description` char(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_hash`, `service_icon`, `service_title`, `service_description`) VALUES
(5, 'e141bdcd04a97bfd029d974d22b71a17', 'search', 'Branding', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(20) NOT NULL,
  `setting_name` char(10) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'setting',
  `setting_meta_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_meta_description` char(160) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_meta_keyword` char(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_meta_stuck` char(20) COLLATE utf8_turkish_ci DEFAULT 'Geek',
  `setting_meta_sperator` char(1) COLLATE utf8_turkish_ci DEFAULT '-',
  `setting_banner_image` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/images/banner.png',
  `setting_banner_title` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_banner_first` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_name` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_job` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_content` char(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `setting_about_image` char(100) COLLATE utf8_turkish_ci DEFAULT 'assets/index/images/about/about.png',
  `setting_contact_location` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `setting_contact_phone` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `setting_contact_email` char(30) COLLATE utf8_turkish_ci NOT NULL,
  `setting_footer` char(255) COLLATE utf8_turkish_ci NOT NULL,
  `setting_particles_status` char(1) COLLATE utf8_turkish_ci DEFAULT '0',
  `setting_preloader_status` char(1) COLLATE utf8_turkish_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_name`, `setting_meta_title`, `setting_meta_description`, `setting_meta_keyword`, `setting_meta_stuck`, `setting_meta_sperator`, `setting_banner_image`, `setting_banner_title`, `setting_banner_first`, `setting_about_name`, `setting_about_job`, `setting_about_content`, `setting_about_image`, `setting_contact_location`, `setting_contact_phone`, `setting_contact_email`, `setting_footer`, `setting_particles_status`, `setting_preloader_status`) VALUES
(1, 'setting', 'Mason', 'Mason', 'mason', 'Mason', '-', 'assets/uploaded/banner_ded54cb104b570e0221eb1dc0dec4cba78b00de6.jpg', 'Websiteme Hoşgeldiniz!', 'Size Nasıl Yardımcı Olabilirim ?', 'John DOE', 'Full Stack Developer', 'I am a Full Stack Developer, working for the last five years. I have experience working with local clients along with clients from all around the world. I have vast knowledge in html, css, Javascript , JQuery, Angular (javascript framewok)', 'assets/index/images/about/about.png', 'Kocaeli, TURKEY', '+90 262 606 0829', 'info@oxcakmak.com', 'Copyright &copy; %date% <a href=\"%link%\">%stuck%</a>', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(20) NOT NULL,
  `skill_hash` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `skill_title` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `skill_pertencage` char(3) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `skill_hash`, `skill_title`, `skill_pertencage`) VALUES
(2, '2f683a9f817ae814e34e76691cf3e23e', 'PHP', '90');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` int(20) NOT NULL,
  `social_name` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `social_address` char(250) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `social_name`, `social_address`) VALUES
(1, 'facebook', '#');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(20) NOT NULL,
  `testimonial_hash` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_picture` char(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'assets/index/images/default.png',
  `testimonial_fullname` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_job` char(40) COLLATE utf8_turkish_ci NOT NULL,
  `testimonial_comment` char(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_hash`, `testimonial_picture`, `testimonial_fullname`, `testimonial_job`, `testimonial_comment`) VALUES
(1, '90f1dcc304a6e43c17065d6cc7831453', 'assets/index/images/default.png', 'John DOE', 'CEO', 'My Experience working with Mason has been very positive. I always receive quality service from him. I highly recommend this guy to everyone because I think he is one a of kind.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `user_username` char(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_email` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_password` char(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_status` char(1) COLLATE utf8_turkish_ci DEFAULT '1',
  `user_role` char(2) COLLATE utf8_turkish_ci DEFAULT '1',
  `user_key` char(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_status`, `user_role`, `user_key`) VALUES
(1, 'admin', 'admin@gmail.com', '3095ee219dea85f67c1e3a87898c1d5f7b712d20', '1', '11', '9a5141aef5e1b0116bb748042a6f4cdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`) USING BTREE;

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`) USING BTREE;

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
