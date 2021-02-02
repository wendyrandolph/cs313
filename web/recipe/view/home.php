<?php

try {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <h1> THIS IS THE BEGINNING </h1>
        <nav class="nav">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $navList = '<ul>';
                $navList .= "<li><a href='../view/home.php' title='View the Recipes home page'>Home</a></li>";
                foreach ($db->query('SELECT category_name FROM category') as $row) {
                    $navList .= "<li><a href='../recipe/display.php?action=categories&category_name=" . urlencode($row['category_name']) . "' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
                    echo $navList; 
                    
                    //echo '<b>' . $row['categpry_name'] . ' ' . $row['id'] . '</b>' . '<br><br>';
                }
            } ?>
        </nav>

    </header>
    <main>

    </main>

</body>

</html>