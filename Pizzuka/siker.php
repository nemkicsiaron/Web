<?php
	session_start();
	include('valtozok.php');
	include('config.php');
	Fejlec();
	include('KezelFunctions.php');
	if(!isset($_SESSION['belepve']))
		$_SESSION['belepve']=0;
?>
		<div id="siker">
			<a href="index.php">
				<img src="fpizzuka.png" alt="" width="200">
			</a>
	<p class="fontos">KÖSZÖNJÜK SZÉPEN, RENDELÉSÉT RÖGZÍTETTÜK!</p> <p>Hamarosan úton lesz ön felé.</p>
</div>
</body>
</html>