<?php 
// This is my main controller 
  session_start(); 


    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}



//grab php functions as needed *****************************************************

require ' ../../library/connections.php'; 
 
require ' ../../models/main_model.php'; 
require ' ../../library/functions.php';


// Get the array of classifications
$categories = getCategories();


//Get the navigation 
$getnavigation = navigation($categories);



switch ($action) {
  case ' ':
      break;
  
 default: 


   include ' ../../view/home.php';
      break;
}
