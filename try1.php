<html>
<head></head>

<body>

	<div id="main">
			<h1>Welcome to the Alpha Tool</h1>
			<p>- This is an RMIT Student Project for WDA (Sem-2 2013) -</p>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

				<select value="tableName">
					<?php

					while($row = mysql_fetch_row($result)) {
						$tableName = $row[0];
						echo '<option value="$tableName">$tableName</option>';
					} ?>
				</select>

				<?php // you will need another drop down list here 

				echo '<option value="$tableName">$tableName</option>';

				?>

				<input type="submit" name="submit" value="Run Query">

			</form>

			<h3><i>-Comments Created By Jasio Dunford</i></h3>
		</div>
		
	</body>
<footer></footer>
</html>
