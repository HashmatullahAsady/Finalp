<link rel="stylesheet" type="text/css" href="css/style_vender.css">
<?php require_once("connection.php"); 
require_once("bootstrap.php");
	$condition = "";
	if (isset($_GET["q"])) {
		$q=$_GET["q"];
		$by =$_GET["by"];

		$condition = "WHERE $by = '$q'";
	}

	$vender=mysqli_query($conn,"SELECT * FROM vender $condition ORDER By vender_id ASC");
	$row_vender = mysqli_fetch_assoc($vender);
	$totalRows_vender = mysqli_num_rows($vender);


?>
<div id="banner">
	<div id="poyem">
				<h1>SEVEN STAR IS YOUR BEST CHOISE</h1>
		</div>
</div>
	<div >
		<div class="panel-heading">
		<a href="vender_add.php" class="btn  pull-right" id="btn">
				Add new vender
			</a>
			<h3>vender List</h3>
			
		</div>
		<div class="panel-body" id="content">
		<?php if (isset($_GET["edit"])) {?>
			<div class="alert alert-success">
				Selected vender has been successfully updated.
			</div>
		<?php }?>
		<?php if (isset($_GET["delete"])) {?>
			<div class="alert alert-success">
				Selected vender has been successfully deleted.
			</div>
		<?php }?>
		<?php if (isset($_GET["error"])) {?>
			<div class="alert alert-danger">
				 vender could not be deleted.
			</div>
		<?php }?>
		<?php if (isset($_GET["add"])) {?>
			<div class="alert alert-success">
				New vender has been successfully added.
			</div>
		<?php }?>

			<div>
			<div class="panel panel-default panel-body btn-info" style="width: 50%; float: right;">
			<form method="GET">
				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">Keywords: </span>
						<input type="text" name="q" class="form-control" value="<?php if (isset($_GET["q"])) echo $_GET["q"];?>">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">By: </span>
						<select class="btn-primary" style="height: 35px; text-align: center" name="by">
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="vender_id") echo "selected";?> value="vender_id">ID</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="name") echo "selected";?> value="name">Name</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="lastname") echo "selected";?> value="lastname">last Name</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="phone") echo "selected";?> value="phone">Phone</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="address") echo "selected";?> value="address">Address</option>
						</select>
						<span class="input-group-btn">
							<input type="submit" value="Search" class="btn btn-info form-control" style="width: 200px;float: right;">
						</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</form>
			</div> 
		</div>
		 <b>Total Result Found: <?php echo $totalRows_vender ;?></b>
		<?php if ($totalRows_vender>0) {?>
		<div class="table-responsive">
	

			<table class="table table-striped">
				<tr>
					<th>NO</th>
					<th>Name</th>
					<th>last Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Address</th>
					<th>Registration Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php 
				$x=1;
				do {?>
					<tr>
						<td><?php echo $x++;?></td>
						<td><?php echo $row_vender["name"];?></td>
						<td><?php echo $row_vender["lastname"];?></td>						
						<td><?php echo $row_vender["phone"];?></td>
						<td><?php echo $row_vender["email"];?></td>
						<td><?php echo $row_vender["address"];?></td>
						<td><?php echo $row_vender["reg_date"];?></td>
						<td><a href="vender_edit.php?vender_id=<?php echo $row_vender["vender_id"];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a class="delete" href="vender_delete.php?vender_id=<?php echo $row_vender["vender_id"];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				<?php } while ($row_vender = mysqli_fetch_assoc($vender));?>
			</table>
			</div>
			<?php } else{?>
			<div class="alert alert-warning"> No Such word found</div>
			<?php }?>
		</div>
	</div>

	
	</div>
	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-lg-offset col-md-offset col-sm-offset col-xs-offset" id="footer">





