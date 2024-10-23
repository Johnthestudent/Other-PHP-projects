<?php
	session_start();
	
	if(isset($_GET["logout"]))
	{
		unset($_SESSION["admin"]);
	}
?>

<html>
	<head>
		<title>
			Egyszerű blog, filekezelés, jogosultságkezelés
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<!--font awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="beiro_doboz">
			<?php
				if(isset($_SESSION["admin"]))
				{
					echo("<div>Üdv Admin!<br><a href='index.php?logout=1'>Kilépés</a></div>");
					include("modulok/ujbejegyzes.php");
				}
				else
				{
					include("modulok/belepes.php");
				}
			?>
		</div>
		
		<div class="bejegyzesek_doboz">
			<?php
				include("modulok/bejegyzesek_mutat.php");
			?>
		</div>
	</body>
</html>