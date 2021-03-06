<?php

function checkEmail($member_email)
{
    $valEmail = filter_var($member_email, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

//Check password for a minimum of 8 characters
//At least 1 capital letter, at least 1 number and
//at least 1 special character
function checkPassword($member_password)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
    return preg_match($pattern, $member_password);
}




function directions($recipe_id, $db)
{
    $stmt = $db->prepare('SELECT rs.instructions, r.recipe_name, r.preheat_temp, r.cook_time, r.ingredients
FROM recipe_steps rs
INNER JOIN recipes r
ON rs.recipe_id = r.recipe_id 
WHERE r.recipe_id = :recipe_id');
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $recipe = " ";
    $recipe .= "<div class=directions>";
    foreach ($rows as $row) {


        $recipe .= "<tr>{$row['instructions']}</tr>";
    }
    $recipe .= "</div>";
    return $recipe;
}


function getCategories($db)
{
    $sql = ('SELECT * FROM category');
    $stmt = ($db->prepare($sql));
    $stmt->execute();
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $category;
}


function getName($db, $recipe_id)
{
    $sql = ('SELECT * FROM recipes WHERE recipe_id=:recipe_id');

    $stmt = ($db->prepare($sql));
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $stmt->execute();
    $name = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($name as $row) {

        $name = "<h3> {$row['recipe_name']} </h3>";
        $name .= "<table>";
        if (!empty($row['preheat_temp'])) {
            $name .= "<div class='temp'> Bake at {$row['preheat_temp']}° for {$row['cook_time']} minutes </div>";
        } else {
            $name .= " ";
        }
        $name .= "<ul>";
        foreach (explode(',', $row['ingredients']) as $ingredient) {
            $name .= "<li> $ingredient </li>";
        }
        $name .= "</ul>";
        $name .= "</table>";
    }

    return $name;
}




function displayCategory($db, $category_id)
{

    if ($category_id and $db) {
        $stmt = $db->prepare('SELECT ri.recipe_id, ri.recipe_name, c.category_name, ri.recipe_index_id FROM recipe_index ri INNER JOIN category c ON ri.category_id = c.category_id WHERE c.category_id = :category_id');
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $results = '<ul>';
        foreach ($rows as $row) {

            $results .= "<li class='nav-item'><a href='/recipe/?action=viewRecipe&recipe_id=$row[recipe_id]'> 
                        {$row['recipe_name']}</a></li>";
        }
        $results .= '</ul>';
        //$_SESSION['category_name'] = $rows['category_name'];
        return $results;
    }
}

function checkExistingRecipe($db, $recipe_name)
{

  // The SQL statement

  $sql = "SELECT recipe_name FROM recipes WHERE recipe_name = :recipe_name";
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':recipe_name', $recipe_name, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $matchRecipe = $stmt->fetch(PDO::FETCH_NUM);

  if (empty($matchRecipe)) {
    return 0;
    // echo 'Nothing found';
  } else {
    return 1;
    //echo 'Match found';
  }
  $stmt->closeCursor();
}


function addRecipeName($db, $recipe_name, $recipe_desc, $category_id, $preheat_temp, $cook_time, $ingredients, $instructions)
{

    try {
        //insert into recipes table 
        $sql = 'INSERT INTO recipes (recipe_name, recipe_desc, category_id, preheat_temp, cook_time, ingredients) 
        VALUES (:recipe_name, :recipe_desc,  :category_id,  :preheat_temp, :cook_time, :ingredients)';
        $stmt = $db->prepare($sql);

        $stmt->execute(array(':recipe_name' => $recipe_name, ':recipe_desc' => $recipe_desc, ':category_id' => $category_id, ':preheat_temp' => $preheat_temp, ':cook_time' => $cook_time, 'ingredients' => $ingredients));

        $newrecipeID = $db->lastInsertId('recipes_recipe_id_seq');

        //insert into recipe_steps 
        $stmt = $db->prepare('INSERT INTO recipe_steps (instructions, recipe_id) VALUES (:instructions, :recipe_id)');
        $stmt->execute(array(':instructions' => $instructions, ':recipe_id' => $newrecipeID));

        //insert into the recipe index 
        $stmt = $db->prepare('INSERT INTO recipe_index (recipe_id, recipe_name, category_id) VALUES ( :recipe_id, :recipe_name, :category_id)');
        $stmt->execute(array(':recipe_id' => $newrecipeID, ':recipe_name' => $recipe_name, ':category_id' => $category_id));
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        die();
    }
}

//Get index of recipes in the database 
function getRecipes($db)
{

    $sql = ('SELECT r.recipe_name, r.recipe_id, ri.recipe_index_id FROM recipes r JOIN recipe_index ri ON r.recipe_id = ri.recipe_id ORDER BY r.recipe_name ASC');
    $stmt = ($db->prepare($sql));
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    return $list; 
} 

//build the recipe index display
function indexDisplay($list){ 


 
    $display = '<table class=table table-striped align-middle>';
    $display .= '<thead> Recipe Name </thead>'; 
    
    foreach ($list as $row) {
        
        $display .= "<tr> <td width='150'>$row[recipe_name] </td> <td> <a href='/recipe/?action=del&recipe_id=$row[recipe_id]' class='rev_delete info'> Delete </a> </td></tr><br />";
        
    }
    $display .= '</table>';
 return $display; 
}


function deleteRecipe($db, $recipe_id){ 

    $sql = ('DELETE FROM recipes WHERE recipe_id = :recipe_id;'); 
    $stmt = ($db->prepare($sql));
    
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


function deleteIndex($db, $recipe_id){ 
    $sql = ('DELETE FROM recipe_index WHERE recipe_id = :recipe_id;'); 
    $stmt = ($db->prepare($sql));
    
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

function deleteSteps($db, $recipe_id){ 
    $sql = ('DELETE FROM recipe_steps WHERE recipe_id = :recipe_id;'); 
    $stmt = ($db->prepare($sql));
    
    $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;


}



?>