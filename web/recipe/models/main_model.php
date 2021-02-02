<?php

//THIS IS THE MAIN MODEL 

function getCategories()
{
    
    // Create a connection object from the phpmotors connection function
    $db = myDbConnect();
    // The next line creates the prepared statement using the phpmotors connection      
    
    $stmt = $db->prepare('SELECT * FROM category');
//$stmt->execute(array(':name' => $name, ':id' => $id));
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // The next line closes the interaction with the database 
    $stmt->closeCursor();
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    
 


    return  $categories; 
    
}
