<?php

function getCategories($db)
{

    $stmt = $db->prepare('SELECT * FROM category');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $list = " ";
    foreach ($rows as $row) {
        $list .= "<input type=checkbox  name=$row[category_name]> {$row['category_name']}   ";
    }
    return $list;
}

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
    $stmt = $db->prepare('SELECT rs.instructions, r.recipe_name, r.preheat_temp, r.cook_time 
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


        $recipe .= "<tr><td>{$row['instructions']}</td></tr>";
    }
    $recipe .= "</div>";
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

        $name = "<h3> {$row['recipe_name']} </h3>";
        $name .= "<table>";
        if (isset($row['preheat_temp'])) {
            $name .= "<div class='temp'> Bake at {$row['preheat_temp']}° for {$row['cook_time']} minutes </div>";
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
    foreach ($name as $row) {
        $amount .= "<tr><td>{$row['required_amount']} - </td> <td> {$row['ingredient_name']}</tr><br>";
    }

    return $amount;
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
        $_SESSION['category_name'] = $row['category_name'];
        return $results;
    }
}
function getContributor($db)
{
    $sql = 'SELECT * FROM contributor;';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    $stmt->exectute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $cont_Id = " "; 
    foreach ($rows as $row) {
        $cont_Id .= "{$row['contributor_name']}"; 
    
    }return $cont_Id; 
    
}

function addRecipeName($db, $recipe_name, $recipe_desc, $category_id, $preheat_temp, $cook_time)
{
    $sql = 'INSERT INTO recipes (recipe_name, recipe_desc, category_id, date_added, contributor_id, preheat_temp, cook_time)
            VALUES (:recipe_name, :recipe_desc,  :category_id,  :date_added, :contributor_id, :preheat_temp, :cook_time)';

    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':recipe_name', $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(':recipe_desc', $recipe_desc, PDO::PARAM_STR);
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->bindValue(':preheat_temp', $preheat_temp, PDO::PARAM_STR);
    $stmt->bindValue(':cook_time', $cook_time, PDO::PARAM_STR);


    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction

    // Return the indication of success (rows changed)
    return $rowsChanged;
}
