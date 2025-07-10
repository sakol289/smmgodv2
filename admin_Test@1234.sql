-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 05:19 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u579338369_smmgodv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(225) NOT NULL,
  `bank_sube` varchar(225) NOT NULL,
  `bank_hesap` varchar(225) NOT NULL,
  `bank_iban` text DEFAULT NULL,
  `bank_alici` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` text DEFAULT NULL,
  `blog_image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `blog_content` text DEFAULT NULL,
  `blog_created` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `url` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `name_lang` text NOT NULL,
  `category_line` double NOT NULL,
  `category_type` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '2',
  `category_secret` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `child_panels`
--

CREATE TABLE `child_panels` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `panel_domain` text DEFAULT NULL,
  `panel_currency` text DEFAULT NULL,
  `panel_status` varchar(225) NOT NULL DEFAULT 'pending',
  `panel_price` text DEFAULT NULL,
  `panel_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(225) DEFAULT NULL,
  `last_name` varchar(225) DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` text NOT NULL,
  `telephone` varchar(225) DEFAULT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `balance_type` enum('1','2') NOT NULL DEFAULT '2',
  `debit_limit` double NOT NULL,
  `spent` double NOT NULL DEFAULT 0,
  `register_date` datetime NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `login_ip` varchar(225) NOT NULL,
  `register_ip` varchar(225) NOT NULL,
  `apikey` text NOT NULL,
  `client_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '2 -> ON, 1 -> OFF',
  `access` text DEFAULT NULL,
  `lang` varchar(255) NOT NULL DEFAULT 'tr',
  `timezone` double NOT NULL DEFAULT 0,
  `admin_theme` enum('1','2') NOT NULL DEFAULT '1',
  `referral` varchar(225) DEFAULT NULL,
  `referral_code` varchar(225) NOT NULL,
  `refchar` varchar(225) NOT NULL DEFAULT '0',
  `reforder` varchar(225) NOT NULL DEFAULT '0',
  `total_click` varchar(225) NOT NULL DEFAULT '0',
  `sms_verify` int(11) NOT NULL DEFAULT 1,
  `mail_verify` int(11) NOT NULL DEFAULT 1,
  `currency` int(11) DEFAULT NULL,
  `coustm_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `email`, `username`, `password`, `telephone`, `balance`, `balance_type`, `debit_limit`, `spent`, `register_date`, `login_date`, `login_ip`, `register_ip`, `apikey`, `client_type`, `access`, `lang`, `timezone`, `admin_theme`, `referral`, `referral_code`, `refchar`, `reforder`, `total_click`, `sms_verify`, `mail_verify`, `currency`, `coustm_rate`) VALUES
(27, 'admin', 'account', 'admin@new-like.com', 'admin', '9ade913176bfb547d66f05539a5879bd', '123456789', 1, '2', 0, 0, '2025-07-10 10:36:28', '2025-07-10 10:34:08', '124.120.48.219', '', 'b4ade784f95b0f195154e6da96d93ef1', '2', '{\"admin_access\":\"1\",\"users\":\"1\",\"orders\":\"1\",\"subscriptions\":\"1\",\"dripfeed\":\"1\",\"tasks\":\"1\",\"services\":\"1\",\"payments\":\"1\",\"tickets\":\"1\",\"reports\":\"1\",\"general_settings\":\"1\",\"pages\":\"1\",\"blog\":\"1\",\"seo\":\"1\",\"menu\":\"1\",\"subject\":\"1\",\"child_panels\":\"1\",\"payments_settings\":\"1\",\"bank_accounts\":\"1\",\"payments_bonus\":\"1\",\"alert_settings\":\"1\",\"providers\":\"1\",\"modules\":\"1\",\"themes\":\"1\",\"language\":\"1\",\"logs\":\"1\",\"provider_logs\":\"1\",\"guard_logs\":\"1\",\"admins\":\"1\",\"update-prices\":\"1\",\"crons\":\"1\",\"kuponlar\":\"1\",\"currency_settings\":\"1\"}', 'th', 9000, '2', NULL, '1b174', '0', '0', '1', 1, 1, NULL, 0),
(28, 'testtttttttttt', 'testtttttttttt', 'testtttttttttt@testtttttttttt.testtttttttttt', 'testtttttttttt', 'a0457f466df504fcdd45000e26040288', '11111111111', 0, '2', 0, 0, '2025-07-10 10:55:22', '2025-07-10 10:55:30', '124.120.48.219', '', 'b07c979f65f6848ea17e3e8caed35354', '2', NULL, 'th', 14400, '1', '1b174', '15dd8', '0', '0', '0', 1, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clients_category`
--

CREATE TABLE `clients_category` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients_price`
--

CREATE TABLE `clients_price` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients_service`
--

CREATE TABLE `clients_service` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_report`
--

CREATE TABLE `client_report` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `report_ip` varchar(225) NOT NULL,
  `report_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `client_report`
--

INSERT INTO `client_report` (`id`, `client_id`, `action`, `report_ip`, `report_date`) VALUES
(153, 28, 'User registration made.', '124.120.48.219', '2025-07-10 10:55:22'),
(154, 28, 'Member logged in.', '124.120.48.219', '2025-07-10 10:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `symbol` text DEFAULT NULL,
  `value` double DEFAULT NULL,
  `name` varchar(225) NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1',
  `default` enum('2','1') NOT NULL DEFAULT '2',
  `nouse` enum('1','2') NOT NULL DEFAULT '2',
  `rate` int(11) NOT NULL,
  `inverse_value` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `symbol`, `value`, `name`, `status`, `default`, `nouse`, `rate`, `inverse_value`) VALUES
(1, '$', 1, 'USD', '1', '1', '2', 2, 1),
(24, '฿', 35, 'THB', '1', '2', '2', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `decoration`
--

CREATE TABLE `decoration` (
  `id` int(11) NOT NULL,
  `snow_effect` int(3) NOT NULL,
  `snow_colour` text NOT NULL,
  `diwali_lights` int(3) NOT NULL,
  `video_link` text NOT NULL,
  `christmas_deco` varchar(5000) NOT NULL,
  `action_link` text NOT NULL,
  `pop_noti` int(2) NOT NULL,
  `pop_title` text NOT NULL,
  `pop_desc` text NOT NULL,
  `action_text` varchar(10) NOT NULL,
  `action_button` int(2) NOT NULL,
  `snow_fall` varchar(500) DEFAULT NULL,
  `garlands` text DEFAULT NULL,
  `fire_works` text DEFAULT NULL,
  `toys` text DEFAULT NULL,
  `snowflakes` int(10) NOT NULL,
  `snow_speed` int(20) NOT NULL,
  `gar_shape` text NOT NULL,
  `gar_style` text NOT NULL,
  `fire_size` varchar(100) NOT NULL,
  `fire_speed` text NOT NULL,
  `toy_size` int(20) NOT NULL,
  `toy_quantity` int(50) NOT NULL,
  `toy_speed` int(10) NOT NULL,
  `toy_launch` varchar(100) NOT NULL,
  `toy_a` varchar(50) NOT NULL,
  `toy_b` varchar(50) NOT NULL,
  `toy_c` varchar(50) NOT NULL,
  `toy_d` varchar(50) NOT NULL,
  `toy_e` varchar(50) NOT NULL,
  `toy_f` varchar(50) NOT NULL,
  `toy_g` varchar(50) NOT NULL,
  `toy_h` varchar(50) NOT NULL,
  `toy_i` varchar(50) NOT NULL,
  `toy_j` varchar(50) NOT NULL,
  `toy_k` varchar(50) NOT NULL,
  `psw_license` text NOT NULL,
  `toy_l` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `decoration`
--

INSERT INTO `decoration` (`id`, `snow_effect`, `snow_colour`, `diwali_lights`, `video_link`, `christmas_deco`, `action_link`, `pop_noti`, `pop_title`, `pop_desc`, `action_text`, `action_button`, `snow_fall`, `garlands`, `fire_works`, `toys`, `snowflakes`, `snow_speed`, `gar_shape`, `gar_style`, `fire_size`, `fire_speed`, `toy_size`, `toy_quantity`, `toy_speed`, `toy_launch`, `toy_a`, `toy_b`, `toy_c`, `toy_d`, `toy_e`, `toy_f`, `toy_g`, `toy_h`, `toy_i`, `toy_j`, `toy_k`, `psw_license`, `toy_l`) VALUES
(1, 0, 'rsj', 0, 'a', '\n\n<style>.particle-snow{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1;pointer-events:none}.particle-snow canvas{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none}.christmas-garland{text-align:center;white-space:nowrap;overflow:hidden;position:absolute;z-index:1;padding:0;pointer-events:none;width:100%;height:85px}.christmas-garland .christmas-garland__item{position:relative;width:28px;height:28px;border-radius:50%;display:inline-block;margin-left:20px}.christmas-garland .christmas-garland__item .shape{-webkit-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;-webkit-animation-name:flash-1;animation-name:flash-1;-webkit-animation-duration:2s;animation-duration:2s}.christmas-garland .christmas-garland__item .apple{width:22px;height:22px;border-radius:50%;margin-left:auto;margin-right:auto;margin-top:8px}.christmas-garland .christmas-garland__item .pear{width:12px;height:28px;border-radius:50%;margin-left:auto;margin-right:auto;margin-top:6px}.christmas-garland .christmas-garland__item:nth-child(2n+1) .shape{-webkit-animation-name:flash-2;animation-name:flash-2;-webkit-animation-duration:.4s;animation-duration:.4s}.christmas-garland .christmas-garland__item:nth-child(4n+2) .shape{-webkit-animation-name:flash-3;animation-name:flash-3;-webkit-animation-duration:1.1s;animation-duration:1.1s}.christmas-garland .christmas-garland__item:nth-child(odd) .shape{-webkit-animation-duration:1.8s;animation-duration:1.8s}.christmas-garland .christmas-garland__item:nth-child(3n+1) .shape{-webkit-animation-duration:1.4s;animation-duration:1.4s}.christmas-garland .christmas-garland__item:before{content:\"\";position:absolute;background:#222;width:10px;height:10px;border-radius:3px;top:-1px;left:9px}.christmas-garland .christmas-garland__item:after{content:\"\";top:-9px;left:14px;position:absolute;width:52px;height:18px;border-bottom:solid #222 2px;border-radius:50%}.christmas-garland .christmas-garland__item:last-child:after{content:none}.christmas-garland .christmas-garland__item:first-child{margin-left:-40px}</style>\n<!-- developed by Raj Patel-->\n      \n<!-- developed by Raj Patel-->  \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/libs/jquery/1.12.4/jquery.min.js\">\n          </script>\n    \n\n        \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/global/flpbonhmkq9tsp29.js\">\n          </script>\n    \n        \n<!-- developed by Raj Patel-->\n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/global/a4kdpfesx15uh7ae.js\">\n          </script>\n    \n<!-- developed by Raj Patel-->\n        \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/global/596z6ya3isgxcipy.js\">\n          </script>\n    \n        \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/global/39j8e9yrxs283d1x.js\">\n          </script>\n    \n        \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/global/33srijdbqcgk6lsz.js\">\n          </script>\n    \n\n        \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/52pp7z/wxbh27w4jdzpslxn.js\">\n          </script>\n    \n\n        \n    <script type=\"text/javascript\" src=\"https://cdn.mypanel.link/52pp7z/angedasgma230hxr.js\">\n          </script>\n    \n        \n<!-- developed by Raj Patel-->\n<!-- developed by Raj Patel-->\n    <script type=\"text/javascript\" >\n       window.modules.layouts = {\"theme_id\":1,\"auth\":0,\"live\":true};     </script>\n    \n        \n    <script type=\"text/javascript\" >\n       window.modules.signin = [];     </script>\n    \n<!-- developed by Raj Patel-->\n<!-- developed by Raj Patel-->\n<!-- developed by Raj Patel-->\n        \n    <script type=\"text/javascript\" >\n       document.addEventListener(\'DOMContentLoaded\', function() { \nvar newYearEvent = new window.NewYearEvent({\"snow\":{\"init\":true,\"options\":{\"particles\":{\"move\":{\"speed\":3,\"bounce\":false,\"enable\":true,\"random\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200},\"out_mode\":\"out\",\"straight\":false,\"direction\":\"bottom\"},\"size\":{\"anim\":{\"sync\":false,\"speed\":40,\"enable\":false,\"size_min\":0.1},\"value\":5,\"random\":true},\"color\":{\"value\":\"#fff\"},\"number\":{\"value\":100,\"density\":{\"enable\":true,\"value_area\":650}},\"opacity\":{\"anim\":{\"sync\":false,\"speed\":1,\"enable\":true,\"opacity_min\":0.9},\"value\":0.9,\"random\":true},\"line_linked\":{\"color\":\"#ffffff\",\"width\":1,\"enable\":false,\"opacity\":0.8,\"distance\":500}},\"interactivity\":{\"modes\":{\"bubble\":{\"size\":4,\"speed\":3,\"opacity\":1,\"distance\":400,\"duration\":0.3},\"repulse\":{\"speed\":3,\"distance\":200,\"duration\":0.4}},\"events\":{\"resize\":true,\"onclick\":{\"mode\":\"repulse\",\"enable\":true},\"onhover\":{\"mode\":\"bubble\",\"enable\":false}},\"detect_on\":\"window\"},\"retina_detect\":true}},\"toys\"', '', 0, '', '', '', 0, 'true', 'true', NULL, NULL, 20, 3, 'pear', 'style1', '0.95', 'slow', 30, 20, 1, '1', '1', '1', '1', '', '1', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `link` text DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guard_log`
--

CREATE TABLE `guard_log` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `action` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integrations`
--

CREATE TABLE `integrations` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `icon_url` varchar(225) NOT NULL,
  `code` text NOT NULL,
  `visibility` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `integrations`
--

INSERT INTO `integrations` (`id`, `name`, `description`, `icon_url`, `code`, `visibility`, `status`) VALUES
(1, 'Beamer', 'Announce updates and get feedback with in-app notification center, widgets and changelog', '/img/integrations/Beamer.svg', '', 1, 1),
(2, 'Getsitecontrol', 'It helps you prevent website visitors from leaving your website without taking any action.', '/img/integrations/Getsitecontrol.svg', '', 3, 1),
(3, 'Google Analytics', 'Statistics and basic analytical tools for search engine optimization (SEO) and marketing purposes', '/img/integrations/Google%20Analytics.svg', '', 1, 1),
(4, 'Google Tag manager', 'Manage all your website tags without editing the code using simple tag management solutions', '/img/integrations/Google%20Tag%20manager.svg', '', 1, 1),
(5, 'JivoChat', 'All-in-one business messenger to talk to customers: live chat, phone, email and social', '/img/integrations/JivoChat.svg', '', 1, 1),
(6, 'Onesignal', 'Leader in customer engagement, empowers mobile push, web push, email, in-app messages', '/img/integrations/Onesignal.svg', '', 1, 1),
(7, 'Push alert', 'Increase reach, revenue, retarget users with Push Notifications on desktop and mobile', '/img/integrations/Push%20alert.svg', '', 1, 1),
(8, 'Smartsupp', 'Live chat, email inbox and Facebook Messenger in one customer messaging platform', '/img/integrations/Smartsupp.svg', '', 1, 1),
(9, 'Tawk.to', 'Track and chat with visitors on your website, mobile app or a free customizable page', '/img/integrations/Tawk.to.svg', '', 1, 1),
(10, 'Tidio', 'Communicator for businesses that keep live chat, chatbots, Messenger and email in one place', '/img/integrations/Tidio.svg', '', 1, 1),
(11, 'Zendesk Chat', 'Helps respond quickly to customer questions, reduce wait times and increase sales', '/img/integrations/Zendesk%20Chat.svg', '', 1, 1),
(12, 'Getbutton.io', 'Chat with website visitors through popular messaging apps. Whatsapp, messenger etc. contact button.', '/img/integrations/Getbutton.svg', '', 1, 1),
(13, 'Google reCAPTCHA v2', 'It uses an advanced risk analysis engine and adaptive challenges to prevent malware from engaging in abusive activities on your website.', '/img/integrations/reCAPTCHA.svg', '', 1, 2),
(14, 'SEO Adjustments', 'Search Engine Optimization (SEO) is the name given to all the work done to make websites perform better in search engines.', '/img/integrations/Seo settings.png', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kuponlar`
--

CREATE TABLE `kuponlar` (
  `id` int(11) NOT NULL,
  `kuponadi` varchar(255) NOT NULL,
  `adet` int(11) NOT NULL,
  `tutar` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kuponlar`
--

INSERT INTO `kuponlar` (`id`, `kuponadi`, `adet`, `tutar`) VALUES
(1, 'test', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kupon_kullananlar`
--

CREATE TABLE `kupon_kullananlar` (
  `id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `kuponadi` varchar(255) NOT NULL,
  `tutar` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kupon_kullananlar`
--

INSERT INTO `kupon_kullananlar` (`id`, `uye_id`, `kuponadi`, `tutar`) VALUES
(1, 27, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language_name` varchar(225) NOT NULL,
  `language_code` varchar(225) NOT NULL,
  `language_type` enum('2','1') NOT NULL DEFAULT '2',
  `default_language` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `language_code`, `language_type`, `default_language`) VALUES
(1, 'English', 'en', '2', '0'),
(2, 'Arabic (SA)', 'ar', '2', '0'),
(3, 'pt-BR', 'pt-BR', '2', '0'),
(4, 'TH', 'th', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tag` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `edit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `tag`, `status`, `public`, `edit`) VALUES
(2, 'API', 'api', 2, 2, 0),
(3, 'User Agreement', 'terms', 2, 2, 0),
(4, 'Frequently Asked Questions', 'faq', 2, 2, 0),
(5, 'Blog <span class=\"fa fa-info-circle\" data-toggle=\"tooltip\" data-placement=\"top\"></span>', 'blog', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `menu_line` double NOT NULL,
  `type` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '2',
  `slug` varchar(225) NOT NULL DEFAULT '2',
  `icon` varchar(225) DEFAULT NULL,
  `menu_status` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  `visible` enum('Internal','External') NOT NULL DEFAULT 'Internal',
  `active` varchar(225) NOT NULL,
  `tiptext` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `menu_line`, `type`, `slug`, `icon`, `menu_status`, `visible`, `active`, `tiptext`) VALUES
(2, 'New Order', 2, '2', '/', 'fas fa-cart-plus', '1', 'Internal', 'neworder', 'Shown only if Mass Order system enabled for use'),
(4, 'Refill', 5, '2', '/refill', 'fas fa-recycle', '1', 'Internal', 'refill', 'Shown only if user have at least one refill task'),
(5, 'Login', 2, '2', '/', 'fas fa-sign-in-alt', '1', 'External', 'login', ''),
(6, 'Services', 6, '2', '/services', 'fas fa-cogs', '1', 'Internal', 'services', ''),
(7, 'Add Funds', 7, '2', '/addfunds', 'fas fa-cogs', '1', 'Internal', 'addfunds', ''),
(9, 'Tickets ', 9, '2', '/tickets', 'fas fa-headset', '1', 'Internal', 'tickets', ''),
(8, 'Orders', 8, '2', '/orders', 'fas fa-cogs', '1', 'Internal', 'orders', ''),
(11, 'Refer & Earn', 8, '1', '/refer', 'fas fa-cogs', '1', 'Internal', 'refer', 'Shown only if affiliate system enabled for use'),
(15, 'Api', 4, '2', '/api', 'fas fa-code', '1', 'External', 'api', ''),
(18, 'Services', 5, '2', '/services', 'fas fa-list-alt', '1', 'External', 'terms', ''),
(45, 'terms', 13, '2', 'terms', 'fas fa-cogs', '1', 'Internal', 'terms', '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `ajax_name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `mod_sec` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `ajax_name`, `status`, `mod_sec`) VALUES
(1, 'Reference System', 'Existing users invite new users and receive commissions on all their payments. Users can request payment when they reach the minimum payment.', 'module_ref', 2, 1),
(2, 'Child panel', 'A panel with limited features that can only pull APIs from you. Users can order child panels from your panel.', 'module_child', 2, 1),
(3, 'Free Balance', 'One-time free automatic balance for newly registered members.', 'module_balance', 1, 1),
(4, 'Support System', 'The canned answers you enter in the headings you add are automatically sent to customers who create new support requests.', '', 2, 1),
(6, 'Guard', '24/7 Maximum security, limit all activities! 100% protection against attacks.', 'module_guard', 1, 2),
(7, 'Cache ', 'It is aimed to create a more efficient system that increases the site speed by reducing the resource consumption of the site.', 'module_cache', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_icon` varchar(225) NOT NULL,
  `news_title` varchar(225) NOT NULL,
  `news_content` varchar(225) NOT NULL,
  `news_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_icon`, `news_title`, `news_content`, `news_date`) VALUES
(1, 'yildiz', 'Welcome To Smmpanelscript.store', 'Welcome To Smmpanelscript.store Buy Smm Panel Script Now', '2023-12-24 13:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_popup`
--

CREATE TABLE `notifications_popup` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `action_link` text NOT NULL,
  `isAllPage` enum('0','1') NOT NULL DEFAULT '0',
  `isAllUser` enum('1','0') NOT NULL DEFAULT '0',
  `expiry_date` date NOT NULL,
  `status` enum('1','2','0') NOT NULL DEFAULT '1',
  `allPages` varchar(225) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `action_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `api_orderid` int(11) NOT NULL DEFAULT 0,
  `order_error` text NOT NULL,
  `order_detail` text NOT NULL,
  `order_api` int(11) NOT NULL DEFAULT 0,
  `api_serviceid` int(11) NOT NULL DEFAULT 0,
  `api_charge` double DEFAULT NULL,
  `api_currencycharge` double NOT NULL DEFAULT 1,
  `order_profit` double NOT NULL,
  `order_quantity` double NOT NULL,
  `order_extras` text NOT NULL,
  `order_charge` double DEFAULT NULL,
  `dripfeed` enum('1','2','3') DEFAULT '1' COMMENT '2 -> ON, 1 -> OFF',
  `dripfeed_id` double NOT NULL DEFAULT 0,
  `subscriptions_id` double NOT NULL DEFAULT 0,
  `subscriptions_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '2 -> ON, 1 -> OFF',
  `dripfeed_totalcharges` double DEFAULT NULL,
  `dripfeed_runs` double DEFAULT NULL,
  `dripfeed_delivery` double NOT NULL DEFAULT 0,
  `dripfeed_interval` double DEFAULT NULL,
  `dripfeed_totalquantity` double DEFAULT NULL,
  `dripfeed_status` enum('active','completed','canceled') NOT NULL DEFAULT 'active',
  `order_url` text NOT NULL,
  `order_start` double NOT NULL DEFAULT 0,
  `order_finish` double NOT NULL DEFAULT 0,
  `order_remains` double NOT NULL DEFAULT 0,
  `order_create` datetime NOT NULL,
  `order_status` enum('pending','inprogress','completed','partial','processing','canceled') NOT NULL DEFAULT 'pending',
  `subscriptions_status` enum('active','paused','completed','canceled','expired','limit') NOT NULL DEFAULT 'active',
  `subscriptions_username` text DEFAULT NULL,
  `subscriptions_posts` double DEFAULT NULL,
  `subscriptions_delivery` double NOT NULL DEFAULT 0,
  `subscriptions_delay` double DEFAULT NULL,
  `subscriptions_min` double DEFAULT NULL,
  `subscriptions_max` double DEFAULT NULL,
  `subscriptions_expiry` date DEFAULT NULL,
  `last_check` datetime NOT NULL,
  `order_where` enum('site','api') NOT NULL DEFAULT 'site'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(225) NOT NULL,
  `page_get` varchar(225) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_get`, `page_content`) VALUES
(1, 'Login', 'auth', ''),
(2, 'Services', 'services', ''),
(3, 'Frequently Asked Questions', 'faq', ''),
(4, 'Contracts', 'terms', '<p style=\"\" titillium=\"\" web\",=\"\" sans-serif;\"=\"\"><font color=\"#ff0000\">Read Terms of Service Carefully Before Registration and Order Services.&nbsp;</font></p><p style=\"\" titillium=\"\" web\",=\"\" sans-serif;\"=\"\"><font color=\"#efefef\">We guarantee that you will get the Services you pay for .We DO NOT guarantee 100% of our accounts will have a profile picture, full bio, and uploaded pictures, although we strive to make this the reality for all accounts.&nbsp;</font></p><p style=\"\" titillium=\"\" web\",=\"\" sans-serif;\"=\"\"><font color=\"#efefef\">fastsmmbrand&nbsp; Does Not guarantee full delivery within 24 hours. We make no guarantee for delivery time at all. We provide our best estimation for orders during the placing of orders. However, these are estimates. If you are selling on a website that requires time-sensitive results, use fastsmmbrand&nbsp; at your own risk. We will not be held responsible for loss of funds, negative reviews, or you being banned for late delivery.</font></p>'),
(5, 'New order', 'neworder', ''),
(6, 'Add Balance', 'addfunds', ''),
(7, 'Child panels', 'child-panels', ''),
(8, 'Support', 'tickets', ''),
(9, 'Invite Earn', 'affiliates', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_balance` double NOT NULL DEFAULT 0,
  `payment_amount` double NOT NULL,
  `papara_amount` double DEFAULT NULL,
  `payment_privatecode` double DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_status` enum('1','2','3') NOT NULL DEFAULT '1',
  `payment_delivery` enum('1','2') NOT NULL DEFAULT '1',
  `payment_note` text NOT NULL,
  `payment_mode` enum('Manuel','Otomatik') NOT NULL DEFAULT 'Otomatik',
  `payment_create_date` datetime NOT NULL,
  `payment_update_date` datetime NOT NULL,
  `payment_ip` varchar(225) NOT NULL,
  `payment_extra` text NOT NULL,
  `payment_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_bonus`
--

CREATE TABLE `payments_bonus` (
  `bonus_id` int(11) NOT NULL,
  `bonus_method` int(11) NOT NULL,
  `bonus_from` double NOT NULL,
  `bonus_amount` double NOT NULL,
  `bonus_type` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `method_name` varchar(225) NOT NULL,
  `method_get` varchar(225) NOT NULL,
  `method_min` double NOT NULL,
  `method_max` double NOT NULL,
  `method_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '2 -> ON, 1 -> OFF	',
  `method_extras` text NOT NULL,
  `method_line` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_name`, `method_get`, `method_min`, `method_max`, `method_type`, `method_extras`, `method_line`) VALUES
(1, 'Paytr', 'paytr', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Paytr\",\"min\":\"1\",\"max\":\"0\",\"merchant_id\":\"\",\"merchant_key\":\"\",\"merchant_salt\":\"\",\"fee\":\"0\"}', 15),
(2, 'Paytrhavale', 'paytr_havale', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Paytrhavale\",\"min\":\"1\",\"max\":\"0\",\"merchant_id\":\"\",\"merchant_key\":\"\",\"merchant_salt\":\"\",\"fee\":\"0\"}', 16),
(3, 'Paywant', 'paywant', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Paywant\",\"min\":\"1\",\"max\":\"0\",\"apiKey\":\"\",\"apiSecret\":\"\",\"fee\":\"0\",\"commissionType\":\"2\",\"payment_type\":[\"1\",\"2\",\"3\"]}', 17),
(4, 'Shopier', 'shopier', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Shopier\",\"min\":\"1\",\"max\":\"0\",\"apiKey\":\"bae6993a1afa477d8329ffb0c2ca9385\",\"apiSecret\":\"76aca9729205bd2231bf0098476c3e23\",\"website_index\":\"1\",\"processing_fee\":\"1\",\"fee\":\"0\"}', 18),
(5, 'Shoplemo', 'shoplemo', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Shoplemo\",\"min\":\"1\",\"max\":\"0\",\"apiKey\":\"\",\"apiSecret\":\"\",\"fee\":\"0\"}', 19),
(6, 'CoinPayments', 'coinpayments', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Coinpayments\",\"min\":\"1\",\"max\":\"0\",\"coinpayments_public_key\":\"b4d250001441c32daee41e40179e6804d9870c87ecdcfbba3d66bd2a419b993b\",\"coinpayments_private_key\":\"81828a4Ac33d289C6E645Fb97Af44ebB47b3e06876edE5922653a1C9eBB5071b\",\"coinpayments_currency\":\"BTC\",\"merchant_id\":\"3a735b6cc9c06a0cc0f62de3da3cfc1b\",\"ipn_secret\":\"a56864A1A94f093d5043aE0ac9E98ac371473390fd8eee639Ab382Ecf5bf4290\",\"fee\":\"5\"}', 10),
(7, 'Banka Ödemeleri', 'havale-eft', 0, 0, '1', '{\"method_type\":\"2\",\"name\":\"Bank manwal\"}', 23),
(9, '2checkout', '2checkout', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"2checkout\",\"min\":\"1\",\"max\":\"0\",\"seller_id\":\"\",\"private_key\":\"\",\"currency\":\"\",\"fee\":\"\"}', 21),
(10, 'CardLink', 'cardlink', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Card link\",\"min\":\"1\",\"max\":\"0\",\"shop_id\":\"oa2QqqX2Al\",\"private_key\":\"17538|P8t5gcN4OJENEQVlC89MfVFGNLWbdntBKUPv3Ll2\",\"currency\":\"$\",\"fee\":\"6\"}', 24),
(11, 'Paypal', 'paypal', 10, 100, '1', '{\"method_type\":\"1\",\"mode\":\"live\",\"name\":\"paypal\",\"min\":\"10\",\"max\":\"100\",\"clientId\":\"ASQvS22FvC_m2eOEw2dEgos9G_lWHrEiRYUWJxuM QdW4b2qxxRRhLv_J2c4nPNKyptIkjjct8wiGrk3p\",\"clientSecret\":\"EGKky_9FqO1HSjmfgLtxbv_tE9A34-Hx6slG5im2 EHjPDTZTgafIV7jD3O-IY3cHGccyWFvXjAulqpbA\",\"currency\":\"$\",\"fee\":\"10\"}', 11),
(12, 'PayTM', 'paytm', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Paytm\",\"min\":\"1\",\"max\":\"0\",\"merchant_key\":\"test\",\"merchant_mid\":\"test\",\"merchant_website\":\"test.com\",\"currency\":\"INR\",\"fee\":\"1\"}', 22),
(13, 'Weepay', 'weepay', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Weepay\",\"min\":\"1\",\"max\":\"0\",\"bayi_id\":\"\",\"api_key\":\"\",\"secret_key\":\"\",\"currency\":\"USD\",\"fee\":\"0\"}', 20),
(14, 'paytmqr', 'paytmqr', 5, 10000000000, '1', '{\"method_type\":\"2\",\"name\":\"Paytm QR\",\"min\":\"5\",\"max\":\"10000000000\",\"merchant_key\":\"\\/paytmqr.png\",\"merchant_mid\":\"LkNNZb77273566564791\",\"merchant_website\":\"https:\\/\\/smmpanelscript.store\",\"fee\":\"0\",\"content\":\"<p><span style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\">1) Scan QR Code below and enter Amount. (Min 5 INR)<\\/span><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><span style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\">2) Enter the 18 Digits Order ID below the QR Code.<\\/span><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><span style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\">Example of order id is \\\"2018072606124600\\\" and amount is \\\"50\\\" then click on pay. Without Space<\\/span><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><span style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\">Funds will be added automatically Instant<\\/span><br style=\\\"color: rgb(255, 255, 255); font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><font color=\\\"#ff0000\\\" style=\\\"font-family: Alexandria, -apple-system, BlinappacSystemFont, \\\"Segoe UI\\\", Roboto, Oxygen, Ubuntu, Cantarell, \\\"Open Sans\\\", \\\"Helvetica Neue\\\", sans-serif; font-size: 16px; background-color: rgb(23, 26, 33);\\\"><\\/font><\\/p><h3 style=\\\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 1.75rem;\\\"><b style=\\\"box-sizing: border-box; font-weight: bolder;\\\"><i style=\\\"box-sizing: border-box; background-color: rgb(255, 0, 0);\\\">Paytm and Phone Pe only<\\/i><\\/b><\\/h3>\"}', 3),
(16, 'LemonSqueezy', 'lemon', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Credit Card & Paypal\",\"min\":\"1\",\"max\":\"0\",\"merchant_id\":\"\",\"merchant_key\":\"\",\"merchant_salt\":\"\",\"fee\":\"0\"}', 13),
(17, '<b>FundsSystem</b>', 'funds', 1, 0, '1', '{}', 25),
(18, 'Perfect Money', 'perfectmoney', 1, 10000, '1', '{\"method_type\":\"2\",\"name\":\"Perfect Money - [ 3% Bonus From 50$ ]\",\"min\":\"1\",\"max\":\"10000\",\"passphrase\":\"Z42Rbx263TFzBDbQWAeFkzvwN\",\"usd\":\"U36155289\",\"merchant_website\":\"fastsmmbrand.in\",\"fee\":\"1\",\"content\":\"<p>We are do it<\\/p>\"}', 4),
(20, 'Opay', 'opay', 10, 1000, '1', '{\"method_type\":\"2\",\"is_demo\":\"0\",\"name\":\"opay.eg\",\"min\":\"10\",\"max\":\"1000\",\"merchant_id\":\"281822042386512\",\"secret_key\":\"OPAYPRV16506671920350.2433123985802288\",\"public_key\":\"OPAYPUB16506671920350.8432950392339029\",\"dollar_rate\":\"19.5\"}', 14),
(21, 'Custom', 'custom', 0, 0, '1', '{\"method_type\":\"2\",\"name\":\"Manual Payment\",\"content\":\"<blockquote><span style=\\\"background-color: rgb(255, 255, 0);\\\"><b><font color=\\\"#000000\\\"><span times=\\\"\\\" new=\\\"\\\" roman\\\";\\\"=\\\"\\\">Minimum 20$<\\/span><\\/font><\\/b><u style=\\\"font-family: inherit;\\\"><b><font color=\\\"#000000\\\">Send After Payment Contract By What\'Sapp And&nbsp; &nbsp;Create Ticket In Panel&nbsp;<\\/font><\\/b><\\/u><\\/span><\\/blockquote>\"}', 6),
(22, 'Webmoney', 'webmoney', 1, 0, '1', '{\"method_type\":\"2\",\"name\":\"Webmoney\",\"min\":\"1\",\"max\":\"0\",\"wmid\":\"434857272126\",\"purse\":\"Z426824862368\",\"secret_key\":\"E5076CDB-DEC7-4A8F-9A07-97FD15054367\",\"fee\":\"0\"}', 9),
(23, 'Kashier', 'kashier', 1, 1000, '1', '{\"method_type\":\"2\",\"is_demo\":\"0\",\"name\":\"Kashier EG\",\"min\":\"1\",\"max\":\"1000\",\"merchant_id\":\"MID-8448-188\",\"secret_key\":\"37b07c0e51757aeeebd7c62c5af3a2a4$ab069a3ab2fe45241d3ce117c2ef6e7a44ba3d656ab1f350abb562ee249724cd35373f62419dcda3baf6892383cb4a3c\",\"api_key\":\"ab5fda52-ca9f-4a34-bdac-8a17bb33dd04\",\"dollar_rate\":\"19\"}', 12),
(24, 'Coinbase', 'coinbase', 1, 1000000000, '1', '{\"method_type\":\"2\",\"name\":\" [Auto] \\ud835\\udc02\\ud835\\udc28\\ud835\\udc22\\ud835\\udc27\\ud835\\udc1b\\ud835\\udc1a\\ud835\\udc2c\\ud835\\udc1e \\u00bb  BTC - ETH - LTC - Doge - USDT \",\"min\":\"1\",\"max\":\"1000000000\",\"api_key\":\"95536558-a5b8-4b5b-8cad-6c46686c7637\",\"webhook_api\":\"5266f15f-8355-4f1b-b79a-9edf80d82d04\",\"fee\":\"3\"}', 5),
(26, 'Stripe', 'stripe', 1, 100, '1', '{\"method_type\":\"2\",\"name\":\"Stripe\",\"min\":\"1\",\"max\":\"100\",\"stripe_publishable_key\":\"pk_live_51JMykFSH4sLcQTY6GoEZCk6lBZiFLFFfE2HHoHibxAoUBlKpdKJnPM5HUI9eEX4v8reRpKtCoQlwWowS5ALsI22u00vd4GGZQ0\",\"stripe_secret_key\":\"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\",\"stripe_webhooks_secret\":\"we_1LJ2rYBGk2tB5CmIOX7uaako\",\"fee\":\"1\",\"currency\":\"USD\"}', 27),
(27, 'Thawani', 'thawani', 1, 0, '1', '{\"method_type\":\"2\",\"is_demo\":\"1\",\"name\":\"Thawani\",\"min\":\"1\",\"max\":\"0\",\"secret_key\":\"rRQ26GcsZzoEhbrP2HZvLYDbn9C9et\",\"publishable_key\":\"HGvTMLDssJghr9tlN9gr4DVYt0qyBy\",\"dollar_rate\":\"0.39\",\"fee\":\"2\"}', 28),
(28, 'Youcan', 'youcan', 1, 0, '1', '{\"method_type\":\"2\",\"is_demo\":\"0\",\"name\":\"Youcan\",\"min\":\"1\",\"max\":\"0\",\"private_key\":\"pri_e9e3cf81-d00f-4661-b326-5f2c8f48\",\"public_key\":\"pub_0a6a28f9-1035-4544-90a2-2da4d2f4\",\"fee\":\"1\"}', 29),
(29, 'Esewa', 'esewa', 0, 0, '1', '{\"method_type\":\"2\",\"is_demo\":\"1\",\"name\":\"Wallet\",\"min\":\"0.01\",\"max\":\"0\",\"merchant_id\":\"EPAYTEST\",\"fee\":\"3\",\"dollar_rate\":\"127\"}', 26),
(30, 'Khalti', 'khalti', 0, 0, '1', '{\"method_type\":\"2\",\"name\":\"Khalti\",\"min\":\"0.01\",\"max\":\"0\",\"public_key\":\"test_public_key_dc74e0fd57cb46cd93832aee0a390234\",\"secret_key\":\"test_secret_key_f59e8b7d18b4499ca40f68195a846e9b\",\"fee\":\"3\",\"dollar_rate\":\"80\"}', 30),
(31, 'flutterwave', 'flutterwave', 0, 10000, '1', '{\"method_type\":\"2\",\"name\":\"flutterwave\",\"min\":\"0\",\"max\":\"10000\",\"public_key\":\"FLWPUBK-c53243b0f6b11f1d471e9dcce98e1fb8-X\",\"currency\":\"NGN\"}', 33),
(33, 'Custom3', 'custom3', 0, 0, '1', '{\"method_type\":\"2\",\"name\":\"Manual 3 (panding)\",\"content\":\"<p>hi<\\/p><p><br><\\/p>\"}', 38),
(34, 'Custom2', 'custom2', 0, 0, '1', '{\"method_type\":\"2\",\"name\":\"Manual 2\",\"content\":\"\"}', 7),
(35, 'Mollie', 'mollie', 0.01, 0, '1', '{\"method_type\":\"2\",\"is_demo\":\"1\",\"name\":\"Mollie\",\"min\":\"0.01\",\"max\":\"0\",\"api_key\":\"test_f3w3ktzeyA7Eh5GkzV4k9mMCGxVNpp\",\"dollar_rate\":\"30\"}', 32),
(36, 'Mercadopago', 'mercadopago', 0.01, 0, '1', '{\"method_type\":\"2\",\"is_demo\":\"0\",\"name\":\"Mercadopago\",\"min\":\"0.01\",\"max\":\"0\",\"access_token\":\"APP_USR-7344438227461287-031422-e3093ed7958ed449f9c01e08aea27c63-235593165\",\"dollar_rate\":\"5.31\"}', 31),
(37, 'Pix automatico ', 'pix_auto', 1, 100000, '1', '{\"method_type\":\"2\",\"name\":\" PIX - Automatico\",\"min\":\"15\",\"max\":\"10000\",\"access_token\":\"APP_USR-5460231151312387-011122-63ba6dd213861cc3d5aa6c2e8354bfe7-1046872773\",\"fee\":\"0\"}', 37),
(99, 'payumoney', 'payumoney', 0, 10000, '1', '{\"method_type\":\"2\",\"name\":\"payumoney\",\"min\":\"0\",\"max\":\"10000\",\"merchant_key\":\"B6DBoS\",\"salt\":\"fRRSQ28zrxlqM7KmkcPc6ElidMvmr3uw\",\"fee\":\"0\",\"currency\":\"\"}', 8),
(116, 'Jazzcash', 'easypaisa', 1, 10000, '1', '{\"method_type\":\"2\",\"name\":\"EasyPaisa \",\"min\":\"1\",\"max\":\"10000\",\"email\":\"anisajuma1230@gmail.com\",\"pass\":\"wcolmujadtmcrhaj\"}', 36),
(207, 'Toyyibpay', 'toyyibpay', 10, 10000, '1', '{\"method_type\":\"2\",\"name\":\"Toyyibpay\",\"min\":\"10\",\"max\":\"10000\",\"secret_key\":\"1d6ef8we-bvw3-rss4-cpg0-4o31reg2p9j4\",\"category_code\":\"ecgipi68\",\"merchant_website\":\"\",\"fee\":\"\"}', 35),
(987, 'Gbprimepay', 'gbprimepay', 10, 10000, '1', '{\"method_type\":\"2\",\"name\":\"Gbprimepay\",\"min\":\"10\",\"max\":\"10000\",\"token\":\"nfu9igxPo8AiVpD4oOEs\\/3i+aoHTIpld+zegPTJZKXLS9QJH60zzUQk\\/2BuQiRwLDb9d8r+MvCNKD34KjIq37WwtAAHDSFZlDXkbJaT3h2ws94EoUYVNNfLK0I+Lh0zfDi6pq1O8FCZi+wmCrW7OBuuYLWY=\"}', 34),
(2012, 'payeer new', 'payeer', 1, 10000, '1', '{\"method_type\":\"2\",\"name\":\"Payeer USD || Auto Bonus %2 From $100 || Min $1\",\"min\":\"1\",\"max\":\"10000\",\"account\":\"\",\"client_secret\":\"1234\",\"user_id\":\"\",\"user_pass\":\"\",\"m_shop\":\"1820825016\",\"content\":\"<p><b style=\\\"background-color: rgb(255, 0, 0);\\\">Payeer Auto&nbsp;<\\/b><\\/p><p><b>Minimum<\\/b> 1$<\\/p><p><span style=\\\"font-weight: 700; background-color: rgb(27, 28, 32);\\\">Maximum 1000$<\\/span><\\/p>\"}', 2),
(2013, 'paymentv2', 'paymentv2', 0, 0, '2', '{\"method_type\":\"2\",\"name\":\"\\u0e1e\\u0e23\\u0e49\\u0e2d\\u0e21\\u0e40\\u0e1e\\u0e22\\u0e4c \\u0e41\\u0e25\\u0e30 \\u0e17\\u0e23\\u0e39\\u0e21\\u0e31\\u0e19\\u0e19\\u0e35\\u0e48\",\"ClientID\":\"ss2c3dlwasqu9ktj\",\"ClientSecret\":\"ukcx4cmeuvtusmc7czi7vwms1rz54v3l\",\"phoneangpao\":\"0617429296\",\"imageqrcode\":\"https://i.postimg.cc/TwgqXFVZ/496626897-676077848805243-2153607324048054954-n.jpg\",\"accbank\":\"0824790959\",\"content\":\"ระบบเติมเงินรองรับทรูมันนี่และพร้อมเพย์ทุกธนาคาร ไม่มีค่าธรรมเนียม\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proxy`
--

CREATE TABLE `proxy` (
  `id` int(11) NOT NULL,
  `user` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pass` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ip` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `port` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `refferal` int(11) NOT NULL,
  `action` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `register_date` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refill_status`
--

CREATE TABLE `refill_status` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `refill_apiid` int(11) DEFAULT NULL,
  `order_url` text NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `service_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `refill_status` mediumtext DEFAULT 'Pending',
  `order_apiid` int(11) DEFAULT 0,
  `refill_response` text DEFAULT NULL,
  `refill_where` enum('site','api') DEFAULT 'site'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_log`
--

CREATE TABLE `reset_log` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `token` varchar(225) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serviceapi_alert`
--

CREATE TABLE `serviceapi_alert` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `serviceapi_alert` text NOT NULL,
  `servicealert_extra` text NOT NULL,
  `servicealert_date` datetime NOT NULL,
  `operation` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_api` int(11) NOT NULL DEFAULT 0,
  `api_service` int(11) NOT NULL DEFAULT 0,
  `api_servicetype` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '2',
  `api_detail` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_line` double NOT NULL,
  `service_type` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '2',
  `service_package` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `service_name` text NOT NULL,
  `service_description` text NOT NULL,
  `service_price` double NOT NULL DEFAULT 0,
  `sync_price` int(11) NOT NULL,
  `sync_rate` int(11) NOT NULL,
  `service_min` double NOT NULL,
  `sync_min` int(11) NOT NULL,
  `service_max` double NOT NULL,
  `sync_max` int(11) NOT NULL,
  `service_dripfeed` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  `service_autotime` double NOT NULL DEFAULT 0,
  `service_autopost` double NOT NULL DEFAULT 0,
  `service_speed` enum('1','2','3','4') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `want_username` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  `service_secret` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '2',
  `price_type` enum('normal','percent','amount') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'normal',
  `price_cal` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `start_count` enum('none','instagram_follower','instagram_photo','') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `instagram_private` enum('1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name_lang` text NOT NULL,
  `description_lang` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cancel_type` int(11) NOT NULL DEFAULT 1,
  `refill_type` int(11) NOT NULL DEFAULT 1,
  `refill_time` int(11) NOT NULL,
  `sync_lastcheck` varchar(225) DEFAULT NULL,
  `provider_lastcheck` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_api`, `api_service`, `api_servicetype`, `api_detail`, `category_id`, `service_line`, `service_type`, `service_package`, `service_name`, `service_description`, `service_price`, `sync_price`, `sync_rate`, `service_min`, `sync_min`, `service_max`, `sync_max`, `service_dripfeed`, `service_autotime`, `service_autopost`, `service_speed`, `want_username`, `service_secret`, `price_type`, `price_cal`, `start_count`, `instagram_private`, `name_lang`, `description_lang`, `cancel_type`, `refill_type`, `refill_time`, `sync_lastcheck`, `provider_lastcheck`) VALUES
(6, 0, 0, '2', '', 7, 1, '2', '1', 'Youtube wachtime', '', 5, 0, 0, 10, 0, 100, 0, '1', 0, 0, '1', '1', '2', 'normal', '', 'none', '1', '{\"en\":\"Youtube wachtime\",\"ar\":\"\",\"pt-BR\":\"\"}', '{\"en\":\"\\u27053000 Views = 100 Hours Watch Time + 3-5% Likes\\r\\n\\u2705Min: 3 Minutes Video\\r\\n\\u2705Quality: 100% Real\\r\\n\\u2705Link: Video Link\\r\\n\\r\\n\\ud83d\\udd17Link: https:\\/\\/youtu.be\\/5C8984545\\r\\n\\ud83d\\udd17Link: https:\\/\\/www.youtube.com\\/watch?v=5C8984545\\r\\n\\r\\n\\u231b Start: 0 - 1HR\\r\\n\\u267b\\ufe0fRefill: Life Time \\/ No Drop\\r\\n\\r\\n\\u26a0Note:\\r\\n\\ud83d\\udcccPlease send screenshot if you claim order was not delivered.\\r\\n\\ud83d\\udcccCheck the link format carefully before placing the order.\\r\\n\\ud83d\\udcccWhen the service is busy, the starting speed of the operation changes.\\r\\n\\ud83d\\udcccDo not place a second order on the same link before your order is completed in the system.\",\"ar\":\"\",\"pt-BR\":\"\"}', 1, 1, 0, NULL, NULL),
(7, 0, 0, '2', '', 6, 1, '2', '1', 'Instagram Follower', '', 1, 0, 0, 100, 0, 10000, 0, '1', 0, 0, '1', '1', '2', 'normal', '', 'none', '1', '{\"en\":\"Instagram Follower\",\"ar\":\"\",\"pt-BR\":\"\"}', '{\"en\":\"\\u231b Start: 0-15min\\r\\n\\u26a1Speed: 10K\\/Day\\r\\n\\u267b\\ufe0fRefill: 365 Days Refill\\r\\n\\r\\n\\u26a0Note:\\r\\n\\ud83d\\udccc Check the link format carefully before placing the order.\\r\\n\\ud83d\\udd13 Kindly make sure your account is public, Not private.\\r\\n\\ud83d\\udccc When the service is busy, the starting speed of the operation changes.\\r\\n\\ud83d\\udccc Do not place a second order on the same link before your order is completed in the system.\",\"ar\":\"\",\"pt-BR\":\"\"}', 1, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_api`
--

CREATE TABLE `service_api` (
  `id` int(11) NOT NULL,
  `api_name` varchar(225) NOT NULL,
  `api_url` text NOT NULL,
  `api_key` varchar(225) NOT NULL,
  `api_type` int(11) NOT NULL,
  `api_limit` double NOT NULL DEFAULT 0,
  `api_alert` enum('1','2') NOT NULL DEFAULT '2' COMMENT '2 -> Gönder, 1 -> Gönderildi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_logo` text DEFAULT NULL,
  `site_name` text DEFAULT NULL,
  `site_title` text NOT NULL,
  `site_description` text NOT NULL,
  `site_keywords` text NOT NULL,
  `site_currency` text NOT NULL,
  `favicon` text DEFAULT NULL,
  `site_language` varchar(225) NOT NULL DEFAULT 'tr',
  `site_theme` text NOT NULL,
  `site_timezone` int(11) NOT NULL,
  `max_ticket` int(11) NOT NULL DEFAULT 2,
  `skype_area` enum('1','2') NOT NULL DEFAULT '1',
  `name_secret` enum('1','2') NOT NULL DEFAULT '1',
  `recaptcha` enum('1','2') NOT NULL DEFAULT '1',
  `recaptcha_key` text DEFAULT NULL,
  `recaptcha_secret` text DEFAULT NULL,
  `custom_header` text DEFAULT NULL,
  `custom_footer` text DEFAULT NULL,
  `ticket_system` enum('1','2') NOT NULL DEFAULT '2',
  `register_page` enum('1','2') NOT NULL DEFAULT '2',
  `terms_checkbox` int(11) NOT NULL DEFAULT 1,
  `service_speed` enum('1','2') NOT NULL DEFAULT '2',
  `service_list` enum('1','2') NOT NULL DEFAULT '2',
  `dolar_charge` double NOT NULL,
  `euro_charge` double NOT NULL,
  `smtp_user` text NOT NULL,
  `smtp_pass` text NOT NULL,
  `smtp_server` text NOT NULL,
  `smtp_port` varchar(225) NOT NULL,
  `smtp_protocol` enum('0','ssl','tls') NOT NULL,
  `alert_type` enum('1','2','3') NOT NULL,
  `alert_newmanuelservice` enum('1','2') NOT NULL,
  `alert_newticket` enum('1','2') NOT NULL,
  `alert_apibalance` enum('1','2') NOT NULL,
  `alert_newpayment` enum('1','2') NOT NULL,
  `alert_newbankpayment` enum('1','2') NOT NULL DEFAULT '1',
  `alert_serviceapialert` enum('1','2') NOT NULL,
  `alert_failorder` enum('1','2') NOT NULL,
  `admin_mail` varchar(225) NOT NULL,
  `resetpass_page` enum('1','2') NOT NULL,
  `resetpass_email` enum('1','2') NOT NULL,
  `site_maintenance` enum('1','2') NOT NULL DEFAULT '2',
  `site_frozen` int(11) NOT NULL DEFAULT 1,
  `sms_provider` varchar(225) NOT NULL,
  `sms_title` varchar(225) NOT NULL,
  `sms_user` varchar(225) NOT NULL,
  `sms_pass` varchar(225) NOT NULL,
  `admin_telephone` varchar(225) NOT NULL,
  `resetpass_sms` enum('1','2') NOT NULL,
  `panel_selling` int(11) NOT NULL,
  `panel_price` int(11) NOT NULL,
  `free_balance` int(11) NOT NULL,
  `free_amount` int(11) NOT NULL,
  `referral` enum('1','2') NOT NULL DEFAULT '1',
  `ref_bonus` int(11) NOT NULL,
  `ref_max` int(11) NOT NULL,
  `ref_type` enum('0','1') NOT NULL DEFAULT '0',
  `cache` int(11) NOT NULL,
  `cache_time` int(11) NOT NULL,
  `guard_system_status` int(11) NOT NULL,
  `guard_services_status` int(11) NOT NULL,
  `guard_services_type` int(11) NOT NULL,
  `guard_notify_status` int(11) NOT NULL,
  `guard_notify_type` int(11) NOT NULL,
  `guard_roles_status` int(11) NOT NULL,
  `guard_roles_type` int(11) NOT NULL,
  `guard_apikey_type` int(11) NOT NULL,
  `neworder_terms` int(11) NOT NULL,
  `guard_cron_system` int(11) NOT NULL DEFAULT 1,
  `secret_key` varchar(225) NOT NULL,
  `avarage` int(11) NOT NULL,
  `sms_verify` int(11) NOT NULL DEFAULT 1,
  `mail_verify` int(11) NOT NULL DEFAULT 1,
  `ser_sync` int(11) NOT NULL,
  `auto_refill` varchar(225) DEFAULT NULL,
  `fundstransfer_fees` varchar(10) NOT NULL,
  `panner_confirmation` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 -> ON, 2 -> NO',
  `banner_text_ar` text DEFAULT NULL,
  `banner_text_en` text DEFAULT NULL,
  `banner_url` text DEFAULT NULL,
  `notifacon_popup` enum('1','2') NOT NULL DEFAULT '1',
  `notifications_message` varchar(225) NOT NULL,
  `notifications_url` varchar(225) NOT NULL,
  `notifications_url_text` varchar(225) NOT NULL,
  `enable_transfer_funds` int(11) NOT NULL DEFAULT 1,
  `music_url` text DEFAULT NULL,
  `demo_mode` int(11) NOT NULL DEFAULT 0,
  `otp` int(111) NOT NULL,
  `google` int(111) NOT NULL,
  `gkey` longtext NOT NULL,
  `gsecret` longtext NOT NULL,
  `fake_order_service_enabled` int(111) NOT NULL,
  `fake_order_max` double NOT NULL,
  `min` double NOT NULL,
  `cr_onn` int(111) NOT NULL,
  `coupon_code` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_logo`, `site_name`, `site_title`, `site_description`, `site_keywords`, `site_currency`, `favicon`, `site_language`, `site_theme`, `site_timezone`, `max_ticket`, `skype_area`, `name_secret`, `recaptcha`, `recaptcha_key`, `recaptcha_secret`, `custom_header`, `custom_footer`, `ticket_system`, `register_page`, `terms_checkbox`, `service_speed`, `service_list`, `dolar_charge`, `euro_charge`, `smtp_user`, `smtp_pass`, `smtp_server`, `smtp_port`, `smtp_protocol`, `alert_type`, `alert_newmanuelservice`, `alert_newticket`, `alert_apibalance`, `alert_newpayment`, `alert_newbankpayment`, `alert_serviceapialert`, `alert_failorder`, `admin_mail`, `resetpass_page`, `resetpass_email`, `site_maintenance`, `site_frozen`, `sms_provider`, `sms_title`, `sms_user`, `sms_pass`, `admin_telephone`, `resetpass_sms`, `panel_selling`, `panel_price`, `free_balance`, `free_amount`, `referral`, `ref_bonus`, `ref_max`, `ref_type`, `cache`, `cache_time`, `guard_system_status`, `guard_services_status`, `guard_services_type`, `guard_notify_status`, `guard_notify_type`, `guard_roles_status`, `guard_roles_type`, `guard_apikey_type`, `neworder_terms`, `guard_cron_system`, `secret_key`, `avarage`, `sms_verify`, `mail_verify`, `ser_sync`, `auto_refill`, `fundstransfer_fees`, `panner_confirmation`, `banner_text_ar`, `banner_text_en`, `banner_url`, `notifacon_popup`, `notifications_message`, `notifications_url`, `notifications_url_text`, `enable_transfer_funds`, `music_url`, `demo_mode`, `otp`, `google`, `gkey`, `gsecret`, `fake_order_service_enabled`, `fake_order_max`, `min`, `cr_onn`, `coupon_code`) VALUES
(1, 'images/b55ec28c52d5f6205684a473a2193564.png', 'newlike', 'newlike', 'test newlike', 'newlike', '24', 'images/7aeed2e80f473370df40802ca57db2a540612fb0.png', 'th', 'Amazing', 14400, 1, '2', '2', '2', '6Le866QcAAAAAO5BquPPc0YLLTiJ7CNaEDX2cL5y', '6Le866QcAAAAAEpSeHwn41-ayfWwmAAvtJD1YuqZ', '', '', '2', '2', 2, '1', '2', 1, 1, 'no-reply@testv2.new-like.com', 'Newlike@112131', 'smtp.hostinger.com', '587', 'tls', '2', '2', '2', '2', '2', '2', '2', '2', 'admin@gmail.com', '2', '2', '2', 1, 'netgsm', '', 'admin', '', '', '1', 2, 6, 1, 10, '2', 10, 1, '0', 2, 1, 1, 1, 1, 1, 2, 1, 1, 2, 2, 1, '', 2, 1, 1, 1, '2', '1', '2', '', '', '', '', '', '', '', 2, '', 2, 1, 2, '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', '1022188795615-n2kig0fjoqkt4gfaq8k6kam00pevbiaj.apps.googleusercontent.com', 1, 3, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `task_type` varchar(225) DEFAULT NULL,
  `task_status` varchar(225) DEFAULT 'pending',
  `task_date` datetime DEFAULT NULL,
  `refill_orderid` varchar(225) DEFAULT NULL,
  `res` mediumtext NOT NULL,
  `check_refill_status` int(111) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `theme_name` text NOT NULL,
  `theme_dirname` text NOT NULL,
  `theme_extras` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_name`, `theme_dirname`, `theme_extras`) VALUES
(1, 'Amazing', 'Amazing', '{\"stylesheets\":[\"css/panel/azamzing/bootstrap.css\",\"css/panel/azamzing/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/azamzing/script.js\",\"js/main.js\",\"js/panel/azamzing/bootstrap.js\",\"js/panel/azamzing/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(2, 'smmgenie', 'smmgenie', '{\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/smmgenie/script.js\",\"js/main.js\",\"js/panel/smmgenie/bootstrap.js\",\"js/panel/smmgenie/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(3, 'cerulean', 'cerulean', '{\"stylesheets\":[\"css/panel/cerulean/bootstrap.css\",\"css/panel/cerulean/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/cerulean/script.js\",\"js/main.js\",\"js/panel/cerulean/bootstrap.js\",\"js/panel/cerulean/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(4, 'Simplify-Dark', 'Simplify-Dark', '{\"stylesheets\":[\"css/panel/Simplify-Dark/bootstrap.css\",\"css/panel/Simplify-Dark/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/Simplify-Dark/script.js\",\"js/main.js\",\"js/panel/Simplify-Dark/bootstrap.js\",\"js/panel/Simplify-Dark/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(5, 'ADCerulean', 'ADCerulean', '{\"stylesheets\":[\"css/panel/AD Cerulean/style.css\",\"css/panel/AD Cerulean/style2.css\",\"css/panel/AD Cerulean/bootstrap.css\",\"css/panel/AD Cerulean/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/AD Cerulean/script.js\",\"js/main.js\",\"js/panel/AD Cerulean/bootstrap.js\",\"js/panel/AD Cerulean/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(6, 'Clementine', 'Clementine', '{\"stylesheets\":[\"css/panel/Clementine/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/clementine/script.js\",\"js/main.js\",\"js/panel/clementine/bootstrap.js\",\"js/panel/clementine/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(7, 'Super-Rental', 'Super-Rental', '{\"stylesheets\":[\"css/panel/Super Rental/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/super rental/script.js\",\"js/main.js\",\"js/panel/super rental/bootstrap.js\",\"js/panel/super rental/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(8, 'Simplify', 'Simplify', '{\"stylesheets\":[\"css/panel/Simplify/bootstrap.css\",\"css/panel/Simplify/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/Simplify/script.js\",\"js/main.js\",\"js/panel/Simplify/bootstrap.js\",\"js/panel/Simplify/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(9, 'owlet', 'owlet', '{\"stylesheets\":[\"css/panel/owlet/style.css\",\"css/panel/owlet/style2.css\",\"css/panel/owlet/bootstrap.css\",\"css/panel/owlet/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/owlet/script.js\",\"js/main.js\",\"js/panel/owlet/bootstrap.js\",\"js/panel/owlet/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(10, 'yeti', 'yeti', '{\"stylesheets\":[\"css/panel/yeti/bootstrap.css\",\"css/panel/yeti/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/yeti/script.js\",\"js/main.js\",\"js/panel/yeti/bootstrap.js\",\"js/panel/yeti/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(11, 'smmfollow', 'smmfollow', '{\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/smmfollows/script.js\",\"js/main.js\",\"js/panel/smmfollows/bootstrap.js\",\"js/panel/smmfollows/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(12, 'Amazing Dark', 'Amazing-Dark', '{\"stylesheets\":[\"css/panel/Amazingsmm Dark/bootstrap.css\",\"css/panel/Amazingsmm Dark/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/azamzing/script.js\",\"js/main.js\",\"js/panel/azamzing/bootstrap.js\",\"js/panel/azamzing/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(13, 'sfg', 'sfg', '{\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/smmgenie/script.js\",\"js/main.js\",\"js/panel/smmgenie/bootstrap.js\",\"js/panel/smmgenie/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(14, 'SMMZONI', 'SMMZONI', '{\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/SMMZONI/script.js\",\"js/main.js\",\"js/panel/SMMZONI/bootstrap.js\",\"js/panel/SMMZONI/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(15, 'Simplify-Blue\r\n', 'Simplify-Blue', '{\"stylesheets\":[\"css/panel/Simplify-Blue/bootstrap.css\",\"css/panel/Simplify-Blue/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/Simplify-Blue/script.js\",\"js/main.js\",\"js/panel/Simplify-Blue/bootstrap.js\",\"js/panel/Simplify-Blue/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(17, 'Enternity-Black', 'Enternity-Black', '{\"stylesheets\":[\"css/panel/Enternity-Black/bootstrap.css\",\"css/panel/Enternity-Black/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/Simplify/script.js\",\"js/main.js\",\"js/panel/Simplify/bootstrap.js\",\"js/panel/Simplify/main.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(26, 'Nice', 'nice', '{\"stylesheets\":[\"css/panel/nice/bootstrap.css\",\"css/panel/nice/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/nice/script.js\",\"js/panel/nice/main.js?n=545658\",\"js/panel/nice/bootstrap.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}\n'),
(28, 'united', 'united', '{\"stylesheets\":[\"css/panel/united/bootstrap.css\",\"css/panel/united/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/united/script.js\",\"js/main.js\",\"js/panel/united/bootstrap.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}'),
(29, 'smmspot', 'smmspot', '{\"stylesheets\":[\"css/panel/smmspot/bootstrap.css\",\"css/panel/smmspot/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/smmspot/script.js\",\"js/panel/smmspot/main.js?n=545658\",\"js/panel/smmspot/bootstrap.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}\n'),
(30, '1xpanel', '1xpanel', '{\"stylesheets\":[\"css/panel/1xpanel/bootstrap.css\",\"css/panel/1xpanel/style.css\",\"js\\/datepicker\\/css\\/bootstrap-datepicker3.min.css\",\"https:\\/\\/cdn.mypanel.link\\/css\\/font-awesome\\/css\\/all.min.css\"],\"scripts\":[\"https:\\/\\/cdnjs.cloudflare.com\\/ajax\\/libs\\/jquery\\/1.12.4\\/jquery.min.js\",\"js/panel/1xpanel/script.js\",\"js/panel/1xpanel/main.js?n=545658\",\"js/panel/1xpanel/bootstrap.js\",\"js\\/datepicker\\/js\\/bootstrap-datepicker.min.js\",\"js\\/datepicker\\/locales\\/bootstrap-datepicker.tr.min.js\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `time` datetime NOT NULL,
  `lastupdate_time` datetime NOT NULL,
  `client_new` enum('1','2') NOT NULL DEFAULT '2',
  `status` enum('pending','answered','closed') NOT NULL DEFAULT 'pending',
  `support_new` enum('1','2') NOT NULL DEFAULT '1',
  `canmessage` enum('1','2') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply`
--

CREATE TABLE `ticket_reply` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `support_team` varchar(225) NOT NULL,
  `time` datetime NOT NULL,
  `support` enum('1','2') NOT NULL DEFAULT '1',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_subjects`
--

CREATE TABLE `ticket_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `content` text DEFAULT NULL,
  `auto_reply` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ticket_subjects`
--

INSERT INTO `ticket_subjects` (`subject_id`, `subject`, `content`, `auto_reply`) VALUES
(1, 'Order', '', '0'),
(2, 'Payment', '', '0'),
(3, 'Other', '', '0'),
(4, 'Refill', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `verify_log`
--

CREATE TABLE `verify_log` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `token` varchar(225) NOT NULL,
  `type` int(11) NOT NULL,
  `verify` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `child_panels`
--
ALTER TABLE `child_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `clients_category`
--
ALTER TABLE `clients_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_price`
--
ALTER TABLE `clients_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_service`
--
ALTER TABLE `clients_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_report`
--
ALTER TABLE `client_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decoration`
--
ALTER TABLE `decoration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard_log`
--
ALTER TABLE `guard_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `integrations`
--
ALTER TABLE `integrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuponlar`
--
ALTER TABLE `kuponlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kupon_kullananlar`
--
ALTER TABLE `kupon_kullananlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_popup`
--
ALTER TABLE `notifications_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `api_orderid` (`api_orderid`),
  ADD KEY `order_api` (`order_api`),
  ADD KEY `api_serviceid` (`api_serviceid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `page_id` (`page_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `payment_privatecode` (`payment_privatecode`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `client_balance` (`client_balance`),
  ADD KEY `payment_amount` (`payment_amount`),
  ADD KEY `payment_method` (`payment_method`),
  ADD KEY `payment_status` (`payment_status`);

--
-- Indexes for table `payments_bonus`
--
ALTER TABLE `payments_bonus`
  ADD PRIMARY KEY (`bonus_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proxy`
--
ALTER TABLE `proxy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refill_status`
--
ALTER TABLE `refill_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_log`
--
ALTER TABLE `reset_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `serviceapi_alert`
--
ALTER TABLE `serviceapi_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_api`
--
ALTER TABLE `service_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_subjects`
--
ALTER TABLE `ticket_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `verify_log`
--
ALTER TABLE `verify_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `child_panels`
--
ALTER TABLE `child_panels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `clients_category`
--
ALTER TABLE `clients_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients_price`
--
ALTER TABLE `clients_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients_service`
--
ALTER TABLE `clients_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_report`
--
ALTER TABLE `client_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `decoration`
--
ALTER TABLE `decoration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guard_log`
--
ALTER TABLE `guard_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integrations`
--
ALTER TABLE `integrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kuponlar`
--
ALTER TABLE `kuponlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kupon_kullananlar`
--
ALTER TABLE `kupon_kullananlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications_popup`
--
ALTER TABLE `notifications_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments_bonus`
--
ALTER TABLE `payments_bonus`
  MODIFY `bonus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2014;

--
-- AUTO_INCREMENT for table `proxy`
--
ALTER TABLE `proxy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refill_status`
--
ALTER TABLE `refill_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_log`
--
ALTER TABLE `reset_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serviceapi_alert`
--
ALTER TABLE `serviceapi_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_api`
--
ALTER TABLE `service_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_subjects`
--
ALTER TABLE `ticket_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `verify_log`
--
ALTER TABLE `verify_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
