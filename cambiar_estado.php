<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
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
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		echo "nope";
	}
 ?>