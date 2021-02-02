
<?php 

function navigation($categories)
{
    // Get the array of classifications
    $categories = getCategories();
   
    //exit;

    // Build a navigation bar using the $classifications array
    $navList = '<ul>';
    $navList .= "<li><a href='index.php' title='View the Recipes Home Page'>Home</a></li>";
    foreach ($categories as $classification) {
        $navList .= "<li><a href='../index.php?action=categories&category_name=" . urlencode($classification['category_name']) . "' title='View our $classification[category_name] product line'>$classification[category_name]</a></li>"; 
        }
    $navList .= '</ul>';
    return $navList;
    echo $navList;
    exit;
}

//Build the display for viewing a recipe.  
function buildRecipeDisplay()
{

    $md = '<div id="v-display" >';
    foreach ($carInfo as $carsInfo) {
        $md = "<img class='img' src='$carsInfo[imgPath]'  alt='Image of $carsInfo[invMake] $carsInfo[invModel] on phpmotors.com'>";
        $invPrice = number_format($carsInfo['invPrice'], 2);
        $md .= '<ul class="display">';
        $md .= '<li>';
        $md .= "<h2 id='make'>$carsInfo[invMake] $carsInfo[invModel]</h2><br>";
        $md .= "<h2 class='price '> Price: </h2>";
        $md .= "<span>$$invPrice</span>";
        $md .= '<div class="details_1">';
        $md .= '<hr>';
        $md .= '<h4> Description: </h4>';
        $md .= "<span>$carsInfo[invDescription]</span>";
        $md .= '<hr>';
        $md .= '<h4> Number in stock: </h4>';
        $md .= "<span>$carsInfo[invStock]</span>";
        $md .= '<hr>';
        $md .= '<h4> Color: </h4>';
        $md .= "<span>$carsInfo[invColor]</span>";
        $md .= '</div>';
        $md .= '</li>';
    }
    $md .= '</ul>';
    $md .= '</div>';

    return $md;
}




?> 