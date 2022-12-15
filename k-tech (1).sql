-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 04:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k-tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(5, 'Krishantha', 'Krishantha', 'acddcd1be50e65459940b991c4480e9a');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `image_name` text NOT NULL,
  `featured` text NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(16, 'Dell', 'brand_244.png', 'Yes', 'Yes'),
(17, 'Asus', 'brand_362.png', 'Yes', 'Yes'),
(18, 'MSI', 'brand_397.jpeg', 'Yes', 'Yes'),
(19, 'Hp', 'brand_582.png', 'No', 'Yes'),
(21, 'Apple', 'brand_822.jpg', 'Yes', 'Yes'),
(22, 'Lenovo', 'brand_158.jpg', 'Yes', 'Yes'),
(24, 'Corsair', 'brand_30.webp', 'No', 'Yes'),
(25, 'ADATA', 'brand_930.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `qty`, `subtotal`) VALUES
(261, 50, 125, 1, '139000.00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `featured` text NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `featured`, `active`) VALUES
(1, 'Laptop', 'Yes', 'Yes'),
(2, 'Monitor', 'Yes', 'Yes'),
(10, 'Keyboad', 'Yes', 'Yes'),
(11, 'Desktop', 'Yes', 'Yes'),
(12, 'iPad', 'Yes', 'Yes'),
(13, 'Mouse', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `subtotal` decimal(20,2) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `warranty` text NOT NULL,
  `brand` text NOT NULL,
  `category` text NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `image_name1` text NOT NULL,
  `image_name2` text NOT NULL,
  `image_name3` text NOT NULL,
  `image_name4` text NOT NULL,
  `image_name5` text NOT NULL,
  `image_name6` text NOT NULL,
  `image_name7` text NOT NULL,
  `desname1` text NOT NULL,
  `des1` text NOT NULL,
  `desname2` text NOT NULL,
  `des2` text NOT NULL,
  `desname3` text NOT NULL,
  `des3` text NOT NULL,
  `desname4` text NOT NULL,
  `des4` text NOT NULL,
  `desname5` text NOT NULL,
  `des5` text NOT NULL,
  `desname6` text NOT NULL,
  `des6` text NOT NULL,
  `desname7` text NOT NULL,
  `des7` text NOT NULL,
  `desname8` text NOT NULL,
  `des8` text NOT NULL,
  `desname9` text NOT NULL,
  `des9` text NOT NULL,
  `desname10` text NOT NULL,
  `des10` text NOT NULL,
  `featured` text NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `warranty`, `brand`, `category`, `price`, `stock`, `sale`, `image_name1`, `image_name2`, `image_name3`, `image_name4`, `image_name5`, `image_name6`, `image_name7`, `desname1`, `des1`, `desname2`, `des2`, `desname3`, `des3`, `desname4`, `des4`, `desname5`, `des5`, `desname6`, `des6`, `desname7`, `des7`, `desname8`, `des8`, `desname9`, `des9`, `desname10`, `des10`, `featured`, `active`) VALUES
(121, 'Asus M515DA – EJ1039T (R3)', '– AMD Ryzen 3 3250 Processor<br>\r\n– 8GB DDR4 RAM<br>\r\n– 128GB SSD NVMe + 1TB SATA Hard Drive<br>\r\n– AMD Radeon Graphics<br>\r\n– 15.6″ FHD Display<br>\r\n– Windows 10<br>', 'No Warranty', 'Asus', 'Laptop', '199500.00', 0, 7, 'product_Name_7330.jpg', 'product_Name_6291.png', 'product_Name_8767.png', 'product_Name_9336.png', 'product_Name_956.jpg', 'product_Name_929.webp', 'product_Name_5523.jpg', 'Color', 'Slate Grey<br>\r\nTransparent Silver', 'Operating System', 'Windows 10 Home', 'Processor', 'AMD Ryzen™ 3 3250U Mobile Processor (2C/4T, 5MB Cache, 3.5 GHz Max Boost)', 'Graphics', 'AMD Radeon™ Graphics', 'Display', '15.6-inch, FHD (1920 x 1080) 16:9 aspect ratio, 200nits, NTSC color gamut for non-OLED, Anti-glare display', 'Memory', '4GB DDR4 onboard, Memory Max Up to:16GB', 'Storage', '1TB SATA 5400RPM 2.5″ HDD', 'Battery', '37WHrs, 2S1P, 2-cell Li-ion', 'Power Supply', 'ø4.0, 45W AC Adapter, Output: 19V DC, 2.37A, 45W, Input: 100~240V AC 50/60Hz universal', 'Weight', '1.80 kg (3.97 lbs)', 'Yes', 'Yes'),
(122, 'Asus Vivobook X513EA BQ1631W – i3', '– Intel Core i3-1115G4 Processor<br>\r\n– 4GB DDR4 RAM<br>\r\n– 512GB NVMe M.2 SSD<br>\r\n– Intel UHD Graphics<br>\r\n– 15.6″, FHD Display<br>\r\n– 42WHrs, 3S1P, 3-cell Li-ion Battery<br>\r\n– Bespoke Black Color<br>\r\n– Windows 11 Home<br>', 'No Warranty', 'Dell', 'Laptop', '215000.00', 9, 1, 'product_Name_786.jpg', 'product_Name_9705.jpg', 'product_Name_3009.jpg', 'product_Name_1935.jpg', 'product_Name_8667.jpg', 'product_Name_3557.jpg', 'product_Name_2937.jpg', 'Processor', 'Intel Core i3-1115G4 Processor 3.0 GHz (6M Cache, up to 4.1 GHz, 2 cores)\r\n\r\n', 'Graphics', 'Intel UHD Graphics', 'Display', '15.6-inch, FHD (1920 x 1080) 16:9 aspect ratio, LED Backlit, 200nits, 45% NTSC color gamut for non-OLED, Anti-glare display, Screen-to-body ratio: 85 ％', 'Memory', '4GB DDR4 on board, Total system memory upgradeable to:12GB', 'Storage', '512GB M.2 NVMe PCIe 3.0 SSD', 'Expansion Slots (includes used)', '1x DDR4 SO-DIMM slot,\r\n1x M.2 2280 PCIe 3.0×2,\r\n1x STD 2.5” SATA HDD,', 'Keyboard & Touchpad', 'Backlit Chiclet Keyboard with Num-key, 1.4mm Key-travel, Touchpad', 'Camera', '720p HD camera', 'Battery', '42WHrs, 3S1P, 3-cell Li-ion', 'Operating System', 'Windows 11 Home', 'No', 'Yes'),
(124, 'Asus TUF Gaming F15 FX506HCB – HN169W', '– Intel Core i7 – 11800H Procesor<br>\r\n– 8GB DDR4 RAM<br>\r\n– 512GB M.2 NVMe SSD<br>\r\n– 15.6″ FHD, 144Hz Display<br>\r\n– Nvidia GeForce RTX 3050 Graphics<br>\r\n– Windows 11 Home', 'No Warranty', 'Asus', 'Laptop', '524000.00', 13, 4, 'product_Name_3166.jpg', 'product_Name_5366.jpg', 'product_Name_2990.jpg', 'product_Name_1673.jpg', 'product_Name_6452.jpg', 'product_Name_280.jpg', 'product_Name_3193.jpg', 'Model', 'Asus TUF Gaming F15 FX506HCB – HN169W', 'Processor', 'Intel Core i7-11800H Processor 2.3 GHz (24M Cache, up to 4.6 GHz, 8 Cores)', 'RAM', '8GB DDR4-3200 SO-DIMM x 2,Max', 'Hard Drive', '512GB M.2 NVMe PCIe  3.0 SSD', 'Graphics', 'NVIDIA GeForce RTX 3050 Laptop GPU, Up to 1600MHz at 60W (75W with Dynamic Boost), 4GB GDDR6', 'Display', '15.6-inch, FHD (1920 x 1080) 16:9, anti-glare display, sRGB:62.5%, Adobe:47.34%, Refresh Rate:144Hz, Value IPS-level, Adaptive-Sync, Optimus', 'Camera', '720P HD camera', 'Battery', '48WHrs, 3S1P, 3-cell Li-ion', 'Operating System', 'Windows 11 Home', 'Weight', '2.30 Kg (5.07 lbs)', 'Yes', 'Yes'),
(125, 'Asus X515E', '– Intel Core i3-1115G4 Processor<br>\r\n– 256GB SSD Drive<br>\r\n– 4GB DDR4 Ram<br>\r\n– 15.6″ HD (1366×767) Display<br>\r\n– WebCam & Bluetooth<br>\r\n– Windows 10 Home<br>\r\n– Baklit Keyboard<br>\r\n– Silver Color<br>', 'No Warranty', 'Asus', 'Laptop', '139000.00', 4, 1, 'product_Name_3902.jpg', 'product_Name_6030.jpg', 'product_Name_4533.jpg', 'product_Name_5257.jpg', 'product_Name_5180.png', 'product_Name_4871.webp', '', 'Color', 'Slate Grey', 'Operating System', 'Windows 10 Home', 'Processor', 'Intel Core™ i3-1115G4 Processor 3.0 GHz (6M Cache, up to 4.1 GHz, 2 cores)', 'Graphics', 'Intel UHD Graphics', 'Display', '15.6-inch,FHD (1920 x 1080) 16:9,Anti-glare display,LED Backlit,200nits,NTSC: 45%,Screen-to-body ratio: 83 ％', 'Memory', '4GB DDR4 on board,4GB DDR4 SO-DIMM,Memory Max Up to:16GB', 'Storage', '256GB M.2 NVMe™ PCIe® 3.0 SSD', 'Camera', 'VGA camera', 'Weight', '1.80 kg (3.97 lbs)', '', '', 'No', 'Yes'),
(126, 'MSI PRO DP130 Desktop', '– MSI Desktop Brand<br>\r\n– Intel IGD Graphics<br>\r\n– Intel H510 Chipset<br>\r\n– 8GB DDR4 2666MHz Memory<br>\r\n– 256GB M.2 SSD<br>\r\n– DOS<br>', 'No Warranty', 'MSI', 'Desktop', '115000.00', 0, 7, 'product_Name_2583.jpg', 'product_Name_5803.jpg', 'product_Name_8085.jpg', 'product_Name_9220.jpg', 'product_Name_4882.png', 'product_Name_3531.png', 'product_Name_1382.png', 'Model', 'MSI PRO DP130 Desktop', 'CPU', 'Intel Pentium G6405', 'CHIPSET', 'Intel H510', 'GRAPHICS', 'Intel IGD', 'SYSTEM MEMORY', '8GB DDR4 2666MHz (2x DDR4 2666/ 3200MHz U-DIMMs, up to 64GB)', 'STORAGE', '256GB M.2 SSD', 'OPERATING SYSTEM', 'DOS', 'WEIGHT (N.W./ G.W.)', '5.43 kg ( 11.97 lbs ) / 7.42 ( 16.36 lbs )', '', '', '', '', 'Yes', 'Yes'),
(127, 'MSI Bravo 15 – B5DD Ryzen 5', '– AMD Ryzen 5 5600H Processor<br>\r\n– 512GB NVMe PCIe Gen3x4 SSD<br>\r\n– 8GB DDR4 (3200MHz) RAM<br>\r\n– 15.6″, FHD, 144Hz Display<br>\r\n– 4GB AMD Radeon RX 5500M Graphics<br>\r\n– 3 cell, 52Whr Battery Type<br>\r\n– Windows 10 Home<br>', 'No Warranty', 'MSI', 'Laptop', '325000.00', 6, 0, 'product_Name_9783.jpg', 'product_Name_8707.jpg', 'product_Name_5383.jpg', 'product_Name_7117.jpg', 'product_Name_3976.jpg', 'product_Name_5277.jpg', 'product_Name_91.jpg', 'Model', 'MSI Bravo 15 B5DD', 'Processor', 'AMD (Cezanne H, Zen 3) Ryzen 5 5600H (4.40 GHz)', 'Graphic', 'AMD Radeon RX 5500M', 'Graphic Memory', 'GDDR6 4GB', 'Keyboard', 'Single backlight KB(Red)', 'Operating System', 'Windows 10 Home', 'Weight', '2.35kg', '', '', '', '', '', '', 'Yes', 'Yes'),
(128, 'MSI Pulse GL66 – 12UEK', '– Intel Core i7-12700H 11th Gen Processor<br>\r\n– 16GB DDR4 RAM<br>\r\n– 1TB NVMe SSD<br>\r\n– RTX 3060 6GB NVIDIA GeForce<br>\r\n– 15.6″ QHD, 165Hz, IPS-Level Display<br>\r\n– RGB Backlight Keyboard<br>\r\n– Windows 11 Home<br>', 'No Warranty', 'Dell', 'Laptop', '735000.00', 12, 0, 'product_Name_1810.jpg', 'product_Name_8208.jpg', 'product_Name_3518.jpg', 'product_Name_2995.jpg', 'product_Name_4686.jpg', 'product_Name_5358.jpg', 'product_Name_4426.jpg', 'Model', 'MSI Pulse GL66 12UEK Gaming Laptop', 'Processor', 'Intel Core i7-12700H 11th Gen Processor', 'RAM', '16GB DDR4, 3200 MHz', 'Memory', '1TB M.2 SSD slot (NVMe PCIe Gen3)', 'Graphics', 'NVIDIA GeForce RTX 3060 Laptop GPU, 6GB GDDR6', 'Display', '15.6″ QHD (2560×1440), 165Hz, IPS-Level', 'Webcam', 'HD type (30fps@720p)', 'Weight (W/ BATTERY)', '2.3 kg', 'Operating system', 'Windows 11 Home', '', '', 'No', 'Yes'),
(129, 'MSI Katana GF66 – 12UC (i7)', '– Intel Core i7-12700H Processor<br>\r\n– 8GB DDR4 RAM<br>\r\n– 512GB NVMe SSD Memory<br>\r\n– RTX 3050 4GB NVIDIA GeForce<br>\r\n– 15.6″ FHD, 144Hz, IPS-Level Display<br>\r\n– Windows 11 Home<br>', 'No Warranty', 'MSI', 'Laptop', '579000.00', 15, 0, 'product_Name_5625.jpg', 'product_Name_6894.jpg', 'product_Name_3593.jpg', 'product_Name_4417.jpg', 'product_Name_6955.jpg', 'product_Name_8420.jpg', '', 'Model', 'MSI KATANA GF66 12UC', 'Processor', 'Intel Core i7-12700H', 'RAM', '8GB DDR4, 3200 MHz', 'Memory', '512GB NVMe SSD', 'Graphics', 'NVIDIA GeForce RTX 3050 4GB', 'Display', '15.6″ FHD (1920×1080), 144Hz, IPS-Level', 'Webcam', 'HD type (30fps@720p)', 'Battery', '3-Cell,\r\n53.5 Battery (Whr)', 'Weight (W/ BATTERY)', '2.25 kg', 'Operating system', 'Windows 11 Home', 'Yes', 'Yes'),
(131, 'Lenovo IdeaPad Slim 3 – 15ITL6', '– Intel Core i5 1135G7 Processor<br>\r\n– 8GB DDR4 RAM<br>\r\n– 512GB M.2 NVMe SSD<br>\r\n– 15.6″ FHD, (1920×1080), IPS Display<br>\r\n– 2GB NVIDIA GeForce MX350 Graphics<br>\r\n– Integrated 45Wh Battery<br>\r\n– Windows 10 Home<br>', 'No Warranty', 'Lenovo', 'Laptop', '274500.00', 5, 0, 'product_Name_8656.jpg', 'product_Name_744.jpg', 'product_Name_4285.jpg', 'product_Name_6968.jpg', 'product_Name_846.jpeg', 'product_Name_7262.jpeg', 'product_Name_9916.jpg', 'Processor', 'Intel Core i5-1135G7 (4C / 8T, 2.4 / 4.2GHz, 8MB)', 'Graphics', 'NVIDIA GeForce MX350 2GB GDDR5', 'Chipset', 'Intel SoC Platform', 'Memory', '8GB SO-DIMM DDR4-3200Mhz Memory', 'Memory Slots', 'One memory soldered to systemboard, one DDR4 SO-DIMM\r\nslot, dual-channel capable', 'Max Memory', 'Up to 12GB (4GB soldered + 8GB SO-DIMM) DDR4-3200\r\noffering', 'Battery', 'Integrated 45Wh', 'Max Battery Life', 'Model with 45Wh battery\r\nMobileMark 2018: 7.5 hr\r\nLocal video (1080p) playback 150nits: 12 hr', 'Keyboard', 'Backlit, English (EU)', 'Case Color', 'Arctic Grey', 'No', 'Yes'),
(132, 'New Apple iPad (Latest Model, 8th Generation)', '– MYL92LL/A Space Gray  and MYLA2LL/A Silver<br>\r\n– Gorgeous 10.2-inch Retina Touch display<br>\r\n– A12 Bionic chip with Neural Engine<br>\r\n– Support for Apple Pencil (1st generation) and Smart Keyboard<br>\r\n– 8MP back camera, 1.2MP FaceTime HD front camera<br>\r\n– Stereo speakers<br>\r\n– 802.11ac Wi-Fi<br>\r\n', 'No Warranty', 'Apple', 'iPad', '77500.00', 2, 0, 'product_Name_9538.jpg', 'product_Name_6184.jpg', 'product_Name_1583.jpg', 'product_Name_2132.jpg', 'product_Name_9285.jpg', 'product_Name_7201.jpg', 'product_Name_1821.jpg', 'Colors', 'MYL92LL/A Space Gray\r\nMYLA2LL/A Silver', 'Generation', '8th Generation', 'Display', 'Gorgeous 10.2-inch Retina Touch display', 'Chipset', 'A12 Bionic chip with Neural Engine', 'Keyboard', 'Support for Apple Pencil (1st generation) and Smart Keyboard', 'Camera', '8MP back camera, 1.2MP FaceTime HD front camera', 'Speakers', 'Stereo speakers', '', '', '', '', '', '', 'Yes', 'Yes'),
(133, 'Apple MacBook Pro 13 M2 Chip', '– Apple M2 8-Core CPU<br>\r\n– 8GB Unified RAM<br>\r\n– 256GB SSD<br>\r\n– 13.3″(diagonal), LED-backlit with IPS Display<br>\r\n– 720p FaceTime HD camera<br>\r\n– Backlit Magic Keyboard<br>\r\n– Space Gray Color<br>\r\n– macOS<br>', 'No Warranty', 'Apple', 'Laptop', '499000.00', 0, 0, 'product_Name_817.jpg', 'product_Name_8614.jpg', 'product_Name_693.jpg', 'product_Name_6310.jpg', 'product_Name_1956.jpg', 'product_Name_9454.jpg', 'product_Name_4126.jpg', 'Media engine', 'Hardware-accelerated H.264, HEVC, ProRes, and ProRes RAW,\r\nVideo decode engine,\r\nVideo encode engine,\r\nProRes encode and decode engine', 'Memory', '8GB unified memory', 'Storage', '256GB SSD', 'Color', 'Space Gray', 'Operating System', 'macOS', '', '', '', '', '', '', '', '', '', '', 'Yes', 'Yes'),
(134, 'Dell Inspiron 3502', '– Pentium Silver N5030 Processor<br>\r\n– 4GB DDR4 RAM<br>\r\n– 1TB Hard Drive<br>\r\n– Intel UHD Graphics<br>\r\n– 15.6″, HD Display<br>\r\n– Windows 10 Home<br>', 'No Warranty', 'Dell', 'Laptop', '101000.00', 0, 0, 'product_Name_5355.jpg', 'product_Name_9859.jpg', 'product_Name_9719.jpg', 'product_Name_8548.jpg', 'product_Name_19.jpg', 'product_Name_1173.webp', 'product_Name_2791.jpg', 'Processor', 'Pentium(R) Silver N5030 Processor (4MB Cache, up to 3.1 GHz)', 'Graphic', 'Intel (R) UHD Graphics 605 with shared graphics', 'Storage', '1TB Hard Drive', 'Memory', '4GB, 1x4GB, DDR4, 2400MHz', '', '', '', '', '', '', '', '', '', '', '', '', 'Yes', 'Yes'),
(135, 'HP 15S – DU3786TU (i3)', '– Intel Core i3-1115G4 Processor<br>\r\n– 4GB DDR4 RAM<br>\r\n– 1TB SATA Hard Drive<br>\r\n– Intel UHD Graphics<br>\r\n– 15.6″ FHD Display<br>\r\n– 3-cell, 41Wh Li-ion Battery<br>\r\n– Windows 11 Home+ Office Home & Student<br>', 'No Warranty', 'Hp', 'Laptop', '179000.00', 1, 0, 'product_Name_8901.jpg', 'product_Name_6549.jpg', 'product_Name_8184.jpg', 'product_Name_6550.jpg', 'product_Name_2438.jpg', 'product_Name_1478.jpg', 'product_Name_9210.jpg', 'Processor', 'Intel Core i3-1115G4 (up to 4.1 GHz with Intel Turbo Boost Technology, 6 MB L3 cache, 2 cores)', 'Memory', '4GB DDR4-2666 MHz RAM (1 x 4 GB)', 'Hard drive', '1TB 5400 rpm SATA HDD', 'Graphics', 'Intel UHD Graphics', 'Display', '15.6″ diagonal, FHD (1920 x 1080), micro-edge, anti-glare, 250 nits, 45% NTSC\r\n\r\n', '', '', '', '', '', '', '', '', '', '', 'Yes', 'Yes'),
(136, 'Corsair K60 RGB PRO Mechanical Gaming Keyboard', '– Corsair Brand<br>\r\n– Gaming Keyboard<br>\r\n– Wired Connectivity<br>\r\n– 104 Number of Keys<br>\r\n– Aluminum Material<br>\r\n– RGB Pro Style<br>', '1-Year.jpg', 'Corsair', 'Keyboad', '40300.00', 5, 0, 'product_Name_4269.jpg', 'product_Name_9623.jpg', 'product_Name_9500.jpg', 'product_Name_9611.jpg', 'product_Name_5281.jpg', '', '', 'Lighting', 'RGB', 'USB Polling Rate', '1,000Hz', 'Connectivity', 'Wired', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `image_name` text NOT NULL,
  `password` text NOT NULL,
  `company_name` text NOT NULL,
  `country` text NOT NULL,
  `house_number` text NOT NULL,
  `apartment` text NOT NULL,
  `twon` text NOT NULL,
  `postcode` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
