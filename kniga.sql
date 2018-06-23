-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 23 2018 г., 23:38
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zapisnaya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kniga`
--

CREATE TABLE IF NOT EXISTS `kniga` (
  `nom` int(3) NOT NULL AUTO_INCREMENT,
  `info` varchar(300) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `kniga`
--

INSERT INTO `kniga` (`nom`, `info`, `dat`) VALUES
(1, 'Go to the shop', '2018-06-23 16:43:28'),
(2, 'Eugene - 88005553535', '2018-06-23 16:43:43'),
(3, 'Call Eugene', '2018-06-23 16:44:08'),
(4, 'Buy a ticket', '2018-06-23 17:49:45'),
(5, 'Try to do sport', '2018-06-23 17:49:45'),
(6, 'Go to school', '2018-06-23 17:59:20'),
(7, 'Meet my friend', '2018-06-23 17:49:45'),
(8, 'Buy icecream', '2018-06-23 17:49:45'),
(9, 'Ratata 3445', '2018-06-23 17:58:08'),
(10, 'Buy a book', '2018-06-23 18:02:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
