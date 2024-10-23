<?php
	include("../connect.php");
	
	/*
	recordok törlése SQL parancs:
	delete from tábla neve where feltétel -> a feltételnek megfelelő recordok törlése
	
	pl.: delete from szemelyek where id=2
	*/
	
	//paraméter
	$stmt = $kapcs->prepare("delete from szemelyek where id = ?");
	
	//paraméter hozzákapcsolás
	$stmt->bind_param("d", $_GET["id"]);
	
	if($stmt->execute())
	{
		header("Location:../index.php");
	}
	else
	{
		echo("Hiba!");
	}
?>