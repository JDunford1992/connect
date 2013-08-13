<html>
<head></head>

<body>

	<div id="main">
			<h1>Welcome to the Alpha Tool</h1>
			<p>- This is an RMIT Student Project for WDA (Sem-2 2013) -</p>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

				<table>

					Name of Wine: 

					<input id="nameWine" name="nameWine" type="text" value="">

					Name of Winery: 

					<input id="nameWinery" name="nameWinery" type="text" value="">

					Grape Variety: 

					<select id="grapeVariety" name="grapeVariety" value="tableName">
						<?php

						$result = mysql_query("SELECT wine_id, wine_name, year FROM wine ");

						while($row = mysql_fetch_row($result)) {
							$tableName = $row[0];
							echo '<option value="$tableName">$tableName</option>';
						} ?>
					</select>

					$ Cost Range:

					Min = <input id="costMin" name="costMin" type="text" value="">
					Max = <input id="costMax" name="costMax" type="text" value="">

					Min No of Wines Stock:

					<input id="minStock" name="minStock" type="text" value="">

					Min No of Wines Ordered:

					<input id="minOrder" name="minOrder" type="text" value="">

				<input id="submit" name="submit" type="submit" value="Submit AND Search">

				</table>

			</form>

			<h3><i>-Comments Created By Jasio Dunford</i></h3>
		</div>
		
	</body>
<footer></footer>
</html>
