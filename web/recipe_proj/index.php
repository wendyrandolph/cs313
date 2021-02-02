<?php 
session_start(); 

  
    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

  // Get the database connection file
  require_once 'library/connections.php';
  require 'models/main_model.php'; 

// Get the array of classifications
$classifications = getCategories();
//Get the navigation 
$getnavigation = navigation($categories);



switch ($action) {
  case ' ':
      break;
  
 default: 
   include 'home.php';
      break;
}
