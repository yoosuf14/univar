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
	
	
	
	if(isset($_GET["d"])){
		
		$c->del($_GET["d"]);
	}
	
	
	
	$all= $c->get_all_branch();
	

	
include "head.php" 
?>

 <h1> Branch Informations </h1>
<table class="table" id="branchtb">
	<thead>

	<tr>
		<th>branch name</th>
		<th>branch location</th>
		<th>branch address</th>
		<th>branch number</th>
	</tr>
	</thead>
	<tbody>
	
<?php
foreach($all as $tmp){
	echo "<tr>
		<td>$tmp->branchname</td>
		<td>$tmp->branchlocation</td>
		<td>$tmp->branchaddress</td>
		<td>$tmp->branchtel</td>
		<td><span onclick='del($tmp->branchid)'>delete </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='branchform.php?ed=$tmp->branchid'> Edit </a> </td>
	</tr>";
	}
?>	
	</tbody>
</table>

<?php include "footer.php" ?>



<script> 
function del(id){
	$result=confirm("are you sure you want to delete the data");
	if ($result==true)
		location.href="branchtable.php?d="+id;
	
}
Query(document).ready(function() {
    jQuery('#branchtb').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>