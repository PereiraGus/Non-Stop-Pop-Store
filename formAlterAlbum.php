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
			
			$cod = $_GET["id"];
			$find = $connect->query("select * from allAlbums where (Código = '$cod')");
			$show = $find->fetch(PDO::FETCH_ASSOC);
			
			$tipoAtual = $show["Tipo do álbum"];
			$estiloAtual = $show["Gênero"];
			$anoAtual = $show["Ano"];
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<h3 style="color: white;">Alterando o <?php echo $tipoAtual." ".$show["Álbum"]; ?> </h3>
					<form method="post" style="color: white;" action="alterAlbum.php?id=<?php echo $cod ?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="albName">Título do álbum</label>
							<input name="albName" type="text" class="form-control" required id="albName" value="<?php echo $show["Álbum"]?>">
						</div>
						<div class="form-group">
							<label for="albTip">Tipo do álbum</label><br>
							<select name="albTip" class="form-select" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
								<?php
									$find = $connect->query("select * from tbtipo");
									while($show = $find->fetch(PDO::FETCH_ASSOC))
									{
										if($show["nomeTip"] == $tipoAtual)
										{
											$selected = "selected";
										}
										else {$selected = "";}
										echo "<option value=".$show["codTip"]." ".$selected.">".$show["nomeTip"]."</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="albCapa">Foto de capa</label><br>
							<input name="albCapa" style="width:100%" type="file" accept="img/covers/*" id="albCapa">
							<?php
							$find = $connect->query("select * from allAlbums where (Código = '$cod')");
							$show = $find->fetch(PDO::FETCH_ASSOC);
							?>
							<div style="display:flex;align-items:center;">
							<img src="img/covers/<?php echo $show["Capa"] ?>" style="width:50%;margin-top:2.5%;">
							<small>Imagem atual (Não fazer upload de nenhuma outra para mantê-la)</small>
							</div>
						</div>
						<div class="form-group">
							<label for="albEst">Estilo</label><br>
							<select name="albEst" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
								<?php
									$estiloAtual = $show["Gênero"];
									$find = $connect->query("select * from tbgenero");
									while($show = $find->fetch(PDO::FETCH_ASSOC))
									{
										if($show["nomeGen"] == $estiloAtual)
										{
											$selected = "selected";
										}
										else {$selected = "";}
										echo "<option value=".$show["codGen"]." ".$selected.">".$show["nomeGen"]."</option>";
									}
									
									$find = $connect->query("select * from allAlbums");
									$show = $find->fetch(PDO::FETCH_ASSOC);
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="albAno">Ano de lançamento do álbum</label>
							<input maxlength="4" name="albAno" type="text" class="form-control" required id="albAno" value="<?php echo $anoAtual ?>">
						</div>
						<div class="form-group">
							<label for="albLanc">É lançamento?</label><br>
							<select name="albLanc" style="color: black; width: 100%; border-radius: 3px; padding: 8px;">
									<option value="N">NÃO</option>
									<option value="Y">SIM</option>
							</select>
						</div>
						<center>
							<button type="submit" class="btn" style="color: black; background: white; font-size: 17px;">Alterar</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>