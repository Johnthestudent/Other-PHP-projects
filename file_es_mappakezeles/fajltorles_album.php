<?php
unlink("mappa1/".$_GET["fajl"]);

header("Location: dinamikus_galeria.php");
?>