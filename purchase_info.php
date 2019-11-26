<?php 
session_start();
if(!isset($_SESSION["SESSION"])){
	header("location:login.php?erorr=done");
} 
require_once("connection.php");
require_once("bootstrap.php"); 


$purchase = mysqli_query($conn,"SELECT * FROM PURCHASE INNER JOIN stock ON stock.st_id = purchase.pu_id INNER JOIN VENDER ON vender.vender_id = purchase.vender_id INNER JOIN employee ON employee.employee_id = purchase.purchase_id");
$row_purchase= mysqli_fetch_assoc($purchase);



// $purchase=mysqli_query($conn,"SELECT purchase.item,employee.name,vender.name,purchase.rateper_item,purchase.purchas_date,purchase.amount,purchase.description from purchase inner join employee inner join vender on purchase.pu_id=employee.employee_id,purchase.pu_id=vender.vender_id");
// $row_purchase= mysqli_fetch_assoc($purchase);

?><style type="text/css">
	#footer{margin-top: 270px; position: all;}
</style>
<link rel="stylesheet" type="text/css" href="css/purchase_style.css">
<div class="panel panel-primary" id="banner">
	<div class="panel-heading">
		<a href="purchase_add.php" class="btn btn-info pull-right">Add new purchase</a>
		<h4>Purchase List</h4>
	</div>
	<div class="panel-body">
	<?php if (isset($_GET["delete"])) {?>
		<div class="alert alert-success">Delete Done</div>
	<?php }?>
	<?php if (isset($_GET["error"])) {?>
		<div class="alert alert-danger">Delete Not Done !!!</div>
	<?php }?>
	<?php if (isset($_GET["edit"])) {?>
		<div class="alert alert-success">Edit Done Successfully!</div>
	<?php }?>


	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>No</th>
				<th>Item Name</th>
				<th>employee Name</th>
				<th>Vender name</th>
				<th>Purchase Price</th>
				<th>In date</th>
				<th>Quantity</th>
				<th>detiles</th>
			</tr>

			<?php 
			$x=1;
			
			do{?>

			<tr>
				<td><?php echo $x++;?></td>
				<td><?php echo $row_purchase["name"];?></td>
				<td><?php echo $row_purchase["name"];?></td>
				<td><?php echo $row_purchase["vender_name"];?></td>
				<td><?php echo $row_purchase["purchase_price"];?></td>
				<td><?php echo $row_purchase["purchase_date"];?></td>
				<td><?php echo $row_purchase["quantity"];?></td>
				<td><?php echo $row_purchase["description"];?></td>
				</tr>

			<?php } while($row_purchase= mysqli_fetch_assoc($purchase));?>
		</table>

	</div>

	</div>
	<div id="footer"></div>
</div>