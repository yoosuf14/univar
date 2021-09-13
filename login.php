<?php 
session_start();
if (isset($_SESSION['customer_session_id'])) {
  header("Location:home.php");
}
else
{
?>

<!doctype html>
<html lang="en">
  <head>

<?php
include_once 'link.php';
?>


<title>Login Page</title>

  </head>
  <body>
<!-- jumbotron begin -->
<div class="jumbotron">
  <h1 class="display-4">Univar Login Page</h1>

  <p class="lead">Please sign-in to make online orders from Univar Apparels and get in touch with</p>

</div>
<!-- jumbotron end -->

<!-- form begin -->
<div class="container">
<h1 class="lead">Enter credentials to login</h1>

<form id="registration_form" action="login_code.php" method="POST">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" class="form-control" id="userame" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <div>
    <?php 
    $error = "";
    if(isset($_GET['loginError']))
    {
      $error = "Invalid credentials";
    }

    ?>
    <!-- check span tag and fix it -->
  <span class="text-danger"><?php echo $error; ?></span> 
  </div>
  <button  type="submit" class="btn btn-dark">Submit</button>
  <a class="link text-dark" href="registration.php">Register an account</a>
</form>
</div>
<!-- form end -->


<?php 
include_once 'footer.php'; ?>
<?php
include_once 'jslink.php';
?>

</body>
</html>
<?php 
}
 ?>

