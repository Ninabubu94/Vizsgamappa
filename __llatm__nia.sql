-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2024. Júl 22. 13:20
-- Kiszolgáló verziója: 8.0.31
-- PHP verzió: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `állatmánia`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `alkategoriak`
--

CREATE TABLE `alkategoriak` (
  `id` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategória` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cover` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statusz` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `alkategoriak`
--

INSERT INTO `alkategoriak` (`id`, `title`, `kategória`, `content`, `cover`, `statusz`) VALUES
(2, 'Macska nedveseledel', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptatem ratione ex magnam labore earum voluptatum enim, vero facilis ipsa tempore sint eum. Debitis, aut repellendus? Omnis doloribus maiores tempora! Atque harum accusantium id quam, minima, eligendi quibusdam rerum voluptatum tempore eum vitae culpa praesentium?\n', 'Cat_Wetfood_1000x1000_1.jpg', 1),
(3, 'Macska szárazeledel', 4, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum iure aliquid facere earum aut commodi sint? Impedit qui exercitationem non, dignissimos autem, sint harum explicabo minima maiores assumenda delectus, soluta mollitia voluptas quibusdam repudiandae? Dignissimos.\r\n', 'Cat_Dryfood_1000x1000_1.jpg', 1),
(4, 'Kutyatáp', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt commodi, cupiditate, dolore iure voluptatibus odio cumque atque praesentium quas fugiat necessitatibus esse ea nobis, velit sequi tempora iusto. Odit exercitationem ducimus, fuga temporibus minima mollitia.\r\n', 'Cat_Dryfood_1000x1000_1.jpg', 1),
(5, 'Kutya nedveseledel', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt commodi, cupiditate, dolore iure voluptatibus odio  necessitatibus esse ea nobis, velit sequi tempora iusto. Odit exercitationem ducimus, fuga temporibus minima mollitia.\r\n', 'Cat_Wetfood_1000x1000_1.jpg', 1),
(6, 'Kutya felszerelés', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt commodi, cupiditate, dolore iure voluptatibus odio ducimus, fuga temporibus minima mollitia.\r\n', 'Dog_Leads_Collars_1000x1000_1.jpg', 1),
(7, 'Kutya játékok', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt commodi, cupiditate, dolore iure voluptatibus odio cumque atque praesentium quas fugiat necessitatibus esse ea nobis, velit sequi .\r\n', 'Dog_Toys_Sports_Acc_1000x1000_1.jpg', 1),
(9, 'Macska Felszerelés', 4, ' Sunt commodi, cupiditate, dolore iure voluptatibus odio cumque atque praesentium quas fugiat necessitatibus esse ea nobis, velit sequi tempora iusto. Odit exercitationem ducimus, fuga temporibus minima mollitia.\r\n', 'Cat_Scratchtree_1000x1000_1.jpg', 1),
(10, 'Macska  Játékok', 4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', 'Cat_Toys_1000x1000_1.jpg', 1),
(11, 'Macska itatók,etetők', 4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', 'Cat_Bowls_1000x1000_1.jpg', 1),
(12, 'Kutya etetők,itatók', 3, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', 'image_1_170092.jpg', 1),
(13, 'Macska alomtálak, alom', 4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. ', 'Cat_Toilet_1000x1000_1.jpg', 1),
(14, 'Kutya jutalomfalatok', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis dolores aperiam illo, architecto numquam totam ad delectus temporibus aspernatur!\r\n', 'Dog_Snacks_1000x1000_1.jpg', 1),
(15, 'Macska jutalomfalatok', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis dolores aperiam illo, architecto numquam totam ad delectus temporibus aspernatur!Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Cat_Snacks_1000x1000_1.jpg', 1),
(16, 'Madár Itatók', 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eaque, id ex pariatur reiciendis, quisquam itaque numquam ut explicabo rerum, voluptatibus alias vero aliquid voluptate minima! Quis distinctio dignissimos ad fuga repudiandae unde illo reiciendis architecto libero ab!\r\n', 'madaritato.jpg', 1),
(17, 'Madár etetők', 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos eaque, id ex pariatur reiciendis, quisquam itaque numquam ut explicabo rerum, voluptatibus alias vero aliquid voluptate minima!', 'trx5466.jpg', 1),
(18, 'kisállat eledel', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptatem ratione ex magnam labore earum voluptatum enim, vero facilis ipsa tempore sint eum. Debitis, aut repellendus? Omnis doloribus maiores tempora! Atque harum accusantium id quam, minima, eligendi quibusdam rerum voluptatum tempore eum vitae culpa praesentium.\r\n', '104485.jpg', 1),
(19, 'Kisállat etetők, itatók', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptatem ratione ex magnam labore earum voluptatum enim, vero facilis ipsa tempore sint eum. Debitis, aut repellendus? Omnis doloribus maiores tempora! Atque harum accusantium id quam, minima, eligendi quibusdam rerum voluptatum tempore eum vitae culpa praesentium.', '313468_edelstahlnapf_f_r_hundebar_dsc5971_0 (1).jpg', 1),
(20, 'Madár ketrecek', 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem pariatur laudantium impedit maiores libero illo iusto, saepe vero provident atque veniam tempora. Nemo commodi et voluptatibus inventore doloremque quaerat libero eum vero dicta quidem! Vero.\r\n', '378898_pla_tiaki_robin_xxl_fg_5644_6.jpg', 1),
(21, 'Kisállat ketrecek', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem pariatur laudantium impedit maiores libero illo iusto, saepe vero provident atque veniam tempora. Nemo commodi et voluptatibus inventore doloremque quaerat libero eum vero dicta quidem! Vero.\r\n', 'ketr.jpg', 1),
(22, 'Kutya fekhelyek', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste autem dolorum, ipsam fugiat blanditiis sed odit odio. \r\n', '16273_pla_trixie_kleintier_kuschelbett_hs1_3.jpg', 1),
(23, 'Macska kiegészítők', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste autem dolorum, ipsam fugiat blanditiis sed odit odio. \r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Iste autem dolorum, ipsam fugiat blanditiis sed odit odio.\r\n', 'Cat_Transport_1000x1000_1.jpg', 1),
(24, 'Madár játék', 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', 'SnacksAndCrackers_1000x1000px_05_1.jpg', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `feliratkozasok`
--

CREATE TABLE `feliratkozasok` (
  `id` int NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `feliratkozasok`
--

INSERT INTO `feliratkozasok` (`id`, `name`, `email`) VALUES
(21, 'Mihalicza Dávid', 'bubuka@gmail.com'),
(23, 'Varga Nina', 'kukac@gmail.com'),
(50, 'Varga Nina', 'hakfjd@gmail.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`id`, `name`, `status`) VALUES
(3, 'Kutya', 1),
(4, 'Macska', 1),
(5, 'Kisállatok', 1),
(6, 'Madár', 1),
(9, 'Akciók', 1),
(10, 'Kiemelt termékeink', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek`
--

CREATE TABLE `kerdesek` (
  `id` int NOT NULL,
  `kerdes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `típus` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jellege` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `valasz` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` date NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kerdesek`
--

INSERT INTO `kerdesek` (`id`, `kerdes`, `típus`, `jellege`, `valasz`, `created`, `status`) VALUES
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet suscipit sed eligendi temporibus iste, consequuntur repudiandae in fuga! Nesciunt quas provident eveniet iure! Odit quisquam atque, odio enim, ad, quibusdam hic inventore nam praesentium amet incidunt quae fuga consectetur sint illo! Accusantium, deserunt! Dolores, nemo tenetur quod dolorem eum quibusdam?', 'macska', 'orvosi', ' Amet suscipit sed eligendi temporibus iste, consequuntur repudiandae in fuga! Nesciunt quas provident eveniet iure! Odit quisquam atque, odio enim, ad, quibusdam hic inventore nam praesentium amet incidunt quae fuga consectetur sint illo!', '2024-07-11', 1),
(11, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quas provident eveniet iure! Odit quisquam atque, odio enim, ad, quibusdam hic inventore nam praesentium amet incidunt quae fuga consectetur sint illo! Accusantium, deserunt! Dolores, nemo tenetur quod dolorem eum quibusdam?', 'kisemlos', 'termek', '', '2024-07-11', 0),
(12, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet suscipit sed eligendi temporibus iste, consequuntur repudiandae in fuga! Nesciunt quas provident eveniet iure! Odit quisquam atque, odio enim, ad, quibusdam hic inventore nam praesentium amet incidunt quae fuga consectetur sint illo! Accusantium, deserunt! Dolores, nemo tenetur quod dolorem eum quibusdam?', 'macska', 'orvosi', 'Odit quisquam atque, odio enim, ad, quibusdam hic inventore nam praesentium amet incidunt quae fuga consectetur sint illo! Accusantium, deserunt!', '2024-07-11', 1),
(13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet suscipit sed eligendi temporibus iste, consequuntur repudiandae in fuga! Nesciunt quas provident eveniet iure! Odit quisquam atque, odio enim, ad, quibusdam hic inventore nam praesentium amet incidunt quae fuga consectetur sint illo! Accusantium, deserunt! Dolores, nemo tenetur quod dolorem eum quibusdam?', 'kutya', 'termek', '', '2024-07-11', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosaram`
--

CREATE TABLE `kosaram` (
  `id` int NOT NULL,
  `user_ID` int NOT NULL,
  `termek_ID` int NOT NULL,
  `név` text COLLATE utf8mb4_general_ci NOT NULL,
  `darab` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `egységár` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kosaram`
--

INSERT INTO `kosaram` (`id`, `user_ID`, `termek_ID`, `név`, `darab`, `egységár`) VALUES
(21, 71, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(22, 72, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(23, 74, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(24, 75, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(25, 78, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(26, 79, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(27, 80, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(28, 81, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(29, 82, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(30, 71, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(31, 72, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(32, 74, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(33, 75, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(34, 78, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(35, 79, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(36, 80, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(37, 81, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(38, 82, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(39, 71, 11, 'Gourmet Gold ...', '2', 12000),
(40, 72, 11, 'Gourmet Gold ...', '2', 12000),
(41, 74, 11, 'Gourmet Gold ...', '2', 12000),
(42, 75, 11, 'Gourmet Gold ...', '2', 12000),
(43, 78, 11, 'Gourmet Gold ...', '2', 12000),
(44, 79, 11, 'Gourmet Gold ...', '2', 12000),
(45, 80, 11, 'Gourmet Gold ...', '2', 12000),
(46, 81, 11, 'Gourmet Gold ...', '2', 12000),
(47, 82, 11, 'Gourmet Gold ...', '2', 12000),
(48, 71, 11, 'Gourmee macskahami', '2', 12000),
(49, 72, 11, 'Gourmee macskahami', '2', 12000),
(50, 74, 11, 'Gourmee macskahami', '2', 12000),
(51, 75, 11, 'Gourmee macskahami', '2', 12000),
(52, 78, 11, 'Gourmee macskahami', '2', 12000),
(53, 79, 11, 'Gourmee macskahami', '2', 12000),
(54, 80, 11, 'Gourmee macskahami', '2', 12000),
(55, 81, 11, 'Gourmee macskahami', '2', 12000),
(56, 82, 11, 'Gourmee macskahami', '2', 12000),
(57, 71, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(58, 72, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(59, 74, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(60, 75, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(61, 78, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(62, 79, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(63, 80, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(64, 81, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(65, 82, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(66, 71, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(67, 72, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(68, 74, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(69, 75, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(70, 78, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(71, 79, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(72, 80, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(73, 81, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(74, 82, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(75, 71, 11, 'Gourmet Gold ...', '2', 12000),
(76, 72, 11, 'Gourmet Gold ...', '2', 12000),
(77, 74, 11, 'Gourmet Gold ...', '2', 12000),
(78, 75, 11, 'Gourmet Gold ...', '2', 12000),
(79, 78, 11, 'Gourmet Gold ...', '2', 12000),
(80, 79, 11, 'Gourmet Gold ...', '2', 12000),
(81, 80, 11, 'Gourmet Gold ...', '2', 12000),
(82, 81, 11, 'Gourmet Gold ...', '2', 12000),
(83, 82, 11, 'Gourmet Gold ...', '2', 12000),
(84, 71, 11, 'Gourmee macskahami', '2', 12000),
(85, 72, 11, 'Gourmee macskahami', '2', 12000),
(86, 74, 11, 'Gourmee macskahami', '2', 12000),
(87, 75, 11, 'Gourmee macskahami', '2', 12000),
(88, 78, 11, 'Gourmee macskahami', '2', 12000),
(89, 79, 11, 'Gourmee macskahami', '2', 12000),
(90, 80, 11, 'Gourmee macskahami', '2', 12000),
(91, 81, 11, 'Gourmee macskahami', '2', 12000),
(92, 82, 11, 'Gourmee macskahami', '2', 12000),
(93, 71, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(94, 72, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(95, 74, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(96, 75, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(97, 78, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(98, 79, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(99, 80, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(100, 81, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(101, 82, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(102, 71, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(103, 72, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(104, 74, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(105, 75, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(106, 78, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(107, 79, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(108, 80, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(109, 81, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(110, 82, 11, 'Gourmet Gold rafinált ragu', '2', 4200),
(111, 71, 11, 'Gourmet Gold ...', '2', 12000),
(112, 72, 11, 'Gourmet Gold ...', '2', 12000),
(113, 74, 11, 'Gourmet Gold ...', '2', 12000),
(114, 75, 11, 'Gourmet Gold ...', '2', 12000),
(115, 78, 11, 'Gourmet Gold ...', '2', 12000),
(116, 79, 11, 'Gourmet Gold ...', '2', 12000),
(117, 80, 11, 'Gourmet Gold ...', '2', 12000),
(118, 81, 11, 'Gourmet Gold ...', '2', 12000),
(119, 82, 11, 'Gourmet Gold ...', '2', 12000),
(120, 71, 11, 'Gourmee macskahami', '2', 12000),
(121, 72, 11, 'Gourmee macskahami', '2', 12000),
(122, 74, 11, 'Gourmee macskahami', '2', 12000),
(123, 75, 11, 'Gourmee macskahami', '2', 12000),
(124, 78, 11, 'Gourmee macskahami', '2', 12000),
(125, 79, 11, 'Gourmee macskahami', '2', 12000),
(126, 80, 11, 'Gourmee macskahami', '2', 12000),
(127, 81, 11, 'Gourmee macskahami', '2', 12000),
(128, 82, 11, 'Gourmee macskahami', '2', 12000),
(129, 71, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(130, 72, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(131, 74, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(132, 75, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(133, 78, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(134, 79, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(135, 80, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(136, 81, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(137, 82, 10, 'Happy Dog Supreme Fit Vital Senior', '2', 1560),
(138, 71, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(139, 72, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(140, 74, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(141, 75, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(142, 78, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(143, 79, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(144, 80, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(145, 81, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(146, 82, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(147, 71, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(148, 72, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(149, 74, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(150, 75, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(151, 78, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(152, 79, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(153, 80, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(154, 81, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(155, 82, 10, 'Happy Dog Supreme Fit Vital Medium Adult', '2', 1560),
(156, 71, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(157, 72, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(158, 74, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(159, 75, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(160, 78, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(161, 79, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(162, 80, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(163, 81, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(164, 82, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(165, 71, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(166, 72, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(167, 74, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(168, 75, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(169, 78, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(170, 79, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(171, 80, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(172, 81, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(173, 82, 10, 'Happy Dog NaturCroq - Lamb & Rice Adult', '2', 1560),
(174, 71, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(175, 72, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(176, 74, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(177, 75, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(178, 78, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(179, 79, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(180, 80, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(181, 81, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(182, 82, 10, 'Happy Dog Supreme Sensible Toscana', '2', 1560),
(183, 71, 10, 'Hills Nature Adult Medium', '2', 18700),
(184, 72, 10, 'Hills Nature Adult Medium', '2', 18700),
(185, 74, 10, 'Hills Nature Adult Medium', '2', 18700),
(186, 75, 10, 'Hills Nature Adult Medium', '2', 18700),
(187, 78, 10, 'Hills Nature Adult Medium', '2', 18700),
(188, 79, 10, 'Hills Nature Adult Medium', '2', 18700),
(189, 80, 10, 'Hills Nature Adult Medium', '2', 18700),
(190, 81, 10, 'Hills Nature Adult Medium', '2', 18700),
(191, 82, 10, 'Hills Nature Adult Medium', '2', 18700),
(192, 71, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(193, 72, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(194, 74, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(195, 75, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(196, 78, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(197, 79, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(198, 80, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(199, 81, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300),
(200, 82, 10, 'Happy Dog Supteme Firnvital Junior ', '2', 2300);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termékek`
--

CREATE TABLE `termékek` (
  `id` int NOT NULL,
  `név` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `alkategóriák` int NOT NULL,
  `gyártó` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cikkszám` int NOT NULL,
  `egységár` int NOT NULL,
  `kiszerelés` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kedvezmény` int NOT NULL,
  `kép` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `leírás` text COLLATE utf8mb4_general_ci NOT NULL,
  `dátum` datetime NOT NULL,
  `státusz` tinyint NOT NULL,
  `kulcsszo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `termékek`
--

INSERT INTO `termékek` (`id`, `név`, `alkategóriák`, `gyártó`, `cikkszám`, `egységár`, `kiszerelés`, `kedvezmény`, `kép`, `leírás`, `dátum`, `státusz`, `kulcsszo`) VALUES
(2, 'Happy Dog NaturCroq - Lamb & Rice Adult', 4, 'Happy Dog', 562548, 1560, '15kg/zsák', 0, '102924-102925-108210-naturcroq-lammreis-livo.jpg', '\r\nA Happy Dog NaturCroq - Lamb & Rice Adult eledele ízletes teljes értékű eledelt kínál kedvence számára, s könnyen emészthető receptúrájának köszönhetően különösen érzékeny állatok esetében jól használható. Nem üli meg az állat gyomrát, hiszen jól emészthető, minőségi összetevőkből áll. Alkotóelemei Bajorországból származnak, s a száraztáp cukor, mesterséges aromák, színező anyagok és tartósítószerek mellőzésével készül.', '2024-06-10 00:00:00', 1, 'Happy Dog NaturCroq - Lamb & Rice Adult'),
(4, 'Happy Dog Supreme Fit Vital Medium Adult', 4, 'Happy Dog', 567676, 1560, '15kg/zsák', 0, '_interquell_happydog_supreme_fitvital_medium_adult_hs_02_5 (1).jpg', 'A Happy Dog NaturCroq - Lamb & Rice Adult száraztáp speciálisan a táplálékérzékeny felnőtt kutyák igényeihez igazított. \r\n\r\nRopogós krokettek: nem mind egyforma, ám valamennyi egyformán ízletes.\r\nElőállítás helye: Németország', '2024-06-11 19:13:14', 1, 'Happy Dog Supreme Fit Vital Medium Adult'),
(5, 'Happy Dog Supreme Fit Vital Senior', 4, 'Happy Dog', 163343, 1560, '15kg/zs', 0, '_interquell_happydog_supreme_fitvital_senior_hs_02_5.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', '2024-06-14 10:15:57', 1, 'Happy Dog Supreme Fit Vital Senior'),
(6, 'Happy Dog Supreme Sensible Toscana', 4, 'Happy Dog', 158796, 1560, '15kg/zsák', 0, '21768_21769_pla_happy_dog_supreme_sensible_toscana_hs_1_1_7 (1).jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', '2024-06-07 12:15:57', 1, 'Happy Dog Supreme Sensible Toscana'),
(7, 'Happy Dog Supteme Firnvital Junior ', 4, 'Happy Dog', 589142, 2300, '10kg/zsák', 0, '249297_pla_interquell_happydog_supteme_firnvital_junior_10kg_hs_01_7.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', '2024-02-06 07:22:45', 1, ''),
(8, 'Happy Dog Supteme Sensible Junior', 4, 'Happy Dog', 579621, 1890, '10kg/zsák', 0, '249298_pla_interquell_happydog_supteme_sensible_puppy_lammnreis_10kg_hs_01_2.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde officiis porro culpa eos fugiat numquam dolorem expedita veritatis, quo explicabo rem voluptatem exercitationem perspiciatis. Officiis.', '2024-01-09 09:22:45', 1, 'Happy Dog Supteme Sensible Junior'),
(9, 'Happy Dog NaturCroq - Lamb & Rice Adult', 4, 'Happy Dog', 562548, 1560, '15kg/zsák', 0, '102924-102925-108210-naturcroq-lammreis-livo.jpg', 'A Happy Dog NaturCroq - Lamb & Rice Adult száraztáp speciálisan a táplálékérzékeny felnőtt kutyák igényeihez igazított. Olyan könnyen emészthető összetevőket tartalmaz, mint a bárány és a rizs, s teljes értékű eledelül szolgál normál energiaigényű kutyák számára.\r\n\r\n', '2024-06-10 00:00:00', 1, ''),
(10, 'Happy Dog Supreme Fit Vital Medium Adult', 4, 'Happy Dog', 567676, 1560, '15kg/zsák', 0, '_interquell_happydog_supreme_fitvital_medium_adult_hs_02_5 (1).jpg', 'A Happy Dog NaturCroq - Lamb & Rice Adult száraztáp speciálisan a táplálékérzékeny felnőtt kutyák igényeihez igazított. Olyan könnyen emészthető összetevőket tartalmaz, mint a bárány és a rizs, s teljes értékű eledelül szolgál normál energiaigényű kutyák számára.\r\n\r\nElőállítás helye: Németország', '2024-06-11 19:13:14', 1, 'Happy Dog Supreme Fit Vital Medium Adult'),
(11, 'Gourmet Gold rafinált ragu', 2, 'Gourmet Gold', 542247, 4200, '12db/doboz', 0, '68965_pla_nestle_gourmet_gold_raffiniertes_ragout_rind_1 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.\r\n', '2024-04-02 12:58:34', 1, 'Gourmet Gold rafinált ragu'),
(12, 'Gourmet Gold rafinált ragu', 2, 'Gourmet Gold', 564685, 4200, '12db/doboz', 0, '68966_pla_nestle_gourmet_gold_raffiniertes_ragout_huhn_9 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.\r\n', '2024-02-13 12:58:34', 1, 'Gourmet Gold rafinált ragu'),
(13, 'Nyami kaja', 3, 'Royal Canin', 453145, 7800, '10kg/zsák', 0, '3182550721424_11__0.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-10-17 13:01:59', 1, 'Nyami kaja'),
(14, 'Ilyet kell venni', 3, 'Royal Canin', 488451, 8200, '10kg/zsák', 0, '3182550752015_11__1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-06-13 13:01:59', 1, 'Ilyet kell venni'),
(15, 'Gourmee macskahami', 2, 'Gourmet Gold', 558234, 12000, '24db/doboz', 0, '246299_nestle_gourmet_gold_raffiniertes_ragout_mixgemuese_85g_hs_02_7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-06-14 13:06:22', 1, 'Gourmee macskahami'),
(16, 'Gourmet Gold ...', 2, 'Gourmet Gold', 258745, 12000, '12db/doboz', 0, '68967_pla_nestle_gourmet_gold_raffiniertes_ragout_lachs_2 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-12-14 13:06:22', 1, ''),
(17, 'Animonda grancarno adult', 5, 'Animonda', 578965, 1400, '800g/konzerv', 0, '130709_pla_animonda_animondagrancarno_adult_singleprotein_huhnpur_800g_hs_01_5 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-08-14 14:33:46', 1, ''),
(18, 'Animonda pla grancarno huhn spinat himbeeren kuerbiskerne', 5, 'Animonda', 873152, 1400, '800g/konzerv', 0, '130714_pla_grancarno_huhn_spinat_himbeeren_kuerbiskerne_800g_hs_01_0 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', '2023-05-09 14:33:46', 1, 'Animonda pla grancarno huhn spinat himbeeren kuerbiskerne'),
(19, 'Versele laga crispy', 18, 'Veggei', 578962, 1800, '10kg/zsák', 0, '50962_pla_vilmie_rabbit_1kg_7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-02-05 14:39:41', 1, ''),
(20, 'Tökmag', 18, 'Panzi', 873512, 850, '1kg/zacskó', 0, '8365.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-11-06 14:49:22', 1, ''),
(21, 'Nyúl táp', 18, 'Panzi', 789612, 650, '500gr/doboz', 0, '1105.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-11-07 14:49:22', 1, ''),
(22, 'Tengeri malac táp', 18, 'Panzi', 537289, 650, '500gr/zacskó', 0, '1106.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-01-25 14:53:30', 1, 'Tengeri malac táp'),
(23, 'Chinchilla', 18, 'Versele Laga', 345698, 3580, '2kg/zacskó', 0, '461359.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-02-23 14:53:30', 1, ''),
(24, 'Versele laga nyúltáp', 18, 'Versele Laga', 721596, 3580, '2kg/zacskó', 0, '461350.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-12-25 14:57:36', 1, ''),
(25, 'Tengeri malac eledel', 18, 'Veggie', 783254, 850, '1kg/zacskó', 0, '461711.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-04-19 14:57:36', 1, ''),
(26, 'Széna', 18, 'Vilmie', 783254, 7200, '10kg', 0, '1000x1000_01_2_naturstroh_10kg_9.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-01-21 15:01:27', 1, 'Széna'),
(27, 'Gyógynövényes eleség rágcsálóknak', 18, 'Panzi', 773645, 1100, '750gr', 0, '8359.jpg.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-09-28 15:01:27', 1, 'Gyógynövényes eleség rágcsálóknak'),
(28, 'labda', 5, 'Animonda', 122845, 1450, '400gr', 0, '82730_pla_animonda_grancarno_adult_multifleischcocktail_400g_9 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-11-20 16:04:50', 1, ''),
(29, 'Hills lamb rice táp', 4, 'Hills', 176522, 16500, '14kg', 0, '106004_pla_hill_s_scienceplan_matureadult_medium_lamb_rice_14kg_hs_01_3 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-10-15 16:08:49', 1, ''),
(30, 'Hills puppy medium', 4, 'Hills', 779125, 16800, '14kg', 0, '105944_pla_hill_s_scienceplan_puppy_medium_lamb_rice_14kg_hs_01_1 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-01-28 16:08:49', 1, ''),
(31, 'Hills Nature Adult Medium', 4, 'Hills', 128596, 18700, '14kg', 0, '106009_pla_hill_s_scienceplan_matureadult_medium_light_chicken_14kg_hs_01_6 (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-02-16 16:13:36', 1, ''),
(32, 'Hills Science Adult', 4, 'Hills', 187532, 18900, '14kg', 0, '105729_pla_hills_scienceplan_adult_large_chicken_14kg_hs_01_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-11-26 16:13:36', 1, ''),
(33, 'Animonda Grancarno', 5, 'Animonda', 112288, 1750, '800gr', 0, '186396_pla_animonda_animonda_grancarno_original_adult_800g_mix2_0.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-03-18 16:16:35', 1, ''),
(34, 'Animonda Grancarno Huhn', 5, 'Animonda', 173599, 1750, '800gr', 0, '130714_pla_grancarno_huhn_spinat_himbeeren_kuerbiskerne_800g_hs_01_0.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-04-12 16:16:35', 1, ''),
(35, 'Kleintierkaefig Maxi XXL', 21, 'Maxi', 477736, 13800, '', 0, '18817_PLA_skyline_Kleintierkaefig_Maxi_XXL_blau_1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-01-17 16:20:13', 1, ''),
(36, 'Kutyaágy 40x50cm', 22, 'Trixie', 148962, 8500, '', 0, '16273_pla_trixie_kleintier_kuschelbett_hs1_3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-02-22 16:20:13', 1, ''),
(37, 'Trixie madár játék 45 cm', 24, 'Trixie', 226589, 1680, '', 0, '2577t5195.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-04-18 11:31:25', 1, ''),
(38, 'Trixie madár játék 35 cm', 24, 'Trixie', 547896, 2800, '', 0, '1341503025.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-05-02 11:31:25', 1, ''),
(39, 'Kutya tasakos étel', 5, 'Julius K-9', 789512, 2450, '12db/doboz', 0, '1658653863.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-03-11 11:35:34', 1, ''),
(40, 'Tasakos kutya kaja', 5, 'Julius K-9', 789136, 2750, '12db/doboz', 0, '1680111741.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2024-01-06 11:35:34', 1, ''),
(41, 'Royal Canin tasakos', 5, 'Royal Canin', 158763, 8600, '12db/doboz', 0, '9003579008447_1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-03-24 11:45:14', 1, ''),
(42, 'Pedigree konzerv 1250gr', 5, 'Royal Canin', 783541, 1280, '1250gr', 0, '5900951015946_abic-6a.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-04-01 11:45:14', 1, ''),
(43, 'Fekhely 40x60x50cm', 22, 'Trixie', 789942, 16800, '', 0, '1685021847.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-02-19 11:54:11', 1, ''),
(44, 'Kiságy 45cm', 22, 'Creavet', 788836, 9600, '', 0, '1573010962.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-03-20 11:54:11', 1, ''),
(45, 'Fekhely 60x50cm', 22, 'Ceapp', 736524, 17800, '', 0, '1590719856.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-12-05 11:57:30', 1, ''),
(46, 'Fekhely 55cm', 22, 'Traaum', 782643, 6500, '', 0, '1482960955.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-04-22 11:57:30', 1, ''),
(47, 'Hörcsög tál 90ml', 19, 'Trixie', 783512, 1100, '', 0, 'Clipboard08.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2023-03-22 12:05:25', 1, ''),
(48, 'Tál 120ml', 19, 'Trixie', 736548, 900, '', 0, '4011905606705F1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-02-21 12:07:51', 1, ''),
(49, 'Hörcsög tál 150ml', 19, 'Panzi', 228432, 2100, '', 0, '4047974608012F1_bcsc-0a.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-01-09 12:07:51', 1, ''),
(50, 'Dupla tál 110 ml', 19, 'Trixie', 731142, 3400, '', 0, '4011905607504F1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-03-20 12:10:03', 1, ''),
(51, 'Tál 110 ml', 19, 'Trixie', 886245, 1450, '', 0, '4011905608075F1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis, reiciendis molestias voluptas accusamus, similique, cum fugit voluptatibus amet veritatis delectus dicta sed vero eligendi.', '2024-05-25 12:10:03', 1, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`) VALUES
(71, 'Ninabubu', 'v.hajnalka.mail@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-12'),
(72, 'Hajcsika12', 'dfd@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2024-07-12'),
(74, 'tmii', 'dfd@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2024-07-12'),
(75, 'Hajcsika', 'dfd@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2024-07-12'),
(78, 'Dávid12', 'dfd@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2024-07-12'),
(79, 'Hajcsika', 'dfd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-19'),
(80, 'Bercsa96', 'ercsa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-20'),
(81, 'Ancsika92', 'Ancsababa12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-20'),
(82, 'Dávid', 'miha.david@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-07-20');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `valasz`
--

CREATE TABLE `valasz` (
  `id` int NOT NULL,
  `kerdes` int NOT NULL,
  `valasz` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` date NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `valasz`
--

INSERT INTO `valasz` (`id`, `kerdes`, `valasz`, `created`, `status`) VALUES
(36, 12, 'bla bla bla blaaaaaaaaaaaaaaaaa', '2024-07-21', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlas`
--

CREATE TABLE `vasarlas` (
  `F_ID` int NOT NULL,
  `T_ID` int NOT NULL,
  `dátum` date NOT NULL,
  `mennyiseg` tinyint NOT NULL,
  `allapot` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `vasarlas`
--

INSERT INTO `vasarlas` (`F_ID`, `T_ID`, `dátum`, `mennyiseg`, `allapot`) VALUES
(75, 17, '2024-05-14', 2, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vélemények`
--

CREATE TABLE `vélemények` (
  `id` int NOT NULL,
  `velemeny` text COLLATE utf8mb4_general_ci NOT NULL,
  `created` date NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `vélemények`
--

INSERT INTO `vélemények` (`id`, `velemeny`, `created`, `status`) VALUES
(19, 'Mi még nem kóstoltuk, de a kutyának ízlik. Sajnos nagyon  érzékeny a gyomra, ezért csak bárny vagy csirkehúsos ételt ehet. Sajnáljuk, hogy olyan konzervet nem tartanak, amit a kutyánk megehet,mert nagyon kényelmes és pontos a futárszolgálat.Külön értékelőlapot nem találtam, ezért itt tettem eleget értékelő kérésüknek. A megrendelt árúval soha semmilyen probléma nem volt és elég gyakran van a csomaghoz ajándék is. Mi a Eukanuba termékeket ismerjük, kiválóak, kutyás ismerőseinkenek szoktuk ajánlani Önöket, mint kényelmes és megbízható vásárlási lehetőséget.  Üdvözlettel:Niki', '2024-07-20', 1),
(20, 'Szeretném maximális elégedettségemet kifejezni. Vásároltam önöktől és a lehető legszuperebb áron kínálták a terméket. Ezen kívül még ingyen, és nagyon gyorsan házhoz szállították. Alig akarom elhinni, hogy ilyen manapság még létezik! Remélem továbbra is ilyen kedvező marad az ár és a szállítás. Ha ez így lesz (és persze most is) csak önöktől vásárolok. Minden ismerősömnek ajánlani fogom az oldalt! Még egyszer köszönöm. Üdv:\r\n', '2024-07-20', 0),
(22, 'A rendelt árukkal elégedett vagyok. Hosszú idő után már négy hete, hogy kutyusunk, a 11 éves toy uszkárunk jól van. Emésztési problémái voltak, remélem csak voltak.  A Hills termékek eddig nagyon jónak bizonyultak. Nagyon elégedett vagyok avval is, hogy telefonon egy hölgy felhívott, mivel a megrendelt áruk mennyiségét egyeztetni kellett. Köszönjük!\r\n', '2024-07-20', 1),
(24, 'Maximálisan elégedett voltam az Önök áruházával!Temékben,árban,\r\nidőben,tájékoztatásban,szállításban korrekt volt minden.Jó szívvel ajánlom mindenki számára!Köszönettel!', '2024-07-20', 0),
(25, 'Ezúton szeretném jelezni Önöknek, mennyire elégedett vagyok a webshoppukkal!!!\r\nGyorsan, pontosan kapom meg mindig a rendelt termékeket, a kiszállítás is ugyan ilyen hatékonysággal működik. KIEMELKEDŐ tevékenységet végeznek a webáruházak körében, talán azt mondhatom, még nem is találkoztam ilyennel. Szeretném megköszönni mindannyiuk szorgalmas munkáját!! További sok sikert, hosszú évekig jól működő vállalkozást és sok \"éhes\" kutyust kívánok Önöknek, hogy a vállalkozásuk virágozzon, mert ÖNÖK MEGÉRDEMLIK!', '2024-07-20', 1),
(26, 'grrerezrezr', '2024-07-20', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `alkategoriak`
--
ALTER TABLE `alkategoriak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategória` (`kategória`);

--
-- A tábla indexei `feliratkozasok`
--
ALTER TABLE `feliratkozasok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kerdesek`
--
ALTER TABLE `kerdesek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kosaram`
--
ALTER TABLE `kosaram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `termek_ID` (`termek_ID`);

--
-- A tábla indexei `termékek`
--
ALTER TABLE `termékek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alkategóriák` (`alkategóriák`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `valasz`
--
ALTER TABLE `valasz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kerdes` (`kerdes`) USING BTREE;

--
-- A tábla indexei `vasarlas`
--
ALTER TABLE `vasarlas`
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `T_ID` (`T_ID`);

--
-- A tábla indexei `vélemények`
--
ALTER TABLE `vélemények`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `alkategoriak`
--
ALTER TABLE `alkategoriak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT a táblához `feliratkozasok`
--
ALTER TABLE `feliratkozasok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `kerdesek`
--
ALTER TABLE `kerdesek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `kosaram`
--
ALTER TABLE `kosaram`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT a táblához `termékek`
--
ALTER TABLE `termékek`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT a táblához `valasz`
--
ALTER TABLE `valasz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT a táblához `vélemények`
--
ALTER TABLE `vélemények`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `alkategoriak`
--
ALTER TABLE `alkategoriak`
  ADD CONSTRAINT `alkategoriak_ibfk_1` FOREIGN KEY (`kategória`) REFERENCES `kategoria` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Megkötések a táblához `kosaram`
--
ALTER TABLE `kosaram`
  ADD CONSTRAINT `kosaram_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `kosaram_ibfk_2` FOREIGN KEY (`termek_ID`) REFERENCES `termékek` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Megkötések a táblához `termékek`
--
ALTER TABLE `termékek`
  ADD CONSTRAINT `termékek_ibfk_1` FOREIGN KEY (`alkategóriák`) REFERENCES `alkategoriak` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Megkötések a táblához `valasz`
--
ALTER TABLE `valasz`
  ADD CONSTRAINT `valasz_ibfk_1` FOREIGN KEY (`kerdes`) REFERENCES `kerdesek` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Megkötések a táblához `vasarlas`
--
ALTER TABLE `vasarlas`
  ADD CONSTRAINT `vasarlas_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vasarlas_ibfk_2` FOREIGN KEY (`T_ID`) REFERENCES `termékek` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
