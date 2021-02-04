<?php
// Create or access a Session
//session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require ('../recipe/library/connections.php');
//require ('../recipe/library/functions.php');
require ('../recipe/library/main_model.php');


//$rows = getList($db); 

//$navList = getNavigation(); 




switch($action){ 


case 'display': 

    $category_Id = filter_input(INPUT_GET, 'category_Id', FILTER_SANITIZE_NUMBER_INT);

   
    function details($category_id, $db)
    {
     $stmt = $db->prepare('SELECT recipe_name, recipe_id, category_id FROM ingredients WHERE category_id=:id');
     $stmt->bindValue(':id', $category_id, PDO::PARAM_INT);
     $stmt->execute();
     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

     var_dump($rows); 
      foreach($rows AS $row)
      {
     $row['recipe_name'] . '<br><br>';
        var_dump($row); 
    }
      $list = $row['recipe_name']; 
        return $list; 
    
    }

    include '../recipe/view/home.php';     
break; 


case 'default': 

    
 

    include '../recipe/view/home.php'; 
    break; 
}
?>