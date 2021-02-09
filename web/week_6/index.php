<?php
// This is the controller 


//know which case statement to access 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
require('../week_6/connection.php'); 
require('../week_6/functions.php');

$list = searchBook($text, $db);


switch ($action) {

    case 'details':

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
        }

        $results = details($id, $db);

        include '../week_6/view/details.php';
        break;

    default:
       
        
       

        include '../week_6/view/scriptures.php';
        break;
}

?>