<?php

$id = "";





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
    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <h1> Family Recipes </h1>
        <nav id="page_nav">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
                $navList = '<ul>'; 
                
                foreach ($db->query('SELECT * FROM category') as $row) {

                    $navList .= "<li><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" .urlencode($row['category_name']) . "' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";                   
                    
                    $navList .= '</ul>'; 
                   
                } echo $navList;  
            } ?>
        </nav>

    </header>
    <main>

    <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" and $id == "") {
                $catList = '<ul>'; 
                
                foreach ($db->query('SELECT recipe_name, recipe_id, category_id FROM ingredients') as $row) {

                    $catList .= "<li><a href='/recipe/?action=view_recipe&category_id=$row[category_id]&recipe_name=". $row['recipe_name'] . "'</a></li>";                   
                    
                    $catList .= '</ul>'; 
                   
                } echo $catList;  
            } ?>


    </main>

</body>

</html>