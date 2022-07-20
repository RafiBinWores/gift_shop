-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 05:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(48, 'Rafi Bin Wores', 'Wores', '1a1dc91c907325c69271ddf0c944bc72');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(5) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(26, 'Google Play card', 'Google Play gift codes can be used on the Google Play Store, the official app store for Android, to purchase apps, games, movies, books and more. To redeem, enter code in the Play Store app or play.google.com', '5.00', '', 30, 'Yes', 'No'),
(27, 'Google Play card', 'Google Play gift codes can be used on the Google Play Store, the official app store for Android, to purchase apps, games, movies, books and more. To redeem, enter code in the Play Store app or play.google.com', '10.00', 'Card-Name-6029.png', 30, 'No', 'Yes'),
(28, 'Spotify Gift Card', 'The uses of Spotify gift card to pay for a Spotify Premium subscription, which allows you to download songs, create playlists, and listen to music ad-free. Spotify gift cards can only be used for regularly priced Spotify subscriptions', '15.00', 'Card-name-9060.png', 32, 'Yes', 'Yes'),
(29, 'Netflix', 'Watch Netflix series such as Hollywood and Sex Education, plus movies such as The Prom, and documentaries recommended just for you with a Netflix gift code. There’s always something new to discover, with more added all the time.', '10.00', 'Card-Name-4783.png', 31, 'Yes', 'Yes'),
(30, 'Netflix', 'Watch Netflix series such as Hollywood and Sex Education, plus movies such as The Prom, and documentaries recommended just for you with a Netflix gift code. There’s always something new to discover, with more added all the time.', '5.00', 'Card-name-3455.png', 31, 'Yes', 'Yes'),
(31, 'PlayStation', 'Playstation gift card is digital currency used to purchase content on the playstation console store. The 12-month PS plus membership is a service that allows you to play online with certain compatible games and also gives you access to monthly discounts to for certain online game titles.', '25.00', 'Card-Name-8978.png', 35, 'Yes', 'Yes'),
(32, 'iTunes', 'Use it to shop the App Store, Apple TV, Apple Music, iTunes, Apple Arcade, the Apple Store app, apple.com, and the Apple Store.', '15.00', 'Card-name-4408.png', 36, 'No', 'Yes'),
(34, 'Steam', 'A Steam card is a gift card that can be redeemed through Steam for credit. Credit from Steam cards can be used to buy games, downloadable content, and in-game content', '25.00', 'Card-Name-1972.png', 34, 'No', 'Yes'),
(36, 'Amazon Gift Card', 'An Amazon gift is a great way to purchase products on Amazon without the hassle of adding your personal credit or debit card details', '15.00', 'Card-name-9193.png', 37, 'No', 'Yes'),
(40, 'Visa Gift Card', 'Visa gift card', '10.00', 'Card-Name-5448.png', 33, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(5) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(30, 'Google Play', 'Cards_category_294.png', 'Yes', 'Yes'),
(31, 'Netflix', 'Cards_category_978.png', 'No', 'Yes'),
(32, 'Spotify', 'Cards_category_449.png', 'Yes', 'Yes'),
(33, 'Visa', 'Cards_category_28.png', 'Yes', 'Yes'),
(34, 'Steam', 'Cards_category_773.png', 'Yes', 'Yes'),
(35, 'PlayStation', 'Cards_category_115.png', 'No', 'Yes'),
(36, 'iTunes', 'Cards_category_989.png', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `card` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL
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
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
