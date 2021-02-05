<?php
// Create or access a Session
session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require('../recipe/library/connections.php');
//require ('../recipe/library/functions.php');
//require ('../recipe/library/main_model.php');

switch ($action) {

    case 'viewRecipe':
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING);
        
        directions($recipe_id, $db); 

        function directions($recipe_id, $db)
        {   
            $stmt = $db->prepare('SELECT rs.instructions, r.recipe_name, r.preheat_temp, r.cook_time 
            FROM recipe_steps rs
            INNER JOIN recipes r
            ON rs.recipe_id = r.recipe_id 
            WHERE rs.recipe_id = :recipe_id'); 
            $stmt->bindValue(':recipe_id', $recipe_id, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
             
            $recipe = " "; 
            foreach ($rows as $row) {
                
                $recipe .= "<div class=directions>";
                $recipe .= "<p> $row[preheat_temp]"; 
                $recipe .= "<p> $row[cook_time]"; 
                $recipe .=  "$row[instructions]"; 
                $recipe .= '</div>';
            }
            return $recipe;
            echo "<pre>"; 
            print_r($recipe); 
            echo "<pre>"; 
        }

        ?>


        include '../recipe/view/display.php';
        break;


    case 'display':
        //echo "This is the display case statement"; 
        $recipe_id = filter_input(INPUT_GET, 'recipe_index_id', FILTER_SANITIZE_NUMBER_INT);
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        //echo $category_id; 







        include '../recipe/view/home.php';
        break;

    case 'default':




        include '../recipe/view/home.php';
        break;
}
?>