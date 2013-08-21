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
  $query = "SELECT wine_id, wine_name, variety, 
  year, winery_name, region_name, cost

  FROM winery 
  NATURAL JOIN grape_variety
  NATURAL JOIN region
  NATURAL JOIN wine
  NATURAL JOIN items
  NATURAL JOIN inventory
  NATURAL JOIN wine_variety";


  // ADD MORE AND CLAUSES HERE TO CONNECT THE TABLES TOGETHER TO MAKE IT RUN FASTER

  // ... then, if the user has specified a region, add the regionName
  // as an AND clause ...

  // if (isset($nameWine) && $nameWine != "All") {
  //   $query .= " WHERE wine_name = '{$nameWine}'";
  // }

  // if (isset($nameWinery) && $nameWinery != "All") {
  //   $query .= " AND winery_name = '{$nameWinery}'";
  // }

  // if (isset($region) && $region != "All") {
  //   $query .= " AND region = '{$region}'";
  // }

  // if (isset($grapeVariety) && $grapeVariety != 1) {
  //   $query .= " AND variety = '{$grapeVariety}'";
  // }

  // if (isset($yearLow) && $yearLow != "All") {
  //   $query .= " AND year >= '{$yearLow}'";
  // }

  // if (isset($yearMax) && $yearMax != "All") {
  //   $query .= " AND year <= '{$yearMax}'";
  // }

  // if (isset($costMin) && $costMin != "All") {
  //   $query .= " AND cost >= '{$costMin}'";
  // }

  // if (isset($costMax) && $costMax != "All") {
  //   $query .= " AND cost <= '{$costMax}'";
  // }

  // if (isset($minStock) && $minStock != "All") {
  //   $query .= " AND on_hand >= '{$minStock}'";
  // }

  // IF STEMENTS SHOULD WORK FINE HERE IF CORRECT

  // ... and then complete the query.
  // $query .= "ORDER BY wine_id";

  // run the query and show the results
  displayWinesList($connection, $query, $nameWine);
?>

</body>
<footer></footer>
</html>
