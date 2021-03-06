<?php
    // This is the Accounts Controller 

    // Create or access a Session
    session_start();
    
    //establish the database connection 
    require('../library/functions.php');
    //access functions to display recipes as needed 
    require('../library/functions.php');
    //handle the registration and login processes
    require('../library/accounts_model.php'); 


    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
    }


    switch ($action) {

       
            


        case 'clientUpdate':
            $_SESSION['loggedin'] = TRUE;


            // Filter and store the data
            $member_first_name = filter_input(INPUT_POST, 'member_first_name', FILTER_SANITIZE_STRING);
            $member_last_name = filter_input(INPUT_POST, 'member_last_name', FILTER_SANITIZE_STRING);
            $member_email = filter_input(INPUT_POST, 'member_mail', FILTER_SANITIZE_EMAIL);
            $member_id = filter_input(INPUT_POST, 'member_id', FILTER_SANITIZE_NUMBER_INT);

            //var_dump($clientFirstname, $clientLastname, $clientEmail); 

            $clientData = getClient($db, $member_email);
           
            //Checking for an existing email address in the table
            $emailMatch = checkExistingEmail($db, $member_email);

            //echo "$emailMatch"; 
            //exit; 

            if ($emailMatch === 1 && $member_email != $_SESSION['clientData']['member_email']) {
                $_SESSION['message'] = "<p>This email is already registered, login to your account.</p>";
                include '../view/client-Update.php';
                break;
            }
            // Check for missing data
            if (empty($member_first_name) || empty($member_last_name) || empty($member_email)) {
                $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
                include '../view/client-update.php';
                break;
            }


            $clientUpdate = updateClient($db, $member_id, $member_first_name, $member_last_name, $member_email);
            //var_dump($clientUpdate);


            if ($clientUpdate === 1) {

                
                $_SESSION['message'] = "<p>Thanks for updating your account $member_first_name.</p>";
                //drop the password 
                array_pop($clientData);
                //store clientData to the session
                $_SESSION['clientData'] = $clientData;

                include '../view/admin.php';
                break;
            } else {
                $_SESSION['message'] = "<p>Sorry $clientFirstname, your account information has not been updated. Please try again.</p>";
                include '../view/admin.php';
            }
            break;



            //Update the password
        case 'password':

            //echo 'This is the password case statement'; 
            // exit; 
            $_SESSION['loggedin'] = TRUE;
            //filter and store the password 
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

            // Check for missing data
            if (empty($clientPassword)) {
                $_SESSION['message_1'] = '<p>Please provide information for all empty form fields.</p>';
                include '../view/client-update.php';
                exit;
            }
            $checkPassword = checkPassword($clientPassword);

            // Send the data to the model
            $hashed_password = password_hash($member_password, PASSWORD_DEFAULT);
            $passwordOutcome = passwordUpdate($db, $hashed_password, $clientId);

            // Check and report the result
            if ($passwordOutcome === 1) {
                $_SESSION['message_1'] = "<p>Your password has been updated.</p>";
                include '../view/admin.php';
                break;
            } else {
                $_SESSION['message_1'] = "<p>Sorry but your password has not updated. Please try again.</p>";
                include '../view/client-update.php';
                break;
            }

            break;


        case 'update':
            $_SESSION['loggedin'] = TRUE;
            include '../view/client-update.php';
            break;

        case 'logout':
            $_SESSION['loggedin'] = FALSE;
            session_destroy();

            include '../view/home.php';
            break;
      

            //display the registration page from the login page
      


            include '/recipe/view/registration.php';
            break;

        default:

            include '../view/admin.php';
            break;
    }
