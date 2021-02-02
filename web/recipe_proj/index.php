<?php 
session_start(); 

  
    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

  // Get the database connection file
  require_once '../recipe_proj/library/connections.php';
  require '../recipe_proj/models/main_model.php'; 

// Get the array of classifications
$classifications = getCategories();
//Get the navigation 
$getnavigation = navigation($categories);



switch ($action) {
  case ' ':
      break;
  
 default: 
   include '../recipe_proj/home.php';
      break;
}



?> 