<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>
        

            <h1> THIS IS THE BEGINNING </h1>
            <nav class="nav">
           
<?php 
            if ($_SERVER["REQUEST_METHOD"] == "GET" )
    {
       foreach($db->query('SELECT category_name FROM category') AS $row)
      {
        echo '<b>'.$row['categpry_name'].' '.$row['id'].'"<br><br>';
      }
    } ?>
        </nav>

    </header>
    <main>

    </main>

</body>

</html>