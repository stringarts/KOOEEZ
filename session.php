<?php

//start session

session_start();

//Sambungan ke DB
include ('db_conn.php');

//pegang data session berdasarkan kunci primer dalam jadual
$emel = $_SESSION['emel'];

//dapatkan kategori semasa pengguna login
$kat = $_SESSION['kategori'];

//jika guru, semak data login dari jadual guru
if ($kat == "G"){
	$jadual = "guru";
} else {
	$jadual = "murid";
}

//dapatkan data pengguna berdasarkan session kunci primer
$mysql = mysqli_query($conn, "SELECT * FROM $jadual WHERE emel= '$emel'");
$row = mysqli_fetch_array($mysql);

$nama = $row['nama'];
$emel = $row['emel'];

//jika data session tidak dijumpai dalam jadual
if(!isset($emel))
{
	header("Location: index.php"); //kembali ke paparan utama
}
?>