<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';

	$carrito = array();
	$carrito = [
		"id" => $_GET["id"],
		"nombre" => $_GET["nombre"],
	];
	$_SESSION["mensaje"] = TRUE;
	array_push ($_SESSION["carrito"] , $carrito ); 
	header('Location: ' . $_SERVER['HTTP_REFERER']);

 ?>