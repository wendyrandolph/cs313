<?php 

if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
                

                $navList = '<ul>';
                $navList .= "<li><a href='../recipe/home.php' title='View the Recipes Home Page'>Home</a></li>";
                foreach ($db->query('SELECT category_name, category_id FROM category') as $row) {
                $navList .= "<li><a href='../index.php?action=categories&category_name=" . urlencode($row['category_name']) . "' title='View our $row[category_name] product line'>$row[category_name]</a></li>";

                $navList .= '</ul>';
                
            }


            $md = '<div id="v-display" >';
            foreach ($db->query('SELECT recipe_name, recipe_id') as $recipe) {
               // $md = "<img class='img' src='$carsInfo[imgPath]'  alt='Image of $carsInfo[invMake] $carsInfo[invModel] on phpmotors.com'>";
                $invPrice = number_format($carsInfo['invPrice'], 2);
                $md .= '<ul class="display">';
                $md .= '<li>';
                $md .= "<h2 id='make'>$recipe[recipe_name] </h2><br>";
                $md .= "<h2 class='price '> Price: </h2>";
             
                $md .= '</div>';
                $md .= '</li>';
            }
            $md .= '</ul>';
            $md .= '</div>';
        
            ?> 