-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2022 at 12:44 AM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appkey_olma`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `comment`) VALUES
(1, 1, '237742941', 'Kelishsa boladimi?'),
(2, 2, '445542748', 'Iphoneni kursak bo\'ladimi?'),
(3, 3, '1243135364', 'Zo\'r'),
(4, 3, '445542748', 'Ajoyib Qayerniki bu Nexia'),
(5, 4, '1243135364', 'Juda arzon'),
(6, 3, '561693767', 'Mashina haqidagi hamma gaplar ham rost emas ekan.'),
(7, 1, '845566890', 'FPS?'),
(8, 6, '445542748', 'Redmi buyeydi'),
(9, 1, '', 'salom'),
(10, 1, '', 'Narxi qimmatroq ekan'),
(11, 6, '1421093194', 'yaxshi telefon emas.1 yilga bormasdan kuyib ketadi'),
(12, 1, '', 'ha shunaqa'),
(13, 1, '77125048', 'Yaxwi tel ekan'),
(14, 100000, '', 'salom'),
(15, 100000, '', 'buyum qani!!!!'),
(16, 3, '', 'ajoyib nexia'),
(17, 3, '', 'zo\'r'),
(18, 3, '', 'asdasdasd'),
(19, 3, '', 'asdsafsadfgdasga ckuyhgvdvcdsayucvd'),
(20, 3, '', 'asdasdaSDASD'),
(21, 3, '', 'SHERZOD'),
(22, 10, '', 'fdgfdgdfgdfgg'),
(23, 17, '', 'hffghgfhfghfghfgh'),
(24, 3, '', 'fghfghgfhfsjkdkfhkdsjukf'),
(25, 12, '', 'ewdfwefwef'),
(26, 12, '', 'aDSADASDASDA');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `incoming_id` varchar(80) NOT NULL,
  `outgoing_id` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `message_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `incoming_id`, `outgoing_id`, `message`, `type`, `message_date`) VALUES
(1, '1243135364', '7777777', 'Salom', 'private', '1655614891'),
(2, '1243135364', '293293339', 'Salom', 'private', '1655614912'),
(3, '1243135364', '293293339', 'âœ‹', 'private', '1655614927'),
(4, '445542748', '237742941', 'salom', 'private', '1655614993'),
(5, '293293339', '1243135364', 'Salom', 'private', '1655614994'),
(6, '445542748', '237742941', 'salom', 'private', '1655615000'),
(7, '293293339', '1243135364', 'Qanday yordam bera olaman?', 'private', '1655615003'),
(8, '445542748', '7777777', 'Qalesilar', 'private', '1655615030'),
(9, '427806349', '237742941', 'Salom', 'private', '1655615036'),
(10, '194790958', '445542748', 'Salom', 'private', '1655615242'),
(11, '445542748', '266367116', 'nma gaopppppp', 'private', '1655615635'),
(12, '845566890', '847387599', 'Cho tam', 'private', '1655615656'),
(13, '445542748', '293293339', '?', 'private', '1655615661'),
(14, '845566890', '445542748', 'Hello', 'private', '1655615667'),
(15, '445542748', '847387599', 'salom', 'private', '1655615708'),
(16, '845566890', '445542748', 'Hello', 'private', '1655615734'),
(17, '445542748', '194790958', 'salom', 'private', '1655615758'),
(18, '845566890', '1243135364', 'What\'s up?', 'private', '1655615854'),
(19, '427806349', '561693767', 'Salom', 'private', '1655615865'),
(20, '77125048', '847387599', 'Salom', 'private', '1655616451'),
(21, '845566890', '77125048', 'hgvgjhkkv', 'private', '1655616484'),
(22, '445542748', '181224658', 'salom', 'private', '1655616564'),
(23, '77125048', '845566890', 'salom', 'private', '1655616659'),
(24, '845566890', '77125048', 'Salom eshak', 'private', '1655616670'),
(25, '845566890', '77125048', 'joke', 'private', '1655616682'),
(26, '1243135364', '847387599', 'salom', 'private', '1655616683'),
(27, '77125048', '845566890', 'salom mol', 'private', '1655616686'),
(28, '1243135364', '847387599', '?', 'private', '1655616686'),
(29, '1243135364', '847387599', 'Nima gap', 'private', '1655616691'),
(30, '77125048', '845566890', 'geymr', 'private', '1655616695'),
(31, '845566890', '77125048', 'BBY', 'private', '1655616698'),
(32, '77125048', '845566890', 'MSS', 'private', '1655616713'),
(33, '845566890', '77125048', 'och', 'private', '1655616754'),
(34, '845566890', '77125048', '021516156125', 'private', '1655616768'),
(35, '845566890', '77125048', '1561', 'private', '1655616771'),
(36, '845566890', '77125048', '32125', 'private', '1655616772'),
(37, '845566890', '77125048', '321312313', 'private', '1655616774'),
(38, '845566890', '77125048', '113213', 'private', '1655616775'),
(39, '845566890', '77125048', '123', 'private', '1655616775'),
(40, '845566890', '77125048', '12313', 'private', '1655616776'),
(41, '845566890', '77125048', '132132132123', 'private', '1655616778'),
(42, '845566890', '7777777', '3', 'private', '1655616880'),
(43, '194790958', '7777777', 'Salom', 'private', '1655617095'),
(44, '307482452', '237742941', 'Salom', 'private', '1655622167'),
(45, '307482452', '237742941', 'Hello', 'private', '1655622180'),
(46, '307482452', '7777777', 'Hammaga  salom', 'private', '1655622199'),
(47, '307482452', '1243135364', 'type error', 'private', '1655622215'),
(48, '357206143', '307482452', 'salom', 'private', '1655625055'),
(49, '357206143', '307482452', 'qalesiz', 'private', '1655625061'),
(50, '445542748', '7777777', 'o l m a group', 'private', '1655801471'),
(51, '561693767', '181224658', 'Salom', 'private', '1655808653'),
(52, '561693767', '181224658', 'nima gap', 'private', '1655808656'),
(53, '445542748', '7777777', '???', 'private', '1656044595');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` varchar(80) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(120) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `delivery` varchar(5) NOT NULL,
  `product_date` varchar(30) NOT NULL,
  `sold` varchar(5) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `name`, `cost`, `description`, `location`, `phone`, `img`, `img1`, `img2`, `delivery`, `product_date`, `sold`, `view`) VALUES
(3, '1243135364', 'Nexia 2 Sotiladi', '60000000', 'Oâ€˜zbekistonning â€œxalq mashinasiâ€ga aylangan Daewoo Nexia modelining uzoq davom etgan tarixi 2016 yilda yakunlandi. Bu haqda GM Uzbekistan matbuot xizmatiga asoslangan holda Wroom.ru sayti xabar qilmoqda. Ma\'lumotlarga koâ€˜ra, ushbu avtomobil avgust oyidayoq ishlab chiqarishdan olingan. \r\n\r\nModel Koreya respublikasi bilan Asakada tashkil etilgan qoâ€˜shma korxonada 1996 yildan ishlab chiqarila boshlangan edi. Janubiy Koreyaning oâ€˜zida avtomobilni 1997 yildan yigâ€˜ish toâ€˜xtatilgandi. Buning oâ€˜rniga bu mashina Oâ€˜zbekistonda yigâ€˜ildi va xalq ishonchiga sazovor boâ€˜ldi. \r\n\r\nNexia bir necha yil mobaynida 75 ot kuchiga ega 1,5 litr hajmli dvigatel bilan jihozlandi. Ammo, 2003 yildan modelning 1,5 litrli, 85 ot kuchiga ega yangi namunasi paydo boâ€˜ldi', 'POP', '998980073740', '1.jpg', '2.jpg', '3.jpg', '0', '1655615252', '0', 19),
(10, '194790958', 'Iphone 13', '13000000', 'iPhone 13 Pro Max 256GB  Yengi.   \r\nLL/A \r\n2 kun ishlagan karopkasiga solib qoÊ»yganman sovgÊ»a sifatida chet eldan kelgan telefon pul kerakligi uchun sotilvotti', 'Namangan', '+998330007749', '76968903-IMG_20220619_100347_350.jpg', '1654329623-IMG_20220619_100332_069.jpg', '1596410509-IMG_20220619_100330_618.jpg', '0', '1655615838', '0', 12),
(12, '77125048', 'Nexia 3', '117697000', 'Nexia-3\r\nYil-01.17.2022\r\nâ€œNeksiyaâ€ning uchinchi avlodi Oâ€˜zbekiston bozori uchun mutlaqo yangi model boâ€˜lib, â€œxalq mashinasiâ€ maqomini yoâ€˜qotmagan. Biz Chevrolet Nexia 3 ning batafsil sharhi va joriy narxlarini taqdim etamiz.', 'Namangan', '+998996915303', '802587330-Avtosalon-GM-Uzbekistan-v-Tashkente-Ofijialnyj-diler-GM-telefony-i-dogovora.jpg', '363453468-Chevrolet-Nexia-R3-Bezhevyj-salon.jpg', '1020360957-Chevrolet-Nexia-R3-Kreslo-voditelya-i-AKPP.jpg', '1', '1655616117', '0', 9),
(17, '654487028', 'dvsf', '436543', 'ÐµÑ€ÐºÐµ ÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐºÐº ÐµÐ½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ð½Ñ€', 'Namangan Pop', '+998943063500', 'maxresdefault.jpg', '1213998159-download.jpg', '1259333431-download.jpg', '1', '1655809834', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(80) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `unique_id` varchar(80) NOT NULL,
  `confirm_pass` varchar(10) NOT NULL DEFAULT '',
  `confirm_pass_date` varchar(80) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `mail`, `pass`, `phone`, `unique_id`, `confirm_pass`, `confirm_pass_date`) VALUES
(1, 'okdeveloper', 'Obidjon Komiljonov', 'uzokdeveloper@gmail.com', 'baab2eead24a44f41c04c9d93559bff3', '+998940545197', '237742941', '7239', '1655614192'),
(2, 'fayozbek', 'fayozbek', 'fayozbek@gmail.com', '9f7a3b8fb99330c0c028a22251831bcc', '998980073740', '1243135364', '9388', '1655614205'),
(3, 'Sherzod', 'Sherzod Mirzanazarov', 'Shmirzanazarov@gmail.com', '8d866ec0423ee4abb184779c80a44f20', '+998330007749', '194790958', '8419', '1655614220'),
(4, 'foxdevuz', 'Boburjon Abdullajonov', 'foxdevuz@gmail.com', 'dc6c72e77d78c8f8e200b3985c3e1fc0', '+998907507105', '847387599', '7765', '1655614220'),
(5, 'Ravi0107', 'Ravshanbek', 'ravshanbekqahhorov4@gmail.com', 'a21331c439a3afc4e487ba0567b0170c', '998998514607', '445542748', '5038', '1655614574'),
(6, 'Bobur', 'Bobur Bunyodjonov', 'boburbunyodjonov@gmail.com', 'd47268e9db2e9aa3827bba3afb7ff94a', '+998990497107', '1603228916', '412', '1655614634'),
(7, 'Muhammadsodiq', 'Muhammadsodiq', 'toshmatovjam020@gmail.com', 'de1e9d122f87897d356d3278af848e70', '+998 (99) 090-50-20', '427806349', '938', '1655614775'),
(8, 'olma', 'Olma Support', 'admin@appkey.uz', 'baab2eead24a44f41c04c9d93559bff3', '+998930595197', '293293339', '3951', '1655614828'),
(9, 'otabek', 'otabek', 'ergashevdilbek9@gmail.com', '6d9c644fe7a0d4fb5fcaad3e1dfe732d', '+998930353538', '266367116', '1652', '1655615020'),
(10, 'funbirduz', 'Boburjon', 'abdullajonovboburjon05@gmail.com', 'dc6c72e77d78c8f8e200b3985c3e1fc0', '+998907507105', '845566890', '3544', '1655615088'),
(11, 'PHOENIX', 'Shamshodbek Ilhamjanov', 'theendmrx@gmail.com', 'ce587086a6944c1136add015a084d618', '+998932925810', '561693767', '6681', '1655615208'),
(12, 'behruzCW', 'Behruzbek Meliboyev', 'meliboyevbehruz008@gmail.com', '3349b7013a36364762527f4da46addf0', '+998943063500', '1421093194', '8527', '1655615337'),
(13, 'Humoyun', 'Humoyun', 'abdurahimov5303@gmail.com', 'db73e5d9d43a73fc36ddea84db978b84', '+998996915303', '77125048', '7624', '1655615343'),
(14, 'zed', 'zed', 'otabekoscar196@gmail.com', 'ab3251a194a2261f6eb1e0d40c8a70d2', '+998942240483', '181224658', '9278', '1655616221'),
(15, 'odamjon', 'Odam', 'starkcoders@gmail.com', '6d28b4834bd6a9e384be01c131a8f286', '943067661', '307482452', '7920', '1655621968'),
(16, 'bobur_05', 'Bobur', 'boburbunyodjonov005@gmail.com', 'dfe3cd22157c76b921c671c13951eefc', '+998940566507', '750055316', '1593', '1655623069'),
(17, 'azizbek_tohirjonov', 'Azizbek', 'yaxshixakker@gmail.com', '4e1b9d8f35f6c20cfb7529cb35d800cc', '930670603', '357206143', '9706', '1655624892'),
(18, 'Justin', 'sshdhsd  dasdasdasd', 'halilovyodgorjon@gmail.com', '202cb962ac59075b964b07152d234b70', '+998930513009', '648394953', '7870', '1655807256'),
(19, 'cw', 'Behruzbek Meliboyev', 'meliboyevbehrurez008@gmail.com', '0707ba092e91260b305c326e6a353593', '+998943063500', '654487028', '438', '1655808639'),
(20, 'gulbaxorarslanova', 'Jhbg', 'Hftgfdr@â–¡â–¡â–¡â—', '202cb962ac59075b964b07152d234b70', '+9989273737', '816652986', '9605', '1656169974');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
