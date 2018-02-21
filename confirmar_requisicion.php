<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$fecha = date('Y-m-d');
	$last_id = -1;
	$sql = "INSERT INTO `requisicion` (`usuario_id`, `estado`, `fecha`) VALUES ('".$_SESSION["id"]."','2','".$fecha."');";
	
	if (($resultado = $conn->query($sql)) !== FALSE) 
	{
		$last_id = $conn->insert_id;
	}
	foreach ($_POST["id"] as &$valor) 
	{
		$sql = "INSERT INTO `detalleRequisicion` (`requisicionId`, `productoId`) VALUES ('".$last_id."','".$valor."')";
		if ($conn->query($sql) === TRUE) 
		{
			$_SESSION["mensaje"] = TRUE;
			$_SESSION["carrito"] = [];
		}
	}
	header('Location: index.php');
 ?>