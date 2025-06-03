-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 06:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawpalace`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

CREATE TABLE `adoptions` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT 'Not Specified',
  `location` varchar(1000) NOT NULL,
  `species` varchar(150) NOT NULL DEFAULT 'Not Specified',
  `age` varchar(150) NOT NULL DEFAULT 'Not Specified',
  `size` varchar(150) NOT NULL DEFAULT 'Not Specified',
  `vaccinated` varchar(150) NOT NULL DEFAULT 'Not Specified',
  `gender` varchar(100) NOT NULL,
  `neutered` varchar(150) NOT NULL DEFAULT 'Not Specified',
  `image` varchar(255) NOT NULL DEFAULT 'uploads/default.jpg',
  `action` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoptions`
--

INSERT INTO `adoptions` (`id`, `category`, `name`, `location`, `species`, `age`, `size`, `vaccinated`, `gender`, `neutered`, `image`, `action`, `user_id`, `username`, `description`) VALUES
(1, 'Cat', 'Garfield', 'Dhaka', 'Scottish Fold', '1', 'Medium', 'Yes', 'Male', 'No', 'uploads/cat.jpg', 'donate', 1, 'tg1', NULL),
(2, 'Cat', 'Richi', 'Dhaka', 'Tabby', '15 Months', 'Medium', 'Yes', 'Female', 'No', 'uploads/1725486404_cat.jpg', 'donate', 1, 'tg1', NULL),
(3, 'Dog', 'Rocky', 'Bhola', 'Native', '6 Months', 'small', 'N/A', 'Male', 'N/A', 'uploads/default.jpg', 'donate', 2, 'ak1', NULL),
(4, 'Dog', 'Tommy', 'Dhaka', 'German Shepherd', '2 Years', 'Large', 'Yes', 'Male', 'No', 'uploads/1725489143_dog.jpg', 'donate', 2, 'ak1', NULL),
(5, 'Dog', 'Not Specified', 'Dhaka', 'Yorkshire Terrier', 'Not Specified', 'small', 'N/A', 'Female', 'No', 'uploads/default.jpg', 'adopt', 2, 'ak1', NULL),
(6, 'Dog', 'Tiger', 'Faridpur', 'Labrador Retriever', '2 Years', 'Large', 'Yes', 'Male', 'No', 'uploads/1725490302_dog.jpg', 'donate', 9, 'ea1', NULL),
(7, 'Cat', 'Not Specified', 'Dhaka', 'Scottish Fold', 'Not Specified', 'Medium', 'N/A', 'Female', 'No', 'uploads/default.jpg', 'adopt', 13, 'Eleas', NULL),
(8, 'Cat', 'Not Specified', 'Dhaka', 'Tabby', 'Not Specified', 'Medium', 'N/A', 'Female', 'No', 'uploads/1725507716_cat.jpg', 'donate', 8, 'ab1', NULL),
(9, 'Cat', 'Tom', 'Dhaka', 'Local', '6 months', 'small', 'Yes', 'Male', 'No', 'uploads/1727927123_bangladeshi-kitten-small-cat-free-photo.jpg', 'donate', 1, 'Tertho', 'Its a cute little kitty. It needs proper Care. You need to provide update for 2 months. That\'s the only condition. '),
(10, 'Dog', 'Ricky', 'Narinda,Dhaka', 'Local', '5 Months', 'Small', 'Yes', 'Male', 'N/A', 'uploads/1733337870_bonnie-5-months.jpg', 'donate', 1, 'Tertho', 'It\'s a very cute dog. I need to ensure a good place for it.'),
(11, 'Cat', 'Not Specified', 'Fakirchan Community Center, Narinda', 'Not Specified', 'Not Specified', 'Not Specified', 'N/A', 'Male', 'N/A', 'uploads/default.jpg', 'adopt', 1, 'Tertho', 'I need a small cat, vaccinated and potty trained. Thanks.'),
(12, 'Bird', 'Twilight', '', 'Not Specified', '6 months', 'Small', 'Yes', 'Female', 'N/A', 'uploads/1733338359_Small Birds2.jpg', 'donate', 1, 'Tertho', 'It\'s a cute little bird. I hope you will take good care of it. '),
(13, 'Dog', 'Edge', 'Dholaikhal, Narinda, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1203, Bangladesh', 'Mixed', '6 months', 'Medium', 'Yes', 'Male', 'N/A', 'uploads/1733340705_breeds-in-mutt.png', 'donate', 1, 'Tertho', 'Very Loyal and Well Trained.'),
(14, 'Cat', 'rocky', 'Jagannath University, 10, Chitta Ranjan Avenue, Patuatuli, Bangla Bazar, Dhaka, Dhaka Metropolitan, Dhaka District, Dhaka Division, 1100, Bangladesh', 'Local', '6 months', 'small', 'Yes', 'Male', 'N/A', 'uploads/1733639012_IMG_20241120_104522_086.jpg', 'donate', 1, 'Tertho', 'ajksdk'),
(15, 'Dog', 'Not Specified', 'Jagannath University, 10, Chitta Ranjan Avenue', 'Not Specified', '1 years', 'medium', 'Yes', 'Male', 'No', 'uploads/1733641720_bonnie-5-months.jpg', 'donate', 1, 'Tertho', 'demo post');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `read_status` tinyint(1) DEFAULT 0,
  `file_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `read_status`, `file_url`) VALUES
(1, 2, 1, 'hi', '2024-12-06 00:42:04', 0, NULL),
(2, 1, 2, 'hello', '2024-12-06 01:20:26', 0, NULL),
(3, 1, 2, 'hello', '2024-12-06 01:20:26', 0, ''),
(5, 1, 1, 'Hi', '2024-12-06 01:25:26', 0, ''),
(6, 12, 1, 'hi', '2024-12-07 03:31:25', 0, ''),
(7, 14, 1, 'Hello', '2024-12-07 04:09:41', 0, ''),
(8, 1, 12, 'Hello', '2024-12-07 04:22:53', 0, ''),
(9, 2, 1, 'Yes', '2024-12-07 04:24:01', 0, ''),
(10, 2, 1, 'How is it going', '2024-12-07 04:24:28', 0, ''),
(11, 1, 2, 'great', '2024-12-07 04:27:21', 0, ''),
(12, 1, 2, 'What about you?', '2024-12-07 04:28:03', 0, ''),
(13, 2, 1, 'Fine', '2024-12-07 04:28:28', 0, ''),
(14, 1, 2, 'Bye', '2024-12-07 04:32:43', 0, ''),
(15, 1, 1, 'hi', '2024-12-07 04:43:37', 0, ''),
(16, 12, 1, 'How are you?', '2024-12-08 05:37:13', 0, ''),
(17, 2, 1, 'ok', '2024-12-08 05:41:10', 0, ''),
(18, 12, 1, 'ok', '2024-12-08 05:42:14', 0, ''),
(19, 2, 1, 'hey', '2024-12-08 05:46:50', 0, ''),
(20, 12, 1, 'hi', '2024-12-08 05:52:58', 0, ''),
(26, 12, 1, 'yes', '2024-12-08 06:05:14', 0, ''),
(33, 1, 2, 'great', '2024-12-08 06:06:15', 0, ''),
(76, 2, 1, 'ok', '2024-12-08 06:15:19', 0, ''),
(80, 2, 1, 'done', '2024-12-08 06:16:41', 0, ''),
(83, 1, 12, 'superb', '2024-12-08 06:18:30', 0, ''),
(85, 1, 2, 'ok', '2024-12-08 06:24:05', 0, ''),
(87, 1, 12, 'done', '2024-12-08 06:24:18', 0, ''),
(88, 2, 1, 'hi', '2024-12-08 07:31:12', 0, ''),
(90, 1, 2, 'hello', '2024-12-08 07:31:45', 0, ''),
(92, 12, 1, 'hi', '2024-12-08 07:32:15', 0, ''),
(94, 1, 2, 'hi', '2024-12-08 07:33:04', 0, ''),
(97, 12, 1, 'hello', '2024-12-08 11:25:07', 0, ''),
(98, 2, 1, 'hello', '2024-12-08 11:33:03', 0, ''),
(99, 1, 2, 'hi', '2024-12-08 11:43:46', 0, ''),
(100, 2, 1, 'hello', '2024-12-08 11:55:28', 0, ''),
(102, 2, 1, 'hi', '2024-12-08 11:59:10', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `joined_date` datetime DEFAULT current_timestamp(),
  `privacy_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_settings`)),
  `contact_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `profile_picture`, `joined_date`, `privacy_settings`, `contact_number`, `address`) VALUES
(1, 'Tertho', 'Ghosh', 'terthoghosh5@gmail.com', 'Tertho', '$2y$10$uwj9Efki73nO5YjZSfzzSuBmOSny.6Q/.A6wql2TdK5jqjY.MLb2y', 'profile_pictures/profile_66efbd79598a12.77309399.JPG', '2024-09-09 03:26:48', '{\"first_name\":1,\"last_name\":1,\"email\":1,\"address\":0,\"contact_number\":0}', '01610466644', 'Narinda,Dhaka'),
(2, 'Antor', 'Kumar', 'antorkumar23@gmail.com', 'Antor', '$2y$10$6whDkEoFECSX/HAKlDM2z.KX.20jtkcOfmIg9FQHNwEI2hwuHmTbm', 'profile_pictures/profile_66ef61d82d9891.70720433.jpg', '2024-09-09 03:26:48', '{\"first_name\":0,\"last_name\":0,\"email\":0,\"address\":0,\"contact_number\":0}', '01743302979', 'Dhaka'),
(3, 'Asash', 'Sarker', 'asashsarker34@gmail.com', 'as1', '$2y$10$ORM/1l6Fg23sYKOJ7UGBOu46Owwm0E3LjdPZiOuggmo5h6Pl18r6C', NULL, '2024-09-09 03:26:48', NULL, NULL, NULL),
(8, 'Arka', 'Biswas', 'arka123@gmail.com', 'ab1', '$2y$10$d/FLAei2qkiZV8K.KFtbG.xdalN3RAtVefRcuMMxiRcNZzjvjlMA.', NULL, '2024-09-09 03:26:48', NULL, NULL, NULL),
(9, 'Erfanul', 'Antor', 'erfanul12@gmail.com', 'ea1', '$2y$10$bLpXl2IQhndNGM7Q9xbIUeIXi6UDxGMQ7lanWKVFV/fPQnoFtjbqa', NULL, '2024-09-09 03:26:48', NULL, NULL, NULL),
(10, 'Mustakin', 'Topu', 'mustakin12@gmail.com', 'mt1', '$2y$10$DyTCxCbegwN0Y8wDYLzmvu3dpg9j6nxcigQDMop.4.eSIrq7Tj.py', NULL, '2024-09-09 03:26:48', NULL, NULL, NULL),
(11, 'Mahidul', 'Ratul', 'ratul23@gmail.com', 'mr1', '$2y$10$2hFqXVNeOZRIHEifNr5vZu91opToBa9U95PQq23M6ky/UDLTVjUhe', NULL, '2024-09-09 03:26:48', NULL, NULL, NULL),
(12, 'Fahmida', 'Sweety', 'sweety43@gmail.com', 'Fahmida', '$2y$10$zMGzgdUvYHAatsSJoS6RgOq80.coOSfOR/NLPxJpc7UD9cfDPsA4i', 'profile_pictures/profile_66ef9268428325.48399624.JPG', '2024-09-09 03:26:48', '{\"first_name\":0,\"last_name\":0,\"email\":0,\"address\":0,\"contact_number\":0}', '', 'Sadarghat'),
(13, 'Eleas', 'Sarker', 'eleas234@gmail.com', 'Eleas', '$2y$10$TczzutlmKZ2qRAJmHQTsQuYYpa9cWm4PuAAKi8bfy9gHi6YlQt/bC', NULL, '2024-09-09 03:26:48', NULL, NULL, NULL),
(14, 'Abir', 'Karmokar', 'abir34@gmail.com', 'Abir', '$2y$10$L0jrSTSuhscDEGO5iiLUtePoC5I6vHTZ8Foo2qErz9/RRhD.EK3vu', NULL, '2024-12-07 04:08:46', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
