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
	<body style="background: #181414;">
		<?php 
			include "nav.php";
			include "data.php";
			$find = $connect->query("select * from allAlbums");
			
			if(empty($_SESSION["ID"]))
			{
				echo '<script>window.location.assign("login.php")</script>';
			}
			
			echo "<h1>";
			
			$codProd = $_GET["cod"];
			
			if(empty($_GET["cod"]))
			{}
			
			else
			{
				if(!isset($_SESSION["cart"]))
				{
					$_SESSION["cart"] = array();
				}
				
				if(!isset($_SESSION["cart"][$codProd]))
				{
					$_SESSION["cart"][$codProd] = 1;
				}
				else
				{
					$_SESSION["cart"][$codProd]+=1;
				}
				$total = 0;
				foreach ($_SESSION['cart'] as $codAlb => $qnt) 
				{
					
					$total += (1.99 * $qnt);
				}
			}
		?>
		</h1>
		
		<div class="text-center" style="margin-top: 15px;">
			<h1 style="color:white;">
				Valor total do carrinho: 
				<h1 style="color:white;font-weight: 700;margin-top:0px">
					R$ <?php echo number_format($total,2,',','.'); ?>
				</h1>
			</h1>
		</div>
		
		<div style="display:flex;flex-direction:column;align-items:center;height:50%;">
			<?php include "showCart.php" ?>
		</div>
		
		<div style="margin-top: 15px;display:flex;flex-direction:row;align-items:center;justify-content: center;">
			<a href="index.php" style="padding-right:2.5%;">
				<button class="btn btn-block btn-default ng-binding" style="letter-spacing: 2px; border-radius: 500px; padding: 16px 14px 16px;">
					CONTINUAR COMPRANDO
				</button>
			</a>
			<a href="index.php" style="padding-left:2.5%;">
				<button type="submit" class="btn btn-block ng-binding" style="font-size: 14px; line-height: 1; border-radius: 500px; transition-property: background-color,border-color,color,box-shadow,filter; transition-duration: .3s; border-width: 0; letter-spacing: 2px; min-width: 160px; text-transform: uppercase; white-space: normal; padding: 19px 14px 19px ; background-color: #15883e; color: white">
					Finalizar a compra
				</button>
			</a>
			
		</div>
	<br>
	<?php
	include 'footer.html';
	?>
	</body>
</html>