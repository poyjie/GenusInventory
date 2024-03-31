-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 04:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genus_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branchname` varchar(255) DEFAULT '',
  `transnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branchname`, `transnum`) VALUES
(1, 'b1', 10001),
(2, 'b2', 10001),
(3, 'b3', 10001);

-- --------------------------------------------------------

--
-- Table structure for table `branchcounter`
--

CREATE TABLE `branchcounter` (
  `id` int(11) NOT NULL,
  `branchname` varchar(255) NOT NULL,
  `cashiernum` varchar(255) NOT NULL,
  `transnum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branchcounter`
--

INSERT INTO `branchcounter` (`id`, `branchname`, `cashiernum`, `transnum`) VALUES
(1, 'b1', 'c1', '10003'),
(2, 'web', 'web', '20007');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brandname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandname`) VALUES
(1, 'SHINE '),
(2, 'TPA'),
(3, 'I-COOK'),
(4, 'GERMANI'),
(5, 'STARFLAME'),
(6, 'PRYCEGAS'),
(7, 'REGASCO'),
(8, 'GENERIC'),
(9, 'MICROMATIC'),
(10, 'NO BRAND');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productid`, `userid`, `qty`, `updated_at`, `created_at`) VALUES
(1, 0, 8, 1, '2023-12-20 13:36:42', '2023-12-20 13:36:42'),
(2, 0, 8, 1, '2023-12-20 13:39:58', '2023-12-20 13:39:58'),
(3, 2, 8, 1, '2023-12-20 13:40:11', '2023-12-20 13:40:11'),
(4, 2, 8, 1, '2024-01-05 15:04:52', '2024-01-05 15:04:52'),
(5, 13, 8, 1, '2024-01-05 15:05:06', '2024-01-05 15:05:06'),
(6, 13, 8, 1, '2024-01-05 15:05:16', '2024-01-05 15:05:16'),
(7, 14, 8, 10, '2024-01-05 15:05:44', '2024-01-05 15:05:44'),
(8, 0, 8, 100, '2024-01-07 09:22:26', '2024-01-07 09:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'CYLINDER'),
(2, 'BURNER'),
(3, 'REGULATOR'),
(4, 'HOSE'),
(5, 'PARTS');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `bday` varchar(255) DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companyaddress` varchar(255) DEFAULT NULL,
  `cpnumber` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `emailadd` varchar(255) DEFAULT NULL,
  `profilepic` varchar(255) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `mname`, `lname`, `bday`, `companyname`, `companyaddress`, `cpnumber`, `password`, `emailadd`, `profilepic`, `roleid`, `updated_at`, `created_at`) VALUES
(11, 'jedd', 'turla', 'mercado', '1992-04-21', 'q', 'b', '09668250209', 'default', 'j@y.c', 'NA', 1, '2023-10-25 07:25:43', '2023-10-25 07:25:43'),
(12, 'as', 'asd', 'asd', '2023-10-25', 'aas', 'as', '0123', 'default', 'y@com', 'NA', 1, '2023-10-25 07:37:53', '2023-10-25 07:37:53'),
(13, 'tes1', 'tes1', 'tes1', '2023-10-26', 'tes1', 'tes1', '0966', 'default', 'a@y.com', 'NA', 1, '2023-10-25 08:02:35', '2023-10-25 08:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `stockin` varchar(255) DEFAULT '',
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `branchid`, `productid`, `stockin`, `updated_at`, `created_at`) VALUES
(6, 1, 13, '500', '2023-10-26 14:42:54', '2023-10-26 14:42:54'),
(8, 1, 16, '2000', '2023-11-07 00:08:53', '2023-10-26 14:48:02'),
(11, 1, 14, '60', '2024-01-30 21:40:19', '2023-10-26 14:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `supplierid` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `proddesc` varchar(255) DEFAULT NULL,
  `baseprice` varchar(255) DEFAULT '',
  `sellprice` varchar(255) DEFAULT '',
  `min_stock` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplierid`, `brandid`, `categoryid`, `sku`, `name`, `proddesc`, `baseprice`, `sellprice`, `min_stock`, `image`, `updated_at`, `created_at`) VALUES
(0, 1, 2, 1, '2', 'Sample Product', 'PRODUCT SAMPLE DECRIPTOIN', '212', '21', '212', '21', '2', '2'),
(2, 1, 2, 3, '121', 'Lorem ipsum12', 'PRODUCT LOREM DECRIPTOIN', '2', '12', '2213', 'g', 'yu', 'fyt'),
(13, 1, 1, 2, '0010010020013', 'PRODUCT A', 'PRODUCT PRODUCT A DECRIPTOIN', '12', '50', '3', 'NA', '2023-10-26 09:20:24', '2023-10-26 09:20:24'),
(14, 1, 2, 2, '0010020020014', 'PRODUCT B', 'PRODUCT PRODUCT BDECRIPTOIN', '50', '100', '5', 'NA', '2023-10-26 14:44:10', '2023-10-26 14:44:10'),
(15, 5, 3, 4, '0050030040015', 'PRODUCT C', 'PRODUCT PRODUCT C DECRIPTOIN', '600', '700', '5', 'NA', '2023-10-26 14:45:20', '2023-10-26 14:45:20'),
(16, 4, 3, 4, '0040030040016', 'PRODUCT D', 'PRODUCT PRODUCT D DECRIPTOIN', '300', '400', '0', 'NA', '2023-10-26 14:47:28', '2023-10-26 14:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rolename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`) VALUES
(1, 'customer'),
(2, 'admin'),
(3, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `cashiernum` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `transactionnum` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL,
  `amount` float(50,2) NOT NULL,
  `totalamount` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `branch`, `cashiernum`, `user`, `transactionnum`, `sku`, `qty`, `amount`, `totalamount`, `updated_at`, `created_at`) VALUES
(72, 'b1', 'c1', 'cuser1', '10002', '0040030040016', 400, 60.00, '28000', '2024-01-30 13:40:58', '2024-01-30 13:40:58'),
(73, 'b1', 'c1', 'cuser1', '10002', '0010020020014', 100, 40.00, '28000', '2024-01-30 13:40:58', '2024-01-30 13:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `suppliername` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `suppliername`) VALUES
(1, 'PEIDEWORTH MARKETING'),
(2, 'PEIDEWORTH MARKETING'),
(3, 'ML CDO TRADING'),
(4, 'MICROMATIC'),
(5, 'JOSEPH ANG’S LPG PARTS');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_cash`
--

CREATE TABLE `transaction_cash` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `cashiernum` varchar(255) NOT NULL,
  `transactionnum` varchar(255) NOT NULL,
  `totalamount` varchar(255) NOT NULL,
  `totalcash` varchar(255) NOT NULL,
  `totalchange` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cpnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `roleid` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cpnumber`, `email`, `password`, `roleid`, `updated_at`, `created_at`) VALUES
(7, '0123', 'admin@y.com', '$2y$10$iKpk80CwNdIkyhYisxHdzOGFKNP8Skjpwlx5J3gBGWnxfn3e.mUQu', 2, '2023-10-25 15:42:56', '2023-10-25 07:37:53'),
(8, '0966', 'a@y.com', '$2y$10$c6BiExWDLDGfLK57AV3w6OLn/7a4EKXvgVdpmJQ3MospSdTzSOe4C', 1, '2023-10-25 16:04:47', '2023-10-25 08:02:35');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mycart`
-- (See below for the actual view)
--
CREATE TABLE `v_mycart` (
`sku` varchar(255)
,`userid` int(11)
,`name` varchar(255)
,`qty` decimal(32,0)
,`sellprice` varchar(255)
,`total` varchar(417)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_products`
-- (See below for the actual view)
--
CREATE TABLE `v_products` (
`id` int(11)
,`supplierid` int(11)
,`brandid` int(11)
,`categoryid` int(11)
,`sku` varchar(255)
,`name` varchar(255)
,`proddesc` varchar(255)
,`baseprice` varchar(255)
,`sellprice` varchar(255)
,`min_stock` varchar(255)
,`image` varchar(255)
,`updated_at` varchar(255)
,`created_at` varchar(255)
,`suppliername` varchar(255)
,`brandname` varchar(255)
,`categoryname` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockall`
-- (See below for the actual view)
--
CREATE TABLE `v_stockall` (
`id` int(11)
,`supplierid` int(11)
,`brandid` int(11)
,`categoryid` int(11)
,`sku` varchar(255)
,`name` varchar(255)
,`proddesc` varchar(255)
,`baseprice` varchar(255)
,`sellprice` varchar(255)
,`min_stock` varchar(255)
,`image` varchar(255)
,`updated_at` varchar(255)
,`created_at` varchar(255)
,`suppliername` varchar(255)
,`brandname` varchar(255)
,`categoryname` varchar(255)
,`totalstockin` varchar(23)
,`branchname` varchar(255)
,`totalsales` decimal(41,0)
,`runningstock` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockrecords`
-- (See below for the actual view)
--
CREATE TABLE `v_stockrecords` (
`id` int(11)
,`supplierid` int(11)
,`brandid` int(11)
,`categoryid` int(11)
,`sku` varchar(255)
,`name` varchar(255)
,`proddesc` varchar(255)
,`baseprice` varchar(255)
,`sellprice` varchar(255)
,`min_stock` varchar(255)
,`image` varchar(255)
,`updated_at` varchar(255)
,`created_at` varchar(255)
,`suppliername` varchar(255)
,`brandname` varchar(255)
,`categoryname` varchar(255)
,`totalstockin` varchar(255)
,`branchname` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stock_v1`
-- (See below for the actual view)
--
CREATE TABLE `v_stock_v1` (
`id` int(11)
,`supplierid` int(11)
,`brandid` int(11)
,`categoryid` int(11)
,`sku` varchar(255)
,`name` varchar(255)
,`proddesc` varchar(255)
,`baseprice` varchar(255)
,`sellprice` varchar(255)
,`stock` double
,`categoryname` varchar(255)
,`branchname` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaction_cash`
-- (See below for the actual view)
--
CREATE TABLE `v_transaction_cash` (
`id` int(11)
,`branch` varchar(255)
,`cashiernum` varchar(200)
,`user` varchar(200)
,`transactionnum` varchar(255)
,`sku` varchar(255)
,`qty` int(20)
,`amount` float(50,2)
,`totalamount` varchar(255)
,`updated_at` varchar(255)
,`created_at` varchar(255)
,`finaltotalamount` varchar(255)
,`totalcash` varchar(255)
,`totalchange` varchar(255)
,`transdate` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_mycart`
--
DROP TABLE IF EXISTS `v_mycart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mycart`  AS SELECT `b`.`sku` AS `sku`, `a`.`userid` AS `userid`, `b`.`name` AS `name`, sum(`a`.`qty`) AS `qty`, `b`.`sellprice` AS `sellprice`, format(sum(`a`.`qty`) * `b`.`sellprice`,2) AS `total` FROM (`cart` `a` join `products` `b` on(`a`.`productid` = `b`.`id`)) GROUP BY `b`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_products`
--
DROP TABLE IF EXISTS `v_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_products`  AS SELECT `a`.`id` AS `id`, `a`.`supplierid` AS `supplierid`, `a`.`brandid` AS `brandid`, `a`.`categoryid` AS `categoryid`, `a`.`sku` AS `sku`, `a`.`name` AS `name`, `a`.`proddesc` AS `proddesc`, `a`.`baseprice` AS `baseprice`, `a`.`sellprice` AS `sellprice`, `a`.`min_stock` AS `min_stock`, `a`.`image` AS `image`, `a`.`updated_at` AS `updated_at`, `a`.`created_at` AS `created_at`, `b`.`suppliername` AS `suppliername`, `c`.`brandname` AS `brandname`, `d`.`categoryname` AS `categoryname` FROM (((`products` `a` left join `suppliers` `b` on(`a`.`supplierid` = `b`.`id`)) left join `brand` `c` on(`a`.`brandid` = `c`.`id`)) left join `category` `d` on(`a`.`categoryid` = `d`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockall`
--
DROP TABLE IF EXISTS `v_stockall`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockall`  AS SELECT `a`.`id` AS `id`, `a`.`supplierid` AS `supplierid`, `a`.`brandid` AS `brandid`, `a`.`categoryid` AS `categoryid`, `a`.`sku` AS `sku`, `a`.`name` AS `name`, `a`.`proddesc` AS `proddesc`, `a`.`baseprice` AS `baseprice`, `a`.`sellprice` AS `sellprice`, `a`.`min_stock` AS `min_stock`, `a`.`image` AS `image`, `a`.`updated_at` AS `updated_at`, `a`.`created_at` AS `created_at`, `d`.`suppliername` AS `suppliername`, `e`.`brandname` AS `brandname`, `f`.`categoryname` AS `categoryname`, ifnull(`b`.`totalstockin`,'0') AS `totalstockin`, ifnull(`c`.`branchname`,'NA') AS `branchname`, `bb`.`totalsales` AS `totalsales`, ifnull(`b`.`totalstockin`,'0') - `bb`.`totalsales` AS `runningstock` FROM ((((((`products` `a` left join (select sum(`inventory`.`stockin`) AS `totalstockin`,`inventory`.`productid` AS `productid`,`inventory`.`branchid` AS `branchid` from `inventory` group by `inventory`.`branchid`,`inventory`.`productid`) `b` on(`b`.`productid` = `a`.`id`)) left join `branch` `c` on(`b`.`branchid` = `c`.`id`)) left join `suppliers` `d` on(`a`.`supplierid` = `d`.`id`)) left join `brand` `e` on(`a`.`brandid` = `e`.`id`)) left join `category` `f` on(`a`.`categoryid` = `f`.`id`)) left join (select `sales`.`sku` AS `sku`,`sales`.`branch` AS `branch`,sum(`sales`.`qty`) AS `totalsales` from `sales` group by `sales`.`branch`,`sales`.`sku`) `bb` on(`c`.`branchname` = `bb`.`branch` and `a`.`sku` = `bb`.`sku`)) GROUP BY `a`.`sku`, `bb`.`branch` ORDER BY ifnull(`c`.`branchname`,'NA') ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockrecords`
--
DROP TABLE IF EXISTS `v_stockrecords`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockrecords`  AS SELECT `a`.`id` AS `id`, `a`.`supplierid` AS `supplierid`, `a`.`brandid` AS `brandid`, `a`.`categoryid` AS `categoryid`, `a`.`sku` AS `sku`, `a`.`name` AS `name`, `a`.`proddesc` AS `proddesc`, `a`.`baseprice` AS `baseprice`, `a`.`sellprice` AS `sellprice`, `a`.`min_stock` AS `min_stock`, `a`.`image` AS `image`, `a`.`updated_at` AS `updated_at`, `a`.`created_at` AS `created_at`, `d`.`suppliername` AS `suppliername`, `e`.`brandname` AS `brandname`, `f`.`categoryname` AS `categoryname`, ifnull(`b`.`stockin`,'0') AS `totalstockin`, ifnull(`c`.`branchname`,'NA') AS `branchname` FROM ((((((select `inventory`.`stockin` AS `stockin`,`inventory`.`productid` AS `productid`,`inventory`.`branchid` AS `branchid` from `inventory`) `b` left join `products` `a` on(`b`.`productid` = `a`.`id`)) left join `branch` `c` on(`b`.`branchid` = `c`.`id`)) left join `suppliers` `d` on(`a`.`supplierid` = `d`.`id`)) left join `brand` `e` on(`a`.`brandid` = `e`.`id`)) left join `category` `f` on(`a`.`categoryid` = `f`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stock_v1`
--
DROP TABLE IF EXISTS `v_stock_v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stock_v1`  AS SELECT `a`.`id` AS `id`, `a`.`supplierid` AS `supplierid`, `a`.`brandid` AS `brandid`, `a`.`categoryid` AS `categoryid`, `a`.`sku` AS `sku`, `a`.`name` AS `name`, `a`.`proddesc` AS `proddesc`, `a`.`baseprice` AS `baseprice`, `a`.`sellprice` AS `sellprice`, sum(`b`.`stockin`) AS `stock`, `d`.`categoryname` AS `categoryname`, `c`.`branchname` AS `branchname` FROM (((`products` `a` join `inventory` `b` on(`a`.`id` = `b`.`productid`)) join `branch` `c` on(`b`.`branchid` = `c`.`id`)) join `category` `d` on(`a`.`categoryid` = `d`.`id`)) GROUP BY `a`.`sku` ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaction_cash`
--
DROP TABLE IF EXISTS `v_transaction_cash`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaction_cash`  AS SELECT `a`.`id` AS `id`, `a`.`branch` AS `branch`, `a`.`cashiernum` AS `cashiernum`, `a`.`user` AS `user`, `a`.`transactionnum` AS `transactionnum`, `a`.`sku` AS `sku`, `a`.`qty` AS `qty`, `a`.`amount` AS `amount`, `a`.`totalamount` AS `totalamount`, `a`.`updated_at` AS `updated_at`, `a`.`created_at` AS `created_at`, `b`.`totalamount` AS `finaltotalamount`, `b`.`totalcash` AS `totalcash`, `b`.`totalchange` AS `totalchange`, `b`.`created_at` AS `transdate` FROM (`sales` `a` join `transaction_cash` `b` on(`a`.`transactionnum` = `b`.`transactionnum` and `a`.`branch` = `b`.`branch` and `a`.`cashiernum` = `b`.`cashiernum`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchcounter`
--
ALTER TABLE `branchcounter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `branchid` (`branchid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplierid` (`supplierid`),
  ADD KEY `brandid` (`brandid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_cash`
--
ALTER TABLE `transaction_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branchcounter`
--
ALTER TABLE `branchcounter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `transaction_cash`
--
ALTER TABLE `transaction_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
