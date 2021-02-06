<?php


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
    return $recipe;
}





function getName($db, $recipe_id)
{
    $sql = ('SELECT * FROM recipes WHERE recipe_id=:recipe_id');

    $stmt = ($db->prepare($sql));
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $stmt->execute();
    $name = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($name as $row) {
        $name = "<table>";
        $name = "<tr><th><td><h3> {$row['recipe_name']} </h3></td></th></tr>";
        if (isset($row['preheat_temp'])) {
            $name .= "<tr><td>Bake at {$row['preheat_temp']}° for {$row['cook_time']} minutes </td></tr>";
        }
        $name .= "</table>";
    }

    return $name;
}


function getIngredients($db, $recipe_id)
{
    $sql = ('SELECT  i.required_amount, i.ingredient_name,  r.recipe_name FROM ingredients i 
    INNER JOIN recipe_ingredients ri
    ON i.ingredients_id = ri.ingredients_id 
    INNER JOIN recipes r
    ON ri.recipe_id = r.recipe_id
    WHERE r.recipe_id =:recipe_id');
    $stmt = ($db->prepare($sql));
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $stmt->execute();
    $name = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $amount = " ";    
    while ($name) {
        


        $amount .= "<tr><td>$name[required_amount] - </td> <td> $name[ingredient_name]</tr>";

        
    }

    return $amount;
}
