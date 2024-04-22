-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.2:3306
-- Tiempo de generación: 14-12-2023 a las 15:06:06
-- Versión del servidor: 5.5.8
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_chat`
--

CREATE TABLE `datos_chat` (
  `id` int(11) NOT NULL,
  `preguntas` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `respuestas` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_unico` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `id_unico_respuesta` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `datos_chat`
--

INSERT INTO `datos_chat` (`id`, `preguntas`, `respuestas`, `fecha`, `nombre`, `correo`, `telefono`, `id_unico`, `fecha_cierre`, `id_unico_respuesta`) VALUES
(1528, 'Buenas noches, chat', '', '2023-11-22 16:09:03', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963971', '0000-00-00 00:00:00', ''),
(1537, 'Buenas noches, chat estoy haciendo pruebas', '', '2023-11-22 16:09:39', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963971', '0000-00-00 00:00:00', ''),
(1538, 'Hola chat', '', '2023-11-22 13:24:58', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963971', '0000-00-00 00:00:00', ''),
(1539, 'Hola chat', '', '2023-11-22 16:16:35', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1540, 'Hola chat', '', '2023-11-22 16:16:35', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1541, 'Hola chat', '', '2023-11-22 16:16:35', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1542, 'Hola chat', '', '2023-11-22 16:16:35', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1543, 'Hola chat', '', '2023-11-22 16:28:09', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1544, 'Hola chat', '', '2023-11-22 16:28:10', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1545, 'Hola chat', '', '2023-11-22 16:28:10', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1546, 'Hola chat', '', '2023-11-22 16:28:10', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1547, '', '', '2023-11-22 16:30:05', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1548, '', '', '2023-11-22 16:30:06', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1549, '', '', '2023-11-22 16:30:06', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1550, '', '', '2023-11-22 16:30:06', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1551, '', '', '2023-11-22 16:30:06', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1552, '', '', '2023-11-22 16:30:06', 'Aaron Hernandez', 'aaron.hernandez@xybooster.com', '5559670274', '963972', '0000-00-00 00:00:00', ''),
(1553, 'Buenas Tardes !!', '', '2023-12-14 07:55:13', 'dasasasdas', 'ahdzmore@gmail.com', '32156456321', '511785', '0000-00-00 00:00:00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_chat`
--
ALTER TABLE `datos_chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_chat`
--
ALTER TABLE `datos_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1554;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
