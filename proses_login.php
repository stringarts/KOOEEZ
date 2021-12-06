<?php

//start session
session_start();

/*Bacaan Lanjut tentang session di goo.gl/VOEjN   dan   goo.gl/zoVEwf*/

//sambungan ke DB
include ('db_conn.php');

//dapatkan data dari borang login
$kat = $_POST['kategori'];
$emel = $_POST['emel'];
$pwd = md5($_POST['katalaluan']); //encrypt pwd yg user masukkan


//bila user klik button LOG MASUK
//dapatkan kategori pengguna
//jika guru, semak data LOGIN dari jadual guru

if ($kat == "G") 
{
	$jadual = "guru";
}
else {
	$jadual = "murid";
}

//semak emel dan kata laluan dalam jadual
$mysql = "SELECT * FROM $jadual WHERE emel='$emel' AND katalaluan = '$pwd'";
$result = mysqli_query($conn, $mysql);
$row = mysqli_fetch_array($result);

//jika ADA data emel dan kata laluan yang sama
if(mysqli_num_rows($result) > 0)
{
	//dapatkan nama dan kunci primer(emel) pengguna
	$_SESSION['emel'] = $row['emel']; //simpan data session
	$nama = $row['nama'];
	$_SESSION['kategori'] = $kat;


	//papar popup mesej jika berjaya
	echo '<script>alert("Selamat Datang '.$nama.'");
			window.location.href = "koleksi_kuiz.php";</script>';
}
else  //jika TIDAK ADA data emel dan kata laluan yang sama
{
	echo '<script>alert("Emel atau Kata Laluan SALAH !!");
	window.location.href="index.php";</script>';

	//kembali semula ke laman utama
}

//Close db connection
mysqli_close($conn);
?>