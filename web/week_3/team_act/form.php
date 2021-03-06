<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Week 3 Team Activity</title>
  
  <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>  
  <link rel="stylesheet" type="text/css" href="/css/nav.css" media="screen" />

</head>

<body>

<header id="page_header"> 
<?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/header.php'; ?>
<nav> 
<?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/nav.php'; ?>
</nav>
</header>

<main> 
  <p>Name: <?php echo $_POST["name"]; ?></p>
  <p>Email: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo$_POST["email"]; ?></a></p>
  <p>Major: <?php echo $_POST["major"]; ?></p>
  <p>Comments: <?php echo $_POST["comments"]; ?></p>
  <p><u>Continents Visited</u><br>

    <?php echo "<ul>"; 

    foreach($_POST["continents"] as $selected)
  {
    $abr = ['North America', 'South America', 'Europe', 'Asia', 'Australia', 'Africa', 'Antarctica'];
    $name[] = $selected;
    if ($selected == 'na') {
      echo "<li class='bullets'>".$abr[0]."</li>";
    } elseif ($selected == 'sa') {
      echo "<li class='bullets'>".$abr[1]."</li>";
    } elseif ($selected == 'e') {
      echo "<li class='bullets'>".$abr[2]."</li>";
    } elseif ($selected == 'as') {
      echo "<li class='bullets'>".$abr[3]."</li>";
    } elseif ($selected == 'au') {
      echo "<li class='bullets'>".$abr[4]."</li>";
    } elseif ($selected == 'af') {
      echo "<li class='bullets'>".$abr[5]."</li>";
    } elseif ($selected == 'an') {
      echo "<li class='bullets'>".$abr[6]."</li>";
    }
  } 

    echo "</ul>"; ?>
  </p>
</main>
<footer> 
<div class="footer"> 
<?php require $_SERVER['DOCUMENT_ROOT'] . '/snippets/footer.php'; ?>
</div> 
</footer>
</body>

</html>