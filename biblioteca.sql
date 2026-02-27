-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-02-2026 a las 15:15:17
-- Versión del servidor: 8.0.45-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `codigo` varchar(4) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `tipo` enum('Revista','Libro') NOT NULL,
  `anio` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`codigo`, `titulo`, `tipo`, `anio`) VALUES
('001', 'Leyenda', 'Libro', '1990'),
('002', 'Revista Corazón', 'Revista', NULL),
('003', 'Revista Loca', 'Revista', NULL),
('004', 'El mejor Libro', 'Libro', '1250'),
('005', 'El gran Libro', 'Libro', '1999'),
('006', 'Revista Normalilla', 'Revista', NULL),
('007', 'Agente 007', 'Libro', '2005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `dniUsuario` varchar(9) NOT NULL,
  `codigoLibro` varchar(4) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fechaDevolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`dniUsuario`, `codigoLibro`, `fechaEntrega`, `fechaDevolucion`) VALUES
('11A', '001', '2026-02-27', '2026-02-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `tipo` enum('Socio','Usuario Ocasional') NOT NULL,
  `numPrestamos` int NOT NULL DEFAULT '0',
  `maxPrestamos` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `tipo`, `numPrestamos`, `maxPrestamos`) VALUES
('11A', 'Juan', 'Usuario Ocasional', 0, 2),
('1234A', 'David', 'Socio', 0, 250);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`dniUsuario`,`codigoLibro`,`fechaEntrega`),
  ADD KEY `fk_usuario` (`dniUsuario`),
  ADD KEY `fk_libro` (`codigoLibro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_libro` FOREIGN KEY (`codigoLibro`) REFERENCES `documentos` (`codigo`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`dniUsuario`) REFERENCES `usuarios` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
