<?php 


  
    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

  // Get the database connection file
  include '../library/connections.php';
  include '../models/main_model.php'; 

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
