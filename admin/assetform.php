<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
	<?php 
	include("asset.php");
	$c=new asset();
	
	$txt="save";

	
	if(isset($_GET["ed"])){
		
		$c=$c->get_by_id($_GET["ed"]);
		$txt="update";
	}
	
	
	
	$rep="";
	
	if(isset ($_POST["assetname"])){
	
	$c->assetname=$_POST["assetname"];
	$c->quantity=$_POST["quantity"];
	$c->assetcost=$_POST["assetcost"];
	$c->purchasedate=$_POST["purchasedate"];
	$c->branch=$_POST["branch"];

	if(isset ($_POST["assetid"])){
		$c-> update($_POST["assetid"]);
		header("location:assettable.php");
	}
	else
	{
		$c->asset_reg();
	}
	
	
	
	$rep="<div class='alert alert-success alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> room has added successfully!!!
</div>";
	}
	
	
	
 include "head.php"; 
 echo $rep;
 ?>


<h1>Add Assets</h1>
<form method="POST" class="form-horizontal" action="assetform.php">
	<?php
		if(isset($_GET["ed"])){
			
			echo"<input type='hidden' name='assetid' value='$c->assetid'>";
			
		}
	?>

		
  <div class="form-group">
    <label class="control-label col-sm-2" for="assetname">Asset name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="assetname" name="assetname" placeholder="Enter asset name" required  value="<?=$c->assetname?>">
    </div>
  </div>
  
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="quantity">Quantity:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" value="<?=$c->quantity?>">
    </div>
  </div>
		
		
		
		<div class="form-group">
    <label class="control-label col-sm-2" for="email">Total Cost :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="assetcost" placeholder="Enter cost "value="<?=$c->assetcost?>">
    </div>
  </div>
  
  
	<div class="form-group">
    <label class="control-label col-sm-2" for="purchasedate">Purchase Date:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="purchasedate" name="purchasedate" placeholder="Enter purchasedate"value="<?=$c->purchasedate?>">
    </div>
  </div>
  
 <?php
	include ("branch.php");
	$c= new branch();
	$drop = $c->get_all_branch();

?>
  <div class="form-group">
    <label class="control-label col-sm-2" for="branch" > Located Branch:</label>
    <div class="col-sm-10">
	<select id="branch"name="branch"class="form-control"value="<?=$c->branch?>">
<?php 
	foreach($drop as $item){

echo"<option value='$item->branchid'>$item->branchname</option>" ;
	}
?>
    </div>
  </div>
	
	</select>
  
		 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info" > <?=$txt?> </button>
    </div>
  </div>
                                

                       
					   
<?php include "footer.php" ?>