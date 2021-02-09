<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE FORM</title>
</head>

<body>
    <fieldset>
        <form method=POST action='../week_6/index.php/?action=update'>

            <label for="name" required>Book</label>
            <input type="text" name="book" id="book"><br>

            <label for="email" required>Chapter</label>
            <input type="email" name="chapter" id="chapter"><br><br><br>

            <label for="name" required>Verse</label>
            <input type="text" name="verse" id="verse"><br>

            <label for="content" required>Content</label>
            <input type="textarea" name="content" id="content"><br><br><br>

            <label for="topics" required>Topic</label><br>
                <?php if(isset($results)){ 
                    echo $results; 
                } ?> 

            <input type="submit" name="Add Scripture" />
            <input type = "hidden" name="action" value="insert"> 
            <input type="hidden" name="id" value="$id">
    </fieldset>
</body>

</html>