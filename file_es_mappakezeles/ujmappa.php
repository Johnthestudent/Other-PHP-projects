<?php
//mappa létrehozása -> mkdir(mappanév)

if(!file_exists("mappa1/".$_POST["ujmappanev"]))	//file_exists -> igaz, ha a fájl vagy mappa létezik
{
	mkdir("mappa1/".$_POST["ujmappanev"]);
	header("Location: filekezelo.php");
}
else
{
	header("Location: fajlkezelo.php?error=1");	//mappa létezik
}

?>