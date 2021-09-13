<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
  <?php 	
	
	include ("user.php");
	$u=new user();
	$all=$u-> get_all_users();
	
	
?>


<?php

include("head.php");
?>

<h1> user Informations</h1>


<table  class="table" id ="tab">
	
	<thead>
	<tr>
		<th>userID</th>
		<th>user name</th>
		<th>user nic</th>
		<th>user Type</th>
		<th>user password</th>
	</tr>
	</thead>
	<tbody>
	
<?php
	foreach($all as $tmp){
	echo "<tr>
		<td>$tmp->uid</td>
		<td>$tmp->uname</td>
		<td>$tmp->unic</td>
		<td>$tmp->user_type</td>
		<td>$tmp->upassword</td>
	</tr>";
	}
	?>
	</tbody>
</table>


<?php

include("footer.php");
?>

<script>
jQuery(document).ready(function() {
    jQuery('#tab').DataTable( {
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
