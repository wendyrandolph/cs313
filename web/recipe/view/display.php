<?php

  $recipe = " "; 


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
return $db; 
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


        <h1> THIS IS THE BEGINNING </h1>
        <nav class="nav">
            <?php

            echo $navList;

            ?>

        </nav>

    </header>
    <main>
    <?php

if ($index_id and $db) {
    $stmt = $db->prepare('SELECT index_id, recipe_name, recipe, directions FROM ingredients WHERE index_id=:id');
    $stmt->bindValue(':id', $index_id, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $results = '<div class=recipe>';
    foreach ($rows as $row) {
        $results .= '<h2 class=title>'  .$row['recipe_name']. '</h2>'; 
    }
    $results .= '</div>';
    echo $results; 
}
?>

    </main>

</body>

</html>