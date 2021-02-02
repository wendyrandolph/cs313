<?php

function myDbConnect()
{



  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"], '/');

  try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
    $result = $db->query('SELECT category_name FROM category ORDER BY category_name ASC');
    // The next line runs the prepared statement 
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
        echo "category name: " . $row["category_name"] . "<br>";
      }
    } else {
      echo "0 results";
    }


    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    //$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //return $categories;
    //if (is_object($db)) {
    //  echo 'It worked!';
    //}
  } catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    exit;
  }
}
myDbConnect();
