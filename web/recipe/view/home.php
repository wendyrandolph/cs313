
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIPE PROJECT</title>
</head>
<?php 

foreach ($db->query('SELECT username, password FROM author') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}
?>

<body>
    <header>
        <nav>
            <?php $getnavigation;  ?>
        </nav>
        <h1> THIS IS THE BEGINNING </h1>
    </header>
    <main>

    </main>

</body>

</html>