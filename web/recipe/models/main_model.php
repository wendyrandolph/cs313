<?php

//THIS IS THE MAIN MODEL 

function getCategories($category_name)
{
    // Create a connection object from the phpmotors connection function
 
    // The SQL statement to be used with the database 
    $db =   include '../library/connections.php'; 
    $stmt = $db->prepare('SELECT category_name  FROM category; ');
    

    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // The next line runs the prepared statement 
   
    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    //$categories = $stmt->fetchAll();
    // The next line closes the interaction with the database 
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 




    return  $rows;
}
?>