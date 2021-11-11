<?php

include 'data.php';
include 'resize-class.php';

$name = $_POST['albName'];
$tipo = $_POST['albTip'];
$art = $_POST['albArt'];
$estilo = $_POST['albEst'];
$ano = $_POST['albAno'];
$lanc = $_POST['albLanc'];

$imgReciever = $_FILES['albCapa'];

$path = "img/covers/";

preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$imgReciever['name'],$extension);

$imgName = md5(uniqid(time())).".".$extension[1];


echo $name."<br>";
echo $tipo."<br>";
echo $art."<br>";
echo $estilo."<br>";
echo $ano."<br>";
echo $lanc."<br>";

$insert=$connect->query("insert into tbalbum values (default, '$name', '$imgName', '$lanc', '$ano', '$tipo')");
$insert=$connect->query("insert into tbalbumgenero values ((select codAlb from tbalbum where (nomeAlb = '$name')), '$estilo')");

move_uploaded_file($imgReciever['tmp_name'], $path.$imgName);             
$resizeObj = new resize($path.$imgName);
$resizeObj -> resizeImage(300, 300, 'crop');
$resizeObj -> saveImage($path.$imgName, 100);

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-color: #333333">
	<h1 align="center" style="color:white">Inserção realizada com sucesso</h1>
	<div style="display:flex;justify-content: space-evenly;">
		<h1>
			<a href="formAlbum.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Cadastrar mais álbuns</button>
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
