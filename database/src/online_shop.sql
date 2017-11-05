-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 10:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminPass`, `adminEmail`, `level`) VALUES
(1, 'Niloy Barman', 'Niloy', '123', 'admin@gmail.com', 1),
(2, 'Uttam Paul', 'uttam', '123', 'uttam@gmail.com', 1),
(3, 'Mahmud Hasan', 'admin', '1234', 'hasan@gmail.com', 1),
(4, 'a', 'a', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(4, 'Samsung'),
(5, 'LG'),
(6, 'Hawai'),
(7, 'lenovo'),
(10, 'Walton'),
(11, 'Symphony'),
(12, 'Cannon'),
(14, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(38, 15, 'Samsung j7 nxt', 16900.00, 10, 'images/walton s-6.jpg'),
(39, 15, 'Samsung j7 nxt', 16900.00, 16, 'images/walton s-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(8, 'Laptop'),
(10, 'Mobile Phones'),
(18, 'Refrezeretor'),
(19, 'Televison'),
(20, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_username` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `cus_username`, `cus_email`, `cus_pass`) VALUES
(9, 'aaaaaaaaa', 'aaaetty', '1234'),
(10, 'hasan', 'hasan@gmail.com', 'hasan'),
(11, 'uttam kumar', 'uttamkumar0036@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` varchar(45) NOT NULL,
  `brandId` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `availability` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `availability`) VALUES
(15, 'Samsung j7 nxt', 'Mobile Phones', 'Samsung', '2 GB RAM, 12 MP Back Camera, 5 MP Front camera. ', 16900.000, 'images/walton s-6.jpg', 26),
(16, 'LG Tv - L32', 'Televison', 'LG', '21inch Full HD, 2 Years Warranty', 20000.000, 'images/LG.TV.jpg', 22),
(18, 'HP-70', 'Laptop', 'HP', 'RAM 4 GB,7 Genaration, 14.5 inch HD Display, Aluminium Finish ', 53000.000, 'images/hptv.jpg', 7),
(19, 'W10', 'Mobile Phones', 'Symphony', '8 GB ROM,16 GB Internal memory, 3GB RAM, 5.5\'\' HD Display ', 6999.000, 'images/w10.png', 15),
(20, 'Canon-700D', 'Camera', 'Cannon', '22.5 MPX,color black,life warenty', 43000.000, 'images/Canon.jpg', 0),
(21, 'Walton - NX4', 'Mobile Phones', 'Walton', '2.2 octa core processor, 3GB RAM, 32 GB ROM, ', 14990.000, 'images/NX4.jpg', 0),
(22, 'Lenovo L-2031', 'Laptop', 'lenovo', '7th Generation, 6 GB RAM, 2 years Warrenty, 15\'\' Display', 63450.000, 'images/lenovo.png', 0),
(23, 'Canon 6D', 'Camera', 'Cannon', 'Some Text Will Go Here. ', 95000.000, 'images/6D.jpg', 0),
(25, 'Symphony W21', 'Mobile Phones', 'Symphony', 'back camera 1.3 MP ram 512', 4190.000, 'images/j7.jpeg', 0),
(26, 'Walton S6', 'Mobile Phones', 'Walton', '16 Mp front Camera, 13 MP back Camera, 4100 mah Battery, 3GB DDR3 RAM, 32 GB ROM, 1.4 octa core Processor.', 15590.000, 'images/walton s-6.jpg', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
