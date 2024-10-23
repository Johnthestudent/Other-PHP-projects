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
		<?php
			//mappa megnyitása
			$mappa = opendir("mappa1");
			
			//mappa tartalmának bejárása
			//readdir($mappa) -> a megnyitott $mappa által azonosított mappának a következő bejegyzését olvassa be
 			while($file = readdir($mappa))
			{
				if($file != "." and $file != "..")
				{
					echo($file."<br>");
				}
			}
		?>
	</body>
</html>
