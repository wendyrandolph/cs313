<?php


$text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scripture Resources</title>
</head>

<body>
    <h1>Scripture Resources</h1>

    <form method='post' action='../week_6/index.php/?action=details' ?> ">
        <label for="text">Search: </label>
        <input type="text" id="text" name="text">
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" and $text == "") {
        listScriptures($db);
        echo $scripture_list;
    } else {
        echo $list;
    }



    ?>
</body>

</html>