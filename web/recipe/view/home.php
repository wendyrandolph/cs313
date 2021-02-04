<?php

$id = "";
$text = "";




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

    <?php include '../recipe/snippets/header.php';
        ?>
       
       <?php include '../recipe/snippets/nav.php';
        ?>
    </header>
   
    <main>

        <?php

        if ($category_id and $db) {
            $stmt = $db->prepare('SELECT recipe_name FROM recipe_index WHERE category_id=:category_id');
            $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $results = '<ul>';
            $results = "<h4> These are the" .$rows['category_name']." recipes </h4>"; 
            foreach ($rows as $row) {
                $results .= "<li class='nav-item'><a href='/recipe/?action=viewRecipe&category_id=$row[category_id]&recipe_name=$row[recipe_name]'> $row[recipe_name]</a></li>";
            }
            $results .= '</ul>';
            echo $results;
        }


        ?>


    </main>

</body>

</html>