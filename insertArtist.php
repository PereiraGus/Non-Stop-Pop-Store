<?php

include 'data.php';
include 'resize-class.php';

$name = $_POST['artName'];

$imgReciever = $_FILES['artPic'];

$path = "img/artists/";

preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$imgReciever['name'],$extension);

$imgName = md5(uniqid(time())).".".$extension[1];

echo $name."<br>";

$error = "";

try {
	$insert=$connect->query("insert into tbartista values (default, '$name', '$imgName')");

	move_uploaded_file($imgReciever['tmp_name'], $path.$imgName);             
	$resizeObj = new resize($path.$imgName);
	$resizeObj -> resizeImage(160, 160, 'crop');
	$resizeObj -> saveImage($path.$imgName, 100);
}
catch(PDOException $error) {
	$success = false;
}

$success = true;

if($success)
{
	$anounce = "Artista ".$name." cadastrado(a) com sucesso.";
}
else
{
	$anounce = "Não foi possível cadastrar o(a) artista selecionado. Erro: ".$error;
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-color: #333333">
	<h1 align="center" style="color:white"><?php echo $anounce; ?></h1>
	<div style="display:flex;justify-content: space-evenly;">
		<h1>
			<a href="formArtist.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Cadastrar mais artistas</button>
			</a>
			<a href="admin.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Voltar ao menu administrativo</button>
			</a>
		</h1>
	</div>
</body>
