-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2016 a las 01:39:13
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_combos`(IN `opcion` VARCHAR(100))
    NO SQL
BEGIN
	IF opcion = 'opc_combo_sucursal' THEN
    	SELECT idSucursal, nombre FROM sucursales ORDER BY nombre;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_celular`(IN `opcion` VARCHAR(65), IN `codigo` INT, IN `imei` VARCHAR(65), IN `serie` VARCHAR(65), IN `marca` VARCHAR(65), IN `modelo` VARCHAR(65))
    NO SQL
BEGIN
  IF opcion = 'opc_mostrar_celulares' THEN
      SELECT C.idProducto, C.idCelular, C.imei, C.serie, C.marca, 
          C.modelo, S.nombre, P.estado, P.activo
          FROM Productos P 
            INNER JOIN Celulares C ON P.idProducto = C.idProducto
            INNER JOIN Sucursales S ON P.idSucursal = S.idSucursal;
    END IF;
    
    IF opcion = 'opc_registrar_celular' THEN
      INSERT INTO Productos (idTipoProducto, fechaIngreso, activo) VALUES       (1, now(), 1);
        
        SET @PRODUCTO = (SELECT MAX(idProducto) FROM Productos);
        
        INSERT INTO Celulares (idProducto, imei, serie, marca, modelo) VALUES       (@PRODUCTO, imei, serie, marca, modelo);
        
    END IF;
    
    IF opcion = 'opc_datos_celular' THEN
      SELECT P.idProducto, C.imei, C.serie, C.marca, C.modelo
          FROM Productos P
            INNER JOIN Celulares C ON P.idProducto = C.idProducto
            WHERE C.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_editar_celular' THEN
      UPDATE Celulares C
          SET C.imei = imei, C.serie = serie, C.marca = marca, 
          C.modelo = modelo
          WHERE C.idProducto = codigo;
    END IF;

END$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionar_envio`(IN `opcion` VARCHAR(100), IN `sucursal` INT, IN `cantidad` INT)
    NO SQL
BEGIN
	IF opcion = 'opc_registro_envio' THEN
    	INSERT INTO movimiento (idsucursal, fechaEnvio, cantidadTotal, activo) VALUES (sucursal,now(),cantidad,1);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestion_detalle_envio`(IN `opcion` VARCHAR(100), IN `producto` INT, IN `cantidad` INT)
    NO SQL
BEGIN
	IF opcion = 'opc_grabar_detalle_envio' THEN
    	SET @ENVIO = (SELECT MAX(numMovimiento) AS id FROM movimiento);
        INSERT INTO detallemovimiento(numMovimiento,idProducto,cantidad) VALUES (@ENVIO, producto, cantidad);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_productos`(IN `opcion` VARCHAR(200))
    NO SQL
BEGIN
	IF opcion = 'opc_mostrar_celulares' THEN
    	SELECT idCelular, imei, serie, marca, modelo FROM celulares;
    END IF;
    IF opcion = 'opc_mostrar_chip' THEN
    	SELECT idChip, icc, numero, descripcion FROM chips;
    END IF;
    IF opcion = 'opc_mostrar_protector' THEN
    	SELECT PR.idProtector, TP.nombre, PR.modeloCelular, PR.cantidad FROM protectores PR INNER JOIN tipoprotector TP ON TP.idTipoProtector = PR.tipo;
    END IF;
    IF opcion = 'opc_mostrar_accesorio' THEN
    	SELECT A.idAccesorio, TA.nombre, A.codigo, A.descripcion, A.cantidad FROM accesorios A INNER JOIN tipoaccesorio TA ON TA.idTipoAccesorio = A.tipo;
    END IF;
    IF opcion = 'opc_mostrar_envios' THEN
    	SELECT M.numMovimiento, M.fechaEnvio, S.nombre, CONCAT(R.nombres,' ',R.apellidos),M.cantidadTotal FROM movimiento M 
INNER JOIN sucursales S ON S.idSucursal = M.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_seleccion_productos`(IN `opcion` VARCHAR(200), IN `id` INT)
    NO SQL
BEGIN
	IF opcion = 'opc_seleccion_celular' THEN
    	SELECT idProducto, modelo, imei, serie FROM celulares WHERE idCelular = id;
    END IF;
    IF opcion = 'opc_seleccion_chip' THEN
    	SELECT idProducto, icc, numero, descripcion FROM chips WHERE idChip = id;
    END IF;
    IF opcion = 'opc_seleccion_protector' THEN
    	SELECT PR.idProducto, TP.nombre, PR.modeloCelular FROM protectores PR INNER JOIN tipoprotector TP ON TP.idTipoProtector = PR.tipo WHERE idProtector = id;
    END IF;  
    IF opcion = 'opc_seleccion_accesorio' THEN
    	SELECT A.idProducto, CONCAT(TA.nombre,' - ',A.descripcion), A.codigo FROM accesorios A INNER JOIN tipoaccesorio TA ON TA.idTipoAccesorio = A.tipo WHERE idAccesorio = id;

    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE IF NOT EXISTS `accesorios` (
  `idAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `descripcion` varchar(65) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idAccesorio`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`idAccesorio`, `idProducto`, `tipo`, `codigo`, `descripcion`, `cantidad`) VALUES
(1, 4, '1', 'ERW', 'SDFSDGFG', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celulares`
--

CREATE TABLE IF NOT EXISTS `celulares` (
  `idCelular` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `imei` varchar(65) NOT NULL,
  `serie` varchar(65) NOT NULL,
  `marca` varchar(65) NOT NULL,
  `modelo` varchar(65) NOT NULL,
  PRIMARY KEY (`idCelular`,`imei`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `celulares`
--

INSERT INTO `celulares` (`idCelular`, `idProducto`, `imei`, `serie`, `marca`, `modelo`) VALUES
(1, 1, 'WER', 'QWERER', 'SANSUNG', 'SANSUNG J7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chips`
--

CREATE TABLE IF NOT EXISTS `chips` (
  `idChip` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `icc` varchar(65) NOT NULL,
  `numero` varchar(65) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idChip`,`icc`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `chips`
--

INSERT INTO `chips` (`idChip`, `idProducto`, `icc`, `numero`, `descripcion`) VALUES
(3, 2, 'WE', '32432545', 'MOVISTAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemovimiento`
--

CREATE TABLE IF NOT EXISTS `detallemovimiento` (
  `numDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `numMovimiento` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`numDetalle`),
  KEY `numMovimiento` (`numMovimiento`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE IF NOT EXISTS `detalleventa` (
  `numDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `numVenta` varchar(15) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  PRIMARY KEY (`numDetalle`),
  KEY `numVenta` (`numVenta`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `numMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idSucursal` int(11) NOT NULL,
  `fechaEnvio` date NOT NULL,
  `cantidadTotal` int(11) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`numMovimiento`),
  KEY `idSucursal` (`idSucursal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

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


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protectores`
--

CREATE TABLE IF NOT EXISTS `protectores` (
  `idProtector` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `modeloCelular` varchar(65) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idProtector`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `protectores`
--

INSERT INTO `protectores` (`idProtector`, `idProducto`, `tipo`, `modeloCelular`, `cantidad`) VALUES
(1, 3, '1', 'SAMSUMG', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

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

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`idResponsable`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `activo`) VALUES
(1, '11223344', 'ERICK', 'ALFARO', 'AV. PERU 111', '500005', b'1'),
(2, '11223344', 'JORGE', 'ARIAS', 'AV. ESPAÑA 222', '900009', b'1'),
(3, '55664488', 'JUAN', 'PEREZ', 'AV. AMERICA 333', '400004', b'1'),
(4, '22003399', 'MARIA', 'UGARTE', 'AV. VALLEJO 444', '700007', b'1'),
(5, '99775588', 'SOFIA', 'RODRIGUEZ', 'AV. SANTA 555', '800008', b'1'),
(6, '55442200', 'KATY', 'SANCHEZ', 'AV. PUMACAHUA 666', '300003', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `idSucursal` int(11) NOT NULL AUTO_INCREMENT,
  `idResponsable` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idSucursal`,`idResponsable`),
  KEY `idResponsable` (`idResponsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idSucursal`, `idResponsable`, `nombre`, `direccion`, `telefono`) VALUES
(1, 1, 'ALICEL 1', 'JR. BOLIVAR', '100001'),
(2, 2, 'ALICEL 2', 'JR. BOLIVAR', '200002'),
(3, 3, 'ENTEL', 'JR. BOLIVAR', '300003'),
(4, 4, 'PIZARRO', 'JR. BOLIVAR', '400004'),
(5, 5, 'ALMAGRO', 'JR. BOLIVAR', '500005'),
(6, 6, 'AS MOVILES', 'JR. BOLIVAR', '600006');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoaccesorio`
--

CREATE TABLE IF NOT EXISTS `tipoaccesorio` (
  `idTipoAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoAccesorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipoaccesorio`
--

INSERT INTO `tipoaccesorio` (`idTipoAccesorio`, `nombre`) VALUES
(1, 'CARGADOR'),
(2, 'AUDIFONOS'),
(3, 'BATERIA'),
(4, 'MEMORIA'),
(5, 'CABLE DE DATOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE IF NOT EXISTS `tipoproducto` (
  `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`idTipoProducto`, `nombre`) VALUES
(1, 'CELULARES'),
(2, 'CHIPS'),
(3, 'PROTECTORES'),
(4, 'ACCESORIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoprotector`
--

CREATE TABLE IF NOT EXISTS `tipoprotector` (
  `idTipoProtector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoProtector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipoprotector`
--

INSERT INTO `tipoprotector` (`idTipoProtector`, `nombre`) VALUES
(1, 'FLIPCOVER'),
(2, 'TPU'),
(3, 'COVER DISEÑO'),
(4, 'GOMA'),
(5, 'METALICO');

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
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `nombres`, `apellidos`, `activo`) VALUES
(1, 'florpadilla@alicel.com', 'florpadilla', 'Flor', 'Padilla', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD CONSTRAINT `accesorios_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `celulares`
--
ALTER TABLE `celulares`
  ADD CONSTRAINT `celulares_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `chips`
--
ALTER TABLE `chips`
  ADD CONSTRAINT `chips_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD CONSTRAINT `detallemovimiento_ibfk_1` FOREIGN KEY (`numMovimiento`) REFERENCES `movimiento` (`numMovimiento`),
  ADD CONSTRAINT `detallemovimiento_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`numVenta`) REFERENCES `venta` (`numVenta`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipoproducto` (`idTipoProducto`);

--
-- Filtros para la tabla `protectores`
--
ALTER TABLE `protectores`
  ADD CONSTRAINT `protectores_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`idResponsable`) REFERENCES `responsables` (`idResponsable`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
