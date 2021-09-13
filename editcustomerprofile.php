<?php 
// check if already logged in. Else redirect to login page
session_start();
if(isset($_SESSION['customer_session_id']))
{

// decrlaring a variable to sessionId
$session = $_SESSION['customer_session_id'];

?>


<!doctype html>
<html lang="en">
  <head>
<?php
include_once 'connection.php';

?>
<?php
include_once 'link.php';

?>

<title>Univar - Home</title>
</head>
<body>
	<?php
// fetch customer details here
  ?>
	<!-- jumbotron begin -->
<div class="jumbotron jumbotron-fluid mb-0">
  <div class="container">
    <h1 class="display-4">Univar Appaprels</h1>
    <p class="lead">For all your wholesale apparel needs</p>
  </div>
</div>

	<!-- jubotron end -->

<!-- Navbar begin -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="#">Univar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls=" 

  navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orders.php">Orders</a>
      </li>
      <li class="nav-item dropdown active" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Options</a>
          <a class="dropdown-item active" href="#">Edit profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout_code.php">Logout</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    
    </ul>
    
  </div>
</nav>
<!-- Navbar end -->
<?php 

$sql = "SELECT fname, lname, nic, address, phone FROM customers WHERE id='$session'";
$resultset = mysqli_query($conn, $sql);
while($record = mysqli_fetch_assoc($resultset))
{   

   $fname = $record['fname'];
   $lname = $record['lname'];
   $nic = $record['nic'];
   $address = $record['address'];
   $phone = $record['phone'];
 }

 ?> 

<?php 
$success = '';
if (isset($_GET['success'])) {
  $success = "Successfully Updated";
}
?>


<div class="container col-md-4">
<form method="post" action="editcustomerprofile_code.php">
  <div class="form-group">
    <label for="fname">First Name</label>
    <input type="fname" name="fname" class="form-control" id="fname" placeholder="<?php echo $fname ?>">
  </div>
  <div class="form-group">
    <label for="lname">Last Name</label>
    <input type="lname" name="lname" class="form-control" id="lname" placeholder="<?php echo $lname ?>">
  </div>
<!--   <div class="form-group">
    <label for="s">Other name</label>
    <input type="s" class="form-control" id="s" placeholder="<?php echo $lname; ?>">
  </div> -->
  <div class="form-group">
      <label for="gender">Gender</label>
      <select name="gender" id="Gender" class="form-control">
        <option selected>Male</option>
        <option>Female</option>
      </select>
    </div>
  <div class="form-group">
    <label for="phone">Phone </label>
    <input type="tel" name="phone" class="form-control" id="phone" placeholder="<?php echo $phone;?>">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" name="address" id="address" rows="4" placeholder="<?php echo $address;?>"></textarea>
  </div>
  <div>
  <button class="btn btn-dark" type="submit" id="submit" name="submit">Change</button></br>
      <span><?php echo "$success"; ?></span>

  </div>
  </div>   
</form>


<!-- main begin -->

<!-- main end -->

<?php
include_once 'jslink.php';
?>
</body>
</html>
<?php 
}
else
{
  header("Location:login.php");
}
 ?>
