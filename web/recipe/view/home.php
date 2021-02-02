
<?php
require_once '../library/connections.php'; 
include '../library/functions.php'; 
include '../models/main_model.php'; 
// Get the array of classifications
$categories = getCategories();
//Get the navigation 
$getnavigation = navigation($categories);
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIPE PROJECT</title>
</head>

<body>
    <header>
        <nav>
            <?php $getnavigation;  ?>
        </nav>
        <h1> THIS IS THE BEGINNING </h1>
    </header>
    <main>

    </main>

</body>

</html>