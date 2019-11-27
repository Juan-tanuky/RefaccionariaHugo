-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 18:15:11
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `refaccionaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_cliente`, `id_descuento`) VALUES
(1, 1, NULL),
(2, 2, NULL),
(3, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_producto`
--

CREATE TABLE `carrito_producto` (
  `id_carrito_producto` int(11) NOT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_ventas`
--

CREATE TABLE `carrito_ventas` (
  `id_carrito_ventas` int(11) NOT NULL,
  `id_ventas` int(11) DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_cliente` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `codigo_cliente`, `numero_telefono`, `correo`, `direccion`) VALUES
(1, 'Juan Carlos', '2019a', '5567823456', 'juan@correo.com', 'Calle 16 Naucalpan'),
(2, 'Roberto', '2019b', '5501823456', 'reberto@correo.com', 'Calle 19 Huix'),
(3, 'Jose', '2019c', '5568743456', 'jose@correo.com', 'Calle 11 Naucalpan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_descuento` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `porcentaje` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devoluciones` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `codigo_barras` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_login` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre`, `usuario`, `correo`, `numero_telefono`, `direccion`, `rol`, `fecha_alta`, `fecha_login`, `status`, `password`) VALUES
(1, 'Walter Ignacio Nicol', 'wall', 'walina@outlook.es', '5524503950', 'San Francisco Chimal', '1', '2019-10-23 05:13:14', '2019-10-23 05:13:14', b'0', 'hola'),
(2, 'Gustavo', 'gus', 'gustavo@gmail.com', '552415241', 'Santa cruz, Huixquil', '0', '2019-10-23 05:13:14', '2019-10-23 05:13:14', b'1', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipo_pago` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` decimal(7,2) DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasillo`
--

CREATE TABLE `pasillo` (
  `id_pasillo` int(11) NOT NULL,
  `numero_pasillo` int(11) DEFAULT NULL,
  `numero_anaquel` int(11) DEFAULT NULL,
  `numero_repisa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pasillo`
--

INSERT INTO `pasillo` (`id_pasillo`, `numero_pasillo`, `numero_anaquel`, `numero_repisa`) VALUES
(1, 110, 1, 1),
(2, 111, 1, 1),
(3, 112, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `codigo_barras` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_costo` decimal(7,2) DEFAULT NULL,
  `precio_venta` decimal(7,2) DEFAULT NULL,
  `existencia_producto` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_pasillo` int(11) DEFAULT NULL,
  `id_producto_carrito` int(11) DEFAULT NULL,
  `status` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_devolucion` datetime DEFAULT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_ventas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo_barras`, `nombre`, `precio_costo`, `precio_venta`, `existencia_producto`, `id_pasillo`, `id_producto_carrito`, `status`, `fecha_alta`, `fecha_devolucion`, `descripcion`, `numero_ventas`) VALUES
(2, '123def', 'Pinzas', '110.00', '130.00', '10', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '123ghi', 'Tornillos', '99.99', '120.00', '100', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '545231', 'Llaves de presion', '152.00', '200.00', '25', 2, NULL, '1', '2019-11-26 22:11:57', NULL, 'Lllaves', NULL),
(11, '3513565', 'chfds', '65456.00', '64165.00', '6565', 1, NULL, '1', '2019-11-27 01:11:23', NULL, 'jgydurjtdcyt', NULL),
(12, 'dsfds48954', 'Pinzas 2', '65.00', '100.00', '25', 1, NULL, '1', '2019-11-27 01:11:49', NULL, 'Desc', NULL),
(13, 'dsfds845', 'LLL', '45.00', '214.00', '5', 2, NULL, '1', '2019-11-27 01:11:31', NULL, 'SADSA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `venta_total` decimal(7,2) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `subtotal` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `carrito_cliente` (`id_cliente`);

--
-- Indices de la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD PRIMARY KEY (`id_carrito_producto`),
  ADD KEY `carrito_producto_producto` (`id_producto`),
  ADD KEY `carrito_carrito_producto` (`id_carrito`);

--
-- Indices de la tabla `carrito_ventas`
--
ALTER TABLE `carrito_ventas`
  ADD PRIMARY KEY (`id_carrito_ventas`),
  ADD KEY `ventas_carrito_ventas` (`id_ventas`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devoluciones`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pasillo`
--
ALTER TABLE `pasillo`
  ADD PRIMARY KEY (`id_pasillo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_pasillo` (`id_pasillo`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `empleado_ventas` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  MODIFY `id_carrito_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito_ventas`
--
ALTER TABLE `carrito_ventas`
  MODIFY `id_carrito_ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devoluciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pasillo`
--
ALTER TABLE `pasillo`
  MODIFY `id_pasillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `carrito_producto`
--
ALTER TABLE `carrito_producto`
  ADD CONSTRAINT `carrito_carrito_producto` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`),
  ADD CONSTRAINT `carrito_producto_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `carrito_ventas`
--
ALTER TABLE `carrito_ventas`
  ADD CONSTRAINT `ventas_carrito_ventas` FOREIGN KEY (`id_ventas`) REFERENCES `ventas` (`id_ventas`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_pasillo` FOREIGN KEY (`id_pasillo`) REFERENCES `pasillo` (`id_pasillo`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `empleado_ventas` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
