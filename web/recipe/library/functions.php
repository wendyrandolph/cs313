<?php

//Where to keep the query functions 
function recipe($db, $recipe_id)
{
    $sql = ('SELECT * FROM recipes WHERE recipe_id=:recipe_id');

    $stmt = ($db->prepare($sql));
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $stmt->execute();
    $recipe = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($recipe as $row) {
        $name = "<h3> {$row['recipe_name']} </h3>";
        $name .="Bake at {$row['preheat_temp']}° for {$row['cook_time']}"; 
    }

    return $name;
}
