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
			$search = $_GET["search"];
			$find = $connect->query("select Código, Capa, Álbum, Artista from allAlbums where Gênero = '$search'");
			$resNum = $connect->query("select count(*) from AllAlbums where Gênero = '$search'")->fetchColumn(); 
		?>
		
		<?php
		if($resNum == 1)
		{
			echo '<div class="jumbotron" style="padding-left: 45px; padding-right: 45px; background-color: #181818;">';
			echo '<h1 class="display-4" style="color: white;">', $resNum, ' resultado para: "', $search,'"</h1>';
			echo '</div>';
		}
		else if($resNum > 0)
		{
			echo '<div class="jumbotron" style="padding-left: 45px; padding-right: 45px; background-color: #181818;">';
			echo '<h1 class="display-4" style="color: white;">', $resNum, ' resultados para: "', $search,'"</h1>';
			echo '</div>';
		}
		else
		{
			echo '<div class="jumbotron" style="padding-left: 45px; padding-right: 45px; background-color: #181818;">';
			echo '<h1 class="display-4" style="color: white;">Nenhum resultado para "', $search, '" foi encontrado <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/></svg></h1>';
			echo '<p class="lead" style="color: white;">Não foi encontrado nenhum resultado pertinente ao termo digitado ou categoria selecionada.</p>';
			echo '</div>';
		}?>
		
		<div class="container">
			<div class="row">
			
				<?php while($show = $find->fetch(PDO::FETCH_ASSOC))
				{ 
					echo "<a href='album_page.php?alb=".$show["Código"]."'>"?>
						<div class="col-sm-3" style="border-radius: 5px; background-color: #181818; margin: 10px; padding: 15px; width: 23%;">
							<img style='border-radius: 3px;' height='80%' width='100%' src="img/covers/<?php echo($show["Capa"]);?>">
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