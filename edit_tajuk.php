<?php
//sambung ke DB
include ('db_conn.php');

//dapatkan id_kuiz
$idK = $_GET["idK"];

##### jika user klik button EDIT TAJUK, #####
##### update record dalam jadual #####

if (isset($_POST['edit']))
 {
	$sql = "UPDATE kuiz
				SET tajuk_kuiz = '".$_POST["tajukQ"]."'
				WHERE id_kuiz = '$idK'";

	if (mysqli_query($conn, $sql))
	 {
		echo '<script>alert("BERJAYA Kemaskini Tajuk Kuiz!");
						window.location.href="edit_kuiz.php?idK='.$idK.'"
						</script>';
	}else {
		echo "Error ; ".mysqli_error($conn); }
	}
	##### PROSES UPDATE TAMAT #####

	//dapatkan data kuiz dari jadual untuk display dalam textfield
	$query = "SELECT * FROM kuiz
					WHERE id_kuiz = '$idK'";

	$result = mysqli_query($conn, $query) or die(mysql_error());
	$row_kuiz = mysqli_fetch_array($result);
	?>

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
			text-align: center;
		}
		table {
			border: 2px solid black;
			border-collapse: collapse;
			margin: auto;
			background-color: yellowgreen;
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
		?>

	<div id="mainbody">
	<form action="" method="POST">
	<div id="tajuk"><p>BORANG KEMASKINI TAJUK KUIZ</p></div>
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
		<td id="label">ID KUIZ :</td>
		<td><input type="text" name="idQ" size="35" value="<?php echo $row_kuiz['id_kuiz']; ?>" disabled>
		</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td id="label">Tajuk Kuiz :</td>
		<td><input type="text" name="tajukQ" size="35" value="<?php echo $row_kuiz['tajuk_kuiz']; ?>" required>
		</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td id="label"><input type="button" name="back" value="KEMBALI"
							onClick="javascript:history.go(-1)">
							<input type="submit" name="edit" value="SIMPAN"></td>
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
	</div>
	<?php
	include ("footer.php");
	?>
	</body>
</html>