<?php

//Where to keep the query functions 

function getNavigation()
{
    $db = myDbConnect();
    
        $navList = '<ul>';

        foreach ($db->query('SELECT * FROM category') as $row) {

            $navList .= "<li><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
        }
        $navList .= '</ul>';
    } return $navList; 

