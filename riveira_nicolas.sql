-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2026 a las 14:24:11
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
-- Base de datos: `riveira_nicolas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `num1` float DEFAULT NULL,
  `num2` float DEFAULT NULL,
  `operacion` varchar(50) NOT NULL,
  `resultado` float DEFAULT NULL,
  `mes` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `signo` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `nombre`, `num1`, `num2`, `operacion`, `resultado`, `mes`, `dia`, `signo`, `fecha`) VALUES
(1, 'Nico', 25, 20, 'sumar', 45, 1, 24, 'Acuario', '2026-05-04 19:36:48'),
(2, 'Nico', 25, 20, 'signo', NULL, 1, 24, 'Acuario', '2026-05-04 19:36:51'),
(3, 'Nico', 25, 20, 'multiplicar', 500, 1, 24, 'Acuario', '2026-05-04 19:36:55'),
(4, 'Maria', 25, 500.2, 'signo', NULL, 6, 28, 'Cáncer', '2026-05-05 12:05:21'),
(5, 'Maria', 25, 500.2, 'multiplicar', 12505, 6, 28, 'Cáncer', '2026-05-05 12:05:25'),
(6, 'Maria', 25, 500.2, 'restar', -475.2, 6, 28, 'Cáncer', '2026-05-05 12:05:27'),
(7, 'Maria', 25, 500.2, 'sumar', 525.2, 6, 28, 'Cáncer', '2026-05-05 12:05:30'),
(8, 'Maria', 25, 500.2, 'multiplicar', 12505, 6, 28, 'Cáncer', '2026-05-05 12:05:35'),
(9, 'Pablo', 567, 2124.62, 'sumar', 2691.62, 2, 28, 'Piscis', '2026-05-05 12:21:55'),
(10, 'Pablo', 567, 2124.62, 'restar', -1557.62, 2, 28, 'Piscis', '2026-05-05 12:21:58'),
(11, 'Pablo', 567, 2124.62, 'multiplicar', 1204660, 2, 28, 'Piscis', '2026-05-05 12:21:59'),
(12, 'Pablo', 567, 2124.62, 'signo', NULL, 2, 28, 'Piscis', '2026-05-05 12:22:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
