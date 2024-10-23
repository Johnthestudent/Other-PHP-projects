<html>
	<head>
		<title>
			Dinamikus galéria
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<link rel="stylesheet" type="text/css" href="filekezeles.css">
		
		<!--font awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<!--feltöltés-->
		<div class="feltoltes_doboz">
		Kép feltöltése az albumba:
			<!--űrlap fájl feltöltéshez-->
			<form action="feltoltes_album.php" method="POST" enctype="multipart/form-data">
				<!--<label for="f1">Új fájl feltöltése</label>-->
				<div class="feltolto_doboz">
					<label for="f1" class="file_label"><i class='fa fa-file'></i></label>
					<input type="file" class="file_mezo" id="f1" name="ujfile" accept=".jpg,.png,.gif">
				</div>
				<input type="submit" value="Feltöltés">
			</form>
		<hr>
		</div>
		
		<hr>
		<!--menedzselés-->
		<div class="galeria_doboz">
			<?php
				$mappa = opendir("mappa1");
				
				while($file = readdir($mappa))
				{
					if($file != "." and $file != "..")
					{
						//kliens oldalon fájl
						if(is_file("mappa1/".$file))	//is_dir -> igaz, ha a bejegyzés fájl
						{
							echo("<img class='album_kep' src='mappa1/".$file."'>");
							//echo("<font class='fileikon'><i class='fa fa-file'></i></font>$nbsp;".$file);
							echo("&nbsp;<a href='fajltorles_album.php?fajl=".$file."'><i class='fa fa-trash'></i></a>");
						}
					}
				}
			?>
		</div>
	</body>
</html>