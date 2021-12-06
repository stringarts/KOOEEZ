<html>
<head>
<style>
	#mainbody{
		background-color: white;
		padding: 20px;
	}
	#tajuk
	{
		font-size: 30px;
		font-family: Tw Cen MT Condensed;
		font-weight: bold;
		text-decoration: underline overline;
		text-align: center;
	}
	table{
		border-collapse: collapse;
		margin: auto;
	}
	table {
		border-collapse: collapse;
		margin: auto;
	}
	th{
		background-color: moccasin;
	}
	#label {
		text-align: left;
	}

</style>
</head>
</body>

<?php
include ("header.php");
include ("topnav.php");

//dapatkan ID Kuiz
$idkuiz = $_GET['idK'];

//dapatkan data kuiz
$sql_kuiz = "SELECT * FROM kuiz WHERE id_kuiz = '$idkuiz'";
$result_kuiz = mysqli_query($conn, $sql_kuiz) or die(mysql_error());
$row_kuiz = mysqli_fetch_array($result_kuiz);

$tajuk = $row_kuiz['tajuk_kuiz'];
?>

<div id="mainbody">

<!-- TAJUK KUIZ -->
<form action="edit_tajuk.php?idK=<?php echo $idkuiz; ?>" method="POST"> 
<div id="tajuk"><p>Tajuk : <?php echo $tajuk; ?></p></div>

<table cellpadding=5px style="background-color: lightcyan">
<tr>
	<td style="width: 20px"></td>
	<td style="width: 100px"></td>
	<td style="width: 500px"></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td id="label">ID KUIZ :</td>
	<td><?php echo $row_kuiz['id_kuiz']; ?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td id="label"><input type="submit" name="edit_kuiz" value="Edit Tajuk"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
</form>

<!-- SOALAN KUIZ -->
<form name="soalan" method="post">
	<p><center><h2>SOALAN KUIZ</h2></center></p>
	<?php
	//dapatkan soalan kuiz
	$sql =  "SELECT * FROM soalan WHERE id_kuiz = '$idkuiz'";
	$result = mysqli_query($conn, $sql) or die(mysql_error());

	$bil = 0;

	if (mysqli_num_rows($result) > 0)
	 {
	?>

	<table cellpadding=5px border=1>
		<tr>
			<th style="width: 20px">Bil</th>
			<th style="width: 100px">Soalan</th>
			<th style="width: 50px">Jawapan</th>
			<th style="width: 50px">Pilihan A</th>
			<th style="width: 50px">Pilihan B</th>
			<th style="width: 50px">Pilihan C</th>
			<th style="width: 50px">Pilihan D</th>
			<td></td>			
		</tr>

		<?php
		while ($row = mysqli_fetch_assoc($result))
		 {
			$id_s = $row['id_soalan'];
			$bil++;
			?>

			<tr>
				<td><?php echo $bil; ?>.</td>
				<td><?php echo $row['soalan']; ?></td>
				<td><?php echo $row['jawapan']; ?></td>
				<td><?php echo $row['pilihan_a']; ?></td>	
				<td><?php echo $row['pilihan_b']; ?></td>
				<td><?php echo $row['pilihan_c']; ?></td>
				<td><?php echo $row['pilihan_d']; ?></td>
				<td><input type="button"
									onclick="window.location.href='edit_soalan.php?idS=<?php echo $id_s; ?>';" value="Edit Soalan">
								</td>
			</tr>

			<?php
		} //tutp while loop
		echo "</table>";
	} else { echo "<center> Tiada soalan</center>"; }
	?>

</form>
 </div>
 <?php
 include ("footer.php");
 ?>
</body>
</html>