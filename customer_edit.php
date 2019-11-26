<?php
session_start();
if(!isset($_SESSION["SESSION"])){
	header("location:login.php?erorr=done");
}

require_once("bootstrap.php");
require_once("connection.php"); 
	
	$customer_id = $_GET["customer_id"];
	$customer=mysqli_query($conn,"SELECT * FROM customer WHERE customer_id = $customer_id ");
	$row_customer = mysqli_fetch_assoc($customer);
	$totalRows_customer = mysqli_num_rows($customer);

	if (isset($_POST["name"])) {
		$name = $_POST["fullname"];
		$order_no=$_POST["order_no"];
		$address =$_POST["address"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$reg_date = $_POST["reg_date"];

		$result = mysqli_query($conn, "UPDATE CUSTOMER SET FULLNAME= '$name', ORDER_NUMBER=$order_no, ADDRESS = '$address', PHON= '$phone', EMAIL = '$email',  RE_DATE = '$reg_date' WHERE CUSTOMER_ID = $customer_id ");
		if($result) {
			header("location:customer_list.php?add=done");
		}
		else{
			header("location:customer_add.php?error=failed");
		}
		
	}

?>
<link rel="stylesheet" type="text/css" href="css/customer.css">
<div id="banner" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 respansive"><h1>sevenstar<span style="color: green">technology</span></h1></div>
	<a href="customer_list.php" class="btn btn-info pull-right" class="">
				Back to list
			</a>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">
		<div >
			<div class="panel-heading">
				<h4> </h4>
			
			<h3>Add new Customer</h3>
			</div>
			<div class="panel-body">
			<?php if (isset($_GET["error"])) {?>
				<div class="alert alert-warning">
				Con Not Add!!!
					<!-- Sorry! Could not add new employee! Please try again! -->

				</div>
			<?php }?>
				<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon">Name: </span>
						<input type="text" name="fullname" class="form-control" value="<?php echo $row_customer["fullname"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">order number: </span>
						<input type="text" name="order_no" class="form-control" value="<?php echo $row_customer["order_number"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Phone: </span>
						<input type="text" name="phon" class="form-control" value="<?php echo $row_customer["phon"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Email: </span>
						<input type="text" name="email" class="form-control" value="<?php echo $row_customer["email"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Address: </span>
						<input type="text" name="address" class="form-control" value="<?php echo $row_customer["address"];?>" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Registration Date: </span>
						<input type="date" name="reg_date" class="form-control" value="<?php echo $row_customer["re_date"];?>" required>
					</div>
					<input type="submit" value="Edit" class="btn btn-primary">
				</form>
			</div>

		</div>
	</div>
<div id="footer_edit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 respansive">
 <div class="copyright_text">
  <p class=" wow fadeInRight" data-wow-duration="1s">Made with <i class="fa fa-heart"></i> by <a href="#">7star technology</a>2019. All Rights Reserved</p>
  </div>
</div>