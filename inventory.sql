DROP DATABASE IF EXISTS inventory;
CREATE DATABASE inventory;
USE inventory;

CREATE TABLE Usuarios
(
	idUsuario	INT AUTO_INCREMENT,
	usuario 	VARCHAR (50) NOT NULL,
	password	VARCHAR (50) NOT NULL,
	nombres 	VARCHAR (65) NOT NULL,
	apellidos 	VARCHAR (65) NOT NULL,
	activo 		BIT (1) NOT NULL,

	PRIMARY KEY (idUsuario)
);

INSERT INTO Usuarios VALUES (NULL,'florpadilla@alicel.com', 'florpadilla', 'Flor', 'Padilla', 1);

CREATE TABLE Responsables
(
	idResponsable 	INT AUTO_INCREMENT,
	dni 			CHAR (8) NOT NULL,
	nombres			VARCHAR (65) NOT NULL,
	apellidos		VARCHAR (65) NOT NULL,
	direccion		VARCHAR (80) NOT NULL,
	telefono 		VARCHAR (20) NOT NULL,
	activo 			BIT (1) NOT NULL,

	PRIMARY KEY (idResponsable)
);

CREATE TABLE Sucursales
(
	idSucursal		INT AUTO_INCREMENT,
	idResponsable 	INT NOT NULL,
	nombre 			VARCHAR (20) NOT NULL,
	direccion 		VARCHAR (80) NOT NULL, 
	telefono		VARCHAR (15) NULL,

	PRIMARY KEY (idSucursal,idResponsable),	
	FOREIGN KEY (idResponsable) REFERENCES Responsables (idResponsable)

);

CREATE TABLE TipoProducto
(
	idTipoProducto	INT AUTO_INCREMENT,
	nombre 			VARCHAR (65) NOT NULL,

	PRIMARY KEY (idTipoProducto)
);

INSERT INTO TipoProducto (nombre) VALUES ('CELULARES');
INSERT INTO TipoProducto (nombre) VALUES ('CHIPS');
INSERT INTO TipoProducto (nombre) VALUES ('PROTECTORES');
INSERT INTO TipoProducto (nombre) VALUES ('ACCESORIOS');

CREATE TABLE Productos 
(
	idProducto		INT AUTO_INCREMENT,
	idTipoProducto 	INT NOT NULL,
	idSucursal 		INT NOT NULL,
	estado 			CHAR (1) NOT NULL DEFAULT 'A',
	fechaIngreso	DATE NOT NULL,
	activo 			BIT (1) NOT NULL,

	PRIMARY KEY (idProducto),
	FOREIGN KEY (idSucursal) REFERENCES Sucursales (idSucursal),
	FOREIGN KEY (idTipoProducto) REFERENCES TipoProducto (idTipoProducto)
);

-- A:ALMACEN, M:MOSTRADOR, V:VENDIDO

CREATE TABLE Celulares
(
	idCelular 		INT AUTO_INCREMENT,	
	idProducto 		INT NOT NULL,
	imei 			VARCHAR (65) NOT NULL,
	serie 			VARCHAR (65) NOT NULL,
	marca			VARCHAR (65) NOT NULL,
	modelo	 		VARCHAR (65) NOT NULL,	

	PRIMARY KEY (idCelular, imei),	
	FOREIGN KEY (idProducto) REFERENCES Productos (idProducto)
);

CREATE TABLE Chips
(
	idChip	 	INT AUTO_INCREMENT,	
	idProducto 	INT NOT NULL,
	icc 		VARCHAR (65) NOT NULL,
	numero 		VARCHAR (65) NOT NULL,
	descripcion TEXT NOT NULL,		

	PRIMARY KEY (idChip, icc),
	FOREIGN KEY (idProducto) REFERENCES Productos (idProducto)
);

CREATE TABLE TipoProtector
(
	idTipoProtector INT AUTO_INCREMENT,
	nombre 			VARCHAR (20) NOT NULL,

	PRIMARY KEY (idTipoProtector)
);

INSERT INTO TipoProtector (nombre) VALUES ('FLIPCOVER');
INSERT INTO TipoProtector (nombre) VALUES ('TPU');
INSERT INTO TipoProtector (nombre) VALUES ('COVER DISEÑO');
INSERT INTO TipoProtector (nombre) VALUES ('GOMA');
INSERT INTO TipoProtector (nombre) VALUES ('METALICO');

CREATE TABLE Protectores
(
	idProtector 	INT AUTO_INCREMENT,
	idProducto 		INT NOT NULL,
	tipo 			VARCHAR (30) NOT NULL,
	modeloCelular	VARCHAR (65) NOT NULL,
	cantidad 		INT NOT NULL,

	PRIMARY KEY (idProtector),
	FOREIGN KEY (idProducto) REFERENCES Productos (idProducto)
);

CREATE TABLE TipoAccesorio
(	
	idTipoAccesorio INT AUTO_INCREMENT,
	nombre 			VARCHAR (20) NOT NULL,

	PRIMARY KEY (idTipoAccesorio)
);

INSERT INTO TipoAccesorio (nombre) VALUES ('CARGADOR');
INSERT INTO TipoAccesorio (nombre) VALUES ('AUDIFONOS');
INSERT INTO TipoAccesorio (nombre) VALUES ('BATERIA');
INSERT INTO TipoAccesorio (nombre) VALUES ('MEMORIA');
INSERT INTO TipoAccesorio (nombre) VALUES ('CABLE DE DATOS');

CREATE TABLE Accesorios
(
	idAccesorio INT AUTO_INCREMENT,
	idProducto 	INT NOT NULL,
	tipo 		VARCHAR (30) NOT NULL,
	codigo	    VARCHAR (30) NOT NULL,
	descripcion	VARCHAR (65) NULL,
	cantidad 	INT NOT NULL,	

	PRIMARY KEY (idAccesorio),
	FOREIGN KEY (idProducto) REFERENCES Productos (idProducto)
);

CREATE TABLE Movimiento
(
  	numMovimiento INT AUTO_INCREMENT,
  	idResponsable INT NOT NULL,
  	destino       INT NOT  NULL,
  	fechaEnvio    DATE NOT NULL, 	
  	cantidadTotal INT NOT NULL,
  	activo		  BIT (1) NOT NULL,

  PRIMARY KEY (numMovimiento),
  FOREIGN KEY (idResponsable) REFERENCES Responsables (idResponsable),
  FOREIGN KEY (destino) REFERENCES Sucursales (idSucursal)
);

CREATE TABLE DetalleMovimiento
(
	numMovimiento INT AUTO_INCREMENT,	
	idProducto 	  INT NOT NULL,

	PRIMARY KEY (numMovimiento),
	FOREIGN KEY (numMovimiento) REFERENCES Movimiento (numMovimiento)
);

CREATE TABLE Venta
(
  	numVenta  		VARCHAR (15) NOT NULL,
  	idSucursal		INT NOT NULL,
  	fechaVenta		DATE NOT NULL,  
  	importe 		DECIMAL (4,2) NOT NULL,	
  	cantidadTotal 	INT NOT NULL,
  	activo			BIT (1) NOT NULL,

  	PRIMARY KEY (numVenta),
  	FOREIGN KEY (idSucursal) REFERENCES Sucursales (idSucursal)
);

CREATE TABLE DetalleVenta
(
	numVenta  	VARCHAR (15) NOT NULL,
	idProducto 	INT NOT NULL,
	cantidad	INT NOT NULL,
	precio 		DECIMAL (4,2) NOT NULL,

	PRIMARY KEY (numVenta),
	FOREIGN KEY (numVenta) REFERENCES Venta (numVenta)
);
