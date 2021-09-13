<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
	<?php 
	include("report_data.php");
	$c=new reportdata();
	
	$all = $c->get_current_assets();
	

	
include "head.php" ?>

<h1>Assets Report</h1>
<table class="table" id="mgtrep">
<thead>
	<tr>
		<td>Asset Id</td>
		<td>Purchase Date</td>
		<td>Asset Name</td>
		<td>Branch</td>
		<td>Quantity</td>
		<td>Total Asset cost</td>
	</tr>
	</thead>
	<tbody>
<?php
foreach( $all as $tmp){
	echo "<tr>
		<td>$tmp->assetid</td>
		<td>$tmp->purchasedate</td>
		<td>$tmp->assetname</td>
		<td>$tmp->branch</td>
		<td>$tmp->quantity</td>
		<td>$tmp->assetcost</td>
	</tr>";
	
	}
?>	
</tbody>
</table>

<?php include "footer.php" ?>
<script>
jQuery(document).ready(function() {
    jQuery('#mgtrep').DataTable( {
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