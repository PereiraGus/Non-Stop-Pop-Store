<?php
	include "data.php";
	$find = $connect->query("select * from allGenres");
?>
		<nav class="navbar navbar-inverse" style="margin: 0;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">
						<ul class="nav navbar-nav">
							<li><img class="float-center" width="25px" height="25px" src="img/icon/black.png"></li>
							<li>&nbspNon Stop Pop Store</li>
						</ul>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbspMenu Principal<span class="sr-only">(current)</span></a></li>
						<li><a href="lanc.php"><span class="glyphicon glyphicon-certificate"></span>&nbspLançamentos</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span>&nbspGêneros <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<?php 
								while($show = $find->fetch(PDO::FETCH_ASSOC))
								{
									$parameter = $show["Gênero"];
									echo "<li><a href='search.php?search=",$parameter,"'>",($show["Gênero"]),"</a></li>";
								}?>
							</ul>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Músicas, álbuns e artistas...">
						</div>
						<button type="submit" class="btn btn-default">Pesquisar <span class="glyphicon glyphicon-search"></span></button>
					</form>
					<?php
						if(empty($_SESSION["ID"]))
						{
							$show["Usuário"] = "<span class='glyphicon glyphicon-log-in'></span>&nbspEntrar";
							$logStatus = "out";
							$toggle = "";
						}
						else
						{
							$id = $_SESSION["ID"];
							$find = $connect->query("select * from Usuários where codUser = $id");
							$show = $find->fetch(PDO::FETCH_ASSOC);
							$logStatus = "in";
							$toggle = "dropdown";
						}
					?>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle" data-toggle="<?php echo $toggle ?>" role="button" aria-haspopup="true" aria-expanded="false" href="<?php if($logStatus == "out"){echo"login.php?status";}?>">
							<?php if($logStatus == "in"){echo'<img class="d-inline-block align-center" width="22px" height="22px" style="border-radius: 10px;" src="'.$show["Foto"].'">';}
							echo("&nbsp".$show["Usuário"]);if($logStatus == "in"){echo'<span class="caret"></span>';}
							?>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon-pencil"></span>&nbspVer ou editar</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbspConfigurações</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbspSair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>