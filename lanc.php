<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Non Stop Pop Store</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="sourtout icon" href="img/icon/favicon.ico">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<style>
			#a:hover{
				background-color: #302c2c;
			}
		</style>
	</head>
	<body style="background-color: #181414;">
		<?php 
			include "nav.php";
			include "data.php";
			$find = $connect->query("select Capa, Álbum, Artista from allAlbums where lancAlb = 'Y'");
		?>
		
		<div class="jumbotron" style="padding-left: 45px; padding-right: 45px; background-color: #181818;">
			<h1 class="display-4" style="color: white;">Lançamentos</h1>
			<p class="lead" style="color: white;">Mais Tocadas! Todos os hits pop de 2020 e 2021! Lançamentos de Harry Styles, Doja Cat,
			Miley Cyrus, Rosalía, Camila Cabello, Shakira, Little Mix e muito mais!</p>
		</div>
		<div class="container">
			<div class="row">
			
				<?php while($show = $find->fetch(PDO::FETCH_ASSOC))
				{ 
					echo "<a href='#'>"?>
						<div class="col-sm-3" style="border-radius: 5px; background-color: #181818; margin: 10px; padding: 15px; width: 23%;">
							<img style='border-radius: 3px;' height='80%' width='100%' src="<?php echo($show["Capa"]);?>">
							<button type="button" class="btn btn-success" style="border-radius: 50px; padding-top: 10px; padding-bottom: 8px; position: absolute; margin-top: 72%; right: 8%;"><span class="glyphicon glyphicon-usd"></span></button>
							<h3 style='margin-top: 10px; margin-left: 5px; margin-bottom: 0px; color: white; font-weight: bold'><?php echo mb_strimwidth($show["Álbum"], 0, 21, "...");?></h3>
							<h5 style='margin-top: 5px; margin-left: 5px; color: white; margin-bottom: 0px'><?php echo ($show["Artista"]);?></h5>
						</div>
					<?php echo"</a>";
				} ?>
				
			</div>
		</div>
		
		<?php include "footer.html" ?>
		
	</body>
</html>