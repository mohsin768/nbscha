-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2022 at 02:23 PM
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
(17, 1, '127.0.0.1', '0000-00-00 00:00:00');

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
(92, '', 'Membership Packages', 'packages', 91, 'Y', 1, 0);

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
  `title` varchar(255) NOT NULL,
  `summary` text,
  `caption_title` varchar(255) DEFAULT NULL,
  `caption_subtitle` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_title` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, 'English', 'ENG', '', 'en', 0, 1),
(2, 'Arabic', 'ARA', '', 'ar', 1, 1);

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
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `certificate_template` int(11) DEFAULT NULL,
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
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `link_type` varchar(255) NOT NULL,
  `link_object` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `show_subitems` tinyint(1) NOT NULL DEFAULT '1',
  `target_type` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_video` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `subtitle`, `banner_image`, `banner_video`, `meta_title`, `meta_desc`, `meta_keywords`, `status`) VALUES
(1, '', 'Home', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, '', '404 Not Found', NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `title` varchar(300) NOT NULL,
  `settingkey` varchar(300) NOT NULL,
  `settingtype` varchar(100) NOT NULL,
  `settingvalue` text,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `parent`, `title`, `settingkey`, `settingtype`, `settingvalue`, `sort_order`, `status`) VALUES
(1, 29, 'Site Name', 'SITE_NAME', 'text', 'Fort McMurray Trade Show', 0, 'Y'),
(2, 29, 'Admin Email', 'ADMIN_EMAIL', 'text', 'varunvictor007@gmail.com', 0, 'Y'),
(3, 29, 'From Mail Address', 'FROM_MAIL', 'text', 'admin@celiums.com', 0, 'Y'),
(4, 29, 'Support Phone', 'SUPPORT_PHONE', 'text', '984698551', 0, 'Y'),
(12, 30, 'Meta Title', 'DEFAULT_META_TITLE', 'text', 'Home', 0, 'Y'),
(13, 30, 'Meta Desc', 'DEFAULT_META_DESCRIPTION', 'textarea', 'Fort McMurray Trade Show', 0, 'Y'),
(14, 30, 'Meta Keywords', 'DEFAULT_META_KEYWORDS', 'textarea', 'Fort McMurray Trade Show', 0, 'Y'),
(23, 31, 'Mailer Protocol', 'MAILER_PROTOCOL', 'text', 'sendmail', 0, 'Y'),
(24, 31, 'Mailer Host', 'MAILER_HOST', 'text', '', 0, 'Y'),
(25, 31, 'Mailer User', 'MAILER_USER', 'text', '', 0, 'Y'),
(26, 31, 'Mailer Password', 'MAILER_PASSWORD', 'text', '', 0, 'Y'),
(27, 31, 'Mailer Port', 'MAILER_PORT', 'text', '', 0, 'Y'),
(28, 31, 'Mailer Transport', 'MAILER_TRANSPORT', 'text', '', 0, 'Y'),
(29, 0, 'General', '', 'group', NULL, 1, 'Y'),
(30, 0, 'SEO', '', 'group', NULL, 2, 'Y'),
(31, 0, 'Mail', '', 'group', NULL, 3, 'Y'),
(34, 0, 'Theme', 'theme_group', 'group', '', 4, 'Y'),
(35, 34, 'Home Page', 'HOME_PAGE_ID', 'pages', '1', 0, 'Y'),
(37, 34, '404 Error Page', 'ERROR_PAGE_ID', 'pages', '2', 1, 'Y');

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
  `event` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
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
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `inset_title` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `content` text,
  `primary_link_url` varchar(255) DEFAULT NULL,
  `primary_link_title` varchar(255) DEFAULT NULL,
  `secondary_link_url` varchar(255) DEFAULT NULL,
  `secondary_link_title` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `attachment_link_title` varchar(255) DEFAULT NULL,
  `widgets` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
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
-- Indexes for table `block_categories`
--
ALTER TABLE `block_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin_function`
--
ALTER TABLE `admin_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
-- AUTO_INCREMENT for table `block_categories`
--
ALTER TABLE `block_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
