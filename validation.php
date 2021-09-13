<?php
	include "data.php";
	
	session_start();
	
	$userLogin = $_POST["txtemail"];
	$userPassw = $_POST["txtpassw"];
	
	echo $userLogin."<br>";
	echo $userPassw;
	
	$find = $connect->query("select * from Usuários where (Email ='$userLogin' or Usuário = '$userLogin') and Senha = '$userPassw'");
		
	if($find->rowCount() == 1)
	{
		$show = $find->fetch(PDO::FETCH_ASSOC);
		$_SESSION["ID"] = $show["codUser"];
		header("location:index.php");
	}
	else
	{
		header("location:login.php?status=error");
	}
?>