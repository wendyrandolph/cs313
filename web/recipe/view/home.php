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
    <link rel="stylesheet" type="text/css" href="../css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <h1> Family Recipes </h1>
        <nav id="page_nav">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $navList = '<ul>';
                $navList .= "<li><a href='../view/home.php' title='View the Recipes home page'>Home</a></li>";
                foreach ($db->query('SELECT category_name FROM category') as $row) {
                    $navList .= '<li>'.'<a href="../view/display.php?action=category&category_id=$row[category_id]">'.' '.$row['category_name'] . ' ' .'</a>'. '</li>'.'<br><br>';
                    $navList .= '<input type="hidden" name="category_id" value="' . $row['category_id'] . '" '; 
                }
                $navList .= '</ul>';
                    
                     echo $navList; 
            } ?>
        </nav>

    </header>
    <main>

    </main>

</body>

</html>

