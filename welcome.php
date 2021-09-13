<!doctype html>
<html lang="en">
  <head>

<?php
include_once 'link.php';
// include_once 'connection.php';
?>

<title></title>
</head>
<body>
<?php
	session_start();
	$username = $_SESSION['username'];
?>

<!-- navbar begin -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Univar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo "<img src='src/person-circle.svg' style='margin-bottom: 0.3rem;'> $username"; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Orders</a>
          <a class="dropdown-item" href="#"></a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Logout_code.php"><img src='src/box-arrow-right.svg' style='margin-bottom: 0.2rem';> Logout</a>
          
        </div>
      </li>
    </ul>
      </div>
</nav>
<!-- navbar end -->





<?php
include_once 'jslink.php';
?>
</body>

