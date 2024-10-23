<meta charset="utf-8">

<?php
	//mysqli objektum és metódusai
	//kapcsolódás és autentikáció
	$kapcs = new mysqli("localhost", "root", "", "peldaexperiment1"); 	//szerver, felhasználó, jelszó, adatbázis

	//sikeres-e a kapcsolódás
	if($kapcs)
	{
		echo("Sikeres kapcsolódás");
		
		$kapcs->query("set names utf8");	//adatkommunikáció karakterkódolás
		
		//utasítás küldése
		$vissza = $kapcs->query("select * from szemelyek");	//a szemelyek tábla teljes tartalmának lekérdezése
		//a $vissza a lekérdezés szerver válaszaként megérkezett adatokat tartalmazza
		
		//a szerver válasz egy sorának kiolvasása
		//$sor = mysqli_fetch_array($vissza);
		
		//a $sor asszociatív tömb adatainak elérése
		//echo("<hr>");
		
		//echo($sor["nev"].", ".$sor["email"]);
		
		//összes adat kiíratása while ciklussal fetch array
		echo("<table border='1px'><tr><td>Név</td><td>Lakcím</td><td>E-mail</td><td>Mobil</td></tr>");
		
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