<?php
// Define the directory where the uploaded files will be stored
$target_directory = "C:\\xampp\\htdocs\\ipt101\\picture\\";

// Define the path where the file will be stored in the server
$target_file = $target_directory . basename($_FILES["profile_picture"]["name"]);

// Get the file extension
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the file is an actual image or fake image
$check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
if ($check === false) {
    // Redirect to an error page if the file is not an image
    header("Location: edit_profile.php?error=File is not an image");
    exit();
}

// Check file size
if ($_FILES["profile_picture"]["size"] > 500000) {
    // Redirect to an error page if the file size is too large
    header("Location: edit_profile.php?error=Sorry, your file is too large");
    exit();
}

// Allow certain file formats
$allowed_extensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowed_extensions)) {
    // Redirect to an error page if the file format is not allowed
    header("Location: edit_profile.php?error=Sorry, only JPG, JPEG, PNG & GIF files are allowed");
    exit();
}

// Move the uploaded file to the specified directory
if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
    // File uploaded successfully
    header("Location: edit_profile.php?success=Profile picture uploaded successfully");
    exit();
} else {
    // Redirect to an error page if there was an error uploading the file
    header("Location: edit_profile.php?error=Sorry, there was an error uploading your file");
    exit();
}
?>
