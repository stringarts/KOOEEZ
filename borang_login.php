<html>
<head>
	<style>
		#mainbody
		{
			background-color: white;
			padding: 20px;
		}

		table {
			border; 2px solid black;
			border-collapse: collapse;
			margin: auto;
			background-color: mediumturquoise;

		}
		table, td {
			text-align: right;
		}
	</style>
</head>
<body>

	<div id = "mainbody">
		<!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang LOG MASUK -->

		<form action = "proses_login.php" method = "POST">

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
				<td>Emel :</td>
				<td><input type="text" name="emel" required></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>Kata Laluan : </td>
				<td><input type="password" name="katalaluan" required></td>
				<td></td>
			</tr>

			<tr>
				<td></td>
				<td>Kategori :</td>
				<td><input type="radio" name="kategori" value="G">Guru
					<input type="radio" name="kategori" value="M">Murid
				</td>
					<td></td>

			</tr>
			<tr>
			<td></td>
			<td></td>
			<td><input type = "submit" name="loginBtn" value="Log Masuk"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><a href="borang_daftar.php">Daftar Pengguna Baru</a></td>
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
</body>
</html>