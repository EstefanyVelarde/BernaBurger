-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 08:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bernaburger`
--
CREATE DATABASE IF NOT EXISTS `bernaburger` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bernaburger`;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` char(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `direccion`, `telefono`, `correo`, `edo`) VALUES
(1, 'client', 'new', 'abc', '1234567890', '122@dd.d', 0),
(4, '', '', '', '', '', 0),
(5, 'p', 'p', 'p', '1234567829', 'correo@prueba.cm', 0),
(6, '', '', '', '', '', 0),
(7, '', '', '', '', '', 0),
(8, 'Editar otra vez', 'Cliente', 'Dir', '1234556790', 'q@q.q', 0),
(9, 'dfj', 'hj', 'bhu', '2222222223', 'q@l.s', 0),
(10, 'Prueba', 'reset', 'frm', '1253367489', 'q@d.d', 0),
(11, 'Prueba', 'Reset 2', 'abdc', '1234567890', 'q@q.q', 0);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `iva` double NOT NULL,
  `total` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`idcompra`, `usuario`, `fecha`, `idproveedor`, `tipo`, `status`, `subtotal`, `iva`, `total`, `edo`) VALUES
(22, 'user', '2020-05-13 13:30:04', 68, 1, 0, 900, 1890, 2790, 0),
(23, 'user', '2020-05-13 13:30:30', 68, 0, 0, 243, 510.3, 753.3, 0),
(24, 'user', '2020-05-13 14:23:51', 70, 0, 0, 100, 210, 310, 0),
(25, 'user', '2020-05-13 14:29:01', 70, 0, 0, 100, 210, 310, 0),
(26, 'user', '2020-05-13 14:30:43', 70, 0, 0, 893, 1875.3, 2768.3, 0),
(27, 'user', '2020-05-13 14:54:15', 70, 0, 0, 700, 1470, 2170, 0),
(28, 'user', '2020-05-13 16:56:07', 70, 1, 0, 20, 42, 62, 0),
(29, 'user', '2020-05-13 16:56:47', 70, 0, 0, 20, 42, 62, 0),
(30, 'user', '2020-05-13 16:58:05', 70, 0, 0, 20, 42, 62, 0),
(31, 'user', '2020-05-14 02:44:16', 68, 0, 0, 50, 105, 155, 0),
(32, 'user', '2020-05-14 06:08:18', 68, 0, 0, 180, 378, 558, 0),
(33, 'user', '2020-05-14 06:11:24', 65, 0, 0, 1000, 2100, 3100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `compradetalle`
--

CREATE TABLE `compradetalle` (
  `idcompradetalle` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compradetalle`
--

INSERT INTO `compradetalle` (`idcompradetalle`, `idcompra`, `idproducto`, `cantidad`, `costo`, `subtotal`) VALUES
(1, 25, 2, 4, 25, 100),
(2, 26, 2, 5, 25, 125),
(3, 26, 8, 12, 10, 120),
(4, 26, 15, 12, 54, 648),
(5, 27, 15, 2, 20, 40),
(6, 27, 32, 33, 20, 660),
(7, 28, 34, 5, 4, 20),
(8, 29, 34, 5, 4, 20),
(9, 30, 34, 5, 4, 20),
(10, 31, 34, 5, 10, 50),
(11, 32, 23, 4, 45, 180),
(12, 33, 11, 5, 200, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `importe` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`idevento`, `idcliente`, `fecha`, `importe`, `edo`) VALUES
(1, 10, '0000-00-00 00:00:00', 0, 0),
(2, 8, '0000-00-00 00:00:00', 0, 0),
(3, 10, '0000-00-00 00:00:00', 0, 0),
(4, 8, '0000-00-00 00:00:00', 0, 0),
(5, 9, '0000-00-00 00:00:00', 0, 0),
(6, 8, '0000-00-00 00:00:00', 0, 0),
(7, 8, '0000-00-00 00:00:00', 0, 0),
(8, 9, '0000-00-00 00:00:00', 0, 1),
(9, 8, '2020-05-12 17:05:00', 0, 0),
(10, 10, '2020-05-05 17:06:00', 0, 0),
(11, 8, '2020-05-28 07:07:00', 0, 0),
(12, 11, '0000-00-00 00:00:00', 0, 1),
(13, 10, '2020-05-25 14:01:00', 335, 0),
(14, 9, '0000-00-00 00:00:00', 335, 0),
(15, 11, '0000-00-00 00:00:00', 335, 0),
(16, 10, '0000-00-00 00:00:00', 1200, 0),
(17, 9, '0000-00-00 00:00:00', 335, 1),
(18, 9, '2020-05-13 14:02:00', 335, 1),
(19, 10, '2020-05-27 08:08:00', 1535, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventodetalle`
--

CREATE TABLE `eventodetalle` (
  `ideventodetalle` int(11) NOT NULL,
  `idevento` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventodetalle`
--

INSERT INTO `eventodetalle` (`ideventodetalle`, `idevento`, `idservicio`, `costo`) VALUES
(1, 11, 2, 335),
(2, 12, 2, 335),
(3, 12, 3, 1200),
(4, 13, 2, 335),
(5, 14, 2, 335),
(6, 15, 2, 335),
(7, 16, 3, 1200),
(8, 17, 2, 335),
(9, 18, 2, 335),
(10, 19, 2, 335),
(11, 19, 3, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `idorden` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `mesa` int(11) NOT NULL,
  `instrucciones` text DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `importe` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orden`
--

INSERT INTO `orden` (`idorden`, `usuario`, `mesa`, `instrucciones`, `estado`, `importe`, `edo`) VALUES
(1, '2', 0, 'Sin kethup', 'terminado', 0, 0),
(2, '2', 3, NULL, 'terminado', 0, 0),
(3, '1', 3, NULL, 'pendiente', 0, 0),
(4, '2', 5, NULL, 'terminado', 0, 0),
(5, '1', 2, NULL, 'terminado', 0, 0),
(6, 'user', 1, '', 'cancelada', 0, 0),
(7, 'user', 1, '', 'cancelada', 0, 0),
(8, 'user', 1, '', 'cancelada', 0, 0),
(9, 'user', 1, '', 'cancelada', 0, 0),
(10, 'user', 1, '', 'pendiente', 0, 0),
(11, 'user', 1, '', 'terminado', 0, 0),
(12, 'user', 1, '', 'terminado', 0, 0),
(13, 'user', 1, 'Con aderezos', 'terminado', 0, 0),
(14, 'user', 3, 'Sin salsa', 'terminado', 0, 0),
(15, 'user', 5, 'Prueba cambio', 'terminado', 0, 0),
(16, 'user', 5, 'Prueba exist', 'terminado', 0, 0),
(17, 'user', 3, 'Prueba exist ahora si', 'pendiente', 0, 0),
(18, 'user', 1, 'hhhhh', 'terminado', 0, 0),
(19, 'user', 1, '', 'cancelada', 23, 0),
(20, 'user', 1, '', 'pendiente', 45, 0),
(21, 'user', 1, 'abc', 'terminado', 100, 0),
(22, 'user', 1, '', 'pendiente', 50, 0),
(23, 'user', 1, '', 'pendiente', 45, 0),
(24, 'user', 1, '', 'pendiente', 45, 0),
(25, 'user', 1, '', 'terminado', 94, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordendetalle`
--

CREATE TABLE `ordendetalle` (
  `idordendetalle` int(11) NOT NULL,
  `idorden` int(11) NOT NULL,
  `idplatillo` int(11) NOT NULL,
  `costo` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordendetalle`
--

INSERT INTO `ordendetalle` (`idordendetalle`, `idorden`, `idplatillo`, `costo`, `cantidad`, `importe`) VALUES
(1, 1, 1, 200, 2, 400),
(2, 2, 1, 7, 2, 100),
(3, 1, 1, 50, 2, 100),
(4, 3, 1, 200, 2, 400),
(5, 4, 1, 200, 1, 200),
(6, 5, 1, 200, 3, 600),
(7, 10, 9, 23, 1, 23),
(8, 10, 14, 44, 1, 44),
(9, 11, 15, 23, 1, 23),
(10, 11, 9, 23, 1, 23),
(11, 12, 13, 45, 1, 45),
(12, 12, 11, 50, 3, 150),
(13, 12, 10, 50, 1, 50),
(14, 13, 9, 23, 1, 23),
(15, 13, 15, 23, 1, 23),
(16, 14, 11, 50, 1, 50),
(17, 15, 11, 50, 4, 200),
(18, 16, 11, 50, 1, 50),
(19, 17, 11, 50, 3, 150),
(20, 18, 9, 23, 1, 23),
(21, 19, 9, 23, 1, 23),
(22, 20, 13, 45, 1, 45),
(23, 21, 11, 50, 2, 100),
(24, 22, 11, 50, 1, 50),
(25, 23, 13, 45, 1, 45),
(26, 24, 13, 45, 1, 45),
(27, 25, 14, 44, 1, 44),
(28, 25, 10, 50, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `platillo`
--

CREATE TABLE `platillo` (
  `idplatillo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platillo`
--

INSERT INTO `platillo` (`idplatillo`, `nombre`, `precio`, `edo`) VALUES
(1, 'Hot dog', 20, 0),
(9, 'Real ensalada de tomate', 23, 0),
(10, 'Ensalada de guayaba', 50, 0),
(11, 'Dogo Juumbo', 50, 0),
(12, 'Prueba', 3, 1),
(13, 'dasddd', 45, 0),
(14, 'aaaa', 44, 0),
(15, 'Ensala de hotdog gourmet sazonada con especias', 23, 0),
(16, 'Ensala de hotdog gourmet sazonada con especias', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `platillodetalle`
--

CREATE TABLE `platillodetalle` (
  `idplatillodetalle` int(11) NOT NULL,
  `idplatillo` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platillodetalle`
--

INSERT INTO `platillodetalle` (`idplatillodetalle`, `idplatillo`, `idproducto`, `cantidad`) VALUES
(86, 10, 32, 3),
(90, 9, 2, 4),
(91, 11, 8, 1),
(92, 11, 34, 1),
(93, 13, 15, 3),
(94, 14, 2, 4),
(95, 15, 2, 33),
(96, 16, 2, 4),
(97, 16, 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `exist` double NOT NULL,
  `punto` double NOT NULL,
  `costo` double NOT NULL,
  `costoProm` double NOT NULL,
  `unidad` varchar(10) NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `exist`, `punto`, `costo`, `costoProm`, `unidad`, `edo`) VALUES
(1, 'pan', 25, 5, 10, 8.75, 'Pza', 1),
(2, 'Tomate', 62.5, 5, 25, 24.96875, 'Kg', 0),
(3, '', 0, 0, 0, 0, '', 1),
(4, '', 0, 0, 0, 0, '', 1),
(5, '', 0, 0, 0, 0, '', 1),
(6, 'Prueba', 2, 1, 12, 12, '', 1),
(7, '', 0, 0, 0, 0, '', 1),
(8, 'Pan', 45, 5, 10, 10.25, 'Pza', 0),
(9, 'P', 2, 2, 3, 3, 'kg', 1),
(10, 'Jamon', 17, 5, 30, 30, 'gr', 1),
(11, 'Pimiento', 32, 44, 200, 225, 'kg', 0),
(12, 'Bimbollo', 10, 10, 22, 27.5, 'kg', 0),
(13, 'fgdgf', 3345, 34543, 535, 34543, 'Pza', 1),
(14, 'Pure de tomate', 443, 55, 4, 4, 'Kg', 0),
(15, 'Pepinos', 13, 5435, 534, 94.625, 'Gr', 0),
(16, 'dd2', 2, 2, 2, 2, 'gr', 1),
(17, 'dd2', 2, 2, 2, 2, 'gr', 1),
(18, 'aaaaaaa', 2, 2, 2, 2, 'gr', 1),
(19, 'Banana', 6, 2, 2, 2, 'Kg', 0),
(20, 'bbbb', 2, 2, 2, 2, 'Pza', 1),
(21, 'Prueba', 15, 5, 5, 5, 'Gr', 0),
(22, 'fyg', 5, 5, 5, 6, 'Kg', 1),
(23, 'Avena', 13, 5, 45, 36, 'Kg', 0),
(24, 'd', 4, 4, 4, 8, 'Kg', 1),
(25, 'g', 6, 77, 7, 7, 'Kg', 1),
(26, 'khjk', 7, 7, 7, 7, 'Kg', 1),
(27, 'gdf', 5, 5, 5, 5, 'Kg', 1),
(28, 'nn', 5, 5, 5, 7, 'Kg', 1),
(29, 'n', 56, 6, 6, 6, 'Kg', 1),
(30, 'fg', 5, 5, 5, 5, 'Kg', 1),
(31, 'h', 6, 6, 6.58, 6, 'Kg', 1),
(32, 'Guayabas', 40.5, 5, 23.7, 11.5, 'Gr', 0),
(33, 'Jamon', 10, 5, 40, 45, 'Gr', 0),
(34, 'Winis', 2, 4, 10, 6.9375, 'Pza', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `contacto` text NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` char(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cp` int(5) NOT NULL,
  `rfc` varchar(14) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `contacto`, `empresa`, `direccion`, `telefono`, `correo`, `cp`, `rfc`, `estado`) VALUES
(3, 'Jose', 'prueba', '', '1234567890', 'ssss@sss.ssx', 0, '0', 1),
(12, 'Pepess', 'Bimbo', 'Sonoras', '1234567890', 'fdsdfs@g.comdd', 666, '12feee344', 0),
(51, 's', 's', 's', 's', 's', 3, '0', 1),
(52, 's', 's', 's', 's', 's', 3, '0', 1),
(55, 'fffffff', 'f', 'f', '1234567890', 'f@f.f', 12345, '0', 0),
(56, 'aaaaaa', 'aaa', 'aaa', '4444444434', 'a@aa.a', 44444, 'ABCD123456A4B', 0),
(57, 'd', 'd', 'd', '8888888888', 'd@d.c', 44444, 'dffdsf', 1),
(58, 'dd', 'dd', 'ddd', '5666666666', 'd@d.d', 55666, 'fghfhfg', 1),
(59, 'AAAAA', 'rrr', 'rrr', '4444544444', 'r@r.r', 55555, 'ffdggrrrrr', 1),
(60, 'Juan', 'PepsiCO', 'Centro', '1234567890', 'juan@x.x', 45456, 'ORP830422DI6', 0),
(61, 'fsdf', 'sdfs', 'dfsdf', '4444444444', 'x@xc.x', 44444, 'ORP830422DI6', 0),
(62, 'aaaaa', 'sada', 'sdasd', '3333333333', 'x@x.x', 33333, 'ORP830422DI6', 0),
(63, 'ada', 'adsa', 'asasd4', '1234567890', 'x@x.xxx', 10000, 'ORP830422DI6', 0),
(64, 'x', 'x', 'x', 'c', 'd', 64, '64', 1),
(65, 'Ge', 'gdfg', 'dfgd', '5544554444', 'x@x.d', 33333, 'ORP830422DI6', 0),
(66, 'b', 'dkk', 'dgjkhjjk', '3333333333', 'd@d.d', 33333, 'ORP830422DI6', 1),
(67, 'x', 'x', 'xq', '4444444444', 'x@x.x', 56555, 'ORP830422DI6', 1),
(68, 'Nuevo', 'Prueba', 'dirección', '1234567777', 'a@a.c', 12345, 'ORP830422DI6', 0),
(69, 'Prueba Compras', 'Compras', 'Ubicación', '6744447388', 'compras@prueba.com', 23643, 'COM830422PI6', 0),
(70, 'Leo', 'NBA', 'Villa bonita', '6444000000', 'leo@prueba.com', 74655, 'LVG830422PI6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicio`
--

INSERT INTO `servicio` (`idservicio`, `nombre`, `descripcion`, `costo`, `edo`) VALUES
(1, 'a', 'a', 3, 1),
(2, 'Prueba', 'descp', 335, 0),
(3, 'Prueba 2', 'servicio', 1200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(5) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `roll` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `puesto` varchar(20) NOT NULL,
  `telefono` char(10) DEFAULT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `iva` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `contrasena`, `roll`, `nombre`, `puesto`, `telefono`, `correo`, `iva`, `edo`) VALUES
(1, 'luisf', '123', 'admin', 'luis fernando', 'admin', '4444444444', 'f@f.f', 0, 0),
(2, 'user', '123', 'admin', 'user', 'user', '2222222222', 'user@user.user', 21, 0),
(3, 'pruebas', 'pruebas', 'pruebas', 'pruebas', 'pruebas', '7777777777', 'pruebas@pruebas.p', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `importe` double NOT NULL,
  `edo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idventa`, `usuario`, `fecha`, `importe`, `edo`) VALUES
(1, '2', '2020-03-10 00:00:00', 100, 0),
(2, '1', '2020-03-18 00:00:00', 200, 0),
(3, '1', '2020-04-02 04:37:51', 100, 0),
(4, '1', '2020-04-02 04:45:22', 100, 0),
(5, '1', '2020-04-02 04:45:42', 100, 0),
(6, '1', '2020-04-02 04:46:02', 100, 0),
(7, '1', '2020-04-02 04:46:07', 100, 0),
(8, '1', '2020-04-02 04:46:32', 100, 0),
(9, '1', '2020-04-02 04:50:14', 100, 0),
(10, '1', '2020-04-02 04:53:22', 100, 0),
(11, '1', '2020-04-02 04:53:22', 100, 0),
(12, '1', '2020-04-02 04:53:36', 100, 0),
(13, '1', '2020-04-02 04:53:36', 100, 0),
(14, '1', '2020-04-02 04:55:04', 100, 0),
(15, '1', '2020-04-02 04:56:56', 100, 0),
(16, '1', '2020-04-02 16:28:35', 100, 0),
(17, '1', '2020-04-02 16:28:35', 100, 0),
(18, '1', '2020-04-02 16:30:31', 100, 0),
(19, '1', '2020-04-02 16:30:31', 100, 0),
(20, '1', '2020-04-02 16:32:08', 100, 0),
(21, '1', '2020-04-02 16:32:08', 100, 0),
(22, '1', '2020-04-02 16:32:17', 100, 0),
(23, '1', '2020-04-02 16:32:46', 100, 0),
(24, '1', '2020-04-02 16:32:50', 100, 0),
(25, '1', '2020-04-02 16:32:50', 100, 0),
(26, '1', '2020-04-02 16:33:03', 100, 0),
(27, '1', '2020-04-02 16:35:49', 100, 0),
(28, '1', '2020-04-02 16:35:52', 100, 0),
(29, '1', '2020-04-02 16:35:55', 100, 0),
(30, '1', '2020-04-02 17:05:33', 100, 0),
(31, '1', '2020-04-26 21:03:26', 500, 0),
(32, '1', '2020-04-26 21:31:45', 600, 0),
(33, '1', '2020-04-26 21:39:06', 0, 0),
(34, '1', '2020-04-26 21:39:27', 0, 0),
(35, '1', '2020-04-26 21:39:56', 0, 0),
(36, '1', '2020-04-26 21:39:59', 0, 0),
(37, '1', '2020-04-26 21:40:23', 0, 0),
(38, '1', '2020-04-26 21:44:41', 100, 0),
(39, '1', '2020-04-26 22:43:32', 600, 0),
(40, '1', '2020-04-27 01:21:14', 500, 0),
(41, '1', '2020-04-27 01:48:59', 500, 0),
(42, '1', '2020-04-27 01:49:52', 100, 0),
(43, '1', '2020-04-27 02:07:35', 500, 0),
(44, '1', '2020-04-27 02:17:12', 500, 0),
(45, '1', '2020-04-27 02:18:06', 500, 0),
(46, '1', '2020-04-27 02:20:00', 500, 0),
(47, '1', '2020-04-27 02:22:00', 500, 0),
(48, '1', '2020-04-27 02:23:39', 500, 0),
(49, '1', '2020-04-27 02:24:38', 500, 0),
(50, '1', '2020-04-27 02:24:48', 100, 0),
(51, '1', '2020-04-27 02:27:27', 400, 0),
(52, '1', '2020-04-27 12:05:43', 600, 0),
(53, '1', '2020-04-27 12:06:05', 200, 0),
(54, '1', '2020-04-28 23:52:31', 600, 0),
(55, '1', '2020-04-28 23:54:07', 500, 0),
(56, '1', '2020-04-28 23:55:30', 100, 0),
(57, '1', '2020-04-28 23:57:26', 600, 0),
(58, '1', '2020-04-28 23:58:17', 1100, 0),
(59, '1', '2020-04-29 00:11:16', 600, 0),
(60, '1', '2020-04-29 00:14:09', 600, 0),
(61, '1', '2020-04-29 00:18:12', 600, 0),
(62, '1', '2020-05-02 18:19:49', 0, 0),
(63, '1', '2020-05-11 21:08:32', 1100, 0),
(64, 'luisf', '0000-00-00 00:00:00', 100, 0),
(65, 'user', '0000-00-00 00:00:00', 100, 0),
(66, 'user', '0000-00-00 00:00:00', 100, 0),
(67, 'user', '0000-00-00 00:00:00', 100, 0),
(68, 'prueba', '2020-05-11 22:39:41', 100, 0),
(69, 'prueba', '2020-05-11 22:42:01', 100, 0),
(70, 'luisf', '2020-05-11 22:46:17', 100, 0),
(71, 'luisf', '2020-05-11 22:46:45', 400, 0),
(72, 'luisf', '2020-05-11 22:47:45', 200, 0),
(73, 'luisf', '2020-05-11 22:49:02', 500, 0),
(74, 'luisf', '2020-05-11 22:49:26', 100, 0),
(75, 'user', '2020-05-11 23:00:00', 400, 0),
(76, 'user', '2020-05-11 23:00:07', 200, 0),
(77, 'user', '2020-05-12 20:54:50', 100, 0),
(78, 'user', '2020-05-12 23:57:58', 1100, 0),
(79, 'user', '2020-05-13 04:13:31', 200, 0),
(80, 'user', '2020-05-14 01:13:34', 96, 0),
(81, 'user', '2020-05-14 06:09:57', 200, 0),
(82, 'user', '2020-05-14 06:10:50', 46, 0),
(83, 'user', '2020-05-14 06:11:00', 50, 0),
(84, 'user', '2020-05-14 06:13:31', 245, 0),
(85, 'user', '2020-05-14 06:14:08', 23, 0),
(86, 'user', '2020-05-14 06:15:03', 94, 0),
(87, 'user', '2020-05-14 06:15:23', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ventadetalle`
--

CREATE TABLE `ventadetalle` (
  `idventadetalle` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idorden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ventadetalle`
--

INSERT INTO `ventadetalle` (`idventadetalle`, `idventa`, `idorden`) VALUES
(1, 1, 1),
(12, 1, 1),
(15, 60, 2),
(16, 61, 3),
(17, 61, 4),
(18, 62, 5),
(19, 63, 1),
(20, 63, 5),
(21, 70, 2),
(22, 71, 3),
(23, 72, 4),
(24, 73, 1),
(25, 74, 2),
(26, 75, 3),
(27, 76, 4),
(28, 77, 2),
(29, 78, 1),
(30, 78, 5),
(31, 79, 4),
(32, 80, 14),
(33, 80, 13),
(34, 81, 15),
(35, 82, 11),
(36, 83, 16),
(37, 84, 12),
(38, 85, 18),
(39, 86, 25),
(40, 87, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idcompra`) USING BTREE,
  ADD KEY `proveedor_compra` (`idproveedor`);

--
-- Indexes for table `compradetalle`
--
ALTER TABLE `compradetalle`
  ADD PRIMARY KEY (`idcompradetalle`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`),
  ADD KEY `cliente-evento` (`idcliente`);

--
-- Indexes for table `eventodetalle`
--
ALTER TABLE `eventodetalle`
  ADD PRIMARY KEY (`ideventodetalle`);

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idorden`);

--
-- Indexes for table `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`idordendetalle`),
  ADD KEY `idorden` (`idorden`),
  ADD KEY `idplatillo` (`idplatillo`);

--
-- Indexes for table `platillo`
--
ALTER TABLE `platillo`
  ADD PRIMARY KEY (`idplatillo`);

--
-- Indexes for table `platillodetalle`
--
ALTER TABLE `platillodetalle`
  ADD PRIMARY KEY (`idplatillodetalle`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indexes for table `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`);

--
-- Indexes for table `ventadetalle`
--
ALTER TABLE `ventadetalle`
  ADD PRIMARY KEY (`idventadetalle`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idorden` (`idorden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `compradetalle`
--
ALTER TABLE `compradetalle`
  MODIFY `idcompradetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `eventodetalle`
--
ALTER TABLE `eventodetalle`
  MODIFY `ideventodetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `idorden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ordendetalle`
--
ALTER TABLE `ordendetalle`
  MODIFY `idordendetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `platillo`
--
ALTER TABLE `platillo`
  MODIFY `idplatillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `platillodetalle`
--
ALTER TABLE `platillodetalle`
  MODIFY `idplatillodetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `ventadetalle`
--
ALTER TABLE `ventadetalle`
  MODIFY `idventadetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `proveedor_compra` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`);

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `cliente-evento` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Constraints for table `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `orden_detalle` FOREIGN KEY (`idorden`) REFERENCES `orden` (`idorden`),
  ADD CONSTRAINT `platillo_orden` FOREIGN KEY (`idplatillo`) REFERENCES `platillo` (`idplatillo`);

--
-- Constraints for table `ventadetalle`
--
ALTER TABLE `ventadetalle`
  ADD CONSTRAINT `orden_venta` FOREIGN KEY (`idorden`) REFERENCES `orden` (`idorden`),
  ADD CONSTRAINT `venta_detalle` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
