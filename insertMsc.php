<?php

include 'data.php';

$name = $_POST['mscName'];
$art = $_POST['mscArt'];
$codAlb = $_POST['mscAlb'];
$expl = $_POST['mscExpl'];

$archive = $_FILES['mscArchive'];
$path = "msc/";

echo $name."<br>";
echo $art."<br>";
echo $codAlb."<br>";
echo $expl."<br>";
echo $path;

$find=$connect->query("select codMsc from tbmusica where (nomeMsc = '$name')");
	while($show = $find->fetch(PDO::FETCH_ASSOC))
	{
		$archName = $show["codMsc"].".mp3";
		echo $archName;
	}

$error = "";

try {
	$insert=$connect->query("insert into tbmusica values (default, '$name', '$codAlb','$expl')");
	move_uploaded_file($archive['tmp_name'], $path.$archName);  
}
catch(PDOException $e) {
	$error->getMessage();
	$success = false;
}

try {
	$insert=$connect->query("insert into tbmusicaartista values ((select codMsc from tbmusica where nomeMsc = '$name'), '$art')");	
}
catch(PDOException $e) {
	$success = false;
}

$success = true;

if($success)
{
	$anounce = "Música ".$name." cadastrada com sucesso.";
}
else
{
	$anounce = "Não foi possível cadastrar a música selecionada. Erro: ".$error;
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-color: #333333">
	<h1 align="center" style="color:white"><?php echo $anounce; ?></h1>
	<div style="display:flex;justify-content: space-evenly;">
		<h1>
			<a href="formSong.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Cadastrar mais músicas</button>
			</a>
			<a href="admin.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Voltar ao menu administrativo</button>
			</a>
		</h1>
	</div>
</body>
