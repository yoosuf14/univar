<?php 
// check if already logged in. Else redirect to login page
session_start();
if(isset($_SESSION['customer_session_id']))
{

// decrlaring a variable to sessionId
  $customerid = $_SESSION['customer_session_id'];

  ?>
  <?php
  include_once 'connection.php';
  ?>

<!doctype html>
<html lang="en">
  <head>
<?php
include_once 'link.php';
?>
<script type="text/javascript">
	
</script>
<title>Univar-cart</title>
  </head>
  <body>
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
      <li class="nav-item active">
        <a class="nav-link" href="cart.php">My cart <span class="sr-only">(current)</span></a>
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
  </div>
</nav>
<!-- Navbar end -->

<main>
  <div class="row">
<div class="container col-lg-6">
<table class="table table-bordered table-light" >
  <thead>
    <tr>
      <th scope="col">#</th>  
      <th scope="col">Product Name</th>
      <th scope="col">Image</th>
      <th scope="col">Product description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>

<!-- table entry begin -->
<?php
$rownumber = 0;
$totalprice = 0;
  $sql = "SELECT products.productName, products.productDescription, products.UnitPrice, products.imagesrc, cart.quantity, products.productID FROM products INNER JOIN cart ON products.productID = cart.productId WHERE cart.customerid = '$customerid'";
  $resultset = mysqli_query($conn, $sql);
  while($record = mysqli_fetch_assoc($resultset))
  {   
    ?>

  <tbody>
    <tr id="<?php echo $record['productID'];?> ">
      <th scope="row"><?php echo $rownumber+1; ?></th>
      <?php $rownumber++; ?>
      <td><?php echo $record['productName']; ?></td>
      <td><img src="images/products/<?php echo $record['imagesrc']; ?>" class="card-img-top img-fluid rounded" alt="nav-item"></td>
      <td><?php echo $record['productDescription']; ?></td>
      <td><input class="quantity_input" type="number" onchange="updateQuantity(this.id)" name="quantity_cart" id="quantity_cart<?php echo $record['productID']; ?>" placeholder="<?php echo $record['quantity']; ?>"></td>
      <td><?php echo number_format($record['UnitPrice'],2); ?></td>
      <td><button class="btn btn-dark" id="remove_btn_<?php echo $record['productID']; ?> " onclick="remove_product(this.id)">Remove this</button></td>
        
    </tr>
    <script type="text/javascript">
      // console.log(obj);
    </script>
  <?php
  $totalprice = $totalprice + $record['UnitPrice']*$record['quantity'];

  }
  ?>

  </tbody>
</table>
</div>

<!-- checkout begin -->
<div class="col-lg-6">
<div class="card" style="width: 18rem;">
  <div class="card-header">
    Cart summary
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Number of items: <?php echo $rownumber; ?></li>
    <li class="list-group-item" id="total">Total Price = Rs.<?php echo number_format($totalprice,2); ?></li>
        <li class="list-group-item"><button id="btnconfirm" class="btn btn-warning" onclick="confirmOrder()">Confirm order</button></li>
      </ul>
</div>
</div>
<!-- checkout end -->
</div>
</main>

<?php
include_once 'jslink.php';
?>

</body>
<script type="text/javascript">
  function remove_product(clicked_id) {
      
    var str = clicked_id;
    var res = str.slice(11);
    console.log(res);
    document.getElementById(res).style.display = "none"; //to remove the row from displaying

    //function to remove product from database
  removeCartRow(res);
  location.reload();
}

  function removeCartRow(res){
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
     if (this.readyState == 4 && this.status == 200) {
        console.log("Product removed to cart"+this.responseText);   
 }
  }
  xhttp.open("POST", "removeFromCart_code.php?productId="+res, true);
  xhttp.send(); 
  }
  
function updateQuantity(clicked_id){
  validateQuantityInput(clicked_id);
  var str = clicked_id;
  var product_id = str.slice(13); 
  var quantity = document.getElementById(clicked_id).value;
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
     if (this.readyState == 4 && this.status == 200) {
 }
  }
  xhttp.open("POST", "updateQuantity.php?productId="+product_id+"&quantity="+quantity, true);
  xhttp.send(); 
  // location.reload();
  updateTotalPrice();
  }

  function updateTotalPrice(){
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
     if (this.readyState == 4 && this.status == 200) {
  var x = Number(this.responseText);
  document.getElementById('total').innerHTML = "Total Price = Rs."+x.toFixed(2);
 }
  }
  xhttp.open("POST", "updateTotalPrice.php", true);
  xhttp.send(); 
  }

  function validateQuantityInput(clicked_id) {
  var quantity_input = document.getElementById(clicked_id).value;
  if (quantity_input < 0) {
    alert("Enter positive value for quantity");
    document.getElementById(clicked_id).value = 0;
    return false;
  }
 
}


function confirmOrder(){
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
     if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      location.reload();
 }
  }
  xhttp.open("POST", "confirm_order.php", true);
  xhttp.send(); 
  }

</script>
</html>

<?php 
}
else
{
  header("Location:login.php");
}
?>

