<?php 

  
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
//Get the navigation 
//$getnavigation = navigation($categories);


foreach ($db->query('SELECT category_name FROM category') as $row)
{
  echo $row; 
}


switch ($action) {
  case ' ':
      break;
  
 default: 





 //echo "This is the default case statement"; 
   include ' ../../view/home.php';
      break;
}
