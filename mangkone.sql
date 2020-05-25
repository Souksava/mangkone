-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2020 at 04:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangkone`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_no`
--

CREATE TABLE `acc_no` (
  `acc_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `acc_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_no`
--

INSERT INTO `acc_no` (`acc_id`, `acc_name`, `unit_id`) VALUES
('10110000', 'ທຶນຈົດທະບຽນທີ່ຖອກແລ້ວ', 35),
('14100000', 'ຜົນໄດ້ຮັບ ໃນປີ:ກຳໄລ(+) ຂາດທຶນ (-)', 40),
('14900000', 'ຂາດທຶນຂອງປີກ່ອນ', 40),
('21830000', 'ວັດຖຸແອງຟອກມາຕິກ', 23),
('21840000', 'ເຄື່ອງມືໃຊ້ສຳນັກງານ', 23),
('28183000', 'ຄ່າຫຼຸ້ຍຫ້ຽນວັດຖຸແອງຟອກມາຕິກ', 23),
('28184000', 'ຄ່າຫຼູ້ຍຫ້ຽນເຄື່ອງໃຊ້ສຳນັກງານ', 23),
('42310000', 'ລູກຄ້າ ພ/ທ ຂາຍສິນຄ້າ ແລະ ຈ້າງບໍລິການ', 48),
('44100000', 'ພ/ງ ຄ່າທົດແທນແຮງງານຕ້ອງສະສາງ', 48),
('46210000', 'ລັດ ອາກອນເງິນເດືອນ', 48),
('46410000', 'ອາກອນກຳໄລມອງລ່ວງໜ້າ', 29),
('46550000', 'ອ ມ ພ ທີ່ຕ້ອງຈ່າຍ', 48),
('46570000', 'ອ ມ ພ ທີ່ເກັບໄດ້', 48),
('47570000', 'ຢືມເງິນຂາຫຸ້ນ', 52),
('55210000', 'ເງິນຝາກທະນາຄານການຄ້າ ໂດລາ', 33),
('57110000', 'ຄັງເງິນສົດ ເປັນເງິນກີບ', 34),
('57120000', 'ຄັງເງິນສົດ ເປັນເງິນຕາ ຕ/ທ ບາດ', 34),
('59000000', 'ໂອນເງິນບັນຊີພາຍໃນ', 34),
('61731000', 'ຊື້ນ້ຳມັນເຊື້ອໄຟຍ່ອຍ', 13),
('61733000', 'ຊື້ເຄື່ອງໃຊ້ຫ້ອງການ', 13),
('61734000', 'ຊື້ອາຫານ ແລະ ເຄື່ອງດື່ມ ພ/ງ', 13),
('61735000', 'ຄ່າໄຟຟ້າ', 13),
('61736000', 'ຄ່ານ້ຳປະປາ ແລະ ນ້ຳດື່ມ', 13),
('62100000', 'ຄ່າຊື້ອິນເຕີເນັດ', 13),
('62130000', 'ຄ່າເຊົ່າສະຖານທີ ຫ້ອງການ', 13),
('62451000', 'ຄ່າທຳນຽມທະນາຄານ', 13),
('62452000', 'ຄ່າບໍລິການບັນຊີ', 13),
('62500000', 'ຄ່າຂົນສົ່ງ ແລະ ຄ່າເດີນທາງ', 13),
('62550000', 'ຄ່າໃຊ້ຈ່າຍ ເດີນທາງ', 13),
('62810000', 'ຄ່າໄປສະນີ ແລະ ໂທລະຄົມມະນາຄົມ', 13),
('62880000', 'ລາຍຈ່າຍອື່ນໆ', 13),
('63700000', 'ຄ່າທຳນຽມ ແລະ ອາກອນສະແຕມ', 14),
('64100000', 'ເງິນເດືອນພື້ນຖານ', 15),
('66300000', 'ຂາດທຶນຈາກການ ລ/ປ ເງິນຕາ ຕ/ທ', 19),
('68200000', 'ຫັກຄ່າຫຼ/ຫ ຊ/ບ ຄົງທີ່ໃນ ທ/ກ', 16),
('69100000', 'ຊື້ເຄື່ອງເຂົ້າສາງ', 13),
('71410000', 'ຮັບຈາກການບໍລິການ', 6),
('76100000', 'ລາຍໄດ້ຈາກການໃຫ້ກູ້ຢືມ ແລະ ໜີ້ຕ້ອງຮັບ', 10),
('76300000', 'ກຳໄລຈາກການ ລ/ປ ເງິນຕາ ຕ/ທ', 10);

-- --------------------------------------------------------

--
-- Table structure for table `acc_product`
--

CREATE TABLE `acc_product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `price_us` decimal(11,2) DEFAULT NULL,
  `price_baht` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_product`
--

INSERT INTO `acc_product` (`pro_id`, `pro_name`, `price`, `price_us`, `price_baht`) VALUES
(1, 'Lease Line', '2000.00', '2000.00', '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `acc_property`
--

CREATE TABLE `acc_property` (
  `ppy_id` int(11) NOT NULL,
  `ppy_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_property`
--

INSERT INTO `acc_property` (`ppy_id`, `ppy_name`) VALUES
(1, 'ລາຍຮັບ'),
(2, 'ຊັບສິນຄົງທີ່'),
(3, 'ຊັບສິນໃນການທຸລະກິດ'),
(4, 'ຊັບສິນນອກການທຸລະກິດ'),
(5, 'ຊັບສິນໃນກຳມື'),
(6, 'ທຶນຕົນເອງ ແລະ ເງິນກູ້ຢືມເພື່ອປະກອບທຶນ'),
(7, 'ໜີ້ສິນໃນທຸລະກິດ'),
(8, 'ໜີ້ສິນນອກທຸລະກິດ'),
(9, 'ໜີ້ສິນຄັງເງິນລວມ'),
(10, 'ລາຍຈ່າຍ');

-- --------------------------------------------------------

--
-- Table structure for table `acc_unit`
--

CREATE TABLE `acc_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_unit`
--

INSERT INTO `acc_unit` (`unit_id`, `unit_name`, `ppy_id`) VALUES
(1, 'ຂາຍສິນຄ້າ', 1),
(6, 'ຂາຍຜະລິດຕະພັນ/ການບໍລິການ', 1),
(7, 'ລາຍຮັບກິດຈະການສຳຮອງ', 1),
(8, 'ລາຍຮັບອື່ນໆ ຈາກການຄຸ້ມຄອງປົກກະຕິ', 1),
(10, 'ລາຍຮັບການເງິນ ແລະ ບັງເອີນ', 1),
(11, 'ຊື້ສິນຄ້າ', 10),
(12, 'ຊື້ວັດຖຸດິບ ແລະ ວັດຖຸຊົມໃຊ້', 10),
(13, 'ຊື້ລາຍການອື່ນໆ ແລະ ບໍລິການທາງນອກ', 10),
(14, 'ຄ່າພາສີຂາເຂົ້າ-ຂາອອກ ແລະ ອາກອນ', 10),
(15, 'ເງິນເດືອນ ແລະ ລາຍຈ່າຍປະເພດດຽວກັນ', 10),
(16, 'ຫັກຕົວຈິງຄ່າ ຫຼ.ຫ. ແລະ ຄ່າເຊື່ອມມູນຄ່າ ໃນການທຸລະກິດ', 10),
(17, 'ລາຍຈ່າຍອື່ນໆໃນການຄຸ້ມຄອງປະຈຳວັນ', 10),
(18, 'ຜົນໄດ້ຮັບຈາກການເຄື່ອນໄຫວຮ່ວມກັນ', 1),
(19, 'ລາຍຈ່າຍການເງິນ ແລະ ບັງເອີນ(*)', 10),
(20, 'ຫັກຕົວຈິງຄ່າ ຫຼ.ຫ. ແລະ ຄ່າເສື່ອມມູນຄ່າບັງເອີນ', 10),
(21, 'ອາກອນກຳໄລ', 10),
(22, 'ຊັບສົມບັດຄົງທີ່ບໍ່ມີຕົວຕົນ', 2),
(23, 'ຊັບສົມບັດຄົງທີ່ມີຕົວຕົນໃນການທຸລະກິດ', 2),
(24, 'ຊັບສົມບັດຄົງທີ່ມີຕົວຕົນນອກການທຸລະກິດ', 2),
(25, 'ຊັບສົມບັດຄົງທີ່ການເງິນ', 2),
(26, 'ເຄື່ອງໃນສາງ', 3),
(27, 'ຜູ້ສະໜອງຕິດໜີ້', 3),
(28, 'ໜີ້ຕ້ອງຮັບ', 3),
(29, 'ລັດ', 4),
(30, 'ໜີ້ຕ້ອງຮັບອື່ນໆນອກທຸລະກິດ', 4),
(31, 'ລາຍຈ່າຍ ຈ່າຍລ່ວງໜ້າ', 4),
(32, 'ໃບຢັ້ງຢືນຊັບຝາກໝູນ', 5),
(33, 'ເງິນຝາກທະນາຄານ', 5),
(34, 'ເງິນສົດ', 5),
(35, 'ທຶນວິສາຫະກິດ ຫຼື ບັນຊີເງິນຂອງເຈົ້າຂອງ ທ/ກ', 6),
(36, 'ຄັງສະສົມ', 6),
(37, 'ຄັງວິສາຫະກິດເພື່ອຂະຫຍາຍກິດຈະການ', 6),
(38, 'ຜິດດ່ຽງຈາກການຕີມູນຄ່າຄືນໃໝ່', 6),
(39, 'ທຶນປະກອບຂອງລັດທີ່ຈະຕ້ອງສົ່ງຄືນ', 6),
(40, 'ຍອດກຳໄລ ຫຼື ຂາດທຶນຍົກມາ', 6),
(41, 'ເງິນຊ່ວຍໝູນກໍ່ສ້າງພື້ນຖານ', 6),
(42, 'ຄັງ ແລະ ເງິນແຮເພື່ອລາຍຈ່າຍ ແລະ ລາຍສ່ຽງໄພ', 6),
(43, 'ເງິນກູ້ຢືມ ແລະ ປະກອບທຶນ', 6),
(44, 'ຜູ້ສະໜອງຕ່າງປະເທດ', 7),
(45, 'ຜູ້ສະໜອງພາຍໃນປະເທດ', 7),
(46, 'ລູກຄ້າເປັນເຈົ້າໜີ້', 7),
(47, 'ພະນັກງານ', 7),
(48, 'ລັດ', 7),
(49, 'ໜີ້ຕ້ອງສົ່ງອື່ນໆໃນທຸລະກິດ', 7),
(50, 'ລາຍຮັບ ຮັບລ່ວງໜ້າ', 7),
(51, 'ຄັງວິສາຫະກິດ - ເງິນບຳເນັດໃຫ້ພະນັກງານ', 8),
(52, 'ເຈົ້າໜີ້ອື່ນໆ', 8),
(53, 'ເງິນເບີກເກີນບັນຊີ', 9),
(56, 'ລັດ', 8);

-- --------------------------------------------------------

--
-- Table structure for table `applyemp`
--

CREATE TABLE `applyemp` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `app_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auther_id` int(11) DEFAULT NULL,
  `school` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_start` date DEFAULT NULL,
  `date_apply` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auther`
--

CREATE TABLE `auther` (
  `auther_id` int(11) NOT NULL,
  `auther_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auther`
--

INSERT INTO `auther` (`auther_id`, `auther_name`, `dept_id`) VALUES
(1, 'IT', 1),
(2, 'ACCOUTING', 4),
(3, 'MANAGEMENT', 3),
(4, 'HR', 5);

-- --------------------------------------------------------

--
-- Table structure for table `backdistribute`
--

CREATE TABLE `backdistribute` (
  `No_` int(11) NOT NULL,
  `dateback` date DEFAULT NULL,
  `timeback` time DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `moreinfo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipt`
--

CREATE TABLE `cash_receipt` (
  `cash_id` int(11) NOT NULL,
  `re_id` int(11) DEFAULT NULL,
  `barcode` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cash_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `vat` decimal(20,2) DEFAULT NULL,
  `cash_date` date DEFAULT NULL,
  `bill` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cash_receipt`
--

INSERT INTO `cash_receipt` (`cash_id`, `re_id`, `barcode`, `cash_name`, `qty`, `price`, `vat`, `cash_date`, `bill`, `acc_id`, `rate_id`, `rate`, `img_path`, `note`) VALUES
(47, 1, NULL, '-', 1, '1037345420.00', NULL, '2019-01-01', '-', '71410000', 'LAK', '1.00', 'img_5eaa554af2844.', ''),
(48, 1, NULL, '-', 1, '961920.00', NULL, '2019-01-01', '-', '76100000', 'LAK', '1.00', 'img_5eaa55707cf6a.', ''),
(49, 1, NULL, '-', 1, '10979.00', NULL, '2019-01-01', '-', '76300000', 'LAK', '1.00', 'img_5eaa558a698cd.', ''),
(50, 2, NULL, '-', 1, '15765282.00', NULL, '0000-00-00', '0', '14900000', 'LAK', '1.00', '-', '-'),
(51, 2, NULL, '-', 1, '26912000.00', NULL, '0000-00-00', '0', '28183000', 'LAK', '1.00', '-', '-'),
(52, 2, NULL, '-', 1, '31488000.00', NULL, '0000-00-00', '0', '28184000', 'LAK', '1.00', '-', '-'),
(53, 2, NULL, '-', 1, '1141079658.00', NULL, '0000-00-00', '0', '42310000', 'LAK', '1.00', '-', '-'),
(54, 2, NULL, '-', 1, '56064000.00', NULL, '0000-00-00', '0', '44100000', 'LAK', '1.00', '-', '-'),
(55, 2, NULL, '-', 1, '1056000.00', NULL, '0000-00-00', '0', '46210000', 'LAK', '1.00', '-', '-'),
(56, 2, NULL, '-', 1, '4474000.00', NULL, '0000-00-00', '0', '46410000', 'LAK', '1.00', '-', '-'),
(57, 2, NULL, '-', 1, '103734238.00', NULL, '0000-00-00', '0', '46550000', 'LAK', '1.00', '-', '-'),
(58, 2, NULL, '-', 1, '103734238.00', NULL, '0000-00-00', '0', '46570000', 'LAK', '1.00', '-', '-'),
(59, 2, NULL, '-', 1, '60000000.00', NULL, '0000-00-00', '0', '47570000', 'LAK', '1.00', '-', '-'),
(60, 2, NULL, '-', 1, '1294412444.00', NULL, '0000-00-00', '0', '55210000', 'LAK', '1.00', '-', '-'),
(61, 2, NULL, '-', 1, '1285105084.00', NULL, '0000-00-00', '0', '57110000', 'LAK', '1.00', '-', '-'),
(62, 2, NULL, '-', 1, '14580000.00', NULL, '0000-00-00', '0', '57120000', 'LAK', '1.00', '-', '-'),
(63, 2, NULL, '-', 1, '1451012160.00', NULL, '0000-00-00', '0', '59000000', 'LAK', '1.00', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Router'),
(2, 'Switch'),
(3, 'Computer'),
(4, 'Computer Server'),
(5, 'Monitor'),
(6, 'ສາຍສັນຍານ'),
(7, 'ເຄື່ອງຍິງສັນຍານ'),
(8, 'Access Point'),
(9, 'ຊຸດເຄື່ອງມືື');

-- --------------------------------------------------------

--
-- Table structure for table `chsalary`
--

CREATE TABLE `chsalary` (
  `sry_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `old_salary` decimal(11,2) DEFAULT NULL,
  `new_salary` decimal(11,2) DEFAULT NULL,
  `date_ch` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `ckeckorder_view`
-- (See below for the actual view)
--
CREATE TABLE `ckeckorder_view` (
`pro_id` varchar(18)
,`pro_name` varchar(100)
,`cate_name` varchar(50)
,`qty` decimal(32,0)
,`unit_name` varchar(50)
,`qtyalert` int(11)
,`img_path` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `No_` int(11) NOT NULL,
  `dateclaim` date DEFAULT NULL,
  `timeclaim` time DEFAULT NULL,
  `dateback` date DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `moreinfo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `certificate` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tax` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `licenses` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `establishment` date NOT NULL,
  `exp_licenses` date NOT NULL,
  `slogan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name`, `address`, `tel`, `fax`, `email`, `website`, `certificate`, `tax`, `licenses`, `logo`, `tax_id`, `establishment`, `exp_licenses`, `slogan`) VALUES
(1, 'Mangkone Technology Company Limited ', 'Lao Airlines Building 7th Floor, Manthatourath Road, Xiengyeun Village, Chantabouly District, Vientiane Capital, Lao P.D.R (Headquarter)', '+856 20 5232 9555', '+856 20 5464 9656', 'contact@mangkone.com', 'http://www.mangkone.com', 'img_5e44f710ea943.png', 'img_5e44f7a5317dc.jpg', 'img_5e44f7d0bae71.png', 'img_5e79828781b25.png', '0453 (01B-0008543) / 909217445-9-00', '2020-02-01', '2020-02-01', 'Yours Exclusive Services');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_promise` date DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `company`, `address`, `tel`, `fax`, `email`, `end_promise`, `img_path`) VALUES
(13, 'INSEE TRADING CO.,LTD', '23 Singha Road, Nongbon Village, Saysettha District, Vientiane Capital, LAO P.D.R 01000', '+856-21-41 42 43', '-', 'info@DLaoLottery.com', '2020-02-01', 'img_5e58b4b2f1cf7.png'),
(14, 'THAI AIRWAYS INTERNATIONAL, Lao P.D.R.', 'M & N Building, Ground floor, Room No.70/101-103, Souphanouvong Avenue, Khounta Thong,Sikhotabong District, Vientiane, Laos', '(856-21) 222527-9 ext 111', '(856-21) 219563 Mobile: (856-20) 22233122', 'info@ThaiAirway.com', '2020-02-01', 'img_5e588abc60916.'),
(15, 'TOA Paint (Laos) Co., Ltd.', 'Unit 6, Ban Nahai, Hatsaifong District, Vientiane Capital, LAO P.D.R', '(856-21) 812082 ', '-', 'info_toal@toagroup.com', '2020-02-01', 'img_5e588b63ab49b.'),
(16, 'Lao Airline', 'Lao Airline Head Office, Wattay International Airport, Souphanouvong Road, Sikhottabong District, Vientiane, LAO PDR. P.O.Box 6441', '+856 21 513132', '-', 'Khounphon@laoairlines.com', '2020-02-01', 'img_5e588c5a02410.'),
(17, 'HOYA LAO CO., LTD', '8th Floor, Royal Suite Office at Crowne Plaza, 20 Samsenthay Road, Nongduangneua Village, Sikhottabong District, Vientiane Capital, LAO P.D.R 01000', '-', '-', 'info@Hoya.com', '2020-02-01', 'img_5e588d96817a3.'),
(18, 'Lao Lottery Office', 'ChaoAnou Road, Thongkhankham Village, Chanthabuly District, Vientiane Capital, LAO P.D.R 01000', '+856-21-41 42 43', '-', 'info@Dlaolettery.com', '2020-02-01', 'img_5e588e1a4fa03.'),
(19, 'ທົ່ວໄປ', '-', '-', '-', 'info@hotmail.com', '2029-01-01', 'img_5e71de4ce808a.');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Technical'),
(3, 'Director'),
(4, 'Accounting-Finance'),
(5, 'HUMAN RESOURSE');

-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE `distribute` (
  `No_` int(11) NOT NULL,
  `datedis` date DEFAULT NULL,
  `timedis` time DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emp_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auther_id` int(11) DEFAULT NULL,
  `salary` decimal(11,2) DEFAULT NULL,
  `start_work` date DEFAULT NULL,
  `end_work` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_name`, `emp_surname`, `gender`, `dob`, `address`, `tel`, `email`, `pass`, `auther_id`, `salary`, `start_work`, `end_work`, `status`, `img_path`) VALUES
('M001', 'Bounkong', 'Chanthavi', 'Male', '1992-01-11', 'ບ້ານ ນາທາມ ເມືອງ ຫາດຊາຍຟອງ ນະຄອນຫຼວງ', '+856 20 5795 9555', 'bounkong@mangkone.com', '123', 1, '400.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e58733f7b2f7.'),
('M002', 'Souksawath', 'SOULIVANH', 'Male', '1994-01-01', 'ບ້ານ ທົ່ງຂັນຄຳ ເມືອງ ຈັນທະບູລີ ນະຄອນຫຼວງວຽງຈັນ', '020-5555-6633', 'souksawath@mangkone.com', '123', 1, '400.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e58794739fd4.'),
('M003', 'Xaiyasone', 'THAMMAVONG', 'Male', '2020-02-01', 'ບ້ານ ຄຳສະຫວາດ ເມືອງ ໄຊເສດຖາ ນະຄອນຫຼວງວຽງຈັນ', '+856 20 5798 9555', 'xaiyasone@mangkone.com', '123', 1, '400.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e5879cb266d2.'),
('M004', 'Souksavath', 'PHONGPHAYOSITH', 'Male', '2020-02-01', 'ບ້ານ ຫ້ວຍຫົງ ເມືອງ ຈັນທະບຸລີ ນະຄອນຫຼວງວຽງຈັນ', '+856 20 57 929 555', 'souksavath@mangkone.com', '123', 1, '300.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e587a6d264c8.'),
('M005', 'Thilatda', 'PHETMEUANGXAY', 'Male', '2020-02-01', 'ບ້ານ ສະພານທອງ ເມືອງ ສີສັດຕະນາກ ນະຄອນຫຼວງວຽງຈັນ', '020-5555-6633', 'thilatda@mangkone.com', '123', 2, '400.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e587bcfd0022.'),
('M006', 'Veerasith', 'WONGKARN', 'Male', '2020-02-01', 'Lao Airlines Building 7th Floor, Manthatourath Road, Xiengyeun Village, Chantabouly District, Vientiane Capital, Lao P.D.R (Headquarter)', '020-5555-663l2', 'veerasith@mangkone.com', '123', 4, '0.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e587c90b91fd.'),
('M007', 'Watana', 'PATHAMAVONG', 'Male', '2020-02-01', 'Lao Airlines Building 7th Floor, Manthatourath Road, Xiengyeun Village, Chantabouly District, Vientiane Capital, Lao P.D.R (Headquarter)', '+856 20 5795 9555', 'Watana@mangkone.com', '123', 3, '0.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e587d14a6294.'),
('M008', 'Souksavanh', 'THINAKONE', 'Male', '2020-02-01', 'ບ້ານ ຫາຍໂສກ ເມືອງ ຫາດຊາຍຟອງ ນະຄອນຫຼວງວຽງຈັນ', '+856 20 9520 5137', 'Souksavanh@mangkone.com', '123', 1, '0.00', '2020-02-01', '0000-00-00', 'Active', 'img_5e587dab69086.'),
('M010', 'Vilaisak', '-', 'Male', '2019-02-01', '-', '-', 'vilaisak@hotmail.com', '123', 1, '180.00', '2019-02-01', '0000-00-00', 'Active', 'img_5e58b34f292b0.');

-- --------------------------------------------------------

--
-- Table structure for table `emp_skill`
--

CREATE TABLE `emp_skill` (
  `skill_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_start` date DEFAULT NULL,
  `course_end` date DEFAULT NULL,
  `certificate` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `No_` int(11) NOT NULL,
  `billimp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billno` int(11) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `dateimp` date DEFAULT NULL,
  `timeimp` time DEFAULT NULL,
  `moreinfo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `voice_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kip_amount` decimal(11,2) DEFAULT NULL,
  `baht_amount` decimal(11,2) DEFAULT NULL,
  `us_amount` decimal(11,2) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `quo_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice2`
--

CREATE TABLE `invoice2` (
  `voice_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kip_amount` decimal(11,2) DEFAULT NULL,
  `us_amount` decimal(11,2) DEFAULT NULL,
  `baht_amount` decimal(11,2) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `quo_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `indet_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `voice_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail2`
--

CREATE TABLE `invoicedetail2` (
  `indet_id` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `voice_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listcash_receipt`
--

CREATE TABLE `listcash_receipt` (
  `cash_id` int(11) NOT NULL,
  `re_id` int(11) DEFAULT NULL,
  `cash_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `vat` decimal(20,2) DEFAULT NULL,
  `cash_date` date DEFAULT NULL,
  `bill` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listimp`
--

CREATE TABLE `listimp` (
  `No_` int(11) NOT NULL,
  `billimp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billno` int(11) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `dateimp` date DEFAULT NULL,
  `timeimp` time DEFAULT NULL,
  `moreinfo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listinvoicedetail`
--

CREATE TABLE `listinvoicedetail` (
  `indet_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `voice_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listinvoicedetail2`
--

CREATE TABLE `listinvoicedetail2` (
  `indet_id` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `voice_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listorder`
--

CREATE TABLE `listorder` (
  `No_` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `bill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listot`
--

CREATE TABLE `listot` (
  `ot_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_ot` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `ot_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listpodetail`
--

CREATE TABLE `listpodetail` (
  `no_` int(11) NOT NULL,
  `bill` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `pdet_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `listpodetail_view`
-- (See below for the actual view)
--
CREATE TABLE `listpodetail_view` (
`no_` int(11)
,`bill` varchar(30)
,`purchase_id` int(11)
,`po_date` date
,`pdet_name` varchar(100)
,`qty` int(11)
,`price` int(11)
,`total` bigint(21)
,`acc_name` varchar(100)
,`img_path` varchar(100)
,`rate_id` varchar(5)
,`note` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `listpurchasedetail`
--

CREATE TABLE `listpurchasedetail` (
  `pdet_id` int(11) NOT NULL,
  `billno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `pdet_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listquotationdetail`
--

CREATE TABLE `listquotationdetail` (
  `quodet_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `quo_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listquotationdetail2`
--

CREATE TABLE `listquotationdetail2` (
  `quodet_id` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quo_id` int(11) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listsalarydetail`
--

CREATE TABLE `listsalarydetail` (
  `sdet_id` int(11) NOT NULL,
  `sry_id` int(11) DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `salary` decimal(11,2) DEFAULT NULL,
  `ot` decimal(11,2) DEFAULT NULL,
  `eat` decimal(11,2) DEFAULT NULL,
  `oil` decimal(11,2) DEFAULT NULL,
  `mobile` decimal(11,2) DEFAULT NULL,
  `bonus` decimal(11,2) DEFAULT NULL,
  `missday` int(11) DEFAULT NULL,
  `miss` decimal(11,2) DEFAULT NULL,
  `more` decimal(11,2) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listyearly`
--

CREATE TABLE `listyearly` (
  `id` int(11) NOT NULL,
  `po_price` decimal(20,2) DEFAULT NULL,
  `re_price` decimal(20,2) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listyearly_po_cr`
--

CREATE TABLE `listyearly_po_cr` (
  `id` int(11) NOT NULL,
  `po_price` decimal(20,2) DEFAULT NULL,
  `re_price` decimal(20,2) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `No_` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `billno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `billno` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `dateorder` date DEFAULT NULL,
  `timeorder` time DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ot`
--

CREATE TABLE `ot` (
  `ot_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_ot` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `ot_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `po_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kip_amount` decimal(20,2) DEFAULT NULL,
  `baht_amount` decimal(20,2) DEFAULT NULL,
  `us_amount` decimal(20,2) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `po_time` time DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`po_id`, `emp_id`, `kip_amount`, `baht_amount`, `us_amount`, `po_date`, `po_time`, `status`, `img_path`) VALUES
(1, 'M005', '1009707244.00', NULL, NULL, '2019-01-01', '11:54:04', 'PAID', NULL),
(2, 'M005', '5618028179.00', NULL, NULL, '2019-01-01', '12:09:03', 'PAID', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `podetail`
--

CREATE TABLE `podetail` (
  `no_` int(11) NOT NULL,
  `bill` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `pdet_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `podetail`
--

INSERT INTO `podetail` (`no_`, `bill`, `po_date`, `pdet_name`, `qty`, `price`, `note`, `acc_id`, `po_id`, `purchase_id`, `rate_id`, `rate`, `img_path`) VALUES
(391, '-', '2019-01-01', '-', 1, '4924520.00', '-', '61731000', 1, 0, 'LAK', '1.00', 'img_5eaa572727ffe.'),
(392, '-', '2019-01-01', '-', 1, '5707856.00', '-', '61733000', 1, 0, 'LAK', '1.00', 'img_5eaa57618656d.'),
(393, '-', '2019-01-01', '-', 1, '3782000.00', '-', '61734000', 1, 0, 'LAK', '1.00', 'img_5eaa579cea5bb.'),
(394, '-', '2019-01-01', '-', 1, '5792640.00', '-', '61735000', 1, 0, 'LAK', '1.00', 'img_5eaa57ccb447f.'),
(395, '-', '2019-01-01', '-', 1, '1922412.00', '-', '61736000', 1, 0, 'LAK', '1.00', 'img_5eaa58094b4d4.'),
(396, '-', '2019-01-01', '-', 1, '833800000.00', '-', '62100000', 1, 0, 'LAK', '1.00', 'img_5eaa58596dba8.'),
(397, '-', '2019-01-01', '-', 1, '7200000.00', '-', '62130000', 1, 0, 'LAK', '1.00', 'img_5eaa589c5ae4f.'),
(398, '-', '2019-01-01', '-', 1, '1628000.00', '-', '62451000', 1, 0, 'LAK', '1.00', 'img_5eaa58bd35a3c.'),
(399, '-', '2019-01-01', '-', 1, '14580000.00', '-', '62452000', 1, 0, 'LAK', '1.00', 'img_5eaa58dabf607.'),
(400, '-', '2019-01-01', '-', 1, '7030252.00', '-', '62550000', 1, 0, 'LAK', '1.00', 'img_5eaa58f6c6380.'),
(401, '-', '2019-01-01', '-', 1, '2528120.00', '-', '62810000', 1, 0, 'LAK', '1.00', 'img_5eaa5936cef3b.'),
(402, '-', '2019-01-01', '-', 1, '119000.00', '-', '62880000', 1, 0, 'LAK', '1.00', 'img_5eaa594d08acc.'),
(403, '-', '2019-01-01', '-', 1, '2690000.00', '-', '63700000', 1, 0, 'LAK', '1.00', 'img_5eaa59695daf0.'),
(404, '-', '2019-01-01', '-', 1, '57120000.00', '-', '64100000', 1, 0, 'LAK', '1.00', 'img_5eaa5999b6515.'),
(405, '-', '2019-01-01', '-', 1, '2482444.00', '-', '66300000', 1, 0, 'LAK', '1.00', 'img_5eaa59b947bc0.'),
(406, '-', '2019-01-01', '-', 1, '58400000.00', '-', '68200000', 1, 0, 'LAK', '1.00', 'img_5eaa59de8bffa.'),
(422, '', '0000-00-00', '-', 1, '15765282.00', '-', '14100000', 2, 0, 'LAK', '1.00', '-'),
(423, '', '0000-00-00', '-', 1, '28974000.00', '-', '14900000', 2, 0, 'LAK', '1.00', '-'),
(424, '', '0000-00-00', '-', 1, '1141079658.00', '-', '42310000', 2, 0, 'LAK', '1.00', '-'),
(425, '', '0000-00-00', '-', 1, '56064000.00', '-', '44100000', 2, 0, 'LAK', '1.00', '-'),
(426, '', '0000-00-00', '-', 1, '1056000.00', '-', '46210000', 2, 0, 'LAK', '1.00', '-'),
(427, '', '0000-00-00', '-', 1, '7382000.00', '-', '46410000', 2, 0, 'LAK', '1.00', '-'),
(428, '', '0000-00-00', '-', 1, '100622124.00', '-', '46550000', 2, 0, 'LAK', '1.00', '-'),
(429, '', '0000-00-00', '-', 1, '103734238.00', '-', '46570000', 2, 0, 'LAK', '1.00', '-'),
(430, '', '0000-00-00', '-', 1, '60000000.00', '-', '47570000', 2, 0, 'LAK', '1.00', '-'),
(431, '', '0000-00-00', '-', 1, '1153406080.00', '-', '55210000', 2, 0, 'LAK', '1.00', '-'),
(432, '', '0000-00-00', '-', 1, '1484352637.00', '-', '57110000', 2, 0, 'LAK', '1.00', '-'),
(433, '', '0000-00-00', '-', 1, '14580000.00', '-', '57120000', 2, 0, 'LAK', '1.00', '-'),
(434, '', '0000-00-00', '-', 1, '1451012160.00', '-', '59000000', 2, 0, 'LAK', '1.00', '-');

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `prod_id` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `component` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plus` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `pro_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `price_baht` decimal(11,2) DEFAULT NULL,
  `price_us` decimal(11,2) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qtyalert` int(11) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `price`, `price_baht`, `price_us`, `cate_id`, `unit_id`, `qtyalert`, `img_path`) VALUES
('606449101522', 'NETGEAR ProSAFE', '0.00', '0.00', '0.00', 2, 1, 0, 'img_5e58a1a4145a7.jpg'),
('790069406577', 'D-Link 4GLTE', '0.00', '0.00', '0.00', 1, 1, 0, 'img_5e58a10b2e483.jpg'),
('8859206726564', 'LINK PROFESSIONAL SET OF TOOL & TTESTER', '0.00', '0.00', '0.00', 9, 6, 0, 'img_5e58a32b9ee37.jpg'),
('C050900P071A', 'Cambium Network', '0.00', '0.00', '0.00', 7, 1, 10, 'img_5e589b6f4a3c7.jpeg'),
('RG-AP720-L', 'Wirless Access Point RuiJie', '0.00', '0.00', '0.00', 8, 1, 0, 'img_5e58a03145bf0.jpg'),
('srx220h', 'JUNIPER', '0.00', '0.00', '0.00', 1, 1, 10, 'img_5e589aab397a7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE `purchasedetail` (
  `pdet_id` int(11) NOT NULL,
  `billno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `pdet_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchase_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quo_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_amount` decimal(11,2) DEFAULT NULL,
  `baht_amount` decimal(11,2) DEFAULT NULL,
  `kip_amount` decimal(11,2) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation2`
--

CREATE TABLE `quotation2` (
  `quo_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kip_amount` decimal(11,2) DEFAULT NULL,
  `baht_amount` decimal(11,2) DEFAULT NULL,
  `us_amount` decimal(11,2) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotationdetail`
--

CREATE TABLE `quotationdetail` (
  `quodet_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `quo_id` int(11) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotationdetail2`
--

CREATE TABLE `quotationdetail2` (
  `quodet_id` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `rate_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quo_id` int(11) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `rate_buy` decimal(11,2) DEFAULT NULL,
  `rate_sell` decimal(11,2) DEFAULT NULL,
  `ac_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `rate_buy`, `rate_sell`, `ac_no`, `img_path`) VALUES
('LAK', '1.00', '1.00', '103 12 00 01462777 001', 'img_5e43a11155469.ico'),
('THB', '300.00', '300.00', '', ''),
('USD', '9350.00', '9200.00', '103 12 01 01462777 001', 'img_5e43a0759a959.ico');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `re_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `re_date` date DEFAULT NULL,
  `kip_amount` decimal(20,2) DEFAULT NULL,
  `baht_amount` decimal(20,2) DEFAULT NULL,
  `us_amount` decimal(20,2) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`re_id`, `emp_id`, `cus_id`, `re_date`, `kip_amount`, `baht_amount`, `us_amount`, `img_path`, `bill`) VALUES
(1, 'M005', 19, '2019-01-01', '1038318319.00', NULL, NULL, NULL, '0'),
(2, 'M005', 19, '2019-01-01', '5589417104.00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sry_id` int(11) NOT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `sal_date` date DEFAULT NULL,
  `sal_mon` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salarydetail`
--

CREATE TABLE `salarydetail` (
  `sdet_id` int(11) NOT NULL,
  `sry_id` int(11) DEFAULT NULL,
  `emp_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `salary` decimal(11,2) DEFAULT NULL,
  `ot` decimal(11,2) DEFAULT NULL,
  `eat` decimal(11,2) DEFAULT NULL,
  `oil` decimal(11,2) DEFAULT NULL,
  `mobile` decimal(11,2) DEFAULT NULL,
  `bonus` decimal(11,2) DEFAULT NULL,
  `missday` int(11) DEFAULT NULL,
  `miss` decimal(11,2) DEFAULT NULL,
  `more` decimal(11,2) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppy_id` int(11) DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`) VALUES
(1, 'Free 1 IPV4 address');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `No_` int(11) NOT NULL,
  `pro_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mac_address` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `moreinfo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`No_`, `pro_id`, `serial`, `mac_address`, `qty`, `moreinfo`) VALUES
(46, '606449101522', '606449101522', '606449101522', 10, NULL),
(47, '885920672656', '885920672656', '885920672656', 10, NULL),
(48, 'C050900P071A', 'C050900P071A', 'C050900P071A', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_promise` date DEFAULT NULL,
  `img_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `company`, `tel`, `fax`, `address`, `email`, `type`, `end_promise`, `img_path`) VALUES
(7, 'KING INTELLIGENT TECHNOLOGY CO., LTD', '02-419-0555', '02-412-2479', 'Thailand', 'king@kit.co.th', 'Tool', '2020-02-01', 'img_5e58909ad4925.'),
(8, 'ສະກາຍ ໂທລະຄົມ', '1833 (+856) 021 263 518', '(+856) 021 263 519', 'ຖະໜົນສາຍລົມ, ບ້ານ ສາຍລົມ, ເມືອງ ຈັນທະບຸລີ, ນະຄອນຫຼວງວຽງຈັນ', 'info@skytelecom.com', 'Internet', '2020-02-01', 'img_5e58915c54850.'),
(9, 'ລາວໂທລະຄົມ ມະນາຄົມ', '-', '-', 'ຖະໜົນສາຍລົມ, ບ້ານ ສາຍລົມ, ເມືອງ ຈັນທະບຸລີ, ນະຄອນຫຼວງວຽງຈັນ', 'info@LTC.com', 'Internet', '2020-02-01', 'img_5e5891939b745.');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'ໜ່ວຍ'),
(2, 'ເສັ້ນ'),
(3, 'ແກັດ'),
(4, 'ເຄື່ອງ'),
(5, 'ແພັກ'),
(6, 'ກ່ອງ'),
(7, 'ກັບ'),
(8, 'ອັນ');

-- --------------------------------------------------------

--
-- Table structure for table `yearly`
--

CREATE TABLE `yearly` (
  `id` int(11) NOT NULL,
  `po_price` decimal(20,2) DEFAULT NULL,
  `re_price` decimal(20,2) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yearly`
--

INSERT INTO `yearly` (`id`, `po_price`, `re_price`, `acc_id`, `year_date`) VALUES
(36, '0.00', '500000000.00', '10110000', '2018-01-01'),
(37, '0.00', '15765282.00', '14100000', '2018-01-01'),
(38, '100600089.00', '0.00', '14900000', '2018-01-01'),
(39, '109890667.00', '0.00', '21830000', '2018-01-01'),
(40, '133952000.00', '0.00', '21840000', '2018-01-01'),
(41, '0.00', '51581333.00', '28183000', '2018-01-01'),
(42, '0.00', '62976000.00', '28184000', '2018-01-01'),
(43, '0.00', '88000.00', '46210000', '2018-01-01'),
(44, '4474000.00', '0.00', '46410000', '2018-01-01'),
(45, '0.00', '7768671.00', '46550000', '2018-01-01'),
(46, '160143804.00', '0.00', '55210000', '2018-01-01'),
(47, '129118726.00', '0.00', '57110000', '2018-01-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `yearly2_view`
-- (See below for the actual view)
--
CREATE TABLE `yearly2_view` (
`acc_id` varchar(10)
,`acc_name` varchar(100)
,`po_price` decimal(20,2)
,`re_price` decimal(20,2)
,`po_total` decimal(63,4)
,`re_total` decimal(63,4)
,`vat` decimal(42,2)
,`re_date` date
,`po_date` date
,`year_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `yearly_podetail_view`
-- (See below for the actual view)
--
CREATE TABLE `yearly_podetail_view` (
`acc_id` varchar(10)
,`acc_name` varchar(100)
,`unit_id` int(11)
,`unit_name` varchar(100)
,`po_price` decimal(20,2)
,`re_price` decimal(20,2)
,`po_total` decimal(63,4)
,`re_total` decimal(63,4)
,`vat` decimal(20,2)
,`po_date` date
,`year_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `yearly_po_cr`
--

CREATE TABLE `yearly_po_cr` (
  `id` int(11) NOT NULL,
  `po_price` decimal(20,2) DEFAULT NULL,
  `re_price` decimal(20,2) DEFAULT NULL,
  `acc_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yearly_po_cr`
--

INSERT INTO `yearly_po_cr` (`id`, `po_price`, `re_price`, `acc_id`, `year_date`) VALUES
(1, '0.00', '800871944.00', '71410000', '2018-01-01'),
(2, '0.00', '934416.00', '76100000', '2018-01-01'),
(3, '1903000.00', '0.00', '61731000', '2018-01-01'),
(4, '3649000.00', '0.00', '61733000', '2018-01-01'),
(5, '1495628.00', '0.00', '61734000', '2018-01-01'),
(6, '2964532.00', '0.00', '61735000', '2018-01-01'),
(7, '1532000.00', '0.00', '61736000', '2018-01-01'),
(8, '632610000.00', '0.00', '62100000', '2018-01-01'),
(9, '1381200.00', '0.00', '62451000', '2018-01-01'),
(10, '14288400.00', '0.00', '62452000', '2018-01-01'),
(11, '2539840.00', '0.00', '62500000', '2018-01-01'),
(12, '1978878.00', '0.00', '62810000', '2018-01-01'),
(13, '4069600.00', '0.00', '62880000', '2018-01-01'),
(14, '2109000.00', '0.00', '63700000', '2018-01-01'),
(15, '57120000.00', '0.00', '64100000', '2018-01-01'),
(16, '58400000.00', '0.00', '68200000', '2018-01-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `yearly_po_view`
-- (See below for the actual view)
--
CREATE TABLE `yearly_po_view` (
`unit_id` int(11)
,`unit_name` varchar(100)
,`po_price` decimal(42,2)
,`re_price` decimal(42,2)
,`po_total` decimal(63,4)
,`re_total` decimal(63,4)
,`vat` decimal(42,2)
,`re_date` date
,`po_date` date
,`year_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `yearly_revenuedetail_view`
-- (See below for the actual view)
--
CREATE TABLE `yearly_revenuedetail_view` (
`acc_id` varchar(10)
,`acc_name` varchar(100)
,`unit_id` int(11)
,`unit_name` varchar(100)
,`po_price` decimal(20,2)
,`re_price` decimal(20,2)
,`po_total` decimal(63,4)
,`re_total` decimal(63,4)
,`vat` decimal(42,2)
,`re_date` date
,`po_date` date
,`year_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `yearly_revenue_view`
-- (See below for the actual view)
--
CREATE TABLE `yearly_revenue_view` (
`unit_id` int(11)
,`unit_name` varchar(100)
,`po_price` decimal(42,2)
,`re_price` decimal(42,2)
,`po_total` decimal(63,4)
,`re_total` decimal(63,4)
,`vat` decimal(42,2)
,`re_date` date
,`po_date` date
,`year_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `yearly_view`
-- (See below for the actual view)
--
CREATE TABLE `yearly_view` (
`acc_id` varchar(10)
,`acc_name` varchar(100)
,`po_price` decimal(20,2)
,`re_price` decimal(20,2)
,`po_total` decimal(63,4)
,`re_total` decimal(63,4)
,`vat` decimal(42,2)
,`re_date` date
,`po_date` date
,`year_date` date
);

-- --------------------------------------------------------

--
-- Structure for view `ckeckorder_view`
--
DROP TABLE IF EXISTS `ckeckorder_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ckeckorder_view`  AS  select `p`.`pro_id` AS `pro_id`,`p`.`pro_name` AS `pro_name`,`c`.`cate_name` AS `cate_name`,sum(`s`.`qty`) AS `qty`,`u`.`unit_name` AS `unit_name`,`p`.`qtyalert` AS `qtyalert`,`p`.`img_path` AS `img_path` from (((`products` `p` join `category` `c` on(`p`.`cate_id` = `c`.`cate_id`)) join `unit` `u` on(`p`.`unit_id` = `u`.`unit_id`)) join `stock` `s` on(`p`.`pro_id` = `s`.`pro_id`)) group by `s`.`pro_id` ;

-- --------------------------------------------------------

--
-- Structure for view `listpodetail_view`
--
DROP TABLE IF EXISTS `listpodetail_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listpodetail_view`  AS  select `d`.`no_` AS `no_`,`d`.`bill` AS `bill`,`d`.`purchase_id` AS `purchase_id`,`d`.`po_date` AS `po_date`,`d`.`pdet_name` AS `pdet_name`,`d`.`qty` AS `qty`,`d`.`price` AS `price`,`d`.`qty` * `d`.`price` AS `total`,`n`.`acc_name` AS `acc_name`,`d`.`img_path` AS `img_path`,`d`.`rate_id` AS `rate_id`,`d`.`note` AS `note` from (`listpodetail` `d` join `acc_no` `n` on(`d`.`acc_id` = `n`.`acc_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `yearly2_view`
--
DROP TABLE IF EXISTS `yearly2_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly2_view`  AS  select `a`.`acc_id` AS `acc_id`,`a`.`acc_name` AS `acc_name`,`y`.`po_price` AS `po_price`,`y`.`re_price` AS `re_price`,sum(`p`.`qty` * (`p`.`price` * `p`.`rate`)) AS `po_total`,sum(`c`.`qty` * (`c`.`price` * `c`.`rate`)) AS `re_total`,sum(`c`.`vat`) AS `vat`,`i`.`re_date` AS `re_date`,`o`.`po_date` AS `po_date`,`y`.`year_date` AS `year_date` from (((((((`acc_no` `a` left join `yearly` `y` on(`a`.`acc_id` = `y`.`acc_id`)) left join `podetail` `p` on(`a`.`acc_id` = `p`.`acc_id`)) left join `cash_receipt` `c` on(`a`.`acc_id` = `c`.`acc_id`)) left join `receipt` `i` on(`c`.`re_id` = `i`.`re_id`)) left join `po` `o` on(`p`.`po_id` = `o`.`po_id`)) left join `acc_unit` `u` on(`a`.`unit_id` = `u`.`unit_id`)) left join `acc_property` `t` on(`u`.`ppy_id` = `t`.`ppy_id`)) where `t`.`ppy_name` = 'ລາຍຈ່າຍ' or `t`.`ppy_name` = 'ລາຍຮັບ' group by `a`.`acc_id` order by `a`.`acc_id` ;

-- --------------------------------------------------------

--
-- Structure for view `yearly_podetail_view`
--
DROP TABLE IF EXISTS `yearly_podetail_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly_podetail_view`  AS  select `a`.`acc_id` AS `acc_id`,`a`.`acc_name` AS `acc_name`,`a`.`unit_id` AS `unit_id`,`u`.`unit_name` AS `unit_name`,`y`.`po_price` AS `po_price`,`y`.`re_price` AS `re_price`,sum(`p`.`qty` * (`p`.`price` * `p`.`rate`)) AS `po_total`,sum(`c`.`qty` * (`c`.`price` * `c`.`rate`)) AS `re_total`,`c`.`vat` AS `vat`,`o`.`po_date` AS `po_date`,`y`.`year_date` AS `year_date` from (((((((`acc_no` `a` left join `yearly_po_cr` `y` on(`a`.`acc_id` = `y`.`acc_id`)) left join `podetail` `p` on(`a`.`acc_id` = `p`.`acc_id`)) left join `cash_receipt` `c` on(`a`.`acc_id` = `c`.`acc_id`)) left join `receipt` `i` on(`c`.`re_id` = `i`.`re_id`)) left join `po` `o` on(`p`.`po_id` = `o`.`po_id`)) left join `acc_unit` `u` on(`a`.`unit_id` = `u`.`unit_id`)) left join `acc_property` `t` on(`u`.`ppy_id` = `t`.`ppy_id`)) where `t`.`ppy_name` = 'ລາຍຈ່າຍ' group by `a`.`acc_id` order by `a`.`acc_id` ;

-- --------------------------------------------------------

--
-- Structure for view `yearly_po_view`
--
DROP TABLE IF EXISTS `yearly_po_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly_po_view`  AS  select `u`.`unit_id` AS `unit_id`,`u`.`unit_name` AS `unit_name`,sum(`y`.`po_price`) AS `po_price`,sum(`y`.`re_price`) AS `re_price`,sum(`p`.`qty` * (`p`.`price` * `p`.`rate`)) AS `po_total`,sum(`c`.`qty` * (`c`.`price` * `c`.`rate`)) AS `re_total`,sum(`c`.`vat`) AS `vat`,`i`.`re_date` AS `re_date`,`o`.`po_date` AS `po_date`,`y`.`year_date` AS `year_date` from (((((((`acc_unit` `u` left join `acc_property` `t` on(`u`.`ppy_id` = `t`.`ppy_id`)) left join `acc_no` `a` on(`u`.`unit_id` = `a`.`unit_id`)) left join `yearly_po_cr` `y` on(`a`.`acc_id` = `y`.`acc_id`)) left join `podetail` `p` on(`a`.`acc_id` = `p`.`acc_id`)) left join `cash_receipt` `c` on(`a`.`acc_id` = `c`.`acc_id`)) left join `receipt` `i` on(`c`.`re_id` = `i`.`re_id`)) left join `po` `o` on(`p`.`po_id` = `o`.`po_id`)) where `t`.`ppy_name` = 'ລາຍຈ່າຍ' group by `u`.`unit_id` order by `a`.`acc_id` ;

-- --------------------------------------------------------

--
-- Structure for view `yearly_revenuedetail_view`
--
DROP TABLE IF EXISTS `yearly_revenuedetail_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly_revenuedetail_view`  AS  select `a`.`acc_id` AS `acc_id`,`a`.`acc_name` AS `acc_name`,`a`.`unit_id` AS `unit_id`,`u`.`unit_name` AS `unit_name`,`y`.`po_price` AS `po_price`,`y`.`re_price` AS `re_price`,sum(`p`.`qty` * (`p`.`price` * `p`.`rate`)) AS `po_total`,sum(`c`.`qty` * (`c`.`price` * `c`.`rate`)) AS `re_total`,sum(`c`.`vat`) AS `vat`,`i`.`re_date` AS `re_date`,`o`.`po_date` AS `po_date`,`y`.`year_date` AS `year_date` from (((((((`acc_no` `a` left join `yearly_po_cr` `y` on(`a`.`acc_id` = `y`.`acc_id`)) left join `podetail` `p` on(`a`.`acc_id` = `p`.`acc_id`)) left join `cash_receipt` `c` on(`a`.`acc_id` = `c`.`acc_id`)) left join `receipt` `i` on(`c`.`re_id` = `i`.`re_id`)) left join `po` `o` on(`p`.`po_id` = `o`.`po_id`)) left join `acc_unit` `u` on(`a`.`unit_id` = `u`.`unit_id`)) left join `acc_property` `t` on(`u`.`ppy_id` = `t`.`ppy_id`)) where `t`.`ppy_name` = 'ລາຍຮັບ' group by `c`.`acc_id` order by `c`.`acc_id` ;

-- --------------------------------------------------------

--
-- Structure for view `yearly_revenue_view`
--
DROP TABLE IF EXISTS `yearly_revenue_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly_revenue_view`  AS  select `u`.`unit_id` AS `unit_id`,`u`.`unit_name` AS `unit_name`,sum(`y`.`po_price`) AS `po_price`,sum(`y`.`re_price`) AS `re_price`,sum(`p`.`qty` * (`p`.`price` * `p`.`rate`)) AS `po_total`,sum(`c`.`qty` * (`c`.`price` * `c`.`rate`)) AS `re_total`,sum(`c`.`vat`) AS `vat`,`i`.`re_date` AS `re_date`,`o`.`po_date` AS `po_date`,`y`.`year_date` AS `year_date` from (((((((`acc_unit` `u` left join `acc_property` `t` on(`u`.`ppy_id` = `t`.`ppy_id`)) left join `acc_no` `a` on(`u`.`unit_id` = `a`.`unit_id`)) left join `yearly_po_cr` `y` on(`a`.`acc_id` = `y`.`acc_id`)) left join `podetail` `p` on(`a`.`acc_id` = `p`.`acc_id`)) left join `cash_receipt` `c` on(`a`.`acc_id` = `c`.`acc_id`)) left join `receipt` `i` on(`c`.`re_id` = `i`.`re_id`)) left join `po` `o` on(`p`.`po_id` = `o`.`po_id`)) where `t`.`ppy_name` = 'ລາຍຮັບ' group by `u`.`unit_id` order by `a`.`acc_id` ;

-- --------------------------------------------------------

--
-- Structure for view `yearly_view`
--
DROP TABLE IF EXISTS `yearly_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly_view`  AS  select `a`.`acc_id` AS `acc_id`,`a`.`acc_name` AS `acc_name`,`y`.`po_price` AS `po_price`,`y`.`re_price` AS `re_price`,sum(`p`.`qty` * (`p`.`price` * `p`.`rate`)) AS `po_total`,sum(`c`.`qty` * (`c`.`price` * `c`.`rate`)) AS `re_total`,sum(`c`.`vat`) AS `vat`,`i`.`re_date` AS `re_date`,`o`.`po_date` AS `po_date`,`y`.`year_date` AS `year_date` from (((((((`acc_no` `a` left join `yearly` `y` on(`a`.`acc_id` = `y`.`acc_id`)) left join `podetail` `p` on(`a`.`acc_id` = `p`.`acc_id`)) left join `cash_receipt` `c` on(`a`.`acc_id` = `c`.`acc_id`)) left join `receipt` `i` on(`c`.`re_id` = `i`.`re_id`)) left join `po` `o` on(`p`.`po_id` = `o`.`po_id`)) left join `acc_unit` `u` on(`a`.`unit_id` = `u`.`unit_id`)) left join `acc_property` `t` on(`u`.`ppy_id` = `t`.`ppy_id`)) group by `a`.`acc_id` order by `a`.`acc_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_no`
--
ALTER TABLE `acc_no`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `acc_product`
--
ALTER TABLE `acc_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `acc_property`
--
ALTER TABLE `acc_property`
  ADD PRIMARY KEY (`ppy_id`);

--
-- Indexes for table `acc_unit`
--
ALTER TABLE `acc_unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `ppy_id` (`ppy_id`);

--
-- Indexes for table `applyemp`
--
ALTER TABLE `applyemp`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `auther_id` (`auther_id`);

--
-- Indexes for table `auther`
--
ALTER TABLE `auther`
  ADD PRIMARY KEY (`auther_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `backdistribute`
--
ALTER TABLE `backdistribute`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  ADD PRIMARY KEY (`cash_id`),
  ADD KEY `re_id` (`re_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `chsalary`
--
ALTER TABLE `chsalary`
  ADD PRIMARY KEY (`sry_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `distribute`
--
ALTER TABLE `distribute`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `auther_id` (`auther_id`);

--
-- Indexes for table `emp_skill`
--
ALTER TABLE `emp_skill`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `billno` (`billno`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`voice_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `invoice2`
--
ALTER TABLE `invoice2`
  ADD PRIMARY KEY (`voice_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`indet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `voice_id` (`voice_id`),
  ADD KEY `rate_id` (`rate_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `invoicedetail2`
--
ALTER TABLE `invoicedetail2`
  ADD PRIMARY KEY (`indet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `voice_id` (`voice_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `listcash_receipt`
--
ALTER TABLE `listcash_receipt`
  ADD PRIMARY KEY (`cash_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listimp`
--
ALTER TABLE `listimp`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `billno` (`billno`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sup_id` (`sup_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `rate_id` (`rate_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listinvoicedetail`
--
ALTER TABLE `listinvoicedetail`
  ADD PRIMARY KEY (`indet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `rate_id` (`rate_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listinvoicedetail2`
--
ALTER TABLE `listinvoicedetail2`
  ADD PRIMARY KEY (`indet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `rate_id` (`rate_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listorder`
--
ALTER TABLE `listorder`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `listot`
--
ALTER TABLE `listot`
  ADD PRIMARY KEY (`ot_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `listpodetail`
--
ALTER TABLE `listpodetail`
  ADD PRIMARY KEY (`no_`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `listpurchasedetail`
--
ALTER TABLE `listpurchasedetail`
  ADD PRIMARY KEY (`pdet_id`);

--
-- Indexes for table `listquotationdetail`
--
ALTER TABLE `listquotationdetail`
  ADD PRIMARY KEY (`quodet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `rate_id` (`rate_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listquotationdetail2`
--
ALTER TABLE `listquotationdetail2`
  ADD PRIMARY KEY (`quodet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listsalarydetail`
--
ALTER TABLE `listsalarydetail`
  ADD PRIMARY KEY (`sdet_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listyearly`
--
ALTER TABLE `listyearly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `listyearly_po_cr`
--
ALTER TABLE `listyearly_po_cr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `billno` (`billno`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`billno`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sup_id` (`sup_id`);

--
-- Indexes for table `ot`
--
ALTER TABLE `ot`
  ADD PRIMARY KEY (`ot_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `podetail`
--
ALTER TABLE `podetail`
  ADD PRIMARY KEY (`no_`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD PRIMARY KEY (`pdet_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quo_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `quotation2`
--
ALTER TABLE `quotation2`
  ADD PRIMARY KEY (`quo_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `quotationdetail`
--
ALTER TABLE `quotationdetail`
  ADD PRIMARY KEY (`quodet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `quo_id` (`quo_id`),
  ADD KEY `rate_id` (`rate_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `quotationdetail2`
--
ALTER TABLE `quotationdetail2`
  ADD PRIMARY KEY (`quodet_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `quo_id` (`quo_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sry_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `salarydetail`
--
ALTER TABLE `salarydetail`
  ADD PRIMARY KEY (`sdet_id`),
  ADD KEY `sry_id` (`sry_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `ppy_id` (`ppy_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`No_`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `yearly`
--
ALTER TABLE `yearly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `yearly_po_cr`
--
ALTER TABLE `yearly_po_cr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_product`
--
ALTER TABLE `acc_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `acc_property`
--
ALTER TABLE `acc_property`
  MODIFY `ppy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `acc_unit`
--
ALTER TABLE `acc_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `applyemp`
--
ALTER TABLE `applyemp`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auther`
--
ALTER TABLE `auther`
  MODIFY `auther_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `backdistribute`
--
ALTER TABLE `backdistribute`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_receipt`
--
ALTER TABLE `cash_receipt`
  MODIFY `cash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chsalary`
--
ALTER TABLE `chsalary`
  MODIFY `sry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distribute`
--
ALTER TABLE `distribute`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_skill`
--
ALTER TABLE `emp_skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  MODIFY `indet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoicedetail2`
--
ALTER TABLE `invoicedetail2`
  MODIFY `indet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listcash_receipt`
--
ALTER TABLE `listcash_receipt`
  MODIFY `cash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `listimp`
--
ALTER TABLE `listimp`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listinvoicedetail`
--
ALTER TABLE `listinvoicedetail`
  MODIFY `indet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listinvoicedetail2`
--
ALTER TABLE `listinvoicedetail2`
  MODIFY `indet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listorder`
--
ALTER TABLE `listorder`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listot`
--
ALTER TABLE `listot`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listpodetail`
--
ALTER TABLE `listpodetail`
  MODIFY `no_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `listpurchasedetail`
--
ALTER TABLE `listpurchasedetail`
  MODIFY `pdet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listquotationdetail`
--
ALTER TABLE `listquotationdetail`
  MODIFY `quodet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listquotationdetail2`
--
ALTER TABLE `listquotationdetail2`
  MODIFY `quodet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `listsalarydetail`
--
ALTER TABLE `listsalarydetail`
  MODIFY `sdet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listyearly`
--
ALTER TABLE `listyearly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `listyearly_po_cr`
--
ALTER TABLE `listyearly_po_cr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot`
--
ALTER TABLE `ot`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podetail`
--
ALTER TABLE `podetail`
  MODIFY `no_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  MODIFY `pdet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotationdetail`
--
ALTER TABLE `quotationdetail`
  MODIFY `quodet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotationdetail2`
--
ALTER TABLE `quotationdetail2`
  MODIFY `quodet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salarydetail`
--
ALTER TABLE `salarydetail`
  MODIFY `sdet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `No_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `yearly`
--
ALTER TABLE `yearly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `yearly_po_cr`
--
ALTER TABLE `yearly_po_cr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_no`
--
ALTER TABLE `acc_no`
  ADD CONSTRAINT `acc_no_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `acc_unit` (`unit_id`);

--
-- Constraints for table `acc_unit`
--
ALTER TABLE `acc_unit`
  ADD CONSTRAINT `acc_unit_ibfk_1` FOREIGN KEY (`ppy_id`) REFERENCES `acc_property` (`ppy_id`);

--
-- Constraints for table `emp_skill`
--
ALTER TABLE `emp_skill`
  ADD CONSTRAINT `emp_skill_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_ibfk_1` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`);

--
-- Constraints for table `invoice2`
--
ALTER TABLE `invoice2`
  ADD CONSTRAINT `invoice2_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `invoice2_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`);

--
-- Constraints for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD CONSTRAINT `invoicedetail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `acc_product` (`pro_id`),
  ADD CONSTRAINT `invoicedetail_ibfk_2` FOREIGN KEY (`voice_id`) REFERENCES `invoice` (`voice_id`),
  ADD CONSTRAINT `invoicedetail_ibfk_3` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`),
  ADD CONSTRAINT `invoicedetail_ibfk_4` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `invoicedetail2`
--
ALTER TABLE `invoicedetail2`
  ADD CONSTRAINT `invoicedetail2_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `invoicedetail2_ibfk_2` FOREIGN KEY (`voice_id`) REFERENCES `invoice2` (`voice_id`),
  ADD CONSTRAINT `invoicedetail2_ibfk_3` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listcash_receipt`
--
ALTER TABLE `listcash_receipt`
  ADD CONSTRAINT `listcash_receipt_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listimp`
--
ALTER TABLE `listimp`
  ADD CONSTRAINT `listimp_ibfk_1` FOREIGN KEY (`billno`) REFERENCES `orders` (`billno`),
  ADD CONSTRAINT `listimp_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `listimp_ibfk_3` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `listimp_ibfk_4` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `listimp_ibfk_5` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`),
  ADD CONSTRAINT `listimp_ibfk_6` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listinvoicedetail`
--
ALTER TABLE `listinvoicedetail`
  ADD CONSTRAINT `listinvoicedetail_ibfk_2` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`),
  ADD CONSTRAINT `listinvoicedetail_ibfk_3` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listinvoicedetail2`
--
ALTER TABLE `listinvoicedetail2`
  ADD CONSTRAINT `listinvoicedetail2_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `listinvoicedetail2_ibfk_2` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`),
  ADD CONSTRAINT `listinvoicedetail2_ibfk_5` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listot`
--
ALTER TABLE `listot`
  ADD CONSTRAINT `listot_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `listpodetail`
--
ALTER TABLE `listpodetail`
  ADD CONSTRAINT `listpodetail_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`),
  ADD CONSTRAINT `listpodetail_ibfk_4` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`);

--
-- Constraints for table `listquotationdetail`
--
ALTER TABLE `listquotationdetail`
  ADD CONSTRAINT `listquotationdetail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `acc_product` (`pro_id`),
  ADD CONSTRAINT `listquotationdetail_ibfk_3` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listquotationdetail2`
--
ALTER TABLE `listquotationdetail2`
  ADD CONSTRAINT `listquotationdetail2_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `listquotationdetail2_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listsalarydetail`
--
ALTER TABLE `listsalarydetail`
  ADD CONSTRAINT `listsalarydetail_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `listsalarydetail_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listyearly`
--
ALTER TABLE `listyearly`
  ADD CONSTRAINT `listyearly_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `listyearly_po_cr`
--
ALTER TABLE `listyearly_po_cr`
  ADD CONSTRAINT `listyearly_po_cr_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `ot`
--
ALTER TABLE `ot`
  ADD CONSTRAINT `ot_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`);

--
-- Constraints for table `podetail`
--
ALTER TABLE `podetail`
  ADD CONSTRAINT `podetail_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`),
  ADD CONSTRAINT `podetail_ibfk_4` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`);

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `productdetail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Constraints for table `purchasedetail`
--
ALTER TABLE `purchasedetail`
  ADD CONSTRAINT `purchasedetail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase_order` (`purchase_id`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`);

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `quotation_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`);

--
-- Constraints for table `quotation2`
--
ALTER TABLE `quotation2`
  ADD CONSTRAINT `quotation2_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `quotation2_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`);

--
-- Constraints for table `quotationdetail`
--
ALTER TABLE `quotationdetail`
  ADD CONSTRAINT `quotationdetail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `acc_product` (`pro_id`),
  ADD CONSTRAINT `quotationdetail_ibfk_3` FOREIGN KEY (`rate_id`) REFERENCES `rate` (`rate_id`),
  ADD CONSTRAINT `quotationdetail_ibfk_4` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `quotationdetail2`
--
ALTER TABLE `quotationdetail2`
  ADD CONSTRAINT `quotationdetail2_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `quotationdetail2_ibfk_2` FOREIGN KEY (`quo_id`) REFERENCES `quotation2` (`quo_id`),
  ADD CONSTRAINT `quotationdetail2_ibfk_3` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `yearly`
--
ALTER TABLE `yearly`
  ADD CONSTRAINT `yearly_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);

--
-- Constraints for table `yearly_po_cr`
--
ALTER TABLE `yearly_po_cr`
  ADD CONSTRAINT `yearly_po_cr_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_no` (`acc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
