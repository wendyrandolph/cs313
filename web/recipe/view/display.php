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
            foreach ($db->query('SELECT recipe_name, recipe, directions FROM ingredients WHERE index_id=:id AND recipe_name=:recipe_name') as $rows){ 
        
                echo '<h3>' . $row['recipe_name'] . '</h3>';
            }
        }
        ?>

    </main>

</body>

</html>