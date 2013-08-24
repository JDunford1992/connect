<html>
<head>
	<style>
	table,th,td
	{
		border:1px solid green;
	}
	</style>

	<script type="text/javascript">

	var txt="There was an error on this page.\n\n";

	function validateForm(){

		var costMin=document.forms["myForm"]["costMin"].value;
		var costMax=document.forms["myForm"]["costMax"].value;

		var costMax=document.forms["myForm"]["minStock"].value;
		var costMax=document.forms["myForm"]["minOrder"].value;

		if (costMin > costMax){
			txt+="Error description: Min Cost must be less than Max Cost.\n\n";
		}
		else if (minStock < 0){
			txt+="Error description: Min Stock must be a Positive Number.\n\n";
		}
		else if (minOrder < 0){
			txt+="Error description: Min Order must be a Positive Number.\n\n";
		}
		alert(txt);
	}
	</script>
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

		<form name="myForm"  onSubmit="validateForm()" action= "partB_results.php" method="GET">

			<table style="border-style:solid;border-width:5px;">
				<tr> 
					<td> Name of Wine: </td>
					<td> <input id="nameWine" name="nameWine" type="text" value="All"> </td>
					<td> Name of Winery: </td>
					<td> <input id="nameWinery" name="nameWinery" type="text" value="All"> </td>
				</tr>

				<tr>
					<td> Region: </td>
					<td>
						<select id="region" name="region" value="region">							
							<?php
							$result = mysql_query("SELECT region_name, region_id FROM region ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["region_id"]?>><?php echo $row["region_name"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
					<td> Grape Variety: </td>
					<td>
						<select id="grapeVariety" name="grapeVariety" value="grape_variety">
							<option value="All">All</option>;
							<?php
							$result = mysql_query("SELECT variety, variety_id FROM grape_variety ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["variety_id"]?>><?php echo $row["variety"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td> Range of Years (MIN): </td>
					<td>
						<select id="yearLow" name="yearLow" value="yearLow">
							<?php
							$result = mysql_query("SELECT DISTINCT year FROM wine ORDER BY `year` ASC ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["year"]?>><?php echo $row["year"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
					<td> Range of Years (MAX): </td>
					<td>
						<select id="yearMax" name="yearMax" value="yearMax">
							<?php
							$result = mysql_query("SELECT DISTINCT year FROM wine ORDER BY `year` ASC ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value=<?php echo $row["year"]?>><?php echo $row["year"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td> $ Cost Range: </td>
					<td> Min ($) = <input id="costMin" name="costMin" type="number" value="0"> </td>
					<td> Max ($) = <input id="costMax" name="costMax" type="number" value="0"> </td>
				</tr>

				<tr>
					<td> Min Wines (Stock): </td>
					<td> <input id="minStock" name="minStock" type="text" value=""> </td>
					<td> Min Wines (Ordered): </td>
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
