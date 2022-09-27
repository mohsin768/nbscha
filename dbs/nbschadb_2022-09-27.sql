-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: db5007863027.hosting-data.io
-- Generation Time: Sep 27, 2022 at 06:49 AM
-- Server version: 5.7.38-log
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs6520811`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`uid`, `fullname`, `username`, `password`, `salt`, `email`, `phone`, `role`, `status`, `created`) VALUES
(1, 'Super Administrator', 'superadmin', 'ef0b0711096cce8db96574aaf784df3f81515f26', 'celiums', 'admin@celiums.com', '984698551', 1, 1, '2021-10-06 18:40:02'),
(2, 'Loai Jaouni', 'loai', '54780843754e394a141f3060fa01fd4013d04e03', '3Xl0Jj', 'loai.jaouni@gmail.com', '123456789', 1, 1, '2022-03-03 05:41:40'),
(3, 'Danielle Gallant', 'danielle', '826f7262224ac58afcd8152c754bb57642e8bb6e', 'p8QqCA', 'region2scha@gmail.com', '5066508706', 3, 1, '2022-05-24 15:06:04'),
(4, 'Tara Curwin', 'tara', 'f3801b3af7b66f3cbc57c1814945a3ce32d2df63', 'KwIHQX', 'tara@curwinbusinesscentre.com', '5062614116', 1, 1, '2022-05-25 00:47:59'),
(5, 'Rayma', 'rayma', '0e8f00ce38ffa961dd674d2e64e647883a840680', 'wrHsQM', 'rayma@celiums.com', '123', 1, 1, '2022-06-10 12:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `admins_login_history`
--

CREATE TABLE `admins_login_history` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins_login_history`
--

INSERT INTO `admins_login_history` (`id`, `uid`, `ipaddress`, `timestamp`) VALUES
(1, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(2, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(3, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(4, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(5, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(6, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(7, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(8, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(9, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(10, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(11, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(12, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(13, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(14, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(15, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(16, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(17, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(18, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(19, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(20, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(21, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(22, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(23, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(24, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(25, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(26, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(27, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(28, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(29, 1, '127.0.0.1', '0000-00-00 00:00:00'),
(30, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(31, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(32, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(33, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(34, 1, '61.3.191.131', '0000-00-00 00:00:00'),
(35, 1, '61.3.191.131', '0000-00-00 00:00:00'),
(36, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(37, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(38, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(39, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(40, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(41, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(42, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(43, 1, '117.196.57.46', '0000-00-00 00:00:00'),
(44, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(45, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(46, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(47, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(48, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(49, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(50, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(51, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(52, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(53, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(54, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(55, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(56, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(57, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(58, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(59, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(60, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(61, 1, '178.153.50.253', '0000-00-00 00:00:00'),
(62, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(63, 1, '103.140.16.108', '0000-00-00 00:00:00'),
(64, 1, '117.213.14.29', '0000-00-00 00:00:00'),
(65, 1, '103.154.54.134', '0000-00-00 00:00:00'),
(66, 1, '103.154.54.134', '0000-00-00 00:00:00'),
(67, 1, '103.154.54.134', '0000-00-00 00:00:00'),
(68, 1, '117.198.170.116', '0000-00-00 00:00:00'),
(69, 1, '59.94.202.240', '0000-00-00 00:00:00'),
(70, 1, '103.154.36.81', '0000-00-00 00:00:00'),
(71, 1, '103.154.36.81', '0000-00-00 00:00:00'),
(72, 1, '59.94.202.240', '0000-00-00 00:00:00'),
(73, 1, '117.201.202.53', '0000-00-00 00:00:00'),
(74, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(75, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(76, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(77, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(78, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(79, 2, '50.65.45.110', '0000-00-00 00:00:00'),
(80, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(81, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(82, 1, '103.147.208.182', '0000-00-00 00:00:00'),
(83, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(84, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(85, 2, '50.65.45.110', '0000-00-00 00:00:00'),
(86, 2, '50.65.45.110', '0000-00-00 00:00:00'),
(87, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(88, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(89, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(90, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(91, 1, '49.37.229.185', '0000-00-00 00:00:00'),
(92, 1, '117.201.195.53', '0000-00-00 00:00:00'),
(93, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(94, 1, '103.154.54.183', '0000-00-00 00:00:00'),
(95, 1, '103.146.175.162', '0000-00-00 00:00:00'),
(96, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(97, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(98, 1, '59.97.174.223', '0000-00-00 00:00:00'),
(99, 1, '59.97.174.223', '0000-00-00 00:00:00'),
(100, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(101, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(102, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(103, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(104, 3, '159.2.217.178', '0000-00-00 00:00:00'),
(105, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(106, 3, '159.2.217.178', '0000-00-00 00:00:00'),
(107, 3, '2607:fea8:d1c0:2aa0:dd71:a739:ed7b:5a2b', '0000-00-00 00:00:00'),
(108, 3, '159.2.217.178', '0000-00-00 00:00:00'),
(109, 3, '159.2.217.178', '0000-00-00 00:00:00'),
(110, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(111, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(112, 4, '50.65.45.110', '0000-00-00 00:00:00'),
(113, 1, '2405:201:f00d:3121:78e6:e72d:92f9:3b2e', '0000-00-00 00:00:00'),
(114, 4, '50.65.45.110', '0000-00-00 00:00:00'),
(115, 4, '159.2.217.178', '0000-00-00 00:00:00'),
(116, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(117, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(118, 1, '2405:201:f00d:3121:78e6:e72d:92f9:3b2e', '0000-00-00 00:00:00'),
(119, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(120, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(121, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(122, 3, '2605:b100:b0f:83ce:edd5:50e0:8ee3:7bd6', '0000-00-00 00:00:00'),
(123, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(124, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(125, 1, '2405:201:f00d:3121:1c0:15d3:2417:a41c', '0000-00-00 00:00:00'),
(126, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(127, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(128, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(129, 1, '2405:201:f00d:3121:cd3c:bcf8:4eb5:5586', '0000-00-00 00:00:00'),
(130, 1, '2405:201:f00d:3121:68c2:c812:4e5c:488a', '0000-00-00 00:00:00'),
(131, 1, '2405:201:f00d:3121:51f2:2e7b:945:ac18', '0000-00-00 00:00:00'),
(132, 5, '103.168.201.77', '0000-00-00 00:00:00'),
(133, 5, '103.168.201.77', '0000-00-00 00:00:00'),
(134, 5, '103.168.201.77', '0000-00-00 00:00:00'),
(135, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(136, 3, '2607:fea8:d1c0:2aa0:10cc:68f7:d4f:3236', '0000-00-00 00:00:00'),
(137, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(138, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(139, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(140, 1, '103.151.188.130', '0000-00-00 00:00:00'),
(141, 3, '2607:fea8:d1c0:2aa0:95e1:f4bb:db6e:6420', '0000-00-00 00:00:00'),
(142, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(143, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(144, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(145, 3, '2607:fea8:d1c0:2aa0:926:a17b:42d:f09', '0000-00-00 00:00:00'),
(146, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(147, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(148, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(149, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(150, 3, '2607:fea8:d1c0:2aa0:10b:89a1:3eef:3cdc', '0000-00-00 00:00:00'),
(151, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(152, 3, '2605:b100:b24:2c2d:4517:54ec:6818:8c88', '0000-00-00 00:00:00'),
(153, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(154, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(155, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(156, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(157, 3, '2605:b100:b01:33d9:587b:3d06:9d45:35d8', '0000-00-00 00:00:00'),
(158, 3, '2607:fea8:d1c0:2aa0:c0f3:656d:1fd3:8a3b', '0000-00-00 00:00:00'),
(159, 3, '2607:fea8:d1c0:2aa0:c0f3:656d:1fd3:8a3b', '0000-00-00 00:00:00'),
(160, 3, '2607:fea8:d1c0:2aa0:b1eb:10d4:7da4:2eb4', '0000-00-00 00:00:00'),
(161, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(162, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(163, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(164, 1, '27.62.12.119', '0000-00-00 00:00:00'),
(165, 1, '117.210.190.56', '0000-00-00 00:00:00'),
(166, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(167, 1, '49.37.225.51', '0000-00-00 00:00:00'),
(168, 1, '49.37.225.51', '0000-00-00 00:00:00'),
(169, 1, '49.37.225.51', '0000-00-00 00:00:00'),
(170, 3, '159.2.143.245', '0000-00-00 00:00:00'),
(171, 3, '2607:fea8:d1c0:2aa0:c9:5a48:9fb2:17dd', '0000-00-00 00:00:00'),
(172, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(173, 3, '142.163.102.130', '0000-00-00 00:00:00'),
(174, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(175, 3, '2605:b100:b26:b7ae:bc77:a960:d051:90ba', '0000-00-00 00:00:00'),
(176, 3, '142.163.102.130', '0000-00-00 00:00:00'),
(177, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(178, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(179, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(180, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(181, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(182, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(183, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(184, 1, '103.176.184.204', '0000-00-00 00:00:00'),
(185, 1, '117.196.52.8', '0000-00-00 00:00:00'),
(186, 5, '103.146.175.146', '0000-00-00 00:00:00'),
(187, 1, '103.146.175.146', '0000-00-00 00:00:00'),
(188, 5, '103.146.175.146', '0000-00-00 00:00:00'),
(189, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(190, 5, '103.146.175.146', '0000-00-00 00:00:00'),
(191, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(192, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(193, 1, '2405:201:f00d:31ec:d996:86e3:320a:8f08', '0000-00-00 00:00:00'),
(194, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(195, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(196, 3, '142.163.102.130', '0000-00-00 00:00:00'),
(197, 3, '142.163.102.130', '0000-00-00 00:00:00'),
(198, 1, '103.168.201.82', '0000-00-00 00:00:00'),
(199, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(200, 4, '2604:3d09:687:e400:5e5:982d:55be:625d', '0000-00-00 00:00:00'),
(201, 3, '2607:fea8:d1c0:2aa0:4d81:7080:1cf7:2a03', '0000-00-00 00:00:00'),
(202, 3, '2607:fea8:d1c0:2aa0:4d81:7080:1cf7:2a03', '0000-00-00 00:00:00'),
(203, 1, '61.3.190.177', '0000-00-00 00:00:00'),
(204, 1, '61.3.190.177', '0000-00-00 00:00:00'),
(205, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(206, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(207, 2, '159.2.217.178', '0000-00-00 00:00:00'),
(208, 1, '2405:201:f00d:31ec:259a:68fb:c032:c30', '0000-00-00 00:00:00'),
(209, 1, '2405:201:f00d:31ec:54fb:9156:f727:5076', '0000-00-00 00:00:00'),
(210, 3, '142.167.78.198', '0000-00-00 00:00:00'),
(211, 2, '159.2.217.178', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_function`
--

CREATE TABLE `admin_function` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `controller` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_function_permission`
--

CREATE TABLE `admin_function_permission` (
  `function_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `display` int(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `class`, `name`, `link`, `parent_id`, `status`, `display`, `sort_order`) VALUES
(1, 'fa-dashboard', 'Dashboard', '', 0, 'Y', 1, 0),
(2, 'fa-user', 'Manage Users', '', 0, 'Y', 1, 20),
(3, '', 'Users', 'users/overview', 2, 'Y', 1, 1),
(4, '', 'Add User', 'users/add', 2, 'Y', 1, 2),
(9, '', 'Settings', 'home/settings', 1, 'Y', 1, 1),
(10, '', 'Clear Cache', 'home/clearcache', 1, 'Y', 1, 2),
(11, '', 'Update Database', 'home/updatedb', 1, 'Y', 1, 3),
(25, '', 'Dashboard', 'home/dashboard', 1, 'Y', 1, 0),
(30, 'fa-file', 'Manage Pages', '', 0, 'Y', 1, 18),
(31, '', 'Pages', 'pages/overview', 30, 'Y', 1, 1),
(32, '', 'Add Page', 'pages/add', 30, 'Y', 1, 2),
(50, 'fa-bars', 'Manage Menu', '', 0, 'Y', 1, 16),
(51, '', 'Menus', 'menus/overview', 50, 'Y', 1, 1),
(52, '', 'Add Menu', 'menus/add', 50, 'Y', 1, 2),
(60, 'fa-cubes', 'Manage Widgets', '', 0, 'Y', 1, 19),
(61, '', 'Widgets', 'widgets/overview', 60, 'Y', 1, 1),
(70, 'fa-file-code-o', 'Manage Content', '', 0, 'Y', 1, 17),
(78, 'fa-wpforms', 'Manage Enquiries', '', 0, 'Y', 1, 4),
(79, '', 'Enquiries', 'enquiries/overview', 78, 'Y', 1, 5),
(83, '', 'Home Sliders', 'sliders/overview', 70, 'Y', 1, 1),
(84, '', 'Blocks', 'blocks/overview', 70, 'Y', 1, 2),
(85, '', 'Block Categories', 'blocks/categories', 70, 'Y', 1, 3),
(86, '', 'Languages', 'languages/overview', 1, 'Y', 1, 1),
(89, 'fa-home', 'Manage Residences', '', 0, 'Y', 1, 2),
(90, '', 'Members', 'members', 89, 'Y', 1, 0),
(91, 'fa-file-text-o', 'Manage Masters', '', 0, 'Y', 1, 3),
(92, '', 'Packages(Beds)', 'packages', 91, 'Y', 1, 0),
(93, '', 'Localization', 'home/localization', 70, 'Y', 1, 20),
(94, '', 'Regions', 'regions', 91, 'Y', 1, 2),
(95, '', 'Level Of Care', 'carelevels', 91, 'Y', 1, 4),
(96, '', 'Facilities', 'facilities', 91, 'Y', 1, 3),
(97, '', 'Features', 'features', 91, 'Y', 1, 6),
(99, '', 'Certificate Templates', 'certificatetemplates', 91, 'Y', 1, 7),
(100, '', 'Sponsors', 'sponsors', 70, 'Y', 1, 0),
(101, '', 'Board Members', 'teams', 70, 'Y', 1, 0),
(102, '', 'Links', 'links', 70, 'Y', 1, 0),
(103, '', 'Forms', 'forms', 70, 'Y', 1, 0),
(104, '', 'Testimonials', 'testimonials', 70, 'Y', 1, 0),
(105, '', 'Statistics', 'statistics', 70, 'Y', 1, 0),
(106, '', 'Faqs', 'faqs', 70, 'Y', 1, 0),
(107, '', 'News', 'news', 70, 'Y', 1, 0),
(108, '', 'News Categories', 'news/categories', 70, 'Y', 1, 0),
(109, '', 'Requests', 'requests', 89, 'Y', 1, 1),
(110, '', 'Residences', 'residences', 89, 'Y', 1, 0),
(111, '', 'Renewals', 'renewals', 89, 'Y', 1, 4),
(112, '', 'Roles', 'users/roles', 2, 'Y', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_permission`
--

CREATE TABLE `admin_menu_permission` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_menu_permission`
--

INSERT INTO `admin_menu_permission` (`role_id`, `menu_id`) VALUES
(3, 1),
(3, 25),
(3, 9),
(3, 86),
(3, 89),
(3, 90),
(3, 110),
(3, 109),
(3, 111),
(3, 91),
(3, 92),
(3, 94),
(3, 96),
(3, 95),
(3, 97),
(3, 78),
(3, 79),
(3, 70),
(3, 100),
(3, 101),
(3, 102),
(3, 103),
(3, 104),
(3, 105),
(3, 106),
(3, 107),
(3, 108),
(3, 83),
(3, 84),
(3, 85),
(3, 93);

-- --------------------------------------------------------

--
-- Table structure for table `admin_reset`
--

CREATE TABLE `admin_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_key` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_reset`
--

INSERT INTO `admin_reset` (`id`, `user_id`, `user_key`) VALUES
(1, 1, '892MT0FWOSk4iZoa');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `rid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`rid`, `name`, `status`) VALUES
(1, 'Super Administrator', 1),
(2, 'Admin', 1),
(3, 'Editor', 1),
(4, 'Member Coordinator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `category`, `icon`, `image`, `sort_order`, `status`) VALUES
(1, 1, '', '', 0, 1),
(2, 1, '', '', 0, 1),
(3, 1, '', '', 0, 1),
(4, 1, '', '', 0, 1),
(5, 2, '', '', 0, 1),
(6, 2, '', '', 0, 1),
(7, 2, '', '', 0, 1),
(8, 2, '', '', 0, 1),
(9, 3, '', '', 0, 1),
(10, 3, '', '', 0, 1),
(11, 3, '', '', 0, 1),
(12, 3, '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blocks_desc`
--

CREATE TABLE `blocks_desc` (
  `desc_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `caption_title` varchar(255) NOT NULL,
  `caption_subtitle` varchar(255) NOT NULL,
  `icon_class` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `link_title` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blocks_desc`
--

INSERT INTO `blocks_desc` (`desc_id`, `block_id`, `title`, `summary`, `caption_title`, `caption_subtitle`, `icon_class`, `link_url`, `link_title`, `language`) VALUES
(1, 1, 'Membership', '', 'Owners/Operators join our network of special care homes', '', 'fa fa-user text-white font-64 pb-10', '/register', 'Join Us Now', 'en'),
(2, 2, 'Questions?', '', 'Considering a special care home? Here is a good place to start', '', 'fa fa-comments-o text-white font-64 pb-10', '/faq', 'Get help', 'en'),
(3, 3, 'Residences', '', 'Explore key information on our homes and available vacancies', '', 'fa fa-book fa-fw text-white font-64 pb-10', '/residences', 'Find Us Now', 'en'),
(4, 4, 'Member Login', '', 'Are you a member? Login to get your latest updates.', '', 'fa fa-mobile text-white font-64 pb-10', '/member/login', 'Find Us Now', 'en'),
(5, 5, 'Our Residences', '', 'Browse our residences for special care homes in your area.', '', 'fa fa-home', '/residences', '', 'en'),
(6, 6, 'Membership', '', 'Join our membership of special care homes in New Brunswick.', '', 'fa fa-user', '/register', '', 'en'),
(7, 7, 'Sponsors', '', 'We are so grateful to our sponsors. With their support we thrive.', '', 'fa fa-heartbeat', '/sponsors', '', 'en'),
(8, 8, 'Board Members', '', 'Meet our board members who aim to improve the lives of special care home workers.', '', 'fa fa-users', '/board', '', 'en'),
(9, 9, 'ADVOCATE', '', 'We are dedicated to protecting the rights of our workers and advocate for equitable wages and benefits for our workers.', '', 'fa fa-wheelchair text-white font-60', '#', '', 'en'),
(10, 10, 'EDUCATE', '', 'We aim to provide standardized education and training that is in line with the needs and demands of our industry.', '', 'fa fa-user text-white font-60', '#', '', 'en'),
(11, 11, 'IMPROVE', '', 'We work with the government and other stakeholders on special projects in order to improve the sector as a whole.', '', 'fa fa-money text-white font-60', '#', '', 'en'),
(12, 12, 'INFORM', '', 'We work with various government departments to ensure appropriate standards and regulations are implemented while communicating directly with the sector.', '', 'fa fa-pencil fa-fw text-white font-60', '#', '', 'en'),
(13, 1, 'Membres', '', 'Propriétaires et exploitants, joignez-vous à notre réseau de foyers de soins spéciaux. ', '', 'fa fa-user text-white font-64 pb-10', '/fr/register', 'Joignez-vous Maintenant', 'fr'),
(14, 2, 'DES QUESTIONS? ', '', 'Vous songez à un foyer de soins spéciaux? Voici un bon endroit où commencer.', '', 'fa fa-comments-o text-white font-64 pb-10', '/fr/faq', 'Pour avoir de l’aide', 'fr'),
(15, 3, 'RÉSIDENCES', '', 'Obtenez les renseignements essentiels sur nos foyers et les places libres.', '', 'fa fa-book fa-fw text-white font-64 pb-10', '/fr/residences', 'Pour Nous Trouver', 'fr'),
(16, 4, 'ACCÈS MEMBRES ', '', 'Êtes-vous membre? Ouvrez une session pour avoir les dernières nouvelles.', '', 'fa fa-mobile text-white font-64 pb-10', '/member/login', 'Pour Nous Trouver', 'fr'),
(17, 5, 'Nos Résidences', '', 'Explorez nos résidences en foyers de soins spéciaux dans votre région.', '', 'fa fa-home', '/residences', '', 'fr'),
(18, 6, 'Membres', '', 'Joignez-vous comme membre à nos foyers de soins spéciaux au Nouveau-Brunswick.', '', 'fa fa-user', '/register', '', 'fr'),
(19, 7, 'Promoteurs', '', 'Nous sommes extrêmement reconnaissants envers nos promoteurs. Avec leur appui, nous prospérons.', '', 'fa fa-heartbeat', '/sponsors', '', 'fr'),
(20, 8, 'Membres du conseil ', '', 'Rencontrez les membres de notre conseil, qui visent à améliorer la vie des travailleuses et travailleurs des foyers de soins spéciaux.', '', 'fa fa-users', '/board', '', 'fr'),
(21, 9, 'DÉFENSE DES INTÉRÊTS', '', 'Nous sommes déterminés à protéger les droits de nos employés et à réclamer des salaires et des avantages équitables pour nos employés.', '', 'fa fa-wheelchair text-white font-60', '#', '', 'fr'),
(22, 10, 'ÉDUCATION', '', 'Nous visons à offrir une éducation et une formation uniformisées qui correspondent aux besoins et aux exigences de notre secteur.', '', 'fa fa-user text-white font-60', '#', '', 'fr'),
(23, 11, 'AMÉLIORATION', '', 'Nous travaillons à des projets spéciaux avec le gouvernement et d’autres intervenants pour améliorer l’ensemble du secteur.', '', 'fa fa-money text-white font-60', '#', '', 'fr'),
(24, 12, 'INFORMATION', '', 'Nous collaborons avec divers ministères pour assurer l’application de normes et de règlements appropriés tout en communiquant directement avec le secteur.', '', 'fa fa-pencil fa-fw text-white font-60', '#', '', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `block_categories`
--

CREATE TABLE `block_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `block_categories`
--

INSERT INTO `block_categories` (`id`, `name`, `status`) VALUES
(1, 'Home Callouts', 1),
(2, 'Useful Links', 1),
(3, 'Why Chose Us', 1);

-- --------------------------------------------------------

--
-- Table structure for table `board_members`
--

CREATE TABLE `board_members` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_members`
--

INSERT INTO `board_members` (`id`, `slug`, `email`, `phone`, `photo`, `facebook`, `twitter`, `linkedin`, `skype`, `sort_order`, `status`) VALUES
(1, 'jan-seely', 'jan.seely@rogers.com', '(506) 639-4478', 'jan_seely_april_21_221.jpg', '#', '#', '#', '#', 0, 1),
(3, 'john-grass', 'kevinvienneau@hotmail.com', '', 'Kevin_Vienneau1.jpg', '', '', '', '', 1, 1),
(4, 'leonard-gervais', 'treasurer@nbscha.ca', '(506) 851-5852', 'Amy_McNair.jpg', '', '', '', '', 2, 1),
(5, 'danielle-gallant', 'secretary@nbscha.ca', '(506) 650-8706', 'Danielle_Gallant.jpg', '', '', '', '', 3, 1),
(6, 'derek-green', 'dgreen@shannex.com', '506-381-3914', 'Derek_Green.jpg', '', '', '', '', 5, 1),
(7, 'crystal-powell', 'kathleen11251@gmail.com', '', 'crystal_powell_photo2.jpg', '', '', '', '', 6, 1),
(10, 'christine-saunders', 'paradisevilla.cs@gmail.com', '', 'Christine_Saunders.jpg', '', '', '', '', 9, 1),
(11, 'john-grass-220522095026', 'jgrass1213@rogers.com', '506-872-3340', 'John_Grass_2_-_Web_-_cropped.jpg', '', '', '', '', 4, 1),
(12, 'diane-leblanc-goguen', 'info@nbscha.ca', '', 'Diane_photo2.jpg', '', '', '', '', 10, 1),
(13, 'marc-andre-savoie', 'info@nbscha.ca', '', 'Marc-Andre2.jpg', '', '', '', '', 11, 1),
(14, 'nathalie-blanchard', 'info@nbscha.ca', '', 'Nathalie_Blanchard.png', '', '', '', '', 12, 1),
(15, 'monica-gosselin', 'info@nbscha.ca', '', 'Monica_Gosselin1.jpeg', '', '', '', '', 13, 1),
(16, 'paul-rossignol', 'info@nbscha.ca', '', 'Paul_Pic2.jpg', '', '', '', '', 14, 1),
(17, 'cindy-roy', 'info@nbscha.ca', '', 'Cindy_Roy2.jpg', '', '', '', '', 15, 1),
(18, 'collette-doucette', 'collette.obs@rogers.com', '(506)533-8088', 'Collette_Doucette1.jpg', '', '', '', '', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `board_members_desc`
--

CREATE TABLE `board_members_desc` (
  `desc_id` int(11) NOT NULL,
  `board_member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `bio` text,
  `location` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_members_desc`
--

INSERT INTO `board_members_desc` (`desc_id`, `board_member_id`, `name`, `position`, `bio`, `location`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(1, 1, 'Jan Seely', 'President', '<p>\r\n	Jan has been the President of the NB Special Care Home Association for many years. She is a strong advocate for community-based services. Jan works hard to forge productive relationships with government, and other community partners, to strengthen the sector overall. Her and her husband own and operate a small Special Care Home in Saint John. The past 25 years in this occupation has given her a comprehensive knowledge base of the challenges faced by operators and their employees as they strive to deliver quality services to clients.</p>\r\n<p>\r\n	Jan est pr&eacute;sidente de la NB Special Care Home Association depuis de nombreuses ann&eacute;es. Elle est une porte-parole &eacute;nergique des services communautaires. Jan travaille avec ardeur pour &eacute;tablir des relations productives avec le gouvernement et d&rsquo;autres partenaires communautaires, afin de renforcer l&rsquo;ensemble du secteur. Son mari et elle sont propri&eacute;taires-exploitants d&rsquo;un petit foyer de soins sp&eacute;ciaux &agrave; Saint John. Les 25 derni&egrave;res ann&eacute;es dans cette profession lui ont apport&eacute; de vastes connaissances des difficult&eacute;s v&eacute;cues par les exploitants et leurs employ&eacute;s qui s&rsquo;efforcent d&rsquo;offrir des services de qualit&eacute; aux clients.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(3, 3, 'Kevin Vienneau', 'Vice President', '<p>\r\n	Current president of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux, Kevin began his career in the long-term care sector in 2007 with the construction of his first residence. Kevin had previously completed his degree in Business Administration from CCNB in 2002. Today he is co-owner of seven level 2 and 3B establishments and manages more than 380 beds. As President of the AFESSNB, Kevin is very proud of the work done by the association as well as the NBSCHA and is very pleased with the reunification of the two associations. Kevin is very pleased to join the Board of Directors of the newly reintegrated NB Special Care Home Association as Vice-President.</p>\r\n<p>\r\n	Pr&eacute;sident actuel de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux, Kevin a commenc&eacute; sa carri&egrave;re dans le secteur des soins de longue dur&eacute;e en 2007 avec la construction de sa premi&egrave;re r&eacute;sidence. Kevin avait obtenu auparavant un dipl&ocirc;me en administration des affaires du CCNB en 2002. Aujourd&rsquo;hui, il est copropri&eacute;taire de sept &eacute;tablissements de niveaux 2 et 3B et g&egrave;re plus de 380 lits. En tant que pr&eacute;sident de l&rsquo;AFESSNB, Kevin est tr&egrave;s fier du travail accompli par l&rsquo;association ainsi que par la NBSCHA et est tr&egrave;s heureux de la r&eacute;unification des deux associations. C&rsquo;est avec grand plaisir que Kevin se joint au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick en tant que vice-pr&eacute;sident.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(4, 4, 'Amy McNair', 'Treasurer', '<p>\r\n	As an Occupational Therapist with a successful nineteen-year career, thirteen as a business leader, I own and operate McNair Manor, a 58-bed Specialized Care Home for Seniors (Level 2, 3G and 3B). My experience lies in geriatric rehabilitation with a focus in dementia care and palliative care. I have training in adult education and enjoy coaching our staff and collaborating with all care partners to deliver high quality care. I have experience implementing provincial policies and advocating for change to improve services for our clients. It is a pleasure to serve on the NBSCHA board and I look forward to being part of the ongoing development in our sector.</p>\r\n<p>\r\n	Comme ergoth&eacute;rapeute ayant eu une fructueuse carri&egrave;re de 19 ans, 13 comme dirigeante d&rsquo;entreprise, je suis propri&eacute;taire-exploitante de McNair Manor, un foyer de soins sp&eacute;cialis&eacute;s de 58 lits pour personnes &acirc;g&eacute;es (niveaux 2, 3G et 3B). Mon exp&eacute;rience est en r&eacute;adaptation g&eacute;riatrique, avec accent sur les soins aux personnes atteintes de d&eacute;mence et les soins palliatifs. J&rsquo;ai une formation en &eacute;ducation des adultes, et j&rsquo;aime encadrer notre personnel et collaborer avec tous les partenaires de soins pour offrir des soins de haute qualit&eacute;. J&rsquo;ai de l&rsquo;exp&eacute;rience dans l&rsquo;application des politiques provinciales et la promotion de changements pour am&eacute;liorer les services &agrave; nos clients. C&rsquo;est un plaisir de si&eacute;ger au conseil de l&rsquo;AFESSNB, et je me r&eacute;jouis &agrave; l&rsquo;avance de faire partie du d&eacute;veloppement continu de notre secteur.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(5, 5, 'Danielle Gallant', 'Secretary', '<p>\r\n	I&rsquo;ve been operating our family business for that last 20 years and was a pharmacy technician for seven years. I&#39;ve been the Secretary of the New Brunswick Special Care Home Association for the last 6 years. In the late summer of 2019, I was also part of the working group that was created to restructure the Special Care home Standards and Regulations.</p>\r\n<p>\r\n	My passion is to advocate for excellent quality services be provided in all homes in New Brunswick. I believe change is needed in out sector and I&rsquo;m ecstatic to be part of it!</p>\r\n<p>\r\n	Je dirige notre entreprise familiale depuis 20 ans et j&rsquo;ai &eacute;t&eacute; technicienne en pharmacie pendant sept ans. J&rsquo;&eacute;tais secr&eacute;taire de la New Brunswick Special Care Home Association depuis six ans. Vers la fin de l&rsquo;&eacute;t&eacute; 2019, j&rsquo;ai &eacute;galement fait partie du groupe de travail qui a &eacute;t&eacute; form&eacute; pour restructurer les normes et r&egrave;glements des foyers de soins sp&eacute;ciaux.</p>\r\n<p>\r\n	Ma passion est de promouvoir la prestation de services d&rsquo;excellente qualit&eacute; dans tous les foyers du Nouveau-Brunswick. Je crois que des changements sont n&eacute;cessaires dans notre secteur et je suis ravie d&rsquo;en faire partie!</p>\r\n', '', NULL, NULL, NULL, 'en'),
(6, 6, 'Derek Green', 'Board Member', '<p>\r\n	Derek joined Shannex in 2018 as Vice President, New Brunswick Operations where he supports our Parkland Retirement Living Campuses and Shannex Nursing Homes throughout NB. Derek&rsquo;s focus is to support the company&rsquo;s current and expanding operations in NB to ensure Residents continue to receive top quality accommodations and services from engaged employees. Originally from a small town on the Southwest Miramichi - Boiestown, Derek now resides in Riverview, NB. He and his wife Jill have been married for 25 years and they have 3 children. Prior to joining Shannex, Derek had a distinguished 23-year career as a senior leader with Medavie Blue Cross, accountable for implementation and management of their federal government contracts with Veterans Affairs Canada, CAF, RCMP and Immigration, Refugees and Citizenship Canada. Prior to that he served as an Artillery Officer with the Canadian Armed Forces for 8 years, stationed in Quebec, Ontario, and Chatham, NB. Derek holds a Bachelor of Commerce from the Royal Military College of Canada.</p>\r\n<p>\r\n	Derek s&rsquo;est joint &agrave; Shannex en 2018 comme vice-pr&eacute;sident des Op&eacute;rations au Nouveau-Brunswick, o&ugrave; il soutient nos villages-retraite Parkland et les foyers de soins Shannex de tout le Nouveau-Brunswick. L&rsquo;int&eacute;r&ecirc;t de Derek est le soutien des activit&eacute;s actuelles et en expansion de la compagnie au Nouveau-Brunswick pour assurer que les pensionnaires continuent de recevoir d&rsquo;employ&eacute;s d&eacute;vou&eacute;s un h&eacute;bergement et des services de premi&egrave;re qualit&eacute;. Originaire d&rsquo;une petite ville de Miramichi-Sud-Ouest, Boiestown, Derek r&eacute;side maintenant &agrave; Riverview, au Nouveau-Brunswick. Son &eacute;pouse Jill et lui sont mari&eacute;s depuis 25 ans et ont trois enfants. Avant de se joindre &agrave; Shannex, Derek a eu pendant 23 ans une carri&egrave;re distingu&eacute;e comme dirigeant sup&eacute;rieur de Croix Bleue Medavie, comme responsable de l&rsquo;ex&eacute;cution et de la gestion de ses contrats avec le gouvernement f&eacute;d&eacute;ral, en particulier Anciens Combattants Canada, les Forces arm&eacute;es, la GRC et Immigration, R&eacute;fugi&eacute;s et Citoyennet&eacute; Canada. Auparavant, il avait &eacute;t&eacute; officier d&rsquo;artillerie dans les Forces arm&eacute;es canadiennes pendant huit ans, en poste au Qu&eacute;bec, en Ontario et &agrave; Chatham, au Nouveau-Brunswick. Derek est titulaire d&rsquo;un baccalaur&eacute;at en commerce du Coll&egrave;ge militaire royal du Canada.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(7, 7, 'Crystal Powell', 'Board Member', '<p>\r\n	Crystal has been a PSW certified by Compu College for 17 years now. She has also attended NBCC for one year where she took office administration and received her certification. She has a nursing home background of 9 years and has done homecare both privately and through a homecare company working mainly with seniors and palliative care clients. She has experience working with high functioning mental health clients from employment in a level 2 special care home, prior to owning and operating Maritime Manor Special Care home since 2014. Crystal finds it gratifying dealing in senior care, geriatric clients have taught her so much and she still has so much to learn from them! She loves the outdoors, hunting, fishing, camping and spending as much time as possible with her two children and her husband. Making time for friends and family is important to her. Crystal&rsquo;s work is her passion and she is so grateful she took the opportunity when it arose to become a Special Care Home Owner, aside from her children it is one of her greatest accomplishments.</p>\r\n<p>\r\n	Crystal est une PSW certifi&eacute;e par Compu College depuis 17 ans maintenant. Elle a &eacute;galement fr&eacute;quent&eacute; le NBCC pendant un an, o&ugrave; elle a suivi des cours d&#39;administration de bureau et obtenu sa certification. Elle a travaill&eacute; dans une maison de soins infirmiers pendant neuf ans et a fourni des soins &agrave; domicile &agrave; titre priv&eacute; et par l&#39;entremise d&#39;une entreprise de soins &agrave; domicile, travaillant principalement avec des personnes &acirc;g&eacute;es et des clients en soins palliatifs. Elle a acquis de l&#39;exp&eacute;rience aupr&egrave;s de clients atteints de troubles mentaux de haut niveau en travaillant dans un foyer de soins sp&eacute;ciaux de niveau 2, avant de devenir propri&eacute;taire et exploitante du foyer de soins sp&eacute;ciaux Maritime Manor en 2014. Crystal trouve gratifiant de s&#39;occuper des soins aux personnes &acirc;g&eacute;es, les clients g&eacute;riatriques lui ont tant appris et elle a encore tant &agrave; apprendre d&#39;eux ! Elle aime le plein air, la chasse, la p&ecirc;che, le camping et passer le plus de temps possible avec ses deux enfants et son mari. Il est important pour elle de prendre du temps pour ses amis et sa famille. Le travail de Crystal est sa passion et elle est tr&egrave;s reconnaissante d&#39;avoir saisi l&#39;occasion de devenir propri&eacute;taire d&#39;un foyer de soins sp&eacute;ciaux, &agrave; part ses enfants, c&#39;est l&#39;une de ses plus grandes r&eacute;ussites.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(10, 10, 'Christine Saunders', 'Board Member', '<p>\r\n	Christine Saunders is co-owner and CEO of Paradise Villa Inc. a 78-bed licensed Special Care Home that includes 18 Memory Care Beds in Fredericton NB. She is a Licensed Practical Nurse and has worked in long term care for a number of years. Also, she works in her other family-owned businesses in the Moncton area. When she is not working, she enjoys spending time with her family, especially her two kids.</p>\r\n<p>Christine Saunders est copropriétaire et directrice générale de Paradise Villa Inc., un foyer de soins spéciaux titulaire de permis de 78 lits qui inclut 18 lits pour personnes atteintes de troubles de la mémoire à Fredericton, au Nouveau-Brunswick. Elle est infirmière auxiliaire immatriculée et travaille dans les soins de longue durée depuis de nombreuses années. Elle travaille aussi dans ses autres entreprises familiales dans la région de Moncton. Quand elle ne travaille pas, elle aime passer du temps avec sa famille, surtout ses deux enfants.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(11, 1, 'Jan Seely', 'Présidente', '<p>\r\n	Jan est pr&eacute;sidente de la NB Special Care Home Association depuis de nombreuses ann&eacute;es. Elle est une porte-parole &eacute;nergique des services communautaires. Jan travaille avec ardeur pour &eacute;tablir des relations productives avec le gouvernement et d&rsquo;autres partenaires communautaires, afin de renforcer l&rsquo;ensemble du secteur. Son mari et elle sont propri&eacute;taires-exploitants d&rsquo;un petit foyer de soins sp&eacute;ciaux &agrave; Saint John. Les 27 derni&egrave;res ann&eacute;es dans cette profession lui ont apport&eacute; de vastes connaissances des difficult&eacute;s v&eacute;cues par les exploitants et leurs employ&eacute;s qui s&rsquo;efforcent d&rsquo;offrir des services de qualit&eacute; aux clients.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(12, 3, 'John Grass', 'Vice-Président', '<p>\r\n	Pr&eacute;sident actuel de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux, Kevin a commenc&eacute; sa carri&egrave;re dans le secteur des soins de longue dur&eacute;e en 2007 avec la construction de sa premi&egrave;re r&eacute;sidence. Kevin avait obtenu auparavant un dipl&ocirc;me en administration des affaires du CCNB en 2002. Aujourd&rsquo;hui, il est copropri&eacute;taire de sept &eacute;tablissements de niveaux 2 et 3B et g&egrave;re plus de 380 lits. En tant que pr&eacute;sident de l&rsquo;AFESSNB, Kevin est tr&egrave;s fier du travail accompli par l&rsquo;association ainsi que par la NBSCHA et est tr&egrave;s heureux de la r&eacute;unification des deux associations. C&rsquo;est avec grand plaisir que Kevin se joint au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick en tant que vice-pr&eacute;sident.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(13, 4, 'Amy McNair', 'Tréasurèr', '<p>\r\n	Comme ergoth&eacute;rapeute ayant eu une fructueuse carri&egrave;re de 19 ans, 13 comme dirigeante d&rsquo;entreprise, je suis propri&eacute;taire-exploitante de McNair Manor, un foyer de soins sp&eacute;cialis&eacute;s de 58 lits pour personnes &acirc;g&eacute;es (niveaux 2, 3G et 3B). Mon exp&eacute;rience est en r&eacute;adaptation g&eacute;riatrique, avec accent sur les soins aux personnes atteintes de d&eacute;mence et les soins palliatifs. J&rsquo;ai une formation en &eacute;ducation des adultes, et j&rsquo;aime encadrer notre personnel et collaborer avec tous les partenaires de soins pour offrir des soins de haute qualit&eacute;. J&rsquo;ai de l&rsquo;exp&eacute;rience dans l&rsquo;application des politiques provinciales et la promotion de changements pour am&eacute;liorer les services &agrave; nos clients. C&rsquo;est un plaisir de si&eacute;ger au conseil de l&rsquo;AFESSNB, et je me r&eacute;jouis &agrave; l&rsquo;avance de faire partie du d&eacute;veloppement continu de notre secteur.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(14, 5, 'Danielle Gallant', 'Secrétaire', '<p>\r\n	Je dirige notre entreprise familiale depuis 20 ans et j&rsquo;ai &eacute;t&eacute; technicienne en pharmacie pendant sept ans. J&rsquo;&eacute;tais secr&eacute;taire de la New Brunswick Special Care Home Association depuis six ans. Vers la fin de l&rsquo;&eacute;t&eacute; 2019, j&rsquo;ai &eacute;galement fait partie du groupe de travail qui a &eacute;t&eacute; form&eacute; pour restructurer les normes et r&egrave;glements des foyers de soins sp&eacute;ciaux.</p>\r\n<p>\r\n	Ma passion est de promouvoir la prestation de services d&rsquo;excellente qualit&eacute; dans tous les foyers du Nouveau-Brunswick. Je crois que des changements sont n&eacute;cessaires dans notre secteur et je suis ravie d&rsquo;en faire partie!</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(15, 6, 'Derek Green', 'Board Member', '<p>\r\n	Derek s&rsquo;est joint &agrave; Shannex en 2018 comme vice-pr&eacute;sident des Op&eacute;rations au Nouveau-Brunswick, o&ugrave; il soutient nos villages-retraite Parkland et les foyers de soins Shannex de tout le Nouveau-Brunswick. L&rsquo;int&eacute;r&ecirc;t de Derek est le soutien des activit&eacute;s actuelles et en expansion de la compagnie au Nouveau-Brunswick pour assurer que les pensionnaires continuent de recevoir d&rsquo;employ&eacute;s d&eacute;vou&eacute;s un h&eacute;bergement et des services de premi&egrave;re qualit&eacute;. Originaire d&rsquo;une petite ville de Miramichi-Sud-Ouest, Boiestown, Derek r&eacute;side maintenant &agrave; Riverview, au Nouveau-Brunswick. Son &eacute;pouse Jill et lui sont mari&eacute;s depuis 25 ans et ont trois enfants. Avant de se joindre &agrave; Shannex, Derek a eu pendant 23 ans une carri&egrave;re distingu&eacute;e comme dirigeant sup&eacute;rieur de Croix Bleue Medavie, comme responsable de l&rsquo;ex&eacute;cution et de la gestion de ses contrats avec le gouvernement f&eacute;d&eacute;ral, en particulier Anciens Combattants Canada, les Forces arm&eacute;es, la GRC et Immigration, R&eacute;fugi&eacute;s et Citoyennet&eacute; Canada. Auparavant, il avait &eacute;t&eacute; officier d&rsquo;artillerie dans les Forces arm&eacute;es canadiennes pendant huit ans, en poste au Qu&eacute;bec, en Ontario et &agrave; Chatham, au Nouveau-Brunswick. Derek est titulaire d&rsquo;un baccalaur&eacute;at en commerce du Coll&egrave;ge militaire royal du Canada.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(16, 7, 'Crystal Powell', 'Board Member', '<p>\r\n	Crystal est PSW certifi&eacute;e par Compu College depuis 17 ans maintenant. Elle a &eacute;galement fr&eacute;quent&eacute; le NBCC pendant un an o&ugrave; elle a pris en charge l&#39;administration du bureau et a re&ccedil;u sa certification. Elle a pass&eacute; 9 ans dans une maison de retraite et a effectu&eacute; des soins &agrave; domicile &agrave; la fois en priv&eacute; et par l&#39;interm&eacute;diaire d&#39;une entreprise de soins &agrave; domicile qui s&#39;occupe principalement de personnes &acirc;g&eacute;es et de clients en soins palliatifs. Elle a de l&#39;exp&eacute;rience de travail avec des clients en sant&eacute; mentale de haut niveau d&#39;emploi dans un foyer de soins sp&eacute;ciaux de niveau 2, avant de poss&eacute;der et d&#39;exploiter le foyer de soins sp&eacute;ciaux Maritime Manor depuis 2014. elle a encore tant &agrave; apprendre d&#39;eux ! Elle aime le plein air, la chasse, la p&ecirc;che, le camping et passe le plus de temps possible avec ses deux enfants et son mari. Prendre du temps pour ses amis et sa famille est important pour elle. Le travail de Crystal est sa passion et elle est tellement reconnaissante d&#39;avoir saisi l&#39;occasion lorsqu&#39;elle s&#39;est pr&eacute;sent&eacute;e de devenir propri&eacute;taire d&#39;un foyer de soins sp&eacute;ciaux, &agrave; part ses enfants, c&#39;est l&#39;une de ses plus grandes r&eacute;alisations.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(19, 10, 'Christine Saunders', 'Board Member', '<p>\r\n	Christine Saunders est copropri&eacute;taire et directrice g&eacute;n&eacute;rale de Paradise Villa Inc., un foyer de soins sp&eacute;ciaux titulaire de permis de 78 lits qui inclut 18 lits pour personnes atteintes de troubles de la m&eacute;moire &agrave; Fredericton, au Nouveau-Brunswick. Elle est infirmi&egrave;re auxiliaire immatricul&eacute;e et travaille dans les soins de longue dur&eacute;e depuis de nombreuses ann&eacute;es. Elle travaille aussi dans ses autres entreprises familiales dans la r&eacute;gion de Moncton. Quand elle ne travaille pas, elle aime passer du temps avec sa famille, surtout ses deux enfants.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(20, 11, 'John Grass', 'Board Member', '<p>\r\n	John has been a resident of Riverview for the past 49 years and graduated Riverview High School in 1980. He then obtained his Bachelor of Science in 1984 and his Bachelor of Business Administration in 1986 both from Mount Allison University. While at Mount Allison, he played football on a team in his first year that didn&rsquo;t win a game but later during his time there, played in the National Championship for Canadian University Football. He understands what it takes to build a winning team. John spent 12 years with the Irving group of companies before buying his first Special Care Home in 1998 with his Registered Nurse wife, Lynn. John and Lynn built their second home in 2019 caring for 36 level 3G seniors. Combined with two homes, they offer level 2 and 3G levels of care for 60 seniors. John and Lynn have 2 adult children, Sarah and Ben. Sarah is a Registered Nurse like mom and currently the Director of Nursing at a Nursing Home in NB. Ben is a Life Science and Healthcare Account Executive with Salesforce in Toronto. They also have 2 four-legged fur children as well, Charlie and Ted, both Golden Retrievers.</p>\r\n<p>\r\n	John est un r&eacute;sident de Riverview depuis 49 ans et a obtenu un dipl&ocirc;me de la Riverview High School en 1980. Il a ensuite obtenu un baccalaur&eacute;at en sciences en 1984 et un baccalaur&eacute;at en administration des affaires en 1986, les deux &agrave; la Mount Allison University. &Agrave; Mount Allison, il a jou&eacute; au football pendant sa premi&egrave;re ann&eacute;e dans une &eacute;quipe qui n&rsquo;a pas gagn&eacute; une seule partie, mais plus tard pendant ses &eacute;tudes, il a particip&eacute; au championnat national de football universitaire canadien. Il comprend ce qui est n&eacute;cessaire pour organiser une &eacute;quipe gagnante. John a pass&eacute; 12 ans dans le groupe de compagnies Irving avant d&rsquo;acheter son premier foyer de soins sp&eacute;ciaux en 1998 avec son &eacute;pouse Lynn, qui est infirmi&egrave;re immatricul&eacute;e. John et Lynn ont construit en 2019 leur deuxi&egrave;me foyer, qui prend soin de 36 personnes &acirc;g&eacute;es de niveau 3G. Pour le total des deux foyers, ils offrent des soins de niveaux 2 et 3G &agrave; 60 personnes &acirc;g&eacute;es. John et Lynn ont deux enfants d&rsquo;&acirc;ge adulte, Sarah et Ben. Sarah est infirmi&egrave;re immatricul&eacute;e comme sa m&egrave;re et est actuellement directrice des soins infirmiers dans un foyer de soins du Nouveau-Brunswick. Ben est charg&eacute; de compte en sciences de la vie et soins de sant&eacute; pour Salesforce &agrave; Toronto. Le couple a aussi deux enfants &agrave; quatre pattes, Charlie et Ted, deux golden retrievers.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(21, 12, 'Diane LeBlanc Goguen', 'Board Member', '<p>\r\n	Co-owner of the Danny and Diane residence in Scoudouc for 11 years now, Diane knows the long-term care sector very well and so does her husband, who&rsquo;s also the co-owner of the residence for the last 33 years. Their residence, specializing in mental health, has 10 residents. Prior to her career in long-term care, Diane was responsible of the overseas business development for a private company. Diane has served on the Board of Directors of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux for four years and is very pleased to be on the Board of Directors of the newly reintegrated NB Special Care Home Association!</p>\r\n<p>\r\n	Copropri&eacute;taire de la r&eacute;sidence Danny et Diane &agrave; Scoudouc depuis maintenant 11 ans, Diane conna&icirc;t tr&egrave;s bien le secteur des soins de longue dur&eacute;e, tout comme son conjoint, qui est copropri&eacute;taire de la r&eacute;sidence depuis 33 ans. Leur r&eacute;sidence, sp&eacute;cialis&eacute;e en sant&eacute; mentale, compte 10 pensionnaires. Avant de faire carri&egrave;re dans le domaine des soins de longue dur&eacute;e, Diane &eacute;tait responsable du d&eacute;veloppement commercial &agrave; l&rsquo;&eacute;tranger d&rsquo;une entreprise priv&eacute;e. Diane si&eacute;geait au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis quatre ans et est tr&egrave;s heureuse de faire partie du conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick!</p>\r\n', '', NULL, NULL, NULL, 'en'),
(22, 13, 'Marc-André Savoie', 'Board Member', '<p>\r\n	Owner of the r&eacute;sidence Savoie, a 20-bed residence specializing in mental health, it is obvious that Marc-Andr&eacute; knows the sector very well. Wanting to make a difference in the field, Marc-Andr&eacute; joined the board of directors of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux a few years ago. He is also very pleased to join the Board of Directors of the newly reintegrated NB Special Care Home Association! It goes without saying that his expertise in the field will be a great asset for the new association!</p>\r\n<p>\r\n	Propri&eacute;taire de la r&eacute;sidence Savoie, une r&eacute;sidence de 20 lits sp&eacute;cialis&eacute;e en sant&eacute; mentale, il est &eacute;vident que Marc-Andr&eacute; conna&icirc;t tr&egrave;s bien le secteur. D&eacute;sirant am&eacute;liorer les choses dans le secteur, Marc-Andr&eacute; s&rsquo;est joint au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux il y a quelques ann&eacute;es. Il est &eacute;galement tr&egrave;s heureux de se joindre au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick! Il va sans dire que son expertise dans le domaine sera un tr&egrave;s grand atout pour la nouvelle association!</p>\r\n', '', '', '', NULL, 'en'),
(23, 14, 'Nathalie Blanchard', 'Board Member', '<p>\r\n	Nathalie is no stranger to the field of long-term care, and for good reason. Not only does she own the McGraw Residence in Bathurst, a 45-bed Level II facility, she has also served on the Board of Directors of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux since 2002. Nathalie was even the president of the association for 3 consecutive terms. It is with joy and pride that Nathalie has agreed to sit on Board of Directors of the newly reintegrated NB Special Care Home Association!. Her experience will undoubtedly be very beneficial for the sector, which is booming!</p>\r\n<p>\r\n	Nathalie n&rsquo;est pas &eacute;trang&egrave;re au domaine des soins de longue dur&eacute;e, et pour cause. Non seulement elle est propri&eacute;taire de la R&eacute;sidence McGraw de Bathurst, un &eacute;tablissement de 45 lits de niveau II, mais elle si&egrave;ge aussi au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis 2002. Nathalie fut m&ecirc;me la pr&eacute;sidente de l&rsquo;association pour trois mandats cons&eacute;cutifs. C&rsquo;est avec joie et fiert&eacute; que Nathalie a accept&eacute; de si&eacute;ger au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick. Son exp&eacute;rience sera sans aucun doute tr&egrave;s profitable pour le secteur, qui est en pleine essor!</p>\r\n', '', NULL, NULL, NULL, 'en'),
(24, 15, 'Monica Gosselin', 'Board Member', '<p>\r\n	Monica acquired her first Level II residence in 2007. In 2016, with a business partner, Monica acquired two other establishments, which is not surprising considering that she comes from a family of entrepreneurs. A graduate of the Pharmacy Technical Assistant program since 2001, Monica decided to continue her studies and completed her training and became a licensed pharmacy technician in 2016. There is no doubt that Monica is a very determined person, which is obviously very beneficial for her company and for the industry in general. Monica has been on the Board of Directors of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux for three years and is very excited about the reintegration of the two associations and serving on the Board of Directors of the newly reintegrated NB Special Care Home Association!</p>\r\n<p>\r\n	Monica a fait l&rsquo;acquisition de sa premi&egrave;re r&eacute;sidence de niveau II en 2007. En 2016, avec une partenaire d&rsquo;affaires, Monica &agrave; fait l&rsquo;acquisition de deux autres &eacute;tablissements, ce qui n&rsquo;est pas surprenant puisqu&rsquo;elle est issue d&rsquo;une famille d&rsquo;entrepreneurs. Dipl&ocirc;m&eacute;e du programme d&rsquo;assistante technique en pharmacie en 2001, Monica a d&eacute;cid&eacute; de poursuivre ses &eacute;tudes et a termin&eacute; sa formation pour devenir technicienne en pharmacie titulaire de permis en 2016. Il ne fait aucun doute que Monica est une personne tr&egrave;s d&eacute;termin&eacute;e, ce qui est &eacute;videmment tr&egrave;s avantageux pour son entreprise et pour le secteur en g&eacute;n&eacute;ral. Monica si&egrave;ge au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis trois ans et est tr&egrave;s enthousiaste &agrave; l&rsquo;id&eacute;e de la r&eacute;int&eacute;gration des deux associations ainsi que de si&eacute;ger sur le conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick!</p>\r\n', '', NULL, NULL, NULL, 'en'),
(25, 16, 'Paul Rossignol', 'Board Member', '<p>\r\n	Paul began his career in 1994 as a project engineer for companies in the manufacturing sector as well as in the forest industry. It was in 2006 that he made the big leap into health care in New Brunswick. For more than 10 years, he held various administrative positions within Vitalit&eacute; Health Network. In September 2016, Paul joined the Foyer Saint-Thomas de la Vall&eacute;e de Memramcook Inc. team as General Manager, a position he still holds today. Mr. Rossignol holds a Bachelor of Applied Science in Civil Engineering and a Master of Business Administration from the Universit&eacute; de Moncton. He is also certified as a Lean Six Sigma black belt. Paul joined the Board of Directors of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux a little over a year ago and is very pleased to sit on the Board of Directors of the newly reintegrated NB Special Care Home Association!</p>\r\n<p>\r\n	Paul a commenc&eacute; sa carri&egrave;re en 1994 en tant qu&rsquo;ing&eacute;nieur de projet pour des entreprises &oelig;uvrant dans le secteur manufacturier ainsi que dans l&rsquo;industrie foresti&egrave;re. C&rsquo;est en 2006 qu&rsquo;il fit le grand saut dans les soins de sant&eacute; au Nouveau-Brunswick. Pendant plus de 10 ans, il a occup&eacute; divers postes administratifs au sein du R&eacute;seau de sant&eacute; Vitalit&eacute;. En septembre 2016, Paul s&rsquo;est joint &agrave; l&rsquo;&eacute;quipe du Foyer Saint-Thomas de la Vall&eacute;e de Memramcook Inc. en tant que directeur g&eacute;n&eacute;ral, poste qu&rsquo;il occupe encore aujourd&rsquo;hui. M. Rossignol est titulaire d&rsquo;un baccalaur&eacute;at en sciences appliqu&eacute;es, sp&eacute;cialisation g&eacute;nie civil, ainsi que d&rsquo;une maitrise en administration des affaires de l&rsquo;Universit&eacute; de Moncton. Il est aussi certifi&eacute; comme ceinture noire Lean Six Sigma. Paul s&rsquo;est joint au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux il y a un peu plus d&rsquo;un an et est tr&egrave;s heureux de si&eacute;ger au conseil d&rsquo;administration de la nouvelle Association des foyers de soin sp&eacute;ciaux du Nouveau-Brunswick.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(26, 17, 'Cindy Roy', 'Board Member', '<p>\r\n	Cindy has been working in the field of special care since 2005. Currently the owner of two Level II special care homes in the Grand Falls area, Cindy has a very good knowledge of the sector. Wanting to make a difference for the long-term care sector, Cindy has been a member of the Board of Directors of the Association francophone des &eacute;tablissements de soins sp&eacute;ciaux for 11 years now. She is even the current vice-president. The reunification of the two associations makes Cindy happy because the reunification will bring a stronger voice for the sector. Cindy was pleased to join the Board of Directors of the newly reintegrated NB Special Care Home Association.</p>\r\n<p>\r\n	Cindy &oelig;uvre dans le domaine des soins sp&eacute;ciaux depuis 2005. Actuellement propri&eacute;taire de deux r&eacute;sidences de soins sp&eacute;ciaux de niveau II dans la r&eacute;gion de Grand-Sault, Cindy a une tr&egrave;s bonne connaissance du secteur. D&eacute;sirant am&eacute;liorer les choses dans le secteur des soins de longues dur&eacute;es, Cindy si&egrave;ge au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis maintenant 11 ans. Elle en est m&ecirc;me la vice-pr&eacute;sidente actuelle. La r&eacute;unification des deux associations r&eacute;jouit Cindy parce qu&rsquo;elle renforcera la voix du secteur. C&rsquo;est avec plaisir que Cindy a accept&eacute; de si&eacute;ger au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick.</p>\r\n', '', NULL, NULL, NULL, 'en'),
(27, 11, 'John Grass', 'Board Member', '<p>\r\n	John est un r&eacute;sident de Riverview depuis 49 ans et a obtenu un dipl&ocirc;me de la Riverview High School en 1980. Il a ensuite obtenu un baccalaur&eacute;at en sciences en 1984 et un baccalaur&eacute;at en administration des affaires en 1986, les deux &agrave; la Mount Allison University. &Agrave; Mount Allison, il a jou&eacute; au football pendant sa premi&egrave;re ann&eacute;e dans une &eacute;quipe qui n&rsquo;a pas gagn&eacute; une seule partie, mais plus tard pendant ses &eacute;tudes, il a particip&eacute; au championnat national de football universitaire canadien. Il comprend ce qui est n&eacute;cessaire pour organiser une &eacute;quipe gagnante. John a pass&eacute; 12 ans dans le groupe de compagnies Irving avant d&rsquo;acheter son premier foyer de soins sp&eacute;ciaux en 1998 avec son &eacute;pouse Lynn, qui est infirmi&egrave;re immatricul&eacute;e. John et Lynn ont construit en 2019 leur deuxi&egrave;me foyer, qui prend soin de 36 personnes &acirc;g&eacute;es de niveau 3G. Pour le total des deux foyers, ils offrent des soins de niveaux 2 et 3G &agrave; 60 personnes &acirc;g&eacute;es. John et Lynn ont deux enfants d&rsquo;&acirc;ge adulte, Sarah et Ben. Sarah est infirmi&egrave;re immatricul&eacute;e comme sa m&egrave;re et est actuellement directrice des soins infirmiers dans un foyer de soins du Nouveau-Brunswick. Ben est charg&eacute; de compte en sciences de la vie et soins de sant&eacute; pour Salesforce &agrave; Toronto. Le couple a aussi deux enfants &agrave; quatre pattes, Charlie et Ted, deux golden retrievers.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(28, 12, 'Diane LeBlanc Goguen', 'Board Member', '<p>\r\n	Copropri&eacute;taire de la r&eacute;sidence Danny et Diane &agrave; Scoudouc depuis maintenant 11 ans, Diane conna&icirc;t tr&egrave;s bien le secteur des soins de longue dur&eacute;e, tout comme son conjoint, qui est copropri&eacute;taire de la r&eacute;sidence depuis 33 ans. Leur r&eacute;sidence, sp&eacute;cialis&eacute;e en sant&eacute; mentale, compte 10 pensionnaires. Avant de faire carri&egrave;re dans le domaine des soins de longue dur&eacute;e, Diane &eacute;tait responsable du d&eacute;veloppement commercial &agrave; l&rsquo;&eacute;tranger d&rsquo;une entreprise priv&eacute;e. Diane si&eacute;geait au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis quatre ans et est tr&egrave;s heureuse de faire partie du conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick!</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(29, 13, 'Marc-André Caissie', 'Board Member', '<p>\r\n	Propri&eacute;taire de la r&eacute;sidence Savoie, une r&eacute;sidence de 20 lits sp&eacute;cialis&eacute;e en sant&eacute; mentale, il est &eacute;vident que Marc-Andr&eacute; conna&icirc;t tr&egrave;s bien le secteur. D&eacute;sirant am&eacute;liorer les choses dans le secteur, Marc-Andr&eacute; s&rsquo;est joint au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux il y a quelques ann&eacute;es. Il est &eacute;galement tr&egrave;s heureux de se joindre au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick! Il va sans dire que son expertise dans le domaine sera un tr&egrave;s grand atout pour la nouvelle association!</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(30, 14, 'Nathalie Blanchard', 'Board Member', '<p>\r\n	Nathalie n&rsquo;est pas &eacute;trang&egrave;re au domaine des soins de longue dur&eacute;e, et pour cause. Non seulement elle est propri&eacute;taire de la R&eacute;sidence McGraw de Bathurst, un &eacute;tablissement de 45 lits de niveau II, mais elle si&egrave;ge aussi au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis 2002. Nathalie fut m&ecirc;me la pr&eacute;sidente de l&rsquo;association pour trois mandats cons&eacute;cutifs. C&rsquo;est avec joie et fiert&eacute; que Nathalie a accept&eacute; de si&eacute;ger au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick. Son exp&eacute;rience sera sans aucun doute tr&egrave;s profitable pour le secteur, qui est en pleine essor!</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(31, 15, 'Monica Gosselin', 'Board Member', '<p>\r\n	Monica a fait l&rsquo;acquisition de sa premi&egrave;re r&eacute;sidence de niveau II en 2007. En 2016, avec une partenaire d&rsquo;affaires, Monica &agrave; fait l&rsquo;acquisition de deux autres &eacute;tablissements, ce qui n&rsquo;est pas surprenant puisqu&rsquo;elle est issue d&rsquo;une famille d&rsquo;entrepreneurs. Dipl&ocirc;m&eacute;e du programme d&rsquo;assistante technique en pharmacie en 2001, Monica a d&eacute;cid&eacute; de poursuivre ses &eacute;tudes et a termin&eacute; sa formation pour devenir technicienne en pharmacie titulaire de permis en 2016. Il ne fait aucun doute que Monica est une personne tr&egrave;s d&eacute;termin&eacute;e, ce qui est &eacute;videmment tr&egrave;s avantageux pour son entreprise et pour le secteur en g&eacute;n&eacute;ral. Monica si&egrave;ge au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis trois ans et est tr&egrave;s enthousiaste &agrave; l&rsquo;id&eacute;e de la r&eacute;int&eacute;gration des deux associations ainsi que de si&eacute;ger sur le conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick!</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(32, 16, 'Paul Rossignol', 'Board Member', '<p>\r\n	Paul a commenc&eacute; sa carri&egrave;re en 1994 en tant qu&rsquo;ing&eacute;nieur de projet pour des entreprises &oelig;uvrant dans le secteur manufacturier ainsi que dans l&rsquo;industrie foresti&egrave;re. C&rsquo;est en 2006 qu&rsquo;il fit le grand saut dans les soins de sant&eacute; au Nouveau-Brunswick. Pendant plus de 10 ans, il a occup&eacute; divers postes administratifs au sein du R&eacute;seau de sant&eacute; Vitalit&eacute;. En septembre 2016, Paul s&rsquo;est joint &agrave; l&rsquo;&eacute;quipe du Foyer Saint-Thomas de la Vall&eacute;e de Memramcook Inc. en tant que directeur g&eacute;n&eacute;ral, poste qu&rsquo;il occupe encore aujourd&rsquo;hui. M. Rossignol est titulaire d&rsquo;un baccalaur&eacute;at en sciences appliqu&eacute;es, sp&eacute;cialisation g&eacute;nie civil, ainsi que d&rsquo;une maitrise en administration des affaires de l&rsquo;Universit&eacute; de Moncton. Il est aussi certifi&eacute; comme ceinture noire Lean Six Sigma. Paul s&rsquo;est joint au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux il y a un peu plus d&rsquo;un an et est tr&egrave;s heureux de si&eacute;ger au conseil d&rsquo;administration de la nouvelle Association des foyers de soin sp&eacute;ciaux du Nouveau-Brunswick.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(33, 17, 'Cindy Roy', 'Board Member', '<p>\r\n	Cindy &oelig;uvre dans le domaine des soins sp&eacute;ciaux depuis 2005. Actuellement propri&eacute;taire de deux r&eacute;sidences de soins sp&eacute;ciaux de niveau II dans la r&eacute;gion de Grand-Sault, Cindy a une tr&egrave;s bonne connaissance du secteur. D&eacute;sirant am&eacute;liorer les choses dans le secteur des soins de longues dur&eacute;es, Cindy si&egrave;ge au conseil d&rsquo;administration de l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux depuis maintenant 11 ans. Elle en est m&ecirc;me la vice-pr&eacute;sidente actuelle. La r&eacute;unification des deux associations r&eacute;jouit Cindy parce qu&rsquo;elle renforcera la voix du secteur. C&rsquo;est avec plaisir que Cindy a accept&eacute; de si&eacute;ger au conseil d&rsquo;administration de la nouvelle Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick.</p>\r\n', '', NULL, NULL, NULL, 'fr'),
(34, 18, 'Collette Doucette', 'Chair, Larger Homes Committee', '<p>\r\n	At a very early age Collette developed a commitment to serving the elderly. From 1986 to 1994 she worked as a Nurse-Aid at Villa Providence in Shediac, a 198 beds Nursing Home. In 1994 her dream came true and became the Owner and Operator of a 45 beds Special Care Home for 17 years. After selling her home, she took on the role in 2017 of managing the day to day operation of a 130 beds Special Care Home Residence O Bons Soins in Shediac NB. Married with Donald Doucette in 1986, her high school sweetheart they have 2 boys and 2 grandchildren.</p>\r\n', 'Shediac, NB', NULL, NULL, NULL, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `carelevels`
--

CREATE TABLE `carelevels` (
  `cid` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carelevels`
--

INSERT INTO `carelevels` (`cid`, `sort_order`, `status`, `delete_status`) VALUES
(1, 0, 1, 0),
(2, 1, 1, 0),
(3, 2, 1, 0),
(4, 3, 1, 0),
(5, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carelevels_desc`
--

CREATE TABLE `carelevels_desc` (
  `desc_id` int(11) NOT NULL,
  `carelevel_id` int(11) NOT NULL,
  `carelevel_title` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carelevels_desc`
--

INSERT INTO `carelevels_desc` (`desc_id`, `carelevel_id`, `carelevel_title`, `language`) VALUES
(1, 1, 'Level-2', 'en'),
(2, 1, 'Level-2', 'fr'),
(3, 2, 'Level-3', 'en'),
(4, 3, 'Level-3B', 'en'),
(5, 4, 'Level-3G', 'en'),
(6, 5, 'Level-4', 'en'),
(8, 2, 'Level-3', 'fr'),
(9, 3, 'Level-3B', 'fr'),
(10, 4, 'Level-3G', 'fr'),
(11, 5, 'Level-4', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_templates`
--

CREATE TABLE `certificate_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `c_key` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `wallet_bg` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate_templates`
--

INSERT INTO `certificate_templates` (`id`, `title`, `c_key`, `image`, `background`, `wallet_bg`, `signature`, `status`, `sort_order`, `delete_status`) VALUES
(1, 'Membership Certificate', 'membership', '', 'certificate_bg.jpg', '', 'signature.png', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_templates_desc`
--

CREATE TABLE `certificate_templates_desc` (
  `desc_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `template` text NOT NULL,
  `wallet_template` text,
  `signatory` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate_templates_desc`
--

INSERT INTO `certificate_templates_desc` (`desc_id`, `template_id`, `template`, `wallet_template`, `signatory`, `language`) VALUES
(1, 1, '<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						{{residence}}</h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\">{{identifier}}</span></td>\r\n				<td width=\"40%\">\r\n					{{signature}}<br />\r\n					{{signatory}}</td>\r\n				<td width=\"30%\">\r\n					{{expiry}}<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							{{residence}}</h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\">{{identifier}}</span></td>\r\n					<td width=\"40%\">\r\n						{{signature}}<br />\r\n						{{signatory}}</td>\r\n					<td width=\"30%\">\r\n						{{expiry}}<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Jan seely / President of NBSCHA', 'en'),
(2, 1, '<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						{{residence}}</h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION AND APPLICABLE REGIONAL SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\">{{identifier}}</span></td>\r\n				<td width=\"40%\">\r\n					{{signature}}<br />\r\n					{{signatory}}</td>\r\n				<td width=\"30%\">\r\n					{{expiry}}<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							{{residence}}</h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION AND APPLICABLE REGIONAL SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\">{{identifier}}</span></td>\r\n					<td width=\"40%\">\r\n						{{signature}}<br />\r\n						{{signatory}}</td>\r\n					<td width=\"30%\">\r\n						{{expiry}}<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n', 'Jan seely / President of NBSCHA', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `database_updates`
--

CREATE TABLE `database_updates` (
  `update_id` int(11) NOT NULL,
  `update_name` varchar(255) NOT NULL,
  `update_status` varchar(255) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `database_updates`
--

INSERT INTO `database_updates` (`update_id`, `update_name`, `update_status`, `update_time`) VALUES
(1, 'saleel2022031401.txt', '1', '2022-03-14 05:53:15'),
(2, 'saleel2022031402.txt', '1', '2022-03-14 05:55:20'),
(3, 'saleel2022031501.txt', '1', '2022-03-15 08:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `board_member_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `home_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `type`, `board_member_id`, `member_id`, `home_id`, `name`, `email`, `phone`, `subject`, `message`, `created`) VALUES
(1, 'contact', 0, 0, 0, 'Mihajlo', 'mihajlo95cvetkovic@gmail.com', '', 'Job', 'Regards,\\nmy name is Mihajlo, I live in Europe, Kosovo. I graduated from medical high school. I have been a caregiver for several years. Do you hire foreign workers who don&rsquo;t have a Canadian visa but would move and work there?\\nThanks in advance.', '2022-05-25 16:21:12'),
(2, 'contact', 0, 0, 0, 'Emily MacNeil', 'emilyrmacneil@gmail.com', '9022669485', 'Service Inquiry', 'Hello,\\n\\nI am inquiring about the services you provide. My mother lives in Waterborough NB and has mobility issues. I am looking for a cleaning service for her. She has a neurological condition that impacts her mobility, she is not impacted mentally from it. Is physiotherapy a service that you provide as well?\\n\\nThank you,\\nEmily MacNeil', '2022-05-26 14:41:44'),
(3, 'contact', 0, 0, 0, 'Andrea Clark', 'facilitymanager@southamptonhouse.ca', '5064519880', 'Information ', 'I would like to have information on the group benefit plan offered to members of the association.  I renewed our membership in April, but have yet to receive any confirmation or membership card.\\n\\nThank you,\\nAndrea Clark - Residential Facility Manager\\nSouthampton House Inc.', '2022-06-02 13:51:11'),
(4, 'contact', 0, 0, 0, 'Vicky Dempster', 'vickydee@hotmail.ca', '604 445-2781', 'employment', 'Hi, Could you please provide an email address in order for me to forward my resume. i tried sending it to info@nbscha.com but got a message saying it was undeliverable. I live in the St John area.\\n\\nThanks', '2022-06-08 04:40:45'),
(5, 'contact', 0, 0, 0, 'Mireille LeBlanc', 'mireille@mireilleleblanc.ca', '506 855-6167', 'Entrevue pour L\\\'Acadie Nouvelle', 'Bonjour!\\n\\nJe travaille comme pigiste pour L\\\'Acadie Nouvelle et je pr&eacute;pare quelques articles qui para&icirc;tront dans notre cahier pour la Semaine des Foyers de soins. Comme d\\\'habitude, nous aimerions inclure un article sur l\\\'Association qui repr&eacute;sente les &eacute;tablissements de soins sp&eacute;ciaux pour discuter de vos principaux dossiers. J\\\'aimerais donc prendre rendez-vous avec votre porte-parole pour une entrevue t&eacute;l&eacute;phonique pour discuter de la r&eacute;cente fusion des deux associations, pourquoi un regroupement et comment &ccedil;a se passe jusqu\\\'&agrave; pr&eacute;sent, des principales pr&eacute;occupations de vos membres et des dossiers sur lesquels la nouvelle association se penche.\\n\\nSi vous acceptez bien, quand seriez-vous disponible pour une entrevue? Nous aurions besoin d\\\'environ une demie-heure au t&eacute;l&eacute;phone pour le faire.\\n\\nMerci d\\\'avance!\\n\\nMireille LeBlanc\\n', '2022-06-20 14:44:55'),
(6, 'contact', 0, 0, 0, 'Phil Nason', 'filthymoh@hotmail.com', '5064743546', 'Availability', 'Please call or email with information about locations around Fredericton.', '2022-06-23 13:31:16'),
(7, 'contact', 0, 0, 0, 'Lisa H', 'lisajhanna2@yahoo.ca', '5199498957', 'Employment ', 'June 26, 2022\\n\\nGood Morning \\nI am currently residing in Ontario but I am relocating to New Brunswick in August, 2022. Can I email you my resume or should I wait until my relocation?\\n\\nSincerely,\\n\\nLisa Hanna', '2022-06-26 13:02:03'),
(8, 'contact', 0, 0, 0, 'Claire Smith', 'claire@theheritageseo.com', '5712007758', 'Increase Sales Through Your Website Design', 'Hi,\\n\\nWe have a team of 55+ highly qualified website design and development professionals providing a brand new and trendy website to generate higher visitor traffic.\\n\\nOur focus is to attract customers through our website design services, which significantly impacts visitors\\\' decision whether to put their trust in your brand or not. And this is particularly important for small business owners who keep looking for cost-efficient ways of pleasing their potential customers and want to have their websites built in WordPress.\\n\\nIf you\\\'re wondering how to attract more customers to your business at a relatively low cost, you should revise your website design to WordPress and try to bring it to a higher level.\\n\\nPlease let me know if you are interested. We will ask about your requirements and share exact quotes and time frame to live your website.\\n\\nRegards,\\nClaire Smith', '2022-07-05 05:25:54'),
(9, 'residence', 0, 108, 126, 'Joseph I Chase', 'josephchase2007@gmail.com', '1-506-566-6644', 'Vacancy???', 'I am interested in moving into your special care home as I would like to be closer to family and Special Olympics and go to college as I am interested in Figure Skating and Veterinary Technician studies???\\nDo you have music lesson days or allow computers in the residents bedroom as I like computer gaming.\\n', '2022-07-19 15:51:05'),
(10, 'residence', 0, 108, 126, 'Joseph I Chase', 'josephchase2007@gmail.com', '1-506-566-6644', 'Telephone call', 'Could you call me today at 3:45 PM', '2022-07-19 15:51:53'),
(11, 'residence', 0, 74, 74, 'Linda Melvin', 'lindaaframe@outlook.com', '5064331079', 'Senior', 'do seniors have own room and bathroom', '2022-07-27 11:39:18'),
(12, 'contact', 0, 0, 0, 'Emily Tucker', 'emuck7@gmail.com', '15067550808', 'Information for TSD funding ', 'To whom it may concern,\\nHello my name is Emily Tucker I have been accepted in NBCCs PSW program and I am looking for some information on being PSW.  I am working with TSD to get funding to go to the course and it requires  I interview / fill out a questionnaire employers. If you could point me in the right direction or help me out would be great!\\n\\nThank you,\\nEmily Tucker\\n1 506 755 0808\\n\\n', '2022-07-28 21:10:39'),
(13, 'contact', 0, 0, 0, ' Ernest Byers', 'ernestjjbyers@gmail.com', '617-827-5398', 'Concerned neighbor', 'Greetings, \\nFor the past 14 months, my family and I have lived next to Bay Care Special Care Home located at 59 Pitt St, Saint John, NB. We are home owners and are raising two baby twins, now 18 months old. Residents are generally friendly and we are on a first name basis with many of them. Last year we provided a pizza lunch and Christmas presents for everyone. \\n\\nOver the past 6 months we\\\'ve noticed a steady decline in the atmosphere next door at the Special Care Home.\\n\\nDue to the proximity of our house, we can hear what goes on in the outside area, we share a fence and a driveway. Of late there are have been increasing instances of verbal arguments with threats of physical violence between residents. This concerns us as parents of young children. Yesterday, July 28th, there was a particularly loud and frightening exchange between residents. So much so my wife and I stopped by the home to see if everything was ok and felt so concerned we left our house with our babies. There was a resident punching a wall while yelling at others. Although no specifics were provided there appeared to be something us going on as all residents were outside the home.\\n\\nLoud profanity is understandable from time to time, but not several times a week. We understand that residents are battling mental health and we know that it is difficult. \\n\\nWe\\\'re curious about the homes policy with cannabis. It seems and smells as is residents smoke marijuana outdoors daily. Perhaps this is part of their care plans yet coupled with profanity and yelling is also concerning to a our young family. \\n\\nWe are hoping that a member of management staff can contact us to simply inform us on how things are going next door, if there is anything we can do differently and how to best support our neighbors.\\n\\nKind regards,\\nErnest Byers\\n220 King St. East\\nSaint John, NB', '2022-07-29 13:11:18'),
(14, 'contact', 0, 0, 0, 'Ashley', 'ashleypitre1996@hotmail.com', '5062526960', 'Owed wages', 'Good morning I\\\'m still trying to get info on wages that my employers and refusing to pay me \\nI worked threw an out break at melansons special care homes in bathurst nb \\nI worked 10/14 days of the outbreak they owe me over 70 hours at 3$ an hour and they paid all my coworkers but because I no longer work there \\n(Outbreak was April 2-16 I left July 8) \\nThey are not giving me the money \\nI know I worked the hours so it\\\'s my right to be paid for my time there but they are refusing is there any way to have these funds paid to me as I had to take out a loan to over a payment because I was supposed to be paid by then on the 15 th and they didn\\\'t pay me so to avoid a bounced payment I had to take a loan ', '2022-08-17 11:54:26'),
(15, 'residence', 0, 54, 54, 'Henrietta Amamchukwu ', 'oziomaamamchukwu@gmail.com', '', 'Seeking Home Support Worker Job', 'Hello,\\nI came across your job posting on jobbank Canada, August 18 for Home Support and i am interested in the position.\\n\\nI am either a Canadian resident nor do i have a work permit but i am interested in immigration programs and have all the requirements to proceed. \\n\\nMy interest is majorly to build a career doing something i love which is helping senior live their best life! This is my motivation to see that spark of joy shining through.\\n\\nI hope to hear back from you. \\n\\nRegards\\nHA', '2022-08-21 18:19:56'),
(16, 'residence', 0, 45, 45, 'Melissa', 'melissa_keating@hotmail.com', '506 333-0433', 'Availability ', 'I was wondering is you still have a vacancy in your home. If so how do I go about a tour with my mother.', '2022-08-23 01:11:09'),
(17, 'residence', 0, 57, 57, 'Melissa', 'melissa_keating@hotmail.com', '506 333-0433', 'Availability ', 'I was wondering if you have vacancies, and if so arranging a tour with my mother', '2022-08-23 01:15:58'),
(18, 'residence', 0, 45, 45, 'Loai Jaouni', 'loai@curwinbusinesscentre.com', '5063335537', 'Testing', 'Please let me know if you get this to your email. Thanks.', '2022-08-25 15:46:49'),
(19, 'residence', 0, 10, 10, 'Joseph Chase', 'josephchase2007@gmail.com', '1-506-652-6350', 'Moving to Dieppe or Moncton', 'I currently live in Saint John, NB, but interested in moving to Moncton, NB.\\nI can move as soon as I get my case worker to transfer my files and documents.\\nCould you call me @ 1-506-652-6350', '2022-08-31 13:31:36'),
(20, 'contact', 0, 0, 0, 'ROLANDE LONG', 'rolandeviellong@hotmail.com', '15067354276', 'Membership', 'I have paid a membership before, I check and my Residence is not there. Please check and get back to me.  Did you received my transfer?  Residence Rolande Long. cell: 506 737-3909. Thanks  If not give me the e-transfer or the way to have\\nmy membership.  ', '2022-09-06 20:25:58'),
(21, 'residence', 0, 51, 51, 'Haydee Sainz', 'HAYDEESAINZ@hotmail.com', '(506) 259-9352', 'Cost', 'I would like to know how much it cost to be  a resident at your facility and what type of room do you have', '2022-09-09 15:40:57'),
(22, 'contact', 0, 0, 0, 'Loai Jaouni', 'loai.jaouni@gmail.com', '(506) 333-5537', 'Testing', 'Just testing, please let me know if you get this.', '2022-09-13 11:57:04'),
(23, 'contact', 0, 0, 0, 'Loai Jaouni', 'loai.jaouni@gmail.com', '5063335537', 'Test 2', 'Just another test, please let me know if you get this.', '2022-09-13 12:10:25'),
(24, 'contact', 0, 0, 0, 'Loai Jaouni', 'loai.jaouni@gmail.com', '15063335537', 'Test 3', 'Testing again.', '2022-09-13 12:12:16'),
(25, 'contact', 0, 0, 0, 'Loai Jaouni', 'loai.jaouni@gmail.com', '15063335537', 'Test 4', 'Test 4', '2022-09-13 12:13:16'),
(26, 'contact', 0, 0, 0, 'Loai Jaouni', 'loai.jaouni@gmail.com', '15063335537', 'Test 5', 'Test 5', '2022-09-13 12:15:14'),
(27, 'residence', 0, 45, 45, 'Loai Jaouni', 'loai.jaouni@gmail.com', '5063335537', 'Testing to Danielle\\\'s home', 'Just testing', '2022-09-13 13:18:52'),
(28, 'contact', 0, 0, 0, 'Elizabeth McLay', 'admin@alouettesch.ca', '5068579200', 'Unable to update', 'Hi,\\n\\nI am able to get logged into NBSCHA website and see our home. It will allow me to update vacancies but it does not allow me to update our description. \\n\\nThe following additional items should be checked:\\nWe do accept residents with incontinence. And we do have an indoor smoking area. \\n\\nOur description is:\\n\\n\\nAlouette Special Care Home is for adults with mental health illnesses such as ADHD, Anxiety, Bi-Polar, Depression, Personality Disorder and Schizophrenia. Services provided are:\\n&bull; Furnished resident rooms with bedding and towels \\n&bull; Wi-Fi and cable T.V.\\n&bull; Assistance with personal care and medications\\n&bull; Coordination of medical appointments and transportation \\n&bull; Meals and snacks following the Canada Food Guide\\n&bull; Onsite footcare and hairdressing\\n&bull; Housekeeping and laundry \\n&bull; Indoor Smoking Room \\n&bull; 10 Codiac Transit or 8 Wheelchair Guy tickets per month\\n&bull; Activities schedule\\n&bull; Annual Income Tax Clinic\\nThere are trails, parks, and a convenience store within a short walk. To inquire or arrange a tour please contact Denis LeBlanc at 863-9941.\\n', '2022-09-14 13:32:29'),
(29, 'residence', 0, 52, 52, 'Melissa ', 'melissa_keating@hotmailcom', '506 333-0433', 'Availability ', 'I looking for availability Oct 1st for my mother.', '2022-09-18 23:55:42'),
(30, 'residence', 0, 12, 12, 'Melissa', 'melissa_keating@hotmail.com', '506 333-0433', 'Availability ', 'Looking for availability as of Oct 1st for my mother', '2022-09-19 00:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `fid` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`fid`, `sort_order`, `status`, `delete_status`) VALUES
(1, 0, 1, 0),
(2, 0, 1, 0),
(3, 0, 1, 0),
(4, 0, 1, 0),
(5, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facilities_desc`
--

CREATE TABLE `facilities_desc` (
  `desc_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `facility_title` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facilities_desc`
--

INSERT INTO `facilities_desc` (`desc_id`, `facility_id`, `facility_title`, `language`) VALUES
(1, 1, 'Seniors', 'en'),
(2, 2, 'Mental Health', 'en'),
(3, 3, 'Intellectual and Developmental', 'en'),
(4, 4, 'Blended Facility', 'en'),
(5, 5, 'Test', 'en'),
(6, 1, 'Seniors', 'fr'),
(7, 2, 'Mental Health', 'fr'),
(8, 3, 'Intellectual and Developmental', 'fr'),
(9, 4, 'Blended Facility', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `sort_order`, `status`) VALUES
(1, 0, 1),
(2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs_desc`
--

CREATE TABLE `faqs_desc` (
  `desc_id` int(11) NOT NULL,
  `faq_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs_desc`
--

INSERT INTO `faqs_desc` (`desc_id`, `faq_id`, `question`, `answer`, `language`) VALUES
(1, 1, 'What questions should I ask operators when enquiring about a placement?', '<p class=\"mb-5\">\r\n	When enquiring about a placement, always make sure to ask essential questions before deciding. Here are some questions you should consider:</p>\r\n<p>\r\n	How will you help build life skills?</p>\r\n<p>\r\n	Do I have access to a telephone where I can speak in private?</p>\r\n<p>\r\n	Do I have access to the internet?</p>\r\n<p>\r\n	Are you able to provide me with a menu?</p>\r\n<p>\r\n	Will you be able to accommodate my special diet?</p>\r\n<p>\r\n	What time do you provide meals?</p>\r\n<p>\r\n	Do you have a bedtime or a quiet time?</p>\r\n<p>\r\n	What training does your staff have?</p>\r\n<p>\r\n	What activities do you offer?</p>\r\n<p>\r\n	When experiencing challenging behaviours from residents, how would operator/staff handle the situation?</p>\r\n<p>\r\n	How do you transport clients?</p>\r\n<p>\r\n	Is there local transportation handy to your home? Example: handi bus, transit buses or taxi</p>\r\n<p>\r\n	Will you transport to religious venues?</p>\r\n<p>\r\n	Do you have visiting hours or open door policy?</p>\r\n<p>\r\n	Can I visit my loved one privately in their room or only inn open common areas?</p>\r\n<p>\r\n	Will it be a single room or shared room?</p>\r\n<p>\r\n	Do you charge more than the government rate?</p>\r\n<p>\r\n	Do you provide cable in the bedrooms?</p>\r\n<p>\r\n	Do you have stairs in your building that I will have to use?</p>\r\n<p>\r\n	Can I bring my own personal belongings?</p>\r\n<p>\r\n	Can I put up my own pictures on the walls?</p>\r\n<p>\r\n	What furniture is provided in the bedroom?</p>\r\n<p>\r\n	Am i expected to purchase over the counter medications? Example: Tylenol for a headache?</p>\r\n', 'en'),
(2, 2, 'What are your next steps?', '<p class=\"mb-5\">\r\n	To access a full Long Term Care Assessment through Social Development, please gather your personal information together (address, medicare number, date of birth, etc.). Also, Call Social Development- 1-833-733-7835. Choose the option that says &quot;apply for long term care&quot;. Your information will be collected and the call will take approximately 10-15 minutes.</p>\r\n<p>\r\n	Within 5-10 days you should be contacted for an appointment and they will require additional financial information in order to complete your assessment and appoint you a Social Worker.</p>\r\n<p>\r\n	You will also be given a list of special care homes to call but our new website NBSCHA has a quick search method for the public. ( * PLEASE NOTE THESE HOMES ARE ALL MEMBERS OF OUR ASSOCIATION)</p>\r\n<p>\r\n	<b>Other Options:</b> You may already have an idea of which Special Care Home you would like to choose. If so, feel free to reach out to the operator for assistance with the assessment process. Our province also offers a <b>&quot;Private Pay&quot;</b> option for those persons who prefer not to access assistance through the Department of Social Development, but rather choose to pay for the care themselves. Additionally, your care needs may be temporary in nature, therefore you can reach out to your preferred facility and check the availability for a Relief/Respite and Convalescent Care bed. If you have a Social Worker already, this option can be as inexpensive as $10/day and you can stay for up to 30 days at a time or 90 days in a calendar year.</p>\r\n', 'en'),
(3, 1, 'Quelles questions devrais-je poser aux exploitants quand je m’informe au sujet d’un placement?', '<p class=\"mb-5\">\r\n	Quand vous vous informez au sujet d&rsquo;un placement, assurez-vous toujours de poser les questions essentielles avant de d&eacute;cider. Voici quelques questions que vous devriez envisager&nbsp;:</p>\r\n<p>\r\n	Ai-je acc&egrave;s &agrave; un t&eacute;l&eacute;phone o&ugrave; je peux parler en priv&eacute;?</p>\r\n<p>\r\n	Ai-je acc&egrave;s &agrave; Internet?</p>\r\n<p>\r\n	Pouvez-vous me fournir un menu?</p>\r\n<p>\r\n	Pourrez-vous tenir compte de mon r&eacute;gime alimentaire sp&eacute;cial?</p>\r\n<p>\r\n	&Agrave; quelle heure servez-vous les repas?</p>\r\n<p>\r\n	Avez-vous une heure du coucher ou une heure de silence?</p>\r\n<p>\r\n	Quelle est la formation de votre personnel?</p>\r\n<p>\r\n	Quelles activit&eacute;s offrez-vous?</p>\r\n<p>\r\n	Quand les comportements des pensionnaires sont difficiles, comment l&rsquo;exploitant ou le personnel g&egrave;re-t-il la situation?</p>\r\n<p>\r\n	Comment transportez-vous les clients?</p>\r\n<p>\r\n	Un transport local est-il facile &agrave; obtenir vers votre foyer? Exemples&nbsp;: Handi-Bus, autobus urbain ou taxi.</p>\r\n<p>\r\n	Transporterez-vous les gens aux services religieux?</p>\r\n<p>\r\n	Avez-vous des heures de visite ou une politique portes ouvertes?</p>\r\n<p>\r\n	Puis-je visiter les miens en priv&eacute; dans leur chambre, ou seulement dans les aires communes ouvertes?</p>\r\n<p>\r\n	Est-ce que ce sera une chambre simple ou une chambre &agrave; plusieurs?</p>\r\n<p>\r\n	Vos tarifs sont-ils plus &eacute;lev&eacute;s que ceux du gouvernement?</p>\r\n<p>\r\n	Offrez-vous le c&acirc;ble dans les chambres?</p>\r\n<p>\r\n	Avez-vous dans votre foyer des escaliers que je devrai prendre?</p>\r\n<p>\r\n	Puis-je apporter mes effets personnels?</p>\r\n<p>\r\n	Puis-je mettre mes propres photos sur les murs?</p>\r\n<p>\r\n	Quel mobilier est fourni dans la chambre?</p>\r\n<p>\r\n	Est-ce que je devrai acheter les m&eacute;dicaments sans ordonnance? Par exemple, du Tylenol pour un mal de t&ecirc;te?</p>\r\n', 'fr'),
(4, 2, 'Quelles sont vos prochaines étapes?', '<p class=\"mb-5\">\r\n	Pour obtenir de D&eacute;veloppement social une &eacute;valuation compl&egrave;te des soins de longue dur&eacute;e, veuillez rassembler vos renseignements personnels (adresse, num&eacute;ro d&rsquo;assurance-maladie, date de naissance, etc.). Aussi, appelez D&eacute;veloppement social au 1-833-733-7835. Choisissez l&rsquo;option qui dit de demander des services de soins de longue dur&eacute;e. Vos renseignements seront recueillis, et l&rsquo;appel prendra 10 &agrave; 15 minutes environ.</p>\r\n<p>\r\n	Dans un d&eacute;lai de 5 &agrave; 10 jours, on devrait s&rsquo;adresser &agrave; vous pour prendre rendez-vous, et on vous demandera des renseignements financiers additionnels afin de terminer votre &eacute;valuation et de vous d&eacute;signer un travailleur social.</p>\r\n<p>\r\n	On vous donnera aussi une liste de foyers de soins sp&eacute;ciaux &agrave; appeler, mais notre nouveau site Web de l&rsquo;AFSSNB a une m&eacute;thode de recherche rapide pour le public. ( * VEUILLEZ REMARQUER QUE CES FOYERS SONT TOUS MEMBRES DE NOTRE ASSOCIATION.)</p>\r\n<p>\r\n	<b>Autres options&nbsp;:</b> Vous avez peut-&ecirc;tre d&eacute;j&agrave; une id&eacute;e du foyer de soins sp&eacute;ciaux que vous voudriez choisir. Si c&rsquo;est le cas, n&rsquo;h&eacute;sitez pas &agrave; vous adresser &agrave; la direction pour avoir de l&rsquo;aide dans le processus d&rsquo;&eacute;valuation. Notre province offre aussi une option de &laquo;&nbsp;paiement priv&eacute;&nbsp;&raquo; aux personnes qui pr&eacute;f&egrave;rent ne pas obtenir de l&rsquo;aide du minist&egrave;re du D&eacute;veloppement social, mais choisissent plut&ocirc;t de payer elles-m&ecirc;mes les soins. De plus, vos besoins de soins peuvent avoir un caract&egrave;re temporaire; vous pouvez donc vous adresser &agrave; votre &eacute;tablissement pr&eacute;f&eacute;r&eacute; et v&eacute;rifier s&rsquo;il peut offrir un lit de soins de rel&egrave;ve et de soins de convalescence. Si vous avez d&eacute;j&agrave; un travailleur social, cette option peut &ecirc;tre aussi peu co&ucirc;teuse que 10&nbsp;$ par jour, et vous pouvez y rester jusqu&rsquo;&agrave; 30 jours &agrave; la fois ou 90 jours pendant une ann&eacute;e civile.</p>\r\n', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `fid` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`fid`, `sort_order`, `status`, `delete_status`) VALUES
(1, 1, 1, 0),
(2, 16, 1, 0),
(3, 3, 1, 0),
(4, 17, 1, 0),
(5, 10, 1, 0),
(6, 18, 1, 0),
(7, 4, 1, 0),
(8, 19, 1, 0),
(9, 5, 1, 0),
(10, 8, 1, 0),
(11, 6, 1, 0),
(12, 7, 1, 0),
(13, 9, 1, 0),
(14, 2, 1, 0),
(15, 11, 1, 0),
(16, 12, 1, 0),
(17, 13, 1, 0),
(18, 14, 1, 0),
(19, 15, 1, 0),
(20, 20, 1, 0),
(21, 21, 1, 0),
(22, 22, 1, 0),
(23, 23, 1, 0),
(24, 24, 1, 0),
(25, 25, 1, 0),
(26, 26, 1, 0),
(27, 27, 1, 0),
(28, 28, 1, 0),
(29, 29, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `features_desc`
--

CREATE TABLE `features_desc` (
  `desc_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `feature_title` varchar(400) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features_desc`
--

INSERT INTO `features_desc` (`desc_id`, `feature_id`, `feature_title`, `language`) VALUES
(1, 1, 'Can a resident bring their pet to live with them?', 'en'),
(2, 2, 'Do you allow residents to bring their own furniture?', 'en'),
(3, 3, 'Do you look after managing their comfort and clothing money?', 'en'),
(4, 4, 'Do you have in home hairdressing?', 'en'),
(5, 5, 'Do you have in home foot care?', 'en'),
(6, 6, 'Do staff have training in Diabetes and insulin management?', 'en'),
(7, 7, 'Do staff have training in Oxygen Therapy?', 'en'),
(8, 8, 'Do staff have training in Colostomy Care?', 'en'),
(9, 9, 'Do staff have training in Wound Care?', 'en'),
(10, 10, 'Do you accept residents that are incontinent of urine and/or bowels?', 'en'),
(11, 11, 'Do you accept clients that are MRSA positive?', 'en'),
(12, 12, 'Can clients keep their own family physicians?', 'en'),
(13, 13, 'Do you have a working relationship with extra mural nursing?', 'en'),
(14, 14, 'Do you provide excursions for your residents?', 'en'),
(15, 15, 'Do any of your residents work in the community?', 'en'),
(16, 16, 'Do you have an accessible shower or tub for persons in a wheelchair?', 'en'),
(17, 17, 'Do you provide references from your existing clients and/or their families?', 'en'),
(18, 18, 'Do you provide transportation to and from medical visits?', 'en'),
(19, 19, 'Do staff that administer medications have the required training?', 'en'),
(20, 20, 'Do staff have training in Dementia Care?', 'en'),
(21, 21, 'Do you have a monitoring system on the doors?', 'en'),
(22, 22, 'Do you have experience with clients suffering from addictions?', 'en'),
(23, 23, 'Do you have a doctor/nurse practitioner assigned to all residents?', 'en'),
(24, 24, 'Do you provide adaptive equipment for your residents?', 'en'),
(25, 25, 'Do any of your residents attend outreach programs?', 'en'),
(26, 26, 'Do you accommodate special diets i.e. gluten free, diabetic, etc.?', 'en'),
(27, 27, 'Do you have an outdoor area for sitting, walking, gardening, etc.?', 'en'),
(28, 28, 'Do You Accept Smokers And Provide A Designated Smoking Area?', 'en'),
(29, 29, 'Do you accept residents who are incontinent?', 'en'),
(30, 1, 'Un pensionnaire peut-il amener son animal familier vivre avec lui?', 'fr'),
(31, 3, 'Vous occupez-vous de gérer leur argent pour réconfort et vêtements?', 'fr'),
(32, 5, 'Avez-vous des soins des pieds sur place?', 'fr'),
(33, 7, 'Votre personnel a-t-il une formation en OxygénoThérapie?', 'fr'),
(34, 9, 'Votre personnel a-t-il une formation en Soin des Plaies?', 'fr'),
(35, 10, 'Acceptez-vous les clients qui ont une incontinence urinaire ou anale?', 'fr'),
(36, 11, 'Acceptez-vous les clients qui sont porteurs de SARM?', 'fr'),
(37, 12, 'Les clients peuvent-ils garder leurs médecins de famille?', 'fr'),
(38, 13, 'Avez-vous une relation de travail avec les soins infirmiers extramuraux?', 'fr'),
(39, 14, 'Offrez-vous des excursions à vos pensionnaires?', 'fr'),
(40, 15, 'Certains de vos pensionnaires travaillent-ils dans la collectivité?', 'fr'),
(41, 16, 'Avez-vous une douche ou une baignoire accessible aux personnes en fauteuil roulant?', 'fr'),
(42, 17, 'Fournissez-vous des recommandations de vos clients actuels ou de leurs familles?', 'fr'),
(43, 18, 'Offrez-vous le transport pour les visites médicales?', 'fr'),
(44, 19, 'Le personnel qui administre les médicaments a-t-il la formation requise?', 'fr'),
(45, 2, 'Permettez-vous aux pensionnaires d’apporter leur propre mobilier?', 'fr'),
(46, 4, 'Avez-vous des services de coiffure sur place?', 'fr'),
(47, 6, 'Votre personnel a-t-il une formation en gestion du Diabète et de l’Insuline?', 'fr'),
(48, 8, 'Votre personnel a-t-il une formation en soins de colostomie?', 'fr'),
(49, 20, 'Votre personnel a-t-il une formation en soins aux personnes atteintes de démence?', 'fr'),
(50, 21, 'Avez-vous un système de surveillance aux portes?', 'fr'),
(51, 22, 'Avez-vous de l’expérience avec des clients souffrant de dépendances?', 'fr'),
(52, 23, 'Avez-vous un médecin ou une infirmière praticienne affecté à tous les pensionnaires?', 'fr'),
(53, 24, 'Fournissez-vous de l’équipement adapté à vos pensionnaires?', 'fr'),
(54, 25, 'Certains de vos pensionnaires suivent-ils des programmes externes?', 'fr'),
(55, 26, 'Offrez-vous des régimes alimentaires spéciaux (sans gluten, pour diabétiques, etc.)?', 'fr'),
(56, 27, 'Avez-vous un espace extérieur où on peut s’asseoir, marcher, jardiner, etc.?', 'fr'),
(57, 28, 'Acceptez-vous les fumeurs, et offrez-vous une aire désignée pour fumeurs?', 'fr'),
(58, 29, 'Acceptez-vous des pensionnaires qui sont incontinents?', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `type`, `attachment`, `publish_date`, `status`) VALUES
(1, 'member', 'e87e469ca5714e0f2c328d784cac0bd1.pdf', '2022-03-23 04:00:00', 1),
(2, 'member', '9ca628cfba0a687a550a7a52f7c41799.pdf', '2022-03-23 04:00:00', 1),
(3, 'member', '5d96986946a707ccde0aade12f9312f3.pdf', '2022-06-10 04:00:00', 1),
(4, 'member', '363a1e728832e2d6f1b894c0a38aa809.pdf', '2022-06-10 04:00:00', 1),
(5, 'member', '3288e90e34b3f088799e29d1db32d20b.pdf', '2022-06-10 04:00:00', 1),
(6, 'member', '1a414e0b1c72cd48ce41eca3e606db4f.pdf', '2022-06-10 04:00:00', 1),
(7, 'member', '96503c21d08ebc5f9f5a89630330f385.pdf', '2022-06-10 04:00:00', 1),
(8, 'member', '742d6c4b130982bd953c9fec4020b5d4.pdf', '2022-06-10 04:00:00', 1),
(9, 'member', '27ba08cffa92ab7059bafb8123bd3655.pdf', '2022-06-10 04:00:00', 1),
(10, 'member', 'a8414f12ce8ec58d7fe7bd9929be93a2.pdf', '2022-06-10 04:00:00', 1),
(11, 'member', '08d5b97e6485bc997703b48a2af6283f.pdf', '2022-06-10 04:00:00', 1),
(12, 'member', '558c5eb1fcdcdfe292f283f10f7b19e0.pdf', '2022-06-10 04:00:00', 1),
(13, 'member', '0df1d614cc25d985a695edb80d23f936.pdf', '2022-06-10 04:00:00', 1),
(14, 'member', 'edd00354375010f43ac9578d452f4c6c.pdf', '2022-06-10 04:00:00', 1),
(15, 'member', 'f09c5d7c2fb01c38b828572e3c0ea1ce.pdf', '2022-06-10 04:00:00', 1),
(16, 'member', 'd3e7ef080c640f4753a40e62c777efae.pdf', '2022-06-10 04:00:00', 1),
(17, 'member', '0938a897bfb4ba19d176787573a754e7.pdf', '2022-06-10 04:00:00', 1),
(18, 'member', 'f47492ca2fcb1fabe4a9efe98ac1759c.pdf', '2022-06-10 04:00:00', 1),
(19, 'member', '1dc3ad08c054fad9a90a7826ec7a8f27.pdf', '2022-06-10 04:00:00', 1),
(20, 'member', '5d59fded14107dc1fa53dd33e8c96aa5.pdf', '2022-06-10 04:00:00', 1),
(21, 'member', '890945e705b396c8a89052718d6bf3d5.pdf', '2022-06-10 04:00:00', 1),
(22, 'member', 'b6bd3310fe94ddc1c2ffb7a2e9f6aa7d1.pdf', '2022-06-10 04:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forms_desc`
--

CREATE TABLE `forms_desc` (
  `desc_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forms_desc`
--

INSERT INTO `forms_desc` (`desc_id`, `form_id`, `name`, `language`) VALUES
(1, 1, 'Social Development Check Form for Staff', 'en'),
(2, 2, 'Oath of Confidentiality', 'en'),
(3, 1, 'Social Development Check Form for Staff', 'fr'),
(4, 2, 'Oath of Confidentiality', 'fr'),
(5, 3, 'Incident Report', 'en'),
(6, 3, 'Incident Report', 'fr'),
(7, 4, 'Medication consent form', 'en'),
(8, 4, 'Medication consent form', 'fr'),
(9, 5, 'Personal Record of Resident', 'en'),
(10, 5, 'Personal Record of Resident', 'fr'),
(11, 6, 'Financial Record', 'en'),
(12, 6, 'Financial Record', 'fr'),
(13, 7, 'Report of Death', 'en'),
(14, 7, 'Report of Death', 'fr'),
(15, 8, 'Membership Renewal Form * lawtons and sobeys members are renewed automatically', 'en'),
(16, 8, 'Membership Renewal Form * lawtons and sobeys members are renewed automatically', 'fr'),
(17, 9, 'Foot Care Form', 'en'),
(18, 9, 'Foot Care Form', 'fr'),
(19, 10, 'Ostomy and Incontinence Supplies Form', 'en'),
(20, 10, 'Ostomy and Incontinence Supplies Form', 'fr'),
(21, 11, 'Diabetic Supplies', 'en'),
(22, 12, 'Medicare Form', 'en'),
(23, 12, 'Medicare Form', 'fr'),
(24, 13, 'Non Diabetic Foot care form', 'en'),
(25, 13, 'Non Diabetic Foot care form', 'fr'),
(26, 14, 'Birth Certificate Application', 'en'),
(27, 14, 'Birth Certificate Application', 'fr'),
(28, 15, 'COVID 19 MANAGEMENT GUIDE', 'en'),
(29, 15, 'COVID 19 MANAGEMENT GUIDE', 'fr'),
(30, 16, 'Criminal record Check Form', 'en'),
(31, 16, 'Criminal record Check Form', 'fr'),
(32, 17, 'Criminal record check letter', 'en'),
(33, 17, 'Criminal record check letter', 'fr'),
(34, 18, 'Canada Pension Plan Form', 'en'),
(35, 19, 'Apply for Old Age Security / Guaranteed Income Supplement', 'en'),
(36, 19, 'Apply for Old Age Security / Guaranteed Income Supplement', 'fr'),
(37, 20, 'Group Benefits with NBSCHA', 'en'),
(38, 20, 'Group Benefits with NBSCHA', 'fr'),
(39, 21, 'Low income seniors benefit 2021', 'en'),
(40, 22, 'Lab Requisition form ', 'en'),
(41, 22, 'Lab Requisition form ', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `home_languages`
--

CREATE TABLE `home_languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_languages`
--

INSERT INTO `home_languages` (`id`, `name`, `status`) VALUES
(1, 'English', 1),
(2, 'French', 1),
(3, 'Bilingual', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `label` varchar(100) NOT NULL,
  `class` varchar(300) NOT NULL,
  `code` varchar(10) NOT NULL,
  `default_language` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `label`, `class`, `code`, `default_language`, `status`) VALUES
(1, 'English', 'ENG', '', 'en', 1, 1),
(2, 'French', 'FRA', '', 'fr', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `type`, `image`, `sort_order`, `status`) VALUES
(1, 'public', '', 0, 1),
(2, 'public', '', 0, 1),
(3, 'public', '', 0, 1),
(4, 'public', '', 0, 1),
(5, 'member', '', 0, 1),
(6, 'member', '', 0, 1),
(7, 'member', '', 0, 1),
(8, 'member', '', 0, 1),
(9, 'member', '', 0, 1),
(10, 'member', '', 0, 1),
(11, 'member', '', 0, 1),
(12, 'member', '', 0, 1),
(13, 'member', '', 0, 1),
(14, 'member', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links_desc`
--

CREATE TABLE `links_desc` (
  `desc_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` text,
  `link_url` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links_desc`
--

INSERT INTO `links_desc` (`desc_id`, `link_id`, `name`, `summary`, `link_url`, `language`) VALUES
(1, 1, 'Department of Social Development', '<p>\r\n	Great resource for youth, families, seniors and persons w/disabilities.&nbsp;</p>\r\n', 'https://www.gnb.ca/socialdevelopment', 'en'),
(2, 2, 'Government of New Brunswick', '<p>\r\n	Find out the latest news, information and links pertaining to the New Brunswick Government.</p>\r\n', 'https://www.gnb.ca/', 'en'),
(3, 3, 'Workplace Health and Safety', '<p>\r\n	A great resource for workers and employers from Workplace health &amp;amp; Safety. As well as all the latest news and updates.</p>\r\n', 'https://www.worksafenb.ca/', 'en'),
(4, 4, 'Pay Equity Act', '<p>\r\n	Full Pay Equity Act publication posted by the Justice and Office of the Attorney General.</p>\r\n', 'http://laws.gnb.ca/en/showfulldoc/cs/P-5.05//20210114', 'en'),
(5, 5, 'Infirm Persons Act', '<p>\r\n	Infirm Persons Act</p>\r\n', 'https://www.canlii.org/en/nb/laws/stat/rsnb-1973-c-i-8/latest/rsnb-1973-c-i-8.html', 'en'),
(6, 6, 'Family Income Security Act and Reg', '<p>\r\n	Family Income Security Act and Reg</p>\r\n', 'https://www.canlii.org/en/nb/laws/stat/snb-1994-c-f-2.01/latest/snb-1994-c-f-2.01.html', 'en'),
(7, 7, 'Smoke Free Places Act', '<p>\r\n	Smoke Free Places Act</p>\r\n', 'https://www.gnb.ca/legis/bill/editform-e.asp?ID=296&legi=55&num=1', 'en'),
(8, 8, 'Human Rights Act	', 'Human Rights Act', 'https://www2.gnb.ca/content/gnb/en/departments/nbhrc.html', 'en'),
(9, 9, 'Occupational Health and Safety Act and Regulation	', '<p>\r\n	Occupational Health and Safety Act and Regulation</p>\r\n', 'http://laws.gnb.ca/en/ShowPdf/cs/O-0.2.pdf', 'en'),
(10, 10, 'Employment standards Act', '<p>\r\n	Employment standards Act</p>\r\n', 'http://laws.gnb.ca/en/ShowTdm/cs/E-7.2//', 'en'),
(11, 11, 'Adult Residential Facility Standards', '<p>\r\n	Adult Residential Facility Standards</p>\r\n', 'https://www2.gnb.ca/content/dam/gnb/Departments/sd-ds/pdf/Standards/AdultResidential-e.pdf', 'en'),
(12, 12, 'Mental Health Act', '<p>\r\n	Mental Health Act</p>\r\n', 'https://https//www.canlii.org/en/nb/laws/stat/rsnb-1973-c-m-10/latest/rsnb-1973-c-m-10.html/en/nb/laws/stat/rsnb-1973-c-m-10/latest/rsnb-1973-c-m-10.html', 'en'),
(13, 13, 'Fire Prevention Act', '<p>\r\n	Fire Prevention Act</p>\r\n', 'https://www.canlii.org/en/nb/laws/regu/nb-reg-82-20/latest/nb-reg-82-20.html', 'en'),
(14, 14, 'Health Act', '<p>\r\n	Health Act</p>\r\n', 'https://www.canada.ca/en/health-canada/services/health-care-system/canada-health-care-system-medicare/canada-health-act.html', 'en'),
(15, 1, 'Ministère du Développement Social', '<p>\r\n	Excellente ressource pour les jeunes, les familles, les personnes âgées et les personnes ayant des handicaps.. </p>\r\n', 'https://www.gnb.ca/socialdevelopment', 'fr'),
(16, 2, 'Gouvernement du Nouveau-Brunswick', '<p>\r\n	Découvrez les dernières nouvelles, l’information et les liens qui concernent le gouvernement du Nouveau-Brunswick..</p>\r\n', 'https://www.gnb.ca/', 'fr'),
(17, 3, 'Travail Sécuritaire (N.-B.)', '<p>\r\n	Une excellente ressource sur la santé et la sécurité au travail pour les travailleurs et les employeurs. On y trouve aussi toutes les dernières nouvelles.</p>\r\n', 'https://www.worksafenb.ca/', 'fr'),
(18, 4, 'Loi de 2009 sur l\'équité salariale', '<p>\r\n	Texte intégral de la Loi de 2009 sur l’équité salariale, affiché par le ministère de la Justice et le Cabinet du procureur général.</p>\r\n', 'http://laws.gnb.ca/en/showfulldoc/cs/P-5.05//20210114', 'fr'),
(19, 5, 'Infirm Persons Act', '<p>\r\n	Infirm Persons Act</p>\r\n', 'https://www.canlii.org/en/nb/laws/stat/rsnb-1973-c-i-8/latest/rsnb-1973-c-i-8.html', 'fr'),
(20, 6, 'Family Income Security Act and Reg', '<p>\r\n	Family Income Security Act and Reg</p>\r\n', 'https://www.canlii.org/en/nb/laws/stat/snb-1994-c-f-2.01/latest/snb-1994-c-f-2.01.html', 'fr'),
(21, 7, 'Smoke Free Places Act', '<p>\r\n	Smoke Free Places Act</p>\r\n', 'https://www.gnb.ca/legis/bill/editform-e.asp?ID=296&legi=55&num=1', 'fr'),
(22, 8, 'Human Rights Act	', 'Human Rights Act', 'https://www2.gnb.ca/content/gnb/en/departments/nbhrc.html', 'fr'),
(23, 9, 'Occupational Health and Safety Act and Regulation	', '<p>\r\n	Occupational Health and Safety Act and Regulation</p>\r\n', 'http://laws.gnb.ca/en/ShowPdf/cs/O-0.2.pdf', 'fr'),
(24, 10, 'Employment standards Act', '<p>\r\n	Employment standards Act</p>\r\n', 'http://laws.gnb.ca/en/ShowTdm/cs/E-7.2//', 'fr'),
(25, 11, 'Adult Residential Facility Standards', '<p>\r\n	Adult Residential Facility Standards</p>\r\n', 'https://www2.gnb.ca/content/dam/gnb/Departments/sd-ds/pdf/Standards/AdultResidential-e.pdf', 'fr'),
(26, 12, 'Mental Health Act', '<p>\r\n	Mental Health Act</p>\r\n', 'https://https//www.canlii.org/en/nb/laws/stat/rsnb-1973-c-m-10/latest/rsnb-1973-c-m-10.html/en/nb/laws/stat/rsnb-1973-c-m-10/latest/rsnb-1973-c-m-10.html', 'fr'),
(27, 13, 'Fire Prevention Act', '<p>\r\n	Fire Prevention Act</p>\r\n', 'https://www.canlii.org/en/nb/laws/regu/nb-reg-82-20/latest/nb-reg-82-20.html', 'fr'),
(28, 14, 'Health Act', '<p>\r\n	Health Act</p>\r\n', 'https://www.canada.ca/en/health-canada/services/health-care-system/canada-health-care-system-medicare/canada-health-act.html', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `localization`
--

CREATE TABLE `localization` (
  `id` int(11) NOT NULL,
  `lang_key` text NOT NULL,
  `lang_value` text NOT NULL,
  `language` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `localization`
--

INSERT INTO `localization` (`id`, `lang_key`, `lang_value`, `language`) VALUES
(1, 'SITE_NAME', 'The New Brunswick Special Care Home Association', 'en'),
(2, 'SITE_NAME', 'L\'Association des foyers de soins spéciaux du Nouveau-Brunswick', 'fr'),
(3, 'SITE_SOLGAN', 'We promote and develop awareness throughout New Brunswick of the great service our special care homes provide.', 'en'),
(4, 'SITE_SOLGAN', 'The New Brunswick Special Care Home Association Slogan French 2', 'fr'),
(5, 'HEADER_CALLUS', 'Call Us at', 'en'),
(6, 'LATEST_NEWS', 'Latest News', 'en'),
(7, 'RESOURCES', 'Resources', 'en'),
(8, 'QUICK_CONTACT', 'Quick Contact', 'en'),
(9, 'WANT_TO_HEAR', 'Want To Hear From Us?', 'en'),
(10, 'COPYRIGHT', 'Copyright', 'en'),
(11, 'RIGHTS_RESERVED', 'All Rights Reserved', 'en'),
(12, 'HEADER_CALLUS', 'Appelez-nous au', 'fr'),
(13, 'LATEST_NEWS', 'Dernières nouvelles', 'fr'),
(14, 'RESOURCES', 'Ressources', 'fr'),
(15, 'QUICK_CONTACT', 'Contact rapide', 'fr'),
(16, 'WANT_TO_HEAR', 'Vous voulez avoir de nos nouvelles?', 'fr'),
(17, 'COPYRIGHT', 'Tous droits réservés', 'fr'),
(18, 'RIGHTS_RESERVED', ' ', 'fr'),
(19, 'ABOUT_ME', 'About Me', 'en'),
(20, 'LOCATION', 'Location', 'en'),
(21, 'CONTACT', 'Contact', 'en'),
(22, 'PHONE', 'Phone', 'en'),
(23, 'EMAIL', 'Email', 'en'),
(24, 'ENTER_NAME', 'Enter Name', 'en'),
(25, 'ENTER_EMAIL', 'Enter Email', 'en'),
(26, 'ENTER_SUBJECT', 'Enter Subject', 'en'),
(27, 'ENTER_MESSAGE', 'Enter Message', 'en'),
(28, 'PLEASE_WAIT', 'Please wait...', 'en'),
(29, 'SEND_YOUR_MESSAGE', 'Send your message', 'en'),
(30, 'ABOUT_ME', 'About Me', 'fr'),
(31, 'CONTACT', 'Contact', 'fr'),
(32, 'PHONE', 'Phone', 'fr'),
(33, 'EMAIL', 'Email', 'fr'),
(34, 'ENTER_NAME', 'Enter Name', 'fr'),
(35, 'ENTER_EMAIL', 'Enter Email', 'fr'),
(36, 'ENTER_SUBJECT', 'Entrez le sujet', 'fr'),
(37, 'ENTER_MESSAGE', 'Entrer un message', 'fr'),
(38, 'PLEASE_WAIT', 'S\'il vous plaît, attendez...', 'fr'),
(39, 'SEND_YOUR_MESSAGE', 'Envoyez votre message', 'fr'),
(40, 'C_NAME', 'Contact Name', 'fr'),
(41, 'C_EMAIL', 'Email', 'fr'),
(42, 'C_PHONE', 'Téléphoner', 'fr'),
(43, 'C_REGION', 'Région ', 'fr'),
(44, 'C_POST', 'Code postal', 'fr'),
(45, 'C_LEVEL', 'Niveau de soins  ', 'fr'),
(46, 'C_BED', 'Lits  ', 'fr'),
(47, 'C_PHARMACY', 'Pharmacie', 'fr'),
(48, 'C_FACILITY', 'Établissement ', 'fr'),
(49, 'C_FEATURES', 'Caractéristiques des services', 'fr'),
(50, 'C_CAPACITY', 'Capacité', 'fr'),
(51, 'C_LICBED', 'Licensed Beds', 'fr'),
(52, 'C_VACANCY', 'Current Vacancy', 'fr'),
(53, 'C_ASK', 'Ask a question?', 'fr'),
(54, 'ENTER_PHONE', 'Enter Phone', 'fr'),
(55, 'SEND_MESSAGE', 'Send your message', 'fr'),
(56, 'RESET', 'REDÉMARRAGE', 'fr'),
(57, 'SOCIAL_NETWORK', 'Social Network', 'fr'),
(58, 'POST_HOME_MESSAGE', 'Publicisez Votre Foyer De Soins Spéciaux À L’AFSSNB <span style=\"color:#CD291D;font-family: PermanentMarker;\"><b style=\"font-weight: 800;\">Aujourd\'hui!</b></span>', 'fr'),
(59, 'POST_HOME_BODY', '<p class=\"text-2 mb-0 appear-animation animated maskUp appear-animation-visible\" data-appear-animation=\"maskUp\" data-appear-animation-delay=\"1000\" style=\"animation-delay: 1000ms; font-size: 17px!important; color: #000;\"> Aimeriez-vous être ajouté au répertoire des foyers de soins spéciaux du Nouveau-Brunswick?</p><br>\r\n                  <p style=\"margin-bottom: 0px; font-size: 17px; color: #000;\">\r\n                      *<b>Remplissez les champs ci-dessous, et surtout ceux qui ont un astérisque (*), car ce sont des champs obligatoires, et vous ne serez pas entièrement enregistrée sans ces points obligatoires.</b></p>\r\n                  <p style=\"font-size: 17px; color: #000;\">Une fois que vous aurez cliqué le bouton  <b style=\"font-weight: 800; color: red\">“SOUMETTRE”</b> nous vous enverrons un courriel de confirmation aussitôt que le paiement aura été reçu, et votre résidence aura été ajoutée officiellement à notre site Web.\r\n                  </p>', 'fr'),
(60, 'FILL FORM', 'REMPLISSEZ LE FORMULAIRE CI-DESSOUS', 'fr'),
(61, 'FILL_FORM_TAGLINE', 'FAITES PARTIE DE NOTRE COMMUNAUTÉ EN LIGNE!', 'fr'),
(62, 'FIRST_NAME', 'First Name', 'fr'),
(63, 'LAST_NAME', 'Last Name', 'fr'),
(64, 'EMAIL_ADDRESS', 'Email', 'fr'),
(65, 'PHONE_NUMBER', 'Phone Number', 'fr'),
(66, 'PASSWORD', 'Password', 'fr'),
(67, 'CONFIRM_PASSWORD', 'Confirm Password', 'fr'),
(68, 'FILL_FORM', 'REMPLISSEZ LE FORMULAIRE CI-DESSOUS', 'fr'),
(69, 'ADD_CARE_HOME', 'AJOUTEZ DES DÉTAILS SUR VOTRE FOYER DE SOINS SPÉCIAUX!', 'fr'),
(70, 'HOME_NAME', 'Special Care Home Name', 'fr'),
(71, 'HOME_ADDRESS', 'Special Care Home Address', 'fr'),
(72, 'HOME_POST', 'Special Care Home Postal Code', 'fr'),
(73, 'HOME_CONTACT_PERSON', 'Special Care Home Contact Person', 'fr'),
(74, 'HOME_CONTACT_EMAIL', 'Special Care Home Email', 'fr'),
(75, 'HOME_CONTACT_PHONE', 'Special Care Home Phone', 'fr'),
(76, 'HOME_CONTACT_FAX', 'Special Care Home Fax', 'fr'),
(77, 'HOME_SELECT_BED', 'Select Number of Beds', 'fr'),
(78, 'HOME_MAXIMUM_BED', 'Maximum Licensed Beds', 'fr'),
(79, 'HOME_SELECT_CARELEVEL', 'Select Level of Care', 'fr'),
(80, 'HOME_SELECT_LANGUAGE', 'Select Language(s)', 'fr'),
(81, 'HOME_SELECT_REGION', 'Select Région', 'fr'),
(82, 'HOME_PHARMACY', 'Special Care Home Pharmacy Name', 'fr'),
(83, 'HOME_DESCRIPTION', 'Description of Home and Services to the Public', 'fr'),
(84, 'NOTES_ADMIN', 'Notes/Comments for Admin', 'fr'),
(85, 'UPLOAD_IMAGE', 'Télécharger L’image Principale*', 'fr'),
(86, 'UPLOAD_IMAGE2', 'Télécharger La 2e Image', 'fr'),
(87, 'UPLOAD_IMAGE3', 'Télécharger La 3e Image', 'fr'),
(88, 'UPLOAD_IMAGE4', 'Télécharger La 4e Image', 'fr'),
(89, 'UPLOAD_IMAGE5', 'Télécharger La 5e Image', 'fr'),
(90, 'UPLOAD_IMAGE6', 'Télécharger La 6e Image', 'fr'),
(91, 'VIRTUAL_TOUR', 'Virtual Tour (Youtube Link)', 'fr'),
(92, 'FB_LINK', 'Facebook link', 'fr'),
(93, 'INSTA_LINK', 'Instagram link', 'fr'),
(94, 'TW_LINK', 'Twitter link', 'fr'),
(95, 'YT_LINK', 'YouTube link', 'fr'),
(96, 'LI_LINK', 'LinkedIn link', 'fr'),
(97, 'WEB_LINK', 'Website link', 'fr'),
(98, 'BOXES_INSTRUCTION', '<h4>COCHER LES CASES SI VOUS RÉPONDEZ <b><u>OUI</u></b> À L’UNE DES QUESTIONS SUIVANTES :</h4>', 'fr'),
(99, 'YEARLY_FEES', 'Yearly Membership Fees', 'fr'),
(100, 'CHOSE_PAYMENT', 'PRIÈRE DE CHOISIR VOTRE OPTION DE PAIEMENT PRÉFÉRÉE :', 'fr'),
(101, 'SELECT', 'Sélectionner', 'fr'),
(102, 'PAYMENT_INFO', 'Payment Info', 'fr'),
(103, 'FINISHED_SUBMIT', 'Finished/Submit', 'fr'),
(104, 'POST_HOME_MESSAGE', 'Showcase Your Special Care Home with NBSCHA <span style=\"color:#CD291D;font-family: PermanentMarker;\"><b style=\"font-weight: 800;\">Today!</b></span>', 'en'),
(105, 'POST_HOME_BODY', '<p class=\"text-2 mb-0 appear-animation animated maskUp appear-animation-visible\" data-appear-animation=\"maskUp\" data-appear-animation-delay=\"1000\" style=\"animation-delay: 1000ms; font-size: 17px!important; color: #000;\"> Would you like to be added to the New Brunswick Special Care Home Directory?</p><br>\r\n                  <p style=\"margin-bottom: 0px; font-size: 17px; color: #000;\">\r\n                      *<b>Please fill out the fields below, especially all fields that have a (*) as these are mandatory fields and you will not be fully registered without these mandatory items.</b></p>\r\n                  <p style=\"font-size: 17px; color: #000;\">Once you have clicked the <b style=\"font-weight: 800; color: red\">“SUBMIT”</b> button we will send you a confirmation email as soon as payment has been received and your residence was officially added to our website.\r\n                  </p>', 'en'),
(106, 'FILL FORM', 'FILL IN FORM BELOW', 'en'),
(107, 'FILL_FORM_TAGLINE', 'BE PART OF OUR ONLINE COMMUNITY!', 'en'),
(108, 'FIRST_NAME', 'First Name', 'en'),
(109, 'LAST_NAME', 'Last Name', 'en'),
(110, 'EMAIL_ADDRESS', 'Email', 'en'),
(111, 'PHONE_NUMBER', 'Phone Number', 'en'),
(112, 'PASSWORD', 'Password', 'en'),
(113, 'CONFIRM_PASSWORD', 'Confirm Password', 'en'),
(114, 'FILL_FORM', 'FILL IN FORM BELOW', 'en'),
(115, 'ADD_CARE_HOME', 'Add Special Care Home Details!', 'en'),
(116, 'HOME_NAME', 'Special Care Home Name', 'en'),
(117, 'HOME_ADDRESS', 'Special Care Home Address', 'en'),
(118, 'HOME_POST', 'Special Care Home Postal Code', 'en'),
(119, 'HOME_CONTACT_PERSON', 'Special Care Home Contact Person', 'en'),
(120, 'HOME_CONTACT_EMAIL', 'Special Care Home Email', 'en'),
(121, 'HOME_CONTACT_PHONE', 'Special Care Home Phone', 'en'),
(122, 'HOME_CONTACT_FAX', 'Special Care Home Fax', 'en'),
(123, 'HOME_SELECT_BED', 'Select Number of Beds', 'en'),
(124, 'HOME_MAXIMUM_BED', 'Maximum Licensed Beds', 'en'),
(125, 'HOME_SELECT_CARELEVEL', 'Select Level of Care', 'en'),
(126, 'HOME_SELECT_LANGUAGE', 'Select Language(s)', 'en'),
(127, 'HOME_SELECT_REGION', 'Select Region', 'en'),
(128, 'HOME_PHARMACY', 'Special Care Home Pharmacy Name', 'en'),
(129, 'HOME_DESCRIPTION', 'Description of Home and Services to the Public', 'en'),
(130, 'NOTES_ADMIN', 'Notes/Comments for Admin', 'en'),
(131, 'UPLOAD_IMAGE', 'Upload Main Image', 'en'),
(132, 'UPLOAD_IMAGE2', 'Upload 2nd Image', 'en'),
(133, 'UPLOAD_IMAGE3', 'Upload 3rd Image', 'en'),
(134, 'UPLOAD_IMAGE4', 'Upload 4th Image', 'en'),
(135, 'UPLOAD_IMAGE5', 'Upload 5th Image', 'en'),
(136, 'UPLOAD_IMAGE6', 'Upload 6th Image', 'en'),
(137, 'VIRTUAL_TOUR', 'Virtual Tour (Youtube Link)', 'en'),
(138, 'FB_LINK', 'Facebook link', 'en'),
(139, 'INSTA_LINK', 'Instagram link', 'en'),
(140, 'TW_LINK', 'Twitter link', 'en'),
(141, 'YT_LINK', 'YouTube link', 'en'),
(142, 'LI_LINK', 'LinkedIn link', 'en'),
(143, 'WEB_LINK', 'Website link', 'en'),
(144, 'BOXES_INSTRUCTION', '<h4>Please check the boxes if you answer <b><u>YES</u></b> to any of the following questions:</h4>', 'en'),
(145, 'YEARLY_FEES', 'Yearly Membership Fees', 'en'),
(146, 'CHOSE_PAYMENT', 'Please chose your Preferred payment option', 'en'),
(147, 'SELECT', 'Select', 'en'),
(148, 'PAYMENT_INFO', 'Payment Info', 'en'),
(149, 'FINISHED_SUBMIT', 'Finished/Submit', 'en'),
(150, 'READ_MORE', 'En savoir plus', 'fr'),
(151, 'POSTED_BY', 'affiché par', 'fr'),
(152, 'CATEGORIES', 'Catégories', 'fr'),
(153, 'NO_NEWS', 'Aucune actualité à afficher', 'fr'),
(154, 'NO_NEWS', 'No news items to display', 'en'),
(155, 'CATEGORIES', 'Categories', 'en'),
(156, 'C_NAME', 'Contact Name', 'en'),
(157, 'C_EMAIL', 'Email', 'en'),
(158, 'C_PHONE', 'Phone', 'en'),
(159, 'C_REGION', 'Region', 'en'),
(160, 'C_POST', 'Postal Code', 'en'),
(161, 'C_LEVEL', 'Level of Care', 'en'),
(162, 'C_BED', 'Bed', 'en'),
(163, 'C_PHARMACY', 'Pharmacy', 'en'),
(164, 'C_FACILITY', 'Facility', 'en'),
(165, 'C_FEATURES', 'Features of Services', 'en'),
(166, 'C_CAPACITY', 'Capacity', 'en'),
(167, 'C_LICBED', 'Licensed Beds', 'en'),
(168, 'C_VACANCY', 'Current Vacancy', 'en'),
(169, 'C_ASK', 'Ask a question?', 'en'),
(170, 'ENTER_PHONE', 'Enter Phone', 'en'),
(171, 'SEND_MESSAGE', 'Send your message', 'en'),
(172, 'RESET', 'Reset', 'en'),
(173, 'SOCIAL_NETWORK', 'Social Network', 'en'),
(174, 'C_LANGUAGE', 'Language(s)', 'en'),
(175, 'C_LANGUAGE', 'Langue(s)', 'fr'),
(176, 'READ_MORE', 'Read More', 'en'),
(177, 'POSTED_BY', 'posted by', 'en'),
(178, 'C_FAX', 'Fax', 'en'),
(179, 'C_VTOUR', 'Virtual Tour', 'en'),
(180, 'C_FAX', 'Fax', 'fr'),
(181, 'C_VTOUR', 'Tour virtuel', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `first_name`, `last_name`, `password`, `salt`, `email`, `phone`, `status`, `created`, `delete_status`) VALUES
(1, 'Jan', 'Seely', '2e3d23c280a2a46f65b07cf2ef9e6f4eae96b0e5', 'RbgCzG', 'janseely@rogers.com', '5066394478', 1, '2020-10-22 20:00:21', 0),
(2, 'Georgina', 'Hubbard', 'd9187b00c845b25ba00927e2824e27e231379730', 'buRBji', 'gmhubb1@gmail.com', '506-961-4397', 1, '2020-11-13 21:59:45', 0),
(3, 'Jennifer', 'Eagan', '6ce3f89fe75873f083d2a8497b0bbdc547623e73', 'aypKNP', 'jen@eagan.ca', '5062739394', 1, '2020-11-13 22:03:12', 0),
(4, 'Miluska', 'Hessen Walton', '7fc586bab43b91be18ff7eac87c804e6734a2edf', 'O3JkTy', 'miluskahwalton@gmail.com', '(506)444-1166', 1, '2020-11-13 22:22:26', 0),
(5, 'Elizabeth', 'McLay', '3b8a10a2e0690ed73413b5e1aac2622ebd0784a8', '40ZnSo', 'administration@alouetteresidence.ca', '5068579200', 1, '2020-11-13 22:29:50', 0),
(6, 'Kim', 'Davis', '69451ae975a80814f2a842d811d9db97d6000d80', 'D3hd5Q', 'kdavis@shannex.com', '15066477953', 1, '2020-11-13 22:50:06', 0),
(7, 'Mary', 'Phillips', '8a6393cd42ee3960537954eff92f55c311d96e52', 'tCUpA6', 'maryjane-ox@hotmail.com', '15068719326', 1, '2020-11-13 23:03:05', 0),
(8, 'Cindy ', ' Leavitt', '62a88545fd5e20465dd83aa970f08b2496c3d3cc', 'WslFZA', 'cleavitt@lochlomondvilla.com', '5066437174', 1, '2020-11-13 23:22:37', 0),
(9, 'Christine', 'Saunders', '5ce3237987beaaf6892b18cdd98be86dee81fffe', 'etla3B', 'paradisevilla.cs1@gmail.com', '506-443-8000', 1, '2020-11-14 00:01:15', 0),
(10, 'Darlene', 'Mazerolle', 'e8cc0a2caddb60d1508c3729803935d732ac4058', 'kqHbE2', 'd_mazerolle96@hotmail.com', '5068690624', 1, '2020-11-14 00:33:53', 0),
(11, 'Krissy', 'Travis', '9866addc1c7fb1d69cef357d164d4a6ba859eefa', 'JaZHFR', 'Krissy5646@gmail.com', '5063337507', 0, '2020-11-14 03:22:13', 1),
(12, 'Jennifer', 'Paul Armstrong', '121dd29735ac865ab8203084b523f08d34324845', '3lEcS9', 'jennlynnpaul@hotmail.com', '5066392424', 1, '2020-11-15 03:39:27', 0),
(13, 'Sara', 'Williston', '9eb965a80a92784f349b308d15fd35d7f0953070', '7ZMHUa', 'riverbendresidence@hotmail.com', '506-352-0137', 1, '2020-11-16 06:02:20', 0),
(14, 'Fran', 'Cooke', '2c9d2afa75614881e52e7802f056a49f9ebf4880', 'orvgK2', 'agapehome@bellaliant.com', '5068325935', 1, '2020-11-16 23:48:55', 0),
(15, 'Pamela', 'Bowen', '901f9e09dcdf226cef6a9ec2ac33b797840e6007', 'ACy09J', 'pbowen@shannex.com', '5064557275', 1, '2020-11-17 02:00:04', 0),
(16, 'Lucie', 'Boudreau', '4373371d27b2cd2fda15dbef62c4d1c0ee509f6c', 'YKrSAb', 'balancedwellnesscenter@gmail.com', '506-850-8851', 1, '2020-11-17 19:36:03', 0),
(17, 'Katrina', 'Drost', 'ce49a90d30d23530577bc3fd6f3aa33abcabbe7a', 'wsYGB5', 'katrina.4.boys@hotmail.com', '506 977 4286', 1, '2020-11-18 10:23:28', 0),
(18, 'Cristie', 'Dykeman', '68646c8a724b83c5f8d21be79663d71d1552f9c6', '60EkCS', 'slowcurrentspecialcarehome@gmail.com', '5064400654', 1, '2020-11-19 06:49:57', 0),
(19, 'Mary', 'Cormier', 'a6ddbeab1624bc8b1f076a98d14dd81d5e0b0163', 'XPFwT9', 'cottage.53@hotmail.ca', '5065482534', 1, '2020-11-19 20:51:03', 0),
(20, 'Sarah', 'Jenkins', '0cbb15b97b9f11f21a17624975686301a6377d2d', '4umcpZ', 'sarah.jenkins1@nbed.nb.ca', '5064719400', 1, '2020-11-22 04:05:59', 0),
(21, 'Crystal', 'Powell', '843232ece71129e432aa137601484691e44aa116', 'HF5tVs', 'kathleen11251@gmail.com', '15066474087', 1, '2020-11-26 00:20:39', 0),
(22, 'Susan', 'VanWart', '072a94741cbd12f7afcdda3ff51dd7093bcc51cc', 'FMxXv2', 'susanmvanwart@gmail.com', '506 476-7879', 1, '2020-11-27 23:58:39', 0),
(23, 'Danielle', 'DeAgazio', '85c1532c99d005cf5f67b9006685a958233f11c6', 'Ir6bCL', 'info@protem.ca', '5068749652', 1, '2020-11-28 00:40:38', 0),
(24, 'John', 'Grass', 'ef03db7ab39436fce97f5c7eda5d6b7b88254c11', 'otUOZW', 'jgrass1213@rogers.com', '15068723340', 1, '2020-11-28 01:26:27', 0),
(25, 'Charlene', 'Noye', '4aa2a0cce2285d2dac23468043f91237d732d111', 'SEVlxF', 'charlenenoye@outlook.com', '5067592773', 1, '2020-11-28 04:10:32', 0),
(26, 'Lisa', 'Melanson', '01c854d9c023fbe54fa20ea95d66a8f402e98829', 'VKlyDX', 'jklm2k2@hotmail.com', '506-650-3807', 1, '2020-11-28 04:35:26', 0),
(27, 'Kelly', 'Briggs', '7e1a9fdcbc1509eb9b5d91cc5f8174b61cfcee15', '8fdBoP', 'Kellybriggs12@live.ca', '5063275041', 1, '2020-11-28 05:26:01', 0),
(28, 'Amy', 'Cook', '54e9eb272e7e00ae81d768096d3fb0dda14a5f69', 'ncIa95', 'rideout_amy@hotmail.com', '5066426058', 1, '2020-11-28 20:16:23', 0),
(29, 'Lori', 'McGrath', '0e682a62226c390706c8df34ab7168f06a5d327d', 'GON0cq', 'lorrainelynnmc@gmail.com', '5066523083', 1, '2020-11-28 20:17:05', 0),
(30, 'Steve', 'Mclay', 'bf1ccda1bcce97920eab547bd221a1f640162dc0', 'vwqsbm', 'mclaysbayhaven@gmail.com', '5064666611', 1, '2020-11-28 21:16:53', 0),
(31, 'Collette', 'Doucette', '97e796418083be2b84e1d745d3c2e0d3c85da3bd', 'eQ2VUY', 'collette.obs@rogers.com', '5063123301', 1, '2020-11-29 13:06:53', 0),
(32, 'Lillian', 'Drapeau', '3a09a916bddaaf326fcc2ac3d11787d43fcd0054', 'NZjLof', 'lillian.drapeau@gmail.com', '+15065464587', 1, '2020-11-30 05:26:06', 0),
(33, 'Jeffrey', 'Hunter', '26fab1b789ea9daf5f313baf23fb8521bbc3cfde', 'nDCazQ', 'jefhunter@rogers.com', '5063874518', 1, '2020-11-30 17:53:20', 0),
(34, 'Mercy', 'Burge', 'c0dca8f1e7a145716850dc2848e2871b8b12bb49', 'Uevx9O', 'ilovemyjobcanada@gmail.com', '15065122189', 1, '2020-12-01 05:07:18', 0),
(35, 'Lisa', 'Levesque', '403c252c5d4164fae90ebde968de28d0e1673b33', 'a6TE5Y', 'lislev10@gmail.com', '530-0082', 1, '2020-12-04 22:58:29', 0),
(36, 'Ruth', 'Sawler', '88b1b0c2989a066dcbe76959c902993ced2a4ef6', 's7bQZR', 'ruan@nbnet.nb.ca', '5063759193', 1, '2020-12-05 19:55:37', 0),
(37, 'Tammy', 'Long', 'a8fe0885abfa6de4666b1360ac5de63dfeb071c5', 'W4dB6m', 'tammylong@hotmail.com', '5068392715', 1, '2020-12-09 05:57:34', 0),
(38, 'Cary', 'MacDonald', '019faf40fdd2586b5b52adb41ecac66d6e670c4c', 'qtoFp1', 'carymac63@gmail.com', '5068668725', 1, '2020-12-09 21:44:38', 0),
(39, 'Susan', 'Dixson', 'd487d8f91495e2c0a6d385e4d0f5ac4413635e25', '4oAh8F', 'serenacare@bellaliant.com', '5063811550', 1, '2020-12-13 22:44:37', 0),
(40, 'Jennifer', 'Burns', 'c5ba734620ed5fafdcd2b3e11de1890e24bd1793', 'RWXnAZ', 'jenburnsmanor@gmail.com', '5068635245', 1, '2020-12-17 21:17:37', 0),
(41, 'Chris', 'Smith', '07a9e4249386ac7d30e2272cdbae4dfc43fc5399', 'UGKHjF', 'chris.smith1@ambienthealth.ca', '506-434-1099', 1, '2021-01-08 22:38:19', 0),
(42, 'Charline', 'Johnson', '97d2a8a04fa2ac9d889138dae22e777b4f2e9a37', 'Q39VtZ', 'thebriarlea1@gmail.com', '506-874-5667', 1, '2021-01-18 18:57:25', 0),
(43, 'Jody', 'Munn', '7e705a898400f48a2ee856b61a86cb07b0ef1d32', 'AZoptb', 'jodymunnster@gmail.com', '5062603354', 1, '2021-01-23 21:59:33', 0),
(44, 'Colleen', 'Paynter', '0e6eb6da480fb2b5dedaa241882f391c1078f29d', 'NVD60H', 'colleenpaynter1@hotmail.com', '15062271478', 1, '2021-02-10 23:23:21', 0),
(45, 'Danielle', 'Gallant', '13363f707bbe36ab1edacbb05de2f276c8a638d1', 'n0rWAg', 'lauramanor86@gmail.com', '5066508706', 1, '2021-04-01 22:39:56', 0),
(46, 'Ann', 'Waddell', '9aa62b71b02013b8c24f70f530eb93b124ed4f0f', 'CGUN2f', 'waddell@levesqueonline.com', '506-333-1286', 1, '2021-04-07 15:28:37', 0),
(47, 'Wilma', 'Ledin', 'f408a66dce007f03f9bed725a5375680fb856815', '203DcA', 'buchananwilma@gmail.com', '5062292170', 1, '2021-04-12 22:37:42', 0),
(48, 'Heather', 'Perrin', '73839a51d35c207c78db882e26a651c99cc6f2fd', 'yQSdJw', 'hseely86@hotmail.com', '5066448100', 1, '2021-04-14 09:18:53', 0),
(49, 'vanessa', 'harris', '2cc0d7289b33db99435bb7d7f46ae6ee412b066e', 'hfvlYB', 'metcalfmanor1@gmail.com', '15062141690', 1, '2021-04-19 18:30:58', 0),
(50, 'Julie', 'Steeves', '83caedbb8f62135250c154d443b57e9f2f79e047', 'ADXTY1', 'thecedarsarf@gmail.com', '506-939-2233', 0, '2021-04-21 19:09:11', 1),
(51, 'Wendy', 'Symonds', '2ca317404616cb39587b86da346996f7c436b6fb', 'iqB9t5', 'bartlettgardenscarehome@gmail.com', '902 664. 4089', 1, '2021-04-22 00:36:21', 0),
(52, 'Sandra', 'Ferris', '3e5d5aa9de1c60ea35b7d3744d0eeee2e63c7d21', 'o9Snq6', 'marion.macdougall@outlook.com', '(506)6531615', 1, '2021-04-22 01:42:11', 0),
(53, 'Tom', 'Knox', '90e61400e4ddd65913d4d8bc100353aac6d93530', 'AtEjwN', 'knoxtom@rocketmail.com', '5064675117', 1, '2021-04-23 00:33:57', 0),
(54, 'PAULA', 'FASQUEL', '6eec6e75d74359b006c66b0d72500d13abc3e268', 'xFXTGN', 'mail@northmintoresidence.ca', '506-327-9000', 1, '2021-04-23 00:34:40', 0),
(55, 'Lynn', 'Wallace', '300415477f23b0ac710b359c9bbd9ce4c162e588', 'uXIfWg', 'lpearle@hotmail.com', '5064341869', 1, '2021-04-25 23:23:43', 0),
(56, 'Crystal', 'Snowdon', 'fe0a101ff94fe2544ae4ec9882a49f688f7fb3f1', 'rKjIQT', 'crystallynnsnowdon1973@gmail.com', '506538-2968', 1, '2021-05-01 23:27:48', 0),
(57, 'Steven', 'Wen', '0056fc2c97323a77ada64687803f3d3098df9592', '2SB8wR', 'stevenwen@yahoo.com', '5066321888', 1, '2021-05-03 19:17:00', 0),
(58, 'Leonard', 'Gervais', '85b6c2bcaf7c24ffff8b925e70e301ec60f5be2e', '87vf6j', 'parkviewgardens203@outlook.com', '506-458-8968', 1, '2021-05-05 20:46:56', 0),
(59, 'Alison', 'Baxter', 'f67a73837aafa86a129fa71b346dc3eb6e4c727b', '2iCRVJ', 'abaxter@shannex.com', '5063870533', 1, '2021-05-11 18:50:09', 0),
(60, 'Erynn', 'Bailey', 'adb164fe77842fd474c9975583f109e5f3f5f44a', '0g9d3G', 'erynn@enhancedliving.ca', '506-422-8600 ext 5', 1, '2021-05-18 20:44:19', 0),
(61, 'Wendy', 'Maillet', 'd5dc1556bc0ded22eff3d78c59f22f494697693b', 'FYITcZ', 'wmaillet@shannex.com', '506-343-4068', 1, '2021-06-07 19:33:00', 0),
(62, 'Emily', 'Swim', '8c1e0ed562447af61b630fea37885f98ffab2c0d', 'iNh290', 'gdswim@xplornet.com', '506-328-5471', 1, '2021-06-16 21:08:37', 0),
(63, 'Alvina', 'Allain', 'e5cb7f8ac39d11b61648516c3cc91b13e1e2f53c', '4XQ8cC', 'allainalvina@hotmail.com', '5065483229', 1, '2021-06-22 21:18:42', 0),
(64, 'Darlene', 'Forgrave', '16a118028951d5c92c8da33ca2c016997832ebfa', 'bO9tWo', 'darleneforgrave2007@hotmail.com', '(506) 214-2983', 1, '2021-06-23 20:39:50', 0),
(65, 'Tammy', 'Brown', 'ef63562f8c435ef5e16099178fb66f886e74f6b0', 'gwty05', 'breelizz@live.com', '5067217985', 1, '2021-06-24 20:18:24', 0),
(66, 'Minsoo', 'Clhang', '117beb4f0ae38818fa42adfe969012fd94d0dc61', '7q1pvi', 'clarklinda59@gmail.com', '5063756687', 1, '2021-06-24 21:08:58', 0),
(67, 'Jackie', 'Pendelton', '14c212b3eae26bdcaf549bb9814044a252fcff3b', 'kVtmbZ', 'lambertscove@gmail.com', '(506) 755 3997', 1, '2021-06-24 21:31:06', 0),
(68, 'Odessa', 'Arseneau', 'a9c15e0d1a0944523c1db591cd444e8b003e8e9d', 'e7qwkR', 'seastreetmanor@gmail.com', '506 696 0857', 1, '2021-06-24 21:53:07', 0),
(69, 'Jody', 'Munn', 'deed7dfe852c1ad29cd1c8f7de05e957b78f7bb4', 'KNz8pT', 'jody@jodymunn.ca', '506-260-3354', 1, '2021-06-28 23:19:34', 0),
(70, 'Amy', 'McNair', 'b6aa0153b9ce7c99b35bc4c563eb4f843c983074', '8eGWsH', 'info1@mcnairmanor.com', '5068515852', 1, '2021-07-05 20:42:43', 0),
(71, 'Karen', 'Dougherty-Seamans', '0f8ade5ee5c3a8a35e46145cafa9080bb28c8e32', 'aTzfxk', 'fundybaymanor@nb.aibn.com', '506-755-2221', 1, '2021-07-06 20:01:18', 0),
(72, 'Alishia', 'Perry', '985a756432cd52ac83e85b406a67cb95ca2d22cb', '9xrLUI', 'alisha.perry@accesshomecare.ca', '1(506)3816922', 1, '2021-07-06 21:38:46', 0),
(73, 'Joel', 'McCarthy', 'ce10f5622acfd27b42ec002bd2e0394b98661f33', 'mihMdk', '59pitt@nbnet.nb.ca', '5066580991', 1, '2021-07-08 21:34:08', 0),
(74, 'Lorna', 'Hyde', 'a5a6d732c96840b29876ed5833879181035f56e1', 'DoW0Sa', 'lornahydekingston@gmail.com', '5066522030', 1, '2021-07-13 22:15:02', 0),
(75, 'June', 'Shaw', 'f60db0d5c143e65b5fef69f8eff01059b0da20b8', 't4dV2K', 'rdls@bellaliant.net', '5063759113', 1, '2021-07-21 00:29:48', 0),
(76, 'Melinda', 'Smith', '83208d2fbc59e795021ceab4d327a85aed26bf03', '1XqMwT', 'abcmelindasmith@yahoo.com', '506- 450-0909', 1, '2021-08-13 01:58:11', 0),
(77, 'Karla', 'Roberts', 'f8fca1910ff5c970cd92d31172dc810634055562', 'SIcKOm', 'kroberts@nb.aibn.com', '5064519814', 1, '2021-08-18 18:04:28', 0),
(78, 'Martin', 'Fullerton', '066dca9e896c0d9ddd6940e6ba718af62166f332', 'mqyJQp', 'perfectionpropertycare@outlook.com', '5068637832', 1, '2021-08-18 21:50:02', 0),
(79, 'Ian', 'Chatham', '5ef4c636fc7050a5aab0dfca92af66819901398d', '4zOUZo', 'ian.chatham1@Accesshomecare.ca', '866-2799', 1, '2021-09-20 19:42:13', 0),
(80, 'Eric', 'Walls', '107071d7d640205e7029f88363a66574badec4b7', 'VJets3', 'ericwalls2015@hotmail.com', '15066253334', 1, '2022-01-06 06:48:40', 0),
(81, 'Jamie', 'Dobbelsteyn', '64e8d6b3d6c957153731bbfbeb63c8ae7ae34e8b', 'MijUmX', 'jpdobbelsteyn@gmail.com', '5066513470', 1, '2022-02-24 23:39:24', 0),
(82, 'Leonard', 'Foster', '44f220c1ebe205d485488bd455835b6897f88267', 'Sb3uBO', 'crlb1@nb.aibn.com', '15063254536', 1, '2022-03-16 17:42:26', 0),
(83, 'Jason', 'Wilson', 'fd2c79c6e9be918f89adac161fe333a0df798be8', '9YkceZ', 'jason1@silverfoxretirementliving.com', '5062278061', 1, '2022-04-01 23:27:22', 0),
(84, 'Jackie', 'Jaillet', '07b8b9ddaf47c413c47554e83b08d52037896162', '12zjK4', 'jackiejaillet@gmail.com', '5069614795', 1, '2022-04-11 17:48:25', 0),
(85, 'Tasha', 'Laroche', 'ff52999be82241276d9c893785d9b3473dd9c545', 'oKe47H', 'info@arainc.org', '5068547229', 1, '2022-05-03 18:26:51', 0),
(86, 'Charline', 'Johnson', '8695f178f13142a5af9490d4e8620979a29c80dd', 'K9wP8o', 'thebriarlea2@gmail.com', '506-874-5667', 1, '2021-01-18 18:57:25', 0),
(87, 'Charline', 'Johnson', 'b2d21be6d84dc46910f1625aadbf68dd1aa5a741', '3jywU7', 'thebriarlea3@gmail.com', '506-874-5667', 1, '2021-01-18 18:57:25', 0),
(88, 'Charline', 'Johnson', 'cdbb8adff684575128169bc057fdfe26e0444fa4', 'fqhWeE', 'thebriarlea4@gmail.com', '506-874-5667', 1, '2021-01-18 18:57:25', 0),
(89, 'Charline', 'Johnson', '22b9a01a18f280217f33d6ae8136a12a66b8dc2a', '4DdpKX', 'thebriarlea5@gmail.com', '506-874-5667', 1, '2021-01-18 18:57:25', 0),
(90, 'Ian', 'Chatham', '8b3131362f991c1feb5661fa0b89308eb49314d5', 'OaSlos', 'ian.chatham2@Accesshomecare.ca', '866-2799', 1, '2021-09-20 19:42:13', 0),
(91, 'Ian', 'Chatham', 'e31518e660596d95bcdea06a324890820d97e6db', 'R9OUwK', 'ian.chatham3@Accesshomecare.ca', '866-2799', 1, '2021-09-20 19:42:13', 0),
(92, 'Ian', 'Chatham', 'd66ea08a4e6b378b86d5fce2a3c0b58343499b43', '4PHjKX', 'ian.chatham4@Accesshomecare.ca', '866-2799', 1, '2021-09-20 19:42:13', 0),
(93, 'Leonard', 'Foster', '41460b874098c566a786d0835af6d499044a4cc7', 'ghbC5P', 'crlb2@nb.aibn.com', '15063254536', 1, '2022-03-16 17:42:26', 0),
(94, 'Leonard', 'Foster', 'ca4b51b7e16a95afe1eb9b2502c076e6a02bc6ba', 'KO6pGc', 'crlb3@nb.aibn.com', '15063254536', 1, '2022-03-16 17:42:26', 0),
(95, 'Leonard', 'Foster', 'f83a9441bbd8044d4771c02e0c47e86c3a9f8993', 'ohyeLx', 'crlb4@nb.aibn.com', '15063254536', 1, '2022-03-16 17:42:26', 0),
(96, 'Sarah', 'Jenkins', '03eff623d10c6a35ed2a66e69e6e74677b887171', 'TCKV6G', 'sarah.jenkins2@nbed.nb.ca', '5064719400', 1, '2020-11-22 04:05:59', 0),
(97, 'Sarah', 'Jenkins', 'a081b70ce6eb24daf416c970dac0b033793cc829', 'yLOQBv', 'sarah.jenkins3@nbed.nb.ca', '5064719400', 1, '2020-11-22 04:05:59', 0),
(98, 'Sarah', 'Jenkins', '7627ca6a7ae07cfc335978f9023885819bafe84e', 'eDK7Qs', 'sarah.jenkins4@nbed.nb.ca', '5064719400', 1, '2020-11-22 04:05:59', 0),
(99, 'Colleen', 'Paynter', '2f324fa92f3145cf8f8fe2d2c3baff1a40588b23', 'FM5Vg8', 'colleenpaynter2@hotmail.com', '15062271478', 1, '2021-02-10 23:23:21', 0),
(100, 'Colleen', 'Paynter', 'a00d2b8c356ae9f535d76993f96350b9f1bdce07', 'frGlXD', 'colleenpaynter3@hotmail.com', '15062271478', 1, '2021-02-10 23:23:21', 0),
(101, 'Amy', 'McNair', 'a76afbf885532550f2abf5fcc621e02cdde444bf', 'FXm1lD', 'info2@mcnairmanor.com', '5068515852', 1, '2021-07-05 20:42:43', 0),
(102, 'Amy', 'McNair', 'f1d3fd1b325cecb4b0f846cfb23a3d0f32d1bac1', 'RDnuNc', 'info3@mcnairmanor.com', '5068515852', 1, '2021-07-05 20:42:43', 0),
(103, 'Chris', 'Smith', '870d3773b1e043f11e0b6efe42fd9add4f648576', 'OjWPyo', 'chris.smith2@ambienthealth.ca', '506-434-1099', 1, '2021-01-08 22:38:19', 0),
(104, 'Chris', 'Smith', '47cd1bff4f4953729a82e2259ce5423c5bd21fdc', 'C8aRIv', 'chris.smith3@ambienthealth.ca', '506-434-1099', 1, '2021-01-08 22:38:19', 0),
(105, 'Georgina', 'Hubbard', '5fd6be9a3255c9448c37e89bf96cd0f7b996fd32', 'vFiQoz', 'gmhubb2@gmail.com', '506-961-4397', 1, '2020-11-13 21:59:45', 0),
(106, 'Jason', 'Wilson', '2cc6bd7002f3720e63271c5289a6c3c199d7b186', 'nlHe9k', 'jason2@silverfoxretirementliving.com', '5062278061', 1, '2022-04-01 23:27:22', 0),
(107, 'Christine', 'Saunders', '2c7fe464e53b1e047dea5bb81ba2bfac6edced7b', 'qMfI3g', 'paradisevilla.cs2@gmail.com', '506-443-8000', 1, '2020-11-14 00:01:15', 0),
(108, 'Dina', 'Marchetti-Girouard', '25e4d929ca664ea094bac2f01051cc09701861a7', 'VtTE9h', 'dmarchettibraemanor@me.com', '5063839228', 1, '2022-06-06 16:35:21', 0),
(109, 'Tammy', 'Brown', '6b95f651fe2f0d54980a46749b7e9e107c580218', 'or8EKZ', 'breelizz@live.com', '506-721-7985 ', 1, '2022-08-03 13:02:31', 0),
(110, 'Paul', 'Rossignol', 'c0f3db81cfbf61e1ce3237c0ec6d0e2f2b465a1e', 'laTi8L', 'paulro@foyerstthomas.org', '506-758-2110', 1, '2022-08-15 21:15:18', 0),
(111, 'christina', 'charest', 'a8b516fb65b26d2900d1faad85b5c5e51e98c017', 'rwpk2R', 'christina-charest@hotmail.com', '5067601744', 1, '2022-09-07 14:17:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `certificate` text,
  `wallet_certificate` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `identifier`, `member_id`, `residence_id`, `package_id`, `issue_date`, `expiry_date`, `certificate`, `wallet_certificate`, `status`) VALUES
(1, '2205210001', 1, 1, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:1302:\"<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						Seely Lodge</h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\">2205210001</span></td>\r\n				<td width=\"40%\">\r\n					<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n					Jan seely / President of NBSCHA</td>\r\n				<td width=\"30%\">\r\n					2023-03-31<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:68:\"https://www.nbscha.ca/public/uploads/certificates/certificate_bg.jpg\";}', 'a:2:{s:11:\"certificate\";s:1456:\"<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							Seely Lodge</h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\">2205210001</span></td>\r\n					<td width=\"40%\">\r\n						<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n						Jan seely / President of NBSCHA</td>\r\n					<td width=\"30%\">\r\n						2023-03-31<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(2, '2205210002', 2, 2, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(3, '2205210003', 3, 3, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(4, '2205210004', 4, 4, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(5, '2205210005', 5, 5, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(6, '2205210006', 6, 6, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(7, '2205210007', 7, 7, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(8, '2205210008', 8, 8, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(9, '2205210009', 9, 9, 4, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(10, '2205210010', 10, 10, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(11, '2205210011', 11, 11, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(12, '2205210012', 12, 12, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(13, '2205210013', 13, 13, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(14, '2205210014', 14, 14, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(15, '2205210015', 15, 15, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(16, '2205210016', 16, 16, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(17, '2205210017', 17, 17, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(18, '2205210018', 18, 18, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(19, '2205210019', 19, 19, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(20, '2205210020', 20, 20, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(21, '2205210021', 21, 21, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(22, '2205210022', 22, 22, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(23, '2205210023', 23, 23, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(24, '2205210024', 24, 24, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(25, '2205210025', 25, 25, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(26, '2205210026', 26, 26, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(27, '2205210027', 27, 27, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(28, '2205210028', 28, 28, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(29, '2205210029', 29, 29, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(30, '2205210030', 30, 30, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(31, '2205210031', 31, 31, 4, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(32, '2205210032', 32, 32, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(33, '2205210033', 33, 33, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(34, '2205210034', 34, 34, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(35, '2205210035', 35, 35, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(36, '2205210036', 36, 36, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(37, '2205210037', 37, 37, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(38, '2205210038', 38, 38, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(39, '2205210039', 39, 39, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(40, '2205210040', 40, 40, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(41, '2205210041', 41, 41, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(42, '2205210042', 42, 42, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(43, '2205210043', 43, 43, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(44, '2205210044', 44, 44, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(45, '2205210045', 45, 45, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(46, '2205210046', 46, 46, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(47, '2205210047', 47, 47, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(48, '2205210048', 48, 48, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(49, '2205210049', 49, 49, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(50, '2205210050', 50, 50, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(51, '2205210051', 51, 51, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(52, '2205210052', 52, 52, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(53, '2205210053', 53, 53, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(54, '2205210054', 54, 54, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(55, '2205210055', 55, 55, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(56, '2205210056', 56, 56, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(57, '2205210057', 57, 57, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(58, '2205210058', 58, 58, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(59, '2205210059', 59, 59, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(60, '2205210060', 60, 60, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(61, '2205210061', 61, 61, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(62, '2205210062', 62, 62, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(63, '2205210063', 63, 63, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(64, '2205210064', 64, 64, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(65, '2205210065', 65, 65, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(66, '2205210066', 66, 66, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(67, '2205210067', 67, 67, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(68, '2205210068', 68, 68, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(69, '2205210069', 69, 69, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(70, '2205210070', 70, 70, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(71, '2205210071', 71, 71, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(72, '2205210072', 72, 72, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(73, '2205210073', 73, 73, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(74, '2205210074', 74, 74, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(75, '2205210075', 75, 75, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(76, '2205210076', 76, 76, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(77, '2205210077', 77, 77, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(78, '2205210078', 78, 78, 3, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(79, '2205210079', 79, 79, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(80, '2205210080', 80, 80, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(81, '2205210081', 81, 81, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(82, '2205210082', 82, 82, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(83, '2205210083', 83, 83, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(84, '2205210084', 84, 84, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(85, '2205210085', 85, 85, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(86, '2205210086', 86, 86, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(87, '2205210087', 87, 87, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(88, '2205210088', 88, 88, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(89, '2205210089', 89, 89, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(90, '2205210090', 90, 90, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(91, '2205210091', 91, 91, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(92, '2205210092', 92, 92, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(93, '2205210093', 93, 93, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(94, '2205210094', 94, 94, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(95, '2205210095', 95, 95, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(96, '2205210096', 96, 96, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(97, '2205210097', 97, 97, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(98, '2205210098', 98, 98, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(99, '2205210099', 99, 99, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(100, '2205210100', 100, 100, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(101, '2205210101', 101, 101, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(102, '2205210102', 102, 102, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(103, '2205210103', 103, 103, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(104, '2205210104', 104, 104, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(105, '2205210105', 105, 105, 1, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(106, '2205210106', 106, 106, 2, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(107, '2205210107', 107, 107, 4, '2022-05-21', '2023-03-31', 'a:2:{s:11:\"certificate\";s:33:\"<p>\r\n	This is Main template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 'a:2:{s:11:\"certificate\";s:35:\"<p>\r\n	This is wallet template</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(108, '2206060108', 108, 126, 1, '2022-06-06', '2023-03-31', 'a:2:{s:11:\"certificate\";s:1291:\"<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						Brae Manor</h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\"></span></td>\r\n				<td width=\"40%\">\r\n					<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n					Jan seely / President of NBSCHA</td>\r\n				<td width=\"30%\">\r\n					2023-03-31<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:68:\"https://www.nbscha.ca/public/uploads/certificates/certificate_bg.jpg\";}', 'a:2:{s:11:\"certificate\";s:1445:\"<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							Brae Manor</h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\"></span></td>\r\n					<td width=\"40%\">\r\n						<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n						Jan seely / President of NBSCHA</td>\r\n					<td width=\"30%\">\r\n						2023-03-31<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(109, '2208030109', 109, 156, 1, '2022-08-03', '2023-03-31', 'a:2:{s:11:\"certificate\";s:1299:\"<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						CurtLin Manor Ltd </h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\"></span></td>\r\n				<td width=\"40%\">\r\n					<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n					Jan seely / President of NBSCHA</td>\r\n				<td width=\"30%\">\r\n					2023-03-31<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:68:\"https://www.nbscha.ca/public/uploads/certificates/certificate_bg.jpg\";}', 'a:2:{s:11:\"certificate\";s:1453:\"<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							CurtLin Manor Ltd </h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\"></span></td>\r\n					<td width=\"40%\">\r\n						<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n						Jan seely / President of NBSCHA</td>\r\n					<td width=\"30%\">\r\n						2023-03-31<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(110, '2208150110', 110, 158, 2, '2022-08-15', '2023-03-31', 'a:2:{s:11:\"certificate\";s:1324:\"<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						Domaine La Vall&eacute;e de Memramcook Inc.</h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\"></span></td>\r\n				<td width=\"40%\">\r\n					<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n					Jan seely / President of NBSCHA</td>\r\n				<td width=\"30%\">\r\n					2023-03-31<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:68:\"https://www.nbscha.ca/public/uploads/certificates/certificate_bg.jpg\";}', 'a:2:{s:11:\"certificate\";s:1478:\"<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							Domaine La Vall&eacute;e de Memramcook Inc.</h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\"></span></td>\r\n					<td width=\"40%\">\r\n						<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n						Jan seely / President of NBSCHA</td>\r\n					<td width=\"30%\">\r\n						2023-03-31<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1),
(111, '2209070111', 111, 169, 1, '2022-09-07', '2023-03-31', 'a:2:{s:11:\"certificate\";s:1300:\"<div style=\"width: 92%;\r\n    margin: 0px;\r\n    padding: 4%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"100%\" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<h2 style=\"color:red;text-transform:uppercase;font-size:30px;font-weight:bolder; text-align:center;\">\r\n						Foyer Linda Charest</h2>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td colspan=\"3\">\r\n					<p style=\"text-align:center; padding: 20px\">\r\n						IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td width=\"30%\">\r\n					<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n					<span style=\"font-size:13px;\"></span></td>\r\n				<td width=\"40%\">\r\n					<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n					Jan seely / President of NBSCHA</td>\r\n				<td width=\"30%\">\r\n					2023-03-31<br />\r\n					<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:68:\"https://www.nbscha.ca/public/uploads/certificates/certificate_bg.jpg\";}', 'a:2:{s:11:\"certificate\";s:1454:\"<div style=\"width: 96%;\r\n    margin: 0px;\r\n    padding: 2%;\r\n    color: #000;\r\n    font-family: arial;\r\n    font-size: 16px;\r\n    text-align: center;\">\r\n	<div style=\"border:5px solid #000000; width:100%\">\r\n		<table border=\"0\" cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">\r\n			<tbody>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<img src=\"https://nbscha.celiums.com/public/common/images/certificate_header.jpg\" width=\"96%\" /></td>\r\n				</tr>\r\n				<tr>\r\n					<td align=\"center\" colspan=\"3\">\r\n						<h2 style=\"margin: 10px 0; color:red;text-transform:uppercase;font-size:18px;font-weight:bolder; text-align:center; width:100%;\">\r\n							Foyer Linda Charest</h2>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td colspan=\"3\">\r\n						<p style=\"text-align:center; font-size: 12px; margin: 10px 0;\">\r\n							IS A SPECIAL CARE HOME WITH FULL MEMBERSHIP STATUS IN THE NEW BRUNSWICK SPECIAL CARE HOME ASSOCIATION</p>\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"30%\">\r\n						<span style=\"font-size:12px;\">NBSCHA MEMBERSHIP</span><br />\r\n						<span style=\"font-size:13px;\"></span></td>\r\n					<td width=\"40%\">\r\n						<img src=\"https://www.nbscha.ca/public/uploads/certificates/signature.png\" style=\"width:200px;\" /><br />\r\n						Jan seely / President of NBSCHA</td>\r\n					<td width=\"30%\">\r\n						2023-03-31<br />\r\n						<span style=\"font-size:12px;text-decoration:underline\">EXPIRY DATE</span></td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n\";s:10:\"background\";s:0:\"\";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_packages`
--

CREATE TABLE `membership_packages` (
  `pid` int(11) NOT NULL,
  `bed_count` int(11) NOT NULL DEFAULT '0',
  `bed_unlimited` tinyint(1) NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `certificate_template` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_packages`
--

INSERT INTO `membership_packages` (`pid`, `bed_count`, `bed_unlimited`, `price`, `certificate_template`, `sort_order`, `status`, `delete_status`) VALUES
(1, 20, 0, 300.00, 1, 0, 1, 0),
(2, 40, 0, 500.00, 1, 0, 1, 0),
(3, 59, 0, 800.00, 1, 0, 1, 0),
(4, 0, 1, 850.00, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_packages_desc`
--

CREATE TABLE `membership_packages_desc` (
  `desc_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_packages_desc`
--

INSERT INTO `membership_packages_desc` (`desc_id`, `package_id`, `title`, `description`, `language`) VALUES
(1, 1, '1-20', '', 'en'),
(2, 2, '21-40', '', 'en'),
(3, 3, '40+', '', 'en'),
(4, 4, '60+', '', 'en'),
(5, 1, '1-20', '', 'fr'),
(6, 2, '21-40', '', 'fr'),
(7, 3, '40+', '', 'fr'),
(8, 4, '60+', '', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `membership_requests`
--

CREATE TABLE `membership_requests` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `home_name` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `home_postalcode` varchar(255) NOT NULL,
  `home_contact_name` varchar(255) NOT NULL,
  `home_email` varchar(255) NOT NULL,
  `home_phone` varchar(255) NOT NULL,
  `home_fax` varchar(255) DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `max_beds_count` int(11) NOT NULL DEFAULT '0',
  `home_language` int(11) NOT NULL,
  `home_level` int(11) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  `description` text,
  `comments` text,
  `mainimage` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `virtual_tour` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `features` text NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `payment_info` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `processed_by` int(11) DEFAULT NULL,
  `processed_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_requests`
--

INSERT INTO `membership_requests` (`id`, `identifier`, `first_name`, `last_name`, `email`, `phone`, `password`, `salt`, `home_name`, `home_address`, `home_postalcode`, `home_contact_name`, `home_email`, `home_phone`, `home_fax`, `package_id`, `max_beds_count`, `home_language`, `home_level`, `pharmacy_name`, `facilities`, `region_id`, `description`, `comments`, `mainimage`, `image2`, `image3`, `image4`, `image5`, `image6`, `virtual_tour`, `facebook`, `instagram`, `twitter`, `youtube`, `linkedin`, `website`, `features`, `amount`, `payment_method`, `payment_response`, `payment_info`, `transaction_id`, `payment_status`, `created`, `status`, `processed_by`, `processed_date`) VALUES
(1, '22052508510001', 'Loai', 'Jaouni', 'loai.jaouni@gmail.com', '15063335537', '987ec84109ba914fdd10981aae75df6a6e75000c', '6PcJZD', 'aaa', '1 Some Street', 'T4F5G7', 'Loai Jaouni', 'loai.jaouni@gmail.com', '15063335537', '', 1, 11, 1, 2, 'aaa', '1', 2, '', '', '4c11a0b4ac6cd92368346d04d71e4781.png', '', '', '', '', '', '', '', '', '', '', '', '', 'a:2:{i:1;s:1:\"1\";i:14;s:1:\"1\";}', '300.00', 'Cash', '', 'aaa', '', 0, '2022-05-25 12:51:16', 'rejected', 3, '2022-08-17 17:13:21'),
(2, '22060612000002', 'test', 'test', 'janseely@rogers.com', 'test', '824838e7ff6db9239bbf6f3d21d4685f4acbcce3', 'Lwh8mG', 'test', 'test', 'test', 'test', 'janseely@rogers.com', 'janseely@rogers.com', 'test', 1, 12, 1, 2, 'lawtons', '1', 2, 'test', '', '73986fe04c80a5620028e95294e1f707.png', '', '', '', '', '', '', '', '', '', '', '', '', 'a:4:{i:1;s:1:\"1\";i:3;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";}', '300.00', 'Credit Card', '', '', '', 0, '2022-06-06 16:00:36', 'rejected', 3, '2022-08-17 17:13:27'),
(3, '22060612210003', 'Dina', 'Marchetti-Girouard', 'dmarchettibraemanor@me.com', '5063839228', '25e4d929ca664ea094bac2f01051cc09701861a7', 'VtTE9h', 'Brae Manor', '101 Ellerdale Avenue, Moncton, N.B.', 'E1A3M8', 'Dina Marchetti-Girouard', 'dmarchettibraemanor@me.com', '5063839228', '', 1, 3, 3, 2, 'Dieppe Pharmasave', '1,2,3,4', 1, 'Welcome to our family orientated setting.  We provide quality care for seniors and individuals with special needs.  We have owned our special care home for 17 years and our home has been in the community for 27 years.  Complete personal care, individualized attention.  We have 5 bathrooms; 24/7 supervision; accompany residents to all medical appointments; annual bus trips; holiday celebrations; birthday celebrations; great food and a wonderful atmosphere.  Residents are given attention to specialized diet if required and some attend the YMCA outreach and local community outings are available as well. ', '', 'fb75883d789621b7d8e2c51749e98d4b.png', '', '', '', '', '', '', '', '', '', '', '', '', 'a:24:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', '300.00', 'Credit Card', 'a:20:{s:8:\"response\";s:1:\"1\";s:15:\"responseMessage\";s:8:\"APPROVAL\";s:13:\"noticeMessage\";s:81:\"New Card Stored - New Customer Created - New Order Created - Order Marked as Paid\";s:4:\"date\";s:10:\"2022-06-06\";s:4:\"time\";s:8:\"10:23:48\";s:4:\"type\";s:8:\"purchase\";s:6:\"amount\";s:6:\"300.00\";s:14:\"cardHolderName\";s:22:\"Dina MarchettiGirouard\";s:10:\"cardNumber\";s:19:\"4530 **** **** 9044\";s:10:\"cardExpiry\";s:4:\"0726\";s:9:\"cardToken\";s:22:\"99651bf6cd8dfd94d836ec\";s:8:\"cardType\";s:4:\"Visa\";s:13:\"transactionId\";s:8:\"30120596\";s:11:\"avsResponse\";s:1:\"Y\";s:11:\"cvvResponse\";s:1:\"M\";s:12:\"approvalCode\";s:6:\"064627\";s:11:\"orderNumber\";s:14:\"22060612210003\";s:12:\"customerCode\";s:7:\"CST1003\";s:8:\"currency\";s:3:\"CAD\";s:7:\"xmlHash\";s:64:\"0b2acf8d419faa4a13b9b4fbc9515ce3b2e417be20d94a2d2cd61b30f6aa5c29\";}', '', '30120596', 1, '2022-06-06 16:21:14', 'approved', 3, '2022-06-06 16:35:21'),
(4, '22073010400004', 'Tammy', 'Brown', 'breelizz@live.com', '506-721-7985 ', '6b95f651fe2f0d54980a46749b7e9e107c580218', 'or8EKZ', 'CurtLin Manor Ltd ', '61 Bonney Rd, Nauwigewauk ', 'E5N7A1 ', 'Tammy', 'breelizz@live.com', '5068323510', '5068325794', 1, 9, 1, 5, 'Rothesay Pharmachoice', '2,3', 2, 'A Community Residence ', '', 'f887f76a3022d34b893b7a910833d2d4.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'a:20:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";}', '300.00', 'Auto Renewal', '', '', '', 0, '2022-07-31 02:40:12', 'approved', 3, '2022-08-03 13:02:31'),
(5, '22081202320005', 'Paul', 'Rossignol', 'paulro@foyerstthomas.org', '506-758-2110', 'c0f3db81cfbf61e1ce3237c0ec6d0e2f2b465a1e', 'laTi8L', 'Domaine La Vall&eacute;e de Memramcook Inc.', '18 rue Marcellin', 'E4K 2J7', 'Paul Rossignol', 'paulro@foyerstthomas.org', '506-758-4005', '506-758-9489', 2, 28, 3, 1, 'Phamiliprix Memramcook', '1,4', 1, 'To provide long term care services to elderly people and special needs people on a 24/7 basis.  Services includes but not limited to : personal care, food services, housekeeping services, laundry services, administration support, building maintenance and security, activity services and on site medical visits. ', '', '1f7e6d77c339500c0b1e7838b01ebe04.gif', 'ce3d5dc079d2ba2a89f59b8b4c02e299.jpg', '698c65dcf39a8310d44366a6731877e1.jpg', 'caaaff7dbdbc2d5d34264a0ea90b6c96.jpg', '2a408436984d49296ca6fade784ed3d7.jpg', 'ee52da5f7adf5aaa5f721fb6646a9446.jpg', '', '', '', '', '', '', '', 'a:24:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', '500.00', 'Cheque', '', '', '', 0, '2022-08-12 18:32:02', 'approved', 3, '2022-08-15 21:15:18'),
(6, '22090208470006', 'christina', 'charest', 'christina-charest@hotmail.com', '5067601744', 'a8b516fb65b26d2900d1faad85b5c5e51e98c017', 'rwpk2R', 'Foyer Linda Charest', '53 Arran st, Campbellton', 'E3N 5E5', 'Christina Charest', 'foyer.charest@gmail.com', '5067601744', '5067536262', 1, 18, 3, 1, 'Jean Coutu', '3,4,1,2', 5, '', '', '15c4dfb7a12bdbc0b6b17eb37f64f497.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', 'a:18:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:20;s:1:\"1\";i:22;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', '300.00', 'Credit Card', 'a:20:{s:8:\"response\";s:1:\"1\";s:15:\"responseMessage\";s:8:\"APPROVAL\";s:13:\"noticeMessage\";s:81:\"New Card Stored - New Customer Created - New Order Created - Order Marked as Paid\";s:4:\"date\";s:10:\"2022-09-02\";s:4:\"time\";s:8:\"06:48:11\";s:4:\"type\";s:8:\"purchase\";s:6:\"amount\";s:6:\"300.00\";s:14:\"cardHolderName\";s:17:\"christina charest\";s:10:\"cardNumber\";s:19:\"4510 **** **** 5229\";s:10:\"cardExpiry\";s:4:\"0525\";s:9:\"cardToken\";s:22:\"c43705bf4638e4966fef95\";s:8:\"cardType\";s:4:\"Visa\";s:13:\"transactionId\";s:8:\"33568326\";s:11:\"avsResponse\";s:1:\"Y\";s:11:\"cvvResponse\";s:1:\"M\";s:12:\"approvalCode\";s:6:\"042501\";s:11:\"orderNumber\";s:14:\"22090208470006\";s:12:\"customerCode\";s:7:\"CST1005\";s:8:\"currency\";s:3:\"CAD\";s:7:\"xmlHash\";s:64:\"e4fd58299d3a4c325ba84d5fca433a8d154e727db5719b5c4b101d132716944a\";}', '4510294800915229', '33568326', 1, '2022-09-02 12:47:22', 'approved', 3, '2022-09-07 14:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `members_login_history`
--

CREATE TABLE `members_login_history` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_login_history`
--

INSERT INTO `members_login_history` (`id`, `mid`, `ipaddress`, `timestamp`) VALUES
(1, 1, '159.2.217.178', '0000-00-00 00:00:00'),
(2, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(3, 1, '174.113.210.8', '0000-00-00 00:00:00'),
(4, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(5, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(6, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(7, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(8, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(9, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(10, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(11, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(12, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(13, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(14, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(15, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(16, 1, '2605:b100:b06:538d:5deb:3c83:a57f:a5d3', '0000-00-00 00:00:00'),
(17, 45, '2607:fea8:d1c0:2aa0:dd71:a739:ed7b:5a2b', '0000-00-00 00:00:00'),
(18, 45, '2607:fea8:d1c0:2aa0:dd71:a739:ed7b:5a2b', '0000-00-00 00:00:00'),
(19, 1, '156.34.159.237', '0000-00-00 00:00:00'),
(20, 45, '159.2.217.178', '0000-00-00 00:00:00'),
(21, 1, '50.65.45.110', '0000-00-00 00:00:00'),
(22, 1, '50.65.45.110', '0000-00-00 00:00:00'),
(23, 1, '50.65.45.110', '0000-00-00 00:00:00'),
(24, 1, '50.65.45.110', '0000-00-00 00:00:00'),
(25, 1, '156.34.159.237', '0000-00-00 00:00:00'),
(26, 1, '142.166.237.29', '0000-00-00 00:00:00'),
(27, 1, '142.163.102.130', '0000-00-00 00:00:00'),
(28, 1, '142.166.48.53', '0000-00-00 00:00:00'),
(29, 24, '142.166.48.53', '0000-00-00 00:00:00'),
(30, 1, '156.34.159.237', '0000-00-00 00:00:00'),
(31, 27, '159.2.178.50', '0000-00-00 00:00:00'),
(32, 4, '142.177.68.31', '0000-00-00 00:00:00'),
(33, 1, '72.255.34.15', '0000-00-00 00:00:00'),
(34, 1, '156.34.153.149', '0000-00-00 00:00:00'),
(35, 108, '156.34.153.149', '0000-00-00 00:00:00'),
(36, 85, '159.2.217.178', '0000-00-00 00:00:00'),
(37, 85, '159.2.217.178', '0000-00-00 00:00:00'),
(38, 85, '2607:fea8:f220:8930:c447:35d3:e91a:c83c', '0000-00-00 00:00:00'),
(39, 85, '2607:fea8:f220:8930:c447:35d3:e91a:c83c', '0000-00-00 00:00:00'),
(40, 85, '159.2.217.178', '0000-00-00 00:00:00'),
(41, 85, '2607:fea8:f220:8930:c447:35d3:e91a:c83c', '0000-00-00 00:00:00'),
(42, 1, '156.34.153.149', '0000-00-00 00:00:00'),
(43, 1, '156.34.153.149', '0000-00-00 00:00:00'),
(44, 1, '2607:fea8:fef0:81e8:95ce:94a8:4b3e:8d3b', '0000-00-00 00:00:00'),
(45, 85, '159.2.217.178', '0000-00-00 00:00:00'),
(46, 61, '207.179.172.90', '0000-00-00 00:00:00'),
(47, 6, '207.179.172.90', '0000-00-00 00:00:00'),
(48, 15, '207.179.172.90', '0000-00-00 00:00:00'),
(49, 15, '142.166.47.10', '0000-00-00 00:00:00'),
(50, 6, '142.166.47.10', '0000-00-00 00:00:00'),
(51, 61, '142.166.47.10', '0000-00-00 00:00:00'),
(52, 85, '2607:fea8:f220:8930:8088:e09d:610f:4660', '0000-00-00 00:00:00'),
(53, 3, '2607:fea8:e461:af00:7559:a8cd:3b72:e66e', '0000-00-00 00:00:00'),
(54, 56, '2605:8d80:525:57b8:dce7:4782:f1ba:534a', '0000-00-00 00:00:00'),
(55, 3, '208.65.36.129', '0000-00-00 00:00:00'),
(56, 3, '208.65.36.129', '0000-00-00 00:00:00'),
(57, 1, '156.34.197.209', '0000-00-00 00:00:00'),
(58, 19, '2607:fea8:b062:6700:bcd6:c339:a97b:5d34', '0000-00-00 00:00:00'),
(59, 108, '156.34.197.209', '0000-00-00 00:00:00'),
(60, 61, '142.166.47.10', '0000-00-00 00:00:00'),
(61, 6, '142.166.47.10', '0000-00-00 00:00:00'),
(62, 15, '142.166.47.10', '0000-00-00 00:00:00'),
(63, 59, '142.166.166.66', '0000-00-00 00:00:00'),
(64, 49, '174.113.155.154', '0000-00-00 00:00:00'),
(65, 6, '204.58.63.20', '0000-00-00 00:00:00'),
(66, 18, '216.208.243.230', '0000-00-00 00:00:00'),
(67, 18, '216.208.243.230', '0000-00-00 00:00:00'),
(68, 6, '24.138.25.40', '0000-00-00 00:00:00'),
(69, 6, '204.58.63.20', '0000-00-00 00:00:00'),
(70, 6, '204.58.63.20', '0000-00-00 00:00:00'),
(71, 18, '207.112.52.250', '0000-00-00 00:00:00'),
(72, 17, '159.2.240.110', '0000-00-00 00:00:00'),
(73, 53, '2605:b100:b03:2af:f4b5:b789:a696:58e7', '0000-00-00 00:00:00'),
(74, 49, '47.54.182.26', '0000-00-00 00:00:00'),
(75, 13, '2600:387:0:80d::2b', '0000-00-00 00:00:00'),
(76, 37, '2605:8d80:501:9a09:88d1:8906:da93:2eeb', '0000-00-00 00:00:00'),
(77, 85, '2607:fea8:f220:8930:a4a9:120a:ed0c:ae44', '0000-00-00 00:00:00'),
(78, 3, '2607:fea8:e460:8bc0:9520:1137:c86f:b106', '0000-00-00 00:00:00'),
(79, 43, '47.55.95.109', '0000-00-00 00:00:00'),
(80, 21, '159.2.131.179', '0000-00-00 00:00:00'),
(81, 21, '159.2.131.179', '0000-00-00 00:00:00'),
(82, 45, '2607:fea8:d1c0:2aa0:341e:cc96:c991:a38f', '0000-00-00 00:00:00'),
(83, 45, '2607:fea8:d1c0:2aa0:341e:cc96:c991:a38f', '0000-00-00 00:00:00'),
(84, 15, '204.58.63.20', '0000-00-00 00:00:00'),
(85, 6, '204.58.63.20', '0000-00-00 00:00:00'),
(86, 61, '204.58.63.20', '0000-00-00 00:00:00'),
(87, 110, '174.116.174.238', '0000-00-00 00:00:00'),
(88, 61, '142.166.47.10', '0000-00-00 00:00:00'),
(89, 15, '142.166.47.10', '0000-00-00 00:00:00'),
(90, 6, '142.166.47.10', '0000-00-00 00:00:00'),
(91, 15, '204.58.63.20', '0000-00-00 00:00:00'),
(92, 6, '204.58.63.20', '0000-00-00 00:00:00'),
(93, 61, '204.58.63.20', '0000-00-00 00:00:00'),
(94, 1, '174.113.210.8', '0000-00-00 00:00:00'),
(95, 59, '142.166.166.66', '0000-00-00 00:00:00'),
(96, 1, '159.2.217.178', '0000-00-00 00:00:00'),
(97, 1, '2604:3d09:687:e400:50cf:db9:3cb:50e0', '0000-00-00 00:00:00'),
(98, 59, '142.166.166.66', '0000-00-00 00:00:00'),
(99, 12, '2607:fea8:d1e5:a600:e133:605b:8628:cf95', '0000-00-00 00:00:00'),
(100, 60, '72.139.24.10', '0000-00-00 00:00:00'),
(101, 8, '199.59.135.22', '0000-00-00 00:00:00'),
(102, 8, '199.59.135.22', '0000-00-00 00:00:00'),
(103, 7, '134.41.137.133', '0000-00-00 00:00:00'),
(104, 8, '159.2.217.178', '0000-00-00 00:00:00'),
(105, 8, '159.2.217.178', '0000-00-00 00:00:00'),
(106, 18, '142.167.185.250', '0000-00-00 00:00:00'),
(107, 8, '159.2.217.178', '0000-00-00 00:00:00'),
(108, 25, '2607:fea8:c440:4410:e1f3:1326:ffcb:8095', '0000-00-00 00:00:00'),
(109, 47, '129.222.184.157', '0000-00-00 00:00:00'),
(110, 8, '159.2.217.178', '0000-00-00 00:00:00'),
(111, 18, '216.208.243.226', '0000-00-00 00:00:00'),
(112, 10, '142.177.106.43', '0000-00-00 00:00:00'),
(113, 8, '159.2.217.178', '0000-00-00 00:00:00'),
(114, 8, '159.2.217.178', '0000-00-00 00:00:00'),
(115, 1, '2605:b100:b26:8168:d54a:7781:6c8e:13fe', '0000-00-00 00:00:00'),
(116, 1, '207.179.178.238', '0000-00-00 00:00:00'),
(117, 1, '207.179.178.238', '0000-00-00 00:00:00'),
(118, 1, '156.34.206.111', '0000-00-00 00:00:00'),
(119, 21, '159.2.131.179', '0000-00-00 00:00:00'),
(120, 5, '2607:fea8:f1c0:4e40:7425:df9f:d59a:7655', '0000-00-00 00:00:00'),
(121, 4, '207.179.158.147', '0000-00-00 00:00:00'),
(122, 1, '159.2.217.178', '0000-00-00 00:00:00'),
(123, 1, '142.166.102.132', '0000-00-00 00:00:00'),
(124, 1, '198.164.251.251', '0000-00-00 00:00:00'),
(125, 62, '96.44.108.99', '0000-00-00 00:00:00'),
(126, 1, '2607:fea8:cc40:41a0:f4ba:8f15:2df3:885a', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member_menu`
--

CREATE TABLE `member_menu` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `display` int(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_menu`
--

INSERT INTO `member_menu` (`id`, `class`, `name`, `link`, `parent_id`, `status`, `display`, `sort_order`) VALUES
(1, 'fa-dashboard', 'Dashboard', '', 0, 'Y', 1, 0),
(2, '', 'Dashboard', 'home/dashboard', 1, 'Y', 1, 0),
(3, 'fa-cubes', 'Resources', '', 0, 'Y', 1, 0),
(4, '', 'News', 'resources/news', 3, 'Y', 1, 0),
(5, '', 'Forms', 'resources/forms', 3, 'Y', 1, 1),
(6, '', 'Links', 'resources/links', 3, 'Y', 1, 2),
(7, '', 'Membership', 'membership', 1, 'Y', 1, 1),
(8, '', 'Residence', 'residences', 1, 'Y', 1, 2),
(9, '', 'Enquires', 'enquiries/overview', 1, 'Y', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `member_reset`
--

CREATE TABLE `member_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_key` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_reset`
--

INSERT INTO `member_reset` (`id`, `user_id`, `user_key`) VALUES
(1, 50, '2zX13YCKlnMUpgod'),
(2, 50, 'Afys6qI2WvpNcPDt'),
(3, 1, 'eZ5cszgiRx0rnQjk'),
(4, 85, 'dqsaEA5CRViuNj34'),
(5, 85, 'dxyOeXDVYbTlhA2k'),
(6, 85, '9sYaEBMpVTG7NzPb'),
(7, 45, '5AORcuvhXbr7SyUG'),
(8, 45, 'xWir6pLNum9c8ksy'),
(9, 45, '6Rvpd1fCzQhYExX0'),
(10, 60, 'sknlIyPujcMOKHr0'),
(11, 47, 'gSzVtWxNwY4yAbFD'),
(12, 47, 'hkpKGFAjOIu1Y0v3'),
(13, 47, 'kCJ1QsyGYhz5aqjN'),
(14, 60, 'XLSWBKVca0T1FCgQ'),
(15, 60, 'SvWMA4oPKBpu1rlT'),
(16, 60, 'hnU8f5M6xL31HJC2'),
(17, 60, '6eZmjTEYQqxsc92R'),
(18, 7, 'p6HGZWEvlJXFj4OC'),
(19, 7, 'wzu7hkI8HDVWniGa');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `link_type` varchar(255) NOT NULL,
  `link_object` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `show_subitems` tinyint(1) NOT NULL DEFAULT '1',
  `target_type` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`id`, `menu_id`, `parent_id`, `link_type`, `link_object`, `class`, `attachment`, `show_subitems`, `target_type`, `sort_order`, `status`) VALUES
(1, 1, 0, 'internal', '', '', NULL, 1, '_self', 1, 1),
(2, 1, 0, 'internal', '', '', NULL, 1, '_self', 1, 1),
(3, 1, 0, 'pages', '4', '', NULL, 1, '', 2, 1),
(4, 2, 0, 'pages', '14', '', NULL, 1, '_self', 1, 1),
(6, 1, 0, 'pages', '5', '', NULL, 1, '', 3, 1),
(7, 1, 0, 'pages', '6', '', NULL, 1, '', 4, 1),
(8, 1, 0, 'pages', '7', '', NULL, 1, '', 5, 1),
(9, 1, 0, 'pages', '8', '', NULL, 1, '', 6, 1),
(10, 1, 0, 'pages', '9', '', NULL, 1, '', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menuitems_desc`
--

CREATE TABLE `menuitems_desc` (
  `desc_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuitems_desc`
--

INSERT INTO `menuitems_desc` (`desc_id`, `menuitem_id`, `name`, `link`, `language`) VALUES
(1, 2, 'Home', '/', 'en'),
(2, 2, 'Accueil', '/', 'fr'),
(3, 3, 'About', '/', 'en'),
(4, 3, 'À Propos', '/', 'fr'),
(5, 4, 'Covid-19 Statement', '', 'en'),
(6, 4, 'Déclaration sur la COVID-19', '/', 'fr'),
(9, 6, 'Residences', '', 'en'),
(10, 6, 'Résidences', '', 'fr'),
(11, 7, 'Board', '', 'en'),
(12, 7, 'Membres du Conseil', '', 'fr'),
(13, 8, 'Sponsors', '', 'en'),
(14, 8, 'Promoteurs', '', 'fr'),
(15, 9, 'News', '', 'en'),
(16, 9, 'Nouvelles', '', 'fr'),
(17, 10, 'Contact', '', 'en'),
(18, 10, 'Contact', 'contact', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `class`, `code`, `status`) VALUES
(1, 'Main Menu', '', 'main_menu', 1),
(2, 'Top Menu', '', 'top_menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type`, `slug`, `category`, `author`, `image`, `publish_date`, `sort_order`, `status`) VALUES
(2, 'public', 'nbscha-affordable-quality-now-220323060856', 4, 'NBSCHA', 'Capture.JPG', '2021-03-31 04:00:00', 0, 1),
(5, 'member', 'nbscha-affordable-quality-now', 4, 'NBSCHA', 'NBSCHA_Affordable_Quality_Now1.jpg', '2022-03-31 04:00:00', 0, 1),
(6, 'public', 'long-term-care-workers-want-better-access-to-vaccinations', 4, 'NBSCHA', 'jan-seely-2.jpg', '2021-05-04 04:00:00', 0, 1),
(7, 'public', 'nb-government-announces-new-funding-for-special-care-home-providers', 4, 'NBSCHA', 'N_B__government_announces_new_funding_for_special_care_home_providers.jpg', '2018-01-27 05:00:00', 0, 1),
(8, 'public', '274-million-increase-in-funding-for-adult-residential-facilities', 4, 'NBSCHA', 'cq5dam_web_600_400.jpeg', '2022-05-24 04:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `slug`, `sort_order`, `status`) VALUES
(1, 'training', 0, 1),
(2, 'agm', 0, 1),
(3, 'community', 0, 1),
(4, 'special-care-week', 0, 1),
(5, 'committees', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories_desc`
--

CREATE TABLE `news_categories_desc` (
  `desc_id` int(11) NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_categories_desc`
--

INSERT INTO `news_categories_desc` (`desc_id`, `news_category_id`, `name`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(1, 1, 'Training', NULL, NULL, NULL, 'en'),
(2, 2, 'AGM', NULL, NULL, NULL, 'en'),
(3, 3, 'Community', NULL, NULL, NULL, 'en'),
(4, 4, 'Special Care Week', NULL, NULL, NULL, 'en'),
(5, 5, 'Committees', NULL, NULL, NULL, 'en'),
(6, 1, 'Training', NULL, NULL, NULL, 'fr'),
(7, 2, 'AGM', NULL, NULL, NULL, 'fr'),
(8, 3, 'Community', NULL, NULL, NULL, 'fr'),
(9, 4, 'Special Care Week', NULL, NULL, NULL, 'fr'),
(10, 5, 'Committees', NULL, NULL, NULL, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `news_desc`
--

CREATE TABLE `news_desc` (
  `desc_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text,
  `body` text,
  `video` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_desc`
--

INSERT INTO `news_desc` (`desc_id`, `news_id`, `title`, `summary`, `body`, `video`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(2, 2, 'NBSCHA Affordable. Quality. Now.', '<p>\r\n	New Brunswick Special Care Home Association offers over 400 homes with up to 1000 available beds. Affordable quality health care available right now.</p>\r\n', '<p>\r\n	New Brunswick Special Care Home Association offers over 400 homes with up to 1000 available beds. Affordable quality health care available right now.</p>\r\n<p>\r\n	<iframe allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/RTtbHUyEQCo\" title=\"YouTube video player\" width=\"560\"></iframe></p>\r\n', '', 'NBSCHA Affordable. Quality. Now.', '', '', 'en'),
(4, 2, 'AFSSNB : Prix Abordables, Qualité, Maintenant.', '<p>\r\n	L’Association des foyers de soins spéciaux du Nouveau-Brunswick offre plus de 400 foyers qui ont jusqu’à 1 000 places libres. Soins de santé de qualité, à prix abordable, accessibles maintenant.</p>\r\n', '<p>\r\n	L&rsquo;Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick offre plus de 400 foyers qui ont jusqu&rsquo;&agrave; 1&nbsp;000 places libres. Soins de sant&eacute; de qualit&eacute;, &agrave; prix abordable, accessibles maintenant.<br />\r\n	<br />\r\n	Plus t&ocirc;t cette semaine, le gouvernement du Nouveau-Brunswick a annonc&eacute; un nouveau financement pour le soutien des gens qui travaillent aupr&egrave;s des personnes &acirc;g&eacute;es de la province.<br />\r\n	&nbsp;<br />\r\n	Le premier ministre Brian Gallant a annonc&eacute; qu&rsquo;une somme de 20 millions visera six objectifs &agrave; atteindre pour le soin des personnes &acirc;g&eacute;es de la province. Les initiatives incluront des augmentations de salaire pour les soignants des foyers de soins sp&eacute;ciaux et les travailleurs de soutien &agrave; domicile.<br />\r\n	&nbsp;<br />\r\n	Les responsabilit&eacute;s quotidiennes de Jenna Wallace comme pr&eacute;pos&eacute;e aux soins personnels dans un foyer de soins sp&eacute;ciaux de Saint John varient d&rsquo;une journ&eacute;e &agrave; l&rsquo;autre. Ses responsabilit&eacute;s vont de la pr&eacute;paration du repas du midi des clients &agrave; l&rsquo;administration de m&eacute;dicaments et &agrave; celle de premi&egrave;re intervenante en cas d&rsquo;incident.<br />\r\n	&nbsp;<br />\r\n	Mme Wallace gagne 11,75&nbsp;$ l&rsquo;heure. Selon une &eacute;tude men&eacute;e par le gouvernement du Nouveau-Brunswick, c&rsquo;est le plus bas salaire du pays.<br />\r\n	&nbsp;<br />\r\n	Nous comprenons en tant que gouvernement qu&rsquo;il est important de relever le plus important de tous nos d&eacute;fis&nbsp;: la population vieillissante&nbsp;&raquo;, dit le premier ministre Brian Gallant.<br />\r\n	&nbsp;<br />\r\n	Tina Learmonth, de l&#39;Association de soutien &agrave; domicile, dit que l&rsquo;organisme a demand&eacute; des changements au gouvernement.<br />\r\n	&nbsp;<br />\r\n	&laquo;&nbsp;Nous avons fait une pr&eacute;sentation en demandant que les travailleurs de soutien &agrave; domicile et les travailleurs des foyers de soins sp&eacute;ciaux gagnent 15,50&nbsp;$ comme salaire de base lors de leur entr&eacute;e dans le secteur&nbsp;&raquo;, dit Mme Learmonth.<br />\r\n	&nbsp;<br />\r\n	Jusqu&rsquo;ici, on n&rsquo;a pas dit &agrave; Mme Learmonth si la demande &eacute;tait approuv&eacute;e, mais l&rsquo;annonce de cette semaine est accueillie par les employ&eacute;s avec un optimisme prudent.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n	&nbsp;<br />\r\n	La pr&eacute;sidente de l&rsquo;association, Jan Seely, dit que le recrutement et la r&eacute;tention des employ&eacute;s sont une difficult&eacute; constante.<br />\r\n	&nbsp;<br />\r\n	&laquo;&nbsp;Nous ne savons pas quel sera ce montant pour le personnel; nous esp&eacute;rons que ce sera un investissement important&nbsp;&raquo;, dit Mme Seely.<br />\r\n	&nbsp;<br />\r\n	La m&egrave;re de Beverly Lockhart est pensionnaire d&rsquo;un foyer de soins sp&eacute;ciaux. Mme Lockhart dit que le taux de roulement des soignants est p&eacute;nible pour les personnes &acirc;g&eacute;es.<br />\r\n	&nbsp;<br />\r\n	&laquo;&nbsp;Quand le taux de roulement est si &eacute;lev&eacute;, cela veut dire qu&rsquo;il y a une nouvelle personne dans sa chambre tous les quelques mois et que c&rsquo;est un nouveau processus d&rsquo;apprentissage pour cette personne aussi bien que pour ma m&egrave;re, et c&rsquo;est une situation tr&egrave;s difficile pour les personnes &acirc;g&eacute;es&nbsp;&raquo;, dit Mme Lockhart.<br />\r\n	&nbsp;<br />\r\n	Avec le vieillissement de la population, les employ&eacute;s disent que la demande de services dans la province augmente rapidement.</p>\r\n', NULL, 'NBSCHA Affordable. Quality. Now.', '', '', 'fr'),
(7, 5, 'NBSCHA Affordable. Quality. Now.', '<p>\r\n	New Brunswick Special Care Home Association offers over 400 homes with up to 1000 available beds. Affordable quality health care available right now.</p>\r\n', '<p>\r\n	New Brunswick Special Care Home Association offers over 400 homes with up to 1000 available beds. Affordable quality health care available right now.</p>\r\n', '', 'NBSCHA Affordable. Quality. Now.', NULL, NULL, 'en'),
(8, 6, 'Long-term care workers want better access to vaccinations', 'Dominic Cardy tells workers to get vaccinated and do it now. Education Minister Dominic Cardy had some strong words for those who work in long-term care homes who haven\'t been vaccinated — get the shot and do it now.', '<div>\r\n	Education Minister Dominic Cardy had some strong words for those who work in long-term care homes who haven&#39;t been vaccinated &mdash; get the shot and do it now.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&quot;I want to call on any long-term care workers who have not yet received their vaccine to consider the lives of the people you care for each and every day, not abstract Facebook pages filled with conspiracies and foolishness, but real, live people,&quot; Cardy said during Tuesday&#39;s COVID briefing.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	He prefaced his comments by mentioning the deaths of two residents of a special-care home in Grand Falls on Sunday.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Denise Levesque was one of those. Her granddaughter, Denise Miller, said she was furious that so many long-term care workers still aren&#39;t vaccinated.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Cardy said it&#39;s important for society &quot;to take every measure possible&quot; to protect its most vulnerable residents.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&quot;Right now, that means one thing &mdash; get vaccinated and get vaccinated as soon as you&#39;re allowed,&quot; he said.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&quot;For those folks working in those special care homes, this is the best thing you can do to protect those people who depend on you every day.&quot;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	To keep them safe, Cardy said it&#39;s &quot;crucial&quot; for workers to get vaccinated.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	But the groups who represent many of those homes and the people who work in them say the issue is more complicated than people simply refusing the vaccine.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Sharon Teare, president of the New Brunswick Council of Nursing Home Unions, which represents workers in 51 of the province&#39;s nursing homes, said most workers are willing &mdash; some just don&#39;t have easy access to clinics.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	At the moment, workers in long-term care homes have to register through their regional health authority, and sometimes that means travelling an hour and a half to a clinic.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<div>\r\n		Local pharmacies are restricted to eligible age groups only, not priority groups determined by the province. So until a worker&#39;s age group becomes eligible, they have to go where the Horizon or Vitalit&eacute; authorities tell them to get the shot.&nbsp;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		Teare said her group saw a &quot;higher uptake&quot; among workers when clinics were held right in the nursing home.&nbsp;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		She said if the province really wants to increase vaccination rates, it should &quot;allow those in the nursing homes, in the long-term homes and special-care homes to be able to call their pharmacy and schedule an appointment.&quot;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		At Tuesday&#39;s briefing, the province&#39;s chief medical officer of health initially said she wasn&#39;t aware of the restriction, but later said she was corrected by staff.&nbsp;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		Dr. Jennifer Russell confirmed that workers at long-term care homes cannot receive their vaccine shots at pharmacies until their age cohort becomes eligible &quot;but we are going to look at modifying that for the future.&quot;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		The executive director of the New Brunswick Association of Nursing Homes, an advocate for all 70 licensed nursing homes in New Brunswick, also believes access is a big reason some workers have not been vaccinated.</div>\r\n</div>\r\n<div>\r\n	Jodi Hall said a &quot;snapshot&quot; of the situation in mid-March revealed that 60 per cent of employees had received a vaccination.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&quot;But that doesn&#39;t mean the other 40 per cent have refused,&quot; she said.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Hall said there have been some &quot;access issues along the way.&quot;&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	She anticipates numbers to continue to climb since employees will be included as the second-dose round of clinics makes its way through the province.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&quot;We know from other experiences that when these clinics were offered on site and highly accessible to staff that there was a higher uptake,&quot; said Hall.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<strong>Vaccine hesitancy in decline</strong></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Last month, Premier Blaine Higgs noted that &quot;only 59 per cent of long-term care workers have chosen to be vaccinated,&quot; compared with more than 90 per cent of residents of homes and about 90 per cent of workers at regional health authorities.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Public Health officials were asked for updated statistics but did not provide them by publication time.&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<div>\r\n		Jan Seely, president of the New Brunswick Special Care Home Association, said the number of vaccinated workers has increased over the last couple of months as workers get better access to vaccines.&nbsp;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		She also said workers have had time to get familiar with the vaccines, their risks and benefits. She believes vaccine hesitancy declined as more information became available.&nbsp;</div>\r\n	<div>\r\n		&nbsp;</div>\r\n	<div>\r\n		&quot;Resistance levels amongst special care home staff are not a result of staff not caring about the safety of their residents.&quot;</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '', 'Long-term care workers want better access to vaccinations', NULL, NULL, 'en'),
(9, 7, 'N.B. government announces new funding for special care home providers', 'Earlier in the week, the New Brunswick government announced new funding to support people working with seniors in the province.', '<div>\r\n	Earlier in the week, the New Brunswick government announced new funding to support people working with seniors in the province.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Premier Brian Gallant announced that $20 million will go towards six objectives to be met for senior care in the province. The initiatives will include wage increases for special care home providers and home support workers.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Jenna Wallace&#39;s daily responsibilities as a personal support worker at a special care home in Saint John vary from day to day. Her duties range from preparing lunch for clients to administering medication to being a first responder on an incident.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Wallace makes $11.75 an hour. According to a study conducted by the New Brunswick government, that is the lowest wage in the country.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;We understand as a government it&rsquo;s important to tackle our number one challenge&hellip; an aging population,&rdquo; says Premier Brian Gallant.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Tina Learmonth of the home support association says the group had requested change from the government.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;We put a presentation in requesting that home support workers and special care home workers alike make $15.50 as a base entry wage to the industry,&rdquo; says Learmonth.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	So far, Learmonth hasn&rsquo;t been told if their request was approved, but this week&rsquo;s announcement has left employees cautiously optimistic.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	President of the association, Jan Seely says recruiting and retaining employees is a constant struggle.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;We don&rsquo;t know what that amount will be for the staff, we hope it&rsquo;s a significant investment,&rdquo; Seely says.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Beverly Lockhart&rsquo;s mother is a resident in the special care home. Lockhart says the turnover rate of care workers is hard on seniors.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;When the turnover rate is so high, it means a new person in her room every few months and it&rsquo;s a new learning process for that person as well as my mom and it&rsquo;s very difficult for seniors to do that,&rdquo; says Lockhart.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	With an aging population, employees say the demand for services in the province is increasing rapidly.</div>\r\n', '', 'N.B. government announces new funding for special care home providers', NULL, NULL, 'en'),
(10, 8, '$27.4 million increase in funding for adult residential facilities', 'RIVERVIEW (GNB) – The provincial government is increasing the funding allocated to adult residential facilities for services provided to seniors and to people with a disability.', '<div>\r\n	RIVERVIEW (GNB) &ndash; The provincial government is increasing the funding allocated to adult residential facilities for services provided to seniors and to people with a disability.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	For the 2021-22 fiscal year, the government will provide a retroactive payment of $20.1 million through an increase to the per diem costs for the services provided to 7,000 residents. A permanent increase of $10 per resident per day will come into effect on Jan. 1, 2023, totalling an annual increase of $27.4 million.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;Adult residential facilities are important components in our long-term care system,&rdquo; said Social Development Minister Bruce Fitch. &ldquo;They provide the essential services that allow adults with a disability and seniors to get the care they need in their own communities, thus avoiding more costly services such as nursing home placements and hospitalization.&rdquo;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The Department of Social Development provides per diems to adult residential facilities for subsidized clients based on an established rate and assists clients with the cost of living in these facilities when they are unable to pay the full cost. In special care homes, about 90 per cent of long-term residents and all the clients of the Disability Support Program are subsidized.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The department has been working with its partners, the New Brunswick Special Care Home Association and L&rsquo;Association Francophone Des &Eacute;tablissements de Soins Sp&eacute;ciaux Du N.-B., to evaluate the per diems and establish a funding model. Following the complete implementation of the increases, the per diem will vary between $100.86 and $163.91, depending upon the level of care provided to the resident.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;Our association was pleased to work with the government at the committee level to find the right funding model for sustainable care in the adult residential care sector,&rdquo; said John Grass, vice-president of the New Brunswick Special Care Home Association and owner of Grass Home special care home in Riverview. &ldquo;We look forward to pursuing the collaboration with the provincial government in providing important services to New Brunswickers.&rdquo;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The new investment will increase the total annual budget for per diem in adult residential facilities to about $197 million in 2023. The increase will help alleviate the increase in costs at these facilities.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	There are about 475 adult residential facilities in the province providing care and services to about 7,000 residents. The breakdown is as follows:</div>\r\n<ul>\r\n	<li>\r\n		Special care homes provide care to about 4,000 seniors as well as to 1,863 adults with disabilities.</li>\r\n	<li>\r\n		Memory care and generalist care homes provide care to 532 people.</li>\r\n	<li>\r\n		Community residences provide care to about 595 people, the majority of whom are adults with a disability.</li>\r\n</ul>\r\n<div>\r\n	&ldquo;This investment in the operational costs of the adult residential facilities is in addition to the investment made last year to increase wages for workers in these important long-term care facilities,&rdquo; said Fitch. &ldquo;We have invested $12.4 million to fund wage increases for over 10,000 workers in the human service sector, including special care home workers, community residence workers, home support workers and family support workers.&rdquo;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The long-term care system in New Brunswick offers a continuum of support to people who can no longer live safely in their own homes. Special care, memory care and generalist care homes and community residences provide varying levels of service to clients. Care and supervision in these types of facilities is provided primarily by personal support workers or human service counsellors. Nursing homes provide care to people who benefit from access to 24-hour nursing care. Per diems differ for each type of facility.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	In addition to the increased spending for adult residential facilities, the province is also increasing the hours of care in nursing homes to 3.3 hours per resident in April. This represents a $15 million increase in the annual budget for services in the 71 nursing homes, and their 4,953 beds, across the province.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	The government also plans to increase the number of licensed nursing homes to 80 over the next few years.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&ldquo;The provincial government is dedicated to ensuring that our health-care and long-term care systems provide people with the right kind of care at the right time,&rdquo; said Fitch. &ldquo;Our adult residential facilities, as well as our network of nursing homes, play a key role in the continuum of care for the benefit of our aging population.&rdquo;</div>\r\n', '', '$27.4 million increase in funding for adult residential facilities', NULL, NULL, 'en'),
(11, 8, 'Augmentation de 27,4 millions de dollars au titre du financement accordé aux établissements résidentiels pour adultes', 'RIVERVIEW (GNB) –  Le gouvernement provincial augmente le financement accordé aux établissements résidentiels pour adultes pour les services fournis aux personnes âgées et aux personnes vivant avec un handicap.', '<p>\r\n	RIVERVIEW (GNB) &ndash; &nbsp;Le gouvernement provincial augmente le financement accord&eacute; aux &eacute;tablissements r&eacute;sidentiels pour adultes pour les services fournis aux personnes &acirc;g&eacute;es et aux personnes vivant avec un handicap.<br />\r\n	&nbsp;<br />\r\n	Pour l&rsquo;exercice financier 202 1 &agrave; 2022, le gouvernement versera un paiement r&eacute;troactif de 20,1 millions de dollars au moyen d&rsquo;une augmentation des indemnit&eacute;s quotidiennes pour les services fournis &agrave; 7000 r&eacute;sidents. Une augmentation permanente de 10&nbsp;$ par r&eacute;sident par jour entrera en vigueur le 1er&nbsp;janvier 2023, ce qui correspond &agrave; une augmentation annuelle totale de 27,4 millions.<br />\r\n	<br />\r\n	&laquo;&nbsp;Les &eacute;tablissements r&eacute;sidentiels pour adultes sont des &eacute;l&eacute;ments importants de notre syst&egrave;me de soins de longue dur&eacute;e&nbsp;&raquo;, a d&eacute;clar&eacute; le ministre du D&eacute;veloppement social, Bruce Fitch. &laquo;&nbsp;Ils fournissent des services essentiels qui permettent aux adultes vivant avec un handicap et aux personnes &acirc;g&eacute;es d&rsquo;obtenir les soins dont ils ont besoin dans leur propre communaut&eacute;, &eacute;vitant ainsi des services plus co&ucirc;teux comme les placements dans un foyer de soins et les s&eacute;jours &agrave; l&rsquo;h&ocirc;pital.&nbsp;&raquo;<br />\r\n	<br />\r\n	Le minist&egrave;re du D&eacute;veloppement social verse aux &eacute;tablissements r&eacute;sidentiels pour adultes des indemnit&eacute;s quotidiennes pour les clients subventionn&eacute;s en fonction d&rsquo;un taux &eacute;tabli. Il aide ainsi les clients &agrave; vivre dans ces &eacute;tablissements lorsqu&rsquo;ils ne sont pas en mesure de payer la totalit&eacute; des co&ucirc;ts. Dans les foyers de soins sp&eacute;ciaux, environ 90&nbsp;pour cent des r&eacute;sidents &agrave; long terme et tous les clients du Programme de soutien aux personnes ayant un handicap sont subventionn&eacute;s.<br />\r\n	<br />\r\n	Le minist&egrave;re travaille avec ses partenaires, l&rsquo;Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick et l&rsquo;Association francophone des &eacute;tablissements de soins sp&eacute;ciaux du Nouveau-Brunswick, pour &eacute;valuer le montant des indemnit&eacute;s quotidiennes et &eacute;tablir un mod&egrave;le de financement. Apr&egrave;s la mise en &oelig;uvre compl&egrave;te des augmentations, l&rsquo;indemnit&eacute; quotidienne variera entre 100,86&nbsp;$ et 163,91&nbsp;$, selon le niveau de soins fourni au r&eacute;sident.<br />\r\n	<br />\r\n	&laquo;&nbsp;Notre association est heureuse d&rsquo;avoir travaill&eacute; avec le gouvernement au niveau du comit&eacute; afin de trouver le bon mod&egrave;le de financement pour assurer la viabilit&eacute; des soins offerts dans les r&eacute;sidences pour adultes&nbsp;&raquo;, a affirm&eacute; le vice-pr&eacute;sident de l&rsquo;Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick et propri&eacute;taire du foyer de soins sp&eacute;ciaux Grass Home &agrave; Riverview, John Grass. &laquo;&nbsp;Nous sommes impatients de poursuivre notre collaboration avec le gouvernement provincial afin d&rsquo;offrir d&rsquo;importants services aux gens du Nouveau-Brunswick.&nbsp;&raquo;<br />\r\n	<br />\r\n	Ce nouvel investissement portera le budget annuel total des indemnit&eacute;s quotidiennes dans les &eacute;tablissements r&eacute;sidentiels pour adultes &agrave; environ 197 millions de dollars en 2023. Cette augmentation permettra d&rsquo;att&eacute;nuer l&rsquo;effet des co&ucirc;ts croissants dans ces &eacute;tablissements.<br />\r\n	<br />\r\n	Dans la province, environ 475 &eacute;tablissements r&eacute;sidentiels pour adultes fournissent des soins et des services &agrave; environ 7&nbsp;000 r&eacute;sidents. Plus pr&eacute;cis&eacute;ment&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		les foyers de soins sp&eacute;ciaux fournissent des soins &agrave; environ 4&nbsp;000 personnes &acirc;g&eacute;es ainsi qu&rsquo;&agrave; 1&nbsp;863 adultes vivant avec un handicap;</li>\r\n	<li>\r\n		les foyers de soins de la m&eacute;moire et les foyers de soins g&eacute;n&eacute;ralistes fournissent des soins &agrave; 532 personnes; et</li>\r\n	<li>\r\n		les r&eacute;sidences communautaires fournissent des soins &agrave; environ 595 personnes, dont la majorit&eacute; constitue des adultes vivant avec un handicap.</li>\r\n</ul>\r\n<p>\r\n	<br />\r\n	&laquo;&nbsp;Cet investissement dans les co&ucirc;ts op&eacute;rationnels des &eacute;tablissements r&eacute;sidentiels pour adultes s&rsquo;ajoute &agrave; l&rsquo;investissement effectu&eacute; l&rsquo;an dernier pour augmenter les salaires des travailleurs dans ces importants &eacute;tablissements de soins de longue dur&eacute;e, a dit M. Fitch. Nous avons investi 12,4 millions de dollars afin de financer les augmentations salariales de plus de 10&thinsp;000 travailleurs du secteur des services &agrave; la population, notamment les travailleurs des foyers de soins sp&eacute;ciaux et des r&eacute;sidences communautaires, les travailleurs des services de soutien &agrave; domicile et les pr&eacute;pos&eacute;s aux services de soutien &agrave; la famille.&nbsp;&raquo;<br />\r\n	<br />\r\n	Le syst&egrave;me de soins de longue dur&eacute;e au Nouveau-Brunswick offre un continuum de mesures de soutien aux personnes qui ne peuvent plus vivre dans leur propre domicile en toute s&eacute;curit&eacute;. Les foyers de soins sp&eacute;ciaux, les foyers de soins de la m&eacute;moire, les foyers de soins g&eacute;n&eacute;ralistes et les r&eacute;sidences communautaires offrent divers niveaux de service &agrave; leurs clients. Les soins et la supervision dans ces genres d&rsquo;&eacute;tablissements sont principalement assur&eacute;s par des pr&eacute;pos&eacute;s aux services de soutien &agrave; la personne ou par des conseillers en services &agrave; la personne. Les foyers de soins fournissent &agrave; leurs clients des soins infirmiers 24 heures sur 24. Les indemnit&eacute;s quotidiennes varient pour chaque type d&rsquo;&eacute;tablissement.<br />\r\n	<br />\r\n	En plus de l&rsquo;investissement suppl&eacute;mentaire dans les &eacute;tablissements r&eacute;sidentiels pour adultes, le gouvernement augmente &eacute;galement les heures de soins dans les foyers de soins, passant &agrave; 3,3 heures par r&eacute;sident en avril. Cela correspond &agrave; une augmentation de 15 millions $ dans le budget annuel pour les services offerts dans les 71 foyers de soins, repr&eacute;sentant 4953 lits dans l&rsquo;ensemble de la province.<br />\r\n	<br />\r\n	Le gouvernement pr&eacute;voit &eacute;galement porter &agrave; 80 le nombre de foyers de soins agr&eacute;&eacute;s au cours des prochaines ann&eacute;es.<br />\r\n	<br />\r\n	&laquo;&nbsp;Le gouvernement provincial est d&eacute;termin&eacute; &agrave; faire en sorte que nos syst&egrave;mes de sant&eacute; et de soins de longue dur&eacute;e fournissent aux gens les bons soins au bon moment, a d&eacute;clar&eacute; M. Fitch. Nos &eacute;tablissements r&eacute;sidentiels pour adultes, ainsi que notre r&eacute;seau de foyers de soins, jouent un r&ocirc;le cl&eacute; dans l&rsquo;ensemble des soins au profit de notre population vieillissante.&nbsp;&raquo;</p>\r\n', NULL, NULL, NULL, NULL, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_video` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `class`, `banner_image`, `banner_video`, `status`) VALUES
(1, '', 'home', NULL, NULL, 1),
(2, '', 'pagenotfound', NULL, NULL, 1),
(3, '', 'register', NULL, NULL, 1),
(4, 'about', 'about', NULL, NULL, 1),
(5, 'residences', 'residences', '', '', 1),
(6, 'board', 'board', '', '', 1),
(7, 'sponsors', 'sponsors', '', '', 1),
(8, 'news', 'news', '', '', 1),
(9, 'contact', 'contact', '', '', 1),
(10, 'news-details', 'news-detail', '', '', 1),
(11, 'board-member-page', 'board', '', '', 1),
(12, 'residence-page', 'residence', '', '', 1),
(13, 'faq', 'faq', '', '', 1),
(14, 'covid-19-statement', NULL, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages_desc`
--

CREATE TABLE `pages_desc` (
  `desc_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_desc`
--

INSERT INTO `pages_desc` (`desc_id`, `page_id`, `title`, `subtitle`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(1, 1, 'Home', NULL, 'Home', NULL, NULL, 'en'),
(2, 2, 'Page not found', NULL, 'Page not found', NULL, NULL, 'en'),
(3, 1, 'Accueil', '', 'Home', NULL, NULL, 'fr'),
(4, 2, 'Page not found', NULL, 'Page not found', NULL, NULL, 'fr'),
(5, 3, 'Register', NULL, 'Register', NULL, NULL, 'en'),
(6, 3, 'Register', NULL, 'Register', NULL, NULL, 'fr'),
(7, 4, 'About Us', NULL, 'About Us', NULL, NULL, 'en'),
(8, 4, 'Qui nous sommes', '', 'About Us', NULL, NULL, 'fr'),
(9, 5, 'Residences', '', 'Residences', NULL, NULL, 'en'),
(10, 6, 'Board of Directors', '', 'Board', NULL, NULL, 'en'),
(11, 7, 'Sponsors', '', 'Sponsors', NULL, NULL, 'en'),
(12, 8, 'News', '', 'News', NULL, NULL, 'en'),
(13, 9, 'Contact', '', 'Contact', NULL, NULL, 'en'),
(14, 10, 'News Details', '', 'News Details', NULL, NULL, 'en'),
(15, 11, 'Board Member Page', '', 'Board Member Page', NULL, NULL, 'en'),
(16, 12, 'Residence Page', '', 'Residence Page', NULL, NULL, 'en'),
(17, 13, 'FAQ', '', 'FAQ', NULL, NULL, 'en'),
(18, 14, 'Covid-19 Statement', '', 'Covid-19 Statement', NULL, NULL, 'en'),
(19, 5, 'Résidences', '', 'Residences', NULL, NULL, 'fr'),
(20, 6, 'Membres du Conseil', '', 'Board', NULL, NULL, 'fr'),
(21, 7, 'Promoteurs', '', 'Sponsors', NULL, NULL, 'fr'),
(22, 9, 'Contact', '', 'Contact', NULL, NULL, 'fr'),
(23, 8, 'Nouvelles', '', 'Nouvelles', '', '', 'fr'),
(24, 10, 'News Details', '', 'News Details', NULL, NULL, 'fr'),
(25, 11, 'Board Member Page', '', 'Board Member Page', NULL, NULL, 'fr'),
(26, 12, 'Residence Page', '', 'Residence Page', NULL, NULL, 'fr'),
(27, 13, 'FAQ', '', 'FAQ', NULL, NULL, 'fr'),
(28, 14, 'Déclaration sur la COVID-19', '', 'Covid-19 Statement', NULL, NULL, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `content_type` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `content` text,
  `gallery` text,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_id`, `content_type`, `title`, `subtitle`, `image`, `video`, `content`, `gallery`, `sort_order`, `language`) VALUES
(1, 14, 'text_only', '', '', '', '', '<p>\r\n	2020 and 2021 have been challenging years for the entire world as we navigate this ever-changing pandemic.&nbsp; Much preparation has taken place to ensure Special Care Homes in New Brunswick are prepared, supported, and operating with the utmost emphasis on safety, while ensuring quality care services are maintained for our residents.</p>\r\n<p>\r\n	The two provincial associations have worked in unison with the multiple government departments and have continued to have your back with regards to ensuring proper supply to PPE, additional funding for your staff, financial subsidy to assist with additional costs related to COVID, securing funding, and helping prepare a comprehensive Operational Plan template (reach out to your association and we will forward you the link) that you can edit for your own personal use, and much much more.</p>\r\n<p>\r\n	Although our province has experienced a few outbreaks and unfortunately some deaths due to this disease, we are extremely grateful for our thousands of dedicated employees and hundreds of operators that have stayed the course and worked so hard to keep our residents and each other as safe as possible.</p>\r\n<p>\r\n	We have also assisted, alongside the Department of Social Development and the Extra-Mural Program of NB, in ensuring you have direct access to the most up-to-date COVID-19 information, statistics, vaccine clinic protocol, inspection protocols and preparedness, and many other helpful ways.</p>\r\n<p>\r\n	Our residents and their families and friends have experienced major interruptions in their time spent together.&nbsp; However, due to the incredible dedication and organizational ability of our operators, every effort has been made to ensure access to each other.&nbsp; The most up-to-date guidance information can be accessed at&nbsp;<a href=\"https://www2.gnb.ca/content/dam/gnb/Departments/h-s/pdf/Adult-Residential-Facilities-Nursing-Homes.pdf\" rel=\"noopener\" target=\"_blank\">https://www2.gnb.ca/content/dam/gnb/Departments/h-s/pdf/Adult-Residential-Facilities-Nursing-Homes.pdf</a></p>\r\n<p>\r\n	Provincial visiting protocols for each phase and accurate tools for operators and staff to help with increased infection control practices, isolation methods, reporting requirements, and many other topics can be accessed in this guidance document and also through directly contacting your association.</p>\r\n<p>\r\n	General public are encouraged to also view the visitation guidelines prepared by GNB at&nbsp;<a href=\"https://www2.gnb.ca/content/dam/gnb/Departments/h-s/pdf/arf_visitation_guidance_yellow-e.pdf\" rel=\"noopener\" target=\"_blank\">https://www2.gnb.ca/content/dam/gnb/Departments/h-s/pdf/arf_visitation_guidance_yellow-e.pdf</a></p>\r\n<p>\r\n	If operators are looking for help with completing their own operational plan for their residence please feel free to contact your association.</p>\r\n<p>\r\n	Take care everyone, and be safe</p>\r\n<p>\r\n	Board of Directors, NBSCHA</p>\r\n', NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `page_widgets`
--

CREATE TABLE `page_widgets` (
  `page_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_widgets`
--

INSERT INTO `page_widgets` (`page_id`, `widget_id`, `sort_order`) VALUES
(1, 4, 2),
(1, 5, 1),
(1, 6, 3),
(1, 9, 4),
(4, 2, 1),
(4, 3, 3),
(4, 13, 2),
(4, 14, 4),
(5, 11, 1),
(6, 7, 1),
(7, 12, 1),
(8, 10, 1),
(9, 15, 1),
(13, 8, 1),
(14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `rid` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`rid`, `sort_order`, `status`, `delete_status`) VALUES
(1, 0, 1, 0),
(2, 1, 1, 0),
(3, 2, 1, 0),
(4, 3, 1, 0),
(5, 4, 1, 0),
(6, 5, 1, 0),
(7, 6, 1, 0),
(8, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `regions_desc`
--

CREATE TABLE `regions_desc` (
  `desc_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions_desc`
--

INSERT INTO `regions_desc` (`desc_id`, `region_id`, `region_name`, `language`) VALUES
(1, 1, 'Region 1: Moncton', 'en'),
(2, 2, 'Region 2: Saint John', 'en'),
(3, 3, 'Region 3: Fredericton', 'en'),
(4, 4, 'Region 4: Edmundston', 'en'),
(5, 5, 'Region 5: Restigouche', 'en'),
(6, 6, 'Region 6: Chaleur', 'en'),
(7, 7, 'Region 7: Miramichi', 'en'),
(8, 8, 'Region 8: Acadian Peninsula', 'en'),
(9, 1, 'Region 1: Moncton', 'fr'),
(10, 2, 'Region 2: Saint John', 'fr'),
(11, 3, 'Region 3: Fredericton', 'fr'),
(12, 4, 'Region 4: Edmundston', 'fr'),
(13, 5, 'Region 5: Restigouche', 'fr'),
(14, 6, 'Region 6: Chaleur', 'fr'),
(15, 7, 'Region 7: Miramichi', 'fr'),
(16, 8, 'Region 8: Acadian Peninsula', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `renewal_requests`
--

CREATE TABLE `renewal_requests` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `previous_package_id` int(11) NOT NULL,
  `previous_issue_date` timestamp NULL DEFAULT NULL,
  `previous_expiry_date` timestamp NULL DEFAULT NULL,
  `new_package_id` int(11) NOT NULL,
  `new_max_beds_count` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `payment_comments` text,
  `payment_info` text NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `processed_by` int(11) NOT NULL,
  `processed_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `residences`
--

CREATE TABLE `residences` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `max_beds_count` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  `mainimage` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `virtual_tour` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `features` text NOT NULL,
  `beds_count` int(11) NOT NULL,
  `vacancy` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `residences`
--

INSERT INTO `residences` (`id`, `slug`, `member_id`, `address`, `postalcode`, `contact_name`, `email`, `phone`, `fax`, `package_id`, `max_beds_count`, `language_id`, `level_id`, `pharmacy_name`, `facilities`, `region_id`, `mainimage`, `image2`, `image3`, `image4`, `image5`, `image6`, `virtual_tour`, `facebook`, `instagram`, `twitter`, `youtube`, `linkedin`, `website`, `features`, `beds_count`, `vacancy`, `created`, `status`) VALUES
(1, 'seely-lodge', 1, '3277 Westfield, Saint John, NB E2M 7B5', 'E2M7B5', 'Jan Seely', 'janseely@rogers.com', '506-639-4478', '506-217-1700', 1, 12, 1, 1, 'Lawtons Catherwood st. Saint John', '4,1,2', 2, '1617303527-1606617e76d231.jpeg', '1617303527-1606617e76ed98.jpeg', '1650200112-1625c0e30e8771.jpg', '1650200112-1625c0e30ea612.jpg', '1650200112-1625c0e30ebf6b.jpg', '1650200112-1625c0e30ed97f.jpg', 'https://youtu.be/KpT8AejC_ww', 'https://www.facebook.com/seely.lodge.9', '', '', '', '', 'https://www.murraystseelylodgesch.com', 'a:28:{i:1;s:1:\"1\";i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2021-04-01 18:58:47', 1),
(2, 'birchmount-lodge', 2, '144 Birchmount Drive, Moncton by', 'E1C8E7', 'Joanne Allen', 'openarmscare@hotmail.com', '506-384-7573', '506-384-7523', 2, 32, 1, 1, 'Medicine Shoppe 294', '2', 1, '1612457219-1601c2503cca45.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:8:{i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 40, 0, '2020-11-13 16:59:45', 1),
(3, 'victoria-villa-inc', 3, '566 East Riverside Dr., Perth-Andover', 'E7H 1Z4', 'Tam Yuan', 'tyuan@valinorhome.ca', '506-273-9394', '506-273-9797', 2, 24, 1, 1, 'Johnson\'s Guardian', '1', 3, '1617623143-1606af86734e41.jpg', '1621246016-160a24040d8d0f.JPG', '1621246016-160a24040db562.JPG', '1621246016-160a24040ddccd.JPG', '1621246016-160a24040e051a.JPG', '1621246016-160a24040e2faf.JPG', '', 'https://www.facebook.com/Victoria-Villa-Inc-Special-Care-Home-187805967969814', '', '', '', '', 'http://www.victoriavilla.ca', 'a:16:{i:7;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 40, 0, '2021-04-05 11:45:43', 1),
(4, 'all-needs-special-care-home-inc', 4, '152 Douglas Avenue, Fredericton NB E3A 2N9', 'E3A 2N9', 'Miluska H Walton', 'miluskahwalton@gmail.com', '(506)459-2186', '(506)459-0120', 1, 8, 1, 1, 'Fredericton Sobeys Northside', '4', 3, '1605288146-15faec0d25a22c.jpeg', '1605288146-15faec0d25a72e.jpeg', '1617801340-1606db07c94989.JPG', '1618950129-1607f37f133707.JPG', '1619292804-160847284db800.JPG', '1618950129-1607f37f13a92a.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-11-13 17:22:26', 1),
(5, 'alouette-special-care-home', 5, '2100 Amirault Street, Dieppe, NB E1A 7K4', 'E1A 7K4', 'Elizabeth McLay', 'administration@alouetteresidence.ca', '5068579200', '5068579201', 3, 55, 1, 1, 'Dieppe Pharmacy', '2', 1, '1605288590-15faec28ee8951.png', '1605288590-15faec28ee8ac7.png', '1605288590-15faec28eeb590.jpg', '1605288590-15faec28eec3df.JPG', '1605288590-15faec28eecc60.JPG', '1605288590-15faec28eed133.JPG', '', '', '', '', '', '', 'https://alouettespecialcarehome.com/', 'a:17:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 60, 15, '2020-11-13 17:29:50', 1),
(6, 'concorde-hall', 6, '15 Shannex Drive', 'E2E 0M5', 'Kim Davis', 'kdavis@shannex.com', '506-848-3194', '848-3201', 3, 60, 1, 1, 'Lawton\'s', '1', 2, '1623024369-160bd62f1b28e3.jpg', NULL, NULL, NULL, NULL, NULL, '', 'https://www.facebook.com/experienceparkland', 'https://www.instagram.com/experienceparkland/', '', 'https://www.youtube.com/user/ExperienceParkland', '', 'https://experienceparkland.com', 'a:19:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 60, 10, '2020-11-13 17:50:06', 1),
(7, 'hillside-view-special-care-home', 7, '560 Front Mountain Road, Moncton NB E1G 3H3', 'E1G3H3', 'Mary Phillips', 'hillsideview13@gmail.com', '5063883018', '5063883018', 1, 13, 1, 4, 'Jean Coutu', '1', 1, '1605290585-15faeca5903702.jpg', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:28:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 1, '2020-11-13 18:03:05', 1),
(8, 'loch-lomond-villa-special-care-home', 8, '185 Loch Lomond Rd, Saint John, NB E2J 3S3', 'E2J 3S3', 'Cindy', 'cleavitt@lochlomondvilla.com', '5066438497', '5066438283', 1, 18, 1, 1, 'Lawton\'s Pharmacy', '1', 2, '1605291757-15faeceed322de.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:5:{i:12;s:1:\"1\";i:13;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-13 18:22:37', 1),
(9, 'paradise-villa-inc', 9, '665 Clements Drive, Fredericton', 'E1G 7J2', 'Monique Corbett', 'directorofcare@paradise-villa.ca', '506-443-8000', '506-454-3413', 4, 0, 1, 1, 'Lawtons', '1', 3, '1617719585-1606c7121811e1.jpg', '1617719585-1606c712181768.jpg', '1617719585-1606c712183436.JPG', '1617719585-1606c712186606.JPG', '1617719585-1606c712189620.JPG', '1617719585-1606c71218c67c.JPG', NULL, 'https://www.facebook.com/paradisevillainc/', NULL, NULL, NULL, NULL, 'https://paradise-villa.ca/', 'a:20:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 0, 0, '2020-11-13 19:01:15', 1),
(10, 'mazerolle-special-care-home-ltd', 10, '448 Gauvin Rd, Dieppe NB E1A 1M1', 'E1A1M1', 'Darlene Mazerolle', 'd_mazerolle96@hotmail.com', '506.869.0624', '506.855.5911', 2, 26, 1, 1, 'Familiprix', '4', 1, '1619054772-16080d0b43d88a.jpg', '1619047615-16080b4bf025e3.jpg', '1619047615-16080b4bf03ec3.jpg', '1619047615-16080b4bf05da3.jpg', '1619047615-16080b4bf08182.jpg', '1619047615-16080b4bf08f37.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";}', 40, 3, '2020-11-13 19:33:53', 1),
(11, 'riverdale-manor', 11, '3 Riverdale Dr, Hampton', 'E5N 5k2', 'Krissy travis', 'Krissy5646@gmail.com', '5068324051', '5068328989', 1, 0, 1, 1, 'Lawton sussex', '4', 2, '1631037989-16137aa25c2ee5.jpg', '1631037989-16137aa25c84dd.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:19:{i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-11-13 22:22:13', 1),
(12, 'serenity-cove-special-care-home', 12, '9919 Rte 102, Woodmans Point, NB E5K 4P5', 'E5K 4P5', 'Jennifer Paul Armstrong', 'jennlynnpaul@hotmail.com', '5067578155', '5062170265', 1, 9, 1, 1, 'Guardian Drugs GrandBay', '4,1', 2, '1605393567-15fb05c9fbfca9.jpeg', '1648505766-1624233a663ba5.jpg', '1605393567-15fb05c9fc2bf3.jpeg', '1648505766-1624233a66683b.jpg', '1648505766-1624233a6684c7.jpg', '1648505766-1624233a669479.jpg', 'https://youtu.be/_cXKOkXJ4Wc', '', '', '', '', '', '', 'a:22:{i:1;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:22;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 1, '2020-11-14 22:39:27', 1),
(13, 'riverbend-residence', 13, '158 Wellington St., Miramichi, NB E1N 1L9', 'E1N1L9', 'Sara Williston', 'riverbendresidence@hotmail.com', '506-352-0137', '506-352-3035', 1, 20, 1, 1, 'Shoppers drug mart Douglastown', '1', 7, '1605488540-15fb1cf9cf419c.jpeg', '1605488541-15fb1cf9d0025c.jpeg', '1605488541-15fb1cf9d013ae.jpeg', '1605488541-15fb1cf9d021a8.jpeg', '1605488541-15fb1cf9d03fb2.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:10:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-16 01:02:21', 1),
(14, 'agape-home', 14, '690 Route 121, Bloomfield Norton, NB E5N 4V3', 'E5N4V3', 'Hazen and Fran Cooke', 'agapehome@bellaliant.com', '5068325935', '506 832-8815', 1, 12, 1, 1, 'Lawtons', '4', 2, '1605552535-15fb2c9977c0fa.jpg', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:11:{i:3;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:24;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-16 18:48:55', 1),
(15, 'brunswick-hall', 15, '35 Patience Lane, Fredericton, NB', 'E3B 0K4', 'Penny Smith', 'pennysmith@shannex.com', '506-455-7275', '506-447-6451', 3, 60, 1, 1, 'Lawtons', '1', 3, '3a5215a446ecb739806a87d77ef473ab.jpeg', NULL, NULL, NULL, NULL, NULL, '', 'https://www.facebook.com/experienceparkland', 'https://www.instagram.com/experienceparkland', '', 'https://www.youtube.com/user/ExperienceParkland', '', 'https://experienceparkland.com/', 'a:20:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 60, 5, '2020-11-16 21:00:04', 1),
(16, 'bb-balanced-wellness-center-inccentre-du-mieux-être-équilibré-bb-inc', 16, '49 Bulman Drive Moncton NB', 'E1G1G9', 'Lucie Boudreau', 'balancedwellnesscenter@gmail.com', '506-387-8456', '506-387-7060', 1, 0, 1, 5, 'Lawtons', '', 1, '1605623763-15fb3dfd31048f.PNG', NULL, NULL, NULL, NULL, NULL, NULL, 'https://m.facebook.com/communityresidence/?ref=bookmarks', NULL, NULL, NULL, NULL, NULL, 'a:13:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-17 14:36:03', 1),
(17, 'always-here-care-home', 17, '32 Baxter Rd. Saint John NB', 'E2H2V5', 'Katrina Drost', 'katrina.4.boys@hotmail.com', '506 696 6750', '506 693 6932', 1, 6, 1, 1, 'Lawton’s McAllister', '4', 2, '1605677008-15fb4afd0aabe3.jpeg', '1643319836-161f3121c5052e.jpg', '1643319836-161f3121c51c89.jpg', '1643319836-161f3121c52c74.jpg', '1643319836-161f3121c53873.jpg', '1643319836-161f3121c543c9.jpg', '', '', '', '', '', '', '', 'a:23:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:22;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2020-11-18 05:23:28', 1),
(18, 'slow-current-special-care-home', 18, '1126 Route 148, Nashwaak Village', 'E6C1N2', 'Cristie Dykeman', 'slowcurrentspecialcarehome@gmail.com', '5064597494', '', 1, 8, 1, 1, 'Ross Drugs', '1,3', 3, 'b8c4f9af5e8de355bbbb4b0e7d8187b3.jpg', '8b2561cce4cb798d323cd0469530a9c1.jpg', '3296ac8b9004cb44c2ff8d128c489122.jpg', NULL, NULL, NULL, '', '', '', '', '', '', 'https://www.slowcurrentspecialcarehome.com', 'a:23:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2020-11-19 01:49:57', 1),
(19, 'melansons-special-care-home', 19, '215 st Patrick st bathurst nb', 'E2a4c9', 'Tammy dunn', 'cottage.53@hotmail.ca', '5065482534', '5065465502', 1, 14, 1, 1, 'Sobeys', '2', 6, '1619979059-1608eeb3341301.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:10:{i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 1, '2020-11-19 15:51:03', 1),
(20, 'hillside-lodge-inc', 20, '155 Tilley Drive, Fredericton NB E3B 5L2', 'E3B 5L2', 'Sarah Jenkins', 'sarah.jenkins@nbed.nb.ca', '5064507600', NULL, 1, 9, 1, 1, 'Medicine Shop on King Street', '4', 3, '1605999959-15fb99d578f2e1.JPG', '1605999959-15fb99d578f50a.JPG', '1605999959-15fb99d578f6c0.jpg', '1605999959-15fb99d578fc57.JPG', '1605999959-15fb99d57901d2.jpg', '1605999959-15fb99d57906f4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:19:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-11-21 23:05:59', 1),
(21, 'maritime-manor-special-care-home', 21, '299 GOLDEN GROVE ROAD', 'E2H 2V5', 'Crystal Powell', 'kathleen11251@gmail.com', '15066474087', NULL, 1, 9, 1, 1, 'Sobeys East Point', '4', 2, '1651935092-162768774b3149.jpg', '1606332039-15fbeae8731084.jpg', '1606332039-15fbeae8732431.jpg', '1606332039-15fbeae873352b.jpg', '1606332039-15fbeae8734465.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:18:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-25 19:20:39', 1),
(22, 'carlisle-special-care-home', 22, '173 Carlisle Road, Douglas E3G 7M7', 'E3G 7M7', 'Susan VanWart', 'susanmvanwart@gmail.com', '450-3957', '506-206-1287', 1, 0, 1, 1, 'Keswick Pharmacy', '4', 3, '1606503519-15fc14c5f3e909.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:13:{i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-27 18:58:39', 1),
(23, 'protem-memory-care', 23, '71 Gorge Rd, Moncton, NB E1G 1E5', 'E1G 1E5', 'Danielle DeAgazio', 'info@protem.ca', '506-874-9652', '506-854-3519', 3, 50, 1, 3, 'Guardian', '1', 1, '1618583937-16079a1815f5c0.JPG', '1618583937-16079a18163b87.JPG', '1618583937-16079a1816703a.JPG', '1618583937-16079a1816c036.jpg', '1618583937-16079a1816ea1f.jpg', '1618948551-1607f31c793945.jpg', NULL, 'https://www.facebook.com/ProTemMemoryCare', 'https://www.instagram.com/protemmemorycare/', NULL, NULL, NULL, 'www.protem.ca', 'a:22:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 60, 0, '2021-04-15 20:09:55', 1),
(24, 'grass-home-ltd', 24, '774 Coverdale Rd', 'E1B 3L5', 'Lynn Grass', 'jgrass1213@rogers.com', '506-386-1740', '506-386-7040', 2, 24, 1, 5, 'Ford\'s Jean Coutu', '1', 1, '1606508787-15fc160f3bb8c5.jpg', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:20:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";}', 40, 0, '2020-11-27 20:26:27', 1),
(25, 'charlenes-special-care-home', 25, '44 Boucher St., Campbellton, NB E3N 2P4', 'E3N 2P4', 'Charlene Noye', 'charlenenoye@outlook.com', '5067592773', NULL, 1, 0, 1, 1, 'Different Pharmacies', '4', 5, '1608529851-15fe037bb0bde6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:17:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-27 23:10:32', 1),
(26, 'west-side-manor', 26, '646 George Street', 'E2M3T3', 'Lisa Melanson', 'jklm2k2@hotmail.com', '506-672-1534', NULL, 1, 0, 1, 1, 'Lawtons Catherwood', '4', 2, '1606520126-15fc18d3e88b1a.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-11-27 23:35:26', 1),
(27, '3-brooks-villa', 27, '2587 Rte109 Three Brooks , N.B.', 'E7G2W6', 'Kelly Briggs', 'Kellybriggs12@live.ca', '506-356-8327', '506-356-2319', 1, 19, 1, 1, 'Superstore pharmacy', '4', 3, '1606523161-15fc19919c0890.png', '1606523161-15fc19919c23dd.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:18:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 2, '2020-11-28 00:26:01', 1),
(28, 'elizabeth-house-special-care-home-inc', 28, '178 Bridge Street Saint John', 'E2K 1S5', 'Amy Cook', 'rideout_amy@hotmail.com', '5066426058', NULL, 1, 0, 1, 1, 'Jean Coutu', '4', 2, '1606576583-15fc269c79bd85.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:9:{i:18;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:10;s:1:\"1\";i:12;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-28 15:16:23', 1),
(29, 'mcgrath-special-care-home', 29, '267 Rockland Road', 'E2K3K3', 'Lori McGrath', 'lorrainelynnmc@gmail.com', '5066523083', NULL, 1, 10, 1, 1, 'Lawton\'s', '2', 2, '1606576625-15fc269f1acbf8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:8:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";}', 20, 1, '2020-11-28 15:17:05', 1),
(30, 'mclays-oak-bay-haven-inc', 30, '12 Giddens lane Oak Bay NB', 'E3L 4K2', 'Steve McLay', 'mclaysbayhaven@gmail.com', '5064666611', '5064662533', 1, 0, 1, 1, 'Gaurdian Drug', '4', 2, '1606580213-15fc277f562f8b.jpeg', '1606580213-15fc277f56437f.jpeg', '1606580213-15fc277f5658ea.jpeg', '1606580213-15fc277f566a8d.jpeg', '1606580213-15fc277f56753e.jpeg', NULL, NULL, 'https://m.facebook.com/mclaysoakbayhaven/', NULL, NULL, NULL, NULL, NULL, 'a:22:{i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-11-28 16:16:53', 1),
(31, 'residence-o-bons-soins', 31, '330 Rue Pascal-Poirier, Shediac, NB E4P 2K9', 'E4P 2K9', 'Collette Doucette', 'collette.obs@rogers.com', '(506) 312-3301', '(506) 532-5459', 4, 98, 1, 1, 'Jean-Coutu', '1,4', 1, '1606637213-15fc3569db5a9b.jpg', '1606637213-15fc3569dbfc67.jpg', '1606637213-15fc3569dbfd45.jpg', '1606637213-15fc3569dbfdda.jpg', '1619046636-16080b0ec5fb70.jpg', '1619046636-16080b0ec6009b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.shediacseniors.com/', 'a:24:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 0, 1, '2020-11-29 08:06:53', 1),
(32, 'southern-comfort-villa', 32, '1394 King Avenue, Bathurst, NB E2A 1S8', 'E2A1S8', 'Lillian Drapeau', 'drapeaulillian14@gmail.com', '15063509000', '15063508000', 3, 60, 1, 1, 'Jean Coutu', '1,3', 6, '1606695966-15fc43c1e89fc6.jpg', '1606695966-15fc43c1e8b1f5.JPG', '1606695966-15fc43c1e8b8e2.jpg', '1606695966-15fc43c1e8b9eb.JPG', '1606695966-15fc43c1e8c881.JPG', '1606695966-15fc43c1e8d2f2.JPG', NULL, 'Southern Comfort Villa', NULL, NULL, NULL, NULL, 'southerncomfortvilla.com', 'a:23:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:19;s:1:\"1\";}', 60, 0, '2020-11-30 00:26:06', 1),
(33, 'emery-house', 33, '88 Emery St', 'E1B 1B1', 'Jeff Hunter', 'jefhunter@rogers.com', '5063874518', '5063877854', 1, 9, 1, 1, 'Medicine Shoppe (West Main)', '4', 1, '1606740800-15fc4eb40b58fb.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:13:{i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-11-30 12:53:20', 1),
(34, 'scenic-view-special-care-home', 34, '3481 Eoute 121', 'E5P 1B2', 'Mercy Burge', 'ilovemyjobcanada@gmail.com', '15064334538', '15067991881', 1, 0, 1, 1, 'Lawtons', '1', 2, '1606781238-15fc58936ee80d.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '@scenicViewCares', NULL, NULL, NULL, NULL, 'www.scenicviewcares.com', 'a:0:{}', 20, 0, '2020-12-01 00:07:19', 1),
(35, 'résidence-ti-bons-soins', 35, '60 Rue Gallagher, Shediac, NB E4P 1S5', 'E4P 1S5', 'Nicole Leblanc', 'tibonssoins@rogers.com', '351-0478', '351-0498', 1, 0, 1, 3, 'Lawtons Drugstore', '1', 1, '1607104709-15fca78c5d0342.jpeg', '1607104709-15fca78c5d0fb7.jpeg', '1607104709-15fca78c5d1b63.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:15:{i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2020-12-04 17:58:29', 1),
(36, 'ruth-sawler', 36, '37  CLARK STREET, HARTLAND, NB, E7P 1L3', 'E7P 1L3', 'Ruth Sawler', 'ruan@nbnet.nb.ca', '5063759193', '506-375-9193', 1, 0, 1, 1, 'Nevers & Pharmacy for Life', '4', 3, '1607180137-15fcb9f693e6a8.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:19:{i:1;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-12-05 14:55:37', 1),
(37, 'topaz-special-care-home', 37, '219 route 124 Norton NB', 'E5T1B7', 'Tammy Long', 'tammylong@hotmail.com', '5068392715', '5065700062', 1, 10, 1, 1, 'Lawtons', '4', 2, '1607475454-15fd020fe2793a.jpeg', '1607475454-15fd020fe2e595.jpeg', '1607475454-15fd020fe2f700.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 1, '2020-12-09 00:57:34', 1),
(38, 'trueman-house', 38, '265-267 Church Street Moncton NB', 'e1c-5a7', 'Cary MacDonald', 'carymac63@gmail.com', '506-389-3138', NULL, 1, 0, 1, 1, 'Lawtons long term', '2', 1, '1607532278-15fd0fef6ec79e.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:16:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:9;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-12-09 16:44:39', 1),
(39, 'serenacare', 39, '15 Lady Russell St, Moncton, NB E1G 2E9', 'E1E 0C3', 'Susan Dixson', 'serenacare@bellaliant.com', '5063811550', '5062049156', 1, 0, 1, 5, 'Lawton\'s', '1', 1, '1628788136-1611555a883db4.JPG', '1628788136-1611555a88b33a.JPG', '1628788136-1611555a88fcab.JPG', '1628788136-1611555a893fdd.jpg', '1628788136-1611555a896c82.jpg', '1628788136-1611555a8995d9.jpg', '', '', '', '', '', '', 'https://serenacare.ca', 'a:18:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";}', 20, 0, '2020-12-13 17:44:37', 1),
(40, 'burns-manor', 40, '26 Bromley Ave', 'E1C5T9', 'Mike Sewell', 'jenburnsmanor@gmail.com', '(506)852-3554', NULL, 1, 0, 1, 1, 'Atlantic Superstore Trinity', '4', 1, '1608221857-15fdb84a10500a.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:13:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:10;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-12-17 16:17:37', 1),
(41, 'green-meadows-special-care-home-millstream', 41, '374 Route 880', 'E5P3K4', 'Chris Smith', 'chris.smith@ambienthealth.ca', '506-433-2502', '506-808-0028', 1, 0, 1, 1, 'Lawton\'s', '2', 2, '1642077155-161e01be33b426.jpeg', '1642077155-161e01be3403ff.JPG', '1642077155-161e01be3472ec.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-01-08 17:38:19', 1),
(42, 'the-briarlea-on-ryan-3g', 42, '599 Ryan St., Moncton, NB E1G 2W2', 'E1G 2W2', 'Charline Johnson', 'thebriarlea@gmail.com', '506-204-1099', '', 2, 0, 1, 4, 'Jean Coutu / Medicine Shoppe', '1', 1, '1610978245-1600593c56e200.jpg', '1623424648-160c37e88c877c.jpg', '1623424648-160c37e88caab0.jpg', '1623424648-160c37e88cc73c.jpg', '1623424648-160c37e88cdb52.jpg', '1623424648-160c37e88ced49.jpg', '', 'https://www.facebook.com/Briarlea-Ryan-Rd-322007488720953', '', '', '', '', 'http://www.thebriarlea.com', 'a:24:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 40, 0, '2021-01-18 13:57:25', 1),
(43, 'victory-house', 43, '30 Victory Ave', 'E3A 3V5', 'Jody Munn', 'jodymunnster@gmail.com', '506-260-3354', NULL, 1, 7, 1, 1, 'Medicine Shoppe', '2', 3, '1611421173-1600c55f534d73.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:7:{i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:15;s:1:\"1\";i:27;s:1:\"1\";}', 20, 3, '2021-01-23 16:59:33', 1),
(44, 'goguen-residence-678780-nb-inc', 44, '76 John st, Moncton NB,', 'E1C 2G9', 'Colleen Paynter', 'colleenpaynter@hotmail.com', '506 855-3549', '506 855-7257', 1, 0, 1, 5, 'Lawtons', '3', 1, '1612981401-1602424992f0ab.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-02-10 18:23:21', 1),
(45, 'laura-manor-special-care-home', 45, '86 Mecklenburg street, Saint John, NB E2L 1R3', 'E2L 1R3', 'Danielle Gallant', 'lauramanor86@gmail.com', '5066508706', '', 1, 16, 1, 1, 'Lawtons Pharmacy Catherwood', '1,2,3,4', 2, '1617302396-16066137c562d9.jpeg', '1622040670-160ae605e7cb07.jpeg', '1622040670-160ae605e7dcb6.jpeg', '1622040670-160ae605e7ecc6.jpeg', '1622040670-160ae605e7ff3d.jpeg', '1622040670-160ae605e803e2.jpg', '', 'https://www.facebook.com/search/top?q=Laura%20Manor%20Care%20Home', '', '', '', '', '', 'a:22:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";}', 20, 1, '2021-04-01 18:39:56', 1),
(46, 'waddell-residencehobby-farm', 46, '1077 Route 845 , Kingston, NB E5N 1K7', 'E5N 1K7', 'Ann Waddell', 'waddell@levesqueonline.com', '(506) 763-2257', '506-763-2257', 1, 0, 1, 1, 'Sobeys Rothesay', '1,2,3,4', 2, '1617903094-1606f3df6e9f61.jpg', '1617795369-1606d99298a8ff.jpg', '1619049000-16080ba28bbfa4.jpg', '1619049000-16080ba28bca34.jpg', '1619049000-16080ba28bdbe9.JPG', '1619049000-16080ba28be4ce.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-04-07 11:36:09', 1),
(47, 'living-hope-special-care-home', 47, '467 Picadilly Road, Piccadilly, Saint John NB E4E 5J7', 'E4E 5J7', 'Wilma Ledin', 'buchananwilma@gmail.com', '506 229 2170', '', 1, 9, 1, 1, 'Lawtons', '1', 2, '1618252662-160749376e9f1e.jpg', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:23:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 3, '2021-04-12 18:37:42', 1),
(48, 'murray-street-lodge', 48, '35 Murray Street, Grand Bay-Westfield, NB E1C5C7', 'E1C5C7', 'Heather Perrin', 'hseely86@hotmail.com', '5067383500', '5062171700', 1, 13, 1, 1, 'Lawtons', '1,2,3,4', 2, '1618377533-160767b3d7fcf1.JPG', '1618377533-160767b3d835cf.JPG', '1618377533-160767b3d84004.JPG', '1618377533-160767b3d84a3a.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'www.murraystseelylodgesch.com', 'a:20:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-04-14 05:18:53', 1),
(49, 'metcalf-manor', 49, '133 Metcalf Street, Saint John, NB E2K 1K2', 'e2k1k2', 'VANESSA HARRIS OR BRYAN GALLANT', 'metcalfmanor1@gmail.com', '15062141690', NULL, 1, 6, 1, 1, 'SOBEY\'S NORTH', '4', 2, '1618842658-1607d94222ac9d.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:19;s:1:\"1\";}', 20, 1, '2021-04-19 14:30:58', 1),
(50, 'the-cedars', 50, '28 Milton Lane, Sackville, NB E4L3B7', 'E4L3B7', 'Julie Steeves', 'thecedarsarf@gmail.com', '506-939-2233', '506-939-2233', 1, 10, 1, 1, 'Lawtons', '4', 1, '1619017751-160804017c89fe.jpg', '1619017751-160804017cb094.jpg', '1621758095-160aa108f50d42.jpg', '1619017751-160804017cbf2b.jpg', NULL, '1619017751-160804017cc15f.jpg', NULL, 'https://www.facebook.com/thecedarsarf/', 'https://instagram.com/thecedarsarf?igshid=1cfdu2yj2dspk', NULL, NULL, NULL, NULL, 'a:18:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 1, '2021-04-21 15:09:11', 1),
(51, 'bartlett-gardens-care-home', 51, '15  Craig St', 'E3A6S9', 'Wendy Symonds', 'bartlettgardenscarehome@gmail.com', '9026644089', NULL, 1, 8, 1, 1, 'St. Mary’s', '4', 3, '1619037381-160808cc598df6.jpeg', '1619037381-160808cc598fab.jpeg', '1619037381-160808cc599122.jpeg', '1619037381-160808cc5992af.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:18:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 1, '2021-04-21 20:36:21', 1),
(52, 'coultons-special-care-home', 52, '251Loch Lomond Rd.', 'E2J1Y6', 'Marion MacDougall', 'coultonsspecialcarehome@live.com', '(506)214-1664', '(506)214-0142', 1, 14, 1, 1, 'Sandra Ferris', '1,2', 2, '1619041331-160809c33ee75f.jpeg', '1619041331-160809c33eeaae.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:18:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 2, '2021-04-21 21:42:11', 1),
(53, 'twin-towers-special-care-home', 53, '7 Elm Street, St Stephen, NB E3L 2S2', 'E3L2S2', 'Tom Knox', 'knoxtom@rocketmail.com', '5064675117', NULL, 1, 9, 1, 1, 'Lawtons', '4', 2, '1619123637-16081ddb57572f.png', '1619123637-16081ddb57685f.jpeg', '1619123637-16081ddb577020.jpeg', '1619123637-16081ddb579593.jpeg', '1619123637-16081ddb57b88c.jpeg', '1619123637-16081ddb57beab.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:14:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:3;s:1:\"1\";i:9;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 3, '2021-04-22 20:33:57', 1),
(54, 'north-minto-residence', 54, '781 Northside Drive, Minto, NB E4B 3C7', 'E4B 3C7', 'PAULA FASQUEL', 'mail@northmintoresidence.ca', '506-327-9000', '506-327-3000', 1, 18, 1, 3, 'Lawtons', '1,2,3,4', 3, '1621943188-160ace394659e1.jpg', '1620155420-160919c1c6f582.jpeg', '1620155420-160919c1c71ed9.jpeg', '1620155420-160919c1c7472f.jpeg', '1620155420-160919c1c776b5.jpeg', '1620155420-160919c1cc9a5e.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, 'www.northmintoresidence.ca', 'a:23:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 3, '2021-04-22 20:34:40', 1),
(55, 'primrose-cottage-special-care-home', 55, '418 Route 880 Lower Millstream, Sussex NB E5P 3K4', 'e5p3k4', 'Lynn Wallace', 'lpearle@hotmail.com', '5064341869', NULL, 1, 0, 1, 1, 'Lawton\'s Sussex', '4', 2, '1626376784-160f08a5056670.jpg', '1626376784-160f08a5058127.JPG', '1626376784-160f08a505a5a9.jpg', '1626376784-160f08a505f047.jpg', '1626376784-160f08a5062409.jpg', '1626376784-160f08a5065570.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-04-25 19:23:43', 1),
(56, 'countryside-residence', 56, '74 W Main St, Port Elgin, Moncton NB E4M 1M1', 'E4m1m1', 'Crystal Lynn snowdon', 'crystallynnsnowdon1973@gmail.com', '5065382968', '538-2512', 1, 10, 1, 1, 'Village guardian', '1,2,3', 1, '1619897268-1608dabb41b506.jpeg', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:25:{i:1;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 1, '2021-05-01 19:27:48', 1),
(57, 'manor-st-jude-care-home', 57, '416 Sandy point Road, Saint John, NB E2K 3R9', 'E2K 3R9', 'Steven', 'stevenwen@yahoo.com', '5069775188', NULL, 1, 8, 1, 1, 'Lawtons', '1,2,3,4', 2, '1620055020-1609013eca8220.jpg', '1620055020-1609013eca8367.jpg', '1620055020-1609013eca8440.jpg', '1620055020-1609013eca8531.jpg', '1620055020-1609013eca8654.jpg', '1620055020-1609013eca8771.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:15:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:20;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 2, '2021-05-03 15:17:00', 1),
(58, 'the-guardians-special-care-home-ltd', 58, '203 MacFarlane Street, Fredericton, NB E3A 1V7', 'E3A 1V7', 'Leonard Gervais', 'parkviewgardens203@outlook.com', '506-458-8968', '458-0918', 1, 0, 1, 1, 'Sobeys Brookside Pharmacy', '2,3', 3, '1620233216-16092cc0081b12.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:13:{i:18;s:1:\"1\";i:3;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-05-05 16:46:56', 1),
(59, 'canterbury-hall', 59, '824 Coverdale Road, Riverview, NB ', 'E1B 0H9', 'Alison Baxter', 'abaxter@shannex.com', '5063870533', '506-387-7707', 3, 60, 1, 1, 'Lawton\'s Drug', '1', 1, '1620820304-1609bc150e2ca4.jpg', '1620820304-1609bc150e3fd0.jpg', '1620820304-1609bc150e4d04.jpg', '1620820304-1609bc150e582b.jpg', '1620820304-1609bc150e73a2.jpg', '1620820304-1609bc150e93ad.jpg', '', 'https://www.facebook.com/experienceparkland', '', '', 'https://www.youtube.com/ExperienceParkland', '', '', 'a:18:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";}', 60, 1, '2021-05-12 11:51:44', 1),
(60, 'enhanced-living-gagetown', 60, '142 Tilley Road. Gagetown NB', 'E5M1H6', 'Erynn Bailey', 'erynn@enhancedliving.ca', '506-422-8600 ext 5', '506-488-2620', 2, 27, 1, 3, 'Oromocto Riverside Gaurdian', '1', 3, '1621356259-160a3eee3c89e9.jpg', '1621356259-160a3eee3c9370.jpg', '1621356259-160a3eee3c9471.jpg', '1621356259-160a3eee3c95ca.jpg', NULL, NULL, NULL, 'https://www.facebook.com/groups/enhancedlivinggagetown', 'enhancedlife_nb', '@EnhancedLife_NB', NULL, NULL, 'www.enhancedliving.ca', 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 40, 2, '2021-05-18 16:44:19', 1),
(61, 'howe-hall', 61, '50  VITALITY WAY, SAINT JOHN, NB, E2K 0J5', 'E2K 0J5', 'Kailey Rasch', 'krasch@shannex.com', '506-649-4713', NULL, 2, 60, 1, 1, 'Lawtons Drugs', '1', 2, '1623079980-160be3c2c6b111.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:19:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 40, 9, '2021-06-07 15:33:00', 1),
(62, 'swims-adult-residential-facility', 62, '448 White Rd, Avondale, NB E7K 1E5', 'E7K 1E5', 'Emily Louise Swim', 'gdswim@xplornet.com', '506-375-6613', '506-375-4609', 1, 0, 1, 1, 'The Medicine Shoppe', '1,2,3,4', 3, '1623863317-160ca301521fbe.JPG', '1623863317-160ca301522fc9.JPG', '1623863317-160ca301523809.JPG', '1623863317-160ca30152402b.JPG', '1623863317-160ca301524683.JPG', '1623863317-160ca301524baf.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:23:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-06-16 17:08:37', 1),
(63, 'alvinac-care-home', 63, '32 Chamberlain Settlement Road, Moncton NB E2E 6G4', 'E2A 6G4', 'Alvina Allain', 'allainalvina@hotmail.com', '(506)548-3229', NULL, 1, 4, 1, 1, 'Sobeys', '2', 1, '1624382322-160d21b72bf7ab.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:17:{i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 1, '2021-06-22 17:18:42', 1),
(64, 'care-a-lot-special-care-home', 64, '61 St Coeur Ct, Saint John, NB E2M 5R3', 'E2M 5R3', 'Darlene Forgrave', 'darleneforgrave2007@hotmail.com', '(506) 214-2983', NULL, 1, 0, 1, 1, 'Lawtons', '4', 2, '1630529575-1612fe827a70be.jpg', '1630529575-1612fe827a93c7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:11:{i:28;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:27;s:1:\"1\";}', 20, 1, '2021-06-23 16:39:50', 1),
(65, 'curtlin-manor', 65, '61 Bonnie Rd, Nauwigewauk, NB E5N 7A1', 'E5N 7A1', 'Tammy Brown', 'breelizz@live.com', '(506) 832 3510', '832 5794', 1, 0, 1, 5, 'Sobeys', '2,3', 2, '1624551504-160d4b050988e8.png', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com/groups/872685416147060', NULL, NULL, NULL, NULL, NULL, 'a:20:{i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-06-24 16:18:24', 1),
(66, 'hawthorne-place', 66, '8 Hawthorne St, Hartland NB E7P 1K4', 'E7P 1K4', 'Linda Clark', 'clarklinda59@gmail.com', '5063756687', NULL, 1, 0, 1, 4, 'Lawtons', '4', 3, '1624554538-160d4bc2a6c4b5.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-06-24 17:08:58', 1),
(67, 'ridgeview-manor', 67, '100 McKay Loop Rd, Pennfield NB E5H 2K4', 'E5H 2K4', 'Jackie', 'lambertscove@gmail.com', '(506) 755-3997', '755 3997', 1, 0, 1, 1, 'Lawtons  West Side', '1,2', 2, '1625586103-160e479b7d4d59.jpg', '1625586103-160e479b7d6ff2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:23:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-06-24 17:31:06', 1),
(68, 'sea-street-manor', 68, '489 Sea Street, Saint John NB E2M 2N9', 'E2M 2N9', 'David & Phyllis Arseneau', 'seastreetmanor@gmail.com', '506 696 0857', '214 3027', 1, 0, 1, 1, 'Lawtons', '1', 2, '1624557187-160d4c6835bb47.png', NULL, NULL, NULL, NULL, NULL, 'https://youtu.be/ac6aGDkvC1Q', 'https://www.facebook.com/groups/2232173220334022', '', '', '', '', '', 'a:17:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";}', 20, 0, '2021-06-24 17:53:07', 1),
(69, 'collingwood-rest-home', 69, '249 Route 176 Penfield, NB E5H 1R9', 'E5H1R9', 'Tina Ridgley', 'jody@jodymunn.ca', '506 456 3533', NULL, 1, 0, 1, 1, 'Lawtons', '1,2', 2, '1624907974-160da20c69c79a.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:16:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-06-28 19:19:34', 1),
(70, 'mcnair-manor', 70, '11 Beechwood Avenue Moncton, NB', 'E1A 5P7', 'Amy McNair', 'info@mcnairmanor.com', '5068515852', '8540965', 2, 0, 1, 1, 'Lawtons', '1', 1, '1652913880-1628576d8e3032.JPG', '1652913880-1628576d8e520f.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:19:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 40, 0, '2021-07-05 16:42:43', 1),
(71, 'fundy-bay-manor', 71, '106 Main Street, St George NB E5C 3J9', 'E5C 3J9', 'Karen Doughtery-Seaman', 'fundybaymanor@nb.aibn.com', '506-755-2221', NULL, 1, 0, 1, 1, 'Guardian Drug', '4', 2, '1625587278-160e47e4e7f229.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, 'a:18:{i:28;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-07-06 16:01:18', 1),
(72, 'smith-special-care-home', 72, '56 Dorchester St, Moncton, NB E1E 3A7', 'E1E 3A7', 'Alishia Perry', 'alisha.perry@accesshomecare.ca', '5063832826', NULL, 1, 0, 1, 1, 'Jean Coutu', '2', 1, '1625593126-160e49526b8aa8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com/Access-Home-Care-112351725508215', 'accesshomecare', NULL, NULL, NULL, NULL, 'a:19:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:9;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-07-06 17:38:46', 1);
INSERT INTO `residences` (`id`, `slug`, `member_id`, `address`, `postalcode`, `contact_name`, `email`, `phone`, `fax`, `package_id`, `max_beds_count`, `language_id`, `level_id`, `pharmacy_name`, `facilities`, `region_id`, `mainimage`, `image2`, `image3`, `image4`, `image5`, `image6`, `virtual_tour`, `facebook`, `instagram`, `twitter`, `youtube`, `linkedin`, `website`, `features`, `beds_count`, `vacancy`, `created`, `status`) VALUES
(73, 'baycare-adult-residential-facility', 73, '59 Pitt Street, Saint John', 'E2L-2V7', 'Joel McCarthy', '59pitt@nbnet.nb.ca', '5066580991', NULL, 1, 0, 1, 1, 'Jean Coutu', '2', 2, '1625765648-160e7371006e8d.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:13:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-07-08 17:34:08', 1),
(74, 'fairvilla-special-care-home', 74, '358 Charlotte Street West Side, Saint John, NB E2M 1Y8', 'E2M 1Y8', 'Bonnie Phillips', 'lornahydekingston@gmail.com', '5066522030', '652-1937', 1, 0, 1, 1, 'Lawtons', '4', 2, '1626200102-160edd826bcb46.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'na', 'N/A', NULL, NULL, NULL, NULL, 'a:19:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-07-13 18:15:02', 1),
(75, 'crescent-gardens-guest-home', 75, '1 Crescent Gardens', 'E7P1L9', 'June Shaw', 'rdls@bellaliant.net', '5063759113', NULL, 1, 0, 1, 1, 'Nevers Pharmacy Hartland', '1', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:7:{i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-07-20 20:29:48', 1),
(76, 'hearne-street-residence', 76, '210 hearne st. Fredericton n.b.', 'E3b6m3', 'Melinda smith', 'abcmelindasmith@yahoo.com', '450-0909', 'None', 1, 0, 1, 1, 'Sobeys brookside dr.', '2', 3, '1628805491-1611599735aaae.jpg', '1628805491-1611599735e762.jpg', '1628805491-1611599735f8bb.jpg', '1628805491-16115997360a08.jpg', '1628805491-1611599736291e.jpg', '1628805491-161159973647b2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:15:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:9;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-08-12 21:58:11', 1),
(77, 'hanwell-special-care-and-senior-home', 77, '2434 Route 640 Hanwell, NB, E3E 2C7', 'E3E 2C7', 'Karla Roberts', 'kroberts@nb.aibn.com', '5064519814', NULL, 1, 0, 1, 1, 'Lawtons', '1,2,4', 3, '1629295468-1611d136c77447.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:18:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-08-18 14:04:28', 1),
(78, 'autumn-lee-retirement', 78, '2031 Mountain Road, Monton, NB, E1G1B1', 'E1G1B1', 'Wanda Penney- (506) 337-2249', 'autumnlee@outlook.com', '(506) 874-0757', '5063888866', 3, 45, 1, 1, 'Lawtons', '1,2,4', 1, '1629309002-1611d484a63de7.png', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:26:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";}', 60, 0, '2021-08-18 17:50:02', 1),
(79, 'smiths-special-care-home', 79, '56  DORCHESTER STREET, MONCTON, NB,', 'E1E 3A7', 'Alisha Perry', 'alisha.perry@accesshomecare.ca', '(506) 874-0757', '506-383-9575', 1, 0, 1, 1, 'Jean Coutu', '4', 1, '1632154449-16148b351eb656.jpg', '1632154449-16148b351f107f.jpg', '1632154450-16148b35201703.jpg', '1632154450-16148b35204286.jpg', '1632154450-16148b35206e76.jpg', '1632154450-16148b35209557.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:25:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-09-20 16:14:10', 1),
(80, 'blackville-special-care-home', 80, '178 Main Street', 'e9b1s4', 'eric walls', 'ericwalls2015@hotmail.com', '15066253334', NULL, 1, 0, 1, 2, 'Blackville Pharmacy', '1,2,3,4', 7, '1641433720-161d64a78739f2.jpeg', '1641433720-161d64a78791ff.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:9;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 20, 0, '2022-01-06 01:48:40', 1),
(81, 'dobbelsteyn-care-home', 81, '245 Mount Pleasant Ave (E)', 'E2J1T7', 'Paula Dobbelsteyn', 'jpdobbelsteyn@gmail.com', '506-633-0883', NULL, 2, 0, 1, 1, 'Lawtons', '1', 2, '1645727964-16217d0dc1fa9d.jpg', '1645727964-16217d0dc22b21.jpg', '1645727964-16217d0dc2317f.jpg', '1645727964-16217d0dc254b2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:19:{i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 40, 0, '2022-02-24 18:39:24', 1),
(82, '44-wildwood-drive', 82, '44 Wildwood Drive, Lower Woodstock NB', 'E7M 4C2', 'Leonard Foster', 'crlb@nb.aibn.com', '1 506 325 4536', '1 506 325 4537', 1, 0, 1, 5, 'Medinine Shoppe', '3,4', 3, '1647438146-16231e942bee26.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 20, 0, '2022-03-16 13:42:26', 1),
(83, 'silver-fox-special-care-home', 83, '32 & 34 Vaughan St', 'E4J 2S8', 'Jason Wilson', 'jason@silverfoxretirementliving.com', '5062278061', '5063724518', 2, 0, 1, 1, 'PJC Jean Coutu Petitcodiac', '4', 1, '1648841242-16247521a967d4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com/Silver-Fox-Special-Care-Home', NULL, NULL, NULL, NULL, 'https://silverfoxretirementliving.com/silver-fox-special-care-home/', 'a:28:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 40, 0, '2022-04-01 19:27:22', 1),
(84, 'lj-jaillet-residence-inc', 84, '3223 Mountain Road Moncton NB', 'E1G 2X1', 'Jackie', 'jackiejaillet@gmail.com', '(506)830-8175', NULL, 1, 0, 1, 1, 'Superstore', '4', 1, '1649684905-1625431a9a0d76.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:13:{i:18;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 20, 0, '2022-04-11 13:48:25', 1),
(85, 'alternative-residences-alternatives', 85, '1144 Amirault Street, Dieppe, NB', 'E1A 1E2', 'Trudy Jones', 'info@arainc.org', '5068547229 ', '', 2, 0, 1, 2, 'Jean Coutu', '2', 1, '1651588011-162713bab8bcd5.jpg', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:15:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:6;s:1:\"1\";i:22;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";}', 40, 0, '2022-05-03 14:26:51', 1),
(86, 'the-briarlea-on-ryan-level-2', 86, '599 Ryan St., Moncton, NB E1G 2W2', 'E1G 2W2', 'Charline Johnson', 'thebriarlea@gmail.com', '506-204-1099', '', 1, 0, 1, 2, 'Jean Coutu /Medicine Shoppe', '4', 1, '1623425805-160c3830d40321.jpg', '1623425805-160c3830d4175c.jpg', '1623425805-160c3830d42aa5.jpg', '1623425805-160c3830d43113.jpg', '1623425805-160c3830d434a9.jpg', '1623425805-160c3830d443cd.jpg', '', 'https://www.facebook.com/Briarlea-Ryan-Rd-322007488720953', '', '', '', '', 'http://www.thebriarlea.com', 'a:24:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2021-06-11 15:36:45', 1),
(87, 'the-briarlea-on-ryan-3b', 87, '599 Ryan St., Moncton, NB E1G 2W2', 'E1G 2W2', 'Charline Johnson', 'thebriarlea@gmail.com', '506-204-1099', '', 1, 0, 1, 3, 'Jean Coutu /Medicine Shoppe', '1', 1, '1623426167-160c38477051fd.jpg', '1623426167-160c3847707da1.jpg', '1623426167-160c3847709c45.jpg', '1623426167-160c384770ad4a.jpg', '1623426167-160c384770b396.jpg', '1623426167-160c384770b6aa.jpg', '', 'https://www.facebook.com/Briarlea-Ryan-Rd-322007488720953', '', '', '', '', 'http://www.thebriarlea.com', 'a:24:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2021-06-11 15:42:47', 1),
(88, 'the-briarlea-off-gorge-level-2', 88, '75 Briarlea Dr, Moncton, NB E1G 2E9', 'E1G 2E9', 'Charline Johnson', 'thebriarlea@gmail.com', '506-857-8866', '', 2, 0, 1, 2, 'Jean Coutu /Medicine Shoppe', '4', 1, '1623427068-160c387fc2fc3d.JPG', '1623427068-160c387fc3226d.jpg', '1623427068-160c387fc344fc.jpg', '1623427068-160c387fc366ee.jpg', '1623427068-160c387fc38862.jpg', '1623427068-160c387fc39701.jpg', '', '', '', '', '', '', 'http://www.thebriarlea.com', 'a:24:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 40, 0, '2021-06-11 15:57:48', 1),
(89, 'the-briarlea-off-gorge-level-3b', 89, '75 Briarlea Dr, Moncton, NB E1G 2E9', 'E1G 2E9', 'Charline Johnson', 'thebriarlea@gmail.com', '506-857-8866', '', 1, 0, 1, 3, 'Jean Coutu /Medicine Shoppe', '1', 1, '1623427367-160c38927a8b38.JPG', '1623427367-160c38927ab2b0.jpg', '1623427367-160c38927ad6e6.jpg', '1623427367-160c38927afabc.jpg', '1623427367-160c38927b0aaa.jpg', '1623427367-160c38927b2400.jpg', '', 'https://www.facebook.com/Briarlea-Ryan-Rd-322007488720953', '', '', '', '', 'http://www.thebriarlea.com', 'a:24:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2021-06-11 16:02:47', 1),
(90, 'residence-collette', 90, '64  STEADMAN STREET, MONCTON, NB', 'E1C 9X5', 'Alisha Perry', 'alisha.perry@accesshomecare.ca', '(506) 874-0757', '506-383-9575', 1, 0, 1, 1, 'Jean Coutu', '4', 1, '1632154734-16148b46e09c3d.jpg', '1632154734-16148b46e0c18d.jpg', '1632154734-16148b46e0e203.jpg', '1632154734-16148b46e102ce.jpg', '1632154734-16148b46e15040.jpg', '1632154734-16148b46e1703b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:25:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-09-20 16:18:54', 1),
(91, 'dalys-home-care-inc', 91, '28  TRIDER COURT, RIVERVIEW, NB,', 'E1B 4T9', 'Alisha Perry', 'alisha.perry@accesshomecare.ca', '(506) 874-0757', '506-383-9575', 1, 0, 1, 1, 'Jean Coutu', '4', 1, '1632154983-16148b56710fe0.jpg', '1632154983-16148b56713821.jpg', '1632154983-16148b56715dde.jpg', '1632154983-16148b567182f7.jpg', '1632154983-16148b5671a6bf.jpg', '1632154983-16148b5671ce45.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:25:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-09-20 16:23:03', 1),
(92, 'residence-adventure', 92, '1076  ELMWOOD DRIVE, MONCTON, NB,', 'E1E 2H2', 'Roberta Buchanan', 'roberta.buchanan@accesshomecare.ca', '(506) 874-0757', '506-383-9575', 1, 0, 1, 1, 'Jean Coutu', '4', 1, '1632155236-16148b6642ec1b.jpg', '1632155236-16148b664339b2.jpg', '1632155236-16148b664364ab.jpg', '1632155236-16148b6643cdd0.jpg', '1632155236-16148b6643f0c8.jpg', '1632155236-16148b6644164e.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:25:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-09-20 16:27:16', 1),
(93, '69-beardsley-road', 93, '69 Beardsley Road, Lower Woodstock . NB', 'E7M 4C8', 'Leonard Foster', 'crlb@nb.aibn.com', '506 325 4536', '506 325 4537', 1, 0, 1, 5, 'Medicine Shoppe', '3,4', 3, '1647438146-16231e942c29b0.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 20, 0, '2022-03-16 13:42:26', 1),
(94, '119-broadway', 94, '119 Broadway St, Woodstock Nb', 'EcM 6B4', 'Leonard Foster', 'crlb@nb.aibn.com', '506 325 4536', '506 325 4537', 1, 0, 1, 5, 'Medicine Shoppe', '3,4', 3, '1647438146-16231e942c5d92.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 20, 0, '2022-03-16 13:42:26', 1),
(95, '117-broadway', 95, '117 Broadway Street, Woodstock NB', 'E7M 6B4', 'Leonard Foster', 'crlb@nb.aibn.com', '506 325 4536', '506 325 4537', 1, 0, 1, 5, 'Medicine Shoppe', '3,4', 3, '1647438146-16231e942c7626.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 20, 0, '2022-03-16 13:42:26', 1),
(96, 'macleods-too-inc', 96, '6437 Route 105, Lower Brighton, NB E7P 3J5', 'E7P 3J5', 'Heather Allison', 'kitt1yg@gmail.com', '5063758395', NULL, 1, 12, 1, 5, 'Medicine Shop - Woodstock', '2', 3, '1605999959-15fb99d57946ce.jpg', '1619831069-1608ca91d00584.jpg', '1619831069-1608ca91d01dc1.jpg', '1619831069-1608ca91d034a9.jpg', '1619831069-1608ca91d0478c.jpg', '1619831069-1608ca91d05ca1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2020-11-21 23:05:59', 1),
(97, 'country-lane-estates-nb-inc', 97, '21 Christopher Dr, Burton, NB E2V 3H4', 'E2V 3H4', 'Angela Cahill', 'countrylaneestatesinc@gmail.com', '357-2459', NULL, 1, 11, 1, 1, 'King Street Medicine Shoppe', '1,2,3,4', 3, '1620175648-16091eb20066f1.jpg', '1620175648-16091eb20068da.jpg', '1620175648-16091eb2006a64.jpg', '1620175648-16091eb2006c05.jpg', '1620175648-16091eb2006daa.jpg', '1620175648-16091eb2006f26.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 2, '2021-05-05 00:47:28', 1),
(98, 'country-lane-estates-nb-inc-220521061901', 98, '21 Christopher Dr, Burton, NB E2V 3H4', 'E2V 3H4', 'Angela Cahill', 'countrylaneestatesinc@gmail.com', '357-2459', NULL, 1, 7, 1, 3, 'King Street Medicine Shoppe', '1,2,3,4', 3, '1620176266-16091ed8a33391.jpg', '1620176266-16091ed8a33592.jpg', '1620176266-16091ed8a3371e.jpg', '1620176266-16091ed8a3387c.jpg', '1620176266-16091ed8a339da.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 2, '2021-05-05 00:57:46', 1),
(99, 'goguen-residence-621090nb-inc', 99, '15 Norwood Ave', 'E1C 6L7', 'Star Whalen', 'starwhalen76@hotmail.com', '506 381-4841', '506 3887964', 1, 0, 1, 5, 'Lawtons', '3', 1, '1612981401-16024249938c2b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:17:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-02-10 18:23:21', 1),
(100, 'goguen-residence-inc', 100, '34 Bromley Ave', 'E1C 5T9', 'Colleen Paynter', 'colleen@goguenresidences.ca', '506 204-8448', '506 389-8139', 1, 0, 1, 5, 'Lawtons', '3', 1, '1612981401-1602424993afd5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:21:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";}', 20, 0, '2021-02-10 18:23:21', 1),
(101, 'mcnair-manor-level-3g-moncton', 101, '44 Beechwood Ave', 'E1A3L5', 'Amy McNair', 'info@mcnairmanor.com', '5068515852', '5068540695', 1, 0, 1, 4, 'Lawton\'s', '1', 1, '1652913503-16285755ff00a1.JPG', '1652913503-16285755ff1fab.jpg', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:20:{i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2022-05-18 22:38:24', 1),
(102, 'mcnair-manor-level-3b-riverview', 102, '137 Whitepine Road', 'E1B4Y5', 'Amy McNair', 'info@mcnairmanor.com', '5068515852', '5068540695', 1, 0, 1, 3, 'Lawton\'s', '1', 1, '1652913695-16285761f338c7.JPG', '1652913695-16285761f356ec.jpg', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:21:{i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:24;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";}', 20, 0, '2022-05-18 22:41:35', 1),
(103, 'green-meadows-special-care-home-berwick', 103, '1063 Route 880', 'E5P3A9', 'Chris Smith', 'chris.smith@ambienthealth.ca', '506-433-1364', '506-808-0028', 1, 0, 1, 1, 'Lawton\'s', '1', 2, '1642077238-161e01c36d058c.jpeg', '1642077238-161e01c36d0de8.JPG', '1642077238-161e01c36d8f58.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 0, '2021-01-08 17:38:19', 1),
(104, 'green-meadows-special-care-home-belleisle', 104, '1199 East Scotch Settlement Road', 'E5P1N7', 'Chris Smith', 'chris.smith@ambienthealth.ca', '506-485-5890', '506-808-0028', 1, 1, 1, 1, 'Lawton\'s', '4', 2, '1642077560-161e01d782d0e9.jpeg', '1642077560-161e01d782da61.JPG', '1642077560-161e01d78327fd.JPG', '1642077560-161e01d7837fbe.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:22:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 20, 1, '2021-01-08 17:38:19', 1),
(105, 'open-arms-special-care-home', 105, '98 Glengrove Road, Moncton', 'E1A5X5', 'Joanne Allen', 'openarmscare@hotmail.com', '506-204-8409', NULL, 1, 8, 1, 1, 'Medicine Shoppe 294', '4', 1, '1605286785-15faebb818e60d.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:8:{i:2;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:12;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";}', 20, 1, '2020-11-13 16:59:45', 1),
(106, 'silver-fox-estate', 106, '10 Rae Drive', 'E4J 0E9', 'Jason Wilson', 'jason@silverfoxretirementliving.com', '5062278061', '5063724518', 2, 0, 1, 1, 'PJC Jean Coutu Petitcodiac', '1', 1, '1648841242-16247521aa2f1c.jpg', '1648841242-16247521aa3426.jpg', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com/SilverFoxEstate/', NULL, NULL, NULL, NULL, 'https://silverfoxretirementliving.com/', 'a:26:{i:18;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:11;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:23;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:15;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";i:17;s:1:\"1\";i:29;s:1:\"1\";i:19;s:1:\"1\";}', 40, 0, '2022-04-01 19:27:22', 1),
(107, 'paradise-villa', 107, '665 Clements Drive, Fredericton, NB E3G 7j2', 'E3G 7J2', 'Monique Corbett', 'paradisevilla.cs@gmail.com', '506-443-8000', '506-454-3413', 4, 0, 1, 3, 'Lawtons', '1', 3, '1624298666-160d0d4aa2c637.jpg', '1624298666-160d0d4aa31ba4.jpg', '1624298666-160d0d4aa34beb.jpg', '1624298666-160d0d4aa3aa73.jpg', '1624298666-160d0d4aa3d79d.jpg', '1624298666-160d0d4aa4040c.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:20:{i:28;s:1:\"1\";i:18;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";i:8;s:1:\"1\";i:9;s:1:\"1\";i:20;s:1:\"1\";i:10;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:12;s:1:\"1\";i:13;s:1:\"1\";i:24;s:1:\"1\";i:14;s:1:\"1\";i:26;s:1:\"1\";i:16;s:1:\"1\";i:27;s:1:\"1\";}', 0, 0, '2021-06-21 18:04:26', 1),
(126, 'brae-manor', 108, '101 Ellerdale Avenue, Moncton, N.B.', 'E1A3M8', 'Dina Marchetti-Girouard', 'dmarchettibraemanor@me.com', '5063839228', '', 1, 3, 3, 1, 'Dieppe Pharmasave', '1,2,3,4', 1, '4c7869f2eb50f9b3e501033d39180b4d.jpg', '435d340a08df66d03678fda2efdb5582.jpg', '', '', '', '', '', '', '', '', '', '', '', 'a:24:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 20, '2022-06-06 16:35:21', 1),
(156, 'curtlin-manor-ltd', 109, '61 Bonney Rd, Nauwigewauk ', 'E5N7A1 ', 'Tammy', 'breelizz@live.com', '5068323510', '5068325794', 1, 9, 1, 5, 'Rothesay Pharmachoice', '2,3', 2, 'f887f76a3022d34b893b7a910833d2d4.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'a:20:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";}', 20, 20, '2022-08-03 13:02:31', 1),
(158, 'domaine-la-valle-de-memramcook-inc', 110, '18 rue Marcellin', 'E4K 2J7', 'Paul Rossignol', 'paulro@foyerstthomas.org', '506-758-4005', '506-758-9489', 2, 28, 3, 1, 'Phamiliprix Memramcook', '1,4', 1, '1f7e6d77c339500c0b1e7838b01ebe04.gif', 'ce3d5dc079d2ba2a89f59b8b4c02e299.jpg', '698c65dcf39a8310d44366a6731877e1.jpg', 'caaaff7dbdbc2d5d34264a0ea90b6c96.jpg', '2a408436984d49296ca6fade784ed3d7.jpg', 'ee52da5f7adf5aaa5f721fb6646a9446.jpg', '', '', '', '', '', '', '', 'a:24:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 40, 0, '2022-08-15 21:15:18', 1),
(163, '', 0, '824 Coverdale Road, Riverview, NB ', 'E1B 0H9', 'Alison Baxter', 'abaxter@shannex.com', '5063870533', '506-387-7707', 0, 60, 1, 1, 'Lawton\'s Drug', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, '', 'https://www.facebook.com/experienceparkland', '', '', 'https://www.youtube.com/ExperienceParkland', '', '', 'a:18:{i:14;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:16;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:29;s:1:\"1\";}', 0, 0, '2022-08-23 13:25:42', 1),
(164, '', 0, '185 Loch Lomond Rd, Saint John, NB E2J 3S3', 'E2J 3S3', 'Cindy', 'cleavitt@lochlomondvilla.com', '5066438497', '5066438283', 0, 0, 1, 1, 'Lawton\'s Pharmacy', '1', 2, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:5:{i:12;s:1:\"1\";i:13;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:27;s:1:\"1\";}', 0, 0, '2022-08-30 18:37:44', 1),
(165, '', 0, '185 Loch Lomond Rd, Saint John, NB E2J 3S3', 'E2J 3S3', 'Cindy', 'cleavitt@lochlomondvilla.com', '5066438497', '5066438283', 0, 18, 1, 1, 'Lawton\'s Pharmacy', '1', 2, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:5:{i:12;s:1:\"1\";i:13;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:27;s:1:\"1\";}', 0, 0, '2022-08-30 18:39:01', 1),
(166, '', 0, '185 Loch Lomond Rd, Saint John, NB E2J 3S3', 'E2J 3S3', 'Cindy', 'cleavitt@lochlomondvilla.com', '5066438497', '5066438283', 0, 18, 1, 1, 'Lawton\'s Pharmacy', '1', 2, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:5:{i:12;s:1:\"1\";i:13;s:1:\"1\";i:6;s:1:\"1\";i:20;s:1:\"1\";i:27;s:1:\"1\";}', 0, 0, '2022-08-30 18:48:29', 1),
(167, '', 0, '560 Front Mountain Road, Moncton NB E1G 3H3', 'E1G3H3', 'Mary Phillips', 'hillsideview13@gmail.com', '5063883018', '5063883018', 0, 13, 1, 4, 'Jean Coutu', '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:28:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:7;s:1:\"1\";i:9;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:15;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:23;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 0, 0, '2022-08-31 00:25:38', 1),
(168, '', 0, '467 Picadilly Road, Piccadilly, Saint John NB E4E 5J7', 'E4E 5J7', 'Wilma Ledin', 'buchananwilma@gmail.com', '506 229 2170', '', 0, 9, 1, 1, 'Lawtons', '1', 2, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 'a:23:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:11;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:16;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:4;s:1:\"1\";i:6;s:1:\"1\";i:8;s:1:\"1\";i:20;s:1:\"1\";i:21;s:1:\"1\";i:22;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 0, 0, '2022-09-02 20:24:31', 1),
(169, 'foyer-linda-charest', 111, '53 Arran st, Campbellton', 'E3N 5E5', 'Christina Charest', 'foyer.charest@gmail.com', '5067601744', '5067536262', 1, 18, 3, 1, 'Jean Coutu', '3,4,1,2', 5, '15c4dfb7a12bdbc0b6b17eb37f64f497.jpeg', '', '', '', '', '', '', '', '', '', '', '', '', 'a:18:{i:14;s:1:\"1\";i:3;s:1:\"1\";i:12;s:1:\"1\";i:10;s:1:\"1\";i:13;s:1:\"1\";i:5;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";i:19;s:1:\"1\";i:2;s:1:\"1\";i:20;s:1:\"1\";i:22;s:1:\"1\";i:24;s:1:\"1\";i:25;s:1:\"1\";i:26;s:1:\"1\";i:27;s:1:\"1\";i:28;s:1:\"1\";i:29;s:1:\"1\";}', 20, 20, '2022-09-07 14:17:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `residences_desc`
--

CREATE TABLE `residences_desc` (
  `desc_id` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `residences_desc`
--

INSERT INTO `residences_desc` (`desc_id`, `residence_id`, `name`, `description`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(1, 1, 'Seely Lodge', 'Welcome to Seely Lodge Special Care Home, where your comfort and well-being are our number one priority.   For over 27 years we have remained dedicated to providing the highest level of care possible for our residents.    Our smaller comfortable setting offers you and your family a more intimate and accessible experience to care. When staying at home is no longer an option, or you just need temporary accommodations, let us help!\r\n\r\nDescription of Services: \r\n\r\nOur home is located in Martinon, a short drive from West Saint John. This provides easy access to doctors, dentists, churches, pharmacies, community centers, walking trails and post offices.\r\nWe provide 24-hour care and supervision for a wide range of physical, social, medical and mental health needs. This includes full medication administration, all personal care, housekeeping, laundry, meals and snacks, etc.\r\n\r\nProgramming:\r\n\r\nResidents are encouraged to be active and stay involved in community programs and events. We also employ a recreation director and utilize dedicated volunteers to enhance our weekly activities.  Eligible residents also attend weekly Outreach program offered by Loch Lomond Villa and we provide transportation to and from. \r\n\r\nLevel of Care:\r\n\r\nOur areas of experience include oxygen use, diabetes management, mild to moderate dementia, multiple sclerosis, epilepsy, catheter & ostomy care, MRSA, incontinence, congestive heart failure, mobility issues, wound care, and various mental health conditions, etc. \r\n\r\nWe are approved to offer long term or short term accommodations. Temporary placement for relief/respite or convalescent care is available depending upon existing vacancies.\r\n\r\nCredentials:\r\n\r\nJan Seely has owned and operated this home for 27 years.  Our home is licensed and inspected, by the Department of Social Development.  Our personnel are fully qualified according to provincial standards and regulations.  We also have regular inspections, and adhere to all requirements, of the provincial Fire Marshall\'s office and Public Health & Safety Department.', 'Seely Lodge', NULL, NULL, 'en'),
(2, 1, 'Seely Lodge', 'Welcome to Seely Lodge Special Care Home, where your comfort and well-being are our number one priority.   For over 25 years we have remained dedicated to providing the highest level of care possible for our residents.    Our smaller comfortable setting offers you and your family a more intimate and accessible experience to care. When staying at home is no longer an option, or you just need temporary accommodations, let us help!\r\n\r\nDescription of Services: \r\n\r\nOur home is located in Martinon, a short drive from West Saint John. This provides easy access to doctors, dentists, churches, pharmacies, community centers, walking trails and post offices.\r\nWe provide 24-hour care and supervision for a wide range of physical, social, medical and mental health needs. This includes full medication administration, all personal care, housekeeping, laundry, meals and snacks, etc.\r\n\r\nProgramming:\r\n\r\nResidents are encouraged to be active and stay involved in community programs and events. We also employ a recreation director and utilize dedicated volunteers to enhance our weekly activities.  Eligible residents also attend weekly Outreach program offered by Loch Lomond Villa and we provide transportation to and from. \r\n\r\nLevel of Care:\r\n\r\nOur areas of experience include oxygen use, diabetes management, mild to moderate dementia, multiple sclerosis, epilepsy, catheter & ostomy care, MRSA, incontinence, congestive heart failure, mobility issues, wound care, and various mental health conditions, etc. \r\n\r\nWe are approved to offer long term or short term accommodations. Temporary placement for relief/respite or convalescent care is available depending upon existing vacancies.\r\n\r\nCredentials:\r\n\r\nJan Seely has owned and operated this home for 25 years.  Our home is licensed and inspected, by the Department of Social Development.  Our personnel are fully qualified according to provincial standards and regulations.  We also have regular inspections, and adhere to all requirements, of the provincial Fire Marshall\'s office and Public Health & Safety Department.', 'Seely Lodge', NULL, NULL, 'fr'),
(3, 2, 'Birchmount Lodge', NULL, 'Birchmount Lodge', NULL, NULL, 'en'),
(4, 2, 'Birchmount Lodge', NULL, 'Birchmount Lodge', NULL, NULL, 'fr'),
(5, 3, 'Victoria Villa ', 'N/A', 'Victoria Villa Inc.', NULL, NULL, 'en'),
(6, 3, 'Victoria Villa Inc.', 'N/A', 'Victoria Villa Inc.', NULL, NULL, 'fr'),
(7, 4, 'All Needs Special Care Home Inc.', 'Residents may be driven to appointments when necessary. We ask that families pitch in with family members appointments for their own good, as long as permitted.', 'All Needs Special Care Home Inc.', NULL, NULL, 'en'),
(8, 4, 'All Needs Special Care Home Inc.', 'Residents may be driven to appointments when necessary. We ask that families pitch in with family members appointments for their own good, as long as permitted.', 'All Needs Special Care Home Inc.', NULL, NULL, 'fr'),
(9, 5, 'Alouette Special Care Home', 'Alouette Special Care Home is for adults with mental health illnesses such as ADHD, Anxiety, Bi-Polar, Depression, Personality Disorder and Schizophrenia. Services provided are:<br>\r\n  • Furnished resident rooms with bedding and towels<br>\r\n  • Wi-Fi and cable T.V.<br>\r\n  • Assistance with personal care and medications<br>\r\n  • Coordination of medical appointments and transportation<br>\r\n  • Meals and snacks following the Canada Food Guide<br>\r\n  • Onsite footcare and hairdressing<br>\r\n  • Housekeeping and laundry<br>\r\n  • Indoor Smoking Room<br>\r\n  • 10 Codiac Transit or 8 Wheelchair Guy tickets per month<br>\r\n  • Activities schedule<br>\r\n  • Annual Income Tax Clinic<br>\r\nThere are trails, parks, and a convenience store within a short walk. To inquire or arrange a tour please contact Denis LeBlanc at 863-9941', 'Alouette Special Care Home', NULL, NULL, 'en'),
(10, 5, 'Alouette Special Care Home', 'n', 'Alouette Special Care Home', NULL, NULL, 'fr'),
(11, 6, 'Concorde Hall', 'Parkland in the Valley’s Concorde Hall is a 60-suite Licensed Level 2 Special Care (Assisted Living) residence uniquely designed for older adults who require light to moderate assistance and/or supervision with activities of daily living. Assisted Living allows you to enjoy the lifestyle you want, while providing a helping hand to ensure continued independence, happiness and quality of life.\r\nLocated in breathtaking Kennebecasis Valley, residents enjoy premium accommodations including private and spacious suites, unparalleled amenities and exceptional service in the vibrant community of Quispamsis. \r\nOur dedicated team includes an in-house Chef, Wellness Coach and experienced hospitality and healthcare professionals committed to the health and happiness of residents. With restaurant-style dining and delicious meals, social programming, beautiful scenery, bowling alley, movie theatre and 24/7 emergency response, Parkland is where you can live your best life.', 'Concorde Hall', NULL, NULL, 'en'),
(12, 6, 'Concorde Hall', 'Licensed 60 bed special care home located in Quispamsis, NB. Welcome to Parkland In The Valley.', 'Concorde Hall', NULL, NULL, 'fr'),
(13, 7, 'Hillside View Special Care Home', '', 'Hillside View Special Care Home', NULL, NULL, 'en'),
(14, 7, 'Hillside View Special Care Home', 'j', 'Hillside View Special Care Home', NULL, NULL, 'fr'),
(15, 8, 'Loch Lomond Villa Special Care Home', '.', 'Loch Lomond Villa Special Care Home', NULL, NULL, 'en'),
(16, 8, 'Loch Lomond Villa Special Care Home', '.', 'Loch Lomond Villa Special Care Home', NULL, NULL, 'fr'),
(17, 9, 'Paradise Villa Inc.', 'Paradise Villa Inc. is nestled in a country-like setting conveniently located near shopping,\r\nchurches, bus route, and a short drive to downtown Fredericton.  Our new state of the art\r\nassisted living Senior Residence Complex truly defines what seniors living should\r\nbe.  Thoughtfully designed and beautifully executed, this well-appointed residence offers 78\r\nsingle first-class suites, and 4 of the 78 can be converted into suites for couples or\r\nsiblings.  This complex cares for level 2 and 3b residents.  This property is very well-managed\r\nwith experienced and committed staff.', 'Paradise Villa Inc.', NULL, NULL, 'en'),
(18, 9, 'Paradise Villa Inc.', 'Paradise Villa Inc. is nestled in a country-like setting conveniently located near shopping,\r\nchurches, bus route, and a short drive to downtown Fredericton.  Our new state of the art\r\nassisted living Senior Residence Complex truly defines what seniors living should\r\nbe.  Thoughtfully designed and beautifully executed, this well-appointed residence offers 78\r\nsingle first-class suites, and 4 of the 78 can be converted into suites for couples or\r\nsiblings.  This complex cares for level 2 and 3b residents.  This property is very well-managed\r\nwith experienced and committed staff.', 'Paradise Villa Inc.', NULL, NULL, 'fr'),
(19, 10, 'Mazerolle special care home LTD', 'Mazerolle Special care home is a licensed 26 bed level 2 home established in 1995.\r\nOur home is located in the beautiful city of Dieppe which offers there residents a shared cost for accessible transportation to and from medical appointments and outings. We are located on the city bus route and walking distance to corner store, church, mall and bowling alley.\r\nOur home is a ground floor facility with wheel chair accessibility inside and out with large patios, outdoor green space for lots of flowers and veggie gardens and a beautiful breeze off the cool marsh.\r\nThe home offers homestyle meals and snacks that adhere to Canada\'s food guide along with special diets including diabetic, cardiac, nephrology.\r\nThe facility has lots of safety features with sturdy grip poles and transfer benches in all bathrooms along with a sprinkler system in place and monitored fire alarms with security cameras. We are inspected yearly by fire marshal office, public health and social development.\r\nOur cozy living room has lots of windows, big screen TV and leather lazy boy chairs. There is an activity room with internet café set up for virtual visits and access to our house Gmail account. We have a full service hair and nail salon and a lazy house cat named \"Bonnie\".\r\nWe offer personal care, laundry services, medication and diabetic management, support from Extra-Mural and updating any new physicians orders as needed with lots of activities both inside and out. Staff are dedicated, love their job and have met or exceeded all social developments hiring requirements.. \r\nCome join our family!', 'Mazerolle special care home LTD', NULL, NULL, 'en'),
(20, 10, 'Mazerolle special care home LTD', 'Mazerolle Special care home is a licensed 26 bed level 2 home established in 1995.\r\nOur home is located in the beautiful city of Dieppe which offers there residents a shared cost for accessible transportation to and from medical appointments and outings. We are located on the city bus route and walking distance to corner store, church, mall and bowling alley.\r\nOur home is a ground floor facility with wheel chair accessibility inside and out with large patios, outdoor green space for lots of flowers and veggie gardens and a beautiful breeze off the cool marsh.\r\nThe home offers homestyle meals and snacks that adhere to Canada\'s food guide along with special diets including diabetic, cardiac, nephrology.\r\nThe facility has lots of safety features with sturdy grip poles and transfer benches in all bathrooms along with a sprinkler system in place and monitored fire alarms with security cameras. We are inspected yearly by fire marshal office, public health and social development.\r\nOur cozy living room has lots of windows, big screen TV and leather lazy boy chairs. There is an activity room with internet café set up for virtual visits and access to our house Gmail account. We have a full service hair and nail salon and a lazy house cat named \"Bonnie\".\r\nWe offer personal care, laundry services, medication and diabetic management, support from Extra-Mural and updating any new physicians orders as needed with lots of activities both inside and out. Staff are dedicated, love their job and have met or exceeded all social developments hiring requirements.. \r\nCome join our family!', 'Mazerolle special care home LTD', NULL, NULL, 'fr'),
(21, 11, 'Riverdale Manor', 'Country style home, located in Hampton. Home away from home!', 'Riverdale Manor', NULL, NULL, 'en'),
(22, 11, 'Riverdale Manor', 'Country style home, located in Hampton. Home away from home!', 'Riverdale Manor', NULL, NULL, 'fr'),
(23, 12, 'Serenity Cove Special Care Home', 'Our home is in the country and has a huge back deck with a waterfall which makes it so relaxing for the residents to enjoy the nice summer days.  Our residents also enjoy their own private rooms.  Our residents also love that our home use to be a rectory.  We are only 1 minute from Grandbay-Westfield and 15 Minutes to get into town.', 'Serenity Cove Special Care Home', NULL, NULL, 'en'),
(24, 12, 'Serenity Cove Special Care Home', 'Our home is in the country and has a huge back deck with a waterfall which makes it so relaxing for the residents to enjoy the nice summer days.  Our residents also enjoy their own private rooms.  Our residents also love that our home use to be a rectory.  We are only 1 minute from Grandbay-Westfield and 15 Minutes to get into town.', 'Serenity Cove Special Care Home', NULL, NULL, 'fr'),
(25, 13, 'Riverbend residence', 'Questions you may have about living in our Special Care Home: \r\nRiverbend Residence @ Norma’s Place\r\n\r\n\r\nWho owns and operates Riverbend Residence? Local Miramichiers, Colin and Sara Williston, own and operate Riverbend Residence@ NormasPlace.  Colin has his degree in Business from Dalhousie University and is a proprietor for over 25 years and Sara is a Registered Nurse of over 25 years\r\n\r\nWhen did Riverbend Residence @ Normas Place open? We opened May 1st, 2020\r\nWhere did Riverbend Residence get its name? We wished to incorporate our beautiful river system while commemorating Colin’s Mother, Norma.  Each resident room is named after a tributary river which feeds into the Great Miramichi River\r\n\r\nWhere are you located?  We are centrally located at 158 Wellington Street, Downtown Chatham, Miramichi, NB \r\n\r\nWhat level of care do you offer at Riverbend Residence? We specialize in Level 1 and Level 2 adult care.  We help with assistance in personal hygiene, medication administration, and activities of daily living.  \r\n\r\nWho pays for what? – The cost to stay at Riverbend is the same for everyone. Social Development carries out a financial assessment which will determine the amount that you will pay Riverbend Residence for your stay and what Social Development will contribute.  Depending on your income amount, a combination of your income and a subsidized amount provided by Social Development will cover the cost of rent at Riverbend Residence @ Norma’s Place. Once again, this is dependent on your individual income. \r\n\r\nWhat is included in the rent at Riverbend? Riverbend provides you a comfortable single room equipped with furnishings, 3 nutritious meals, snacks, entertainment, heat, lights, wifi, and 24 hour professional personal care.\r\n\r\nDo I receive any personal money to do with as I wish? – Each month, everyone will receive a comfort allowance as per Social Development. This allowance helps cover the costs of your medications and any personal items you may require.\r\n\r\nWhat is in each room?  In each room, there is a single bed, bed linens including a duvet, individual sinks, a chest of drawers, a bedside table and lamp, an armoire, a chair, a television, and a telephone. (cable service and personal phone line is provided at a reduced rate of $50/mth)\r\n\r\nCan couples live together? -  Riverbend Residence will do their best to accommodate the request to have side-by-side rooms however; there are no double rooms in our home.\r\n\r\nDoes Riverbend make and take me to any medical appointments?  We ask that you and your family maintain your medical management with respect to doctor’s appointments, and any other healthcare appointments. In the event that your family is not able to assist, we can help make arrangements with you to meet those needs.  \r\n\r\nAre there items I am not allowed to bring? – You are not permitted to have any appliance with an element in your rooms (i.e coffee maker, toaster, kettle etc.). Also, anything with an open flame is not permitted as per fire regulations and the safety to our home.\r\n\r\nAre pets allowed?  Riverbend Residence @ Norma’s Place welcomes visits from pets with permission from the operator.  \r\n\r\nWhat is your smoking policy? – Smoking is not permitted in or around Riverbend Residence @ Norma’s Place within 9 meters of an entrance; however, there is a designated smoking area on the grounds of our home.\r\n\r\nHow many residents does your home accommodate? We can accommodate 20 people with individual care needs at Riverbend Residence @ Norma’s Place.  \r\n\r\nWhat is the meal service like? – We take pride in saying that each day there are 3 home cooked meals served along with snacks in the afternoon and evening if desired by the residents. Meals are served at approximately: 8am, 12pm, and 4:30pm with the largest meal of the day being lunchtime. \r\n\r\nAre families welcome to visit? – Families and friends are always encouraged and certainly welcome. Sometimes there are rules and regulations that we are required to follow as per Social Development.\r\n\r\nAre there specific visiting hours? There are no designated visiting hours at Riverbend Residence @ Norma’s Place however due to some Social Development regulations during health outbreaks, restrictions may be in place with restricted or limited visiting.  It is best to call us to find out if there are such rules in place.\r\n\r\nAm I allowed to give gifts to employees? – Riverbend Residence @ Norma’s Place kindly asks that the public and residents do not give gifts of significant monetary value to employees. Small gifts, however, of insignificant monetary value are permitted, for example cookies that can be enjoyed by all staff.\r\n\r\nDo I bring my medications? Upon arrival, you are asked to bring all of you medications.  Your medications will be placed in a locked medication room and administered by staff only. You are not permitted to keep any medications on hand or in your room as per Social Development guidelines except for rescue medications such as rescue inhaler or epi pens.\r\n\r\nAre there social activities at Riverbend Residence?  We have had several different social activities at Riverbend including- Movie nights, music entertainers, crafts, weekly bingo, daily card games, campfire outings, washer toss, etc…\r\n\r\nIs alcohol or recreational drugs permitted at Riverbend?  We do not permit the use of alcohol or recreational drugs in our home unless directed and monitored by their primary heath care provider.\r\nCan I leave Riverbend to visit friends and family? What about overnight stays?  We encourage you to maintain and foster personal and/or family relationships, which includes your family and friends visiting you in your home and you visiting them in theirs.\r\n\r\nWho do I contact if I have any other questions?  You can call Sara at 625-3998 or Colin at 623-8608 \r\nWe would like to thank you for your interest in Riverbend Residence@ Norma’s Place\r\nColin and Sara', 'Riverbend residence', NULL, NULL, 'en'),
(26, 13, 'Riverbend residence', 'Questions you may have about living in our Special Care Home: \r\nRiverbend Residence @ Norma’s Place\r\n\r\n\r\nWho owns and operates Riverbend Residence? Local Miramichiers, Colin and Sara Williston, own and operate Riverbend Residence@ NormasPlace.  Colin has his degree in Business from Dalhousie University and is a proprietor for over 25 years and Sara is a Registered Nurse of over 25 years\r\n\r\nWhen did Riverbend Residence @ Normas Place open? We opened May 1st, 2020\r\nWhere did Riverbend Residence get its name? We wished to incorporate our beautiful river system while commemorating Colin’s Mother, Norma.  Each resident room is named after a tributary river which feeds into the Great Miramichi River\r\n\r\nWhere are you located?  We are centrally located at 158 Wellington Street, Downtown Chatham, Miramichi, NB \r\n\r\nWhat level of care do you offer at Riverbend Residence? We specialize in Level 1 and Level 2 adult care.  We help with assistance in personal hygiene, medication administration, and activities of daily living.  \r\n\r\nWho pays for what? – The cost to stay at Riverbend is the same for everyone. Social Development carries out a financial assessment which will determine the amount that you will pay Riverbend Residence for your stay and what Social Development will contribute.  Depending on your income amount, a combination of your income and a subsidized amount provided by Social Development will cover the cost of rent at Riverbend Residence @ Norma’s Place. Once again, this is dependent on your individual income. \r\n\r\nWhat is included in the rent at Riverbend? Riverbend provides you a comfortable single room equipped with furnishings, 3 nutritious meals, snacks, entertainment, heat, lights, wifi, and 24 hour professional personal care.\r\n\r\nDo I receive any personal money to do with as I wish? – Each month, everyone will receive a comfort allowance as per Social Development. This allowance helps cover the costs of your medications and any personal items you may require.\r\n\r\nWhat is in each room?  In each room, there is a single bed, bed linens including a duvet, individual sinks, a chest of drawers, a bedside table and lamp, an armoire, a chair, a television, and a telephone. (cable service and personal phone line is provided at a reduced rate of $50/mth)\r\n\r\nCan couples live together? -  Riverbend Residence will do their best to accommodate the request to have side-by-side rooms however; there are no double rooms in our home.\r\n\r\nDoes Riverbend make and take me to any medical appointments?  We ask that you and your family maintain your medical management with respect to doctor’s appointments, and any other healthcare appointments. In the event that your family is not able to assist, we can help make arrangements with you to meet those needs.  \r\n\r\nAre there items I am not allowed to bring? – You are not permitted to have any appliance with an element in your rooms (i.e coffee maker, toaster, kettle etc.). Also, anything with an open flame is not permitted as per fire regulations and the safety to our home.\r\n\r\nAre pets allowed?  Riverbend Residence @ Norma’s Place welcomes visits from pets with permission from the operator.  \r\n\r\nWhat is your smoking policy? – Smoking is not permitted in or around Riverbend Residence @ Norma’s Place within 9 meters of an entrance; however, there is a designated smoking area on the grounds of our home.\r\n\r\nHow many residents does your home accommodate? We can accommodate 20 people with individual care needs at Riverbend Residence @ Norma’s Place.  \r\n\r\nWhat is the meal service like? – We take pride in saying that each day there are 3 home cooked meals served along with snacks in the afternoon and evening if desired by the residents. Meals are served at approximately: 8am, 12pm, and 4:30pm with the largest meal of the day being lunchtime. \r\n\r\nAre families welcome to visit? – Families and friends are always encouraged and certainly welcome. Sometimes there are rules and regulations that we are required to follow as per Social Development.\r\n\r\nAre there specific visiting hours? There are no designated visiting hours at Riverbend Residence @ Norma’s Place however due to some Social Development regulations during health outbreaks, restrictions may be in place with restricted or limited visiting.  It is best to call us to find out if there are such rules in place.\r\n\r\nAm I allowed to give gifts to employees? – Riverbend Residence @ Norma’s Place kindly asks that the public and residents do not give gifts of significant monetary value to employees. Small gifts, however, of insignificant monetary value are permitted, for example cookies that can be enjoyed by all staff.\r\n\r\nDo I bring my medications? Upon arrival, you are asked to bring all of you medications.  Your medications will be placed in a locked medication room and administered by staff only. You are not permitted to keep any medications on hand or in your room as per Social Development guidelines except for rescue medications such as rescue inhaler or epi pens.\r\n\r\nAre there social activities at Riverbend Residence?  We have had several different social activities at Riverbend including- Movie nights, music entertainers, crafts, weekly bingo, daily card games, campfire outings, washer toss, etc…\r\n\r\nIs alcohol or recreational drugs permitted at Riverbend?  We do not permit the use of alcohol or recreational drugs in our home unless directed and monitored by their primary heath care provider.\r\nCan I leave Riverbend to visit friends and family? What about overnight stays?  We encourage you to maintain and foster personal and/or family relationships, which includes your family and friends visiting you in your home and you visiting them in theirs.\r\n\r\nWho do I contact if I have any other questions?  You can call Sara at 625-3998 or Colin at 623-8608 \r\nWe would like to thank you for your interest in Riverbend Residence@ Norma’s Place\r\nColin and Sara', 'Riverbend residence', NULL, NULL, 'fr'),
(27, 14, 'Agape Home', '.', 'Agape Home', NULL, NULL, 'en'),
(28, 14, 'Agape Home', '.', 'Agape Home', NULL, NULL, 'fr'),
(29, 15, 'Brunswick Hall', 'Parkland Fredericton’s Brunswick Hall is a 60-suite Licensed Level 2 Special Care (Assisted Living) residence uniquely designed for older adults who require light to moderate assistance and/or supervision with activities of daily living. Assisted Living allows you to enjoy the lifestyle you want, while providing a helping hand to ensure continued independence, happiness and quality of life.\r\nLocated in New Brunswick’s vibrant capital city of Fredericton, residents enjoy premium accommodations including private and spacious suites, unparalleled amenities and exceptional service. \r\n\r\nOur dedicated team of experienced hospitality and healthcare professionals are committed to helping each resident live their best life. Parkland Fredericton offers restaurant-style dining, a wellness centre and spa, lounge areas, shuttle service, daily programming and more. At Parkland, do more of what you love in a place where neighbours become friends.', 'Brunswick Hall', NULL, NULL, 'en'),
(30, 15, 'Brunswick Hall', 'Services designed to meet specialized care needs. Assisted Living allows you to enjoy the lifestyle you want, while providing a helping hand to support you in your daily activities.', 'Brunswick Hall', NULL, NULL, 'fr'),
(31, 16, 'B&B Balanced Wellness Center Inc/Centre du mieux-être équilibré B&B Inc.', NULL, 'B&B Balanced Wellness Center Inc/Centre du mieux-être équilibré B&B Inc.', NULL, NULL, 'en'),
(32, 16, 'B&B Balanced Wellness Center Inc/Centre du mieux-être équilibré B&B Inc.', NULL, 'B&B Balanced Wellness Center Inc/Centre du mieux-être équilibré B&B Inc.', NULL, NULL, 'fr'),
(33, 17, 'Always Here Care Home', 'Welcome to our Home nestled on a beautiful property at 32 Baxter Rd.\r\n\r\nI would like to list a few items of interest:\r\n\r\n~ Owner lives on site with her family, 2 pups and a cat.\r\n~ Owner has operated this Care Home for 27 years.\r\n~ All one level.\r\n~ Wheelchair accessible.\r\n~ Designated Smoking area.\r\n~ 24 hr. supervision.\r\n~ Medications administered by qualified staff.\r\n~ Home cooked meals prepared by qualified staff.\r\n~ Transportation provided to and from Drs. appts.\r\n~ No upcharge.\r\n~ Foot Care provided for eligible residents.\r\n~ Mobile hairdresser.\r\n~ Established ongoing relationship with Extra Mural.\r\n~ All private rooms.\r\n~ 2 full baths.\r\n\r\nIf there’s further info./questions, please feel free to reach out.', 'Always Here Care Home', NULL, NULL, 'en'),
(34, 17, 'Always Here Care Home', 'Welcome to our Home nestled on a beautiful property at 32 Baxter Rd.\r\n\r\nI would like to list a few items of interest:\r\n\r\n~ Owner lives on site with her family, 2 pups and a cat.\r\n~ Owner has operated this Care Home for 27 years.\r\n~ All one level.\r\n~ Wheelchair accessible.\r\n~ Designated Smoking area.\r\n~ 24 hr. supervision.\r\n~ Medications administered by qualified staff.\r\n~ Home cooked meals prepared by qualified staff.\r\n~ Transportation provided to and from Drs. appts.\r\n~ No upcharge.\r\n~ Foot Care provided for eligible residents.\r\n~ Mobile hairdresser.\r\n~ Established ongoing relationship with Extra Mural.\r\n~ All private rooms.\r\n~ 2 full baths.\r\n\r\nIf there’s further info./questions, please feel free to reach out.', 'Always Here Care Home', NULL, NULL, 'fr'),
(35, 18, 'Slow Current Special Care Home', 'N/A', 'Slow Current Special Care Home', NULL, NULL, 'en'),
(36, 18, 'Slow Current Special Care Home', 'N/A', 'Slow Current Special Care Home', NULL, NULL, 'fr'),
(37, 19, 'Melansons special care home', 'Residential care house operating since 1985. Offer full suite of services including medical transport, medication management, outings, meal prep and special diets, laundry,  personal hygiene, central location,', 'Melansons special care home', NULL, NULL, 'en'),
(38, 19, 'Melansons special care home', 'Residential care house operating since 1985. Offer full suite of services including medical transport, medication management, outings, meal prep and special diets, laundry,  personal hygiene, central location,', 'Melansons special care home', NULL, NULL, 'fr'),
(39, 20, 'Hillside Lodge Inc', 'We are a level 2 home located in the heart of Fredeicton. We provide ourselves on the level of care we provide to our residents. Please reach out to us if you are looking for a placement for your loved one. We would be happy to hear from you.', 'Hillside Lodge Inc', NULL, NULL, 'en'),
(40, 20, 'Hillside Lodge Inc', 'We are a level 2 home located in the heart of Fredeicton. We provide ourselves on the level of care we provide to our residents. Please reach out to us if you are looking for a placement for your loved one. We would be happy to hear from you.', 'Hillside Lodge Inc', NULL, NULL, 'fr'),
(41, 21, 'Maritime Manor Special Care Home', 'We are a level 2 special care home. We strive on making our clients feel like they are at home in our small 9 bed facility, with a cozy home like feeling. We have qualified staff and 15plus years experience in geriatric care.', 'Maritime Manor Special Care Home', NULL, NULL, 'en'),
(42, 21, 'Maritime Manor Special Care Home', 'We are a level 2 special care home. We strive on making our clients feel like they are at home in our small 9 bed facility, with a cozy home like feeling. We have qualified staff and 15plus years experience in geriatric care.', 'Maritime Manor Special Care Home', NULL, NULL, 'fr'),
(43, 22, 'Carlisle Special Care Home', 'm', 'Carlisle Special Care Home', NULL, NULL, 'en'),
(44, 22, 'Carlisle Special Care Home', 'm', 'Carlisle Special Care Home', NULL, NULL, 'fr'),
(45, 23, 'ProTem Memory Care', 'ProTem Memory Care provides care exclusively to those who are living with a dementia diagnosis (3B).\r\nOur community is made up of 5 small homes that include a secured backyard area with gardens and walking paths. To the best of our ability we schedule the same care team in the same home with no more than 10 residents. We want our residents to build a meaningful and trusting relationship with those who are caring for them. There is 1 caregiver for every 3 residents. Our structural layout, customized care packages, daily activities, and trained team members is how ProTem offers true resident centred care to our residents and their families.', 'ProTem Memory Care', NULL, NULL, 'en'),
(46, 23, 'ProTem Memory Care', 'ProTem Memory Care provides care exclusively to those who are living with a dementia diagnosis (3B).\r\nOur community is made up of 5 small homes that include a secured backyard area with gardens and walking paths. To the best of our ability we schedule the same care team in the same home with no more than 10 residents. We want our residents to build a meaningful and trusting relationship with those who are caring for them. There is 1 caregiver for every 3 residents. Our structural layout, customized care packages, daily activities, and trained team members is how ProTem offers true resident centred care to our residents and their families.', 'ProTem Memory Care', NULL, NULL, 'fr'),
(47, 24, 'Grass Home Ltd', '', 'Grass Home Ltd', NULL, NULL, 'en'),
(48, 24, 'Grass Home Ltd', NULL, 'Grass Home Ltd', NULL, NULL, 'fr'),
(49, 25, 'Charlene’s Special Care Home', '.', 'Charlene’s Special Care Home', NULL, NULL, 'en'),
(50, 25, 'Charlene’s Special Care Home', '.', 'Charlene’s Special Care Home', NULL, NULL, 'fr'),
(51, 26, 'West Side Manor', NULL, 'West Side Manor', NULL, NULL, 'en'),
(52, 26, 'West Side Manor', NULL, 'West Side Manor', NULL, NULL, 'fr'),
(53, 27, '3 Brooks Villa', NULL, '3 Brooks Villa', NULL, NULL, 'en'),
(54, 27, '3 Brooks Villa', NULL, '3 Brooks Villa', NULL, NULL, 'fr'),
(55, 28, 'Elizabeth House Special Care Home Inc.', NULL, 'Elizabeth House Special Care Home Inc.', NULL, NULL, 'en'),
(56, 28, 'Elizabeth House Special Care Home Inc.', NULL, 'Elizabeth House Special Care Home Inc.', NULL, NULL, 'fr'),
(57, 29, 'McGrath Special Care Home', NULL, 'McGrath Special Care Home', NULL, NULL, 'en'),
(58, 29, 'McGrath Special Care Home', NULL, 'McGrath Special Care Home', NULL, NULL, 'fr'),
(59, 30, 'McLay’s Oak Bay Haven Inc', NULL, 'McLay’s Oak Bay Haven Inc', NULL, NULL, 'en'),
(60, 30, 'McLay’s Oak Bay Haven Inc', NULL, 'McLay’s Oak Bay Haven Inc', NULL, NULL, 'fr'),
(61, 31, 'Residence O Bons Soins', 'Residence O Bons Soins is located in the beautiful Shediac NB area and we are always available to talk with you about our facility and your needs.\r\n\r\nWe have 98 License subsidies beds and 33 Private independent beds\r\n\r\nCall Collette anytime at 506-312-3301to include your name on a waiting list.', 'Residence O Bons Soins', NULL, NULL, 'en'),
(62, 31, 'Residence O Bons Soins', 'Residence O Bons Soins is located in the beautiful Shediac NB area and we are always available to talk with you about our facility and your needs.\r\n\r\nWe have 98 License subsidies beds and 33 Private independent beds\r\n\r\nCall Collette anytime at 506-312-3301to include your name on a waiting list.', 'Residence O Bons Soins', NULL, NULL, 'fr'),
(63, 32, 'Southern Comfort Villa', 's', 'Southern Comfort Villa', NULL, NULL, 'en'),
(64, 32, 'Southern Comfort Villa', 's', 'Southern Comfort Villa', NULL, NULL, 'fr'),
(65, 33, 'Emery House', NULL, 'Emery House', NULL, NULL, 'en'),
(66, 33, 'Emery House', NULL, 'Emery House', NULL, NULL, 'fr'),
(67, 34, 'Scenic View Special Care Home', NULL, 'Scenic View Special Care Home', NULL, NULL, 'en'),
(68, 34, 'Scenic View Special Care Home', NULL, 'Scenic View Special Care Home', NULL, NULL, 'fr'),
(69, 35, 'Résidence Ti Bons Soins', 'm', 'Résidence Ti Bons Soins', NULL, NULL, 'en'),
(70, 35, 'Résidence Ti Bons Soins', 'm', 'Résidence Ti Bons Soins', NULL, NULL, 'fr'),
(71, 36, 'Ruth Sawler', 'g', 'Ruth Sawler', NULL, NULL, 'en'),
(72, 36, 'Ruth Sawler', 'g', 'Ruth Sawler', NULL, NULL, 'fr'),
(73, 37, 'Topaz Special care home', NULL, 'Topaz Special care home', NULL, NULL, 'en'),
(74, 37, 'Topaz Special care home', NULL, 'Topaz Special care home', NULL, NULL, 'fr'),
(75, 38, 'Trueman House', NULL, 'Trueman House', NULL, NULL, 'en'),
(76, 38, 'Trueman House', NULL, 'Trueman House', NULL, NULL, 'fr'),
(77, 39, 'Serenacare', 'N/A', 'Serenacare', NULL, NULL, 'en'),
(78, 39, 'Serenacare', 'N/A', 'Serenacare', NULL, NULL, 'fr'),
(79, 40, 'Burns Manor', NULL, 'Burns Manor', NULL, NULL, 'en'),
(80, 40, 'Burns Manor', NULL, 'Burns Manor', NULL, NULL, 'fr'),
(81, 41, 'Green Meadows Special Care Home - Millstream', 'When it comes to mental health, our Lower Millstream location is committed to providing lasting care to the people you love.', 'Green Meadows Special Care Home - Millstream', NULL, NULL, 'en'),
(82, 41, 'Green Meadows Special Care Home - Millstream', 'When it comes to mental health, our Lower Millstream location is committed to providing lasting care to the people you love.', 'Green Meadows Special Care Home - Millstream', NULL, NULL, 'fr'),
(83, 42, 'The Briarlea on Ryan 3G', 'The Briarlea offers progressive care levels; 10 level 2 rooms, 6 level 3B rooms, and 18 level 3G rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea on Ryan 3G', NULL, NULL, 'en'),
(84, 42, 'The Briarlea on Ryan 3G', 'The Briarlea offers progressive care levels; 10 level 2 rooms, 6 level 3B rooms, and 18 level 3G rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea on Ryan 3G', NULL, NULL, 'fr'),
(85, 43, 'Victory House', 'N/A', 'Victory House', NULL, NULL, 'en'),
(86, 43, 'Victory House', 'N/A', 'Victory House', NULL, NULL, 'fr'),
(87, 44, 'Goguen Residence 678780 NB INC.', '-', 'Goguen Residence 678780 NB INC.', NULL, NULL, 'en'),
(88, 44, 'Goguen Residence 678780 NB INC.', '-', 'Goguen Residence 678780 NB INC.', NULL, NULL, 'fr'),
(89, 45, 'Laura Manor Special Care Home', 'Laura Manor Special Care Home has been operating since 1992. Located in the heart of uptown Saint John. On bus route, walking distance to Key Industries, Mental Health Recovery services on Duke street and Mercantile. We accommodate your needs!', 'Laura Manor Special Care Home', NULL, NULL, 'en'),
(90, 45, 'Laura Manor Special Care Home', 'Laura Manor Special Care Home has been operating since 1992. Located in the heart of uptown Saint John. On bus route, walking distance to Key Industries, Mental Health Recovery services on Duke street and Mercantile. We accommodate your needs!', 'Laura Manor Special Care Home', NULL, NULL, 'fr'),
(91, 46, 'Waddell Residence/hobby farm', 'Waddell Residence is situated on the Kingston Peninsula. Just off the Gondola Point Ferry turn right and 1 ½ km’s.\r\nIt is also a hobby farm. We have alpaca’s, goats, sheep, rabbits, chickens cats and dogs the residents help with the care and help look after the yard also..\r\n\r\nIt is close to a local store, school and churches.  Also 5 minutes to Quispamsis. Our clients are accepted by our small community. \r\nWe are registered for 6 clients, everyone has their own room, TV and loads of movies.  Home made meals of course.  I also take them to their appointments and their shopping.', 'Waddell Residence/hobby farm', NULL, NULL, 'en'),
(92, 46, 'Waddell Residence/hobby farm', 'Waddell Residence is situated on the Kingston Peninsula. Just off the Gondola Point Ferry turn right and 1 ½ km’s.\r\nIt is also a hobby farm. We have alpaca’s, goats, sheep, rabbits, chickens cats and dogs the residents help with the care and help look after the yard also..\r\n\r\nIt is close to a local store, school and churches.  Also 5 minutes to Quispamsis. Our clients are accepted by our small community. \r\nWe are registered for 6 clients, everyone has their own room, TV and loads of movies.  Home made meals of course.  I also take them to their appointments and their shopping.', 'Waddell Residence/hobby farm', NULL, NULL, 'fr'),
(93, 47, 'Living Hope SCH Picadilly', 'Living Hope Special Care Home a 9 bed facility located in beautiful Picadilly NB, just 10 minutes outside of Sussex. We strive to be a home where residents want to live and staff choose to work.    At Living Hope Special Care Home we are committed to providing you and your family with the same care that we would expect for ourselves and our own families.', 'Living Hope Special Care Home', NULL, NULL, 'en'),
(94, 47, 'Living Hope Special Care Home', 'Living Hope Special Care Home an 8 bed facility located in beautiful Picadilly NB, just 10 minutes outside of Sussex. We strive to be a home where residents want to live and staff choose to work.  We are an 8 bed level 2 care home.   At Living Hope Special Care Home we are committed to providing you and your family with the same care that we would expect for ourselves and our own families.', 'Living Hope Special Care Home', NULL, NULL, 'fr'),
(95, 48, 'Murray Street Lodge', 'Welcome to Murray Street Lodge Special Care Home, where your comfort and well-being are our number one priority. For over 10 years we have remained dedicated to providing the highest level of care possible for our residents. Our smaller comfortable setting offers you and your family a more intimate and accessible experience to care. When staying at home is no longer an option, or you just need temporary accommodations, let us help! Description of Services: Our home is located in Grand Bay-Westfield, a short drive from West Saint John. This provides easy access to doctors, dentists, churches, pharmacies, community centers, walking trails and post offices. We provide 24-hour care and supervision for a wide range of physical, social, medical and mental health needs. This includes full medication administration, all personal care, housekeeping, laundry, meals and snacks, etc. Programming: Residents are encouraged to be active and stay involved in community programs and events.We utilize dedicated volunteers to enhance our weekly activities. Level of Care: Our areas of experience include oxygen use, diabetes management, mild to moderate dementia, multiple sclerosis, epilepsy, catheter & ostomy care, MRSA, incontinence, congestive heart failure, mobility issues, wound care, and various mental health conditions, etc. We are approved to offer long term or short term accommodations. Temporary placement for relief/respite or convalescent care is available depending upon existing vacancies. Credentials: Heather Perrin has operated this home for 10 years. Our home is licensed and inspected, by the Department of Social Development. Our personnel are fully qualified according to provincial standards and regulations. We also have regular inspections, and adhere to all requirements, of the provincial Fire Marshall\'s office and Public Health & Safety Department.', 'Murray Street Lodge', NULL, NULL, 'en'),
(96, 48, 'Murray Street Lodge', 'Welcome to Murray Street Lodge Special Care Home, where your comfort and well-being are our number one priority. For over 10 years we have remained dedicated to providing the highest level of care possible for our residents. Our smaller comfortable setting offers you and your family a more intimate and accessible experience to care. When staying at home is no longer an option, or you just need temporary accommodations, let us help! Description of Services: Our home is located in Grand Bay-Westfield, a short drive from West Saint John. This provides easy access to doctors, dentists, churches, pharmacies, community centers, walking trails and post offices. We provide 24-hour care and supervision for a wide range of physical, social, medical and mental health needs. This includes full medication administration, all personal care, housekeeping, laundry, meals and snacks, etc. Programming: Residents are encouraged to be active and stay involved in community programs and events.We utilize dedicated volunteers to enhance our weekly activities. Level of Care: Our areas of experience include oxygen use, diabetes management, mild to moderate dementia, multiple sclerosis, epilepsy, catheter & ostomy care, MRSA, incontinence, congestive heart failure, mobility issues, wound care, and various mental health conditions, etc. We are approved to offer long term or short term accommodations. Temporary placement for relief/respite or convalescent care is available depending upon existing vacancies. Credentials: Heather Perrin has operated this home for 10 years. Our home is licensed and inspected, by the Department of Social Development. Our personnel are fully qualified according to provincial standards and regulations. We also have regular inspections, and adhere to all requirements, of the provincial Fire Marshall\'s office and Public Health & Safety Department.', 'Murray Street Lodge', NULL, NULL, 'fr'),
(97, 49, 'METCALF MANOR', 'WE ARE HERE TO HELP THOSE WHO NEED DIRECTION WITH LIFE SKILLS, MEDICATION REMINDERS, ASSISTING WITH PERSONAL CARE, ORGANIZING AND GETTING TO APPOINTMENTS, MEALS AND COMPANIONSHIP.', 'METCALF MANOR', NULL, NULL, 'en'),
(98, 49, 'METCALF MANOR', 'WE ARE HERE TO HELP THOSE WHO NEED DIRECTION WITH LIFE SKILLS, MEDICATION REMINDERS, ASSISTING WITH PERSONAL CARE, ORGANIZING AND GETTING TO APPOINTMENTS, MEALS AND COMPANIONSHIP.', 'METCALF MANOR', NULL, NULL, 'fr'),
(99, 50, 'The Cedars', 'In floor heating, home cooked meals, country living on a large 2 acres secluded property within walking distance to all major restaurants, sprinkler and alarm system for safety, ongoing update for your comfort and convenience and last but definitely not least, staff that really care. Private and semi-private rooms, please contact us for availability!', 'The Cedars', NULL, NULL, 'en'),
(100, 50, 'The Cedars', 'In floor heating, home cooked meals, country living on a large 2 acres secluded property within walking distance to all major restaurants, sprinkler and alarm system for safety, ongoing update for your comfort and convenience and last but definitely not least, staff that really care. Private and semi-private rooms, please contact us for availability!', 'The Cedars', NULL, NULL, 'fr'),
(101, 51, 'Bartlett Gardens Care Home', 'Bartlett Gardens Care Home welcomes you to contact the home.', 'Bartlett Gardens Care Home', NULL, NULL, 'en'),
(102, 51, 'Bartlett Gardens Care Home', 'Bartlett Gardens Care Home welcomes you to contact the home.', 'Bartlett Gardens Care Home', NULL, NULL, 'fr'),
(103, 52, 'Coultons Special Care Home', 'We currently have 2 beds available (ladies only)', 'Coultons Special Care Home', NULL, NULL, 'en'),
(104, 52, 'Coultons Special Care Home', 'We currently have 2 beds available (ladies only)', 'Coultons Special Care Home', NULL, NULL, 'fr'),
(105, 53, 'Twin Towers Special Care Home', '.', 'Twin Towers Special Care Home', NULL, NULL, 'en'),
(106, 53, 'Twin Towers Special Care Home', '.', 'Twin Towers Special Care Home', NULL, NULL, 'fr'),
(107, 54, 'NORTH MINTO RESIDENCE', 'Long Term Care Assisted Living providing  care to Level 2 and Memory Care (3B) Clients. \r\nThe Residence is equipped with an elevator / six foot wide hallways adequate to accommodate wheelchairs and walkers \r\nPrivate and Semi Private rooms with washrooms and grab bars\r\nWhirl Pool Tub, large common area with comfortable chairs, TV and telephone access\r\nWheel Chair Ramps and pull cord alarm system \r\nHallways and common areas are equipped with security cameras\r\nEntry/Exit doors are equipped with door alarms leading to a secure court yard with gazebo and walking pathway \r\n\r\nServices offered: Bilingual  24 hour Supervised Care / Medication Dispensing / Health Clinics / Individualized Personal Care Plan / Health Records / Hygiene and Personal Care / Home Cooked Nutritional Meals / Relief Care / Daily Laundry Service / Daily Housekeeping Services / Medical Transportation  / Hair Care / Foot Care / Pastoral Care / Social Activities / Outings / Newspaper / Mail Delivery', 'NORTH MINTO RESIDENCE', NULL, NULL, 'en'),
(108, 54, 'NORTH MINTO RESIDENCE', 'Long Term Care Assisted Living providing  care to Level 2 and Memory Care (3B) Clients. \r\nThe Residence is equipped with an elevator / six foot wide hallways adequate to accommodate wheelchairs and walkers \r\nPrivate and Semi Private rooms with washrooms and grab bars\r\nWhirl Pool Tub, large common area with comfortable chairs, TV and telephone access\r\nWheel Chair Ramps and pull cord alarm system \r\nHallways and common areas are equipped with security cameras\r\nEntry/Exit doors are equipped with door alarms leading to a secure court yard with gazebo and walking pathway \r\n\r\nServices offered: Bilingual  24 hour Supervised Care / Medication Dispensing / Health Clinics / Individualized Personal Care Plan / Health Records / Hygiene and Personal Care / Home Cooked Nutritional Meals / Relief Care / Daily Laundry Service / Daily Housekeeping Services / Medical Transportation  / Hair Care / Foot Care / Pastoral Care / Social Activities / Outings / Newspaper / Mail Delivery', 'NORTH MINTO RESIDENCE', NULL, NULL, 'fr');
INSERT INTO `residences_desc` (`desc_id`, `residence_id`, `name`, `description`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(109, 55, 'Primrose Cottage Special Care Home', 'We provide holistic care to level 2 residents in a home-like setting. We excel in the care of the frail elderly, dementia care, and in end-of-life/palliative care. We also provide care to those with mental health needs. Residents and staff follow direction and guidance from owner and operator, Lynn Wallace, a registered of 40 years. We frequently receive residents post-hospitalization and are successful in rehabilitation. A variety of activities and services are offered, such as hair salon services, foot care services, art therapy, physical activity programming, animal therapy and so much more.', 'Primrose Cottage Special Care Home', NULL, NULL, 'en'),
(110, 55, 'Primrose Cottage Special Care Home', 'We provide holistic care to level 2 residents in a home-like setting. We excel in the care of the frail elderly, dementia care, and in end-of-life/palliative care. We also provide care to those with mental health needs. Residents and staff follow direction and guidance from owner and operator, Lynn Wallace, a registered of 40 years. We frequently receive residents post-hospitalization and are successful in rehabilitation. A variety of activities and services are offered, such as hair salon services, foot care services, art therapy, physical activity programming, animal therapy and so much more.', 'Primrose Cottage Special Care Home', NULL, NULL, 'fr'),
(111, 56, 'Countryside residence', 'Our 10 bed cozy atmosphere level 2 home is in a country setting with all private rooms , home cooked meals and hairdresser and doctor visits , nurse on staff , music and entertainment weekly bingo nights , a place to call home .', 'Countryside residence', NULL, NULL, 'en'),
(112, 56, 'Countryside residence', 'Our 10 bed cozy atmosphere level 2 home is in a country setting with all private rooms , home cooked meals and hairdresser and doctor visits , nurse on staff , music and entertainment weekly bingo nights , a place to call home .', 'Countryside residence', NULL, NULL, 'fr'),
(113, 57, 'Manor St. Jude care home', 'High reputation Licensed special care home . We provide 24 hours quality long / short term care for individuals with special needs or seniors, in a homey atmosphere with home cooked meals (4 meals a day). Medication reminded and delivery on time. All rooms are on one floor, Wheelchair accessible, private, quiet and spacious. Free laundry service and parking lots, close to bus stop, Location near by Hazen White-St. Francis School.  Welcome visit Manor St. Jude Care Home. 5066321888', 'Manor St. Jude care home', NULL, NULL, 'en'),
(114, 57, 'Manor St. Jude care home', 'High reputation Licensed special care home . We provide 24 hours quality long / short term care for individuals with special needs or seniors, in a homey atmosphere with home cooked meals (4 meals a day). Medication reminded and delivery on time. All rooms are on one floor, Wheelchair accessible, private, quiet and spacious. Free laundry service and parking lots, close to bus stop, Location near by Hazen White-St. Francis School.  Welcome visit Manor St. Jude Care Home. 5066321888', 'Manor St. Jude care home', NULL, NULL, 'fr'),
(115, 58, 'The Guardians Special Care Home Ltd.', 'The Guardians Special Care Home is a licensed level 2 special care home located on the Northside of Fredericton. The facility built in 2008-2009 has been in operation since August 2009, and is locally owned and operated. The Guardians strives to provide an enriched, healthy living experience for their residents. Nestled into Nashwaaksis The Guardians is close to many amenities including shopping malls, restaurants, bus stops, outreach programs, & convenience stores; greatly improving the opportunity for employment placements for those seeking work.  The residents enjoy the outdoor on-site pool during the summer months, are encouraged to join and participate in all activities be it singing, swimming, dancing, board/card games, karaoke, cooking, light chores, and many different Special Olympics sports & activities to name a few.  The home has a large communal living space with couches, chairs, & puzzle boards. A large Tv entertains the game show watchers by day and sport enthusiast by night. Directly beside the large open concept kitchen lies a large dining room to accommodate everyone during meal times. All staff are certified, friendly, humble, & keep the residents needs the priority.', 'The Guardians Special Care Home Ltd.', NULL, NULL, 'en'),
(116, 58, 'The Guardians Special Care Home Ltd.', 'The Guardians Special Care Home is a licensed level 2 special care home located on the Northside of Fredericton. The facility built in 2008-2009 has been in operation since August 2009, and is locally owned and operated. The Guardians strives to provide an enriched, healthy living experience for their residents. Nestled into Nashwaaksis The Guardians is close to many amenities including shopping malls, restaurants, bus stops, outreach programs, & convenience stores; greatly improving the opportunity for employment placements for those seeking work.  The residents enjoy the outdoor on-site pool during the summer months, are encouraged to join and participate in all activities be it singing, swimming, dancing, board/card games, karaoke, cooking, light chores, and many different Special Olympics sports & activities to name a few.  The home has a large communal living space with couches, chairs, & puzzle boards. A large Tv entertains the game show watchers by day and sport enthusiast by night. Directly beside the large open concept kitchen lies a large dining room to accommodate everyone during meal times. All staff are certified, friendly, humble, & keep the residents needs the priority.', 'The Guardians Special Care Home Ltd.', NULL, NULL, 'fr'),
(117, 59, 'Canterbury Hall', 'Parkland Riverview’s Canterbury Hall is a 60-suite Licensed Special Care home serving residents requiring Level 2 (Assisted Living) care. Our private suites feature washrooms with full walk-in showers with seats, a small fridge with freezer, local phone, basic cable and access to common area wireless internet. Every resident is provided a personal pendant for 24-hour emergency response. Each floor features a dining room, lounge area, and a centrally located nursing station so residents have everything they need close by. Our dedicated team includes, Wellness Coach and experienced hospitality and healthcare professionals. The beautiful on-site garden, paved walking trails, gazebo and goldfish pond are popular amongst residents who enjoy a community where neighbours become friends.   ', 'Canterbury Hall', NULL, NULL, 'en'),
(118, 59, 'Canterbury Hall', 'Canterbury Hall is a licensed special care home located on the Parkland Riverview Campus. We provide care for those individuals requiring level 2 care. All the units are private sleeping units with the majority of the apartments having full private washrooms with full walk-in showers with seats. A small fridge (with freezer) is provided as well as local phone, cable and internet.  We also have our own emergency pendent system. There is a dining room, living room and nurses station on each floor, so everything a resident needs is on the floor in which they reside. There are outside sitting areas, paved walking trail as well as a gazebo and fish pond, with a water fall,  to enjoy', 'Canterbury Hall', NULL, NULL, 'fr'),
(119, 60, 'Enhanced Living Gagetown', 'Here at Enhanced Living Gagetown we are a memory care facility with 27 beds. We are located in the Village of Gagetown, surrounded by nature with a large open backyard for residents to enjoy. The lovely thing about being in a small town is that our staff turnover is low and our community involvement is high.', 'Enhanced Living Gagetown', NULL, NULL, 'en'),
(120, 60, 'Enhanced Living Gagetown', 'Here at Enhanced Living Gagetown we are a memory care facility with 27 beds. We are located in the Village of Gagetown, surrounded by nature with a large open backyard for residents to enjoy. The lovely thing about being in a small town is that our staff turnover is low and our community involvement is high.', 'Enhanced Living Gagetown', NULL, NULL, 'fr'),
(121, 61, 'Howe Hall', 'Our Assisted Living suites are designed to meet the needs of those with physical or mild cognitive challenges, as well provide an enjoyable lifestyle, courtesy of all of Parkland’s amenities and activities.\r\n•	Three daily meals made to accommodate special dietary preferences\r\n•	Weekly housekeeping, including linen and personal laundry service\r\n•	All utilities, including heat, hot water and electricity\r\n•	Local telephone, cable service and Wi-Fi\r\n•	Chauffeur transportation service\r\n•	Concierge service\r\n•	Outdoor parking\r\n•	Specialized recreation programs and social calendar\r\n•	Individualized personal care plan to support daily living activities\r\n•	Medication management\r\n•	Assistance with personal care\r\n•	Annual home health record update and Personal Wellness Review\r\n•	24-hour monitored, interactive emergency response system with personal pendant included\r\n•	One easy bill per month\r\n•	Spacious, fully accessible suites\r\n•	Kitchenette with fridge\r\n•	In-suite climate control\r\n•	Spacious washrooms with seated walk-in shower\r\n•	Comforting environments:\r\n•	Secure environment with monitored access\r\n•	Team members available 24/7\r\n•	Dining and recreation on the same floor as private suite', 'Howe Hall', NULL, NULL, 'en'),
(122, 61, 'Howe Hall', 'Our Assisted Living suites are designed to meet the needs of those with physical or mild cognitive challenges, as well provide an enjoyable lifestyle, courtesy of all of Parkland’s amenities and activities.\r\n•	Three daily meals made to accommodate special dietary preferences\r\n•	Weekly housekeeping, including linen and personal laundry service\r\n•	All utilities, including heat, hot water and electricity\r\n•	Local telephone, cable service and Wi-Fi\r\n•	Chauffeur transportation service\r\n•	Concierge service\r\n•	Outdoor parking\r\n•	Specialized recreation programs and social calendar\r\n•	Individualized personal care plan to support daily living activities\r\n•	Medication management\r\n•	Assistance with personal care\r\n•	Annual home health record update and Personal Wellness Review\r\n•	24-hour monitored, interactive emergency response system with personal pendant included\r\n•	One easy bill per month\r\n•	Spacious, fully accessible suites\r\n•	Kitchenette with fridge\r\n•	In-suite climate control\r\n•	Spacious washrooms with seated walk-in shower\r\n•	Comforting environments:\r\n•	Secure environment with monitored access\r\n•	Team members available 24/7\r\n•	Dining and recreation on the same floor as private suite', 'Howe Hall', NULL, NULL, 'fr'),
(123, 62, 'Swim\'s Adult Residential Facility', 'We strive to meet the individual daily needs of our guests in a secure safe environment.  Their care plans will enable them to have the best quality of living with all due considerations of their strengths and inabilities.  We provide a country living atmosphere with all conveniences within a 8-12 minute drive.', 'Swim\'s Adult Residential Facility', NULL, NULL, 'en'),
(124, 62, 'Swim\'s Adult Residential Facility', 'We strive to meet the individual daily needs of our guests in a secure safe environment.  Their care plans will enable them to have the best quality of living with all due considerations of their strengths and inabilities.  We provide a country living atmosphere with all conveniences within a 8-12 minute drive.', 'Swim\'s Adult Residential Facility', NULL, NULL, 'fr'),
(125, 63, 'Alvina\'c Care Home', '25 minutes from St Peters in a beautiful country setting, Family style care, friendly, loving home. Outgoing and activity orientated staff. Family is always welcome.  Bilingual Home with 25 years of experience.', 'Alvina\'c Care Home', NULL, NULL, 'en'),
(126, 63, 'Alvina\'c Care Home', '25 minutes from St Peters in a beautiful country setting, Family style care, friendly, loving home. Outgoing and activity orientated staff. Family is always welcome.  Bilingual Home with 25 years of experience.', 'Alvina\'c Care Home', NULL, NULL, 'fr'),
(127, 64, 'Care A Lot Special Care Home', 'Located in upper west side, in a quiet part of town. Activity orientated staff, we have a great walking area for our residents to enjoy. Home away from home. Wifi tv in each room', 'Care A Lot Special Care Home', NULL, NULL, 'en'),
(128, 64, 'Care A Lot Special Care Home', 'Located in upper west side, in a quiet part of town. Activity orientated staff, we have a great walking area for our residents to enjoy. Home away from home. Wifi tv in each room', 'Care A Lot Special Care Home', NULL, NULL, 'fr'),
(129, 65, 'CurtLin Manor', 'Beautiful country setting home, with highly trained staff. Surrounded by nature, and just a short drive to grocery stores, pharmacies, churches, schools, and so much more.', 'CurtLin Manor', NULL, NULL, 'en'),
(130, 65, 'CurtLin Manor', 'Beautiful country setting home, with highly trained staff. Surrounded by nature, and just a short drive to grocery stores, pharmacies, churches, schools, and so much more.', 'CurtLin Manor', NULL, NULL, 'fr'),
(131, 66, 'Hawthorne Place', 'Located in the town of Hartland, not far from the Upper River Valley Hospital,  close to the Hartland community school, close to stores, friendly staff, activity orientated, and fun loving environment! We love to do excursions, and field trips!', 'Hawthorne Place', NULL, NULL, 'en'),
(132, 66, 'Hawthorne Place', 'Located in the town of Hartland, not far from the Upper River Valley Hospital,  close to the Hartland community school, close to stores, friendly staff, activity orientated, and fun loving environment! We love to do excursions, and field trips!', 'Hawthorne Place', NULL, NULL, 'fr'),
(133, 67, 'Ridgeview Manor', 'Quiet country setting, it is a place where our residences can walk freely, and enjoy nature. Home away from home. Midst of blueberry country.  We have a big beautiful garden as well.', 'Ridgeview Manor', NULL, NULL, 'en'),
(134, 67, 'Ridgeview Manor', 'Quiet country setting, it is a place where our residences can walk freely, and enjoy nature. Home away from home. Midst of blueberry country.  We have a big beautiful garden as well.', 'Ridgeview Manor', NULL, NULL, 'fr'),
(135, 68, 'Sea Street Manor', 'Beautiful view of the Bay of Fundy, and partridge island.', 'Sea Street Manor', NULL, NULL, 'en'),
(136, 68, 'Sea Street Manor', 'Beautiful view of the Bay of Fundy, and partridge island.', 'Sea Street Manor', NULL, NULL, 'fr'),
(137, 69, 'Collingwood Rest Home', 'Country setting home, with friendly staff.  Home away from home.', 'Collingwood Rest Home', NULL, NULL, 'en'),
(138, 69, 'Collingwood Rest Home', 'Country setting home, with friendly staff.  Home away from home.', 'Collingwood Rest Home', NULL, NULL, 'fr'),
(139, 70, 'McNair Manor', 'Compassion, Dignity and Care -- Leaders in Long-term Care for 25 Years\r\nCare Attendants, 24 hours/day\r\nSkilled Nursing and Medical Case Management\r\nHair Care\r\nFootcare\r\nHousekeeping\r\nHome Cooked Meals\r\nActivities Program \r\nDoctor Appointments\r\nCare Levels 2, 3B, 3G \r\nProvincial Transitional Bed Program\r\nShort-term Relief Care', 'McNair Manor', NULL, NULL, 'en'),
(140, 70, 'McNair Manor', 'Compassion, Dignity and Care -- Leaders in Long-term Care for 25 Years\r\nCare Attendants, 24 hours/day\r\nSkilled Nursing and Medical Case Management\r\nHair Care\r\nFootcare\r\nHousekeeping\r\nHome Cooked Meals\r\nActivities Program \r\nDoctor Appointments\r\nCare Levels 2, 3B, 3G \r\nProvincial Transitional Bed Program\r\nShort-term Relief Care', 'McNair Manor', NULL, NULL, 'fr'),
(141, 71, 'Fundy Bay Manor', '*', 'Fundy Bay Manor', NULL, NULL, 'en'),
(142, 71, 'Fundy Bay Manor', '*', 'Fundy Bay Manor', NULL, NULL, 'fr'),
(143, 72, 'Smith Special Care Home', '*', 'Smith Special Care Home', NULL, NULL, 'en'),
(144, 72, 'Smith Special Care Home', '*', 'Smith Special Care Home', NULL, NULL, 'fr'),
(145, 73, 'Baycare Adult Residential Facility', 'Baycare is a bright, spacious facility which caters to the varying needs of its residents through a diverse and dynamic staff.  \r\nBaycare provides a family atmosphere for its residents and takes every effort to integrate newcomers in to the family mix.  \r\nHome cooked meals and individualized care plans help to underscore the fact that at Baycare, our residents are number one.\r\nIf you have any further questions, please feel free to contact Joel at 658-0991.', 'Baycare Adult Residential Facility', NULL, NULL, 'en'),
(146, 73, 'Baycare Adult Residential Facility', 'Baycare is a bright, spacious facility which caters to the varying needs of its residents through a diverse and dynamic staff.  \r\nBaycare provides a family atmosphere for its residents and takes every effort to integrate newcomers in to the family mix.  \r\nHome cooked meals and individualized care plans help to underscore the fact that at Baycare, our residents are number one.\r\nIf you have any further questions, please feel free to contact Joel at 658-0991.', 'Baycare Adult Residential Facility', NULL, NULL, 'fr'),
(147, 74, 'Fairvilla Special Care Home', 'Large backyard, and porch to enjoy. Private rooms.  Wifi, tv, and cable provided by facility. Short distance from Lancaster mall, and our facility is on a bus route. Wheel chair accessible facility. Excellent food menu. Charming staff.', 'Fairvilla Special Care Home', NULL, NULL, 'en'),
(148, 74, 'Fairvilla Special Care Home', 'Large backyard, and porch to enjoy. Private rooms.  Wifi, tv, and cable provided by facility. Short distance from Lancaster mall, and our facility is on a bus route. Wheel chair accessible facility. Excellent food menu. Charming staff.', 'Fairvilla Special Care Home', NULL, NULL, 'fr'),
(149, 75, 'Crescent Gardens Guest Home', '2 Occupied beds.  1 Empty bed.  All rooms are single occupancy.  Home is located on a cul-de-sac overlooking the\r\nSt. John River with views of the Hugh John Bridge.', 'Crescent Gardens Guest Home', NULL, NULL, 'en'),
(150, 75, 'Crescent Gardens Guest Home', '2 Occupied beds.  1 Empty bed.  All rooms are single occupancy.  Home is located on a cul-de-sac overlooking the\r\nSt. John River with views of the Hugh John Bridge.', 'Crescent Gardens Guest Home', NULL, NULL, 'fr'),
(151, 76, 'Hearne street residence', 'Family setting and comfort for those with mental health conditions.', 'Hearne street residence', NULL, NULL, 'en'),
(152, 76, 'Hearne street residence', 'Family setting and comfort for those with mental health conditions.', 'Hearne street residence', NULL, NULL, 'fr'),
(153, 77, 'Hanwell Special Care and Senior Home', 'Hanwell Special Care Home is a twenty bed special care home located in Fredericton, New Brunswick.', 'Hanwell Special Care and Senior Home', NULL, NULL, 'en'),
(154, 77, 'Hanwell Special Care and Senior Home', 'Hanwell Special Care Home is a twenty bed special care home located in Fredericton, New Brunswick.', 'Hanwell Special Care and Senior Home', NULL, NULL, 'fr'),
(155, 78, 'Autumn Lee Retirement', 'Autumn Lee Retirement home is a 45 licensed bed home located in Moncton New Brunswick.', 'Autumn Lee Retirement', NULL, NULL, 'en'),
(156, 78, 'Autumn Lee Retirement', 'Autumn Lee Retirement home is a 45 licensed bed home located in Moncton New Brunswick.', 'Autumn Lee Retirement', NULL, NULL, 'fr'),
(157, 79, 'Smiths Special Care Home', 'Smith Special Care home is located off West Main Street in the desirable Jones Lake area. It is on a quiet street, close to bus routes and amenities. Our ten bed fully licensed facility has a lovely green space with a vegetable garden that is used to cook our home cooked meals that are tailored to you (diabetic, low salt, etc).\r\n\r\nWe have a cozy common area that has comfortable chairs and a TV – each bedroom has a TC, cable and internet access. Smith Special Care Home also offers personal care services such as laundry services, personal care, medication and diabetic management.\r\n\r\nSmith Special Care Home is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health', 'Smiths Special Care Home', NULL, NULL, 'en'),
(158, 79, 'Smiths Special Care Home', 'Smith Special Care home is located off West Main Street in the desirable Jones Lake area. It is on a quiet street, close to bus routes and amenities. Our ten bed fully licensed facility has a lovely green space with a vegetable garden that is used to cook our home cooked meals that are tailored to you (diabetic, low salt, etc).\r\n\r\nWe have a cozy common area that has comfortable chairs and a TV – each bedroom has a TC, cable and internet access. Smith Special Care Home also offers personal care services such as laundry services, personal care, medication and diabetic management.\r\n\r\nSmith Special Care Home is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health', 'Smiths Special Care Home', NULL, NULL, 'fr'),
(159, 80, 'Blackville Special Care Home', '9 bed care home in quite village of Blackville. Across the street from pharmacy and beautiful walking trail in the back that leads to local park. \r\nTransportation to appointments and the ability to keep your family doctor.\r\nSingle and double room available and satellite tv in all rooms.', 'Blackville Special Care Home', NULL, NULL, 'en'),
(160, 80, 'Blackville Special Care Home', '9 bed care home in quite village of Blackville. Across the street from pharmacy and beautiful walking trail in the back that leads to local park. \r\nTransportation to appointments and the ability to keep your family doctor.\r\nSingle and double room available and satellite tv in all rooms.', 'Blackville Special Care Home', NULL, NULL, 'fr'),
(161, 81, 'Dobbelsteyn Care Home', 'Welcome to Dobbelsteyn Care Home. A family owned and operated Level 2 Special Care Home since 1995. Enjoy a large spacious facility built in September 2011. All rooms are all private, some.with private half bath. Lots of in house activities and plenty of space outside to sit and enjoy warm sunny days. Excellent home cooked meals, a family atmosphere with kind and friendly staff.', 'Dobbelsteyn Care Home', NULL, NULL, 'en'),
(162, 81, 'Dobbelsteyn Care Home', 'Welcome to Dobbelsteyn Care Home. A family owned and operated Level 2 Special Care Home since 1995. Enjoy a large spacious facility built in September 2011. All rooms are all private, some.with private half bath. Lots of in house activities and plenty of space outside to sit and enjoy warm sunny days. Excellent home cooked meals, a family atmosphere with kind and friendly staff.', 'Dobbelsteyn Care Home', NULL, NULL, 'fr'),
(163, 82, '44 Wildwood Drive', 'A level 4 facility that provides support to clients from the Departments of Social Development and Mental Health.', '44 Wildwood Drive', NULL, NULL, 'en'),
(164, 82, '44 Wildwood Drive', 'A level 4 facility that provides support to clients from the Departments of Social Development and Mental Health.', '44 Wildwood Drive', NULL, NULL, 'fr'),
(165, 83, 'Silver Fox Special Care Home', 'Silver Fox Special Care Home consists of two facilities offering 24 hour care for residents requiring Level 1 & 2 care needs accepting individuals with mental health concerns and senior residents. Our facilities offer home-like environments in a quiet country setting. Our services include specialized meals for residents needs, transportation to medical appointments, administering of medication, in house hair care, nail care, foot care. A wide range of activities include musical entertainment, crafting, card making, movie nights, bingo, outings, BBQ\'s, outdoor games, etc.', 'Silver Fox Special Care Home', NULL, NULL, 'en'),
(166, 83, 'Silver Fox Special Care Home', 'Silver Fox Special Care Home consists of two facilities offering 24 hour care for residents requiring Level 1 & 2 care needs accepting individuals with mental health concerns and senior residents. Our facilities offer home-like environments in a quiet country setting. Our services include specialized meals for residents needs, transportation to medical appointments, administering of medication, in house hair care, nail care, foot care. A wide range of activities include musical entertainment, crafting, card making, movie nights, bingo, outings, BBQ\'s, outdoor games, etc.', 'Silver Fox Special Care Home', NULL, NULL, 'fr'),
(167, 84, 'LJ Jaillet Residence Inc.', 'We are a level 2 Special Care Home.', 'LJ Jaillet Residence Inc.', NULL, NULL, 'en'),
(168, 84, 'LJ Jaillet Residence Inc.', 'We are a level 2 Special Care Home.', 'LJ Jaillet Residence Inc.', NULL, NULL, 'fr'),
(169, 85, 'Alternative Residences Alternatives', 'Alternative Residences Alternatives Inc. was first incorporated under the New Brunswick Companies Act in August of 1984 and today acts as the largest charitable organization in Greater Moncton that provides shelter, support services and amenities for those individuals dealing with mental illness.\r\n\r\nThe very existence of the organization is the result of numerous hours of volunteer work by dedicated Mental Health professionals and concerned citizens who voiced the need for an alternative to the institutional options available to the mentally ill. Today, we carry on that mission to better the lives of those individuals dealing with mental illness in our community.\r\n\r\nWe are a registered, not for profit charity. We partner with the two Regional Health Authorities, Social Development, as well as other community agencies such as CMHA.\r\n\r\nOur  mission is to provide a continuum of community-based housing and support services, with a recovery-oriented focus, providing individualized and client-centered services by working in collaboration with our partners in the addiction and mental health field.\"', 'Alternative Residences Alternatives', NULL, NULL, 'en'),
(170, 85, 'Alternative Residences Alternatives', 'Alternative Residences Alternatives Inc. was first incorporated under the New Brunswick Companies Act in August of 1984 and today acts as the largest charitable organization in Greater Moncton that provides shelter, support services and amenities for those individuals dealing with mental illness.\r\n\r\nThe very existence of the organization is the result of numerous hours of volunteer work by dedicated Mental Health professionals and concerned citizens who voiced the need for an alternative to the institutional options available to the mentally ill. Today, we carry on that mission to better the lives of those individuals dealing with mental illness in our community.\r\n\r\nWe are a registered, not for profit charity. We partner with the two Regional Health Authorities, Social Development, as well as other community agencies such as CMHA.\r\n\r\nOur  mission is to provide a continuum of community-based housing and support services, with a recovery-oriented focus, providing individualized and client-centered services by working in collaboration with our partners in the addiction and mental health field.\"', 'Alternative Residences Alternatives', NULL, NULL, 'fr'),
(171, 86, 'The Briarlea on Ryan level 2', 'The Briarlea offers progressive care levels; 10 level 2 rooms, 6 level 3B rooms, and 18 level 3G rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea on Ryan level 2', NULL, NULL, 'en'),
(172, 86, 'The Briarlea on Ryan level 2', 'The Briarlea offers progressive care levels; 10 level 2 rooms, 6 level 3B rooms, and 18 level 3G rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea on Ryan level 2', NULL, NULL, 'fr'),
(173, 87, 'The Briarlea on Ryan 3B', 'The Briarlea offers progressive care levels; 10 level 2 rooms, 6 level 3B rooms, and 18 level 3G rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea on Ryan 3B', NULL, NULL, 'en'),
(174, 87, 'The Briarlea on Ryan 3B', 'The Briarlea offers progressive care levels; 10 level 2 rooms, 6 level 3B rooms, and 18 level 3G rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea on Ryan 3B', NULL, NULL, 'fr'),
(175, 88, 'The Briarlea off Gorge Level 2', 'The Briarlea offers progressive care levels; 8 assisted-living apartments, 24 level 2 rooms, and 12 level 3B rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea off Gorge Level 2', NULL, NULL, 'en'),
(176, 88, 'The Briarlea off Gorge Level 2', 'The Briarlea offers progressive care levels; 8 assisted-living apartments, 24 level 2 rooms, and 12 level 3B rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea off Gorge Level 2', NULL, NULL, 'fr'),
(177, 89, 'The Briarlea off Gorge Level 3B', 'The Briarlea offers progressive care levels; 8 assisted-living apartments, 24 level 2 rooms, and 12 level 3B rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea off Gorge Level 3B', NULL, NULL, 'en'),
(178, 89, 'The Briarlea off Gorge Level 3B', 'The Briarlea offers progressive care levels; 8 assisted-living apartments, 24 level 2 rooms, and 12 level 3B rooms, as well as palliative care services.  Doctor Pierre Beaulieu owns The Briarlea and will gladly take on all residents as his patients. A full time Activity Coordinator, Certified Chefs, an LPN, and highly qualified caregivers and other service providers all work together to ensure a higher level of care to our seniors.', 'The Briarlea off Gorge Level 3B', NULL, NULL, 'fr'),
(179, 90, 'Residence Collette', 'Residence Collette is located in downtown Moncton close to bus routes and all amenities. Our eighteen bed fully licensed facility is a very quiet home despite in the downtown core. We offer home cooked meal that are tailored to you (diabetic, low salt, etc)\r\n\r\nWe have a cozy common area that has comfortable couches and a TV – each bedroom has a TV, cable and internet access. Residence Collette also offers personal care services such as laundry services, personal care, medication and diabetic management.\r\n\r\nResidence Collette is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health', 'Residence Collette', NULL, NULL, 'en'),
(180, 90, 'Residence Collette', 'Residence Collette is located in downtown Moncton close to bus routes and all amenities. Our eighteen bed fully licensed facility is a very quiet home despite in the downtown core. We offer home cooked meal that are tailored to you (diabetic, low salt, etc)\r\n\r\nWe have a cozy common area that has comfortable couches and a TV – each bedroom has a TV, cable and internet access. Residence Collette also offers personal care services such as laundry services, personal care, medication and diabetic management.\r\n\r\nResidence Collette is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health', 'Residence Collette', NULL, NULL, 'fr'),
(181, 91, 'DALY\'S HOME CARE INC.', 'Daly’s Special Care Home is located on a quiet crescent in Riverview close to a bus route and amenities. Our fully licensed ten bed facility has a very large back yard with a swing to read your favourite book on. We offer home cooked meals that are tailored to you (diabetic, low salt, etc).\r\n\r\nWe have a cozy common area that has comfortable couches and TV – each bedroom has a TV, cable and internet access. Daley Special Care Home also offers personal care services such as laundry services, personal care, medication and diabetic management.\r\n\r\nDaley’s Special Care Home is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health.', 'DALY\'S HOME CARE INC.', NULL, NULL, 'en'),
(182, 91, 'DALY\'S HOME CARE INC.', 'Daly’s Special Care Home is located on a quiet crescent in Riverview close to a bus route and amenities. Our fully licensed ten bed facility has a very large back yard with a swing to read your favourite book on. We offer home cooked meals that are tailored to you (diabetic, low salt, etc).\r\n\r\nWe have a cozy common area that has comfortable couches and TV – each bedroom has a TV, cable and internet access. Daley Special Care Home also offers personal care services such as laundry services, personal care, medication and diabetic management.\r\n\r\nDaley’s Special Care Home is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health.', 'DALY\'S HOME CARE INC.', NULL, NULL, 'fr'),
(183, 92, 'Residence Adventure', 'Residence Aventure Inc is located in beautiful Irishtown just outside the Moncton City limits not far from the Irishtown Nature Park. Our thirty bed fully licensed facility has wheelchair accessibility and lots of green space, vegetables gardens and a farm just around the corner. We offer home cooked meals that are tailored to you (diabetic, low salt, etc).\r\n\r\nWe have a cozy common area that has comfortable chairs and a TV – each bedroom has a TV, cable, internet access. They also have safety measures such as an emergency bell and grip bars.\r\n\r\nResidence Aventure Inc also offers personal care services such as laundry services, personal care, medication and diabetic management.  Residence Aventure is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health.', 'Residence Adventure', NULL, NULL, 'en'),
(184, 92, 'Residence Adventure', 'Residence Aventure Inc is located in beautiful Irishtown just outside the Moncton City limits not far from the Irishtown Nature Park. Our thirty bed fully licensed facility has wheelchair accessibility and lots of green space, vegetables gardens and a farm just around the corner. We offer home cooked meals that are tailored to you (diabetic, low salt, etc).\r\n\r\nWe have a cozy common area that has comfortable chairs and a TV – each bedroom has a TV, cable, internet access. They also have safety measures such as an emergency bell and grip bars.\r\n\r\nResidence Aventure Inc also offers personal care services such as laundry services, personal care, medication and diabetic management.  Residence Aventure is inspected yearly by the Department of Social Development as well as the Fire Inspector and the Department of Health.', 'Residence Adventure', NULL, NULL, 'fr'),
(185, 93, '69 Beardsley Road', 'A facility that provides level 4 care to clients referred from Departments of Social Development and Mental Health.', '69 Beardsley Road', NULL, NULL, 'en'),
(186, 93, '69 Beardsley Road', 'A facility that provides level 4 care to clients referred from Departments of Social Development and Mental Health.', '69 Beardsley Road', NULL, NULL, 'fr'),
(187, 94, '119 Broadway', 'A facility that provides level 4 care to clients referred from the Departments of Social Development and Mental Health.', '119 Broadway', NULL, NULL, 'en'),
(188, 94, '119 Broadway', 'A facility that provides level 4 care to clients referred from the Departments of Social Development and Mental Health.', '119 Broadway', NULL, NULL, 'fr'),
(189, 95, '117 Broadway', '117 is a level 4 facility providing care to clients referred from the Departments of Social Development and Mental Health.', '117 Broadway', NULL, NULL, 'en'),
(190, 95, '117 Broadway', '117 is a level 4 facility providing care to clients referred from the Departments of Social Development and Mental Health.', '117 Broadway', NULL, NULL, 'fr'),
(191, 96, 'MacLeods Too Inc', 'We are a level 4 home located in the heart of Hartland.  We provide ourselves on the level of care we provide to our residents.  Please reach out to us if you are looking for a placement for your loved one.  We would be happy to hear from you.', 'MacLeods Too Inc', NULL, NULL, 'en'),
(192, 96, 'MacLeods Too Inc', 'We are a level 4 home located in the heart of Hartland.  We provide ourselves on the level of care we provide to our residents.  Please reach out to us if you are looking for a placement for your loved one.  We would be happy to hear from you.', 'MacLeods Too Inc', NULL, NULL, 'fr'),
(193, 97, 'Country Lane Estates NB Inc', 'We are a level 2 home located in the heart of Burton. We are under new ownership and likewise to our other facilities, we provide ourselves on the level of care we provide to our residents. Please reach out to us if you are looking for a placement for your loved one. We would be happy to hear from you.', 'Country Lane Estates NB Inc', NULL, NULL, 'en'),
(194, 97, 'Country Lane Estates NB Inc', 'We are a level 2 home located in the heart of Burton. We are under new ownership and likewise to our other facilities, we provide ourselves on the level of care we provide to our residents. Please reach out to us if you are looking for a placement for your loved one. We would be happy to hear from you.', 'Country Lane Estates NB Inc', NULL, NULL, 'fr'),
(195, 98, 'Country Lane Estates NB Inc', 'We are a level 3B home located in the heart of Burton. We are under new ownership and likewise to our other facilities, we provide ourselves on the level of care we provide to our residents. Please reach out to us if you are looking for a placement for your loved one. We would be happy to hear from you.', 'Country Lane Estates NB Inc', NULL, NULL, 'en'),
(196, 98, 'Country Lane Estates NB Inc', 'We are a level 3B home located in the heart of Burton. We are under new ownership and likewise to our other facilities, we provide ourselves on the level of care we provide to our residents. Please reach out to us if you are looking for a placement for your loved one. We would be happy to hear from you.', 'Country Lane Estates NB Inc', NULL, NULL, 'fr'),
(197, 99, 'Goguen Residence 621090NB INC', '-', 'Goguen Residence 621090NB INC', NULL, NULL, 'en'),
(198, 99, 'Goguen Residence 621090NB INC', '-', 'Goguen Residence 621090NB INC', NULL, NULL, 'fr'),
(199, 100, 'Goguen Residence Inc', '-', 'Goguen Residence Inc', NULL, NULL, 'en'),
(200, 100, 'Goguen Residence Inc', '-', 'Goguen Residence Inc', NULL, NULL, 'fr'),
(201, 101, 'McNair Manor Level 3G, Moncton', 'Compassion, Dignity and Care -- Leaders in Long-term Care for 25 Years\r\nCare Attendants, 24 hours/day\r\nSkilled Nursing and Medical Case Management\r\nHair Care\r\nFootcare\r\nHousekeeping\r\nHome Cooked Meals\r\nActivities Program \r\nDoctor Appointments\r\nCare Levels 2, 3B, 3G \r\nProvincial Transitional Bed Program\r\nShort-term Relief Care', 'McNair Manor Level 3G, Moncton', NULL, NULL, 'en'),
(202, 101, 'McNair Manor Level 3G, Moncton', 'Compassion, Dignity and Care -- Leaders in Long-term Care for 25 Years\r\nCare Attendants, 24 hours/day\r\nSkilled Nursing and Medical Case Management\r\nHair Care\r\nFootcare\r\nHousekeeping\r\nHome Cooked Meals\r\nActivities Program \r\nDoctor Appointments\r\nCare Levels 2, 3B, 3G \r\nProvincial Transitional Bed Program\r\nShort-term Relief Care', 'McNair Manor Level 3G, Moncton', NULL, NULL, 'fr'),
(203, 102, 'McNair Manor Level 3B, Riverview', 'Compassion, Dignity and Care -- Leaders in Long-term Care for 25 Years\r\nCare Attendants, 24 hours/day\r\nSkilled Nursing and Medical Case Management\r\nHair Care\r\nFootcare\r\nHousekeeping\r\nHome Cooked Meals\r\nActivities Program \r\nDoctor Appointments\r\nCare Levels 2, 3B, 3G \r\nProvincial Transitional Bed Program\r\nShort-term Relief Care', 'McNair Manor Level 3B, Riverview', NULL, NULL, 'en'),
(204, 102, 'McNair Manor Level 3B, Riverview', 'Compassion, Dignity and Care -- Leaders in Long-term Care for 25 Years\r\nCare Attendants, 24 hours/day\r\nSkilled Nursing and Medical Case Management\r\nHair Care\r\nFootcare\r\nHousekeeping\r\nHome Cooked Meals\r\nActivities Program \r\nDoctor Appointments\r\nCare Levels 2, 3B, 3G \r\nProvincial Transitional Bed Program\r\nShort-term Relief Care', 'McNair Manor Level 3B, Riverview', NULL, NULL, 'fr'),
(205, 103, 'Green Meadows Special Care Home - Berwick', 'Relaxing country living close to town. Berwick offers our residents raised garden beds, a pond to relax by and the efficiency of being close to town.', 'Green Meadows Special Care Home - Berwick', NULL, NULL, 'en'),
(206, 103, 'Green Meadows Special Care Home - Berwick', 'Relaxing country living close to town. Berwick offers our residents raised garden beds, a pond to relax by and the efficiency of being close to town.', 'Green Meadows Special Care Home - Berwick', NULL, NULL, 'fr'),
(207, 104, 'Green Meadows Special Care Home - Belleisle', 'Scenic and spacious, Belleisle is a beautiful place to call home. With large rooms, a gazebo and front garden, Belleisle has much to offer you or your loved ones.', 'Green Meadows Special Care Home - Belleisle', NULL, NULL, 'en'),
(208, 104, 'Green Meadows Special Care Home - Belleisle', 'Scenic and spacious, Belleisle is a beautiful place to call home. With large rooms, a gazebo and front garden, Belleisle has much to offer you or your loved ones.', 'Green Meadows Special Care Home - Belleisle', NULL, NULL, 'fr'),
(209, 105, 'Open Arms Special Care Home', NULL, 'Open Arms Special Care Home', NULL, NULL, 'en'),
(210, 105, 'Open Arms Special Care Home', NULL, 'Open Arms Special Care Home', NULL, NULL, 'fr'),
(211, 106, 'Silver Fox Estate', 'Silver Fox Estate is a retirement living home offering 24 hour care for residents requiring Level 1 & 2 care needs. Our facility offers a home-like environment in a quiet country setting. Our services include specialized meals for residents needs, transportation to medical appointments, administering of medication, in house hair care, nail care, foot care and spiritual services. A wide range of activities include musical entertainment, crafting, card making, movie nights, bingo, outings, BBQ\'s, outdoor games, floor curling, iPad training, etc.', 'Silver Fox Estate', NULL, NULL, 'en'),
(212, 106, 'Silver Fox Estate', 'Silver Fox Estate is a retirement living home offering 24 hour care for residents requiring Level 1 & 2 care needs. Our facility offers a home-like environment in a quiet country setting. Our services include specialized meals for residents needs, transportation to medical appointments, administering of medication, in house hair care, nail care, foot care and spiritual services. A wide range of activities include musical entertainment, crafting, card making, movie nights, bingo, outings, BBQ\'s, outdoor games, floor curling, iPad training, etc.', 'Silver Fox Estate', NULL, NULL, 'fr'),
(213, 107, 'Paradise Villa', 'Paradise Villa Inc. is nestled in a country-like setting conveniently located near shopping, churches, bus route, and a short drive to downtown Fredericton. Our new state of the art assisted living Senior Residence Complex truly defines what seniors living should be. Thoughtfully designed and beautifully executed, this well-appointed residence offers 78 single first-class suites, and 4 of the 78 can be converted into suites for couples or siblings. This complex cares for level 2 and 3b residents. This property is very well-managed with experienced and committed staff.', 'Paradise Villa', NULL, NULL, 'en'),
(214, 107, 'Paradise Villa', 'Paradise Villa Inc. is nestled in a country-like setting conveniently located near shopping, churches, bus route, and a short drive to downtown Fredericton. Our new state of the art assisted living Senior Residence Complex truly defines what seniors living should be. Thoughtfully designed and beautifully executed, this well-appointed residence offers 78 single first-class suites, and 4 of the 78 can be converted into suites for couples or siblings. This complex cares for level 2 and 3b residents. This property is very well-managed with experienced and committed staff.', 'Paradise Villa', NULL, NULL, 'fr'),
(251, 126, 'Brae Manor', 'Welcome to our family orientated setting.  We provide quality care for seniors and individuals with special needs.  We have owned our special care home for 17 years and our home has been in the community for 27 years.  Complete personal care, individualized attention.  We have 5 bathrooms; 24/7 supervision; accompany residents to all medical appointments; annual bus trips; holiday celebrations; birthday celebrations; great food and a wonderful atmosphere.  Residents are given attention to specialized diet if required and some attend the YMCA outreach and local community outings are available as well. ', 'Brae Manor', NULL, NULL, 'en'),
(252, 126, 'Brae Manor', 'Welcome to our family orientated setting.  We provide quality care for seniors and individuals with special needs.  We have owned our special care home for 17 years and our home has been in the community for 27 years.  Complete personal care, individualized attention.  We have 5 bathrooms; 24/7 supervision; accompany residents to all medical appointments; annual bus trips; holiday celebrations; birthday celebrations; great food and a wonderful atmosphere.  Residents are given attention to specialized diet if required and some attend the YMCA outreach and local community outings are available as well. ', 'Brae Manor', NULL, NULL, 'fr'),
(311, 156, 'CurtLin Manor Ltd ', 'A Community Residence ', 'CurtLin Manor Ltd ', NULL, NULL, 'en'),
(312, 156, 'CurtLin Manor Ltd ', 'A Community Residence ', 'CurtLin Manor Ltd ', NULL, NULL, 'fr'),
(315, 158, 'Domaine La Vall&eacute;e de Memramcook Inc.', 'To provide long term care services to elderly people and special needs people on a 24/7 basis.  Services includes but not limited to : personal care, food services, housekeeping services, laundry services, administration support, building maintenance and security, activity services and on site medical visits. ', 'Domaine La Vall&eacute;e de Memramcook Inc.', NULL, NULL, 'en'),
(316, 158, 'Domaine La Vall&eacute;e de Memramcook Inc.', 'To provide long term care services to elderly people and special needs people on a 24/7 basis.  Services includes but not limited to : personal care, food services, housekeeping services, laundry services, administration support, building maintenance and security, activity services and on site medical visits. ', 'Domaine La Vall&eacute;e de Memramcook Inc.', NULL, NULL, 'fr'),
(325, 163, 'Canterbury Hall', 'Parkland Riverview’s Canterbury Hall is a 60-suite Licensed Special Care home serving residents requiring Level 2 (Assisted Living) care. Our private suites feature washrooms with full walk-in showers with seats, a small fridge with freezer, local phone, basic cable and access to common area wireless internet. Every resident is provided a personal pendant for 24-hour emergency response. Each floor features a dining room, lounge area, and a centrally located nursing station so residents have everything they need close by. Our dedicated team includes, Wellness Coach and experienced hospitality and healthcare professionals. The beautiful on-site garden, paved walking trails, gazebo and goldfish pond are popular amongst residents who enjoy a community where neighbours become friends.   ', NULL, NULL, NULL, 'en'),
(326, 163, 'Canterbury Hall', 'Parkland Riverview’s Canterbury Hall is a 60-suite Licensed Special Care home serving residents requiring Level 2 (Assisted Living) care. Our private suites feature washrooms with full walk-in showers with seats, a small fridge with freezer, local phone, basic cable and access to common area wireless internet. Every resident is provided a personal pendant for 24-hour emergency response. Each floor features a dining room, lounge area, and a centrally located nursing station so residents have everything they need close by. Our dedicated team includes, Wellness Coach and experienced hospitality and healthcare professionals. The beautiful on-site garden, paved walking trails, gazebo and goldfish pond are popular amongst residents who enjoy a community where neighbours become friends.   ', NULL, NULL, NULL, 'fr'),
(327, 164, 'Loch Lomond Villa Special Care Home', '.', NULL, NULL, NULL, 'en'),
(328, 164, 'Loch Lomond Villa Special Care Home', '.', NULL, NULL, NULL, 'fr');
INSERT INTO `residences_desc` (`desc_id`, `residence_id`, `name`, `description`, `meta_title`, `meta_desc`, `meta_keywords`, `language`) VALUES
(329, 165, 'Loch Lomond Villa Special Care Home', '.', NULL, NULL, NULL, 'en'),
(330, 165, 'Loch Lomond Villa Special Care Home', '.', NULL, NULL, NULL, 'fr'),
(331, 166, 'Loch Lomond Villa Special Care Home', '.', NULL, NULL, NULL, 'en'),
(332, 166, 'Loch Lomond Villa Special Care Home', '.', NULL, NULL, NULL, 'fr'),
(333, 167, 'Hillside View Special Care Home', '', NULL, NULL, NULL, 'en'),
(334, 167, 'Hillside View Special Care Home', '', NULL, NULL, NULL, 'fr'),
(335, 168, 'Living Hope SCH Picadilly', 'Living Hope Special Care Home a 9 bed facility located in beautiful Picadilly NB, just 10 minutes outside of Sussex. We strive to be a home where residents want to live and staff choose to work.    At Living Hope Special Care Home we are committed to providing you and your family with the same care that we would expect for ourselves and our own families.', NULL, NULL, NULL, 'en'),
(336, 168, 'Living Hope SCH Picadilly', 'Living Hope Special Care Home a 9 bed facility located in beautiful Picadilly NB, just 10 minutes outside of Sussex. We strive to be a home where residents want to live and staff choose to work.    At Living Hope Special Care Home we are committed to providing you and your family with the same care that we would expect for ourselves and our own families.', NULL, NULL, NULL, 'fr'),
(337, 169, 'Foyer Linda Charest', '', 'Foyer Linda Charest', NULL, NULL, 'en'),
(338, 169, 'Foyer Linda Charest', '', 'Foyer Linda Charest', NULL, NULL, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `title` varchar(300) NOT NULL,
  `settingkey` varchar(300) NOT NULL,
  `settingtype` varchar(100) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `parent`, `title`, `settingkey`, `settingtype`, `sort_order`, `status`) VALUES
(1, 14, 'Site Name', 'SITE_NAME', 'text', 0, 'Y'),
(2, 14, 'Admin Email', 'ADMIN_EMAIL', 'text', 0, 'Y'),
(3, 14, 'From Mail Address', 'FROM_MAIL', 'text', 0, 'Y'),
(4, 14, 'Support Phone', 'SUPPORT_PHONE', 'text', 0, 'Y'),
(5, 15, 'Meta Title', 'DEFAULT_META_TITLE', 'text', 0, 'Y'),
(6, 15, 'Meta Desc', 'DEFAULT_META_DESCRIPTION', 'textarea', 0, 'Y'),
(7, 15, 'Meta Keywords', 'DEFAULT_META_KEYWORDS', 'textarea', 0, 'Y'),
(8, 16, 'Mailer Protocol', 'MAILER_PROTOCOL', 'text', 0, 'Y'),
(9, 16, 'Mailer Host', 'MAILER_HOST', 'text', 0, 'Y'),
(10, 16, 'Mailer User', 'MAILER_USER', 'text', 0, 'Y'),
(11, 16, 'Mailer Password', 'MAILER_PASSWORD', 'text', 0, 'Y'),
(12, 16, 'Mailer Port', 'MAILER_PORT', 'text', 0, 'Y'),
(13, 16, 'Mailer Transport', 'MAILER_TRANSPORT', 'text', 0, 'Y'),
(14, 0, 'General', '', 'group', 1, 'Y'),
(15, 0, 'SEO', '', 'group', 2, 'Y'),
(16, 0, 'Mail', '', 'group', 3, 'Y'),
(17, 0, 'Theme', 'theme_group', 'group', 4, 'Y'),
(18, 17, 'Home Page', 'HOME_PAGE_ID', 'pages', 0, 'Y'),
(19, 17, '404 Error Page', 'ERROR_PAGE_ID', 'pages', 1, 'Y'),
(39, 17, 'Register Page', 'REGISTER_PAGE_ID', 'pages', 2, 'Y'),
(40, 0, 'Security', 'SECURITY_SETTINGS', 'group', 10, 'Y'),
(41, 40, 'reCpatcha Site Key', 'RECAPTCHA_SITE_KEY', 'text', 1, 'Y'),
(42, 40, 'reCpatcha Secret Key', 'RECAPTCHA_SECRET_KEY', 'text', 2, 'Y'),
(44, 17, 'Residence Page', 'RESIDENCE_PAGE_ID', 'pages', 4, 'Y'),
(45, 17, 'Board Member Page', 'BOARD_PAGE_ID', 'pages', 5, 'Y'),
(46, 17, 'News Details Page', 'NEWS_PAGE_ID', 'pages', 6, 'Y'),
(47, 0, 'Contact Info', 'CONTACT_INFO', 'group', 10, 'Y'),
(48, 47, 'Footer Mission', 'FOOTER_MISSION', 'textarea', 1, 'Y'),
(49, 47, 'Contact Phone', 'CONTACT_PHONE', 'text', 2, 'Y'),
(50, 47, 'Contact Email', 'CONTACT_EMAIL', 'text', 3, 'Y'),
(51, 47, 'Contact Address', 'CONTACT_ADDRESS', 'textarea', 5, 'Y'),
(52, 47, 'Get In Touch', 'CONTACT_GETINTOUCH', 'textarea', 3, 'Y'),
(53, 0, 'Payment Settings', 'PAYMENT_SETTINGS', 'group', 10, 'Y'),
(54, 53, 'Cash or Cheque Message', 'CASH_CHEQUE_MESSAGE', 'text', 1, 'Y'),
(55, 53, 'eTransfer Message', 'ETRANSFER_MESSAGE', 'text', 2, 'Y'),
(56, 14, 'Working Hours', 'WORKING_HOURS', 'text', 6, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `settings_desc`
--

CREATE TABLE `settings_desc` (
  `desc_id` int(11) NOT NULL,
  `setting_id` int(11) NOT NULL,
  `settingvalue` text,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_desc`
--

INSERT INTO `settings_desc` (`desc_id`, `setting_id`, `settingvalue`, `language`) VALUES
(1, 1, 'The New Brunswick Special Care Home Association', 'en'),
(2, 2, 'info@nbscha.ca', 'en'),
(3, 3, 'noreply@nbscha.ca', 'en'),
(4, 4, '1-833-971-4455', 'en'),
(5, 5, 'The New Brunswick Special Care Home Association', 'en'),
(6, 6, 'The New Brunswick Special Care Home Association', 'en'),
(7, 7, 'The New Brunswick Special Care Home Association', 'en'),
(8, 8, 'smtp', 'en'),
(9, 9, 'smtp.sendgrid.net', 'en'),
(10, 10, 'apikey', 'en'),
(11, 11, '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', 'en'),
(12, 12, '587', 'en'),
(13, 13, 'TLS', 'en'),
(14, 14, NULL, 'en'),
(15, 15, NULL, 'en'),
(16, 16, NULL, 'en'),
(17, 17, NULL, 'en'),
(18, 18, '1', 'en'),
(19, 19, '2', 'en'),
(20, 1, 'L\'Association des foyers de soins spéciaux du Nouveau-Brunswick', 'fr'),
(21, 2, 'info@nbscha.ca', 'fr'),
(22, 3, 'noreply@nbscha.ca', 'fr'),
(23, 4, '1-833-971-4455', 'fr'),
(24, 5, 'The New Burnswick Special Care Home Association', 'fr'),
(25, 6, 'The New Burnswick Special Care Home Association', 'fr'),
(26, 7, 'The New Burnswick Special Care Home Association', 'fr'),
(27, 8, 'smtp', 'fr'),
(28, 9, 'smtp.sendgrid.net', 'fr'),
(29, 10, 'apikey', 'fr'),
(30, 11, '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', 'fr'),
(31, 12, '587', 'fr'),
(32, 13, 'TLS', 'fr'),
(33, 14, NULL, 'fr'),
(34, 15, NULL, 'fr'),
(35, 16, NULL, 'fr'),
(36, 17, NULL, 'fr'),
(37, 18, '1', 'fr'),
(38, 19, '2', 'fr'),
(39, 39, '3', 'en'),
(40, 39, '3', 'fr'),
(41, 40, '1', 'en'),
(42, 40, '1', 'fr'),
(43, 41, '6Le2JOYeAAAAAE-1NpTkW6Th8lv_W4OwbpZJtjcB', 'en'),
(44, 41, '6Le2JOYeAAAAAE-1NpTkW6Th8lv_W4OwbpZJtjcB', 'fr'),
(45, 42, '6Le2JOYeAAAAAHpIrWo6q4l0A86LWdcMXM7V9PC_', 'en'),
(46, 42, '6Le2JOYeAAAAAHpIrWo6q4l0A86LWdcMXM7V9PC_', 'fr'),
(49, 44, '12', 'en'),
(50, 44, '12', 'fr'),
(51, 45, '11', 'en'),
(52, 45, '11', 'fr'),
(53, 46, '10', 'en'),
(54, 46, '10', 'fr'),
(55, 47, '1', 'en'),
(56, 47, '1', 'fr'),
(57, 48, 'The New Brunswick Special Care Home Association Inc. aims to assist members in providing quality, cost effective services for seniors, mental health residents, and adults with disabilities in cooperation with the Department of Social Development.', 'en'),
(58, 48, 'L\'Association des foyers de soins spéciaux du Nouveau-Brunswick vise à aider ses membres à offrir des services de qualité et économiques aux personnes âgées, aux pensionnaires ayant des troubles de santé mentale et aux adultes ayant des handicaps, en collaboration avec le ministère du Développement social.', 'fr'),
(59, 49, '1-833-971-4455', 'en'),
(60, 49, '(506) 639-4478', 'fr'),
(61, 50, 'info@nbscha.ca', 'en'),
(62, 50, 'info@nbscha.ca', 'fr'),
(63, 51, '384 Smythe Street, Fredericton, N.B., E3B 3E4', 'en'),
(64, 51, '384, rue Smythe, Fredericton (N.-B.) E3B 3E4', 'fr'),
(65, 52, 'We’re here to help and answer any question you might have. Fill out the form below or message us on one of our social media platforms and we\'ll be in touch with you as soon as possible. We look forward to hearing from you.', 'en'),
(66, 52, 'We’re here to help and answer any question you might have. Fill out the form below or message us on one of our social media platforms and we\'ll be in touch with you as soon as possible. We look forward to hearing from you.', 'fr'),
(67, 53, '1', 'en'),
(68, 53, '1', 'fr'),
(69, 54, 'Mail to: NBSCHA, Amy McNair, 384 Smythe Street, Fredericton, N.B., E3B 3E4', 'en'),
(70, 54, 'Mail to: NBSCHA, Amy McNair, 384 Smythe Street, Fredericton, N.B., E3B 3E4', 'fr'),
(71, 55, 'Send to: treasurer@nbscha.ca', 'en'),
(72, 55, 'Send to: treasurer@nbscha.ca', 'fr'),
(73, 56, 'Monday - Friday 9AM -9PM', 'en'),
(74, 56, ' Du lundi au vendredi, de 9 heures à 21 heures', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `video`, `sort_order`, `status`) VALUES
(1, '', '', 0, 1),
(2, '', '', 0, 1),
(3, '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders_desc`
--

CREATE TABLE `sliders_desc` (
  `desc_id` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `link_title` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders_desc`
--

INSERT INTO `sliders_desc` (`desc_id`, `slider_id`, `title`, `subtitle`, `summary`, `link_url`, `link_title`, `language`) VALUES
(1, 1, 'When you are not able. let us be of assistance', 'Welcome to the NBSCHA', '<p>\r\n	<b>Providing the right services for special care to welcome<br />\r\n	the residents to their new homes.</b></p>\r\n', '', '', 'en'),
(2, 2, 'Become a Member', 'Join Our Network', '<p>\r\n	<b>Get listed on our website and access membership<br />\r\n	benefits by registering your home.</b></p>\r\n', '', '', 'en'),
(3, 3, 'Browse our homes', 'New Brunswick Special Care Homes', '<p>\r\n	If you are interested in reserving a home,<br />\r\n	please contact the owner directly by phone or email.</p>\r\n', '', '', 'en'),
(4, 1, 'QUAND VOUS NE POUVEZ PLUS, LAISSEZ-NOUS VOUS AIDER.', 'BIENVENUE À L’AFSSNB', '<p>\r\n	Nous offrons les bons services de soins sp&eacute;ciaux pour accueillir les<br />\r\n	pensionnaires dans leurs nouveaux foyers.</p>\r\n', '', '', 'fr'),
(5, 2, 'PARCOURIR NOS FOYERS', 'FOYERS DE SOINS SPÉCIAUX DU NOUVEAU-BRUNSWICK', '<p>\r\n	<b>Si vous souhaitez réserver un foyer, veuillez contacter directement le propriétaire par téléphone ou par courriel.\r\n.</b></p>\r\n', '', '', 'fr'),
(6, 3, 'DEVENIR MEMBRE', 'REJOIGNEZ NOTRE RÉSEAU', '<p>Inscrivez votre maison sur notre site web et accédez aux avantages des membres en enregistrant votre maison.\r\n</p>\r\n', '', '', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `image`, `sort_order`, `status`, `delete_status`) VALUES
(1, '1603827992-15f987918b613b.jpg', 0, 1, 0),
(2, '1603828043-15f98794b438e9.jpg', 0, 1, 0),
(3, '1603828345-15f987a79abf03.jpg', 0, 1, 0),
(4, 'Cosman.jpg', 0, 1, 0),
(5, 'Tara_Specialists.jpg', 0, 1, 0),
(6, 'Cooke_Insurance_Group.jpg', 0, 1, 0),
(7, 'Cindy_Lidster,_RN,_BScN,_BA,_FCNEd,_CCC2.jpg', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors_desc`
--

CREATE TABLE `sponsors_desc` (
  `desc_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `website` varchar(400) DEFAULT NULL,
  `description` text,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsors_desc`
--

INSERT INTO `sponsors_desc` (`desc_id`, `sponsor_id`, `title`, `website`, `description`, `language`) VALUES
(1, 1, 'TD Bank', 'https://www.td.com/ca/en/about-td/', '<p>\r\n	TD Canada Trust is the commercial banking operation of the Toronto-Dominion Bank in Canada. TD Canada Trust offers a range of financial services and products.</p>\r\n\r\n', 'en'),
(2, 2, 'Lawton\'s Drugs', 'https://lawtons.ca/', '<p>\r\n	Lawtons is a Canadian drug store chain owned by the Sobeys Group of Stellarton, Nova Scotia with a head office located in Dartmouth, Nova Scotia.</p>\r\n\r\n', 'en'),
(3, 3, 'Beacon Clinical Group', 'https://beaconclinicalgroup.com/', '<p>\r\n	Beacon Clinical Group offers consultation to new and existing health care facilities during transitional periods or with special projects/new builds</p>\r\n\r\n', 'en'),
(4, 4, 'Cosman', 'https://www.cosmanbenefits.ca/', '<p>\r\n	GROUP HEALTH INSURANCE! We are effectively managing our clients Benefits, Pension, HR, Insurance and Financial Planning needs by identifying critical areas.</p>\r\n', 'en'),
(5, 5, 'Tara Specialists', 'http://www.taraspecialists.com/', '<p>\r\n	Building affordable housing units is getting more and more complex. Our team will help you acquire land, manage the drawings, design and revision phase, and get the project through the proof of concept and approval stages.</p>\r\n', 'en'),
(6, 6, 'Cooke Insurance Group', 'https://cooke.ca/', 'With over 40 years of experience, we focus on delivering comprehensive products and services. In addition to insurance, our in-house claims experts are on hand should one of your claims need independent advice.', 'en'),
(7, 7, 'Cindy Lidster, RN, BScN, BA', 'https://www.acahs.ca/', '<p>\r\n	The Atlantic College of Applied Health Sciences recognizes the need for post-secondary education and training. Their primary vision is to provide graduates who are educated, skilled and accountable to quality healthcare support.</p>\r\n', 'en'),
(8, 1, 'Banque TD', 'https://www.td.com/ca/en/about-td/', '<p>\r\n	TD Canada Trust est la section des services bancaires aux entreprises de la Banque Toronto-Dominion au Canada. TD Canada Trust offre une gamme de services et de produits financiers.</p>\r\n', 'fr'),
(9, 2, 'Lawton\'s Drugs', 'https://lawtons.ca/', '<p>\r\n	Lawtons est une chaîne canadienne de pharmacies appartenant au groupe Sobeys à Stellarton, en Nouvelle-Écosse, dont le bureau central se trouve à Dartmouth, en Nouvelle-Écosse.</p>\r\n', 'fr'),
(10, 3, 'Beacon Clinical Group', 'https://beaconclinicalgroup.com/', '<p>\r\n	Le Beacon Clinical Group offre des consultations aux établissements de soins de santé nouveaux et existants pendant leurs périodes de transition ou lors de projets spéciaux ou de nouvelles constructions.</p>\r\n', 'fr'),
(11, 4, 'Cosman', 'https://www.cosmanbenefits.ca/', '<p>\r\n	ASSURANCE SANT&Eacute; COLLECTIVE! Nous g&eacute;rons efficacement les besoins de nos clients concernant les avantages, les pensions, les ressources humaines, les assurances et la planification financi&egrave;re en d&eacute;terminant les points critiques.</p>\r\n', 'fr'),
(12, 5, 'Tara Specialists', 'http://www.taraspecialists.com/', '<p>\r\n	La construction d&rsquo;unit&eacute;s de logement abordables devient de plus en plus complexe. Notre &eacute;quipe vous aidera &agrave; acqu&eacute;rir les terrains, &agrave; g&eacute;rer l&rsquo;&eacute;tape des dessins, de la conception et de la r&eacute;vision, et &agrave; piloter le projet dans les &eacute;tapes de validation de la conception et d&rsquo;approbation.</p>\r\n', 'fr'),
(13, 6, 'Cooke Insurance Group', 'https://cooke.ca/', '<p>\r\n	Avec plus de 40 ans d&rsquo;exp&eacute;rience, nous nous appliquons &agrave; offrir des produits et des services complets. En plus des assurances, nos propres experts en sinistres sont disponibles si des conseils ind&eacute;pendants sont n&eacute;cessaires pour l&rsquo;une de vos r&eacute;clamations.</p>\r\n', 'fr'),
(14, 7, 'Cindy Lidster, RN, BScN, BA, FCNEd, CCC', 'https://www.acahs.ca/', '<p>\r\n	Le Atlantic College of Applied Health Sciences reconnaît le besoin d’une éducation et d’une formation postsecondaires. Sa vision primordiale est de former des diplômées qui sont instruites, compétentes et responsables d’un soutien en soins de santé de qualité.</p>\r\n', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `icon_class`, `icon`, `number`, `sort_order`, `status`) VALUES
(1, 'fa fa-home mt-5 text-white', '', '369', 1, 1),
(2, 'fa fa-home mt-5 text-white', '', '35', 2, 1),
(3, 'fa fa-smile-o mt-5 text-white', '', '5000', 3, 1),
(4, 'fa  fa-users mt-5 text-white', '', '7000', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statistics_desc`
--

CREATE TABLE `statistics_desc` (
  `desc_id` int(11) NOT NULL,
  `statistics_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistics_desc`
--

INSERT INTO `statistics_desc` (`desc_id`, `statistics_id`, `name`, `language`) VALUES
(1, 1, 'Level 2 Homes', 'en'),
(2, 2, 'Memory Care Homes', 'en'),
(3, 3, 'Employees', 'en'),
(4, 4, 'Residents', 'en'),
(5, 1, 'Level 2 Homes', 'fr'),
(6, 2, 'Level 3B3G Homes', 'fr'),
(7, 3, 'Employees', 'fr'),
(8, 4, 'Clients', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `date`, `status`) VALUES
(1, '2022-03-22 04:00:00', 1),
(2, '2022-03-22 04:00:00', 1),
(3, '2022-03-22 04:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_desc`
--

CREATE TABLE `testimonials_desc` (
  `desc_id` int(11) NOT NULL,
  `testimonials_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials_desc`
--

INSERT INTO `testimonials_desc` (`desc_id`, `testimonials_id`, `message`, `author`, `language`) VALUES
(1, 1, '<p class=\"font-15 pl-0 text-white\">\r\n	<em>My sister has been living in the same Special Care Home in Saint John, NB for 20 years. This is her home and the residents are her family. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>She has been given excellent care over the years. Her health, medications and diet have been given wonderful attention and our family feels comfort in her care and knows she will be looked after properly. She has had many urgent episodes over the years and all the staff know her problems and what to look for, and when to call for emergency help. This has literally saved her life many times during the recent years of her failing health. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>We, her family, appreciate the loving care of the management and staff and would not hesitate to recommend anyone to this home </em></p>\r\n', 'Admin 1', 'en'),
(2, 2, '<p class=\"font-15 pl-0 text-white\">\r\n	<em>I have a family member in Special Care Home. My first experience with special care homes was when a friend of mine was looking for a fitting special care home for his brother in law, about 5 years ago. I visited his brother in law often &amp; was quite impressed at the love, support &amp; care he received. So when my friend&#39;s time came that she was no longer able to live on her own, the first place I reached out to was the same establishment. I knew it would be a safe for her. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>I was already aware &amp; comfortable with the friendly staff &amp; the compassion &amp; patients they exhibited for the Residents in their care, even when the Resident was having a difficult day (or many difficult days). </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>The owner &amp; staff are very approachable &amp; easily answer any &amp; all concerns I have in regards to me friend. It certainly puts my mind at ease to know she is in such a loving, caring environment, in which all Residents are considered Family. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>COVID has been trying to say the least this past year but my friend was in the best of hands. Owner &amp; staff have been very informative with each phase of this virus &amp; I was updated with emails &amp; phone calls. I am Grateful to have my Friend (chosen sister) in this forever home where she feels content &amp; safe. I have already told the staff to put &#39;my name&#39; on their list for when my time comes, I want to feel safe &amp; a part of a family also </em></p>\r\n', 'Admin 2', 'en'),
(3, 3, '<p class=\"font-15 pl-0 text-white\">\r\n	<em>My daughter has been living in a care home since she was 19 years old. She is now 29 years old. She has cerebral palsy and she is nonverbal. Her condition had progressed in the last few years, she is now on a purred diet due to a choking issue with swallowing and her movement disorder has increased ongoing problems. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>The care she has received is amazing and as her mom I am very pleased with the care home she lives in. The owner and staff know my daughters needs very well and communicate with me on any issues that come up. I trust their experience and knowledge of my daughter as I would my own. She is lucky to live in such a great place as I know not all of the care homes are so great. The one my daughter lives in is her home and she feels like family there. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>The owner and staff are well trained and have done an amazing job in dealing with the covid situation. The home is clean and all precautions were taken to keep clients safe and as happy as possible. All regulations surrounding covid were sent out to family and we were updated on any changes in the new color zones. I commend the staff and owner for a job well done during such a difficult time of covid. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>I myself work with people with disabilities every day but I cannot lift due to injuries so that is why my daughter cannot live with me. I feel she is well cared for and her health and wellbeing are always in the best interest of her care home. I work under the same covid rules myself and I know the care home my daughter is in follows them well. I have had a very good experience with the care home my daughter lives in. Placing your loved one under someone else&#39;s care is a difficult and scary decision but I am happy with the choice we made for our daughter and the main thing is she is happy too. </em></p>\r\n', 'Admin 3', 'en'),
(4, 1, '<p class=\"font-15 pl-0 text-white\">\r\n	<em>Ma s&oelig;ur habite le m&ecirc;me foyer de soins sp&eacute;ciaux &agrave; Saint John, au Nouveau-Brunswick, depuis 20 ans. C&rsquo;est son chez-soi, et les pensionnaires sont sa famille.</em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>Elle a re&ccedil;u des soins excellents au fil des ann&eacute;es. Sa sant&eacute;, ses m&eacute;dicaments et son r&eacute;gime alimentaire ont re&ccedil;u une excellente attention, et notre famille est r&eacute;confort&eacute;e par les soins qu&rsquo;elle re&ccedil;oit et sait qu&rsquo;on en prendra bien soin. Elle a eu de nombreux &eacute;pisodes urgents au fil des ann&eacute;es, et tout le personnel conna&icirc;t ses probl&egrave;mes, sait quoi surveiller et sait quand appeler une aide d&rsquo;urgence. Cela lui a litt&eacute;ralement sauv&eacute; la vie bien des fois pendant les ann&eacute;es r&eacute;centes o&ugrave; sa sant&eacute; d&eacute;cline. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>Nous, membres de sa famille, appr&eacute;cions les soins aimants de la direction et du personnel et n&rsquo;h&eacute;siterions pas &agrave; recommander ce foyer &agrave; n&rsquo;importe qui. </em></p>\r\n', 'Admin 1', 'fr'),
(5, 2, '<p class=\"font-15 pl-0 text-white\">\r\n	<em>J&rsquo;ai un membre de ma famille dans un foyer de soins sp&eacute;ciaux. J&rsquo;ai eu ma premi&egrave;re exp&eacute;rience des foyers de soins sp&eacute;ciaux quand un de mes amis en cherchait un qui serait convenable pour son beau-fr&egrave;re. J&rsquo;ai souvent visit&eacute; son beau-fr&egrave;re, et j&rsquo;ai &eacute;t&eacute; tr&egrave;s impressionn&eacute;e par l&rsquo;amour, le soutien et les soins qu&rsquo;il recevait. Alors, quand le temps est venu o&ugrave; mon amie n&rsquo;&eacute;tait plus capable de vivre chez elle, le premier endroit o&ugrave; je me suis adress&eacute;e a &eacute;t&eacute; le m&ecirc;me &eacute;tablissement. Je savais qu&rsquo;elle y serait en s&eacute;curit&eacute;. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>Je connaissais d&eacute;j&agrave; le personnel amical, avec lequel j&rsquo;&eacute;tais &agrave; l&rsquo;aise, et la compassion et la patience qu&rsquo;il manifestait aux pensionnaires confi&eacute;s &agrave; ses soins, m&ecirc;me quand le pensionnaire avait une journ&eacute;e difficile (ou beaucoup de journ&eacute;es difficiles). </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>La propri&eacute;taire et le personnel sont tr&egrave;s abordables et r&eacute;pondent facilement &agrave; toute pr&eacute;occupation que j&rsquo;ai au sujet de mon amie. Cela met vraiment mon esprit en paix de savoir qu&rsquo;elle dans un milieu si aimant et pr&eacute;venant, o&ugrave; tous les pensionnaires sont trait&eacute;s comme des membres de la famille. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>La COVID a &eacute;t&eacute; &eacute;prouvante, pour dire le moins, mais mon amie &eacute;tait vraiment entre bonnes mains. La propri&eacute;taire et le personnel m&rsquo;ont tr&egrave;s bien inform&eacute;e de chaque phase du virus, et j&rsquo;ai re&ccedil;u les nouvelles par courriel et par t&eacute;l&eacute;phone. Je suis reconnaissante de voir mon amie (s&oelig;ur de mon choix) dans ce foyer pour toujours, o&ugrave; elle est contente et en s&eacute;curit&eacute;. J&rsquo;ai d&eacute;j&agrave; dit au personnel de mettre mon nom sur sa liste quand mon tour viendra; je veux me sentir en s&eacute;curit&eacute; et faire partie d&rsquo;une famille moi aussi. </em></p>\r\n', 'Admin 2', 'fr'),
(6, 3, '<p class=\"font-15 pl-0 text-white\">\r\n	<em>Ma fille r&eacute;side en foyer de soins sp&eacute;ciaux depuis l&rsquo;&acirc;ge de 19 ans. Elle a maintenant 29 ans. Elle est atteinte de paralysie c&eacute;r&eacute;brale et est non-verbale. Son &eacute;tat s&rsquo;est aggrav&eacute; ces derni&egrave;res ann&eacute;es; elle re&ccedil;oit maintenant une alimentation en pur&eacute;e parce qu&rsquo;elle s&rsquo;&eacute;touffe en avalant, et son trouble moteur a aggrav&eacute; ses probl&egrave;mes persistants.</em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>Les soins qu&rsquo;elle re&ccedil;oit sont formidables; en tant que m&egrave;re, je suis tr&egrave;s contente du foyer de soins o&ugrave; elle r&eacute;side. La propri&eacute;taire et le personnel connaissent tr&egrave;s bien les besoins de ma fille et communiquent avec moi au sujet de tout probl&egrave;me qui survient. J&rsquo;ai confiance en l&rsquo;exp&eacute;rience et la connaissance qu&rsquo;ils ont de ma fille comme j&rsquo;aurais confiance en moi-m&ecirc;me. Elle a de la chance de vivre &agrave; un si excellent foyer, car je sais que tous les foyers de soins ne sont pas aussi excellents. Celui o&ugrave; ma fille habite est son chez-soi, et elle s&rsquo;y sent comme dans sa famille. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>La propri&eacute;taire et le personnel ont une bonne formation et ont fait un travail formidable face &agrave; la situation de la COVID. Le foyer est propre, et toutes les pr&eacute;cautions ont &eacute;t&eacute; prises pour garder les clients en s&eacute;curit&eacute; et aussi heureux que possible. Tous les r&egrave;glements concernant la COVID ont &eacute;t&eacute; envoy&eacute;s &agrave; la famille, et nous avons &eacute;t&eacute; inform&eacute;s de tout changement dans les nouvelles zones de couleur. Je f&eacute;licite le personnel et la propri&eacute;taire pour un travail bien fait pendant la p&eacute;riode si difficile de la COVID. </em></p>\r\n<p class=\"font-15 pl-0 text-white\">\r\n	<em>Je travaille moi-m&ecirc;me tous les jours aupr&egrave;s de personnes ayant des handicaps, mais je ne peux pas soulever &agrave; cause de blessures, et c&rsquo;est pourquoi ma fille ne peut pas vivre avec moi. Je pense qu&rsquo;on prend bien soin d&rsquo;elle et que son foyer de soins a toujours &agrave; c&oelig;ur sa sant&eacute; et son bien-&ecirc;tre. Je travaille moi-m&ecirc;me sous les m&ecirc;mes r&egrave;gles de la COVID, et je sais que le foyer de soins qu&rsquo;habite ma fille les suit bien. J&rsquo;ai une tr&egrave;s bonne exp&eacute;rience avec le foyer de soins o&ugrave; ma fille r&eacute;side. Confier un &ecirc;tre cher aux soins d&rsquo;un autre, c&rsquo;est une d&eacute;cision difficile et effrayante, mais je suis heureuse du choix que nous avons fait pour notre fille, et le principal, c&rsquo;est qu&rsquo;elle est heureuse aussi. </em></p>\r\n', 'Admin 3', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `widget_type` varchar(255) NOT NULL,
  `widget_template` varchar(255) DEFAULT NULL,
  `block_category` int(11) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `widgets` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `widget_type`, `widget_template`, `block_category`, `class`, `background`, `image`, `video`, `gallery`, `widgets`, `status`) VALUES
(1, 'Page Content', 'page_content_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'About Intro', 'about_intro_widget', NULL, 2, NULL, NULL, 'about-page-img-new.jpg', NULL, '', '0,0', 1),
(3, 'About Mission', 'about_mission_widget', NULL, 3, NULL, NULL, NULL, 'nbcsha-quality.mp4', '', '0,0', 1),
(4, 'Home About', 'home_about_widget', NULL, NULL, NULL, NULL, NULL, NULL, '', '0,0', 1),
(5, 'Home Blocks', 'home_blocks_widget', NULL, 1, NULL, NULL, NULL, NULL, '', '0,0', 1),
(6, 'Home How it Works', 'home_works_widget', NULL, NULL, NULL, NULL, NULL, 'nbcsha-quality.mp4', '', '0,0', 1),
(7, 'Board Members', 'board_members_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 'FAQs', 'faqs_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'Latest News', 'latest_news_widget', NULL, NULL, NULL, NULL, NULL, NULL, '', '0,0', 1),
(10, 'News', 'news_list_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 'Residences', 'residences_list_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 'Sponsors', 'sponsors_list_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 'Statistics', 'statistics_widget', NULL, NULL, NULL, '167621927_138151504908716_5825245906523345780_n.jpg', NULL, NULL, '', '0,0', 1),
(14, 'Testimonials', 'testimonials_widget', NULL, NULL, NULL, '167219779_482222829577246_94482038042724180_n.jpg', NULL, NULL, '', '0,0', 1),
(15, 'Contact Widget', 'contact_widget', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `widgets_desc`
--

CREATE TABLE `widgets_desc` (
  `desc_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `inset_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `primary_link_url` varchar(255) NOT NULL,
  `primary_link_title` varchar(255) NOT NULL,
  `secondary_link_url` varchar(255) NOT NULL,
  `secondary_link_title` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_link_title` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets_desc`
--

INSERT INTO `widgets_desc` (`desc_id`, `widget_id`, `title`, `subtitle`, `inset_title`, `content`, `primary_link_url`, `primary_link_title`, `secondary_link_url`, `secondary_link_title`, `attachment`, `attachment_link_title`, `language`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '', '', 'en'),
(2, 2, '', '', '', '<h2 class=\"text-uppercase mt-0\">\r\n	Welcome to New Brunswick Special<span class=\"text-theme-color-2\"> Care Home </span> Association Inc</h2>\r\n<p class=\"lead pt-10\">\r\n	Providing quality, cost effective services for seniors and adults with disabilities in cooperation with the Department of Social Development. We strive to promote and develop awareness throughout New Brunswick of the great service our special care homes provide. We are operators too, and therefore understand the immense dedication and commitment involved in running a home. We are here to offer ideas to help you provide the best possible environment for your residents and staff, while help you succeed with your business.</p>\r\n', '', '', '', '', '', '', 'en'),
(3, 3, 'Why Choose Us?', '', '', '', '', '', '', '', '', '', 'en'),
(4, 4, '', '', '', '<h2 class=\"text-uppercase mt-0\">\r\n	Welcome to the New Brunswick Special <span class=\"text-theme-color-2\">Care Home</span>&nbsp;Association Inc.</h2>\r\n<p class=\"lead\">\r\n	We promote and develop awareness throughout New Brunswick of the great service our special care homes provide</p>\r\n<p>\r\n	The New Brunswick Special Care Home Association is here to assist licensed members in providing quality, cost-effective services for seniors and adults with special needs who require 24-hour care and supervision, in cooperation with the Department of Social Development. We advocate for this vital sector on a regular basis to bring key issues to the forefront. Our Board of Directors is committed to improving our association services and partnerships with key stakeholders and other partners in Long Term Care. Our website also provides an opportunity for the public, discharge planners, social workers and others to access details about our members&rsquo; homes and their unique services.</p>\r\n', '', '', '', '', '', '', 'en'),
(5, 5, '', '', '', '', '', '', '', '', '', '', 'en'),
(6, 6, '', '', '', '<h3 class=\"text-white text-uppercase font-32 font-weight-800 mt-0 mb-20\">\r\n	How NBSCHA works for you?</h3>\r\n<p class=\"text-white lead p-5 pl-0 text-left\">\r\n	The association does for its members what they cannot easily do for themselves. The Group Benefit program has been helpful to many and has potential to improve and expand. Working with government on wage, per diem, and issues of standards is a very important role that no individual home can do.</p>\r\n<p class=\"text-white lead text-left\">\r\n	The re-branding as illustrated in these videos is yet another major element of service. The new corporate structure of the association represents a commitment to strengthen its organization in its drive to become increasingly strong as a support to individual homes. Enhanced and expanded education, group purchasing, collaboration with government and other associations is yet another role. The association becomes stronger as more service providers get involved.</p>\r\n', '', '', '', '', '', '', 'en'),
(7, 7, '', '', '', '', '', '', '', '', '', '', 'en'),
(8, 8, '', '', '', '', '', '', '', '', '', '', 'en'),
(9, 9, 'Recent', 'News', '', '<p>\r\n	Please see below the latest news and articles our association regards as very important information to our staff and clients. We will be updating frequently. Keep checking back for more updates!</p>\r\n', '', '', '', '', '', '', 'en'),
(10, 10, '', '', '', '', '', '', '', '', '', '', 'en'),
(11, 11, '', '', '', '', '', '', '', '', '', '', 'en'),
(12, 12, '', '', '', '', '', '', '', '', '', '', 'en'),
(13, 13, '', '', '', '', '', '', '', '', '', '', 'en'),
(14, 14, 'What Clients Are', 'Saying?', '', '<p class=\"text-white\">\r\n	Some warm reviews from family members who have their loved ones in some of our special care homes.!</p>\r\n', '', '', '', '', '', '', 'en'),
(15, 1, '', '', '', '', '', '', '', '', '', '', 'fr'),
(16, 2, '', '', '', '<h2 class=\"text-uppercase mt-0\">\r\n	BIENVENUE &Agrave; L&#39;ASSOCIATION DES FOYERS DE SOINS SP&Eacute;CIAUX DU NOUVEAU-BRUNSWICK INC.</h2>\r\n<p class=\"lead pt-10\">\r\n	Nous offrons des services de qualit&eacute; et &eacute;conomiques aux personnes &acirc;g&eacute;es et aux adultes ayant des handicaps, en collaboration avec le minist&egrave;re du D&eacute;veloppement social. Nous nous effor&ccedil;ons de faire conna&icirc;tre et appr&eacute;cier, partout au Nouveau-Brunswick, les excellents services offerts par nos foyers de soins sp&eacute;ciaux. Nous sommes aussi des exploitants, et nous comprenons donc le d&eacute;vouement et l&rsquo;engagement immenses n&eacute;cessaires pour diriger un foyer. Nous sommes l&agrave; pour offrir des id&eacute;es qui vous aideront &agrave; offrir le meilleur environnement possible &agrave; vos pensionnaires et &agrave; votre personnel, tout en aidant &agrave; la r&eacute;ussite de votre entreprise.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '', '', '', '', '', '', 'fr'),
(17, 3, 'Pourquoi Nous Choisir?', '', '', '', '', '', '', '', '', '', 'fr'),
(18, 4, '', '', '', '<h2 class=\"text-uppercase mt-0\">\r\n	Bienvenue &Agrave; L&#39;association Des Foyers De Soins Sp&eacute;ciaux Du Nouveau-brunswick Inc.</h2>\r\n<p class=\"lead\">\r\n	Nous faisons conna&icirc;tre et appr&eacute;cier, partout au Nouveau-Brunswick, les excellents services offerts par nos foyers de soins sp&eacute;ciaux.</p>\r\n<p>\r\n	L&#39;Association des foyers de soins sp&eacute;ciaux du Nouveau-Brunswick a pour but d&rsquo;aider les membres agr&eacute;&eacute;s &agrave; offrir des services de qualit&eacute; et &eacute;conomiques aux personnes &acirc;g&eacute;es et aux adultes ayant des besoins sp&eacute;ciaux qui ont besoin de soins et de surveillance 24 heures par jour, en collaboration avec le minist&egrave;re du D&eacute;veloppement social. Nous d&eacute;fendons r&eacute;guli&egrave;rement les int&eacute;r&ecirc;ts de ce secteur vital pour amener &agrave; l&rsquo;avant-sc&egrave;ne les questions cruciales. Notre conseil d&#39;administration s&rsquo;engage &agrave; am&eacute;liorer les services de notre association et ses partenariats avec les intervenants essentiels et d&rsquo;autres partenaires des soins de longue dur&eacute;e. Notre site Web permet aussi au public, aux planificateurs de renvois, aux travailleurs sociaux et &agrave; d&rsquo;autres d&rsquo;obtenir des d&eacute;tails sur les foyers de nos membres et sur leurs services uniques.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '', '', '', '', '', '', 'fr'),
(19, 5, '', '', '', '', '', '', '', '', '', '', 'fr'),
(20, 6, '', '', '', '<h3 class=\"text-white text-uppercase font-30 font-weight-600 mt-0 mb-20\">\r\n	COMMENT LA NBSCHA TRAVAILLE-T-ELLE POUR VOUS ?</h3>\r\n<p class=\"text-white lead p-5 pl-0 text-left\">\r\n	L\'association fait pour ses membres ce qu\'ils ne peuvent pas facilement faire pour eux-mêmes. Le programme de prestations collectives a été utile à de nombreuses personnes et a le potentiel pour être amélioré et étendu. Travailler avec le gouvernement sur les salaires, les indemnités journalières et les questions de normes est un rôle très important qu\'aucune maison individuelle ne peut jouer.</p>\r\n<p class=\"text-white lead text-left\">\r\n	Le changement de marque, tel qu\'illustré dans ces vidéos, est un autre élément majeur du service. La nouvelle structure corporative de l\'association représente un engagement à renforcer son organisation dans sa volonté de devenir de plus en plus forte en tant que soutien aux foyers individuels. L\'amélioration et l\'élargissement de l\'éducation, les achats groupés, la collaboration avec le gouvernement et d\'autres associations constituent un autre rôle. L\'association devient plus forte lorsque davantage de prestataires de services s\'impliquent.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '', '', '', '', '', '', 'fr'),
(21, 7, '', '', '', '', '', '', '', '', '', '', 'fr'),
(22, 8, '', '', '', '', '', '', '', '', '', '', 'fr'),
(23, 9, 'NOUVELLES', 'RÉCENTES', '', '<p>\r\n	Lisez ci-dessous les nouvelles et articles r&eacute;cents que notre association consid&egrave;re comme une information tr&egrave;s importante pour notre personnel et nos clients. Nous ferons des mises &agrave; jour fr&eacute;quentes. Revenez nous visiter pour avoir d&rsquo;autres nouvelles!</p>\r\n', '', '', '', '', '', '', 'fr'),
(24, 10, '', '', '', '', '', '', '', '', '', '', 'fr'),
(25, 11, '', '', '', '', '', '', '', '', '', '', 'fr'),
(26, 12, '', '', '', '', '', '', '', '', '', '', 'fr'),
(27, 13, '', '', '', '', '', '', '', '', '', '', 'fr'),
(28, 14, 'QUE DISENT', 'LES CLIENTS?', '', '<p class=\"text-white\">\r\n	Quelques commentaires &eacute;logieux de membres des familles qui ont des proches r&eacute;sidant dans nos foyers de soins sp&eacute;ciaux!</p>\r\n', '', '', '', '', '', '', 'fr'),
(29, 15, '', '', '', '', '', '', '', '', '', '', 'en'),
(30, 15, '', '', '', '', '', '', '', '', '', '', 'fr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `admins_login_history`
--
ALTER TABLE `admins_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_function`
--
ALTER TABLE `admin_function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_function_permission`
--
ALTER TABLE `admin_function_permission`
  ADD UNIQUE KEY `role_function_id` (`function_id`,`role_id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_reset`
--
ALTER TABLE `admin_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks_desc`
--
ALTER TABLE `blocks_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `block_categories`
--
ALTER TABLE `block_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_members`
--
ALTER TABLE `board_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_members_desc`
--
ALTER TABLE `board_members_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `carelevels`
--
ALTER TABLE `carelevels`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `carelevels_desc`
--
ALTER TABLE `carelevels_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `certificate_templates`
--
ALTER TABLE `certificate_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_templates_desc`
--
ALTER TABLE `certificate_templates_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `database_updates`
--
ALTER TABLE `database_updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `facilities_desc`
--
ALTER TABLE `facilities_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs_desc`
--
ALTER TABLE `faqs_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `features_desc`
--
ALTER TABLE `features_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms_desc`
--
ALTER TABLE `forms_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `home_languages`
--
ALTER TABLE `home_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links_desc`
--
ALTER TABLE `links_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `localization`
--
ALTER TABLE `localization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_packages`
--
ALTER TABLE `membership_packages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `membership_packages_desc`
--
ALTER TABLE `membership_packages_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `membership_requests`
--
ALTER TABLE `membership_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_login_history`
--
ALTER TABLE `members_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_menu`
--
ALTER TABLE `member_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_reset`
--
ALTER TABLE `member_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitems_desc`
--
ALTER TABLE `menuitems_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories_desc`
--
ALTER TABLE `news_categories_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `news_desc`
--
ALTER TABLE `news_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_desc`
--
ALTER TABLE `pages_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_widgets`
--
ALTER TABLE `page_widgets`
  ADD UNIQUE KEY `page_widget_id` (`page_id`,`widget_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `regions_desc`
--
ALTER TABLE `regions_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `renewal_requests`
--
ALTER TABLE `renewal_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residences`
--
ALTER TABLE `residences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residences_desc`
--
ALTER TABLE `residences_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_desc`
--
ALTER TABLE `settings_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders_desc`
--
ALTER TABLE `sliders_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors_desc`
--
ALTER TABLE `sponsors_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics_desc`
--
ALTER TABLE `statistics_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_desc`
--
ALTER TABLE `testimonials_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets_desc`
--
ALTER TABLE `widgets_desc`
  ADD PRIMARY KEY (`desc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins_login_history`
--
ALTER TABLE `admins_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `admin_function`
--
ALTER TABLE `admin_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `admin_reset`
--
ALTER TABLE `admin_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blocks_desc`
--
ALTER TABLE `blocks_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `block_categories`
--
ALTER TABLE `block_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `board_members_desc`
--
ALTER TABLE `board_members_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `carelevels`
--
ALTER TABLE `carelevels`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carelevels_desc`
--
ALTER TABLE `carelevels_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `certificate_templates`
--
ALTER TABLE `certificate_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate_templates_desc`
--
ALTER TABLE `certificate_templates_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `database_updates`
--
ALTER TABLE `database_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facilities_desc`
--
ALTER TABLE `facilities_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs_desc`
--
ALTER TABLE `faqs_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `features_desc`
--
ALTER TABLE `features_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `forms_desc`
--
ALTER TABLE `forms_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `home_languages`
--
ALTER TABLE `home_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `links_desc`
--
ALTER TABLE `links_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `localization`
--
ALTER TABLE `localization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `membership_packages`
--
ALTER TABLE `membership_packages`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_packages_desc`
--
ALTER TABLE `membership_packages_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membership_requests`
--
ALTER TABLE `membership_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members_login_history`
--
ALTER TABLE `members_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `member_menu`
--
ALTER TABLE `member_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_reset`
--
ALTER TABLE `member_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menuitems_desc`
--
ALTER TABLE `menuitems_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_categories_desc`
--
ALTER TABLE `news_categories_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news_desc`
--
ALTER TABLE `news_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pages_desc`
--
ALTER TABLE `pages_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regions_desc`
--
ALTER TABLE `regions_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `renewal_requests`
--
ALTER TABLE `renewal_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residences`
--
ALTER TABLE `residences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `residences_desc`
--
ALTER TABLE `residences_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `settings_desc`
--
ALTER TABLE `settings_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders_desc`
--
ALTER TABLE `sliders_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sponsors_desc`
--
ALTER TABLE `sponsors_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statistics_desc`
--
ALTER TABLE `statistics_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials_desc`
--
ALTER TABLE `testimonials_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `widgets_desc`
--
ALTER TABLE `widgets_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
