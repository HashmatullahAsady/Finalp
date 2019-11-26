
<?php  
require_once("connection.php");
require("bootstrap.php"); 

	$stock = mysqli_query($conn,"SELECT * FROM stock ");
	$row_stock = mysqli_fetch_assoc($stock);
	$totalRows_stock = mysqli_num_rows($stock);

	$price = $row_stock["price_one_item"];
	$quantity = $row_stock["quantity"];

	$total_price=$price*$quantity;
?>
<link rel="stylesheet" type="text/css" href="css/stock1.css">
<div id="banner"><h1>all tools in stock</h1></div>
<div class="table-responsive">
<?php if ($totalRows_stock > 0) {?>


	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>description</th>
			<th>quality</th>
			<th>Quantity</th>
			<th>Price per item</th>
			<th>Total Price</th>
			<th  class="noprint">Purchase</th>
			<th  class="noprint">Sales</th>
		</tr>
		<?php 
		$x=1;
		do {?>

		<tr>
			<td><?php echo $x++;?></td>
			<td><?php echo $row_stock["item"]?></td>
			<td><?php echo $row_stock["description"]?></td>
			<td><?php echo $row_stock["quality"]?></td>
			<td><?php echo $row_stock["quantity"]?></td>
			<td><?php echo $row_stock["price_one_item"]?></td>
			<td><?php $price = $row_stock["price_one_item"];
					$quantity = $row_stock["quantity"];
					$total_price=$price*$quantity; echo $total_price ?></td>
			<td  class="noprint"><a href="purchase_add.php?item_id=<?php echo $row_stock["item_id"]?>"><span class="glyphicon glyphicon-plus"></span></td>
			<td  class="noprint"><a href="sales_add.php?item_id=<?php echo $row_stock["item_id"]?>"><span class="glyphicon glyphicon-minus"></span></td>
		</tr>

		<?php } while($row_stock = mysqli_fetch_assoc($stock));?>
	</table>
	<?php }
	else{?>
	<div class="alert alert-warning">There is no data available</div>
	<?php }
?>
</div>

<div id="footer">
	 <div class=" col-sm-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright_text">
                                <p class=" wow fadeInRight" data-wow-duration="1s">Made with <i class="fa fa-heart"></i> by <a href="#">7star technology</a>2019. All Rights Reserved</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="footer_socail">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
</div>
