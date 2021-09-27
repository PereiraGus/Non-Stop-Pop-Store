<!DOCTYPE HTML>
<html>
	<head>
		<title>Non Stop Pop Store</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="sourtout icon" href="img/icon/favicon.ico">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			include "data.php";
		?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<h2 align="center">
					<a href="index.php" style="text-decoration: none; color: #333333;">
						<img width="50px" height ="50px" class="d-inline-block align-top" src="img/icon/color.png">
						<strong>Non Stop Pop</strong>
					</a>
				</h2>
				<hr>
			
				<h2><strong>Senha, usuário ou email inválidos.</strong></h2>
				<a href="login.php" style="text-decoration: none;">
					<button type="submit" class="btn btn-block ng-binding" style="font-size: 14px; line-height: 1; border-radius: 500px; padding: 16px 48px 18px; transition-property: background-color,border-color,color,box-shadow,filter; transition-duration: .3s; border-width: 0; letter-spacing: 2px; min-width: 160px; text-transform: uppercase; white-space: normal; padding: 16px 14px 18px; background-color: #15883e; color: white">
						TENTAR NOVAMENTE
					</button>
				</a>
				
				<hr>
				
				<h2 align="center" style="font-weight: 900; margin-top: 12px; margin-bottom: 12px; font-size: 18px">Não tem uma conta?</h2>
				<a href="#" style="text-decoration: none;">
					<button class="btn btn-block btn-default ng-binding" style="font-weight: 700; box-shadow: inset 0 0 0 2px #616467; letter-spacing: 2px; border-radius: 500px; padding: 16px 14px 18px;">
						INSCREVER-SE NA NON STOP POP
					</button>
				</a>
			</div>
		</div>
	</div>