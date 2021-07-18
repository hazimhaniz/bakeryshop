-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 10:29 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'kaiwen', 'kaiwen96'),
(2, 'kaiwen', 'kaiwen96'),
(3, 'kahhan', '123123'),
(4, 'qw', '123123'),
(5, 'wqwqwq2121', '212121'),
(6, '4321321321', '123123'),
(7, 'q', '121212'),
(8, '12', '121212'),
(9, '10', '121212'),
(10, 'kai', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `no` int(11) NOT NULL,
  `cardholder` varchar(255) NOT NULL,
  `credit_no` varchar(255) NOT NULL,
  `exp_year` varchar(255) NOT NULL,
  `exp_month` varchar(255) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`no`, `cardholder`, `credit_no`, `exp_year`, `exp_month`, `security_code`, `type`, `bank`) VALUES
(1, '', '1234', '10', '19', '555', 'master', ''),
(2, '', '51960320', '10', '19', '555', 'master', ''),
(3, 'TAM KAI WEN', '5196032911112222', '20', '06', '555', 'master', 'cimb'),
(4, 'asfas', '1225133333', '17', 'Month', '223', 'master', 'cimb'),
(5, '', '', '17', 'Month', '', 'master', 'cimb'),
(6, 'asfas', '1111111', '17', 'Month', '123', 'master', 'cimb'),
(7, '11333', '2626226', '17', 'Month', '123', 'master', 'cimb');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_username` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_hp` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_username`, `c_password`, `c_email`, `c_hp`, `c_address`, `birthday`, `date_registered`) VALUES
(1, 'Elvis', 'kaikai', '1', '123@hotmail.com', '0107195522', 'home', '2019-02-14', '2018-12-03 11:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `f_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_name`, `f_email`, `f_content`) VALUES
(1, 'Kelvin', 'kelvin-wen@hotmail.com', 'Good service ^_^'),
(2, 'KAH HAN ', 'KAHHAN604@OUTLOOK.COM', '2121212121EDWFSCWFCWDS'),
(3, 'Gan Chun Kai', '123@hotmail.com', '1122333\r\n'),
(4, 'ffdsfdf', 'sdfsdfsd', 'dsfsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `shipping` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`, `shipping`) VALUES
(15, 1, 178.00, '2019-02-10 19:56:52', '2019-02-10 19:56:52', '1', 'Delivered'),
(16, 1, 206.00, '2019-02-10 21:26:44', '2019-02-10 21:26:44', '1', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(23, 15, 1, 1),
(24, 15, 8, 1),
(25, 16, 3, 1),
(26, 16, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_ingredient` varchar(255) NOT NULL,
  `product_size` float NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_pic` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_ingredient`, `product_size`, `product_price`, `product_desc`, `product_pic`, `available`) VALUES
(1, 'New York Cheese Cake', 'Sponge Cake Crust\r\n,cream cheese,\r\nsugar,cornstarch\r\n pure vanilla, heavy whipping cream\r\n', 2, 88, 'Baked soft creamy cheese with chocolate cookie base', '1488278.jpg', 'available'),
(3, 'Absolute Chocolate', 'sugar,cocoa powder,baking powder,baking soda,salt,whole milk,butter,egg,vanilla,almond,dark chocolate, mini chocolets.\r\n', 1, 30, 'These ultimate Swiss origin couvertures chocolate fantasy presents you the most intensive and finest cocoa aroma, exquisitely developed from the soul of Maracaibo cocoa enhanced with exclusive noble-grade cocoa beans. Savor delightful texture of soft prem', '8249687.jpg', 'available'),
(4, 'Fruitilicious', 'vanilla pudding,\r\nsugar, \r\nsalt,\r\negg whites ,\r\n cream of tartar,\r\npeach jam,\r\ncoconut,\r\n mango, papaya, kiwi, strawberries, banana\r\n', 2, 70, 'Indulge in this refreshingly fruity creation, generous with assortments of premium fruits mix in a selection of kiwis, strawberries, sweet grapes, mangoes, dragon fruits and peaches, glazed and set perfectly for a bountiful presentation. Enjoy a juicy cru', '9214251.jpg', 'available'),
(5, 'Turkish Indulgence', '1 1/2 cups sugar, divided 1 cup cake flour, sifted 1/8 teaspoon salt 12 large egg whites (or 2 1/2 cups store-bought egg whites) 1/2 chocolate and light cream 1 1/2 cups heavy cream 3cup of rose flavoured Turkish candy, soft marshmallows, crunchy pistachi', 2, 40, 'Medley of chocolate and light cream topped with pistachio crumbles, embedded with aromatic rose flavoured Turkish candy, soft marshmallows, crunchy pistachios and a coating of dark couverture chocolate.', '6706262.jpg', 'unavailable'),
(6, 'CHOCOLATE BRULEE', '3 ounces unsweetened chocolate, chopped 2 1/4 cups all purpose flour 2 teaspoons baking powder 1/2 teaspoon baking soda 1/2 teaspoon salt 14 tablespoons (1 3/4 sticks) salted butter, room temperature 1 1/4 cups plus 3 tablespoons sugar', 2, 60, 'A delightful chocolate-centric vanilla crÃ¨me brulee treat set in three distinctive layers of mud cake, brulee and couverture chocolate mousse topped with a thin chocolate glaze. Enjoy this silky smooth creamy brulee with bittersweet notes on crisped croq', '1856588.jpg', 'unavailable'),
(7, 'Durian Cheese', '3 cups all purpose flour 1 3/4 teaspoons ground cinnamon 1 1/2 teaspoons baking powder 1/2 teaspoon salt 1/2 teaspoon ground allspice 1/4 teaspoon baking soda 1 cup (2 sticks) unsalted butter, room temperature 1 1/4 cups sugar 3/4 cup (packed) golden brow', 1, 88, 'Frozen cream cheese mixed with tantalizing durians. Who can possibly resist?', '8776673.jpg', 'available'),
(8, 'BLACK FOREST CHEESE', '3 tablespoons unsalted butter, melted and cooled, plus more for buttering cake pan 1/2 cup (2 1/2 ounces) unbleached all-purpose flour plus more for dusting cake pan 1/4 cup Dutch-process cocoa Pinch of salt 6 large eggs, at room temperature 3/4 cup (4 3/', 2, 90, 'A refreshing twist to the traditional black forest cake. Light cheese layered with crunchy dark chocolate and dark sweet cherry filling in the middle', '2141289.jpg', 'available'),
(9, 'RASPBERRY CHEESE', '2 cups cake flour 1 teaspoon baking powder 1/2 teaspoon baking soda 1/4 teaspoon kosher salt 3/4 cup (1 1/2 sticks) unsalted butter, room temperature 1 3/4 cups granulated sugar, divided 4 large eggs, separated 1 teaspoon vanilla extract 1 cup buttermilk ', 2, 20, 'Delightful blend of fresh raspberries and cheese.', '6486558.jpg', 'available'),
(10, 'WHITE CHOCOLATE MACADAMIA', '8 ounces imported white chocolate, chopped 2 1/4 cups all purpose flour 2 1/4 teaspoons baking powder 1/4 teaspoon salt 10 tablespoons unsalted butter, room temperature 1 1/3 cups sugar 4 large eggs 1 1/2 teaspoons vanilla extract 1 1/4 cups whole milk 1 ', 2, 30, 'An incredible combination of fresh roasted macadamia nuts and creamy vanilla filling coated with white chocolate.', '568570.jpg', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `credit_card`
--
ALTER TABLE `credit_card`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
