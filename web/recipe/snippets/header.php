 <?php 


if ($_SESSION['loggedin'] === TRUE) {

    //have logged in
    $loginMessage =  '<a id="my_account" href="/recipe/?action=logout"> Logout </a>';
    echo $loginMessage; 
    echo  '<h1 class="welcome_message">' . " Welcome " . $_SESSION['clientData']['member_first_name']. '</h1> ';
} else {
    $_SESSION['loggedin'] = false;
    $loginMessage =   '<a id="my_account" href="/recipe/?action=login"> My Account </a>';
    echo $loginMessage; 
}
?> 

<h1> Family Recipes </h1>
    

          

  