<?php

$text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $text = $_POST['text'];
}



try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>
        <nav class="nav">

        <h1> THIS IS THE BEGINNING </h1>

        <?php 
if ($_SERVER["REQUEST_METHOD"] == "GET" AND $text == "")
{
   foreach($db->query('SELECT category_name, category_id FROM category') AS $navList)
  {

    $navList = '<ul>';
    $navList .= "<li><a href='index.php' title='View the Recipes Home Page'>Home</a></li>";
    foreach ($categories as $classification) {
        $navList .= "<li><a href='../index.php?action=categories&category_name=" . urlencode($classification['category_name']) . "' title='View our $classification[category_name] product line'>$classification[category_name]</a></li>"; 
        }
    $navList .= '</ul>';
    return $navList;
    echo $navList;


    //echo '<b>'.$row['category_name'].' '.$row['id']. '</b>' ;
  }
} 
    

  ?>

        </nav>
       
    </header>
    <main>

    </main>

</body>

</html>