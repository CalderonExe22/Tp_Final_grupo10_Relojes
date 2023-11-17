-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 20:25:57
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
-- Base de datos: `bdcarritocomprasdani3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idcompra` bigint(20) NOT NULL,
  `cofecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idusuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcompra`, `cofecha`, `idusuario`) VALUES
(22, '2023-11-15 18:07:58', 1),
(23, '2023-11-15 18:11:28', 1),
(24, '2023-11-15 19:12:51', 4),
(25, '2023-11-15 19:40:07', 1),
(26, '2023-11-15 19:44:35', 4),
(27, '2023-11-16 23:22:32', 22),
(28, '2023-11-17 17:30:20', 4),
(29, '2023-11-17 17:33:10', 4),
(30, '2023-11-17 17:34:03', 4),
(31, '2023-11-17 17:55:44', 4),
(32, '2023-11-17 18:52:02', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestado`
--

CREATE TABLE `compraestado` (
  `idcompraestado` bigint(20) UNSIGNED NOT NULL,
  `idcompra` bigint(11) NOT NULL,
  `idcompraestadotipo` int(11) NOT NULL,
  `cefechaini` timestamp NOT NULL DEFAULT current_timestamp(),
  `cefechafin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraestado`
--

INSERT INTO `compraestado` (`idcompraestado`, `idcompra`, `idcompraestadotipo`, `cefechaini`, `cefechafin`) VALUES
(119, 22, 5, '2023-11-15 18:08:00', '2023-11-15 18:08:08'),
(120, 22, 1, '2023-11-15 18:08:07', '2023-11-15 18:09:23'),
(121, 22, 2, '2023-11-15 18:09:23', '2023-11-15 18:09:25'),
(122, 22, 3, '2023-11-15 18:09:25', '0000-00-00 00:00:00'),
(123, 23, 5, '2023-11-15 18:11:29', '2023-11-15 18:58:27'),
(124, 23, 1, '2023-11-15 18:58:26', '2023-11-15 18:58:44'),
(125, 23, 2, '2023-11-15 18:58:44', '2023-11-15 18:58:54'),
(126, 23, 4, '2023-11-15 18:58:54', '0000-00-00 00:00:00'),
(127, 24, 5, '2023-11-15 19:12:51', '2023-11-15 19:35:15'),
(128, 24, 1, '2023-11-15 19:35:14', '2023-11-15 19:35:52'),
(129, 24, 2, '2023-11-15 19:35:52', '2023-11-15 19:35:54'),
(130, 24, 3, '2023-11-15 19:35:54', '0000-00-00 00:00:00'),
(131, 25, 5, '2023-11-15 19:40:08', '2023-11-15 19:40:24'),
(132, 25, 1, '2023-11-15 19:40:23', '2023-11-15 19:40:36'),
(133, 25, 4, '2023-11-15 19:40:36', '0000-00-00 00:00:00'),
(134, 26, 5, '2023-11-15 19:44:36', '2023-11-15 19:44:58'),
(135, 26, 1, '2023-11-15 19:44:57', '2023-11-15 19:45:10'),
(136, 26, 2, '2023-11-15 19:45:10', '2023-11-15 19:45:12'),
(137, 26, 3, '2023-11-15 19:45:12', '0000-00-00 00:00:00'),
(138, 27, 5, '2023-11-16 23:22:32', '2023-11-16 23:28:56'),
(139, 27, 1, '2023-11-16 23:28:56', '2023-11-17 13:46:49'),
(140, 27, 2, '2023-11-17 13:46:49', '2023-11-17 14:52:04'),
(141, 27, 3, '2023-11-17 14:52:04', '0000-00-00 00:00:00'),
(142, 28, 5, '2023-11-17 17:30:20', '2023-11-17 17:30:32'),
(143, 28, 1, '2023-11-17 17:30:32', '2023-11-17 17:30:44'),
(144, 28, 2, '2023-11-17 17:30:44', '2023-11-17 17:31:07'),
(145, 28, 4, '2023-11-17 17:31:07', '0000-00-00 00:00:00'),
(146, 29, 5, '2023-11-17 17:33:10', '2023-11-17 17:33:57'),
(147, 29, 1, '2023-11-17 17:33:57', '2023-11-17 17:34:34'),
(148, 30, 5, '2023-11-17 17:34:03', '2023-11-17 17:34:15'),
(149, 30, 1, '2023-11-17 17:34:15', '2023-11-17 17:34:46'),
(150, 29, 2, '2023-11-17 17:34:34', '2023-11-17 17:35:04'),
(151, 30, 4, '2023-11-17 17:34:46', '0000-00-00 00:00:00'),
(152, 29, 4, '2023-11-17 17:35:04', '0000-00-00 00:00:00'),
(153, 31, 5, '2023-11-17 17:55:44', '0000-00-00 00:00:00'),
(154, 32, 5, '2023-11-17 18:52:02', '2023-11-17 18:52:36'),
(155, 32, 1, '2023-11-17 18:52:36', '2023-11-17 18:52:59'),
(156, 32, 2, '2023-11-17 18:52:59', '2023-11-17 19:05:08'),
(157, 32, 4, '2023-11-17 19:05:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraestadotipo`
--

CREATE TABLE `compraestadotipo` (
  `idcompraestadotipo` int(11) NOT NULL,
  `cetdescripcion` varchar(50) NOT NULL,
  `cetdetalle` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraestadotipo`
--

INSERT INTO `compraestadotipo` (`idcompraestadotipo`, `cetdescripcion`, `cetdetalle`) VALUES
(1, 'iniciada', 'cuando el usuario : cliente inicia la compra de uno o mas productos del carrito'),
(2, 'aceptada', 'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 '),
(3, 'enviada', 'cuando el usuario administrador envia a uno de las compras en estado =2 '),
(4, 'cancelada', 'un usuario administrador podra cancelar una compra en cualquier estado y un usuario cliente solo en estado=1 '),
(5, 'carrito', 'arreglo de productos del cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraitem`
--

CREATE TABLE `compraitem` (
  `idcompraitem` bigint(20) UNSIGNED NOT NULL,
  `idproducto` bigint(20) NOT NULL,
  `idcompra` bigint(20) NOT NULL,
  `cicantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `compraitem`
--

INSERT INTO `compraitem` (`idcompraitem`, `idproducto`, `idcompra`, `cicantidad`) VALUES
(51, 93, 22, 1),
(53, 93, 23, 3),
(56, 93, 24, 1),
(57, 94, 24, 1),
(58, 93, 25, 1),
(59, 96, 25, 1),
(61, 96, 26, 1),
(62, 95, 27, 2),
(64, 93, 28, 1),
(65, 94, 29, 2),
(66, 94, 30, 3),
(68, 93, 32, 2),
(69, 95, 32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idmenu` bigint(20) NOT NULL,
  `menombre` varchar(50) NOT NULL COMMENT 'Nombre del item del menu',
  `medescripcion` varchar(124) NOT NULL COMMENT 'Descripcion mas detallada del item del menu',
  `idpadre` bigint(20) DEFAULT NULL COMMENT 'Referencia al id del menu que es subitem',
  `medeshabilitado` timestamp NULL DEFAULT current_timestamp() COMMENT 'Fecha en la que el menu fue deshabilitado por ultima vez'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `menombre`, `medescripcion`, `idpadre`, `medeshabilitado`) VALUES
(8, 'Productos', '	\r\n../Home/productos.php', NULL, NULL),
(9, 'Administrador Permisos', '#', NULL, NULL),
(10, 'Administrar Menu-Roles', '../Admin/tablaMenuRoles.php', 9, '0000-00-00 00:00:00'),
(11, 'Administrar Roles', '../Admin/tablaRoles.php', 9, NULL),
(12, 'Administrar Usuarios', '../Admin/tablaUsuarios.php', 9, NULL),
(13, 'Cliente Permisos', '#', NULL, NULL),
(14, 'Ver Carrito', '../Cliente/carrito.php', 13, NULL),
(15, 'Listado de Compras', '../Cliente/listaCompras.php', 13, NULL),
(16, 'Deposito Permisos', '#', NULL, '0000-00-00 00:00:00'),
(17, 'Ver Compras', '../Deposito/tablaCompras.php', 16, NULL),
(18, 'Ver Productos', '../Deposito/tablaProductos.php', 16, NULL),
(29, 'Iniciar sesion', '../login/login.php', NULL, NULL),
(30, 'Modificar perfil', '../Cliente/modificarPerfil.php', 13, NULL),
(31, 'Cerrar sesion', '../login/accion/cerrarSesion.php', NULL, NULL),
(32, 'ingresar Producto', '../Deposito/ingresarProducto.php', 16, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menurol`
--

CREATE TABLE `menurol` (
  `idmenu` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menurol`
--

INSERT INTO `menurol` (`idmenu`, `idrol`) VALUES
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(9, 1),
(13, 3),
(16, 2),
(29, 4),
(31, 1),
(31, 2),
(31, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `pronombre` varchar(50) NOT NULL,
  `prodetalle` varchar(512) NOT NULL,
  `procantstock` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `prodeshabilitado` timestamp NULL DEFAULT current_timestamp(),
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `pronombre`, `prodetalle`, `procantstock`, `precio`, `prodeshabilitado`, `imagen`) VALUES
(93, 'Rolex', '../img/reloj1.jpg', 21, 120000, '0000-00-00 00:00:00', 'reloj1.jpg'),
(94, 'Rolex geneva', '../img/reloj2.jpg', 3, 300000, '0000-00-00 00:00:00', 'reloj2.jpg'),
(95, 'Omega speedmaster', '../img/reloj3.jpg', 10, 150000, '0000-00-00 00:00:00', 'reloj3.jpg'),
(96, 'Cat', '../img/reloj4.jpg', 21, 50000, '0000-00-00 00:00:00', 'reloj4.jpg'),
(97, 'Scuderial Alphatauro', '../img/reloj5.jpg', 3, 100000, '0000-00-00 00:00:00', 'reloj5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `rodescripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rodescripcion`) VALUES
(1, 'admin'),
(2, 'deposito'),
(3, 'cliente'),
(4, 'deslogeado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` bigint(20) NOT NULL,
  `usnombre` varchar(50) NOT NULL,
  `uspass` varchar(150) NOT NULL,
  `usmail` varchar(50) NOT NULL,
  `usdeshabilitado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usnombre`, `uspass`, `usmail`, `usdeshabilitado`) VALUES
(1, 'multiRol', 'd41d8cd98f00b204e9800998ecf8427e', 'yo@hotmail.com', '2023-11-16 23:21:16'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', NULL),
(3, 'deposito', 'caaf856169610904e4f188e6ee23e88c', 'deposito@gmail.com', NULL),
(4, 'cliente', '7159bbe0c8ca2a67230a26b72dea7557', 'cliente@gmail.com', NULL),
(21, 'pepe', '9fe75de7500e7073d749469bb3a46cc2', 'pepe@gmail.com', '2023-11-16 23:21:30'),
(22, 'yo', '9fe75de7500e7073d749469bb3a46cc2', 'yo@mi.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`idusuario`, `idrol`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(22, 2),
(22, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`),
  ADD UNIQUE KEY `idcompra` (`idcompra`),
  ADD KEY `fkcompra_1` (`idusuario`);

--
-- Indices de la tabla `compraestado`
--
ALTER TABLE `compraestado`
  ADD PRIMARY KEY (`idcompraestado`),
  ADD UNIQUE KEY `idcompraestado` (`idcompraestado`),
  ADD KEY `fkcompraestado_1` (`idcompra`),
  ADD KEY `fkcompraestado_2` (`idcompraestadotipo`);

--
-- Indices de la tabla `compraestadotipo`
--
ALTER TABLE `compraestadotipo`
  ADD PRIMARY KEY (`idcompraestadotipo`);

--
-- Indices de la tabla `compraitem`
--
ALTER TABLE `compraitem`
  ADD PRIMARY KEY (`idcompraitem`),
  ADD UNIQUE KEY `idcompraitem` (`idcompraitem`),
  ADD KEY `fkcompraitem_1` (`idcompra`),
  ADD KEY `fkcompraitem_2` (`idproducto`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`),
  ADD UNIQUE KEY `idmenu` (`idmenu`),
  ADD KEY `fkmenu_1` (`idpadre`);

--
-- Indices de la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD PRIMARY KEY (`idmenu`,`idrol`),
  ADD KEY `fkmenurol_2` (`idrol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD UNIQUE KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `idrol` (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`idusuario`,`idrol`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `compraestado`
--
ALTER TABLE `compraestado`
  MODIFY `idcompraestado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `compraitem`
--
ALTER TABLE `compraitem`
  MODIFY `idcompraitem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fkcompra_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraestado`
--
ALTER TABLE `compraestado`
  ADD CONSTRAINT `fkcompraestado_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraestado_2` FOREIGN KEY (`idcompraestadotipo`) REFERENCES `compraestadotipo` (`idcompraestadotipo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraitem`
--
ALTER TABLE `compraitem`
  ADD CONSTRAINT `fkcompraitem_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcompraitem_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fkmenu_1` FOREIGN KEY (`idpadre`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menurol`
--
ALTER TABLE `menurol`
  ADD CONSTRAINT `fkmenurol_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmenurol_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `fkmovimiento_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
