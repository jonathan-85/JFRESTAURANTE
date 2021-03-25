-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2021 a las 23:54:05
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jfrestaurante`
--
CREATE DATABASE IF NOT EXISTS `jfrestaurante` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jfrestaurante`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Products`
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products` (
  `id` int(8) NOT NULL,
  `product_type` enum('hamburger','pizza','beverage') DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Products`
--

INSERT INTO `Products` (`id`, `product_type`, `photo_url`, `name`, `description`, `price`, `createdAt`, `updatedAt`) VALUES
(1, 'pizza', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616526903/46772959-9900-4913-a290-0ce03abefccb_ituvhr.jpg', 'Pizza Hawaiana', 'Pizza con textura gruesa y rellena de queso, con jamón.', 19000, '2021-03-23 20:41:27', '2021-03-23 20:41:27'),
(5, 'beverage', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529395/pestana3/Pepsi_ofhlta.webp', 'Pepsi', 'Una refrescante bebida', 2000, '2021-03-23 23:00:49', '2021-03-23 23:00:49'),
(6, 'beverage', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529386/pestana3/Coca_cola_bvt8m3.webp', 'Coca Cola', 'Una refrescante bebida', 2500, '2021-03-23 23:04:55', '2021-03-23 23:04:55'),
(7, 'beverage', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529405/pestana3/Spride_incytm.webp', 'Sprite', 'Una refrescante bebida', 1500, '2021-03-23 23:06:29', '2021-03-23 23:06:29'),
(8, 'hamburger', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529392/pestana3/Hamburguesa_con_queso_f1fqsc.webp', 'Hamburguesa con Queso', 'Una rica hamburguesa con un queso derretido delicioso', 5000, '2021-03-23 23:10:31', '2021-03-23 23:10:31'),
(9, 'hamburger', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529393/pestana3/Hamburguesa_con_tocineta_yimeja.webp', 'Hamburguesa con tocineta', 'Una rica tocineta es la que lleva una rica hamburguesa', 7000, '2021-03-23 23:12:40', '2021-03-23 23:12:40'),
(10, 'hamburger', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529390/pestana3/Hamburguesa_con_pollo_qiktdp.webp', 'Hamburguesa con Pollo', 'Rica hamburguesa saludable con carne de pollo', 5000, '2021-03-23 23:13:34', '2021-03-23 23:13:34'),
(11, 'pizza', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529398/pestana3/pizza_numero_1_hhstdn.webp', 'Pizza jamón y queso', 'Rica Pizza de jamón y queso', 20000, '2021-03-23 23:16:52', '2021-03-23 23:16:52'),
(12, 'pizza', 'https://res.cloudinary.com/kurtcovayne4/image/upload/v1616529400/pestana3/Pizza_numero_tres_usvufi.webp', 'Pizza de Salami', 'Pizza con rico Salami italiano original', 22000, '2021-03-23 23:17:15', '2021-03-23 23:17:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Purchases`
--

DROP TABLE IF EXISTS `Purchases`;
CREATE TABLE `Purchases` (
  `id` int(8) NOT NULL,
  `creator_id` int(8) DEFAULT NULL,
  `product_id` int(8) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(8) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` char(95) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `Users` (`id`, `name`, `email`, `password`, `createdAt`, `updatedAt`) VALUES (1, 'admin admin', 'admin@jfrestaurante.com', '$2y$11$rsL5SxuzOm/PaddiNTj89eb7aaN.6.s/K68nSJIK0MYDJ5/kVem/6', CURRENT_TIME(), CURRENT_TIME());
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Purchases`
--
ALTER TABLE `Purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `Purchases`
--
ALTER TABLE `Purchases`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Purchases`
--
ALTER TABLE `Purchases`
  ADD CONSTRAINT `Purchases_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
