<?php

function getCategoryList($category_Id)
{
  $db = myDbConnect();
  $sql = 'SELECT i.recipe_name, i.recipe_id, c.category_id, i.category_id FROM ingredients i 
   JOIN category c ON i.category_id = c.category_id 
   WHERE i.category_id = $category_id;   
   ORDER BY i.recipe_name'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':i.category_Id', $category_id, PDO::PARAM_STR);
  $stmt->execute();
  $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $vehicles;
}

?>