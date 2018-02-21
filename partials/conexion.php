<?php

	header('Access-Control-Allow-Origin: *');

	$servidor = "localhost";
	$bd = "requisitordecompras";
	$usuario = "root";
	$contrasena = "";

	$conn = mysqli_connect($servidor, $usuario, $contrasena, $bd);

	// Comprobando el estado de la coneccion

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>
