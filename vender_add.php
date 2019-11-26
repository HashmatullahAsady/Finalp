<?php
session_start();
require_once("connection.php");
require ("bootstrap.php");
		
if(!isset($_SESSION["SESSION"])){
	header("location:login.php?erorr=done");
}

		
	if (isset($_POST["vender_name"])) {
		$vender_name = $_POST["vender_name"];
		$address =$_POST["address"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$reg_date = $_POST["reg_date"];
		$last_name=$_POST["last_name"];
		$employee_id=$_POST["employee_id"];
		$result = mysqli_query($conn,"INSERT INTO VENDER VALUES (NULL,$employee_id, '$vender_name','$last_name','$address',$phone , '$email' ,'$reg_date')");

		
		if($result) {
			header("location:vender_list.php?add=done");
		}
		else{
			header("location:vender_add.php?error=failed");
		}
			
	}

?>
	<link rel="stylesheet" type="text/css" href="css/style_vender.css">
	<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-lg-offset col-md-offset col-sm-offset col-xs-offset" id="banner_vender_add">
		<div style="float: left; color: white; margin-top: 20px;height: 20px;width: 30px;">
		<a href="mainhom.php"><span class="glyphicon glyphicon-home">home</span></a>
		</div>
		<h1>
			7STAR<span style="color: green">technology</span>
		</h1>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="content">
		<div  id="form_content">
			<div class="panel-heading col-lg-6 col-lg-offset-3">
				<h4> </h4>
				<a href="vender_list.php" class="btn btn-info pull-right" class="">
				Back to list
			</a>
			<h3>Add new Vender for your company</h3>
			<div id="poyem">
				<h1>SEVEN STAR IS YOUR BEST CHOISE</h1>
			</div>
			<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon">dealer</span>
						<select name="employee_id" class="form-control">
							<?php 
							$query=mysqli_query($conn,"SELECT * FROM EMPLOYEE");
							$record=mysqli_fetch_assoc($query);
							?>
							<?php do{ ?>
					 			<option value="<?php echo $record['employee_id']; ?>"><?php echo $record["name"]; ?></option>
							<?php }while ($record=mysqli_fetch_assoc($query)) ?>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Vender Name: </span>
						<input type="text" name="vender_name" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Last Name: </span>
						<input type="text" name="last_name" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Phone: </span>
						<input type="text" name="phone" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Email: </span>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Registration Date: </span>
						<input type="date" name="reg_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Address: </span>
						<input type="text" name="address" class="form-control" required>
					</div>
					<div class="submit">
					<input type="submit" value="Submit" name="submit" class="btn btn-primary form-control">
				</div>
				</form>
			</div>
			<div class="panel-body">
			<?php if (isset($_GET["error"])) {?>
				<div class="alert alert-warning">
				Con Not Add!!!
					 Sorry! Could not add new  vender! Please try again!

				</div>
			<?php }?>

				
			</div>
			
		</div>
		
	</div>
	



</div>