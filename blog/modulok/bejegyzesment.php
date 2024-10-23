<?php
	if(isset($_POST["ujcim"]))
	{
		//karaktercsere
		$_POST["ujcim"] = str_replace("(**)", "(*)",$_POST["ujcim"]);
		
		$_POST["ujcim"] = str_replace(";", ",",$_POST["ujcim"]);
		
		$_POST["ujbejegyzes"] = str_replace("(**)", "(*)",$_POST["ujbejegyzes"]);
		
		$_POST["ujbejegyzes"] = str_replace(";", ",",$_POST["ujbejegyzes"]);
		
		//forma elkészítése
		$szoveg = "(**)".$_POST["ujcim"].";".$_POST["ujbejegyzes"].";".date("Y.m.d H:i");
		
		//A $szoveg nevű változó tartalmának hozzáírása a blog.txt tartalmához
		$fm = fopen("../blog.txt", "a");	//a -> append hozzáírása
		
		fwrite($fm, $szoveg);	//$fm által mutatott fájl végéhez hozzáírásra kerül a $szoveg tartalma
		
		fclose($fm);
		
		header("Location: ../index.php");
	}
?>