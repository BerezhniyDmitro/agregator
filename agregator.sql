-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 10 2016 г., 22:25
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `agregator`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `name_author` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `value`, `name_author`, `comment`, `id_product`, `date`) VALUES
(1, 5, 'Дима ', 'Тестовый', 15, '2016-08-10 04:03:15'),
(2, 4, 'Дима ', 'Тестовый отзыв', 15, '2016-08-10 04:06:54'),
(3, 7, 'Василий', 'Отличная машина', 12, '2016-08-10 04:07:37'),
(4, 9, 'Светлана', 'Тестовый коммент на Ауди', 11, '2016-08-10 04:09:51'),
(8, 3, 'Василий', 'qw', 11, '2016-08-10 04:25:51'),
(9, 5, 'Петя', 'Тестовый на 17той стр', 17, '2016-08-10 04:28:37'),
(10, 5, 'Василий', 'тестовый на мерседесе', 25, '2016-08-10 05:25:56');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `preview_image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_author` varchar(40) NOT NULL,
  `count_reviews` int(11) NOT NULL,
  `price` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `preview_image`, `date`, `name_author`, `count_reviews`, `price`) VALUES
(11, 'Audi', 'http://car4sport.ru/img/Audi_R8_front.jpg', '2016-08-09 19:04:37', 'Дима ', 0, '40000'),
(12, 'Мустанг', 'http://samie-samie.ru/wp-content/uploads/2012/07/samaya-krutaya-mashina-v-mire3.jpg', '2016-08-09 19:06:03', 'Вася ', 0, '15000'),
(13, 'Фольксваген ', 'https://cdn.autocentre.ua/images/stories/2015/07/15/m/volkswagen_nachinaet_prodazhi_caddy_4_i_mashin_t6.jpg', '2016-08-09 19:07:31', 'Петя', 0, '12000'),
(14, 'Porshe', 'https://img1.goodfon.ru/wallpaper/big/a/40/porsche-911-turbo-coupe-porshe-5141.jpg', '2016-08-09 20:04:57', 'Максим', 0, '30000'),
(15, 'BMW', 'http://www.nastol.com.ua/mini/201608/183215.jpg', '2016-08-09 20:07:10', 'Петя', 0, '25000'),
(17, 'Audi', 'http://www.nastol.com.ua/mini/201608/182718.jpg', '2016-08-09 20:09:45', 'Татьяна', 0, '45000'),
(18, 'Альфа', 'https://img3.goodfon.ru/wallpaper/big/d/75/alfa-romeo-alfetta-2000gt.jpg', '2016-08-09 20:12:03', 'Максим', 0, '75000'),
(19, 'Alfa old', 'https://img1.goodfon.ru/wallpaper/big/b/33/alfa-romeo-8c-2900b-corto.jpg', '2016-08-09 20:14:12', 'Дима', 0, '80000'),
(25, 'Mersedes', 'http://www.fresher.ru/manager_content/images/12-samyx-prodavaemyx-v-rossii-lyuksovyx-mashin/12.jpg', '2016-08-10 04:29:25', 'Петя', 0, '50000'),
(26, 'Man', 'http://www.truck-center.ru/images/articles/gruzovoy-evakuator-01.jpg', '2016-08-10 16:34:22', 'Дмитрий', 0, '150000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
