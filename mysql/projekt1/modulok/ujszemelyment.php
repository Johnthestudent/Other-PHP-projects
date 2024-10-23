<?php
	include("../connect.php");	//el kell érni az adatbázist
	
	/*
	új record hozzáadása:
	insert into tábla neve (mező1, mezőn) values (érték1, értékn)
	
	pl.: insert into szemelyek (nev, lakcim, email, mobilszam) values ("Gyuri", "Szolnok", "gyuri@gmail.com", "06203344115");
	*/
	
	//ha üres a mező
	if(trim($_POST["ujnev"]) == "" or trim($_POST["ujemail"]) == "")
	{
		echo("Hiányzó adatok!<br><a href='../index.php?action=ujszemely.php'>Vissza</a>");
	}
	else
	{
		//parancs előkészítése
		$stmt=$kapcs->prepare("insert into szemelyek ( nev,lakcim,email,mobilszam ) values (?,?,?,?)");

		//paraméterezés
		$stmt->bind_param("ssss",$_POST["ujnev"],$_POST["ujlakcim"],$_POST["ujemail"],$_POST["ujmobilszam"]);
		
		//lefuttatás
		if($stmt->execute())	//ha sikeres
		{
			header("Location:../index.php");
		}
		else
		{
			echo("Hiba!");
		}
	}
?>