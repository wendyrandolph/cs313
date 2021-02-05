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
        
        
    recipe($db, $recipe_id);

    directions($recipe_id, $db); 

function directions($recipe_id, $db)
{   
    $stmt = $db->prepare('SELECT rs.instructions, r.recipe_name, r.preheat_temp, r.cook_time 
    FROM recipe_steps rs
    INNER JOIN recipes r
    ON rs.recipe_id = r.recipe_id 
    WHERE r.recipe_id = :recipe_id'); 
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    $recipe = "<div>"; 
    foreach ($rows as $row) {
           
        $recipe .= "<div class=directions>"; 
        $recipe .=  "$row[instructions]"; 
        $recipe .= '</div>';
    }
    echo $recipe;

}

function recipe($db, $recipe_id){ 
    $sql = ('SELECT * FROM recipes WHERE recipe_id=:recipe_id'); 

$stmt = ($db->prepare($sql)); 
$stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
$stmt->execute(); 
$recipe = $stmt->fetchAll(PDO::FETCH_ASSOC); 

   foreach($recipe as $row){ 
       $name = "{$row['recipe_name']}"; 
   }

   echo $name; 
}


    


            
            
echo $recipe; 


?> 



    </main>

</body>

</html>