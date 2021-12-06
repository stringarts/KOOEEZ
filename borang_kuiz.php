<html>
<head>
<style>
	#mainbody
	{
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
	#label{
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
<form action="proses_kuiz.php" method="POST">
				<div id="tajuk"><p>Borang Bina Kuiz</p>
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
							<td id="label">ID Kuiz :</td>
							<td><input type="text" name="idQ" placeholder="K00" size="5" required></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td id="label">Tajuk Kuiz :</td>
							<td><input type="text" name="tajukQ" size="35" required></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td id="label"><input type="submit" name="bina" value="Bina Soalan"></td>
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