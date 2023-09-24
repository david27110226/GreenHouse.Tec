-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2023 a las 22:48:50
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
-- Base de datos: `green house tec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_sensor`
--

CREATE TABLE `tabla_sensor` (
  `id` int(11) NOT NULL,
  `humedad` int(2) NOT NULL,
  `temperatura` int(2) NOT NULL,
  `temperatura_suelo` varchar(4) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `ventilador` varchar(3) NOT NULL,
  `bomba_agua` varchar(7) NOT NULL,
  `luces` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tabla_sensor`
--

INSERT INTO `tabla_sensor` (`id`, `humedad`, `temperatura`, `temperatura_suelo`, `fecha_hora`, `ventilador`, `bomba_agua`, `luces`) VALUES
(1, 23, 28, 'seco', '0000-00-00 00:00:00', 'off', 'encendi', 'off'),
(2, 23, 28, 'seco', '0000-00-00 00:00:00', 'off', 'encendi', 'off'),
(3, 23, 28, 'seco', '2023-09-24 14:01:56', 'off', 'encendi', 'off'),
(4, 23, 28, 'seco', '2023-09-24 15:30:55', 'off', 'encendi', 'off');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_sensor`
--
ALTER TABLE `tabla_sensor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`humedad`,`temperatura`,`temperatura_suelo`,`fecha_hora`,`ventilador`,`bomba_agua`,`luces`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_sensor`
--
ALTER TABLE `tabla_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
