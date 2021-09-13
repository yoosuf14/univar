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
<body onload="ShowOnlyThisSection('dispatchedContent', 'sentContent', 'pendingContent')">
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
        <a class="nav-link" href="home.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Messages </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Orders <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="cart.php">My cart</a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Options</a>
          <a class="dropdown-item" href="editcustomerprofile.php">Edit profile</a>
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

<!-- sidenav navbar -->
<div class="row">
<div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush bg-dark">
        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="compose" onclick="ShowOnlyThisSection('dispatchedContent', 'sentContent', 'pendingContent')">Pending</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="inbox" onclick="ShowOnlyThisSection('pendingContent', 'sentContent', 'dispatchedContent')">Dispatched</a>
        

      </div>
    </div>
<!-- sidenav end -->

<!-- Fetch pending begin -->
<?php
$sql = "SELECT orderdate, productId,quantity FROM orders WHERE customerid = '$session' AND NOT status = 'dispatched'";
$resultset = mysqli_query($conn, $sql);
?>


<!-- pending content begin -->
<div id="pendingContent" class="container">
    <h1 class="h1">Pending Orders</h1>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="">Order Date</th>
      <th scope="col" class="">Product Id</th>
      <th scope="col" class="">Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($record = mysqli_fetch_assoc($resultset))
{   
    $orderdate = $record['orderdate'];
    $productid = $record['productId'];
    $quantity = $record['quantity'];
     ?>
      <th scope="row"><?php echo "$orderdate";?></th>
      <td><?php echo "$productid"; ?></td>
      <td><?php echo "$quantity"; ?></td>
    </tr>
    <?php 
    } 
    ?>
  </tbody>
</table>
</div>
<!-- pending content end -->

<!-- Fetch dispatched begin -->
<?php
$sql = "SELECT orderdate, productId,quantity FROM orders WHERE customerid = '$session' AND status = 'dispatched'";
$resultset = mysqli_query($conn, $sql);
?>

<!-- inbox content begin -->
<div id="dispatchedContent" class="container">
     <h1 class="h1">Dispatched Orders</h1>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="">Order Date</th>
      <th scope="col" class="">Product Id</th>
      <th scope="col" class="">Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($record = mysqli_fetch_assoc($resultset))
{   
    $orderdate = $record['orderdate'];
    $productid = $record['productId'];
    $quantity = $record['quantity'];
     ?>
      <th scope="row"><?php echo "$orderdate";?></th>
      <td><?php echo "$productid"; ?></td>
      <td><?php echo "$quantity"; ?></td>
    </tr>
    <?php 
    } ?>
  </tbody>
</table>
</div>
<!-- inbox content end -->

</div>
</div>
<?php
include_once 'jslink.php';
?>

<script type="text/javascript">
  // hideThisSection("compose");
  function ShowOnlyThisSection(hide1, hide2, show1 ) {
    var x = hide1;
    var y = hide2;
    var z = show1;
    $("#"+x).hide();
    $("#"+y).hide();
    $("#"+z).show();
  }

</script>
</body>
</html>
<?php 
}
else
{
  header("Location:login.php");
}
 ?>
