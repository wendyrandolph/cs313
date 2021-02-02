<?php

//THIS IS THE MAIN MODEL 

function getCategories()
{
    // Create a connection object from the phpmotors connection function
    $db = myDbConnect();
   
    // The next line creates the prepared statement using the phpmotors connection      
    $stmt = $db->prepare('SELECT category_name FROM category ORDER BY category_name ASC'); 
    // The next line runs the prepared statement 
    $stmt->execute();
    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    $categories = $stmt->fetchAll();
    // The next line closes the interaction with the database 
    $stmt->closeCursor();
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    
 


    return  $categories; 
    
}
?>