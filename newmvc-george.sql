-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 09:50 AM
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
-- Database: `project-george-solanki`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL,
  `user` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(56) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `password`, `email`, `status`) VALUES
(2, 'mansi', 'mansi', 'mansi29@gmail.com', 1),
(3, 'priya', 'priya22', 'priya123@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `customer_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `shipping_amount` decimal(10,2) NOT NULL,
  `tax_percentage` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `shipping_id`, `shipping_amount`, `tax_percentage`, `created_at`) VALUES
(3, 7, '300.00', 0, '2023-03-15 14:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `product_id` int(4) NOT NULL,
  `cart_item_id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`product_id`, `cart_item_id`, `cost`, `price`, `quantity`) VALUES
(1, 1, '17000.00', '16000.00', 1),
(10, 2, '16000.00', '12000.00', 2),
(11, 3, '19000.00', '17000.00', 1),
(0, 6, '0.00', '0.00', 0),
(0, 7, '0.00', '0.00', 0),
(0, 8, '0.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('AVAILABLE','INAVAILABLE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `name`, `description`, `status`) VALUES
(1, 0, 'laptop', ' the_good_laptop', 'INAVAILABLE'),
(3, 0, 'dell', ' the_good_laptop', 'INAVAILABLE'),
(4, 1, 'sony', ' the_good_laptop', 'INAVAILABLE'),
(5, 4, 'xperia', 'the_good_phone', 'AVAILABLE'),
(6, 1, 'samsung', ' the_good_laptop', 'INAVAILABLE'),
(7, 0, 'mobile', 'the_good_mobile', 'INAVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `status` enum('AVAILABLE','INAVAILABLE') NOT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'george', 'solanki', '222geo@gmail.com', '9949899273', 'male', 'AVAILABLE', NULL, NULL),
(2, 'priyanka', 'solanki', '231priyanka@gmail.com', '9978696532', 'male', 'INAVAILABLE', NULL, NULL),
(3, 'mansi', 'patel', 'www.123mansi@gmail.com', '7765724389', 'female', 'INAVAILABLE', NULL, NULL),
(6, 'GEORGE', 'solanki', '222geo@gmail.com', '09949899273', 'male', 'AVAILABLE', NULL, NULL),
(8, 'GEORGE', 'solanki', '222geo@gmail.com', '09949899273', 'male', 'AVAILABLE', NULL, '2023-02-15 09:29:47'),
(9, 'GEORGE', 'solanki', '222geo@gmail.com', '09949899273', 'male', 'AVAILABLE', NULL, NULL),
(11, 'priya', 'patel', 'www.123priya@gmail.com', '07765724389', 'FEMALE', 'INAVAILABLE', '2023-02-15 09:12:59', '2023-02-21 10:12:11'),
(12, 'priya', 'patel', 'www.123priya@gmail.com', '07765724389', 'FEMALE', 'AVAILABLE', '2023-02-21 09:44:44', NULL),
(13, 'mansi', 'patel', 'www.123mansi@gmail.com', '07765724389', 'FEMALE', 'AVAILABLE', '2023-02-21 09:47:13', NULL),
(14, 'bhavyansi', 'patel', 'www.123bhavansii@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '2023-03-13 08:35:48', '2023-03-13 08:44:42'),
(15, 'mansibhananiwsd', 'patel', 'www.123mansi@gmail.com', '07765724389', '', 'AVAILABLE', '2023-03-22 09:09:44', NULL),
(16, 'mansibhananiwsd', 'patel', 'www.123mansi@gmail.com', '07765724389', '', 'AVAILABLE', '2023-03-22 09:10:05', NULL),
(17, 'mansibhananiwsd', 'patel', 'www.123mansi@gmail.com', '07765724389', '', 'AVAILABLE', '2023-03-22 09:10:33', NULL),
(18, 'mansibhananiwsd', 'patel', 'www.123mansi@gmail.com', '07765724389', '', 'AVAILABLE', '2023-03-22 09:11:43', NULL),
(19, 'mehulcxza', 'desai', 'www.21mehul@gmail.com', '09999786590', 'FEMALE', 'AVAILABLE', '2023-03-22 09:12:06', '2023-03-23 05:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` int(16) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_id`, `address`, `city`, `zipcode`, `state`, `country`) VALUES
(11, '4-greenland-park,ramtalavadi', 'nadiad', 387002, 'gujarat', 'India'),
(19, '5-bethelstreetsza', 'nadiad', 387002, 'gujarat', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `eav_attribute`
--

CREATE TABLE `eav_attribute` (
  `attribute_id` int(11) NOT NULL,
  `entity_type_id` int(8) NOT NULL,
  `code` int(4) NOT NULL,
  `backend_type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `backend_model` varchar(20) NOT NULL,
  `input_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eav_attribute`
--

INSERT INTO `eav_attribute` (`attribute_id`, `entity_type_id`, `code`, `backend_type`, `name`, `status`, `backend_model`, `input_type`) VALUES
(1, 1, 0, 'good', 'laptop', 1, 'good', '1');

-- --------------------------------------------------------

--
-- Table structure for table `eav_attribute_option`
--

CREATE TABLE `eav_attribute_option` (
  `option_id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eav_attribute_option`
--

INSERT INTO `eav_attribute_option` (`option_id`, `name`, `attribute_id`, `position`) VALUES
(1, 'red', 1, '1'),
(2, 'blue', 1, '1'),
(3, 'black', 1, '1'),
(4, 'white', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `entity_type`
--

CREATE TABLE `entity_type` (
  `entity_type_id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `entity_type_model` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_type`
--

INSERT INTO `entity_type` (`entity_type_id`, `name`, `entity_type_model`) VALUES
(1, 'product', ''),
(2, 'category', ''),
(3, 'customer', ''),
(4, 'vender', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `product_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('AVAILABLE','INAVAILABLE') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `base` tinyint(255) NOT NULL,
  `thumb` tinyint(2) NOT NULL,
  `small` tinyint(2) NOT NULL,
  `gallary` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`product_id`, `media_id`, `name`, `image`, `status`, `created_at`, `base`, `thumb`, `small`, `gallary`) VALUES
(1, 6, 'laptop', 'images/6.png', 'AVAILABLE', '2023-02-16 09:16:45', 1, 0, 0, 1),
(1, 7, 'laptop', 'images/7.png', 'AVAILABLE', '2023-02-16 09:50:28', 0, 0, 0, 1),
(1, 8, 'laptop', 'images8.png', 'INAVAILABLE', '2023-01-03 06:17:46', 0, 0, 0, 1),
(1, 9, 'Screenshot 2023-02-16 093228.png', '9.', 'INAVAILABLE', '2023-03-25 12:25:55', 0, 0, 0, 0),
(1, 10, 'Screenshot 2023-02-16 093325.png', NULL, 'INAVAILABLE', '2023-03-25 12:37:29', 0, 0, 0, 0),
(1, 11, 'Screenshot 2023-02-16 093054.png', '11.png', 'AVAILABLE', '2023-03-25 12:40:04', 0, 0, 0, 0),
(1, 12, 'Screenshot 2023-02-16 093032.png', '12.png', 'AVAILABLE', '2023-03-25 12:46:42', 0, 0, 0, 0),
(1, 13, 'Screenshot 2023-02-16 093032.png', '13.png', 'AVAILABLE', '2023-03-25 12:47:47', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('''AVAILABLE''','''INAVAILABLE''','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `name`, `status`) VALUES
(1, 'PAY_TM', ''),
(2, 'GPAY', ''),
(4, 'GPAY', ''),
(7, 'GTNew', ''),
(9, 'tg', ''),
(17, 'newGpay', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(11) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(6) NOT NULL DEFAULT 100,
  `status` enum('AVAILABLE','INAVAILABLE') NOT NULL,
  `discription` varchar(255) NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `sku`, `cost`, `price`, `quantity`, `status`, `discription`, `inserted_at`, `updated_at`) VALUES
(1, 'sonyi3', '3452', '17000.00', '16000.00', 120, 'AVAILABLE', 'the_good_mobile', '2023-02-09 13:46:08', '2023-03-27 11:11:32'),
(2, 'inspiron1060', '1234', '19000.00', '17000.00', 120, 'AVAILABLE', 'the_good_laptop', '2023-02-09 14:03:43', '2023-02-09 14:03:43'),
(3, 'lenovox3', '1234', '60000.00', '50000.00', 80, 'AVAILABLE', 'the_good_laptop', '2023-02-09 14:05:38', '2023-02-09 14:05:38'),
(4, 'hp360', '1234', '60000.00', '50000.00', 90, 'AVAILABLE', 'the_good_laptop', '2023-02-09 14:06:55', '2023-02-09 14:06:55'),
(8, 'nokia110', '1111', '60000.00', '50000.00', 100, 'AVAILABLE', 'the_good_laptop', '2023-02-09 14:19:06', '2023-02-09 14:19:06'),
(10, 'hpxi3', '1111', '16000.00', '12000.00', 88, 'INAVAILABLE', 'The_good_mobile', '2023-02-20 10:50:04', '2023-02-20 15:20:04'),
(11, 'delly', '1111', '19000.00', '17000.00', 99, 'AVAILABLE', 'the_very_laptop', '2023-03-11 15:30:59', '2023-03-11 15:30:59'),
(12, 'dellp', '1004', '1800.00', '1600.00', 80, 'AVAILABLE', 'the_good_desktop', '2023-03-16 13:40:45', '2023-03-19 06:52:33'),
(15, 'dellup', '1290', '32000.00', '29000.00', 100, 'INAVAILABLE', 'the_good_desktop', '2023-03-16 13:51:05', '2023-03-23 04:24:19'),
(17, 'nokia22', '1902', '1200.00', '1100.00', 70, 'INAVAILABLE', 'the_good_mobile', '2023-03-16 13:55:46', '2023-03-16 18:25:46'),
(18, 'nokia223', '1091', '1600.00', '1500.00', 80, 'AVAILABLE', 'the_good_mobile', '2023-03-16 13:57:56', '2023-03-16 18:27:56'),
(19, 'mi5', '1981', '1900.00', '1700.00', 88, 'AVAILABLE', 'the_good_mobile', '2023-03-16 13:59:11', '2023-03-16 18:29:11'),
(81, 'dellnew', '1798', '6000.00', '5000.00', 20, 'AVAILABLE', 'new_all', '2023-04-01 12:18:10', '2023-04-01 15:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_int`
--

CREATE TABLE `product_int` (
  `value_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `salesman_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `status` enum('AVAILABLE','INAVAILABLE') NOT NULL,
  `company` varchar(55) NOT NULL,
  `insertd_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`salesman_id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `status`, `company`, `insertd_at`, `updated_at`) VALUES
(1, 'mansi', 'patels', 'www.123mansi@gmail.com', '7765724389', 'FEMALE', 'INAVAILABLE', 'foxmula', NULL, '2023-03-19 09:58:47'),
(2, 'george', 'solanki', '222geo@gmail.com', '9949899273', 'MALE', 'AVAILABLE', 'de-mart', NULL, NULL),
(4, 'mansi', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', 'foxmula', NULL, NULL),
(5, 'priyanka', 'solanki', '231priyanka@gmail.com', '09978696532', 'MALE', 'AVAILABLE', 'foxmula', NULL, NULL),
(8, 'GEORGE', 'solanki', '222geo@gmail.com', '09949899273', 'MALE', 'INAVAILABLE', 'foxmula', '2023-02-14 10:14:24', '2023-02-14 10:25:43'),
(9, 'GEORGE', 'solanki', '222geo@gmail.com', '09949899273', 'MALE', 'INAVAILABLE', 'de-mart', '2023-02-14 10:14:58', '2023-03-23 01:16:25'),
(10, 'mansix', 'patel', 'www.123mansi@gmail.com', '07765724389', 'FEMALE', 'INAVAILABLE', 'foxmula', '2023-02-22 06:33:03', '2023-03-19 09:59:51'),
(11, 'bhavyansi', 'patel', 'www.123bhavansii@gmail.com', '07765724389', 'MALE', 'AVAILABLE', 'foxmula', NULL, '2023-03-13 08:56:27'),
(12, 'mansi', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', '2023-03-22 06:56:10', NULL),
(13, 'mansi', 'patelnew', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', '2023-03-22 06:56:52', '2023-04-02 19:12:11'),
(15, 'mehulcxzaupdate2', 'desaiup', 'www.21mehul@gmail.com', '09999786590', 'MALE', 'AVAILABLE', '', '2023-03-23 01:16:44', '2023-03-23 06:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `salesman_address`
--

CREATE TABLE `salesman_address` (
  `salesman_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman_address`
--

INSERT INTO `salesman_address` (`salesman_id`, `address`, `city`, `zipcode`, `state`, `country`) VALUES
(9, '5-bethelstreet,missionroad', 'nadiad', '387002', 'gujrat', 'India'),
(13, '5-bethelstreet,missionroad', 'nadiadnew', '387002', 'gujarat', 'India'),
(15, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `salesman_price`
--

CREATE TABLE `salesman_price` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `s.price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman_price`
--

INSERT INTO `salesman_price` (`product_id`, `name`, `sku`, `cost`, `price`, `s.price`) VALUES
(1, 'sonyi3', '', '170000', '16000', '15500'),
(2, 'inspiron1060', '1234', '19000', '17000', '16500'),
(3, 'lenovox3', '1122', '60000', '50000', '49500');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `name`, `amount`, `status`, `price`) VALUES
(2, 'transportion', '200', 'AVAILABLE', 0),
(7, 'gold', '300', '\'AVAILABLE\'', 300),
(8, 'silver', '200', '\'AVAILABLE\'', 200),
(9, 'copper', '100', '\'AVAILABLE\'', 100),
(10, 'PLATINUM', '400', 'INAVAILABLE', 0),
(11, 'bronges', '400', 'INAVAILABLE', 0),
(29, 'brongnew', '600', 'INAVAILABLE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `status` enum('AVAILABLE','INAVAILABLE') NOT NULL,
  `company` varchar(255) NOT NULL,
  `inserted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `status`, `company`, `inserted_at`, `updated_at`) VALUES
(1, 'george', 'solanki', '222geo@gmail.com', '9949899273', 'MALE', 'AVAILABLE', 'de-mart', '0000-00-00 00:00:00', NULL),
(2, 'mansi', 'patel', 'www.123mansi@gmail.com', '7765724389', 'FEMALE', 'AVAILABLE', 'foxmula', '0000-00-00 00:00:00', NULL),
(3, 'priyanka', 'solanki', '231priyanka@gmail.com', '9978696532', 'FEMALE', 'AVAILABLE', 'foxmula', '2023-02-14 05:02:37', NULL),
(5, 'priyanka', 'solanki', '231priyanka@gmail.com', '09978696532', 'FEMALE', 'AVAILABLE', 'foxmula', '2023-02-14 09:03:54', '2023-02-15 09:47:34'),
(6, 'mansibhanani', 'patel', 'www.123mansi@gmail.com', '07765724389', 'FEMALE', 'AVAILABLE', '', NULL, NULL),
(7, 'mansibhananiwith', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', NULL, NULL),
(8, 'mansibhanani', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', NULL, NULL),
(9, 'mansibhanani', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', NULL, NULL),
(10, 'mansibhanani', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', NULL, NULL),
(11, 'mansibhanani', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', NULL, NULL),
(13, 'mansibhananiup', 'patel', 'www.123mansi@gmail.com', '07765724389', 'FEMALE', 'AVAILABLE', 'foxmula', NULL, '2023-03-23 06:32:25'),
(14, 'mansibhananiwith2', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', '2023-03-23 06:22:55', NULL),
(15, 'mansibhananiwith2', 'patel', 'www.123mansi@gmail.com', '07765724389', 'MALE', 'AVAILABLE', '', '2023-03-23 06:23:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_address`
--

CREATE TABLE `vendor_address` (
  `vendor_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_address`
--

INSERT INTO `vendor_address` (`vendor_id`, `address`, `city`, `zipcode`, `state`, `country`) VALUES
(5, '4-greenland-park', 'nadiad', '387002', 'gujarat', 'India'),
(11, '', '', '', '', ''),
(12, '', '', '', '', ''),
(13, '', '', '', '', ''),
(15, '4-greenland-park,ramtalavadi', 'nadiadx', '387002', 'gujarat', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `entity_type`
--
ALTER TABLE `entity_type`
  ADD PRIMARY KEY (`entity_type_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_int`
--
ALTER TABLE `product_int`
  ADD KEY `entity_id` (`entity_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`salesman_id`);

--
-- Indexes for table `salesman_address`
--
ALTER TABLE `salesman_address`
  ADD KEY `salesman_id` (`salesman_id`);

--
-- Indexes for table `salesman_price`
--
ALTER TABLE `salesman_price`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `eav_attribute`
--
ALTER TABLE `eav_attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entity_type`
--
ALTER TABLE `entity_type`
  MODIFY `entity_type_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `salesman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eav_attribute_option`
--
ALTER TABLE `eav_attribute_option`
  ADD CONSTRAINT `eav_attribute_option_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `eav_attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesman_address`
--
ALTER TABLE `salesman_address`
  ADD CONSTRAINT `salesman_address_ibfk_1` FOREIGN KEY (`salesman_id`) REFERENCES `salesman` (`salesman_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesman_price`
--
ALTER TABLE `salesman_price`
  ADD CONSTRAINT `salesman_price_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
