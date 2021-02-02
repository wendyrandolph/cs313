<?php 



$app->get('/db/', function() use($app) {
    $st = $app['pdo']->prepare('SELECT name FROM test_table');
    $st->execute();
  
    $names = array();
    while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
      $app['monolog']->addDebug('Row ' . $row['name']);
      $names[] = $row;
    }
  
    return $app['twig']->render('database.twig', array(
      'names' => $names
    ));
  });


session_start(); 
  
    $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}



//grab php functions as needed *****************************************************

require ' library/connections.php'; 
//include '../library/functions.php'; 
//include '../models/main_model.php'; 


// Get the array of classifications
//$categories = getCategories($category_name);
//Get the navigation 
//$getnavigation = navigation($categories);



switch ($action) {
  case ' ':
      break;
  
 default: 

 echo "This is the default case statement"; 
   include ' view/home.php';
      break;
}
