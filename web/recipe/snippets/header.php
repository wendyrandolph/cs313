 <h1> Family Recipes </h1>

 <?php


    if ($_SESSION['loggedin'] === TRUE) {
        $myAccount = '<a class="my_account" href="/recipe/?action=admin"> Admin Page </a>';
        //have logged in
        $loginMessage =  '<a class="my_account" href="/recipe/?action=logout"> Logout </a>';
        echo "<h3> Welcome  {$_SESSION['clientData']['member_first_name']}   </h3>";
        echo $loginMessage;
        echo $myAccount;
    } else {
        $_SESSION['loggedin'] = false;
        $loginMessage =   '<a class="my_account" href="/recipe/?action=login"> My Account </a>';
        echo $loginMessage;
    }
    ?>
 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
     <i class="fa fa-bars"></i>
 </a>