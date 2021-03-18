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
		<div id="logo">
			<a href="index.php">
				<img src="fpizzuka.png" alt="" width="200">
			</a>
		</div>
	</div>
	<div id="content">
<?php
	global $ab;
	Motor($con, $ab, $van);
	$sql="SELECT Nev, Ar, Leiras,ID FROM Pizza WHERE ID=".$_GET["id"];
	$res=mysqli_query($con, $sql);
	if(!$res)
	echo "Hibás parancs: $sql<br>";
	else 
	{
		echo '<div>';
		$pizza = mysqli_fetch_row($res);
		echo '<div class="rpizza">
		<img src="Pizza/'.$pizza[0].'.png">
		<div class=txt>				<p> ' .$pizza[0]. '</p>
		<p> ' .$pizza[1]. ' RON</p>
		<p> ' .$pizza[2]. '</p>
		</div>';
		UjRend();
		echo '</div> </div>';
	}	
?>
	</div>
</div>
</body>
</html>