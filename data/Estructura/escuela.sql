-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2019 a las 00:25:34
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itext`
--

CREATE TABLE `itext` (
  `ID` int(11) NOT NULL,
  `idf` int(11) DEFAULT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `itext`
--

INSERT INTO `itext` (`ID`, `idf`, `value`) VALUES
(1, NULL, 'Prueba 1'),
(2, NULL, 'Prueba 2'),
(3, NULL, 'Hola'),
(4, NULL, 'Hola me llamo Germán García García'),
(5, NULL, 'Con una empezó, la otra me atrapo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `itext`
--
ALTER TABLE `itext`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idf` (`idf`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `itext`
--
ALTER TABLE `itext`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `itext`
--
ALTER TABLE `itext`
  ADD CONSTRAINT `itext_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `itext` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
