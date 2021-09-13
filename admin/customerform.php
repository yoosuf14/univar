<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
<?php
	session_start();
	if(!isset($_SESSION["login"])){
		header("location:login.php");
	}
	
	include("customer.php");
	
	$c=new customer();	
	$txt="save";

	
	if(isset($_GET["ed"])){
		
		$c=$c->get_by_id($_GET["ed"]);
		$txt="update";
	}
	
	
	
	$rep="";
	
	if(isset ($_POST["firstname"])){
	

	$c->username=$_POST["username"];
	$c->firstname=$_POST["firstname"];
	$c->lastname=$_POST["lastname"];
	$c->emailaddress=$_POST["emailaddress"];
	$c->nic=$_POST["nic"];
	$c->contactnumber=$_POST["contactnumber"];
	$c->address=$_POST["address"];

	if(isset ($_POST["cus_id"])){
		$c-> update($_POST["cus_id"]);
		//header("location:customertable.php");
	}
	else
	{
		$c->customer_reg();
	}
	
	
	
	$rep="<div class='alert alert-success alert-dismissible'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Success!</strong> customer has registered successfully
</div>";
	}
	
	
	
 include "head.php"; 
 echo $rep;
 ?>


<h1>Customer registration form</h1>
<form method="POST" class="form-horizontal" action="customerform.php">
	<?php
		if(isset($_GET["ed"])){
			
			echo"<input type='hidden' name='cus_id' value='$c->cus_id'>";
			
		}
	?>


  <div class="form-group">
    <label class="control-label col-sm-2" for="firstname">Usename:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter first name" required  value="<?=$c->username?>">
    </div>

  </div><div class="form-group">
    <label class="control-label col-sm-2" for="firstname">First name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required  value="<?=$c->firstname?>">
    </div>
  </div>
  
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="lastname">Last name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name"  required value="<?=$c->lastname?>">
    </div>
  </div>
		
		
		
	<div class="form-group">
    <label class="control-label col-sm-2" for="email">E-mail address:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="emailaddress" placeholder="Enter Email address" required value="<?=$c->emailaddress?>">
    </div>
  </div>
  
  
	<div class="form-group">
    <label class="control-label col-sm-2" for="nic"> N.I.C:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter Nic or passport number"value="<?=$c->nic?>" required pattern="[0-9]{9}[V|X]|[0-9]{11}[V|X]" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="contactnumber">Contact number:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter contact number" required pattern="[0-9]{10}" value="<?=$c->contactnumber?>">
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="address">Address :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" placeholder="Enter address"  required value="<?=$c->contactnumber?>">
    </div>
  </div>
	

  
		<div class="form-group"> 
    
		 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info" > <?=$txt?> </button>
    </div>
  </div>
                                

                       
					   
<?php include "footer.php" ?>
<script>
    jQuery("#nic").blur(function(){
        var n=jQuery("#nic").val();
		jQuery("#nic")[0].setCustomValidity("");
        jQuery.get("ajax.php?type=checknic",{un:n},function(data){
            if(data==1){
                alert("This Nic/Passport already Registered");
				 jQuery("#nic")[0].setCustomValidity("already exist");
				 //jQuery("#nic").focus();   

            }
        });
    });

</script>