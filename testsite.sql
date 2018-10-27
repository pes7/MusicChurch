-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Жов 27 2018 р., 21:06
-- Версія сервера: 10.1.36-MariaDB
-- Версія PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `testsite`
--

-- --------------------------------------------------------

--
-- Структура таблиці `bible`
--

CREATE TABLE `bible` (
  `id` smallint(6) NOT NULL,
  `text` varchar(128) DEFAULT NULL,
  `url` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `bible`
--

INSERT INTO `bible` (`id`, `text`, `url`) VALUES
(1, 'test text', 'Kor. 1:15'),
(2, 'test2', 'Isaya. 1:15');

-- --------------------------------------------------------

--
-- Структура таблиці `gallery`
--

CREATE TABLE `gallery` (
  `id` smallint(6) NOT NULL,
  `caption` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `media`
--

CREATE TABLE `media` (
  `id` smallint(6) NOT NULL,
  `referenceIdPartitura` smallint(6) DEFAULT NULL,
  `referenceIdNews` smallint(6) DEFAULT NULL,
  `referenceIdGallery` smallint(6) DEFAULT NULL,
  `caption` varchar(32) DEFAULT NULL,
  `src` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `media`
--

INSERT INTO `media` (`id`, `referenceIdPartitura`, `referenceIdNews`, `referenceIdGallery`, `caption`, `src`) VALUES
(1, 1, NULL, NULL, NULL, 'some src pdf'),
(2, 1, NULL, NULL, NULL, 'src to mp3');

-- --------------------------------------------------------

--
-- Структура таблиці `news`
--

CREATE TABLE `news` (
  `id` smallint(6) NOT NULL,
  `caption` varchar(32) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `partitura`
--

CREATE TABLE `partitura` (
  `id` smallint(6) NOT NULL,
  `caption` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `partitura`
--

INSERT INTO `partitura` (`id`, `caption`) VALUES
(1, 'Псалом 10');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` smallint(6) NOT NULL,
  `name` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL,
  `surname` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL,
  `username` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL,
  `password` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL,
  `email` char(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  `authKey` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL,
  `accessKey` varchar(32) CHARACTER SET cp1251 COLLATE cp1251_ukrainian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `password`, `email`, `isAdmin`, `authKey`, `accessKey`) VALUES
(1, 'Nazar', 'Ukolov', 'admin', 'YWRtaW4=', 'wowpes7@mail.ru', 1, 'fvawc2ra2', 'fvawc2ra2rca25c2tba'),
(12, 'Sophia', 'Gorshkova', 'sofia', 'c29maWE=', 'sofia@mail.ru', 0, 'afvc2rtc2a', 'afvc2rtc2aa3vr2av'),
(14, 'fav22vf', 'afv2vaffaw', 'fwf2af', 'ZndmMmFm', '2avfa2v', 1, 'ф2аса2йфк2фвкамафацафс2', 'UGM64EKzytWjC6CpGTmutqTWfCC-5_WS'),
(16, 'афцфіпцф', 'ацфаацс', 'fjsafjwaj', 'ZmpzYWZqd2Fq', 'афца2@gmail.com', 0, 'мфамф36ем2фчкфваіаи36е3', 'fWTPMzE94NKkVCkgWQwhNHWNyYxY31cy'),
(17, 'fvava2rrvaf', 'fvava2rrvaf', 'fvava2rrvaf', 'ZnZhdmEycnJ2YWY=', 'fvac22va@mail.ru', 0, 'мфцк2чн5кнгтунміапм3', 'LtUXCbrYrfE0-AXbwtizR91oOALde93-'),
(18, 'kosha2', 'kolosav2d', 'kosha2', 'a29zaGEy', 'kosha2@mail.com', 0, 'IZWP??F$M??toB\Z????N?3qAAz?_??', 'Miyop6YmPHYAAilT8PMzeM_hzy3JKAUz'),
(19, 'jijjosakfo', 'jijjosakfo', 'jijjosakfo', 'amlqam9zYWtmbw==', 'jijjosakfo@mail.ru', 0, 'j???]?Kp???z??f???U	?W??fc?$z', 'Xo1kMRYAAzCIvjh7rqgDOV42sf-nUqZX'),
(20, 'vfavt252vtg', 'vfavt252vtg', 'vfavt252vtg', 'dmZhdnQyNTJ2dGc=', 'vfavt252vtg@mail.ru', 0, '+r??^.a?cr_1&??Z\rh?sP?`?q??r%??', '5o0nYHVbkgY7w5qxS4ReQ2Tq5LO5DcTy');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `bible`
--
ALTER TABLE `bible`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `partitura`
--
ALTER TABLE `partitura`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `bible`
--
ALTER TABLE `bible`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `media`
--
ALTER TABLE `media`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `news`
--
ALTER TABLE `news`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `partitura`
--
ALTER TABLE `partitura`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
