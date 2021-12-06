<html>
<head>
<style>
	#mainbody
	{
		background-color: white;
		padding: 20px;
	}
	#tajuk
	{
		font-size: 30px;
		font-family: Tw Cen MT Condensed;
		font-weight: bold;
		text-align: center;
	}
	table {
		margin-left: auto;
		margin-right: auto;
		border-collapse: collapse;
		margin: auto;
		background-color: lightcyan;
	}
	td{
		text-align: left;
		height: 25px;
	}
	th{
		height: 30px;
		text-align: left;
		font-weight: bold;
		background-color: deepskyblue;
	}
</style>
</head>

<body>
	<?php
	include("header.php");
	include("topnav.php");
	?>
<div id="tajuk"><p>Prestasi Murid</p></div>

<form action="" method="post">
	<p><center>
		<select name="kategori">
			<option>Pilih Carian</option>
			<option value="tajuk">Tajuk Kuiz</option>
			<option value="nama">Nama Murid</option>
		</select>
		: <input type="text" name="carian">
		<input type="submit" value="Cari" name="cari">
	</p><center>
</form>

<?php
//jika user klik butang "Cari" $$ kotak carian tidak empty
if(isset($_POST['cari']) && !empty($_POST['carian']) )
{

	//kenalpasti dropdown list apa yang dipilih oleh user
	switch ($_POST["kategori"])
	{

	case "tajuk" : //jika user pilih search by tajuk kuiz
	$query = "SELECT * FROM prestasi 
							INNER JOIN kuiz
										ON prestasi.id_kuiz = kuiz.id_kuiz
							INNER JOIN murid
										ON prestasi.emel_murid = murid.emel 
							WHERE kuiz.tajuk_kuiz LIKE '%$_POST[carian]%'
							ORDER BY kuiz.tajuk_kuiz";
	break;
	default: //jika user pilih search by nama murid 
	$query = "SELECT * FROM prestasi 
							INNER JOIN kuiz
										ON prestasi.id_kuiz = kuiz.id_kuiz
							INNER JOIN murid
										ON prestasi.emel_murid = murid.emel
							WHERE murid.nama LIKE '%$_POST[carian]%'
							ORDER BY kuiz.tajuk_kuiz";
}
}else {
	//paparan default prestasi jika user tak buat carian
	$query = "SELECT * FROM prestasi
						INNER JOIN kuiz
									ON prestasi.id_kuiz = kuiz.id_kuiz
						INNER JOIN murid
									ON prestasi.emel_murid = murid.emel
						ORDER BY kuiz.tajuk_kuiz";
}
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());
$bil = 0;

if (mysqli_num_rows($result) > 0)
{
	//table untuk paparan data
	echo "<table border = '0'>";
	echo "<col width ='20'>"; 		//saiz column 1
	echo "<col width ='50'>"; 		//saiz column 2
	echo "<col width ='400'>"; 		//saiz column 3
	echo "<col width ='200'>"; 		//saiz column 4
	echo "<col width ='100'>"; 		//saiz column 5
	echo "<col width ='200'>"; 		//saiz column 6
	echo "<col width ='20'>"; 		//saiz column 7
	echo "<tr>";
	echo "<th></th>";				// column 1
	echo "<th>Bil</th>";				// column 2
	echo "<th>Tajuk Kuiz</th>";				// column 3
	echo "<th>Nama Murid</th>";				// column 4
	echo "<th>Skor</th>";				// column 5
	echo "<th>Tarikh</th>";				// column 6
	echo "<th></th>";				// column 7
	echo "</tr>";

	//papar semua data dari jadual di DB
	while($row = mysqli_fetch_assoc($result))
	{
		$bil++;
		echo "<tr height = '10'>";
		echo "<td></td>";
		echo "<td>".$bil.".</td>";
		echo "<td>".$row['tajuk_kuiz']."</td>";
		echo "<td>".$row['nama']."</td>";
		echo "<td>".$row['skor']."</td>";
		echo "<td>".$row['tarikh_jawab']."</td>";
		echo "</tr>";
}
echo"</table>";
		}
		else { echo "<center>Tiada rekod</center>"; }
		?>
		<p></p></div>
		<?php
		include ("footer.php");
		?>

</body>
</html>