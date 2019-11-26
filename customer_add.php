
<?php 

session_start();

if(!isset($_SESSION["SESSION"])){
	header("location:login.php?acces=denied");
}

	require("connection.php");
	require("bootstrap.php");
	if (isset($_POST["fullname"])) {
		$employee_id=$_POST["employee_id"];
		$fullname = $_POST["fullname"];
		$address =$_POST["address"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$reg_date = $_POST["reg_date"];
		$order_no=$_POST["order_no"];

		$result = mysqli_query($conn, "INSERT INTO CUSTOMER VALUES (NULL, $employee_id,'$fullname',$order_no,'$address',$phone,'$email', '$reg_date')");
		if($result) {
			header("location:customer_list.php?add=done");
		}
		else{
			header("location:customer_add.php?error=failed");
		}
		
	}

?>
<link rel="stylesheet" type="text/css" href="css/customer.css">
<div id="banner" class="col-lg-12 col-md-12 col-sm-6 col-ex-5 responsive ">
	<h1 class="responsive"> customer <span style="color: green;"> regestration</span> </h1>
</div>
<!--  -->
<div class="d-flex justy-content-center">
<div class="row">

<div id="customer_reg" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 respansive" >
<a href="customer_list.php" class="btn  pull-left" class="" id="btn">
				Back to list
</a><br>
	<div  class="col-lg-10 col-md-10 col-sm-6 col-xs-12 col-lg-offset-0 respansive">
		<div id="form" class="panel ">
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
			
			<div id="c_form">
				<form method="post" enctype="multipart/form-data">
					<div class="input-group"><span class="input-group-addon">Regestrar name</span>
					<select name="employee_id" class="form-control">
						<?php
						$query=mysqli_query($conn,"SELECT * FROM EMPLOYEE");
						$record=mysqli_fetch_assoc($query);
						?>
					<?php do{ ?>
					<option value="<?php echo $record['employee_id']; ?>"><?php echo $record["name"]; ?></option>						<?php }while ($record=mysqli_fetch_assoc($query)) ?>
					</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">full_Name: </span>
						<input type="text" name="fullname" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Phone: </span>
						<input type="number" name="phone" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Email: </span>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Address: </span>
						<input type="text" name="address" class="form-control" required>
					</div>
				
					<div class="input-group">
						<span class="input-group-addon">Set order nomber: </span>
						<input type="text" name="order_no" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Registration Date: </span>
						<input type="date" name="reg_date" class="form-control" value="<?php echo  date('Y-m-d'); ?>" required>
					</div>
					<input type="submit" value="Submit" class="btn btn-primary form-control">
				</form>
			</div>
			</div>
			

		</div>
		<div id="footer"></div>
	</div>

</div>
</div>
</div>

