<?php
	session_start();
	
	if($_POST["jelszo"] == "12345")
	{
		$_SESSION["admin"] = "ok";
		header("Location: ../index.php");
	}
	else
	{
		header("Location: ../index.php?loginerror=1");
	}
?>