<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 	

	include("supplier.php");
	$c=new supplier();
	$txt="save";

	
	if(isset($_GET["ed"])){
		
		$c=$c->get_by_id($_GET["ed"]);
		$txt="update";
	}

	$rep="";
	if(isset ($_POST["sup_name"])){

	$c->sup_name=$_POST["sup_name"];
	$c->sup_tel=$_POST["sup_tel"];
	$c->sup_address=$_POST["sup_address"];
	
	if(isset ($_POST["sup_id"])){
		$c-> update($_POST["sup_id"]);
		header("location:suppliertable.php");
	}
	else
	{
	$c->supplier_reg();
	header("location:suppliertable.php");
	}
	
	
	
	$rep="<div class='alert alert-success alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> supplier has registered successfully
</div>";
	}


	 include "head.php" ;
	
		echo $rep;

	
	?>
	
	<h1> Supplier Details </h1>
	<form method="POST" class="form-horizontal" action="supplierform.php">
	
		<?php
		if(isset($_GET["ed"])){
			
			echo"<input type='hidden' name='sup_id' value='$c->sup_id'>";
			
		}
		?>
	
	
	
		
  <div class="form-group">
    <label class="control-label col-sm-2" for="sup_name">supplier name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sup_name"name="sup_name" placeholder="Enter name" required value="<?=$c->sup_name?>" >
    </div>
  </div>
		<div class="form-group">
    <label class="control-label col-sm-2" for="sup_tel">contact number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sup_tel" name="sup_tel" placeholder="Enter contact number" required value="<?=$c->sup_tel?>">
    </div>
  </div>
		
		<div class="form-group">
    <label class="control-label col-sm-2" for="sup_address">supplier address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sup_address" name="sup_address" placeholder="Enter address" required pattern="[0][0-9]{9}" value="<?=$c->sup_address?>">
    </div>
  </div>
  
		<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
		 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default"> <?=$txt?> </button>
    </div>
  </div>
		
		
	</form>
	