DROP DATABASE IF EXISTS inventory;
CREATE DATABASE inventory;
USE inventory;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_celular`(IN `opcion` VARCHAR(65), IN `codigo` INT, IN `imei` VARCHAR(65), IN `serie` VARCHAR(65), IN `marca` VARCHAR(65), IN `modelo` VARCHAR(65))
    NO SQL
BEGIN
	IF opcion = 'opc_mostrar_celulares' THEN
    	SELECT P.idProducto, C.idCelular, C.imei, C.serie, C.marca, 
        	C.modelo, S.nombre, P.estado, P.activo
        	FROM Productos P 
            INNER JOIN Celulares C ON P.idProducto = C.idProducto
            INNER JOIN Sucursales S ON P.idSucursal = S.idSucursal;
    END IF;
    
    IF opcion = 'opc_registrar_celular' THEN
    	INSERT INTO Productos (idTipoProducto, fechaIngreso, activo) VALUES 			(1, now(), 1);
        
        SET @PRODUCTO = (SELECT MAX(idProducto) FROM Productos);
        
        INSERT INTO Celulares (idProducto, imei, serie, marca, modelo) VALUES 			(@PRODUCTO, imei, serie, marca, modelo);
        
    END IF;

END$$

DELIMITER ;

CREATE TABLE IF NOT EXISTS `accesorios` (
  `idAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `descripcion` varchar(65) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idAccesorio`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `celulares` (
  `idCelular` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `imei` varchar(65) NOT NULL,
  `serie` varchar(65) NOT NULL,
  `marca` varchar(65) NOT NULL,
  `modelo` varchar(65) NOT NULL,
  PRIMARY KEY (`idCelular`,`imei`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `chips` (
  `idChip` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `icc` varchar(65) NOT NULL,
  `numero` varchar(65) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idChip`,`icc`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `detallemovimiento` (
  `numMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`numMovimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `detalleventa` (
  `numVenta` varchar(15) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  PRIMARY KEY (`numVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `movimiento` (
  `numMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idSucursal` int(11) NOT NULL,
  `fechaEnvio` date NOT NULL,
  `cantidadTotal` int(11) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`numMovimiento`),
  KEY `idSucursal` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoProducto` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL DEFAULT '1',
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fechaIngreso` date NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idSucursal` (`idSucursal`),
  KEY `idTipoProducto` (`idTipoProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `protectores` (
  `idProtector` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `modeloCelular` varchar(65) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idProtector`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `responsables` (
  `idResponsable` int(11) NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `nombres` varchar(65) NOT NULL,
  `apellidos` varchar(65) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idResponsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `responsables` (`idResponsable`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `activo`) VALUES
(1, '11223344', 'ERICK', 'ALFARO', 'AV. PERU 111', '500005', b'1'),
(2, '11223344', 'JORGE', 'ARIAS', 'AV. ESPAÑA 222', '900009', b'1'),
(3, '55664488', 'JUAN', 'PEREZ', 'AV. AMERICA 333', '400004', b'1'),
(4, '22003399', 'MARIA', 'UGARTE', 'AV. VALLEJO 444', '700007', b'1'),
(5, '99775588', 'SOFIA', 'RODRIGUEZ', 'AV. SANTA 555', '800008', b'1'),
(6, '55442200', 'KATY', 'SANCHEZ', 'AV. PUMACAHUA 666', '300003', b'1');

CREATE TABLE IF NOT EXISTS `sucursales` (
  `idSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `idResponsable` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idSucursal`,`idResponsable`),
  KEY `idResponsable` (`idResponsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `sucursales` (`idSucursal`, `idResponsable`, `nombre`, `direccion`, `telefono`) VALUES
(1, 1, 'ALICEL 1', 'JR. BOLIVAR', '100001'),
(2, 2, 'ALICEL 2', 'JR. BOLIVAR', '200002'),
(3, 3, 'ENTEL', 'JR. BOLIVAR', '300003'),
(4, 4, 'PIZARRO', 'JR. BOLIVAR', '400004'),
(5, 5, 'ALMAGRO', 'JR. BOLIVAR', '500005'),
(6, 6, 'AS MOVILES', 'JR. BOLIVAR', '600006');

CREATE TABLE IF NOT EXISTS `tipoaccesorio` (
  `idTipoAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoAccesorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `tipoaccesorio` (`idTipoAccesorio`, `nombre`) VALUES
(1, 'CARGADOR'),
(2, 'AUDIFONOS'),
(3, 'BATERIA'),
(4, 'MEMORIA'),
(5, 'CABLE DE DATOS');

CREATE TABLE IF NOT EXISTS `tipoproducto` (
  `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `tipoproducto` (`idTipoProducto`, `nombre`) VALUES
(1, 'CELULARES'),
(2, 'CHIPS'),
(3, 'PROTECTORES'),
(4, 'ACCESORIOS');

CREATE TABLE IF NOT EXISTS `tipoprotector` (
  `idTipoProtector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoProtector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `tipoprotector` (`idTipoProtector`, `nombre`) VALUES
(1, 'FLIPCOVER'),
(2, 'TPU'),
(3, 'COVER DISEÑO'),
(4, 'GOMA'),
(5, 'METALICO');

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(65) NOT NULL,
  `apellidos` varchar(65) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `nombres`, `apellidos`, `activo`) VALUES
(1, 'florpadilla@alicel.com', 'florpadilla', 'Flor', 'Padilla', b'1');

CREATE TABLE IF NOT EXISTS `venta` (
  `numVenta` varchar(15) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `fechaVenta` date NOT NULL,
  `importe` decimal(4,2) NOT NULL,
  `cantidadTotal` int(11) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`numVenta`),
  KEY `idSucursal` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `accesorios`
  ADD CONSTRAINT `accesorios_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

ALTER TABLE `celulares`
  ADD CONSTRAINT `celulares_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

ALTER TABLE `chips`
  ADD CONSTRAINT `chips_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

ALTER TABLE `detallemovimiento`
  ADD CONSTRAINT `detallemovimiento_ibfk_1` FOREIGN KEY (`numMovimiento`) REFERENCES `movimiento` (`numMovimiento`);

ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`numVenta`) REFERENCES `venta` (`numVenta`);

ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`);

ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipoproducto` (`idTipoProducto`);

ALTER TABLE `protectores`
  ADD CONSTRAINT `protectores_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`idResponsable`) REFERENCES `responsables` (`idResponsable`);

ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`);
