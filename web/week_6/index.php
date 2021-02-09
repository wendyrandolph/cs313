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


        $results = details($id, $db);

        include '../week_6/view/details.php';
        break;

    default:
       
    if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
        foreach ($db->query('SELECT id, book, chapter, verse, content FROM Scriptures') as $row) {
            echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br><br>';
        } 
    } else {
       $details = searchBook($text, $db);
    }

       

        include '../week_6/view/scriptures.php';
        break;
}

?>