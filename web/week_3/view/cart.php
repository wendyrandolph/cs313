<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>View Cart</title>

  <link rel="stylesheet" type="text/css" href="/web/css/styles.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="/web/css/nav.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="/web/css/week_3.css" media="screen" />

</head>

<body>

  <header class="header">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/header.php'; ?>
    <nav>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/nav.php'; ?>
    </nav>
  </header>
  <div class="page-title">
    <h2> Shopping Cart </h2>
    <nav class="cart">
      <ul>
        <li><a href='/web/week_3/index.php'>Home</a></li>
        <li><a href='/web/week_3/index.php?action=viewCart'>View Cart</a></li>
        <li><a href='..//index.php?action=clearCart&clear=1'>Clear Cart</a></li>
        <input type="hidden" name="clear" value="1">
        <ul>
    </nav>
  </div>

  <div>
    <?php if (isset($_SESSION['message_clear'])) {
      echo $_SESSION['message_clear'];
    } ?>
  </div>
  <main class="browse">

    <div class="display">


      <table>
        <tr>
          <th> Item </th>
          <th> Quantity </th>
          <th> Price </th>
          <th> Subtotal </th>
        </tr>


      

    
      


<?php
if(isset($title)){
   echo $title; 
 
} 

?>  



      </table>
      <div class="checkout">
        <a href='../../week_3/index.php'>Check Out</a>
      </div>
  </main>
  <footer>
    <div class="footer">
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/web/snippets/footer.php'; ?>
    </div>
  </footer>


</script type="text/javascript" src="../js/cart.js"> </script> 
</body>
<?php unset($_SESSION['message_clear']); ?>

</html>