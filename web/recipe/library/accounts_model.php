<?php

// This is the accounts model page 




//This function will handle site registrations 
function regClient($db, $member_first_name, $member_last_name, $member_email, $hashed_password)
{
  
  // The SQL statement
  $sql = 'INSERT INTO member (member_first_name, member_last_name, member_email, member_password)
      VALUES (:member_first_name, :member_last_name,  :member_email,  :member_password)';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':member_first_name', $member_first_name, PDO::PARAM_STR);
  $stmt->bindValue(':member_last_name', $member_last_name, PDO::PARAM_STR);
  $stmt->bindValue(':member_email', $member_email, PDO::PARAM_STR);
  $stmt->bindValue(':member_password', $member_password, PDO::PARAM_STR);

  
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction

  // Return the indication of success (rows changed)
  return $rowsChanged;
}

// Get client data based on an email address
//This function will check for existing email address 
//This function will check for existing email address 
function checkExistingEmail($db, $member_email)
{
  // Create a connection object using the phpmotors connection function
  // The SQL statement

  $sql = "SELECT  member_email FROM member WHERE member_email = '" . $_POST['member_email'] . "'";
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':member_email', $member_email, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);

  if (empty($matchEmail)) {
    return 0;
    // echo 'Nothing found';
  } else {
    return 1;
    //echo 'Match found';
  }

}



// Get client data based on an email address
function getClient($db, $clientEmail)
{
  
  $sql = 'SELECT member_id, member_first_name, member_last_name, member_email, member_password FROM member WHERE member_email = :member_email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;

}



//This function will handle site registrations 
function updateClient($db, $member_id, $member_first_name, $member_last_name, $member_email)
{
  // Create a connection object using the phpmotors connection function

  // The SQL statement
  $sql = 'UPDATE member 
      SET member_first_name => :member_first_name
      , member_last_name => :member_last_name
      , member_email => :member_email 
      WHERE member_id => :member_id';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':member_first_name', $member_first_name, PDO::PARAM_STR);
  $stmt->bindValue(':member_last_name', $member_last_name, PDO::PARAM_STR);
  $stmt->bindValue(':member_email', $member_email, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_INT);

  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function passwordUpdate($db, $member_password, $member_id)
{
  // Create a connection object using the phpmotors connection function
 
  // The SQL statement
  $sql = 'UPDATE member 
    SET  member_password = :member_password 
    WHERE member_id = :member_id; ';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next two lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is

  $stmt->bindValue(':member_password', $member_password, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);
    // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


?>