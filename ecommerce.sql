-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 06:37 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'Pablo Picasa'),
(2, 'Claude Mobnet'),
(3, 'vincent Van Gogh'),
(4, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(28, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Oil Paintings'),
(2, 'Indian Style'),
(3, 'Madhubani Paintings'),
(4, 'Rajasthani Paintings'),
(5, 'Sketches'),
(6, 'Abstract Paintings'),
(7, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(23, '::1', 'Abhimanyu', 'abhimanyu1996@gmail.com', 'd76f3d05cc9ac98f1f9160274a39fe33', 'India', 'Solan', '9805047790', '540998.jpg', 'absdnbnas'),
(24, '::1', 'Adhitya', 'adhi@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'India', 'udh', '9805047790', 'IMG_20161112_153726468_HDR.jpg', 'udh');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 4, 'South Indian', 500, 'Amazing Oil Painting by South Indian Legend-Ilaiyaraaja', 'Amazing-Oil-Painting-by-South-Indian-Legend-Ilaiyaraaja-12.jpg', 'oil painting, south indian, miscellaneous'),
(2, 1, 4, 'Pearl Earring', 845, 'Girl with a Pearl Earring by Johannes Vermeer', 'Girl-with-a-Pearl-Earring-by-Johannes-Vermeer.jpg', 'pearl, oil'),
(3, 1, 4, 'Chinese wall', 802, 'Chinese girl oil painting!!', 'photo_to_oil_painting .jpg', 'oil, chinese ,wall'),
(4, 1, 4, 'Beauty', 1585, 'beautiful oil painting by rob hefferan', 'beautiful-oil-painting-by-rob-hefferan (1).preview.jpg', 'oil,dark, art'),
(5, 1, 4, 'NatureScene', 185, '390X345 oil painting \r\n', 'il_340x270.1013273490_regc.jpg', 'oil painting, nature scene, miscellaneous'),
(6, 1, 4, 'Lost', 452, 'lost oil painting by-bruno eslco', 'image (2).jpe', 'oil painting, lost, miscellaneous '),
(7, 1, 4, 'NatureScene2', 234, '400X500 oil painting by-placsoi', 'image (1).jpe', 'oil painting, nature scene, miscellaneous '),
(8, 1, 4, 'Indian', 854, 'oil paintings by famous indian artists artists and fleas chelsea market for humanity epicenter wedding cost indian famous by-dtla', 'oil-paintings-by-famous-indian-artists-artists-and-fleas-chelsea-market-for-humanity-epicenter-wedding-cost-indian-famous-by-paintings-oil-24322319-christmas-in-july-dtla.jpg', 'oil painting,indian, miscellaneous '),
(9, 2, 4, 'Ravi', 875, 'Painting by Ravi Varma', '8-ravi-varma-paintings.jpg', 'Indian Style,Ravi'),
(10, 2, 4, 'Radha', 249, 'painting BY Ravi Varma', '28aug-138361.jpg', 'Indian Style,Ravi, radha'),
(11, 2, 4, 'Jamini', 545, 'Jamini by roy kapoor', '3-rajasthani-paintings.jpg', 'Indian Style,Ravi,jamini'),
(12, 3, 4, 'Madhubani-painting1', 214, 'Painitng By Ravi SHastri', '3--1madhubani-7x22.jpg', 'Madhubani,1'),
(13, 3, 4, 'Madhubani-painting2', 865, 'Painting by Ravi Shatri', 'ghbvb_1422252057.jpg', 'Madhubani,2'),
(14, 3, 4, 'Madhubani-painting3', 896, 'Painting by Ravi Shari', '1.jpg', 'Madhubani,3'),
(15, 3, 4, 'Madhubani-painting4', 453, 'Painting by Ravi Shastri', 'Kohbar_of_Mithila.png', 'Madhubani,4'),
(16, 4, 4, 'Binani-1', 976, 'Rajasthani Painting by Ravi Chandra', '2-rajasthani-paintings.preview.jpg', 'rajasthani,Binani1'),
(17, 4, 4, 'Binani-2', 548, 'Rajasthani Painting by Ravi Chandra', 'Indian_Ethnic_Art_-_Rajasthani_Gypsy_Woman.jpg', 'rajasthani,Binani2'),
(18, 4, 4, 'Binani-3', 597, 'Rajasthani Painting by Ravi Chandra', 'Modern Rajasthani lady painting.jpg', '3'),
(19, 4, 4, 'Binani-4', 656, 'Rajasthani Painting by Ravi Chandra', 'rajasthani-women-shylaja-nanjundiah.jpg', 'rajasthani,Binani4'),
(20, 4, 4, 'Binani-5', 567, 'Rajasthani Painting by Ravi Chandra', '8-rajasthani-paintings.preview.jpg', 'rajasthani,Binani4'),
(21, 5, 4, 'Andalusian Horse', 1000, 'Andalusian Horse pencil art portrait art', 'Andalusian-Horse-pencil-art-portrait_art.jpg', 'Andalusian Horse,skeches,miscellaneous'),
(22, 5, 4, 'Tribal', 869, 'Sketches of Straussr', 'tribal.jpg', 'sketches,tribal'),
(23, 5, 4, 'Ghani', 422, 'Sketches by Shiv', 'c-siva-prasad-11.jpg', 'sketches,ghani'),
(24, 6, 4, 'Flower', 458, 'Abstract Painting by lenisy', 'Abstract-Painting-Close-Up-Flower.jpg', 'Abstract ,flower'),
(25, 6, 4, 'Petal', 124, 'Abstract painting by gwein', 'Abstract-Art-Painting-The-Peoples-and-Nature.jpg', 'Abstract ,Petal'),
(26, 6, 4, 'The Forest', 658, 'abstract Painting by qwinsa', 'Abstract-Painting-The-Forest.jpg', 'Abstract ,The ,forest'),
(27, 7, 1, 'asleep', 8964, 'Painting by Picasa', 'asleep.jpg', 'picasa'),
(28, 7, 1, 'bread and fruit dish on a table', 8467, 'painting by picasa', 'bread-and-fruit-dish-on-a-table.jpg', 'picasa'),
(29, 7, 1, 'guernica', 6944, 'painting by picasa', 'guernica.jpg', 'pica'),
(30, 7, 2, 'La-Promenade', 5423, 'painting by Claude Mobnet', 'La-Promenade.jpg', 'la promenade,claude mobnet'),
(31, 0, 0, 'San Giorgio Maggiore At Dusk', 694, 'painting by Claude Mobnet', 'San-Giorgio-Maggiore-At-Dusk.jpg', 'claude mobnet'),
(32, 7, 2, 'Wild Poppies', 2638, 'Wild-Poppies,-Near-Argenteuil by claide mobnet', 'Wild-Poppies,-Near-Argenteuil.jpg', 'claude mobnet'),
(33, 7, 2, 'Impression Sunrise', 8547, 'Impression--Sunrise by claude mobnet', 'Impression--Sunrise.jpg', 'claude mobnet'),
(34, 7, 3, 'Cafe-Trace on the Place du Forum', 6345, 'Cafe-Terrace-on-the-Place-du-Forum  by Vincent', 'Cafe-Terrace-on-the-Place-du-Forum.jpg', 'vincent'),
(35, 7, 3, 'Wind BeatenTree ', 1458, 'Wind Beaten Tree by Vincent', 'Wind-Beaten-Tree-A.jpg', 'vincent'),
(36, 7, 3, 'Woman of Arles', 8543, 'Woman of Arles by Vincent', 'Woman-of-Arles.jpg', 'vincent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
