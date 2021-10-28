<?php

include 'data.php';

$name = $_POST['albName'];
$tipo = $_POST['albTip'];
$art = $_POST['albArt'];
$estilo = $_POST['albEst'];
$ano = $_POST['albAno'];
$lanc = $_POST['albLanc'];

$img = $_FILES['albCapa'];

$destino = "img/covers";


//gerando nome aleatorio para imagem
// preg_match vai pegar imagens nas extensões jpg|jpeg|png|gif
// do nome que esta na variavel $recebe_foto1 do parametro name e a $extensão vai receber o formato
preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$img['name'],$extension);

// a função md5 vai gerar um valor randomico  com base no horario "time"
// incrementar o ponto e a extensão
// função md5 é criado para gerar criptografia
$img = md5(uniqid(time())).".".$extension[1];


echo $name."<br>";
echo $tipo."<br>";
echo $art."<br>";
echo $estilo."<br>";
echo $ano."<br>";
echo $lanc."<br>";

$error = "";

try {
	$insert=$connect->query("insert into tbalbum values (default, '$name', '$img', '$lanc', '$ano', '$tipo')");	
}
catch(PDOException $error) {
	$error->getMessage();
	$success = false;
}

$success = true;

if($success)
{
	$anounce = "Álbum ".$name." cadastrada com sucesso.";
}
else
{
	$anounce = "Não foi possível cadastrar o álbum selecionado. Erro: ".$error;
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-color: #333333">
	<h1 align="center" style="color:white"><?php echo $anounce; ?></h1>
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
</body>
