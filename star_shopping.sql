-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 02:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `star_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(27, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `total` int(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone`, `user_address`, `total`, `order_date`) VALUES
(20, 1, '97937509', 'hfeufeuof', 1000, '2023-04-04 10:32:34'),
(21, 1, '10002000', 'aaaaaaaa', 800, '2023-04-04 10:35:13'),
(22, 1, '353464', 'mmmmm', 3500, '2023-04-04 10:57:48'),
(23, 1, '70970970', 'abcdef', 1000, '2023-04-05 06:39:44'),
(24, 4, '23423', 'address sdf', 2000, '2023-04-05 11:41:23'),
(25, 5, '202030', 'abc', 2000, '2023-04-06 17:41:34'),
(26, 6, '12345', 'mahaling', 3500, '2023-04-07 09:18:36'),
(27, 6, '7751985586', 'mahaling', 3500, '2023-04-07 09:52:24'),
(28, 4, '123456789', 'abcdefgh', 900, '2023-04-07 18:05:08'),
(29, 4, '7751985586', 'mahaling', 800, '2023-04-07 18:06:42'),
(30, 4, '8965893', 'yufyfyufyuf', 700, '2023-04-07 18:10:45'),
(31, 4, '7751985586', 'mahaling', 800, '2023-04-07 18:12:29'),
(32, 4, '7751985586', 'mahaling', 800, '2023-04-07 18:14:03'),
(33, 4, '8965893', 'yufyfyufyuf', 2000, '2023-04-07 18:16:26'),
(34, 4, '809787686', 'guhy', 800, '2023-04-08 12:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orders_id`, `product_id`, `quantity`) VALUES
(28, 20, 1, 0),
(29, 21, 2, 0),
(30, 22, 5, 0),
(31, 23, 1, 0),
(32, 24, 5, 0),
(33, 24, 2, 0),
(34, 24, 6, 0),
(35, 25, 8, 0),
(36, 26, 1, 0),
(37, 26, 8, 0),
(38, 27, 5, 0),
(39, 28, 1, 0),
(40, 32, 2, 1),
(41, 33, 1, 2),
(42, 34, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` text NOT NULL,
  `price` int(20) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `category_id`) VALUES
(1, 'Girls Western Dress', 'girls western Dress.jpg', 1000, 3),
(2, 'Baby Boys Clothes Cotton Shirt Pant Set', 'baby boys clothes cotton shirt pant set.jpg', 800, 3),
(4, 'Silk Kurti For Women', 'silk kurti for women.jpg', 700, 2),
(5, 'Royal Blue Banarasi Silk Saree', 'Royal blue banarasi silk saree.jpg', 3500, 2),
(6, 'Turquoise Blue Colour Kids Frock', 'Turquoise blue color kids frock.jpg', 900, 3),
(8, 'Casual Denim Sort Kurta', 'Casual Denim Sort Kurta.jpg', 2500, 1),
(9, 'Navy Blue Patola Nehru Jacket', 'navy blue patola nehru jacket.jpg', 2000, 1),
(10, 'Grey Nehru Jacket', 'Grey Nehru Jacket.jpg', 3000, 1),
(11, 'Rust Nehru Jacket', 'Rust Nehru Jacket.jpg', 3100, 1),
(12, 'Striped Kurta With Golden Zari Work', 'Striped Kurta With Golden Zari Work.jpg', 2700, 1),
(13, 'Baby Pink Kurta Set With Jacket', 'Baby Pink Kurta Set With Jacket.jpg', 5500, 1),
(14, 'Baleshwar Men Blue Solid Slim Fit Casual Shirt', 'Baleshwar Men Blue Solid Slim Fit Casual Shirt.jpg', 900, 1),
(15, 'Lambency Men\'s Grey Hooded Sweatshirt', 'Lambency Men\'s Grey Hooded Sweatshirt.jpg', 800, 1),
(16, 'Masterly Men\'s Regular Fit Sky Blue Jeans', 'Masterly Men\'s Regular Fit Sky Blue Jeans.jpg', 1000, 1),
(17, 'Navy blue straight fit kurti', 'Navy blue straight fit kurti.jpg', 1000, 2),
(18, 'Off White A-Line Kurti', 'Off White A-Line Kurti.jpg', 900, 2),
(19, 'Women\'s White Round Neck Short Sleeve Cotton Solid Polka Dot Patch Pocket T-Shirt', 'Women\'s White Round Neck Short Sleeve Cotton Solid Polka Dot Patch Pocket T-Shirt.jpg', 500, 2),
(20, 'FeelBlue Women\'s Jeggings(Black)', 'FeelBlue Women\'s Jeggings(Black).jpg', 800, 2),
(21, 'Raabta Women White Cold Shoulder Plain Top With Black Knots', 'Raabta Women White Cold Shoulder Plain Top With Black Knots.jpg', 1100, 2),
(22, 'kids dangri casual wear', 'kids dangri casual wear.jpg', 1000, 3),
(23, 'Peach Color Designer Kids Frock', 'Peach Color Designer Kids Frock.jpg', 2000, 3),
(24, 'Maroon Color Designer Kids Frock', 'Maroon Color Designer Kids Frock.jpg', 1500, 3),
(25, 'Peach And Green Color Organza Kids Lehenga With Dupatta', 'Peach And Green Color Organza Kids Lehenga With Dupatta.jpg', 2500, 3),
(26, 'Peach And Green Color Organza Kids Lehenga With Dupatta', 'Peach And Green Color Organza Kids Lehenga With Dupatta.jpg', 1050, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'user', '1234567890', 'barshameher976@gmail.com', 'pass'),
(2, 'user_name', 'user_phone', 'user@mail.com', 'user_password'),
(3, 'Barsha Meher', '10101020', 'abc@gmail.com', 'abcde'),
(4, 'user', 'phone', 'email@mail.com', 'pass'),
(5, 'bbccdd', '202030', 'bbb@gmail.com', 'barsha'),
(6, 'xyz', '012345', 'zxy@gmailcom', 'barshameher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
