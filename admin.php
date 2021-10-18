<! DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Non Stop Pop Store</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="sourtout icon" href="img/icon/favicon.ico">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body style="background-color: #333333">
		<?php 
			if(empty($_SESSION["ADMIN"]) || $_SESSION["ADMIN"] != 1)
			{ 
				//header("location:index.php");  
			}
			include "nav.php";
			include "data.php";
			$find = $connect->query("select * from allAlbums");
		?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4 text-center">
					<h2 style="color: white">Área administrativa</h2><hr>
					
					<a href="formSong.php" style="color: black;">
						<button class="btn" style="font-size: 30px; margin-bottom: 15px;">Adicionar música</button>
					</a>
					<button class="btn" style="font-size: 30px; margin-bottom: 15px;">Adicionar artista</button>
					<a href="formAlbum.php" style="color: black;">
						<button class="btn" style="font-size: 30px; margin-bottom: 15px;">Adicionar álbum</button>
					</a>
					<button class="btn" style="font-size: 30px; margin-bottom: 15px;">Adicionar estilo</button>
					<a href="index.php" style="color: black;">
						<button class="btn" style="font-size: 30px; margin-bottom: 15px;">Voltar ao site</button>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>