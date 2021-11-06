-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2021 a las 21:15:56
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dinero` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `identificacion`, `dinero`) VALUES
(1, 'Carlos Castro', '123456', 20000.00),
(2, 'Arturo Agudelo', '654321', 55328.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2021_01_17_081815_create_jugadores_table', 1),
(14, '2021_11_05_184024_create_rondas_detalle_table', 1),
(15, '2021_11_05_192607_create_numeros_table', 1),
(16, '2021_11_06_011032_create_rondas_maestro_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numeros`
--

CREATE TABLE `numeros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probabilidad` double(3,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `numeros`
--

INSERT INTO `numeros` (`id`, `numero`, `color`, `probabilidad`) VALUES
(1, '0', '#00b347', 0.001),
(2, '1', '#e61919', 0.495),
(3, '2', '#000000', 0.495),
(4, '3', '#e61919', 0.495),
(5, '4', '#000000', 0.495),
(6, '5', '#e61919', 0.495),
(7, '6', '#000000', 0.495),
(8, '7', '#e61919', 0.495),
(9, '8', '#000000', 0.495),
(10, '9', '#e61919', 0.495),
(11, '10', '#000000', 0.495),
(12, '11', '#000000', 0.495),
(13, '12', '#e61919', 0.495),
(14, '13', '#000000', 0.495),
(15, '14', '#e61919', 0.495),
(16, '15', '#000000', 0.495),
(17, '16', '#e61919', 0.495),
(18, '17', '#000000', 0.495),
(19, '18', '#e61919', 0.495),
(20, '19', '#e61919', 0.495),
(21, '20', '#000000', 0.495),
(22, '21', '#e61919', 0.495),
(23, '22', '#000000', 0.495),
(24, '23', '#e61919', 0.495),
(25, '24', '#000000', 0.495),
(26, '25', '#e61919', 0.495),
(27, '26', '#000000', 0.495),
(28, '27', '#e61919', 0.495),
(29, '28', '#000000', 0.495),
(30, '29', '#000000', 0.495),
(31, '30', '#e61919', 0.495),
(32, '31', '#000000', 0.495),
(33, '32', '#e61919', 0.495),
(34, '33', '#000000', 0.495),
(35, '34', '#e61919', 0.495),
(36, '35', '#000000', 0.495),
(37, '36', '#e61919', 0.495);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rondas_detalle`
--

CREATE TABLE `rondas_detalle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ronda` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `id_numero` int(11) NOT NULL,
  `valor_apuesta` double(10,2) NOT NULL,
  `tipo_resultado` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_resultado` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rondas_maestro`
--

CREATE TABLE `rondas_maestro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resultado` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rondas_maestro`
--

INSERT INTO `rondas_maestro` (`id`, `resultado`) VALUES
(1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `numeros`
--
ALTER TABLE `numeros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rondas_detalle`
--
ALTER TABLE `rondas_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rondas_maestro`
--
ALTER TABLE `rondas_maestro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `numeros`
--
ALTER TABLE `numeros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `rondas_detalle`
--
ALTER TABLE `rondas_detalle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rondas_maestro`
--
ALTER TABLE `rondas_maestro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
