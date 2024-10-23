<?php
//a fájl típusú beviteli mezőből érkező állományok a $_FILES nevű tömb adataiból kezelhetők

if(isset($_FILES["ujfile"]))
{
	foreach($_FILES["ujfile"] as $mezo => $ertek)
	{
		//echo($mezo." : ".$ertek."<br>");
	}

	if($_FILES["ujfile"]["type"] == "image/jpeg" or $_FILES["ujfile"]["type"] == "image/png")
	{
		//file mozgatása a végleges helyére
		move_uploaded_file($_FILES["ujfile"]["tmp_name"] , "mappa1/".$_FILES["ujfile"]["tmp_name"]);
		/*honnan, hová és milyen néven*/
		header("location:dinamikus_galeria.php");
	}
	else
	{
		echo("Csak jpeg vagy png tölthető fel!<br><a href='filekezelo.php'>Vissza</a>");
	}
}

?>