<html>
	<head>
		<title>
			Egyszerű mappakezelés és bejárás
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<link rel="stylesheet" type="text/css" href="filekezeles.css">
		
		<!--font awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<!--error esetén-->
		<?php
			if(isset($_GET["error"]))
			{
				if($_GET["error"] == 1)
				{
					echo("<div class='hibadoboz'>A mappa már létezik</div>");
				}
			}
		?>
	
		<!--létrehozás előtt űrlap-->
		<form action="ujmappa.php" method="POST">
			<input type="text" name="ujmappanev" placeholder="Új mappa neve...">
			<input type="submit" value="Létrehoz">
		</form>
		
		<!--űrlap fájl feltöltéshez-->
		<form action="feltoltes.php" method="POST" enctype="multipart/form-data">
			<!--<label for="f1">Új fájl feltöltése</label>-->
			<div class="feltolto_doboz">
				<label for="f1" class="file_label"><i class='fa fa-file'></i></label>
				<input type="file" class="file_mezo" id="f1" name="ujfile" accept=".jpg,.png,.gif">
			</div>
			<input type="submit" value="Feltöltés">
		</form>
		<hr>
		
		<?php
			//mappa megnyitása
			$mappa = opendir("mappa1");
			
			//mappa tartalmának bejárása
			//readdir($mappa) -> a megnyitott $mappa által azonosított mappának a következő bejegyzését olvassa be
 			while($file = readdir($mappa))
			{
				if($file != "." and $file != "..")
				{
					echo("<div class='bejegyzes_keret'>");
					
					if(is_dir("mappa1/".$file))	//is_dir -> igaz, ha a bejegyzés mappa
					{
						echo("<font class='mappaikon'><i class='fa fa-folder'></i></font>&nbsp;".$file);
					}
					
					if(is_file("mappa1/".$file))	//is_dir -> igaz, ha a bejegyzés fájl
					{
						echo("<font class='fileikon'><i class='fa fa-file'></i></font>&nbsp;".$file);
						echo("&nbsp;<a href='filetorles.php?fajl=".$file."'><i class='fa fa-trash'></i></a>");
					}
					
					echo("/div>");
				}
			}
		?>
	</body>
</html>
