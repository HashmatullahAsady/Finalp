<?php 
session_start();
if(!isset($_SESSION["SESSION"])){
	header("location:login.php?acces=denied");
}
require_once("bootstrap.php");
require("connection.php"); 
	$condition = "";
	if (isset($_GET["q"])) {
		$q=$_GET["q"];
		$by =$_GET["by"];

		$condition = "WHERE $by = '$q'";
	}

	$query=mysqli_query($conn,"SELECT * FROM CUSTOMER $condition ORDER By customer_id ASC");
	$record = mysqli_fetch_assoc($query);
	$totalRows_customer = mysqli_num_rows($query);
	$query2=mysqli_query($conn,"SELECT * FROM SALES");
	$sales_record=mysqli_fetch_assoc($query2);


?>
<link rel="stylesheet" type="text/css" href="css/customer_list.css">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"   id="banner">
		<div class="panel-heading">
		<a href="customer_add.php" class="btn btn-info pull-right" class="">
				deal with new customer
			</a>
			<h3>customer List</h3>
		</div><div class="panel-heading">
		<a href="customer_list.php" class="btn btn-info pull-right" class="">
			back to list
			</a>
		</div>
		<div id="space"></div>
		<h1>all customers</h1>
		<div class="panel-body">
		<?php if (isset($_GET["edit"])) {?>
			<div class="alert alert-success">
				Selected customer has been successfully updated.
			</div>
		<?php }?>
		<?php if (isset($_GET["delete"])) {?>
			<div class="alert alert-success">
				Selected customer has been successfully deleted.
			</div>
		<?php }?>
		<?php if (isset($_GET["error"])) {?>
			<div class="alert alert-danger">
				 customer could not be deleted.
			</div>
		<?php }?>
		<?php if (isset($_GET["add"])) {?>
			<div class="alert alert-success">
				New customer has been successfully added.
			</div>
		<?php }?>
			
			<div>
			<div class="panel panel-default panel-body col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right ">
			<form method="GET">
				<div id="search" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">Keywords: </span>
						<input type="text" name="q" class="form-control" value="<?php if (isset($_GET["q"])) echo $_GET["q"];?>">
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
					<div class="input-group">
						<span class="input-group-addon">By: </span>
						<select class="form-control" name="by">
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="customer_id") echo "selected";?> value="customer_id">ID</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="name") echo "selected";?> value="name">Name
							</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="phone") echo "selected";?> value="phone">Phone
							</option>
							<option <?php if (isset($_GET["by"]) && $_GET["by"]=="address") echo "selected";?> value="address">Address</option>
						</select>
						<span class="input-group-btn">
							<input type="submit" value="Search" id="btn" class="btn btn-primary pull-right">
						</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</form>
			</div> 
		</div>
		 <b>Total Result Found: <?php echo $totalRows_customer ;?></b>
		<?php if ($totalRows_customer>0) {?>
		<div class="table-responsive">
	

			<table class="table table-striped">
				<tr>
					<th>NO</th>
					<th>Name</th>
					<th>ORDER_NO</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Address</th>
					<th>Registration Date</th>
					<th>seles detail</th>
					<th>Edit</th>
					<th>Delete</th>
					
				</tr>
				<?php 
				$x=1;
				do {?>
					<tr>
						<td><?php echo $x++;?></td>
						<td><?php echo $record["fullname"];?></td>

						<td><?php echo $record["order_number"]; ?></td>						
						<td><?php echo $record["phon"];?></td>
						<td><?php echo $record["email"];?></td>
						<td><?php echo $record["address"];?></td>
						<td><?php echo $record["re_date"];?></td>
						<td><a href="sales_detail.php?customer_id=<?php echo $record['customer_id']; ?> && sales_id=<?php echo $sales_record['sa_id']; ?>">sales details</a></td>
						<td><a href="customer_edit.php?customer_id=<?php echo $record["customer_id"];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a class="delete" href="customer_delete.php?customer_id=<?php echo $record["customer_id"];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				<?php } while ($row_customer = mysqli_fetch_assoc($query));?>
			</table>
			</div>
			<?php } else{?>
			<div class="alert alert-warning"> No Such customer found</div>
			<?php }?>
		</div>
	</div>
<div id="footer" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <div class="copyright_text">
  <p class=" wow fadeInRight" data-wow-duration="1s">Made with <i class="fa fa-heart"></i> by <a href="#">7star technology</a>2019. All Rights Reserved</p>
  </div>
</div>


/