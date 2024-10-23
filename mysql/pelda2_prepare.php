<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="stilus.css">

<?php
	//mysqli objektum és metódusai
	//kapcsolódás és autentikáció
	$kapcs = new mysqli("localhost", "root", "", "peldaexperiment1"); 	//szerver, felhasználó, jelszó, adatbázis

	//sikeres-e a kapcsolódás
	if($kapcs)
	{		
		$kapcs->query("set names utf8");	//adatkommunikáció karakterkódolás
		
		/*
		lekérdezésbe szűrési feltétel
		select mezők from tábla where feltétel (mező reláció érték logikai művelet mező2 reláció2 érték2)
		
		pl.: select * from szemelyek where nev="Béla" -> csak azok a recordok jönnek vissza, amelyek nev mezőjének tartalma "Béla"
		
		select * from szemelyek where nev like "%Béla%" -> előtte utána bármilyen karakter
		*/
		
		if(isset($_POST["kulcs_szo"]))
		{
			$stmt = $kapcs->prepare("select * from szemelyek where nev like ?");	//előkészített parancs
			
			$par1 = "%".$_POST["kulcs_szo"]."%";	//kérdőjel helyére ez lesz behelyettesítve
			
			//paraméterek meghatározása
			$stmt->bind_param("s", $par1);
		}
		else
		{
			
		}
		
		$stmt = $kapcs->prepare("select * from szemelyek");	//előkészített parancs
		
		$stmt->execute();	//előkészített parancs futtatása
		
		//utasítás küldése
		$vissza = $stmt->get_result();	//a szerver válasz tartalmát adja vissza
		//a $vissza a lekérdezés szerver válaszaként megérkezett adatokat tartalmazza
		
		include("kereso.php");	//űrlap modul
		
		//a szerver válasz egy sorának kiolvasása
		//$sor = mysqli_fetch_array($vissza);
		
		//a $sor asszociatív tömb adatainak elérése
		//echo("<hr>");
		
		//echo($sor["nev"].", ".$sor["email"]);
		
		//összes adat kiíratása while ciklussal fetch array
		echo("<table><tr><th>Név</th><th>Lakcím</th><th>E-mail</th><th>Mobil</th></tr>");
		
		while($sor = mysqli_fetch_array($vissza))
		{
			echo("<tr>");
			echo("<td>".$sor["nev"]."</td>");
			echo("<td>".$sor["lakcim"]."</td>");
			echo("<td>".$sor["email"]."</td>");
			echo("<td>".$sor["mobilszam"]."</td>");
			echo("</tr>");
		}
		
		echo("</table>");
	}
	else
	{
		echo("Hiba!");
	}
?>