<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../recipe/css/recipe.css" media="screen" />


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
        <?php if(isset($_SESSION['message'])){ 
                    echo $_SESSION['message']; 
                }
?> 
            <form action="/recipe/?action=Login" method="post">
                <legend>
                    <h2 id="login_1">Login to your account</h2>
                </legend>
                <fieldset>
                    <label>Email Address:</label><br>
                    <input type="email" class="input" name="member_email" <?php if (isset($member_email)) {
                                                                                echo "value='$member_email'";
                                                                            }  ?> required><br><br>

                    <span> The password needs to be 8 characters long, contain at least 1 uppercase character, 1 number and 1 special character</span> <br>
                    <label>Password:</label><br>
                    <input type="password" class="input" name="member_password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                    <input type="submit" name="submit" value="Sign In" id="submit"> <br> <br>
                    <input type="hidden" name="action" value="Login">
                    <br>
                    <p class="create"> If this is your first time visiting, please create a new account. </p>
                    <a class="register" href="../recipe/?action=registration"> Register </a>
                </fieldset>
            </form>


        </div>

    </main>



</body>

</html>