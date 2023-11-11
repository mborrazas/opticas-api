-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 11-11-2023 a las 03:52:05
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crystal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `comercio` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `modelo` int(100) NOT NULL,
  `color` int(100) NOT NULL,
  `tamano` varchar(100) NOT NULL,
  `stocktotal` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `precioMoneda1` decimal(10,0) NOT NULL,
  `marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `codigo`, `comercio`, `idProveedor`, `idCategoria`, `modelo`, `color`, `tamano`, `stocktotal`, `imagen`, `precioMoneda1`, `marca`) VALUES
(20, 'mega articulo', '1234', 1, 1, 4, 2, 4, '123', 123, '', '123', 7),
(21, 'super articulo', '5678', 1, 1, 4, 2, 5, '123', 123, '', '123', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_cierre`
--

CREATE TABLE `caja_cierre` (
  `id` int(11) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `efectivosBS` float NOT NULL,
  `efectivosUSD` float NOT NULL,
  `gastosBS` float NOT NULL,
  `gastosUSD` float NOT NULL,
  `diferenciasBS` float NOT NULL,
  `diferenciasUSD` float NOT NULL,
  `tcBS` float NOT NULL,
  `tcUSD` float NOT NULL,
  `reintegroBS` float NOT NULL,
  `reintegroUSD` float NOT NULL,
  `tdBS` float NOT NULL,
  `tdUSD` float NOT NULL,
  `notaCreditoBS` float NOT NULL,
  `notaCreditoUSD` float NOT NULL,
  `creditoBS` float NOT NULL,
  `creditoUSD` float NOT NULL,
  `totalADepositarBS` float NOT NULL,
  `totalADepositarUSD` float NOT NULL,
  `lote1` float NOT NULL,
  `lote2` float NOT NULL,
  `lote3` float NOT NULL,
  `comercio` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja_cierre`
--

INSERT INTO `caja_cierre` (`id`, `tipo`, `efectivosBS`, `efectivosUSD`, `gastosBS`, `gastosUSD`, `diferenciasBS`, `diferenciasUSD`, `tcBS`, `tcUSD`, `reintegroBS`, `reintegroUSD`, `tdBS`, `tdUSD`, `notaCreditoBS`, `notaCreditoUSD`, `creditoBS`, `creditoUSD`, `totalADepositarBS`, `totalADepositarUSD`, `lote1`, `lote2`, `lote3`, `comercio`, `fecha`) VALUES
(21, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-10-17'),
(22, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-10-17'),
(23, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-10-17'),
(24, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-10-17'),
(25, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-11-03'),
(26, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-11-03'),
(27, 'cierre', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1, '2023-11-03'),
(28, 'apertura', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_cierre_parcial`
--

CREATE TABLE `caja_cierre_parcial` (
  `id` int(11) NOT NULL,
  `efectivosBS` float NOT NULL,
  `efectivosUSD` float NOT NULL,
  `gastosBS` float NOT NULL,
  `gastosUSD` float NOT NULL,
  `diferenciasBS` float NOT NULL,
  `diferenciasUSD` float NOT NULL,
  `tcBS` float NOT NULL,
  `tcUSD` float NOT NULL,
  `reintegroBS` float NOT NULL,
  `reintegroUSD` float NOT NULL,
  `tdBS` float NOT NULL,
  `tdUSD` float NOT NULL,
  `notaCreditoBS` float NOT NULL,
  `notaCreditoUSD` float NOT NULL,
  `creditoBS` float NOT NULL,
  `creditoUSD` float NOT NULL,
  `fecha` datetime NOT NULL,
  `comercio` int(11) NOT NULL,
  `facturado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja_cierre_parcial`
--

INSERT INTO `caja_cierre_parcial` (`id`, `efectivosBS`, `efectivosUSD`, `gastosBS`, `gastosUSD`, `diferenciasBS`, `diferenciasUSD`, `tcBS`, `tcUSD`, `reintegroBS`, `reintegroUSD`, `tdBS`, `tdUSD`, `notaCreditoBS`, `notaCreditoUSD`, `creditoBS`, `creditoUSD`, `fecha`, `comercio`, `facturado`) VALUES
(3, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-09-10 19:44:17', 1, NULL),
(4, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-09-10 20:08:31', 1, NULL),
(5, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-10-17 21:46:05', 1, NULL),
(6, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-11-03 19:11:45', 1, NULL),
(7, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-11-03 19:13:47', 1, NULL),
(8, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-11-03 19:14:32', 1, NULL),
(9, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-11-03 19:15:30', 1, NULL),
(10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '2023-11-03 19:16:46', 1, NULL),
(11, 150, 0, 123, 0, 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-07 03:23:08', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idComercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `idComercio`) VALUES
(1, 'Lentes\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `idPais` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `idPais`, `nombre`, `estado`) VALUES
(1, 1, 'Caracas', 17),
(2, 1, 'Maracaibo', 26),
(3, 1, 'Valencia', 8),
(4, 1, 'Barquisimeto', 15),
(5, 1, 'Valencia', 8),
(6, 1, 'Barquisimeto', 15),
(7, 1, 'Maracay', 5),
(8, 1, 'Ciudad Guayana', 7),
(9, 1, 'Maturín', 18),
(10, 1, 'Barinas', 6),
(11, 1, 'Maturín', 18),
(12, 1, 'Barinas', 6),
(13, 1, 'San Cristóbal', 22),
(14, 1, 'Ciudad Bolívar', 7),
(15, 1, 'San Cristóbal', 22),
(16, 1, 'Ciudad Bolívar', 7),
(17, 1, 'Barcelona', 3),
(18, 1, 'Cumaná', 21),
(19, 1, 'Barcelona', 3),
(20, 1, 'Cumaná', 21),
(21, 1, 'Cabimas', 26),
(22, 1, 'Mérida', 16),
(23, 1, 'Cabimas', 26),
(24, 1, 'Mérida', 16),
(25, 1, 'Puerto La Cruz', 3),
(26, 1, 'Guatire', 17),
(27, 1, 'Puerto La Cruz', 3),
(28, 1, 'Guatire', 17),
(29, 1, 'Ciudad Ojeda', 26),
(30, 1, 'Punto Fijo', 13),
(31, 1, 'Ciudad Ojeda', 26),
(32, 1, 'Punto Fijo', 13),
(33, 1, 'Coro', 13),
(34, 1, 'Coro', 13),
(35, 1, 'Turmero', 5),
(36, 1, 'Los Teques', 17),
(37, 1, 'Turmero', 5),
(38, 1, 'Los Teques', 17),
(39, 1, 'Guanare', 20),
(40, 1, 'Tocuyito', 8),
(41, 1, 'Guanare', 20),
(42, 1, 'Tocuyito', 8),
(43, 1, 'San Felipe', 25),
(44, 1, 'Acarigua', 20),
(45, 1, 'San Felipe', 25),
(46, 1, 'Acarigua', 20),
(47, 1, 'Carora', 15),
(48, 1, 'El Tigre', 3),
(49, 1, 'Carora', 15),
(50, 1, 'El Tigre', 3),
(51, 1, 'Guarenas', 17),
(52, 1, 'Cabudare', 15),
(53, 1, 'Guarenas', 17),
(54, 1, 'Cabudare', 15),
(55, 1, 'Carúpano', 21),
(56, 1, 'San Fernando de Apure', 4),
(57, 1, 'Carúpano', 21),
(58, 1, 'San Fernando de Apure', 4),
(59, 1, 'Guacara', 8),
(60, 1, 'Puerto Cabello', 8),
(61, 1, 'Guacara', 8),
(62, 1, 'Puerto Cabello', 8),
(63, 1, 'El Tocuyo', 15),
(64, 1, 'Valera', 23),
(65, 1, 'El Tocuyo', 15),
(66, 1, 'Valera', 23),
(67, 1, 'La Victoria', 5),
(68, 1, 'Los Guayos', 8),
(69, 1, 'La Victoria', 5),
(70, 1, 'Los Guayos', 8),
(71, 1, 'Santa Rita', 5),
(72, 1, 'Güigüe', 8),
(73, 1, 'Santa Rita', 5),
(74, 1, 'Güigüe', 8),
(75, 1, 'Anaco', 3),
(76, 1, 'San Juan de los Morros', 14),
(77, 1, 'Anaco', 3),
(78, 1, 'San Juan de los Morros', 14),
(79, 1, 'Quibor', 15),
(80, 1, 'El Vigía', 16),
(81, 1, 'Quibor', 15),
(82, 1, 'El Vigía', 16),
(83, 1, 'Palo Negro', 5),
(84, 1, 'San Carlos', 9),
(85, 1, 'Palo Negro', 5),
(86, 1, 'San Carlos', 9),
(87, 1, 'Mariara', 8),
(88, 1, 'Villa de Cura', 5),
(89, 1, 'Mariara', 8),
(90, 1, 'Villa de Cura', 5),
(91, 1, 'Ocumare del Tuy', 17),
(92, 1, 'Yaritagua', 25),
(93, 1, 'Ocumare del Tuy', 17),
(94, 1, 'Yaritagua', 25),
(95, 1, 'Cúa', 17),
(96, 1, 'Aracure', 20),
(97, 1, 'Cúa', 17),
(98, 1, 'Aracure', 20),
(99, 1, 'Calabozo', 14),
(100, 1, 'Táriba', 22),
(101, 1, 'Calabozo', 14),
(102, 1, 'Táriba', 22),
(103, 1, 'Guasdualito', 4),
(104, 1, 'Puerto Ayacucho', 2),
(105, 1, 'Guasdualito', 4),
(106, 1, 'Puerto Ayacucho', 2),
(107, 1, 'Machiques', 26),
(108, 1, 'Cagua', 5),
(109, 1, 'Machiques', 26),
(110, 1, 'Cagua', 5),
(111, 1, 'Porlamar', 19),
(112, 1, 'Charallave', 17),
(113, 1, 'Porlamar', 19),
(114, 1, 'Charallave', 17),
(115, 1, 'La Asunción', 19),
(116, 1, 'Valle de la Pascua', 14),
(117, 1, 'La Asunción', 19),
(118, 1, 'Valle de la Pascua', 14),
(119, 1, 'Santa Lucía', 17),
(120, 1, 'Trujillo', 23),
(121, 1, 'Santa Lucía', 17),
(122, 1, 'Trujillo', 23),
(123, 1, 'Quíbor', 19),
(124, 1, 'Tinaquillo', 9),
(125, 1, 'Quíbor', 19),
(126, 1, 'Tinaquillo', 9),
(127, 1, 'Puerto Píritu', 3),
(128, 1, 'El Limón', 5),
(129, 1, 'Puerto Píritu', 3),
(130, 1, 'El Limón', 5),
(131, 1, 'El Limón', 5),
(132, 1, 'Socopó', 6),
(133, 1, 'El Limón', 5),
(134, 1, 'Socopó', 6),
(137, 1, 'Boconó', 23),
(138, 1, 'Punta de Mata', 18),
(139, 1, 'Boconó', 23),
(140, 1, 'Punta de Mata', 18),
(141, 1, 'Ejido', 16),
(142, 1, 'Upata', 7),
(143, 1, 'Ejido', 16),
(144, 1, 'Upata', 7),
(145, 1, 'Rubio', 22),
(146, 1, 'Caja Seca', 26),
(147, 1, 'Rubio', 22),
(148, 1, 'Caja Seca', 26),
(149, 1, 'Tumeremo', 7),
(150, 1, 'Caripito', 18),
(151, 1, 'Tumeremo', 7),
(152, 1, 'Caripito', 18),
(153, 1, 'La Grita', 22),
(154, 1, 'Santa Bárbara del Zulia', 26),
(155, 1, 'La Grita', 22),
(156, 1, 'Santa Bárbara del Zulia', 26),
(157, 1, 'Tucupita', 10),
(158, 1, 'San José de Guanipa', 3),
(159, 1, 'Tucupita', 10),
(160, 1, 'San José de Guanipa', 3),
(161, 1, 'Chivacoa', 25),
(162, 1, 'Lechería', 3),
(163, 1, 'Chivacoa', 25),
(164, 1, 'Lechería', 3),
(165, 1, 'Zaraza', 14),
(166, 1, 'Nirgua', 25),
(167, 1, 'Zaraza', 14),
(168, 1, 'Nirgua', 25),
(169, 1, 'Siquisique', 15),
(170, 1, 'Santa Rita', 26),
(171, 1, 'Siquisique', 15),
(172, 1, 'Santa Rita', 26),
(173, 1, 'Guanta', 3),
(174, 1, 'Morón', 8),
(175, 1, 'Guanta', 3),
(176, 1, 'Morón', 8),
(177, 1, 'Pariaguán', 3),
(178, 1, 'San Juan de Colón', 22),
(179, 1, 'Pariaguán', 3),
(180, 1, 'San Juan de Colón', 22),
(181, 1, 'San Joaquín', 8),
(182, 1, 'Altagracia de Orituco', 14),
(183, 1, 'San Joaquín', 8),
(184, 1, 'Altagracia de Orituco', 14),
(185, 1, 'San Antonio de los Altos', 17),
(186, 1, 'Caicara del Orinoco', 7),
(187, 1, 'San Antonio de los Altos', 17),
(188, 1, 'Caicara del Orinoco', 7),
(189, 1, 'Achaguas', 4),
(190, 1, 'Biruaca', 4),
(191, 1, 'Achaguas', 4),
(192, 1, 'Biruaca', 4),
(193, 1, 'Santa Bárbara (Barinas)', 6),
(194, 1, 'Pampatar', 19),
(195, 1, 'Santa Bárbara (Barinas)', 6),
(196, 1, 'Pampatar', 19),
(197, 1, 'Bachaquero', 26),
(198, 1, 'Bachaquero', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `comercio` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `ci` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `fNacimiento` date NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono1` varchar(100) NOT NULL,
  `telefono2` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `ubranizacion` varchar(100) NOT NULL,
  `codigoPostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `comercio`, `tipo`, `nombre`, `ci`, `genero`, `fNacimiento`, `ocupacion`, `email`, `telefono1`, `telefono2`, `direccion`, `ciudad`, `estado`, `ubranizacion`, `codigoPostal`) VALUES
(2, 2, 'paciente', 'matias', '123', 'masculino', '1997-02-12', '12', '123', '123', '123', '123', 1, 1, '123', 123),
(11, 1, 'cliente', '123', '123', 'masculino', '2023-10-16', '', '', '123', '123', '123', 123, 1, '1', 1),
(15, 1, 'cliente', '123', '123', 'masculino', '2023-10-16', '', '', 'njjj', '123', '123', 123, 1, '1', 1),
(16, 1, 'cliente', '123', '123', 'masculino', '2023-10-16', '', '', 'asdf', '123', '123', 123, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`, `comercio`) VALUES
(2, 'Rojo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_licence` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numeroDeFactura` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `pendienteDePago` double NOT NULL,
  `pagada` int(11) DEFAULT NULL,
  `comercio` int(11) NOT NULL,
  `estadoFacturado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `numeroDeFactura`, `proveedor`, `estado`, `moneda`, `subtotal`, `descuento`, `iva`, `total`, `pendienteDePago`, `pagada`, `comercio`, `estadoFacturado`) VALUES
(16, '2023-10-23', 123, 5, 'entregada', 'bs', '123', '0', '27', '150', 150.06, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_articulos`
--

CREATE TABLE `compras_articulos` (
  `id` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `impuesto` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `idArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras_articulos`
--

INSERT INTO `compras_articulos` (`id`, `idCompra`, `cantidad`, `precio`, `impuesto`, `descuento`, `total`, `idArticulo`) VALUES
(10, 16, 1, '123', '22', '0', '150', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_pagos`
--

CREATE TABLE `compras_pagos` (
  `id` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `tipoPago` varchar(100) NOT NULL,
  `facturado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras_pagos`
--

INSERT INTO `compras_pagos` (`id`, `idCompra`, `fecha`, `total`, `tipoPago`, `facturado`) VALUES
(1, 16, '2023-11-06', '100', 'efectivo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `ci` varchar(150) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `movil` varchar(150) NOT NULL,
  `telefonoHabitacion` varchar(150) NOT NULL,
  `telefonoOficina` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `urbanizacion` varchar(150) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `codigo`, `imagen`, `nombre`, `ci`, `genero`, `fechaNacimiento`, `email`, `movil`, `telefonoHabitacion`, `telefonoOficina`, `direccion`, `idCiudad`, `idEstado`, `urbanizacion`, `codigoPostal`, `comercio`) VALUES
(2, 123, '', '123', '123', 'masculino', '1997-10-12', '123', '123', '123', '123', '123', 1, 1, '123', 123, 0),
(4, 123, '', 'Matias', '51435309', 'masculino', '2023-01-01', 'test@gmail.com', '123', '123', '123', '123', 0, 0, '123', 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(2, 'Amazonas'),
(3, 'Anzoátegui'),
(4, 'Apure'),
(5, 'Aragua'),
(6, 'Barinas'),
(7, 'Bolívar'),
(8, 'Carabobo'),
(9, 'Cojedes'),
(10, 'Delta Amacuro'),
(11, 'Dependencias Federales'),
(12, 'Distrito Federal'),
(13, 'Falcón'),
(14, 'Guárico'),
(15, 'Lara'),
(16, 'Mérida'),
(17, 'Miranda'),
(18, 'Monagas'),
(19, 'Nueva Esparta'),
(20, 'Portuguesa'),
(21, 'Sucre'),
(22, 'Táchira'),
(23, 'Trujillo'),
(24, 'Vargas'),
(25, 'Yaracuy'),
(26, 'Zulia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `comercio` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono1` varchar(100) NOT NULL,
  `telefono2` varchar(100) NOT NULL,
  `telefono3` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `urbanizacion` varchar(100) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `responsable` varchar(150) NOT NULL,
  `movilResponsable` varchar(100) NOT NULL,
  `emailResponsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id`, `codigo`, `nombre`, `comercio`, `email`, `telefono1`, `telefono2`, `telefono3`, `fax`, `direccion`, `idCiudad`, `idEstado`, `urbanizacion`, `codigoPostal`, `responsable`, `movilResponsable`, `emailResponsable`) VALUES
(3, 123, 'pruebaApi', 1, '123', '123', '123', '123', '123', 'dkfjlasdjfl', 1, 1, '123', 123, '123', '123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `comercio`) VALUES
(4, 'test3', 1),
(5, '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id`, `nombre`, `comercio`) VALUES
(7, '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `comercio` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `RIF` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `telefono2` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `urbanizacion` varchar(150) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `responsable` varchar(150) NOT NULL,
  `movilResponsable` varchar(150) NOT NULL,
  `emailResponsable` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `img`, `comercio`, `codigo`, `nombre`, `RIF`, `email`, `telefono`, `telefono2`, `fax`, `direccion`, `idCiudad`, `idEstado`, `urbanizacion`, `codigoPostal`, `responsable`, `movilResponsable`, `emailResponsable`) VALUES
(5, '', 1, 123, '123', 123, '123', '123', '123', '123', '123', 1, 1, '123', 123, '123', '123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_items`
--

CREATE TABLE `stock_items` (
  `id` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock_items`
--

INSERT INTO `stock_items` (`id`, `idSucursal`, `idArticulo`, `stock`) VALUES
(1, 4, 6, 123),
(2, 4, 7, 200),
(3, 6, 16, 123),
(4, 12, 1, 123),
(5, 12, 20, 123),
(6, 12, 21, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `idComercio` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `telefono1` varchar(50) NOT NULL,
  `telefono2` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `movil` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `urbanizacion` varchar(150) NOT NULL,
  `codigoPostal` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `idComercio`, `numero`, `tipo`, `telefono1`, `telefono2`, `email`, `fax`, `movil`, `direccion`, `ciudad`, `estado`, `urbanizacion`, `codigoPostal`, `nombre`) VALUES
(12, 1, 123, 'central', '12444443', '123', '123', '123', '123', '123', 1, 2, '123', 123, NULL),
(13, 1, 123, 'sucursal', '123', '213', '123@gmail.com', '12', '123', '123', 1, 1, '123', 123, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanos`
--

CREATE TABLE `tamanos` (
  `id` int(11) NOT NULL,
  `tamano` varchar(150) NOT NULL,
  `comercio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tamanos`
--

INSERT INTO `tamanos` (`id`, `tamano`, `comercio`) VALUES
(4, '', 1),
(5, '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `ci` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `idComercio` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nombre` varchar(140) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `movil` varchar(100) NOT NULL,
  `telefonoHabitacion` varchar(100) NOT NULL,
  `hobbie` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `urbanizacion` varchar(100) NOT NULL,
  `codigoPostal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ci`, `password`, `idComercio`, `email`, `nombre`, `tipo`, `sucursal`, `genero`, `fechaNacimiento`, `movil`, `telefonoHabitacion`, `hobbie`, `direccion`, `ciudad`, `estado`, `urbanizacion`, `codigoPostal`) VALUES
(3, '123', '12', 1, 'borrazas.trabajo@gmail.com', '123', 'encargado', 1, 'femenino', '2023-03-12', '123', '123', '123', '123', 1, 1, '123', 123),
(4, '123', '12', 1, 'borrazas.trabajo@gmail.com', '123', 'encargado', 1, 'femenino', '2023-08-15', '123', '123', '123', '123', 1, 1, '123', 123),
(5, '4444', '123', 1, '444', '4444123', 'encargado', 1, 'femenino', '2023-08-23', '4444', '444', '444', '444', 1, 1, '444', 44444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `comercio` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `ci` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `estadoFacturacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `comercio`, `tipo`, `fecha`, `moneda`, `idCliente`, `ci`, `telefono`, `direccion`, `email`, `subtotal`, `descuento`, `iva`, `total`, `estado`, `estadoFacturacion`) VALUES
(25, 1, 'ordenDeTrabajo', '2023-10-23', 'bs', 11, '123', '123', '123', 'test@gmail.com', '123', '0', '27', '150', 'Activa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_pagos`
--

CREATE TABLE `ventas_pagos` (
  `id` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `tipoPago` varchar(30) NOT NULL,
  `facturado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas_pagos`
--

INSERT INTO `ventas_pagos` (`id`, `idVenta`, `fecha`, `total`, `tipoPago`, `facturado`) VALUES
(1, 25, '2023-10-23', 123, 'efectivo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_producto`
--

CREATE TABLE `ventas_producto` (
  `id` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `imp` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas_producto`
--

INSERT INTO `ventas_producto` (`id`, `idVenta`, `idProducto`, `descripcion`, `cantidad`, `precio`, `imp`, `descuento`, `total`) VALUES
(10, 12, 9, '123', 1, '1', '22', '0', '1'),
(13, 25, 20, 'mega articulo', 1, '123', '22', '0', '150');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caja_cierre`
--
ALTER TABLE `caja_cierre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caja_cierre_parcial`
--
ALTER TABLE `caja_cierre_parcial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras_articulos`
--
ALTER TABLE `compras_articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras_pagos`
--
ALTER TABLE `compras_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock_items`
--
ALTER TABLE `stock_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tamanos`
--
ALTER TABLE `tamanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_pagos`
--
ALTER TABLE `ventas_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_producto`
--
ALTER TABLE `ventas_producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `caja_cierre`
--
ALTER TABLE `caja_cierre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `caja_cierre_parcial`
--
ALTER TABLE `caja_cierre_parcial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `compras_articulos`
--
ALTER TABLE `compras_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras_pagos`
--
ALTER TABLE `compras_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `stock_items`
--
ALTER TABLE `stock_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tamanos`
--
ALTER TABLE `tamanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ventas_pagos`
--
ALTER TABLE `ventas_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas_producto`
--
ALTER TABLE `ventas_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `estado` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
