<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />

    <title>Landing Page</title>
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
            <h3> Click on a category above <br>to view the available recipes. </h3>



            <div id="register_2">
                <h2 id=register_1>Register for an account</h2>
                <!-- div  is for styling purposes only -->
                <p> *Note all fields are required </p>
                <?php
                if (isset($message)) {
                    echo $message;
                }

              
                ?>


                <form action="/recipe/" method="post">
                    <label>First Name:</label><br>
                    <input type="text" name="member_first_name" class="input" id="member_first_name" <?php if (isset($member_first_name)) {
                                                                                                            echo "value='$member_first_name'";
                                                                                                        }  ?> required><br><br>
                    <label>Last name:</label><br>
                    <input type="text" class="input" name="member_last_name" <?php if (isset($member_last_name)) {
                                                                                    echo "value='$member_last_name'";
                                                                                } ?> required><br><br>
                    <label>Email:</label><br>
                    <input type="email" class="input" name="member_email" <?php if (isset($member_email)) {
                                                                                echo "value='$member_email'";
                                                                            } ?> required><br><br>
                    <span> The password needs to be 8 characters long, contain at least 1 uppercase character, 1 number and 1 special character</span> <br>
                    <label>Password:</label><br>
                    <input type="password" class="input" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                    <input type="submit" value="Register" class="register"><br><br>
                    <!--Add the action name - value pair -->
                    <input type="hidden" name="action" value="register">



                </form>


            </div>

        </div>

    </main>




</body>

</html>