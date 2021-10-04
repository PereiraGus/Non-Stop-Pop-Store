<?php

include "data.php";

$user = $_POST["txtuser"];
$email = $_POST["txtemail"];
$tel = $_POST["txttel"];
$pic = $_POST["txtpic"];
$passw = $_POST["txtpassw"];

/*Testar a captura dos parâmetros
echo $user."<br>";
echo $email."<br>";
echo $tel."<br>";
echo $pic."<br>";
echo $passw."<br>";*/


$find = $connect->query("select * from Usuários where Email = '$email';");
$show = $find->fetch(PDO::FETCH_ASSOC);

if($find->rowCount() >= 1)
{
	header("location:error.php?duplicate");
}
else
{
	$insert = $connect->query("insert into tbuser values (default, '$user', '$pic', '$email', '$tel', '$passw',
	0)");
	header("location:index.php");
}
?>