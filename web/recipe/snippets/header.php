 
 
<h1> Family Recipes </h1>
    
 <?php 


if ($_SESSION['loggedin'] === TRUE) {
    $myAccount = '<a class"my_account" href="/recipe/?action=admin"> Admin Page </a>'; 
    //have logged in
    $loginMessage =  '<a class="my_account" href="/recipe/?action=logout"> Logout </a>';
    echo $loginMessage; 
    echo $myAccount; 
} else {
    $_SESSION['loggedin'] = false;
    $loginMessage =   '<a id="my_account" href="/recipe/?action=login"> My Account </a>';
    echo $loginMessage; 
}
?> 


          

  