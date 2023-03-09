-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2023 at 04:44 PM
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
-- Database: `CaffeineEmporium`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE `Accounts` (
  `acc_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `pass_word` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`acc_id`, `name`, `surname`, `mail`, `pass_word`) VALUES
(2, 'Mert', 'Ziya', 'mertziya@gmail.com', 'password'),
(3, 'Walter', 'White', 'WalterWhite@gmail.com', 'password'),
(4, 'Jesse', 'Pinkman', 'jessepinkman@gmail.com', 'password'),
(5, 'Hank', 'Schrader', 'hankschrader@gmail.com', 'password'),
(7, 'Gustavo', 'Fring', 'gustavo@hermannos.com', 'password'),
(8, 'Saul', 'Goodman', 'saulBCS@gmail.com', 'password'),
(9, 'trial', 'trial', 'trial@trial.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `AccountToCart`
--

CREATE TABLE `AccountToCart` (
  `acc_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AccountToCart`
--

INSERT INTO `AccountToCart` (`acc_id`, `cart_id`, `status`) VALUES
(2, 6, 'ORDERED'),
(2, 7, 'NOT ORDERED'),
(3, 11, 'ORDERED'),
(3, 13, 'ORDERED'),
(3, 14, 'ORDERED');

-- --------------------------------------------------------

--
-- Table structure for table `allProducts`
--

CREATE TABLE `allProducts` (
  `product_id` int(11) NOT NULL,
  `eq_id` int(11) DEFAULT NULL,
  `coffee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allProducts`
--

INSERT INTO `allProducts` (`product_id`, `eq_id`, `coffee_id`) VALUES
(18, NULL, 12),
(19, NULL, 13),
(20, NULL, 14),
(21, NULL, 15),
(22, NULL, 16),
(23, 6, NULL),
(24, 7, NULL),
(25, 8, NULL),
(26, 9, NULL),
(27, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Carts`
--

CREATE TABLE `Carts` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'NOT ORDERED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Carts`
--

INSERT INTO `Carts` (`cart_id`, `product_id`, `amount`, `status`) VALUES
(6, 19, 1, 'ORDERED'),
(6, 21, 3, 'ORDERED'),
(7, 20, 1, 'NOT ORDERED'),
(7, 21, 1, 'NOT ORDERED'),
(11, 19, 1, 'ORDERED'),
(11, 22, 1, 'ORDERED'),
(13, 20, 1, 'ORDERED'),
(13, 21, 2, 'ORDERED'),
(13, 22, 1, 'ORDERED'),
(14, 21, 1, 'ORDERED'),
(14, 23, 2, 'ORDERED'),
(14, 25, 1, 'ORDERED'),
(14, 26, 1, 'ORDERED'),
(14, 27, 1, 'ORDERED');

-- --------------------------------------------------------

--
-- Table structure for table `Coffees`
--

CREATE TABLE `Coffees` (
  `coffee_id` int(11) NOT NULL,
  `coffee_name` varchar(70) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `taste` varchar(100) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Coffees`
--

INSERT INTO `Coffees` (`coffee_id`, `coffee_name`, `brand`, `weight`, `taste`, `origin`, `description`, `price`, `image`) VALUES
(12, 'PAPUA NEW GUINEA SIGRI MEDIUM SINGLE ORIGIN ROAST COFFEE', 'Coffe Bean & Tea Leaf\n', 450, 'Rich and Spicy', 'Wahgi Valley in the Western Highland province of Papua New Guinea', 'Papua New Guinea Sigri Medium Roast Single Origin coffee is quickly becoming one of our customers\' favorites. The finest coffee in New Guinea comes from the Sigri estate, in the Waghi Valley of Papua New Guinea, where climate, soil and elevation combine to create ideal growing conditions. A coffee prized by connoisseurs, our Papua New Guinea Sigri is naturally sweet, with a fruity aroma, a spicy body, and clean flavor. Directly sourced. Expertly roasted in small batches for optimal taste and quality. This coffee has a medium roast level and comes in 1lb bag of whole beans.', 17.95, 'images/coffee_id_12.jpeg'),
(13, 'Dark Roast Coffee', 'Coffee Bros', 340, 'Bold and Flavourful', 'Minas Gerais, Brazil & Kayu Aro, Indonesia', 'This dark roast is made from 100% Arabica coffee beans and tastes like the traditional dark roast coffee flavor that you would expect. We’ve 	perfected this blend by roasting lighter to avoid the charred, bitter taste and to enhance the natural flavor notes. We specifically chose this 	blend and this roasting technique because the taste notes that were achieved this way were phenomenal.', 15.99, 'images/coffee_id_13.jpeg'),
(14, 'BLUEBOON', 'Sightglass', 2260, 'Balanced and Fruity', 'San Francisco, CA', 'The goldilocks of coffees, this cup is just right. It’s versatile and approachable, for new and seasoned drinkers alike.', 85, 'images/coffee_id_14.jpeg'),
(15, 'Pure', 'Cafenated', 220, 'Yellow apple, cantaloupe, caramel, cocoa powder', 'Columbia', 'Balanced and smooth, Pure is a full-body, single-origin coffee that will satisfy your taste buds without compromise.  When you just feel like a really good cup of coffee go for Pure.', 12, 'images/coffee_id_15.jpeg'),
(16, 'Insomniac Extra caffeinated coffe', 'Player One Coffee lab', 340, 'Clementine, Caramel, Citrus', 'Cauca / Tolima / Huila', 'An ultimate perk for that extra pep you need in your step, the Insomniac Extra Caffeinated Coffee represents an all-natural solution when you feel like your battery is close to draining. When brewed, this lightly roasted Colombian coffee maintains a delicate balance, featuring a mellow body, perfect acidity levels, while capping it off with a citrusy, nutty flavor which leaves you with a clean and sweet aftertaste.', 18, 'images/coffee_id_16.jpeg');

--
-- Triggers `Coffees`
--
DELIMITER $$
CREATE TRIGGER `update_allProducts` AFTER INSERT ON `Coffees` FOR EACH ROW BEGIN
    INSERT INTO allProducts (coffee_id) VALUES (NEW.coffee_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Equipments`
--

CREATE TABLE `Equipments` (
  `eq_id` int(11) NOT NULL,
  `eq_name` varchar(60) DEFAULT NULL,
  `eq_type` varchar(20) DEFAULT NULL,
  `Brand` varchar(60) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Equipments`
--

INSERT INTO `Equipments` (`eq_id`, `eq_name`, `eq_type`, `Brand`, `Description`, `Price`, `image`) VALUES
(6, 'Coffee Maker Filter to Make Crio Bru (Basket-Style)', 'Coffe Filter', 'CRIO BRU BREWED CACAO', 'Cacao brews slower than coffee and it can cause the water to overflow in your coffee maker when using a paper filter. A permanent gold tone filter is recommended because it is more porous and allows for slower brewing.\r\n    This filter works on ALL 8-12 cup coffee pots that use standard size paper filter\r\n    Eliminates paper filters\r\n    Easy to Clean', 10.95, 'images/eq_id_6.jpeg'),
(7, 'Coffee Machine with Glass Coffee Pot Filter and Timer', NULL, 'Trotronics', 'Brew up to 12 Cups: Coffee maker provides up to 12 cups at a time, so you can brew and share delicious hot coffee with family and friends anytime\r\n    \r\n    Customizable Brewing Strength: 1-4 cup function drips coffee more slowly to increase concentration; you can choose between regular and bold coffee to suit your taste\r\n    \r\n    24-Hour Programmable Brewing: Before you go to bed, set the coffee maker to brew at a specific time to wake up and enjoy a cup of fresh hot coffee the next morning\r\n    \r\n    Anti-Drip System: Temporarily stops the flow of coffee when you take out the carafe to pour and serve coffee, without making a mess, before brewing is completed\r\n    \r\n    Smart Touch Control: Intuitive touch control panel gives you full control of the coffee machine, and easy-read LCD screen clearly displays the clock and brewing settings\r\n    \r\n    Keep Warm Function: Hot plate with 3 temperature settings keeps freshly brewed coffee at around 167°F, 172°F or 178°F for 4hrs.', 60, 'images/eq_id_7.jpeg'),
(8, '12V Coffee Maker', NULL, 'INERGY', 'Brew 20 oz. of coffee using this 12V coffee maker. It features a reusable filter and quick brew cycle as well as a stop-drip interrupt feature when the carafe is removed. It has a 7\' fused 12-volt power cord and can be permanently mounted using the bracket that is included. It also includes a coffee scoop. Dishwasher safe glass carafe.', 35, 'images/eq_id_8.jpeg'),
(9, '19 Bar Espresso Machine with Milk Frother', NULL, 'INERGY', 'With its modern retro design, the Lafeeca Espresso Machine will look good with any kitchen style and is perfect for crafting lattes, cappuccinos, flat whites, and any other espresso drink you crave.', 169, 'images/eq_id_9.jpeg'),
(10, 'LAVAZZA EP MINI, COFFEE MACHINE FOR ESPRESSO POINT CAPSULES', NULL, 'JAVAZZA', 'The compact design of EP Mini, the smallest and quietest completely Italian Lavazza coffee machine. With Lavazza EP Mini, a totally Italian design has been chosen, with a removable cup rest. Power: 1200v Voltage: 220-240V AC Frequency: 50-60Hz Tanks: 750', 123.81, 'images/eq_id_10.jpeg');

--
-- Triggers `Equipments`
--
DELIMITER $$
CREATE TRIGGER `update_allProducts2` AFTER INSERT ON `Equipments` FOR EACH ROW BEGIN
    INSERT INTO allProducts (eq_id) VALUES (NEW.eq_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `total_cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `order_date`, `cart_id`, `total_cost`) VALUES
(2, '2023-03-08 11:53:30', 6, NULL),
(6, NULL, 11, 33.99),
(7, '2023-03-09 13:58:33', 13, 127),
(8, '2023-03-09 14:02:17', 14, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `AccountToCart`
--
ALTER TABLE `AccountToCart`
  ADD KEY `F1` (`acc_id`),
  ADD KEY `F2` (`cart_id`);

--
-- Indexes for table `allProducts`
--
ALTER TABLE `allProducts`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `coffee_id` (`coffee_id`),
  ADD UNIQUE KEY `eq_id` (`eq_id`) USING BTREE;

--
-- Indexes for table `Carts`
--
ALTER TABLE `Carts`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Coffees`
--
ALTER TABLE `Coffees`
  ADD PRIMARY KEY (`coffee_id`);

--
-- Indexes for table `Equipments`
--
ALTER TABLE `Equipments`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_idF` (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Accounts`
--
ALTER TABLE `Accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `allProducts`
--
ALTER TABLE `allProducts`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Carts`
--
ALTER TABLE `Carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Coffees`
--
ALTER TABLE `Coffees`
  MODIFY `coffee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Equipments`
--
ALTER TABLE `Equipments`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AccountToCart`
--
ALTER TABLE `AccountToCart`
  ADD CONSTRAINT `F1` FOREIGN KEY (`acc_id`) REFERENCES `Accounts` (`acc_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `F2` FOREIGN KEY (`cart_id`) REFERENCES `Carts` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accounttocart_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `Accounts` (`acc_id`) ON DELETE CASCADE;

--
-- Constraints for table `allProducts`
--
ALTER TABLE `allProducts`
  ADD CONSTRAINT `allproducts_ibfk_1` FOREIGN KEY (`eq_id`) REFERENCES `Equipments` (`eq_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `allproducts_ibfk_2` FOREIGN KEY (`coffee_id`) REFERENCES `coffees` (`coffee_id`) ON DELETE CASCADE;

--
-- Constraints for table `Carts`
--
ALTER TABLE `Carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `allProducts` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `cart_idF` FOREIGN KEY (`cart_id`) REFERENCES `Carts` (`cart_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
