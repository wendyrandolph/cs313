<?php 


  
    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************

require '../recipe_proj/library/connections.php'; 
require '../recipe_proj/library/functions.php'; 
require '../recipe_proj/models/main_model.php'; 


// Get the array of classifications
$categories = getCategories();
//Get the navigation 
$getnavigation = navigation($categories);



switch ($action) {
  case ' ':
      break;
  
 default: 

 echo "This is the default case statement"; 
   include '../recipe_proj/index.php';
      break;
}

?>
