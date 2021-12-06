<?php
//session
include('session.php');

//dapatkan id_kuiz
$idK = $_GET["idK"];

//dekete kuiz dari jadual
//soalan kuiz tersebut juga akan dipadam

$mysql = "DELETE FROM kuiz WHERE id_kuiz='$idK'";

if (mysqli_query($conn, $mysql))
 {
 	//papar js popup mesej jika kuiz berjaya delete
 	echo '<script>alert("Kuiz Berjaya Dipadam!");
 			window.location.href="koleksi_kuiz.php";</script>';
}
else { echo "Error ; ".mysqli_error($conn); }
?>