-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 04:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `md_cakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakecategory`
--

CREATE TABLE `cakecategory` (
  `id` int(10) NOT NULL,
  `catName` varchar(200) DEFAULT NULL,
  `catDesc` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakecategory`
--

INSERT INTO `cakecategory` (`id`, `catName`, `catDesc`, `image`) VALUES
(1, 'BIRTHDAY3', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with \r\ndesktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'catbce71a33e3c0741985d6e8ab259a9e5908ee019cef1f02b8db.jpg'),
(2, 'Debut', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'cat7524efe89378a53bd943a4b1517c22fb9da8d07f09672a72fa.jpg'),
(3, 'test', 'asdasdasdasdasdasd', 'catbed59ac0ac3870d6944b15c2bb8dd8e87cff91545a2d66fa1f.jpg'),
(4, 'Cupcake', 'Mini version of cakes.', 'cat4c2fe41ab48a491350fa57bc7e4fe213e09a9008098951fba5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `flavor` varchar(200) DEFAULT NULL,
  `duration` varchar(200) DEFAULT NULL,
  `cakeDesc` text DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `availability` varchar(200) DEFAULT NULL,
  `categoryid` tinyint(4) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `name`, `flavor`, `duration`, `cakeDesc`, `price`, `availability`, `categoryid`, `image`) VALUES
(1, 'Red Velvet Cake333', 'Red Velvet', '6 hours', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1200', 'available', 2, 'cakecc744b890bc1.jpg'),
(2, 'Birthday Cake', 'Strawberry', '3 hours', 'With the theme of Pink Floral.', '500', 'available', 1, 'cake43543d8a2014d464133d77ed963371f18b465aa755c14610c4.jpg'),
(3, 'Vanilla Cake', 'Vanilla ', '3 hours', 'asdasdasdasd', '300', 'available', 1, 'cakee0c67aad397976ec65eb07dfb9907b4531853bea6f50a7f0e3.jpg'),
(4, '3-Tier Cake', 'Strawberry', '9 hours', 'asdasdasd', '3500', 'available', 2, 'cakeba05d20518f6d7bd4bb47ed9d3cfe7739d765a2c33f421f974.jpg'),
(5, 'Birthday Cake', 'Chocolate', '4', 'With the special theme of Panda.', '800', 'available', 1, 'cakeaef8b5195fe70c4e12469f6113a89e83be269ad92e8e32b2ec.jpg'),
(6, 'Birthday Cupcake', 'Strawberry, Chocolate', '7 hours', 'With the combination of strawberry and chocolate. Fills in the box with 12 cupcakes.', '1200', 'available', 4, 'cake7ecce18b5b59a6bfcdbcd1b67114bf2a33bb576ec97611afdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) NOT NULL,
  `token` varchar(50) NOT NULL,
  `productid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `token`, `productid`, `quantity`) VALUES
(1, 'fc5da97241cbff9f618e01b37f1370e243b2c727bf1cd8d9b8', 1, 1),
(2, 'fc5da97241cbff9f618e01b37f1370e243b2c727bf1cd8d9b8', 1, 1),
(5, 'a2e234e845db131261dca48271366fead6c1d87cd66fa93a71', 1, 3),
(6, '', 1, 3),
(8, '2a9d054852b1619f299b008c5d32a5364685296355a0cf2492', 1, 3),
(9, '47ab0fde99dbd86ce3270b669cb8cf1832020d1ee857e6343e', 1, 1),
(15, '85fff379175a0301e70a84c443908d60cf93ed71991a508b50', 2, 1),
(16, '85fff379175a0301e70a84c443908d60cf93ed71991a508b50', 1, 1),
(17, '85fff379175a0301e70a84c443908d60cf93ed71991a508b50', 3, 2),
(19, 'd05e27c59d133e9eb466792d5059e1c781559fa7cc04c9d457', 2, 1),
(20, 'd05e27c59d133e9eb466792d5059e1c781559fa7cc04c9d457', 3, 3),
(21, '41883621fbaa37da0f2e424c1305017e5af3453f3aa9d1b38e', 3, 1),
(22, '29bbd78872780a361538cbf35017c336b02e5b316032a70110', 2, 1),
(26, '302a7c6bf72a5c982633e195f89f2f8d26eec404241beb53e5', 4, 1),
(27, '302a7c6bf72a5c982633e195f89f2f8d26eec404241beb53e5', 2, 2),
(28, '65155ca09127a6836ccfc58b505c60797771de1042a9c102c6', 5, 3),
(29, '65155ca09127a6836ccfc58b505c60797771de1042a9c102c6', 4, 1),
(30, '65155ca09127a6836ccfc58b505c60797771de1042a9c102c6', 2, 2),
(31, 'e3e7b13b20a11404f8946568bc8cf5aac292e8e3797fa45ce7', 6, 1),
(32, 'e3e7b13b20a11404f8946568bc8cf5aac292e8e3797fa45ce7', 3, 2),
(33, 'e3e7b13b20a11404f8946568bc8cf5aac292e8e3797fa45ce7', 4, 1),
(34, '8e35464d91dad138ceae24e6a1435ef55e810605bbb6326df4', 1, 1),
(35, '5ec645194a71ec7c64c9f73819dcbc04cb129cb82544abc280', 5, 1),
(36, '47e502b26a5f1d394148b964c2487312e0440f7972f4cecbce', 4, 1),
(37, '7d730d86b91cea980de073f4dc0ce2f626e4caabc8c3a708f8', 2, 3),
(38, '872824994198e7b3e0af1c75d41bf58b63392793db6a829dfa', 2, 3),
(39, '872824994198e7b3e0af1c75d41bf58b63392793db6a829dfa', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forget_pwd_request`
--

CREATE TABLE `forget_pwd_request` (
  `id` int(10) NOT NULL,
  `token` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `password_generated` varchar(100) DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `email_used` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget_pwd_request`
--

INSERT INTO `forget_pwd_request` (`id`, `token`, `password_hash`, `password_generated`, `userid`, `email_used`, `is_active`) VALUES
(1, '6ed93f25060c071b037b9b77f14aad0e6a3c6198eab695c600', '3963', '$2y$10$N7R4aqj/VqOicpjQz1sPqutV5UockaONuyApsvOeGr79WiKlH14my', 12, 'eduardo@email.com', 1),
(2, '1edcdd57955f09e173359c8ab57826c41812ccf540629cac80', '6481', '$2y$10$OyiiTSjf7Yk6UT2Hwb.gfO9BQHIOASPUpKzgmnLnKAoLc4nZ6O6Vy', 12, 'eduardo@email.com', 1),
(3, '7c7b9da3c49757ff0d317dc6a05725f6176102d8ccc4499202', '4557', '$2y$10$snnorquhydWX1QEt/jXNduNXyhoat.nmK/NjGQRnv3jeZxZ3phCJS', 12, 'eduardo@email.com', 1),
(4, 'faed81bc0dfd373faf53ddc62afcd4f7115cb02479661825dd', '$2y$10$vzJhCDWjtwNVJY/RLARB6.z2V/EO5yOK2gwwLt855E/cI6f4IrNO.', '1564', 12, 'eduardo@email.com', 1),
(5, 'bed9b224f5057a1249ccc6cd1ff8794a156e53b7f73b804197', '$2y$10$Z8pJyRU0BUeoDFCxQypZiu7g8Q4vGBnUiaKZZZd7YjBn7yJaPbVuC', '9946', 12, 'eduardo@email.com', 1),
(6, '6cbb50c6df5d20c865abfe6da82e13c93f8e42ffbbcb91bdcf', '$2y$10$NgV2CN.vzRNi113nLdcKSOyC38BLj.VlGFrvJHAmgFLaJPlbHeqv.', '1008', 12, 'eduardo@email.com', 1),
(7, 'd2b8e16ee70963108b230767c6fea7af6c3edff306c2e75063', '$2y$10$tIIN3B9HlVaZEzIRvj4RieRcig3WUClQyLNUwgOFGZ6QL8WghZ8Ze', '6864', 12, 'gonzalesmarkangeloph@gmail.com', 1),
(8, 'cd913429cbbc7fb9e7cbc07feb6421aa29f1ecd2f637530b1c', '$2y$10$Ga5WGJX3zhmOueTDYW7P/.9tcZ.M22iVy7E9twl9sXW6F2qJ.u7UW', '5416', 12, 'gonzalesmarkangeloph@gmail.com', 1),
(9, 'cfe2be77afce074f4826a6a2d06207a6377c01ddb0da847b0b', '$2y$10$ig7AitC0dkjrXeKpgEpEoO.PaVt/4MmpRHbDwm1r4cuS0bZroDrsC', '2903', 12, 'gonzalesmarkangeloph@gmail.com', 1),
(10, '4306743c0fb1adf6260285bfc17c1a09895c42b95c56899319', '$2y$10$ulrT0in1ObFJ8GAvg/G0pOXw/CHKhO7CpqcL7ybLVjJshdgvWoFMa', '9770', 12, 'gonzalesmarkangeloph@gmail.com', 1),
(11, '214ceccd4070cc5f4ca806d11bfb7f2b5feb41063c545b0020', '$2y$10$lsme8ZVD1tK4uGE14OY0HuyNwWb/QuUO.S4ddCsIlgayHtGk.O9LS', '8512', 12, 'gonzalesmarkangeloph@gmail.com', 1),
(12, '2837de3d65f9cb30cdcc486a897d2b4e446305c696bd7fdd57', '$2y$10$vCw8.rWAWKvlFNBpybB6suJLNM.RXUQIym6bJv.SIzR.asqv1m5UK', '2789', 12, 'gonzalesmarkangeloph@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `deliverAddress` text DEFAULT NULL,
  `contactNumber` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `customername` varchar(100) DEFAULT NULL,
  `userid` tinyint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `deliverAddress`, `contactNumber`, `email`, `note`, `status`, `date`, `customername`, `userid`) VALUES
(1, 'St. BRGY', '090011109190', NULL, 'Note Here', 'delivered', '2019-09-04 21:24:20', NULL, NULL),
(2, 'St. BRGY', '090011109190', NULL, 'Note Here', 'delivered', '2019-09-04 21:24:37', NULL, NULL),
(3, 'sample', '0909923', NULL, 'sample', 'delivered', '2019-09-04 21:41:25', NULL, NULL),
(4, 'sample', '0909923', NULL, 'sample', 'delivered', '2019-09-04 21:42:42', NULL, NULL),
(5, 'sample', '0909923', NULL, 'sample', 'delivered', '2019-09-04 21:43:18', NULL, NULL),
(6, 'sample', '0909923', NULL, 'k', 'delivered', '2019-09-04 21:52:19', NULL, NULL),
(7, '123', '123', NULL, '123', 'delivered', '2019-09-05 14:24:22', NULL, NULL),
(8, '12345', '12345', NULL, '12345', 'delivered', '2019-09-05 14:25:10', NULL, NULL),
(9, '12345', '12345', NULL, '12345', 'delivered', '2019-09-05 14:29:36', NULL, NULL),
(10, '12345', '12345', NULL, '12345', 'cancelled', '2019-09-05 14:34:27', NULL, NULL),
(11, '12345', '12345', NULL, '12345', 'cancelled', '2019-09-05 14:34:52', NULL, NULL),
(12, '', '', NULL, '', 'order', '2019-09-07 23:18:46', NULL, NULL),
(13, '', '', NULL, '', 'order', '2019-09-07 23:19:41', NULL, NULL),
(14, '', '', NULL, '', 'order', '2019-09-07 23:19:52', NULL, NULL),
(15, '', '', NULL, '', 'order', '2019-09-07 23:20:57', NULL, NULL),
(16, '', '', NULL, '', 'delivered', '2019-09-07 23:20:59', NULL, NULL),
(17, 'k', 'k', NULL, 'k', 'delivered', '2019-09-08 06:53:19', NULL, NULL),
(18, 'delivery someting', '1111111', NULL, 'some notes and its amazing', 'delivered', '2019-10-01 15:37:40', NULL, NULL),
(19, 'A-3 Fantail Street QC', '09063387451', NULL, 'some notes', 'pending', '2019-10-28 10:01:50', 'Mark Angelo Gonzales', 0),
(20, 'A-3 Fantail Street QC', '09063387451', NULL, 'some notes', 'declined', '2019-10-28 10:05:10', 'Mark Angelo Gonzales', 0),
(21, 'A-3 Fantail Street QC', '09063387451', NULL, 'some notes', 'sold', '2019-10-28 10:15:38', 'Mark Angelo Gonzales', 0),
(22, '', '', NULL, '', 'pending', '2019-10-28 10:18:05', '', 0),
(23, '', '', NULL, '', 'pending', '2019-10-28 10:21:02', '', 0),
(24, 'A-3 Fantail Street QC', '09063387451', NULL, 'some notes', 'declined', '2019-10-28 10:27:12', 'Mark Angelo Gonzales', 0),
(25, 'A-3 Fantail Street QC', '09063387451', NULL, 'some notes', 'cancelled', '2019-10-28 12:13:39', 'Mark Angelo Gonzales', 11),
(26, '96 ROTC Hunters St. Cluster 5 Tatalon Quezon City', '09155917946', 'vamyrthal@gmail.com', 'test', 'sold', '2019-10-28 16:50:31', 'Jimbo Blazo', 13),
(27, '96 ROTC Hunters St. Cluster 5 Tatalon Quezon City', '09155917946', 'vamyrthal@gmail.com', 'ghqwe', 'declined', '2019-10-28 17:10:07', 'Jimbo Blazo', 13),
(28, 'A-3 Fantil Street Qc', '09063387451', 'markgmatinde@gmail.com', 'some notes', 'pending', '2019-10-28 18:04:22', 'Tester Tester', 14),
(29, '96 ROTC Hunters St. Cluster 5 Tatalon Quezon City', '09155917946', 'vamyrthal@gmail.com', 'sadfas', 'accepted', '2019-10-29 03:04:33', 'Jimbo Blazo', 13),
(30, 'agasfk', '09059280085', 'vamyrthal@yahoo.com', 'fagggsdgs', 'delivered', '2019-11-12 06:33:01', 'Jimbo Blazo', 16),
(31, 'asdsadasd', '123123', 'markangelogonzales13@facebook.com', 'asdasdasdasd', 'pending', '2019-11-20 05:18:00', 'Mark Angelo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) NOT NULL,
  `orderid` tinyint(10) NOT NULL,
  `productid` tinyint(10) NOT NULL,
  `quantity` tinyint(10) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orderid`, `productid`, `quantity`, `price`) VALUES
(1, 19, 1, 3, '300.00'),
(2, 20, 1, 3, '300.00'),
(3, 21, 1, 3, '300.00'),
(4, 22, 1, 3, '300.00'),
(5, 23, 1, 1, '300.00'),
(6, 24, 2, 1, '1500.00'),
(7, 24, 1, 1, '300.00'),
(8, 24, 3, 2, '300.00'),
(9, 25, 3, 1, '300.00'),
(10, 26, 5, 3, '800.00'),
(11, 26, 4, 1, '4500.00'),
(12, 26, 2, 2, '1500.00'),
(13, 27, 6, 1, '1200.00'),
(14, 27, 3, 2, '300.00'),
(15, 27, 4, 1, '3500.00'),
(16, 28, 1, 1, '1200.00'),
(17, 29, 5, 1, '800.00'),
(18, 30, 4, 1, '3500.00'),
(19, 31, 2, 3, '500.00'),
(20, 31, 4, 1, '3500.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `type` enum('admin','client') DEFAULT 'client',
  `fname` varchar(200) DEFAULT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `gen` varchar(200) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userpass` varchar(255) DEFAULT NULL,
  `data_Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `fname`, `mname`, `lname`, `email`, `phone`, `address`, `bday`, `gen`, `username`, `userpass`, `data_Created`, `is_verified`) VALUES
(12, 'admin', 'test user', NULL, 'user', 'systemadministrator@gmail.com', '11111', 'testaddress', NULL, NULL, 'sysadmin', '$2y$10$z7KIa.iYy.UXAEspF2mOQOIlL3SMEjRHGS0b7zihntEGT92D/KdB6', '2019-11-20 04:07:57', 0),
(13, 'client', 'Jimbo', NULL, 'Blazo', 'vamyrthal@gmail.com', '09155917946', '96 ROTC Hunters St. Cluster 5 Tatalon Quezon City', NULL, NULL, 'cstgrosk', '$2y$10$XhqzLLrWCk6WTgvGeOMmZuBdNNyuGDzjddRKTCv/V8FIUvYkFJC6G', '2019-10-28 16:35:30', 0),
(14, 'client', 'Tester', NULL, 'Tester', 'markgmatinde@gmail.com', '09063387451', 'A-3 Fantil Street Qc', NULL, NULL, 'tester55', '$2y$10$xc72orVuIF8Wbz72Myw3Jef8UkMCGVG7CQ8GwDTshFkKJF9N4NJ7a', '2019-10-28 17:44:49', 0),
(15, 'client', 'tester66', NULL, 'tester66', 'gonzalesmarkangeloph@gmail.com', '123123123', 'tester66', NULL, NULL, 'tester66', '$2y$10$W2TogvCW0VLs4.SmFT.wxeGQUpQCwRwf9LjjM.PWbTaJua5xQAuOu', '2019-10-28 18:09:22', 0),
(16, 'client', 'Jimbo', NULL, 'Blazo', 'vamyrthal@yahoo.com', '09059280085', 'agasfk', NULL, NULL, 'vamyrthal', '$2y$10$mMkLKPUmrqgPkj2XRWGzHeJxMTEf9M..llfGd3w53j/syMu/85TSu', '2019-11-12 06:31:36', 0),
(18, 'client', 'Mark Angelo', NULL, 'Gonzales', 'gonzalesmarkangeloph1@gmail.com', 'asdasd', 'asdasda', NULL, NULL, 'sdasdasd', '$2y$10$4uvfk7gP2QgvxpTUr9paBeTYlCnqyHTUEW4sMbBErVCh6T/uaha9C', '2019-11-20 05:19:01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cakecategory`
--
ALTER TABLE `cakecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_pwd_request`
--
ALTER TABLE `forget_pwd_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cakecategory`
--
ALTER TABLE `cakecategory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `forget_pwd_request`
--
ALTER TABLE `forget_pwd_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
