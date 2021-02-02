<?php

//THIS IS THE MAIN MODEL 

function getCategories()
{

    // Create a connection object from the phpmotors connection function
    $db = myDbConnect();
    // The next line creates the prepared statement using the phpmotors connection      

    if ($_SERVER["REQUEST_METHOD"] == "GET" )
    {
       foreach($db->query('SELECT category_name FROM category') AS $row)
      {
        echo '<b>'.$row['categpry_name'].' '.$row['id'].'"<br><br>';
      }
    }



    return  $row; 
}
?>
