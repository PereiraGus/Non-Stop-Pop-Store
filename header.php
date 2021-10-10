		<style>video{ display: block; margin-left: auto; margin-right: auto;}</style>
		
		<div id="slide" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" id="carousel" style="background-color: #181818">
			
			<?php
				$i = 1;
				$active = "active";
				while($i <= 16)
				{
				echo "<div class='item ".$active."'>";
					echo '<video height="560px" id="vid'.$i.'" autoplay loop>';
					echo '<source src="img/banners/'.$i.'.mp4" type="video/mp4">';
					echo 'Your browser does not support the video tag.';
					echo '</video>';
				echo '</div>';
				$i++;
				$active = "";
				}
			?>	
			
				<a class="left carousel-control" href="#slide" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				 </a>
				 <a class="right carousel-control" href="#slide" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				 </a>
			</div>
		</div>
		<script src="carousel.js"></script>