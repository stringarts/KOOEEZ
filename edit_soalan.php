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
		border: 2px solid black;
		border-collapse: collapse;
		margin: auto;
		background-color: dodgerblue;
	}
	#label {
		text-align: right;
	}
</style>
</head>

<body>
	<?php
	include ("header.php");
	include ("topnav.php");

	//dapatkan ID soalan
	$idsoalan = $_GET['idS'];

	##### jika user klik button EDIT SOALAN, #####
	##### update record dalam jadual #####
	if(isset($_POST['edit']))
	{
		$sql = "UPDATE soalan
					SET soalan = '".$_POST["soalan"]."',
						jawapan = '".$_POST["jawapan"]."',
						pilihan_a = '".$_POST["pilihanA"]."',
						pilihan_b = '".$_POST["pilihanB"]."',
						pilihan_c = '".$_POST["pilihanC"]."',
						pilihan_d = '".$_POST["pilihanD"]."'  WHERE id_soalan = '$idsoalan'";

						if (mysqli_query($conn, $sql)) {

						  echo'<script>alert("Berjaya Kemaskini Soalan Kuiz!");
						  		window.location.href="edit_kuiz.php?idK='.$_POST["idkuiz"].'";
						  		</script>';
						  
	} else {
		echo "Error ; ".mysqli_error($conn); }
	}
############### PROSES UPDATE TAMAT #################

	//dapatkan data soalan dari jadual untuk display dalam textfield
	$query = "SELECT * FROM soalan
				WHERE id_soalan = '$idsoalan'";

	$result = mysqli_query($conn, $query) or die(mysql_error());
	$row = mysqli_fetch_array($result);
	?>

	<div id="mainbody">
	<form method="POST">
	<div id="tajuk"><p>Borang Kemaskini Soalan</p></div>
	<table cellpadding=5px>
	<tr>
		<td style="width: 20px"></td>
		<td></td>
		<td></td>
		<td style="width: 20px"></td>
	</tr>	
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td id="label">Soalan :</td>
		<td><textarea name="soalan" cols="50" rows="3" required>
						<?php echo $row['soalan']; ?></textarea></td>
						<td></td>
	</tr>
	<tr>
		<td></td>
		<td id="label">Jawapan Betul :</td>
		<td><input type="text" name="jawapan" size="35" 
					value="<?php echo $row['jawapan']; ?>" required></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td id="label">Pilihan A :</td>
		<td><input type="text" name="pilihanA" size="35"
						value="<?php echo $row['pilihan_a']; ?>" required></td>
		<td></td>
	</tr>
		<tr>
		<td></td>
		<td id="label">Pilihan B :</td>
		<td><input type="text" name="pilihanB" size="35"
						value="<?php echo $row['pilihan_b']; ?>" required></td>
		<td></td>
	</tr>
		<tr>
		<td></td>
		<td id="label">Pilihan C :</td>
		<td><input type="text" name="pilihanC" size="35"
						value="<?php echo $row['pilihan_c']; ?>" required></td>
		<td></td>
	</tr>
		<tr>
		<td></td>
		<td id="label">Pilihan D :</td>
		<td><input type="text" name="pilihanD" size="35"
						value="<?php echo $row['pilihan_d']; ?>" required></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="idkuiz" size="5" 
						value="<?php echo $row['id_kuiz']; ?>" hidden></td>
				<td id="label"><input type="button" name="back" value="KEMBALI" onClick="javascript:history.go(-1)">
						<input type="submit" name="edit" value="SIMPAN">
				</td>
				<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
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
	<?php
	include ("footer.php");
	?>
	
</body>

