<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <!--To link or include CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>
<body>
    <!--Home layout using CSS Bootstrap-->
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 m-5">
                    <h2 style="color:black">HOME</h2>
                    <!--To display success message-->
                    <?php
                    if(isset($_GET['message'])) {
                        $message = $_GET['message'];
                        echo "<div class='alert alert-success'>$message</div>";
                    }
                    ?>

                    <form action="index_login.php" method="post">
                        <!--To log out or back to the log in page-->
                        <button type="submit" class="btn btn-primary">LOG OUT</button>
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
