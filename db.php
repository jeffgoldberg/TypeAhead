<?php
 	  
    //	db.php   Database access module

	
    $searchterm2 = $_POST['searchterm'];

    require_once('/var/www/restaurants.config.php');    //database configuration protected from web up one dir level

    // Distinct not required for this solution one-to-one. Helpful for one-to-many or many-to-one
    $query = "SELECT DISTINCT restaurant_name, cuisine_type  FROM favorite_restaurants WHERE restaurant_name LIKE '".$searchterm2."%' OR cuisine_type LIKE '".$searchterm2."%'ORDER BY restaurant_name ASC";

//no entry will return no data, clearing screen area
    if ($searchterm2 > "") {
        $results = query_db($query);
    }

    //build list of restaurants

    foreach($results as $row){
        $rests[] = $row['restaurant_name'];
	$cuis[] = $row['cuisine_type'];

    }
       //create comma separated lists

	$rests = implode(",", $rests);
	$cuis = implode(",", $cuis);

       //return two lists connected by comma creating one comma separated list

        print_r($rests);
        echo ",";
        print_r($cuis);

    

    function query_db($query){

    //need: host, user, password, database

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_errno() . PHP_EOL;
        exit;
    }

    //run the actual query

    $result = $link->query($query);

    mysqli_close($link);

    return $result;
    }

    //end function query_db

?>




