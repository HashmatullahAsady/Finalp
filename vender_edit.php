<?php require_once("connection.php"); 
require_once("bootstrap.php");

$vender_id =$_GET["vender_id"];

$vender=mysqli_query($conn,"SELECT * FROM VENDER WHERE vender_id = $vender_id  ORDER By vender_id ASC");
	$row_vender = mysqli_fetch_assoc($vender);
	$totalRows_vender = mysqli_num_rows($vender);

	if (isset($_POST["vender_name"])) {
		$vender_name =$_POST["vender_name"];
		$last_name=$_POST["last_name"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$reg_date = $_POST["reg_date"];

		$result = mysqli_query($conn, "UPDATE VENDER SET NAME = '$vender_name', LASTNAME='$last_name', ADDRESS = '$address', PHONE = '$phone', EMAIL = '$email', REG_DATE = '$reg_date' WHERE VENDER_ID = $vender_id");
		if($result) {
			header("location:vender_list.php?add=done");
		}
		else{
			header("location:vender_edit.php?error=failed&vender_id=$vendor_id");
		}
		
	}

?>
	<link rel="stylesheet" type="text/css" href="css/style_vender.css">
	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-lg-offset col-md-offset col-sm-offset col-xs-offset" id="banner_vender_add">
		<h1>
			7STAR<span style="color: green">technology</span>
		</h1>
	</div>
	<div class="col-lg-10 col-md-10 col-sm-6 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-3 col-xs-offset-0" id="content">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4> </h4>
				<a href="vender_list.php" class="btn btn-info pull-right" class="">
				Back to list
			</a>
			<h3>Edit Vendor</h3>
			<div id="poyem">
				<h1>SEVEN STAR IS YOUR BEST CHOISE</h1>
		</div>
			</div>
			<div class="panel-body">
			<?php if (isset($_GET["error"])) {?>
				<div class="alert alert-warning">
				Con Not Edit!!!
					Sorry! Could not add new employee! Please try again! 

				</div>
			<?php }?>
				<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon">Name: </span>
						<input type="text" name="vender_name" class="form-control" value="<?php echo $row_vender["name"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Last Name: </span>
						<input type="text" name="last_name" class="form-control" value="<?php echo $row_vender["lastname"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Phone: </span>
						<input type="text" name="phone" class="form-control" value="<?php echo $row_vender["phone"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Email: </span>
						<input type="text" name="email" class="form-control" value="<?php echo $row_vender["email"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Address: </span>
						<input type="text" name="address" class="form-control" value="<?php echo $row_vender["address"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Registration Date: </span>
						<input type="date" name="reg_date" class="form-control" value="<?php echo $row_vender["reg_date"];?>" required>
					</div>
					<input type="submit" value="Submit" class="btn btn-primary">
				</form>
			</div>

		</div>
	
	</div>
	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-lg-offset col-md-offset col-sm-offset col-xs-offset" id="footer">



</div>