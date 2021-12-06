<?php
//session
include('session.php');

//dapatkan ID Kuiz

$idkuiz = $_GET['idK'];

//Dapatkan data dari semua textfield pada borang_soalan.php

$soalan = $_POST['soalan'];
$jwpn = $_POST['jawapan'];
$pA = $_POST['pilihanA'];
$pB = $_POST['pilihanB'];
$pC = $_POST['pilihanC'];
$pD = $_POST['pilihanD'];

//insert data dalam jadual
$mysql = "INSERT INTO soalan (soalan, jawapan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, id_kuiz) VALUES ('$soalan', '$jwpn', '$pA', 									'$pB', '$pC', '$pD', '$idkuiz')";

if (mysqli_query($conn, $mysql))
{
	//jika user klik button TAMBAH SOALAN
	if (isset($_POST['tambah']))
	{
		//paparkan js popup mesej jika soalan berjaya dimasukkan
		echo '<script>
					alert("Tambah Soalan Seterusnya!");
					window.location.href="borang_soalan.php?idK='.$idkuiz.'";
					</script>';
	}
	else //jika user klik button TAMAT
	{
		//redirect ke koleksi kuiz
		echo '<script>window.location.href="koleksi_kuiz.php";</script>';
	}
} else {
	echo "Error ; ".mysqli_error($conn);
}

//close connection
mysqli_close($conn);
?>