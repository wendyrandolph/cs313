<?php
// Create or access a Session
//session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require ('../recipe/library/connections.php');
//require ('../recipe/library/functions.php');
//require ('../recipe/library/main_model.php');


//$rows = getList($db); 

//$navList = getNavigation(); 




switch($action){ 


case 'display': 

    include '../recipe/view/display.php';     
break; 


case 'default': 


    include '../recipe/view/home.php'; 
    break; 
}
?>