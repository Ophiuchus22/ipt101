<?php

// Include the database connection file
include "db_conn.php";

// Retrieve user inputs from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$middle_name = $_POST['middle_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$profile_picture = $_FILES['profile_picture'];
$contact_info = $_POST['contact_info'];
$bio = $_POST['bio'];
$social_media = $_POST['social_media'];

// Regular expressions for validation
$phone_regex = '/^\d{12}$/'; // Phone number format: 10 digits
$email_regex = '/^\S+@\S+\.\S+$/'; // Email format: standard email regex
$social_media_regex = '/^(https?:\/\/)?(www\.)?(facebook\.com|twitter\.com|instagram\.com|linkedin\.com|youtube\.com|snapchat\.com)\/.+$/i';

// Validate inputs
if (!preg_match('/^[a-zA-Z]+$/', $first_name)) {
    header("Location: dashboard.php?error=First name should contain only letters");
    
}

if (!preg_match('/^[a-zA-Z]+$/', $last_name)) {
    header("Location: dashboard.php?error=Last name should contain only letters");
    
}

if (!empty($middle_name) && !preg_match('/^[a-zA-Z]+$/', $middle_name)) {
    header("Location: dashboard.php?error=Middle name should contain only letters");
    
}

if (!preg_match($email_regex, $email)) {
    header("Location: dashboard.php?error=Invalid email");
    
}

if (!empty($phone_number) && !preg_match($phone_regex, $phone_number)) {
    header("Location: dashboard.php?error=Invalid phone number");
    
}

if (!empty($contact_info) && !preg_match($phone_regex, $contact_info) && !filter_var($contact_info, FILTER_VALIDATE_EMAIL)) {
    header("Location: dashboard.php?error=Contact info should be a valid mobile number or email");
    
}

if (!empty($social_media) && !preg_match($social_media_regex, $social_media)) {
    header("Location: dashboard.php?error=Invalid social media link");
    
}

// Insert user data into the database
$sql = "INSERT INTO user_profile (first_name, last_name, middle_name, email, phone_number, address, date_of_birth, gender, profile_picture, contact_info, bio, social_media) 
        VALUES ('$first_name', '$last_name', '$middle_name', '$email', '$phone_number', '$address', '$date_of_birth', '$gender', '$profile_picture', '$contact_info', '$bio', '$social_media')";

// Execute the SQL query
if(mysqli_query($conn, $sql)){
    // Redirect to a success page if registration is successful
    header("Location: dashboard.php?error=Your profile has been updated successfully");
    
} else {
    // Redirect to an error page if there's an issue with the SQL query
    header("Location: dashboard.php?message=ERROR!" . mysqli_error($conn));
    
}

?>
