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

	<?php

	require_once('db.php');
	if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) 
	{
		echo 'Could not connect to mysql on ' . DB_HOST . '\n';
		exit; 
	}

	if(!mysql_select_db(DB_NAME, $dbconn)) 
	{
		echo 'Could not user database ' . DB_NAME . '\n'; echo mysql_error() . '\n';
		exit;
	}

	mysql_select_db('winestore');

	?>

	<div id="main">
		<h1>Welcome to the Alpha Tool</h1>
		<p>- This is an RMIT Student Project for WDA (Sem-2 2013) -</p>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

			<table style="border-style:solid;border-width:5px;">
				<tr> 
					<td> Name of Wine: </td>
					<td> <input id="nameWine" name="nameWine" type="text" value=""> </td>
					<td> Name of Winery: </td>
					<td> <input id="nameWinery" name="nameWinery" type="text" value=""> </td>
				</tr>

				<tr>
					<td> Region: </td>
					<td>
						<select id="region" name="region" value="region">
							<?php

							$result = mysql_query("SELECT region_name FROM region ");

							while($row = @ mysql_fetch_row($result)) 
							{
								$tableName = $row["region_id"];
								echo '<option value="$tableName"/>';
							}
							?>
						</select>
					</td>
					<td> Grape Variety: </td>
					<td>
						<select id="grapeVariety" name="grapeVariety" value="grape_variety">
							<?php

							$result = @ mysql_query("SELECT variety FROM grape_variety ");

							while($row = mysql_fetch_row($result)) 
							{
								$tableName = $row["variety_id"];
								echo '<option value="$tableName/>';
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
