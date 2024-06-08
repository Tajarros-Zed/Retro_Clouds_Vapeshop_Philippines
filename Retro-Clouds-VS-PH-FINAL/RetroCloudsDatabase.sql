-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 07:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retro`
--
CREATE DATABASE IF NOT EXISTS `retro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `retro`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_type`, `email_address`, `password`) VALUES
(1, 'IT', 'mark@gmail.com', 'tamayo'),
(2, 'IT', 'udi@gmail.com', 'orina'),
(3, 'IT', 'james@gmail.com', 'salgado'),
(4, 'IT', 'tin@gmail.com', 'dorado'),
(5, 'IT', 'zed@gmail.com', 'tajarros'),
(6, 'ENTERPRISE', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'AEROGIN'),
(2, 'BLACK ELITE'),
(3, 'CHILLAX'),
(4, 'CUSHTY JUICE'),
(5, 'DR VAPES'),
(6, 'EAST COAST'),
(7, 'ELFBAR'),
(8, 'FRANK AND ATTICUS'),
(9, 'GEEKVAPE'),
(10, 'HOPO'),
(11, 'INDIGO'),
(12, 'INSTABAR'),
(13, 'IQ'),
(14, 'KILO REVIVAL'),
(15, 'LXV'),
(16, 'MEMORY LANE'),
(17, 'NASTY'),
(18, 'NEVOKS'),
(19, 'PACHA MAMA'),
(20, 'RELX'),
(21, 'SADBOY'),
(22, 'SAIKO'),
(23, 'SHFT'),
(24, 'SMOK'),
(25, 'SMPO'),
(26, 'SNOWPLUS'),
(27, 'SUCH AS LIFE'),
(28, 'THE DAILY GRIND'),
(29, 'THIRSTY JUICE CO'),
(30, 'VEEHOO');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `cart_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `customer_id`, `product_id`, `product_quantity`, `cart_date`) VALUES
(37, 23, 56, 1, '2024-06-06 00:54:30'),
(38, 2, 29, 1, '2024-06-06 01:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Disposable Vape'),
(2, 'Juice'),
(3, 'Pod Kit');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `costumer_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`costumer_id`, `fname`, `lname`, `birthday`, `address`, `email`, `password`, `contact_num`, `account_status`, `reg_date`) VALUES
(1, 'Juan', 'Dela Cruz', '2000-10-18', '123 Taft Avenue, Manila', 'juan.delacruz@example.com', '$2y$10$/dSBfhtkagiB8iBsfff0oOFGA5RBtc8.W5N0PsLPGsI9kdVGyKflW', '09123456789', 'PENDING', '2024-05-30 17:32:12'),
(2, 'Maria', 'Santos', '1944-11-16', '456 Katipunan St., Quezon City', 'maria.santos@example.com', 'password456', '09234567890', 'PENDING', '2024-05-30 17:32:12'),
(3, 'Pedro', 'Gonzales', '1979-07-28', '789 Rizal St., Davao City', 'pedro.gonzales@example.com', 'password789', '09345678901', 'PENDING', '2024-05-30 17:32:12'),
(4, 'Luz', 'Reyes', '1938-10-15', '321 EDSA, Mandaluyong City', 'luz.reyes@example.com', 'passwordabc', '09456789012', 'PENDING', '2024-05-30 17:32:12'),
(5, 'Miguel', 'Torres', '1930-10-21', '654 Roxas Blvd., Pasay City', 'miguel.torres@example.com', 'passworddef', '09567890123', 'PENDING', '2024-05-30 17:32:12'),
(6, 'Carmen', 'Lopez', '2001-03-23', '987 Makati Ave., Makati City', 'carmen.lopez@example.com', 'passwordghi', '09678901234', 'PENDING', '2024-05-30 17:32:12'),
(7, 'Jose', 'Ramos', '1949-04-12', '1355 Ortigas Ave., Pasig City', 'jose.ramos@example.com', 'passwordjkl', '09789012345', 'PENDING', '2024-05-30 17:32:12'),
(8, 'Ana', 'Garcia', '1982-04-20', '246 Ayala St., Cebu City', 'ana.garcia@example.com', 'passwordmno', '09890123456', 'PENDING', '2024-05-30 17:32:12'),
(9, 'Ramon', 'Fernandez', '1939-03-27', '357 Bonifacio St., Baguio City', 'ramon.fernandez@example.com', 'passwordpqr', '09901234567', 'PENDING', '2024-05-30 17:32:12'),
(10, 'Sofia', 'Martinez', '1924-10-31', '468 Magsaysay Ave., Naga City', 'sofia.martinez@example.com', 'passwordstu', '09109876543', 'PENDING', '2024-05-30 17:32:12'),
(11, 'Diego', 'Perez', '1982-01-13', '579 Lacson St., Bacolod City', 'diego.perez@example.com', 'passwordvwx', '09210987654', 'PENDING', '2024-05-30 17:32:12'),
(12, 'Carla', 'Chavez', '2003-04-02', '680 Legarda St., Legazpi City', 'carla.chavez@example.com', 'passwordyz1', '09321098765', 'PENDING', '2024-05-30 17:32:12'),
(13, 'Andres', 'Hernandez', '1985-09-20', '791 Marcos Highway, Antipolo City', 'andres.hernandez@example.com', 'password234', '09432109876', 'PENDING', '2024-05-30 17:32:12'),
(14, 'Elena', 'Flores', '1970-06-01', '802 Mabini St., Iloilo City', 'elena.flores@example.com', 'password567', '09543210987', 'PENDING', '2024-05-30 17:32:12'),
(15, 'Gabriel', 'Gomez', '1970-06-29', '913 Lopez Jaena St., Tacloban City', 'gabriel.gomez@example.com', 'password890', '09654321098', 'PENDING', '2024-05-30 17:32:12'),
(16, 'Isabel', 'Diaz', '2004-10-14', '24 P. Burgos St., Zamboanga City', 'isabel.diaz@example.com', 'passwordabc2', '09765432109', 'PENDING', '2024-05-30 17:32:12'),
(17, 'Ricardo', 'Alvarez', '1948-01-11', '35 Quezon Ave., Lucena City', 'ricardo.alvarez@example.com', 'passworddef3', '09876543210', 'PENDING', '2024-05-30 17:32:12'),
(18, 'Luis', 'Ramirez', '1965-05-09', '46 E. Rodriguez St., Tarlac City', 'luis.ramirez@example.com', 'passwordghi4', '09987654321', 'PENDING', '2024-05-30 17:32:12'),
(19, 'Alejandra', 'Santiago', '1958-04-01', '57 J.P. Rizal St., Ilocos Norte', 'alejandra.santiago@example.com', 'passwordjkl5', '09123456789', 'PENDING', '2024-05-30 17:32:12'),
(20, 'Catalina', 'Vargas', '1970-10-01', '68 Mendiola St., Batangas City', 'catalina.vargas@example.com', 'passwordmno6', '09234567890', 'PENDING', '2024-05-30 17:32:12'),
(21, 'Kulot', 'Salot', '2000-04-06', '', 'kulotsalot@gmail.com', '$2y$10$Kj.z6OzEPKERSvoe2Y4Ee.dsfc9eq4lg0BFjB.L2izRpKMv9EU6Wy', '', 'PENDING', '2024-06-05 19:46:49'),
(22, 'Admin', 'Admin', '2000-02-04', '', 'admin@gmail.com', '$2y$10$lDv4HGCC3pNYx2HbRb7Nvu3jENHctvSJXbah4..0H2wSdTjg7uOSa', '', 'PENDING', '2024-06-05 20:10:23'),
(23, 'Udi', 'Salgado', '2000-06-04', '', 'tamayo.zed@umak.edu.ph', '$2y$10$vkOW4iokgHPso6BZEGx1.eIB/UoFGaA6q.qKK6lK9N1nYbcgm/xEC', '09455702579', 'PENDING', '2024-06-05 21:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_modes`
--

CREATE TABLE `delivery_modes` (
  `delivery_id` int(11) NOT NULL,
  `delivery_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_modes`
--

INSERT INTO `delivery_modes` (`delivery_id`, `delivery_name`) VALUES
(1, 'JRS EXPRESS'),
(2, 'JNT EXPRESS'),
(3, 'LALAMOVE'),
(4, 'NINJA VAN'),
(5, 'LBC EXPRESS');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `question`, `answer`) VALUES
(1, 'What are the different types of vaping devices available?', 'Vaping devices come in various types such as cigalikes, vape pens, pod mods, box mods, and mechanical mods.'),
(2, 'Is vaping safer than smoking traditional cigarettes?', 'While vaping is considered to be less harmful than smoking traditional cigarettes, it is not completely risk-free. Vaping still involves inhaling aerosols containing nicotine and other chemicals.'),
(3, 'How do I choose the right nicotine strength for my e-liquid?', 'Nicotine strength selection depends on factors like your smoking history and vaping habits. Beginners typically start with lower nicotine strengths (3-6mg/ml), while heavy smokers may opt for higher concentrations (12-18mg/ml).'),
(4, 'What are the main ingredients in e-liquids?', 'E-liquids typically contain propylene glycol (PG), vegetable glycerin (VG), nicotine, and flavorings. Some may also contain distilled water or other additives.'),
(5, 'How often should I change the coil in my vaping device?', 'Coil lifespan varies depending on usage, e-liquid composition, and maintenance. On average, coils should be replaced every 1-4 weeks to maintain optimal performance and flavor.'),
(6, 'Are there any regulations regarding vaping products?', 'Regulations for vaping products vary by region. It\'s important to stay informed about local laws regarding sales, advertising, and usage of vaping devices and e-liquids.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_feedback` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_tbl`
--

INSERT INTO `feedback_tbl` (`feedback_id`, `name`, `customer_email`, `reg_date`, `customer_feedback`) VALUES
(1, 'Jeric Manapat', 'jericmanapat@gmail.com', '2023-10-20 17:21:35', 'Fast transaction, and thanks sa staff for being responsible, 💯 good Item and legit🔥🙌.'),
(2, 'Tane Lores', 'tanelores@gmail.com', '2023-05-15 17:21:35', 'good customer and mabilis'),
(3, 'Tons Haberie', 'tonshaberie@gmail.com', '2023-11-21 17:27:08', 'legit quality! Highly recommend. Godbless mga boss! 🤟❤️'),
(4, 'Drew Ferrer', 'drewferrer@gmail.com', '2023-07-12 17:27:08', 'very accommodating and knowledgeable ang staff. also got a free skey.  salamat po for fast and smooth transaction.');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tbl`
--

CREATE TABLE `inventory_tbl` (
  `item_id` int(11) NOT NULL,
  `total_value` int(11) NOT NULL DEFAULT 0,
  `total_stock` int(11) NOT NULL DEFAULT 0,
  `latest_stock_refill` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_tbl`
--

INSERT INTO `inventory_tbl` (`item_id`, `total_value`, `total_stock`, `latest_stock_refill`, `sold`) VALUES
(1, 0, 10, 10, 0),
(2, 0, 3, 3, 0),
(3, 0, 10, 10, 0),
(4, 0, 5, 5, 0),
(5, 0, 1, 6, 0),
(6, 0, 2, 11, 0),
(7, 0, 2, 10, 0),
(8, 0, 1, 12, 0),
(9, 0, 1, 19, 0),
(10, 0, 2, 17, 0),
(11, 0, 2, 25, 0),
(12, 0, 1, 7, 0),
(13, 0, 1, 10, 0),
(14, 0, 1, 5, 0),
(15, 0, 2, 18, 0),
(16, 0, 2, 20, 0),
(17, 0, 1, 2, 0),
(18, 0, 1, 24, 0),
(19, 0, 2, 12, 0),
(20, 0, 2, 10, 0),
(21, 0, 1, 15, 0),
(26, 0, 2, 18, 0),
(27, 0, 1, 6, 0),
(28, 0, 3, 16, 0),
(29, 0, 4, 20, 0),
(30, 0, 1, 15, 0),
(31, 0, 3, 16, 0),
(32, 0, 1, 15, 0),
(33, 0, 2, 23, 0),
(34, 0, 3, 17, 0),
(35, 0, 1, 21, 0),
(36, 0, 1, 7, 0),
(37, 0, 3, 17, 0),
(38, 0, 1, 17, 0),
(39, 0, 1, 17, 0),
(40, 0, 4, 18, 0),
(41, 0, 3, 15, 0),
(42, 0, 3, 15, 0),
(43, 0, 3, 15, 0),
(44, 0, 1, 17, 0),
(45, 0, 2, 13, 0),
(46, 0, 1, 22, 0),
(47, 0, 4, 20, 0),
(48, 0, 3, 19, 0),
(49, 0, 1, 13, 0),
(50, 0, 1, 14, 0),
(51, 0, 1, 10, 0),
(52, 0, 2, 13, 0),
(53, 0, 3, 15, 0),
(54, 0, 3, 23, 0),
(55, 0, 1, 8, 0),
(56, 0, 1, 20, 0),
(57, 0, 2, 10, 0),
(58, 0, 1, 7, 0),
(59, 0, 1, 14, 0),
(60, 0, 2, 21, 0),
(61, 0, 2, 12, 0),
(62, 0, 1, 19, 0),
(63, 0, 1, 9, 0),
(64, 0, 3, 17, 0),
(65, 0, 3, 15, 0),
(66, 0, 2, 13, 0),
(67, 0, 1, 8, 0),
(68, 0, 1, 25, 0),
(69, 0, 1, 23, 0),
(70, 0, 1, 24, 0),
(71, 0, 2, 13, 0),
(72, 0, 1, 24, 0),
(73, 0, 4, 25, 0),
(74, 0, 1, 4, 0),
(75, 0, 2, 11, 0),
(76, 0, 1, 6, 0),
(77, 0, 4, 19, 0),
(78, 0, 3, 23, 0),
(79, 0, 4, 18, 0),
(80, 0, 2, 13, 0),
(81, 0, 1, 17, 0),
(82, 0, 1, 18, 0),
(83, 0, 4, 24, 0),
(84, 0, 3, 21, 0),
(85, 0, 3, 20, 0),
(86, 0, 1, 25, 0),
(87, 0, 1, 7, 0),
(88, 0, 1, 8, 0),
(89, 0, 3, 19, 0),
(90, 0, 2, 10, 0),
(91, 0, 4, 18, 0),
(92, 0, 1, 4, 0),
(93, 0, 1, 25, 0),
(94, 0, 2, 13, 0),
(95, 0, 3, 15, 0),
(96, 0, 2, 12, 0),
(97, 0, 1, 25, 0),
(98, 0, 4, 18, 0),
(99, 0, 3, 16, 0),
(100, 0, 1, 19, 0),
(101, 0, 2, 10, 0),
(102, 0, 3, 21, 0),
(103, 0, 4, 25, 0),
(104, 0, 1, 8, 0),
(105, 0, 3, 16, 0),
(106, 0, 4, 20, 0),
(107, 0, 1, 5, 0),
(108, 0, 2, 15, 0),
(109, 0, 1, 4, 0),
(110, 0, 1, 16, 0),
(111, 0, 1, 9, 0),
(112, 0, 4, 25, 0),
(113, 0, 4, 20, 0),
(114, 0, 1, 9, 0),
(115, 0, 3, 21, 0),
(116, 0, 3, 15, 0),
(117, 0, 1, 6, 0),
(118, 0, 1, 15, 0),
(119, 0, 1, 15, 0),
(120, 0, 2, 19, 0),
(121, 0, 1, 22, 0),
(122, 0, 2, 13, 0),
(123, 0, 2, 11, 0),
(124, 0, 1, 12, 0),
(125, 0, 1, 26, 0),
(126, 0, 3, 14, 0),
(127, 0, 2, 26, 0),
(128, 0, 1, 9, 0),
(129, 0, 1, 9, 0),
(130, 0, 2, 13, 0),
(131, 0, 3, 14, 0),
(132, 0, 1, 20, 0),
(133, 0, 1, 22, 0),
(134, 0, 2, 12, 0),
(135, 0, 4, 19, 0),
(136, 0, 2, 19, 0),
(137, 0, 4, 19, 0),
(138, 0, 1, 5, 0),
(139, 0, 2, 20, 0),
(140, 0, 1, 21, 0),
(141, 0, 4, 19, 0),
(142, 0, 3, 16, 0),
(143, 0, 3, 14, 0),
(144, 0, 3, 20, 0),
(145, 0, 1, 23, 0),
(146, 0, 1, 9, 0),
(147, 0, 4, 20, 0),
(148, 0, 1, 7, 0),
(149, 0, 1, 9, 0),
(150, 0, 3, 14, 0),
(151, 0, 1, 9, 0),
(152, 0, 1, 21, 0),
(153, 0, 3, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `transaction_id`, `product_id`, `product_quantity`) VALUES
(1, 211, 68, 5),
(2, 43, 40, 8),
(3, 9, 43, 11),
(4, 127, 32, 8),
(6, 181, 39, 2),
(7, 99, 82, 7),
(8, 164, 39, 2),
(9, 98, 134, 10),
(10, 208, 27, 4),
(11, 108, 145, 14),
(12, 126, 31, 5),
(13, 95, 14, 9),
(15, 97, 115, 8),
(16, 199, 44, 3),
(17, 62, 92, 5),
(18, 141, 38, 2),
(19, 93, 152, 9),
(20, 41, 41, 7),
(32, 137, 47, 1),
(33, 134, 119, 10),
(34, 49, 16, 9),
(35, 55, 108, 6),
(36, 126, 104, 9),
(37, 40, 126, 5),
(38, 33, 59, 1),
(39, 46, 44, 10),
(40, 131, 151, 2),
(41, 90, 88, 1),
(42, 58, 108, 3),
(43, 17, 93, 2),
(44, 123, 129, 8),
(45, 140, 146, 1),
(46, 115, 73, 5),
(47, 154, 15, 5),
(48, 213, 120, 9),
(49, 178, 150, 8),
(50, 36, 109, 2),
(51, 71, 36, 1),
(52, 35, 121, 8),
(53, 173, 64, 8),
(54, 121, 16, 7),
(55, 87, 136, 1),
(56, 69, 17, 10),
(57, 83, 42, 4),
(58, 209, 68, 9),
(59, 155, 123, 8),
(60, 147, 117, 2),
(61, 59, 152, 1),
(62, 67, 109, 2),
(63, 155, 85, 3),
(64, 150, 71, 5),
(65, 70, 40, 7),
(66, 111, 9, 1),
(67, 132, 111, 9),
(68, 112, 1, 1),
(69, 165, 74, 10),
(70, 62, 14, 4),
(71, 26, 61, 8),
(72, 159, 66, 10),
(73, 75, 69, 10),
(74, 111, 104, 8),
(75, 117, 1, 8),
(76, 38, 135, 6),
(77, 54, 7, 4),
(78, 153, 145, 6),
(79, 176, 59, 7),
(80, 208, 70, 4),
(81, 84, 40, 1),
(82, 11, 91, 9),
(83, 16, 41, 10),
(84, 44, 142, 3),
(85, 174, 96, 6),
(86, 95, 93, 7),
(87, 169, 92, 2),
(88, 133, 104, 8),
(89, 158, 96, 4),
(90, 178, 35, 2),
(91, 201, 62, 4),
(92, 46, 147, 1),
(93, 54, 148, 1),
(94, 128, 6, 3),
(95, 54, 112, 2),
(96, 96, 150, 6),
(97, 105, 1, 2),
(98, 22, 67, 4),
(99, 8, 144, 10),
(100, 189, 108, 1),
(101, 67, 27, 9),
(102, 194, 92, 1),
(103, 128, 46, 1),
(104, 57, 81, 3),
(105, 113, 118, 9),
(106, 180, 17, 10),
(107, 136, 9, 1),
(108, 138, 43, 6),
(109, 69, 32, 9),
(110, 144, 51, 8),
(111, 84, 56, 7),
(159, 204, 133, 8),
(160, 126, 73, 3),
(161, 19, 142, 7),
(162, 143, 54, 4),
(163, 20, 7, 5),
(164, 95, 71, 5),
(165, 201, 28, 9),
(166, 79, 79, 3),
(167, 5, 40, 10),
(168, 213, 146, 4),
(169, 200, 2, 4),
(170, 146, 128, 1),
(171, 131, 150, 3),
(172, 2, 140, 8),
(173, 42, 50, 10),
(174, 206, 131, 7),
(175, 48, 11, 5),
(176, 51, 132, 6),
(177, 109, 105, 6),
(178, 177, 41, 3),
(179, 131, 64, 4),
(180, 125, 119, 1),
(181, 19, 122, 10),
(182, 145, 36, 6),
(183, 27, 27, 6),
(184, 125, 55, 6),
(185, 119, 123, 10),
(186, 8, 152, 8),
(187, 106, 79, 10),
(188, 81, 29, 5),
(189, 85, 91, 3),
(190, 181, 54, 7),
(191, 11, 12, 8),
(192, 152, 144, 5),
(193, 89, 67, 1),
(194, 199, 138, 4),
(195, 87, 96, 9),
(196, 53, 126, 2),
(197, 3, 140, 6),
(198, 67, 99, 6),
(199, 115, 51, 6),
(200, 159, 111, 7),
(201, 25, 45, 7),
(202, 72, 114, 5),
(203, 73, 116, 2),
(204, 147, 130, 8),
(205, 88, 68, 10),
(206, 1, 70, 3),
(207, 167, 107, 9),
(208, 192, 140, 6),
(209, 31, 59, 9),
(210, 7, 122, 2),
(211, 152, 102, 9),
(212, 102, 68, 10),
(213, 50, 32, 5),
(214, 160, 50, 2),
(215, 10, 129, 7),
(216, 210, 109, 6),
(217, 166, 34, 7),
(218, 201, 53, 8),
(219, 79, 134, 2),
(220, 5, 52, 7),
(221, 1, 59, 4),
(222, 201, 64, 10),
(223, 150, 114, 6),
(224, 146, 60, 9),
(225, 69, 129, 6),
(226, 117, 91, 7),
(227, 166, 61, 8),
(228, 51, 77, 1),
(229, 185, 143, 2),
(230, 130, 131, 8),
(231, 94, 150, 1),
(232, 80, 9, 2),
(233, 117, 54, 7),
(234, 132, 109, 8),
(235, 95, 48, 4),
(236, 77, 1, 9),
(237, 100, 87, 10),
(238, 57, 26, 10),
(239, 195, 85, 5),
(240, 167, 120, 6),
(241, 35, 107, 1),
(242, 101, 26, 9),
(243, 184, 48, 2),
(244, 193, 121, 1),
(245, 200, 94, 3),
(246, 205, 92, 7),
(247, 211, 105, 7),
(248, 15, 130, 7),
(249, 79, 135, 3),
(250, 138, 1, 10),
(251, 27, 54, 8),
(252, 145, 52, 7),
(253, 5, 147, 6),
(254, 16, 28, 1),
(255, 64, 10, 4),
(256, 60, 136, 9),
(257, 106, 72, 3),
(258, 138, 73, 4),
(259, 158, 43, 7),
(260, 160, 37, 3),
(261, 115, 105, 3),
(262, 95, 73, 1),
(263, 127, 48, 3),
(264, 139, 137, 7),
(265, 97, 130, 3),
(266, 71, 48, 4),
(267, 63, 61, 7),
(268, 103, 105, 2),
(269, 111, 52, 6),
(270, 31, 11, 3),
(271, 37, 6, 3),
(272, 92, 134, 5),
(273, 133, 93, 8),
(274, 176, 67, 5),
(275, 53, 60, 9),
(276, 163, 10, 1),
(277, 18, 27, 1),
(278, 26, 149, 6),
(279, 74, 52, 8),
(280, 80, 11, 6),
(281, 175, 141, 6),
(282, 210, 112, 10),
(283, 99, 89, 10),
(284, 76, 116, 4),
(285, 85, 111, 1),
(286, 196, 127, 2),
(287, 86, 14, 1),
(288, 52, 137, 7),
(289, 2, 91, 10),
(290, 65, 112, 6),
(291, 109, 56, 1),
(292, 134, 153, 6),
(293, 132, 61, 5),
(294, 41, 148, 7),
(295, 25, 87, 8),
(296, 213, 46, 5),
(297, 137, 76, 10),
(298, 44, 62, 10),
(299, 24, 70, 9),
(300, 198, 135, 9),
(301, 68, 10, 5),
(302, 169, 72, 10),
(303, 4, 57, 7),
(304, 151, 132, 9),
(305, 102, 124, 3),
(306, 59, 122, 9),
(307, 200, 92, 8),
(308, 183, 80, 8),
(309, 104, 79, 7),
(310, 181, 85, 6),
(311, 165, 20, 6),
(312, 71, 13, 9),
(313, 72, 28, 2),
(314, 145, 110, 6),
(315, 82, 107, 4),
(316, 189, 4, 8),
(317, 58, 49, 2),
(318, 148, 123, 6),
(319, 140, 51, 2),
(320, 45, 82, 1),
(321, 15, 58, 7),
(322, 152, 62, 8),
(323, 77, 29, 10),
(324, 141, 19, 4),
(325, 47, 134, 8),
(326, 27, 91, 7),
(327, 204, 3, 6),
(328, 88, 126, 8),
(329, 40, 115, 10),
(330, 150, 62, 5),
(331, 204, 116, 6),
(332, 143, 73, 10),
(333, 102, 12, 9),
(334, 79, 90, 10),
(335, 88, 145, 1),
(336, 203, 116, 2),
(337, 110, 127, 3),
(338, 157, 44, 1),
(339, 25, 146, 10),
(340, 82, 73, 7),
(341, 121, 46, 4),
(342, 144, 54, 4),
(343, 145, 44, 8),
(344, 80, 26, 7),
(345, 179, 46, 1),
(346, 14, 135, 5),
(347, 170, 36, 1),
(348, 169, 8, 9),
(349, 121, 31, 6),
(350, 100, 73, 4),
(351, 134, 48, 4),
(352, 157, 102, 8),
(353, 171, 127, 6),
(354, 171, 80, 4),
(355, 128, 96, 9),
(356, 125, 48, 10),
(357, 29, 76, 10),
(358, 195, 108, 10),
(414, 36, 77, 9),
(415, 22, 84, 10),
(416, 1, 57, 3),
(417, 151, 130, 5),
(418, 114, 68, 5),
(419, 116, 16, 7),
(420, 24, 69, 10),
(421, 196, 128, 4),
(422, 56, 108, 6),
(423, 117, 109, 10),
(424, 204, 85, 10),
(425, 30, 38, 6),
(426, 178, 71, 10),
(427, 160, 41, 1),
(428, 54, 91, 1),
(429, 2, 51, 1),
(430, 58, 138, 8),
(431, 72, 149, 3),
(432, 186, 19, 6),
(433, 74, 150, 4),
(434, 24, 77, 5),
(435, 110, 121, 2),
(436, 53, 127, 1),
(437, 147, 120, 3),
(438, 147, 88, 7),
(439, 84, 1, 9),
(440, 189, 77, 9),
(441, 53, 29, 5),
(442, 124, 28, 1),
(443, 34, 101, 2),
(444, 12, 145, 8),
(445, 169, 20, 9),
(446, 168, 153, 6),
(447, 122, 114, 7),
(448, 105, 66, 7),
(449, 157, 145, 2),
(450, 47, 140, 10),
(451, 186, 84, 9),
(452, 149, 27, 2),
(453, 189, 31, 5),
(454, 71, 119, 3),
(455, 212, 118, 7),
(456, 208, 59, 7),
(457, 191, 141, 8),
(458, 119, 2, 1),
(459, 21, 31, 9),
(460, 172, 65, 6),
(461, 158, 88, 9),
(462, 59, 112, 1),
(463, 34, 31, 10),
(464, 204, 102, 5),
(465, 68, 36, 6),
(466, 153, 96, 6),
(467, 136, 94, 2),
(468, 6, 115, 7),
(469, 47, 62, 7),
(470, 3, 42, 6),
(471, 87, 91, 6),
(472, 213, 105, 5),
(473, 166, 34, 5),
(474, 191, 4, 8),
(475, 28, 28, 7),
(476, 206, 108, 4),
(477, 92, 53, 5),
(478, 57, 45, 3),
(479, 9, 36, 9),
(480, 85, 44, 8),
(481, 185, 151, 5),
(482, 30, 60, 10),
(483, 22, 71, 2),
(484, 18, 63, 9),
(485, 22, 19, 5),
(486, 58, 58, 7),
(487, 10, 31, 8),
(488, 90, 38, 3),
(489, 207, 35, 9),
(490, 123, 3, 6),
(491, 208, 58, 2),
(492, 30, 47, 3),
(493, 165, 69, 5),
(494, 97, 29, 8),
(495, 204, 65, 8),
(496, 87, 45, 3),
(497, 34, 28, 6),
(498, 123, 32, 8),
(499, 86, 116, 10),
(500, 59, 3, 4),
(501, 38, 80, 3),
(502, 13, 132, 6),
(503, 164, 148, 10),
(504, 141, 52, 7),
(505, 213, 31, 10),
(506, 1, 131, 9),
(507, 7, 143, 7),
(508, 31, 26, 7),
(509, 132, 61, 5),
(510, 141, 115, 7),
(511, 97, 20, 8),
(512, 59, 99, 2),
(513, 4, 65, 8),
(514, 57, 83, 3),
(515, 58, 119, 2),
(516, 117, 37, 10),
(517, 200, 49, 10),
(518, 10, 85, 4),
(519, 88, 89, 9),
(520, 198, 56, 4),
(521, 87, 113, 1),
(522, 51, 38, 9),
(523, 209, 77, 6),
(524, 37, 99, 8),
(525, 198, 61, 10),
(526, 27, 37, 9),
(527, 181, 30, 5),
(528, 182, 153, 9),
(529, 154, 150, 6),
(530, 13, 124, 4),
(531, 26, 56, 2),
(532, 89, 151, 1),
(533, 157, 77, 9),
(534, 89, 146, 1),
(535, 185, 38, 7),
(536, 21, 52, 9),
(537, 190, 14, 3),
(538, 32, 57, 7),
(539, 15, 70, 9),
(540, 191, 12, 8),
(541, 57, 48, 5),
(542, 137, 149, 8),
(543, 90, 96, 4),
(544, 39, 28, 5),
(545, 138, 80, 2),
(546, 146, 53, 6),
(547, 101, 139, 7),
(548, 68, 143, 2),
(549, 34, 129, 7),
(550, 182, 51, 3),
(551, 167, 9, 10),
(552, 75, 26, 8),
(553, 89, 147, 10),
(554, 4, 45, 4),
(555, 181, 6, 4),
(556, 40, 35, 9),
(557, 84, 51, 5),
(558, 83, 73, 9),
(559, 164, 58, 10),
(560, 144, 90, 6),
(561, 14, 57, 3),
(562, 63, 20, 8),
(563, 62, 146, 2),
(564, 118, 89, 1),
(565, 189, 59, 4),
(566, 168, 85, 6),
(567, 58, 74, 10),
(568, 212, 97, 5),
(569, 35, 112, 5),
(570, 177, 82, 4),
(571, 140, 84, 9),
(572, 169, 117, 3),
(573, 213, 84, 5),
(574, 130, 20, 8),
(575, 13, 48, 9),
(576, 98, 132, 7),
(577, 24, 146, 2),
(578, 37, 110, 1),
(579, 116, 109, 6),
(580, 39, 117, 9),
(581, 63, 120, 3),
(582, 194, 95, 4),
(583, 143, 6, 2),
(584, 134, 5, 1),
(585, 25, 139, 8),
(586, 150, 153, 4),
(587, 35, 115, 6),
(588, 150, 47, 2),
(589, 5, 82, 9),
(590, 2, 118, 7),
(591, 209, 65, 6),
(592, 185, 117, 10),
(593, 82, 118, 3),
(594, 71, 69, 4),
(595, 109, 59, 5),
(596, 116, 68, 1),
(597, 39, 95, 9),
(598, 59, 151, 6),
(599, 177, 127, 4),
(600, 71, 68, 8),
(601, 35, 90, 6),
(602, 173, 28, 8),
(603, 123, 135, 2),
(604, 95, 26, 4),
(605, 105, 44, 3),
(606, 28, 36, 5),
(607, 38, 73, 3),
(608, 104, 65, 7),
(609, 192, 65, 9),
(610, 8, 65, 8),
(611, 102, 28, 6),
(612, 61, 4, 7),
(613, 211, 130, 3),
(614, 18, 144, 8),
(615, 96, 10, 2),
(616, 211, 14, 4),
(617, 130, 48, 1),
(618, 17, 18, 2),
(619, 119, 89, 3),
(620, 116, 132, 6),
(621, 13, 92, 8),
(622, 139, 26, 9),
(623, 18, 71, 6),
(624, 99, 128, 4),
(625, 15, 119, 7),
(626, 204, 45, 9),
(627, 120, 134, 7),
(628, 203, 47, 8),
(629, 13, 66, 10),
(630, 95, 7, 4),
(631, 9, 43, 4),
(632, 184, 27, 10),
(633, 44, 35, 7),
(634, 91, 43, 3),
(635, 108, 9, 1),
(636, 56, 42, 1),
(637, 168, 30, 7),
(638, 33, 29, 5),
(639, 87, 130, 1),
(640, 123, 59, 3),
(641, 141, 35, 8),
(642, 122, 61, 5),
(643, 185, 49, 3),
(644, 132, 82, 8),
(645, 107, 47, 2),
(646, 137, 47, 6),
(647, 151, 4, 7),
(648, 130, 107, 5),
(649, 199, 46, 10),
(650, 176, 70, 10),
(651, 72, 115, 2),
(652, 43, 50, 4),
(653, 211, 118, 3),
(654, 75, 112, 8),
(655, 166, 60, 1),
(656, 180, 14, 2),
(657, 186, 71, 3),
(658, 179, 77, 7),
(659, 121, 52, 9),
(660, 67, 9, 10),
(661, 185, 100, 7),
(662, 84, 38, 5),
(663, 78, 105, 5),
(664, 137, 125, 5),
(665, 24, 11, 4),
(666, 137, 60, 5),
(667, 186, 136, 7),
(668, 91, 122, 3),
(669, 111, 104, 3),
(670, 67, 81, 5),
(671, 3, 54, 3),
(672, 25, 2, 4),
(673, 114, 64, 9),
(674, 70, 99, 5),
(675, 9, 88, 3),
(676, 45, 113, 8),
(677, 201, 43, 7),
(678, 14, 42, 10),
(679, 107, 6, 3),
(680, 67, 52, 7),
(681, 14, 47, 2),
(682, 82, 16, 6),
(683, 154, 46, 2),
(684, 97, 145, 9),
(685, 22, 46, 8),
(686, 30, 118, 7),
(687, 86, 81, 6),
(688, 125, 20, 9),
(689, 152, 60, 4),
(690, 173, 29, 5),
(691, 196, 148, 4),
(692, 34, 134, 8),
(693, 7, 138, 4),
(694, 144, 26, 8),
(695, 62, 117, 1),
(696, 91, 19, 3),
(697, 57, 92, 4),
(698, 8, 110, 2),
(699, 84, 27, 7),
(700, 182, 29, 4),
(701, 20, 51, 8),
(702, 192, 51, 1),
(703, 47, 51, 9),
(704, 86, 26, 10),
(705, 76, 104, 3),
(706, 121, 87, 6),
(707, 164, 1, 2),
(708, 31, 58, 4),
(709, 86, 65, 6),
(710, 125, 72, 9),
(711, 153, 133, 7),
(712, 178, 58, 1),
(713, 5, 63, 5),
(925, 127, 53, 5),
(926, 194, 56, 6),
(927, 163, 47, 9),
(928, 19, 76, 10),
(929, 31, 105, 4),
(930, 99, 31, 7),
(931, 186, 49, 7),
(932, 207, 7, 6),
(933, 51, 46, 4),
(934, 61, 145, 8),
(935, 153, 125, 1),
(936, 152, 149, 6),
(937, 89, 52, 4),
(938, 202, 97, 5),
(939, 101, 115, 8),
(940, 114, 6, 2),
(941, 54, 130, 2),
(942, 141, 60, 4),
(943, 116, 141, 4),
(944, 157, 41, 9),
(945, 12, 11, 5),
(946, 12, 109, 9),
(947, 24, 92, 2),
(948, 83, 47, 5),
(949, 129, 95, 9),
(950, 182, 37, 6),
(951, 99, 62, 8),
(952, 159, 43, 2),
(953, 72, 106, 7),
(954, 97, 135, 5),
(955, 53, 117, 1),
(956, 186, 34, 1),
(957, 132, 38, 1),
(958, 101, 145, 5),
(959, 108, 58, 5),
(960, 25, 46, 8),
(961, 12, 77, 10),
(962, 198, 149, 3),
(963, 102, 145, 1),
(964, 130, 103, 7),
(965, 128, 43, 8),
(966, 38, 71, 1),
(967, 19, 52, 2),
(968, 191, 113, 6),
(969, 48, 108, 6),
(970, 92, 121, 10),
(971, 103, 137, 6),
(972, 27, 30, 4),
(973, 35, 15, 4),
(974, 97, 91, 9),
(975, 163, 7, 5),
(976, 100, 92, 10),
(977, 11, 90, 4),
(978, 181, 142, 3),
(979, 20, 121, 9),
(980, 194, 127, 5),
(981, 58, 123, 6),
(982, 134, 41, 9),
(983, 68, 45, 2),
(984, 152, 29, 5),
(985, 131, 46, 3),
(986, 197, 68, 5),
(987, 166, 137, 1),
(988, 26, 105, 10),
(989, 58, 109, 9),
(990, 211, 38, 7),
(991, 27, 45, 3),
(992, 140, 104, 6),
(993, 192, 84, 7),
(994, 116, 101, 9),
(995, 5, 32, 9),
(996, 99, 108, 6),
(997, 54, 7, 5),
(998, 186, 51, 2),
(999, 131, 56, 8),
(1000, 93, 16, 7),
(1001, 72, 95, 9),
(1002, 82, 152, 7),
(1003, 192, 110, 2),
(1004, 77, 5, 10),
(1005, 18, 57, 10),
(1006, 74, 72, 3),
(1007, 100, 117, 10),
(1008, 65, 34, 8),
(1009, 26, 139, 9),
(1010, 148, 134, 4),
(1011, 23, 80, 3),
(1012, 96, 131, 6),
(1013, 197, 106, 4),
(1014, 57, 55, 7),
(1015, 119, 9, 1),
(1016, 213, 47, 4),
(1017, 67, 120, 6),
(1018, 121, 61, 4),
(1019, 192, 42, 6),
(1020, 172, 76, 8),
(1021, 68, 84, 6),
(1022, 37, 30, 1),
(1023, 194, 10, 3),
(1024, 5, 39, 5),
(1025, 82, 42, 8),
(1026, 182, 90, 2),
(1027, 26, 124, 10),
(1028, 10, 79, 1),
(1029, 183, 82, 5),
(1030, 35, 42, 4),
(1031, 49, 70, 2),
(1032, 138, 53, 4),
(1033, 120, 70, 10),
(1034, 182, 138, 10),
(1035, 126, 126, 8),
(1036, 82, 135, 8),
(1037, 34, 125, 2),
(1038, 136, 132, 5),
(1039, 150, 39, 7),
(1040, 130, 99, 3),
(1041, 199, 115, 10),
(1042, 178, 144, 4),
(1043, 81, 46, 6),
(1044, 82, 48, 2),
(1045, 165, 87, 3),
(1046, 155, 90, 8),
(1047, 68, 127, 3),
(1048, 84, 63, 7),
(1049, 4, 95, 10),
(1050, 195, 1, 10),
(1051, 109, 103, 3),
(1052, 172, 137, 8),
(1053, 108, 39, 5),
(1054, 23, 6, 10),
(1055, 5, 111, 1),
(1056, 168, 29, 8),
(1057, 184, 72, 2),
(1058, 205, 94, 5),
(1059, 47, 34, 4),
(1060, 43, 106, 7),
(1061, 74, 65, 5),
(1062, 29, 42, 2),
(1063, 133, 80, 10),
(1064, 151, 95, 10),
(1065, 144, 118, 8),
(1066, 52, 66, 3),
(1067, 42, 45, 1),
(1068, 53, 62, 9),
(1069, 140, 28, 8),
(1070, 112, 81, 4),
(1071, 139, 40, 5),
(1072, 147, 133, 8),
(1073, 104, 76, 9),
(1074, 80, 82, 4),
(1075, 88, 43, 9),
(1076, 198, 132, 5),
(1077, 86, 55, 1),
(1078, 48, 12, 8),
(1079, 194, 113, 10),
(1080, 189, 26, 8),
(1081, 150, 28, 7),
(1082, 179, 51, 10),
(1083, 22, 68, 10),
(1084, 210, 59, 1),
(1085, 130, 33, 4),
(1086, 19, 76, 7),
(1087, 131, 67, 6),
(1088, 173, 96, 4),
(1089, 47, 36, 10),
(1090, 139, 92, 9),
(1091, 129, 89, 7),
(1092, 12, 81, 6),
(1093, 101, 81, 10),
(1094, 41, 47, 5),
(1095, 113, 4, 5),
(1096, 18, 136, 2),
(1097, 174, 97, 2),
(1098, 178, 111, 10),
(1099, 154, 132, 2),
(1100, 22, 26, 5),
(1101, 73, 70, 5),
(1102, 87, 120, 4),
(1103, 2, 150, 3),
(1104, 176, 60, 10),
(1105, 20, 149, 5),
(1106, 210, 149, 4),
(1107, 138, 61, 7),
(1108, 61, 145, 7),
(1109, 102, 127, 4),
(1110, 115, 73, 9),
(1111, 57, 96, 5),
(1112, 149, 62, 9),
(1113, 150, 112, 1),
(1114, 91, 79, 6),
(1115, 1, 111, 10),
(1116, 158, 2, 2),
(1117, 150, 47, 5),
(1118, 59, 111, 7),
(1119, 59, 55, 6),
(1120, 119, 140, 8),
(1121, 205, 150, 10),
(1122, 29, 56, 3),
(1123, 167, 39, 6),
(1124, 107, 129, 7),
(1125, 36, 139, 5),
(1126, 69, 120, 9),
(1127, 26, 153, 10),
(1128, 136, 76, 2),
(1129, 176, 143, 7),
(1130, 43, 136, 4),
(1131, 114, 103, 5),
(1132, 12, 80, 10),
(1133, 147, 131, 1),
(1134, 57, 88, 8),
(1135, 57, 37, 1),
(1136, 116, 116, 1),
(1137, 193, 34, 6),
(1138, 189, 60, 9),
(1139, 155, 127, 3),
(1140, 206, 53, 8),
(1141, 139, 70, 5),
(1142, 78, 130, 6),
(1143, 186, 149, 4),
(1144, 56, 83, 10),
(1145, 145, 47, 2),
(1146, 132, 17, 10),
(1147, 12, 59, 4),
(1148, 91, 125, 4),
(1149, 204, 40, 10),
(1150, 109, 1, 10),
(1151, 142, 122, 10),
(1152, 173, 90, 7),
(1153, 12, 27, 5),
(1154, 178, 94, 2),
(1155, 4, 139, 9),
(1156, 123, 73, 2),
(1157, 175, 34, 6),
(1158, 80, 126, 6),
(1159, 87, 56, 3),
(1160, 195, 68, 8),
(1161, 73, 151, 10),
(1162, 208, 41, 3),
(1163, 180, 66, 6),
(1164, 64, 89, 8),
(1165, 205, 52, 3),
(1166, 193, 103, 3),
(1167, 136, 118, 5),
(1168, 100, 19, 5),
(1169, 91, 47, 9),
(1170, 155, 144, 1),
(1171, 74, 103, 4),
(1172, 120, 19, 6),
(1173, 163, 63, 4),
(1174, 31, 53, 2),
(1175, 90, 4, 7),
(1176, 143, 71, 9),
(1177, 19, 97, 3),
(1178, 90, 39, 6),
(1179, 181, 38, 9),
(1180, 207, 91, 4),
(1181, 65, 13, 3),
(1182, 132, 152, 8),
(1183, 38, 141, 3),
(1184, 7, 104, 5),
(1185, 132, 105, 7),
(1186, 213, 103, 4),
(1187, 29, 44, 9),
(1188, 143, 76, 3),
(1189, 202, 151, 2),
(1190, 156, 82, 6),
(1191, 172, 99, 6),
(1192, 177, 129, 4),
(1193, 158, 149, 10),
(1194, 43, 80, 10),
(1195, 169, 134, 9),
(1196, 78, 78, 4),
(1197, 92, 140, 9),
(1198, 16, 132, 4),
(1199, 13, 50, 7),
(1200, 19, 97, 1),
(1201, 53, 16, 7),
(1202, 208, 48, 8),
(1203, 29, 71, 9),
(1204, 159, 27, 2),
(1205, 70, 91, 1),
(1206, 86, 142, 10),
(1207, 5, 95, 4),
(1208, 193, 121, 8),
(1209, 99, 34, 6),
(1210, 129, 71, 4),
(1211, 135, 149, 1),
(1212, 71, 112, 6),
(1213, 166, 8, 6),
(1214, 189, 132, 5),
(1215, 20, 32, 9),
(1216, 171, 124, 1),
(1217, 158, 112, 8),
(1218, 62, 36, 5),
(1219, 47, 57, 4),
(1220, 50, 40, 1),
(1221, 109, 112, 1),
(1222, 182, 117, 4),
(1223, 155, 137, 5),
(1224, 16, 45, 4),
(1225, 262, 52, 2),
(1226, 262, 1, 3),
(1227, 317, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `flavor` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `bottle_size` varchar(255) NOT NULL,
  `nicotine_percentage` varchar(255) NOT NULL,
  `puffs` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `img_dir` varchar(100) NOT NULL DEFAULT 'energiz_eon.png',
  `sale` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `brand_id`, `product_name`, `price`, `flavor`, `color`, `bottle_size`, `nicotine_percentage`, `puffs`, `description`, `img_dir`, `sale`) VALUES
(1, 3, 25, 'YOOFUN POD', 660, 'N/A', 'BLUE', 'N/A', 'N/A', 'N/A', '0.8 ohm 15W', 'yoofun_podkit_blue.png', ''),
(2, 3, 25, 'YOOFUN POD', 660, 'N/A', 'BLACK', 'N/A', 'N/A', 'N/A', '1.1 Ohm 12W', 'yoofun_podkit_black.png', ''),
(3, 3, 25, 'SMPO OLA POD', 165, 'WATER MELON', 'ORANGE', '2ML', '2%', 'N/A', '1.2 ohm', 'smpo_ola_podkit_orange.png', ''),
(4, 3, 25, 'SMPO OLA POD', 165, 'MANGO ICE', 'YELLOW', '2ML', '2%', 'N/A', '1.2 ohm', 'smpo_ola_podkit_yellow.png', ''),
(5, 3, 25, 'SMPO OLA POD', 165, 'RED ENERGY', 'BROWN', '2ML', '2%', 'N/A', '1.2 ohm', 'smpo_ola_podkit_brown.png', ''),
(6, 3, 25, 'SMPO OLA POD', 165, 'DOUBLE APPLE', 'GREEN', '2ML', '2%', 'N/A', '1.2 ohm', 'smpo_ola_podkit_green.png', ''),
(7, 3, 25, 'SMPO OLA POD', 165, 'STRAWBERRY CHEESECAKE', 'RED', '2ML', '2%', 'N/A', '1.2 ohm', 'smpo_ola_podkit_red.png', ''),
(8, 3, 25, 'SMPO AMPLE', 2200, 'N/A', 'SPACE BLACK', '4ML', 'N/A', 'N/A', 'Type C,  1200mah, 0.25ohms 40W  GF 0.25Ω Mesh Coil (35W-40W)/GF 0.45Ω Mesh Coil (20W-25W)', 'SMPO AMPLE 1 SPACE BLACK.png', ''),
(9, 3, 25, 'SMPO AMPLE', 2200, 'N/A', 'NEPTUNE BLUE', '4ML', 'N/A', 'N/A', 'Type C,  1200mah, 0.25ohms 40W  GF 0.25Ω Mesh Coil (35W-40W)/GF 0.45Ω Mesh Coil (20W-25W)', 'SMPO AMPLE Neptune blue.png', '2024-06-04'),
(10, 3, 25, 'SMPO AMPLE', 2200, 'N/A', 'AURORA', '4ML', 'N/A', 'N/A', 'Type C,  1200mah, 0.25ohms 40W  GF 0.25Ω Mesh Coil (35W-40W)/GF 0.45Ω Mesh Coil (20W-25W)', 'SMPO AMPLE 3 Aurora.png', ''),
(11, 3, 25, 'SMPO CP POD', 605, 'TROPICAL MIX', 'BLACK', '10ML', '2%', 'N/A', '15W 0.8OHMS', 'smpo  podkit -SMPO CP POD tropical mix.png', ''),
(12, 3, 25, 'SMPO CP POD', 605, 'STRAWBERRY ICE CREAM', 'BLACK', '10ML', '2%', 'N/A', '15W 0.8OHMS', 'smpo  podkit -SMPO CP POD strawberry ice cream.png', ''),
(13, 3, 25, 'SMPO CP POD', 605, 'VANILLA TOBACCO', 'BLACK', '10ML', '2%', 'N/A', '15W 0.8OHMS', 'smpo  podkit -SMPO CP POD vanilla tobacco.png', ''),
(14, 3, 25, 'SMPO CP POD', 605, 'MIX BERRIES', 'BLACK', '10ML', '2%', 'N/A', '15W 0.8OHMS', 'smpo  podkit -SMPO CP POD mix berries.png', ''),
(15, 3, 25, 'SMPO CP POD', 605, 'GRAPE JELLY', 'BLACK', '10ML', '2%', 'N/A', '15W 0.8OHMS', 'smpo  podkit -SMPO CP POD grape jelly.png', ''),
(16, 3, 9, 'WENAX M1', 978.03, 'N/A', 'SPIRAL DARK', '2ML', 'N/A', 'N/A', 'Product Parameters Power Output: 9-16W Coil Resistance: 0.4-3Ω Battery Capacity: 800mAh Charging Specification: USB-C Low Voltage Warning: 3.2土0.1V Charging Port: 5V/1A Longest Vaping Time: 10S Working Temperature: -10-45°C Stand-by Current: ≤15uA . Capac', 'Geekvape WENAX M1 Pod Kit 800mAh (New Colors) spiral dark.png', ''),
(17, 3, 9, 'WENAX M1', 978.03, 'N/A', 'PLAID PURPLE', '2ML', 'N/A', 'N/A', 'Product Parameters Power Output: 9-16W Coil Resistance: 0.4-3Ω Battery Capacity: 800mAh Charging Specification: USB-C Low Voltage Warning: 3.2土0.1V Charging Port: 5V/1A Longest Vaping Time: 10S Working Temperature: -10-45°C Stand-by Current: ≤15uA . Capac', 'Geekvape WENAX M1 Pod Kit 800mAh (New Colors) purple.png', ''),
(18, 3, 9, 'WENAX M1', 978.03, 'N/A', 'PLAID GREEN', '2ML', 'N/A', 'N/A', 'Product Parameters Power Output: 9-16W Coil Resistance: 0.4-3Ω Battery Capacity: 800mAh Charging Specification: USB-C Low Voltage Warning: 3.2土0.1V Charging Port: 5V/1A Longest Vaping Time: 10S Working Temperature: -10-45°C Stand-by Current: ≤15uA . Capac', 'Geekvape WENAX M1 Pod Kit 800mAh (New Colors) plaid green.png', ''),
(19, 3, 9, 'T200 AEGIS TOUCH', 5917.67, 'N/A', 'BLACK', '60ML', 'N/A', 'N/A', 'Parameters Output Mode: POWER、TC-SS、 TC-TCR (VPC、SMART、 BYPASS) Output Power: 5W-200W adjust 1W each time Maximum Output Current: 45A Maximum Output Voltage: 12V Charging Port: Type-C Port Resistance Range of Cartridge: 0.1 ohm - 2 ohm Battery Specificati', 'Geekvape T200 (Aegis Touch) Kit 200W black.png', ''),
(20, 3, 9, 'T200 AEGIS TOUCH', 5917.67, 'N/A', 'CLARET RED', '60ML', 'N/A', 'N/A', 'Parameters Output Mode: POWER、TC-SS、 TC-TCR (VPC、SMART、 BYPASS) Output Power: 5W-200W adjust 1W each time Maximum Output Current: 45A Maximum Output Voltage: 12V Charging Port: Type-C Port Resistance Range of Cartridge: 0.1 ohm - 2 ohm Battery Specificati', 'Geekvape T200 (Aegis Touch) Kit 200W claret red.png', ''),
(21, 3, 9, 'T200 AEGIS TOUCH', 5917.67, 'N/A', 'AZURE BLUE', '60ML', 'N/A', 'N/A', 'Parameters Output Mode: POWER、TC-SS、 TC-TCR (VPC、SMART、 BYPASS) Output Power: 5W-200W adjust 1W each time Maximum Output Current: 45A Maximum Output Voltage: 12V Charging Port: Type-C Port Resistance Range of Cartridge: 0.1 ohm - 2 ohm Battery Specificati', 'Geekvape T200 (Aegis Touch) Kit 200W azure blue.png', ''),
(26, 3, 9, 'H45 CLASSIC', 2244.46, 'NULL', 'BLACK', '4ML', 'NULL', 'NULL', 'Parameters Size: 44.83092mm Working Mode: POWER / BYPASS Output Power: 5W~45W Battery Specification: Built-in 1400mAh Tank Capacity: 4.0ml Resistance Range: 0.1-2Ω Display Screen: 0.96-inch TFT Charging Port: Type-C Drip Tip: 510 Drip Tip + Spare MTL Drip Tip Operating Temperature: 0°C- 45°C', 'Geekvape H45 Classic (Aegis Hero 2 Classic) Pod Kit 1400mah 4ml BLACK.png', ''),
(27, 3, 9, 'H45 CLASSIC', 2244.46, 'NULL', 'LAVENDER', '4ML', 'NULL', 'NULL', 'Parameters Size: 44.83092mm Working Mode: POWER / BYPASS Output Power: 5W~45W Battery Specification: Built-in 1400mAh Tank Capacity: 4.0ml Resistance Range: 0.1-2Ω Display Screen: 0.96-inch TFT Charging Port: Type-C Drip Tip: 510 Drip Tip + Spare MTL Drip Tip Operating Temperature: 0°C- 45°C', 'Geekvape H45 Classic (Aegis Hero 2 Classic) Pod Kit 1400mah 4ml Lavender.png', ''),
(28, 3, 9, 'H45 CLASSIC', 2244.46, 'NULL', 'AQUA', '4ML', 'NULL', 'NULL', 'Parameters Size: 44.83092mm Working Mode: POWER / BYPASS Output Power: 5W~45W Battery Specification: Built-in 1400mAh Tank Capacity: 4.0ml Resistance Range: 0.1-2Ω Display Screen: 0.96-inch TFT Charging Port: Type-C Drip Tip: 510 Drip Tip + Spare MTL Drip', 'Geekvape H45 Classic (Aegis Hero 2 Classic) Pod Kit 1400mah 4ml aqua.png', ''),
(29, 3, 2, 'BLACK ELITE 8000 PREFILLED POD', 300, 'STRAWBERRY', 'BLACK', 'NULL', '3%', '8000', 'SPECIFICATION : Size: 204096mm 500mAh Battery Capacity 3% Nicotine 8000 Puffs 1.2 Mesh Coil Type-C Charger Charging duration approximately 30 – 45 minutes', 'BLACKELITE PODKIT - Black Elite 8000 PREFILLED POD VERY BAGUIO.png', ''),
(30, 3, 2, 'BLACK ELITE 8000 PREFILLED POD', 300, 'WATERMELON', 'BLACK', 'NULL', '3%', '8000', 'SPECIFICATION : Size: 204096mm 500mAh Battery Capacity 3% Nicotine 8000 Puffs 1.2 Mesh Coil Type-C Charger Charging duration approximately 30 – 45 minutes', 'BLACKELITE PODKIT - Black Elite 8000 PREFILLED POD RED CANNON.png', ''),
(31, 3, 2, 'BLACK ELITE 8000 PREFILLED POD', 300, 'HONEY PITCH', 'BLACK', 'NULL', '3%', '8000', 'SPECIFICATION : Size: 204096mm 500mAh Battery Capacity 3% Nicotine 8000 Puffs 1.2 Mesh Coil Type-C Charger Charging duration approximately 30 – 45 minutes', 'BLACKELITE PODKIT - Black Elite 8000 PREFILLED POD PEACH PERFECT.png', ''),
(32, 3, 2, 'BLACK ELITE 8000 PREFILLED POD', 300, 'BLUEBERRY', 'BLACK', 'NULL', '3%', '8000', 'SPECIFICATION : Size: 204096mm 500mAh Battery Capacity 3% Nicotine 8000 Puffs 1.2 Mesh Coil Type-C Charger Charging duration approximately 30 – 45 minutes', 'BLACKELITE PODKIT - Black Elite 8000 PREFILLED POD BLUE BREEZE.png', ''),
(33, 3, 2, 'BLACK ELITE 8000 PREFILLED POD', 300, 'BLACKCURRANT', 'BLACK', 'NULL', '3%', '8000', 'SPECIFICATION : Size: 204096mm 500mAh Battery Capacity 3% Nicotine 8000 Puffs 1.2 Mesh Coil Type-C Charger Charging duration approximately 30 – 45 minutes', 'BLACKELITE PODKIT - Black Elite 8000 PREFILLED POD BLACK WAVE.png', ''),
(34, 3, 25, 'UNIKIT', 1375, 'NULL', 'BLACK', '10ML', '1%', 'NULL', 'Size: 1353227mm, Capacity: 10ml, Charging: Type-C, Resistance: 0.6Ω Mesh Coil (20W) / 0.8Ω Mesh Coil (16W), Battery Capacity: 750mAh, Wattage Output: 16W/20W', 'smpo unikit.png', ''),
(35, 3, 25, 'YOOFUN', 2034.45, 'NULL', 'DEFAULT', '1.8ML', 'NULL', 'NULL', 'Dimensions: 45mm x 17mm x 82.5mm, Battery Capacity: 800mAh, Charging Current: 1.5 A (fast charging), Pod Capacity: 1.8ml, Power Output: 12W/15W, Resistance: 1.1Ω/0.8Ω, Pod Material: PCTG', 'smpo - SMPO Yoofun.png', ''),
(36, 3, 18, 'APX S1', 649, 'NULL', 'ORANGE BLUE', '1.2ML', 'NULL', 'NULL', '18W 500MAH TYPE C 1.2OHMS ', 'NEVOKS APX S1.png', ''),
(37, 3, 18, 'APX S2', 768, 'NULL', 'MYST GREY', '2ML', 'NULL', 'NULL\r\n', 'Parameters: Battery: Built-in 1000 mAh Capacity: 2 ml Output power: 8-18W Adjustable output power Side liquid application Air adjustment by turning the cartridge Compatible with Nevoks APX series cartridges LED lamp Haptic feedback Material: PCTG, aluminum alloy', 'NEVOKS APX S2.png', ''),
(38, 3, 10, 'HOPO DEVICES', 599, 'VIRGINIA TOBACCO', 'BLACK', 'NULL', 'NULL', 'NULL', 'Materials: Aluminum Alloy Color: Black/Red/Silver/Green Battery Size:96.682311mm Voltage: 3.6V Wattage Output: 10W Battery Capacity: 360mAh 2x Iron Pods (Virginia Tobacco; Blueberry Ice) 1x Micro-USB Cable 1x User Manual', 'HOPO DEVICES BLACK.png', ''),
(39, 3, 10, 'HOPO DEVICES', 599, 'BLUEBERRY ICE', 'RED', 'NULL', 'NULL', 'NULL', 'Materials: Aluminum Alloy Color: Black/Red/Silver/Green Battery Size:96.682311mm Voltage: 3.6V Wattage Output: 10W Battery Capacity: 360mAh 2x Iron Pods (Virginia Tobacco; Blueberry Ice) 1x Micro-USB Cable 1x User Manual', 'HOPO DEVICES RED.png', ''),
(40, 3, 20, 'ARTISAN LEATHER DEVICE', 1995, 'NULL', 'ROYAL SADDLE', '1.8ML', '5%', 'NULL', '380MAH, TYPE- C CHARGING, 36.3G', 'RELX Podkit - Royal Saddle artisan LEATHER DEVICE.png', ''),
(41, 3, 20, 'ARTISAN LEATHER DEVICE', 1995, 'NULL', 'INDIGO DENIM', '1.8ML', '5%', 'NULL', '380MAH, TYPE- C CHARGING, 36.3G', 'RELX Podkit - Indigo Denim ARTISAN LEATHER DEVICE.png', ''),
(42, 3, 20, 'ARTISAN LEATHER DEVICE', 1995, 'NULL', 'BRIGHT MANDARIN', '1.8ML', '', 'NULL', '380MAH, TYPE- C CHARGING, 36.3G', 'RELX - Bright Mandarin ARTISAN LEATHER DEVICE.png', ''),
(43, 3, 20, 'INFINITY 2', 1250, 'NULL', 'OBSIDIAN BLACK', '1.9ML', '5%', 'NULL', '440MAH, TYPE- C CHARGING, 18G', 'Relx infinity 2 Obsidian Black.png', ''),
(44, 3, 20, 'INFINITY 2', 1250, 'NULL', 'GREEN NAVY', '1.9ML', '5%', 'NULL', '440MAH, TYPE- C CHARGING, 18G\r\n', 'Relx infinity 2 Green Navy.png', ''),
(45, 3, 20, 'INFINITY 2', 1250, 'NULL', 'DARK ASTEROID', '1.9ML', '5%', 'NULL', '440MAH, TYPE- C CHARGING, 18G', 'Relx infinity 2  Dark Asteroid.png', ''),
(46, 3, 20, 'INFINITY 2', 1250, 'NULL', 'CHERRY BLOSSOM', '1.9ML', '5%', 'NULL', '440MAH, TYPE- C CHARGING, 18G', 'Relx infinity 2 Cherry Blosom.png', '2024-05-28'),
(47, 1, 13, 'INFINITY SERIES WHITE ROMANCE', 590, 'ROSE MILK\r\n', 'WHITE ROMANCE\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES White Romance - Rose Milk Flavor.png', ''),
(48, 1, 13, 'INFINITY SERIES WANDERING EARTH', 590, 'LYCHEE\r\n', 'WANDERING EARTH\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Wandering Eart.png', ''),
(49, 1, 13, 'INFINITY SERIES THE WIZ', 590, 'SMOOTHIE\r\n', 'THE WIZ\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES  The Witz - Vanilla Ice Cream Flavor.png', ''),
(50, 1, 13, 'INFINITY SERIES TANGY PURPLE', 590, 'GRAPE ENERGY\r\n', 'TANGY PURPLE\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Tangy Purple - Grape Energy Flavor.png', ''),
(51, 1, 13, 'INFINITY SERIES SUNRISE', 590, 'CAPUCCINO\r\n', 'SUNRISE\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Sun Rise.png', ''),
(52, 1, 13, 'INFINITY SERIES SAUCY BOY', 590, 'YAKULT\r\n', 'SAUCY BOY\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Saucy Boy - Yakult Flavor.png', '2024-06-05'),
(53, 1, 13, 'INFINITY SERIES RED WATERFALL', 590, 'WATERMELON\r\n', 'RED WATERFALL\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Red Waterfall.png', ''),
(54, 1, 13, 'INFINITY SERIES MIST FOREST', 590, 'ELDER MINT\r\n', 'MIST FOREST\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Mist Forest.png', ''),
(55, 1, 13, 'INFINITY SERIES CHI-BI MARUKO', 590, 'BUBBLE GUM\r\n', 'CHIBI MARUKO\r\n', '10ML\r\n', '1%\r\n', '10000\r\n', '500MAH, FIREBASE LIQUID, 1.2 MESH COIL\r\n', 'IQ INFINITY SERIES Chi-bi Maruko.png', ''),
(56, 1, 11, 'EON 9000', 459.99, 'LYCHEE ICE\r\n', 'SPARK WAVE\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Spark Wave.png', ''),
(57, 1, 11, 'EON 9000', 459.99, 'STRAWBERRY ICE CREAM\r\n', 'SPARK CORE\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Spark Core.png', ''),
(58, 1, 11, 'EON 9000', 459.99, 'CRISP APPLE\r\n', 'QUANTUM SPARK\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Quantum Spark.png', ''),
(59, 1, 11, 'EON 9000', 459.99, 'MIX BERRIES\r\n', 'PULSE DRIVE\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Pulse Drive.png', ''),
(60, 1, 11, 'EON 9000', 459.99, 'WATERMELON VANILLA ICE CREAM\r\n', 'ENERGIZ\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Energiz.png', ''),
(61, 1, 11, 'EON 9000', 459.99, 'CARAMEL CHEESECAKE\r\n', 'CYBER SURGE\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Cyber Surge.png', ''),
(62, 1, 11, 'EON 9000', 459.99, 'BUBBLE GUM\r\n', 'BYTE BLITZ\r\n', '9ML\r\n', '8%\r\n', '10000\r\n', 'ROYAL BLACK CASE 600 MAH, 30MG, TYPE-C CHARGING  LED DISPLAY PERCENTAGE \r\n', 'INDIGO EON 9000 Byte Blitz.png', ''),
(63, 1, 30, 'D3S 1200', 275, 'MANGO ICE\r\n', 'YELLOW\r\n', '2.8ML\r\n', '5%\r\n', '1200\r\n', '500MAH, 31.4G, 1.2OHMS, 30MG, DOUBLE SPIRAL COTTON CORE\r\n', 'VEHOO D3 S MANGO ICE YELLOW.png', ''),
(64, 1, 30, 'D3S 1200', 275, 'WATERMELON\r\n', 'RED\r\n', '2.8ML\r\n', '5%\r\n', '1200\r\n', '500MAH, 31.4G, 1.2OHMS, 30MG, DOUBLE SPIRAL COTTON CORE\r\n', 'VEHOO D3S 1200 RED WATERMELON.png', ''),
(65, 1, 30, 'D3S 1200', 275, 'GRAPE\r\n', 'VIOLET\r\n', '2.8ML\r\n', '5%\r\n', '1200\r\n', '500MAH, 31.4G, 1.2OHMS, 30MG, DOUBLE SPIRAL COTTON CORE\r\n', 'VEHOO D3 S 1200 VIOLET GRAPE.png', ''),
(66, 1, 30, 'A17 8500', 346.5, 'ENERGY BOMB\r\n', 'PINK YELLOW\r\n', '17ML\r\n', '5%\r\n', '8500\r\n', 'A17 Parameters Size: 4927.890.2mm E-liquid Capacity: 17ml Nicotine Strength: 20mg/ml Battery Capacity: 650mAh Puffs: UP to 8500puffs1200\r\n', 'VEHOO PINK YELLOW ENERGY BOMB.png', ''),
(67, 1, 30, 'A17 8500', 346.5, 'COTTON CANDY\r\n', 'PINK MINT\r\n', '17ML\r\n', '5%\r\n', '8500\r\n', 'A17 Parameters Size: 4927.890.2mm E-liquid Capacity: 17ml Nicotine Strength: 20mg/ml Battery Capacity: 650mAh Puffs: UP to 8500puffs1200\r\n', 'VEHOO A17 PINK MINT COTTON CANDY.png', ''),
(68, 1, 30, 'A17 8500', 346.5, 'FROZEN KISS\r\n', 'PINK BEIGE\r\n', '17ML\r\n', '5%\r\n', '8500\r\n', 'A17 Parameters Size: 4927.890.2mm E-liquid Capacity: 17ml Nicotine Strength: 20mg/ml Battery Capacity: 650mAh Puffs: UP to 8500puffs1200\r\n', 'VEHOO A17 8500 PINK BEIGE FROZEN KISS.png', ''),
(69, 1, 30, 'D6S 1500', 250, 'ORANGE SODA\r\n', 'MINT\r\n', '3ML\r\n', '1%\r\n', '1500\r\n', '400MAH, 1.2OHMS,35G\r\n', 'VEEHOO D6S 1500 - MINT- ORANGE SODA.png', ''),
(70, 1, 30, 'D6S 1500', 250, 'WILD BERRY\r\n', 'VIOLET\r\n', '3ML\r\n', '1%\r\n', '1500\r\n', '400MAH, 1.2OHMS,35G\r\n', 'VEEHOO D6S 1500 VIOLET WILD BERRY.png', ''),
(71, 1, 30, 'D6S 1500', 250, 'STRAWBERRY\r\n', 'RED\r\n', '3ML\r\n', '1%\r\n', '1500\r\n', '400MAH, 1.2OHMS,35G\r\n', 'VEEHOO D6S 1500 VIOLET WILD BERRY.png', ''),
(72, 1, 17, 'DX10i', 500, 'AQUA MINT\r\n', 'MOON BURST\r\n', '20ML\r\n', '5%\r\n', '10000\r\n', 'Features 10,000 Puffs Type-C Charging E-Liquid Indicator 5% Nicotine Level 650mAh Battery\r\n', 'NASTY DX10I AQUA MINT MOON BURST.png', ''),
(73, 1, 17, 'DX10i', 500, 'GRAPE APPLE\r\n', 'COSMIC CORTLAND\r\n', '20ML\r\n', '5%\r\n', '10000\r\n', 'Features 10,000 Puffs Type-C Charging E-Liquid Indicator 5% Nicotine Level 650mAh Battery\r\n', 'NASTY DX10I GRAPE APPLE COSMIC CORTLAND.png', ''),
(74, 1, 12, 'INSTABAR 5000', 350, 'ROOTBEER FLOAT\r\n', 'VIOLET\r\n', '2ML\r\n', '5%\r\n', '5000\r\n', 'Insta Bar 5000 Puffs Disposable 5% 5000 Puffs Disposable Rechargeable\r\n', 'INSTABAR DISPO - INSTABAR 5000 PUFFS ROOTBEER  FLOAT VIOLET.png', ''),
(75, 1, 12, 'INSTABAR 5000', 350, 'WATERMELON ICE\r\n', 'RED SUMMER\r\n', '2ML\r\n', '5%\r\n', '5000\r\n', 'Insta Bar 5000 Puffs Disposable 5% 5000 Puffs Disposable Rechargeable\r\n', 'INSTABAR DISPO - INSTABAR 5000 PUFFS WATERMELON ICE RED SUMMER.png', ''),
(76, 1, 12, 'INSTABAR 5000', 350, 'LEMON VANILLA ICE CREAM\r\n', 'YELLOW\r\n', '2ML\r\n', '5%\r\n', '5000\r\n', 'Insta Bar 5000 Puffs Disposable 5% 5000 Puffs Disposable Rechargeable\r\n', 'INSTABAR DISPO - INSTABAR 5000 PUFFS LEMON VANILLLA ICE CREAM.png', ''),
(77, 1, 23, 'GRIPBAR FREEZY 1200', 450, 'STRAWBERRY ICE CREAM\r\n', 'PINK\r\n', '20ML\r\n', '3%\r\n', '12000\r\n', '600MAH, FREE LANYARD, ADVANCED MESH COIL \r\n', 'SHFT DISPOSABLES - SHFT GRIPBAR Freezy 12000  PINK STRAWBERI ICECREAM.png', ''),
(78, 1, 23, 'GRIPBAR FREEZY 1200', 450, 'OLD POPSICLE\r\n', 'BLUE\r\n', '20ML\r\n', '3%\r\n', '12000\r\n', '600MAH, FREE LANYARD, ADVANCED MESH COIL \r\n', 'SHFT DISPOSABLES - SHFT GRIPBAR Freezy 12000  BLUE OLD POPSICLE.png', ''),
(79, 1, 23, 'GRIPBAR FREEZY 1200', 450, 'MELON LYCHEE\r\n', 'ORANGE\r\n', '20ML\r\n', '3%\r\n', '12000\r\n', '600MAH, FREE LANYARD, ADVANCED MESH COIL \r\n', 'SHFT DISPOSABLES - SHFT GRIPBAR Freezy 12000  ORANGE MELON LYCHEE.png', ''),
(80, 1, 23, 'GRIPBAR FREEZY 1200', 450, 'BUBBLE GUM\r\n', 'CYAN\r\n', '20ML\r\n', '3%\r\n', '12000\r\n', '600MAH, FREE LANYARD, ADVANCED MESH COIL \r\n', 'SHFT DISPOSABLES - SHFT GRIPBAR Freezy 12000  CYAN BUBBLE GUM.png', ''),
(81, 1, 3, 'NEO 8000', 450, 'YAKULT\r\n', 'SHIROTA\r\n', '10ML\r\n', '3%\r\n', '8000\r\n', 'Specifications: *E-lquid capacity: 10ml *Service time: 8000 PUFFS *Nic Level: 3% *Charging port: Type C Battery Capacity: 500 mAh\r\n', 'CHILLAX NEO 8000 YAKULT SHIROTA.png', ''),
(82, 1, 3, 'NEO 8000', 450, 'VERY BERRY\r\n', 'JUNGLE FUSION\r\n', '10ML\r\n', '3%\r\n', '8000\r\n', 'Specifications: *E-lquid capacity: 10ml *Service time: 8000 PUFFS *Nic Level: 3% *Charging port: Type C Battery Capacity: 500 mAh\r\n', 'CHILLAX NEO 8000 VERY BERRY JUNGLE FUSION,png', ''),
(83, 1, 3, 'NEO 8000', 450, 'WATERMELON ICE\r\n', 'FRIGID SPORE\r\n', '10ML\r\n', '3%\r\n', '8000\r\n', 'Specifications: *E-lquid capacity: 10ml *Service time: 8000 PUFFS *Nic Level: 3% *Charging port: Type C Battery Capacity: 500 mAh\r\n', 'CHILLAX NEO 8000 WATERMELON ICE FRIGID SPORE.png', ''),
(84, 1, 3, 'NEO 8000', 450, 'SWEET CARAMEL\r\n', 'SWEET TOBACCO\r\n', '10ML\r\n', '3%\r\n', '8000\r\n', 'Specifications: *E-lquid capacity: 10ml *Service time: 8000 PUFFS *Nic Level: 3% *Charging port: Type C Battery Capacity: 500 mAh\r\n', 'CHILLAX NEO 8000 SWEET CARAMEL SWEET TOBACCO.png', ''),
(85, 1, 1, 'AEROGIN 8000', 500, 'WATERMELON YOGURT COOL\r\n', 'PINK DELUDGE\r\n', '16ML\r\n', '5%\r\n', '8000\r\n', 'Aerogin 8000 Product Specifications: Nicotine: 5% Up to 8000 Puffs Material: Acrylic-Matte Capacity: 16ML Resistance: 1.2 Ohms Battery: 600mah USB Charging: USB -C\r\n', 'AEROGIN 8000 WATERMELON YOGURT.png', ''),
(86, 1, 1, 'AEROGIN 8000', 500, 'STRAWBERRY MARSHMALLOW MACAROONS\r\n', 'MR SMOOKIES\r\n', '16ML\r\n', '5%\r\n', '8000\r\n', 'Aerogin 8000 Product Specifications: Nicotine: 5% Up to 8000 Puffs Material: Acrylic-Matte Capacity: 16ML Resistance: 1.2 Ohms Battery: 600mah USB Charging: USB -C\r\n', 'AEROGIN 8000 STRAWBERRY MARSHMALLOW MR SMOOKIE.png', ''),
(87, 1, 1, 'AEROGIN 8000', 500, 'REFRESHING ALOE GRAPE JUICE ICE\r\n', 'FRESH PULP\r\n', '16ML\r\n', '5%\r\n', '8000\r\n', 'Aerogin 8000 Product Specifications: Nicotine: 5% Up to 8000 Puffs Material: Acrylic-Matte Capacity: 16ML Resistance: 1.2 Ohms Battery: 600mah USB Charging: USB -C\r\n', 'AEROGIN 8000 REFRESHINGG  ALOE GRAPES FRESH PULP.png', ''),
(88, 1, 1, 'AEROGIN 550 (VISCOSITY)', 500, 'GB SPECTRUM\r\n', 'RED BLUE\r\n', '10ML\r\n', '5%\r\n', '5500\r\n', 'Nicotine: 5% Up to 5500 Puffs Material: Acrylic-Glossy Capacity: 10 ML Resistance: 1.2 Ohms 850mah Battery Capacity USB Charging: USB -C\r\n', 'AEROGIN 5500 VISCOSITY RED BLUE GB SPECTRUM.png', ''),
(89, 1, 1, 'AEROGIN 550 (VISCOSITY)', 500, 'PURPLE SLUSH\r\n', 'PURPLE\r\n', '10ML\r\n', '5%\r\n', '5500\r\n', 'Nicotine: 5% Up to 5500 Puffs Material: Acrylic-Glossy Capacity: 10 ML Resistance: 1.2 Ohms 850mah Battery Capacity USB Charging: USB -C\r\n', 'AEROGIN 5500 VISCOSITY PURPLE SLUSH PURPLE.png', ''),
(90, 1, 1, 'AEROGIN 550 (VISCOSITY)', 500, 'LUSH ICE\r\n', 'PINK WHITE\r\n', '10ML\r\n', '5%\r\n', '5500\r\n', 'Nicotine: 5% Up to 5500 Puffs Material: Acrylic-Glossy Capacity: 10 ML Resistance: 1.2 Ohms 850mah Battery Capacity USB Charging: USB -C\r\n', 'AEROGIN 5500 VISCOSITY LUSH ICE PINK WHITE.png', ''),
(91, 1, 7, 'ELFBAR BC10000', 500, 'SKITTLES\r\n', 'RAINBOW FUSION\r\n', '18ML\r\n', '5%\r\n', '10000\r\n', '520 MAH, TYPE C CHARGING, MESH COIL\r\n', 'ELFBAR BC 10000 SKITTLES RAINBOW FLUSH.png', ''),
(92, 1, 7, 'ELFBAR BC10000', 500, 'BUBBLE GUM FLAVOR\r\n', 'REFRESHING RED BUBBLE\r\n', '18ML\r\n', '5%\r\n', '10000\r\n', '520 MAH, TYPE C CHARGING, MESH COIL\r\n', 'ELFBAR BC10000 LEMON ZESTY FIZZ.png', ''),
(93, 1, 7, 'ELFBAR BC10000', 500, 'LEMON\r\n', 'ZESTY FIZZ\r\n', '18ML\r\n', '5%\r\n', '10000\r\n', '520 MAH, TYPE C CHARGING, MESH COIL\r\n', 'ELFBAR BC10000 LEMON ZESTY FIZZ.png', ''),
(94, 1, 15, 'LXV 7500 DISPOSABLE VAPE', 600, 'AURORA BLVD\r\n', 'GREEN\r\n', '14ML\r\n', '5%\r\n', '7500\r\n', 'LXV 7500 Product Specifications: Nicotine: 5% Up to 7500 Puffs Material: Acrylic-Glossy Capacity: 14 ML Resistance: 1.2 Ohms Battery: 650mah USB Charging: USB -C\r\n', 'LXV 7500 AURORA BLVD GREEN.png', ''),
(95, 1, 15, 'LXV 7500 DISPOSABLE VAPE', 600, '14 ELEMENTS\r\n', 'VIOLET\r\n', '14ML\r\n', '5%\r\n', '7500\r\n', 'LXV 7500 Product Specifications: Nicotine: 5% Up to 7500 Puffs Material: Acrylic-Glossy Capacity: 14 ML Resistance: 1.2 Ohms Battery: 650mah USB Charging: USB -C\r\n', 'LXV 7500 14 ELEMENTS VIOLET.png', ''),
(96, 1, 15, 'LXV 7500 DISPOSABLE VAPE', 600, 'YASSI\r\n', 'YELLOW\r\n', '14ML\r\n', '5%\r\n', '7500\r\n', 'LXV 7500 Product Specifications: Nicotine: 5% Up to 7500 Puffs Material: Acrylic-Glossy Capacity: 14 ML Resistance: 1.2 Ohms Battery: 650mah USB Charging: USB -C\r\n', 'LXV 7500 YASSI YELLOW.png', '2024-06-02'),
(97, 1, 26, 'SNOWPLUS GO 10000 DISPOSABLE VAPE', 800, 'HAZELNUT COFFEE\r\n', 'BROWN\r\n', '10ML\r\n', '5%\r\n', '10000\r\n', 'Nicotine: 5% Up to 5500 Puffs Material: Acrylic-Glossy Capacity: 10 ML Resistance: 1.2 Ohms 850mah Battery Capacity USB Charging: USB -C\r\n', 'SNOWPLUS GO 10000 HAZELNUT COFFEE BROWN.png', ''),
(98, 1, 26, 'SNOWPLUS GO 10000 DISPOSABLE VAPE', 800, 'SALTED LEMONADE\r\n', 'CYAN\r\n', '10ML\r\n', '5%\r\n', '10000\r\n', 'Nicotine: 5% Up to 5500 Puffs Material: Acrylic-Glossy Capacity: 10 ML Resistance: 1.2 Ohms 850mah Battery Capacity USB Charging: USB -C\r\n', 'SNOWPLUS GO 10000 SALTED LEMONADE CYAN.png', ''),
(99, 1, 26, 'SNOWPLUS GO 10000 DISPOSABLE VAPE', 800, 'PEACH ICE\r\n', 'PINK\r\n', '10ML\r\n', '5%\r\n', '10000\r\n', 'Nicotine: 5% Up to 5500 Puffs Material: Acrylic-Glossy Capacity: 10 ML Resistance: 1.2 Ohms 850mah Battery Capacity USB Charging: USB -C\r\n', 'SNOWPLUS GO 10000 PEACH ICE PINK.png', ''),
(100, 1, 24, 'ETO BAR DISPOSABLE VAPE 8000', 800, 'STRAWBERRY ICE CREAM\r\n', 'PINK\r\n', '19ML\r\n', '5%\r\n', '8000\r\n', 'Smok Eto Bar Product Specifications: Up to 8000 Puffs 650mAh Battery Capacity Max 3.6V Output Mesh Coil Adjustable Airflow Control Type-C Fast Charging 42.52385.85mm Size 64.4g Weight\r\n', 'SMOK ETO BAR 8000 STRAWBERRY ICE CREAM PINK.png', ''),
(101, 1, 24, 'ETO BAR DISPOSABLE VAPE 8000', 800, 'COLA ICE\r\n', 'RED VIOLET\r\n', '19ML\r\n', '5%\r\n', '8000\r\n', 'Smok Eto Bar Product Specifications: Up to 8000 Puffs 650mAh Battery Capacity Max 3.6V Output Mesh Coil Adjustable Airflow Control Type-C Fast Charging 42.52385.85mm Size 64.4g Weight\r\n', 'SMOK ETO BAR 8000 COLA ICE RED VIOLET.png', ''),
(102, 1, 24, 'ETO BAR DISPOSABLE VAPE 8000', 800, 'CAPUCCINO\r\n', 'BROWN BLUE\r\n', '19ML\r\n', '5%\r\n', '8000\r\n', 'Smok Eto Bar Product Specifications: Up to 8000 Puffs 650mAh Battery Capacity Max 3.6V Output Mesh Coil Adjustable Airflow Control Type-C Fast Charging 42.52385.85mm Size 64.4g Weight\r\n', 'SMOK ETO BAR 8000 CAPUCCINO BROWN BLUE.png', ''),
(103, 1, 24, 'ETO BAR DISPOSABLE VAPE 8000', 800, 'MANGO ICE SMOOTHIE\r\n', 'YELLOW BLUE\r\n', '19ML\r\n', '5%\r\n', '8000\r\n', 'Smok Eto Bar Product Specifications: Up to 8000 Puffs 650mAh Battery Capacity Max 3.6V Output Mesh Coil Adjustable Airflow Control Type-C Fast Charging 42.52385.85mm Size 64.4g Weight\r\n', 'SMOK ETO BAR 8000 MANGO ICE SMOOTHIE YELLOW BLUE.png', ''),
(104, 2, 22, 'SAIKO VAPE JUICE', 1647.25, 'RED CURRANT FIG RASPBERRY\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Saiko Red Currant, Fig & Raspberry.png', ''),
(105, 2, 22, 'SAIKO VAPE JUICE', 1647.25, 'GRAPE ICE SUGARCANE\r\n', 'VIOLET\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Saiko Grape Ice & Sugarcane.png', ''),
(106, 2, 22, 'SAIKO VAPE JUICE', 1647.25, 'NECTARINE MANDARIN HONEY\r\n', 'ORANGE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Saiko Nectarine, Mandarin & Honey.png', ''),
(107, 2, 22, 'SAIKO VAPE JUICE', 1647.25, 'MANGO PASSIONFRUIT CRANBERRIES\r\n', 'YELLOW\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Saiko Mango Passionfruit Cranberries.png', ''),
(108, 2, 29, 'THIRSTY VAPE JUICE', 1372.25, 'GRAPE SODA\r\n', 'VIOLET\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Thirsty Vape Juice  Grape Soda.png', '2024-05-30'),
(109, 2, 29, 'THIRSTY VAPE JUICE', 1372.25, 'STRAWBERRY LEMONADE\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Thirsty Vape Juice  Strawberry Lemonade.png', ''),
(110, 2, 29, 'THIRSTY VAPE JUICE', 1372.25, 'SWEET MANGO\r\n', 'YELLOW\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Thirsty Vape Juice Sweet Mango.png', ''),
(111, 2, 29, 'THIRSTY VAPE JUICE', 1372.25, 'YOGURT DRINK\r\n', 'CREAM\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Thirsty Vape Juice Yoghurt Drink.png', '2024-06-03'),
(112, 2, 6, 'SUNNY SEASON', 1372.25, 'LIME MINT ICE CREAM\r\n', 'YELLOW GREEN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'EAST COAST SUNNY SEASON Lime Mint Icre Cream.png', ''),
(113, 2, 6, 'SUNNY SEASON', 1372.25, 'GREEN APPLE ICE\r\n', 'GREEN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'EAST COAST SUNNY SEASON Green Apple Ice.png', '2024-05-29'),
(114, 2, 6, 'SUNNY SEASON', 1372.25, 'GRAPE ICE\r\n', 'VIOLET\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'EAST COAST SUNNY SEASON Grape Ice.png', ''),
(115, 2, 6, 'SUNNY SEASON', 1372.25, 'MANGO ICE\r\n', 'YELLOW\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'EAST COAST SUNNY SEASON Mango Ice.png', ''),
(116, 2, 27, 'SUCH AS LIFE E LIQUIDS', 1372.25, 'HAZELNUT VCT\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SUCH AS LIFE E LIQUIDS Hazelnut VCT.png', '2024-06-06'),
(117, 2, 27, 'SUCH AS LIFE E LIQUIDS', 1372.25, 'DURRY\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SUCH AS LIFE E LIQUIDS Durry.png', ''),
(118, 2, 27, 'SUCH AS LIFE E LIQUIDS', 1372.25, 'CARAMEL TOBACCO\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SUCH AS LIFE E LIQUIDS Caramel Tobacco.png', ''),
(119, 2, 27, 'SUCH AS LIFE E LIQUIDS', 1372.25, 'BOURBON TOBACCO\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SUCH AS LIFE E LIQUIDS Bourbon Tobacco.png', ''),
(120, 2, 21, 'SADBOY ELIQUIDS', 1372.25, 'UNICORN TEARS\r\n', 'INDIGO\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SADBOY ELIQUIDS Unicorn Tears.png', ''),
(121, 2, 21, 'SADBOY ELIQUIDS', 1372.25, 'STRAWBERRY JAM COOKIE\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SADBOY ELIQUIDS Strawberry Jam Cookie.png', ''),
(122, 2, 21, 'SADBOY ELIQUIDS', 1372.25, 'CUSTARD COOKIE\r\n', 'PINK\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SADBOY ELIQUIDS Custard Cookie.png', ''),
(123, 2, 21, 'SADBOY ELIQUIDS', 1372.25, 'PUMPKIN COOKIE\r\n', 'YELLOW ORANGE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'SADBOY ELIQUIDS Pumpkin Cookie.png', ''),
(124, 2, 5, 'PANTHER SERIES', 1097.25, 'LYCHEE\r\n', 'YELLOW\r\n', '120ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 120ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'DR VAPES PANTHER SERIRES  Lychee-and-Exotic-Fruits.png', ''),
(125, 2, 5, 'PANTHER SERIES', 1097.25, 'BLUE RASPBERRY\r\n', 'BLUE\r\n', '120ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 120ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'DR VAPES PANTHER SERIRES Blue-Raspberry.png', ''),
(126, 2, 5, 'PANTHER SERIES', 1097.25, 'GRAPES\r\n', 'VIOLET\r\n', '120ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 120ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'DR VAPES PANTHER SERIRES Red-Dark-Green-Grape.png', ''),
(127, 2, 5, 'PANTHER SERIES', 1097.25, 'CREAMY TOBACCO\r\n', 'BLACK\r\n', '120ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 120ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'DR VAPES PANTHER SERIRES Creamy-Tobacco.png', ''),
(128, 2, 19, 'PACHA', 1867.25, 'WHITE PEACH ICE\r\n', 'PEACH\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'PACHA MAMA Pacha Juice - White Peach Ice.png', ''),
(129, 2, 19, 'PACHA', 1867.25, 'PINK BERRY ICE\r\n', 'PINK\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavors: Strawberry, Grapefruit, Raspberry with an Icy Kick! PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'PACHA MAMA Pacha Juice - Pink Berry.png', ''),
(130, 2, 19, 'PACHA', 1867.25, 'KIWI GUAVA PASSIONFRUIT\r\n', 'LIGHT GREEN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'PACHA MAMA Pacha Juice - Kiwi Guava Passionfruit.png', ''),
(131, 2, 19, 'PACHA', 1867.25, 'CHERRY LIMEADE\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'PACHA MAMA Pacha Juice - Cherry Limeade.png', ''),
(132, 2, 16, 'SWEETS', 1647.25, 'GRAPE SHERBET CANDY\r\n', 'VIOLET\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Grape Sherbet MEMORY LANE SWEETS.png', ''),
(133, 2, 16, 'SWEETS', 1647.25, 'BLACK CHERRY CANDY\r\n', 'MAROON\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'MEMORY LANE SWEETS Black Cherry Candy.png', ''),
(134, 2, 16, 'SWEETS', 1647.25, 'PINK STICKS\r\n', 'PINK\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavors: Musk Sticks PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Pink Sticks MEMORY LANE SWEETS.png', ''),
(135, 2, 16, 'SWEETS', 1647.25, 'RASPBERRY CHEWS\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Raspberry Chews MEMORY LANE SWEETS.png', ''),
(136, 2, 14, 'KILO REVIVAL ELIQUIDS', 1097.25, 'MANGO GUAVA\r\n', 'LIGHT GREEN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Mango Guava KILO REVIVAL ELIQUIDS.png', ''),
(137, 2, 14, 'KILO REVIVAL ELIQUIDS', 1097.25, 'FRUIT CERIAL MILK\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'FRUIT Cereal Milk KILO REVIVAL ELIQUIDS.png', ''),
(138, 2, 14, 'KILO REVIVAL ELIQUIDS', 1097.25, 'MIX BERRIES\r\n', 'INDIGO\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavours: Strawberry, Blueberry, Raspberry PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Mixed Berries KILO REVIVAL ELIQUIDS.png', ''),
(139, 2, 14, 'KILO REVIVAL ELIQUIDS', 1097.25, 'APPLE WATERMELON\r\n', 'RED\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 100ml Chubby Gorilla Unicorn Bottle\r\n', 'Apple Watermelon KILO REVIVAL ELIQUIDS.png', ''),
(140, 2, 8, 'FUJI', 1867.25, 'APPLE BANANA\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Apple Banana FRANK AND ATTIC FUJI.png', ''),
(141, 2, 8, 'FUJI', 1867.25, 'APPLE LIME\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Apple Lime FRANK AND ATTIC FUJI.png', ''),
(142, 2, 8, 'FUJI', 1867.25, 'APPLE NECTARINE\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Apple Nectarine FRANK AND ATTIC FUJI.png', ''),
(143, 2, 8, 'FUJI', 1867.25, 'APPLE STRAWBERRY\r\n', 'WHITE\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Apple Strawberry FRANK AND ATTIC FUJI.png', ''),
(144, 2, 4, 'CUSHTY E LIQUIDS', 1867.25, 'MANGO AND GRAPE\r\n', 'CREAM\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavors: Sweet Mango and Grape, Menthol PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Mango and Grape CUSHTY E LIQUIDS.png', ''),
(145, 2, 4, 'CUSHTY E LIQUIDS', 1867.25, 'MANGO AND STRAWBERRY\r\n', 'CREAM\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Mango and Strawberry CUSHTY E LIQUIDS.png', ''),
(146, 2, 4, 'CUSHTY E LIQUIDS', 1867.25, 'MANGO AND LYCHEE\r\n', 'CREAM\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Mango and Lychee CUSHTY E LIQUIDS.png', ''),
(147, 2, 4, 'CUSHTY E LIQUIDS', 1867.25, 'MANGO AND PINEAPPLE\r\n', 'BLACK\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Mango and Pineapple CUSHTY E LIQUIDS.png', ''),
(148, 2, 4, 'CUSHTY E LIQUIDS', 1867.25, 'MANGO AND BANANA\r\n', 'BLACK\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Mango and Banana CUSHTY E LIQUIDS.png', ''),
(149, 2, 28, 'DAILY GRIND E LIQUIDS', 1647.25, 'VANILLA ICED COFFEE\r\n', 'LIGHT BROWN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Vanilla Iced Coffee THE DAILY GRIND.png', ''),
(150, 2, 28, 'DAILY GRIND E LIQUIDS', 1647.25, 'TOFFEE NUT LATTE\r\n', 'DARK BROWN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavours:  Toffee, Hazelnut, Coffee, Milk PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Toffee Nut Latte THE DAILY GRIND.png', ''),
(151, 2, 4, 'DAILY GRIND E LIQUIDS', 1647.25, 'SALTED CARAMEL CAPPUCINO\r\n', 'YELLOW\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavours:  Toffee, Hazelnut, Coffee, Milk PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'Salted Caramel Cappuccino THE DAILY GRIND.png', ''),
(152, 2, 28, 'DAILY GRIND E LIQUIDS', 1647.25, 'WHITE CHOCOLATE PEPPERMINT LATTE\r\n', 'CYAN\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'White Chocolate Peppermint Latte THE DAILY GRIND.png', ''),
(153, 2, 4, 'DAILY GRIND E LIQUIDS', 1647.25, 'PGT LEMONADE\r\n', 'MUSTARD\r\n', '100ML\r\n', 'NULL\r\n', 'NULL\r\n', 'Primary Flavours:  Peach, Green Tea, Lemonade PG/VG Ratio: 70 VG / 30 PG Bottle Sizes: 100ml Bottle Type: 120ml Chubby Gorilla Unicorn Bottle\r\n', 'PGT Lemonade THE DAILY GRIND.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status_tbl`
--

CREATE TABLE `transaction_status_tbl` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_status_tbl`
--

INSERT INTO `transaction_status_tbl` (`status_id`, `status_name`) VALUES
(1, 'PENDING'),
(2, 'PROCESSING'),
(3, 'OUT FOR DELIVERY'),
(4, 'DELIVERED');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `mobile_number` int(255) NOT NULL,
  `sub_total` float(255,2) DEFAULT 0.00,
  `shipping_fee` float(255,2) NOT NULL DEFAULT 0.00,
  `delivery_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_tbl`
--

INSERT INTO `transaction_tbl` (`transaction_id`, `customer_id`, `shipping_address`, `mobile_number`, `sub_total`, `shipping_fee`, `delivery_id`, `transaction_date`, `status_id`) VALUES
(1, 2, 'a-b-c', 16, 1379.97, 45.00, 4, '2024-06-04', 1),
(2, 18, 'asdawdadawd', 35124312, 590.00, 2343.00, 2, '2024-06-05', 4),
(3, 6, 'agsggwgaeg', 1234135135, 11970.00, 234.00, 2, '2024-06-05', 1),
(4, 11, 'Address 65', 1234567890, 5000.00, 0.00, 4, '2024-01-24', 3),
(5, 8, 'Address 22', 1234567890, 2700.00, 0.00, 1, '2023-07-15', 4),
(6, 4, 'Address 40', 1234567890, 9605.75, 0.00, 2, '2024-02-08', 3),
(7, 4, 'Address 67', 1234567890, 8236.25, 0.00, 5, '2023-07-25', 2),
(8, 10, 'Address 43', 1234567890, 2200.00, 0.00, 4, '2023-01-17', 1),
(9, 17, 'Address 53', 1234567890, 5841.00, 0.00, 1, '2023-07-24', 2),
(10, 14, 'Address 37', 1234567890, 2400.00, 0.00, 4, '2023-11-14', 4),
(11, 6, 'Address 92', 1234567890, 4840.00, 0.00, 4, '2023-01-19', 4),
(12, 9, 'Address 34', 1234567890, 3025.00, 0.00, 3, '2023-03-24', 2),
(13, 1, 'Address 61', 1234567890, 5310.00, 0.00, 5, '2023-01-19', 2),
(14, 5, 'Address 26', 1234567890, 19950.00, 0.00, 4, '2023-08-12', 1),
(15, 18, 'Address 74', 1234567890, 3219.93, 0.00, 1, '2024-03-04', 1),
(16, 1, 'Address 87', 1234567890, 2244.46, 0.00, 2, '2023-08-20', 3),
(17, 15, 'Address 72', 1234567890, 1956.06, 0.00, 3, '2023-02-01', 4),
(18, 15, 'Address 70', 1234567890, 2244.46, 0.00, 2, '2023-06-25', 4),
(19, 4, 'Address 36', 1234567890, 1180.00, 0.00, 2, '2023-05-09', 2),
(20, 10, 'Address 99', 1234567890, 825.00, 0.00, 3, '2024-01-19', 1),
(21, 3, 'Address 44', 1234567890, 2700.00, 0.00, 5, '2023-12-29', 1),
(22, 6, 'Address 17', 1234567890, 29588.35, 0.00, 5, '2023-09-12', 2),
(23, 17, 'Address 66', 1234567890, 1650.00, 0.00, 5, '2023-08-09', 2),
(24, 3, 'Address 22', 1234567890, 2420.00, 0.00, 4, '2024-01-27', 3),
(25, 7, 'Address 59', 1234567890, 2640.00, 0.00, 5, '2023-12-11', 3),
(26, 6, 'Address 43', 1234567890, 919.98, 0.00, 2, '2023-04-09', 1),
(27, 16, 'Address 76', 1234567890, 13466.76, 0.00, 2, '2023-12-12', 1),
(28, 17, 'Address 65', 1234567890, 15711.22, 0.00, 4, '2024-03-06', 4),
(29, 18, 'Address 69', 1234567890, 3990.00, 0.00, 5, '2023-05-16', 3),
(30, 15, 'Address 61', 1234567890, 3594.00, 0.00, 4, '2023-03-15', 2),
(31, 6, 'Address 27', 1234567890, 1815.00, 0.00, 3, '2023-02-18', 3),
(32, 7, 'Address 48', 1234567890, 3219.93, 0.00, 3, '2023-11-07', 4),
(33, 1, 'Address 89', 1234567890, 1500.00, 0.00, 2, '2024-03-30', 2),
(34, 13, 'Address 78', 1234567890, 13466.76, 0.00, 5, '2023-11-24', 1),
(35, 1, 'Address 54', 1234567890, 2420.00, 0.00, 4, '2023-10-24', 4),
(36, 20, 'Address 6', 1234567890, 4050.00, 0.00, 2, '2023-12-09', 1),
(37, 20, 'Address 38', 1234567890, 495.00, 0.00, 5, '2023-09-08', 3),
(38, 15, 'Address 64', 1234567890, 250.00, 0.00, 1, '2023-08-17', 4),
(39, 13, 'Address 12', 1234567890, 11222.30, 0.00, 4, '2023-06-16', 2),
(40, 1, 'Address 4', 1234567890, 18310.05, 0.00, 1, '2024-05-23', 4),
(41, 6, 'Address 83', 1234567890, 13965.00, 0.00, 2, '2023-01-15', 2),
(42, 4, 'Address 8', 1234567890, 1250.00, 0.00, 5, '2023-02-16', 4),
(43, 2, 'Address 75', 1234567890, 15960.00, 0.00, 3, '2023-06-08', 1),
(44, 2, 'Address 48', 1234567890, 14241.15, 0.00, 1, '2023-01-20', 4),
(45, 9, 'Address 34', 1234567890, 450.00, 0.00, 3, '2023-06-12', 1),
(46, 18, 'Address 83', 1234567890, 12500.00, 0.00, 3, '2023-05-14', 3),
(47, 9, 'Address 31', 1234567890, 5500.00, 0.00, 2, '2023-02-09', 4),
(48, 13, 'Address 90', 1234567890, 3025.00, 0.00, 3, '2023-02-09', 3),
(49, 8, 'Address 62', 1234567890, 8802.27, 0.00, 1, '2023-06-12', 2),
(50, 8, 'Address 48', 1234567890, 1500.00, 0.00, 2, '2024-04-01', 3),
(51, 8, 'Address 98', 1234567890, 5391.00, 0.00, 5, '2023-04-17', 3),
(52, 2, 'Address 78', 1234567890, 1039.50, 0.00, 4, '2024-03-26', 2),
(53, 10, 'Address 16', 1234567890, 6846.21, 0.00, 2, '2023-05-04', 1),
(54, 2, 'Address 94', 1234567890, 660.00, 0.00, 3, '2023-07-18', 3),
(55, 17, 'Address 33', 1234567890, 8233.50, 0.00, 1, '2024-04-04', 4),
(56, 17, 'Address 35', 1234567890, 1995.00, 0.00, 2, '2023-11-28', 1),
(57, 19, 'Address 16', 1234567890, 22444.60, 0.00, 5, '2023-07-15', 4),
(58, 16, 'Address 92', 1234567890, 1180.00, 0.00, 2, '2023-10-28', 1),
(59, 15, 'Address 30', 1234567890, 660.00, 0.00, 2, '2024-01-11', 3),
(60, 2, 'Address 51', 1234567890, 9875.25, 0.00, 2, '2024-02-09', 1),
(61, 4, 'Address 67', 1234567890, 1155.00, 0.00, 4, '2023-11-28', 1),
(62, 3, 'Address 69', 1234567890, 2420.00, 0.00, 5, '2024-04-13', 3),
(63, 19, 'Address 8', 1234567890, 47341.36, 0.00, 3, '2023-12-22', 3),
(64, 6, 'Address 46', 1234567890, 8800.00, 0.00, 2, '2023-10-16', 3),
(65, 10, 'Address 41', 1234567890, 1815.00, 0.00, 4, '2023-01-14', 1),
(66, 18, 'Address 86', 1234567890, 0.00, 0.00, 4, '2023-11-04', 1),
(67, 10, 'Address 24', 1234567890, 22000.00, 0.00, 4, '2023-01-30', 1),
(68, 19, 'Address 59', 1234567890, 11000.00, 0.00, 1, '2023-01-04', 1),
(69, 17, 'Address 39', 1234567890, 9780.30, 0.00, 3, '2023-05-30', 4),
(70, 19, 'Address 81', 1234567890, 13965.00, 0.00, 2, '2023-12-05', 3),
(71, 3, 'Address 70', 1234567890, 5445.00, 0.00, 1, '2023-12-31', 1),
(72, 1, 'Address 9', 1234567890, 4488.92, 0.00, 2, '2023-08-21', 1),
(73, 14, 'Address 82', 1234567890, 1250.00, 0.00, 1, '2023-11-23', 1),
(74, 12, 'Address 58', 1234567890, 4720.00, 0.00, 1, '2023-03-15', 1),
(75, 10, 'Address 87', 1234567890, 17955.68, 0.00, 5, '2024-02-15', 2),
(76, 4, 'Address 99', 1234567890, 4941.75, 0.00, 2, '2024-04-16', 2),
(77, 7, 'Address 50', 1234567890, 5940.00, 0.00, 3, '2024-01-01', 1),
(78, 18, 'Address 78', 1234567890, 1800.00, 0.00, 2, '2024-04-25', 4),
(79, 12, 'Address 22', 1234567890, 1350.00, 0.00, 2, '2023-04-21', 4),
(80, 3, 'Address 81', 1234567890, 4400.00, 0.00, 4, '2023-12-22', 3),
(81, 15, 'Address 97', 1234567890, 1500.00, 0.00, 4, '2023-06-27', 4),
(82, 16, 'Address 71', 1234567890, 5868.18, 0.00, 1, '2023-09-25', 1),
(83, 8, 'Address 41', 1234567890, 7980.00, 0.00, 5, '2023-02-10', 4),
(84, 17, 'Address 66', 1234567890, 5940.00, 0.00, 5, '2023-03-01', 1),
(85, 6, 'Address 8', 1234567890, 10000.00, 0.00, 3, '2023-06-14', 1),
(86, 7, 'Address 43', 1234567890, 605.00, 0.00, 1, '2023-11-06', 2),
(87, 10, 'Address 1', 1234567890, 3750.00, 0.00, 4, '2023-01-18', 2),
(88, 12, 'Address 97', 1234567890, 11250.00, 0.00, 1, '2023-06-12', 2),
(89, 5, 'Address 77', 1234567890, 2360.00, 0.00, 2, '2024-02-04', 1),
(90, 13, 'Address 58', 1234567890, 1155.00, 0.00, 1, '2023-06-16', 3),
(91, 18, 'Address 72', 1234567890, 17753.01, 0.00, 5, '2023-09-28', 4),
(92, 9, 'Address 66', 1234567890, 2950.00, 0.00, 1, '2023-05-14', 1),
(93, 20, 'Address 50', 1234567890, 6846.21, 0.00, 3, '2023-02-10', 4),
(94, 1, 'Address 51', 1234567890, 1647.25, 0.00, 3, '2024-05-22', 2),
(95, 19, 'Address 61', 1234567890, 660.00, 0.00, 1, '2023-03-08', 1),
(96, 20, 'Address 70', 1234567890, 4400.00, 0.00, 3, '2023-11-12', 2),
(97, 5, 'Address 89', 1234567890, 47341.36, 0.00, 4, '2023-03-20', 2),
(98, 18, 'Address 5', 1234567890, 11530.75, 0.00, 3, '2023-12-21', 3),
(99, 11, 'Address 47', 1234567890, 2100.00, 0.00, 4, '2023-07-10', 3),
(100, 17, 'Address 27', 1234567890, 29588.35, 0.00, 5, '2024-02-12', 1),
(101, 10, 'Address 98', 1234567890, 20200.14, 0.00, 2, '2023-01-16', 4),
(102, 16, 'Address 5', 1234567890, 5445.00, 0.00, 5, '2023-03-12', 1),
(103, 3, 'Address 26', 1234567890, 3294.50, 0.00, 5, '2024-03-31', 3),
(104, 7, 'Address 85', 1234567890, 1925.00, 0.00, 2, '2024-03-09', 2),
(105, 4, 'Address 80', 1234567890, 1320.00, 0.00, 3, '2023-02-26', 1),
(106, 19, 'Address 52', 1234567890, 1500.00, 0.00, 4, '2023-06-13', 2),
(107, 7, 'Address 93', 1234567890, 495.00, 0.00, 4, '2023-06-08', 3),
(108, 9, 'Address 13', 1234567890, 2200.00, 0.00, 2, '2023-07-28', 4),
(109, 10, 'Address 55', 1234567890, 6600.00, 0.00, 2, '2024-04-23', 3),
(110, 12, 'Address 86', 1234567890, 2744.50, 0.00, 3, '2023-05-09', 3),
(111, 20, 'Address 27', 1234567890, 2200.00, 0.00, 2, '2023-02-01', 1),
(112, 17, 'Address 49', 1234567890, 660.00, 0.00, 5, '2023-07-12', 4),
(113, 14, 'Address 47', 1234567890, 825.00, 0.00, 2, '2023-05-16', 2),
(114, 16, 'Address 89', 1234567890, 330.00, 0.00, 1, '2023-02-04', 4),
(115, 6, 'Address 74', 1234567890, 3540.00, 0.00, 5, '2024-05-02', 1),
(116, 4, 'Address 20', 1234567890, 6846.21, 0.00, 3, '2024-04-14', 1),
(117, 8, 'Address 90', 1234567890, 5280.00, 0.00, 2, '2024-02-05', 4),
(118, 12, 'Address 5', 1234567890, 500.00, 0.00, 3, '2023-02-15', 1),
(119, 5, 'Address 90', 1234567890, 660.00, 0.00, 4, '2023-04-04', 3),
(120, 7, 'Address 85', 1234567890, 35506.02, 0.00, 2, '2024-04-25', 3),
(121, 19, 'Address 34', 1234567890, 6846.21, 0.00, 5, '2023-12-20', 3),
(122, 19, 'Address 82', 1234567890, 2299.95, 0.00, 2, '2023-03-29', 4),
(123, 18, 'Address 66', 1234567890, 990.00, 0.00, 4, '2023-11-20', 4),
(124, 18, 'Address 56', 1234567890, 2244.46, 0.00, 1, '2024-04-24', 2),
(125, 11, 'Address 91', 1234567890, 53259.03, 0.00, 5, '2024-04-24', 4),
(126, 6, 'Address 7', 1234567890, 1500.00, 0.00, 3, '2024-04-21', 2),
(127, 16, 'Address 6', 1234567890, 2400.00, 0.00, 5, '2023-04-30', 3),
(128, 18, 'Address 82', 1234567890, 495.00, 0.00, 3, '2024-03-24', 4),
(129, 1, 'Address 46', 1234567890, 1000.00, 0.00, 1, '2023-05-26', 1),
(130, 5, 'Address 6', 1234567890, 47341.36, 0.00, 4, '2024-05-11', 4),
(131, 13, 'Address 40', 1234567890, 3750.00, 0.00, 1, '2023-08-21', 4),
(132, 19, 'Address 8', 1234567890, 9780.30, 0.00, 3, '2024-01-26', 4),
(133, 12, 'Address 90', 1234567890, 4500.00, 0.00, 5, '2023-07-14', 2),
(134, 1, 'Address 92', 1234567890, 165.00, 0.00, 3, '2023-08-07', 4),
(135, 16, 'Address 46', 1234567890, 1647.25, 0.00, 5, '2023-08-06', 1),
(136, 17, 'Address 51', 1234567890, 2200.00, 0.00, 1, '2024-01-16', 2),
(137, 6, 'Address 98', 1234567890, 590.00, 0.00, 1, '2023-02-17', 2),
(138, 19, 'Address 30', 1234567890, 6600.00, 0.00, 4, '2023-12-20', 2),
(139, 5, 'Address 34', 1234567890, 20200.14, 0.00, 1, '2023-04-14', 4),
(140, 15, 'Address 2', 1234567890, 17955.68, 0.00, 5, '2023-08-30', 3),
(141, 15, 'Address 67', 1234567890, 23670.68, 0.00, 1, '2024-05-27', 2),
(142, 16, 'Address 77', 1234567890, 13722.50, 0.00, 3, '2023-08-24', 3),
(143, 15, 'Address 75', 1234567890, 330.00, 0.00, 3, '2023-11-15', 2),
(144, 19, 'Address 55', 1234567890, 17955.68, 0.00, 5, '2023-03-13', 4),
(145, 15, 'Address 14', 1234567890, 3894.00, 0.00, 3, '2023-03-17', 1),
(146, 11, 'Address 3', 1234567890, 3540.00, 0.00, 3, '2024-01-13', 4),
(147, 12, 'Address 97', 1234567890, 3500.00, 0.00, 1, '2024-02-01', 2),
(148, 17, 'Address 78', 1234567890, 8233.50, 0.00, 3, '2024-05-20', 1),
(149, 10, 'Address 86', 1234567890, 4488.92, 0.00, 5, '2024-04-12', 4),
(150, 9, 'Address 55', 1234567890, 15711.22, 0.00, 3, '2024-06-02', 2),
(151, 1, 'Address 88', 1234567890, 1155.00, 0.00, 2, '2023-02-25', 2),
(152, 2, 'Address 4', 1234567890, 1500.00, 0.00, 5, '2023-07-03', 1),
(153, 8, 'Address 56', 1234567890, 3600.00, 0.00, 4, '2024-02-24', 4),
(154, 6, 'Address 60', 1234567890, 3025.00, 0.00, 1, '2024-04-29', 1),
(155, 6, 'Address 71', 1234567890, 1500.00, 0.00, 4, '2023-08-18', 1),
(156, 2, 'Address 9', 1234567890, 2700.00, 0.00, 2, '2024-04-29', 4),
(157, 19, 'Address 70', 1234567890, 17955.00, 0.00, 4, '2024-03-17', 4),
(158, 16, 'Address 38', 1234567890, 1320.00, 0.00, 3, '2023-05-17', 4),
(159, 13, 'Address 56', 1234567890, 4488.92, 0.00, 5, '2023-10-13', 1),
(160, 9, 'Address 43', 1234567890, 2304.00, 0.00, 5, '2023-04-29', 2),
(161, 10, 'Address 8', 1234567890, 0.00, 0.00, 5, '2023-08-30', 3),
(162, 4, 'Address 35', 1234567890, 0.00, 0.00, 1, '2024-04-10', 4),
(163, 18, 'Address 75', 1234567890, 825.00, 0.00, 1, '2024-03-25', 2),
(164, 15, 'Address 85', 1234567890, 1320.00, 0.00, 1, '2023-11-26', 1),
(165, 9, 'Address 93', 1234567890, 35506.02, 0.00, 2, '2024-04-23', 3),
(166, 4, 'Address 3', 1234567890, 13200.00, 0.00, 4, '2023-04-01', 4),
(167, 3, 'Address 78', 1234567890, 22000.00, 0.00, 3, '2023-08-30', 3),
(168, 16, 'Address 6', 1234567890, 2400.00, 0.00, 5, '2023-07-14', 1),
(169, 12, 'Address 42', 1234567890, 19800.00, 0.00, 2, '2024-01-03', 2),
(170, 13, 'Address 9', 1234567890, 649.00, 0.00, 3, '2023-09-26', 4),
(171, 1, 'Address 36', 1234567890, 1800.00, 0.00, 4, '2023-10-16', 3),
(172, 7, 'Address 84', 1234567890, 1650.00, 0.00, 1, '2023-08-23', 3),
(173, 2, 'Address 30', 1234567890, 17955.68, 0.00, 2, '2023-07-31', 2),
(174, 2, 'Address 57', 1234567890, 3600.00, 0.00, 4, '2023-06-25', 4),
(175, 8, 'Address 17', 1234567890, 8250.00, 0.00, 4, '2023-06-13', 2),
(176, 10, 'Address 43', 1234567890, 3219.93, 0.00, 4, '2023-11-05', 3),
(177, 9, 'Address 17', 1234567890, 5985.00, 0.00, 3, '2023-08-29', 3),
(178, 5, 'Address 66', 1234567890, 4068.90, 0.00, 3, '2024-01-17', 1),
(179, 20, 'Address 88', 1234567890, 1250.00, 0.00, 2, '2023-06-27', 3),
(180, 12, 'Address 34', 1234567890, 1210.00, 0.00, 5, '2024-02-05', 4),
(181, 12, 'Address 88', 1234567890, 660.00, 0.00, 4, '2024-02-24', 4),
(182, 10, 'Address 40', 1234567890, 1200.00, 0.00, 3, '2024-01-10', 4),
(183, 2, 'Address 91', 1234567890, 3600.00, 0.00, 2, '2023-12-02', 2),
(184, 1, 'Address 3', 1234567890, 22444.60, 0.00, 1, '2023-01-09', 1),
(185, 1, 'Address 13', 1234567890, 4193.00, 0.00, 3, '2023-03-16', 1),
(186, 13, 'Address 45', 1234567890, 35506.02, 0.00, 3, '2023-12-14', 1),
(187, 13, 'Address 78', 1234567890, 0.00, 0.00, 5, '2023-12-02', 1),
(188, 5, 'Address 50', 1234567890, 0.00, 0.00, 4, '2023-05-15', 1),
(189, 10, 'Address 26', 1234567890, 1320.00, 0.00, 5, '2023-06-25', 1),
(190, 3, 'Address 100', 1234567890, 1815.00, 0.00, 3, '2024-02-26', 2),
(191, 9, 'Address 9', 1234567890, 1320.00, 0.00, 1, '2023-06-02', 1),
(192, 16, 'Address 51', 1234567890, 11970.00, 0.00, 1, '2023-06-21', 1),
(193, 15, 'Address 29', 1234567890, 8250.00, 0.00, 1, '2023-01-20', 3),
(194, 4, 'Address 91', 1234567890, 6600.00, 0.00, 1, '2023-06-21', 3),
(195, 2, 'Address 58', 1234567890, 6600.00, 0.00, 4, '2023-07-07', 4),
(196, 14, 'Address 49', 1234567890, 2194.50, 0.00, 3, '2023-12-26', 1),
(197, 15, 'Address 16', 1234567890, 1732.50, 0.00, 3, '2023-10-01', 4),
(198, 12, 'Address 33', 1234567890, 1839.96, 0.00, 5, '2023-12-26', 3),
(199, 5, 'Address 6', 1234567890, 3750.00, 0.00, 4, '2023-03-31', 4),
(200, 16, 'Address 25', 1234567890, 2640.00, 0.00, 5, '2024-05-26', 1),
(201, 9, 'Address 89', 1234567890, 20200.14, 0.00, 1, '2023-02-16', 1),
(202, 16, 'Address 75', 1234567890, 4000.00, 0.00, 3, '2023-04-16', 3),
(203, 3, 'Address 91', 1234567890, 4720.00, 0.00, 1, '2023-05-26', 4),
(204, 4, 'Address 50', 1234567890, 990.00, 0.00, 5, '2023-03-13', 4),
(205, 4, 'Address 3', 1234567890, 1770.00, 0.00, 4, '2023-05-23', 2),
(206, 20, 'Address 75', 1234567890, 4720.00, 0.00, 5, '2023-01-17', 3),
(207, 18, 'Address 54', 1234567890, 990.00, 0.00, 1, '2024-02-06', 3),
(208, 18, 'Address 47', 1234567890, 8977.84, 0.00, 4, '2023-02-10', 2),
(209, 7, 'Address 64', 1234567890, 1650.00, 0.00, 2, '2023-04-25', 2),
(210, 10, 'Address 11', 1234567890, 459.99, 0.00, 1, '2023-04-04', 3),
(211, 9, 'Address 41', 1234567890, 2420.00, 0.00, 4, '2023-05-22', 2),
(212, 11, 'Address 86', 1234567890, 4000.00, 0.00, 4, '2024-03-13', 1),
(213, 5, 'Address 79', 1234567890, 3000.00, 0.00, 1, '2023-08-28', 4),
(262, 2, '  ', 0, 2900.40, 45.00, 1, '2024-06-05', 1),
(263, 2, '  ', 0, 2900.40, 45.00, 1, '2024-06-05', 1),
(264, 2, '  ', 0, 2900.40, 45.00, 1, '2024-06-05', 1),
(265, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(266, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(267, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(272, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(273, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(274, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(275, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(297, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-05', 1),
(298, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(299, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(300, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(301, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(302, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(303, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(304, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(305, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(306, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(307, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(308, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(309, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(310, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(311, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(312, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(313, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(314, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(315, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(316, 2, 'adasda sas 123123 asdas', 123123, 0.00, 45.00, 2, '2024-06-05', 1),
(317, 2, '  ', 0, 165.00, 45.00, 1, '2024-06-06', 1),
(318, 2, '  ', 0, 165.00, 45.00, 1, '2024-06-06', 1),
(319, 2, '  ', 0, 165.00, 45.00, 1, '2024-06-06', 1),
(320, 2, '  ', 0, 165.00, 45.00, 1, '2024-06-06', 1),
(321, 2, '  ', 0, 0.00, 45.00, 1, '2024-06-06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`email_address`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_product_id` (`product_id`),
  ADD KEY `fk_cart_customer_id` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`costumer_id`),
  ADD UNIQUE KEY `username` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `delivery_modes`
--
ALTER TABLE `delivery_modes`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `transaction_status_tbl`
--
ALTER TABLE `transaction_status_tbl`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `delivery_modes`
--
ALTER TABLE `delivery_modes`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1228;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `transaction_status_tbl`
--
ALTER TABLE `transaction_status_tbl`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `fk_cart_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  ADD CONSTRAINT `inventory_tbl_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_tbl` (`transaction_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);

--
-- Constraints for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD CONSTRAINT `transaction_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`costumer_id`),
  ADD CONSTRAINT `transaction_tbl_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `delivery_modes` (`delivery_id`),
  ADD CONSTRAINT `transaction_tbl_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `transaction_status_tbl` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
