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
			
			$find = $connect->query("select * from allAlbums");
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4" style="display:flex;flex-wrap: wrap;flex-direction: column;align-items: center;align-content: center;">
					<h3 style="color: white;">Alteração/Exclusão de álbum</h3>
					<?php
					while($show = $find->fetch(PDO::FETCH_ASSOC))
					{
					echo '<div style="display:flex;flex-direction:column;flex-direction: column;align-items: center;margin-bottom:5%;">';
						echo '<img id="imgCover" src="img/covers/'.$show["Capa"].'" style="padding-bottom:2.5%;width:70%">';
						echo "<h4 style='color: white;margin:0px;'>".$show["Álbum"]."</h4>";
						echo '<div style="padding-top:2.5%;display:flex;">';
							echo '<a href="formAlterAlbum.php?id='.$show["Código"].'">'.
								'<button class="btn" style="margin-right:5%;">Alterar</button>'.
								'</a>'.
								'<a href="deleteAlbum.php?id='.$show["Código"].'">'.
								'<button class="btn" style="margin-left:5%;">Excluir</button>'.
								'</a>';
						echo '</div>';
					echo '</div>';
					}?>
				</div>
			</div>
		</div>
	</body>
</html>