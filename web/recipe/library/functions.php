<?php 

function getList(){ 
                $db = myDbConnect(); 

                $navList = '<ul>';
                $navList .= "<li><a href='../recipe/home.php' title='View the Recipes Home Page'>Home</a></li>";
                foreach ($db->query('SELECT category_name, category_id FROM category') as $row) {
                $navList .= "<li><a href='../index.php?action=categories&category_name=" . urlencode($row['category_name']) . "' title='View our $row[category_name] product line'>$row[category_name]</a></li>";

                $navList .= '</ul>';
                
            }
        } return $navList; 

    
?>