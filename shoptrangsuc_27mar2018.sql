-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 12:31 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoptrangsuc_27mar2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_brand` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `owner`, `bank_number`, `bank_brand`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Vietcombank', 'Trieu Xuan Thien', '98123981233123', 'Tan Binh', 'vietcombank.png', 1, NULL, NULL),
(2, 'VietinBank', 'Hoang Thanh Thuy', '711AA8391289312', 'Gò Vấp', 'vietinbank.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_custom` tinyint(1) NOT NULL DEFAULT '0',
  `alias` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kieuday_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_hat_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizevong_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kieudays` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sizevongs` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `display_order`, `is_active`, `created_at`, `updated_at`, `is_custom`, `alias`, `meta_description`, `is_deleted`, `image`, `kieuday_name`, `size_hat_name`, `sizevong_name`, `kieudays`, `sizevongs`) VALUES
(1, 'Vòng tay1', NULL, 1, NULL, '2018-08-26 03:41:12', 1, 'vong-tay1', NULL, 0, '1533406307.jpg', 'Kiểu dây', 'Size hạt', 'Kích thước', '001122,445566,okokok,88888,hihi', 'vòng tay nam 11-cm,vòng tay nam 12cm,vòng tay nam 22cm'),
(2, 'Nhẫn', NULL, 1, NULL, '2018-06-09 18:44:22', 0, 'nhan', NULL, 0, '1528569862.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 'Hoa tai', NULL, 0, '2018-04-13 20:27:35', '2018-08-04 18:14:22', 1, 'hoa-tai', NULL, 0, '1524848161.jpg', NULL, NULL, NULL, NULL, NULL),
(4, 'Dây chuyền', NULL, 1, '2018-04-13 20:32:39', '2018-04-27 10:00:58', 1, 'day-chuyen', NULL, 0, '1524848458.jpg', NULL, NULL, NULL, NULL, NULL),
(5, 'Vòng chân', NULL, 1, '2018-04-13 23:51:58', '2018-04-14 00:25:27', 0, 'vong-chan', NULL, 0, '1523688842.jpg', NULL, NULL, NULL, NULL, NULL),
(6, 'Test new without charm', NULL, 1, '2018-06-09 16:54:46', '2018-06-09 16:54:46', 1, 'test-new-without-charm', NULL, 0, '1528563182.jpg', NULL, NULL, NULL, NULL, NULL),
(7, 'Danh mục mới 02', NULL, 1, '2018-06-09 16:56:56', '2018-06-09 16:56:56', 1, 'danh-muc-moi-02', NULL, 0, '1528563413.jpg', NULL, NULL, NULL, NULL, NULL),
(8, 'Test new 200', NULL, 1, '2018-08-04 18:19:43', '2018-08-04 18:19:43', 1, 'test-new-200', NULL, 0, '1533406772.jpg', NULL, NULL, NULL, NULL, NULL),
(9, 'New cate 01', NULL, 1, '2018-08-26 11:32:02', '2018-08-26 11:32:02', 1, 'new-cate-01', NULL, 0, NULL, 'KD', 'Dây', 'Mặt', '111,222,999', '11cm,13cm,15cm'),
(10, 'New cate 02', NULL, 1, '2018-08-26 11:34:03', '2018-08-26 11:34:03', 1, 'new-cate-02', NULL, 0, NULL, 'KD', 'Dây', 'Mặt', '111,222,999', '11cm,13cm,15cm'),
(11, 'cate 03', NULL, 1, '2018-08-26 11:35:00', '2018-08-26 11:38:08', 1, 'cate-03', NULL, 0, '1535283488.jpg', 'kd', 'DC', 'DC', '111,666', '11cm,44cm');

-- --------------------------------------------------------

--
-- Table structure for table `charm`
--

CREATE TABLE `charm` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(9,0) NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charm`
--

INSERT INTO `charm` (`id`, `name`, `display_order`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `price`, `image`) VALUES
(1, 'charm 1', NULL, 1, 1, NULL, '2018-04-27 01:38:55', '1000', 'c1.jpg'),
(2, 'charm 2', NULL, 1, 1, NULL, '2018-04-22 09:45:54', '5000', 'c2.jpg'),
(3, 'charm 3', NULL, 1, 0, NULL, NULL, '2000', 'c3.jpg'),
(4, 'charm 4', NULL, 1, 0, NULL, NULL, '3500', 'c4.jpg'),
(5, 'charm 5', NULL, 1, 0, NULL, NULL, '6000', 'c5.jpg'),
(6, 'charm 6', NULL, 1, 0, NULL, NULL, '25000', 'c6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_ship_cod` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `display_order`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `is_ship_cod`) VALUES
(1, 'An Giang', NULL, 1, 0, NULL, NULL, 0),
(2, 'Bà Rịa - Vũng Tàu', NULL, 1, 0, NULL, NULL, 0),
(3, 'Bắc Giang', NULL, 1, 0, NULL, NULL, 0),
(4, 'Bắc Kạn', NULL, 1, 0, NULL, NULL, 0),
(5, 'Bạc Liêu', NULL, 1, 0, NULL, NULL, 0),
(6, 'Bắc Ninh', NULL, 1, 0, NULL, NULL, 0),
(7, 'Bến Tre', NULL, 1, 0, NULL, NULL, 0),
(8, 'Bình Định', NULL, 1, 0, NULL, NULL, 0),
(9, 'Bình Dương', NULL, 1, 0, NULL, NULL, 0),
(10, 'Bình Phước', NULL, 1, 0, NULL, NULL, 0),
(11, 'Bình Thuận', NULL, 1, 0, NULL, NULL, 0),
(12, 'Cà Mau', NULL, 1, 0, NULL, NULL, 0),
(13, 'Cao Bằng', NULL, 1, 0, NULL, NULL, 0),
(14, 'Đắk Lắk', NULL, 1, 0, NULL, NULL, 0),
(15, 'Đắk Nông', NULL, 1, 0, NULL, NULL, 0),
(16, 'Điện Biên', NULL, 1, 0, NULL, NULL, 0),
(17, 'Đồng Nai', NULL, 1, 0, NULL, NULL, 0),
(18, 'Đồng Tháp', NULL, 1, 0, NULL, NULL, 0),
(19, 'Gia Lai', NULL, 1, 0, NULL, NULL, 0),
(20, 'Hà Giang', NULL, 1, 0, NULL, NULL, 0),
(21, 'Hà Nam', NULL, 1, 0, NULL, NULL, 0),
(22, 'Hà Tĩnh', NULL, 1, 0, NULL, NULL, 0),
(23, 'Hải Dương', NULL, 1, 0, NULL, NULL, 0),
(24, 'Hậu Giang', NULL, 1, 0, NULL, NULL, 0),
(25, 'Hòa Bình', NULL, 1, 0, NULL, NULL, 0),
(26, 'Hưng Yên', NULL, 1, 0, NULL, NULL, 0),
(27, 'Khánh Hòa', NULL, 1, 0, NULL, NULL, 0),
(28, 'Kiên Giang', NULL, 1, 0, NULL, NULL, 0),
(29, 'Kon Tum', NULL, 1, 0, NULL, NULL, 0),
(30, 'Lai Châu', NULL, 1, 0, NULL, NULL, 0),
(31, 'Lâm Đồng', NULL, 1, 0, NULL, NULL, 0),
(32, 'Lạng Sơn', NULL, 1, 0, NULL, NULL, 0),
(33, 'Lào Cai', NULL, 1, 0, NULL, NULL, 0),
(34, 'Long An', NULL, 1, 0, NULL, NULL, 0),
(35, 'Nam Định', NULL, 1, 0, NULL, NULL, 0),
(36, 'Nghệ An', NULL, 1, 0, NULL, NULL, 0),
(37, 'Ninh Bình', NULL, 1, 0, NULL, NULL, 0),
(38, 'Ninh Thuận', NULL, 1, 0, NULL, NULL, 0),
(39, 'Phú Thọ', NULL, 1, 0, NULL, NULL, 0),
(40, 'Quảng Bình', NULL, 1, 0, NULL, NULL, 0),
(41, 'Quảng Nam', NULL, 1, 0, NULL, NULL, 0),
(42, 'Quảng Ngãi', NULL, 1, 0, NULL, NULL, 0),
(43, 'Quảng Ninh', NULL, 1, 0, NULL, NULL, 0),
(44, 'Quảng Trị', NULL, 1, 0, NULL, NULL, 0),
(45, 'Sóc Trăng', NULL, 1, 0, NULL, NULL, 0),
(46, 'Sơn La', NULL, 1, 0, NULL, NULL, 0),
(47, 'Tây Ninh', NULL, 1, 0, NULL, NULL, 0),
(48, 'Thái Bình', NULL, 1, 0, NULL, NULL, 0),
(49, 'Thái Nguyên', NULL, 1, 0, NULL, NULL, 0),
(50, 'Thanh Hóa', NULL, 1, 0, NULL, NULL, 0),
(51, 'Thừa Thiên Huế', NULL, 1, 0, NULL, NULL, 0),
(52, 'Tiền Giang', NULL, 1, 0, NULL, NULL, 0),
(53, 'Trà Vinh', NULL, 1, 0, NULL, NULL, 0),
(54, 'Tuyên Quang', NULL, 1, 0, NULL, NULL, 0),
(55, 'Vĩnh Long', NULL, 1, 0, NULL, NULL, 0),
(56, 'Vĩnh Phúc', NULL, 1, 0, NULL, NULL, 0),
(57, 'Yên Bái', NULL, 1, 0, NULL, NULL, 0),
(58, 'Phú Yên', NULL, 1, 0, NULL, NULL, 0),
(59, 'Cần Thơ', NULL, 1, 0, NULL, NULL, 0),
(60, 'Đà Nẵng', 1, 1, 0, NULL, NULL, 0),
(61, 'Hải Phòng', NULL, 1, 0, NULL, NULL, 0),
(62, 'Hà Nội', 2, 1, 0, NULL, NULL, 0),
(63, 'Tp. Hồ Chí Minh', 3, 1, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estimated_delivery`
--

CREATE TABLE `estimated_delivery` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_value` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimated_delivery`
--

INSERT INTO `estimated_delivery` (`id`, `name`, `min_value`, `max_value`, `created_at`, `updated_at`) VALUES
(1, '1 - 2 ngày', 1, 2, NULL, NULL),
(2, '2 - 3 ngày', 2, 3, NULL, NULL),
(3, '3 - 4 ngày', 3, 4, NULL, NULL),
(4, '4 - 5 ngày', 4, 5, NULL, NULL),
(5, '5 - 6 ngày', 5, 6, NULL, NULL),
(6, '6 - 7 ngày', 6, 7, NULL, NULL),
(7, '7 - 8 ngày', 7, 8, NULL, NULL),
(8, '8 - 9 ngày', 8, 9, NULL, NULL),
(9, '9 - 10 ngày', 9, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_27_132954_create_table_Category', 1),
(8, '2018_03_27_133356_create_table_Attr', 2),
(11, '2018_03_27_133753_create_table_Attr_Value', 3),
(15, '2018_03_27_134045_create_table_Product', 4),
(17, '2018_04_02_165553_update_table_Product', 5),
(18, '2018_04_07_171335_update_table_Users', 6),
(19, '2018_04_08_045946_add_table_Kieuday', 7),
(20, '2018_04_08_050048_update_table_Category', 8),
(21, '2018_04_08_050321_add_table_Color', 9),
(22, '2018_04_08_100421_add_table_Sizes', 10),
(23, '2018_04_08_142816_add_table_Maretial', 10),
(25, '2018_04_10_160420_update_table_Product_2304', 11),
(27, '2018_04_11_183052_update_table_User_0128', 12),
(28, '2018_04_11_183818_create_table_OrderStatus', 13),
(29, '2018_04_11_183850_create_table_Order', 14),
(30, '2018_04_11_184457_create_table_OrderDetail', 15),
(31, '2018_04_11_190133_update_table_Order_0201', 16),
(32, '2018_04_11_190304_create_table_SubOrderdetail', 17),
(33, '2018_04_13_151004_update_table_Product_and_Category', 18),
(34, '2018_04_13_151229_update_table_Product_22122018', 19),
(35, '2018_04_13_155234_update_table_Product_2252', 20),
(36, '2018_04_13_170804_update_table_Product_0008', 21),
(37, '2018_04_13_182154_update_table_Setting', 22),
(38, '2018_04_14_062427_update_table_Category_addColumn_image', 23),
(39, '2018_04_17_140801_create_table_charm', 24),
(40, '2018_04_22_043202_create_table_favoritelists', 25),
(41, '2018_04_23_143152_update_table_OrderDEtails', 26),
(42, '2018_04_26_103003_add_table_payment_method', 27),
(43, '2018_04_26_103833_update_table_city_order', 28),
(44, '2018_04_26_105615_update_table_order_add_columncityid', 29),
(45, '2018_04_26_155416_update_table_order_add_paymentStatus', 30),
(46, '2018_04_26_164347_update_table_order_detail_addColumnImage', 31),
(47, '2018_04_26_171522_update_table_order_detail_addColumnAlias', 32),
(48, '2018_04_27_064022_add_table_FengShui', 33),
(49, '2018_04_27_064623_add_table_Namsinh_phong_thuy', 34),
(50, '2018_04_27_065736_update_table_nam_phong_thuy', 35),
(51, '2018_04_28_025453_add_table_EstimatedDelivery', 36),
(52, '2018_04_28_025716_update_table_order_0957', 37),
(53, '2018_04_28_071736_update_table_order_status', 38),
(54, '2018_04_29_044724_add_table_Topic', 39),
(55, '2018_04_29_045215_update_table_Topic', 40),
(56, '2018_04_29_160731_update_table_User_addCityId', 41),
(57, '2018_04_30_033223_update_table_User_token_expried', 42),
(58, '2018_06_10_021744_update_table_user_addBirthday_gender', 43),
(59, '2018_06_10_032504_update_table_user_addBirthday_gender_02', 44),
(60, '2018_06_19_002729_add_table_banks', 45),
(61, '2018_07_03_234638_add_table_Piece', 46),
(62, '2018_07_05_153010_update_table_sub_order_detail', 47),
(63, '2018_07_27_143706_add_table_SizeCoTay', 48),
(64, '2018_07_27_143940_update_table_sizecotay', 49),
(65, '2018_07_30_144508_update_table_User_otp', 50),
(66, '2018_07_30_162915_update_table_order_themsizecotay', 51),
(67, '2018_07_30_182733_update_table_user_addIP', 52),
(68, '2018_08_25_234849_add_table_sizeHat', 53),
(69, '2018_08_26_000805_add_table_sizeVong', 54),
(70, '2018_08_26_001211_update_category_0012201', 55),
(71, '2018_08_26_012139_update_category_0012201_addKieudays', 56),
(72, '2018_08_26_101517_update_category_0012201_addSizeVongs', 57);

-- --------------------------------------------------------

--
-- Table structure for table `nam_phong_thuy`
--

CREATE TABLE `nam_phong_thuy` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phong_thuy_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ten_nam` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nam_phong_thuy`
--

INSERT INTO `nam_phong_thuy` (`id`, `nam`, `phong_thuy_id`, `created_at`, `updated_at`, `ten_nam`) VALUES
(1, '1924', 1, NULL, NULL, 'Giáp Tý'),
(2, '1925', 1, NULL, NULL, 'Ất Sửu'),
(3, '1926', 4, NULL, NULL, 'Bính Dần'),
(4, '1927', 4, NULL, NULL, 'Đinh Mão'),
(5, '1928', 2, NULL, NULL, 'Mậu Thìn'),
(6, '1929', 2, NULL, NULL, 'Kỷ Tỵ'),
(7, '1930', 5, NULL, NULL, 'Canh Ngọ'),
(8, '1931', 5, NULL, NULL, 'Tân Mùi'),
(9, '1932', 1, NULL, NULL, 'Nhâm Thân'),
(10, '1933', 1, NULL, NULL, 'Quý Dậu'),
(11, '1934', 4, NULL, NULL, 'GiápTuất'),
(12, '1935', 4, NULL, NULL, 'Ất Hợi'),
(13, '1936', 3, NULL, NULL, 'Bính Tý'),
(14, '1937', 3, NULL, NULL, 'Đinh Sửu'),
(15, '1938', 5, NULL, NULL, 'Mậu Dần'),
(16, '1939', 5, NULL, NULL, 'Kỷ Mão'),
(17, '1940', 1, NULL, NULL, 'Canh Thìn'),
(18, '1941', 1, NULL, NULL, 'Tân Tỵ'),
(19, '1942', 2, NULL, NULL, 'Nhâm Ngọ'),
(20, '1943', 2, NULL, NULL, 'Qúy Mùi'),
(21, '1944', 3, NULL, NULL, 'Giáp Thân'),
(22, '1945', 3, NULL, NULL, 'Ất Dậu'),
(23, '1946', 5, NULL, NULL, 'Bính Tuất'),
(24, '1947', 5, NULL, NULL, 'Đinh hợi'),
(25, '1948', 4, NULL, NULL, 'Mậu Tý'),
(26, '1949', 4, NULL, NULL, 'Kỷ Sửu'),
(27, '1950', 2, NULL, NULL, 'Canh Dần'),
(28, '1951', 2, NULL, NULL, 'Tân Mão'),
(29, '1952', 3, NULL, NULL, 'NhâmThìn'),
(30, '1953', 3, NULL, NULL, 'Quý Tỵ'),
(31, '1954', 1, NULL, NULL, 'Giáp Ngọ'),
(32, '1955', 1, NULL, NULL, 'Ất Mùi'),
(33, '1956', 4, NULL, NULL, 'Bính thân'),
(34, '1957', 4, NULL, NULL, 'Đinh Dậu'),
(35, '1958', 2, NULL, NULL, 'Mậu Tuất'),
(36, '1959', 2, NULL, NULL, 'Kỷ Hợi'),
(37, '1960', 5, NULL, NULL, 'Canh Tý'),
(38, '1961', 5, NULL, NULL, 'Tân Sửu'),
(39, '1962', 1, NULL, NULL, 'Nhâm Dần'),
(40, '1963', 1, NULL, NULL, 'Quý Mão'),
(41, '1970', 4, NULL, NULL, 'Giáp Thìn'),
(42, '1965', 4, NULL, NULL, 'Ất Tỵ'),
(43, '1966', 3, NULL, NULL, 'Bính Ngọ'),
(44, '1967', 3, NULL, NULL, 'Đinh Mùi'),
(45, '1968', 5, NULL, NULL, 'Mậu Thân'),
(46, '1969', 5, NULL, NULL, 'Kỷ Dậu'),
(47, '1970', 1, NULL, NULL, 'Canh Tuất'),
(48, '1971', 1, NULL, NULL, 'Tân Hợi'),
(49, '1972', 2, NULL, NULL, 'Nhâm Tý'),
(50, '1973', 2, NULL, NULL, 'Quý Sửu'),
(51, '1974', 3, NULL, NULL, 'Giáp Dần'),
(52, '1975', 3, NULL, NULL, 'Ất Mão'),
(53, '1976', 5, NULL, NULL, 'Bính Thìn'),
(54, '1977', 5, NULL, NULL, 'Đinh Tỵ'),
(55, '1978', 4, NULL, NULL, 'Mậu Ngọ'),
(56, '1979', 4, NULL, NULL, 'Kỷ Mùi'),
(57, '1980', 2, NULL, NULL, 'Canh Thân'),
(58, '1981', 2, NULL, NULL, 'Tân Dậu'),
(59, '1982', 3, NULL, NULL, 'Nhâm Tuất'),
(60, '1983', 3, NULL, NULL, 'Quý Hợi'),
(61, '1984', 1, NULL, NULL, 'Giáp tý'),
(62, '1985', 1, NULL, NULL, 'Ất Sửu'),
(63, '1986', 4, NULL, NULL, 'Bính Dần'),
(64, '1987', 4, NULL, NULL, 'Đinh Mão'),
(65, '1988', 2, NULL, NULL, 'Mậu Thìn'),
(66, '1989', 2, NULL, NULL, 'Kỷ Tỵ'),
(67, '1990', 5, NULL, NULL, 'Canh Ngọ'),
(68, '1991', 5, NULL, NULL, 'Tân Mùi'),
(69, '1992', 1, NULL, NULL, 'Nhâm Thân'),
(70, '1993', 1, NULL, NULL, 'Quý Dậu'),
(71, '1994', 4, NULL, NULL, 'Giáp Tuất'),
(72, '1995', 4, NULL, NULL, 'Ất Hợi'),
(73, '1996', 3, NULL, NULL, 'Bính Tý'),
(74, '1997', 3, NULL, NULL, 'Đinh Sửu'),
(75, '1998', 5, NULL, NULL, 'Mậu Dần'),
(76, '1999', 5, NULL, NULL, 'Kỷ Mão'),
(77, '2000', 1, NULL, NULL, 'Canh Thìn'),
(78, '2001', 1, NULL, NULL, 'Tân Tỵ'),
(79, '2002', 2, NULL, NULL, 'Nhâm Ngọ'),
(80, '2003', 2, NULL, NULL, 'Qúy Mùi'),
(81, '2004', 3, NULL, NULL, 'GiápThân'),
(82, '2005', 3, NULL, NULL, 'Ất Dậu'),
(83, '2006', 5, NULL, NULL, 'Bính Tuất'),
(84, '2007', 5, NULL, NULL, 'Đinh hợi'),
(85, '2008', 4, NULL, NULL, 'Mậu Tý'),
(86, '2009', 4, NULL, NULL, 'Kỷ Sửu'),
(87, '2010', 2, NULL, NULL, 'Canh Dần'),
(88, '2011', 2, NULL, NULL, 'Tân Mão'),
(89, '2012', 3, NULL, NULL, 'Nhâm Thìn'),
(90, '2013', 3, NULL, NULL, 'Quý Tỵ'),
(91, '2014', 1, NULL, NULL, 'Giáp Ngọ'),
(92, '2015', 1, NULL, NULL, 'Ất Mùi'),
(93, '2016', 4, NULL, NULL, 'Bính Thân'),
(94, '2017', 4, NULL, NULL, 'Đinh Dậu'),
(95, '2018', 2, NULL, NULL, 'Mậu Tuất'),
(96, '2019', 2, NULL, NULL, 'Kỷ Hợi'),
(97, '2020', 5, NULL, NULL, 'Canh Tý'),
(98, '2021', 5, NULL, NULL, 'Tân Sửu'),
(99, '2022', 1, NULL, NULL, 'Nhâm Dần'),
(100, '2023', 1, NULL, NULL, 'Quý Mão'),
(101, '2024', 4, NULL, NULL, 'Giáp Thìn'),
(102, '2025', 4, NULL, NULL, 'Ất Tỵ'),
(103, '2026', 3, NULL, NULL, 'Bính Ngọ'),
(104, '2027', 3, NULL, NULL, 'Đinh Mùi'),
(105, '2028', 5, NULL, NULL, 'Mậu Thân'),
(106, '2029', 5, NULL, NULL, 'Kỷ Dậu'),
(107, '2030', 1, NULL, NULL, 'Canh Tuất'),
(108, '2031', 1, NULL, NULL, 'Tân Hợi'),
(109, '2032', 2, NULL, NULL, 'Nhâm Tý'),
(110, '2033', 2, NULL, NULL, 'Quý Sửu'),
(111, '2034', 3, NULL, NULL, 'Giáp Dần'),
(112, '2035', 3, NULL, NULL, 'Ất Mão'),
(113, '2036', 5, NULL, NULL, 'Bính Thìn'),
(114, '2037', 5, NULL, NULL, 'Đinh Tỵ'),
(115, '2038', 4, NULL, NULL, 'Mậu Ngọ'),
(116, '2039', 4, NULL, NULL, 'Kỷ Mùi'),
(117, '2040', 2, NULL, NULL, 'Canh Thân'),
(118, '2041', 2, NULL, NULL, 'Tân Dậu'),
(119, '2042', 3, NULL, NULL, 'Nhâm Tuất'),
(120, '2043', 3, NULL, NULL, 'Quý Hợi');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_district` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temp_price` decimal(9,0) DEFAULT NULL,
  `original_price` decimal(9,0) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_city_id` int(10) UNSIGNED DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `estimated_delivery_id` int(10) UNSIGNED DEFAULT NULL,
  `random_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_name`, `customer_address`, `customer_district`, `customer_city`, `customer_phone`, `customer_email`, `customer_note`, `order_status_id`, `customer_id`, `admin_note`, `created_at`, `updated_at`, `temp_price`, `original_price`, `total_items`, `payment_method_id`, `customer_city_id`, `is_paid`, `estimated_delivery_id`, `random_code`) VALUES
(5, 'Triệu Xuân Thiện', 'dasd', 'asdasdasd', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', NULL, 1, 2, NULL, '2018-08-26 11:05:51', '2018-08-26 11:05:51', NULL, '480000', NULL, 2, 63, 0, NULL, 'IgSP2TWqbRsKVe7ZSeUe2ekfWKnOHySFbLjF8CiFiuG35m9FO39nYhWtsp0ptZBNXvfq4DoG42VAyLeUSdZfhbudti'),
(6, 'Triệu Xuân Thiện', 'thong nhat', 'go vap', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', NULL, 1, 2, NULL, '2018-09-09 01:39:42', '2018-09-09 01:39:42', NULL, '607000', NULL, 2, 63, 0, NULL, 'YdI0eYVqFNbz3GpQvc5Xe4GqM9bIFA83wjx1o6mhMTVNa9jcYlX15FrJKFX8wWyxbUq5FyQ4MoJsi0BED2OJluXCZE'),
(7, 'Triệu Xuân Thiện', 'o', 'go vao', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', 'ok', 1, 2, NULL, '2018-09-09 04:48:27', '2018-09-09 04:48:27', NULL, '420000', NULL, 1, 63, 0, NULL, 'ZMXBLpPuHBo4XP2uKpHvfGui4XxFZOeFwpmn40P2g4Q5pjMERCOWpHNxE6zPYQxihuzXeTaZHvtG5dyN4WeEKu15qX');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sizehat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_kieuday` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `quanlity` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `temp_price` decimal(9,0) DEFAULT NULL,
  `original_price` decimal(9,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_alias` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_sizevong` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_name`, `product_sizehat`, `product_kieuday`, `category_name`, `discount`, `quanlity`, `order_id`, `product_id`, `category_id`, `temp_price`, `original_price`, `created_at`, `updated_at`, `product_image`, `product_alias`, `product_sizevong`) VALUES
(4, 'jav', 'adas', '001122', 'Vòng tay1', NULL, 1, 5, 17, 1, NULL, '140000', '2018-08-26 11:05:51', '2018-08-26 11:05:51', '1525012970.jpg', 'jav', 'vòng tay nam 11-cm'),
(5, 'jav', 'BBB', '001122', 'Vòng tay1', NULL, 1, 5, 17, 1, NULL, '210000', '2018-08-26 11:05:51', '2018-08-26 11:05:51', '1525012970.jpg', 'jav', 'vòng tay nam 11-cm'),
(6, 'Thiết kế bởi Triệu Xuân Thiện', NULL, '001122', NULL, NULL, 1, 5, NULL, NULL, NULL, '130000', '2018-08-26 11:05:51', '2018-08-26 11:05:51', NULL, NULL, 'vòng tay nam 11-cm'),
(7, 'Thiết kế bởi Triệu Xuân Thiện', NULL, '001122', NULL, NULL, 1, 6, NULL, NULL, NULL, '607000', '2018-09-09 01:39:42', '2018-09-09 01:39:42', NULL, NULL, 'vòng tay nam 11-cm'),
(8, 'jav', 'X 1.5', '001122', 'Vòng tay1', NULL, 2, 7, 17, 1, NULL, '420000', '2018-09-09 04:48:27', '2018-09-09 04:48:27', '1525012970.jpg', 'jav', 'vòng tay nam 11-cm');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`, `display_order`, `is_active`, `created_at`, `updated_at`, `visible`) VALUES
(1, 'Chưa thanh toán', 1, 1, NULL, NULL, 1),
(2, 'Chờ xác nhận\r\n', 2, 1, NULL, NULL, 1),
(3, 'Đã xác nhận\r\n', 3, 1, NULL, NULL, 1),
(4, 'Đang xử lý', 4, 1, NULL, NULL, 1),
(5, 'Đang giao hàng', 5, 1, NULL, NULL, 1),
(6, 'Đã giao hàng', 6, 1, NULL, NULL, 0),
(7, 'Huỷ', NULL, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `display_order`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán khi nhận hàng', 1, 1, 0, NULL, NULL),
(2, 'Chuyển tiền qua ngân hàng', 2, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phong_thuy`
--

CREATE TABLE `phong_thuy` (
  `id` int(10) UNSIGNED NOT NULL,
  `menh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuong_sinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoa_hop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `che_khac` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bi_khac` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong_thuy`
--

INSERT INTO `phong_thuy` (`id`, `menh`, `tuong_sinh`, `hoa_hop`, `che_khac`, `bi_khac`, `created_at`, `updated_at`) VALUES
(1, 'Kim (Kim loại)', 'Vàng, Nâu đất', 'Trắng, Xám, Ghi', 'Xanh lục', 'Đỏ, Hồng, Tím', NULL, NULL),
(2, 'Mộc (Cây cối)', 'Đen, Xanh nước', 'Xanh lục', 'Vàng, Nâu đất', 'Trắng, Xám, Ghi', NULL, NULL),
(3, 'Thủy (Nước)', 'Trắng, Xám, Ghi', 'Đen, Xanh nước', 'Đỏ, Hồng, Tím', 'Vàng, Nâu đất', NULL, NULL),
(4, 'Hỏa (Lửa)', 'Xanh lục', 'Đỏ, Hồng, Tím', 'Trắng, Xám, Ghi', 'Đen, Xanh nước', NULL, NULL),
(5, 'Thổ (Đất)', 'Đỏ, Hồng, Tím', 'Vàng, Nâu đất', 'Đen, Xanh nước', 'Xanh lục', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(9,0) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id`, `name`, `price`, `image`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Đá một', '40000', 'h1.jpg', 1, 0, NULL, NULL),
(2, 'Đá hai', '20000', 'h2.jpg', 1, 0, NULL, NULL),
(3, 'Đá ba', '50000', 'h3.jpg', 1, 0, NULL, NULL),
(4, 'Đá bốn', '40000', 'h4.jpg', 1, 0, NULL, NULL),
(5, 'Đá năm', '80000', 'h5.jpg', 1, 0, NULL, NULL),
(6, 'Đá sáu', '80000', 'h6.jpg', 1, 0, NULL, NULL),
(7, 'Đá bảy', '10000', 'h7.jpg', 1, 0, NULL, NULL),
(8, 'Đá tám', '100000', 'h8.jpg', 1, 0, NULL, NULL),
(9, 'Đá chín', '20000', 'h9.jpg', 1, 0, NULL, NULL),
(10, 'Đá mười', '60000', 'h10.jpg', 1, 0, NULL, NULL),
(11, 'Đá mười một', '20000', 'h11.jpg', 1, 0, NULL, NULL),
(12, 'Đá mười hai', '120000', 'h12.jpg', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `discount` double(8,2) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(9,0) NOT NULL,
  `piece_id` int(10) UNSIGNED DEFAULT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `alias` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `tags` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `quantity_of_pieces` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `display_order`, `is_active`, `discount`, `images`, `category_id`, `created_at`, `updated_at`, `price`, `piece_id`, `topic_id`, `alias`, `meta_description`, `is_hot`, `tags`, `is_deleted`, `quantity_of_pieces`) VALUES
(2, 'Vòng tay nhôm', 'Đây là mô tả nè limit letter visible laravel limit letter visible laravel limit letter visible laravelok', NULL, 1, NULL, '1525013903.jpg,1525013906.jpg,1525013907.jpg,1525013909.jpg', 1, NULL, '2018-08-04 17:17:43', '1476', 8, 1, 'vong-tay-nhom', 'vong-testing-00155', 1, 'ok,123', 0, 12),
(4, 'Nhaaxn Ahihi', 'Mo ta ne ahihi', NULL, 1, NULL, '1525012911.jpg,1525013940.jpg,1525013942.jpg,1525013945.jpg', 2, NULL, '2018-04-29 07:59:06', '1000', 6, NULL, 'nhaaxn-ahihi', 'nhanxxn-ahihi', 0, NULL, 0, NULL),
(9, 'hạt cát', 'dream', NULL, 1, NULL, '1525012653.jpg,1525012657.jpg', 3, '2018-04-14 01:03:42', '2018-04-29 07:37:38', '599999', 7, NULL, 'hat-cat', NULL, 1, NULL, 0, NULL),
(10, 'abc', NULL, NULL, 1, NULL, '1525012678.jpg,1525017762.jpg,1525017763.jpg', 5, '2018-04-14 01:05:06', '2018-04-29 09:02:45', '60000', 10, NULL, 'abc', NULL, 1, NULL, 0, NULL),
(11, 'qqq', NULL, NULL, 1, NULL, '1525012805.jpg,1525012810.jpg', 2, '2018-04-14 01:06:40', '2018-04-29 07:40:11', '90000', 5, NULL, 'qqq', NULL, 1, NULL, 0, NULL),
(12, '12345', NULL, NULL, 1, NULL, '1525013721.jpg,1525013723.jpg,1525013725.jpg,1525013726.jpg', 2, '2018-04-14 01:07:17', '2018-04-29 07:55:28', '90000', 5, NULL, '12345', NULL, 1, 'aa', 0, NULL),
(13, 'rau muống', NULL, NULL, 1, NULL, '1525012697.jpg,1528569911.jpg', 2, '2018-04-14 01:08:34', '2018-06-09 18:45:12', '90000', 5, NULL, 'rau-muong', NULL, 1, NULL, 0, NULL),
(15, 'mỏi tay', NULL, NULL, 1, NULL, '1525012718.jpg,1525012723.jpg', 1, '2018-04-14 01:10:03', '2018-04-29 07:38:44', '70000', 2, NULL, 'moi-tay', NULL, 1, NULL, 0, NULL),
(16, 'buồn ngủ', NULL, NULL, 1, NULL, '1525013337.jpg,1525013339.jpg,1525013341.jpg,1525013343.jpg', 2, '2018-04-14 01:10:44', '2018-04-29 07:49:04', '90000', 5, NULL, 'buon-ngu', NULL, 1, NULL, 0, NULL),
(17, 'jav', 'mo ta san pham nay', NULL, 1, NULL, '1525012970.jpg,1525012975.jpg,1525012980.jpg', 1, '2018-04-14 01:11:56', '2018-08-26 04:41:01', '140000', 2, NULL, 'jav', NULL, 1, NULL, 0, 7),
(18, 'the ring', NULL, NULL, 1, NULL, '1525013764.jpg,1525013766.jpg,1525013768.jpg', 4, '2018-04-14 01:12:38', '2018-04-29 07:56:10', '200000', 8, NULL, 'the-ring', NULL, 1, NULL, 0, NULL),
(19, 'con ma', NULL, NULL, 1, NULL, '1525013310.jpg,1525013311.jpg,1525013313.jpg,1525013315.jpg', 2, '2018-04-14 01:13:50', '2018-04-29 07:48:36', '90000', 5, NULL, 'con-ma', NULL, 1, NULL, 0, NULL),
(20, 'mây mù', NULL, NULL, 1, NULL, '1525013795.jpg,1525013797.jpg,1525013801.jpg', 5, '2018-04-14 01:14:20', '2018-04-29 07:56:42', '60000', 10, NULL, 'may-mu', NULL, 1, NULL, 0, NULL),
(21, 'tím tím', NULL, NULL, 1, NULL, '1525012391.jpg,1525013888.jpg,1525013890.jpg', 1, '2018-04-14 01:14:51', '2018-04-29 07:58:11', '700000', 2, NULL, 'tim-tim', NULL, 1, NULL, 0, NULL),
(22, 'bốc hỏa', NULL, NULL, 1, NULL, '1525013822.jpg,1525013824.jpg,1525013826.jpg,1525013828.jpg,1525013830.jpg,1525013831.jpg', 4, '2018-04-14 01:16:58', '2018-04-29 07:57:13', '900000', 8, NULL, 'boc-hoa', NULL, 1, NULL, 0, NULL),
(23, 'đủ nhiều chưa', 'mo ta ne 1111 222 333', NULL, 1, NULL, '1525013366.jpg,1525013368.jpg,1525013370.jpg,1525013372.jpg', 2, '2018-04-14 01:18:37', '2018-04-29 07:49:33', '50000', 6, NULL, 'du-nhieu-chua', 'meta desssss', 1, 'tag1,tag2', 0, NULL),
(24, 'chúc thành công', 'đây là mô tả nè', NULL, 1, NULL, '1525013854.jpg,1525013856.jpg,1525013858.jpg,1525013859.jpg', 2, '2018-04-14 01:19:56', '2018-04-29 07:57:40', '50000', 6, NULL, 'chuc-thanh-cong', NULL, 1, NULL, 0, NULL),
(25, 'Nồi cơm điện', 'Mô tả nồi cơm điệm ko có gì', NULL, 1, NULL, '1525013619.jpg,1525013620.jpg,1525013622.jpg,1525013623.jpg', 1, '2018-04-27 11:06:07', '2018-04-29 07:53:45', '500000', 3, NULL, 'noi-com-dien', 'cùi bắp', 1, NULL, 0, NULL),
(26, 'THiện added', 'ok', NULL, 1, NULL, '1533402736.jpg,1533402738.jpg,1533402740.jpg,1533402743.jpg,1533402745.jpg', 2, '2018-08-04 17:12:27', '2018-08-04 17:12:27', '2000000', 3, NULL, 'thien-added', 'not ok', 1, NULL, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `size_hat`
--

CREATE TABLE `size_hat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` float NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_hat`
--

INSERT INTO `size_hat` (`id`, `name`, `value`, `category_id`, `is_active`, `is_deleted`, `display_order`, `created_at`, `updated_at`) VALUES
(2, 'ZIN', 1, 5, 1, 0, NULL, NULL, NULL),
(17, 'X 1.5', 1.5, 1, 1, 0, NULL, '2018-08-26 03:41:12', '2018-08-26 03:41:12'),
(18, 'A', 1.2, 9, 1, 0, NULL, '2018-08-26 11:32:02', '2018-08-26 11:32:02'),
(19, 'D', 1.4, 9, 1, 0, NULL, '2018-08-26 11:32:02', '2018-08-26 11:32:02'),
(20, 'A', 1.2, 10, 1, 0, NULL, '2018-08-26 11:34:03', '2018-08-26 11:34:03'),
(21, 'D', 1.4, 10, 1, 0, NULL, '2018-08-26 11:34:03', '2018-08-26 11:34:03'),
(22, 'A', 3, 11, 1, 0, NULL, '2018-08-26 11:35:00', '2018-08-26 11:35:00'),
(23, 'F', 6, 11, 1, 0, NULL, '2018-08-26 11:35:00', '2018-08-26 11:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_order_detail`
--

CREATE TABLE `sub_order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `piece_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `piece_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `piece_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_order_detail`
--

INSERT INTO `sub_order_detail` (`id`, `piece_name`, `order_detail_id`, `piece_id`, `created_at`, `updated_at`, `piece_size`) VALUES
(23, 'Đá hai', 6, 2, '2018-08-26 11:05:51', '2018-08-26 11:05:51', 'adas'),
(24, 'Đá hai', 6, 2, '2018-08-26 11:05:51', '2018-08-26 11:05:51', 'adas'),
(25, 'charm 6', 6, 6, '2018-08-26 11:05:51', '2018-08-26 11:05:51', '-1'),
(26, 'charm 6', 6, 6, '2018-08-26 11:05:51', '2018-08-26 11:05:51', '-1'),
(27, 'Đá ba', 7, 3, '2018-09-09 01:39:42', '2018-09-09 01:39:42', 'ZIN'),
(28, 'Đá ba', 7, 3, '2018-09-09 01:39:42', '2018-09-09 01:39:42', 'ZIN'),
(29, 'Đá ba', 7, 3, '2018-09-09 01:39:42', '2018-09-09 01:39:42', 'ZIN'),
(30, 'charm 6', 7, 6, '2018-09-09 01:39:42', '2018-09-09 01:39:42', '-1'),
(31, 'charm 6', 7, 6, '2018-09-09 01:39:42', '2018-09-09 01:39:42', '-1'),
(32, 'charm 6', 7, 6, '2018-09-09 01:39:42', '2018-09-09 01:39:42', '-1'),
(33, 'Đá ba', 7, 3, '2018-09-09 01:39:42', '2018-09-09 01:39:42', 'A'),
(34, 'Đá ba', 7, 3, '2018-09-09 01:39:42', '2018-09-09 01:39:42', 'A'),
(35, 'charm 5', 7, 5, '2018-09-09 01:39:42', '2018-09-09 01:39:42', '-1'),
(36, 'charm 5', 7, 5, '2018-09-09 01:39:42', '2018-09-09 01:39:42', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `line1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `line1`, `line2`, `line3`, `is_deleted`, `is_active`, `created_at`, `updated_at`, `image`) VALUES
(1, 'sale lên đến ', '50%', 'từ 01/10 - 20/10', 0, 1, NULL, NULL, '1520525320.jpg'),
(2, 'bộ sưu tập', 'cung Hỏa', NULL, 0, 1, NULL, NULL, '1520525109.jpg'),
(3, 'bộ sưu tập', 'cung Thủy', NULL, 0, 1, NULL, NULL, '1520525136.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `year_ob` int(11) DEFAULT NULL,
  `month_ob` int(11) DEFAULT NULL,
  `day_ob` int(11) DEFAULT NULL,
  `hour_ob` int(11) DEFAULT NULL,
  `minute_ob` int(11) DEFAULT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `is_admin`, `is_active`, `address`, `district`, `city`, `city_id`, `birthday`, `gender`, `year_ob`, `month_ob`, `day_ob`, `hour_ob`, `minute_ob`, `otp`, `ip`) VALUES
(2, 'Triệu Xuân Thiện', 'thiendandy@gmail.com', '$2y$10$gEwIpQy9PGW1AkP9fYGq0u6TFdQJ1r9LBoeP11.GBgJ/J.5XLoUxi', 'Ref4XlwAjLWERRdKNJOaBW6bQmbv0aJd3LVhEtmc7AF7FY1nAy5ifdiufyYi', NULL, '2018-08-04 15:47:06', 2123123, 1, 1, NULL, NULL, 'Đắk Nông', 15, NULL, -1, 1995, 8, 17, 12, 19, NULL, NULL),
(3, 'TXT 8899444', 'bccthien@gmail.com', '$2y$10$qFEudQ5GOzcPtsRRIc8dbuReV5tIGK6byKD7eeUN.DmPx/LaDwNfO', 'bhVKZk6MN5IWvfKkQSmDXoMliPdaEjn09Vt2RPCcfFuzVYCDkksZZGNIwjd7', '2018-04-29 10:34:50', '2018-07-30 14:23:57', 1672304204, 0, 1, '90 QUang trung, Phường 12', 'Gò vấp', 'Bình Dương', 9, NULL, 1, 1990, 1, 1, 0, 0, '1FLr9l', NULL),
(4, 'Thien', 'xtthien@gmail.com', '$2y$10$yOoxKmp.FQZCrqM.BYWAnuUEveUfh3oKx9uOL2.AcE.SmCFsnFGEG', NULL, '2018-07-30 14:25:02', '2018-07-30 14:25:02', 82131923, 0, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 11, 2, '2018-04-22 10:12:41', '2018-04-22 10:12:41'),
(13, 4, 2, '2018-04-22 10:15:21', '2018-04-22 10:15:21'),
(17, 15, 3, '2018-04-30 05:45:25', '2018-04-30 05:45:25'),
(27, 2, 2, '2018-07-13 12:41:05', '2018-07-13 12:41:05'),
(28, 17, 3, '2018-08-05 10:59:17', '2018-08-05 10:59:17'),
(30, 17, 2, '2018-08-26 11:11:23', '2018-08-26 11:11:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charm`
--
ALTER TABLE `charm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimated_delivery`
--
ALTER TABLE `estimated_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nam_phong_thuy`
--
ALTER TABLE `nam_phong_thuy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nam_phong_thuy_phong_thuy_id_foreign` (`phong_thuy_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_order_status_id_foreign` (`order_status_id`),
  ADD KEY `order_customer_id_foreign` (`customer_id`),
  ADD KEY `order_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `order_customer_city_id_foreign` (`customer_city_id`),
  ADD KEY `order_estimated_delivery_id_foreign` (`estimated_delivery_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_product_id_foreign` (`product_id`),
  ADD KEY `order_detail_category_id_foreign` (`category_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong_thuy`
--
ALTER TABLE `phong_thuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_material_id_foreign` (`piece_id`),
  ADD KEY `product_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `size_hat`
--
ALTER TABLE `size_hat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_hat_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_order_detail`
--
ALTER TABLE `sub_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_order_detail_order_detail_id_foreign` (`order_detail_id`),
  ADD KEY `sub_order_detail_color_id_foreign` (`piece_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_list_product_id_foreign` (`product_id`),
  ADD KEY `wish_list_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `charm`
--
ALTER TABLE `charm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `estimated_delivery`
--
ALTER TABLE `estimated_delivery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `nam_phong_thuy`
--
ALTER TABLE `nam_phong_thuy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phong_thuy`
--
ALTER TABLE `phong_thuy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `size_hat`
--
ALTER TABLE `size_hat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sub_order_detail`
--
ALTER TABLE `sub_order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nam_phong_thuy`
--
ALTER TABLE `nam_phong_thuy`
  ADD CONSTRAINT `nam_phong_thuy_phong_thuy_id_foreign` FOREIGN KEY (`phong_thuy_id`) REFERENCES `phong_thuy` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_city_id_foreign` FOREIGN KEY (`customer_city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_estimated_delivery_id_foreign` FOREIGN KEY (`estimated_delivery_id`) REFERENCES `estimated_delivery` (`id`),
  ADD CONSTRAINT `order_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `order_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_material_id_foreign` FOREIGN KEY (`piece_id`) REFERENCES `piece` (`id`),
  ADD CONSTRAINT `product_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`);

--
-- Constraints for table `size_hat`
--
ALTER TABLE `size_hat`
  ADD CONSTRAINT `size_hat_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `sub_order_detail`
--
ALTER TABLE `sub_order_detail`
  ADD CONSTRAINT `sub_order_detail_color_id_foreign` FOREIGN KEY (`piece_id`) REFERENCES `piece` (`id`),
  ADD CONSTRAINT `sub_order_detail_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_detail` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `wish_list_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `remove_token` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-04-30 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users
SET    remember_token = null
WHERE  updated_at < DATE_SUB(NOW(), INTERVAL 5 MINUTE)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
