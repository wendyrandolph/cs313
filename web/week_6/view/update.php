<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE FORM</title>
</head>

<body>
  
            <?php if(isset($SESSION['message'])){ 
                echo $_SESSION['message']; 
            } ?> 
<fieldset>
        <form method=POST action='../week_6/index.php/'>

            <label for="book" required>Book</label>
            <input type="text" name="book" id="book"><br>

            <label for="chapter" required>Chapter</label>
            <input type="text" name="chapter" id="chapter"><br><br><br>

            <label for="verse" required>Verse</label>
            <input type="text" name="verse" id="verse"><br>

            <label for="content" required>Content</label>
            <input type="textarea" name="content" id="content"><br><br><br>

            <label for="topics" required>Topic</label><br>
                <?php if(isset($results)){ 
                    echo $results; 
                } ?> 
            <input type="hidden" name="id" value="$results['id']">;
            <input type="submit" name="Add Scripture" />
            <input type = "hidden" name="action" value="insert"> 
            <input type="hidden" name="id" value="$id">
    </fieldset>
</body>

</html>