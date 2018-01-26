<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$fecha = date('Y-m-d');
	//$last_id = -1;
	$sql = "SELECT `id` FROM `requisicion` ORDER BY `id` DESC";
	if (($resultado = $conn->query($sql)) !== FALSE) {
		if ($resultado->num_rows > 0) {
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			$last_id = $row["id"];
		}	
	}
	$last_id += 1;
	foreach ($_POST["id"] as &$valor) {
	
		$sql = "INSERT INTO `requisicion` (`id`, `usuario_id`, `producto_id`, `estado`, `fecha`) VALUES (".$last_id.", '".$_SESSION["id"]."', '".$valor."', '0', '".$fecha."');";
		echo $sql;

		if ($conn->query($sql) === TRUE) {
			$_SESSION["mensaje"] = TRUE;
			$_SESSION["carrito"] = [];
		}
	}
	header('Location: index.php');
 ?>