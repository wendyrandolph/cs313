<?php

//THIS IS THE MAIN MODEL 

function getCategories($category_name)
{
    // Create a connection object from the phpmotors connection function
    $db = myDbConnect();
    // The SQL statement to be used with the database 

    $stmt = $db->prepare('SELECT category_name  FROM category ORDER BY category_name ASC');
    $stmt->bindValue(':category_name', $category_name, PDO::PARAM_INT);

    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // The next line runs the prepared statement 
   
    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    //$categories = $stmt->fetchAll();
    // The next line closes the interaction with the database 
    $stmt->closeCursor();
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 




    return  $rows;
}
?>