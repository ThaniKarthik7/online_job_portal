-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 06:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_protol`
--

-- --------------------------------------------------------

CREATE TABLE locations (
  `location_id` INT PRIMARY KEY AUTO_INCREMENT,
  `country` VARCHAR(111) NOT NULL,
  `state` VARCHAR(111) NOT NULL,
  `city` VARCHAR(111) NOT NULL
);

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  id INT PRIMARY KEY AUTO_INCREMENT,
  admin_email VARCHAR(100) NOT NULL,
  admin_password VARCHAR(255) NOT NULL, -- Changed to VARCHAR for hashed passwords
  admin_username VARCHAR(100) NOT NULL,
  first_name VARCHAR(111) NOT NULL,
  last_name VARCHAR(111) NOT NULL,
  admin_type_id INT,
  FOREIGN KEY (admin_type_id) REFERENCES admin_type(admin_type_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

-- Insert data into `admin_login` table
INSERT INTO `admin_login` (`id`, `admin_email`, `admin_password`, `admin_username`, `first_name`, `last_name`, `admin_type_id`) VALUES
(2, 'sunny@gmail.com', '123', 'sunny123', 'Sunny', 'Kumar', 2),
(12, 'ravi@gmail.com', '123456', 'ravi123', 'Ravi', 'Kumar', 1),
(27, 'ravikantk489@gmail.com', '9', 'ravik', 'Ravikant', 'Kumar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `admin_type_id` int(111) NOT NULL,
  `admin_type_name` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `admin`) VALUES
(1, 'Super admin'),
(2, 'Customer admin');

-- --------------------------------------------------------

--
-- Table structure for table `all_jobs`
--

CREATE TABLE `all_jobs` (
  `job_id` INT PRIMARY KEY AUTO_INCREMENT,
  `customer_email` VARCHAR(111) NOT NULL,
  `job_title` VARCHAR(111) NOT NULL,
  `des` VARCHAR(255) NOT NULL,
  `location_id` INT,
  `category_id` INT,
  FOREIGN KEY (`location_id`) REFERENCES locations(`location_id`),
  FOREIGN KEY (`category_id`) REFERENCES job_categories(`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE mobile_numbers (
  `mobile_id` INT PRIMARY KEY AUTO_INCREMENT,
  `number` VARCHAR(15) NOT NULL UNIQUE
);
--
-- Dumping data for table `all_jobs`
--

INSERT INTO `all_jobs` (`job_id`, `customer_email`, `job_title`, `des`, `country`, `state`, `city`, `keyword`, `category`) VALUES
(2, 'sunny@gmail.com', 'Java Developer', 'Web developer position', 'India', 'Odisha', 'Gunupur', 'JAVA', 3),
(3, 'ravi@gmail.com', 'PHP Developer', 'Fresher position', 'India', 'Jharkhand', 'Koderma', 'PHP', 3),
(16, 'sunny@gmail.com', 'Java', 'Freshers can apply', 'Bangladesh', 'Dhaka', 'Dhaka City', 'JAVA', 4),
(17, 'ravikantk489@gmail.com', 'Python Developer', 'Urgent Requirement', 'India', 'Jharkhand', 'Jamshedpur', 'PYTHON', 5),
(18, 'sunny@gmail.com', 'PHP Developer', 'Backend Developer', 'India', 'Odisha', 'Gunupur', 'PHP', 3);
-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` INT PRIMARY KEY AUTO_INCREMENT,
  `company_name` VARCHAR(111) NOT NULL,
  `description` VARCHAR(255),
  `admin_id` INT,
  FOREIGN KEY (`admin_id`) REFERENCES admin_login(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

-- Insert data into `company` table
INSERT INTO `company` (`company_id`, `company`, `des`, `admin`) VALUES
(2, 'ABC Corp', 'Application Tester', 'sunny@gmail.com'),
(7, 'Telecom', 'Call Center', 'ravi@gmail.com'),
(10, 'Jio', 'System Maintenance', 'sunny@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobskeer`
--

CREATE TABLE `jobskeer` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `email` VARCHAR(111) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL, -- Store hashed passwords
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `DOB` DATE NOT NULL,
  `mobile_id` INT,
  FOREIGN KEY (`mobile_id`) REFERENCES mobile_numbers(`mobile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobskeer`
--

-- Insert data into `jobskeer` table
INSERT INTO `jobskeer` (`id`, `email`, `password`, `first_name`, `last_name`, `DOB`, `mobile_number`) VALUES
(2, 'rr7@gmail.com', '22', 'Ravi', 'Kumar', '2000-10-11', '08252373318'),
(3, 'sunnykr132000@gmail.com', '1', 'Ravikant', 'Kumar', '2000-11-28', '8252373318'),
(5, 'isthatme18@gmail.com', '12345678', 'Sukanto', 'Mahato', '2001-05-31', '6296679298'),
(6, 'yash@gmail.com', '1234567', 'Yash', 'Kumar', '2002-02-22', '08252373318');
-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `first_name` VARCHAR(111) NOT NULL,
  `last_name` VARCHAR(111) NOT NULL,
  `dob` DATE NOT NULL,
  `file` VARCHAR(255) NOT NULL,
  `job_id` INT,
  `job_seeker_id` INT,
  `mobile_number` VARCHAR(15),
  FOREIGN KEY (`job_id`) REFERENCES all_jobs(`job_id`),
  FOREIGN KEY (`job_seeker_id`) REFERENCES jobskeer(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_apply`
--

-- Insert data into `job_apply` table
INSERT INTO `job_apply` (`id`, `first_name`, `last_name`, `dob`, `file`, `id_job`, `job_seeker`, `mobile_number`) VALUES
(2, 'Ravi', 'Kant', '2000-01-03', 'resume_ravi.pdf', 2, 'rr7@gmail.com', '1223467711'),
(14, 'Sunny', 'Kumar', '2000-11-10', 'screenshot1.png', 3, 'sunnykr132000@gmail.com', '2147483647'),
(24, 'Ravikant', 'Kumar', '2000-11-28', 'resume_ravikant.docx', 17, 'sunnykr132000@gmail.com', '2147483647'),
(25, 'Sunny', 'Kant', '2002-07-31', 'screenshot2.png', 2, 'yash@gmail.com', '2147483647');
-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `category_id` INT PRIMARY KEY AUTO_INCREMENT,
  `category_name` VARCHAR(111) NOT NULL,
  `desc` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category`, `des`) VALUES
(3, 'PHP Developer', 'Fresher role for PHP development'),
(4, 'Java Developer', 'Java fresher opportunities'),
(5, 'Frontend Developer', 'HTML, CSS');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `img` VARCHAR(255),
  `name` VARCHAR(255),
  `dob` DATE NOT NULL,
  `number` VARCHAR(15),
  `email` VARCHAR(111),
  `user_id` INT,
  FOREIGN KEY (`user_id`) REFERENCES jobskeer(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

-- Insert data into `profiles` table
INSERT INTO `profiles` (`id`, `img`, `name`, `dob`, `number`, `email`, `user_email`) VALUES
(11, 'images.png', 'Ravikant Kumar', '2000-11-15', '+918252373318', '21cse190.ravikantkumar@giet.edu', 'sunny@gmail.com'),
(12, 'profile_pic.jpg', 'Sukanto Kumar', '2000-11-07', '+916296679298', 'isthatme18@gmail.com', 'isthatme18@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
-- Add primary keys to tables
ALTER TABLE `admin_login` ADD PRIMARY KEY (`id`);
ALTER TABLE `all_jobs` ADD PRIMARY KEY (`job_id`);
ALTER TABLE `company` ADD PRIMARY KEY (`company_id`);
ALTER TABLE `jobskeer` ADD PRIMARY KEY (`id`);
ALTER TABLE `job_apply` ADD PRIMARY KEY (`id`);
ALTER TABLE `job_category` ADD PRIMARY KEY (`id`);
ALTER TABLE `profiles` ADD PRIMARY KEY (`id`);

-- Set AUTO_INCREMENT for tables
ALTER TABLE `admin_login` MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
ALTER TABLE `all_jobs` MODIFY `job_id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
ALTER TABLE `company` MODIFY `company_id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE `jobskeer` MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `job_apply` MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
ALTER TABLE `job_category` MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `profiles` MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

COMMIT;