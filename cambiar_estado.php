<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	if (isset($_POST["cambiar_estado"])) {
		foreach($_POST["persona"] as $key => $value) {
			$sql = "SELECT * FROM `usuario` WHERE `usuario`.`id` = ".$key;
			if (($resultado = $conn->query($sql)) !== FALSE) {
				if ($resultado->num_rows > 0) {
					$usuario = $resultado->fetch_array(MYSQLI_ASSOC);
					$estado = $usuario["estado"] == 0? 1 : 0; 
					$sql2 = "UPDATE `usuario` SET `estado` = '".$estado."' WHERE `usuario`.`id` = ".$key;
					echo $sql2."<br>";
					if ($conn->multi_query($sql2)=== TRUE){
					}
				}
			}
		}
		foreach($_POST["requisicion"] as $key => $value) {
			$sql = "SELECT * FROM `requisicion` WHERE `requisicion`.`id` = ".$key;
			if (($resultado = $conn->query($sql)) !== FALSE) {
				if ($resultado->num_rows > 0) {
					$requisicion = $resultado->fetch_array(MYSQLI_ASSOC);
					$estado = $requisicion["estado"] == 0? 1 : 0; 
					$sql2 = "UPDATE `requisicion` SET `estado` = '".$estado."' WHERE `requisicion`.`id` = ".$key;
					if ($conn->multi_query($sql2)=== TRUE){
					}
				}
			}			
		}		
	}else{
		$id = $_GET["id"];
		$tipo = $_GET["tipo"];
		$estado = $_GET["estado"];
		if($tipo == "producto"){
			if ($estado==0) {
				$sql = "UPDATE `producto` SET `estado` = '1' WHERE `producto`.`id` = ".$id;
			}else{
				$sql = "UPDATE `producto` SET `estado` = '0' WHERE `producto`.`id` = ".$id;
			}
		}
		if($tipo == "proveedor"){
			if ($estado==0) {
				$sql = "UPDATE `usuario` SET `estado` = '1' WHERE `id` = ".$id;
			}else{
				$sql = "UPDATE `usuario` SET `estado` = '0' WHERE `id` = ".$id;
			}
		}
		if ($conn->multi_query($sql)=== TRUE){
		}else{
			echo "nope";
		}
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);


 ?>