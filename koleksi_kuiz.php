<html>
<head>
	<style>
		#mainbody
		{
			background-color: white;
			padding: 20px;
		}

		#tajuk{
			font-size: 30px;
			font-family: Tw Cen MT Condensed;
			font-weight: bold;
			text-align: center;
		}

		table{
			margin-left: auto;
			margin-right: auto;
			border-collapse: collapse;
			margin: auto;
			background-color: lavender;
		}

		td{
			text-align: left;
			height: 25px;
		}

		th{
			height: 30px;
			text-align: left;
			font-weight: bold;
			color: white;
			background-color: darkorchid;
		}

	</style>
</head>

<body>
<?php
include ("header.php");
include ("topnav.php");
?>
<div id="mainbody">
	<div id="tajuk"><p>Koleksi Kuiz - Sains Tahun 6</p></div>
	
	<form action="" method="post">
		<!-- CARIAN -->
		<p><center>Cari Kuiz :
				<input type="text" name="carian">
				<input type="submit" value="Cari" name="cari">
			</p></center>
	</form>
	<?php
	//jika user klik butang "Cari" dan textbox carian tidak empty
	if (isset($_POST['cari']) && !empty($_POST['carian']) )
	 {
		$query = "SELECT * FROM kuiz
					WHERE tajuk_kuiz LIKE '%$_POST[carian]%'";
	} else {
		//jika user tidak buat carian, papar semua koleksi kuiz
		$query = "SELECT * FROM kuiz";
	}
	$mysql = $query;
	$result = mysqli_query($conn, $mysql) or die(mysql_error());

	if (mysqli_num_rows($result) > 0)
	 {
		//table untuk paparan data

		echo "<table border = '0'>";
		echo "<col width='20'>";	//saiz column 1
		echo "<col width='80'>";	//saiz column 2
		echo "<col width='400'>";	//saiz column 3
		echo "<col width='150'>";	//saiz column 4
		echo "<col width='150'>";	//saiz column 5
		echo "<col width='20'>";	//saiz column 7
		echo "<tr>";
		echo "<th></th>";			//column 1
		echo "<th>ID</th>";			//column 2
		echo "<th>Tajuk</th>";			//column 3
		echo "<th></th>";			//column 4
		echo "<th></th>";			//column 5
		echo "<th></th>";			//column 6
		echo "</tr>";

		//papar semua data dari jadual kuiz dalam DB
		while($row = mysqli_fetch_assoc($result))
		{
			//jika kategori guru, paparkan button berikut
			if ($kat =="G")
			 {
				$butang1 = "<td><a href='edit_kuiz.php?idK=".$row['id_kuiz']."'>
							<button>Kemaskini Kuiz</button></a></td>";
				$butang2 = "<td><a href='padam_kuiz.php?idK=".$row['id_kuiz']."'>
							<button>Padam Kuiz</button></a></td>";
			}
			else //jika kategori murid, papar 1 button sahaja
			{
				$butang1 = "<td><a href='jawab_kuiz.php?idK=".$row['id_kuiz']."'>
									<button>Jawab Kuiz</button></a></td>";
				$butang2 = "";
			}
			//paparan data
			echo "<tr height='50'>";
			echo "<td></td>";
			echo "<td>".$row['id_kuiz']."</td>";
			echo "<td>".$row['tajuk_kuiz']."</td>";
			echo $butang1;
			echo $butang2;
			echo "</tr>";
		}
		echo "</table>";
	}
	else { echo "<center>Kuiz belum dibina</center>"; }
	?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>