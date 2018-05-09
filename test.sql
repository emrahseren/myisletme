-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 May 2018, 16:46:02
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `test`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `desc`, `status`) VALUES
(1, 'Admin', 'Admin', '1'),
(2, 'User', 'User', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `channel`
--

INSERT INTO `channel` (`id`, `name`, `exp`, `status`) VALUES
(1, 'Restaurant & Cafe', 'Restaurant & Cafe', '1'),
(13, 'Ticket', 'Bus Tickets', '0'),
(14, 'Bike', 'Bicycle Rent', '0'),
(16, 'TukTuk', 'Commition from Tuktuk', '0'),
(19, 'Hotel', 'Releted Hotel', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `cod` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `price` varchar(10) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `supplier` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `cod`, `name`, `exp`, `quantity`, `price`, `cost`, `category`, `supplier`, `status`) VALUES
(10, '11', 'Dorm 11', 'Dorm Room1 - Bed 1', '1', '2', '0', '19', '10', 1),
(18, '11', 'Dorm 11', 'Dorm Room1 - Bed 1', '1', '2', '0', '19', '10', 1),
(19, '11', 'Dorm 11', 'Dorm Room1 - Bed 1', '1', '2', '0', '19', '10', 1),
(20, '11', 'Dorm 11', 'Dorm Room1 - Bed 1', '1', '2', '0', '19', '10', 1),
(21, '11', 'Dorm 11', 'Dorm Room1 - Bed 1', '1', '2', '0', '19', '10', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `role`
--

INSERT INTO `role` (`id`, `name`, `des`, `status`) VALUES
(1, 'Admin', 'Admin can do every thing in the system', '1'),
(2, 'Cashier', 'Cashier is only take cash and close order', '1'),
(3, 'Manager', 'Manager only watch system', '1'),
(4, 'User', 'Normal User', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `exp` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `exp`, `status`) VALUES
(1, 'BioMart', 'Market alisverisleri', '1'),
(3, 'RiverMart', 'RiverMart', '0'),
(8, 'asdasdasd', '232', '0'),
(9, '2', '3', '0'),
(10, 'DormPoint', 'Own Hotel', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` varchar(5) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10961 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `status`) VALUES
(10957, 'Nuh', 'Seren', 'seren.emrah@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', '1'),
(10958, 'Reseption', 'Test', 'dormpoint@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '4', '1'),
(10959, 'Petra', 'Harul', 'sasa', 'd41d8cd98f00b204e9800998ecf8427e', '1', '1'),
(10960, 'ali', 'veli', 'sasda@sdsd.com', 'd41d8cd98f00b204e9800998ecf8427e', '3', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `channel`
--
ALTER TABLE `channel`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `channel`
--
ALTER TABLE `channel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10961;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
