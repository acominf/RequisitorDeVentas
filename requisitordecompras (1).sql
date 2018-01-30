-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2018 a las 03:06:12
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `requisitordecompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_usuario`
--

CREATE TABLE `info_usuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `nacimiento` date NOT NULL,
  `paginaweb` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `info_usuario`
--

INSERT INTO `info_usuario` (`id`, `usuario_id`, `direccion`, `nacimiento`, `paginaweb`, `img`, `telefono`) VALUES
(1, 2, 'Urb. La florida Av. 2 nÃºmero 92, La Morita 2, vÃ­a Alfaragua, Maracay EDO Aragua', '1991-12-02', 'www.linkedin.com', 'IMG_20150322_145457.jpg', '0424-2076982'),
(2, 4, 'San Luis Potosí, calle Bolivar', '1992-12-12', 'www.peperequisitor.com', 'RP001-1DIV_62853-Andrew-Lin.jpg', '2432458096'),
(3, 6, 'Calle 123 transversal 456 casa 789', '1989-02-12', 'www.mipaginaweb.com', 'RP001-1DIV_62853-Andrew-Lin.jpg', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `proveedor_id`, `descripcion`, `precio`, `img`, `estado`) VALUES
(0, 'Reloj', 2, 'Reloj de pared', 1500, 'reloj.png', 0),
(1, 'Zapatos', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15.5, 'zapatos.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisicion`
--

CREATE TABLE `requisicion` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requisicion`
--

INSERT INTO `requisicion` (`id`, `usuario_id`, `producto_id`, `estado`, `fecha`) VALUES
(3, 4, 0, 0, '2018-01-26'),
(3, 4, 1, 0, '2018-01-26'),
(4, 4, 0, 0, '2018-01-26'),
(4, 4, 1, 0, '2018-01-26'),
(3, 4, 0, 0, '2018-01-26'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(3, 0, 0, 0, '0000-00-00'),
(4, 0, 0, 0, '0000-00-00'),
(5, 6, 0, 0, '2018-01-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `tipo`, `estado`) VALUES
(0, 'Admin', 'admin', 'admin@requisitor.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0),
(1, 'Pedro', 'Perez', 'pp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(5, 'José ', 'Madero', 'pepe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(6, 'Andres', 'Gonzalez', 'agon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_usuario`
--
ALTER TABLE `info_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_usuario`
--
ALTER TABLE `info_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
