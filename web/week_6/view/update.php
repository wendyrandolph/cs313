<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE FORM</title>
</head>

<body>
    <fieldset>
        <form method=POST action='../index.php/?action=update'>

            <label for="name">Book</label>
            <input type="text" name="book" id="book"><br>

            <label for="email">Chapter</label>
            <input type="email" name="chapter" id="chapter"><br><br><br>

            <label for="name">Verse</label>
            <input type="text" name="verse" id="verse"><br>

            <label for="email">Content</label>
            <input type="textarea" name="content" id="content"><br><br><br>

            <label for="topics">Topic</label><br>

            <input type="checkbox" name="topic" value="<?php echo $results ?>"><br>

            <input type="submit" name="submit" />
    </fieldset>
</body>

</html>