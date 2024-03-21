-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2024 at 01:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `IdAccount` int NOT NULL,
  `NameAccount` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Gmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Gender` int DEFAULT '0',
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ImageAccounts` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'NVPVB',
  `StatusAccount` int DEFAULT '0',
  `DateEditAccount` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`IdAccount`, `NameAccount`, `Gmail`, `Gender`, `Password`, `ImageAccounts`, `Role`, `StatusAccount`, `DateEditAccount`) VALUES
(6, 'Vu Hong Diep', 'diepvhph36272@fpt.edu.vn', 0, 'diepvhph36272@fpt.edu.vn', 'banner11.jpg', 'admin', 0, '2024-02-08 14:17:03'),
(7, 'Khong Trong Khanh', 'khanhktph36272@fpt.edu.vn', 0, 'khanhktph36272@fpt.edu.vn', 'z4419639034081_72f3de1996280290798889601b1c9568.jpg', 'NVPVB', 0, '0000-00-00 00:00:00'),
(8, 'Nguyen Trong Khoi', 'khointph36272@fpt.edu.vn', 0, 'khointph36272@fpt.edu.vn', 'z4419639034081_72f3de1996280290798889601b1c9568.jpg', 'NVPVB', 0, '2023-12-07 07:45:46'),
(9, 'Hoang Hai Hieu', 'hieuhhph36272@fpt.edu.vn', 0, 'hieuhhph36272@fpt.edu.vn', 'z4419639034081_72f3de1996280290798889601b1c9568.jpg', 'NVPVB', 0, '0000-00-00 00:00:00'),
(10, 'Mai Hong Anh', 'anhmhph36272@fpt.edu.vn', 0, 'anhmhph36272@fpt.edu.vn', 'z4419639034081_72f3de1996280290798889601b1c9568.jpg', 'NVPVB', 0, '0000-00-00 00:00:00'),
(18, 'Vu Hong Diep', 'vudiep621@gmail.com', 0, 'vudiep621@gmail.com', 'banner2.jpg', 'KH', 0, '2024-03-07 02:33:31'),
(23, 'Vu Hong Diep', 'diepvhph36273@fpt.edu.vn', 0, 'diepvhph36273@fpt.edu.vn', 'banner2.jpg', 'NVTN', 0, '2024-02-07 13:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `IdCart` int NOT NULL,
  `IdAccount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`IdCart`, `IdAccount`) VALUES
(54, 18),
(55, 18),
(56, 18),
(57, 18),
(58, 18),
(59, 18),
(60, 18),
(61, 18),
(62, 18),
(63, 18),
(64, 18),
(67, 18),
(68, 18),
(70, 18),
(73, 18),
(74, 18);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `IdCategory` int NOT NULL,
  `NameCategory` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StatusCategory` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`IdCategory`, `NameCategory`, `StatusCategory`) VALUES
(6, 'Súp', 0),
(7, 'Bánh mì', 0),
(8, 'Pasta', 0),
(9, 'Beefsteak ', 0),
(10, 'Đồ tráng miệng', 0),
(11, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `IdEmail` int NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `Status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`IdEmail`, `Gmail`, `Title`, `Content`, `Status`) VALUES
(1, '1', '2', '3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `IdOrder` int NOT NULL,
  `IdAccount` int DEFAULT NULL,
  `NumberTables` int NOT NULL,
  `NumberInPeople` int DEFAULT NULL,
  `PaymentMethod` int NOT NULL DEFAULT '0',
  `SumPriceOrder` int DEFAULT NULL,
  `StatusOrders` int DEFAULT '0',
  `OrderDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`IdOrder`, `IdAccount`, `NumberTables`, `NumberInPeople`, `PaymentMethod`, `SumPriceOrder`, `StatusOrders`, `OrderDate`) VALUES
(143, 18, 31, 2, 2, 11659440, 8, '2024-03-15 01:01:00'),
(145, 18, 31, 1, 2, 111000, 8, '2024-03-14 02:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `IdProduct` int NOT NULL,
  `IdCategory` int NOT NULL,
  `NameProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `QuantityProduct` int NOT NULL,
  `ImageProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ProductDetails` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ProductDescription` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StatusProduct` int DEFAULT '0',
  `DateEditProduct` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`IdProduct`, `IdCategory`, `NameProduct`, `QuantityProduct`, `ImageProduct`, `ProductDetails`, `ProductDescription`, `StatusProduct`, `DateEditProduct`) VALUES
(9, 8, 'Mì Ý sốt bò bằm', 16, 'anhdoi.jpg', 'Mì Ý sốt bò bằm là món ăn ngon và đậm đà hương vị Ý, thường được dùng trong các bữa tiệc hay ăn tối ', 'Mì ý sốt bò bằm bao gồm, mì, ướp thịt bò bằm và kết hợp với sốt cà chua đậm đà. Đó là một món ăn tuy', 0, '2024-03-14 01:01:40'),
(10, 7, 'Bánh mì bơ tỏi', 6, 'anh02-bruschetta-768x512.jpg', 'Bánh mì bơ tỏi được xem là món ăn rất nhiều người yêu thích, không chỉ tiện lợi cho bữa sáng dinh dư', 'Từng miếng bánh thơm ngon, giòn rụm với hương vị thơm phức của bơ tỏi, thêm chút đậm đà của thịt xông khói', 0, '2024-03-14 00:56:49'),
(11, 7, 'Bánh mì hoa cúc', 18, 'banh_mi_hoa_cuc.jpg', 'Bánh mì hoa cúc có xuất xứ từ nước Pháp, đất nước nổi tiếng với sự cổ kính, thanh lịch và lãng mạn. ', 'Bánh mì hoa cúc pháp Harrys Brioche thuộc dạng bánh mì ngọt, vô cùng thơm và mềm mại. Thớ bánh dai, ', 0, '2024-03-14 01:52:33'),
(12, 7, ' Baguette', 10, 'Tortilla.jpeg', 'Bánh mì Pháp (Baguette) là loại bánh mì dài (có khi lên đến 1 mét), vỏ dày và giòn, ruột mềm', 'khi bánh mới ra lò, với hương thơm “nức mũi” của nó, bạn chẳng cần thêm phết gì cũng có thể ngấu ngh', 0, '2024-01-29 16:08:54'),
(13, 7, 'Tortilla', 5, 'Tortilla.jpeg', 'Tortilla là loại bánh mì dạng dẹt được làm từ nguyên liệu chính là bột bắp', 'Tortilla là là sự kết hợp giữa bột sau khi hòa với nước sẽ được gia giảm gia vị rồi nướng vàng, ăn k', 0, '2024-01-29 16:08:54'),
(14, 7, ' Doner kebab', 50, 'DonerKebab.jpeg', 'Bánh có hình tam giác, mềm, thường kẹp với các loại thịt như cừu, bò, gà... xiên khối và quay trên m', 'Khi nào khách đến mua thì người bán mới cắt thịt thành từng lát mỏng rồi nhồi vào bánh, ăn kèm salad', 0, '2024-01-29 16:08:54'),
(15, 7, 'Hamburger', 20, 'Hamburger.jpeg', 'Hamburger - loại bánh mì kẹp được coi là món ăn nhanh thường nhật của người Mỹ và một số nước phương', 'Vỏ bánh có hình tròn, mềm, được rắc ít vừng trên bề mặt, kẹp giữa 2 lớp bánh là miếng thịt đã được n', 0, '2024-01-29 16:08:54'),
(16, 7, 'Bánh mì đen', 60, 'BanhMiDen.jpeg', 'Bánh mì đen hay bánh mì lúa mạch là loại thực phẩm quen thuộc của người dân châu Âu, đặc biệt là Nga', ' Bánh được làm từ bột lúa mạch đen thiên nhiên nên đặc hơn bánh làm từ bột mì, hàm lượng chất xơ cũn', 0, '2024-01-29 16:08:54'),
(17, 7, 'Kaya Toast', 40, 'KayaToast.jpeg', 'Kaya Toast được xem là một trong những đặc sản nổi tiếng của Singapore. Món bánh mì kẹp này là sự kế', 'Phần vỏ bánh Kaya tương tự như sandwich phương Tây nhưng mùi thơm thoang thoảng của sữa dừa cùng nhâ', 0, '2024-01-29 16:08:54'),
(18, 7, 'Chivito', 80, 'Chivito.jpeg', 'Đây là món ăn đặc trưng của đất nước Uruguay, bao gồm thịt thăn bò nướng xém, phô mai mozzarella, cà', 'Các thành phần khác có thể được thêm vào bánh như củ cải đỏ, đậu Hà Lan, ớt đỏ và vài lát dưa chuột ', 0, '2024-01-29 16:08:54'),
(19, 7, 'Breadsticks', 10, 'Breadsticks.jpeg', 'Những chiếc bánh nhỏ xinh, nhai vào giòn rụm, lại có thể biến tấu với nhiều hương vị và nước sốt khá', 'Loại bánh mì này được sử dụng trong nhà hàng như một món khai vị, ăn kèm sốt tỏi và phô mai parmesan', 0, '2024-01-29 16:08:54'),
(20, 6, 'Solyanka', 30, 'Solyanka.jpg', 'Một trong những món khai vị nổi tiếng trong ẩm thực của Nga đó chính là món soup Solyanka.', 'Món ăn sẽ mang lại vị chua nhẹ của dưa chuột muối cùng với đó là vị thơm của nguyệt quế và vị ngọt c', 0, '2024-01-29 16:08:54'),
(21, 6, 'Bouillabaise', 50, 'Bouillabaise.jpeg', 'Đây là một món khai vị nổi tiếng của ẩm thực Pháp. Để tạo nên một món soup Bouillabaise, người ta sẽ', 'Món ăn mang hương vị đặc trưng của biển nên không chỉ riêng tại Pháp mà nó còn được nhiều người trên', 0, '2024-01-29 16:08:54'),
(22, 6, 'Bruschetta', 40, 'Bruschetta.jpg', ' Ngày nay, món khai vị này đã du nhập đến nhiều nơi trên thế giới và chinh phục được cả những thực k', 'Để có thể cảm nhận hết được những hương vị tuyệt vời mà món ăn này mang lại, một ly rượu vang đi cùn', 0, '2024-01-29 16:08:54'),
(23, 9, 'Thăn lưng bò', 100, 'striploinSteak.jpg', 'Món ăn với phần lưng bò mềm thơm, đậm đà, với phần mỡ trong thịt hòa quyện với gia vị tạo hương vị đ', 'Món ăn với phần lưng bò mềm thơm, đậm đà, với phần mỡ trong thịt hòa quyện với gia vị tạo hương vị đ', 0, '2024-01-29 16:08:54'),
(24, 9, 'Striploin steak', 20, 'StriploinSteaks.jpg', 'Miếng steak với phần đắt giá nhất của con bò là thăn chuột với độ mềm mại, căng mọng, tỉ lệ mỡ nạc hoàn hảo', 'Miếng steak với phần đắt giá nhất của con bò là thăn chuột với độ mềm mại, căng mọng, tỉ lệ mỡ nạc hoàn hảo', 0, '2024-01-29 16:08:54'),
(25, 9, 'Tenderloin steak', 30, 'TenderloinSteak.jpg', 'Miếng steak với phần đắt giá nhất của con bò là thăn chuột với độ mềm mại, căng mọng, tỉ lệ mỡ nạc c', 'Miếng steak với phần đắt giá nhất của con bò là thăn chuột với độ mềm mại, căng mọng, tỉ lệ mỡ nạc c', 0, '2024-01-29 16:08:54'),
(26, 9, 'Thăn phi lê', 100, 'ThanPhiLê.jpg', 'Phần steak được chế biến với miếng thịt phi lê được lấy từ hai bên sườn của bò, thường được thu hoạc', 'Phần steak được chế biến với miếng thịt phi lê được lấy từ hai bên sườn của bò, thường được thu hoạc', 0, '2024-01-29 16:08:54'),
(27, 9, 'Mắt sườn', 300, 'MatSuon.jpg', 'Phần thịt được lấy vùng khung xương sườn trên, với vị thơm mềm, mọng nước, bắt mắt với lớp mỡ tràn r', 'Phần thịt được lấy vùng khung xương sườn trên, với vị thơm mềm, mọng nước, bắt mắt với lớp mỡ tràn r', 0, '2024-01-29 16:08:54'),
(28, 9, 'Sườn chữ T', 30, 'SuonT.jpg', 'Là phần thịt ở vùng xương ở giữa miếng thịt, có vị của cả thịt thăn chuột và thăn lưng.', 'Là phần thịt ở vùng xương ở giữa miếng thịt, có vị của cả thịt thăn chuột và thăn lưng.', 0, '2024-01-29 16:08:54'),
(29, 10, 'BÁNH TART CHANH', 100, 'LemonTart.jpg', 'Lemon Tart này được du nhập và nhận được sự yêu thích bởi thực khách châu Á bởi hương vị chua ngọt', 'Bên ngoài lớp vỏ bánh được nướng kỹ giòn tan, bên trong nhân thì mềm thơm được kết hợp với phô mai ', 0, '2024-01-29 16:08:54'),
(30, 10, 'Apple Crumble', 20, 'AppleCrumble.jpg', 'Chiếc bánh này được chế biến chủ yếu từ lòng đỏ trứng gà và lòng trắng đánh tan sau', 'Hiện nay, bánh trứng phồng khá được ưa chuộng trong những bữa tiệc cưới phương Tây. Có t', 0, '2024-01-29 16:15:19'),
(31, 10, 'Chocolate Mousse', 39, 'ChocolateMousse.jpg', 'Bánh sở hữu lớp vỏ giòn rụm, hương thơm beo béo của bơ và có chút dịu ngọt của táo tươi.', 'Đây chính là món tráng miệng đúng chất phương Tây nhưng không hề cầu kỳ và phức tạp mà các cặp đôi c', 0, '2024-01-29 16:15:19'),
(32, 10, 'Souffle ', 40, 'Souffle.jpg', 'Có thể nói, đây chính là tiền thân của các loại kem trên thế giới với sự kết hợp của các hương vị', 'Hiểu đơn giản hơn, Sorbet là món tráng miệng đông lạnh, được làm từ các loại trái cây và đặc biệt', 0, '2024-01-29 16:15:19'),
(33, 10, 'Sorbet ', 20, 'Sorbet.jpg', 'Có thể nói, đây chính là tiền thân của các loại kem trên thế giới với sự kết hợp của các hương vị', 'Hiểu đơn giản hơn, Sorbet là món tráng miệng đông lạnh, được làm từ các loại trái cây và đặc biệt', 0, '2024-01-29 16:11:19'),
(34, 6, 'spaghetii', 10, '1_spageti.jpg', 'Giống như các loại mì ống khác, mì spaghetti được làm từ lúa mỳ xay, nước, đôi khi được bổ sung thêm', 'Spaghetti của Ý thường được làm từ lúa mì cứng Thông thường mì ống có màu trắng do sử dụng bột mì ti', 0, '2024-01-29 16:12:42'),
(35, 9, 'Rib', 20, '1_Rib.jpg', 'Sườn (Rib) hay lườn chỉ về nguyên liệu và những món ăn được là từ xương sườn.', 'Được lấy từ sườn các loài động vật phổ biến như lợn, bò, cừu hay các loài khác .', 0, '2024-01-29 16:12:42'),
(36, 7, 'Baguertte', 30, '1_Baguette.jpg', 'là loại ổ bánh mì phân biệt được vì chiều dài hơn chiều rộng nhiều và nó có vỏ giòn', 'Bánh mì Pháp thường được cắt đôi và quét pate hay phô-mai.', 0, '2024-01-29 16:12:42'),
(37, 7, 'DonerKebab', 40, '1_DonerKeBab.jpg', 'Đây là 1 loại bánh mì mềm , thông thường kẹp thịt cừu nướng hay là một loại hỗn hợp của thịt bê hay ', 'Doner Kebab hay còn gọi là bánh mì Thổ Nhĩ Kỳ, hay bánh mì tam giác là loại bánh mù có nguồn gốc từ', 0, '2024-01-29 16:12:42'),
(39, 10, 'Tart', 50, '1_Tart.jpg', 'là lòng trắng trứng được đánh bông với các thành phần khác tạo hương vị, sau đó hỗn hợp nguyên liệu', 'vì món ăn này sẽ xẹp xuống rất nhanh nếu không ăn ngay và như vậy là nó không còn ngon nữa rồi', 0, '2024-01-29 16:12:42'),
(40, 7, '0', 1, '0', '1', '1', 1, '2024-02-08 14:05:10'),
(42, 7, '2', 3, '0', '1', '1', 1, '2024-02-08 14:04:52'),
(44, 7, '4', 4, '0', '4', '4', 1, '2024-02-02 12:00:13'),
(45, 7, '5', 6, '0', '6', '6', 1, '2024-02-03 00:12:16'),
(46, 6, '7', 7, '0', '77', '7', 1, '2024-02-02 12:02:57'),
(47, 6, '8', 8, '0', '8', '8', 1, '2024-02-02 12:18:39'),
(48, 6, '9', 9, '0', '9', '9', 1, '2024-02-02 12:25:33'),
(58, 6, '11', 11, 'anhdoi.jpg', '11', '11', 1, '2024-02-02 13:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `IdSize` int NOT NULL,
  `IdProduct` int DEFAULT NULL,
  `IdSizeDefault` int DEFAULT NULL,
  `PriceSize` float DEFAULT NULL,
  `SEO` float DEFAULT '0',
  `ImageSize` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`IdSize`, `IdProduct`, `IdSizeDefault`, `PriceSize`, `SEO`, `ImageSize`) VALUES
(31, 34, 15, 120000, NULL, '2_spageti.jpg'),
(33, 34, 16, 180000, NULL, '3_spageti.jpg'),
(34, 34, 17, 220000, NULL, '4_spageti.jpg'),
(35, 34, 18, 270000, NULL, '5_spageti.jpg'),
(36, 35, 15, 200000, NULL, '2_Rib.jpg'),
(38, 35, 16, 300000, NULL, '3_Rib.jpg'),
(39, 35, 17, 400000, NULL, '4_Rib.jpg'),
(40, 35, 18, 500000, NULL, '5_rib.jpg'),
(42, 34, 14, 60000, NULL, '1_spageti.jpg'),
(43, 36, 14, 15000, NULL, '1_Baguette.jpg'),
(44, 36, 15, 30000, NULL, '2_Baguette.jpg'),
(46, 36, 17, 60000, NULL, '4_Baguette.jpg'),
(47, 36, 16, 45000, NULL, '3_Baguette.jpg'),
(48, 36, 18, 75000, NULL, '5_Baguette.jpg'),
(49, 20, 14, 30000, NULL, '1_Solyanka.jpg'),
(50, 20, 15, 60000, NULL, '2_Solyanka.jpg'),
(51, 20, 16, 90000, NULL, '3_Solyanka.jpg'),
(52, 20, 17, 120000, NULL, '4_Solyanka.jpg'),
(53, 20, 18, 150000, NULL, '5_Solyanka.jpg'),
(54, 37, 14, 90000, NULL, '1_DonerKeBab.jpg'),
(55, 37, 15, 180000, NULL, '2_DonerKeBab.jpg'),
(56, 37, 16, 270000, NULL, '3_DonerKeBab.jpg'),
(57, 37, 17, 360000, NULL, '4_DonerKeBab.jpg'),
(58, 37, 18, 400000, NULL, '5_DonerKeBab.jpg'),
(59, 32, 14, 10000, NULL, '1_Souffle.jpg'),
(60, 32, 15, 20000, NULL, '2_Souffle.jpg'),
(61, 32, 16, 30000, NULL, '3_Souffle.jpg'),
(62, 32, 17, 40000, NULL, '4_Souffle.jpg'),
(63, 32, 18, 50000, NULL, '5_Souffle.jpg'),
(64, 25, 14, 300000, NULL, '1_Tenderloin.jpg'),
(65, 25, 15, 600000, NULL, '2_Tenderloin.jpg'),
(66, 25, 16, 900000, NULL, '3_Tenderloin.jpg'),
(67, 25, 17, 1200000, NULL, '4_Tenderloin.jpg'),
(68, 25, 18, 1500000, NULL, '5_Tenderloin.jpg'),
(69, 39, 14, 50000, 10, '1_Tart.jpg'),
(70, 39, 15, 100000, 10, '2_Tart.jpg'),
(71, 39, 16, 150000, 5, '3_Tart.jpg'),
(72, 39, 17, 200000, 20, '4_tart.jpg'),
(73, 39, 18, 250000, 2, '5_Tart.jpg'),
(74, 21, 14, 500000, NULL, '1_Bouillabaise.jpg'),
(75, 21, 15, 1000000, NULL, '2_Bouillabaise.jpg'),
(76, 22, 14, 40000, NULL, '1_Bruschetta.jpg'),
(77, 22, 15, 80000, NULL, '2_Bruschetta.jpg'),
(78, 22, 16, 120000, NULL, '3_Bruschetta.jpg'),
(79, 10, 14, 10000, NULL, '1_Bánh mì bơ tỏii.jpg'),
(80, 10, 15, 20000, NULL, '2_Bánh mì bơ tỏi.jpg'),
(81, 10, 16, 30000, NULL, '3_Bánh mì bơ tỏi.jpg'),
(82, 11, 14, 50000, NULL, '1_Bánh mì hoa cúc.jpg'),
(83, 11, 15, 100000, NULL, '2_Bánh mì hoa cúc.jpg'),
(84, 11, 16, 150000, NULL, '3_Bánh mì hoa cúc.jpg'),
(85, 12, 14, 40000, NULL, '6_Baguette.jpg'),
(86, 12, 15, 40000, NULL, '7_Baguette.jpg'),
(87, 12, 16, 60000, NULL, '8_Baguette.jpg'),
(88, 17, 14, 40000, NULL, '1_Kaya Toast.jpg'),
(89, 17, 15, 80000, NULL, '2_Kaya Toast.jpg'),
(90, 17, 16, 120000, NULL, '3_Kaya Toast.jpg'),
(91, 18, 14, 80000, NULL, '1_Chivito.jpg'),
(92, 18, 15, 160000, NULL, '2_Chivito.jpg'),
(93, 18, 16, 240000, NULL, '3_Chivito.jpg'),
(94, 19, 14, 100000, NULL, '1_Breadsticks.jpg'),
(95, 19, 15, 200000, NULL, '2_Breadsticks.jpg'),
(96, 19, 16, 300000, NULL, '3_Breadsticks.jpg'),
(97, 23, 14, 1000000, NULL, '1_Thăn lưng bò.jpg'),
(98, 23, 15, 2000000, NULL, '2_Thăn lưng bò.jpg'),
(99, 23, 16, 3000000, NULL, '3_Thăn lưng bò.jpg'),
(100, 24, 14, 200000, NULL, '1_Striploin steak.jpg'),
(101, 24, 15, 400000, NULL, '2_Striploin steak.jpg'),
(102, 24, 16, 600000, NULL, '3_StriplionSteak.jpg'),
(103, 26, 14, 2000000, NULL, '1_Thăn phi lê.jpg'),
(104, 26, 15, 3000000, NULL, '2_Thăn phi lê.jpg'),
(105, 9, 16, 3500000, NULL, '3_Thăn phi lê.jpg'),
(106, 27, 14, 300000, NULL, '1_Mắt sườn.jpg'),
(107, 27, 15, 600000, NULL, '2_Mắt sườn.jpg'),
(108, 27, 16, 700000, NULL, '3_Mắt sườn.jpg'),
(109, 28, 14, 1000000, NULL, '1_Sườn chữ T.jpg'),
(110, 28, 15, 2000000, NULL, '2_Sườn chữ T.jpg'),
(111, 29, 14, 20000, NULL, '1_BÁNH TART CHANH.jpg'),
(112, 29, 15, 40000, NULL, '2_BÁNH TART CHANH.jpg'),
(113, 29, 16, 60000, NULL, '3_BÁNH TART CHANH.jpg'),
(114, 30, 14, 20000, NULL, '1_Apple Crumble.jpg'),
(115, 30, 15, 40000, NULL, '2_Apple Crumble.jpg'),
(116, 30, 16, 60000, NULL, '3_Apple Crumble.jpg'),
(117, 31, 14, 50000, NULL, '1_Chocolate Mousse.jpg'),
(118, 31, 15, 100000, NULL, '2_Chocolate Mousse.jpg'),
(119, 31, 16, 150000, NULL, '3_Chocolate Mousse.jpg'),
(120, 33, 14, 80000, NULL, '1_Sorbet.jpg'),
(121, 33, 15, 160000, NULL, '2_Sorbet.jpg'),
(122, 33, 16, 240000, NULL, '3_Sorbet.jpg'),
(123, 21, 24, 6, 6, 'banner2.jpg'),
(124, 15, 14, 1, 1, 'banner11.jpg'),
(125, 15, 14, 1, 1, 'banner11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sizedefault`
--

CREATE TABLE `sizedefault` (
  `IdSizeDefault` int NOT NULL,
  `SizeDefault` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StatusSize` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizedefault`
--

INSERT INTO `sizedefault` (`IdSizeDefault`, `SizeDefault`, `StatusSize`) VALUES
(14, '1 người ăn', 0),
(15, '2 người ăn', 0),
(16, '3 người ăn', 0),
(17, '4 người ăn', 0),
(18, '5 người ăn', 0),
(19, '1', 0),
(21, '2', 1),
(22, '4', 1),
(23, '5', 0),
(24, '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcard`
--

CREATE TABLE `subcard` (
  `IdSubCart` int NOT NULL,
  `IdCart` int NOT NULL,
  `IdSubProduct` int DEFAULT NULL,
  `IdProduct` int NOT NULL,
  `IdSize` int NOT NULL,
  `QuantityCardProduct` int NOT NULL,
  `QuantitySubCardProduct` int DEFAULT NULL,
  `Note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subcard`
--

INSERT INTO `subcard` (`IdSubCart`, `IdCart`, `IdSubProduct`, `IdProduct`, `IdSize`, `QuantityCardProduct`, `QuantitySubCardProduct`, `Note`) VALUES
(35, 73, NULL, 9, 105, 3, NULL, NULL),
(36, 74, NULL, 36, 43, 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `IdSubCategories` int NOT NULL,
  `IdCategory` int NOT NULL,
  `IdProduct` int NOT NULL,
  `SubCategory` varchar(100) NOT NULL,
  `StatusSubCategory` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suborders`
--

CREATE TABLE `suborders` (
  `IdSubOrders` int NOT NULL,
  `IdOrder` int NOT NULL,
  `NameSubProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NameProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PriceProduct` int NOT NULL,
  `PriceSubProduct` int DEFAULT NULL,
  `NameSize` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `QuantitySubOrderSubProduct` int DEFAULT NULL,
  `QuantitySubOrderProduct` int DEFAULT NULL,
  `ImageProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ImageSubProduct` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `StatusOrders` int DEFAULT '0',
  `Comment` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suborders`
--

INSERT INTO `suborders` (`IdSubOrders`, `IdOrder`, `NameSubProduct`, `NameProduct`, `PriceProduct`, `PriceSubProduct`, `NameSize`, `QuantitySubOrderSubProduct`, `QuantitySubOrderProduct`, `ImageProduct`, `ImageSubProduct`, `Note`, `StatusOrders`, `Comment`) VALUES
(90, 143, 'subproduct2', 'Mì Ý sốt bò bằm', 3500000, 2000, '3 người ăn', 2, 3, '3_Thăn phi lê.jpg', 'anh03-spaghetti-carbonara.jpg', 'chín vừa', 0, NULL),
(91, 145, NULL, 'Bánh mì hoa cúc', 50000, NULL, '1 người ăn', NULL, 2, '1_Bánh mì hoa cúc.jpg', NULL, 'ít ngọt', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subproduct`
--

CREATE TABLE `subproduct` (
  `IdSubProduct` int NOT NULL,
  `IdProduct` int NOT NULL,
  `NameSubProduct` varchar(100) NOT NULL,
  `PriceSubProduct` int DEFAULT '0',
  `QuantilySubProduct` int NOT NULL DEFAULT '0',
  `ImageSubProduct` varchar(100) NOT NULL,
  `StatusSubProduct` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subproduct`
--

INSERT INTO `subproduct` (`IdSubProduct`, `IdProduct`, `NameSubProduct`, `PriceSubProduct`, `QuantilySubProduct`, `ImageSubProduct`, `StatusSubProduct`) VALUES
(1, 39, 'subproduct1', 1000, 2, '1_Tart.jpg', 0),
(2, 39, 'subproduct2', 2000, 2, '1_Tart.jpg', 0),
(3, 39, 'subproduct3', 3000, 2, '1_Tart.jpg', 0),
(4, 39, 'subproduct4', 4000, 2, '1_Tart.jpg', 0),
(5, 39, 'subproduct5', 5000, 2, '1_Tart.jpg', 0),
(6, 39, 'subproduct6', 6000, 2, '1_Tart.jpg', 0),
(7, 9, 'subproduct1', 1000, 2, 'anh03-spaghetti-carbonara.jpg', 1),
(8, 9, 'subproduct2', 2000, 0, 'anh03-spaghetti-carbonara.jpg', 0),
(9, 10, 'subproduct3', 3000, 21, 'banner1.jpg', 1),
(10, 9, 'subproduct4', 4000, 2, 'anh03-spaghetti-carbonara.jpg', 0),
(11, 9, 'subproduct5', 5000, 2, 'anh03-spaghetti-carbonara.jpg', 0),
(12, 9, 'subproduct6', 6000, 2, 'anh03-spaghetti-carbonara.jpg', 0),
(13, 10, 'subproduct1', 1000, 0, 'anh02-bruschetta-768x512.jpg', 0),
(14, 10, 'subproduct2', 2000, 2, 'anh02-bruschetta-768x512.jpg', 0),
(15, 10, 'subproduct3', 3000, 2, 'anh02-bruschetta-768x512.jpg', 0),
(16, 10, 'subproduct4', 4000, 2, 'anh02-bruschetta-768x512.jpg', 0),
(17, 10, 'subproduct5', 5000, 2, 'anh02-bruschetta-768x512.jpg', 0),
(18, 10, 'subproduct6', 6000, 2, 'anh02-bruschetta-768x512.jpg', 0),
(19, 11, 'subproduct1', 1100, 2, 'banh_mi_hoa_cuc.jpg', 0),
(20, 11, 'subproduct2', 2000, 2, 'banh_mi_hoa_cuc.jpg', 0),
(21, 11, 'subproduct3', 3000, 2, 'banh_mi_hoa_cuc.jpg', 0),
(22, 11, 'subproduct4', 4000, 2, 'banh_mi_hoa_cuc.jpg', 0),
(23, 11, 'subproduct5', 5000, 2, 'banh_mi_hoa_cuc.jpg', 0),
(24, 11, 'subproduct6', 6000, 2, 'banh_mi_hoa_cuc.jpg', 0),
(25, 12, 'subproduct1', 1200, 2, 'Tortilla.jpeg', 0),
(26, 12, 'subproduct2', 2000, 2, 'Tortilla.jpeg', 0),
(27, 12, 'subproduct3', 3000, 2, 'Tortilla.jpeg', 0),
(28, 12, 'subproduct4', 4000, 2, 'Tortilla.jpeg', 0),
(29, 12, 'subproduct5', 5000, 2, 'Tortilla.jpeg', 0),
(30, 12, 'subproduct6', 6000, 2, 'Tortilla.jpeg', 0),
(31, 13, 'subproduct1', 1300, 2, 'Tortilla.jpeg', 0),
(32, 13, 'subproduct2', 2000, 2, 'Tortilla.jpeg', 0),
(33, 13, 'subproduct3', 3000, 2, 'Tortilla.jpeg', 0),
(34, 13, 'subproduct4', 4000, 2, 'Tortilla.jpeg', 0),
(35, 13, 'subproduct5', 5000, 2, 'Tortilla.jpeg', 0),
(36, 13, 'subproduct6', 6000, 2, 'Tortilla.jpeg', 0),
(37, 14, 'subproduct1', 1400, 2, 'DonerKebab.jpeg', 0),
(38, 14, 'subproduct2', 2000, 2, 'DonerKebab.jpeg', 0),
(39, 14, 'subproduct3', 3000, 2, 'DonerKebab.jpeg', 0),
(40, 14, 'subproduct4', 4000, 2, 'DonerKebab.jpeg', 0),
(41, 14, 'subproduct5', 5000, 2, 'DonerKebab.jpeg', 0),
(42, 14, 'subproduct6', 6000, 2, 'DonerKebab.jpeg', 0),
(43, 15, 'subproduct1', 1500, 2, 'Hamburger.jpeg', 0),
(44, 15, 'subproduct2', 2000, 2, 'Hamburger.jpeg', 0),
(45, 15, 'subproduct3', 3000, 2, 'Hamburger.jpeg', 0),
(46, 15, 'subproduct4', 4000, 2, 'Hamburger.jpeg', 0),
(47, 15, 'subproduct5', 5000, 2, 'Hamburger.jpeg', 0),
(48, 15, 'subproduct6', 6000, 2, 'Hamburger.jpeg', 0),
(49, 16, 'subproduct1', 1600, 2, 'BanhMiDen.jpeg', 0),
(50, 16, 'subproduct2', 2000, 2, 'BanhMiDen.jpeg', 0),
(51, 16, 'subproduct3', 3000, 2, 'BanhMiDen.jpeg', 0),
(52, 16, 'subproduct4', 4000, 2, 'BanhMiDen.jpeg', 0),
(53, 16, 'subproduct5', 5000, 2, 'BanhMiDen.jpeg', 0),
(54, 16, 'subproduct6', 6000, 2, 'BanhMiDen.jpeg', 0),
(55, 17, 'subproduct1', 1700, 2, 'KayaToast.jpeg', 0),
(56, 17, 'subproduct2', 2000, 2, 'KayaToast.jpeg', 0),
(57, 17, 'subproduct3', 3000, 2, 'KayaToast.jpeg', 0),
(58, 17, 'subproduct4', 4000, 2, 'KayaToast.jpeg', 0),
(59, 17, 'subproduct5', 5000, 2, 'KayaToast.jpeg', 0),
(60, 17, 'subproduct6', 6000, 2, 'KayaToast.jpeg', 0),
(61, 18, 'subproduct1', 1800, 2, 'Chivito.jpeg', 0),
(62, 18, 'subproduct2', 2000, 2, 'Chivito.jpeg', 0),
(63, 18, 'subproduct3', 3000, 2, 'Chivito.jpeg', 0),
(64, 18, 'subproduct4', 4000, 2, 'Chivito.jpeg', 0),
(65, 18, 'subproduct5', 5000, 2, 'Chivito.jpeg', 0),
(66, 18, 'subproduct6', 6000, 2, 'Chivito.jpeg', 0),
(67, 19, 'subproduct1', 1900, 2, 'Breadsticks.jpeg', 0),
(68, 19, 'subproduct2', 2000, 2, 'Breadsticks.jpeg', 0),
(69, 19, 'subproduct3', 3000, 2, 'Breadsticks.jpeg', 0),
(70, 19, 'subproduct4', 4000, 2, 'Breadsticks.jpeg', 0),
(71, 19, 'subproduct5', 5000, 2, 'Breadsticks.jpeg', 0),
(72, 19, 'subproduct6', 6000, 2, 'Breadsticks.jpeg', 0),
(73, 20, 'subproduct1', 2000, 2, 'Solyanka.jpg', 0),
(74, 20, 'subproduct2', 2000, 2, 'Solyanka.jpg', 0),
(75, 20, 'subproduct3', 3000, 2, 'Solyanka.jpg', 0),
(76, 20, 'subproduct4', 4000, 2, 'Solyanka.jpg', 0),
(77, 20, 'subproduct5', 5000, 2, 'Solyanka.jpg', 0),
(78, 20, 'subproduct6', 6000, 2, 'Solyanka.jpg', 0),
(79, 21, 'subproduct1', 2100, 2, 'Bouillabaise.jpeg', 0),
(80, 21, 'subproduct2', 2100, 2, 'Bouillabaise.jpeg', 0),
(81, 21, 'subproduct3', 3000, 2, 'Bouillabaise.jpeg', 0),
(82, 21, 'subproduct4', 4000, 2, 'Bouillabaise.jpeg', 0),
(83, 21, 'subproduct5', 5000, 2, 'Bouillabaise.jpeg', 0),
(84, 21, 'subproduct6', 6000, 2, 'Bouillabaise.jpeg', 0),
(85, 22, 'subproduct1', 2200, 2, 'Bruschetta.jpg', 0),
(86, 22, 'subproduct2', 2200, 2, 'Bruschetta.jpg', 0),
(87, 22, 'subproduct3', 3000, 2, 'Bruschetta.jpg', 0),
(88, 22, 'subproduct4', 4000, 2, 'Bruschetta.jpg', 0),
(89, 22, 'subproduct5', 5000, 2, 'Bruschetta.jpg', 0),
(90, 22, 'subproduct6', 6000, 2, 'Bruschetta.jpg', 0),
(91, 23, 'subproduct1', 2300, 2, 'striploinSteak.jpg', 0),
(92, 23, 'subproduct2', 2300, 2, 'striploinSteak.jpg', 0),
(93, 23, 'subproduct3', 3000, 2, 'striploinSteak.jpg', 0),
(94, 23, 'subproduct4', 4000, 2, 'striploinSteak.jpg', 0),
(95, 23, 'subproduct5', 5000, 2, 'striploinSteak.jpg', 0),
(96, 23, 'subproduct6', 6000, 2, 'striploinSteak.jpg', 0),
(97, 24, 'subproduct1', 2400, 2, 'StriploinSteaks.jpg', 0),
(98, 24, 'subproduct2', 2400, 2, 'StriploinSteaks.jpg', 0),
(99, 24, 'subproduct3', 3000, 2, 'StriploinSteaks.jpg', 0),
(100, 24, 'subproduct4', 4000, 2, 'StriploinSteaks.jpg', 0),
(101, 24, 'subproduct5', 5000, 2, 'StriploinSteaks.jpg', 0),
(102, 24, 'subproduct6', 6000, 2, 'StriploinSteaks.jpg', 0),
(103, 25, 'subproduct1', 2500, 2, 'TenderloinSteak.jpg', 0),
(104, 25, 'subproduct2', 2500, 2, 'TenderloinSteak.jpg', 0),
(105, 25, 'subproduct3', 3000, 2, 'TenderloinSteak.jpg', 0),
(106, 25, 'subproduct4', 4000, 2, 'TenderloinSteak.jpg', 0),
(107, 25, 'subproduct5', 5000, 2, 'TenderloinSteak.jpg', 0),
(108, 25, 'subproduct6', 6000, 2, 'TenderloinSteak.jpg', 0),
(109, 26, 'subproduct1', 2600, 2, 'ThanPhiLê.jpg', 0),
(110, 26, 'subproduct2', 2600, 2, 'ThanPhiLê.jpg', 0),
(111, 26, 'subproduct3', 3000, 2, 'ThanPhiLê.jpg', 0),
(112, 26, 'subproduct4', 4000, 2, 'ThanPhiLê.jpg', 0),
(113, 26, 'subproduct5', 5000, 2, 'ThanPhiLê.jpg', 0),
(114, 26, 'subproduct6', 6000, 2, 'ThanPhiLê.jpg', 0),
(115, 27, 'subproduct1', 2700, 2, 'MatSuon.jpg', 0),
(116, 27, 'subproduct2', 2700, 2, 'MatSuon.jpg', 0),
(117, 27, 'subproduct3', 3000, 2, 'MatSuon.jpg', 0),
(118, 27, 'subproduct4', 4000, 2, 'MatSuon.jpg', 0),
(119, 27, 'subproduct5', 5000, 2, 'MatSuon.jpg', 0),
(120, 27, 'subproduct6', 6000, 2, 'MatSuon.jpg', 0),
(121, 28, 'subproduct1', 2800, 2, 'SuonT.jpg', 0),
(122, 28, 'subproduct2', 2800, 2, 'SuonT.jpg', 0),
(123, 28, 'subproduct3', 3000, 2, 'SuonT.jpg', 0),
(124, 28, 'subproduct4', 4000, 2, 'SuonT.jpg', 0),
(125, 28, 'subproduct5', 5000, 2, 'SuonT.jpg', 0),
(126, 28, 'subproduct6', 6000, 2, 'SuonT.jpg', 0),
(127, 29, 'subproduct1', 2900, 2, 'LemonTart.jpg', 0),
(128, 29, 'subproduct2', 2900, 2, 'LemonTart.jpg', 0),
(129, 29, 'subproduct3', 3000, 2, 'LemonTart.jpg', 0),
(130, 29, 'subproduct4', 4000, 2, 'LemonTart.jpg', 0),
(131, 29, 'subproduct5', 5000, 2, 'LemonTart.jpg', 0),
(132, 29, 'subproduct6', 6000, 2, 'LemonTart.jpg', 0),
(133, 30, 'subproduct1', 3000, 2, 'AppleCrumble.jpg', 0),
(134, 30, 'subproduct2', 3000, 2, 'AppleCrumble.jpg', 0),
(135, 30, 'subproduct3', 3000, 2, 'AppleCrumble.jpg', 0),
(136, 30, 'subproduct4', 4000, 2, 'AppleCrumble.jpg', 0),
(137, 30, 'subproduct5', 5000, 2, 'AppleCrumble.jpg', 0),
(138, 30, 'subproduct6', 6000, 2, 'AppleCrumble.jpg', 0),
(139, 31, 'subproduct1', 3100, 2, 'ChocolateMousse.jpg', 0),
(140, 31, 'subproduct2', 3100, 2, 'ChocolateMousse.jpg', 0),
(141, 31, 'subproduct3', 3100, 2, 'ChocolateMousse.jpg', 0),
(142, 31, 'subproduct4', 4000, 2, 'ChocolateMousse.jpg', 0),
(143, 31, 'subproduct5', 5000, 2, 'ChocolateMousse.jpg', 0),
(144, 31, 'subproduct6', 6000, 2, 'ChocolateMousse.jpg', 0),
(145, 32, 'subproduct1', 3200, 2, 'Souffle.jpg', 0),
(146, 32, 'subproduct2', 3200, 2, 'Souffle.jpg', 0),
(147, 32, 'subproduct3', 3200, 2, 'Souffle.jpg', 0),
(148, 32, 'subproduct4', 4000, 2, 'Souffle.jpg', 0),
(149, 32, 'subproduct5', 5000, 2, 'Souffle.jpg', 0),
(150, 32, 'subproduct6', 6000, 2, 'Souffle.jpg', 0),
(151, 33, 'subproduct1', 3300, 2, 'Sorbet.jpg', 0),
(152, 33, 'subproduct2', 3300, 2, 'Sorbet.jpg', 0),
(153, 33, 'subproduct3', 3300, 2, 'Sorbet.jpg', 0),
(154, 33, 'subproduct4', 4000, 2, 'Sorbet.jpg', 0),
(155, 33, 'subproduct5', 5000, 2, 'Sorbet.jpg', 0),
(156, 33, 'subproduct6', 6000, 2, 'Sorbet.jpg', 0),
(157, 34, 'subproduct1', 3400, 2, '1_spageti.jpg', 0),
(158, 34, 'subproduct2', 3400, 2, '1_spageti.jpg', 0),
(159, 34, 'subproduct3', 3400, 2, '1_spageti.jpg', 0),
(160, 34, 'subproduct4', 4000, 2, '1_spageti.jpg', 0),
(161, 34, 'subproduct5', 5000, 2, '1_spageti.jpg', 0),
(162, 34, 'subproduct6', 6000, 2, '1_spageti.jpg', 0),
(163, 35, 'subproduct1', 3500, 2, '1_Rib.jpg', 0),
(164, 35, 'subproduct2', 3500, 2, '1_Rib.jpg', 0),
(165, 35, 'subproduct3', 3500, 2, '1_Rib.jpg', 0),
(166, 35, 'subproduct4', 4000, 2, '1_Rib.jpg', 0),
(167, 35, 'subproduct5', 5000, 2, '1_Rib.jpg', 0),
(168, 35, 'subproduct6', 6000, 2, '1_Rib.jpg', 0),
(169, 36, 'subproduct1', 3600, 2, '1_Baguette.jpg', 0),
(170, 36, 'subproduct2', 3600, 2, '1_Baguette.jpg', 0),
(171, 36, 'subproduct3', 3600, 2, '1_Baguette.jpg', 0),
(172, 36, 'subproduct4', 4000, 2, '1_Baguette.jpg', 0),
(173, 36, 'subproduct5', 5000, 2, '1_Baguette.jpg', 0),
(174, 36, 'subproduct6', 6000, 2, '1_Baguette.jpg', 0),
(175, 37, 'subproduct1', 3700, 2, '1_DonerKeBab.jpg', 0),
(176, 37, 'subproduct2', 3700, 2, '1_DonerKeBab.jpg', 0),
(177, 37, 'subproduct3', 3700, 2, '1_DonerKeBab.jpg', 0),
(178, 37, 'subproduct4', 4000, 2, '1_DonerKeBab.jpg', 0),
(179, 37, 'subproduct5', 5000, 2, '1_DonerKeBab.jpg', 0),
(180, 37, 'subproduct6', 6000, 2, '1_DonerKeBab.jpg', 0),
(181, 39, 'subproduct1', 3900, 2, '1_Tart.jpg', 0),
(182, 39, 'subproduct2', 3900, 2, '1_Tart.jpg', 0),
(183, 39, 'subproduct3', 3900, 2, '1_Tart.jpg', 0),
(184, 39, 'subproduct4', 4000, 2, '1_Tart.jpg', 0),
(185, 39, 'subproduct5', 5000, 2, '1_Tart.jpg', 0),
(186, 39, 'subproduct6', 6000, 2, '1_Tart.jpg', 0),
(187, 21, 'sub1', 123, 123, 'banner1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `IdTables` int NOT NULL,
  `NumberTable` int NOT NULL,
  `NumberPeopleDefault` int NOT NULL,
  `StatusTable` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`IdTables`, `NumberTable`, `NumberPeopleDefault`, `StatusTable`) VALUES
(11, 24, 10, 1),
(12, 21, 20, 1),
(13, 22, 20, 1),
(14, 23, 20, 1),
(15, 1, 5, 1),
(16, 2, 7, 1),
(17, 31, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`IdAccount`),
  ADD UNIQUE KEY `Gmail` (`Gmail`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IdCart`),
  ADD KEY `IdAccount` (`IdAccount`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IdCategory`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`IdEmail`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`IdOrder`),
  ADD KEY `IdAccount` (`IdAccount`),
  ADD KEY `fk_IdTabse` (`NumberTables`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IdProduct`),
  ADD UNIQUE KEY `NameProduct` (`NameProduct`),
  ADD KEY `IdCategory` (`IdCategory`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`IdSize`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `IdSize` (`IdSizeDefault`);

--
-- Indexes for table `sizedefault`
--
ALTER TABLE `sizedefault`
  ADD PRIMARY KEY (`IdSizeDefault`),
  ADD UNIQUE KEY `SizeDefault` (`SizeDefault`);

--
-- Indexes for table `subcard`
--
ALTER TABLE `subcard`
  ADD PRIMARY KEY (`IdSubCart`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `IdCart` (`IdCart`),
  ADD KEY `IdSubProduct` (`IdSubProduct`),
  ADD KEY `subcard_ibfk_4` (`IdSize`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`IdSubCategories`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `IdCategory` (`IdCategory`);

--
-- Indexes for table `suborders`
--
ALTER TABLE `suborders`
  ADD PRIMARY KEY (`IdSubOrders`),
  ADD KEY `IdOrder` (`IdOrder`),
  ADD KEY `IdProduct` (`NameProduct`),
  ADD KEY `IdSubProduct` (`NameSubProduct`);

--
-- Indexes for table `subproduct`
--
ALTER TABLE `subproduct`
  ADD PRIMARY KEY (`IdSubProduct`),
  ADD KEY `IdProduct` (`IdProduct`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`IdTables`),
  ADD UNIQUE KEY `NumberTable` (`NumberTable`),
  ADD UNIQUE KEY `NumberTable_2` (`NumberTable`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `IdAccount` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `IdCart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `IdCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `IdEmail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `IdOrder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `IdProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `IdSize` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `sizedefault`
--
ALTER TABLE `sizedefault`
  MODIFY `IdSizeDefault` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subcard`
--
ALTER TABLE `subcard`
  MODIFY `IdSubCart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `IdSubCategories` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suborders`
--
ALTER TABLE `suborders`
  MODIFY `IdSubOrders` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `subproduct`
--
ALTER TABLE `subproduct`
  MODIFY `IdSubProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `IdTables` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`IdAccount`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`IdCategory`) REFERENCES `category` (`IdCategory`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `size_ibfk_2` FOREIGN KEY (`IdSizeDefault`) REFERENCES `sizedefault` (`IdSizeDefault`),
  ADD CONSTRAINT `size_ibfk_3` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `subcard`
--
ALTER TABLE `subcard`
  ADD CONSTRAINT `subcard_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `subcard_ibfk_2` FOREIGN KEY (`IdCart`) REFERENCES `cart` (`IdCart`),
  ADD CONSTRAINT `subcard_ibfk_3` FOREIGN KEY (`IdSubProduct`) REFERENCES `subproduct` (`IdSubProduct`),
  ADD CONSTRAINT `subcard_ibfk_4` FOREIGN KEY (`IdSize`) REFERENCES `size` (`IdSize`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `subcategories_ibfk_2` FOREIGN KEY (`IdCategory`) REFERENCES `category` (`IdCategory`);

--
-- Constraints for table `suborders`
--
ALTER TABLE `suborders`
  ADD CONSTRAINT `suborders_ibfk_1` FOREIGN KEY (`IdOrder`) REFERENCES `orders` (`IdOrder`);

--
-- Constraints for table `subproduct`
--
ALTER TABLE `subproduct`
  ADD CONSTRAINT `subproduct_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
