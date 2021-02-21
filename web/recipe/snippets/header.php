 
 
<h1> Family Recipes </h1>
    
 <?php 


if ($_SESSION['loggedin'] === TRUE) {
    $myAccount = '<a id="my_account" href="/recipe/?action=admin"> Admin Page </a>'; 
    //have logged in
    $loginMessage =  '<a id="my_account" href="/recipe/?action=logout"> Logout </a>';
    echo $loginMessage; 
    echo  '<h1 class="welcome_message">' . " Welcome " . $_POST['member_first_name']. '</h1> ';
    echo $myAccount; 
} else {
    $_SESSION['loggedin'] = false;
    $loginMessage =   '<a id="my_account" href="/recipe/?action=login"> My Account </a>';
    echo $loginMessage; 
}
?> 


          

  