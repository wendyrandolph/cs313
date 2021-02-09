<?php
// This is the controller 
session_start(); 

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

    case 'update':

        $results =  checkboxes($db);


        include '../week_6/view/update.php';
        break;

    case 'insert':
        $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
        $chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_STRING);
        $verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_STRING);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        $topic = filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        //check for empty fields
        if (empty($book) || empty($chapter) || empty($verse) || empty($content) || empty($topic) || empty($invStock) || empty($invPrice) || empty($invColor) || empty($classificationId)) {
            $message = "<p class='notice'>Please provide information for all empty form fields.</p>";
        }
         //Send the data to the model 
        $insertScripture = addScripture($db, $book, $chapter, $verse, $content, $topic, $id); 

        if ($insertScripture) {
            if ($insertScripture) {
                $message = "<p class='notify'>Congratulations, $book $chapter $verse was successfully updated.</p>";
                $_SESSION['message'] = $message;
                header('location ../week_6/view/update.php');
                exit;
            }
        } else {
            $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
            include '../week_6/view/update.php';
            exit;
        }
   
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
