<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index_id = $_POST['index_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <h1> THIS IS THE BEGINNING </h1>
        <nav class="nav">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
                $navList = '<ul>';

                foreach ($db->query('SELECT * FROM category') as $row) {

                    $navList .= "<li><a href='/recipe/?action=display&category_id=$row[category_id]&category_name=" . urlencode($row['category_name']) . "' title='View our $row[category_name] recipes'>$row[category_name]</a></li>";
                }
                $navList .= '</ul>';
            }
            echo $navList;

            ?>

        </nav>

    </header>
    <main>
        <?php

        details($index_id, $db);


        function details($index_id, $db)
        {
            $stmt = $db->prepare('SELECT recipe_name, recipe, directions FROM ingredients WHERE index_id=:index_id');
            $stmt->bindValue(':index_id', $index_id, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $buildView = '<div>'; 
                $buildView .= "<h3> $row[recipe_name] </h3>"; 
                $buildView .=  $row['recipe'] .'<br><br>';  
                $buildView .= '<div class=directions>' ;
                $buildView .=  $row['directions']; 
                $buildView .= '</div>';
            } echo $buildView; 
        }

        ?>

    </main>

</body>

</html>