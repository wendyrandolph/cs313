<?php 
// This is my main controller 
  session_start(); 


    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}



//grab php functions as needed *****************************************************

include ' ../../library/connections.php'; 
include ' ../../library/functions.php'; 
include ' ../../models/main_model.php'; 


// Get the array of classifications
$categories = getCategories();
$_SESSION['categories'] = $categories; 

//Get the navigation 
//$getnavigation = navigation($categories);



switch ($action) {
  case ' ':
      break;
  
 default: 





 echo "This is the default case statement"; 
   include ' ../../view/home.php';
      break;
}
