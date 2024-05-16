-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 22 2023 г., 13:36
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `login`, `pass`) VALUES
(1, 'Ilyas', 'admin', 'admin'),
(2, 'Fedotov', 'admin', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `task` varchar(255) NOT NULL,
  `worker` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `status`, `price`, `name`, `email`, `task`, `worker`) VALUES
(1, 5, '2023-05-24', 'Заказ подтверждён', 79990.00, 'Савельев А.Е.', 'savgy@mail.ru', 'Создать Дизайн сайта \"Спортив\"', 'Lozman'),
(2, 5, '2023-05-25', 'Заказ подтверждён', 199990.00, 'Ромашов А.В.', 'romashik@gmail.ru', 'Создать Дизайн сайта \"3D-верстка\"', 'Lozman'),
(3, 5, '2023-05-25', 'Заказ подтверждён', 279980.00, 'Вдовиченко Ф.И.', 'vdov@gmail.com', 'Создать Дизайн сайта \"Картинг\"', 'Lozman'),
(4, 5, '2023-05-29', 'Заказ подтверждён', 279980.00, 'Турсунбеков И.У.', 'itur@mail.ru', 'Создать Дизайн сайта \"Дизайнер сайтов\"', 'Ilyas'),
(5, 5, '2023-05-30', 'Заказ подтверждён', 199990.00, 'Федотов И.В.', 'thebestеacherintheworld@college', 'Создать Дизайн сайта \"Колледж Царицыно\"', 'Vlad'),
(6, 6, '2023-12-21', 'Заказ в обработке', 123300.00, 'Ilyas', 'ilyas.tur@mail.ru', 'Создать дизайн сайта &#34;Строительная фирма&#34;', 'Lozman'),
(7, 6, '2023-12-21', 'Заказ в обработке', 123300.00, 'Ilyas', 'ilyas.tur@mail.ru', 'Создать дизайн сайта &#34;Строительная фирма&#34;', 'Lozman'),
(8, 6, '2023-12-21', 'Заказ в обработке', 1233002.00, 'Ilyas', 'ilyas.tur@mail.ru', 'Создать дизайн сайта &#34;Круто&#34;', 'Lozman'),
(9, 6, '2023-12-21', 'Заказ в обработке', 1233002.00, 'Ilyas', 'ilyas.tur@mail.ru', 'Создать дизайн сайта &#34;Круто&#34;', 'Lozman'),
(38, 6, '2023-12-21', 'Заказ в обработке', 1233002.00, 'Ilyas', 'ilyas.tur@mail.ru', 'Создать дизайн сайта &#34;Круто&#34;', 'Lozman'),
(39, 6, '2023-12-22', 'Заказ в обработке', 1233002.00, 'Ilyas', 'ilyas.tur@mail.ru', 'Создать дизайн сайта &#34;Круто&#34;', 'Lozman');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image`, `type_id`) VALUES
(1, 'Дизайн Многостраничного сайта', 'Большой проект от 30к', 12999.99, 'img/Desing.jpg', 1),
(2, 'Создание Логотипа', 'Маленький проект от 2к', 2990.99, 'img/logo.jpeg', 1),
(3, 'Дизайн Сайта Landing', 'Средний проект от 5к', 9990.99, 'img/Landing.png', 1),
(4, 'Дизайн Одностраничного сайта', 'Малый проект от 3к', 4990.99, 'img/one page.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`type_id`, `name`) VALUES
(1, 'Инструменты'),
(2, 'Одежда');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `address`, `phone`) VALUES
(5, 'admin@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 'Данила', 'Москва', '+79995007777'),
(6, 'ilyas17@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'Ilyas', 'Moscow', '+79268183959'),
(7, 'db@wdw.ru', '58dc574ad761cc5953a57065ae12508d', 'вц', 'вц', '+734'),
(8, 'ilyas.tursunbekov17@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'Ильяс', 'Москва', '+79268183959'),
(10, 'ilyas.tur@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', 'Ильяс', 'Москва', '+792434113232');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `product_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
