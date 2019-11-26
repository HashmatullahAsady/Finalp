<?php
session_start();
if(!isset($_SESSION["SESSION"])){
	header("location:login.php?erorr=done");
} 
require_once("connection.php");
require_once("bootstrap.php");

	$employee = mysqli_query($conn, "SELECT * FROM EMPLOYEE ORDER BY name ASC");
	$record=mysqli_fetch_assoc($employee);
	
?>
<?php if(isset($_GET["employee_id"])){
	$employee_id=$_GET["employee_id"];
	$employee_info=mysqli_query($conn,"SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID=$employee_id");
	$employee_record=mysqli_fetch_assoc($employee_info);
	?>
	<style type="text/css">
	#header{height: auto; width: 100%;background: #003011;}
</style>
<di>
	<div id="header" class="panel-heading">
		<h1>Employee List</h1>
	</div>
	
	<div class="panel-body">
	
		<table class="table table-striped table-border">
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Name</th>
				<th>Position</th>
				<th>Type</th>
				<th>Photo</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $employee_record["employee_id"]; ?></td>
				<td><?php echo $employee_record["name"]; ?> <?php echo $record["lastname"]; ?></td>
				<td><?php echo $employee_record["position"]; ?></td>
				<td><?php echo $employee_record["employee_type"]; ?></td>
				<td><img height='70px' width='70px' class='img img-circle' src="<?php echo $record["picture"]; ?>"></td>
			</tr>
			<?php } while($record = mysqli_fetch_assoc($employee)); ?>
			
		</table>
	
	
	</div>

</div>




<?php }else{ ?>




<style type="text/css">
	#header{height: auto; width: 100%;background: lightgreen;}
</style>
<di>
	<div id="header" class="panel-heading">
		<h1>Employee List</h1>
	</div>
	
	<div class="panel-body">
	
		<table class="table table-striped table-border">
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Name</th>
				<th>Position</th>
				<th>Type</th>
				<th>Photo</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $record["employee_id"]; ?></td>
				<td><?php echo $record["name"]; ?> <?php echo $record["lastname"]; ?></td>
				<td><?php echo $record["position"]; ?></td>
				<td><?php echo $record["employee_type"]; ?></td>
				<td><img height='70px' width='70px' class='img img-circle' src="<?php echo $record["picture"]; ?>"></td>
			</tr>
			<?php } while($record = mysqli_fetch_assoc($employee)); ?>
			
		</table>
	
	
	</div>

</div>

<?php }?>