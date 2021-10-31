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
					<form method="post" style="color: white;" action="insertAlb.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="albName">Título do álbum</label>
							<input name="albName" type="text" class="form-control" required id="albName">
						</div>
						<div class="form-group">
							<label for="albTip">Tipo do álbum</label><br>
							<select name="albTip" class="form-select" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
								<?php
									$find = $connect->query("select * from tbtipo;");
									while($show = $find->fetch(PDO::FETCH_ASSOC))
									{
										echo "<option value='".$show["codTip"]."'>".$show["nomeTip"]."</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="albCapa">Foto de capa</label><br>
							<input name="albCapa" style="width:100%" type="file" accept="img/covers/*" required id="albCapa">
						</div>
						<div class="form-group">
							<label for="albEst">Estilo</label><br>
							<select name="albEst" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
								<?php
									$find = $connect->query("select * from tbgenero;");
									while($show = $find->fetch(PDO::FETCH_ASSOC))
									{
										echo "<option value='".$show["codGen"]."'>".$show["nomeGen"]."</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="albAno">Ano de lançamento do álbum</label>
							<input maxlength="4" name="albAno" type="text" class="form-control" required id="albAno">
						</div>
						<div class="form-group">
							<label for="albLanc">É lançamento?</label><br>
							<select name="albLanc" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
									<option value="N">NÃO</option>
									<option value="Y">SIM</option>
							</select>
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