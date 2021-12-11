-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2021 a las 10:19:29
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drew2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `fecha_categoria` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `eliminado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha_categoria`, `eliminado`) VALUES
(1, 'Cosméticos  ', '2021-12-02 10:13:06', 0),
(4, 'Carnicería ', '2021-12-02 10:10:35', 0),
(5, 'Alimentos ', '2021-12-02 09:13:08', 0),
(6, 'Aseo y Mantenimiento ', '2021-12-02 10:10:45', 0),
(7, 'Prueba 1', '2021-12-02 10:23:52', 0),
(8, 'Prueba 2', '2021-12-02 10:22:56', 1),
(28, 'Prueba 2', '2021-12-02 10:23:46', 0),
(29, 'Bebidas', '2021-12-02 16:38:41', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `fecha`) VALUES
(1, 4, '1pLS23k33pl1', 'Brillo de Uñas 2', '', 17, 10, 13, '2021-12-04 08:06:08'),
(2, 5, '5zM387LxN92', 'Harina de Trigo', '', 20, 5.3, 6.3, '2021-12-02 16:24:00'),
(3, 5, '5q20K0na1W3', 'Harina Pan', '', 20, 3.5, 4.3, '2021-12-02 16:24:37'),
(4, 5, '5Ij3Vqr49P1b4', 'Arroz Primor', '', 20, 4.2, 5.1, '2021-12-02 16:26:54'),
(5, 1, '1h9ph12xYbe5', 'Pega Loka 2', '', 20, 0.7, 1.2, '2021-12-04 08:18:28'),
(6, 6, '6n02pKdQ87z6', 'Detergente en Polvo Ace', '', 20, 7.7, 8.6, '2021-12-02 16:28:43'),
(7, 29, '29ku601uReJ7', 'Refresco Glup 2 litros', '', 20, 7, 8.3, '2021-12-02 16:40:07'),
(8, 29, '29sv306yIdZ8', 'Jugo Yukery 1.5 L', '', 20, 12, 16.7, '2021-12-02 16:50:29'),
(9, 6, '6qt411lPqI9', 'Lavaplatos Axion ', '', 20, 6, 6.9, '2021-12-04 06:09:13'),
(10, 5, '5wy348qUwO10', 'Azúcar Montal 1kg', '', 20, 4, 4.7, '2021-12-04 05:11:59'),
(11, 5, '5du104dJkI11', 'Harina Kali 1kg', '', 20, 3.5, 4.2, '2021-12-04 05:14:55'),
(12, 5, '5tg580fUpU12', 'prueba 1', '', 10, 5, 6, '2021-12-04 05:29:03'),
(13, 1, '1pu21.wRcX13', 'Prueba 2', '', 10, 4, 6, '2021-12-04 05:31:43'),
(14, 1, '1eh338fRzA14', 'Prueba 3', '', 10, 4, 6, '2021-12-04 05:34:07'),
(15, 4, '4sa466dPsZ15', 'Prueba 4', '', 12, 4, 6, '2021-12-04 06:16:58'),
(16, 6, '6qg701zUqI16', 'Prueba 5', '', 20, 5, 5.5, '2021-12-04 06:18:08'),
(17, 5, '5ly315dEwP17', 'Prueba 6', '', 20, 6, 6.8, '2021-12-04 06:18:55'),
(18, 4, '4hh681vEkU18', 'Prueba 7', '', 20, 7, 7.3, '2021-12-04 06:21:25'),
(19, 6, '6ko496sAhO19', 'Prueba 8', '', 20, 8, 9.2, '2021-12-04 06:23:20'),
(20, 5, '5yf652xPuU20', 'Prueba 10', '', 10, 3, 4, '2021-12-04 06:26:14'),
(21, 6, '6br489dXbX21', 'Prueba 11', '', 10, 6, 7, '2021-12-04 06:27:59'),
(22, 1, '1es961rEjI22', 'Prueba 12', '', 3, 6, 5.4, '2021-12-04 06:28:21'),
(23, 4, '4hg333aAtZ23', 'Prueba 13', '', 22, 4, 6.2, '2021-12-04 06:30:32'),
(24, 4, '4gn281pJrZ24', 'Prueba 14', '', 22, 1, 2, '2021-12-04 07:12:51'),
(25, 1, '1cu585dXtU25', 'Prueba 15', '', 13, 4, 6.2, '2021-12-04 08:10:35'),
(26, 6, '6lc469aPrJ26', 'Prueba 16', '', 15, 12, 16, '2021-12-04 08:15:30'),
(27, 1, '1ez671vObR27', 'Pruebatelo', '', 33, 2, 33, '2021-12-04 08:22:28'),
(28, 4, '6ns558wJeE28', 'Producto prueba', '', 22, 3, 4, '2021-12-04 08:23:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `perfil` varchar(250) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `eliminado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `perfil`, `estado`, `ultimo_login`, `fecha`, `foto`, `password`, `eliminado`) VALUES
(1, 'Andrés Ramos', 'andres02', 'administrador', 1, '2021-11-25 02:39:28', '2021-11-30 05:58:12', 'views/img/usuarios/andres02/177.jpg', '$2y$10$zHJ2jcPJcYdQab/F.py0deQ22wlV.YzrdvneKpptOQ9RFyC63Ez1C', 0),
(30, 'María Peñaranda', 'maria22', 'estandar', 1, '0000-00-00 00:00:00', '2021-11-29 13:43:03', 'views/img/usuarios/maria22/938.jpg', '$2y$10$oUWk2T8YxHDLopVgFs3fTu/uzOSm0CxWDTjN.wvkHmv8Vcw6CIpha', 1),
(31, 'Marcos De Puerta', 'marcos', 'estandar', 0, '0000-00-00 00:00:00', '2021-11-29 13:42:58', 'views/img/usuarios/marcos/865.jpg', '$2y$10$r1MNzUrvjqSHfI6pORXoEO21o1wWmFykkot5/6Vo98qToymAr4.fu', 1),
(32, 'Rosa MelCulo', 'rosa', 'estandar', 0, '0000-00-00 00:00:00', '2021-12-02 10:09:30', 'views/img/usuarios/rosa/489.jpg', '$2y$10$BalD1zodvqtZAkBsbghhhuKUP0aPmb3hQ8cayxiZbPNhSh9CMQY0K', 1),
(33, 'Juan Uyaban Ravelo', 'juan', 'administrador', 1, '0000-00-00 00:00:00', '2021-11-29 13:27:02', 'views/img/usuarios/juan/338.jpg', '$2y$10$glMRSbzsZIWrhsEBp6UMVubehWDFwWYwzekxk0ZpoXeIl7Z3Jx/YG', 1),
(34, 'Lenny Mendoza', 'lenny', 'estandar', 1, '0000-00-00 00:00:00', '2021-11-29 13:42:53', 'views/img/usuarios/lenny/141.jpg', '$2y$10$tiuRvvj5uaukFZQTAX/ktudOEAhajBnnf4kKs8NRtgPq2ljmLwTl2', 1),
(35, 'Ángel Mendoza', 'amenyaro', 'administrador', 1, '0000-00-00 00:00:00', '2021-11-29 20:29:15', 'views/img/usuarios/amenyaro/978.jpg', '$2y$10$1yUFmT4wgApXXGJfbmmERepZZ194Mgz/7p5eTIUGDwwoveZ0gMs/W', 1),
(36, 'Chen Parker', 'fuyin', 'estandar', 0, '0000-00-00 00:00:00', '2021-11-30 07:22:03', 'views/img/usuarios/fuyin/399.jpg', '$2y$10$rl0BvLJtyxf71nTZW/33g.8kwPSe0Ijtq4239cUX7hMElEmYoR1xW', 1),
(37, 'Andrew Mata', 'andrew', 'administrador', 0, '0000-00-00 00:00:00', '2021-12-02 16:35:15', 'views/img/usuarios/andrew/700.jpg', '$2y$10$1dBrF19SrWRVjSiZ2dgtge1KCJ3WN8Opd.e/tQbDc2stYOAhKM3W2', 0),
(38, 'Drey Mark', 'drey', 'estandar', 0, '0000-00-00 00:00:00', '2021-12-02 09:44:15', 'views/img/usuarios/drey/180.jpg', '$2y$10$YAfPBvnPfb5O3ur/b55vYu4k.vIZZp0EZscq2ps7yWKjyuypzNO8.', 1),
(39, 'Frank Cervelli ', 'frank', 'estandar', 1, '0000-00-00 00:00:00', '2021-12-02 10:22:33', 'views/img/default/user-default.jpg', '$2y$10$7HIzdryhJRQKSe/rpXuC5O7JZC78iRiNbHrmwgHRc8nP7GCKC4L8W', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
