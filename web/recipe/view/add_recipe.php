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
            <?php echo $navList; 
            ?>
        </nav>
    </header>

    <main>


        <ul>
            <li>First Name: <?php echo $_SESSION['clientData']['member_first_name'] ?></li>
            <li>Last Name: <?php echo $_SESSION['clientData']['member_last_name'] ?></li>
            <li>Email: <?php echo $_SESSION['clientData']['member_email'] ?></li>
        </ul>


        <form action="/recipe/index.php" method="post">
                <label>Which classification does it belong to : </label><br>
                <?php getCategories($db) ?> 
                <br>
                <label>Make:</label><br>
                <input type="text" class="input" name="invMake" required <?php if (isset($invMake)) {
                                                                                echo "value='$invMake'";
                                                                            } elseif (isset($invInfo['invMake'])) {
                                                                                echo "value='$invInfo[invMake]'";
                                                                            } ?>> <br> <br>
                <label>Model:</label><br>
                <input type="text" name="invModel" id="invModel" required <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?>> <br><br>
                <label>Description:</label><br><br>
                <textarea name="invDescription" id="invDescription" required> <?php if (isset($invDescription)) {
                                                                                    echo $invDescription;
                                                                                } elseif (isset($invInfo['invDescription'])) {
                                                                                    echo $invInfo['invDescription'];
                                                                                } ?></textarea><br><br>
                <label>Image Path:</label><br>
                <input type="text" class="input" name="invImage" required <?php if (isset($invImage)) {
                                                                                echo "value='$invImage'";
                                                                            } elseif (isset($invInfo['invImage'])) {
                                                                                echo "value='$invInfo[invImage]'";
                                                                            } ?>> <br> <br>
                <label>Thumbnail Path:</label><br>
                <input type="text" class="input" name="invThumbnail" required <?php if (isset($invThumbnail)) {
                                                                                    echo "value='$invThumbnail'";
                                                                                } elseif (isset($invInfo['invThumbnail'])) {
                                                                                    echo "value='$invInfo[invThumbnail] '";
                                                                                } ?>> <br> <br>
                <label>Price:</label><br>
                <input type="text" class="input" name="invPrice" required <?php if (isset($invPrice)) {
                                                                                echo "value='$invPrice'";
                                                                            } elseif (isset($invInfo['invPrice'])) {
                                                                                echo "value='$invInfo[invPrice]'";
                                                                            } ?>><br> <br>
                <label>Stock:</label><br>
                <input type="text" class="input" name="invStock" required <?php if (isset($invStock)) {
                                                                                echo "value='$invStock'";
                                                                            } elseif (isset($invInfo['invStock'])) {
                                                                                echo "value='$invInfo[invStock]'";
                                                                            } ?>>
                <label>Color:</label><br>
                <input type="text" class="input" name="invColor" required <?php if (isset($invColor)) {
                                                                                echo "value='$invColor'";
                                                                            } elseif (isset($invInfo['invColor'])) {
                                                                                echo "value='$invInfo[invColor]'";
                                                                            } ?>> <br> <br>
                <input type="submit" value="Update Vehicle" class="add_vehicle"><br><br>
                <!--Add the action name - value pair -->
                <input type="hidden" name="action" value="updateVehicle">
                <input type="hidden" name="invId" value="
                <?php if (isset($invInfo['invId'])) {
                    echo $invInfo['invId'];
                } elseif (isset($invId)) {
                    echo $invId;
                } ?>">




            </form>


    </main>
</body>

</html>