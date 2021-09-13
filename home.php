<?php 
// check if already logged in. Else redirect to login page
session_start();
if(isset($_SESSION['customer_session_id']))
{

// decrlaring a variable to sessionId
  $session = $_SESSION['customer_session_id'];

  ?>
  <?php
  include_once 'connection.php';

  ?>

  <?php 
  $sql = "SELECT fname, lname FROM customers WHERE id = '$session'";
  $result = mysqli_query($conn, $sql);
  $record = mysqli_fetch_assoc($result);
  ?>
  <!doctype html>
  <html lang="en">
  <head>

    <?php
    include_once 'link.php';

    ?>
    <script type="text/javascript" src="addToCart.js"></script>


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
      <p class="lead">For all your wholesale apparel needs</p><br>
      <p class="lead"><b>Welcome<?php echo " ".$record['fname']." ".$record['lname']; ?></b></p><br>
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
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="message.php">Messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orders.php">Orders</a>
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
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 form-control-dark" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- Navbar end -->


<!-- main begin -->
<div class="row justify-content-center" >

  <!-- card loop php begin -->
  <?php
  $sql = "SELECT productID, UnitPrice, quantityAvailable, productName, productDescription, imagesrc  FROM products";
  $resultset = mysqli_query($conn, $sql);
  while($record = mysqli_fetch_assoc($resultset))
  {   
    ?>
    <!-- cards begin -->

    <div class="card shadow m-3" style="width: 18rem; ">
      <img src="images/products/<?php echo $record['imagesrc']; ?>" class="card-img-top img-fluid rounded" alt="nav-item">
      <div class="card-body">
        <h5 class="card-title"><?php echo $record['productName']; ?></h5>
        <p class="card-text"><?php echo $record['productDescription']; ?></p>

        <!-- setting the format for price using php-->
        <?php
        $price = $record['UnitPrice'];
        $price = number_format("$price",2)."<br>";
        $quantityAvailable = $record['quantityAvailable']
        ?>
        <!-- setting the format using php end -->
        
            <strong style="color: Red">Quantity :</strong>
            <input type="number" id="quantity<?php echo $record['productID'];?>" max="<?php echo $quantityAvailable; ?>" min = "1" name="quantity">
          </li>
        </ul>
        <ul class="card-text font-weight-bold"><?php echo "Price: Rs.".$price; ?></ul><br>
        <button type="button" onclick="addToCart(this.id)" id="<?php echo $record['productID']; ?>" class="btn btn-primary">
          Add to cart
        </button>
      </div>
    </div>

    <!-- cards end -->
    <?php
  }
  ?>
  <!-- card loop php end -->
</div>
<!-- main end -->

<?php
include_once 'jslink.php';
?>
<script>
  function addToCart(clicked_id){
  var quantity = document.getElementById('quantity'+clicked_id).value;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
     if (this.readyState == 4 && this.status == 200) {
console.log("Product added to cart"+this.responseText);   
console.log(quantity);
 }
  }
  xhttp.open("POST", "addToCart_code.php?productId="+clicked_id+"&quantity="+quantity, true);
  xhttp.send(); 
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
