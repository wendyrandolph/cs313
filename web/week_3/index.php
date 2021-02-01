<?php
// Create or access a Session
session_start();


//Create the cart with the start of the session if it's not already created. 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
} //WORKS CORRECTLY 


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require '../week_3/functions.php';



//******************************************************************
//                      SETUP ARRAY DATA                           *
//******************************************************************
$images = array(
    array("image" => "'../week_3/images/item_1.jfif' alt='image of a candy corn candles' "),
    array("image" => "'../week_3/images/candle_trio.jfif' alt='image of a candy corn candles' "),
    array("image" => "'../week_3/images/birthday_balloon.jfif' alt='birthday mylar balloon'"),
    array("image" => "'../week_3/images/birthday_cake.jfif' alt='A circle tiered birthday cake.'"),
    array("image" => "'../week_3/images/cake_2.jfif' alt='Picture of a cake.'"),
    array("image" => "'../week_3/images/flower_balloon.jfif' alt='Photo of a balloon with flower doodles on it.'"),
    array("image" => "'../week_3/images/birthday_balloon.jfif' alt='Photo of a tablecloth with colored circles on it.'"),
    array("image" => "'../week_3/images/elephant_hot_air_balloon.jfif' alt='A pink elephant hot air balloon.' "),
);


//all images set to a variable
$image_1 = $images[0]['image'];
$image_2 = $images[1]['image'];
$image_3 = $images[2]['image'];
$image_4 = $images[3]['image'];
$image_5 = $images[4]['image'];
$image_6 = $images[5]['image'];
$image_7 = $images[6]['image'];
$image_8 = $images[7]['image'];


//all titles in one array 

$titles = array(
    array("title" => "Candy Corn Candles"),
    array("title" => "Candle Trio "),
    array("title" => "Happy Birthday Balloons"),
    array("title" => "Birthday Cake"),
    array("title" => "Unique Three Tiered Cake"),
    array("title" => "Flower Balloon"),
    array("title" => "Party Table Cloth"),
    array("title" => "Hot Air Balloon")
);

//all titles set to a variable 
$title_1 = $titles[0]['title'];
$title_2 = $titles[1]['title'];
$title_3 = $titles[2]['title'];
$title_4 = $titles[3]['title'];
$title_5 = $titles[4]['title'];
$title_6 = $titles[5]['title'];
$title_7 = $titles[6]['title'];
$title_8 = $titles[7]['title'];


//Set up an array for the items to browse through.  
$items = array(
    array("title" =>  $title_1, "price" => "10",   "desc" => "White, orange, yellow", "image" => $image_1, "id" => "1",     "pId" => "0", "quan" => "1"),
    array("title" =>  $title_2, "price" => "30",   "desc" => "Cream color, set of three",  "image" => $image_2, "id" => "2", "pId" => "1", "quan" => "1"),
    array("title" =>  $title_3, "price" => "15",   "desc" => "Mylar balloons", "image" => $image_3, "id" => "3", "pId" => "2", "quan" => "1"),
    array("title" =>  $title_4, "price" => "20",   "desc" => "Two layer chocolate cake with fondant",  "image" => $image_4, "id" => "4", "pId" => "4", "quan" => "1"),
    array("title" =>  $title_5, "price" => "150",  "desc" => "An experiment you're dying to try",  "image" => $image_5, "id" => "5", "pId" => "5", "quan" => "1"),
    array("title" =>  $title_6, "price" => "2",    "desc" => "Add some balloons to your occasion",  "image" => $image_6, "id" => "6", "pId" => "6", "quan" => "1"),
    array("title" =>  $title_7, "price" => "5",    "desc" => "Add a tablecloth to jazz up your party.",  "image" => $image_7, "id" => "7", "pId" => "7", "quan" => "1"),
    array("title" =>  $title_8, "price" => "1000", "desc" => "Go all out for your party this year.",  "image" => $image_8, "id" => "8", "pId" => "8", "quan" => "1"),
);

/*echo "<pre>"; 
echo "This is the Items" . " "; 
print_r($items); 
echo "<pre>";*/

$_SESSION['results'] = $items;

//******************************************************************
//             store each array into session variables             *
//******************************************************************


$_SESSION['add_1'] =  ($items[0]);
$_SESSION['add_2'] =  ($items[1]);
$_SESSION['add_3'] =  ($items[2]);
$_SESSION['add_4'] =  ($items[3]);
$_SESSION['add_5'] =  ($items[4]);
$_SESSION['add_6'] =  ($items[5]);
$_SESSION['add_7'] =  ($items[6]);
$_SESSION['add_8'] =  ($items[7]);




$view_cart = "";
$results = $_SESSION['results'];
$view = generateView($results, $images);

$_SESSION['results'] = $results; 

//^^^^^^^^^^^^^^^^^^ SET UP SESSION VARIABLES ^^^^^^^^^^

// Grab data and build the browse page display ********************


switch ($action) {


        //******************************************************************
        //                       Add to Cart Scenario                      *
        //******************************************************************

    case 'addToCart':



        //get & filter the info from the form 
        if (isset($_POST['pId'])) {
            $pId =  filter_var($_POST['pId'], FILTER_SANITIZE_NUMBER_INT);
            $quan = filter_var($_POST['quan'], FILTER_SANITIZE_NUMBER_INT);
            $price_1 = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $desc  = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
            $image = filter_var($_POST['image'], FILTER_SANITIZE_ADD_SLASHES);

            $price = number_format($price_1, 2);
            //echo $pId, $quan, $price, $title, $desc, $image; 
            //SESSION VARIABLE FOR FORM INPUTS *******************************
            $_SESSION['pId'] = $pId;
            $_SESSION["desc"] = $desc;
            //echo $_SESSION['desc'];
            $_SESSION['quan'] = $quan;
            $_SESSION['price'] = number_format($price, 2);
            //echo $_SESSION['price'];
            $_SESSION["title"] = $title;
            //echo $_SESSION["title"];
            //******************************************************************
            //                         buying scenario                         *
            //******************************************************************
            //Validate Case Three 
            //Push items into the shopping cart******************************* 

        }

        //$newresults["quan"] = array($pId,   $quan);
        $new_results = array();
        $new_results = ["pId" =>  $_SESSION['pId'], "title" => $_SESSION["title"], "quan" => $_SESSION["quan"], "price" =>  $_SESSION['price'], "desc" => $_SESSION["desc"]];

//var_dump ($new_results); 


        //$_SESSION['quan'] = $quan;
        if ($_POST['quan'] > 0 && filter_var($_POST['quan'], FILTER_VALIDATE_INT)) {
            if (isset($_POST['pId'])) {
                $_POST['pId'] +=  $_SESSION['quan'];

                // if buy case
            } else {

                $_SESSION['pId'] = $_SESSION['quan'];
            }
        } else {
            $out = "Bad Input";
        } //if bad input 



        $_SESSION['results'] = $items;
        // $new_results = array("pId" => $pId, "title" => $title, "price" => $price, "quan" => $quan, "image" => $image);

        //$new_results = array("pId" =>  $_SESSION['pId'], "title" => $_SESSION["title"], "quan" => $_SESSION['quan'], "price" =>  $_SESSION['price'], "desc" => $_SESSION["desc"]); 

        array_push($_SESSION['cart'], $new_results);
        //$new_results = array("pId" => $pId, "title" => $title, "price" => $price, "quan" => $quan, "image" => $image);


       

        //$buy_results = $_SESSION['cart'];



        if (isset($_SESSION['cart']['pId'])) {
            $_SESSION['message'] = "You have added " . $_POST["title"] . " " . $_POST['price'] . " to your cart. ";
            //$view_cart = buildCart($buy_results); 

        }

        $buy_results = $_SESSION['cart'];
        $_SESSION['cart'] = $buy_results;


        include 'view/browse.php';
        break;

        //******************************************************************
        //                        View Cart Scenario                       *
        //******************************************************************

    case 'viewCart':
        

        //get & filter the info from the form 
        if (isset($buy_results['pId'])) {
            $pId =  filter_var($_POST['pId'], FILTER_SANITIZE_NUMBER_INT);
            $quan = filter_var($_POST['quan'], FILTER_SANITIZE_NUMBER_INT);
            $price_1 = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $desc  = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);
            $image = filter_var($_POST['image'], FILTER_SANITIZE_ADD_SLASHES);

            $price = number_format($price_1, 2);
            //echo $pId, $quan, $price, $title, $desc, $image; 
            //SESSION VARIABLE FOR FORM INPUTS *******************************
            $_SESSION['pId'] = $pId;
            $_SESSION["desc"] = $desc;
            //echo $_SESSION['desc'];
            $_SESSION['quan'] = $quan;
            $_SESSION['price'] = number_format($price, 2);
            //echo $_SESSION['price'];
            $_SESSION["title"] = $title;


            //unset($buy_results); 
            echo "<pre>";
            print_r($buy_results);
            echo "<pre>";
            //$pId["pId"] = $buy_results[0];





           // $title = getTitle($buy_results); 
           

            //$_SESSION['cart'] = $buy_results;
            // $view_cart = buildCart(); 


        }
        include 'view/cart.php';
        break;
        //******************************************************************
        //                       Clear Cart Scenario                      *
        //******************************************************************

    case 'clearCart':
        if (isset($_POST['clear'])) {
            unset($_SESSION['cart']);
            unset($buy_results);

            $_SESSION['message_clear'] = "Your cart has been emptied.";
        }
        header('location: view/cart.php');
        break;


        //******************************************************************
        //                      CheckOut Scenario                          *
        //******************************************************************
    case 'checkout':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);



        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
        }

        include '../week_3/view/checkout.php';
        break;


        //******************************************************************
        //                      Confirm                                    *
        //******************************************************************
    case 'confirm':

        if (isset($_SESSION['confirm'])) {
            $_SESSION['mess_confirm'] = "Your order has been submitted";
        }
        include '/web/week_3/view/confirm.php';


        //******************************************************************
        //                      Default                                    *
        //******************************************************************

    default:
        $results = $_SESSION['results'];
        //$view = generateView($results, $images);




        include 'view/browse.php';
        break;
}
?>