-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2023 at 07:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpapp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `post_vaccination_symtoms` varchar(255) NOT NULL,
  `no_of_people_in_contact` int(11) NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `vaccination_status` varchar(30) NOT NULL,
  `positive_before` varchar(30) NOT NULL,
  `family_bg` varchar(30) NOT NULL,
  `contact_with_patient` varchar(30) NOT NULL,
  `travel_history` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `full_name`, `email`, `username`, `password`, `age`, `post_vaccination_symtoms`, `no_of_people_in_contact`, `symptoms`, `gender`, `vaccination_status`, `positive_before`, `family_bg`, `contact_with_patient`, `travel_history`, `action`, `token`, `status`) VALUES
(87, 'Dinesh Panchi Chander', 'panchidinesh@gmail.com', 'Sonu ', 'd41d8cd98f00b204e9800998ecf8427e', 18, 'no', 3, 'tiredness, Olfactory disorders, ', 'male', 'no2', 'no', 'no', 'no', 'no', 'Consult a doctor.', '', ''),
(89, 'Richa ', 'richasharma@rc.com', 'Richa   ', 'd41d8cd98f00b204e9800998ecf8427e', 32, 'no', 32, 'difficulty breathing, muscle pain, Olfactory disorders, ', 'female', 'no2', 'no', 'no', 'no', '', 'Consult a doctor.', '', ''),
(93, 'Rohini Singh', 'rohini@gmail.com', 'Rohini', '4a88275b9175b2ebc61e09a2ca59b60d', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(94, 'hello', 'abc@def.in', 'abcdef ', 'd41d8cd98f00b204e9800998ecf8427e', 78, 'no', 387, 'difficulty breathing, cough, cold, ', 'others', 'no', 'no', 'no', 'no', 'no', 'Consult a doctor.', '', ''),
(96, 'Mahek Sachani', 'mahek@gmail.com', 'Mahek', '42f9aceec46a4e46c6565812ae49665c', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(97, 'Meeta Sharma', 'meeta@gmail.com', 'meeta', '3bc0d5174ef422fda6c81dfa5a5a7cf6', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(98, 'Reshma Sharma', 'reshma@gmail.com', 'reshma', 'fbe02c658daa4a4e055c82801bdad1b5', 23, 'no', 5, 'difficulty breathing, muscle pain, ', 'female', 'no2', 'no', 'no', 'no', 'no', 'Consult a doctor.', '', ''),
(99, 'XYZ', 'xyz@gmail.com', 'xyz123', '613d3b9c91e9445abaeca02f2342e5a6', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(100, 'Divyang Patel', 'divyangpatel@gmail.com', 'Divyang', '16b497720409ff4555f965cc42d53ac0', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(102, 'Janvi kapoor', 'janvi@gmail.com', 'Janvi', '3c6c3381e638b94602c57770bbea6c9b', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(103, 'Sakshama', 'sakshama@gmail.com', 'Sakshama', '17136aa8ea40d4ffcec03f4798235a60', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(108, 'shweta priya', 'shweta@gmail.com', 'shweta123', '02633c6215f5ab52da91f13e8509f3fa', 0, '', 0, '', '', '', '', '', '', '', '', '', ''),
(111, 'vanita asrani', 'vanitavasrani@gmail.com', 'vanita', '64323933896e159ed63a0e1f5480b860', 0, '', 0, '', '', '', '', '', '', '', '', '0790764aefe8482ca4b9bd0b5605c2', ''),
(112, 'gsnxz', 'ymzmsnxz@hsbx.dswed', 'shgxjhbsc', '3b11789f9741aba0a33f7ee4fec022fe', 0, '', 0, '', '', '', '', '', '', '', '', '6cd7c6b0f4fe14ccecd5a7da60fac6', 'inactive'),
(113, 'test 02', 'test2@gmail.com', 'test2 ', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', 0, '', '', '', '', '', '', '', '', 'c296c9220fd14ac6ad5502900ec363', 'inactive'),
(114, 'Dinesh Chander Panchi', 'dinesh@gmail.com', 'dinu', '643e0d731d6a83287f3baee1206a114f', 0, '', 0, '', '', '', '', '', '', '', '', '0a79a0dc1b10df0c64d50fe3012de8', 'inactive'),
(152, 'Sanjana Asrani Vashdev', 'sanjanavasrani@gmail.com', 'Sanjana1673', '9c4340b65e13a978a46e43c0e7c24338', 0, '', 0, '', '', '', '', '', '', '', '', 'ce9eb8abd75239715bc9ee352a9d76', 'active'),
(154, 'Sakshi Rane', 'sakshirane248@gmail.com', 'SakshiRane', 'b73a3203047396075ccac51f92358f6e', 18, 'no', 5, 'tiredness, cough, cold, muscle pain, ', 'female', 'no2', 'no', 'no', 'no', 'no', 'Consult a doctor.', '6195cee4d4dd9315fec43a3d1fddc5', 'active'),
(155, 'vivek balani', 'vivekvalorant2@gmail.com', 'vivek', '061a01a98f80f415b1431236b62bb10b', 0, '', 0, '', '', '', '', '', '', '', '', '7a0001a5d4f3812a827f497a79c7bf', 'inactive'),
(156, 'sanjana sanjana', 'vgasrani@gmail.com', 'sanjana', '50ca62e9390cd651c9651c6ba6cc1555', 0, '', 0, '', '', '', '', '', '', '', '', '9dd4eda059b0e9eb6f57264c090562', 'inactive'),
(158, 'amrita vashdev asrani', 'amritaasrani24@gmail.com', 'amrita2485', '2967eaad1dd3cf4ff792b31e26d5216a', 0, '', 0, '', '', '', '', '', '', '', '', 'e826f7e5c0858b7ef820aa4941ce1e', 'active'),
(160, 'Sanjana Asrani', 'sanj@sanj.com', 'AsraniSanjana', '9c4340b65e13a978a46e43c0e7c24338', 0, '', 0, '', '', '', '', '', '', '', '', '4c5a3d15ac83ebab2fed9f518eaa23', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
