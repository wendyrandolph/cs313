
<?php 

function navigation($categories)
{
    // Get the array of classifications
    $categories = getCategories();
    var_dump($categories);
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
?> 