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
           <?php echo $getNavigation; 
            ?>
        </nav>

    <main>




        <div class="card">
            <div class="card-body">

                
                <?php
                if (isset($results)) {
        echo "<h5> These are the $_SESSION[category_name] recipes.</h5>";
                  
                    echo $results;
                }?> 
            </div>
        </div>

    </main>

</body>

</html>