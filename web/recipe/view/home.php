<?php  

$db = myDbConnect(); 

?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <h1> Family Recipes </h1>
        <nav id="page_nav">

            <?php
             $navList = '<ul>';
             $navList .= "<li><a href='../recipe/index.php' title='View the Recipes home page'>Home</a></li><br><br>";
             foreach ($db->query('SELECT category_name, category_id FROM category') as $row) {
                 $navList .= '<li>' . '<a href="../view/display.php?category_id=$row[category_id]">' . ' ' . $row['category_name'] . ' ' . '</a>' . '</li>' . '<br><br> ;
                             $navList .=  <input type="hidden" name="category_id" value="' . $row['category_id'] . '"' > '';
             }
             $navList .= '</ul>';
             echo $navList;
                    
             ?>
        </nav>

    </header>
    <main>




    </main>

</body>

</html>

