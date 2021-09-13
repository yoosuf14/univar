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
$uploaded = '';
if (isset($_GET['uploaded'])) {
  $uploaded = "Successfully uploaded";
}

 ?>
<title>Add a product</title>
  </head>
  <body>
<?php  include "head.php";  ?>
<!-- form begin  	 -->
<div class="container">
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Name: </label>
    <input type="text" class="form-control" id="productname" name="productname" placeholder="Product name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Description: </label>
    <textarea class="form-control" name="productdescription" id="exampleFormControlTextarea1" ></textarea>
  </div>
    <div class="form-group">
    <label for="quantity">Quantity Available: </label>
    <input type="number" name="quantity" class="form-control" id="quantity" min="0" placeholder="0">
  </div>
  <div class="form-group">
    <label for="quantity">Price: </label>
    <input type="number" name="unitprice" class="form-control" id="quantity" placeholder="Price in rupees">
  </div>
  <div class="form-group">
    <label for="file">Upload picture</label>
    <input type="file" class="form-control-file" name="file" id="file">
  </div>
  <div>
  	<button class="form-dark btn-dark" type="submit" id="submit" name="submit">Upload</button></br>
    <span><?php echo "$uploaded"; ?></span>
  </div>
  
</form>
</div>
<!-- form end -->
	

<?php include "footer.php" ?>