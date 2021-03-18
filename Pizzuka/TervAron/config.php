<?php
	function MenutIr($x)
	{	//A menűt a $x asszociatív tömbben kapja
		echo '<div id="menubar" >';
		echo '<div id="logo"> <a href="index.php"><img src="fpizzuka.png" alt="" width="200"> </a> </div>';
		echo '<table >';
		foreach($x as $kulcs=>$ertek)
		{	echo '<tr >';
			echo '<td >';
			echo '<a href=?menu='.$kulcs.' class="menu" >'.$ertek.' </a >';
		}
		echo "</table >";
		echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
		echo "<center ><small >©2019 Áronka</small ></center >";
		echo "</div >";//menűdoboz lezárása
	}
	function Fejlec()
	{ 	//előírások betartásának ellenőrzése
		echo '<!DOCTYPE html>';
		echo '<html lang="hu">';
		echo '<head>
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">';
		echo "<Title>Szabó Áron Szakvizsga dolgozat</Title>";
		echo '<link href="Sablonstilus.css" rel="stylesheet" type="text/css">';
		echo "</head>";//magyar karakterkészlet beállítása
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo "<body >";
	}
	function Lablec()
	{
		echo "</body>"; 	
		echo "</html>";
		echo "<small> ©2019 Áronka </small >";
	}	
?>	