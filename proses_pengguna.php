<?php
//sambungan ke DB

include ('db_conn.php');

/*Dapatkan data dari semua medan/textifield pada borang_daftar.php */

$emel = $_POST['emel'];
$nama =$_POST['nama'];
$pwd = md5($_POST['katalaluan']); //md5 untuk ENCRYPT pwd
$kat = $_POST['kategori'];

//dapatkan kategori pengguna
//jika GURU, simpan data dalam JADUAL GURU

if ($kat == "G")
{
	$jadual = "guru";
}
else {
	$jadual = "murid";
}
//semak jika emel tulah wujud dalam DB
$semak = "SELECT emel FROM $jadual 
			WHERE emel = '$emel'";
$result = mysqli_query($conn, $semak) or die(mysql_error());

//jika emel sudah wujud. keluarkan javascript popup mesej
if (mysqli_num_rows($result) > 0)
{
echo '<script>
		alert("Emel nada telah didaftarkan! Sila guna emel lain.");
		window.location.href="borang_daftar.php";</script>';
}
else {

	//jika emel belum wujud. simpan maklumat pengguna dalam DB

	$mysql = "INSERT INTO $jadual
				(emel, katalaluan, nama)
				VALUES ('$emel', '$pwd', '$nama')";

				if (mysqli_query($conn, $mysql)) {
					//papar js popup mesej jika pengguna baru berjaya daftar
					echo '<script>
							alert("Berjaya Daftar Pengguna Baharu!!");
							window.location.href="index.php";</script>';
							//selepas berjaya daftar, kembali ke login page
				} else {
					echo "Error ; ".mysqli_error($conn);}
}

//Close connection
mysqli_close($conn);
?> 