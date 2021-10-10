<?php
	$server = "localhost";
	$user = "main";
	$passw = "Negocios1.";
	$db = "dbmusic";

	$connect = new PDO("mysql:host=$server;dbname=$db",$user,$passw);
?>