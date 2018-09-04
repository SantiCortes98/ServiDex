-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2018 a las 02:02:45
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servitex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(2, 'Mantenimiento de Computadores', '2018-04-04 04:07:39'),
(3, 'Soporte De Seguridad', '2018-04-04 04:08:09'),
(4, 'Soporte De Ofimatica', '2018-04-04 04:08:26'),
(5, 'Soporte De Redes', '2018-04-05 03:06:32'),
(6, 'Soporte De Software', '2018-04-07 01:55:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `correo` text COLLATE utf8_spanish_ci NOT NULL,
  `num_celular` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `area_trabajo` text COLLATE utf8_spanish_ci NOT NULL,
  `incidencias` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `documento`, `correo`, `num_celular`, `fecha_nacimiento`, `area_trabajo`, `incidencias`, `fecha`) VALUES
(3, 'Mauricio Salazar', 0, 'mauro.salazae@hotmail.com', '315458741', '0000-00-00', 'Despachos', 0, '2018-04-21 04:04:09'),
(4, 'Mateo Quintero', 0, 'mateo.quintero@hotmail.com', '3175584', '0000-00-00', 'Despachos', 0, '2018-04-21 04:04:09'),
(5, 'Alejandra Acevedo', 0, 'alejandra.acevedo@hotmail.com', '31145214', '0000-00-00', 'Mantenimiento', 0, '2018-04-21 04:04:09'),
(6, 'Alexis Gomez', 0, 'alexis.gomez@hotmail.com', '3145645', '0000-00-00', 'Gerencia', 0, '2018-04-21 04:04:09'),
(7, 'Gerardo Le?ero', 0, 'gerardo.lenero@gmail.com', '3168541', '0000-00-00', 'Contaduria', 0, '2018-04-21 04:04:09'),
(8, 'Francisco Pulgarin', 0, 'francisco.pulgarin@gmail.com', '3174587', '0000-00-00', 'Administrativa', 0, '2018-04-21 04:04:09'),
(9, 'Array', 0, 'Array', '0', '0000-00-00', 'Array', 0, '2018-04-21 04:04:09'),
(10, 'Array', 0, 'Array', '0', '0000-00-00', 'Array', 0, '2018-04-21 04:04:09'),
(11, 'Santiago Cortes', 1017258736, 'santiag.carmona@gmail.com', '3169005', '0000-00-00', 'Contaduria', 0, '2018-04-21 04:04:09'),
(12, 'hola', 10145874, 'sdxsa@hotmail.com', '0', '1998-05-14', 'Sistemas', 0, '2018-04-21 05:11:22'),
(13, 'Santiago Cortes', 47885454, 'santiag.carmona@gmail.com', '(445) 555-45555', '2088-05-04', 'Operaciones', 0, '2018-04-21 05:40:23'),
(14, 'Jhonny Valencia', 1014587, 'jhonny@hotmail.com', '(316) 985-74556', '1998-04-05', 'Operaciones', 0, '2018-04-21 16:10:34'),
(15, 'Jhonny Botero', 4578745, 'jhonny@hotmail.com', '(345) 784-58745', '1985-11-15', 'Gerencia', 0, '2018-05-02 03:14:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(11) NOT NULL,
  `tipo_componente` text COLLATE utf8_spanish_ci NOT NULL,
  `nom_componente` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `tipo_componente`, `nom_componente`) VALUES
(1, 'PC', 'Tarjeta Madre'),
(2, 'PC', 'Memoria RAM'),
(3, 'PC', 'Fuente de Energia'),
(4, 'PC', 'Disco Duro'),
(5, 'PC', 'Dispositivo Solo Lectura'),
(6, 'PC', 'Procesador'),
(7, 'PC', 'Bus IDE'),
(8, 'PC', 'Bus SATA'),
(9, 'PC', 'Monitor'),
(10, 'PC', 'Teclado'),
(11, 'PC', 'Mouse'),
(12, 'PC', 'Impresora'),
(13, 'PC', 'Camara Frontal'),
(14, 'PC', 'Cable VGA'),
(15, 'Redes', 'Tarjeta de Red'),
(16, 'Redes', 'Router'),
(17, 'Redes', 'Switch'),
(18, 'Redes', 'Gateways'),
(19, 'Redes', 'Repetidor'),
(20, 'Redes', 'Cable UTP'),
(21, 'Redes', 'RG-45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojadevida`
--

CREATE TABLE `hojadevida` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nom_aparato` text COLLATE utf8_spanish_ci NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_aparato` text COLLATE utf8_spanish_ci NOT NULL,
  `componentes` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_componente` text COLLATE utf8_spanish_ci NOT NULL,
  `licencia` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_us` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hojadevida`
--

INSERT INTO `hojadevida` (`id`, `id_cliente`, `nom_aparato`, `marca`, `estado_aparato`, `componentes`, `estado_componente`, `licencia`, `fecha`, `id_us`, `id_perfil`) VALUES
(1, 3, 'Laptop', 'Lenovo', 'Mal estado', '', '', 'Linux', '2018-05-18 03:37:05', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `incidencias` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_categoria`, `codigo`, `descripcion`, `incidencias`, `fecha`) VALUES
(2, 5, 101, 'configuracion del router', 10, '2018-06-01 03:43:32'),
(3, 5, 102, 'configuracion del switche', 5, '2018-06-01 03:43:39'),
(4, 5, 103, 'configuracion ip ', 20, '2018-06-01 03:43:42'),
(5, 5, 104, 'configuracion firewall', 15, '2018-06-01 03:43:46'),
(6, 3, 200, 'perdida de usuario', 5, '2018-06-01 03:43:50'),
(8, 2, 300, 'limpieza el equipo del hardware', 4, '2018-06-01 03:43:53'),
(9, 2, 301, 'instalacion de memoria', 20, '2018-06-01 03:43:58'),
(10, 2, 302, 'cambio la fuente del poder', 11, '2018-06-01 03:44:04'),
(11, 4, 400, 'Actualizacion Paquete Microsft Office', 3, '2018-06-01 03:44:09'),
(12, 2, 303, 'Instalacion de Oracle XE', 19, '2018-06-01 03:44:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `incidencias` text COLLATE utf8_spanish_ci NOT NULL,
  `estados` text COLLATE utf8_spanish_ci NOT NULL,
  `artefacto_tecnologico` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `id_tecnico`, `id_perfil`, `id_cliente`, `codigo`, `incidencias`, `estados`, `artefacto_tecnologico`, `observaciones`, `fecha`, `total`) VALUES
(1, 9, 9, 3, 10001, '[{\"id\":\"3\",\"descripcion\":\"configuracion del switche\"}]', 'Bueno', 'Router', 'kjkj', '2018-06-02 13:53:19', 10),
(2, 9, 9, 15, 10002, '[{\"id\":\"3\",\"descripcion\":\"configuracion del switche\"},{\"id\":\"2\",\"descripcion\":\"configuracion del router\"}]', '#', 'Router', 'Mal conexion con los puertos ip', '2018-06-02 13:53:23', 20),
(3, 1, 1, 5, 10003, '[{\"id\":\"2\",\"descripcion\":\"configuracion del router\"},{\"id\":\"3\",\"descripcion\":\"configuracion del switche\"}]', '#', '#', 'cvdfd', '2018-06-02 13:53:27', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, ' Sr Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Administrador', 'vistas/img/usuarios/admin/733.png', 1, '2018-06-03 15:32:29', '2018-06-03 20:32:30'),
(5, 'ana valentina marin', 'ana', '$2a$07$asxx54ahjppf45sd87a5auzGfz9GaOjSPJ5jEDpHii9vSQEEqY1Zm', 'Tecnico Redes', 'vistas/img/usuarios/ana/288.jpg', 1, '2018-03-31 14:08:17', '2018-04-02 01:44:34'),
(9, 'Santiago Cortes', 'santi', '$2a$07$asxx54ahjppf45sd87a5ausHGX4qdUOzq52AozCbNYklbYaqYdUJ2', 'Tecnico Seguridad', 'vistas/img/usuarios/santi/805.jpg', 1, '2018-05-26 11:05:58', '2018-05-26 16:05:58'),
(10, 'Alejo Garcia', 'alejo', '$2a$07$asxx54ahjppf45sd87a5auvoU.3.4eN7NufCLTyMMirTOrF/ygn7S', 'Tecnico Mantenimiento', 'vistas/img/usuarios/alejo/715.jpg', 1, '0000-00-00 00:00:00', '2018-04-06 02:23:20'),
(11, 'Valen Ortiz', 'valen', '$2a$07$asxx54ahjppf45sd87a5auX6eUn6CokwLDveSfeB7fatONmq8RLkW', 'Call Center', 'vistas/img/usuarios/valen/679.jpg', 1, '2018-05-26 10:57:54', '2018-05-26 15:57:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hojadevida`
--
ALTER TABLE `hojadevida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `hojadevida`
--
ALTER TABLE `hojadevida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
