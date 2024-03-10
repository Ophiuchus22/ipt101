<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <h1 class="">Registration Form</h1>
    </div>
    <div class="card-body">

    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>

      <form action="index_reg.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last Name" name="Last_name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" name="First_name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Middle Name" name="Middle_name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="col-md-12 m-2">
            <label for="status" class="form-label">Status <span class="text-danger"></span></label>
            <select class="form-select" id="status" name="Status" required>
                <option value="Single">Single</option>
                <option value="In relationship">In relationship</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <div class="col-4">
            <button id="clearBtn" class="btn btn-secondary btn-block">Clear all</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login_form.php" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
    // Check if the browser supports local storage
    if (typeof(Storage) !== "undefined") {
        // Retrieve values from local storage and set them as input values
        document.getElementsByName("username")[0].value = localStorage.getItem("register_username") || '';
        document.getElementsByName("password")[0].value = localStorage.getItem("register_password") || '';
        document.getElementsByName("Last_name")[0].value = localStorage.getItem("register_last_name") || '';
        document.getElementsByName("First_name")[0].value = localStorage.getItem("register_first_name") || '';
        document.getElementsByName("Middle_name")[0].value = localStorage.getItem("register_middle_name") || '';
        document.getElementsByName("Email")[0].value = localStorage.getItem("register_email") || '';
        document.getElementById("status").value = localStorage.getItem("register_status") || '';

        // Store input values in local storage when the form is submitted
        document.querySelector("form").addEventListener("submit", function() {
            localStorage.setItem("register_username", document.getElementsByName("username")[0].value);
            localStorage.setItem("register_password", document.getElementsByName("password")[0].value);
            localStorage.setItem("register_last_name", document.getElementsByName("Last_name")[0].value);
            localStorage.setItem("register_first_name", document.getElementsByName("First_name")[0].value);
            localStorage.setItem("register_middle_name", document.getElementsByName("Middle_name")[0].value);
            localStorage.setItem("register_email", document.getElementsByName("Email")[0].value);
            localStorage.setItem("register_status", document.getElementById("status").value);
        });
        // Clear input fields when the clear form button is clicked
        document.getElementById("clearBtn").addEventListener("click", function() {
            document.getElementsByName("username")[0].value = '';
            document.getElementsByName("password")[0].value = '';
            document.getElementsByName("Last_name")[0].value = '';
            document.getElementsByName("First_name")[0].value = '';
            document.getElementsByName("Middle_name")[0].value = '';
            document.getElementsByName("Email")[0].value = '';
            document.getElementById("status").value = '';
        });
    } else {
        // Local storage is not supported
        alert("Sorry, your browser does not support web storage. Your inputs will not be saved.");
    }
</script>
</body>
</html>
