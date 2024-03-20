-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 02:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technosphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'Naresh Tharu', 'nareshtharu', 'jr.er.nareshtharu@gmail.com', '850721dea834fe36b29083291509c7ad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(5, 'ACER'),
(3, 'CANON'),
(7, 'Dell'),
(11, 'demo brand'),
(4, 'IPHONE'),
(2, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(27, 'ocs402ia21ksjcuff3jlc6rnqo', 25, 'Canon EOS R5', 469999.00, 1, 'uploads/98172a95c6.jpg'),
(28, '04clan177r970iao8r79t5ctnv', 29, 'Samsung Galaxy A54 5G', 56999.00, 1, 'uploads/614547796c.jpg'),
(29, 'ennl63thoggv6uq76vu2kn1mfs', 24, 'iPhone 14 Pro', 172990.00, 1, 'uploads/dc077f3411.jpg'),
(34, 'mcb66cd6vaeo00bolce5a101ui', 27, ' Samsung Galaxy Z Fold 4', 199999.00, 1, 'uploads/9fcebbeb8f.jpg'),
(62, '0nphc2o4rilmcaql460nir7vjg', 24, 'iPhone 14 Pro', 172990.00, 1, 'uploads/dc077f3411.jpg'),
(77, 'u0ql489inscq3qmchlseg2nfhp', 29, 'Samsung Galaxy A54 5G', 56999.00, 1, 'uploads/614547796c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(4, 'Accessories'),
(16, 'demo cat'),
(1, 'Desktop'),
(19, 'Laptop'),
(3, 'Smartphones');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `country`, `phone`, `email`, `pass`) VALUES
(2, 'Sujit Sharma', 'Kalanki, Kathmandu, Nepal', 'Nepal', '9804577777', 'shuzeet15@gmail.com', 'dcb28be44ab2ce8bd0f8964a7af0e685'),
(3, 'Sujit', 'kathmandu', 'nepal', '9845855555', 'abc@gmail.com', '32c2a56ed4db24e88ac93c2422b9c78d'),
(5, 'test', 'kathmandu', 'nepal', '9866666666', 'test@test.com', '9100ce16ff05b21d32ad53f2300c9afd'),
(6, 'Naresh Tharu', 'Rajapur', 'Nepal', '9804578071', 'nareshtharu.info@gmail.com', '7bb1be8a78498a9de40098a593199819'),
(7, 'Naresh', 'Kathmandu', 'Nepal', '9804578071', 'nareshtharu@gmail.com', '978b02f2e685abf8247e5c76613cd429'),
(8, 'Naresh Tharu', 'Pokhara', 'Nepal', '9868058070', 'nresh@gmail.com', '091f004c2d611a01cbe5a3105657f5d5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Processing','Completed','Cancelled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(33, 2, 18, 'iPhone 8 Plus', 1, 109999.00, 'uploads/33ce6b99f4.jpg', '2023-08-03 06:58:34', 'Processing'),
(34, 2, 20, ' YN 85mm f/1.8 Lens', 1, 14740.00, 'uploads/2c7084ec2f.jpg', '2023-08-03 06:58:34', 'Cancelled'),
(35, 2, 15, 'Laundry machine ', 4, 12800.00, 'uploads/d712a37947.png', '2023-08-03 07:10:53', 'Pending'),
(36, 2, 24, 'iPhone 14 Pro', 1, 172990.00, 'uploads/dc077f3411.jpg', '2023-08-03 07:25:57', 'Pending'),
(37, 2, 15, 'Laundry machine ', 1, 3200.00, 'uploads/d712a37947.png', '2023-08-03 08:23:39', 'Completed'),
(39, 6, 18, 'iPhone 8 Plus', 1, 109999.00, 'uploads/33ce6b99f4.jpg', '2023-10-03 13:24:15', 'Cancelled'),
(40, 2, 26, 'Dell OptiPlex 5000 i5-12500| 8GB | 512 GB SSD | UBT', 1, 123975.00, 'uploads/d0b3f84fe8.jpg', '2023-10-03 13:52:19', 'Processing'),
(47, 2, 39, 'Iphone 15 Pro Max', 1, 5000.00, 'uploads/427be80283.jpg', '2023-10-09 08:18:53', 'Pending'),
(48, 2, 39, 'Iphone 15 Pro Max', 1, 5000.00, 'uploads/427be80283.jpg', '2023-10-09 09:08:25', 'Pending'),
(49, 2, 39, 'Iphone 15 Pro Max', 2, 10000.00, 'uploads/427be80283.jpg', '2023-10-09 09:09:26', 'Pending'),
(50, 2, 39, 'Iphone 15 Pro Max', 2, 10000.00, 'uploads/427be80283.jpg', '2023-10-10 09:25:49', 'Pending'),
(51, 2, 39, 'Iphone 15 Pro Max', 4, 20000.00, 'uploads/427be80283.jpg', '2023-10-10 09:31:31', 'Pending'),
(52, 2, 39, 'Iphone 15 Pro Max', 1, 5000.00, 'uploads/427be80283.jpg', '2023-10-10 09:31:51', 'Pending'),
(53, 2, 24, 'iPhone 14 Pro', 1, 172990.00, 'uploads/dc077f3411.jpg', '2024-03-20 07:37:38', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`, `quantity`) VALUES
(1, 'Mini-503 Wireless Bluetooth', 4, 3, '                                <p><span>With built-in microphone as well as volume, play, pause skip, call answer and call reject control buttons. Freedom to exercise, move around and commute without wires to tangle or hold you back. Simplify your communications with this lightweight and versatile headset. </span><br /><br /><span>This Super lightweight, comfortable over-the-ear design makes this Bluetooth stereo headphone easy to wear throughout the day. You\'ll enjoy all-day wearing comfort, clearer voice transmission and superior sound quality - without wires!</span></p>                                            ', 999.00, 'uploads/cd60a8b471.jpg', 0, 2),
(2, 'Travelmate  - Core i5 ', 2, 5, '                                <p>7th -generation core i5, 2 core 4thread,4 gb single channel,aspect ratio 16:9Thin Bezel & Powerful Laptop on the go. 8th Gen Intel <strong>Core</strong> i7, Buy Now. Award winning laptops. Recommended by Pros. 12 months warranty. Learn gaming features.</p>                                            ', 38500.00, 'uploads/f685d89450.jpeg', 0, 30),
(3, 'V18 LED - CC Camera - White', 4, 2, '                                <p>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times. Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>                                            ', 2000.00, 'uploads/3bba9742ec.jpg', 1, 50),
(4, 'Rechargeable Mini Fan', 4, 3, '                                <p><span>Enfield is a multi branded retail chain store where all sorts of tech related accessories can be found. Their range of products start from brand new power banks, headphones, USB Data & Charging Cables, High Speed Data Line Cables, 3D VR BOX, Bluetooth Selfie Sticks, Wireless N Routers, Wireless Bluetooth Speakers, Home Theatre Speakers, Android TV Box, RA-OTG Micro USB Adapters to Bluetooth Headsets among many other high tech gadgets that are in demand to lead a modern life.</span></p>                                            ', 1500.00, 'uploads/fa56e62bef.jpg', 0, 2),
(5, ' 3480 Laptop - Intel Core i5', 2, 2, '                                <p><span>Enhanced data protection: Data security is key in protecting your business and employees. Dell Data Protection is a suite of security software programs offered on each Latitude 3000 Series system. Endpoint security, advanced user authentication and data encryption software all work cohesively to safeguard your data from threats and hacks.</span><br /><span>Safely communicate: Your Latitude 3480 comes TPM2.0 TCG certified and FIPS-140-2 certified, and uses hardware-based cryptography for the most secure communication.</span></p>                                            ', 53500.00, 'uploads/9ef4ce1375.png', 1, 6),
(6, 'V18 LED - CC Camera - Black', 4, 5, '                                <p><span>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times. Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</span></p>                                            ', 1850.00, 'uploads/2966aff2bb.jpg', 1, 100),
(7, 'Bluetooth Speaker with ac line', 4, 2, '                                <p><span>Naturally, size and sound are two of the most important factors for many. Allocacoc has recently announced their audioCube and sent me one to review. Dutch manufacturer, Allocacoc, has an interesting proposition of getting the most out of a portable Bluetooth speaker. They obviously like working with cubes and have therefore added a speaker to almost every face of one.</span></p>                                            ', 3500.00, 'uploads/c5b154a642.jpg', 0, 15),
(8, 'Smoothie Blender', 4, 2, '                                <p><span>Compact design ideal for small living spaces and on-the-go portability. Great for making shakes, baby formula, marinades and salad dressings.(Please don\'t put hard foods into it like nuts). Parts are Removable and dishwasher safe EXCEPT bottom part. Before it starts working, add some water will make it perfect. Rapid stiring speed can make a cup of juice within one minute. It can be charged by power bank, laptop, computer, mobile phones or any other USB devices. Can used as common cup and juicer blender or as a power bank. Can repeat use 10-12 times when fully charged.</span></p>                                            ', 999.00, 'uploads/4d2b549e0a.jpg', 0, 6),
(11, 'Apple iPhone X 64GB', 3, 4, '                                <p>iPhone Display Size: 5.8 inches,Display Resolution: 1125 x 2436 pixels</p>\r\n<p>Rear Camera: Dual 12 MP</p>\r\n<p>Front Camera: 7 MP</p>\r\n<p>Video Quality : 4K video recording at 24 fps, 30 fps, or 60 fps</p>\r\n<p>Face ID: Enabled by TrueDepth camera for facial recognition<br />Splash, Water, and Dust Resistant: Rated IP67 under IEC standard 60529<br />Battery Capacity: Up to 21h (3G) talk time; Up to 60 h music play<br />Phone Sensors: Face ID, accelerometer, gyro, proximity, compass, barometer<br />Apple iPhone X Smartphone: Design & Display</p>                                            ', 99990.00, 'uploads/9588c6f782.jpg', 1, 10),
(12, 'Refrigerator long size', 4, 2, '                                <p><span>Samsung GR-S24SPB (C) Top Mount Refrigerator can be a perfect choice for you and your family. This wonderfully designed refrigerator of 226 liters capacity is fully equipped with various healthy features to help store your food without any health hazards. The doors ensure convenience and the low noise design ensures comfort. This refrigerator comes with amazing Tempered Glass Shelves, Hybrid Bio Deodorizer, Cool Air Wrap, Multi-shelf slots and energy saving with optimized insulation thickness.</span></p>                                            ', 24500.00, 'uploads/91f3e32ef2.jpg', 1, 5),
(13, 'LED Monitor K202HQL Black', 1, 5, '                                <p>You\'ll enjoy tasks and entertainment more on the 19.5” LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>                                            ', 10500.00, 'uploads/bd293afbce.jpg', 1, 10),
(15, 'Laundry machine ', 4, 2, '                                <p>Best Laundry machine in bd.! years warenty<br /><br /></p>                                            ', 3200.00, 'uploads/d712a37947.png', 0, 10),
(16, 'iPhone X - Smartphone', 3, 4, '                                <p>5.8 inchi old multi touched display.Hexa-core 2.39ghz processor.</p>\r\n<p>3GB RAM And 256GB ROM</p>\r\n<p>12MP Dual Rear and 7MP front camera</p>\r\n<p>Nano Sim</p>                                            ', 120500.00, 'uploads/ac7385aa6d.jpeg', 1, 2),
(17, ' iPhone 6 - Smartphone', 3, 4, '                                <p>Apple iPhone 6 comes with 1GB of RAM. The phone packs 16GB of internal storage that cannot be expanded. As far as the cameras are concerned, the Apple iPhone 6 packs a 8-megapixel primary camera on the rear and a 1.2-megapixel front shooter for selfies. The Apple iPhone 6 is powered by a 1810mAh non removable battery.</p>                                            ', 34999.00, 'uploads/dd277d68bd.jpg', 1, 1),
(18, 'iPhone 8 Plus', 3, 4, '                                                                <p>iPhone XR comes with new chip<br />64GB and 256GB storage options on all models<br />128GB on XR only <br />Battery improvements on iPhone XR<br />The Apple iPhone 8 and 8 Plus both come with the A11 Bionic chip with 64-bit architecture, a neural engine and embedded M11 motion coprocessor. They also both come in 64GB and 256GB storage capacities, neither of which offer microSD support.</p>                                                                                        ', 109999.00, 'uploads/33ce6b99f4.jpg', 1, 5),
(19, 'LED Monitor K202HQL', 4, 5, '                                <p>Product details of LED Monitor K202HQL 19.5\" - Black<br />Display size: 19.5 Inch<br />Resolution: HD+ (1600 x 900)<br />Stunning colours<br />Wall mountable<br />Ergonomic stand tilt -5 to 25 degrees<br />Image Brightness: 200 nits (cd/m2)<br />About LED Monitor K202HQL 19.5\"</p>\r\n<p><br />You\'ll enjoy tasks and entertainment more on the 19.5” LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>                                            ', 6563.00, 'uploads/346c11f644.png', 1, 10),
(20, ' YN 85mm f/1.8 Lens', 4, 3, '                                                                                                <p>Product details of YN 85mm f/1.8 Lens for Canon EF - Black<br />EF-Mount Lens/Full-Frame Format<br />Aperture Range: f/1.8 to f/18<br />AF/MF Switch<br />Gold-Plated Contacts<br />Minimum Focusing Distance: 2.8\'<br />Filter Diameter: 58mm<br />YN 85mm f/1.8 Lens for Canon EF<br />The YN 85mm f/1.8 Lens from Yongnuo is a short-telephoto prime designed for Canon EF-mount DSLRs. Pairing well with the slightly long focal length is a bright f/1.8 maximum aperture that benefits working in low-light as well as affords greater control over depth of field for selective focus control. An AF/MF switch on the lens barrel permits quick switching between focusing methods, and the lens can focus as closely as 2.8\' to suit photographing close-up subjects. Additionally, gold-plated contacts permit working with all exposure modes as well as transferring lens information to the EXIF data.</p>                                                                                                                                    ', 14740.00, 'uploads/2c7084ec2f.jpg', 1, 20),
(22, 'Aspire 3 2023', 2, 5, '                                Acer Laptop                                            ', 63000.00, 'uploads/87a9e2815e.jpg', 1, 10),
(24, 'iPhone 14 Pro', 3, 4, '                                The highest-end iPhone 14 Pro models bring some of the most significant changes to iPhones in recent years. First off, we now have a new front design for iPhones. Apple has replaced the iPhone 13’s large bathtub notch with a pill-shaped cutout on the Pro models. And the most exciting aspect is that the notifications and alerts can make use of this notch with a feature called Dynamic Island.                                            ', 172990.00, 'uploads/dc077f3411.jpg', 1, 14),
(26, 'Dell OptiPlex 5000 i5-12500| 8GB | 512 GB SSD | UBT', 1, 7, '                                Dell Optiplex 5000 Series Desktop\r\n12th Gen i5-12500 Processor 8 MB cache, 6 cores, 12 threads\r\n8GB RAM\r\n512GB SSD\r\nIntegrated Intel Graphics\r\nUbuntu OS\r\nComes with 19 inch Dell D1918H Monitor                                            ', 123975.00, 'uploads/d0b3f84fe8.jpg', 1, 20),
(27, ' Samsung Galaxy Z Fold 4', 3, 2, '                                Samsung Galaxy Z Fold 4 Specifications:\r\nDisplay:\r\nMain: 7.6-inch Dynamic AMOLED, QXGA+, 120Hz refresh rate\r\nExternal: 6.2-inch Dynamic AMOLED, HD+, 120Hz refresh rate, Gorilla Glass Victus+\r\nChipset: Qualcomm Snapdragon 8+ Gen 1 5G (4nm mobile platform)\r\nMemory: 12GB LPDDR5 RAM, 256/512GB/1TB UFS 3.1 storage (fixed)\r\nSoftware & UI: One UI 4.1.1 on top of Android 12L (upgradeable)\r\nRear Camera: Triple (50MP main, 12MP ultrawide, 10MP telephoto)\r\nFront Camera: 10MP (external), 4MP UDC (main)\r\nSecurity: Fingerprint sensor (side-mounted)\r\nBattery: 4400mAh with 25W charging (15W wireless, 4.5W reverse wireless)\r\nPrice in Nepal: NPR 244,999 199,999 (12/256GB)                                            ', 199999.00, 'uploads/9fcebbeb8f.jpg', 1, 10),
(28, 'Samsung Galaxy Buds 2 ', 4, 2, '                                Samsung Galaxy Buds 2 Pro Specifications:\r\nDimension:\r\nEarbud: 19.9 x 21.6 x 21.1mm, 5.5 gram each\r\nCharging Case: 50.1 x 50.2 x 27.7mm, 43.4 grams\r\nColor Options: Graphite, White, Bora Purple\r\nSound Driver: Dual-driver\r\nAudio Codec: AAC, SBC, SSC HiFi\r\nNoise Cancellation: Yes, ANC (up to 33db) with Ambient mode\r\nMicrophone: Yes, 3 + Voice Pickup Unit\r\nConnectivity: Bluetooth v5.3\r\nIP Rating: Yes, IPX7 (earbuds only)\r\nPlayback Time:\r\nEarbuds: Up to 5/8 hours (ANC on/off)\r\nWith case: Up to 18/29 hours (ANC on/off)\r\nControl: Touch-based control\r\nCharging: Fast Wired Charging, Qi Wireless Charging\r\nCompanion App: Samsung Wearable (Android | iOS)                                            ', 27999.00, 'uploads/d52a1bf677.jpg', 0, 10),
(29, 'Samsung Galaxy A54 5G', 3, 2, '                                The Galaxy A54 5G is Samsung’s newest premium-midrange smartphone in Nepal. It builds on its predecessor, the Galaxy A53 with a new Eyos 1380 chipset. It is a new 5nm-based chipset with four Cortex-A78 and four Cortex-A55 cores. As a result, we expect the performance to be in the ballpark of the Snapdragon 778G. This is complemented by One UI 5.1 based on Android 13. Plus, Samsung promises four years of major OS updates.                                            ', 56999.00, 'uploads/614547796c.jpg', 0, 10),
(38, 'test pro 2333', 16, 11, '                                jfoisjofds                                            ', 888.00, 'uploads/1abf143cb8.jpg', 1, 3),
(39, 'Iphone 15 Pro Max', 3, 4, '                                this is the desc                                            ', 5000.00, 'uploads/427be80283.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`),
  ADD UNIQUE KEY `brandName` (`brandName`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `catId` (`catId`),
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
