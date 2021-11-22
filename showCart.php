<style>.table > tbody > tr > td, .table > tbody > tr > th {vertical-align: middle;}</style>

<div style="width:55%;max-height:100%;min-height:100%;overflow:scroll;">
	<table class="table">
		<thead>
			<tr style="color:white">
				<th>Imagem</th>
				<th>Nome</th>
				<th>Preço</th>
				<th>Quantidade</th>
				<th></th>
			</tr>
		</thead>

	<?php
		$total = null;

		foreach ($_SESSION['cart'] as $codAlb => $qnt) 
		{
			$find = $connect->query("select * from tbalbum where (codAlb='$codAlb')");
			$show = $find->fetch(PDO::FETCH_ASSOC);

			$price = number_format(1.99,2,',','.');
			$total += (1.99 * $qnt);
	?>
			<tr style="align-content:center;">
				<th style="width:15%;">
					<img src="img/covers/<?php echo $show['capaAlb']; ?>" class="img-responsive" style="width:100%">
				</th>
				<th>
					<h3 style="color:white;margin:0px;"><?php echo $show["nomeAlb"]; ?></h3>
				</th>
				<th>
					<h3 style="color:white;margin:0px;">R$ <?php echo $price; ?></h3>
				</th>				
				<th>
					<h3 style="color:white;margin:0px;"><?php echo $qnt; ?> </h3>
				</th>
				<th>			
					<a href="removeCart.php?cod=<?php echo $show["codAlb"];?>">	
						<button class="btn btn-lg btn-block btn-danger" style="height:100%;">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</a>
				</th>
			</tr>
		
	<?php } ?>

	</table>
</div>