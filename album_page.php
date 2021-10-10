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
				display: flex;
				padding: 2%;
				padding-top: 2.5%;
				background-color: #181818; 
				border-radius: 0px 0px 5px 5px;"
			}
			.albCapa{
				width: 20%; 
				height: 20%;
				border-radius: 5px;
				margin-right: 1%;
			}
			.details{
				display: flex;
				flex-direction: column;
				justify-content: flex-end;
			}
			.albType{
				color: white; 
				margin-bottom: 0px; 
				font-weight: bold;
			}
			.albTit{
				font-size: 500%;
				margin-top: 3%; 
				margin-bottom: 5%; 
				color: white; 
				font-weight: bold;
			}
			.info{
				display: flex;
				flex-wrap: wrap;
				padding-bottom: 5px;
				align-items: center;
			}
			.info > h5 {
				color: white;
				margin-left: 3px;
				margin-bottom: 0px;
				margin-top: 0px;
				font-size: 150%;
			}
			.artFoto{
				width: 5%; 
				border-radius: 10px;
				margin-right: 5px;
			}
			th, td{
				color: white;
				padding-left: 0px;
				font-size: 17px;
			}
			.art{
				font-size: 12px;
			}
			.index {
				font-size: 22px;
			}
			.table > tbody > tr > td, .table > tbody > tr > th {
				vertical-align: middle;
			}
			.table > tbody > th:hover
				background-color: blue;
			}
		</style>
	</head>
	<body style="background-color: #333;">
		<?php 
			include "nav.php";
			include "data.php";
			if(!empty($_GET["alb"]))
			{
				$codAlb = $_GET["alb"];
				$find = $connect->query("select * from AllAlbums where (Código = '$codAlb')");
				$show = $find->fetch(PDO::FETCH_ASSOC);
				$nomeAlb = $show["Álbum"];
			}
			else
			{
				header("location:index.php");
			}
		?>
		<div class="albumHeader container">
		<?php
			echo "<img class='albCapa' src='".$show["Capa"]."'>";
			echo "<div class='details'>";
				echo "<h5 class='albType'>".$show["Tipo do álbum"]."</h5>";
				echo "<h1 class='albTit'>".$show["Álbum"]."</h1>";
				echo "<div class='info'>";
					echo "<img class='artFoto' src='".$show["Foto do artista"]."'>";
					echo "<h5>".$show["Artista"]." • </h5>";
					echo "<h5>".$show["Ano"]." • </h5>";
					echo "<h5>".$show["Número de músicas"]." músicas</h5>";
				echo "</div>";
			echo "</div>";
		?>
		</div>
		<div class="container">
			<br>
			<table class="table table-borderless table-dark">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">TÍTULO</th>
				  <th scope="col"></th>
				  <th scope="col"></th>
				  <th scope="col">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
						<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
						<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
					</svg>
				   </th>
				</tr>
			  </thead>
			  <tbody>
				<?php				
				$find = $connect->query("select * from allSongs where (Álbum = '$nomeAlb')");
				$i = 1;
				while($show = $find->fetch(PDO::FETCH_ASSOC))
				{
				$codMsc = $show["Código"];
				echo '<tr class=" align-middle">';
				  echo '<th scope="row" class="index align-middle">'.$i.'</th>';
				  echo '<td  class="align-middle">';
					echo $show["Música"];
					echo '<div class="art">';
						if($show["Explícita"] == "Y")
						{
							echo '🅴 ';
						}
						
						$final = "";
						$finder = $connect->query("call allArtistsPerSong($codMsc);");
						$c = 0;
						while($showr = $finder->fetch(PDO::FETCH_ASSOC))
						{
							if($c == 0)
							{
								$final = $showr["Artista"];
							}
							else
							{
								$final = $final.", ".$showr["Artista"];
							}
							$c = 1;
						}
						echo $final;
						$finder->closeCursor();
						
						
				  echo '</div></td>';
				  echo '<td><audio controls preload="auto">
					<source src="msc/'.$show['CodAlb'].'/'.$i.'.mp3" type="audio/mpeg">
					</audio></td>';
				  echo '<td></td>';
				  echo '<td class="align-middle">1:00</td>';
				echo '</tr>';
				$i++;
				}
				?>
			  </tbody>
			</table>
		</div>
	</body>
</html>