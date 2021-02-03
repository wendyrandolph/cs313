<?php
// Create or access a Session
session_start();


//Create the cart with the start of the session if it's not already created. 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
} //WORKS CORRECTLY 


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require ('../recipe/library/connections.php');
require ('../recipe/library/functions.php');
require ('../recipe/model/main_model.php');

$db = myDbConnect(); 
//$categories = getList($db); 

$navList = getNavigation($categories); 




switch($action){ 


case 'display': 

    include '../recipe/view/display.php';     
break; 


case 'default': 


    include '../recipe/view/home.php'; 
    break; 
}
?>