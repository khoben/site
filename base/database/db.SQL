-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 24 2018 г., 17:55
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
(1, 'ANT 750                        ', 'item_pics/ant750_J1R7vtb.jpeg', 2, 1),
(2, 'TCM FHG15T37   ', '/item_pics/kek.jpg', 2, 1),
(36, 'my', '/item_pics/_-_.png', 1, 1),
(37, '3434', '/item_pics/minipogruzchik_ant1000.png', 2, 1),
(38, '44', '/item_pics/_-_.png', 1, 1);

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
(3, 'Высота выгрузки'),
(2, 'Грузоподъемность'),
(1, 'Масса'),
(5, 'Мощность двигателя'),
(4, 'Объем ковша'),
(7, 'Тип двигателя'),
(6, 'Тип шин');

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
(3, '0,46', 'м3', 4, 1),
(4, '750', 'кг', 2, 1),
(5, '2610', 'кг', 1, 2),
(6, '1500', 'кг', 2, 2),
(7, '35.4', 'кВт', 5, 2),
(8, '2500', 'мм', 3, 2),
(11, 'пневмо/CE', '', 6, 2),
(12, 'газобензиновый', '', 7, 2),
(19, '51', 'л. с.', 5, 1),
(22, 'Резина', '', 6, 1),
(23, 'Дизельный', '', 7, 1),
(40, '6557', NULL, 4, 17),
(41, '22', NULL, 3, 17),
(42, '33', NULL, 2, 17),
(43, '64646', NULL, 1, 17),
(44, '200', NULL, 3, 18),
(45, '88', NULL, 6, 17),
(46, '444', NULL, 2, 19),
(47, '444', NULL, 3, 19);

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
(17, 'Модификация для my', 36),
(18, 'Модификация для ', 37),
(19, 'Модификация для ', 38);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`name`);

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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
