-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2016 a las 23:46:08
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_accesorio`(IN `opcion` VARCHAR(65), IN `codigo` INT, IN `tipo` INT, IN `codigoAccesorio` VARCHAR(65), IN `descripcion` VARCHAR(65), IN `cantidad` INT, IN `precio` DOUBLE, IN `estado` INT, IN `mostrar` VARCHAR(25))
    NO SQL
BEGIN
  IF opcion = 'opc_mostrar_accesorios' THEN
      SELECT A.idProducto, A.idAccesorio, TA.nombre, A.codigo,            A.descripcion, A.cantidad, A.precio, S.nombre, P.estado, P.activo
          FROM Productos P 
            INNER JOIN Accesorios A ON P.idProducto = A.idProducto
            INNER JOIN TipoAccesorio TA ON A.idTipoAccesorio =            TA.idTipoAccesorio
            INNER JOIN Sucursales S ON P.idSucursal = S.idSucursal
            ORDER BY A.idAccesorio;
    END IF;
    
    IF opcion = 'opc_registrar_accesorio' THEN      
      
        INSERT INTO Productos (idTipoProducto, fechaIngreso, activo)        VALUES (4, now(), 1);
        
          SET @PRODUCTO = (SELECT MAX(idProducto) FROM Productos);
        
          INSERT INTO Accesorios (idProducto, idTipoAccesorio, codigo,        descripcion, cantidad, precio) VALUES(@PRODUCTO, tipo,                codigoAccesorio, descripcion, cantidad, precio);       
        
    END IF;
    
    IF opcion = 'opc_datos_accesorio' THEN
      SELECT P.idProducto, A.idTipoAccesorio, A.codigo, A.descripcion, A.cantidad, A.precio
          FROM Productos P
            INNER JOIN Accesorios A ON P.idProducto = A.idProducto          
            WHERE A.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_editar_accesorio' THEN
      UPDATE Accesorios A
          SET A.idTipoAccesorio = tipo, A.codigo = codigoAccesorio,   
            A.descripcion = descripcion, A.cantidad = cantidad, A.precio = precio
          WHERE A.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_mostrador_accesorio' THEN
      UPDATE Productos P 
        SET P.estado = mostrar
      	WHERE P.idProducto = codigo;        	
    END IF;
    
    IF opcion = 'opc_eliminar_accesorio' THEN
      UPDATE Productos
          SET activo = estado
            WHERE idProducto = codigo;
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_celular`(IN `opcion` VARCHAR(65), IN `codigo` INT, IN `imei` VARCHAR(65), IN `serie` VARCHAR(65), IN `marca` VARCHAR(65), IN `modelo` VARCHAR(65), IN `precio` DOUBLE, IN `estado` INT, IN `mostrar` VARCHAR(65))
    NO SQL
BEGIN
  IF opcion = 'opc_mostrar_celulares' THEN
      SELECT C.idProducto, C.idCelular, C.imei, C.serie, C.marca, 
          C.modelo, C.precio, S.nombre, P.estado, P.activo
          FROM Productos P 
            INNER JOIN Celulares C ON P.idProducto = C.idProducto
            INNER JOIN Sucursales S ON P.idSucursal = S.idSucursal;
    END IF;
    
    IF opcion = 'opc_registrar_celular' THEN      	
          
        INSERT INTO Productos (idTipoProducto, fechaIngreso, activo)        VALUES (1, now(), 1);
        
          SET @PRODUCTO = (SELECT MAX(idProducto) FROM Productos);
        
          INSERT INTO Celulares (idProducto, imei, serie, marca, modelo, precio)          VALUES(@PRODUCTO, imei, serie, marca, modelo, precio);       
        
    END IF;
    
    IF opcion = 'opc_datos_celular' THEN
      SELECT P.idProducto, C.imei, C.serie, C.marca, C.modelo, C.precio
          FROM Productos P
            INNER JOIN Celulares C ON P.idProducto = C.idProducto
            WHERE C.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_editar_celular' THEN
      UPDATE Celulares C
          SET C.imei = imei, C.serie = serie, C.marca = marca, C.precio = precio, C.modelo = modelo
          WHERE C.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_mostrador_celular' THEN
      UPDATE Productos P 
        SET P.estado = mostrar
      	WHERE P.idProducto = codigo;        	
    END IF;
    
    IF opcion = 'opc_eliminar_celular' THEN
      UPDATE Productos
          SET activo = estado
            WHERE idProducto = codigo;
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_chip`(IN `opcion` VARCHAR(65), IN `codigo` INT, IN `icc` VARCHAR(65), IN `numero` VARCHAR(65), IN `operadora` VARCHAR(65), IN `precio` DOUBLE, IN `estado` INT, IN `mostrar` VARCHAR(25))
    NO SQL
BEGIN
  IF opcion = 'opc_mostrar_chips' THEN
      SELECT CH.idProducto, CH.idChip, CH.icc, CH.numero, CH.operadora, CH.precio, S.nombre, P.estado, P.activo
          FROM Productos P 
            INNER JOIN Chips CH ON P.idProducto = CH.idProducto
            INNER JOIN Sucursales S ON P.idSucursal = S.idSucursal;
    END IF;
    
    IF opcion = 'opc_registrar_chip' THEN     
      
        INSERT INTO Productos (idTipoProducto, fechaIngreso, activo)        VALUES (2, now(), 1);
        
          SET @PRODUCTO = (SELECT MAX(idProducto) FROM Productos);
        
          INSERT INTO Chips (idProducto, icc, numero, operadora, precio)          VALUES(@PRODUCTO, icc, numero, operadora, precio);       
        
    END IF;
    
    IF opcion = 'opc_datos_chip' THEN
      SELECT P.idProducto, CH.icc, CH.numero, CH.operadora, CH.precio
          FROM Productos P
            INNER JOIN Chips CH ON P.idProducto = CH.idProducto
            WHERE CH.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_editar_chip' THEN
      UPDATE Chips CH
          SET CH.icc = icc, CH.numero = numero, CH.operadora = operadora, CH.precio = precio 
          WHERE CH.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_mostrador_chip' THEN
      UPDATE Productos P 
        SET P.estado = mostrar
      	WHERE P.idProducto = codigo;        	
    END IF;
    
    IF opcion = 'opc_eliminar_chip' THEN
      UPDATE Productos
          SET activo = estado
            WHERE idProducto = codigo;
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_control_protector`(IN `opcion` VARCHAR(65), IN `codigo` INT, IN `tipo` INT, IN `modeloCelular` VARCHAR(100), IN `cantidad` INT, IN `precio` DOUBLE, IN `estado` INT, IN `mostrar` VARCHAR(25))
    NO SQL
BEGIN
  IF opcion = 'opc_mostrar_protectores' THEN
      SELECT PR.idProducto, PR.idProtector, TP.nombre, PR.modeloCelular, PR.cantidad, PR.precio, S.nombre, P.estado, P.activo
          FROM Productos P 
            INNER JOIN Protectores PR ON P.idProducto = PR.idProducto
            INNER JOIN TipoProtector TP ON TP.idTipoProtector =            PR.idTipoProtector
            INNER JOIN Sucursales S ON P.idSucursal = S.idSucursal
            ORDER BY PR.idProtector;
           
    END IF;
    
    IF opcion = 'opc_registrar_protector' THEN      
      
        INSERT INTO Productos (idTipoProducto, fechaIngreso, activo)        VALUES (3, now(), 1);
        
          SET @PRODUCTO = (SELECT MAX(idProducto) FROM Productos);
        
          INSERT INTO Protectores (idProducto, idTipoProtector,       modeloCelular, cantidad, precio) VALUES(@PRODUCTO, tipo, modeloCelular, cantidad, precio);       
        
    END IF;
    
    IF opcion = 'opc_datos_protector' THEN
      SELECT P.idProducto, PR.idTipoProtector, PR.modeloCelular, PR.cantidad, PR.precio
          FROM Productos P
            INNER JOIN Protectores PR ON P.idProducto = PR.idProducto       
            WHERE PR.idProducto = codigo;
    END IF;
    
    IF opcion = 'opc_editar_protector' THEN
      UPDATE Protectores PR
          SET PR.idTipoProtector = tipo, PR.modeloCelular = modeloCelular, PR.cantidad = cantidad, PR.precio = precio
          WHERE PR.idProducto = codigo;
    END IF;
    
        
    IF opcion = 'opc_mostrador_protector' THEN
      UPDATE Productos P 
        SET P.estado = mostrar
      	WHERE P.idProducto = codigo;        	
    END IF;
    
    IF opcion = 'opc_eliminar_protector' THEN
      UPDATE Productos
          SET activo = estado
            WHERE idProducto = codigo;
    END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionar_envio`(IN `opcion` VARCHAR(100), IN `sucursal` INT, IN `cantidad` INT)
    NO SQL
BEGIN
  IF opcion = 'opc_registro_envio' THEN
      INSERT INTO movimiento (idsucursal, fechaEnvio, cantidadTotal, activo) VALUES (sucursal,now(),cantidad,1);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestionar_venta`(IN `opcion` VARCHAR(100), IN `numDocumento` VARCHAR(100), IN `tipoDocumento` VARCHAR(20), IN `sucursal` INT, IN `montoTotal` DOUBLE)
    NO SQL
BEGIN
  IF opcion = 'opc_registro_venta' THEN 
      INSERT INTO venta (numVenta, tipoDocumento, idSucursal, fechaVenta, cantidadTotal, activo) VALUES (numDocumento,tipoDocumento,sucursal,now(),montoTotal,1);
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestion_detalle_envio`(IN `opcion` VARCHAR(100), IN `producto` INT, IN `canTotal` INT, IN `sucursal` INT)
    NO SQL
BEGIN
  IF opcion = 'opc_grabar_detalle_envio' THEN
      SET @ENVIO = (SELECT MAX(numMovimiento) AS id FROM movimiento);
        INSERT INTO detallemovimiento(numMovimiento,idProducto,cantidad,stock) VALUES (@ENVIO, producto, canTotal,canTotal);
    END IF;   
    IF opcion = 'opc_modificar_ubicacion' THEN
      UPDATE productos SET idSucursal = sucursal WHERE idProducto = producto;
    END IF;
    IF opcion = 'opc_update_protector' THEN
      SET @PROTECTOR = (SELECT idProtector FROM protectores WHERE idProducto = producto);
      UPDATE protectores SET cantidad = cantidad - canTotal WHERE idProtector = @PROTECTOR;
    END IF;
    IF opcion = 'opc_update_accesorio' THEN
      SET @ACCESORIO = (SELECT idAccesorio FROM accesorios WHERE idProducto = producto);
        UPDATE accesorios SET cantidad = cantidad - canTotal WHERE idAccesorio = @ACCESORIO;
    END IF;
    IF opcion = 'opc_update_celular' THEN
      SET @CELULAR = (SELECT idCelular FROM celulares WHERE idProducto = producto);
        UPDATE celulares SET cantidad = cantidad - canTotal WHERE idCelular = @CELULAR;
    END IF;
    IF opcion = 'opc_update_chips' THEN
      SET @CHIPS = (SELECT idChip FROM chips WHERE idProducto = producto);
        UPDATE chips SET cantidad = cantidad - canTotal WHERE idChip = @CHIPS;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_gestion_detalle_venta`(IN `opcion` VARCHAR(100), IN `producto` INT, IN `cantidadVenta` INT, IN `precio` DOUBLE, IN `importe` DOUBLE, IN `numeroDoc` VARCHAR(15))
    NO SQL
BEGIN
  IF opcion = 'opc_grabar_detalle_venta' THEN
      SET @VENTA = (SELECT MAX(ventaID) AS id FROM venta);
      INSERT INTO detalleventa (ventaID, idProducto, cantidad, precio, importe) VALUES (@VENTA, producto,cantidadVenta,precio,importe);
    END IF;
    IF opcion = 'opc_modificar_estado_producto' THEN
      UPDATE productos SET estado = 'V' WHERE idProducto = producto;
      UPDATE detallemovimiento SET cantidadVendida = cantidadVendida+cantidadVenta WHERE idProducto = producto;
      UPDATE detallemovimiento SET stock = stock-cantidadVenta WHERE idProducto = producto;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_productos`(IN `opcion` VARCHAR(200), IN `sucursal` INT, IN `inicio` DATE, IN `fin` DATE)
    NO SQL
BEGIN
  IF opcion = 'opc_mostrar_celulares' THEN
      SELECT C.idCelular, C.imei, C.serie, C.marca, C.modelo FROM celulares C INNER JOIN productos P ON P.idProducto = C.idProducto WHERE P.activo = 1 AND C.cantidad = 1;
    END IF;
    IF opcion = 'opc_mostrar_chip' THEN
      SELECT C.idChip, C.icc, C.numero, C.operadora FROM chips C INNER JOIN productos P ON P.idProducto = C.idProducto WHERE P.activo = 1 AND c.cantidad = 1;
    END IF;
    IF opcion = 'opc_mostrar_protector' THEN
      SELECT PR.idProtector, TP.nombre, PR.modeloCelular, PR.cantidad FROM protectores PR INNER JOIN tipoprotector TP ON TP.idTipoProtector = PR.idTipoProtector INNER JOIN productos P ON P.idProducto = PR.idProducto WHERE P.activo = 1 AND PR.cantidad > 0;
    END IF;
    IF opcion = 'opc_mostrar_accesorio' THEN
      SELECT A.idAccesorio, TA.nombre, A.codigo, A.descripcion, A.cantidad FROM accesorios A INNER JOIN tipoaccesorio TA ON TA.idTipoAccesorio = A.idTipoAccesorio INNER JOIN productos P ON P.idProducto = A.idProducto WHERE P.activo = 1 AND A.cantidad > 0;
    END IF;
    IF opcion = 'opc_mostrar_envios' THEN
      SELECT M.numMovimiento, M.fechaEnvio, S.nombre, CONCAT(R.nombres,' ',R.apellidos),M.cantidadTotal FROM movimiento M 
INNER JOIN sucursales S ON S.idSucursal = M.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable;
    END IF;
    IF opcion = 'opc_mostrar_celulares_ventas' THEN
      SELECT C.idCelular, C.imei, C.serie, C.marca, C.modelo FROM celulares C 
  INNER JOIN productos P ON P.idProducto = C.idProducto 
  INNER JOIN detallemovimiento DM ON DM.idProducto = P.idProducto
  WHERE P.idSucursal = sucursal AND DM.stock > 0;
    END IF;
    IF opcion = 'opc_mostrar_chip_ventas' THEN
      SELECT C.idChip, C.icc, C.numero, C.operadora FROM chips C INNER JOIN productos P ON P.idProducto = C.idProducto INNER JOIN detallemovimiento DM ON DM.idProducto = P.idProducto
  WHERE P.idSucursal = sucursal AND DM.stock > 0;
    END IF;
    IF opcion = 'opc_mostrar_protector_ventas' THEN
      SELECT PR.idProtector, TP.nombre, PR.modeloCelular, DM.stock FROM protectores PR 
	INNER JOIN tipoprotector TP ON TP.idTipoProtector = PR.idTipoProtector 
    INNER JOIN productos P ON P.idProducto = PR.idProducto 
    INNER JOIN detallemovimiento DM ON DM.idProducto = PR.idProducto
WHERE P.idSucursal = sucursal AND DM.stock > 0;
    END IF;
    IF opcion = 'opc_mostrar_accesorio_ventas' THEN
      SELECT A.idAccesorio, TA.nombre, A.codigo, A.descripcion, DM.stock FROM accesorios A 
INNER JOIN tipoaccesorio TA ON TA.idTipoAccesorio = A.idTipoAccesorio 
INNER JOIN productos P ON P.idProducto = A.idProducto 
INNER JOIN detallemovimiento DM ON DM.idProducto = P.idProducto WHERE P.idSucursal = sucursal AND DM.stock > 0;
    END IF;
    IF opcion = 'opc_mostrar_ventas' THEN
      SELECT V.numVenta,V.tipoDocumento,S.nombre, CONCAT(R.nombres,' ',R.apellidos), V.fechaVenta, V.cantidadTotal FROM venta V 
INNER JOIN sucursales S ON S.idSucursal = V.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable;
    END IF;
    IF opcion = 'opc_buscar_envios' THEN
      SELECT M.numMovimiento, M.fechaEnvio, S.nombre, CONCAT(R.nombres,' ',R.apellidos),M.cantidadTotal FROM movimiento M 
INNER JOIN sucursales S ON S.idSucursal = M.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable WHERE M.fechaEnvio BETWEEN inicio AND fin;
    END IF;
    IF opcion = 'opc_buscar_ventas' THEN
      SELECT V.numVenta,V.tipoDocumento,S.nombre, CONCAT(R.nombres,' ',R.apellidos), V.fechaVenta, V.cantidadTotal FROM venta V 
INNER JOIN sucursales S ON S.idSucursal = V.idSucursal
INNER JOIN responsables R ON R.idResponsable = S.idResponsable WHERE V.fechaVenta BETWEEN inicio AND fin;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saldos_sucursales`(IN `opcion` VARCHAR(100), IN `sucursal` INT)
    NO SQL
BEGIN
	IF opcion = 'opc_saldo_celulares' THEN
    	SELECT DM.idProducto, C.imei, C.serie, C.modelo, DM.cantidad, DM.cantidadvendida FROM detallemovimiento DM 
	INNER JOIN movimiento M ON M.numMovimiento = DM.numMovimiento
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN celulares C ON C.idProducto = P.idProducto
WHERE M.idSucursal = sucursal AND P.idTipoProducto = 1;
    END IF;
    
    IF opcion = 'opc_saldo_chips' THEN
    	SELECT DM.idProducto, C.icc, C.numero, C.operadora, DM.cantidad, DM.cantidadvendida FROM detallemovimiento DM 
	INNER JOIN movimiento M ON M.numMovimiento = DM.numMovimiento
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN chips C ON C.idProducto = P.idProducto
WHERE M.idSucursal = sucursal AND P.idTipoProducto = 2;
    END IF;
    
    IF opcion = 'opc_saldo_accesorio' THEN
    	SELECT DM.idProducto, TA.nombre, C.codigo, C.descripcion, DM.cantidad, DM.cantidadvendida FROM detallemovimiento DM 
	INNER JOIN movimiento M ON M.numMovimiento = DM.numMovimiento
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN accesorios C ON C.idProducto = P.idProducto
    INNER JOIN tipoaccesorio TA ON TA.idTipoAccesorio = C.idTipoAccesorio
WHERE M.idSucursal = sucursal AND P.idTipoProducto = 4;
    END IF;
    IF opcion = 'opc_saldo_protectores' THEN
    	SELECT DM.idProducto, TR.nombre, C.modeloCelular, DM.cantidad, DM.cantidadvendida FROM detallemovimiento DM 
	INNER JOIN movimiento M ON M.numMovimiento = DM.numMovimiento
    INNER JOIN productos P ON P.idProducto = DM.idProducto
    INNER JOIN tipoproducto TP ON TP.idTipoProducto = P.idTipoProducto
    INNER JOIN protectores C ON C.idProducto = P.idProducto
    INNER JOIN tipoprotector TR ON TR.idTipoProtector = C.idTipoProtector
WHERE M.idSucursal = sucursal AND P.idTipoProducto = 3;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_seleccion_productos`(IN `opcion` VARCHAR(200), IN `id` INT)
    NO SQL
BEGIN
  IF opcion = 'opc_seleccion_celular' THEN
      SELECT idProducto, modelo, imei, serie FROM celulares WHERE idCelular = id;
    END IF;
    IF opcion = 'opc_seleccion_chip' THEN
      SELECT idProducto, icc, numero, operadora FROM chips WHERE idChip = id;
    END IF;
    IF opcion = 'opc_seleccion_protector' THEN
      SELECT PR.idProducto, TP.nombre, PR.modeloCelular FROM protectores PR INNER JOIN tipoprotector TP ON TP.idTipoProtector = PR.idTipoProtector WHERE idProtector = id;
    END IF;  
    IF opcion = 'opc_seleccion_accesorio' THEN
      SELECT A.idProducto, CONCAT(TA.nombre,' - ',A.descripcion), A.codigo FROM accesorios A INNER JOIN tipoaccesorio TA ON TA.idTipoAccesorio = A.idTipoAccesorio WHERE idAccesorio = id;

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
  `idTipoAccesorio` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `descripcion` varchar(65) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`idAccesorio`),
  KEY `idProducto` (`idProducto`),
  KEY `idTipoAccesorio` (`idTipoAccesorio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`idAccesorio`, `idProducto`, `idTipoAccesorio`, `codigo`, `descripcion`, `cantidad`, `precio`) VALUES
(1, 4, 1, '000255', 'CARGADOR DE SAMSUMG', 25, 35.75),
(2, 8, 2, 'AUD0001', 'AUDIFONOS BEATS', 20, 150.2);

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
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` double NOT NULL,
  PRIMARY KEY (`idCelular`,`imei`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `celulares`
--

INSERT INTO `celulares` (`idCelular`, `idProducto`, `imei`, `serie`, `marca`, `modelo`, `cantidad`, `precio`) VALUES
(1, 1, '111125451224541', '115650154000545454', 'SAMSUMG', 'GALAXY J2', 0, 650.75),
(2, 5, '222264646445487', '121540405454545452', 'HUAWEI', 'P9 PLUS', 0, 1450.35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chips`
--

CREATE TABLE IF NOT EXISTS `chips` (
  `idChip` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `icc` varchar(65) NOT NULL,
  `numero` varchar(65) NOT NULL,
  `operadora` varchar(65) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` double NOT NULL,
  PRIMARY KEY (`idChip`,`icc`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `chips`
--

INSERT INTO `chips` (`idChip`, `idProducto`, `icc`, `numero`, `operadora`, `cantidad`, `precio`) VALUES
(1, 2, '3265867484784848484', '938254410', 'MOVISTAR', 0, 15.75),
(2, 6, '5656111115454545454', '964400899', 'MOVISTAR', 1, 15.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemovimiento`
--

CREATE TABLE IF NOT EXISTS `detallemovimiento` (
  `numDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `numMovimiento` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) DEFAULT NULL,
  `cantidadVendida` int(11) NOT NULL DEFAULT '0',
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`numDetalle`),
  KEY `numMovimiento` (`numMovimiento`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `detallemovimiento`
--

INSERT INTO `detallemovimiento` (`numDetalle`, `numMovimiento`, `stock`, `cantidad`, `cantidadVendida`, `idProducto`) VALUES
(1, 1, 0, 1, 1, 1),
(2, 1, 0, 1, 1, 2),
(3, 2, 0, 1, 1, 5),
(4, 2, 30, 30, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE IF NOT EXISTS `detalleventa` (
  `numDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `ventaID` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  `importe` double DEFAULT NULL,
  PRIMARY KEY (`numDetalle`),
  KEY `ventaID` (`ventaID`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`numMovimiento`, `idSucursal`, `fechaEnvio`, `cantidadTotal`, `activo`) VALUES
(1, 1, '2016-06-25', 2, b'1'),
(2, 2, '2016-06-25', 31, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoProducto` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL DEFAULT '7',
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fechaIngreso` date NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idSucursal` (`idSucursal`),
  KEY `idTipoProducto` (`idTipoProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idTipoProducto`, `idSucursal`, `estado`, `fechaIngreso`, `activo`) VALUES
(1, 1, 1, 'V', '2016-06-25', b'1'),
(2, 2, 1, 'V', '2016-06-25', b'1'),
(3, 3, 2, 'A', '2016-06-25', b'1'),
(4, 4, 7, 'A', '2016-06-25', b'1'),
(5, 1, 2, 'V', '2016-06-25', b'1'),
(6, 2, 7, 'A', '2016-06-25', b'1'),
(7, 3, 7, 'A', '2016-06-25', b'1'),
(8, 4, 7, 'A', '2016-06-25', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protectores`
--

CREATE TABLE IF NOT EXISTS `protectores` (
  `idProtector` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `idTipoProtector` int(11) NOT NULL,
  `modeloCelular` varchar(65) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`idProtector`),
  KEY `idProducto` (`idProducto`),
  KEY `idTipoProtector` (`idTipoProtector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `protectores`
--

INSERT INTO `protectores` (`idProtector`, `idProducto`, `idTipoProtector`, `modeloCelular`, `cantidad`, `precio`) VALUES
(1, 3, 1, 'SAMSUMG GALAXY S7', -5, 18.5),
(2, 7, 3, 'SAMSUMG GALAXY S7', 18, 32.5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`idResponsable`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `activo`) VALUES
(1, '11223344', 'ERICK', 'ALFARO', 'AV. PERU 111', '500005', b'1'),
(2, '11223344', 'JORGE', 'ARIAS', 'AV. ESPAÑA 222', '900009', b'1'),
(3, '55664488', 'JUAN', 'PEREZ', 'AV. AMERICA 333', '400004', b'1'),
(4, '22003399', 'MARIA', 'UGARTE', 'AV. VALLEJO 444', '700007', b'1'),
(5, '99775588', 'SOFIA', 'RODRIGUEZ', 'AV. SANTA 555', '800008', b'1'),
(6, '55442200', 'KATY', 'SANCHEZ', 'AV. PUMACAHUA 666', '300003', b'1'),
(7, '55566566', 'FLOR', 'PADILLA', 'AV. PUMACAHUA 666', '300003', b'1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idSucursal`, `idResponsable`, `nombre`, `direccion`, `telefono`) VALUES
(1, 1, 'ALICEL 1', 'JR. BOLIVAR', '100001'),
(2, 2, 'ALICEL 2', 'JR. BOLIVAR', '200002'),
(3, 3, 'ENTEL', 'JR. BOLIVAR', '300003'),
(4, 4, 'PIZARRO', 'JR. BOLIVAR', '400004'),
(5, 5, 'ALMAGRO', 'JR. BOLIVAR', '500005'),
(6, 6, 'AS MOVILES', 'JR. BOLIVAR', '600006'),
(7, 7, 'CENTRAL', 'CENTRAL', '6666466');

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
  `ventaID` int(11) NOT NULL AUTO_INCREMENT,
  `numVenta` varchar(15) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `tipoDocumento` varchar(5) DEFAULT NULL,
  `fechaVenta` date NOT NULL,
  `cantidadTotal` int(11) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`ventaID`),
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
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`ventaID`) REFERENCES `venta` (`ventaID`),
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
