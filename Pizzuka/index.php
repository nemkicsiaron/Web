<?php
	session_start();
	include('valtozok.php');
	include('config.php');
	Fejlec();
	include('KezelFunctions.php');
	if(!isset($_SESSION['belepve']))
		$_SESSION['belepve']=0;
?>
	<div id="menubar">
			<a href="index.php">
				<img src="fpizzuka.png" alt="" width="200">
			</a>
<?php MenutIr($kmenu) ?>
	</div>
	<div id="content">
<?php
	if(!isset($_GET["menu"]))
		kiirPizza();
	else
		switch($_GET["menu"])
		{	
			case 0:
				echo $kmenu[0];
				Belep();
				if($_SESSION['belepve']==1)
					header("Location: TervAron/index.php");
				break;
		}?>
</div>';
</body>
</html>