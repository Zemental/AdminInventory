<?php 
	
	$conexion = null;

	function abrirConexion()
	{
		global $conexion;
		// Conexión con el servidor de base de datos MySQL
		$conexion = mysqli_connect('localhost', 'root', '', 'inventory');
		mysqli_set_charset($conexion, 'utf8');
	}

	function getTipoProtectores()
	{
	    abrirConexion();
	    global $conexion;
	    $resultSet = mysqli_query($conexion, "SELECT * FROM TipoProtector");
	    return $resultSet->fetch_all();
	}

	function getTipoAccesorios()
	{
	    abrirConexion();
	    global $conexion;
	    $resultSet = mysqli_query($conexion, "SELECT * FROM TipoAccesorio");
	    return $resultSet->fetch_all();
	}

?>