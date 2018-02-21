-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 21 2018 г., 18:28
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `spec_car_tech`
--
CREATE DATABASE IF NOT EXISTS `spec_car_tech` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spec_car_tech`;

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `img_path` varchar(128) DEFAULT NULL,
  `ID_mark` bigint(20) NOT NULL,
  `ID_category` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`ID`, `name`, `img_path`, `ID_mark`, `ID_category`) VALUES
(1, 'ANT 750', 'item_pics/ant750_J1R7vtb.jpeg', 1, 1),
(2, 'TCM FHG15T37', 'item_pics/_-_.png', 2, 1),
(20, '12', 'item_pics/ant750_P5MCHjG.jpeg', 1, 1),
(21, 'newnew', 'item_pics/ant750_aoDTLBf.jpeg', 1, 1),
(22, 'test', 'item_pics/PNG_transparency_demonstration_1_moRTOiw.png', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `name`) VALUES
(1, 'Погрузчики');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristicname`
--

CREATE TABLE `characteristicname` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristicname`
--

INSERT INTO `characteristicname` (`ID`, `name`) VALUES
(1, 'Масса'),
(2, 'Грузоподъемность'),
(3, 'Высота выгрузки'),
(4, 'Объем ковша'),
(5, 'Мощность двигателя'),
(6, 'Тип шин'),
(7, 'Тип двигателя');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristicvalue`
--

CREATE TABLE `characteristicvalue` (
  `ID` bigint(20) NOT NULL,
  `value` varchar(128) DEFAULT NULL,
  `unit` varchar(128) DEFAULT NULL,
  `ID_char_name` bigint(20) NOT NULL,
  `ID_modification` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristicvalue`
--

INSERT INTO `characteristicvalue` (`ID`, `value`, `unit`, `ID_char_name`, `ID_modification`) VALUES
(1, '3140', 'кг', 1, 1),
(2, '2330', 'мм', 3, 1),
(3, '0.46', 'м3', 4, 1),
(4, '750', 'кг', 2, 1),
(5, '2610', 'кг', 1, 2),
(6, '1500', 'кг', 2, 2),
(7, '35.4', 'кВт', 5, 2),
(8, '2500', 'мм', 3, 2),
(11, 'пневмо/CE', '', 6, 2),
(12, 'газобензиновый', '', 7, 2),
(19, '51', '', 5, 1),
(22, '1', '', 6, 1),
(23, '2', '', 7, 1),
(25, '22234', '', 1, 5),
(26, '1', '', 1, 6),
(27, '2', '', 3, 6),
(28, '3', '', 4, 6),
(29, '4', '', 2, 6),
(30, '228', '', 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `mark`
--

CREATE TABLE `mark` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mark`
--

INSERT INTO `mark` (`ID`, `name`) VALUES
(1, 'АНТ'),
(2, 'TCM');

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `ID_car` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`ID`, `name`, `ID_car`) VALUES
(1, 'Модификация АНТ750', 1),
(2, 'Модификация TCM FHG15T3', 2),
(5, 'Модификация для 12', 20),
(6, 'Модификация для newnew', 21),
(7, 'Модификация для test', 22);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IX_Relationship2` (`ID_category`),
  ADD KEY `IX_Relationship1` (`ID_mark`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `characteristicname`
--
ALTER TABLE `characteristicname`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `characteristicvalue`
--
ALTER TABLE `characteristicvalue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IX_Relationship8` (`ID_char_name`),
  ADD KEY `IX_Relationship9` (`ID_modification`);

--
-- Индексы таблицы `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IX_Relationship6` (`ID_car`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `characteristicname`
--
ALTER TABLE `characteristicname`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `characteristicvalue`
--
ALTER TABLE `characteristicvalue`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `Relationship1` FOREIGN KEY (`ID_mark`) REFERENCES `mark` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `Relationship2` FOREIGN KEY (`ID_category`) REFERENCES `category` (`ID`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `characteristicvalue`
--
ALTER TABLE `characteristicvalue`
  ADD CONSTRAINT `Relationship8` FOREIGN KEY (`ID_char_name`) REFERENCES `characteristicname` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `Relationship9` FOREIGN KEY (`ID_modification`) REFERENCES `modification` (`ID`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `Relationship6` FOREIGN KEY (`ID_car`) REFERENCES `car` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
