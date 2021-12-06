<html>
<head>
<style>
	#mainbody
	{
		background-color: white;
		padding: 20px;
	}
	#tajuk {
		color: deepskyblue;
		font-size: 50px;
		font-weight: bold;
		font-family: Tw Cen MT Condensed;
		text-align: center;
		text-shadow: 3px 3px 0 navy;
	}
</style>
</head>
<body>
	<div id="mainbody">
		<?php
		include ("header.php");
		include ("topnav.php");

		//dapatkan ID Kuiz
		$idkuiz = $_GET["idK"];

		//dapatkan tajuk kuiz
		$sql_kuiz = "SELECT * FROM kuiz
							WHERE id_kuiz = '$idkuiz'";
		$result_kuiz = mysqli_query($conn, $sql_kuiz) or die(mysql_error());
		$row_kuiz = mysqli_fetch_array($result_kuiz);

		//dapatkan jawapan murid
		$jwpn = $_POST["pilih"];

		//tarikh-masa hari ini
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$trkh_masa = date('Y-m-d H:i:s');

		//markah mula
		$skor = 0;

		foreach ($jwpn as $id_soalan => $jwpn_murid)
		 {
			//semak jawapan dari jadual soalan
			$sql_jwpn = "SELECT * FROM soalan
							WHERE id_soalan = '$id_soalan'";
			$result_jwpn = mysqli_query($conn, $sql_jwpn) or die(mysql_error());
			$row_jwpn = mysqli_fetch_assoc($result_jwpn);

			//bandingkan jawapan murid dengan jawapan betul
			if($row_jwpn["jawapan"] == $jwpn_murid)
			{
				//jikan jwpn murid BETUL, maka TAMBAH 1 MARKAH
				$skor++;
			}
		}

		//KIRA JUMLAH SOALAN
		$query = "SELECT * FROM soalan WHERE id_kuiz = '$idkuiz'";
		$jum_soalan = mysqli_num_rows(mysqli_query($conn, $query));

		//simpan markah dalam DB
		$mysql = "INSERT INTO prestasi 
						(emel_murid, id_kuiz, tarikh_jawab, skor) VALUES ('$emel', '$idkuiz', '$trkh_masa', '$skor')";
		$result = mysqli_query($conn, $mysql) or die(mysql_error());
		?>

		<div id="tajuk"><p>Keputusan</p></div>
		<p><center>Kuiz : <?php echo $row_kuiz['tajuk_kuiz']; ?></center></p>
		<?php
		echo "<center>Markah : ".$skor."/".$jum_soalan."</center>";
		?>
	</div>
	<?php
	include ("footer.php");
	?>

</body>
</html>