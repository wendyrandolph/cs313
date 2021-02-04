<?php
// Create or access a Session
//session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require ('/library/connections.php');
//require ('../recipe/library/functions.php');
require ('/library/main_model.php');


//$rows = getList($db); 

$navList = getNavigation(); 




switch($action){ 


case 'display': 
//echo "This is the display case statement"; 

    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        //echo $category_id; 

    include '../recipe/view/home.php';     
break; 

case 'viewRecipe': 
echo "This is the viewRecipe case statement"; 


$index_id = filter_input(INPUT_GET, 'index_id', FILTER_SANITIZE_NUMBER_INT);
$recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING); 



    include '../recipe/view/display.php'; 
    break; 

case 'default': 

    
 

    include '../recipe/view/home.php'; 
    break; 
}
?>