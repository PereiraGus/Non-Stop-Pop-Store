<?php
	session_start();
	$codItem = $_GET["cod"];
	
	unset($_SESSION["cart"][$codItem]);
	
	header("location:cart.php");
?>