<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />

    <title>Add a Recipe</title>
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

        <div class='edit'>

            <?php


            if (isset($display)) {
                $list =  '<ul>';
                foreach ($display as $display) {
                    $list .= "<li class=edit> $display </li> ";
                    // $list .= "<a href='/recipe/index.php?action=update_recipe&recipe_id=$recipe_id' class='rev_delete info'>Delete</a>";
                    $list .= '</ul>';
                }
            } ?>

            <?php echo $list ?>
        </div>
    </main>

</body>

</html>