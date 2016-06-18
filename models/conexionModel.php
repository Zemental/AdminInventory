<?php

	date_default_timezone_set("America/Lima");
	class ConexionModel{
	    public static function getConexion() {	    
		    $conexion = mysqli_connect("localhost","root","","inventory");
		    return $conexion;
	    }
	}
?>