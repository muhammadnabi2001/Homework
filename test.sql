-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2024 at 06:41 AM
-- Server version: 8.0.39
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'sport yangiliklari'),
(2, 'Uzbekston yangiliklari'),
(3, 'Ob havo yangiliklari'),
(4, 'Jahon yangiliklari'),
(5, 'Ijtimoiy yangiliklar'),
(6, 'Siyosiy yangiliklar');

-- --------------------------------------------------------

--
-- Table structure for table `like_or_dislike`
--

CREATE TABLE `like_or_dislike` (
  `id` int NOT NULL,
  `new_id` int NOT NULL,
  `user_id` int NOT NULL,
  `value` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `like_or_dislike`
--

INSERT INTO `like_or_dislike` (`id`, `new_id`, `user_id`, `value`) VALUES
(11, 17, 1, 1),
(12, 18, 1, 1),
(13, 20, 1, 1),
(14, 19, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `category`, `image`) VALUES
(15, 'ttttt', 'gggggg', 'Uzbekston yangiliklari', 'image/2024-09-25_04-55-51.jpg'),
(16, '“Айрим фермерлар қаматиб юбориш билан қўрқитиляпти”. Мутахассислар – пахта нархи пасайиши ҳақида', 'Кластерлар истаги, ҳукуматнинг қўллови ва маъмурий босимлар остида пахтани фермерлардан сотиб олиш нархи пасайтирилмоқда. Агробизнес ассоциацияси раҳбари Камолиддин Икромовга кўра, кўплаб фермерлар қилган харажатларига', 'Uzbekston yangiliklari', 'image/2024-09-25_06-23-53.jpg'),
(17, 'Шахмат олимпиадаси. Ўзбекистон эркаклар жамоаси бронза медалларни қўлга киритди', 'Турнир давомида ютқазмаган ва фақат Ўзбекистон вакилларига қарши баҳсда дуранг ўйнаган Ҳиндистон биринчи ўринни олди.', 'sport yangiliklari', 'image/2024-09-25_06-29-53.jpg'),
(18, 'Қирғизистонда Асқар Акаевга собиқ президент мақомини қайтариш рад этилди', 'Парламент қўмитаси депутати Асқар Акаев президентлик даврида мамлакатда оилавий-кланлар бошқаруви гуллаб-яшнагани, инсонлар ўлимига олиб келган', 'Jahon yangiliklari', 'image/2024-09-25_06-31-23.jpg'),
(19, 'Бундан буён ҳеч кимда алоҳида ҳуқуқ бўлмайди', 'Президент Шавкат Мирзиёев тадбиркорлар билан очиқ мулоқотда 2026 йилда Жаҳон савдо ташкилотига аъзо бўлиш мақсадлари ва тенг рақобат муҳитини', 'Siyosiy yangiliklar', 'image/2024-09-25_06-32-39.jpg'),
(20, 'Ёшлар миграцияси: ҳам оғриқ, ҳам имконият', '1 октябр – Ўқитувчи ва мураббийлар кунида муаллим отасига Chevrolet Monza автомобилини совға қилди.', 'Ijtimoiy yangiliklar', 'image/2024-09-25_06-34-02.jpg'),
(21, 'Арсенал» ноқулай «Этиҳад»га боради', 'Кечагина еврокубоклар тугаб, Европада миллий чемпионатларнинг навбатдаги турлари ҳам бошланиб кетди. Бугундан бошланадиган катта футбол оқшомларидан', 'sport yangiliklari', 'image/2024-09-25_06-35-19.jpg'),
(22, 'Уй сотиб олишга қизиқиш пасайди', 'Иқтисодий тадқиқотлар ва ислоҳотлар маркази таҳлиллари август ойида кўчмас мулк бозори пасайганини кўрсатяпти. Экспертлар йиллик ўлчовда савдолар', 'Ijtimoiy yangiliklar', 'image/2024-09-25_06-37-28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', 'user', 'admin2@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Muhammadnabi Xoliqulov', 'user', 'admin3@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_or_dislike`
--
ALTER TABLE `like_or_dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `like_or_dislike`
--
ALTER TABLE `like_or_dislike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
