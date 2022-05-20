-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 20 2022 г., 16:38
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bol_nicolay`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Prof` text NOT NULL,
  `hospital` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`ID`, `Name`, `Prof`, `hospital`, `notes`) VALUES
(1, 'Иван Алексеевич', 'Хирург', '4', ''),
(2, 'Андрей Александрович', 'Сантехник', '4', ''),
(3, 'Николай Горький', 'ортопед', '4', ''),
(4, 'Яфизов Ринат', 'Крутой спец', '5', '');

-- --------------------------------------------------------

--
-- Структура таблицы `hospitals`
--

CREATE TABLE `hospitals` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hospitals`
--

INSERT INTO `hospitals` (`ID`, `Name`, `description`, `location`) VALUES
(4, 'Городская №3', 'городская больница', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17923.835318444493!2d37.32613970874325!3d55.83699467222776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b546e4e778b08b%3A0xad165c686e1d524f!2z0JrRgNCw0YHQvdC-0LPQvtGA0YHQutCw0Y8g0LPQvtGA0L7QtNGB0LrQsNGPINCx0L7Qu9GM0L3QuNGG0LAg4oSWIDM!5e0!3m2!1sru!2sru!4v1638204865434!5m2!1sru!2sru'),
(5, 'Дурка', 'ЛУЧШАЯ ДУРКА ГОРОДА', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d577336.7622095797!2d36.825155571355864!3d55.58074819686746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1638123126361!5m2!1sru!2sru');

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE `records` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `hospital` text NOT NULL,
  `D_name` text NOT NULL,
  `D_prof` text NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`ID`, `Name`, `hospital`, `D_name`, `D_prof`, `USER_ID`) VALUES
(36, '12345', 'Городская №3', 'Иван Алексеевич', 'Хирург', 5),
(37, '12345', 'Городская №3', 'Николай Горький', 'ортопед', 5),
(38, 'Николай Марков', 'Городская №3', 'Иван Алексеевич', 'Хирург', 8),
(40, 'Николай Марков', 'Городская №3', 'Андрей Александрович', 'Сантехник', 8),
(41, 'Николай Марков', 'Дурка', 'Яфизов Ринат', 'Крутой спец', 8),
(42, 'root', 'Городская №3', 'Иван Алексеевич', 'Хирург', 6),
(43, 'root', 'Городская №3', 'Андрей Александрович', 'Сантехник', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Allowment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Name`, `Password`, `Allowment`) VALUES
(6, 'root', 'root', 3),
(7, 'АБР ИКОС', '5', 3),
(8, 'Николай Марков', '1234', 3),
(9, '1234', '1234', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `records`
--
ALTER TABLE `records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
