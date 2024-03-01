<?php
//To connect with the database connection file
include "db_conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload file
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

//To retrieve the user input from the form
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$last_name = $_POST['Last_name'];
$first_name = $_POST['First_name'];
$middle_name = $_POST['Middle_name'];
$Email = $_POST['Email'];
$Status = $_POST['Status'];
$Active = isset($_POST['Active']) ? "Online" : "Offline";

function validatePassword($password) {
    // Check if password contains at least one letter and one digit or one of the specified symbols
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*[\d@#$*])[A-Za-z\d@#$*]+$/', $password)) {
        return false;
    }
    return true;
}

//To validate inputs (should contain letters only)
function validateLetters($input) {
    return preg_match('/^[A-Za-z]+$/', $input);
}

//A function to validate email format
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

//To check if the email is empty or invalid
if (empty($Email) || !validateEmail($Email)) { 
    header("Location: reg_form.php?error=Invalid email");
    exit();
}

//To check if the email is already exists in the database
$email_check_query = "SELECT * FROM user WHERE Email='$Email' LIMIT 1"; 
$result = mysqli_query($conn, $email_check_query);
$email_exists = mysqli_fetch_assoc($result);

//Sending back to registration form if email already exists
if ($email_exists) {
    header("Location: reg_form.php?error=Email already in use");
    exit();
}

if (empty($password) || strlen($password) < 6 || !validatePassword($password)) {
    header("Location: reg_form.php?error=Password must be at least 6 characters long and contain at least one letter, one digit, and a symbol");
    exit();
}

//To validate last name
if (!validateLetters($last_name)) {
    header("Location: reg_form.php?error=Last name should contain only letters");
    exit();
}

//To validate first name
if (!validateLetters($first_name)) {
    header("Location: reg_form.php?error=First name should contain only letters");
    exit();
}

//To validate middle name
if (!validateLetters($middle_name)) {
    header("Location: reg_form.php?error=Middle name should contain only letters");
    exit();
}


//To insert user data into the database
$sql = "INSERT INTO user (username, password, Lastname, First_name, Middle_name, Email, Status, Active, verification_code) VALUES ('$username','$password','$last_name','$first_name','$middle_name','$Email','$Status','$Active', '$verification_code')";

// Executing the SQL query
if(mysqli_query($conn, $sql)){
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'parsival143251@gmail.com';  // SMTP username
        $mail->Password = 'hjsvffgmdwiogwtd';  // SMTP password
        $mail->SMTPSecure = 'tls';          // Enable TLS encryption
        $mail->Port = 587;                  // TCP port to connect to

        // Email content
        $mail->setFrom('parsival143251@gmail.com');
        $mail->addAddress($Email);
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = 'Please click the "verify" link to verify your email: <a href="http://localhost/ipt101/verified.php?email='.$Email.'&code='.$verification_code.'">Verify</a>';

        // Send email
        $mail->send();

        header("Location: sent_notice.php?message=Verification email sent. Please check your email to verify your account.");
    } catch (Exception $e) {
        header("Location: reg_form.php?error=Failed to send verification email. Please try again later.");
    }
} else {
    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
}

//Closing the database connection
mysqli_close($conn);
?>
