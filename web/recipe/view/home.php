<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>

        <?php include '../recipe/snippets/header.php';
        ?>


    </header>
    <nav class="navbar navbar-expand-lg navbar=light bg-light" id="page_nav">
        <?php include '../recipe/snippets/nav.php';
        ?>
    </nav>

    <main>




        <div class="card">
            <div class="card-body">


                <?php
                if (!isset($results)) {
                    echo " <div class=mx-auto>";
                    echo "<h5> Welcome to your collection of Family Recipe Favorites. Click on a category above to view existing recipes, or login to add new recipes, and delete those you don't love anymore. </h5>";
                    echo  "<img src='../recipe/images/naan pizza.jpg' class='rounded .img-thumbnail'>";
                    echo "<img src='../recipe/images/rsz_salsa.jpg' class='rounded .img-thumbnail'>";
                    echo "<img src='../recipe/images/rsz_idaho_burrito.jpg' class='rounded .img-thumbnail'>";
                    echo "</div>";
                } else { ?>
                    <h5> These are the <?php $category_name ?> recipes.</h5>
                <?php echo $results;
                } ?>





            </div>

    </main>

</body>

</html>