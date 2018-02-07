<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	if (isset($_POST["tipo"])) {
		if ($_POST["tipo"] == "requisicion") {
			$id = $_POST["id"];
			$estado = $_POST["estado"];
			$sql2 = "UPDATE `requisicion` SET `estado` = '".$estado."' WHERE `requisicion`.`id` = ".$id;
			$conn->multi_query($sql2);
		}
		if ($_POST["tipo"] == "persona") {
			$id = $_POST["id"];
			$estado = $_POST["estado"];
			$sql2 = "UPDATE `usuario` SET `estado` = '".$estado."' WHERE `usuario`.`id` = ".$id;
			$conn->multi_query($sql2);
		}
		if ($_POST["tipo"] == "tipo_usuario") {
			$id = $_POST["id"];
			$estado = $_POST["estado"];
			$sql2 = "UPDATE `usuario` SET `tipo` = '".$estado."' WHERE `usuario`.`id` = ".$id;
			$conn->multi_query($sql2);
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