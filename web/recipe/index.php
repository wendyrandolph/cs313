<?php
//This is the main controller 

// Create or access a Session
session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

//grab php functions as needed *****************************************************
require('../recipe/library/connections.php');
require('../recipe/library/functions.php');
require('../recipe/library/accounts_model.php');




switch ($action) {

    case 'register':
        //Test if I'm getting to the register case. 
        //   echo " This is the register case";
        //     exit;

        // Filter and store the data
        $member_first_name = filter_input(INPUT_POST, 'member_first_name', FILTER_SANITIZE_STRING);
        $member_last_name = filter_input(INPUT_POST, 'member_last_name', FILTER_SANITIZE_STRING);
        $member_email = filter_input(INPUT_POST, 'member_email', FILTER_SANITIZE_EMAIL);
        $member_password = filter_input(INPUT_POST, 'member_password', FILTER_SANITIZE_STRING);

        // echo $member_first_name, $member_last_name, $member_email, $member_password; 
        // exit; 

        //Checking for an existing email address in the table
        // $emailMatch = checkExistingEmail($db, $member_email);
        // if ($emailMatch === 1) {
        //     $message = "<p>This email is already registered, login to your account.</p>";
        //     include '../recipe/view/login.php';
        //     break;
        // }
        // $member_email = checkEmail($member_email);
        // echo $member_email; 
        // exit; 
        // $checkPassword = checkPassword($member_password);



        // Check for missing data
        if (empty($member_first_name) || empty($member_last_name) || empty($member_email) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../recipe/view/registration.php';
            break;
        }
        // Send the data to the model
        $hashed_password = password_hash($member_password, PASSWORD_DEFAULT);
        $regOutcome = regClient($db, $member_first_name, $member_last_name, $member_email, $hashed_password);


        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $member_first_name, strtotime('+1 year'), "/");

            $_SESSION['message'] = "<p>Thanks for registering $member_first_name. Please use your email and password to login.</p>";
            header('Location: /recipe/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $member_first_name, but the registration failed. Please try again.</p>";
            include '../recipe/view/registration.php';
            exit;
        }



    case 'Login':

        //filter and store email and password
        $member_email = filter_input(INPUT_POST, 'member_email', FILTER_SANITIZE_EMAIL);
        $member_email = checkEmail($member_email);
        $member_password = filter_input(INPUT_POST, 'member_password', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($member_password);
        $member_first_name = filter_input(INPUT_POST, 'member_first_name', FILTER_SANITIZE_STRING);

        //Check for empty fields 
        if (empty($member_email) || empty($checkPassword)) {
            $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            break;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($db, $member_email);

        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($member_password, $clientData['member_password']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            break;
        }


        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        setcookie("firstname", "", "time() -3600", "/");



        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session

        $_SESSION['clientData'] = $clientData;

        $clientId = $_SESSION['clientData']['clientId'];



        // Send them to the admin view
        include  '../view/add_recipe.php';

        break;


    case 'viewRecipe':
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING);


        $name = getName($db, $recipe_id);

        $amount = getIngredients($db, $recipe_id);
        $recipe = directions($recipe_id, $db);


        include '../recipe/view/display.php';
        break;


    case 'display':
        //echo "This is the display case statement"; 
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING);
        //echo $category_id; 

        $results = displayCategory($db, $category_id);



        include '../recipe/view/home.php';
        break;

    case 'add_recipe':




        include '../recipe/view/add_recipe.php';
        break;
        case 'login':

            include '../recipe/view/login.php';
            break;

    case 'registration':


        include '../recipe/view/registration.php';
        break;
    default:

        include '../recipe/view/login.php';
        break;
}
