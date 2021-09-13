<!doctype html>
<html lang="en">
<head>

  <?php
  include_once 'link.php';
  include_once 'connection.php';
  ?>
  <script src="scripts/script.js"></script>

  <title>Login</title>
</head>
<body>

  <!-- jumbotron begin -->
  <div class="jumbotron jumbotron-fluid" onclick="runThis()">
    <div class="container">
      <h1 class="display-4">Univar Apparels - Customer Registration</h1>
      <p class="lead">Please fill your details to register a new customer account.</p>
      
    </div>
  </div>
  <!-- jumbotron end -->

  <!-- form begin -->

  <div class="container">
    <form id="form" action="registration_code.php" method="POST">
     <h6 class="lead">Registration form</h6>

     <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="email" >
      </div>
    </div>

    <div class="form-group row">
      <label for="Username" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="username" name="username" class="form-control" id="username">
      </div>
    </div>

    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" id="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="nic" class="col-sm-2 col-form-label">N.I.C</label>
      <div class="col-sm-10">
        <input type="text" name="nic" class="form-control" id="nic">
      </div>
    </div>
    <div class="form-group row">
      <label for="rtpassword" class="col-sm-2 col-form-label">Re-type Password</label>
      <div class="col-sm-10">
        <input type="password" name="rtpassword" class="form-control" id="rtpassword">
      </div>
    </div>

    <div>
      <span id="displayError"></span>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-dark" id="submit">Submit</button>
      </div>

    </div>
  </form>
</div>
<!-- form end -->


<?php
include_once 'jslink.php';
?>
<script type="text/javascript" src="scripts/registration_validation.js"></script>

</body>
</html>

