<! DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Non Stop Pop Store</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="sourtout icon" href="img/icon/favicon.ico">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="jquery.mask.js"></script>
	</head>
	<body>
		<?php
			include 'data.php';	
		?>	
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
				
					<h2 align="center">
						<a href="index.php" style="text-decoration: none; color: #333333;">
							<img width="50px" height ="50px" class="d-inline-block align-top" src="img/icon/color.png">
							<strong>Non Stop Pop</strong>
						</a>
					</h2>
					<hr>
				
					<form name="frmlogin" method="post" action="validation.php">
						<div class="form-group">
							<label for="txtuser">Defina um nome de usuário</label>
							<input name="txtuser" class="form-control" required id="txtuser">
						</div>
						<div class="form-group">
							<label for="txtemail">Qual o seu email?</label>
							<input name="txtemail" class="form-control" required id="txtemail">
						</div>
						<div class="form-group">
							<label for="txttel">Informe o seu telefone (Opcional)</label>
							<input name="txttel" class="form-control" required id="txttel">
						</div>
						<div class="form-group">
							<label for="txtpic">Coloque uma foto de perfil (Opcional)</label>
							<input name="txtpic" class="form-control" id="txtpic" placeholder="URL da sua imagem">
						</div>
						<div class="form-group">
							<label for="txtpassw">Escolha uma senha</label>
							<input name="txtpassw" type="password" class="form-control" required id="txtpassw">
						</div>	
						<button type="submit" class="btn btn-block ng-binding" style="font-size: 14px; line-height: 1; border-radius: 500px; padding: 16px 48px 18px; transition-property: background-color,border-color,color,box-shadow,filter; transition-duration: .3s; border-width: 0; letter-spacing: 2px; min-width: 160px; text-transform: uppercase; white-space: normal; padding: 16px 14px 18px; background-color: #15883e; color: white">
							<strong>CRIAR A CONTA</strong>
						</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script>
			$(document).ready(function(){
				$("#txttel").mask("(00)00000-0000");
			});
	</script>
</html>
	