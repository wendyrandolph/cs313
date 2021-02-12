<?php

function getNav($db)
{
    $navList = '<ul class="navbar-nav">';

    foreach ($db->prepare('SELECT * FROM category') as $row) {

        $navList .= "<li class='nav-item'><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' class='nav-link' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
    }
    $navList .= '</ul>';

    return $navList;
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
