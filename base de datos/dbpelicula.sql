-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2019 a las 14:10:32
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpelicula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nombre_cat` varchar(70) NOT NULL,
  `tipo_cat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nombre_cat`, `tipo_cat`) VALUES
(23, 'ANIMADA', 'PRODUCTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_co` int(11) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `watsapp` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `email2` varchar(45) DEFAULT NULL,
  `email3` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `facebook_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pel` int(11) NOT NULL,
  `nombre_pel` varchar(60) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `url_pelicula` varchar(120) DEFAULT NULL,
  `categoria_idcate` int(11) NOT NULL,
  `categoria_nom` varchar(70) DEFAULT NULL,
  `director` varchar(50) NOT NULL,
  `tiempo` time NOT NULL,
  `disponible` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `apto` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pel`, `nombre_pel`, `descripcion`, `url_pelicula`, `categoria_idcate`, `categoria_nom`, `director`, `tiempo`, `disponible`, `sub`, `dob`, `apto`, `link`) VALUES
(1, 'FROZEN II', 'descripcion de la pelicula que veremos ', '0.jpg', 23, 'ANIMADA', 'MONTE', '01:00:20', '2D, 3D ', '1', '1', '', '2HVZuCpb7H4'),
(2, 'nose', 'asdfghm,', '1.jpg', 23, 'ANIMADA', 'qsdfgh', '14:07:04', '2d y 3d', '1', '1', '', ''),
(3, 'asdfg', 'xcvbnm', '2.jpg', 23, 'ANIMADA', '1wq', '29:12:00', '2d', '1', '1', 'APT', ''),
(5, 'PELICULA2', 'PELICULA 2', '18.jpg', 23, NULL, 'GEORGE LUCAS', '00:00:01', 'APT', '-SELECIONE-', '1', '1:20:24', ''),
(6, 'star wars', 'xeqas', '5.jpg', 23, NULL, 'george lucas', '01:20:12', '2D Y 3D', '1', '1', 'APT', ''),
(7, 'Toy Story', 'wdsasada', '17.jpg', 23, NULL, 'nose', '01:20:12', '2D,  3D', '1', '1', 'APT', 'PNiTB4tmt78'),
(11, 'Malefica', 'pelicula de malefica', '3.jpg', 23, NULL, 'nose', '01:20:12', '2D Y 3D', '1', '1', 'apt', 'Jy4k8GHwwxo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nombre`, `apellidos`, `email`, `password`, `tipo_usuario`, `imagen`) VALUES
(9, 'Administrador', 'Sistema', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(7, 'Luis Omar', 'luis@gmail.com', '$2y$10$GmCtIZpQh7DbOFPEgRdYL.iDuOq8FUBvoBRaCRnGtpirEa/NLfdPa'),
(8, 'Luis Omar', 'luisalv@gmail.com', '$2y$10$Ufyl8qT1Mf62WMuTXzQe6OxRBcryA.gzbFlG.1yq73/VfqRD/M4nC'),
(9, 'Jose Pino Pozo', 'jose@gmail.com', '$2y$10$rhRXa1f4BRgaNn05jUBKHOd6ExgkETmOvt35jkXV/eehynrUpMBJK'),
(10, 'Luis Angel', 'angel@gmail.com', '$2y$10$IXYGeRuJS.wQEby4jiNz.OcKVgMfUYXRWugD4M8w7RK46vY3wbXWu'),
(11, 'jesus paniahua', 'jesus@gmail.com', '$2y$10$GnpvrdUFXsI.hfweAV34se.ZL1abXhcD8ivGn2G9j90ilFR8VyfAW'),
(12, 'Luis Alvarez', 'Luiss@gmail.com', '$2y$10$PlqCbt5E8NmyIzj01DGnNu4SOb9hIBTYZPv0szom1Pyy0P1pwkpsK'),
(13, 'Luis Omar', 'webpro9924@gmail.com', '$2y$10$PokWi3Mjby7M9/q09De2/.n6yPN4bwccEHGy7ruziurtsBGlgNslq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `nombre_cat_UNIQUE` (`nombre_cat`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_co`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pel`),
  ADD UNIQUE KEY `nombre_pro_UNIQUE` (`nombre_pel`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria_idcate`),
  ADD KEY `fk_producto_categoria_idx` (`categoria_nom`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_nom`) REFERENCES `categoria` (`nombre_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_idcate`) REFERENCES `categoria` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
