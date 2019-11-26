
<?php  
require_once("connection.php");
require("bootstrap.php");  

	$query = mysqli_query($conn,"SELECT * FROM STOCK");
	$record= mysqli_fetch_assoc($query);
	$totalRows_stock = mysqli_num_rows($query);

	$price = $record["price_one_item"];
	$quantity = $record["quantity"];

	$total_price=$price*$quantity;
	
?>
<link rel="stylesheet" type="text/css" href="css/stock.css">
<div id="banner"><h1>seven star technology</h1></div>
<div id="serch" class="panel panel-search">
	<a href="home.php" class="btn btn-primary">home</a>
	<form class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
	<div class="input-group">
		<span class="input-group-addon" style="background: lightgreen;color: white;">write what you want</span>
		<input type="text" name="item_name"  class="form-control">
	
	<div id="btn_search"><span class=" btn btn_search pull-right">
		<input type="submit" value="search" name="" style="background: lightgreen;">
	</span>
	</div>
	</div>
</form>
<div class="table-responsive">
	<!-- // for search  -->
	<?php if (isset($_GET["item_name"])) {?>
		<?php $item_name=$_GET["item_name"];
	$query2=mysqli_query($conn,"SELECT * FROM STOCK WHERE ITEM  LIKE '$item_name'");
	$record2=mysqli_fetch_assoc($query2);
		?>
		<h1>SEARCH RESULT</h1>
		<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price per item</th>
			<th>Total Price</th>
			<th>sell</th>
		<?php 
		$x=1;
		do {?>

		<tr>
			<td><?php echo $x++;?></td>
			<td><?php echo $record2["item"]?></td>
			<td><?php echo $record2["quantity"]?></td>
			<td><?php echo $record2["price_one_item"]?></td>
			<td><?php  echo $total_price ?></td>
			<td><a href="sales.php?id=<?php echo $record2['st_id']; ?>">sell</a></td>
		</tr>

		<?php } while($record2 = mysqli_fetch_assoc($query2));?>
	</table>
	<?php }else{?>
	
	<?php
	 if ($totalRows_stock > 0) {?>


	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price per item</th>
			<th>Total Price</th>
			<th>sell</th>
		<?php 
		$x=1;
		do {?>
		<tr>
			<td><?php echo $x++;?></td>
			<td><?php echo $record["item"]?></td>
			<td><?php echo $record["quantity"]?></td>
			<td><?php echo $record["price_one_item"]?></td>
			<td><?php echo $total_price ?></td>
			<td><a href="sales.php?id=<?php echo $record['st_id']; ?>">sell</a></td>
		</tr>

		<?php } while($record = mysqli_fetch_assoc($query));?>
	</table>
	<?php }
	else{?>
	<div class="alert alert-warning">There is no data available</div>
	<?php }?>
	<?php }?>
</div>

		


