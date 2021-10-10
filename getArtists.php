<?php	
	include "data.php";
	$find = $connect->query("select * from allSongs where (Álbum = '$nomeAlb')");
	const $linhas = $find.num_rows;
	for($i = 1; $i >= $linhas; $i++)
	{
		$funcName = "getSongAllArtists".$i;
		$$funcName = function ($codMsc)
		{
			$final = "";
			$find = $connect->query("call allArtistsPerSong($codMsc);");
			while($show = $find->fetch(PDO::FETCH_ASSOC))
			{
				$final = $final.", ".$show["Artista"];
			}
			echo $final;
		};
	}
?>