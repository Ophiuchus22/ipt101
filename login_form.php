<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <!--To link or include CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>
<body>
<!--Log in form layout using CSS Bootstrap-->
<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 m-5">
                    <form class="row shadow-lg p-3" action="index_login.php" method="post">
                        <div class="m-2">
                            <!--Header-->
                            <h1 class="">Login Form</h1>
                        </div>
                        <!--To display an error message in the login form-->
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                        <!--For username input-->
                        <div class="col-md-12 m-2">
                            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                        </div>
                        <!--For password input-->
                        <div class="col-md-12 m-2">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                        </div>

                        <!--A button to submit the user's input-->
                        <div class="col-md-12 m-2">
                            <button id="submitBtn" class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <!--Back to registration form-->
                        <div class="col-md-12 m-2">
                            <a href="reg_form.php">Register</a>
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
