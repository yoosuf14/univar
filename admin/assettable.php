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
	
	
	
	if(isset($_GET["d"])){
		
		$c->del($_GET["d"]);
	}
	
	
	
	$all = $c->get_all_asset();
	

	
include "head.php" ?>
<h1> Assets Information</h1>
<table class="table" id="assettbl" >
	<thead>
	<tr>
		<th>Asset name</th>
		<th>Quantity</th>
		<th>Asset cost</th>
		<th>Purchase date</th>
		<th>Located Branch</th>
	</tr>
	</thead>
	<tbody>
	
<?php
foreach( $all as $tmp){
	echo "<tr>
		<td>$tmp->assetname</td>
		<td>$tmp->quantity</td>
		<td>$tmp->assetcost</td>
		<td>$tmp->purchasedate</td>
		<td>$tmp->branch</td>
		<td><span onclick='del($tmp->assetid)'>delete </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='assetform.php?ed=$tmp->assetid'> Edit </a> </td>
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
		location.href="assettable.php?d="+id;
	
	
}

jQuery(document).ready(function() {
    jQuery('#assettbl').DataTable( {
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