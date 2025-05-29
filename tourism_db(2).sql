-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 12:15 PM
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
-- Database: `tourism_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `address`, `nationality`, `destination`, `date`, `pax`) VALUES
(1, 'Lynvee Navarro', 'lynveenavarro@gmail.com', '094524724', 'Dapa, Surigao City', 'Filipino', 'Maasin River', '2025-05-20', 2),
(2, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(3, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(4, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(5, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(6, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(7, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(8, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(9, 'gilbert cordita', 'corditagilbert@gmail.com', '098765432212', 'brgy maasin, pilar', 'filipino', 'Catangnan', '2025-05-08', 2),
(10, 'karen mae blase', 'karenblase@gmail.com', '096856754', 'kawit 1', 'Filipino', 'Catangnan', '2025-04-03', 5),
(11, 'Perlin Navarro', 'perlinn@gmail.com', '09845678324', 'brgy 13, dapa', 'Filipino', 'Malinao Beach', '2025-03-13', 7),
(12, 'Perlin Navarro', 'perlinn@gmail.com', '09845678324', 'brgy 13, dapa', 'Filipino', 'Malinao Beach', '2025-03-13', 7),
(13, 'dodot', 'dodot@gmail.com', '0987763576423', 'brgy 13', 'filipino', 'Pacifico Beach', '2025-03-27', 7),
(14, 'arrah solana', 'arrahsol@gmail.com', '0987654325', 'brgy 13, dapa sdn', 'Filipino', 'Malinao Beach', '2025-05-27', 2),
(15, 'lyvee', 'Lynveemaen@gmail.com', '0987654653', 'brgy 13, dapa sdn', 'Filipino', 'Catangnan', '2025-05-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `description`, `image`) VALUES
(1, 'Cloud 9', 'Cloud 9 - Famous for its world-class surf breaks.', 'Cloud-9-Siargao-.jpg'),
(2, 'Sugba Lagoon', 'Sugba Lagoon - A stunning emerald-green lagoon perfect for kayaking and swimming.', 'soc.jpg'),
(3, 'Magpupungko Rock Pool', 'Magpupungko Rock Pools - Natural tide pools with crystal-clear waters.', 'pilar.jpg'),
(4, 'Guyam Island', 'Guyam Island is a tiny island covered in palms.', 'guyam.jpg'),
(5, 'Daku Island', 'Daku Island is the biggest island of the tour and a great place for a swim and lunch. ', 'daku.jpg'),
(6, 'Naked Island', 'Naked Island is a small sandbar, which earned its name by literally just being sand.', 'naked.jpg'),
(7, 'Tayangban Cave Pool', 'Tayangban Cave Pool was one of the highlights of my many adventures throughout Siargao Island. ', 'Tayangban.jpg'),
(8, 'Alegria Beach', 'Alegria Beach The first thing I noticed at Alegria Beach on Siargao was the white sand and crystal clear water.', 'alegria.jpg'),
(9, 'Taktak WaterFalls', 'Tak Tak Falls is the only waterfall on Siargao Island, located in the province of Surigao del Norte in the Philippines.', 'taktak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `destination_images`
--

CREATE TABLE `destination_images` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination_images`
--

INSERT INTO `destination_images` (`id`, `destination_id`, `image_filename`) VALUES
(1, 1, 'Cloud-9-siargao-.jpg'),
(2, 2, 'soc.jpg'),
(3, 3, 'Pilar.jpg'),
(4, 4, 'guyam.jpg'),
(5, 5, 'daku.jpg'),
(6, 6, 'naked.jpg'),
(7, 7, 'Tayangban.jpg'),
(8, 8, 'alegria.jpg'),
(9, 9, 'taktak.jpg'),
(1, 1, 'Cloud-9-siargao-.jpg'),
(2, 2, 'soc.jpg'),
(3, 3, 'Pilar.jpg'),
(4, 4, 'guyam.jpg'),
(5, 5, 'daku.jpg'),
(6, 6, 'naked.jpg'),
(7, 7, 'Tayangban.jpg'),
(8, 8, 'alegria.jpg'),
(9, 9, 'taktak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent_id`, `sort_order`) VALUES
(1, 'Home', 'index.php', NULL, 1),
(2, 'History', 'history.php', NULL, 2),
(3, 'Destinations', 'destinations.php', NULL, 3),
(4, 'Booking', 'booking.php', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `name`, `image`, `history`) VALUES
(1, 'General Luna', 'gl.jpg', 'General Luna is a popular destination on Siargao, known for its stunning beaches and world-famous surfing spots, like Cloud 9. It is one of the most visited municipalities in Siargao.'),
(2, 'Dapa', 'Dapa.jpg', 'Dapa is the main port of Siargao Island, and it serves as the gateway to the island. It has a rich cultural heritage and is known for its local markets and fishing industry.'),
(3, 'Del Carmen', 'dc.jpg', 'Del Carmen is known for its vast mangrove forest and natural beauty. It is also home to the beautiful Sohoton Cove, a popular tourist spot with limestone caves and crystal-clear waters.'),
(4, 'San Isidro', 'san_isidro.jpg', 'San Isidro is known for its agricultural activities, with rice fields and fishing being the main sources of livelihood for its residents. It also has a growing tourism industry.'),
(5, 'Santa Monica', 'santa.jpg', 'Santa Monica is famous for its white sandy beaches and laid-back atmosphere. The town also has a rich cultural history, with locals practicing traditional crafts and fishing methods.');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `created_at`) VALUES
(1, 'New event happening in Siargao! Stay tuned for more details.', '2025-03-18 07:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `language` varchar(10) DEFAULT 'en',
  `notifications` tinyint(1) DEFAULT 1,
  `region` varchar(255) DEFAULT 'Siargao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `visited_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather_data`
--

CREATE TABLE `weather_data` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `weather_condition` varchar(255) NOT NULL,
  `temperature` float NOT NULL,
  `wind_speed` float NOT NULL,
  `wave_height` float NOT NULL,
  `cloudiness` float NOT NULL,
  `rainfall` float NOT NULL,
  `humidity` float NOT NULL,
  `visibility` float NOT NULL,
  `pressure` float NOT NULL,
  `uv_index` float NOT NULL,
  `sunset` time NOT NULL,
  `forecast` text NOT NULL,
  `recorded_at` datetime NOT NULL,
  `feels_like` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather_data`
--

INSERT INTO `weather_data` (`id`, `location`, `weather_condition`, `temperature`, `wind_speed`, `wave_height`, `cloudiness`, `rainfall`, `humidity`, `visibility`, `pressure`, `uv_index`, `sunset`, `forecast`, `recorded_at`, `feels_like`) VALUES
(1, 'Siargao Island', 'Clear sky', 30, 10, 2, 0, 0, 80, 10, 1012, 6, '18:00:00', 'Sunny with no rain', '2025-03-18 01:00:00', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD KEY `destination_images_ibfk_1` (`destination_id`);

--
-- Indexes for table `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather_data`
--
ALTER TABLE `weather_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `traffic`
--
ALTER TABLE `traffic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weather_data`
--
ALTER TABLE `weather_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destination_images`
--
ALTER TABLE `destination_images`
  ADD CONSTRAINT `destination_images_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
