<?php
	include("connect.php");
	//mysqli objektum és metódusai
	//kapcsolódás és autentikáció
		
		if(isset($_POST["kulcs_szo"]))
		{
			$stmt = $kapcs->prepare("select * from szemelyek where nev like ?");	//előkészített parancs
			
			$par1 = "%".$_POST["kulcs_szo"]."%";	//kérdőjel helyére ez lesz behelyettesítve
			
			//paraméterek meghatározása
			$stmt->bind_param("s", $par1);
		}
		
		$stmt = $kapcs->prepare("select * from szemelyek");	//előkészített parancs
		
		$stmt->execute();	//előkészített parancs futtatása
		
		//utasítás küldése
		$vissza = $stmt->get_result();	//a szerver válasz tartalmát adja vissza
		//a $vissza a lekérdezés szerver válaszaként megérkezett adatokat tartalmazza
		
		include("modulok/kereso.php");	//űrlap modul
		
		//plusz gomb új modulra visz
		echo("<button><a href='index.php?action=ujszemely.php'><i class='fa fa-plus' title='Új személy felvitele'></i></a></button>");
		
		//összes adat kiíratása while ciklussal fetch array
		echo("<table><tr><th>Név</th><th>Lakcím</th><th>E-mail</th><th>Mobil</th></tr>");
		
		while($sor = mysqli_fetch_array($vissza))
		{
			echo("<tr>");
			echo("<td>".$sor["nev"]."</td>");
			echo("<td>".$sor["lakcim"]."</td>");
			echo("<td>".$sor["email"]."</td>");
			echo("<td>".$sor["mobilszam"]."</td>");
			echo("<td><a href='modulok/torles.php?id=".$sor["id"]."'><i class='fa fa-trash' title='Személy törlése'></i></a></td>");
			echo("</tr>");
		}
		
		echo("</table>");
?>