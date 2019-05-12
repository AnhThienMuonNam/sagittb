-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 10:03 AM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `alias`, `meta_description`, `description`, `content`, `image`, `tags`, `views`, `is_active`, `is_deleted`, `display_order`, `created_at`, `updated_at`) VALUES
(1, '\'Không sửa đường kịp thời để xảy ra tai nạn thì các đồng chí ra tòa\'4444', 'khong-sua-duong-kip-thoi-de-xay-ra-tai-nan-thi-cac-dong-chi-ra-toa4444', NULL, 'T111TO - Bộ trưởng Bộ Giao thông vận tải Nguyễn Văn Thể nhấn mạnh như vậy tại hội nghị tổng kết công tác năm 2018, triển khai công tác năm 2019 của Tổng cục Đường bộ Việt Nam vào chiều 3-1.', '%3Cp%3E%3Cstrong%3E%u1ED9%20tr%u01B0%u1EDFng%20Nguy%u1EC5n%20V%u0103n%20Th%u1EC3%20%u0111%u1EC1%20ngh%u1ECB%20l%u1EA5y%20b%26agrave%3Bi%20h%u1ECDc%20tai%20n%u1EA1n%20ch%u1EBFt%20ng%u01B0%u1EDDi%20tr%26ecirc%3Bn%20qu%u1ED1c%20l%u1ED9%201%20do%20ch%u1EADm%20s%u1EEDa%20ch%u1EEFa%20%u1EDF%20Ph%26uacute%3B%20Y%26ecirc%3Bn%20l%26agrave%3Bm%20b%26agrave%3Bi%20h%u1ECDc%20cho%20c%26ocirc%3Bng%20t%26aacute%3Bc%20duy%20tu%2C%20s%u1EEDa%20ch%u1EEFa%20%u0111%u01B0%u1EDDng%20b%u1ED9%20-%20%u1EA2nh%3A%20L%26Ecirc%3B%20QU%26Yacute%3B%20%u0110%26Ocirc%3B%3C/strong%3E%3C/p%3E%0A%0A%3Cp%3E%3Cstrong%3EN%u1EBFu%20l%26agrave%3Bm%20kh%26ocirc%3Bng%20h%u1EBFt%20tr%26aacute%3Bch%20nhi%u1EC7m%2C%20%u0111%u1EC3%20l%26aacute%3Bi%20xe%20ra%20%u0111%u01B0%u1EDDng%20g%26acirc%3By%20h%u1EADu%20qu%u1EA3%20nghi%26ecirc%3Bm%20tr%u1ECDng%20cho%20x%26atilde%3B%20h%u1ED9i%20l%26agrave%3B%20l%u1ED7i%20c%u1EE7a%20ch%26uacute%3Bng%20ta%2C%20l%u01B0%u01A1ng%20t%26acirc%3Bm%20t%u1EF1%20suy%20x%26eacute%3Bt%20th%u1EA5y%20c%26oacute%3B%20l%u1ED7i%20r%u1EA5t%20l%u1EDBn.%20Theo%20lu%u1EADt%20nh%26acirc%3Bn%20qu%u1EA3%20ch%26uacute%3Bng%20ta%20l%26agrave%3Bm%20h%u1EBFt%20tr%26aacute%3Bch%20nhi%u1EC7m%20th%26igrave%3B%20thanh%20th%u1EA3n%2C%3C/strong%3E%20c%26ograve%3Bn%20l%26agrave%3Bm%20kh%26ocirc%3Bng%20h%u1EBFt%20tr%26aacute%3Bch%20nhi%u1EC7m%20s%u1EBD%20c%26oacute%3B%20chuy%u1EC7n%20n%26agrave%3By%20chuy%u1EC7n%20kia.%3C/p%3E%0A%0A%3Cp%3EB%u1ED9%20tr%u01B0%u1EDFng%20B%u1ED9%20Giao%20th%26ocirc%3Bng%20v%u1EADn%20t%u1EA3i%20Nguy%u1EC5n%20V%u0103n%20Th%u1EC3%3C/p%3E%0A%0A%3Cp%3ETheo%20%26ocirc%3Bng%20Th%u1EC3%2C%20T%u1ED5ng%20c%u1EE5c%20%u0110%u01B0%u1EDDng%20b%u1ED9%20%u0111ang%20qu%u1EA3n%20l%26yacute%3B%2C%20b%u1EA3o%20tr%26igrave%3B%20h%u01A1n%2021.000km%20%u0111%u01B0%u1EDDng%20qu%26ocirc%3Bc%20l%u1ED9%20b%u1EB1ng%20v%u1ED1n%20qu%u1EF9%20b%u1EA3o%20tr%26igrave%3B%20%u0111%u01B0%u1EDDng%20b%u1ED9%20%28kh%26ocirc%3Bng%20t%26iacute%3Bnh%203.182km%20%u0111%u01B0%u1EDDng%20BOT%20do%20c%26aacute%3Bc%20nh%26agrave%3B%20%u0111%u1EA7u%20t%u01B0%20b%u1EA3o%20tr%26igrave%3B%29.%3C/p%3E%0A%0A%3Cp%3EN%u1EBFu%20l%26agrave%3Bm%20t%u1ED1t%20tr%26aacute%3Bch%20nhi%u1EC7m%20%u0111%u1EC3%20khai%20th%26aacute%3Bc%20hi%u1EC7u%20qu%u1EA3%20c%u01A1%20s%u1EDF%20h%u1EA1%20t%u1EA7ng%20hi%u1EC7n%20c%26oacute%3B%2C%20%u0111%u1EA3m%20b%u1EA3o%20an%20to%26agrave%3Bn%20cho%20ng%u01B0%u1EDDi%20d%26acirc%3Bn%20th%26igrave%3B%20nh%u1EEFng%20ng%u01B0%u1EDDi%20l%26agrave%3Bm%20c%26ocirc%3Bng%20t%26aacute%3Bc%20qu%u1EA3n%20l%26yacute%3B%20%u0111%u01B0%u1EDDng%20b%u1ED9%20t%26acirc%3Bm%20h%u1ED3n%20thanh%20th%u1EA3n%2C%20ng%u1EE7%20ngon.%3C/p%3E%0A%0A%3Cp%3E%26quot%3BQu%u1EA3n%20l%26yacute%3B%20kh%u1ED1i%20t%26agrave%3Bi%20s%u1EA3n%20%u0111%u01B0%u1EDDng%20b%u1ED9%20r%u1EA5t%20l%u1EDBn%20m%26agrave%3B%20kh%26ocirc%3B%3Cimg%20alt%3D%22%22%20src%3D%22/ckfinder/userfiles/files/4474E81F-BAC1-45BE-BEB6-D69E6E4D9A59.jpg%22%20style%3D%22height%3A700px%3B%20width%3A544px%22%20/%3Eng%20c%26oacute%3B%20gi%u1EA3i%20ph%26aacute%3Bp%2C%20kh%26ocirc%3Bng%20%u0111%u1EC1%20xu%u1EA5t%20k%u1ECBp%20th%u1EDDi%20khi%20thi%u1EBFu%20ti%u1EC1n%20b%u1EA3o%20tr%26igrave%3B%20th%26igrave%3B%20c%26oacute%3B%20th%u1EC3%20m%u1EA5t%20t%u1EDBi%205.000%20-10.000%20t%u1EC9%20%u0111%u1ED3ng%20m%u1ED7i%20n%u0103m%20trong%20khi%20%u0111%26aacute%3Bng%20ra%20m%u1ED9t%20n%u0103m%20ch%u1EC9%20m%u1EA5t%201.000%20t%u1EC9%20%u0111%u1ED3ng%20do%20%u0111%u01B0%u1EDDng%20h%u1ECFng.%20S%u1ED1%20ti%u1EC1n%20n%26agrave%3By%20r%u1EA5t%20l%u1EDBn%2C%20n%u1EBFu%20qu%u1EA3n%20l%26yacute%3B%20kh%26ocirc%3Bng%20t%u1ED1t%2C%20%u0111%u1EC3%20%u0111%u01B0%u1EDDng%20xu%u1ED1ng%20c%u1EA5p%2C%20h%u01B0%20h%u1ECFng%20l%26agrave%3B%20c%26oacute%3B%20l%u1ED7i%20v%u1EDBi%20d%26acirc%3Bn%20khi%20b%u1EA3n%20th%26acirc%3Bn%20ch%26uacute%3Bng%20ta%20kh%26ocirc%3Bng%20l%26agrave%3Bm%20tr%26ograve%3Bn%20tr%26aacute%3Bch%20nhi%u1EC7m%26quot%3B%20-%20%26ocirc%3Bng%20Th%u1EC3%20n%26oacute%3Bi.%3C/p%3E%0A%0A%3Cp%3ELi%26ecirc%3Bn%20quan%20%u0111%u1EBFn%20c%26ocirc%3Bng%20t%26aacute%3Bc%20duy%20tu%2C%20s%u1EEDa%20ch%u1EEFa%20%u0111%u01B0%u1EDDng%20b%u1ED9%2C%20B%u1ED9%20tr%u01B0%u1EDFng%20Th%u1EC3%20n%26ecirc%3Bu%20d%u1EABn%20ch%u1EE9ng%20v%u1EEBa%20qua%20gia%20%u0111%26igrave%3Bnh%20ng%u01B0%u1EDDi%20b%u1ECB%20tai%20n%u1EA1n%20t%u1EED%20vong%20do%20%u0111%u01B0%u1EDDng%20x%u1EA5u%20%u1EDF%20qu%u1ED1c%20l%u1ED9%201%20qua%20Ph%26uacute%3B%20Y%26ecirc%3Bn%20%u0111%26atilde%3B%20g%u1EEDi%20%u0111%u01A1n%20%u0111%u1EC1%20ngh%u1ECB%20t%26ograve%3Ba%20%26aacute%3Bn%20truy%20c%u1EE9u%20tr%26aacute%3Bch%20nhi%u1EC7m%20h%26igrave%3Bnh%20s%u1EF1%20c%u1EE7a%20Ban%20qu%u1EA3n%20l%26yacute%3B%20d%u1EF1%20%26aacute%3Bn%20Th%u0103ng%20Long.%3C/p%3E%0A%0A%3Cp%3EL%26yacute%3B%20do%20h%u1ECD%20%u0111%u1EC1%20ngh%u1ECB%20l%26agrave%3B%20do%20c%u01A1%20quan%20n%26agrave%3By%20ch%u1EC3nh%20m%u1EA3ng%20c%26ocirc%3Bng%20t%26aacute%3Bc%20duy%20tu%2C%20s%u1EEDa%20ch%u1EEFa%20d%u1EABn%20%u0111%u1EBFn%20tai%20n%u1EA1n%20ch%u1EBFt%20ng%u01B0%u1EDDi.%3C/p%3E%0A', '1546539214.jpg', '222,333,444,5555', 14, 1, 0, NULL, '2019-01-03 17:30:19', '2019-01-06 15:07:07'),
(2, 'Những trường hợp bán nhầm vé máy bay \'rẻ như bèo\' trên thế giới', 'nhung-truong-hop-ban-nham-ve-may-bay-re-nhu-beo-tren-the-gioi', NULL, 'TTO - Sự cố nhầm lẫn của Hãng Cathay Pacific khi bán vé giá 16.000 USD thành vé 675 USD chặng bay Việt Nam - New York hóa ra không hi hữu. Những trục trặc tương tự đã xảy ra nhiều, tới mức dân săn vé rẻ có cả bí kíp “canh me” sự cố tương tự.', '%3Ch2%3ETTO%20-%20S%u1EF1%20c%u1ED1%20nh%u1EA7m%20l%u1EABn%20c%u1EE7a%20H%26atilde%3Bng%20Cathay%20Pacific%20khi%20b%26aacute%3Bn%20v%26eacute%3B%20gi%26aacute%3B%2016.000%20USD%20th%26agrave%3Bnh%20v%26eacute%3B%20675%20USD%20ch%u1EB7ng%20bay%20Vi%u1EC7t%20Nam%20-%20New%20York%20h%26oacute%3Ba%20ra%20kh%26ocirc%3Bng%20hi%20h%u1EEFu.%20Nh%u1EEFng%20tr%u1EE5c%20tr%u1EB7c%20t%u01B0%u01A1ng%20t%u1EF1%20%u0111%26atilde%3B%20x%u1EA3y%20ra%20nhi%u1EC1u%2C%20t%u1EDBi%20m%u1EE9c%20d%26acirc%3Bn%20s%u0103n%20v%26eacute%3B%20r%u1EBB%20c%26oacute%3B%20c%u1EA3%20b%26iacute%3B%20k%26iacute%3Bp%20%26ldquo%3Bcanh%20me%26rdquo%3B%20s%u1EF1%20c%u1ED1%20t%u01B0%u01A1ng%20t%u1EF1.%3C/h2%3E%0A%0A%3Cul%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/cathay-ngung-bay-qua-iran-vi-so-ten-lua-985147.htm%22%3E%u200BCathay%20ng%u1EEBng%20bay%20qua%20Iran%20v%26igrave%3B%20s%u1EE3%20t%26ecirc%3Bn%20l%u1EEDa%3C/a%3E%3C/li%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/hanh-khach-tu-tu-tren-may-bay-cua-cathay-pacific-1090795.htm%22%3E%u200BH%26agrave%3Bnh%20kh%26aacute%3Bch%20t%u1EF1%20t%u1EED%20tr%26ecirc%3Bn%20m%26aacute%3By%20bay%20c%u1EE7a%20Cathay%20Pacific%3C/a%3E%3C/li%3E%0A%3C/ul%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/hang-khong-1546594612906891818130.jpg%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22Nh%u1EEFng%20tr%u01B0%u1EDDng%20h%u1EE3p%20b%E1n%20nh%u1EA7m%20v%E9%20m%E1y%20bay%20r%u1EBB%20nh%u01B0%20b%E8o%20tr%EAn%20th%u1EBF%20gi%u1EDBi%20-%20%u1EA2nh%201.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/hang-khong-1546594612906891818130.jpg%22%20/%3E%3C/a%3E%3C/p%3E%0A%0A%3Cp%3E%u1EA2nh%20%28minh%20h%u1ECDa%29%3A%20REUTERS%3C/p%3E%0A%0A%3Cp%3ENh%u1EEFng%20s%u1EF1%20c%u1ED1%20b%26aacute%3Bn%20l%u1EA7m%20gi%26aacute%3B%20v%26eacute%3B%20d%26ugrave%3B%20c%26oacute%3B%20nguy%26ecirc%3Bn%20nh%26acirc%3Bn%20t%u1EEB%20l%u1ED7i%20con%20ng%u01B0%u1EDDi/h%u1EC7%20th%u1ED1ng%20c%u0169ng%20%u0111%u1EC1u%20l%26agrave%3B%20%26quot%3Bd%u1ECBp%20tr%u1EDDi%20cho%26quot%3B%20v%u1EDBi%20nh%u1EEFng%20ng%u01B0%u1EDDi%20m%u01A1%20x%26ecirc%3B%20d%u1ECBch%20nh%u01B0ng%20t%26uacute%3Bi%20ti%u1EC1n%20l%u1EA1i%20qu%26aacute%3B%20eo%20h%u1EB9p.%3C/p%3E%0A%0A%3Cp%3ED%26ugrave%3B%20b%u1EA1n%20c%26oacute%3B%20tin%20hay%20kh%26ocirc%3Bng%20th%26igrave%3B%20nh%u1EEFng%20s%u1EF1%20c%u1ED1%20h%26atilde%3Bng%20bay%20b%26aacute%3Bn%20nh%u1EA7m%20gi%26aacute%3B%20v%26eacute%3B%20t%u1EEB%20%u0111%u1EAFt%20th%26agrave%3Bnh%20r%u1EBB%20v%u1EABn%20th%u01B0%u1EDDng%20x%u1EA3y%20ra.%3C/p%3E%0A%0A%3Cp%3E%3Cstrong%3E%u0110%u1EE7%20nguy%26ecirc%3Bn%20nh%26acirc%3Bn%20g%26acirc%3By%20l%u1ED7i%3C/strong%3E%3C/p%3E%0A%0A%3Cp%3ETrang%20Thriftynomads%20%u0111i%u1EC3m%20m%u1ED9t%20s%u1ED1%20tr%u01B0%u1EDDng%20h%u1EE3p%20ti%26ecirc%3Bu%20bi%u1EC3u%2C%20nh%u01B0%20n%u0103m%202007%20gi%26aacute%3B%20v%26eacute%3B%20h%u1EA1ng%20th%u01B0%u01A1ng%20gia%20%28business%20class%29%20ch%u1EB7ng%20bay%20kh%u1EE9%20h%u1ED3i%20San%20Francisco%20t%u1EDBi%20Auckland%2C%20New%20Zealand%20%u0111%u01B0%u1EE3c%20b%26aacute%3Bn%20v%u1EDBi%20gi%26aacute%3B%201.500%20USD%20thay%20v%26igrave%3B%2015.000%20USD%20do%20ng%u01B0%u1EDDi%20nh%u1EADp%20th%26ocirc%3Bng%20tin%20thi%u1EBFu%20m%u1ED9t%20s%u1ED1%20%26quot%3B0%26quot%3B%20trong%20gi%26aacute%3B%20v%26eacute%3B.%3C/p%3E%0A', '1546602208.jpg', '444,555,666,777', 0, 1, 0, NULL, '2019-01-04 11:43:35', '2019-01-04 11:43:35'),
(3, 'Truy tố nguyên tổng giám đốc Liên doanh Việt - Nga Vietsovptro', 'truy-to-nguyen-tong-giam-doc-lien-doanh-viet-nga-vietsovptro', NULL, 'TTO - Ông Từ Thành Nghĩa (sinh năm 1962, nguyên tổng giám đốc VSP) và Võ Quang Huy (sinh năm 1961, nguyên chánh kế toán VSP) bị truy tố về tội \"lạm dụng chức vụ, quyền hạn chiếm đoạt tài sản\".', '%3Ch2%3ETTO%20-%20%26Ocirc%3Bng%20T%u1EEB%20Th%26agrave%3Bnh%20Ngh%u0129a%20%28sinh%20n%u0103m%201962%2C%20nguy%26ecirc%3Bn%20t%u1ED5ng%20gi%26aacute%3Bm%20%u0111%u1ED1c%20VSP%29%20v%26agrave%3B%20V%26otilde%3B%20Quang%20Huy%20%28sinh%20n%u0103m%201961%2C%20nguy%26ecirc%3Bn%20ch%26aacute%3Bnh%20k%u1EBF%20to%26aacute%3Bn%20VSP%29%20b%u1ECB%20truy%20t%u1ED1%20v%u1EC1%20t%u1ED9i%20%26quot%3Bl%u1EA1m%20d%u1EE5ng%20ch%u1EE9c%20v%u1EE5%2C%20quy%u1EC1n%20h%u1EA1n%20chi%u1EBFm%20%u0111o%u1EA1t%20t%26agrave%3Bi%20s%u1EA3n%26quot%3B.%3C/h2%3E%0A%0A%3Cul%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/bat-2-cuu-sep-vietsovpetro-va-loc-hoa-dau-binh-son-20180621194640189.htm%22%3EB%u1EAFt%202%20c%u1EF1u%20s%u1EBFp%20Vietsovpetro%20v%26agrave%3B%20L%u1ECDc%20h%26oacute%3Ba%20d%u1EA7u%20B%26igrave%3Bnh%20S%u01A1n%3C/a%3E%3C/li%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/trieu-tap-lanh-dao-vietsovpetro-lam-ro-loi-khai-nhan-hang-chuc-ti-20170908102742778.htm%22%3ETri%u1EC7u%20t%u1EADp%20l%26atilde%3Bnh%20%u0111%u1EA1o%20Vietsovpetro%20l%26agrave%3Bm%20r%26otilde%3B%20l%u1EDDi%20khai%20nh%u1EADn%20h%26agrave%3Bng%20ch%u1EE5c%20t%u1EC9%3C/a%3E%3C/li%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/lanh-dao-vietsovpetro-nhan-lai-ngoai-hang-chuc-ti-20170905103318146.htm%22%3EL%26atilde%3Bnh%20%u0111%u1EA1o%20Vietsovpetro%20nh%u1EADn%20l%26atilde%3Bi%20ngo%26agrave%3Bi%20h%26agrave%3Bng%20ch%u1EE5c%20t%u1EC9%3F%3C/a%3E%3C/li%3E%0A%3C/ul%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/586/2019/1/4/nghia-1529584901727300116953-1546596773624158101509-1546597031083527672150.png%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22Truy%20t%u1ED1%20nguy%EAn%20t%u1ED5ng%20gi%E1m%20%u0111%u1ED1c%20Li%EAn%20doanh%20Vi%u1EC7t%20-%20Nga%20Vietsovptro%20-%20%u1EA2nh%201.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/586/2019/1/4/nghia-1529584901727300116953-1546596773624158101509-1546597031083527672150.png%22%20/%3E%3C/a%3E%3C/p%3E%0A%0A%3Cp%3ENguy%26ecirc%3Bn%20t%u1ED5ng%20gi%26aacute%3Bm%20%u0111%u1ED1c%20VSP%20T%u1EEB%20Th%26agrave%3Bnh%20Ngh%u0129a%20b%u1ECB%20kh%u1EDFi%20t%u1ED1%2C%20b%u1EAFt%20t%u1EA1m%20giam%20t%u1EEB%20th%26aacute%3Bng%206-2018%20-%20%u1EA2nh%3A%20CQ%u0110T%3C/p%3E%0A%0A%3Cp%3EVi%u1EC7n%20Ki%u1EC3m%20s%26aacute%3Bt%20nh%26acirc%3Bn%20d%26acirc%3Bn%20T%u1ED1i%20cao%20v%u1EEBa%20ho%26agrave%3Bn%20t%u1EA5t%20c%26aacute%3Bo%20tr%u1EA1ng%20v%26agrave%3B%20ph%26acirc%3Bn%20c%26ocirc%3Bng%20Vi%u1EC7n%20Ki%u1EC3m%20s%26aacute%3Bt%20nh%26acirc%3Bn%20d%26acirc%3Bn%20TP%20H%26agrave%3B%20N%u1ED9i%20th%u1EF1c%20h%26agrave%3Bnh%20quy%u1EC1n%20c%26ocirc%3Bng%20t%u1ED1%2C%20ki%u1EC3m%20s%26aacute%3Bt%20x%26eacute%3Bt%20x%u1EED%20s%u01A1%20th%u1EA9m%20v%u1EE5%20%26aacute%3Bn%20%26quot%3Bl%u1EA1m%20d%u1EE5ng%20ch%u1EE9c%20v%u1EE5%2C%20quy%u1EC1n%20h%u1EA1n%20chi%u1EBFm%20%u0111o%u1EA1t%20t%26agrave%3Bi%20s%u1EA3n%26quot%3B%20x%u1EA3y%20ra%20t%u1EA1i%20Li%26ecirc%3Bn%20doanh%20Vi%u1EC7t%20-%20Nga%20Vietsovpetro%20%28VSP%29.%3C/p%3E%0A%0A%3Cp%3EHai%20b%u1ECB%20can%20trong%20v%u1EE5%20%26aacute%3Bn%20n%26agrave%3By%20l%26agrave%3B%20%26ocirc%3Bng%20T%u1EEB%20Th%26agrave%3Bnh%20Ngh%u0129a%20%28sinh%20n%u0103m%201962%2C%20nguy%26ecirc%3Bn%20t%u1ED5ng%20gi%26aacute%3Bm%20%u0111%u1ED1c%20VSP%29%20v%26agrave%3B%20V%26otilde%3B%20Quang%20Huy%20%28sinh%20n%u0103m%201961%2C%20nguy%26ecirc%3Bn%20ch%26aacute%3Bnh%20k%u1EBF%20to%26aacute%3Bn%20VSP%29%20b%u1ECB%20truy%20t%u1ED1%20v%u1EC1%20t%u1ED9i%20%26quot%3Bl%u1EA1m%20d%u1EE5ng%20ch%u1EE9c%20v%u1EE5%2C%20quy%u1EC1n%20h%u1EA1n%20chi%u1EBFm%20%u0111o%u1EA1t%20t%26agrave%3Bi%20s%u1EA3n%26quot%3B%20theo%20%u0110i%u1EC1u%20355%20B%u1ED9%20lu%u1EADt%20H%26igrave%3Bnh%20s%u1EF1%20n%u0103m%202015.%3C/p%3E%0A', '1546602275.jpg', '22,33', 0, 1, 0, NULL, '2019-01-04 11:44:52', '2019-01-04 11:44:52'),
(4, 'Phân làn hỗn hợp xe tải nặng với xe máy rất đáng lo ngại', 'phan-lan-hon-hop-xe-tai-nang-voi-xe-may-rat-dang-lo-ngai', NULL, 'TTO - Cần nghiên cứu phân luồng xe máy chạy riêng một làn, ôtô một làn bởi cứ để xe lưu thông hỗn hợp như hiện nay rất nguy hiểm, rất đáng sợ.', '%3Cp%3EC%u0169ng%20theo%20%26ocirc%3Bng%20Th%u1ECD%2C%20c%26aacute%3Bc%20y%u1EBFu%20t%u1ED1%20g%26acirc%3By%20tai%20n%u1EA1n%20giao%20th%26ocirc%3Bng%20li%26ecirc%3Bn%20quan%20%u0111%u1EBFn%20k%u1EBFt%20c%u1EA5u%20h%u1EA1%20t%u1EA7ng%2C%20k%u1EF9%20thu%u1EADt%20ph%u01B0%u01A1ng%20ti%u1EC7n%20v%26agrave%3B%20ng%u01B0%u1EDDi%20%u0111i%u1EC1u%20khi%u1EC3n%20ph%u01B0%u01A1ng%20ti%u1EC7n.%20C%u1EA7n%20l%26agrave%3Bm%20t%u1ED1t%20%u0111%u1ED3ng%20b%u1ED9%20c%u1EA3%20ba%20y%u1EBFu%20t%u1ED1%20n%26agrave%3By%20th%26igrave%3B%20tai%20n%u1EA1n%20m%u1EDBi%20gi%u1EA3m.%20N%u1EBFu%20h%u1EA1%20t%u1EA7ng%2C%20ph%u01B0%u01A1ng%20ti%u1EC7n%20t%u1ED1t%20nh%u01B0ng%20t%26agrave%3Bi%20x%u1EBF%20ch%u1EE7%20quan%2C%20kh%26ocirc%3Bng%20tu%26acirc%3Bn%20th%u1EE7%20quy%20%u0111%u1ECBnh%20c%u0169ng%20d%u1EC5%20x%u1EA3y%20ra%20tai%20n%u1EA1n.%3C/p%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/980/2019/1/3/qdcontainerduongmaichitho16a-15465281177271193780724.jpg%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22Ph%E2n%20l%E0n%20h%u1ED7n%20h%u1EE3p%20xe%20t%u1EA3i%20n%u1EB7ng%20v%u1EDBi%20xe%20m%E1y%20r%u1EA5t%20%u0111%E1ng%20lo%20ng%u1EA1i%20-%20%u1EA2nh%205.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/980/2019/1/3/qdcontainerduongmaichitho16a-15465281177271193780724.jpg%22%20/%3E%3C/a%3E%3C/p%3E%0A%0A%3Cp%3ENhi%u1EC1u%20xe%20container%2C%20xe%20t%u1EA3i%20l%u01B0u%20th%26ocirc%3Bng%20chung%20l%26agrave%3Bn%20%u0111%u01B0%u1EDDng%20v%u1EDBi%20xe%20m%26aacute%3By%20tr%26ecirc%3Bn%20%u0111%u01B0%u1EDDng%20Mai%20Ch%26iacute%3B%20Th%u1ECD%2C%20Q.2%2C%20TP.HCM%20-%20%u1EA2nh%3A%20QUANG%20%u0110%u1ECANH%3C/p%3E%0A%0A%3Cp%3E%3Cstrong%3ENhi%u1EC1u%20t%26agrave%3Bi%20x%u1EBF%20s%u1EED%20d%u1EE5ng%20ch%u1EA5t%20k%26iacute%3Bch%20th%26iacute%3Bch%3C/strong%3EM%u1ED9t%20th%u1EF1c%20t%u1EBF%20kh%26aacute%3Bc%20%u0111%u1EB7t%20ra%20l%26agrave%3B%20hi%u1EC7n%20nay%20c%26oacute%3B%20kh%26ocirc%3Bng%20%26iacute%3Bt%20t%26agrave%3Bi%20x%u1EBF%20xe%20t%u1EA3i%2C%20xe%20container%20s%u1EED%20d%u1EE5ng%20r%u01B0%u1EE3u%20bia%2C%20ma%20t%26uacute%3By%20khi%20tham%20gia%20giao%20th%26ocirc%3Bng.%20T%26agrave%3Bi%20x%u1EBF%20xe%20container%20Nguy%u1EC5n%20Duy%20Ph%26uacute%3Bc%20cho%20bi%u1EBFt%20hi%u1EC7n%20nay%20c%26oacute%3B%20kh%26aacute%3B%20nhi%u1EC1u%20ng%u01B0%u1EDDi%20s%u1EED%3C/p%3E%0A%0A%3Cp%3EV%u1EC1%20v%u1EA5n%20%u0111%u1EC1%20n%26agrave%3By%2C%20%26ocirc%3Bng%20L%26acirc%3Bm%20Thi%u1EBFu%20Qu%26acirc%3Bn%20cho%20r%u1EB1ng%20nh%u1EEFng%20v%u1EE5%20tai%20n%u1EA1n%20%26quot%3Bxe%20%u0111i%26ecirc%3Bn%26quot%3B%20t%26ocirc%3Bng%20h%26agrave%3Bng%20lo%u1EA1t%20xe%20m%26aacute%3By%20d%u1EEBng%20%u0111%26egrave%3Bn%20%u0111%u1ECF%20nguy%26ecirc%3Bn%20nh%26acirc%3Bn%20ch%u1EE7%20y%u1EBFu%20l%26agrave%3B%20do%20t%26agrave%3Bi%20x%u1EBF%20c%26oacute%3B%20n%u1ED3ng%20%u0111%u1ED9%20c%u1ED3n%2C%20ho%u1EB7c%20c%26oacute%3B%20s%u1EED%20d%u1EE5ng%20ch%u1EA5t%20k%26iacute%3Bch%20th%26iacute%3Bch.%3C/p%3E%0A', '1546602357.jpg', '33,44,5,66', 3, 1, 0, NULL, '2019-01-04 11:46:13', '2019-01-06 11:14:48'),
(5, 'Điều tra vụ nổ súng ở quán bar tại Tuy Hòa', 'dieu-tra-vu-no-sung-o-quan-bar-tai-tuy-hoa', NULL, 'TTO - Hai nhóm thanh niên đánh nhau gây thương tích, dùng súng tự chế bắn thị uy gây náo loạn tại một quán bar ở TP Tuy Hòa, tỉnh Phú Yên.', '%3Cp%3Ehi%u1EC1u%204-1%2C%20%u0111%u1EA1i%20t%26aacute%3B%20Nguy%u1EC5n%20Trung%20Ngh%u0129a%20-%20ph%26oacute%3B%20gi%26aacute%3Bm%20%u0111%u1ED1c%20C%26ocirc%3Bng%20an%20t%u1EC9nh%20Ph%26uacute%3B%20Y%26ecirc%3Bn%20-%20cho%20bi%u1EBFt%20%u0111%26atilde%3B%20ch%u1EC9%20%u0111%u1EA1o%20C%26ocirc%3Bng%20an%20TP%20Tuy%20H%26ograve%3Ba%20kh%u1EA9n%20tr%u01B0%u01A1ng%20%u0111i%u1EC1u%20tra%2C%20xem%20x%26eacute%3Bt%20kh%u1EDFi%20t%u1ED1%20v%u1EE5%20%26aacute%3Bn%20hai%20nh%26oacute%3Bm%20thanh%20ni%26ecirc%3Bn%20%u0111%26aacute%3Bnh%20nhau%20g%26acirc%3By%20th%u01B0%u01A1ng%20t%26iacute%3Bch%20v%26agrave%3B%20d%26ugrave%3Bng%20s%26uacute%3Bng%20t%u1EF1%20ch%u1EBF%20b%u1EAFn%20%u0111%u1EA1n%20bi%20g%26acirc%3By%20h%u01B0%20h%u1ECFng%20t%26agrave%3Bi%20s%u1EA3n%20x%u1EA3y%20ra%20t%u1EA1i%20qu%26aacute%3Bn%20T-Bar%20%26amp%3B%20Lounge%20tr%26ecirc%3Bn%20%u0111%u01B0%u1EDDng%20Nguy%u1EC5n%20Hu%u1EC7%2C%20TP%20Tuy%20H%26ograve%3Ba.%3C/p%3E%0A%0A%3Cp%3ETheo%20th%26ocirc%3Bng%20tin%20ban%20%u0111%u1EA7u%20t%u1EEB%20c%26ocirc%3Bng%20an%2C%20kho%u1EA3ng%2021h%20t%u1ED1i%203-1%2C%20Tr%u1EA7n%20Huy%20V%u0169%20%2822%20tu%u1ED5i%2C%20%u1EDF%20x%26atilde%3B%20H%26ograve%3Ba%20Quang%20Nam%2C%20huy%u1EC7n%20Ph%26uacute%3B%20H%26ograve%3Ba%2C%20t%u1EC9nh%20Ph%26uacute%3B%20Y%26ecirc%3Bn%29%20c%26ugrave%3Bng%20b%u1EA1n%20b%26egrave%3B%20%u0111%u1EBFn%20ch%u01A1i%20t%u1EA1i%20qu%26aacute%3Bn%20tr%26ecirc%3Bn%20th%26igrave%3B%20c%26oacute%3B%20va%20ch%u1EA1m%20v%u1EDBi%20Nguy%u1EC5n%20B%u1EA3o%20Trung%2C%2031%20tu%u1ED5i%2C%20%u1EDF%20x%26atilde%3B%20B%26igrave%3Bnh%20Ki%u1EBFn%2C%20Tuy%20H%26ograve%3Ba.%3C/p%3E%0A%0A%3Cp%3ETh%u1EA5y%20V%u0169%20v%26agrave%3B%20ng%u01B0%u1EDDi%20b%u1EA1n%20%u0111i%20c%26ugrave%3Bng%20t%26ecirc%3Bn%20L%26ecirc%3B%20Tri%u1EC7u%20M%u1EABn%20%2824%20tu%u1ED5i%2C%20%u1EDF%20Tuy%20H%26ograve%3Ba%29%20%u0111%26aacute%3Bnh%20Trung%20n%26ecirc%3Bn%20nh%26oacute%3Bm%20b%u1EA1n%20c%u1EE7a%20Trung%20x%26ocirc%3Bng%20v%26agrave%3Bo%20r%u01B0%u1EE3t%20%u0111u%u1ED5i.%20Trung%20v%26agrave%3B%20nh%26oacute%3Bm%20b%u1EA1n%20%u0111%26atilde%3B%20d%26ugrave%3Bng%20dao%20%u0111%26acirc%3Bm%20V%u0169%2C%20%u0111%26aacute%3Bnh%20M%u1EABn%20b%u1ECB%20th%u01B0%u01A1ng.%3C/p%3E%0A%0A%3Cp%3EH%u1EADu%20qu%u1EA3%2C%20Trung%2C%20V%u0169%20v%26agrave%3B%20M%u1EABn%20ph%u1EA3i%20%u0111%u1EBFn%20b%u1EC7nh%20vi%u1EC7n%20%u0111%u1EC3%20%u0111i%u1EC1u%20tr%u1ECB%20c%26aacute%3Bc%20v%u1EBFt%20th%u01B0%u01A1ng.%3C/p%3E%0A%0A%3Cp%3EM%u1ED9t%20thanh%20ni%26ecirc%3Bn%20trong%20nh%26oacute%3Bm%20c%u1EE7a%20Trung%20d%26ugrave%3Bng%20s%26uacute%3Bng%20t%u1EF1%20ch%u1EBF%20b%u1EAFn%20%u0111%u1EA1n%20bi%20v%26agrave%3Bo%20qu%26aacute%3Bn%20l%26agrave%3Bm%20v%u1EE1%20c%u1EEDa%20k%26iacute%3Bnh%2C%20sau%20%u0111%26oacute%3B%20ch%u0129a%20s%26uacute%3Bng%20v%26agrave%3Bo%20b%26agrave%3Bn%20c%26oacute%3B%20nh%26oacute%3Bm%20b%u1EA1n%20c%u1EE7a%20V%u0169%20%u0111ang%20ng%u1ED3i%20nh%u01B0ng%20kh%26ocirc%3Bng%20b%u1EAFn.%20Hi%u1EC7n%20c%26ocirc%3Bng%20an%20%u0111ang%20x%26aacute%3Bc%20minh%20danh%20t%26iacute%3Bnh%20c%u1EE7a%20thanh%20ni%26ecirc%3Bn%20s%u1EED%20d%u1EE5ng%20s%26uacute%3Bng%20t%u1EF1%20ch%u1EBF%20n%26agrave%3By.%3C/p%3E%0A', '1546602425.jpg', 'nosung,tuyhoa', 0, 1, 0, NULL, '2019-01-04 11:47:07', '2019-01-04 11:47:07'),
(6, '101 cách nịnh bợ cấp trên trong dịp Tết', '101-cach-ninh-bo-cap-tren-trong-dip-tet', NULL, 'Quy định cán bộ, công chức, viên chức không được nịnh bợ cấp trên vừa được ban hành ngay sát dịp Tết. Liệu các sếp có mất vui? Đừng lo, đã có họa sĩ biếm Tuổi Trẻ Cười \"vẽ đường cho hươu chạy\"...', '%3Ch2%3EQuy%20%u0111%u1ECBnh%20c%26aacute%3Bn%20b%u1ED9%2C%20c%26ocirc%3Bng%20ch%u1EE9c%2C%20vi%26ecirc%3Bn%20ch%u1EE9c%20kh%26ocirc%3Bng%20%u0111%u01B0%u1EE3c%20n%u1ECBnh%20b%u1EE3%20c%u1EA5p%20tr%26ecirc%3Bn%20v%u1EEBa%20%u0111%u01B0%u1EE3c%20ban%20h%26agrave%3Bnh%20ngay%20s%26aacute%3Bt%20d%u1ECBp%20T%u1EBFt.%20Li%u1EC7u%20c%26aacute%3Bc%20s%u1EBFp%20c%26oacute%3B%20m%u1EA5t%20vui%3F%20%u0110%u1EEBng%20lo%2C%20%u0111%26atilde%3B%20c%26oacute%3B%20h%u1ECDa%20s%u0129%20bi%u1EBFm%20Tu%u1ED5i%20Tr%u1EBB%20C%u01B0%u1EDDi%20%26quot%3Bv%u1EBD%20%u0111%u01B0%u1EDDng%20cho%20h%u01B0%u01A1u%20ch%u1EA1y%26quot%3B...%3C/h2%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/tranh-1-2-2018-tao-quan-tet-khong-quatranh-47-ttc-xuan-2018-bs3-25-1-2018-copy-1546586050062461155182.jpg%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22101%20c%E1ch%20n%u1ECBnh%20b%u1EE3%20c%u1EA5p%20tr%EAn%20trong%20d%u1ECBp%20T%u1EBFt%20-%20%u1EA2nh%201.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/tranh-1-2-2018-tao-quan-tet-khong-quatranh-47-ttc-xuan-2018-bs3-25-1-2018-copy-1546586050062461155182.jpg%22%20/%3E%3C/a%3E%3C/p%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/tranh-1-2-2018-tao-quan-tet-khong-quatransit-15465860500661405040965.jpg%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22101%20c%E1ch%20n%u1ECBnh%20b%u1EE3%20c%u1EA5p%20tr%EAn%20trong%20d%u1ECBp%20T%u1EBFt%20-%20%u1EA2nh%202.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/tranh-1-2-2018-tao-quan-tet-khong-quatransit-15465860500661405040965.jpg%22%20/%3E%3C/a%3E%3C/p%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/tranh-15-1-2017-qua-ga19-15465860500701403233618.jpg%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22101%20c%E1ch%20n%u1ECBnh%20b%u1EE3%20c%u1EA5p%20tr%EAn%20trong%20d%u1ECBp%20T%u1EBFt%20-%20%u1EA2nh%203.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/tranh-15-1-2017-qua-ga19-15465860500701403233618.jpg%22%20/%3E%3C/a%3E%3C/p%3E%0A', '1546602444.jpg', 'tet,sep', 12, 1, 0, NULL, '2019-01-04 11:47:35', '2019-01-06 16:17:49'),
(7, 'Nhật Bản là thị trường dẫn đầu về thu hút lao động Việt Nam', 'nhat-ban-la-thi-truong-dan-dau-ve-thu-hut-lao-dong-viet-nam', NULL, 'Năm 2018, tổng số lao động Việt Nam đi làm việc ở nước ngoài là 142.860 lao động, trong đó dẫn đầu là thị trường Nhật Bản đạt gần 69.000 lao động.', '%3Ch2%3EN%u0103m%202018%2C%20t%u1ED5ng%20s%u1ED1%20lao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20%u0111i%20l%26agrave%3Bm%20vi%u1EC7c%20%u1EDF%20n%u01B0%u1EDBc%20ngo%26agrave%3Bi%20l%26agrave%3B%20142.860%20lao%20%u0111%u1ED9ng%2C%20trong%20%u0111%26oacute%3B%20d%u1EABn%20%u0111%u1EA7u%20l%26agrave%3B%20th%u1ECB%20tr%u01B0%u1EDDng%20Nh%u1EADt%20B%u1EA3n%20%u0111%u1EA1t%20g%u1EA7n%2069.000%20lao%20%u0111%u1ED9ng.%3C/h2%3E%0A%0A%3Cul%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/lao-dong-viet-nam-rong-cua-lam-viec-tai-thi-truong-nhat-ban-20181212144003806.htm%22%3ELao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20%26ldquo%3Br%u1ED9ng%20c%u1EEDa%26rdquo%3B%20l%26agrave%3Bm%20vi%u1EC7c%20t%u1EA1i%20th%u1ECB%20tr%u01B0%u1EDDng%20Nh%u1EADt%20B%u1EA3n%3C/a%3E%3C/li%3E%0A%09%3Cli%3E%3Ca%20href%3D%22https%3A//tuoitre.vn/tuyen-500-lao-dong-viet-nam-di-thuc-tap-ky-thuat-tai-nhat-ban-2018120514262872.htm%22%3ETuy%u1EC3n%20500%20lao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20%u0111i%20th%u1EF1c%20t%u1EADp%20k%u1EF9%20thu%u1EADt%20t%u1EA1i%20Nh%u1EADt%20B%u1EA3n%3C/a%3E%3C/li%3E%0A%3C/ul%3E%0A%0A%3Cp%3E%3Ca%20href%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/photo-1-1546590128712171476837.jpg%22%20target%3D%22_blank%22%3E%3Cimg%20alt%3D%22Nh%u1EADt%20B%u1EA3n%20l%E0%20th%u1ECB%20tr%u01B0%u1EDDng%20d%u1EABn%20%u0111%u1EA7u%20v%u1EC1%20thu%20h%FAt%20lao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20-%20%u1EA2nh%201.%22%20src%3D%22https%3A//cdn.tuoitre.vn/thumb_w/640/2019/1/4/photo-1-1546590128712171476837.jpg%22%20/%3E%3C/a%3E%3C/p%3E%0A%0A%3Cp%3ETh%u1ECB%20tr%u01B0%u1EDDng%20Nh%u1EADt%20B%u1EA3n%20s%u1EBD%20thu%20h%26uacute%3Bt%20nhi%u1EC1u%20lao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20th%u1EDDi%20gian%20t%u1EDBi.%20%u1EA2nh%20minh%20h%u1ECDa.%20Ngu%u1ED3n%3A%20TTXVN%3C/p%3E%0A%0A%3Cp%3ETheo%20C%u1EE5c%20Qu%u1EA3n%20l%26yacute%3B%20lao%20%u0111%u1ED9ng%20ngo%26agrave%3Bi%20n%u01B0%u1EDBc%20%28B%u1ED9%20L%u0110TBXH%29%2C%20n%u0103m%202018%2C%20t%u1ED5ng%20s%u1ED1%20lao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20%u0111i%20l%26agrave%3Bm%20vi%u1EC7c%20%u1EDF%20n%u01B0%u1EDBc%20ngo%26agrave%3Bi%20l%26agrave%3B%20142.860%20lao%20%u0111%u1ED9ng%20%2850.292%20lao%20%u0111%u1ED9ng%20n%u1EEF%29%20v%u01B0%u1EE3t%2030%25%20so%20v%u1EDBi%20k%u1EBF%20ho%u1EA1ch%20n%u0103m%202018%2C%20trong%20%u0111%26oacute%3B%20d%u1EABn%20%u0111%u1EA7u%20l%26agrave%3B%20th%u1ECB%20tr%u01B0%u1EDDng%20Nh%u1EADt%20B%u1EA3n%20%u0111%u1EA1t%20g%u1EA7n%2069.000%20lao%20%u0111%u1ED9ng.%3C/p%3E%0A%0A%3Cp%3ETheo%20th%u1ED1ng%20k%26ecirc%3B%2C%20s%u1ED1%20l%u01B0%u1EE3ng%20th%u1EF1c%20t%u1EADp%20sinh%20h%u1EB1ng%20n%u0103m%20gia%20t%u0103ng%20nhanh%20ch%26oacute%3Bng.%20N%u0103m%202013%2C%20l%u1EA7n%20%u0111%u1EA7u%20ti%26ecirc%3Bn%20lao%20%u0111%u1ED9ng%20%u0111%u01B0%u1EE3c%20ph%26aacute%3Bi%20c%u1EED%20sang%20Nh%u1EADt%20B%u1EA3n%20v%u01B0%u1EE3t%20ng%u01B0%u1EE1ng%2010.000%20ng%u01B0%u1EDDi/n%u0103m%3B%20n%u0103m%202015%20%u0111%u1EA1t%20tr%26ecirc%3Bn%2030.000%20ng%u01B0%u1EDDi%20v%26agrave%3B%20n%u0103m%202017%20l%26agrave%3B%20tr%26ecirc%3Bn%2054.000%20ng%u01B0%u1EDDi.%20T%u1ED5ng%20s%u1ED1%20lao%20%u0111%u1ED9ng%20Vi%u1EC7t%20Nam%20%u0111ang%20th%u1EF1c%20t%u1EADp%20t%u1EA1i%20Nh%u1EADt%20B%u1EA3n%20kho%u1EA3ng%20126.000%20ng%u01B0%u1EDDi.%20Vi%u1EC7t%20Nam%20%u0111%26atilde%3B%20v%u01B0%u1EE3t%20qua%20Trung%20Qu%u1ED1c%20tr%u1EDF%20th%26agrave%3Bnh%20n%u01B0%u1EDBc%20c%26oacute%3B%20s%u1ED1%20l%u01B0%u1EE3ng%20ph%26aacute%3Bi%20c%u1EED%20h%u1EB1ng%20n%u0103m%20v%26agrave%3B%20s%u1ED1%20lao%20%u0111%u1ED9ng%20%u0111ang%20th%u1EF1c%20t%u1EADp%20sinh%20t%u1EA1i%20Nh%u1EADt%20B%u1EA3n%20%u0111%26ocirc%3Bng%20nh%u1EA5t%20trong%20s%u1ED1%2015%20qu%u1ED1c%20gia%20ph%26aacute%3Bi%20c%u1EED.%3C/p%3E%0A', '1546602479.jpg', 'nhatban,vietnam', 5, 1, 0, NULL, '2019-01-04 11:48:01', '2019-01-06 16:17:43');

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
  `sizevongs` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `display_order`, `is_active`, `created_at`, `updated_at`, `is_custom`, `alias`, `meta_description`, `is_deleted`, `image`, `kieuday_name`, `size_hat_name`, `sizevong_name`, `sizevongs`) VALUES
(1, 'Vòng tay1', NULL, 1, NULL, '2018-08-26 03:41:12', 1, 'vong-tay1', NULL, 0, '1533406307.jpg', 'Kiểu dây', 'Size hạt', 'Kích thước', 'vòng tay nam 11-cm,vòng tay nam 12cm,vòng tay nam 22cm'),
(2, 'Nhẫn', NULL, 1, NULL, '2018-06-09 18:44:22', 0, 'nhan', NULL, 0, 'bg1.jpg', NULL, NULL, NULL, NULL),
(3, 'Hoa tai', NULL, 0, '2018-04-13 20:27:35', '2018-08-04 18:14:22', 1, 'hoa-tai', NULL, 0, '1524848161.jpg', NULL, NULL, NULL, NULL),
(4, 'Dây chuyền', NULL, 1, '2018-04-13 20:32:39', '2018-04-27 10:00:58', 1, 'day-chuyen', NULL, 0, 'bg1.jpg', NULL, NULL, NULL, NULL),
(5, 'Vòng chân', NULL, 1, '2018-04-13 23:51:58', '2018-04-14 00:25:27', 0, 'vong-chan', NULL, 0, '1523688842.jpg', NULL, NULL, NULL, NULL),
(6, 'Test new without charm', NULL, 1, '2018-06-09 16:54:46', '2018-06-09 16:54:46', 1, 'test-new-without-charm', NULL, 0, '1528563182.jpg', NULL, NULL, NULL, NULL),
(7, 'Danh mục mới 02', NULL, 1, '2018-06-09 16:56:56', '2018-06-09 16:56:56', 1, 'danh-muc-moi-02', NULL, 0, '1528563413.jpg', NULL, NULL, NULL, NULL),
(8, 'Test new 200', NULL, 1, '2018-08-04 18:19:43', '2018-08-04 18:19:43', 1, 'test-new-200', NULL, 0, '1533406772.jpg', NULL, NULL, NULL, NULL),
(11, 'cate 03', NULL, 1, '2018-08-26 11:35:00', '2018-08-26 11:38:08', 1, 'cate-03', NULL, 0, '1535283488.jpg', 'kd', 'DC', 'DC', '11cm,44cm'),
(12, 'Test thủ', NULL, 1, '2018-12-25 14:20:54', '2018-12-25 14:20:54', 1, 'test-thu', NULL, 0, '1545747652.JPG', 'Kiểu dây', 'Size hạt', 'Kích thước vòng', 'abc,xxx,yyy');

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
-- Table structure for table `kieuday`
--

CREATE TABLE `kieuday` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(9,0) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kieuday`
--

INSERT INTO `kieuday` (`id`, `name`, `value`, `category_id`, `is_active`, `is_deleted`, `display_order`, `created_at`, `updated_at`) VALUES
(4, 'AAA', '0', 12, 1, 0, NULL, '2018-12-25 14:20:54', '2018-12-25 14:20:54'),
(5, 'BBB', '0', 12, 1, 0, NULL, '2018-12-25 14:20:54', '2018-12-25 14:20:54'),
(6, 'Kiêu abc', '0', 1, 1, 0, NULL, '2019-01-07 17:16:07', '2019-01-07 17:16:07'),
(7, 'Kiểu Xyz', '10000', 1, 1, 0, NULL, '2019-01-07 17:16:07', '2019-01-07 17:16:07'),
(8, 'Kiểu XXX', '5000', 1, 1, 0, NULL, '2019-01-07 17:16:07', '2019-01-07 17:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `lichsu_tracuu`
--

CREATE TABLE `lichsu_tracuu` (
  `id` int(10) UNSIGNED NOT NULL,
  `tra_cuu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket_qua` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(72, '2018_08_26_101517_update_category_0012201_addSizeVongs', 57),
(73, '2018_12_25_204428_add_table_kieuday_224412252018', 58),
(74, '2019_01_02_235346_update225301022019', 59),
(75, '2019_01_03_205230_update225201032019', 60),
(76, '2019_01_03_222019_update222001032019', 61),
(77, '2019_03_30_222821_update222803302019', 62),
(78, '2019_03_31_152826_add_table_152803312019', 63);

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
  `random_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_remind` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_name`, `customer_address`, `customer_district`, `customer_city`, `customer_phone`, `customer_email`, `customer_note`, `order_status_id`, `customer_id`, `admin_note`, `created_at`, `updated_at`, `temp_price`, `original_price`, `total_items`, `payment_method_id`, `customer_city_id`, `is_paid`, `estimated_delivery_id`, `random_code`, `is_remind`) VALUES
(5, 'Triệu Xuân Thiện', 'dasd', 'asdasdasd', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', NULL, 7, 2, NULL, '2018-08-26 11:05:51', '2019-03-31 07:40:36', NULL, '480000', NULL, 2, 63, 0, 1, 'IgSP2TWqbRsKVe7ZSeUe2ekfWKnOHySFbLjF8CiFiuG35m9FO39nYhWtsp0ptZBNXvfq4DoG42VAyLeUSdZfhbudti', 1),
(6, 'Triệu Xuân Thiện', 'thong nhat', 'go vap', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', NULL, 7, 2, NULL, '2018-09-09 01:39:42', '2019-03-31 07:43:42', NULL, '607000', NULL, 2, 63, 0, 1, 'YdI0eYVqFNbz3GpQvc5Xe4GqM9bIFA83wjx1o6mhMTVNa9jcYlX15FrJKFX8wWyxbUq5FyQ4MoJsi0BED2OJluXCZE', 1),
(7, 'Triệu Xuân Thiện', 'o', 'go vao', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', 'ok', 1, 2, NULL, '2018-09-09 04:48:27', '2018-09-09 04:48:27', NULL, '420000', NULL, 1, 63, 0, NULL, 'ZMXBLpPuHBo4XP2uKpHvfGui4XxFZOeFwpmn40P2g4Q5pjMERCOWpHNxE6zPYQxihuzXeTaZHvtG5dyN4WeEKu15qX', 0),
(8, 'trieu xuan thien', 'quang trung', 'go vap', 'Tp. Hồ Chí Minh', '0372304204', 'bccthien@gmail.com', 'ok', 1, NULL, NULL, '2019-03-01 13:15:33', '2019-03-31 07:39:44', NULL, '1370000', NULL, 2, 63, 0, NULL, 'eTd1jPrWK2ceuXJcFoqCm9XRACt5GzZhD59jIT5Xtbg4iU4Yyhwfv34CRAlRMCLEZEBYigB27gL6scKPgetcGs1Mgp', 1),
(9, 'trieu xuan thien', 'quang trung', 'Go vap', 'Tp. Hồ Chí Minh', '0372304204', 'bccthien@gmail.com', 'ok 123', 7, NULL, NULL, '2019-01-06 14:40:09', '2019-01-06 14:45:41', NULL, '150000', NULL, 2, 63, 1, 1, 'ab0EHVeygawB0BCyLyE12ycY3Kzv2ikF9ZIjswqF0NtrchrmkT9OHYpDbDa7WhYhankCpfyB1KogsYJdsUrIEVY9QY', 0),
(10, 'Triệu Xuân Thiện', 'phuong 2', 'Go Vap', 'Tp. Hồ Chí Minh', '2123123', 'thiendandy@gmail.com', 'ok ok', 1, 2, NULL, '2019-03-30 14:53:10', '2019-03-30 14:53:10', NULL, '1210000', NULL, 2, 63, 0, NULL, 'F9NIlFDa3wGbqDuhH7NDFfY3Gt1TihNdG651N6ws80BoBQUIUu2GTq68lyIgHLQ8D72qTTpPfCN2mexPJuQRTYrK9o', 0);

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
(8, 'jav', 'X 1.5', '001122', 'Vòng tay1', NULL, 2, 7, 17, 1, NULL, '420000', '2018-09-09 04:48:27', '2018-09-09 04:48:27', '1525012970.jpg', 'jav', 'vòng tay nam 11-cm'),
(9, 'jav', 'X 1.5', 'Kiểu XXX', 'Vòng tay1', NULL, 2, 8, 17, 1, NULL, '290000', '2018-12-26 13:15:33', '2018-12-26 13:15:33', '1525012970.jpg', 'jav', 'vòng tay nam 11-cm'),
(10, 'jav', 'X 1.5', 'Kiêu abc', 'Vòng tay1', NULL, 3, 8, 17, 1, NULL, '420000', '2018-12-26 13:15:33', '2018-12-26 13:15:33', '1525012970.jpg', 'jav', 'vòng tay nam 11-cm'),
(11, 'Đặt tên cho sản phẩm của bạn', NULL, 'Kiểu XXX', NULL, NULL, 1, 8, NULL, NULL, NULL, '175000', '2018-12-26 13:15:33', '2018-12-26 13:15:33', NULL, NULL, 'vòng tay nam 11-cm'),
(12, 'Đặt tên cho sản phẩm của bạn', NULL, 'Kiểu Xyz', NULL, NULL, 1, 8, NULL, NULL, NULL, '395000', '2018-12-26 13:15:33', '2018-12-26 13:15:33', NULL, NULL, 'vòng tay nam 11-cm'),
(13, 'buồn ngủ', NULL, NULL, 'Nhẫn', NULL, 1, 8, 16, 2, NULL, '90000', '2018-12-26 13:15:33', '2018-12-26 13:15:33', '1525012805.jpg', 'buon-ngu', NULL),
(14, 'jav', 'X 1.5', 'Kiểu Xyz', 'Vòng tay1', NULL, 1, 9, 17, 1, NULL, '150000', '2019-01-06 14:40:09', '2019-01-06 14:40:09', '1525012970.jpg', 'jav', 'vòng tay nam 12cm'),
(15, 'đủ nhiều chưa', NULL, NULL, 'Nhẫn', NULL, 2, 10, 23, 2, NULL, '160000', '2019-03-30 14:53:10', '2019-03-30 14:53:10', '1525013366.jpg', 'du-nhieu-chua', NULL),
(16, 'tím tím', 'X 1.5', 'Kiêu abc', 'Vòng tay1', NULL, 1, 10, 21, 1, NULL, '1050000', '2019-03-30 14:53:10', '2019-03-30 14:53:10', '1525012391.jpg', 'tim-tim', 'vòng tay nam 11-cm');

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
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `discount` double(8,2) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(9,0) NOT NULL,
  `piece_id` int(10) UNSIGNED DEFAULT NULL,
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

INSERT INTO `product` (`id`, `name`, `description`, `display_order`, `is_active`, `discount`, `images`, `category_id`, `created_at`, `updated_at`, `price`, `piece_id`, `alias`, `meta_description`, `is_hot`, `tags`, `is_deleted`, `quantity_of_pieces`) VALUES
(2, 'Vòng tay nhôm', 'Đây là mô tả nè limit letter visible laravel limit letter visible laravel limit letter visible laravelokĐây là mô tả nè limit letter visible laravel limit letter visible laravel limit letter visible laravelokĐây là mô tả nè limit letter visible laravel limit letter visible laravel limit letter visible laravelok', NULL, 1, NULL, '1525013903.jpg,1525013906.jpg,1525013907.jpg,1525013909.jpg', 1, NULL, '2019-01-07 17:11:54', '600000', 7, 'vong-tay-nhom', 'vong-testing-00155', 1, 'ok,123', 0, 11),
(4, 'Nhaaxn Ahihi', 'Mo ta ne ahihi', NULL, 1, NULL, '1525012911.jpg,1525013940.jpg,1525013942.jpg,1525013945.jpg', 2, NULL, '2019-01-07 16:47:36', '80000', 6, 'nhaaxn-ahihi', 'nhanxxn-ahihi', 0, NULL, 0, 1),
(9, 'hạt cát', 'dream', NULL, 1, NULL, '1525012653.jpg,1525012657.jpg', 3, '2018-04-14 01:03:42', '2018-04-29 07:37:38', '599999', 7, 'hat-cat', NULL, 1, NULL, 0, NULL),
(10, 'abc', NULL, NULL, 1, NULL, '1525012678.jpg,1525017762.jpg,1525017763.jpg', 5, '2018-04-14 01:05:06', '2018-04-29 09:02:45', '60000', 10, 'abc', NULL, 1, NULL, 0, NULL),
(11, 'qqq', NULL, NULL, 1, NULL, '1525012805.jpg', 2, '2018-04-14 01:06:40', '2018-04-29 07:40:11', '90000', 5, 'qqq', NULL, 1, NULL, 0, NULL),
(12, '12345', NULL, NULL, 1, NULL, '1525013721.jpg,1525013723.jpg,1525013725.jpg,1525013726.jpg', 2, '2018-04-14 01:07:17', '2019-01-07 17:00:03', '90000', 1, '12345', NULL, 1, 'aa', 0, 1),
(13, 'rau muống', NULL, NULL, 1, NULL, '1525012805.jpg', 2, '2018-04-14 01:08:34', '2018-06-09 18:45:12', '90000', 5, 'rau-muong', NULL, 1, NULL, 0, NULL),
(15, 'mỏi tay', NULL, NULL, 1, NULL, '1525012718.jpg,1525012723.jpg', 1, '2018-04-14 01:10:03', '2018-04-29 07:38:44', '70000', 2, 'moi-tay', NULL, 1, NULL, 0, NULL),
(16, 'buồn ngủ', NULL, NULL, 1, NULL, '1525012805.jpg', 2, '2018-04-14 01:10:44', '2018-04-29 07:49:04', '90000', 5, 'buon-ngu', NULL, 1, NULL, 0, NULL),
(17, 'jav', 'mo ta san pham nay', NULL, 1, NULL, '1525012970.jpg,1525012975.jpg,1525012980.jpg', 1, '2018-04-14 01:11:56', '2018-08-26 04:41:01', '140000', 2, 'jav', NULL, 1, 'ok1', 0, 7),
(18, 'the ring', NULL, NULL, 1, NULL, '1525013764.jpg,1525013766.jpg,1525013768.jpg', 4, '2018-04-14 01:12:38', '2018-04-29 07:56:10', '200000', 8, 'the-ring', NULL, 1, NULL, 0, NULL),
(19, 'con ma', NULL, NULL, 1, NULL, '1525013310.jpg,1525013311.jpg,1525013313.jpg,1525013315.jpg', 2, '2018-04-14 01:13:50', '2018-04-29 07:48:36', '90000', 5, 'con-ma', NULL, 1, NULL, 0, NULL),
(20, 'mây mù', NULL, NULL, 1, NULL, '1525012805.jpg', 5, '2018-04-14 01:14:20', '2018-04-29 07:56:42', '60000', 10, 'may-mu', NULL, 1, NULL, 0, NULL),
(21, 'tím tím', NULL, NULL, 1, NULL, '1525012391.jpg,1525013888.jpg,1525013890.jpg', 1, '2018-04-14 01:14:51', '2018-04-29 07:58:11', '700000', 2, 'tim-tim', NULL, 1, NULL, 0, NULL),
(22, 'bốc hỏa', NULL, NULL, 1, NULL, '1525013822.jpg,1525013824.jpg,1525013826.jpg,1525013828.jpg,1525013830.jpg,1525013831.jpg', 4, '2018-04-14 01:16:58', '2018-04-29 07:57:13', '900000', 8, 'boc-hoa', NULL, 1, NULL, 0, NULL),
(23, 'đủ nhiều chưa', 'mo ta ne 1111 222 333', NULL, 1, NULL, '1525013366.jpg,1525013368.jpg,1525013370.jpg,1525013372.jpg', 2, '2018-04-14 01:18:37', '2019-01-02 16:27:57', '80000', 6, 'du-nhieu-chua', 'meta desssss', 1, 'tag1,tag2,ok', 0, 1),
(24, 'chúc thành công', 'đây là mô tả nè', NULL, 1, NULL, '1525013854.jpg,1525013856.jpg,1525013858.jpg,1525013859.jpg', 2, '2018-04-14 01:19:56', '2018-04-29 07:57:40', '50000', 6, 'chuc-thanh-cong', NULL, 1, NULL, 0, NULL),
(25, 'Nồi cơm điện', 'Mô tả nồi cơm điệm ko có gì', NULL, 1, NULL, '1525012805.jpg', 1, '2018-04-27 11:06:07', '2018-04-29 07:53:45', '500000', 3, 'noi-com-dien', 'cùi bắp', 1, NULL, 0, NULL),
(26, 'THiện added', 'ok', NULL, 1, NULL, '1533402736.jpg,1533402738.jpg,1533402740.jpg,1533402743.jpg,1533402745.jpg', 2, '2018-08-04 17:12:27', '2018-08-04 17:12:27', '2000000', 3, 'thien-added', 'not ok', 1, NULL, 0, 4),
(27, 'Test 0001111', 'no', NULL, 1, NULL, '1546881261.jpg', 1, '2019-01-07 17:14:23', '2019-01-07 17:15:16', '600009', 7, 'test-0001111', NULL, 1, 'aaaaa', 0, 2);

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
(22, 'A', 3, 11, 1, 0, NULL, '2018-08-26 11:35:00', '2018-08-26 11:35:00'),
(23, 'F', 6, 11, 1, 0, NULL, '2018-08-26 11:35:00', '2018-08-26 11:35:00'),
(25, 'X', 2, 12, 1, 0, NULL, '2018-12-25 14:20:54', '2018-12-25 14:20:54'),
(26, 'Y', 3, 12, 1, 0, NULL, '2018-12-25 14:20:54', '2018-12-25 14:20:54'),
(27, 'Z', 4, 12, 1, 0, NULL, '2018-12-25 14:20:54', '2018-12-25 14:20:54'),
(28, 'X 1.5', 1.5, 1, 1, 0, NULL, '2019-01-07 17:16:07', '2019-01-07 17:16:07'),
(29, 'X 999', 2, 1, 1, 0, NULL, '2019-01-07 17:16:07', '2019-01-07 17:16:07');

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
(36, 'charm 5', 7, 5, '2018-09-09 01:39:42', '2018-09-09 01:39:42', '-1'),
(37, 'Đá tám', 11, 8, '2018-12-26 13:15:33', '2018-12-26 13:15:33', 'X 1.5'),
(38, 'charm 2', 11, 2, '2018-12-26 13:15:33', '2018-12-26 13:15:33', '-1'),
(39, 'charm 2', 11, 2, '2018-12-26 13:15:33', '2018-12-26 13:15:33', '-1'),
(40, 'charm 2', 11, 2, '2018-12-26 13:15:33', '2018-12-26 13:15:33', '-1'),
(41, 'charm 2', 11, 2, '2018-12-26 13:15:33', '2018-12-26 13:15:33', '-1'),
(42, 'Đá ba', 12, 3, '2018-12-26 13:15:33', '2018-12-26 13:15:33', 'X 1.5'),
(43, 'Đá ba', 12, 3, '2018-12-26 13:15:33', '2018-12-26 13:15:33', 'X 1.5'),
(44, 'Đá ba', 12, 3, '2018-12-26 13:15:33', '2018-12-26 13:15:33', 'X 1.5'),
(45, 'Đá ba', 12, 3, '2018-12-26 13:15:33', '2018-12-26 13:15:33', 'X 1.5'),
(46, 'Đá ba', 12, 3, '2018-12-26 13:15:33', '2018-12-26 13:15:33', 'X 1.5'),
(47, 'charm 2', 12, 2, '2018-12-26 13:15:33', '2018-12-26 13:15:33', '-1'),
(48, 'charm 2', 12, 2, '2018-12-26 13:15:33', '2018-12-26 13:15:33', '-1');

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
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `line1`, `line2`, `line3`, `is_deleted`, `is_active`, `created_at`, `updated_at`, `image`, `url`) VALUES
(1, 'sale lên đến 1', '50%2', 'từ 01/10 - 20/103', 0, 1, NULL, '2019-01-06 16:19:14', '1546781165.jpg', 'filter/ok'),
(2, 'bộ sưu tập', 'cung Hỏa', NULL, 0, 1, NULL, NULL, '1520525109.jpg', 'youtube.com'),
(3, 'bộ sưu tập', 'cung Thủy', NULL, 0, 1, NULL, NULL, '1520525136.jpg', 'sagittb.com'),
(4, '112233', 'qqwwee', 'aassdd', 0, 1, '2019-01-06 13:11:24', '2019-01-06 13:11:24', '1546780282.jpg', 'xyz.com');

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
  `ip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_get_otp` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `is_admin`, `is_active`, `address`, `district`, `city`, `city_id`, `birthday`, `gender`, `year_ob`, `month_ob`, `day_ob`, `hour_ob`, `minute_ob`, `otp`, `ip`, `is_get_otp`) VALUES
(2, 'Triệu Xuân Thiện', 'thiendandy@gmail.com', '$2y$10$gEwIpQy9PGW1AkP9fYGq0u6TFdQJ1r9LBoeP11.GBgJ/J.5XLoUxi', 'UHLNxxgTEHdFxd3hlWYUX47evi20Z80SJnZGBBBVOCroLl7MGfcQTORd6jzo', NULL, '2019-05-12 07:56:22', 2123123, 1, 1, NULL, NULL, 'Đắk Nông', 15, NULL, -1, 1995, 8, 17, 12, 19, NULL, NULL, 0),
(3, 'TXT 8899444', 'bccthien@gmail.com', '$2y$10$qFEudQ5GOzcPtsRRIc8dbuReV5tIGK6byKD7eeUN.DmPx/LaDwNfO', 'HjLMEQQcvOckEKZVn5GVIWDNyt0vYauWBo1Z2ajwMTokC75FZU39XJjzuNPz', '2018-04-29 10:34:50', '2018-07-30 14:23:57', 1672304204, 0, 1, '90 QUang trung, Phường 12', 'Gò vấp', 'Bình Dương', 9, NULL, 1, 1990, 1, 1, 0, 0, '1FLr9l', NULL, 0),
(15, 'Trieu XUan Thien', 'xtthien@gmail.com', '$2y$10$G40brdjBO6k/gZdCM/DRwebN0VOpE/I8JDP9evwGm0ASD1qhl7jH.', NULL, '2019-05-12 07:59:55', '2019-05-12 07:59:55', 2323213, 0, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
-- Indexes for table `blog`
--
ALTER TABLE `blog`
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
-- Indexes for table `kieuday`
--
ALTER TABLE `kieuday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kieuday_category_id_foreign` (`category_id`);

--
-- Indexes for table `lichsu_tracuu`
--
ALTER TABLE `lichsu_tracuu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lichsu_tracuu_user_id_foreign` (`user_id`);

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
  ADD KEY `product_material_id_foreign` (`piece_id`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `kieuday`
--
ALTER TABLE `kieuday`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lichsu_tracuu`
--
ALTER TABLE `lichsu_tracuu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `nam_phong_thuy`
--
ALTER TABLE `nam_phong_thuy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `size_hat`
--
ALTER TABLE `size_hat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_order_detail`
--
ALTER TABLE `sub_order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kieuday`
--
ALTER TABLE `kieuday`
  ADD CONSTRAINT `kieuday_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `lichsu_tracuu`
--
ALTER TABLE `lichsu_tracuu`
  ADD CONSTRAINT `lichsu_tracuu_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
  ADD CONSTRAINT `product_material_id_foreign` FOREIGN KEY (`piece_id`) REFERENCES `piece` (`id`);

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
