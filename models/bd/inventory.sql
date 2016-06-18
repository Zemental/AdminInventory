-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2016 a las 23:15:42
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventory`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_celular`(IN `opcion` VARCHAR(60), IN `codigo` INT, IN `imei` VARCHAR(65), IN `serie` VARCHAR(65), IN `descripcion` TEXT, IN `cantidad` INT)
    NO SQL
BEGIN
	
    IF opcion = 'opc_registrar_celular' THEN
    	INSERT INTO celulares (imei, serie, descripcion, cantidad, fecha) 					VALUES (imei, serie, descripcion, cantidad, now());
    END IF;
    
    IF opcion = 'opc_mostrar_celulares' THEN
    	SELECT c.idCelular, c.imei, c.serie, c.descripcion, c.cantidad, 				c.estado FROM celulares c;
    END IF;
    
    IF opcion = 'opc_editar_celular' THEN
    	UPDATE celulares c SET c.imei=imei, c.serie=serie, 								c.descripcion=descripcion, c.cantidad=cantidad
        WHERE c.idCelular=codigo;
    END IF;
    
    IF opcion = 'opc_datos_celular' THEN
    	SELECT c.* FROM celulares c WHERE c.idCelular=codigo;
    END IF;
    
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celulares`
--

CREATE TABLE IF NOT EXISTS `celulares` (
  `idCelular` int(11) NOT NULL AUTO_INCREMENT,
  `imei` varchar(65) NOT NULL,
  `serie` varchar(65) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idCelular`,`imei`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `celulares`
--

INSERT INTO `celulares` (`idCelular`, `imei`, `serie`, `descripcion`, `cantidad`, `fecha`, `estado`) VALUES
(1, 'COD001', 'QWERY0001', 'SAMSUMG J2', 1, '0000-00-00', 'A'),
(2, 'COD002', 'QWERTY002', 'SAMSUMG GALAXY S3', 1, '2016-06-13', 'A'),
(3, 'COD003', 'QWERTY003', 'HUAWEI P7', 1, '2016-06-13', 'A'),
(4, 'RTEER', 'EWR', 'EWR', 1, '2016-06-13', 'A'),
(5, 'DASD', 'aSD', 'SDS', 1, '2016-06-13', 'A'),
(6, 'QQQQ', 'WWWW', 'EEE', 1, '2016-06-13', 'A'),
(7, 'EQWEWQ', 'EQWE', 'EWQE', 1, '2016-06-13', 'A'),
(8, 'dqweq', 'eqwewq', 'eqweqew', 1, '2016-06-13', 'A'),
(9, 'qqqq', 'qqwewe', 'cccczzz', 2, '2016-06-13', 'A'),
(10, 'ttttt', 'qqwewe', 'cccczzz', 2, '2016-06-13', 'A'),
(11, 'REGY', 'TE AMO', 'MUCHISIMO', 5, '2016-06-13', 'A'),
(12, 'PPPP', 'qqwewe', 'cccczzz', 2, '2016-06-13', 'A'),
(13, 'COD0013', 'QWERTY0013', 'SAMSUMG J2', 1, '2016-06-13', 'A'),
(14, 'XXXXX', 'SEREEEE', 'SAMSUMG S7', 2, '2016-06-13', 'A'),
(15, 'JKJKJKJ', 'HGHGHG', 'EQWEQW', 1, '2016-06-13', 'A'),
(16, 'PLPLPLPL', 'NKNKNK', 'SAMSUMG S5', 1, '2016-06-13', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chips`
--

CREATE TABLE IF NOT EXISTS `chips` (
  `idChip` int(11) NOT NULL AUTO_INCREMENT,
  `icc` varchar(65) NOT NULL,
  `numero` varchar(65) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idChip`,`icc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protectores`
--

CREATE TABLE IF NOT EXISTS `protectores` (
  `idProtector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idProtector`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `idSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(65) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idSucursal`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(65) NOT NULL,
  `apellidos` varchar(65) NOT NULL,
  `estado` bit(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `nombres`, `apellidos`, `estado`) VALUES
(1, 'florpadilla@alicel.com', 'florpadilla', 'Flor', 'Padilla', b'1');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
