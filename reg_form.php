<!DOCTYPE html>
<html>
<head>
    <title>REGISTER</title>
    <!--To link or include CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>
<body>
<!--Registration form layout using CSS Bootstrap-->
<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 m-5">
                    <form class="row shadow-lg p-3" action="index_reg.php" method="post" novalidate>
                        <div class="m-2">
                            <h1 class="">Registration Form</h1>
                        </div>
                        <!--To display an error message if the email is invalid-->
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                        <!--For username input-->
                        <div class="col-md-12 m-2">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                            <div class="valid-feedback">Username validated</div>
                            <div class="invalid-feedback">Please enter a valid Username</div>
                        </div>
                        <!--For password input-->
                        <div class="col-md-12 m-2">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                            <div class="valid-feedback">Password validated</div>
                            <div class="invalid-feedback">Please enter a valid Password</div>
                        </div>
                        <!--For last name input-->
                        <div class="col-md-12 m-2">
                            <label for="last-name" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Last Name" id="last-name" name="Last_name" pattern="[A-Za-z]+" title="Last name should contain only letters" required>
                        </div>
                        <!--For first name input-->
                        <div class="col-md-12 m-2">
                            <label for="first-name" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="First Name" id="first-name" name="First_name" pattern="[A-Za-z]+" title="First name should contain only letters" required>
                        </div>
                        <!--For middle name input-->
                        <div class="col-md-12 m-2">
                            <label for="middle-name" class="form-label">Middle Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Middle Name" id="middle-name" name="Middle_name" pattern="[A-Za-z]+" title="Middle name should contain only letters" required>
                        </div>
                        <!--For email input-->
                        <div class="col-md-12 m-2">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="Email" id="email" name="Email" required>
                            <div class="valid-feedback">Email validated</div>
                            <div class="invalid-feedback">Please enter a valid Email</div>
                        </div>
                        <!--For status input-->
                        <div class="col-md-12 m-2">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Status" id="status" name="Status" pattern="[A-Za-z]+" title="Status should contain only letters" required>
                        </div>
                        <!--To submit the user's input-->
                        <div class="col-md-12 m-2">
                            <button id="submitBtn" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                        <!--Back to login form-->
                        <div class="col-md-12 m-2">
                            <a href="login_form.php">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--To include the necessary JS files for Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
    crossorigin="anonymous"></script>
</body>
</html>
