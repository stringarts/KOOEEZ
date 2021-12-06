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

//dapatkan ID Kuiz
$idkuiz = $_GET['idK'];
?>
<div id ="mainbody">
	<form action="proses_soalan.php?idK=<?php echo $idkuiz; ?>" method="POST">
		<div id="tajuk"><p>Borang Bina Soalan</p></div>
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
				<td><textarea name="soalan" cols="50" rows="3" placeholder="Taip Soalan Disini" required></textarea></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td id="label">Jawapan Betul :</td>
				<td><input type="text" name="jawapan" size="35" required></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td id="label">Pilihan A :</td>
				<td><input type="text" name="pilihanA" size="35" required></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td id="label">Pilihan B :</td>
				<td><input type="text" name="pilihanB" size="35" required></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td id="label">Pilihan C :</td>
				<td><input type="text" name="pilihanC" size="35"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td id="label">Pilihan D :</td>
				<td><input type="text" name="pilihanD" size="35"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td id="label">
					<input type="submit" name="tambah" value="Tambah Soalan">
					<input type="submit" name="tamat" value="Tamat"></td>
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

	<div id="tajuk"><p>Muat Naik Soalan</p></div>
	<!-- borang untuk muatnaik soalan -->
	<form name="upload" action="upload_soalan.php?idK=<?php echo $idkuiz; ?>" method="POST" enctype="multipart/form-data">
		<center>Pilih fail untuk dimuat naik (Fail excel .csv sahaja) :
			<input type="file" name="fail_csv" required> 

			<p><input type="submit" name="upload" value="Muat Naik"></p>
			</center>
	</form>
</div>
<?php
include ("footer.php");
?>

</body>
</html>