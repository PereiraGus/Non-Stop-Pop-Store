<! DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Non Stop Pop Store</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../style.css" type="text/css">
		<link rel="sourtout icon" href="../img/icon/favicon.ico">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php include "../nav.php" ?>
		
		<?php
			include "../data.php";
			$find = $connect->query("select * from tbalbum");
			while($show = $find->fetch(PDO::FETCH_ASSOC)){
				
			echo "<img class='img-thumbnail' height='200px' width='200px' src='img/covers/".$show["capaAlb"]."'><br>";
			echo $show["nomeAlb"]."<br>";
			echo "<hr>";
			
			}
		?>
	</body>
</html>