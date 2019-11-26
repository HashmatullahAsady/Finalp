<?php 
require("connection.php");
require("bootstrap.php");
// here condation should be mantioned
// $id=$_GET["id"];
$stock=mysqli_query($conn,"SELECT * FROM STOCK ");
$stock_record=mysqli_fetch_assoc($stock);



$customer=mysqli_query($conn,"SELECT * FROM CUSTOMER");
$customer_record=mysqli_fetch_assoc($customer);


if(isset($_POST["item_name"])){
	$item_name=$_POST["item_name"];
	$customer_name=$_POST["customer_name"];
	$item_description=$_POST["item_description"];
	$item_quality=$_POST["item_quality"];
	$item_quantity=$_POST["item_quantity"];
	$price_one_item=$_POST["price_one_item"];
	$total=$item_quantity * $price_one_item;
	$insert=mysqli_query($conn,"INSERT INTO SALES VALUES(NULL,'$customer_name','$item_name','$item_description','$item_quality','$item_quantity',$price_one_item,null,$total)");
	if($insert){
		// $query_stock_out=mysqli_query($conn,"DELETE FROM STOCK VALUES WHERE ");
		header("location:sales11.php?seles=done");
	}
}
?>
<link rel="stylesheet" type="text/css" href="css/sales.css">
<div id="banner" class="panel panel-header"><h1>sevenstar<span style="color: green">technology</span></h1></div>
	<div id="content" class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2" >
		<div id="description">
		<a href="#" class="btn btn-primary pull-right">back to list</a>
		<h1>selected tools for seles</h1>
			<?php if (isset($_GET["failed"])) {?>
				<div class="alert alert-success">
				Con Not Added!
				</div>
			<?php }?>
		</div>
				<form method="post" enctype="multipart/form-data">
					<div class="input-group">
						<span class="input-group-addon">customer Name: </span>
						<select name="customer_name" id="employee_id" class="form-control">
							<option value="<?php echo $customer_record["customer_id"];?>"><?php echo $customer_record["fullname"];?></option>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Item: </span>
						<select name="item" id="item_id" class="form-control">
							<?php do{?> 
							<option value="<?php echo $stock_record["st_id"];?>"><?php echo $stock_record["item"];?></option>
							<?php } while($row_item = mysqli_fetch_assoc($item));?>
						</select>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon">Item description:</span>
					<select name="item_description" id="sales_id" class="form-control">
							<option value="<?php echo $stock_record["description"];?>"><?php echo $stock_record["description"];?></option>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Quality:</span>
						<select name="item_quality" id="quantity" class="form-control">
							<option value="<?php echo $stock_record["quality"];?>"><?php echo $stock_record["quality"];?></option>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">quantity: </span>
						<input type="number" name="item_quantity" class="form-control">
					</div>
					<div class="input-group">
						<span class="input-group-addon">price of one item: </span>
						<select name="price_one_item" id="quantity" class="form-control">
							<option value="<?php echo $stock_record["price_one_item"];?>"><?php echo $stock_record["price_one_item"];?></option>
						</select>
					</div>

				<input type="submit" value="submit seles" class="btn btn-primary">
			</form>
	</div>
</div>
<div id="footer"></div>