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
	table{
		border-collapse: collapse;
		margin: auto;
		background-color: #f2fff6;
	}
	#label{
		text-align: right;
	}
</style>
</head>
<body>
	
	<?php
	include ("header.php");
	include ("topnav.php");

	//dapatkan ID kuiz
	$idkuiz = $_GET['idK'];

	//dapatkan tajuk kuiz
	$sql_kuiz = "SELECT * FROM kuiz WHERE id_kuiz = '$idkuiz'";
	$result_kuiz =mysqli_query($conn, $sql_kuiz) or die(mysql_error());
	$row_kuiz = mysqli_fetch_array($result_kuiz);

	?>

	<div id="mainbody">
	<form action="semak_kuiz.php?idK=<?php echo $idkuiz; ?>" method="POST">
	<div id="tajuk">
		<p>Tajuk : <?php echo $row_kuiz['tajuk_kuiz']; ?></p>
	</div>

	<?php
	$no = 0;

	//dapatkan soalan dari db
	$sql = "SELECT * FROM soalan WHERE id_kuiz = '$idkuiz'";
	$result = mysqli_query($conn, $sql) or die(mysql_error());

	while($row = mysqli_fetch_assoc($result)){
		$no++; //no soalan

		//check jika hanya ada 2 pilihan jawapan sahaja,
		//tak perlu paparkan radiobutton untuk pilihan C & D
		if (empty($row['pilihan_c']))
		 {
			$pilihanC = "";
		}
		else { 
			$pilihanC = '<input type = "radio" name="pilih['.$row['id_soalan'].']"
								value="'.$row['pilihan_c'].'">';
			 }

		if (empty($row['pilihan_d']))
		{
			$pilihanD = "";
		} else {
			$pilihanD = '<input type = "radio" name="pilih['.$row['id_soalan'].']"
								value="'.$row['pilihan_d'].'">';
		}
	?>
	<table cellpadding=5px>
	<tr>
		<td style="width: 20px"></td>
		<td style="width: 15px"></td>
		<td></td>
		<td style="width: 20px"></td>
	</tr>
	<tr> <!-- papar soalan -->
		<td></td>
		<td colspan="2" width="900"><?php echo $no.". ".$row["soalan"]; ?>
		</td>
		<td></td>
	</tr>
	<tr> <!-- papar pilihan jawapan -->
		<td></td>
		<td></td>
		<td><input type="radio" name="pilih[<?php echo $row['id_soalan']; ?>]"
						value="<?php echo $row['pilihan_a']; ?>" required>
						<?php echo $row['pilihan_a']; ?>
						<br>
			<input type="radio" name="pilih[<?php echo $row['id_soalan']; ?>]"
						value="<?php echo $row['pilihan_b']; ?>">
						<?php echo $row['pilihan_b']; ?>
						<br> <?php echo $pilihanC; ?> <?php echo $row['pilihan_c']; ?>
						<br> <?php echo $pilihanD; ?> <?php echo $row['pilihan_d']; ?>
					</td>
					<td></td>

					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php } ?>
				<tr>
					<td></td>
					<td></td>
					<td align="center"><input type="submit" name="hantar" value="HANTAR JAWAPAN"></td>
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
	</div>
	<?php
	include ("footer.php");
	?>
</body>
</html>