<?php
	function Debug($x)
	{
		echo '<pre>';
		print_r($x);
		echo '</pre>';
	}
	
	function kiirPizza()
	{
		global $ab;
		Motor($con, $ab, $van);
		$sql="SELECT Nev, Ar, Leiras,ID FROM Pizza";
		$res=mysqli_query($con, $sql);
		if(!$res)
			echo "Hibás parancs: $sql<br>";
		else 
		{
			echo '<div class=doboz>';
			$pizza = mysqli_fetch_all($res);
			$dbpizza = mysqli_num_rows($res);
			for ($i = 0; $i < $dbpizza; $i++)
			{
				echo '<a href="rendel.php?id='.$pizza[$i][3].'"><div class="pizza">
				<img src="Pizza/'.$pizza[$i][0].'.png">
				<div class=txt>
				<p> ' .$pizza[$i][0]. '</p>
				<p> ' .$pizza[$i][1]. ' RON</p>
				<p> ' .$pizza[$i][2]. '</p>
				</div></div></a>';
			}
			echo "</div>";
		}		
	}

		
	
	function Motor(&$con, $ab, &$van)
	{
		global $host, $user, $password;
		$con=mysqli_connect($host, $user, $password);
		if($con)
		{
			/*echo 'Kapcsolat Mysql motorral: OK<br>';*/
			mysqli_set_charset($con, "utf8");
			$res=mysqli_select_db($con, $ab);
			if($res)
			$van=1;
			else
			{
				$van=0;
				echo "Nincs $ab adatbázis<br>";
			}
		}
		else
			echo 'Kapcsolat Mysql motorral: Nincs<br>'.mysqli_connect_error().'<br>';
		
	}

	function Adatbazis()
	{	
	
		global $ab;
		$van=0;
		Motor($con, $ab, $van);
		if(!$con || $van==0)
			echo 'Baj van az adatbázissal...<br>';
		else
		{
			echo "Van $ab adatbazis<br>";
			
		}
		mysqli_close($con);
	}
	function MutatLekerdezest($res)
	{
		echo '<table border="1">';
		while($sor=mysqli_fetch_row($res))
		{
			echo "<tr>";
			foreach($sor as $ertek)
				echo "<td>$ertek</td>";
			echo"</tr>";
		}
		echo "</table>";
	}

	function Tablaszerkezet($con, $tabla)
	{
		$sql="DESCRIBE $tabla";
		$res=mysqli_query($con, $sql);
		if(!$res)
			echo "Hibás parancs: $sql<br>";
		else
			MutatLekerdezest($res);		
	}

function Belep()
{	if (!isset($_POST["username"]) || 
		!isset($_POST["jelszo"]) || 
		$_POST["username"]=="" || 
		$_POST["jelszo"]=="")
	{	echo '<form name="belep" action="" method="POST">';
		echo'<table align="center" border="0"><tr>';
		echo'<td>Felhasználó:';
		echo'<td><input name="username" type="text">';
		echo'<tr><td>Jelszó:';
		echo'<td><input name="jelszo" type="password">';
		echo'<tr><td colspan="2" align="center">';
		echo'<input type="submit" name="gomb" value="Belép">';
		echo'</table></form>';
	}
	else
	{	
		global $ab;
		$van=0;		
		Motor($con, $ab, $van);		
		if(!$con || $van==0)
			echo 'Baj van...<br>';
		else
		{	$nev=$_POST["username"];
			$jel=$_POST["jelszo"];
			$sql="Select * from Admin 
				where User=\"$nev\" && Jelszo=\"".sha1($jel)."\"";
			$res=mysqli_query($con, $sql);
			mysqli_close($con);
			if (!$res)
			{	echo"Hibás lekérdezés: $sql<br>";
				return False;
			}
			else
			{	$nr=mysqli_num_rows($res);
				if ($nr>0)
				{	$_SESSION["belepve"]=1;
					return True;
				}
				else	
				{	echo'Hibás user name vagy jelszó...<br>';
					return False;
				}
			}
		}
	}
}

function RendOlvas(&$Kliens , &$Cim, &$Tel, &$Menny) {	
	if(!isset($_POST["Kliens"]) || $_POST["Kliens"]=="" ||
		!isset($_POST["Cim"]) || $_POST["Cim"]=="" ||
		!isset($_POST["Tel"]) || $_POST["Tel"]=="" ||
		!isset($_POST["Menny"]) || $_POST["Menny"]=="")
		{?>
			<form name="Új Rendelés" action="" method="POST">
			<label for="nev">Kliens neve:</label><input id="nev" name="Kliens" type="text">
			<label for="cim">Kirendelő címe:</label><input id="cim" name="Cim" type="text">
			<label for="tel">Telefonszám:</label><input id="tel" name="Tel" type="number" value="07" max="0799999999">
			<label for="q">Mennyiség:</label><input id="q" name="Menny" type="number" value="1" max="50">
			<button name="gomb" type="submit"> Mehet!</button>
			</form>
			
			<?php
			return;
		}
	else
		{
			$Kliens=$_POST["Kliens"];
			$Cim=$_POST["Cim"];
			$Tel=$_POST["Tel"];
			$Menny=$_POST["Menny"];
			return 1;
		}

}
	
function UjRend() {
		global $ab;
		$van=0;
		Motor($con, $ab, $van);
		if(!$con || $van==0)
			echo 'Baj van...<br>';
		else{
			if(RendOlvas($Kliens, $Cim, $Tel, $Menny))
			{
				$sql='INSERT INTO Rendelesek(Kliens,Cim,Datum,Tel,PID,Menny,Stat) VALUES ("'.$Kliens.'","'.$Cim.'","'.date("Y-m-d H:i:s").'",'.$Tel.','.$_GET["id"].','.$Menny.',0)';
				$res=mysqli_query($con,$sql);
				if($res)
					header("Location: siker.php");
				else 
					header("Location: kesobb.php");
			}
	  	}
}	

?>
