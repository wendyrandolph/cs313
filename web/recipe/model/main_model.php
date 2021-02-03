<?php

function getNavigation($categories)
{

    $navList = '<ul>';
    $navList .= "<li><a href='../recipe/index.php' title='View the Recipes home page'>Home</a></li><br><br>";
    foreach ($categories as $row) {
        $navList .= '<li>' . '<a href="../view/display.php?category_id=$row[category_id]">' . ' ' . $row['category_name'] . ' ' . '</a>' . '</li>' . '<br><br> ;
                    $navList .=  <input type="hidden" name="category_id" value="' . $row['category_id'] . '"' > '';
    }
    $navList .= '</ul>';
    return $navList;
}
