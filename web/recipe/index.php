<?php
//This is the main controller 

// Create or access a Session
session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require('../recipe/library/connections.php');
require('../recipe/library/functions.php');
//require('../recipe/accounts/index.php'); 
//require ('../recipe/library/main_model.php');




switch ($action) {

    case 'viewRecipe':
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING);


        $name = getName($db, $recipe_id);

        $amount = getIngredients($db, $recipe_id);
        $recipe = directions($recipe_id, $db);


        include '../recipe/view/display.php';
        break;


    case 'display':
        //echo "This is the display case statement"; 
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING);
        //echo $category_id; 

        $results = displayCategory($db, $category_id);



        include '../recipe/view/home.php';
        break;

    case 'add_recipe':




        include '../recipe/view/add_recipe.php';
        break;


        case 'registration':
        

           include '../recipe/view/registration.php'; 
           break;  
    default:

        include '../recipe/view/login.php';
        break;
}
