<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 	
$rep="";
 if (isset($_POST ["uname"])){
	
	include("user.php");
	$u= new user();

	$u->uname =$_POST ["uname"];
	$u->unic=$_POST ["unic"];
	$u->user_type=$_POST ["user_type"];
	$u->upassword=$_POST ["upassword"];

	$u-> u_reg();
	$rep='<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>';
 }
	include ("head.php");
	echo $rep;
?>
       
 <h1> Add user</h1>
	<form method="post" class="form-horizontal" action="userform.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name= "uname" id="email" placeholder="Enter name">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="email">User NIC:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name= "unic" id="unic" placeholder="Enter NIC">
    </div>
  </div>
  <br/>
		<label class="control-label col-sm-4" for="lastname" required >User Role:</label>
			<div class="col-sm-8">
			<select id="user_type"  name="user_type" class="form-control">
			<option >GM</option>	
			<option >Stock</option>	
			<option >HR</option>	
			<option >Asset</option>	
			</select>

		</div>
<br/>
<hr/>
	<div class="form-group">
    <label class="control-label col-sm-2" for="email">password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name= "upassword" id="upassword" placeholder="Enter password">
    </div>
	</div>
<Br/>

  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info">Submit</button>
    </div>
  </div>


	</form>
<?php
include ("footer.php");
?>