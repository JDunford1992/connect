// $result is populated from mysql query
<html>
<head></head>
<body>
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
</body>
<footer></footer>
</html>
