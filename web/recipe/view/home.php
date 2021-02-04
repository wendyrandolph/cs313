<?php

$id = "";
$text = "";

$index_id = $_POST['recipe_index_id'];


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <h1> Family Recipes </h1>
        

    </header>
    <nav class="navbar navbar-expand-lg navbar=light bg-light" id="page_nav">
            <div class="container-fluid d-inline p-2">
            
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
                    $navList = '<ul class="navbar-nav">';

                    foreach ($db->query('SELECT * FROM category') as $row) {

                        $navList .= "<li class='nav-item'><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' class='nav-link' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
                    }
                    $navList .= '</ul>';
                }
                echo $navList;
                ?>


                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    <main>

        <?php

        if ($recipe_index_id and $db) {
            $stmt = $db->prepare('SELECT * FROM recipe_index WHERE recipe_index_id=:recipe_index_id');
            $stmt->bindValue(':recipe_index_id', $recipe_index_id, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $results = '<ul>';
            foreach ($rows as $row) {
                $results .= "<li><a href='/recipe/?action=viewRecipe&recipe_index_id=$row[recipe_index_id]&recipe_name=$row[recipe_name]'> $row[recipe_name]</a></li>";
            }
            $results .= '</ul>';
            echo $results;
        }


        ?>


    </main>

</body>

</html>