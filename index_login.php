<?php
//Start session to manage user session data
session_start();

//To connect with the database connection file
include "db_conn.php";

//Check if form fields are set and not empty
if (isset($_POST['username']) && isset($_POST['password'])) { 
    
    //Function to filter the input data
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate and filter the username and password inputs
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    //To check if the username is empty
    if (empty($username)) {
        header("Location: Loginform.php?error=UserName is required");
        exit();
    }
    //To check if the password is empty
    else if (empty($password)){
        header("Location: Loginform.php?error=password is required");
        exit();
    }
    //Proceed with authentication
    else {
        //To check if username and password match in database
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        //To check if there is a matching user record
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result); 

            //To check if username and password match
            if ($row['username']  === $username && $row['password'] === $password) {
                echo "Logged in!";
                
                // Set session variables for user
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                // Redirect user to home page
                header("Location: dashboard.php");
                exit();
            }
            //To send the user if the credentials are incorrect
            else {
                header("Location: login_form.php?error=Incorrect Username or password");
                exit();
            }
        }
        //To send the user if the credentials are incorrect
        else {
            header("Location: login_form.php?error=Incorrect Username or password");
            exit();
        }
    }
}
//To send the user to login form if the data is not set
else {
    header("Location: login_form.php");
    exit();
}
?>
