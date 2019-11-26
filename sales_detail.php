<?php  require_once("connection.php"); 
require_once("bootstrap.php");

$customer_id = $_GET["customer_id"];
$sales_id = $_GET["sales_id"];

$sales_detail = mysqli_query($conn,"SELECT *, sales_detail.quantity AS sold_quantity FROM sales_detail INNER JOIN sales ON sales.sa_id = sales_detail.sales_id INNER JOIN stock ON stock.st_id = sales_detail.item_id WHERE sales_detail.sa_id=$sales_id");
$row_sales_detial= mysqli_fetch_assoc($sales_detail);

?>
 SELECT *, sales_detail.quantity AS sold_quantity FROM sales_detail INNER JOIN sales ON sales.sa_id = sales_detail.sales_id INNER JOIN stock ON stock.st_id = sales_detail.item_id WHERE sales_detail.sa_id=$sa_id;

<div class="panel panel-primary">
	<div class="panel-heading">
		<a href="sales_add.php" class="btn btn-info pull-right">Add new sale</a>
		<h4>Sales List</h4>
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
				<th>Employee Name</th>
				<th>Sales Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			<?php 
			$x=1;
			$total=0;
			
			do{?>

			<tr>
				<td><?php echo $x++;?></td>
				<td><?php echo $row_sales_detial["item_name"];?></td>
				<td><?php echo $row_sales_detial["sales_price"];?></td>
				<td><?php echo $row_sales_detial["sold_quantity"];?></td>
				<td><?php echo $row_sales_detial["total_price"];?></td>
				<td><a href="sales_detail_edit.php?edit=done&sales_detail_id=<?php echo $row_sales_detial["sales_detail_id"]?>&customer_id=<?php echo $row_sales_detial["customer_id"]?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a class="delete" href="sales_detail_delete.php?delete=done&sales_detail_id=<?php echo $row_sales_detial["sales_detail_id"]?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<?php $total+=$row_sales_detial["total_price"]?>

			<?php } while($row_sales_detial= mysqli_fetch_assoc($sales_detail));?>
		</table>

	</div>
	<div class="panel-footer">
		Total Price:<?php?>
	</div>
	</div>
</div>