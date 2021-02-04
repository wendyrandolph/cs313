<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index_id = $_GET['recipe_index_id'];
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


        <h1> THIS IS THE BEGINNING </h1>
        <nav class="nav">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
                $navList = '<ul>';

                foreach ($db->query('SELECT * FROM category') as $row) {

                    $navList .= "<li><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
                }
                $navList .= '</ul>';
            }
            echo $navList;

            ?>

        </nav>

    </header>
    <main>
        <?php

        details($index_id, $db);


        function details($index_id, $db)
        {
            $stmt = $db->prepare('SELECT r.recipe_id, r.recipe_name, ra.amount_required, i.ingredient_name, rs.instructions 
            FROM recipes r
            INNER JOIN recipe_steps rs
            ON r.recipe_id = rs.recipe_id
            INNER JOIN recipe_amounts ra
            ON rs.amount_id = ra.amount_id 
            INNER JOIN ingredients i
            ON rs.ingredients_id = i.ingredients_id
            INNER JOIN recipe_index ri 
            ON r.recipe_id = ri.recipe_id
             WHERE recipe_index_id =:recipe_index_id');
            $stmt->bindValue(':recipe_index_id', $index_id, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                var_dump($rows); 
        }

        ?>

    </main>

</body>

</html>