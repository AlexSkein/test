-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.243:3306
-- Время создания: Апр 27 2024 г., 02:43
-- Версия сервера: 10.11.7-MariaDB-cll-lve-log
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `currency_d`
--

CREATE TABLE `currency_d` (
  `id` varchar(100) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `EngName` varchar(255) DEFAULT NULL,
  `Nominal` varchar(100) DEFAULT NULL,
  `ParentCode` varchar(100) DEFAULT NULL,
  `ISO_Num_Code` varchar(100) DEFAULT NULL,
  `ISO_Char_Code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `currency_rate`
--

CREATE TABLE `currency_rate` (
  `date_r` date NOT NULL,
  `Value` varchar(50) DEFAULT NULL,
  `VunitRate` varchar(50) DEFAULT NULL,
  `Vid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `currency_d`
--
ALTER TABLE `currency_d`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  ADD PRIMARY KEY (`Vid`,`date_r`) USING BTREE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
