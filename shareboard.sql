-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2024 a las 10:11:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shareboard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `name` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '排序字段'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `pid`, `name`, `sort`) VALUES
(1, 0, 'Drupal', NULL),
(2, 0, 'Symfony2', NULL),
(3, 0, 'Vue.js', NULL),
(4, 0, 'Ionic', NULL),
(5, 0, 'Laravel', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shares`
--

CREATE TABLE `shares` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `shares`
--

INSERT INTO `shares` (`id`, `cid`, `user_id`, `title`, `body`, `link`, `create_date`) VALUES
(1, 1, 1, 'test1', 'Nullam sagittis. Pellentesque dapibus hendrerit tortor. Donec id justo. Curabitur a felis in nunc fringilla tristique.Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Vivamus consectetuer hendrerit lacus. Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula, eget egestas libero turpis vel mi.', 'https://www.baidu.com/', '2016-07-04 10:20:45'),
(2, 1, 1, '·ÖÏíÃÀºÃÉú»î', 'Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Etiam ultricies nisi vel augue. In hac habitasse platea dictumst. Aenean imperdiet. Nam adipiscing.\r\n\r\nEtiam ultricies nisi vel augue. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Nullam sagittis. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.', 'http://jingyan.baidu.com/article/cbf0e500ecb6632eaa28930c.html', '2016-07-04 11:35:56'),
(3, 2, 1, 'Curabitur at lacus ac', 'Phasellus a est. Curabitur turpis. Duis vel nibh at velit scelerisque suscipit. In auctor lobortis lacus.\r\n\r\nVestibulum volutpat pretium libero. Maecenas egestas arcu quis ligula mattis placerat. Curabitur blandit mollis lacus. Fusce convallis metus id felis luctus adipiscing.', 'https://themeforest.net', '2016-07-06 16:05:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `register_date`) VALUES
(1, 'town.chen', '120935692@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-04 10:06:43'),
(2, 'test', 'test@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-04 10:35:31'),
(3, 'ÍÐ¶ûË¹Ì©', 'test2@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-07-04 11:34:47'),
(4, 'pepe', 'pepe', '926e27eecdbc7a18858b3798ba99bddd', '2024-04-15 09:11:12'),
(5, 'pepe2', 'pepe2', '21e32f84867d76cee490323da1f2995f', '2024-04-15 09:22:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
