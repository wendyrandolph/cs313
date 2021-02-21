<?php
//This is the main controller 

// Create or access a Session
session_start();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

$category_id = " ";
//grab php functions as needed *****************************************************
require('../recipe/library/connections.php');
require('../recipe/library/functions.php');
require('../recipe/library/accounts_model.php');



//$category_id = " "; 
//$results = displayCategory($db, $category_id);


switch ($action) {

    case 'register':
        // Filter and store the data
        $member_first_name = filter_input(INPUT_POST, 'member_first_name', FILTER_SANITIZE_STRING);
        $member_last_name = filter_input(INPUT_POST, 'member_last_name', FILTER_SANITIZE_STRING);
        $member_email = filter_input(INPUT_POST, 'member_email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // echo $member_first_name, $member_last_name, $member_email, $member_password; 
        // exit; 

        //Checking for an existing email address in the table
        // $emailMatch = checkExistingEmail($db, $member_email);
        // if ($emailMatch === 1) {
        //     $message = "<p>This email is already registered, login to your account.</p>";
        //     include '../recipe/view/login.php';
        //     break;
        // }

        //$clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($password);


        // // Check for missing data
        // if (empty($member_first_name) || empty($member_last_name) || empty($member_email) || empty($checkPassword)) {
        //     $message = '<p>Please provide information for all empty form fields.</p>';
        //     include '../recipe/view/registration.php';
        //     break;
        // }
        // Send the data to the model
        $hashed_password = password_hash($member_password, PASSWORD_DEFAULT);
        $regOutcome = regClient($db, $member_first_name, $member_last_name, $member_email, $hashed_password);


        // Check and report the result
        if ($regOutcome === 1) {
            //setcookie('firstname', $member_first_name, strtotime('+1 year'), "/");

            $_SESSION['message'] = "<p>Thanks for registering $member_first_name. Please use your email and password to login.</p>";
            header('Location: /recipe/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $member_first_name, but the registration failed. Please try again.</p>";
            include '../recipe/view/registration.php';
            exit;
        }

        // /^(?=.*[[:digit:]])(?=.*[a-z])([^\s]){7,}$/


    case 'Login':

        //$results = displayCategory($db, $category_id);

        //echo "This is the Login case statement"; 
        //exit; 
        //filter and store email and password
        $member_email = filter_input(INPUT_POST, 'member_email', FILTER_SANITIZE_EMAIL);
        //$member_email = checkEmail($member_email);
        $member_password = filter_input(INPUT_POST, 'member_password', FILTER_SANITIZE_STRING);
        // $checkPassword = checkPassword($member_password);
        $member_first_name = filter_input(INPUT_POST, 'member_first_name', FILTER_SANITIZE_STRING);

        //Check for empty fields 
        if (empty($member_email) || empty($member_password)) {
            $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
            include '../recipe/view/login.php';
            break;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($db, $member_email);

        // Compare the password just submitted against
        // the hashed password for the matching client
        //$hashCheck = password_verify($member_password, $clientData['member_password']);
        // If the hashes don't match create an error
        // and return to the login view
        // if (!$hashCheck) {
        //     $message = '<p class="notice">Please check your password and try again.</p>';
        //     include '../recipe/view/login.php';
        //     break;
        // }


        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        //setcookie("firstname", "", "time() -3600", "/");



        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session

        $_SESSION['clientData'] = $clientData;

        $_SESSION['member_first_name'] = $member_first_name; 
        //$list = getCategories($db);

        // Send them to the admin view
        include '../recipe/view/admin.php';
        break;


    case 'viewRecipe':
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_GET, 'recipe_name', FILTER_SANITIZE_STRING);


        $name = getName($db, $recipe_id);


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
    case 'addRecipe':

        $recipe_name = $recipe_desc = $preheat_temp = $cook_time = $instructions = $date_added = $ingredients =  " ";
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        $recipe_name = filter_input(INPUT_POST, 'recipe_name', FILTER_SANITIZE_STRING);
        $recipe_desc  = filter_input(INPUT_POST, 'recipe_desc', FILTER_SANITIZE_STRING);
        $preheat_temp = filter_input(INPUT_POST, 'preheat_temp', FILTER_SANITIZE_STRING);
        $cook_time = filter_input(INPUT_POST, 'cook_time', FILTER_SANITIZE_STRING);
        $ingredients = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_STRING);
        $instructions = filter_input(INPUT_POST, 'instructions', FILTER_SANITIZE_STRING);


        $newRecipeID = $newingredientId = " ";



        // Send the data to the model
        $matchRecipe = checkExistingRecipe($db, $recipe_name);
        if ($matchRecipe === 1) {
            $message = "<p class=text-danger>This recipe is already in the database. </p>";
            include '../recipe/view/add_recipe.php';
            break;
        }

        $updateResult =  addRecipeName($db, $recipe_name, $recipe_desc, $category_id, $preheat_temp, $cook_time, $ingredients, $instructions);


        if ($updateResult = 1) {
            $_SESSION['message'] = "You have added $recipe_name to the recipe index.";
            $_SESSION['loggedin'] = TRUE;
            include '../recipe/view/admin.php';
            break;
        } else {
            $_SESSION['message'] = "You have not added this to the recipe index, please try again.";
            include '../recipe/view/add_recipe.php';
        }
    case 'add':


        include '../recipe/view/add_recipe.php';

        break;
    case 'del':
        // Get review Id 
        $recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_SANITIZE_NUMBER_INT);
        $del_recipe = deleteRecipe($db, $recipe_id);
        $del_index = deleteIndex($db, $recipe_id);
        $del_steps = deleteSteps($db, $recipe_id);

        if (($del_recipe == 1 && $del_index == 1 && $del_steps == 1)) {

            $_SESSION['message_delete'] = "<p class='notice'>That recipe was successfully deleted.</p>";
            $results = getRecipes($db);
            $display = indexDisplay($results);
            $_SESSION['userReview'] = $invReview;
            include '../recipe/view/recipe_update.php';
            exit;
        } else {
            $message = "<p class='notice'>Error. That recipe was not deleted.</p>";
            $_SESSION['message_delete'] = $message;
            header('location: /view/recipe_update.php');
            exit;
        }



        include '../recipe/view/delete_recipe.php';
        break;

    case 'login':

        include '../recipe/view/login.php';
        break;

    case 'logout':
        $_SESSION['loggedin'] = FALSE;
        session_destroy();

        include '../recipe/view/home.php';
        break;
    case 'registration':


        include '../recipe/view/registration.php';
        break;
    case 'admin':
        $_SESSION['loggedin'] = TRUE; 
        include '../recipe/view/admin.php';
        break;


    case 'update_recipe':
        $_SESSION['loggedin'] = true;

        $results = getRecipes($db);
        $display = indexDisplay($results);

        include '../recipe/view/recipe_update.php';

        break;




    default:


        include '../recipe/view/home.php';
        break;
}
