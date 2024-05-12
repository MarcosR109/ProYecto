-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 12-05-2024 a las 11:48:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombreGenero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombreGenero`) VALUES
(1, 'Figurativo'),
(3, 'Abstracto'),
(5, 'Retrato'),
(6, 'Libre'),
(29, 'Bruja'),
(31, 'Street'),
(56, 'Evento'),
(58, 'Neoplasticismo'),
(59, 'Cartel'),
(60, 'Surrealismo'),
(61, 'General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `ID_OBRA` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Formato` varchar(45) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `NombreObra` varchar(255) NOT NULL,
  `genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`ID_OBRA`, `Titulo`, `Descripcion`, `Formato`, `Usuario_idUsuario`, `NombreObra`, `genero`) VALUES
(127, 'Guernika', 'Picasso pintó esto en una tarde', 'cuadro', 9, 'guer_1234@1234.com.jpg', 3),
(128, 'El fauno', 'Caravaggio se aburría un jueves', 'cuadro', 9, '403805mtsdl_1234@1234.com.jpg', 5),
(133, 'La paloma de la paz', 'Esto lo hizo Picasso', 'cuadro', 4, '801492@2x_dsaf@g.com.jpg', 3),
(134, 'Composicón n2', 'Mondrian mi padre', 'cuadro', 4, '911283absdl_dsaf@g.com.jpg', 58),
(135, 'Cartel', 'Alphons Mucha', 'cuadro', 4, '16966posdl_dsaf@g.com.jpg', 59),
(136, 'La persistencia de la memoria', 'Dali ', 'Formato', 4, 'dali_dsaf@g.com.jpg', 6),
(137, 'Pajarito', 'Un pájaro muy chulo', 'foto', 11, 'Fondo1_rigo@g.com.jpg', 31),
(138, 'Brujo', 'Qué guay', 'foto', 11, 'IMG_5533_dsaf@g.com_rigo@g.com.jpg', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `UsuarioCon` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Email`, `UsuarioCon`, `Nombre`, `Ciudad`) VALUES
(1, 'admin@j.com', '81dc9bdb52d04dc20036dbd8313ed055', 'MarcosAdmin', 'Logroño'),
(3, 'paco@mer.com', '81dc9bdb52d04dc20036dbd8313ed055', 'paco', 'Logroño'),
(4, 'dsaf@g.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Marcos', 'Logroño'),
(5, 'f@g.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Fulgencio', 'Logroño'),
(6, 'Clargos@g.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Carlos', 'Murcia'),
(9, '1234@1234.com', '81dc9bdb52d04dc20036dbd8313ed055', 'PacoMer', '1234'),
(10, 'jose@g.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jose', 'Logroño'),
(11, 'rigo@g.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Rigoberta', 'Cartagena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_intercambia`
--

CREATE TABLE `usuario_intercambia` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Obra_ID_OBRA` int(11) NOT NULL,
  `Fecha` date DEFAULT current_timestamp(),
  `Duracion` int(11) NOT NULL,
  `Confirmacion` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario_intercambia`
--

INSERT INTO `usuario_intercambia` (`Usuario_idUsuario`, `Obra_ID_OBRA`, `Fecha`, `Duracion`, `Confirmacion`) VALUES
(4, 137, '2024-05-12', 15, 1),
(9, 127, '2024-05-12', 20, 1),
(9, 134, NULL, 5, 1),
(9, 138, '2024-05-12', 20, 1),
(11, 136, '2024-05-12', 15, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`ID_OBRA`),
  ADD KEY `fk_Obra_Usuario_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Genero` (`genero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `Nombre_UNIQUE` (`Nombre`);

--
-- Indices de la tabla `usuario_intercambia`
--
ALTER TABLE `usuario_intercambia`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Obra_ID_OBRA`),
  ADD KEY `fk_Usuario_has_Obra_Obra1_idx` (`Obra_ID_OBRA`),
  ADD KEY `fk_Usuario_has_Obra_Usuario1_idx` (`Usuario_idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `ID_OBRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `fk_Genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `fk_Obra_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_intercambia`
--
ALTER TABLE `usuario_intercambia`
  ADD CONSTRAINT `fk_Usuario_has_Obra_Obra1` FOREIGN KEY (`Obra_ID_OBRA`) REFERENCES `obra` (`ID_OBRA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Obra_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
