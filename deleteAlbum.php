<?php
include "data.php";

$cod = $_GET["id"];

$path = "img/covers/";

$find=$connect->query("select Capa from allAlbums where (Código = '$cod')");
$show=$find->fetch(PDO::FETCH_ASSOC);

$coverPic=$show["Capa"];
if($coverPic!="")
{
	unlink($path.$coverPic);
}

$delete=$connect->query("delete from tbalbum where (codAlb = '$cod')");
$delete=$connect->query("delete from tbalbumgenero where (codAlb = '$cod')");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-color: #333333">
	<h1 align="center" style="color:white">Exclusão realizada com sucesso</h1>
	<div style="display:flex;justify-content: space-evenly;">
		<h1>
			<a href="menuAlterAlbum.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Excluir mais álbuns</button>
			</a>
			<a href="admin.php">
				<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Voltar ao menu administrativo</button>
			</a>
		</h1>
	</div>
</body>