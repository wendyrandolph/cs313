<?php
// This is my main controller 
session_start();


//grab php functions as needed *****************************************************

require ' ../../library/connections.php';




$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}




switch ($action) {
    case ' ':
        break;

    default:


        include ' ../../view/home.php';
        break;
}
