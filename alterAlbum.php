<?php
include "data.php";
include "resize-class.php";

$cod = $_GET["id"];
$nome = $_POST["albName"];
$tipo = $_POST["albTip"];
$estilo = $_POST["albEst"];
$ano = $_POST["albAno"];
$lanc = $_POST["albLanc"];

echo $cod."<br>";
echo $nome."<br>";
echo $tipo."<br>";
echo $estilo."<br>";
echo $ano."<br>";
echo $lanc;

if($_FILES['albCapa']['size'] == 0)
{
	$find=$connect->query("select * from allAlbums where (Código = '$cod')");
	$show=$find->fetch(PDO::FETCH_ASSOC);
	$imgName = $show["Capa"];
}
else
{
	$imgReciever = $_FILES['albCapa'];
	$path = "img/covers/";
	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$imgReciever['name'],$extension);
	$imgName = md5(uniqid(time())).".".$extension[1];
	
	move_uploaded_file($imgReciever['tmp_name'], $path.$imgName);             
	$resizeObj = new resize($path.$imgName);
	$resizeObj -> resizeImage(300, 300, 'crop');
	$resizeObj -> saveImage($path.$imgName, 100);
}

$alter=$connect->query("update tbalbum set nomeAlb = '$nome', capaAlb = '$imgName', lancAlb = '$lanc', anoAlb = '$ano', codTip = '$tipo' where (codAlb = '$cod')");
$alter=$connect->query("update tbalbumgenero set codGen = '$estilo' where (codAlb = '$cod')");

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-color: #333333">
	<h1 align="center" style="color:white">Alteração realizada com sucesso</h1>
	<div style="display:flex;justify-content: space-evenly;">
		<h1>
			<a href="menuAlterAlbum.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Alterar mais álbuns</button>
			</a>
			<a href="admin.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Voltar ao menu administrativo</button>
			</a>
		</h1>
	</div>
	<h3 align="center" style="color:white">
		Atenção: O álbum não aparecerá no site a menos que você cadastre uma música nele!
	</h3>
</body>