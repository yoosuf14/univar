<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 
	
	include("branch.php");
	$c=new branch();
	
	$txt="save";

	
	if(isset($_GET["ed"])){
		
		$c=$c->get_by_id($_GET["ed"]);
		$txt="update";
	}
	
	
	
	$rep="";
	
	if(isset ($_POST["branchname"])){
	
	$c->branchname=$_POST["branchname"];
	$c->branchlocation=$_POST["branchlocation"];
	$c->branchaddress=$_POST["branchaddress"];
	$c->branchtel=$_POST["branchtel"];

	if(isset ($_POST["branchid"])){
		$c-> update($_POST["branchid"]);
		header("location:branchtable.php");
	}
	else
	{
		$c->branch_reg();
	}
	
	
	
	$rep="<div class='alert alert-success alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> branch has registered successfully
</div>";
	}
	
	
	
 include "head.php"; 
 echo $rep;
 ?>


<h1>branch registration form</h1>
<form method="POST" class="form-horizontal" action="branchform.php">
	<?php
		if(isset($_GET["ed"])){
			
			echo"<input type='hidden' name='branchid' value='$c->branchid'>";
			
		}
	?>

		
  <div class="form-group">
    <label class="control-label col-sm-2" for="branchname">Branch name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="branchname" name="branchname" placeholder="Enter branch name" required  value="<?=$c->branchname?>">
    </div>
  </div>
  
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="branchlocation">Branch Location:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="branchlocation" name="branchlocation" placeholder="Enter branch location" value="<?=$c->branchlocation?>">
    </div>
  </div>
		
		
		
		<div class="form-group">
    <label class="control-label col-sm-2" for="email">Branch address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="branchaddress" placeholder="Enter branch address"value="<?=$c->branchaddress?>">
    </div>
  </div>
  
  
	<div class="form-group">
    <label class="control-label col-sm-2" for="branchtel"> branch contact number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="branchtel" name="branchtel" placeholder="Enter branchtel number"value="<?=$c->branchtel?>">
    </div>
  </div>
  
		 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info" > <?=$txt?> </button>
    </div>
  </div>
          
		
            
        
                       
					   
<?php include "footer.php" ?>