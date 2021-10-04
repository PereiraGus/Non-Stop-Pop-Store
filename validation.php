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
		if($show["Nível de acesso"] == true)
		{
			$_SESSION["ADMIN"] = 1;
		}
		else
		{
			$_SESSION["ADMIN"] = 0;
		}
		$_SESSION["ID"] = $show["codUser"];
		header("location:index.php");
	}
	else
	{
		$find = $connect->query("select * from Usuários where (Email ='$userLogin' or Usuário = '$userLogin')");
		if($find->rowCount() == 0)
		{
			header("location:error.php?email");
		}
		else
		{
			$find = $connect->query("select * from Usuários where Senha = '$userPassw'");
			if($find->rowCount() == 0)
			{
				header("location:error.php?passw");
			}
		}
	}
?>