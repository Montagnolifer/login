-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2024 at 09:18 AM
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
  `quiz` longtext COLLATE utf8_unicode_ci NOT NULL,
  `validation` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `password`, `whatsapp`, `date`, `access_token_strava`, `refresh_token_strava`, `token_expiration_strava`, `photo`, `nick`, `last_access`, `photo_strava`, `username_strava`, `activities`, `quiz`, `validation`) VALUES
(2, 'FERNANDO HENRIQUE MONTAGNOLI', 'feer.montagnoli@gmail.com', '$2y$10$dLVoUCr9I99LnY45tsXd1.aCamGX8ACfGQ6PGKpJ/eD7i4dxNqmYa', '(18) 99671-7008', '2024-09-02 21:27:02', 'df74d8d69c2b3aeae7d52283819df4c67ca024e7', '9d10d47e651c3077c8352264d314022d36d34d56', '2024-09-17 22:56:59', '', '', '2024-09-25 15:29:44', 'https://dgalywyr863hv.cloudfront.net/pictures/athletes/125859140/29234983/3/large.jpg', 'montagnoli', '[{\"id\":12344148249,\"name\":\"Corrida ao entardecer\",\"type\":\"Run\",\"distance\":7111.899999999999636202119290828704833984375,\"moving_time\":3561,\"elapsed_time\":3724,\"start_date\":\"2024-09-06T20:55:59Z\",\"start_date_local\":\"2024-09-06T17:55:59Z\",\"average_speed\":1.9970000000000001083577672034152783453464508056640625,\"max_speed\":6.42699999999999960209606797434389591217041015625,\"elevation_gain\":66.099999999999994315658113919198513031005859375}]', '{\"question_0\":{\"question\":\"Voc\\u00ea tem algum hist\\u00f3rico de les\\u00f5es, especialmente nas articula\\u00e7\\u00f5es, tend\\u00f5es ou m\\u00fasculos?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_1\":{\"question\":\"Est\\u00e1 tomando algum medicamento ou possui alguma condi\\u00e7\\u00e3o de sa\\u00fade que eu deva saber?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_2\":{\"question\":\"Voc\\u00ea tem alergias ou problemas respirat\\u00f3rios, como asma?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_3\":{\"question\":\"Fez alguma cirurgia recente ou est\\u00e1 se recuperando de algum procedimento m\\u00e9dico?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_4\":{\"question\":\"Est\\u00e1 com o peso dentro do que considera ideal? J\\u00e1 teve dificuldades com ganho ou perda de peso?\",\"radio\":\"\",\"text\":\"Sim com 60km\",\"extra\":\"\"},\"question_5\":{\"question\":\"Com que frequ\\u00eancia voc\\u00ea treina atualmente?\",\"radio\":\"1-2 vezes por semana\",\"text\":\"\",\"extra\":\"\"},\"question_6\":{\"question\":\"Quais tipos de treino voc\\u00ea realiza?\",\"radio\":\"Corrida\",\"text\":\"\",\"extra\":\"\"},\"question_7\":{\"question\":\"Qual a dist\\u00e2ncia m\\u00e9dia que voc\\u00ea costuma correr?\",\"radio\":\"5-10 km\",\"text\":\"\",\"extra\":\"\"},\"question_8\":{\"question\":\"Qual \\u00e9 o seu ritmo m\\u00e9dio de corrida?\",\"radio\":\"5-6 min\\/km\",\"text\":\"\",\"extra\":\"\"},\"question_9\":{\"question\":\"Voc\\u00ea participa de corridas ou competi\\u00e7\\u00f5es regularmente?\",\"radio\":\"Sim\",\"text\":\"\",\"extra\":\"1 vez por m\\u00eas\"},\"question_10\":{\"question\":\"Qual \\u00e9 o seu principal objetivo com a corrida?\",\"radio\":\"Competi\\u00e7\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_11\":{\"question\":\"Est\\u00e1 treinando para alguma corrida espec\\u00edfica?\",\"radio\":\"Sim\",\"text\":\"\",\"extra\":\"10km floripa\"},\"question_12\":{\"question\":\"Voc\\u00ea tem alguma meta de tempo que deseja atingir?\",\"radio\":\"\",\"text\":\"quero pace de 5\",\"extra\":\"\"},\"question_13\":{\"question\":\"O que mais te motiva a correr?\",\"radio\":\"Desafio pessoal\",\"text\":\"\",\"extra\":\"\"},\"question_14\":{\"question\":\"Voc\\u00ea segue alguma dieta espec\\u00edfica?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_15\":{\"question\":\"Sente-se bem alimentado e hidratado durante os treinos e competi\\u00e7\\u00f5es?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_16\":{\"question\":\"Voc\\u00ea usa suplementos ou isot\\u00f4nicos durante os treinos e provas?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_17\":{\"question\":\"Quantas horas de sono voc\\u00ea costuma ter por noite?\",\"radio\":\"\",\"text\":\"7horas\",\"extra\":\"\"},\"question_18\":{\"question\":\"Como \\u00e9 sua recupera\\u00e7\\u00e3o p\\u00f3s-treino?\",\"radio\":\"Gelo\",\"text\":\"\",\"extra\":\"\"},\"question_19\":{\"question\":\"Voc\\u00ea sente dores ou fadiga prolongada ap\\u00f3s os treinos?\",\"radio\":\"Sim\",\"text\":\"\",\"extra\":\"\"},\"question_20\":{\"question\":\"Qual \\u00e9 o melhor hor\\u00e1rio do dia para voc\\u00ea treinar?\",\"radio\":\"Noite\",\"text\":\"\",\"extra\":\"\"},\"question_21\":{\"question\":\"Voc\\u00ea prefere correr em qual ambiente?\",\"radio\":\"Rua\",\"text\":\"\",\"extra\":\"\"},\"question_22\":{\"question\":\"Como voc\\u00ea se sente em condi\\u00e7\\u00f5es clim\\u00e1ticas diferentes?\",\"radio\":\"N\\u00e3o tenho prefer\\u00eancia\",\"text\":\"\",\"extra\":\"\"},\"question_23\":{\"question\":\"Qual tipo de t\\u00eanis voc\\u00ea utiliza para correr?\",\"radio\":\"\",\"text\":\"Um corre 3 da olympcus\",\"extra\":\"\"},\"question_24\":{\"question\":\"Voc\\u00ea usa algum dispositivo para monitorar sua corrida?\",\"radio\":\"Sim\",\"text\":\"\",\"extra\":\"strava\"},\"question_25\":{\"question\":\"Voc\\u00ea j\\u00e1 recebeu feedback ou fez an\\u00e1lise de biomec\\u00e2nica?\",\"radio\":\"N\\u00e3o\",\"text\":\"\",\"extra\":\"\"},\"question_26\":{\"question\":\"Voc\\u00ea sente alguma dor ou desconforto durante ou ap\\u00f3s a corrida?\",\"radio\":\"\",\"text\":\"\",\"extra\":\"dor de fac\\u00e3o\"},\"question_27\":{\"question\":\"Existe algo que voc\\u00ea sente que te impede de progredir no seu desempenho atual?\",\"radio\":\"\",\"text\":\"falta de ar\",\"extra\":\"\"},\"question_28\":{\"question\":\"Como voc\\u00ea se sente mentalmente durante corridas longas ou intensas?\",\"radio\":\"\",\"text\":\"Cansa\\u00e7o mental\",\"extra\":\"\"},\"question_29\":{\"question\":\"Tem alguma estrat\\u00e9gia para lidar com momentos de cansa\\u00e7o extremo ou queda de ritmo?\",\"radio\":\"\",\"text\":\"Escuto musica\",\"extra\":\"\"}}', 0),
(10, 'Marlene 2', 'mojafik713@abatido.com', '$2y$10$f615WlHorlij.0WdSTzFn.pATWCeLyPyOtz5OjkRmbKtVTc0cAOqi', '189967170074', '2024-09-26 02:18:54', '', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id_verification_codes` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id_verification_codes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id_verification_codes` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
