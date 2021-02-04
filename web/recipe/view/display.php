<?php 

$index_id = ""; 
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

details($index_id, $db);


function details($index_id, $db)
{
$stmt = $db->prepare('SELECT recipe_name, recipe, directions FROM ingredients WHERE index_id=:index_id');
$stmt->bindValue(':index_id', $index_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows AS $row)
{
  echo '<b>'.$row['recipe_name'].' '.$row['recipe'].':'.$row['directions'].'</b> - <br><br>';
}

}

?>

    </main>

</body>

</html>