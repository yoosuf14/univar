<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 

	include("employee.php");
	$c=new employee();
	$txt="save";

	
	if(isset($_GET["ed"])){
		
		$c=$c->get_by_id($_GET["ed"]);
		$txt="update";
	}

	$rep="";
	if(isset ($_POST["emp_name"])){

	$c->emp_name=$_POST["emp_name"];
	$c->emptel=$_POST["emptel"];
	$c->nic=$_POST["nic"];
	$c->salary=$_POST["salary"];
	$c->appdate=$_POST["appdate"];
	
	if(isset ($_POST["emp_id"])){
		$c-> update($_POST["emp_id"]);
		header("location:employeetable.php");
	}
	else
	{
	$c->employee_reg();
	header("location:employeetable.php");
	}
	
	
	
	$rep="<div class='alert alert-success alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> employee has registered successfully
</div>";
	}


	 include "head.php" ;
	
		echo $rep;

	
	?>
	
	<h1> employee Details </h1>
	<form method="POST" class="form-horizontal" action="employeeform.php">
	
		<?php
		if(isset($_GET["ed"])){
			
			echo"<input type='hidden' name='emp_id' value='$c->emp_id'>";
			
		}
		?>
	
	
	
		
  <div class="form-group">
    <label class="control-label col-sm-2" for="emp_name">employee name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="emp_name"name="emp_name" placeholder="Enter name" required value="<?=$c->emp_name?>" >
    </div>
  </div>
		<div class="form-group">
    <label class="control-label col-sm-2" for="emptel">contact number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="emptel" name="emptel" placeholder="Enter contact number" pattern="[0][0-9]{9}" required value="<?=$c->emptel?>">
    </div>
  </div>
		
		<div class="form-group">
    <label class="control-label col-sm-2" for="nic">NIC:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter NIC" required pattern="[0-9]{9}[V|X]|[0-9]{11}[V|X]" value="<?=$c->nic?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="nic">Salary:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Salary" required  value="<?=$c->salary?>">
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="nic">Appointment date:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="appdate" name="appdate" placeholder="Enter Appointment date" required  value="<?=$c->appdate?>">
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
	