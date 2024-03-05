<?php
// Include the database connection file
include "db_conn.php";

// Retrieve user inputs from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Regular expressions for validation
function validateUsername($input) {
    return preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/', $input);
}

// Function to validate if a password contains at least one letter and one digit or one of the specified symbols
function validatePassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*[\d@#$*])[A-Za-z\d@#$*]+$/', $password);
}

$errors = array();

// Validate inputs
if (empty($password) || strlen($password) < 6 || !validatePassword($password)) {
    $errors[] = "Password must be at least 6 characters long and contain at least one letter, one digit, and a symbol";
}

if (empty($username) || !validateUsername($username)) {
    $errors[] = "Username should contain both letters and numbers, but not all numbers";
}

// Handle errors
if (!empty($errors)) {
    $error_message = implode(", ", $errors);
    header("Location: edit_user_pass.php?error=$error_message");
    exit();
}

// Insert username and hashed password into the database
$sql = "INSERT INTO user_profile (username, password) 
        VALUES ('$username', '$password')";

// Execute the SQL query
if(mysqli_query($conn, $sql)){
    // Redirect to a success page if registration is successful
    header("Location: edit_user_pass.php?success=Your username and password has been updated successfully");
} else {
    // Redirect to an error page if there's an issue with the SQL query
    $error_message = mysqli_error($conn); // Get the MySQL error message
    $error_message = urlencode("Your username and password could not be updated: $error_message");
    header("Location: edit_user_pass.php?error=$error_message");
    exit();
}


?>