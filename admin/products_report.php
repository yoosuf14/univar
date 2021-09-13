<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="Stock")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 	
	include("report_data.php");
	$c=new reportdata();
	
	$all = $c->get_current_products();
	

	
include "head.php" ?>

<h1>Products Availability Report</h1>
<table class="table" id="mgtrep">
<thead>
	<tr>
		<td>Product ID</td>
		<td>Product Name</td>
		<td>Product Description</td>
		<td>Quantity Available</td>
		<td>Unit Price</td>
	</tr>
	</thead>
	<tbody>
<?php
foreach( $all as $tmp){
	echo "<tr>
		<td>$tmp->productID</td>
		<td>$tmp->productName</td>
		<td>$tmp->productDescription</td>
		<td>$tmp->quantityAvailable</td>
		<td>$tmp->UnitPrice</td>
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