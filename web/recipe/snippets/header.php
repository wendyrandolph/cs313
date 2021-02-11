<h1> Family Recipes </h1>
    

          
<?php 


if ($_SESSION['loggedin'] === TRUE) {

    //have logged in
    $loginMessage =  '<a id="my_account" href="/recipe/index.php/?action=logout"> Logout </a>';
    echo $loginMessage; 
    echo  '<a id="welcome" href="/phpmotors/accounts/">' . '<h1 class="welcome_message">' . " Welcome " . $_SESSION['clientData']['clientFirstname']. '</h1> </a>';
} else {
    $_SESSION['loggedin'] = false;
    $loginMessage =   '<a id="my_account" href="/recipe/index.php/?action=login"> My Account </a>';
    echo $loginMessage; 
}
?>
  