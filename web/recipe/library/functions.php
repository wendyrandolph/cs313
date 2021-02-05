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

   // foreach ($recipe as $row) {
       // $name = "<h3> {$row['recipe_name']} </h3>";
        //$name .="Bake at {$row['preheat_temp']}° for {$row['cook_time']} minutes"; 
    //}

    return $name;
}
