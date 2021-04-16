-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2021 a las 02:08:35
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion_3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo_de_barra` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `fecha_de_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) VALUES
(1001, '77900361', 'Westmacott', 'liquido', 33, 15.87, '2021-09-02', '2020-09-26'),
(1002, '77900362', 'Spirit', 'solido', 45, 66.6, '2020-09-18', '2020-04-14'),
(1003, '77900363', 'Newgroshv', 'polvo', 0, 68.19, '2020-11-29', '2021-02-11'),
(1004, '77900364', 'McNickle', 'polvo', 0, 53.51, '2020-11-28', '2020-04-17'),
(1005, '77900365', 'Hudd', 'solido', 68, 66.6, '2020-12-19', '2020-06-19'),
(1006, '77900366', 'Schrader', 'polvo', 96, 54.87, '2020-08-02', '2020-04-18'),
(1007, '77900367', 'Bachellier', 'solido', 59, 66.6, '2021-01-30', '2020-06-07'),
(1008, '77900368', 'Fleming', 'solido', 38, 66.6, '2020-10-26', '2020-03-10'),
(1009, '77900369', 'Hurry', 'solido', 44, 66.6, '2020-07-04', '2020-05-30'),
(1010, '77900310', 'Krauss', 'polvo', 73, 35.73, '2021-03-03', '2020-08-30'),
(1012, '4546648', 'Chocolate', 'solido', 33, 66.6, '2021-04-15', '2021-04-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
