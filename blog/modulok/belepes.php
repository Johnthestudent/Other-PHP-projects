<?php
	if(isset($_GET["loginerror"]))
	{
		echo("<div class='hiba'>Sikertelen belépés!</div>");
	}
?>

<form action="modulok/belepes_ellenor.php" method="POST">
	<input type="password" name="jelszo" placeholder="Jelszó...">
	<input type="submit" value="Belépés">
</form>