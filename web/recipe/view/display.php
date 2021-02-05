<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>RECIPE PROJECT</title>
</head>


<body>
    <header>


        <?php include '../recipe/snippets/header.php';
        ?>


        <nav class="navbar navbar-expand-lg navbar=light bg-light" id="page_nav">
            <?php include '../recipe/snippets/nav.php';
            ?>
        </nav>

    </header>
    <main>

        <div class="recipe">
            <?php echo $name ?><br><br>
            <div class="container">

                <div class="amounts">
                    <?php echo $amount ?> 
                </div>
                <div class="ingredients">

                </div>


            </div>
            <div class="steps">
                <?php echo $recipe ?>
            </div>

        </div>



    </main>

</body>

</html>