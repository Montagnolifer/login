-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2024 at 09:42 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skipca34_paceplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `email` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `password` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `access_token_strava` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `refresh_token_strava` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `token_expiration_strava` datetime NOT NULL,
  `photo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `nick` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `last_access` datetime NOT NULL,
  `photo_strava` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `username_strava` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `activities` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quiz` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `password`, `whatsapp`, `date`, `access_token_strava`, `refresh_token_strava`, `token_expiration_strava`, `photo`, `nick`, `last_access`, `photo_strava`, `username_strava`, `activities`, `quiz`) VALUES
(2, 'FERNANDO HENRIQUE MONTAGNOLI', 'feer.montagnoli@gmail.com', '$2y$10$dLVoUCr9I99LnY45tsXd1.aCamGX8ACfGQ6PGKpJ/eD7i4dxNqmYa', '(18) 99671-7008', '2024-09-02 21:27:02', '655c423ef984fc13aa2a171d42b13251fdeca43e', '9d10d47e651c3077c8352264d314022d36d34d56', '2024-09-09 16:50:15', '', '', '2024-09-10 22:03:08', 'https://dgalywyr863hv.cloudfront.net/pictures/athletes/125859140/29234983/3/large.jpg', 'montagnoli', '[{\"id\":12344148249,\"name\":\"Corrida ao entardecer\",\"type\":\"Run\",\"distance\":7111.899999999999636202119290828704833984375,\"moving_time\":3561,\"elapsed_time\":3724,\"start_date\":\"2024-09-06T20:55:59Z\",\"start_date_local\":\"2024-09-06T17:55:59Z\",\"average_speed\":1.9970000000000001083577672034152783453464508056640625,\"max_speed\":6.42699999999999960209606797434389591217041015625,\"elevation_gain\":66.099999999999994315658113919198513031005859375}]', '{\"question_0\":{\"question\":\"How many times a week do you exercise?\",\"radio\":\"5 or more times\",\"text\":\"\",\"extra\":\"\"},\"question_1\":{\"question\":\"Describe your fitness goals.\",\"radio\":\"\",\"text\":\"wqrew\",\"extra\":\"\"},\"question_2\":{\"question\":\"Do you feel pain during your workouts? If yes, where?\",\"radio\":\"Yes\",\"text\":\"\",\"extra\":\"\"},\"question_3\":{\"question\":\"2 Describe your fitness goals.\",\"radio\":\"\",\"text\":\"wer\",\"extra\":\"\"}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
