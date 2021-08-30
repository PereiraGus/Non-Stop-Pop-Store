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
		
		<style>
			.albumHeader{
				background-color: pink;
			}
			.artFoto{
				width: 2%;
				height: 4%;
				border-radius: 500px;
			}
			.albCapa{
				width: 20%;
				heigt: 20%;
			}
			.albumHeader{
				background-color: grey;
			}
		</style>
		
	</head>
	<body style="background-color: black;">
		<?php 
			include "nav.html";
			include "data.php";
			$sqlcode = "select* from AllAlbums where (Álbum = 'Planet Her')";
			$find = $connect->query($sqlcode);
			$show = $find->fetch(PDO::FETCH_ASSOC);
		?>
		
		<span class="albumHeader">
			<?php
				echo "<img class='albCapa' src='".$show["Capa"]."'>";
				echo "<h5>".$show["Tipo do álbum"]."</h5>";
				echo "<h1 style='margin-top: 0px;'>".$show["Álbum"]."</h1>";
				echo "<span 'albDetails'>";
					echo "<img class='artFoto' src='".$show["Foto do artista"]."'>";
					echo "<h5>".$show["Artista"]." • </h5>";
					echo "<h5>".$show["Ano"]." • </h5>";
					echo "<h5>".$show["Número de músicas"]."</h5>";
				echo "</span>";
			?>
		</span>
	</body>
</html>