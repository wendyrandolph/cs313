
<?php 

function navigation($categories)
{
    // Get the array of classifications
    $categories = getCategories();
    //var_dump($classifications);
    //exit;

    // Build a navigation bar using the $classifications array
    $navList = '<ul>';
    $navList .= "<li><a href='index.php' title='View the Recipes Home Page'>Home</a></li>";
    foreach ($categories as $classification) {
        $navList .= "<li><a href='../index.php?action=categories&category_name=" . urlencode($classification['category_name']); 
        }
    $navList .= '</ul>';
    return $navList;
    echo $navList;
    exit;
}
?> 