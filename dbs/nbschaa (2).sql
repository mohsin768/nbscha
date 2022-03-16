-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 16, 2022 at 09:58 AM
-- Server version: 5.7.34
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbschaa`
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
(1, 'Super Administrator', 'superadmin', '15c362dc8fd059b0386008927bc4105673455d20', 'celiums', 'admin@celiums.com', '984698551', 1, 1, '2021-10-06 18:40:02'),
(2, 'Loai Jaouni', 'loai', 'dffa88b5bf8ee2cb56c053025e112196ac16128f', '3Xl0Jj', 'loai.jaouni@gmail.com', '123456789', 1, 1, '2022-03-03 05:41:40');

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
(23, 1, '127.0.0.1', '0000-00-00 00:00:00');

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
(78, 'fa-wpforms', 'Manage Forms', '', 0, 'Y', 1, 15),
(79, '', 'Enquiries', 'enquiries/overview', 78, 'Y', 1, 5),
(83, '', 'Home Sliders', 'sliders/overview', 70, 'Y', 1, 1),
(84, '', 'Blocks', 'blocks/overview', 70, 'Y', 1, 2),
(85, '', 'Block Categories', 'blocks/categories', 70, 'Y', 1, 3),
(86, '', 'Languages', 'languages/overview', 1, 'Y', 1, 1),
(89, 'fa-users', 'Manage Memberships', '', 0, 'Y', 1, 2),
(90, '', 'Members', 'members', 89, 'Y', 1, 0),
(91, 'fa-file-text-o', 'Manage Masters', '', 0, 'Y', 1, 3),
(92, '', 'Packages(Beds)', 'packages', 91, 'Y', 1, 0),
(93, '', 'Localization', 'home/localization', 1, 'Y', 1, 1),
(94, '', 'Regions', 'regions', 91, 'Y', 1, 2),
(95, '', 'Level Of Care', 'carelevels', 91, 'Y', 1, 4),
(96, '', 'Facilities', 'facilities', 91, 'Y', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_permission`
--

CREATE TABLE `admin_menu_permission` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_reset`
--

CREATE TABLE `admin_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_key` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Super Administrator', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `block_categories`
--

CREATE TABLE `block_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 0, 1, 0);

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
(1, 1, 'Care Level 1', 'en'),
(2, 1, 'Care Level 1 Fr', 'fr');

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
  `home_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `localization`
--

CREATE TABLE `localization` (
  `id` int(11) NOT NULL,
  `lang_key` text NOT NULL,
  `lang_value` text NOT NULL,
  `language` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localization`
--

INSERT INTO `localization` (`id`, `lang_key`, `lang_value`, `language`) VALUES
(1, 'SITE_NAME', 'The New Brunswick Special Care Home Association Title English 3', 'en'),
(2, 'SITE_NAME', 'The New Brunswick Special Care Home Association Title French 1', 'fr'),
(3, 'SITE_SOLGAN', 'The New Brunswick Special Care Home Association Slogan English 4 Such', 'en'),
(4, 'SITE_SOLGAN', 'The New Brunswick Special Care Home Association Slogan French 2', 'fr');

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
(1, 'Saleel', 'VA', '27220ae12b388234d3c6fc69970602b50c4a7c3a', 'YknDo5', 'saleelva@gmail.com', '09846985511', 0, '2022-03-14 08:56:03', 0),
(2, 'Varun', 'Victor', '768ccc1768b38960afa3dc5550bbe0632e76c8b1', 'CqhulX', 'varun@g.com', '3456476586', 1, '2022-03-14 08:57:30', 0);

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
(1, 2, '127.0.0.1', '0000-00-00 00:00:00'),
(2, 2, '127.0.0.1', '0000-00-00 00:00:00'),
(3, 2, '127.0.0.1', '0000-00-00 00:00:00'),
(4, 2, '127.0.0.1', '0000-00-00 00:00:00'),
(5, 2, '127.0.0.1', '0000-00-00 00:00:00'),
(6, 2, '127.0.0.1', '0000-00-00 00:00:00');

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
(7, '', 'Membership', 'member/membership', 1, 'Y', 1, 1),
(8, '', 'Residence', 'member/residence', 1, 'Y', 1, 2),
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
(1, 2, 'zaVAiWGZUJxD3ELy');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `news_categories_desc`
--

CREATE TABLE `news_categories_desc` (
  `desc_id` int(11) NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_video` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `banner_image`, `banner_video`, `status`) VALUES
(1, '', NULL, NULL, 1),
(2, '', NULL, NULL, 1);

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
(3, 1, 'Home', NULL, 'Home', NULL, NULL, 'fr'),
(4, 2, 'Page not found', NULL, 'Page not found', NULL, NULL, 'fr');

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
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_widgets`
--

CREATE TABLE `page_widgets` (
  `page_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(39, 17, 'Register Page', 'REGISTER_PAGE_ID', 'pages', 2, 'Y');

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
(1, 1, 'The New Burnswick Special Care Home Association English', 'en'),
(2, 2, 'varunvictor007@gmail.com', 'en'),
(3, 3, 'admin@celiums.com', 'en'),
(4, 4, '1234567890', 'en'),
(5, 5, 'The New Burnswick Special Care Home Association', 'en'),
(6, 6, 'The New Burnswick Special Care Home Association', 'en'),
(7, 7, 'The New Burnswick Special Care Home Association', 'en'),
(8, 8, 'off', 'en'),
(9, 9, '', 'en'),
(10, 10, '', 'en'),
(11, 11, '', 'en'),
(12, 12, '', 'en'),
(13, 13, '', 'en'),
(14, 14, NULL, 'en'),
(15, 15, NULL, 'en'),
(16, 16, NULL, 'en'),
(17, 17, NULL, 'en'),
(18, 18, '1', 'en'),
(19, 19, '2', 'en'),
(20, 1, 'The New Burnswick Special Care Home Association French', 'fr'),
(21, 2, 'varunvictor007@gmail.com', 'fr'),
(22, 3, 'admin@celiums.com', 'fr'),
(23, 4, '1234567890', 'fr'),
(24, 5, 'The New Burnswick Special Care Home Association', 'fr'),
(25, 6, 'The New Burnswick Special Care Home Association', 'fr'),
(26, 7, 'The New Burnswick Special Care Home Association', 'fr'),
(27, 8, 'off', 'fr'),
(28, 9, '', 'fr'),
(29, 10, '', 'fr'),
(30, 11, '', 'fr'),
(31, 12, '', 'fr'),
(32, 13, '', 'fr'),
(33, 14, NULL, 'fr'),
(34, 15, NULL, 'fr'),
(35, 16, NULL, 'fr'),
(36, 17, NULL, 'fr'),
(37, 18, '1', 'fr'),
(38, 19, '2', 'fr'),
(39, 39, '1', 'en'),
(40, 39, '1', 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `youtube_video` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_title` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors_desc`
--

CREATE TABLE `sponsors_desc` (
  `desc_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `background` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `widgets` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `class` varchar(255) NOT NULL,
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
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins_login_history`
--
ALTER TABLE `admins_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_function`
--
ALTER TABLE `admin_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `admin_reset`
--
ALTER TABLE `admin_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocks_desc`
--
ALTER TABLE `blocks_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_categories`
--
ALTER TABLE `block_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board_members`
--
ALTER TABLE `board_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board_members_desc`
--
ALTER TABLE `board_members_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carelevels`
--
ALTER TABLE `carelevels`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carelevels_desc`
--
ALTER TABLE `carelevels_desc`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities_desc`
--
ALTER TABLE `facilities_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms_desc`
--
ALTER TABLE `forms_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links_desc`
--
ALTER TABLE `links_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `localization`
--
ALTER TABLE `localization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership_packages`
--
ALTER TABLE `membership_packages`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_packages_desc`
--
ALTER TABLE `membership_packages_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_login_history`
--
ALTER TABLE `members_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_menu`
--
ALTER TABLE `member_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_reset`
--
ALTER TABLE `member_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menuitems_desc`
--
ALTER TABLE `menuitems_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_categories_desc`
--
ALTER TABLE `news_categories_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_desc`
--
ALTER TABLE `news_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages_desc`
--
ALTER TABLE `pages_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions_desc`
--
ALTER TABLE `regions_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `settings_desc`
--
ALTER TABLE `settings_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors_desc`
--
ALTER TABLE `sponsors_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `widgets_desc`
--
ALTER TABLE `widgets_desc`
  MODIFY `desc_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
