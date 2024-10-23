<?php
	$kapcs = new mysqli("localhost", "root", "", "peldaexperiment1"); 	//szerver, felhasználó, jelszó, adatbázis

	$kapcs->query("set names utf8");	//adatkommunikáció karakterkódolás
?>