<?php

//Where to keep the query functions 


function getList()
{
    //make a connection to the database
    $db = myDbConnect();
    // The SQL sttaement to be used with the database
   // $sql = 'SELECT category_name, category_id FROM category';
    // The next line creates the prepared statement using the phpmotors connection      
    $stmt = $db->query('SELECT category_name, category_id FROM category');
    // The next line runs the prepared statement 
    $stmt->execute();
    // The next line gets the data from the database and 
    // stores it as an array in the $classifications variable 
    $categories = $stmt->fetchAll();
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 


    return $categories;
    var_dump ($categories);  
}
?>