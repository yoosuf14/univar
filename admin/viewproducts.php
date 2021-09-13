<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
<!doctype html>
<html lang="en">
  <head>

  <?php
  include_once '../connection.php';
  include 'head.php';
  ?>

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
      <img src="../images/products/<?php echo $record['imagesrc']; ?>" class="card-img-top img-fluid rounded" alt="nav-item">
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
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Quantity Available:</strong><?php echo $quantityAvailable; ?> </li>
        </ul>
        <ul class="list-group-item"><strong><?php echo "Price: Rs.".$price; ?></strong></ul><br>
      </div>
    </div>

    <!-- cards end -->
    <?php
  }
  ?>
  <!-- card loop php end -->
</div>
<!-- main end -->

<?php include 'footer.php'; ?>

