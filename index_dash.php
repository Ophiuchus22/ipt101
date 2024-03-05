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
$contact_info = $_POST['contact_info'];
$bio = $_POST['bio'];
$social_media = $_POST['social_media'];

// Regular expressions for validation
$phone_regex = '/^\d{11}$/'; // Phone number format: 10 digits
$email_regex = '/^\S+@\S+\.\S+$/'; // Email format: standard email regex
$social_media_regex = '/^(https?:\/\/)?(www\.)?(facebook\.com|twitter\.com|instagram\.com|linkedin\.com|youtube\.com|snapchat\.com)\/.+$/i';

$errors = array();

// Function to validate inputs (should contain letters only)
function validateLetters($input) {
    return preg_match('/^[A-Za-z]+$/', $input);
}

// Function to validate email format
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validate inputs
if (!validateLetters($first_name)) {
    $errors[] = "First name should contain only letters";
}

if (!validateLetters($last_name)) {
    $errors[] = "Last name should contain only letters";
}

if (!empty($middle_name) && !validateLetters($middle_name)) {
    $errors[] = "Middle name should contain only letters";
}

if (empty($email) || !validateEmail($email)) {
    $errors[] = "Invalid email";
}

if (!empty($phone_number) && !preg_match($phone_regex, $phone_number)) {
    $errors[] = "Invalid phone number";
}

if (!empty($contact_info) && !preg_match($phone_regex, $contact_info) && !filter_var($contact_info, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Contact info should be a valid mobile number or email";
}

if (!empty($social_media) && !preg_match($social_media_regex, $social_media)) {
    $errors[] = "Invalid social media link";
}

// Handle errors
if (!empty($errors)) {
    $error_message = implode(", ", $errors);
    header("Location: edit_profile.php?error=$error_message");
    exit();
}

if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $file_tmp_name = $_FILES['profile_picture']['tmp_name'];
    $file_name = $_FILES['profile_picture']['name'];
    $file_size = $_FILES['profile_picture']['size'];
    $file_type = $_FILES['profile_picture']['type'];
    
    // Specify the directory where you want to store uploaded files
    $target_dir = "C:\\xampp\\htdocs\\ipt101\\picture";
    
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($file_tmp_name, $target_dir . $file_name)) {
        $profile_picture = $target_dir . $file_name;
    } else {
        $errors[] = "Failed to upload profile picture";
    }
}

// Insert user data into the database
$sql = "INSERT INTO user_profile (first_name, last_name, middle_name, email, phone_number, address, date_of_birth, gender, profile_picture, contact_info, bio, social_media) 
        VALUES ('$first_name', '$last_name', '$middle_name', '$email', '$phone_number', '$address', '$date_of_birth', '$gender', '$profile_picture', '$contact_info', '$bio', '$social_media')";

// Execute the SQL query
if(mysqli_query($conn, $sql)){
    // Redirect to a success page if registration is successful
    header("Location: edit_profile.php?success=Your profile has been updated successfully");
    
} else {
    // Redirect to an error page if there's an issue with the SQL query
    $error_message = mysqli_error($conn); // Get the MySQL error message
    $error_message = urlencode("Your profile could not be updated: $error_message");
    header("Location: edit_profile.php?error=$error_message");
    exit();
}


?>
