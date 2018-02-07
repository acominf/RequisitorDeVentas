<?php  
	include 'partials/includer.php';
	include 'partials/cabezera.php';
	include 'partials/navbar.php';
	session_start();
	session_unset();
	session_destroy();
	header('Location: index.php');
?>