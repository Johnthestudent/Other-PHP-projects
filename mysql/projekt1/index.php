<html>
	<head>
		<title>
			Adatmanipulációs SQL műveletek
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/styles.css">

		<!--font awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="tartalom">
			<?php
				//mely modulból töltődjen be a tartalom
				//az action-be helyezett paraméter php fájlt futtatja
				if(isset($_GET["action"]))
				{
					include("modulok/".$_GET["action"]);
				}
				else
				{
					include("modulok/adatok_lista.php");
				}
				
			?>
		</div>
	</body>
</html>