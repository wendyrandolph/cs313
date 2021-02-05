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


        <nav class="navbar navbar-expand-lg navbar=light bg-light" id="page_nav">
            <?php include '../recipe/snippets/nav.php';
            ?>
        </nav>

    </header>
    <main>
       <?php

directions($recipe_id, $db); 
            

            function directions($recipe_id, $db)
            {   
                $stmt = $db->query('SELECT rs.instructions, r.recipe_name, r.preheat_temp, r.cook_time 
                FROM recipe_steps rs
                INNER JOIN recipes r
                ON rs.recipe_id = r.recipe_id 
                WHERE rs.recipe_id = 2'); 
                $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
                $recipe = " "; 
                foreach ($rows as $row) {
                    $recipe .= "<div class=directions>";
                    $recipe .=  "$row[instructions]"; 
                    $recipe .= '</div>';
                }
                echo $recipe;
            }


            function details($recipe_id, $db)
            {
                $stmt = $db->prepare('SELECT  r.recipe_name,  
            FROM recipes r
            INNER JOIN recipe_steps rs
            ON r.recipe_id = rs.recipe_id
            WHERE r.recipe_id =:recipe_id');
                $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
                $stmt->execute();
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
                $recipe = " "; 
                foreach ($rows as $row) {
                    $recipe .= "<div class=directions>";
                
                    $recipe .= '</div>';
                }
                echo $recipe;
            }


            ?>
        </div>

    </main>

</body>

</html>