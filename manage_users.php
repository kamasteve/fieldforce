<?php include ('header.php'); 
include ('functions.php');
$sql1 = mysqli_query($mysqli,"SELECT * FROM users");
while($row1 = mysqli_fetch_array($sql1)) {
$pro_arr[]=$row1;
$pageid=75;
}
?>
<div class="ch-container">
<div class="row">
 <?php include('left_sidebar.php');  ?>

 <div id="content" class="col-lg-10 col-sm-10">
 <div class="row">
    <div class="box col-md-12">
<div class="box-inner">

			
			
				<?php 

 $mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);
	// output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// the query
    $query = "SELECT  * from Field_force_users";

	// mysqli select query
	$results = $mysqli->query($query);

	// mysqli select query
	?>

<table id="example" class="display" cellspacing="0" width="100%">

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable( {
	dom: 'T<"clear">lfrtip',
	tableTools: {
        "sSwfPath": "/swf/copy_csv_xls_pdf.swf"
    }
	} );
} );
</script>
<thead>
<tr>
<th>ID</th>
<th>Mobile</th>
<th>Email</th>
<th>IDCARD</th>
<th>Region</th>
<th>Latitude</th>
<th>Longitude</th>
<th>Address</th>
<th>Date Added</th>
<th>ADDEB_BY</th>

 </tr>
</thead>
<tbody>
<?php
		while($row = $results->fetch_assoc()) {

			?>
				<tr>
			
				  
				    <td><?php echo $row["ID"];?></td>
					<td> <?php echo $row['mobile']; ?></td>
					<td> <?php echo $row['email']; ?> </td>
				    <td><?php echo $row["IDCARD"];?></td>
					<td><?php echo $row["region"];?></td>
					<td><?php echo $row["Latitude"];?></td>
					<td><?php echo $row["longitude"];?></td>
					<td><?php echo $row["Address"];?></td>
					<td><?php echo $row["capture_date"];?></td>
					<td><?php echo $row["ADDEB_BY"];?></td>
				

			
		        </tr>
		<?php } ?>
</tbody>
</table>
			
</div>
</div>
</div>
<div id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit System User</h4>
      </div>
<form id="update_profile"  >
  <div class="form-group" >
         <div class='messages alert '> </div>
	<div class="form-group ">
<label class="control-label col-xs-3" for="text">First Name:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
  <input class="form-control" name="fname" value="" id='fname' type="text" placeholder=" First Name"  required>
  <span class="help-block" id="error"></span> 
</div>
</div>	  
<div class="form-group ">
<label class="control-label col-xs-3" for="text">Last Name:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
  <input class="form-control" name="lname" type="text" value="" id='lname' placeholder=" Last Name"  required>
  <span class="help-block" id="error"></span> 
</div>
</div>

<div class="form-group ">
<label class="control-label col-xs-3" for="text">Username:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
 <input class="form-control" name="username" type="text" placeholder="Username" value="" id='id_' readonly>
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group ">
<label class="control-label col-xs-3" for="text">Email:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
  <input class="form-control" name="email" type="text" placeholder="Email" value="" id='email' readonly>
  <span class="help-block" id="error"></span> 
</div>
</div>

<div class="form-group ">
<label class="control-label col-xs-3" for="text">Phone:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
  <input class="form-control" name="phone_number" type="text" placeholder=" Phone Number" value="" id='phone_number' required>
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group ">
<label class="control-label col-xs-3" for="text">Nationality:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
   <input class="form-control" name="country" type="text" placeholder=" Country" value="" id='country' required>
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group ">
<label class="control-label col-xs-3" for="text">Company:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
   <input class="form-control" name="company" type="text" placeholder=" Company" value="" id='company' required>
  <span class="help-block" id="error"></span> 
</div>
</div>
<div class="form-group ">
<label class="control-label col-xs-3" for="text">Role:</label>
 <div class="input-group  col-xs-7" id="invoice_due_text">
  <input class="form-control" name="role" type="text" placeholder="Role" value="" id='role' required>
  <span class="help-block" id="error"></span> 
</div>
</div>
 
 
<div class="row">
		<div class="col-xs-4">
		
		<button type="submit" class=" btn-success" data-dismiss="modal" id="update_user">Update Profile</button>
		</div>
		</div>
          <!-- .vd_content-section --> 
        
        </div>
		</form>
		</div>
		
		</div>
		</div>
		
<div id="modalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
     <div class="modal-body">
<h4 class="modal-title">Are You Sure You Want to Delete this user</h4>
</div>
      <div class="modal-footer">
        <button type="button" class=" btn-warning" data-dismiss="modal">Cancel</button>
		<button type="submit" class=" btn-success" data-dismiss="modal" id="delete_user">Delete</button>
      </div>
    </div>

  </div>
</div>


<?php
include('footer.php');
?>