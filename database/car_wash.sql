-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 05:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_wash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Adeel Ahmed', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `car_make` varchar(100) NOT NULL,
  `car_model` varchar(80) NOT NULL,
  `year` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_status` varchar(80) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `service_id`, `car_make`, `car_model`, `year`, `date`, `time`, `price`, `payment_id`, `payment_status`, `status`, `description`) VALUES
(8, 1, 7, 'Toyota', 'XLI', 2002, '2025-06-15', '10:56:00', 2000, 'PAYID-NBDCGPA2CC77790YS728825F', 'approved', 1, 'I need the car wax service.'),
(17, 2, 7, 'Toyota', 'XLI', 2009, '2025-06-09', '07:34:00', 2000, 'PAYID-NBDDT5Y1LG22493KC5914015', 'approved', 1, 'I need service.'),
(20, 2, 2, 'Suzuki', 'B1', 2020, '2025-06-10', '11:14:00', 2500, 'PAYID-NBDEHMI78A69075LB0459105', 'approved', 1, 'I need service sir'),
(21, 2, 10, 'Tesla', 'V76', 2012, '2025-06-30', '12:00:00', 3500, 'PAYID-NBQPBXY7HF30057NS510581E', 'approved', 1, 'Need this service');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Car Engine'),
(2, 'Car Internal'),
(3, 'Cleaning Tool');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `permission` varchar(200) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `phone`, `gender`, `dob`, `cnic`, `address`, `role`, `permission`, `joining_date`, `shift`, `salary`, `img`) VALUES
(1, 'Aqib Ali', 'test@gmail.com', '03018734989', 'Male', '2025-06-07', '31202-5304246-5', 'House no. 108, Block A1, Gulberg III, Karachi, Sindh', 'Manager', 'Manage bookings, Update inventory, View financial summaries', '2025-05-28', '9 AM - 5 PM', 70000, 'pic-3.png'),
(3, 'Saad Khan', 'saad10@gmail.Com', '03436167543', 'Male', '2001-12-17', '31202-5304246-5', 'House 1 street 2d Rawalpindi Pakistan', 'Washer', 'View assigned bookings, Check available inventory', '2025-05-05', '9 AM - 7 PM', 30000, 'qq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(256) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(3, 'How long does a full car wash take?', 'On average, it takes 60 to 90 minutes depending on the service selected.'),
(4, 'Do I need to book in advance?', 'Booking is recommended, but walk-ins are also welcome based on availability.'),
(5, 'Do you use high-quality products?', 'Yes, we use premium, car-safe products for all services.'),
(6, ' Do you wash all types of vehicles?', 'Yes, we service cars, SUVs, vans, and small pickups.'),
(7, ' Is engine detailing safe for my car?', 'Absolutely. We use safe, non-damaging products and techniques.'),
(8, 'Do you offer any discount packages?', 'Yes, we have combo packages and loyalty discounts available.'),
(9, 'Do you use pressure washers?', 'Yes, we use professional pressure washers that are safe for paint.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `service_id`, `rating`, `date`, `review`) VALUES
(1, 1, 2, 4, '2025-05-08', 'Good'),
(2, 2, 7, 5, '2025-06-09', 'Very Satisfied'),
(3, 2, 2, 5, '2025-06-10', 'Very Well');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_title` varchar(100) NOT NULL,
  `company` varchar(80) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `actual_stock` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `pro_title`, `company`, `purchase_price`, `price`, `discount`, `actual_stock`, `available`, `image`, `description`) VALUES
(2, 3, 'Car Shampoo (pH neutral)', 'Honda', 1600, 2000, 0, 77, 72, 'uu.jpeg', 'A high-foaming, pH-neutral shampoo for safe, streak-free car cleaning without removing wax.');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `category` varchar(80) NOT NULL,
  `type` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `duration` varchar(80) NOT NULL,
  `status` int(11) NOT NULL,
  `tools` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `category`, `type`, `cost`, `price`, `discount`, `duration`, `status`, `tools`, `image`, `description`) VALUES
(2, 'Car General Service', 'Hand Wash', 1, 1700, 2500, 150, '80', 1, 'N/A', 'dd.jpeg', 'Our General Car Wash service provides a thorough exterior cleaning to keep your vehicle looking fresh and well-maintained. Using high-quality cleaning products and gentle techniques, we remove dirt, dust, and grime without damaging your car’s paint or finish. This service is perfect for routine maintenance and helps preserve your vehicle’s shine while enhancing its overall appearance. Ideal for drivers who want a quick, efficient, and professional clean to keep their car in top condition.'),
(7, 'Premium Car Wax', 'Car Wax', 1, 1400, 2000, 0, '40', 1, 'N/A', 'cc.jpeg', 'This service applies a high-quality wax layer to your vehicle’s exterior, enhancing shine and protecting the paint from dirt, water, and sun damage. It leaves your car smooth, shiny, and better protected.'),
(8, 'Tire Shine Treatment', 'Tire Shine', 1, 3300, 4000, 0, '55', 1, '', 'bb.jpeg', 'Our Tire Shine service restores the deep black look of your tires while adding a glossy finish. It not only improves appearance but also helps protect against cracking, fading, and UV damage.'),
(10, 'Engine Detailing', 'Engine Wash', 2, 2500, 3500, 300, '90', 1, 'N/A', 'aa.jpeg', 'Our Engine Detailing service involves cleaning the engine bay to remove dust, oil, and grime, helping improve engine cooling and performance. It includes degreasing, power rinsing, and protective coating.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `password`, `city`, `address`, `image`) VALUES
(1, 'Adeel Ahmed', 'adeelhayat110@gmail.com', '03049834989', '123', 'Islamabad', 'Ali Town', 'man profile.png'),
(2, 'Sami Khan', 'a@gmail.com', '03436117656', '123', 'Rawalpindi', 'House 6 defence colony rawalpindi Pakistan', 'pp.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
