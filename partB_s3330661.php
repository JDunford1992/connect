<html>
<head>
	<style>
	table,th,td
	{
		border:1px solid green;
	}
	</style>
</head>

<body>

	<div id="main">
		<h1>Welcome to the Alpha Tool</h1>
		<p>- This is an RMIT Student Project for WDA (Sem-2 2013) -</p>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

			<table style="border-style:solid;border-width:5px;">
				<tr> 
					<td> Name of Wine: </td>
					<td><input id="nameWine" name="nameWine" type="text" value=""> </td>
					<td> Name of Winery: </td>
					<td> <input id="nameWinery" name="nameWinery" type="text" value=""> </td>
				</tr>

				<tr>
					<td> Grape Variety: </td>
					<td>
						<select id="grapeVariety" name="grapeVariety" value="tableName">
							<?php

							$result = mysql_query("SELECT wine_id, wine_name, year FROM wine ");

							while($row = mysql_fetch_row($result)) {
								$tableName = $row[0];
								echo '<option value="$tableName">$tableName</option>';
							} 
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td> $ Cost Range: </td>
					<td>
						Min = <input id="costMin" name="costMin" type="text" value="">
					</td>
					<td>
						Max = <input id="costMax" name="costMax" type="text" value="">
					</td>
				</tr>

				<tr>
					<td> Min No of Wines Stock: </td>
					<td> <input id="minStock" name="minStock" type="text" value=""> </td>
					<td> Min No of Wines Ordered: </td>
					<td> <input id="minOrder" name="minOrder" type="text" value=""> </td>
				</tr>

				<tr>
					<td> <input id="submit" name="submit" type="submit" value="Submit AND Search"> </td> 
				</tr>

			</table>
		</form>

		<h3><i>-Comments Created By Jasio Dunford</i></h3>
	</div>

</body>
<footer></footer>
</html>
