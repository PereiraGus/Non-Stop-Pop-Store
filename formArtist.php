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
			include "nav.php";
			include "data.php";
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<h2 style="color: white;">Inclusão de artista</h2>
					<form method="post" style="color: white;" action="insertArtist.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="artName">Nome do(a) artista</label>
							<input name="artName" type="text" class="form-control" required id="artName">
						</div>
						<div class="form-group">
							<label for="artPic">Foto do artista</label><br>
							<input name="artPic" style="width:100%" type="file" required id="artPic">
						</div>
						<center>
						<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Cadastrar</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>