<?php
//session
include ('session.php');

//dapatkan ID kuiz
$idkuiz = $_GET['idK'];

//dapatkan file .csv tersebut dan simpan dalam 'temp' folder
$file = $_FILES["fail_csv"]["tmp_name"];

//pastikan (verify) hanya file .csv sahaja yang di upload
if (($_FILES["fail_csv"]["type"] == "application/vnd.ms-excel"))
{
	//buka dan baca file tersebut, r = readonly
	$file_open = fopen($file, "r");

	//selagi masih ada data dalam fail csv tersebut(EOF),
	//baca dalam line

	while (($data = fgetcsv($file_open)) !== FALSE)
	 {
		$mysql = "INSERT INTO soalan (soalan, jawapan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, id_kuiz) VALUES ('".$data[0]."', 									'".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[4]."', '".$data[5]."', 												'$idkuiz')";

		if (mysqli_query($conn, $mysql))
		 {
		 	//paparkan js popup mesej jika berjaya muat naik soalan 
		 	echo '<script>alert("Muat naik soalan BERJAYA!");
		 				window.location.href="koleksi_kuiz.php";
		 				</script>';
		 } else {
		 	echo "Error ; ".mysqli_error($conn);
		 }
	}
}

//Close connection
mysqli_close($conn);
?>