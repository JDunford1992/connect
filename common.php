<?php

session_start();

//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-LoginUser START*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

function loginUser($user,$pass1){
    $errorText = "";
    $validUser = false;
    
    // Check user existence 
    $pfile = fopen("users.txt","r");
    rewind($pfile);

    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(':', $line);
        if ($tmp[0] == $user) {
            // User exists, check password
            if (trim($tmp[1]) == trim($pass1)){
                $validUser= true;
                $_SESSION['userName'] = $user;
            }
            break;
        }
    }
    fclose($pfile);

    if ($validUser != true) $errorText = "Invalid username or password!";
    
    if ($validUser == true) $_SESSION['validUser'] = true;
    else $_SESSION['validUser'] = false;
    
    return $errorText;  
}

//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-LoginUser END*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*


  // function showerror() {
  //    die("Error " . mysql_errno() . " : " . mysql_error());
  // }

  // require 'db.php';

  // // Show all wines in a region in a <table>
  // function loginUser($connection, $query) {
  //   // Run the query on the server
  //   if (!($result = @ mysql_query ($query, $connection))) {
  //     showerror();
  //   }

  //   // Find out how many rows are available
  //   $rowsFound = @ mysql_num_rows($result);

  //   // If the query has results ...
  //   if ($rowsFound > 0) {

  //     // and start a <table>.
  //     print "\n<table>\n<tr>" .
  //         "\n\t<th>1</th>" .
  //         "\n\t<th>2</th>" .
  //         "\n\t<th>3</th>" .
  //         "\n\t<th>4</th>" .
  //         "\n\t<th>5</th>\n</tr>";

  //     // Fetch each of the query rows
  //     while ($row = @ mysql_fetch_array($result)) {
  //       // Print one row of results
  //       print "\n<tr>\n\t<td>{$row["user_id"]}</td>" .
  //           "\n\t<td>{$row["password"]}</td>" .
  //           "\n\t<td>{$row["name"]}</td>" .
  //           "\n\t<td>{$row["email"]}</td>" .
  //           "\n\t<td>{$row["phone"]}</td>\n</tr>";
  //     } // end while loop body

  //     // Finish the <table>
  //     print "\n</table>";
  //   } // end if $rowsFound body

  //   // Report how many rows were found
  //   print "{$rowsFound} records found matching your criteria<br>";
  // } // end of function

  // // Connect to the MySQL server
  // if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
  //   die("Could not connect");
  // }

  // // get the user data
  // $nameWine = $_POST['user'];
  // $nameWinery = $_POST['pass1'];

  // if (!mysql_select_db(DB_NAME, $connection)) {
  //   showerror();
  // }

  // // Start a query ...
  // $query = "SELECT wine.wine_id, wine.wine_name, grape_variety.variety, wine.year, 
  // winery.winery_name, region.region_name, inventory.cost, inventory.on_hand, items.qty, SUM(items.price)
  // FROM winery, wine, wine_variety, region, inventory, grape_variety, items
  // WHERE winery.winery_id = wine.winery_id
  // AND winery.region_id = region.region_id
  // AND wine.wine_id = inventory.wine_id
  // AND wine.wine_id = items.wine_id
  // AND wine.wine_id = wine_variety.wine_id
  // AND inventory.wine_id = wine_variety.wine_id
  // AND grape_variety.variety_id = wine_variety.variety_id";

  // // YEAR AND CLAUSE
  // // COST AND CLAUSE

  // // ADD MORE AND CLAUSES HERE TO CONNECT THE TABLES TOGETHER TO MAKE IT RUN FASTER

  // // ... then, if the user has specified a region, add the regionName
  // // as an AND clause ...

  // if (isset($nameWine) && $nameWine != "All") {
  //   $query .= " AND wine_name = '{$nameWine}'";
  // }

  // if (isset($nameWinery) && $nameWinery != "All") {
  //   $query .= " AND winery_name = '{$nameWinery}'";
  // }

  // if (isset($region) && $region != 1) {
  //   $query .= " AND winery.region_id = '{$region}'";
  // }

  // if (isset($grapeVariety) && $grapeVariety != "All") {
  //   $query .= " AND grape_variety.variety_id = '{$grapeVariety}'";
  // }

  // if (isset($yearLow, $yearMax) && $yearLow != "All" && $yearMax != "All") {
  //   $query .= "   AND wine.year >= '{$yearLow}' AND wine.year <= '{$yearMax}' ";
  // }

  // if (isset($costMin) && $costMin != "") {
  //   $query .= " AND inventory.cost >= '{$costMin}'";
  // }

  // if (isset($costMax) && $costMax != "") {
  //   $query .= " AND inventory.cost <= '{$costMax}'";
  // }

  // if (isset($costMin, $costMax) && $costMin != "" && $costMax != "") {
  //   $query .= " AND inventory.cost >='{$costMin}' AND inventory.cost <= '{$costMax}' ";
  // }

  // if (isset($minStock) && $minStock != "") {
  //   $query .= " AND on_hand >= '{$minStock}'";
  // }

  // if (isset($minOrder) && $minOrder != "") {
  //   $query .= " AND qty >= '{$minOrder}'";
  // }

  // // ... and then complete the query.
  // $query .= " GROUP BY wine_id, variety ORDER BY wine_id";

  // // run the query and show the results
  // displayWinesList($connection, $query, $nameWine);

function logoutUser(){
    unset($_SESSION['validUser']);
    unset($_SESSION['userName']);
}

function checkUser(){
    if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true)){
        header('Location: login.php');
    }
}
    
?>
