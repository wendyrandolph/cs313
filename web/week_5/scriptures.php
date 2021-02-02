<?php

$text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $text = $_POST['text'];
}



try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
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

  <form method='post' action=" <?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> ">
    <label for="text">Search: </label>
    <input type="text" id="text" name="text">
  </form>


  <?php 
if ($_SERVER["REQUEST_METHOD"] == "GET" AND $text == "")
{
   foreach($db->query('SELECT book, chapter, verse, content FROM Scriptures') AS $row)
  {
    echo '<b>'.$row['book'].' '.$row['chapter'].':'.$row['verse'].'</b> - "'.$row['content'].'"<br><br>';
  }
} else
{
  searchBook($text, $db);
}

 function searchBook($text, $db)
{
  $stmt = $db->prepare('SELECT * FROM Scriptures WHERE book=:text');
 $stmt->bindValue(':text', $text, PDO::PARAM_STR);
 $stmt->execute();
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows AS $row)
  {
    echo '<a href="details.php?><b>'.$row['book'].' '.$row['chapter'].':'.$row['verse'].'</b></a>' - 
    '<input type="hidden" name="id" value="' . $row['id'] . '"> <br><br>';  }

}

  ?>
</body>

</html>