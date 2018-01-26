<?php 
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	$sql = "SELECT * FROM 'requisicion'";
	$sql2 = "SELECT * FROM 'usuario' WHERE tipo IS NOT 0"
 ?>
