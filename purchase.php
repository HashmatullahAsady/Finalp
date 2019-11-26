
<?php  
require_once("connection.php");
require("bootstrap.php"); 

	$vender = mysqli_query($conn,"SELECT * FROM vender");
	$row_vender = mysqli_fetch_assoc($vender);

	$employee = mysqli_query($conn,"SELECT * FROM employee");
	$row_employee = mysqli_fetch_assoc($employee);

	if (isset($_POST["item_name"])) {
		$item = $_POST["item_name"];
		$vender_id = $_POST["vender_id"];
		$employee_id =$_POST["employee_id"];
		$purchase_price = $_POST["purchase_price"];
		$purchase_date = $_POST["purchase_date"];
		$quality = $_POST["quality"];
		$description = $_POST["description"];
		$amount=$_POST["amount"];
		$purchase_total_price=$amount * $purchase_price;
		$result = mysqli_query($conn,"INSERT INTO purchase VALUES(NULL,$vender_id,$employee_id,'$item','$description','$quality',$rate_one_item,$purchase_total_price,$amount,'$purchase_date')");
		if ($result) {
			header("location:purchase_list.php?add=done");
		}else{
			header("location:purchase_add.php?error=failed");
		}
	}
?>
<link rel="stylesheet" type="text/css" href="css/purchase_style.css">
<div id="pubanner" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><h1>SEVEN STAR TECHNOLOGY</h1>
<div ><a class="btn btn-primary pull-right" href="purchase_list.php">back to list</a></div>
<div ><a class="btn btn-primary pull-left" href="mainhom.php">home</a></div>
</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">
		<div>
			<div class="panel-heading">
				<h4>Add Purchase </h4>
			</div>
			<div class="panel-body">
			<?php if (isset($_GET["failed"])) {?>
				<div class="alert alert-warning">
				Can not add!!!
				</div>
			<?php }?>
				<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon">Item Name: </span>
						<input type="text" name="item" class="form-control">
					</div>
					<div class="input-group">
						<span class="input-group-addon">Employee Name: </span>
						<select name="employee_id" class="form-control">
							<?php do{?> 
							<option value="<?php echo $row_employee["employee_id"];?>"><?php echo $row_employee["name"];?></option>
 							<?php } while($row_employee = mysqli_fetch_assoc($employee));?>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Purchase source: </span>
						<select name="vender_id" class="form-control">
							<?php do{?> 
							<option value="<?php echo $row_vener["vender_id"];?>"><?php echo $row_vender["name"];?></option>
 							<?php } while($row_vender = mysqli_fetch_assoc($vender));?>
						</select>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon">quality: </span>
						<input type="text" name="quality" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">description: </span>
						<textarea class="form-control" name="description"></textarea>
					</div>
					<div class="input-group">
						<span class="input-group-addon">amount </span>
						<input type="number" name="amount" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Purchase Price: </span>
						<input type="text" name="purchase_price" class="form-control" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Purchase Date: </span>
						<input type="text" name="purchase_date" class="form-control" value="<?php echo date("Y-m-d")?>" required>
					</div>
				<input type="submit" value="Purchase" class="btn btn-primary">
			</form>
			
		</div>
	</div>
</div>
<div id="footer"></div>		

