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
					<h2 style="color: white;">Inclusão de álbum</h2>
					<form method="post" style="color: white;">
						<div class="form-group">
							<label for="mscName">Título do álbum</label>
							<input name="mscName" type="text" class="form-control" required id="mscName">
						</div>
						<div class="form-group">
							<label for="mscArt">Artista</label><br>
							<select class="form-select" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
								<?php
									$find = $connect->query("select * from tbartista;");
									while($show = $find->fetch(PDO::FETCH_ASSOC))
									{
										echo "<option value='".$show["codArt"]."'>".$show["nomeArt"]."</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="mscAlb">Foto de capa</label><br>
							<input style="width:100%" type="file" accept="img/covers/*" required name="foto1" id="foto1">
						</div>
						<div class="form-group">
							<label for="mscExpl">Estilo</label><br>
							<select style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
								<?php
									$find = $connect->query("select * from tbgenero;");
									while($show = $find->fetch(PDO::FETCH_ASSOC))
									{
										echo "<option value='".$show["codGen"]."'>".$show["nomeGen"]."</option>";
									}
								?>
							</select>
						</div>
						<center>
						<button class="btn" style="color: black; background: white; font-size: 17px;">Cadastrar</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>