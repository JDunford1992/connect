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
							while($row = mysql_fetch_array($result)) {
							?>
							<option value="$tableName"><?php echo $row["region_name"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
					<td> Grape Variety: </td>
					<td>
						<select id="grapeVariety" name="grapeVariety" value="grape_variety">
							<?php
							$result = mysql_query("SELECT variety FROM grape_variety ");
							while($row = mysql_fetch_array($result)) {
							?>
							<option value="$tableName"><?php echo $row["variety"]?></option>;
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
							<option value="$tableName"><?php echo $row["year"]?></option>;
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
							<option value="$tableName"><?php echo $row["year"]?></option>;
							<?php
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td> $ Cost Range: </td>
					<td> Min ($) = <input id="costMin" name="costMin" type="text" value=""> </td>
					<td> Max ($) = <input id="costMax" name="costMax" type="text" value=""> </td>
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

	//////////////////////////////PHP CODE TO DISPLAY THE QUERY RESULTS//////////////////////////////

	<?php

  function showerror() {
     die("Error " . mysql_errno() . " : " . mysql_error());
  }

  require 'db.php';

  // Show all wines in a region in a <table>
  function displayWinesList($connection, $query, $nameWine) {
    // Run the query on the server
    if (!($result = @ mysql_query ($query, $connection))) {
      showerror();
    }

    // Find out how many rows are available
    $rowsFound = @ mysql_num_rows($result);

    // If the query has results ...
    if ($rowsFound > 0) {
      // ... print out a header
      print "Wines of $nameWine<br>";

      // and start a <table>.
      print "\n<table>\n<tr>" .
          "\n\t<th>Wine ID</th>" .
          "\n\t<th>Wine Name</th>" .
          "\n\t<th>Grape Variety</th>" .
          "\n\t<th>Year</th>" .
          "\n\t<th>Winery Name</th>" .
          "\n\t<th>Region</th>" .
          "\n\t<th>Cost per Bottle</th>" .
          "\n\t<th>Stock On Hand</th>" .
          "\n\t<th>Sum Sold Quantity</th>" .
          "\n\t<th>Sum Sold Items</th>\n</tr>";

      // Fetch each of the query rows
      while ($row = @ mysql_fetch_array($result)) {
        // Print one row of results
        print "\n<tr>\n\t<td>{$row["wine_id"]}</td>" .
            "\n\t<td>{$row["wine_name"]}</td>" .
            "\n\t<td>{$row["variety"]}</td>" .
            "\n\t<td>{$row["year"]}</td>" .
            "\n\t<td>{$row["winery_name"]}</td>" .
            "\n\t<td>{$row["region_name"]}</td>" .
            "\n\t<td>{$row["cost"]}</td>" .
            "\n\t<td>{$row["on_hand"]}</td>" .
            "\n\t<td>{$row["qty"]}</td>" .
            "\n\t<td>{$row["price"]}</td>\n</tr>";
      } // end while loop body

      // Finish the <table>
      print "\n</table>";
    } // end if $rowsFound body

    // Report how many rows were found
    print "{$rowsFound} records found matching your criteria<br>";
  } // end of function

  // Connect to the MySQL server
  if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
    die("Could not connect");
  }

  // get the user data
  $nameWine = $_GET['nameWine'];
  $nameWinery = $_GET['nameWinery'];
  $region = $_GET['region'];
  $grapeVariety = $_GET['grapeVariety'];
  $yearLow = $_GET['yearLow'];
  $yearMax = $_GET['yearMax'];
  $costMin = $_GET['costMin'];
  $costMax = $_GET['costMax'];
  $minStock = $_GET['minStock'];
  $minOrder = $_GET['minOrder'];

  if (!mysql_select_db(DB_NAME, $connection)) {
    showerror();
  }

  // Start a query ...
  $query = "SELECT wine.wine_id, wine.wine_name, grape_variety.variety, 
  wine.year, winery.winery_name
  FROM winery, grape_variety, region, wine, items, inventory
  WHERE winery.region_id = region.region_id
  AND wine.winery_id = winery.winery_id";

  // ... then, if the user has specified a region, add the regionName
  // as an AND clause ...
  if (isset($nameWine) && $nameWine != "All") {
    $query .= " AND wine_name = '{$nameWine}'";
  }

  // ... and then complete the query.
  $query .= " ORDER BY wine_id";

  // run the query and show the results
  displayWinesList($connection, $query, $nameWine);
?>

</body>
<footer></footer>
</html>
