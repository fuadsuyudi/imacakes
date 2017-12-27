-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2015 at 09:39 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forefinger`
--
CREATE DATABASE IF NOT EXISTS `forefinger` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forefinger`;

-- --------------------------------------------------------

--
-- Table structure for table `class_data`
--

CREATE TABLE IF NOT EXISTS `class_data` (
  `class_id` varchar(10) NOT NULL,
  `class_num` int(3) NOT NULL,
  `char_id` varchar(10) NOT NULL,
  `char_data` varchar(40) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`class_id`,`class_num`,`char_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_data`
--

INSERT INTO `class_data` (`class_id`, `class_num`, `char_id`, `char_data`, `changed_on`, `changed_by`) VALUES
('1', 1, '1', 'Daikin', '2015-10-25 07:20:00', NULL),
('1', 1, '2', 'Ac Daikin', '2015-10-25 07:20:00', NULL),
('1', 1, '4', '500', '2015-10-25 07:20:00', NULL),
('1', 2, '1', '2', '2015-10-24 13:12:59', NULL),
('1', 2, '2', '2', '2015-10-24 13:12:59', NULL),
('1', 2, '4', '2', '2015-10-24 13:12:59', NULL),
('1', 3, '1', 'Air', '2015-11-08 12:26:03', NULL),
('1', 3, '2', 'PAM', '2015-11-08 12:26:04', NULL),
('1', 3, '4', '500', '2015-11-05 12:51:21', NULL),
('1', 4, '1', 'Philip', '2015-11-08 12:23:19', NULL),
('1', 4, '2', 'Test', '2015-11-08 12:23:19', NULL),
('1', 4, '4', '100', '2015-11-08 12:23:19', NULL),
('1', 5, '1', 'Daikin', '2015-11-08 12:23:53', NULL),
('1', 5, '2', 'Ac Daikin', '2015-11-08 12:23:53', NULL),
('1', 5, '4', '500', '2015-11-08 12:23:53', NULL),
('1', 6, '1', 'Sony', '2015-11-08 12:25:01', NULL),
('1', 6, '2', 'Stereo', '2015-11-08 12:25:01', NULL),
('1', 6, '4', '400', '2015-11-08 12:25:01', NULL),
('1', 7, '1', 'Sony', '2015-11-08 12:27:21', NULL),
('1', 7, '2', 'Televisi', '2015-11-08 12:27:21', NULL),
('1', 7, '4', '300', '2015-11-08 12:27:21', NULL),
('1', 8, '1', 'PPX', '2015-11-08 12:28:02', NULL),
('1', 8, '2', 'PP', '2015-11-08 12:28:02', NULL),
('1', 8, '4', '100', '2015-11-08 12:28:02', NULL),
('1', 9, '1', '12312112', '2015-11-08 14:11:57', NULL),
('1', 9, '2', '12312112', '2015-11-08 14:11:58', NULL),
('1', 9, '4', '12312112', '2015-11-08 14:11:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_master`
--

CREATE TABLE IF NOT EXISTS `class_master` (
  `class_id` varchar(10) NOT NULL,
  `char_id` varchar(10) NOT NULL,
  `class_desc` varchar(40) DEFAULT NULL,
  `char_desc` varchar(40) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`class_id`,`char_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_master`
--

INSERT INTO `class_master` (`class_id`, `char_id`, `class_desc`, `char_desc`, `changed_on`) VALUES
('1', '1', 'Manufacturer', 'Manufacturer', '2015-10-24 10:53:26'),
('1', '2', 'object description', 'Object Description', '2015-10-24 10:53:32'),
('1', '4', 'Power Consumtion (W)', 'Power Consumption (W)', '2015-10-24 12:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `icon_master`
--

CREATE TABLE IF NOT EXISTS `icon_master` (
  `icon_id` int(3) NOT NULL,
  `icon_name` varchar(20) DEFAULT NULL,
  `icon_pic` varchar(10) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`icon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icon_master`
--

INSERT INTO `icon_master` (`icon_id`, `icon_name`, `icon_pic`, `changed_on`) VALUES
(1, '1', '1.png', '2015-10-24 10:07:05'),
(2, '2', '2.png', '2015-10-24 10:07:10'),
(3, '3', '3.png', '2015-10-24 10:07:17'),
(4, '4', '4.png', '2015-10-24 10:07:22'),
(5, '5', '5.png', '2015-10-24 10:07:28'),
(6, '6', '6.png', '2015-10-24 10:07:33'),
(7, '7', '7.png', '2015-10-24 10:07:39'),
(8, '8', '8.png', '2015-10-24 10:07:43'),
(9, '9', '9.png', '2015-10-24 10:07:49'),
(10, '10', '10.png', '2015-10-24 10:07:57'),
(11, '11', '11.png', '2015-10-24 10:08:06'),
(12, '12', '12.png', '2015-10-24 10:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `message_master`
--

CREATE TABLE IF NOT EXISTS `message_master` (
  `message_id` char(4) NOT NULL,
  `language` char(2) DEFAULT NULL,
  `message_desc` text,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_master`
--

INSERT INTO `message_master` (`message_id`, `language`, `message_desc`, `changed_on`) VALUES
('E001', 'EN', 'Database inconsistency in input program from website, please contact support.', '0000-00-00 00:00:00'),
('E002', 'EN', 'Database inconsistency in input program from switch, please contact support.', '0000-00-00 00:00:00'),
('E003', 'EN', 'Database inconsistency in input program from profile routine, please contact support.', '0000-00-00 00:00:00'),
('E004', 'EN', 'Database inconsistency in output program, please contact support.', '0000-00-00 00:00:00'),
('E005', 'EN', 'Fail to run output program due to software-hardware incompatibility. Please call contact support.', '0000-00-00 00:00:00'),
('E006', 'EN', 'Fail to run output program due to communication cannot be established. Please call contact support.', '0000-00-00 00:00:00'),
('E007', 'EN', 'Output program is terminated due to database or hardware issue, please contact support.', '0000-00-00 00:00:00'),
('I001', 'EN', 'System will reach its end in 2 years. Please call contact support for update.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_status`
--

CREATE TABLE IF NOT EXISTS `message_status` (
  `message_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_id` char(4) NOT NULL,
  `message_desc` text,
  PRIMARY KEY (`message_date_time`,`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_status`
--

INSERT INTO `message_status` (`message_date_time`, `message_id`, `message_desc`) VALUES
('2015-11-17 07:00:33', 'E001', 'I found problem related to your control object but I have\r\nfixed it. Please check at it in object setting to ensure everything\r\nis okay.'),
('2015-11-17 07:00:57', 'E002', 'I cannot control the device because it is not responding. Please\ncall my producer to check on it. I am so sorry.');

-- --------------------------------------------------------

--
-- Table structure for table `object_master`
--

CREATE TABLE IF NOT EXISTS `object_master` (
  `object_id` int(3) NOT NULL AUTO_INCREMENT,
  `object_pin_out` int(2) DEFAULT NULL,
  `object_i2c_out` int(1) DEFAULT NULL,
  `object_pin_in` int(2) DEFAULT NULL,
  `object_i2c_in` int(1) DEFAULT NULL,
  `object_name` varchar(40) DEFAULT NULL,
  `object_floor` char(1) DEFAULT NULL,
  `object_loc` varchar(40) DEFAULT NULL,
  `icon_id` int(3) DEFAULT NULL,
  `class_id` varchar(10) DEFAULT NULL,
  `class_num` int(3) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `object_master`
--

INSERT INTO `object_master` (`object_id`, `object_pin_out`, `object_i2c_out`, `object_pin_in`, `object_i2c_in`, `object_name`, `object_floor`, `object_loc`, `icon_id`, `class_id`, `class_num`, `changed_on`, `changed_by`) VALUES
(1, 1323232, 113121, 112312, 123232, 'AC Kamar Mandi', '1', 'Kamar Pembantu', 3, '1', 1, '2015-11-08 12:25:34', NULL),
(2, 2, 2, 2, 2, 'Lampu K.M. 2', '2', 'Kamar Mandi', 1, '1', 2, '2015-10-24 13:12:59', NULL),
(3, 1323232, 113121, 112312, 123232, 'Air', '1', 'Kamar Mandi', 12, '1', 3, '2015-11-08 12:26:03', NULL),
(7, 1231441, 1231211, 1231111, 1231111, 'Lampu Kamar', '1', 'Kamar Utama', 2, '1', 4, '2015-11-08 12:26:19', NULL),
(8, 12931919, 12931919, 12931919, 12931919, 'Ac Kamar', '1', 'Kamar Utama', 3, '1', 5, '2015-11-08 12:26:31', NULL),
(9, 12931914, 12931914, 12931914, 12931914, 'Stereo', '1', 'Kamar Utama', 9, '1', 6, '2015-11-08 12:26:42', NULL),
(10, 12931988, 12931988, 12931988, 12931988, 'Televisi', '1', 'Kamar Utama', 7, '1', 7, '2015-11-08 12:27:21', NULL),
(11, 12931887, 12931887, 12931887, 12931887, 'Penghangat Ruangan', '1', 'Kamar Utama', 5, '1', 8, '2015-11-08 12:28:02', NULL),
(12, 12312112, 12312112, 12312112, 12312112, 'Lampu', '1', 'Kamar Mandi', 1, '1', 9, '2015-11-08 14:11:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `object_status`
--

CREATE TABLE IF NOT EXISTS `object_status` (
  `object_id` int(3) NOT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object_status`
--

INSERT INTO `object_status` (`object_id`, `active_ind`, `changed_on`, `changed_by`) VALUES
(1, 1, '2015-10-24 10:17:25', NULL),
(2, 1, '2015-10-24 10:17:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `other_header`
--

CREATE TABLE IF NOT EXISTS `other_header` (
  `user_pas_dua` char(64) DEFAULT NULL,
  `serial_num` char(16) DEFAULT NULL,
  `version` char(10) DEFAULT NULL,
  `default_class_object` varchar(10) DEFAULT NULL,
  `default_class_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_header`
--

INSERT INTO `other_header` (`user_pas_dua`, `serial_num`, `version`, `default_class_object`, `default_class_user`) VALUES
('MTIzNDU=', NULL, NULL, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `profile_master`
--

CREATE TABLE IF NOT EXISTS `profile_master` (
  `profile_id` int(4) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(65) DEFAULT NULL,
  `sunday` int(1) DEFAULT NULL,
  `monday` int(1) DEFAULT NULL,
  `tuesday` int(1) DEFAULT NULL,
  `wednesday` int(1) DEFAULT NULL,
  `thursday` int(1) DEFAULT NULL,
  `friday` int(1) DEFAULT NULL,
  `saturday` int(1) DEFAULT NULL,
  `time_active` time DEFAULT NULL,
  `object_id` int(3) NOT NULL,
  `object_action` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`profile_id`,`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `profile_master`
--

INSERT INTO `profile_master` (`profile_id`, `profile_name`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `time_active`, `object_id`, `object_action`, `changed_on`, `changed_by`) VALUES
(1, 'Profile 1', 1, 1, 1, 1, 1, 1, 1, '07:35:00', 2, 1, '2015-11-17 05:08:20', NULL),
(1, 'Profile 1', 1, 1, 1, 1, 1, 1, 1, '07:35:00', 3, 0, '2015-11-17 05:08:19', NULL),
(1, 'Profile 1', 1, 1, 1, 1, 1, 1, 1, '07:35:00', 7, 0, '2015-11-17 05:08:20', NULL),
(1, 'Profile 1', 1, 1, 1, 1, 1, 1, 1, '07:35:00', 8, 1, '2015-11-17 05:08:20', NULL),
(1, 'Profile 1', 1, 1, 1, 1, 1, 1, 1, '07:35:00', 11, 0, '2015-11-17 05:08:20', NULL),
(17, 'profile 2', 1, 1, 0, 1, 1, 1, 0, '09:35:00', 7, 1, '2015-11-17 05:04:37', NULL),
(17, 'profile 2', 1, 1, 0, 1, 1, 1, 0, '09:35:00', 8, 1, '2015-11-17 05:04:37', NULL),
(17, 'profile 2', 1, 1, 0, 1, 1, 1, 0, '09:35:00', 11, 1, '2015-11-17 05:04:38', NULL),
(17, 'profile 2', 1, 1, 0, 1, 1, 1, 0, '09:35:00', 12, 1, '2015-11-17 05:04:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_status`
--

CREATE TABLE IF NOT EXISTS `profile_status` (
  `profile_id` int(4) NOT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sched_master`
--

CREATE TABLE IF NOT EXISTS `sched_master` (
  `sched_id` int(4) NOT NULL,
  `sched_name` varchar(40) DEFAULT NULL,
  `sched_start_on` datetime DEFAULT NULL,
  `sched_end_on` datetime DEFAULT NULL,
  `object_id` int(3) NOT NULL,
  `object_start_on` time DEFAULT NULL,
  `object_end_on` time DEFAULT NULL,
  `profile_id` int(4) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sched_id`,`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sched_master`
--

INSERT INTO `sched_master` (`sched_id`, `sched_name`, `sched_start_on`, `sched_end_on`, `object_id`, `object_start_on`, `object_end_on`, `profile_id`, `changed_on`, `changed_by`) VALUES
(1, 'Desc', '2015-11-17 19:35:00', '2015-11-26 19:35:00', 1, '20:40:00', '18:54:00', 1, '2015-11-16 03:22:19', 'admin'),
(1, 'Desc', '2015-11-17 19:35:00', '2015-11-26 19:35:00', 3, '18:54:00', '17:26:00', 1, '2015-11-16 03:22:19', 'admin'),
(1, 'Desc', '2015-11-17 19:35:00', '2015-11-26 19:35:00', 12, '19:37:00', '07:54:00', 1, '2015-11-16 03:22:19', 'admin'),
(2, 'test 2', '2015-11-17 10:50:00', '2015-11-27 17:25:00', 3, '19:35:00', '18:30:00', 1, '2015-11-16 06:23:22', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sched_status`
--

CREATE TABLE IF NOT EXISTS `sched_status` (
  `sched_id` int(4) NOT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session_master`
--

CREATE TABLE IF NOT EXISTS `session_master` (
  `session_id` int(3) NOT NULL AUTO_INCREMENT,
  `object_id` int(3) DEFAULT NULL,
  `object_pin_out` int(2) DEFAULT NULL,
  `object_i2c_out` int(1) DEFAULT NULL,
  `active_ind` int(1) DEFAULT NULL,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `session_master`
--

INSERT INTO `session_master` (`session_id`, `object_id`, `object_pin_out`, `object_i2c_out`, `active_ind`, `changed_by`) VALUES
(1, 1, 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tech_info`
--

CREATE TABLE IF NOT EXISTS `tech_info` (
  `object_pin_out` int(2) DEFAULT NULL,
  `object_i2c_out` int(1) DEFAULT NULL,
  `port_id_out` int(1) DEFAULT NULL,
  `tech_id_out` int(2) DEFAULT NULL,
  `object_pin_in` int(2) DEFAULT NULL,
  `object_i2c_in` int(1) DEFAULT NULL,
  `port_id_in` int(1) DEFAULT NULL,
  `tech_id_in` int(2) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `user_id` varchar(40) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_notif` datetime DEFAULT NULL,
  `num_fail` int(3) DEFAULT NULL,
  `last_ip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_id`, `last_login`, `last_notif`, `num_fail`, `last_ip`) VALUES
('admin', '2015-11-17 13:36:29', '2015-11-17 15:29:45', NULL, NULL),
('adminx', '2015-10-18 18:59:10', NULL, 0, NULL),
('adminxx', '2015-11-04 18:59:42', NULL, 1, '::1'),
('adminxxx', '2015-10-18 18:56:49', NULL, 2, NULL),
('adminzxczx', '2015-10-18 13:01:01', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` varchar(40) NOT NULL,
  `cust_name` varchar(254) DEFAULT NULL,
  `class_id` varchar(10) DEFAULT NULL,
  `class_num` int(3) DEFAULT NULL,
  `auth_set_object` int(1) DEFAULT NULL,
  `auth_set_profile` int(1) DEFAULT NULL,
  `auth_set_user` int(1) DEFAULT NULL,
  `object_id` varchar(125) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`changed_on`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `cust_name`, `class_id`, `class_num`, `auth_set_object`, `auth_set_profile`, `auth_set_user`, `object_id`, `changed_on`, `changed_by`) VALUES
('admin', 'admin', 'admin', 0, 1, 1, 1, '1,2', '2015-11-01 10:33:17', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_password`
--

CREATE TABLE IF NOT EXISTS `user_password` (
  `user_id` varchar(64) NOT NULL COMMENT 'Encrypted version of user ID',
  `user_pass_satu` varchar(64) DEFAULT NULL COMMENT 'Encrypted version of password',
  `user_pass_dua` varchar(64) DEFAULT NULL COMMENT 'Encrypted version of password',
  `init_ind` int(1) DEFAULT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_password`
--

INSERT INTO `user_password` (`user_id`, `user_pass_satu`, `user_pass_dua`, `init_ind`, `changed_on`, `changed_by`) VALUES
('admin', 'MTIzNDU=', 'MTIzNDU=', NULL, '2015-11-04 12:02:32', 'admin'),
('c', 'MTIzNDU=', 'MTIzNDU=', NULL, '2015-11-04 12:02:31', 'admin'),
('x', 'MTIzNDU=', 'MTIzNDU=', NULL, '2015-11-04 12:02:30', 'admin'),
('xxx', 'MTIzNDU=', 'MTIzNDU=', NULL, '2015-11-04 12:02:29', 'admin'),
('yyy', 'MTIzNDU=', 'MTIzNDU=', NULL, '2015-11-04 12:02:29', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
