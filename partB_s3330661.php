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
						<select id="region" name="region" value="">							
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
						<select id="grapeVariety" name="grapeVariety" value="">
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
						<select id="yearLow" name="yearLow" value="">
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
						<select id="yearMax" name="yearMax" value="">
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
  function displayWinesList($connection, $query, $nameWine, $nameWinery, $region, $grapeVariety, 
  	$yearLow, $yearMax, $costMin, $costMax, $minStock) {
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
          "\n\t<th>Year</th>" .
          "\n\t<th>Winery</th>" .
          "\n\t<th>Description</th>\n</tr>";

      // Fetch each of the query rows
      while ($row = @ mysql_fetch_array($result)) {
        // Print one row of results
        print "\n<tr>\n\t<td>{$row["wine_id"]}</td>" .
            "\n\t<td>{$row["wine_name"]}</td>" .
            "\n\t<td>{$row["year"]}</td>" .
            "\n\t<td>{$row["winery_name"]}</td>" .
            "\n\t<td>{$row["description"]}</td>\n</tr>";
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
  $query = "SELECT wine_id, wine_name, description, year, winery_name, cost, on_hand
FROM winery, region, wine, inventory
WHERE winery.region_id = region.region_id
AND wine.winery_id = winery.winery_id";

  // ... then, if the user has specified a region, add the regionName
  // as an AND clause ...
  if (isset($nameWine) && $nameWine != "All") {
    $query .= " AND wine_name = '{$nameWine}'";
  }

  if (isset($nameWinery) && $nameWinery != "All") {
    $query .= " AND winery_name = '{$nameWinery}'";
  }

  if (isset($region) && $region != "All") {
    $query .= " AND region = '{$region}'";
  }

  if (isset($grapeVariety) && $grapeVariety != "All") {
    $query .= " AND variety = '{$grapeVariety}'";
  }

  if (isset($yearLow) && $yearLow != "All") {
    $query .= " AND year >= '{$yearLow}'";
  }

  if (isset($yearMax) && $yearMax != "All") {
    $query .= " AND year <= '{$yearMax}'";
  }

  if (isset($costMin) && $costMin != "All") {
    $query .= " AND cost >= '{$costMin}'";
  }

  if (isset($costMax) && $costMax != "All") {
    $query .= " AND cost <= '{$costMax}'";
  }

  if (isset($minStock) && $minStock != "All") {
    $query .= " AND on_hand >= '{$minStock}'";
  }

  // ... and then complete the query.
  $query .= " ORDER BY year";

  // run the query and show the results
  displayWinesList($connection, $query, $nameWine, $nameWinery, $region, $grapeVariety, 
  	$yearLow, $yearMax, $costMin, $costMax, $minStock);
?>

</body>
<footer></footer>
</html>
