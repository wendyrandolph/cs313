<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CheckOut</title>
  <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen"  >
  <link rel="stylesheet" type="text/css" href="../css/nav.css" media="screen"  >
  <link rel="stylesheet" type="text/css" href="../css/week_3.css" media="screen" />
</head>
</head>

<body>
<header class="header">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/header.php'; ?>
    <nav>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/nav.php'; ?>
    </nav>
  </header>

    <main class="browse">
  <form action="/web/week_3/view/confirm.php" method="POST">
    <label for="lastName">First Name:</label>
    <input type="text" name="firstName" id="firstName"><br>
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName"><br>
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email"><br>
    <label for="address">Mailing Address:</label>
    <input type="text" name="address" id="address"><br>

    <p>Invoice</p>


    
    <input type="submit" value="Confirm">
    <input type="hidden" name="action" value="confirm"> 
  </form>
</main> 
  <footer> 
  <div class="footer"> 
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/footer.php'; ?>
</div> 
  </footer>
</body>

</html>



    </form>
</body>
<script type="text/javascript" src="../js/cart.js"></script> 
</html>