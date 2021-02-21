<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />

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
        
    <div class="card">
            <div class="card-body">
          

            <?php
            if (isset($_SESSION['message_1'])) {
                echo  $_SESSION['message_1'];
            }
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }

            if (isset($message)) {
                echo $message;
            }
            ?>


            <h3>
                <?php
                if ($_SESSION['loggedin']) {
                    echo '<p class="login"> You are now logged in. </p>';
                } ?>
            </h3>


            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['member_first_name'] ?></li>
                <li>Last Name: <?php echo $_SESSION['clientData']['member_last_name'] ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['member_email'] ?></li>
            </ul>

            <h4> Account Management</h4>
            <?php
            if ($_SESSION['loggedin'] == TRUE) {

                echo '<p class="vehicles">Use this link to add a recipe to your collection.</p>';
                //echo '<p class="vehicles"><a  href="/recipe/view/recipe_update.php" class="vehicles">Update Account</a></p>';
                echo '<p class="vehicles"><a href="/recipe/?action=add" class="vehicles">Add a Recipe</a></p>'; 
                echo '<p class="vehicles"><a href="/recipe/?action=update_recipe" > Update Recipes</p>'; 
            }
            ?>

            
           



            </div>  


        </div>

    </main>

</body>

</html>
<?php unset($_SESSION['message']); ?>
<?php unset($_SESSION['message_1']); ?>
<?php unset($_SESSION['message_delete']); ?>