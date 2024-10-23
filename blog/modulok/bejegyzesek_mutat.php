<?php
//a fájl megnyitása és tartalmának beolvasása egy memória változóba
$szoveg=file_get_contents("blog.txt");

//echo($szoveg);

$bejegyzesek=explode("(**)",$szoveg);

//print_r($bejegyzesek);	/*ellenőrzés*/

//megfordítjuk a tartalmát a $bejegyzesek tömbnek
$bejegyzesek = array_reverse($bejegyzesek);

foreach($bejegyzesek as $egybejegyzes)
{
	echo("<div class='egybejegyzes_doboz'>");
	
	//echo($egybejegyzes)>;
		$adatok=explode(";",$egybejegyzes);
	
		echo("<div class='egybejegyzes_fejlec'>");
			echo("<div class='egybejegyzes_cim'>");
				echo($adatok[0]);
			echo("</div>");
			
			echo("<div class='egybejegyzes_datum'>");
				echo($adatok[2]);
			echo("</div>");
		echo("</div>");
		
		echo("<div class='egybejegyzes_tartalom'>");
			echo(str_replace("\n", "<br>", $adatok[1]));
		echo("</div>");
	
	echo("</div");
}
?>