<?php
//session
include('session.php');

//Dapatkan data dari semua textfield pada borang_kuiz.php
$idkuiz = $_POST['idQ'];
$tajuk = $_POST['tajukQ'];

//insert data kuiz dalam jadual
$mysql = "INSERT INTO kuiz (id_kuiz, tajuk_kuiz, emel_guru)
			VALUES ('$idkuiz', '$tajuk', '$emel')";

if (mysqli_query($conn, $mysql)) {

	//papar js popup mesej jika maklumat kuiz berjaya daftar
	echo '<script>
			alert("Masukkan Soalan Pula!!");
			window.location.href="borang_soalan.php?idK='.$idkuiz.'";
			</script>';
} else {
	echo "Error ; ".mysqli_error($conn); }

	//Close connection
	mysqli_close($conn);
?>